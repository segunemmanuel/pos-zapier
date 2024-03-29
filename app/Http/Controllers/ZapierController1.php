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
use Barryvdh\DomPDF\Facade\Pdf;
use Amenadiel\JpGraph\Graph\Graph;
use Amenadiel\JpGraph\Graph\PieGraph;
use Amenadiel\JpGraph\Plot\BarPlot;
use Amenadiel\JpGraph\Plot\GroupBarPlot;
use Amenadiel\JpGraph\Plot\PiePlot;
use Amenadiel\JpGraph\Plot\Plot;
use App\Mail\WelcomeEmail;
use App\Models\SafetyIncident;
use Illuminate\Http\Response;

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

            // event(new QuizSearchEvent($data['email'], $data['courseName']));
           return  $this->fetchUserAndQuizData($data['email'], $data['courseName']);
            // return response()->json(['message' => 'Record created successfully', 'data' => $newRecord], 201);

    }






    /**
     * @param mixed $email
     * @param mixed $courseName
     *
     * @return [type]
     */
    public function fetchUserAndQuizData($email, $courseName)
    {
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
            'score' => $quiz->quizScore,
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
        'fullName'=>$user->name,
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

    // Call the analyzeAssessment method of the zapierController with the jsonResponse
    return $this->analyzeAssessment($jsonResponse);
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


        /**
         * @param mixed $jsonResponse
         *
         * @return [type]
         */
        public function analyzeAssessment($jsonResponse)
        {
            $data = json_decode($jsonResponse, true);
            if (!$data) {
                // Log::error('Invalid JSON response.');
                return response()->json(['error' => 'Invalid JSON response'], 422);
            }
            $responses = [];
            $userDetails = [];
            foreach ($data as $key => $value) {
                if ($key === 'quizzes') {
                    foreach ($value as $quizData) {
                        $prompt = $this->generatePromptForQuiz($quizData);
                        $generatedResponse = $this->getOpenAIResponse($prompt);
                        $responses[] = [
                            'record_type' => 'quiz',
                            'quizName' => $quizData['quizName'],
                            'courseName' => $quizData['courseName'],
                            'quizId' => $quizData['quizId'],
                            'username' => $quizData['username'],
                            'fullname'=>$quizData['fullname'],
                            'score'=>$quizData['score'],
                            'quizPointsPossible'=>$quizData['totalScorePossible'],
                            'email' => $data['email'],
                            'fullName'=>$data['fullName'],
                            'actionPlans' => $generatedResponse,
                        ];
                    }
                } else {
                    // Assuming other keys are user details
                    $userDetails[$key] = $value;
                }
            }

            // Process the final response
            $finalResponse = [
                'message' => 'Record created successfully',
                'responses' => $responses,
                'schoolDetails' => $userDetails,
                // 'actionPlans'=>$generatedResponse,
            ];
            Log::info($finalResponse);

            // For example, sending to Anvil API, saving to database, etc.
            $this->transformDataForAnvil($finalResponse);
            return response()->json($finalResponse, 201);
        }

        /**
         * @param mixed $quizData
         *
         * @return [type]
         */
        private function generatePromptForQuiz($quizData)
        {
            // Generate the prompt based on quiz data
            $score = $quizData['score'];
            // $totalScorePossible = $quizData['totalScorePossible'];
            $totalScorePossible = "100%" ;

            $quizName = $quizData['quizName'];

            return "Based on public data from schoolsafety.gov, is $score out of $totalScorePossible possible scores good for a school trying to improve its $quizName and improve gun safety readiness. Send action plans or recommendations for improvements (This is a must!). Send action plans in bullet points with a paragraph summarizing. Be assertive not unsure. Please use a formal tone and avoid using 'yes' or 'no' in the response.Remove in summary part,Just listen action points,";
        }

        /**
         * @param mixed $prompt
         *
         * @return [type]
         */
        private function getOpenAIResponse($prompt)
        {
            // Send the request to OpenAI and return the response
            $maxRetries = 3;
            $retryCount = 0;
            $response = null;

            do {
                try {
                    $response = OpenAI::completions()->create([
                        'model' => 'gpt-3.5-turbo-instruct',
                        'prompt' => $prompt,
                        'max_tokens' => 200,
                        'temperature' => 0.7,
                    ]);
                    break; // Break the loop if the request succeeds
                } catch (\Exception $e) {
                    $retryCount++;
                    // Log::error('OpenAI Request Failed: ', ['exception' => $e->getMessage()]);
                    if ($retryCount >= $maxRetries) {
                        throw $e; // Re-throw the exception if retries are exhausted
                    }
                }
            } while ($retryCount < $maxRetries);

            return $response['choices'][0]['text'];
        }



        /**
         * @param mixed $response
         *
         * @return [type]
         */
        public function transformDataForAnvil($response)
{
    // Check if $response is a JSON string and decode it if necessary
    if (is_string($response)) {
        if (json_last_error() !== JSON_ERROR_NONE) {
            Log::error('Invalid JSON response.');
            return null; // Handle the error as required
        }
    } elseif (is_array($response)) {
        $data = $response; // Use it directly if it's already an array
        $transformedData = [
            'title' => '2nd october 2023 version 1',
            'fontSize' => 10,
            'textColor' => '#333333',
            'data' => [
                'school' => $data['schoolDetails']['school'],
                'email'=>$data['schoolDetails']['email'],
                'name' => $data['schoolDetails']['username'], // Adjust as per your data structure
                'phone' => '', // Add phone if available
                'schoolAddress' => $data['schoolDetails']['schoolAddress'],
                'level' => $data['schoolDetails']['level'],
                'fullName' => $data['schoolDetails']['fullName'],
                'geolocation' => $data['schoolDetails']['geolocation'],
                'enrollment' => $data['schoolDetails']['enrollment'],
                'squareFeet' => $data['schoolDetails']['squareFeet'],
                'schoolAcres' => $data['schoolDetails']['schoolAcres'],
                'courseName' => $data['responses'][0]['courseName'], // Adjust as needed
                'score' => $data['responses'][0]['score'], // Adjust as needed
                'quizName' => array_column($data['responses'], 'quizName'),
                'actionPlans' =>array_column($data['responses'], 'actionPlans'), // Combining all action plans
            ]
        ];
    } else {
        Log::error('Unexpected data type for $response.');
        return null; // Handle the error as required
    }
    // Log for debugging, remove or comment out for production
    Log::info($transformedData);

    return $this->generatePDFView($transformedData);


}

/**
 * @param mixed $transformedData
 *
 * @return [type]
 */
public function sendToAnvil($transformedData)
{
    $apiEndpoint = 'https://app.useanvil.com/api/v1/fill/41uEFk6E6OKG5AfnlCgy.pdf';
    $username = 'FsmVT2JdbQATPnfBKSgndBtNusV9AARx'; // Replace with your Anvil API key
    $client = new \GuzzleHttp\Client();

    try {
        $response = $client->post($apiEndpoint, [
            'headers' => [
                'Authorization' => 'Basic ' . base64_encode($username . ':'),
                'Content-Type' => 'application/json',
            ],
            'body' => json_encode($transformedData)
        ]);

        if ($response->getStatusCode() === 200) {
            $pdfContent = $response->getBody()->getContents();
            $filename = 'school_report_' . time() . '.pdf';

            // Save the PDF to public folder or any desired location
            $filePath = public_path('pdf/' . $filename);
            Log::info($filePath);
            file_put_contents($filePath, $pdfContent);

            // Optionally, save file info in the database
            $pdfRecord = new PDFRecord();
            $pdfRecord->filename = $filename;
            $pdfRecord->email = $transformedData['email']; // Ensure email is in $transformedData
            $pdfRecord->save();

            return $filename; // Return filename for download
        } else {
            Log::error('Error: Failed to generate PDF. Status Code: ' . $response->getStatusCode());
            return null;
        }
    } catch (\Exception $e) {
        Log::error('Error: ' . $e->getMessage());
        return null;
    }
}

/**
 * @param mixed $filename
 *
 * @return [type]
 */
public function downloadPdf($filename)
{
    // Define the path to the PDF file
    $pdfPath = public_path('pdf/' . $filename); // Adjust the path based on where you save the file

    if (file_exists($pdfPath)) {
        return response()->download($pdfPath, $filename);
    } else {
        return abort(404, 'PDF file not found.');
    }
}



/**
 * @param mixed $transformedData
 *
 * @return [type]
 */
public function generatePDFView($transformedData)
{
    $email = $transformedData['data']['email'];
    $quizzes = MemberPressQuizCompletedRecord::where('email', $email)->pluck('quizScore', 'quizName');
    $scores = $quizzes->toArray();
    // Assuming $scores has quiz names as keys and their corresponding scores as values
    $labels = [];
    $data = [];

    // Pass the base64-encoded image to the view
    $pdf = PDF::loadView('chart', [
        'transformedData' => $transformedData,
        'base64Image' => $base64Image,
        'base64ImagePie'=>$base64ImagePie,
    'base64Image2'=>$base64Image2,
        'base64Image3'=>$base64Image3,
        'base64ImageSchoolIncidence'=>$base64ImageSchoolIncidence
    ])->setOption(['defaultFont'=>'Helvetica']);



    // Define the filename and the path to save the PDF
    $filename = 'document_' . time() . '.pdf';
    $filePath = public_path('pdf/' . $filename);

    // Save the PDF to the file system
    $pdf->save($filePath);

    // Generate the URL for accessing the PDF
$pdfUrl = url('pdf/' . $filename);
Log::info($pdfUrl);

    // Return the filename for further use
    return $filename;

    }


































































    /**
     * @param Request $request
     *
     * @return [type]
     */
    public function generateInsightsDemo(Request $request)
    {
        // Relation of shooter to school
        $dataPieChartSchoolShootings = [1.6, 5.9, 2.9, 3.5, 2.2, 13.3, 24.9, 40.3, 0.8]; // Example data
        $labelsSchoolShootings = [
            "Nonstudent",
            "Nonstudent Using Athle...",
            "Parent",
            "Former Student",
            "Police Officer/SRO",
            "Unknown",
            "No Relation",
            "Student",
            "Other Staff"
        ];

        // Create the pie chart object
        $pieGraphSchoolShooting = new PieGraph(600, 400);
        $pieGraphSchoolShooting->SetShadow();

        // Create the pie plot with your data
        $piePlot1 = new PiePlot($dataPieChartSchoolShootings);
        $piePlot1->SetLegends($labelsSchoolShootings);
        $pieGraphSchoolShooting->Add($piePlot1);

        // Specify the title of the pie chart
        $pieGraphSchoolShooting->title->Set("Relation of Shooter to School");

        // Display the pie chart and get the image data
        ob_start(); // Start output buffering
        $pieGraphSchoolShooting->Stroke();
        $image_data2 = ob_get_contents(); // Get the contents of the buffer
        ob_end_clean(); // Clear the buffer

        // Encode the image data to base64
        $base64Image2 = base64_encode($image_data2);








            // Pass the base64-encoded image to the view
            $pdf = PDF::loadView('chart');


            // Define the filename and the path to save the PDF
            $filename = 'document_' . time() . '.pdf';
            $filePath = public_path('pdf/' . $filename);

            // Save the PDF to the file system
            $pdf->save($filePath);

            // Return the filename for further use
            return $filename;
    }


    /**
     * @return [type]
     */
    public function sendWelcomeEmail()
    {
        $userEmail = 'segunemmanuel46@gmail.com'; // Replace with the recipient's email address
        Mail::to($userEmail)->send(new WelcomeEmail());
        return 'Welcome email sent successfully.';
    }

}
