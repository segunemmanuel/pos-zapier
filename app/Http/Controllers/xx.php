<?php
public function generatePDFView($transformedData)
{

    $email = $transformedData['data']['email'];
$quizzes = MemberPressQuizCompletedRecord::where('email', $email)->pluck('quizScore', 'quizName');

$scores = $quizzes->mapWithKeys(function ($score, $quizName) {
    // Remove the percentage sign and convert to a float value
    $numericScore = (float) rtrim($score, '%');
    return [$quizName => $numericScore];
})->toArray();



    // Assuming $scores has quiz names as keys and their corresponding scores as values
    $labels = [];
    $data = [];

    foreach ($scores as $quizName => $quizScore) {
        $labels[] = $quizName; // Store the quiz name into the labels array
        $data[] = $quizScore;  // Store the quiz score into the data array
    }

    // dd(['labels' => $labels, 'data' => $data]);

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


// Assume $email is available and contains the user's email address

// Create a new PDFRecord instance and set its properties
$pdfRecord = new PDFRecord();
$pdfRecord->email = $email;
$pdfRecord->filename =  $pdfUrl;

// Save the record to the database
$pdfRecord->save();
Log::info($pdfRecord);

Mail::to('intellode@gmail.com')->send(new PDFMail($pdfUrl));

// Return the filename for further use
return $filename;

    }















    public function generatePDFView($transformedData)
{
    $email = $transformedData['data']['email'];
    $quizzes = MemberPressQuizCompletedRecord::where('email', $email)
                ->pluck('quizScore', 'quizName')
                ->mapWithKeys(function ($score, $quizName) {
                    return [$quizName => (float) rtrim($score, '%')];
                })
                ->toArray();

    $graphData = $this->prepareGraphData($quizzes);
    $base64Images = $this->generateGraphs($graphData);

    $pdf = PDF::loadView('chart', array_merge($transformedData, $base64Images))
            ->setOption(['defaultFont' => 'Helvetica']);

    $filename = $this->savePDF($pdf);
    $pdfUrl = $this->generatePDFUrl($filename);

    $this->savePDFRecord($email, $pdfUrl);
    $this->sendPDFByEmail($email, $pdfUrl);

    return $filename;
}

private function prepareGraphData($scores)
{
    $labels = array_keys($scores);
    $data = array_values($scores);
    return ['labels' => $labels, 'data' => $data];
}

private function generateGraphs($graphData)
{

// Create the graph
// Increase the size of the graph
$graph = new Graph(800, 600); // Increased width to 800
$graph->SetScale('textlin', 0, 100);
$graph->SetMargin(50, 30, 50, 50);

// Define an array of colors
$colors = ['#3182bd', '#6baed6', '#9ecae1', '#c6dbef', '#e6550d', '#fd8d3c', '#fdae6b', '#fdd0a2', '#31a354', '#74c476', '#a1d99b', '#c7e9c0'];

// Create an array of bar plots
$barPlots = [];
foreach ($data as $key => $value) {
    $barPlot = new BarPlot([$value]);

    // Use a different color for each bar plot, cycling through the colors array
    $colorIndex = $key % count($colors);
    $barPlot->SetFillColor($colors[$colorIndex]);

    $barPlot->SetLegend($labels[$key]);
    $barPlots[] = $barPlot;
}

// Add other graph settings and rendering code here...

    // Create the grouped bar plot
    $groupBarPlot = new GroupBarPlot($barPlots);

    // Display the value on the bars
    foreach ($barPlots as $barPlot) {
        $barPlot->value->Show();
        // $barPlot->value->SetFormat('%d%%');
         // Format values as percentages
    }

    // Add the grouped bar plot to the graph
    $graph->Add($groupBarPlot);

    // Configure the legend
    $graph->legend->SetPos(0.5, 0.95, 'center', 'bottom');
    $graph->legend->SetColumns(5);
    $graph->legend->SetFrameWeight(1);
    $graph->legend->SetFillColor('#FFFFFF');

    // Define a callback to format the y-axis labels as percentages
    $graph->yaxis->SetLabelFormatCallback(function($label) {
        return $label . '%';
    });

    // Apply the y-axis label format
    $graph->yaxis->SetLabelFormat('%d%%');

    // Start output buffering and capture the generated image
    ob_start();
    $graph->Stroke();
    $image_data = ob_get_clean();

    // Encode the image data to base64
    $base64Image = base64_encode($image_data);


    // piechart
    $dataPieChart = [62.7, 19.4, 10.4, 2.0, 1.9]; // Example data
    $labelsPieChart = ["High", "Elementary", "Middle", "Junior High", "K-8"]; // Example labels

    // Create the pie chart object
    $pieGraph = new PieGraph(500, 400);
    $pieGraph->SetShadow();

    // Create the pie plot with your data
    $piePlot = new PiePlot($dataPieChart);
    $piePlot->SetLegends($labelsPieChart);
    $pieGraph->Add($piePlot);

    // Specify the title of the pie chart
    $pieGraph->title->Set("K-12 School Shooting Database: School Level");

    // Display the pie chart and get the image data
    ob_start(); // Start output buffering
    $pieGraph->Stroke();
    $image_data1 = ob_get_contents(); // Get the contents of the buffer
    ob_end_clean(); // Clear the buffer

    // Encode the image data to base64
    $base64ImagePie = base64_encode($image_data1);

    // end





// piechart of school shooting types
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


// Data from the bar graph
$dataBarPlot = [166, 153, 280, 431, 272, 134, 150, 59, 321, 162, 116, 100];
$labelsBarPlot = [
    'Night', 'Lunch', 'Morning Classes', 'Dismissal', 'Afternoon Classes',
    'School Start', 'After School', 'School Event', 'Sport Event',
    'Evening', 'Not a School Day', 'Before School'
];

// Create the graph object
$graphBarPlot = new Graph(600, 700); // Adjust the size as needed
$graphBarPlot->SetScale("textlin");
$graphBarPlot->SetMargin(50, 30, 50, 50);
$graphBarPlot->xaxis->SetTickLabels($labelsBarPlot);
$graphBarPlot->xaxis->SetLabelAngle(0);
$graphBarPlot->xaxis->SetFont(FF_DEFAULT, FS_NORMAL, 8);

// Create the bar plot
$barPlot2 = new BarPlot($dataBarPlot);

// Set the fill colors
$colors = ['#63b2ee', '#76da91', '#f8cb7f', '#f89588',
           '#7cd6cf', '#9192ab', '#7898e1', '#efa666',
           '#eddd86', '#9987ce', '#65b2c1', '#bee0c2'];
$barPlot2->SetFillColor($colors);

// Show the values on top of each bar
$barPlot2->value->Show();
$barPlot2->value->SetColor("black", "darkred");
$barPlot2->value->SetFormat('%d');
$barPlot2->SetValuePos('top');

// Add the plot to the graph
$graphBarPlot->Add($barPlot2);

// Specify the title of the bar graph
$graphBarPlot->title->Set("Time Period When Shooting Occurred");
$graphBarPlot->title->SetFont(FF_DEFAULT, FS_NORMAL, 12);

// Display the bar graph and get the image data
ob_start(); // Start output buffering
$graphBarPlot->Stroke();
$image_data3 = ob_get_contents(); // Get the contents of the buffer
ob_end_clean(); // Clear the buffer

// Encode the image data to base64
$base64Image3 = base64_encode($image_data3);



// Graph showing school incidences by the shooting by school type

// Example data for incidents by school level
$dataPieChartIncidents = [10, 20, 30, 15, 25]; // Replace with your actual data
$labelsIncidents = [
    "Elementary",
    "Middle School",
    "High School",
    "College",
    "Other"
];

// Create the pie chart object
$pieGraphIncidents = new PieGraph(600, 400);
$pieGraphIncidents->SetShadow();

// Create the pie plot with your data
$piePlot = new PiePlot($dataPieChartIncidents);
$piePlot->SetLegends($labelsIncidents);
$pieGraphIncidents->Add($piePlot);

// Specify the title of the pie chart
$pieGraphIncidents->title->Set("Breakdown of Incidents by Different School Level");

// Display the pie chart and get the image data
ob_start();
$pieGraphIncidents->Stroke();
$image_dataSchoolIncident = ob_get_contents();
ob_end_clean();
// Encode the image data to base64
$base64ImageSchoolIncidence = base64_encode($image_dataSchoolIncident);



    return [
        // Dummy return structure
        'base64Image' => 'data:image/png;base64,...',
        'base64ImagePie' => 'data:image/png;base64,...',
        // Add more as needed
    ];
}

private function savePDF($pdf)
{
    $filename = 'document_' . time() . '.pdf';
    $filePath = public_path('pdf/' . $filename);
    $pdf->save($filePath);
    return $filename;
}

private function generatePDFUrl($filename)
{
    return url('pdf/' . $filename);
}

private function savePDFRecord($email, $pdfUrl)
{
    $pdfRecord = new PDFRecord();
    $pdfRecord->email = $email;
    $pdfRecord->filename = $pdfUrl;
    $pdfRecord->save();
}

private function sendPDFByEmail($email, $pdfUrl)
{
    Mail::to($email)->send(new PDFMail($pdfUrl));
}


?>
