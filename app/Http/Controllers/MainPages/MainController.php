<?php

namespace App\Http\Controllers\MainPages;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function profile(){
        return view('main.profile');
    }

    public function profile_image(){
        return view('studentLearning.profile-image');
    }

    public function admin(){
        return view('admin.main.index');
    }


    public function update_profile(Request $request, $id){
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->update();

        if($user->update()){
            echo "Profile Updated";
        }else{
            echo "Something went Wrong";
        }
    }


}
