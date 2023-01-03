<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\CourseImage;
use App\Models\Admin\Courses as AdminCourses;
use App\Models\Admin\Lesson;
use App\Models\Admin\Topic;
use App\Models\Main\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class Courses extends Controller
{
    public function CreateCourseDB(Request $request){
        $courses = new AdminCourses;
        $title = $request->title;
        $school = $request->school;
        $tag = $request->tag;
        $description = $request->description;
        $hour = $request->hour;
        $minute = $request->minute;
        $seconds = $request->seconds;
        $audience = $request->audience;
        $requirement = $request->requirement;
        $learn = $request->learn;
        $school = $request->school;
        $material = $request->material;
        $ini_price = $request->iniPrice;
        $real_price = $request->realPrice;
        $url = $request->url;
        $source = $request->source;
        $author = Auth::user()->id;

        if($title =='' || $school =='' || $tag =='' || $description =='' || $hour =='' || $minute =='' || $seconds =='' || $audience =='' || $requirement =='' || $learn =='' || $school =='' || $material =='' || $url =='' || $ini_price =='' || $real_price =='' || $source =='' || $author ==''){
            echo "Empty Field(s) Fill All Fields";
        }else{
            $courses->title = $title;
            $courses->slug = strtolower(preg_replace('/[^A-Za-z0-9-]+/', '-', $request->title));
            $courses->school = $school;
            $courses->tag = $tag;
            $courses->description = htmlspecialchars($description);
            $courses->hour = $hour;
            $courses->minute = $minute;
            $courses->seconds = $seconds;
            $courses->audience = $audience;
            $courses->requirement = $requirement;
            $courses->learn = $learn;
            $courses->school = $school;
            $courses->material = $material;
            $courses->ini_price = $ini_price;
            $courses->real_price = $real_price;
            $courses->url = $url;
            $courses->source = $source;
            $courses->author = $author;
            $courses->un_id = uniqid();
            $save = $courses->save();
            if($save){
                echo 'Course Created Successfully!';
            }else{
                echo "Something Went Wrong";
            }
        }
    }


    public function ViewCourse(){
        $courses = AdminCourses::get();
        $courses_image = CourseImage::get();

        return view('admin.main.view_course', compact('courses', 'courses_image'));
    }


    public function DeleteCourses($id){
        $courses = AdminCourses::find($id);
        $delete = $courses->delete();
    }


    public function UploadCourseImage($slug){
        $url_slug = $slug;
        return view('admin.main.upload_image', compact('url_slug'));
    }

    public function UploadCourseImageDB(Request $request, $slug){
        // Fet course Using Slug
        $slug_fetch = AdminCourses::find($slug);
        // Fetch Course ID
        $course = AdminCourses::where('slug', "=", $slug)->first();
        $course_id = $course->id;
        // creating New Course Image
        $image_upload = new CourseImage;
        $data = array();
        // Checking if Image exist
        $f_course_image = CourseImage::where('id', "=", $course_id)->first();

        $validator = Validator::make($request->all(), [
            'file' => 'required|mimes:png,jpg,jpeg,csv,pdf,txt'
        ]);

        if($validator->fails()){
            $data['success'] = 1;
            $data['message'] = $validator->errors()->first('file');
        }else{
                $file = $request->file;
                $filename = time()."_".$file->getClientOriginalName();

                $extension = $file->getClientOriginalExtension();

                // Upload Location
                $location = "course";

                $file->move($location,$filename);
                $filepath = url('course/'.$filename);
                $data['success'] = 1;
                $data['message'] = "Course Image Uploaded Successfully!";
                // Saving Data
                $image_upload->course_image = $filename;
                $image_upload->course_id = $course_id;
                $save = $image_upload->save();


                if($save){
                    $data['success'] = 1;
                    $data['message'] = "Image Uploaded Successfully!";
                }else{
                    $data['success'] = 1;
                    $data['message'] = "Something Went Wrong";
                }
                return response()->json($data);
        }
    }


    public function Cart(){
        $cart = Cart::all();
        return view('admin.main.cart', compact('cart'));
    }


    public function Topic( $slug, $un_id, $id){
        $topics = Topic::where('course_id', '=', $id)->where('course_uid', '=', $un_id)->get();
        return view('admin.main.add_topic', compact('id', 'un_id', 'topics'));
    }

    public function AddTopic(Request $request){
        $topic = new Topic();
        $name =  $request->name;
        $c_id =  $request->c_id;
        $un_id =  $request->un_id;
        $summary = $request->summary;

        // return $request->all();
        if($name == ''){
            return "Enter a Topic Name";
        }else if ($summary == '') {
            return "Enter a Topic Summary";
        }else{
            $topic->name = $request->name;
            $topic->summary = $request->summary;
            $topic->course_id = $c_id;
            $topic->course_uid = $un_id;
            $save = $topic->save();
            if($save){
                return "Topic Added Sucessfully!";
            }else{
                return "Something Went Wrong!";
            }
        }


    }

    public function DeleteTopic($id){
        $topic = Topic::find($id);
        $delete = $topic->delete();
    }

    public function Lesson($t_id, $c_id){
        $lessons = Lesson::where('topic_id', '=', $t_id)->where('course_id', '=', $c_id)->get();
        $course = AdminCourses::where('id', '=', $c_id)->first();
        $topic = Topic::where('id', '=', $t_id)->first();
        return view('admin.main.add_lesson', compact('t_id', 'c_id', 'lessons', 'course', 'topic'));
    }

    public function AddLesson(Request $request, $t_id, $c_id){
        $validator = Validator::make($request->all(), [
            'name'=> 'required|string',
            'source'=> 'required|string',
            'url'=> 'required|string',
            'description'=> 'required|string',
            'hour'=> 'required',
            'minute'=> 'required',
            'seconds'=> 'required',
        ]);


        if ($validator->fails()) {

            //pass validator errors as errors object for ajax response

            return response()->json(['errors'=>$validator->errors()]);
        }else{
            $lesson = new Lesson();
            $lesson->name = $request->name ;
            $lesson->source = $request->source;
            $lesson->url = $request->url;
            $duration = $request->hour .':'. $request->minute .':'. $request->seconds;
            $lesson->duration = $duration;
            $lesson->content = htmlspecialchars($request->description);
            $lesson->topic_id = $t_id;
            $lesson->course_id = $c_id;
            $save = $lesson->save();
            if($save){
                return "Success";
            }else{
                return "Error";
            }
        }

    }

    public function ViewLesson($l_id){
        $lessons = Lesson::where('id', '=', $l_id)->first();
        return view('admin.main.view_lessons', compact('lessons'));
    }

    public function DeleteLesson($id){
        $lesson = Lesson::find($id);
        $delete = $lesson->delete();
    }

}
