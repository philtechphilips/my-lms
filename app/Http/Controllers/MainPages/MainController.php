<?php

namespace App\Http\Controllers\MainPages;

use App\Http\Controllers\Controller;
use App\Models\Admin\About;
use App\Models\Admin\Banner;
use App\Models\Admin\Blogs;
use App\Models\Admin\CourseImage;
use App\Models\Admin\Courses;
use App\Models\Admin\Ebook;
use App\Models\Admin\Ebookimage;
use App\Models\Admin\Intro_video;
use App\Models\Admin\Mission;
use App\Models\Admin\School;
use App\Models\Admin\Vision;
use App\Models\Main\Cart;
use App\Models\Main\Ebookreview;
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

        // Get Courses
        $courses = Courses::limit(16)->inRandomOrder()->get();
        $mobile_courses = Courses::inRandomOrder()->get();
        $courses_image = CourseImage::get();
        //Get Courses

        // Get E-Books
        $ebook = Ebook::limit(16)->inRandomOrder()->get();
        $mobile_ebook = Ebook::inRandomOrder()->get();
        $ebook_image = Ebookimage::get();
        //Get E-Books

        // Get Auth Users
        $user = User::all();
        foreach ($user as $author){
            $n = $author->id;
        }
        // Get Auth Users
        // Get Blog Posts
        $blog = Blogs::limit(4)->inRandomOrder()->get();
        return view('main.landingPage', compact('ebook', 'mobile_ebook', 'ebook_image', 'vision', 'mission', 'intro', 'schools', 'banner', 'blog', 'courses', 'courses_image','mobile_courses', 'n'));
    }

    public function learnings(){
        return view('main.mylearning');
    }

    public function studyPage(){
        return view('main.studyPage');
    }

    public function ebookInfo($slug){
        $ebook = Ebook::where('slug', '=', $slug)->first();
        $what_you_learn = explode(",", $ebook->learn);
        $related_ebook = Ebook::where('author', '=', $ebook->author)->limit(3)->inRandomOrder()->get();
        $ebook_image = Ebookimage::all();
        $review = Ebookreview::where('ebook_id', '=', $ebook->id)->get();
        return view('main.ebookinfo', compact('ebook', 'what_you_learn', 'related_ebook', 'ebook_image', 'review'));
    }

    public function courseInfo($slug){
        $course = Courses::where('slug', '=', $slug)->first();
        $what_you_learn = explode(",", $course->learn);
        return view('main.courseInfo2', compact('course', 'what_you_learn'));
    }

    public function schools(){
        $schools = School::inRandomOrder()->get();
        return view('main.schools', compact('schools'));
    }

    public function schoolsCourses($id){
        $school = School::where('id', '=', $id)->first();
        $courses = Courses::where('school', '=', $school->name)->get();
        $ebooks = Ebook::where('school', '=', $school->name)->get();
        $m_all_courses = Courses::where('school', '=', $school->name)->get();
        $m_all_courses_c = Courses::where('school', '=', $school->name)->count();
        $m_all_ebooks = Ebook::where('school', '=', $school->name)->get();
        $m_all_ebooks_c = Ebook::where('school', '=', $school->name)->count();
        return view('main.school-courses', compact('courses', 'school', 'ebooks', 'm_all_courses', 'm_all_ebooks', 'm_all_ebooks_c', 'm_all_courses_c'));
    }

    public function cart(){

        // Queries for Courses In Cart
        $cart = Cart::where('status', '=', 'pending')->where('user_id', '=', Auth::user()->id)->where("type", "=", 'course')->get();
        $cart_count = Cart::where('status', '=', 'pending')->where('user_id', '=', Auth::user()->id)->where("type", "=", "course")->count();
        $courses = Courses::get();
        $cart_sum = Cart::where('status', '=', 'pending')->where('user_id', '=', Auth::user()->id)->sum('course_price');
        $cart_ini_sum = Cart::where('status', '=', 'pending')->where('user_id', '=', Auth::user()->id)->sum('ini_price');
        $courses_image = CourseImage::get();
        // Queries for Courses In Cart

        // Queries for E-Books In Cart
        $cart_ebook = Cart::where('status', '=', 'pending')->where('user_id', '=', Auth::user()->id)->where("type", "=", 'ebook')->get();
        $cart_ebook_count = Cart::where('status', '=', 'pending')->where('user_id', '=', Auth::user()->id)->where("type", "=", "ebook")->count();
        $ebooks = Ebook::all();
        $e_image = Ebookimage::all();
        // Queries for Courses In Cart
        return view('main.cart', compact('cart', 'e_image', 'ebooks', 'cart_count', 'courses', 'cart_sum', 'courses_image', 'cart_ini_sum', 'cart_ebook', 'cart_ebook_count'));
    }


    public function checkout(){
        $cart = Cart::where('status', '=', 'pending')->where('user_id', '=', Auth::user()->id)->get();
        $cart_count =  Cart::where('status', '=', 'pending')->where('user_id', '=', Auth::user()->id)->count();
        $courses = Courses::get();
        $cart_sum = Cart::where('status', '=', 'pending')->where('user_id', '=', Auth::user()->id)->sum('course_price');
        $courses_image = CourseImage::get();
        return view('main.checkout', compact('cart', 'cart_count', 'courses', 'cart_sum', 'courses_image'));
    }

    public function courses(){
        $courses = Courses::inRandomOrder()->limit(20)->get();
        $all_courses = Courses::inRandomOrder()->get();
        $m_courses = Courses::inRandomOrder()->get();
        $m_all_courses = Courses::inRandomOrder()->get();
        return view('main.allCourse', compact('courses', 'm_courses', 'all_courses', 'm_all_courses'));
    }

    public function Ebooks(){
        $ebooks = Ebook::inRandomOrder()->limit(20)->get();
        $all_ebooks = Ebook::inRandomOrder()->get();
        $m_ebooks = Ebook::inRandomOrder()->get();
        $m_all_ebooks = Ebook::inRandomOrder()->get();
        return view('main.allE-books', compact('ebooks', 'all_ebooks', 'm_ebooks', 'm_all_ebooks'));
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

    public function blogSingle($slug){
        // Get Blogs
        $blogs = Blogs::get();
        return view('main.blog-single', compact('blogs'));
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
        $users = User::count();
        $courses = Courses::count();
        $ebooks = Ebook::count();
        $pending_cart = Cart::where('status', '=', 'pending')->count();
        $pending_ebook_review = Ebookreview::where('status', '=', 'Pending')->count();
        return view('admin.main.dashboard', compact('users', 'courses', 'ebooks', 'pending_cart', 'pending_ebook_review'));
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
