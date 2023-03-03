<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Blog extends Mailable
{
    use Queueable, SerializesModels;
    public $blogname;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($blogname)
    {
        $this->blogname = $blogname;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mail.blog');
    }
}
