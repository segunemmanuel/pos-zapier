<?php

namespace App\Mail\Mail;

use App\Models\PDFRecord;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class PDFMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $filename;

    public function __construct($filename)
    {
        $this->filename = $filename;
    }

    public function build()
    {
        $pdfRecord = PDFRecord::where('filename', $this->filename)->first();

        if (!$pdfRecord) {
            return $this->view('email.pdfmail')
                ->with([
                    'pdfRecord' => null,
                ]);
        }

        $pdfPath = public_path($pdfRecord->filename);

        if (!file_exists($pdfPath)) {
            return $this->view('emails.pdfmail')
                ->with([
                    'pdfRecord' => null,
                ]);
        }

        $downloadUrl = route('download-pdf', ['filename' => $pdfRecord->filename]);

        return $this->subject('Download Your PDF')
            ->attach($pdfPath, [
                'as' => 'document.pdf',
            ])
            ->view('email.pdfmail')
            ->with([
                'downloadUrl' => $downloadUrl,
            ]);
    }
}
