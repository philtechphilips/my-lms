<?php

namespace App\Http\Controllers\MainPages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(){
        return view('main.landingPage');
    }

    public function learnings(){
        return view('main.mylearning');
    }

    public function studyPage(){
        return view('main.studyPage');
    }

    public function ebookInfo(){
        return view('main.ebookinfo');
    }

    public function courseInfo(){
        return view('main.courseInfo2');
    }

    public function schools(){
        return view('main.schools');
    }


    public function cart(){
        return view('main.cart');
    }


    public function checkout(){
        return view('main.checkout');
    }

    public function courses(){
        return view('main.allCourse');
    }

    public function Ebooks(){
        return view('main.allE-books');
    }

    public function about(){
        return view('main.about');
    }

    public function blogs(){
        return view('main.blog');
    }

    public function dashboard(){
        return view('studentLearning.landing');
    }


}
