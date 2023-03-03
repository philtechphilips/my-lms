<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AdminCart extends Mailable
{
    use Queueable, SerializesModels;

    public $cart;
    public $payment_reference;
    public $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($cart, $payment_reference, $user)
    {
        $this->cart = $cart;
        $this->payment_reference = $payment_reference;
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mail.admin-checkout-notify');
    }
}
