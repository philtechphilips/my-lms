<?php

namespace App\Http\Controllers;

use App\Models\Main\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $cart_count = Cart::where('status', '=', 'pending')->where('user_id', '=', Auth::user()->id)->count();
        $enrolled = Cart::where('status', '=', 'paid')->where('user_id', '=', Auth::user()->id)->count();
        return view('studentLearning.landing', compact('cart_count', 'enrolled'));
    }
}
