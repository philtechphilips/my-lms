<?php

namespace App\Http\Controllers\MainPages;

use App\Http\Controllers\Controller;
use App\Models\Admin\About;
use App\Models\Admin\Banner;
use App\Models\Admin\Blogs;
use App\Models\Admin\Certificate;
use App\Models\Admin\CourseImage;
use App\Models\Admin\Courses;
use App\Models\Admin\Ebook;
use App\Models\Admin\Ebookimage;
use App\Models\Admin\Intro_video;
use App\Models\Admin\Lesson;
use App\Models\Admin\Mission;
use App\Models\Admin\School;
use App\Models\Admin\Vision;
use App\Models\Main\Bcomment;
use App\Models\Main\Cart;
use App\Models\Main\Comment;
use App\Models\Main\Coursereview;
use App\Models\Main\Ebookreview;
use App\Models\Main\Feedback;
use App\Models\Main\Payment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function index()
    {
        // Get Vision
        $vision = Vision::latest()->first();

        // Get Mission
        $mission = Mission::latest()->first();

        // Get Introduction Video
        $intro = Intro_video::latest()->first();

        // Get Schools
        $schools = DB::table('schools')
            ->inRandomOrder()
            ->limit(12)
            ->where('recommended', '=', 'h_recommended')
            ->get();
        // Get Banner Text
        $banner = Banner::latest()->first();

        // Get Courses
        $courses = Courses::limit(16)->inRandomOrder()->where('status', '=', 'published')->get();
        $mobile_courses = Courses::inRandomOrder()->where('status', '=', 'published')->get();
        // $courses_image = CourseImage::get();
        //Get Courses

        // Get E-Books
        $ebook = Ebook::limit(16)->inRandomOrder()->get();
        $mobile_ebook = Ebook::inRandomOrder()->get();
        $ebook_image = Ebookimage::get();
        //Get E-Books

        // Get Auth Users
        $user = User::all();
        foreach ($user as $author) {
            $n = $author->id;
        }
        // Get Auth Users
        // Get Blog Posts
        $blog = Blogs::limit(4)->inRandomOrder()->get();

        $testimonial = Feedback::limit(3)->inRandomOrder()->where('status', '=', 1)->get();
        return view('main.landingPage', compact('ebook', 'testimonial', 'mobile_ebook', 'ebook_image', 'vision', 'mission', 'intro', 'schools', 'banner', 'blog', 'courses', 'mobile_courses', 'n'));
    }

    public function learnings()
    {
        return view('main.mylearning');
    }

    public function studyPage()
    {
        return view('main.studyPage');
    }

    public function ebookInfo($slug)
    {
        $ebook = Ebook::where('id', '=', Crypt::decrypt($slug))->first();
        $what_you_learn = explode(",", $ebook->learn);
        $related_ebook = Ebook::where('author', '=', $ebook->author)->limit(3)->inRandomOrder()->get();
        $ebook_image = Ebookimage::all();
        $review = Ebookreview::where('ebook_id', '=', $ebook->id)->where('status', '=', 'Approved')->get();

        $review_count = Ebookreview::where('ebook_id', '=', $ebook->id)->where('status', '=', 'Approved')->count();

        $author_ebook = Ebook::where('author', '=', $ebook->author)->count();

        $author_course = Courses::where('author', '=', $ebook->author)->count();

        return view('main.ebookinfo', compact('ebook', 'author_ebook', 'review_count', 'author_course', 'what_you_learn', 'related_ebook', 'ebook_image', 'review'));
    }

    public function courseInfo($slug)
    {
        $course = Courses::where('id', '=', Crypt::decrypt($slug))->first();
        $enrolled_course = Cart::where('course_id', '=', $course->id)->where('user_id', '=', Auth::user()->id)->where('status', '=', 'paid')->first();
        $lessons = Lesson::where('course_id', '=', $course->id)->count();
        $enrolled_course_number = Cart::where('course_id', '=', $course->id)->where('status', '=', 'paid')->count();
        $what_you_learn = explode(",", $course->learn);
        $requirement = explode(",", $course->requirement);
        $audience = explode(",", $course->audience);
        $review = Coursereview::where('course_id', '=', $course->id)->where('status', '=', 'Approved')->get();

        $reviews_count = Coursereview::where('course_id', '=', $course->id)->where('status', '=', 'Approved')->count();

        $registered_students = Cart::where('course_id', '=', Crypt::decrypt($slug))->where('status', '=', 'paid')->where('type', '=', 'course')->count();

        $more_course = Courses::where('author', '=', $course->course->id)->get();

        $author_course = Courses::where('author', '=', $course->author)->count();

        $author_ebook = Ebook::where('author', '=', $course->author)->count();

        $lesson_count = Lesson::where('course_id', '=', $course->id)->count();

        $lesson = Lesson::where('course_id', '=', Crypt::decrypt($slug))->get();

        return view('main.courseInfo2', compact('course', 'lesson_count', 'lesson', 'more_course', 'author_course', 'author_ebook', 'registered_students', 'reviews_count', 'requirement', 'review', 'audience', 'what_you_learn', 'lessons', 'enrolled_course', 'enrolled_course_number'));
    }

    public function schools()
    {
        $schools = School::inRandomOrder()->get();
        return view('main.schools', compact('schools'));
    }

    public function schoolsCourses($id)
    {
        $id = Crypt::decrypt($id);
        $school = School::where('id', '=', $id)->first();
        $courses = Courses::where('school', '=', $school->name)->get();
        $ebooks = Ebook::where('school', '=', $school->name)->get();
        $m_all_courses = Courses::where('school', '=', $school->name)->get();
        $m_all_courses_c = Courses::where('school', '=', $school->name)->count();
        $m_all_ebooks = Ebook::where('school', '=', $school->name)->get();
        $m_all_ebooks_c = Ebook::where('school', '=', $school->name)->count();
        return view('main.school-courses', compact('courses', 'school', 'ebooks', 'm_all_courses', 'm_all_ebooks', 'm_all_ebooks_c', 'm_all_courses_c'));
    }

    public function cart()
    {

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


    public function checkout()
    {
        $cart = Cart::where('status', '=', 'pending')->where('user_id', '=', Auth::user()->id)->get();
        $cart_count =  Cart::where('status', '=', 'pending')->where('user_id', '=', Auth::user()->id)->count();
        $courses = Courses::get();
        $cart_sum = Cart::where('status', '=', 'pending')->where('user_id', '=', Auth::user()->id)->sum('course_price');
        $courses_image = CourseImage::get();
        return view('main.checkout', compact('cart', 'cart_count', 'courses', 'cart_sum', 'courses_image'));
    }

    public function courses()
    {
        $courses = Courses::inRandomOrder()->limit(20)->get();
        $all_courses = Courses::inRandomOrder()->get();
        $m_courses = Courses::inRandomOrder()->get();
        $m_all_courses = Courses::inRandomOrder()->get();
        return view('main.allCourse', compact('courses', 'm_courses', 'all_courses', 'm_all_courses'));
    }

    public function Ebooks()
    {
        $ebooks = Ebook::inRandomOrder()->limit(20)->get();
        $all_ebooks = Ebook::inRandomOrder()->get();
        $m_ebooks = Ebook::inRandomOrder()->get();
        $m_all_ebooks = Ebook::inRandomOrder()->get();
        return view('main.allE-books', compact('ebooks', 'all_ebooks', 'm_ebooks', 'm_all_ebooks'));
    }

    public function about()
    {
        // Get Who We Are
        $about = About::latest()->first();

        // Get Vision Are
        $vision = Vision::latest()->first();

        // Get Mission
        $mission = Mission::latest()->first();


        return view('main.about', compact('about', 'vision', 'mission'));
    }

    public function blogs()
    {
        // Get Blogs
        $blogs = Blogs::get();
        return view('main.blog', compact('blogs'));
    }

    public function blogSingle($slug)
    {
        $blogs = Blogs::where('id', '=', Crypt::decrypt($slug))->first();
        $recent = Blogs::limit(4)->get();
        $comment = Bcomment::where('blog_id', '=', Crypt::decrypt($slug))->get();
        return view('main.blog-single', compact('blogs', 'recent', 'comment'));
    }

    public function dashboard()
    {
        return view('studentLearning.landing');
    }

    public function profile()
    {
        return view('main.profile');
    }

    public function profile_image()
    {
        return view('studentLearning.profile-image');
    }

    public function admin()
    {
        $users = User::count();
        $new_user = User::where('user_type', '=', 'user')->limit(10)->latest()->get();
        $comment =  Comment::limit(10)->latest()->get();
        $courses = Courses::count();
        $ebooks = Ebook::count();
        $pending_cart = Cart::where('status', '=', 'pending')->count();
        $pending_ebook_review = Ebookreview::where('status', '=', 'Pending')->count();
        $recent_trans = Cart::where('status', '=', 'paid')->limit(10)->latest()->get();
        $payment = Payment::count();
        $all_income = Payment::sum('amount');
        $amount_made = Cart::select(
            DB::raw("(sum(course_price)) as price"),
            DB::raw("(DATE_FORMAT(created_at, '%d-%m-%Y')) as date")
        )
            ->orderBy('created_at')
            ->groupBy(DB::raw("DATE_FORMAT(created_at, '%d-%m-%Y')"))->limit(7)->latest()
            ->get();


        $amount_mad = Cart::select(
            DB::raw("(sum(course_price)) as price"),
            DB::raw("(DATE_FORMAT(created_at, '%d-%m-%Y')) as date")
        )
            ->orderBy('created_at')
            ->groupBy(DB::raw("DATE_FORMAT(created_at, '%d-%m-%Y')"))->limit(7)->latest()
            ->get();


        $paid_c = Cart::select(
            DB::raw("(count(course_price)) as b_courses"),
            DB::raw("(DATE_FORMAT(created_at, '%d-%m-%Y')) as date")
        )
            ->orderBy('created_at')
            ->groupBy(DB::raw("DATE_FORMAT(created_at, '%d-%m-%Y')"))->limit(7)->latest()
            ->get();

        $paid_course = Cart::select(
            DB::raw("(count(course_price)) as b_courses"),
            DB::raw("(DATE_FORMAT(created_at, '%d-%m-%Y')) as date")
        )
            ->orderBy('created_at')
            ->groupBy(DB::raw("DATE_FORMAT(created_at, '%d-%m-%Y')"))->limit(7)->latest()
            ->get();

        $new_user_graph = User::select(
            DB::raw("(count(id)) as user"),
            DB::raw("(DATE_FORMAT(created_at, '%d-%m-%Y')) as date")
        )
            ->orderBy('created_at')
            ->groupBy(DB::raw("DATE_FORMAT(created_at, '%d-%m-%Y')"))->limit(7)->latest()->where('user_type', '=', 'user')
            ->get();


        $new_user_graph_2 = User::select(
            DB::raw("(count(id)) as user"),
            DB::raw("(DATE_FORMAT(created_at, '%d-%m-%Y')) as date")
        )
            ->orderBy('created_at')
            ->groupBy(DB::raw("DATE_FORMAT(created_at, '%d-%m-%Y')"))->limit(7)->latest()->where('user_type', '=', 'user')
            ->get();


        $amount_made_per_month = Cart::select(
            DB::raw("(sum(course_price)) as price"),
            DB::raw("(DATE_FORMAT(created_at, '%M')) as month_year")
        )
            ->orderBy('created_at')
            ->groupBy(DB::raw("DATE_FORMAT(created_at, '%M')"))->where('status', '=', 'paid')
            ->get();



        $amount_made_per_month_2 = Cart::select(
            DB::raw("(sum(course_price)) as price"),
            DB::raw("(DATE_FORMAT(created_at, '%M')) as month_year")
        )
            ->orderBy('created_at')
            ->groupBy(DB::raw("DATE_FORMAT(created_at, '%M')"))->where('status', '=', 'paid')
            ->get();

            $certificate = Certificate::count();
        return view('admin.main.dashboard', compact('users', 'certificate', 'paid_course', 'all_income', 'payment', 'amount_made_per_month', 'amount_made_per_month_2', 'new_user_graph', 'new_user_graph_2', 'recent_trans', 'paid_c', 'amount_made', 'amount_mad', 'comment', 'new_user', 'courses', 'ebooks', 'pending_cart', 'pending_ebook_review'));
    }


    public function update_profile(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;

        if ($user->name == '' || $user->email == '' || $user->phone == '') {
            echo "Empty Field(s)";
        } else {
            $user->update();
            if ($user->update()) {
                echo "Profile Updated";
            } else {
                echo "Something went Wrong";
            }
        }
    }

    public function upload_image(Request $request, $id)
    {
        $user = User::find($id);

        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $file = $request->image;
        $filename = time() . "_" . $file->getClientOriginalName();

        $extension = $file->getClientOriginalExtension();

        // Upload Location
        $location = "image";

        $file->move($location, $filename);
        $filepath = url('image/' . $filename);
        $user->passport = $filename;
        $user->update();

        return redirect('/main/profile-image')->with(['message' => 'Profile Photo Updated Successfully!!', 'status' => 'success']);
    }

    public function admin_profile()
    {

        $user_id = Auth::user()->id;
        $admin_user = DB::table('users')->where('id', '=', $user_id)->get();

        return view('admin.main.profile', compact('admin_user'));
    }


    public function ContactUs(){
        return view('main.contact-us');
    }
}
