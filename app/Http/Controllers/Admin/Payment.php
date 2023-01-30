<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Main\Payment as MainPayment;
use Illuminate\Http\Request;

class Payment extends Controller
{
    public function Payment(){
        $payment = MainPayment::all();
        return view('admin.main.payments', compact('payment'));
    }
}
