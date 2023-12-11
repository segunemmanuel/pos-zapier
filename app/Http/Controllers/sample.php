<?php

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

            ?>
