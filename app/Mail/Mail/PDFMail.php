<?php

namespace App\Mail\Mail;

use App\Models\PDFRecord;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Arr;
use MailerSend\Helpers\Builder\Personalization;
use MailerSend\Helpers\Builder\Variable;
use MailerSend\LaravelDriver\MailerSendTrait;

class PDFMail extends Mailable
{
    use Queueable, SerializesModels, MailerSendTrait;


    public $pdfUrl;

    /**
     * Create a new message instance.
     *
     * @param string $pdfUrl
     */
    public function __construct($pdfUrl)
    {
        $this->pdfUrl = $pdfUrl;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    // public function build()
    // {
    //     return $this->subject('Your PDF Document')
    //                 ->view('email.pdfMail')
    //                 ->with([
    //                     'pdfUrl' => $this->pdfUrl,
    //                 ]);
    // }


    public function build()
{
    $to = Arr::get($this->to, '0.address');

    return $this
        ->view('email.pdfMail')
        ->subject('Your PDF Document')
        ->with([
            'pdfUrl' => $this->pdfUrl,
        ])
        ->mailersend(
            template_id: null, // Use null if you're not using a predefined template
            variables: [
                new Variable($to, ['pdfUrl' => $this->pdfUrl])
            ],
            tags: ['pdf_document'],
            personalization: [
                new Personalization($to, [
                    'pdfUrl' => $this->pdfUrl,
                ])
            ],
            precedenceBulkHeader: true, // Set according to your needs
        );
}

}
