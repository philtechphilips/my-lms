<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Question;
use App\Models\Admin\Quiz as AdminQuiz;
use App\Models\Main\Answer;
use App\Models\Main\Fq;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;
class Quiz extends Controller
{
    public function Index($id){
        $quizzes = AdminQuiz::all();
        return view('admin.main.quiz', compact('id', 'quizzes'));
    }


    public function AddQuiz(Request $request){
        $quiz = new AdminQuiz();
        $name =  $request->name;
        $c_id =  $request->c_id;
        $summary = $request->summary;

        // return $request->all();
        if($name == ''){
            return "Enter a QuizName";
        }else if ($summary == '') {
            return "Enter a Quiz Summary";
        }else{
            $quiz->name = $request->name;
            $quiz->summary = $request->summary;
            $quiz->course_id = $c_id;
            $save = $quiz->save();
            if($save){
                return "Quiz Added Sucessfully!";
            }else{
                return "Something Went Wrong!";
            }
        }


    }


    public function EditQuiz($id){
        $id = Crypt::decrypt($id);
        $quiz = AdminQuiz::find($id);
        return view('admin.main.edit-quiz', compact('id', 'quiz'));
    }


    public function UpdateQuiz(Request $request, $id){
        $id = Crypt::decrypt($id);
        $quiz = AdminQuiz::find($id);
        $name =  $request->name;
        $c_id =  $request->c_id;
        $summary = $request->summary;

        // return $request->all();
        if($name == ''){
            return "Enter a QuizName";
        }else if ($summary == '') {
            return "Enter a Quiz Summary";
        }else{
            $quiz->name = $request->name;
            $quiz->summary = $request->summary;
            $quiz->course_id = $c_id;
            $save = $quiz->update();
            if($save){
                return "Quiz Updated Sucessfully!";
            }else{
                return "Something Went Wrong!";
            }
        }


    }



    public function DeleteQuiz($id){
        $quiz = AdminQuiz::find($id);
        $delete = $quiz->delete();
    }


    public function AddQuestion($quiz_id, $course_id){
        $question = Question::where('quiz_id', '=', $quiz_id)->where('course_id', '=', $course_id)->get();
        $quest_num = Question::where('quiz_id', '=', $quiz_id)->count();
        return view('admin.main.add-question', compact('quiz_id', 'question', 'course_id', 'quest_num'));
    }


    public function CorrectAns(Request $request){
        foreach($request->values as $key => $value){
            if($value !== ""){
                echo "<option value='".$value."'>".$value."</option>";
            }
        }
    }

    public function EditQuestion($id){
        $question = Question::where('id', '=', $id)->first();
        $quest_num = Question::where('id', '=', $id)->count();
        return view('admin.main.edit-question', compact('question', 'quest_num'));
    }



    public function AddQuestionDB(Request $request){
        // return $request->all();

        $validated = $request->validate([
            'number' => 'required',
            'question' => 'required',
            'option_a' => 'required',
            'option_b' => 'required',
            'c_ans' => 'required',
            'point' => 'required',
        ]);


        $question = new Question();
        $question->quest_number = $request->number;
        $question->course_id = $request->course_id;
        $question->quiz_id = $request->quiz_id;
        $question->question = $request->question;
        $question->description = $request->description;
        $question->option_a = $request->option_a;
        $question->option_b = $request->option_b;
        $question->option_c = $request->option_c;
        $question->option_d = $request->option_d;
        $question->c_option = $request->c_ans;
        $question->point = $request->point;
        $save = $question->save();
        if($save){
            return redirect()->back()->with('success','Question Created Successfully!');
        }else{
            return redirect()->back()->with('error','Something Went Wrong!');
        }
    }


    public function DeleteQuest($id){
        $question = Question::find($id);
        $delete = $question->delete();
    }


    public function EditQuest(Request $request, $id){
        // return $request->all();

        $validated = $request->validate([
            'number' => 'required',
            'question' => 'required',
            'option_a' => 'required',
            'option_b' => 'required',
            'c_ans' => 'required',
        ]);


        $question = Question::find($id);
        $question->quest_number = $request->number;
        $question->course_id = $request->course_id;
        $question->quiz_id = $request->quiz_id;
        $question->question = $request->question;
        $question->description = $request->description;
        $question->option_a = $request->option_a;
        $question->option_b = $request->option_b;
        $question->option_c = $request->option_c;
        $question->option_d = $request->option_d;
        $question->c_option = $request->c_ans;
        $save = $question->update();
        if($save){
            return redirect()->back()->with('success','Question Updated Successfully!');
        }else{
            return redirect()->back()->with('error','Something Went Wrong!');
        }
    }


    public function QuizAttempt(){
        $quizzes = AdminQuiz::all();
        return view('admin.main.attempted-quiz', compact('quizzes'));
    }


    public function ViewQuizAttempt($id){
        $fqs = Fq::where('quiz_id', '=', Crypt::decrypt($id))->get();
        return view('admin.main.view-attempted-quiz', compact('fqs'));
    }

    public function ViewScore($id, $user_id){
        $user = User::where('id', '=', Crypt::decrypt($user_id))->first();
        $score = Answer::where('quiz_id', '=', Crypt::decrypt($id))->where('user_id', '=', Crypt::decrypt($user_id))->sum('point');
        $total_score = Question::where('quiz_id', '=', Crypt::decrypt($id))->sum('point');
        return view('admin.main.score', compact('score', 'total_score', 'user'));
    }
}
