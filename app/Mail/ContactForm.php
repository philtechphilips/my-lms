<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactForm extends Mailable
{
    use Queueable, SerializesModels;
    public $name;
    public $email;
    public $subject;
    public $messages;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $email, $messages, $subject)
    {
        $this->name = $name;
        $this->email = $email;
        $this->subject = $subject;
        $this->messages = $messages;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->email)
        ->subject($this->subject)
        ->view('mail.contact')
        ->with([
            'name' => $this->name,
            'email' => $this->email,
            'message' => $this->messages,
        ]);
    }
}
