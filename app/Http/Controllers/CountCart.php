<?php

namespace App\Http\Controllers;

use App\Models\Main\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CountCart extends Controller
{
    public function count(){
        $count = Cart::where('user_id', '=', Auth::user()->id)->where('status', '=', 'pending')->count();
        return $count;
    }
}
