<?php

namespace App\Listeners;

use App\Events\QuizSearchEvent;
use App\Http\Controllers\ZapierController;
use App\Models\MemberPressQuizCompletedRecord;
use App\Models\MemberPressUser;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class QuizSearchListener
{

    private $zapierController;
    /**
     * Create the event listener.
     */
    public function __construct(ZapierController $zapierController)
    {
            $this->zapierController=$zapierController;
        //
    }
    /**
     * Handle the event.
     */

     public function handle(QuizSearchEvent $event)
{
    $email = $event->email;
    $courseName = $event->courseName;

    // Fetch user details
    $user = MemberPressUser::where('email', $email)->first();

    if (!$user) {
        // Handle the case where the user is not found
        Log::warning("User not found for email: {$email}");
        return response()->json(['error' => 'User not found'], 404);
    }

    // Fetch quizzes associated with the user
    $quizzes = MemberPressQuizCompletedRecord::where('email', $email)
        ->where('courseName', $courseName)
        ->get();

    // Transform quizzes
    $quizzesTransformed = $quizzes->map(function ($quiz) {
        return [
            'quizId' => $quiz->quizId,
            'quizName' => $quiz->quizName,
            'score' => $quiz->quizPointsScored,
            'totalScorePossible' => $quiz->quizPointsPossible,
            'completedDate' => $quiz->completedDate,
            'startDate' => $quiz->startDate,
            'fullname'=> $quiz->fullname,
            'courseId'=> $quiz->courseId,
            'username'=> $quiz->username,
            'courseName'=> $quiz->courseName,
            'email'=>$quiz->email,
        ];
    });

    // Combine user details with quizzes
    $response = [
        'record_type' => 'user&quiz',
        'username' => $user->username,
        'school' => $user->school,
        'schoolAddress'=> $user->schoolAddress,
        'userAddress'=> $user->userAddress,
        'enrollment'=> $user->enrollment,
        'geolocation'=> $user->geolocation,
        'squareFeet'=> $user->squareFeet,
        'schoolAcres'=> $user->schoolAcres,
        'schoolCountry'=> $user->schoolCountry,
        'level'=> $user->level,
        'email'=>$user->email,
        'quizzes' => $quizzesTransformed
    ];

    $jsonResponse = json_encode($response);

    // Log::info("Response: " . $jsonResponse);
    // dd($jsonResponse);

    $this->zapierController->analyzeAssessment($jsonResponse);

}



   /**
     * Register the listeners for the subscriber.
     *
     * @param  Illuminate\Events\Dispatcher  $events
     */
    public function subscribe($events)
    {
        $events->listen(
            'App\Events\QuizSearchEvent',
            [QuizSearchListener::class, 'handle']
        );

    }


}
