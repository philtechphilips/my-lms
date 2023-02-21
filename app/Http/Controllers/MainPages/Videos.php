<?php

namespace App\Http\Controllers\MainPages;

use App\Http\Controllers\Admin\Quiz;
use App\Http\Controllers\Controller;
use App\Models\Admin\Courses;
use App\Models\Admin\Lesson;
use App\Models\Admin\Question;
use App\Models\Admin\Quiz as AdminQuiz;
use App\Models\Admin\Reply;
use App\Models\Admin\Topic;
use App\Models\Main\Bcomment;
use App\Models\Main\Comment;
use App\Models\Main\Complete;
use App\Models\Main\Finish;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Videos extends Controller
{
   public function index($id){
    $course = Courses::where('id', '=', $id)->first();
    $topics = Topic::where('course_id', '=', $id)->get();
    $take_lesson = Lesson::where('course_id', '=', $id)->orderBy('id', 'asc')->first();
    if($take_lesson != ''){
        return redirect('/dashboard/take-lessons'.'/'.$id.'/'.$take_lesson->id);
    }else{
        return redirect()->back()->with('error', 'No Lesson Created For Course Yet');
    }

   }


   public function watch($course_id, $lesson_id){
    $course = Courses::where('id', '=', $course_id)->first();
    $topics = Topic::where('course_id', '=', $course_id)->get();
    $w_lesson = Lesson::where('id', '=', $lesson_id)->where('course_id', '=', $course_id)->first();
    $next = Lesson::where('id', '>', $lesson_id)->where('course_id', '=', $course_id)->orderBy('id')->first();
    $prev = Lesson::where('id', '<', $lesson_id)->where('course_id', '=', $course_id)->orderBy('id','desc')->first();
    $next_count = Lesson::where('id', '>', $lesson_id)->where('course_id', '=', $course_id)->orderBy('id')->count();
    $prev_count = Lesson::where('id', '<', $lesson_id)->where('course_id', '=', $course_id)->orderBy('id','desc')->count();
    $comment = Comment::where('course_id', '=', $course_id)->where('lesson_id', '=', $lesson_id)->get();

    $all_lessons_count = Lesson::where('course_id', '=', $course_id)->count();

    $finished_lessons_count = Complete::where('course_id', '=', $course_id)->where('user_id', '=', Auth::user()->id)->count();
    $finished_lessons = Complete::where('course_id', '=', $course_id)->where('user_id', '=', Auth::user()->id)->get();

    $reply = Reply::where('lesson_id', '=', $lesson_id)->get();


    $quiz = AdminQuiz::where('course_id', '=', $course_id)->first();
    if($quiz != ''){
        $question = Question::where('course_id', '=', $course_id)->where('quiz_id', '=', $quiz->id)->first();
        return view('studentLearning.videopage', compact('course', 'quiz', 'reply', 'question', 'all_lessons_count', 'finished_lessons_count', 'finished_lessons', 'topics', 'w_lesson', 'next', 'prev', 'next_count', 'prev_count', 'comment'));
    }else{
        return view('studentLearning.videopage', compact('course', 'quiz', 'reply', 'all_lessons_count', 'finished_lessons_count', 'finished_lessons', 'topics', 'w_lesson', 'next', 'prev', 'next_count', 'prev_count', 'comment'));
    }


   }

   public function Comment(Request $request){
    $request->validate([
        'course_id' => 'required',
        'lesson_id' => 'required',
        'comment' => 'required',
      ]);


      $comment = new Comment();
      $comment->course_id = $request->course_id;
      $comment->lesson_id = $request->lesson_id;
      $comment->user_id = Auth::user()->id;
      $comment->comment = $request->comment;
      $save = $comment->save();
      if($save){
        return redirect()->back()->with('success','Comment Submitted Successfully!');
      }else{
        return redirect()->back()->with('error','Something Went Wrong!');
     }
   }


   public function BlogComment(Request $request){
    $request->validate([
        'blog_id' => 'required',
        'comment' => 'required',
      ]);


      $comment = new Bcomment();
      $comment->blog_id = $request->blog_id;
      $comment->user_id = Auth::user()->id;
      $comment->comment = $request->comment;
      $save = $comment->save();
      if($save){
        return redirect()->back()->with('success','Comment Submitted Successfully!');
      }else{
        return redirect()->back()->with('error','Something Went Wrong!');
     }
   }


   public function FinishCourse(Request $request){
    $request->validate([
        'course_id' => 'required',
        'lesson_id' => 'required',
        'topic_id' => 'required',
      ]);

       //Check if lesson has been previously completed
       $check = Complete::where('user_id', '=', Auth::user()->id)->where('course_id', '=', $request->course_id)->where('topic_id', '=', $request->topic_id)->where('lesson_id', '=', $request->lesson_id)->first();

       if($check !=''){
            return "Lesson Finished Successfully!";
       }else{
        $complete_course = new Complete();
        $complete_course->course_id = $request->course_id;
        $complete_course->lesson_id = $request->lesson_id;
        $complete_course->user_id = Auth::user()->id;
        $complete_course->topic_id = $request->topic_id;
        $save = $complete_course->save();
        if($save){
          return "Lesson Finished Successfully!";
        }else{
          return "Something Went Wrong!";
       }
       }


   }
}
