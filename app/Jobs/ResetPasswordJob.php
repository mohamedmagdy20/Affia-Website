<?php

namespace App\Jobs;

use App\Mail\ForgetPasswordMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class ResetPasswordJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */

    protected $token;
    protected $email;
    public function __construct($token,$email)
    {
        //
        $this->token = $token;
        $this->email = $email;

    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $email = new ForgetPasswordMail($this->token,$this->email);
        Mail::to($this->email)->send($email);
    }
}
