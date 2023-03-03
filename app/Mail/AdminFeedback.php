<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AdminFeedback extends Mailable
{
    use Queueable, SerializesModels;

    public $feedback;
    public $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($feedback, $user)
    {
        $this->feedback = $feedback;
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mail.admin-feedback');
    }
}
