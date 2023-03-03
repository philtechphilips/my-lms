<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewEbook extends Mailable
{
    use Queueable, SerializesModels;
    public $title;
    public $user;
    public $description;
    public $id;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($title, $user, $description, $id)
    {
        $this->title = $title;
        $this->user = $user;
        $this->description = $description;
        $this->id = $id;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mail.new-ebook');
    }
}
