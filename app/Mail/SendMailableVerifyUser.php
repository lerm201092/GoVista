<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendMailableVerifyUser extends Mailable
{
    use Queueable, SerializesModels;
    public $tokenReset;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($tokenReset)
    {
        $this->tokenReset = $tokenReset;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
		return $this->view('mailverifyuser')->subject('Activación Cuenta (GoVista)');
    }
}