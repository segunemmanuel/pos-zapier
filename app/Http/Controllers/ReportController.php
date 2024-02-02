<?php
namespace App\Http\Controllers;
use App\Mail\ExampleEmail;
use App\Models\PDFRecord;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ReportController extends Controller
{
    public function index()
    {
        $data = PDFRecord::all();
        return view('admin.table', ['data' => $data]);

    }



    public function delete(Request $request,$id)
    {
        $pdfRecord = PDFRecord::findOrFail($id);
        $pdfRecord->delete();
        return redirect()->back();
    }




    public function emailTesting()
    {


Mail::to('intellode@gmail.com')
    ->cc('segunemmanuel46@gmail.com')
    ->bcc('robert@protectingourstudents.org')
    ->send(new ExampleEmail());
    }
}
