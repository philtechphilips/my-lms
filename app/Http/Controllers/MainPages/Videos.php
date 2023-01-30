<?php

namespace App\Http\Controllers\MainPages;

use App\Http\Controllers\Controller;
use App\Models\Admin\Courses;
use App\Models\Admin\Lesson;
use App\Models\Admin\Topic;
use App\Models\Main\Comment;
use App\Models\Main\Finish;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Videos extends Controller
{
   public function index($id){
    $course = Courses::where('id', '=', $id)->first();
    $topics = Topic::where('course_id', '=', $id)->get();
    $take_lesson = Lesson::where('course_id', '=', $id)->orderBy('id', 'asc')->first();
    return redirect('/dashboard/take-lessons'.'/'.$id.'/'.$take_lesson->id);
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
    return view('studentLearning.videopage', compact('course', 'topics', 'w_lesson', 'next', 'prev', 'next_count', 'prev_count', 'comment'));
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
}
