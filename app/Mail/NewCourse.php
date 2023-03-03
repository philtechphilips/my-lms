<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewCourse extends Mailable
{
    use Queueable, SerializesModels;
    public $title;
    public $school;
    public $user;
    public $description;
    public $real_price;
    public $id;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($title, $school, $user, $description, $real_price, $id)
    {
        $this->user = $user;
        $this->title = $title;
        $this->school = $school;
        $this->description = $description;
        $this->id = $id;
        $this->real_price = $real_price;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mail.new-course');
    }
}
