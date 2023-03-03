<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CheckOut extends Mailable
{
    use Queueable, SerializesModels;

    public $cart;
    public $payment_reference;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($cart, $payment_reference)
    {
        $this->cart = $cart;
        $this->payment_reference = $payment_reference;
    }


    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.checkoutMail');
    }
}
