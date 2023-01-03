<?php

namespace App\Http\Controllers\MainPages;

use App\Http\Controllers\Controller;
use App\Models\Main\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Dashboard extends Controller
{
    public function MyCourses(){

        $mycourses = Cart::where('user_id', '=', Auth::user()->id)->where('status', '=', 'paid')->get();
        return view('studentLearning.my-courses', compact('mycourses'));
    }
}
