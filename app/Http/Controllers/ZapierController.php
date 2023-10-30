<?php
namespace App\Http\Controllers;
use App\Events\QuizSearchEvent;
use App\Listeners\QuizSearchListener;
use App\Mail\Mail\PDFMail;
use App\Models\MemberPressCourseCompletedUser;
use App\Models\MemberPressQuizCompletedRecord;
use App\Models\MemberPressUser;
use App\Models\PDFRecord;
use App\Models\UserMemberPressData;
use Exception;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use OpenAI\Client as OpenAIClient;
use OpenAI\Laravel\Facades\OpenAI;

class ZapierController extends Controller
{

        /**
         * @param Request $request
         * @return \Illuminate\Http\JsonResponse
         * save records when user signups for memberships in sitesafety
         */
        public function createMemberPressUser(Request $request)
        {
            $data = $request->all();
            $newRecord = new MemberPressUser();
            $newRecord->name = $data['name'];
            $newRecord->email = $data['email'];
            $newRecord->username = $data['username'];
            $newRecord->school = $data['school'];
            $newRecord->schoolAddress = $data['schoolAddress'];
            $newRecord->userAddress = $data['userAddress'];
            $newRecord->membershipID = $data['membershipID'];
            $newRecord->enrollment = $data['enrollment'];
            $newRecord->geolocation = $data['geolocation'];
            $newRecord->squareFeet = $data['squareFeet'];
            $newRecord->schoolAcres = $data['schoolAcres'];
            $newRecord->schoolCountry = $data['schoolCountry'];
            $newRecord->level = $data['level'];

            // Save the new record to the database
            $newRecord->save();

            return response()->json(['message' => 'Record created successfully', 'data' => $newRecord], 201);
        }


        /**
         * @param Request $request
         * @return \Illuminate\Http\JsonResponse
         * save memeberpress records when users completes a course
         */
        public function createMemberPressCourseCompletedRecords(Request $request)
        {
            $data = $request->all();
            $newRecord = new MemberPressCourseCompletedUser();
            $newRecord->email = $data['email'];
            $newRecord->username = $data['username'];
            $newRecord->registered_at = $data['registrationDate'];
            $newRecord->first_name = $data['firstName'];
            $newRecord->last_name = $data['lastName'];
    //        $newRecord->courseData = json_encode($data['data']);
            $newRecord->status = $data['status'];
            $newRecord->registrationDate = $data['registrationDate'];
            $newRecord->user_id = $data['userId'];
            $newRecord->courseName = $data['courseName'];
            // Save the new record to the database
            $newRecord->save();

            event(new QuizSearchEvent($data['email'], $data['courseName']));
            return response()->json(['message' => 'Record created successfully', 'data' => $newRecord], 201);

        }


        /**
         * @param Request $request
         *
         * @return [type]
         */
        public function createMemberPressQuizRecordWhenCompleted(Request $request)
        {
            $data = $request->all();

            $attributes = [
                'quizId' => $data['quizId'],
                'courseId' => $data['courseId'],
                'quizName' => $data['quizName'],
                'courseName' => $data['courseName'],
                'quizScore' => $data['quizScore'],
                'totalScorePossible' => $data['totalScorePossible'],
                'username' => $data['username'],
                'lastName' => $data['lastName'],
                'firstName' => $data['firstName'],
                'email' => $data['email'],
                'completedDate' => $data['completedDate'],
                'completionStatus' => $data['completionStatus'],
                'startDate' => $data['startDate'],
                'quizAttemptId' => $data['quizAttemptId'],
                'miscData' => json_encode($data['miscData']),
                'quizPointsScored' => $data['quizPointsScored'],
                'quizPointsPossible' => $data['quizPointsPossible'],
                'fullname' => $data['fullname'],
    //            'user_id' => $data['user_id'],
            ];

            MemberPressQuizCompletedRecord::create($attributes);
            return response()->json(['message' => 'Record created successfully', 'data' =>$attributes], 201);

        }


        public function analyzeAssessment($customizedCollection)
        {



            $responses = [];
            foreach ($customizedCollection as $data) {
                // Check if it's a quiz record or user record
                if ($data['record_type'] === 'quiz') {
                    $quizName = $data['quizName'];
                    $score = $data['score'];
                    $totalScorePossible = $data['totalScorePossible'];

                    // Create a prompt based on the quiz data
                    $prompt = "Based on public data from schoolsafety.gov, is $score out of $totalScorePossible possible scores good for a school trying to improve its $quizName and improve gun safety readiness. Send action plans or recommendations for improvements (This is a must!). Send action plans in bullet points with a paragraph summarizing. Please use a formal tone and avoid using 'yes' or 'no' in the response.";

                    // Generate a response using OpenAI
                    $maxRetries = 3;
                    $retryCount = 0;

                    do {
                        try {
                            $response = OpenAI::completions()->create([
                                'model' => 'text-davinci-003',
                                'prompt' => $prompt,
                                'max_tokens' => 200,
                                'temperature' => 0.7,
                                // 'timeout' => 60, // Adjust the timeout value in seconds
                            ]);
                            break; // Break the loop if the request succeeds
                        } catch (\Exception $e) {
                            $retryCount++;
                            if ($retryCount >= $maxRetries) {
                                throw $e; // Re-throw the exception if retries are exhausted
                            }
                        }
                    } while ($retryCount < $maxRetries);
                    $generatedResponse = $response['choices'][0]['text'];
                    // Store the response for this quiz or user record
                    $responses[] = [
                        'record_type' => $data['record_type'],
                        'quizName' => $quizName,
                        'courseName'=>$data['courseName'],
                        'quizId'=>$data['quizId'],
                        'username'=>$data['username'],
                        'email'=>$data['email'],
                        'actionPlans' => $generatedResponse,
                    ];
                }
            }
    $filteredUserRecords = $customizedCollection->filter(function ($item) {
            return $item['record_type'] === 'user';
        })->values();


    $dataResponse = response()->json([
                'message'=>'Record created successfully',
                'responses' => $responses,
                'schoolDetails'=>$filteredUserRecords,

            ],201);
    Log::info($dataResponse);
    // Initialize an empty $transformedData array
    $transformedData = [];

    // Extract the data from the responses and user details
    $userDetails = $filteredUserRecords[0];
    $firstResponse = $responses[0];
    // dd($firstResponse);


    // Populate the $transformedData array
    $transformedData['school'] = $userDetails['school'];
    $transformedData['name'] = $userDetails['username'];
    $transformedData['phone'] = '';  // Add the phone number if available
    $transformedData['schoolAddress'] = $userDetails['schoolAddress'];
    $transformedData['level'] = $userDetails['level'];
    $transformedData['geolocation'] = $userDetails['geolocation'];
    $transformedData['enrollment'] = $userDetails['enrollment'];
    $transformedData['squareFeet'] = $userDetails['squareFeet'];
    $transformedData['schoolAcres'] = $userDetails['schoolAcres'];

    // Sample fields from the first response, you can adjust these as needed
    $transformedData['courseName'] = $firstResponse['courseName'];
    $transformedData['quizName'] = $firstResponse['quizName'];
    $transformedData['actionPlans'] = $firstResponse['actionPlans'];
    // $transformedData['score'] = $firstResponse['score'];

    // Additional fields
    // $transformedData['caste92b20d0618011ee93c9ad36b206e3d6'] = 'Action Points';

Log::info($transformedData);

    // Create the final structure
    $finalData = [
        'title' => '2nd october 2023 version 1',
        'fontSize' => 10,
        'textColor' => '#333333',
        'data' => $transformedData,
    ];

    // Define the API endpoint for Anvil
    $apiEndpoint = 'https://app.useanvil.com/api/v1/fill/41uEFk6E6OKG5AfnlCgy.pdf';

    $username = 'FsmVT2JdbQATPnfBKSgndBtNusV9AARx'; // Replace with your username
    $password = ''; // Empty password
    $client = new Client();

    try {
        // Send a POST request to the Anvil API with basic authentication
        $response = $client->post($apiEndpoint, [
            'json' => $finalData,
            'headers' => [
                'Authorization' => 'Basic ' . base64_encode($username . ':'), // Note the colon after the username
            ],
        ]);

        // Check the response status code
        if ($response->getStatusCode() === 200) {
            // Successfully received the filled PDF
            $pdfBinaryData = $response->getBody()->getContents();

            // Generate a unique filename with the current date and time
            $filename = 'output_' . date('Y-m-d_H-i-s') . '.pdf';

            // Save the PDF to a file or take any other desired action
            file_put_contents($filename, $pdfBinaryData);

            // save in the db table

        $pdfRecord = new PDFRecord();
        $pdfRecord->filename = $filename;
        $pdfRecord->email= $data['email'];
        $pdfRecord->save();
        Log::info($filename);
          // Get the PDF record from the database by the filename
          $pdfRecord = PDFRecord::where('filename', $filename)->first();

        // Mail::to($pdfRecord->email)->send(new PDFMail( $filename));

                //   return response()->download($pdfPath, $filename);


        echo 'PDF file saved as ' . $filename . ' successfully.';
        } else {
            // Handle errors or unexpected responses
            echo 'Error: Unexpected response from Anvil API.';
        }
    } catch (Exception $e) {
        // Handle exceptions (e.g., connection errors)
        echo 'Error: ' . $e->getMessage();
    }
    }



    /**
     * @param mixed $filename
     *
     * @return [type]
     */
    public function downloadPdf($filename)
    {
        // Get the PDF record from the database by the filename
        $pdfRecord = PDFRecord::where('filename', $filename)->first();

        if ($pdfRecord) {
            // Use the filename property of the $pdfRecord to generate the correct file path
            $pdfPath = public_path($pdfRecord->filename); // Adjust the path as needed based on your file structure

            // Check if the file exists
            if (file_exists($pdfPath)) {
                // Return the PDF file as a download response
                Log::info($filename);
                return response()->download($pdfPath, $filename);
            }
        }

        // Handle the case where the file is not found
        return abort(404);
    }


}
