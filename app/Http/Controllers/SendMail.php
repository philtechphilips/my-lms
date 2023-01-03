<?php

namespace App\Http\Controllers;

use App\Mail\CheckOut;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SendMail extends Controller
{
    public function SendMail()
    {
        $colors = array("red", "green", "blue", "yellow");
        Mail::to('pelumiisola87@gmail.com')->send(new CheckOut($colors));
    }
}
