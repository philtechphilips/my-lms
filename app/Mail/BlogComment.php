<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BlogComment extends Mailable
{
    use Queueable, SerializesModels;
    public $user;
    public $comment;
    public $blog;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $comment, $blog)
    {
        $this->user = $user;
        $this->comment = $comment;
        $this->blog = $blog;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->user->email)
        ->subject("Blogpost Comment")
        ->view('mail.blog-comment')
        ->with([
            'user' => $this->user,
            'comment' => $this->comment,
            'blog' => $this->blog,
        ]);
    }
}
