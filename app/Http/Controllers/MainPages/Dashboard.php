<?php

namespace App\Http\Controllers\MainPages;

use App\Http\Controllers\Controller;
use App\Models\Admin\Ebook;
use App\Models\Admin\Ebookfile;
use App\Models\Admin\Ebookimage;
use App\Models\Admin\Lesson;
use App\Models\Main\Cart;
use App\Models\Main\Ebookreview;
use App\Models\Main\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Dashboard extends Controller
{
    public function MyCourses(){

        $mycourses = Cart::where('user_id', '=', Auth::user()->id)->where('status', '=', 'paid')->where('type', '=', 'course')->get();
        $course_count = Cart::where('user_id', '=', Auth::user()->id)->where('status', '=', 'paid')->where('type', '=', 'course')->count();
        foreach ($mycourses as $c) {
            $lessons = Lesson::where('course_id', '=', $c->course_id)->latest()->get();
        }
        return view('studentLearning.my-courses', compact('mycourses', 'course_count', 'lessons'));
    }

    public function Ebooks(){

        $ebooks = Cart::where('user_id', '=', Auth::user()->id)->where('type', '=', 'ebook')->where('status', '=', 'paid')->get();
        $ebooks_image = Ebookimage::all();
        $ebooks_file = Ebookfile::all();
        $ebooks_count = Cart::where('user_id', '=', Auth::user()->id)->where('type', '=', 'ebook')->where('status', '=', 'paid')->count();
        return view('studentLearning.my-ebooks', compact('ebooks', 'ebooks_count', 'ebooks_image', 'ebooks_file'));
    }

    public function Assessments(){
        return view('studentLearning.assessments');
    }

    public function ReadEbook($id){
        $ebooks = Cart::where('user_id', '=', Auth::user()->id)->where('type', '=', 'ebook')->where('status', '=', 'paid')->where('id', '=', $id)->first();
        $ebooks_file = Ebookfile::all();
        $ebooks_count = Cart::where('user_id', '=', Auth::user()->id)->where('type', '=', 'ebook')->where('status', '=', 'paid')->count();
        return view('studentLearning.read-ebook', compact('ebooks', 'ebooks_count', 'ebooks_file'));
    }


    public function EbookDetails($id){
        $ebook = Ebook::where('id', '=', $id)->first();
        $cart = Cart::where('course_id', '=', $id)->where('user_id', '=', Auth::user()->id)->first();
        return view('studentLearning.ebook-details', compact('ebook', 'cart'));
    }

    public function EbookReview(Request $request){
         if($request->ebook == '' || $request->title == '' ||  $request->content == ''){
            return "Empty Fields";
         }else{
            $review = new Ebookreview();
            $review->title = $request->title;
            $review->content = $request->content;
            $review->ebook_id = $request->ebook;
            $review->user_id = Auth::user()->id;
            $save = $review->save();
            if($save){
                return "Review Submitted Awaiting Approval!";
            }else{
                return "Something Went Wrong!";
            }
         }
    }

    public function Payments(){
        $payments_count = Payment::where('user_id', '=', Auth::user()->id)->count();
        $payments = Payment::where('user_id', '=', Auth::user()->id)->get();
        return view('studentLearning.payments', compact('payments', 'payments_count'));
    }

}
