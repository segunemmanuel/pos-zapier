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

        $quizzes = MemberPressQuizCompletedRecord::where('email', $email)
        ->where('courseName', $courseName)
        ->get();

    $userDetails = MemberPressUser::where('email', $email)->first();

    // Combine $quizzes and $userDetails into one collection
    $combinedCollection = $quizzes->concat([$userDetails]);

    $customizedCollection = $combinedCollection->map(function ($item) {
        if ($item instanceof \App\Models\MemberPressQuizCompletedRecord) {
            // Customize the format for quiz records
            return [
                'record_type' => 'quiz',
                'quizId' => $item->quizId,
                'quizName' => $item->quizName,
                'score'=>$item->quizPointsScored,
                'totalScorePossible'=>$item->quizPointsPossible,
                'fullname'=>$item->fullname,
                'courseId'=>$item->courseId,
                'completedDate'=>$item->completedDate,
                'startDate'=>$item->startDate,
                'email'=>$item->email,
                'username'=>$item->username,
                'courseName'=>$item->courseName
            ];
        } elseif ($item instanceof \App\Models\MemberPressUser) {
            // Customize the format for user details
            return [
                'record_type' => 'user',
                'username' => $item->username,
                'email' => $item->email,
                'school'=>$item->school,
                'schoolAddress'=>$item->schoolAddress,
                'userAddress'=>$item->userAddress,
                'enrollment'=>$item->enrollment,
                'geolocation'=>$item->geolocation,
                'squareFeet'=>$item->squareFeet,
                'schoolAcres'=>$item->schoolAcres,
                'schoolCountry'=>$item->schoolCountry,
                'level'=>$item->level
            ];
        }
    });
    Log::info($customizedCollection);

        $this->zapierController->analyzeAssessment($customizedCollection);
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
