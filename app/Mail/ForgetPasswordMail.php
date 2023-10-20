<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ForgetPasswordMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public $token;
    public $email;
    public function __construct($token,$email)
    {
        //
        $this->token = $token;
        $this->email = $email;

    }


    public function build()
    {
        return $this->markdown('emails.resetpassword')->with(['token',$this->token,'email'=>$this->email]);
    }
   
}
