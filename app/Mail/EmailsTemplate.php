<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use MailerSend\Helpers\Builder\Personalization;
use MailerSend\Helpers\Builder\Variable;
use MailerSend\LaravelDriver\MailerSendTrait;

class EmailsTemplate extends Mailable
{
    use Queueable, SerializesModels, MailerSendTrait;


    public $pdfUrl;

    public $username;

    public $email;
    /**
     * Create a new message instance.
     */
    public function __construct($username, $pdfUrl, $email)
    {
        $this->username = $username;
        $this->pdfUrl = $pdfUrl;
        $this->email = $email; // Store the recipient's email
    }


    public function build()
    {
        $variables = [
            new Variable($this->email, [
                'variable' => $this->username,
                'pdfurl' => $this->pdfUrl,

            ])
        ];


        $personalization = [
            new Personalization($this->email, [
                'pdfurl' => $this->pdfUrl,


            ])
        ];
//         Log::info($this->pdfUrl);
// Log::info($personalization);

        return $this->mailersend('v69oxl5zwjxl785k', $variables);
    }



}
