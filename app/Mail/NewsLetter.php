<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewsLetter extends Mailable
{
    use Queueable, SerializesModels;
    public $messages;
    public $subject;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($messages, $subject)
    {
        $this->messages = $messages;
        $this->subject = $subject;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(getenv('ADMIN_EMAIL'))
        ->subject($this->subject)
        ->view('mail.newsletter')
        ->with([
            'subject' => $this->subject,
            'messages' => $this->messages,
        ]);
    }
}
