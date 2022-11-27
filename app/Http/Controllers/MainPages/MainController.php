<?php

namespace App\Http\Controllers\MainPages;

use App\Http\Controllers\Controller;
use App\Models\Admin\About;
use App\Models\Admin\Banner;
use App\Models\Admin\Blogs;
use App\Models\Admin\Intro_video;
use App\Models\Admin\Mission;
use App\Models\Admin\Vision;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function index(){
         // Get Vision
         $vision = Vision::first();

         // Get Mission
         $mission = Mission::first();

        // Get Introduction Video
        $intro = Intro_video::first();

        // Get Schools
        $schools = DB::table('schools')
                ->inRandomOrder()
                ->limit(12)
                ->where('recommended', '=', 'h_recommended')
                ->get();
        // Get Banner Text
        $banner = Banner::first();

        // Get Blog Posts
        $blog = Blogs::limit(4)->inRandomOrder()->get();
        return view('main.landingPage', compact('vision', 'mission', 'intro', 'schools', 'banner', 'blog'));
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
        // Get Who We Are
        $about = About::first();

        // Get Vision Are
        $vision = Vision::first();

        // Get Mission
        $mission = Mission::first();


        return view('main.about', compact('about', 'vision', 'mission'));
    }

    public function blogs(){
        // Get Blogs
        $blogs = Blogs::get();
        return view('main.blog', compact('blogs'));
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

        if($user->name =='' || $user->email =='' || $user->phone ==''){
            echo "Empty Field(s)";
        }else{
            $user->update();
            if($user->update()){
                echo "Profile Updated";
            }else{
                echo "Something went Wrong";
            }
        }
    }

    public function upload_image(Request $request, $id){
        $user = User::find($id);

        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
          ]);

         $imageName = date('YmdHis') . '.' . $request->image->extension();
         $request->image->move(public_path('image'), $imageName);
          $user->passport = $imageName;
          $user->update();
          return redirect('/administrator/profile')->with(['message' => 'Profile Photo Updated Successfully!!', 'status' => 'success']);
    }

    public function admin_profile(){

        $user_id = Auth::user()->id;
        $admin_user = DB::table('users')->where('id', '=', $user_id)->get();

        return view('admin.main.profile', compact('admin_user'));
    }



}
