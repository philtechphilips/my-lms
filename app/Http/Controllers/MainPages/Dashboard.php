<?php

namespace App\Http\Controllers\MainPages;

use App\Http\Controllers\Controller;
use App\Models\Admin\Certificate;
use App\Models\Admin\Ebook;
use App\Models\Admin\Ebookfile;
use App\Models\Admin\Ebookimage;
use App\Models\Admin\Lesson;
use App\Models\Admin\Question;
use App\Models\Main\Answer;
use App\Models\Main\Cart;
use App\Models\Main\Coursereview;
use App\Models\Main\Ebookreview;
use App\Models\Main\Feedback;
use App\Models\Main\Fq;
use App\Models\Main\Online;
use App\Models\Main\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class Dashboard extends Controller
{
    public function MyCourses(){

        $mycourses = Cart::where('user_id', '=', Auth::user()->id)->where('status', '=', 'paid')->where('type', '=', 'course')->get();
        // dd($mycourses);
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
        $fq = Fq::where('user_id', '=', Auth::user()->id)->get();
        $fq_c = Fq::where('user_id', '=', Auth::user()->id)->count();
        $score = Answer::where('user_id', '=', Auth::user()->id)->get();
        return view('studentLearning.assessment', compact('fq', 'fq_c', 'score'));
    }

    public function ReadEbook($id){
        $ebooks = Cart::where('user_id', '=', Auth::user()->id)->where('type', '=', 'ebook')->where('status', '=', 'paid')->where('id', '=', $id)->first();
        // $ebooks_file = Ebookfile::all();
        $ebooks_count = Cart::where('user_id', '=', Auth::user()->id)->where('type', '=', 'ebook')->where('status', '=', 'paid')->count();
        return view('studentLearning.read-ebook', compact('ebooks', 'ebooks_count'));
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


    public function CourseReview(Request $request){
        if($request->course == '' || $request->title == '' ||  $request->content == ''){
           return "Empty Fields";
        }else{
           $review = new Coursereview();
           $review->title = $request->title;
           $review->content = $request->content;
           $review->course_id = $request->course;
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


     public function QuizPage($course_id, $quiz_id, $quest_id){

        $question = Question::where('course_id', '=', Crypt::decrypt($course_id))->where('quiz_id', '=', Crypt::decrypt($quiz_id))->where('id', '=', Crypt::decrypt($quest_id))->first();
        $question_count = Question::where('course_id', '=', Crypt::decrypt($course_id))->where('quiz_id', '=', Crypt::decrypt($quiz_id))->count();

        $next = Question::where('course_id', '=', Crypt::decrypt($course_id))->where('id', '>', $question->id)->where('quiz_id', '=', Crypt::decrypt($quiz_id))->orderBy('id')->first();

        $answer_count = Answer::where('course_id', '=', Crypt::decrypt($course_id))->where('quiz_id', '=', Crypt::decrypt($quiz_id))->where('user_id', '=', Auth::user()->id)->count();
        return view('studentLearning.assessments', compact('question', 'question_count', 'next', 'answer_count'));
    }


    public function AddQuiz(Request $request){
        $answer = new Answer();
        $answer->user_id = Auth::user()->id;
        $answer->course_id = Crypt::decrypt($request->course_id);
        $answer->quiz_id = Crypt::decrypt($request->quiz_id);
        $answer->answer = $request->ans;
        $answer->quest_id = Crypt::decrypt($request->quest_id);
        $answer->correct_answer = $request->c_ans;
        if($request->ans == $request->c_ans){
            $answer->point = 5;
        }else{
            $answer->point = 0;
        }
        $save = $answer->save();
        if($save){
            return "Answer Submitted!";
        }else{
            return "Error";
        }
    }



    public function FinishQuiz(Request $request){
        $answer = new Fq();
        $answer->user_id = Auth::user()->id;
        $answer->course_id = Crypt::decrypt($request->course_id);
        $answer->quiz_id = Crypt::decrypt($request->quiz_id);
        $save = $answer->save();
        if($save){
            return "Quiz Submitted!";
        }else{
            return "Error";
        }
    }


    public function ViewScore($id){
        $answers = Answer::where('quiz_id', '=', Crypt::decrypt($id))->where('user_id', '=', Auth::user()->id)->get();
        $score = Answer::where('quiz_id', '=', Crypt::decrypt($id))->where('user_id', '=', Auth::user()->id)->sum('point');
        $total_score = Question::where('quiz_id', '=', Crypt::decrypt($id))->sum('point');
        return view('studentLearning.view-score', compact('answers', 'score', 'total_score'));
    }


    public function FeedBack(Request $request)
    {
       return view('studentLearning.feedback');
    }

    public function FeedBackDB(Request $request)
    {
        $request->validate([
            'feedback' => 'required',
          ]);

          $feedback = new Feedback();
          $feedback->user_id = Auth::user()->id;
          $feedback->feedback = $request->feedback;

          $save = $feedback->save();

          if($save){
            return redirect()->back()->with('success','FeedBack Submitted!');
        }
    }


    public function LiveClass($id){
        $live = Online::where('course_id', '=', Crypt::decrypt($id))->get();
        return view('studentLearning.live-class', compact('live'));
    }


    public function Certificate(){
        $certificate = Certificate::where('user_id', '=', Auth::user()->id)->get();
        return view('studentLearning.certificate', compact('certificate'));
    }

}
