<?php

namespace App\Mail;

use App\Contact;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class mailme extends Mailable
{
    use Queueable, SerializesModels;


    public $contacto;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Contact $contact)
    {
        $this->contacto = $contact;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $address = 'soporte@govistalab.com';
        $name = 'Contactenos Govista';
        $subject = 'Registro Contactenos - '.$this->contacto->name;
        return $this->view('mailme')
            ->from($address, $name)
            ->subject($subject);
    }
}
