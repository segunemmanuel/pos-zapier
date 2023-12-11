<?php

namespace App\Http\Controllers;
use Amenadiel\JpGraph\Graph\Graph;
use Amenadiel\JpGraph\Plot\BarPlot;
use Amenadiel\JpGraph\Plot\Plot;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
class ChartController extends Controller
{
    //

    public function index()
    {
    // You can pass your data to the view from here
    // For example, let's say you have some data for a chart:
    $chartData = json_encode([100, 75, 50, 25, 0]);

    return view('chart', compact('chartData'));
    }



    public function show()
    {
        $data = [30, 50, 80, 60, 70];  // Sample data

        $graph = new Graph(800, 600);
        $graph->SetScale('textlin');
        $graph->SetMargin(50, 30, 50, 50);

        $plot = new BarPlot($data);
        $plot->SetFillColor('#3182bd');
        $plot->SetWidth(0.5);

        $graph->Add($plot);

        $graph->Stroke();

        ob_start();
$graph->Stroke();
$image_data = ob_get_contents();
ob_end_clean();

return new Response($image_data, 200, [    'Content-Type' => 'image/png',]);

    }



}
