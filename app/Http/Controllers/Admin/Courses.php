<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Certificate;
use App\Models\Admin\CourseImage;
use App\Models\Admin\Courses as AdminCourses;
use App\Models\Admin\Lesson;
use App\Models\Admin\Lfile;
use App\Models\Admin\Reply;
use App\Models\Admin\School;
use App\Models\Admin\Topic;
use App\Models\Main\Cart;
use App\Models\Main\Comment;
use App\Models\Main\Coursereview;
use App\Models\Main\Lvideo;
use App\Models\Main\Online;
use App\Models\Main\Video;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;

class Courses extends Controller
{
    // This function is responsible for creating a course in the database based on the data provided in the request
    public function CreateCourseDB(Request $request)
    {
        // Validate the incoming request data to ensure that it meets the required rules
        $validated = $request->validate([
            'title' => 'required|unique:courses|max:255',
            'school' => 'required',
            'learn' => 'required',
            'audience' => 'required',
            'requirement' => 'required',
            'source' => 'required',
            'hour' => 'required',
            'minute' => 'required',
            'seconds' => 'required',
            'iniPrice' => 'required',
            'realPrice' => 'required',
            'tag' => 'required',
            'material' => 'required',
            'description' => 'required',
            'cover' => 'required|mimes:png,jpg,jpeg|max:1024',
        ]);

        // Create a new instance of the AdminCourses model
        $courses = new AdminCourses;

        // Extract the necessary data from the request
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
        $source = $request->source;
        $author = Auth::user()->id;

        // Determine the URL of the video for the course
        if ($request->v_link != '') {
            $url = $request->v_link;
        } else if ($request->v_link1 != '') {
            $url = $request->v_link1;
        } else if ($request->v_link2 != '') {
            $url = $request->v_link2;
        }

        // Upload Course Cover Photo

        // Extract the cover photo from the request
        $cover = $request->cover;

        // Generate a filename for the cover photo
        $filename = time() . "_" . $cover->getClientOriginalName();

        // Extract the extension of the cover photo
        $extension = $cover->getClientOriginalExtension();

        // Determine the location to which the cover photo should be uploaded
        $location = "course";

        // Move the cover photo to the appropriate location
        $cover->move($location, $filename);

        // Determine the URL of the cover photo
        $filepath = url('course/' . $filename);

        // Create the course in the database
        if ($ini_price < $real_price) {
            // If the initial price is smaller than the real price, return an error message
            return redirect()->back()->with('error', 'Intial Price Smaller Than Real Price!');
        } else {
            // Otherwise, set the appropriate properties of the AdminCourses model and save it to the database
            $courses->title = $title;
            $courses->image = $filename;
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
            if ($save) {
                return redirect()->back()->with('success', 'Course Created Successfully!');
                // return 'Course Created Successfully!';
            } else {
                return redirect()->back()->with('error', 'Something Went Wrong!');
                // return "Something Went Wrong";
            }
        }
    }


    public function LiveClass()
    {
        // Retrieve all courses from the AdminCourses model
        $courses = AdminCourses::all();

        // Retrieve all live classes from the Online model
        $live_class = Online::all();

        // Return the schedule-live-class view and pass in the $courses and $live_class variables
        // using the compact() function
        return view('admin.main.schedule-live-class', compact('courses', 'live_class'));
    }


    public function LiveClassDB(Request $request)
    {

        // Validate the incoming request data
        $validated = $request->validate([
            'course' => 'required',
            'platform' => 'required',
            'date_time' => 'required',
            'url' => 'required',
        ]);

        // Create a new Online model instance and set its attributes
        $live_class = new Online();
        $live_class->course_id = $request->course;
        $live_class->platform = $request->platform;
        $live_class->date_time = $request->date_time;
        $live_class->url = $request->url;

        // Save the new live class to the database
        $save = $live_class->save();

        // If the save was successful, redirect back with a success message
        if ($save) {
            return redirect()->back()->with('success', 'Live Class Scheduled!');
        }
    }

    public function LiveClassDelete($id)
    {
        $live_class = Online::find($id);
        $delete = $live_class->delete();
    }

    public function EditLiveClass($id)
    {
        $live = Online::where('id', '=', Crypt::decrypt($id))->first();
        $courses = AdminCourses::all();
        return view('admin.main.edit-live-class', compact('live', 'courses'));
    }


    public function UpdateLiveClass(Request $request, $id)
    {
        $live_class = Online::find(Crypt::decrypt($id));

        $validated = $request->validate([
            'course' => 'required',
            'platform' => 'required',
            'date_time' => 'required',
            'url' => 'required',
        ]);

        $live_class->course_id = $request->course;
        $live_class->platform = $request->platform;
        $live_class->date_time = $request->date_time;
        $live_class->url = $request->url;
        $save = $live_class->update();
        if ($save) {
            return redirect()->back()->with('success', 'Live Schedule Updated!');
        }
    }


    public function UpdateCourse(Request $request, $id)
    {
        // return $request->all();

        $validated = $request->validate([
            'title' => 'required|max:255',
            'school' => 'required',
            'learn' => 'required',
            'audience' => 'required',
            'requirement' => 'required',
            'hour' => 'required',
            'minute' => 'required',
            'seconds' => 'required',
            'iniPrice' => 'required',
            'realPrice' => 'required',
            'tag' => 'required',
            'material' => 'required',
            'description' => 'required',
        ]);

        $courses =  AdminCourses::find($id);
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
        $author = Auth::user()->id;

        if ($ini_price < $real_price) {
            return redirect()->back()->with('error', 'Intial Price Smaller Than Real Price!');
        } else {
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
            $courses->author = $author;
            $courses->un_id = uniqid();
            $save = $courses->update();
            if ($save) {
                return redirect()->back()->with('success', 'Course Updated Successfully!');
                // return 'Course Created Successfully!';
            } else {
                return redirect()->back()->with('error', 'Something Went Wrong!');
                // return "Something Went Wrong";
            }
        }
    }



    public function EditCourse($id)
    {
        $course = AdminCourses::where('id', '=', $id)->first();
        $schools = School::all();
        return view('admin.main.edit-coirse', compact('course', 'schools'));
    }

    public function ViewCourse()
    {
        $courses = AdminCourses::get();
        $courses_image = CourseImage::get();

        return view('admin.main.view_course', compact('courses', 'courses_image'));
    }

    public function ViewCourseDetails($id)
    {
        $course = AdminCourses::where('id', '=', $id)->first();
        $course_image = CourseImage::where('course_id', '=', $id)->first();
        $what_you_learn = explode(",", $course->learn);
        $audience = explode(",", $course->audience);
        $requirement = explode(",", $course->requirement);
        $topics = Topic::where('course_id', '=', $id)->get();



        return view('admin.main.see-course-details', compact('course', 'course_image', 'what_you_learn', 'audience', 'requirement', 'topics'));
    }


    public function DeleteCourses($id)
    {
        $courses = AdminCourses::find($id);
        $delete = $courses->delete();
    }


    public function UploadCourseImage($slug)
    {
        $url_slug = $slug;
        return view('admin.main.upload_image', compact('url_slug'));
    }

    public function UploadCourseImageDB(Request $request, $slug)
    {
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

        if ($validator->fails()) {
            $data['success'] = 1;
            $data['message'] = $validator->errors()->first('file');
        } else {
            $file = $request->file;
            $filename = time() . "_" . $file->getClientOriginalName();

            $extension = $file->getClientOriginalExtension();

            // Upload Location
            $location = "course";

            $file->move($location, $filename);
            $filepath = url('course/' . $filename);
            $data['success'] = 1;
            $data['message'] = "Course Image Uploaded Successfully!";
            // Saving Data
            $image_upload->course_image = $filename;
            $image_upload->course_id = $course_id;
            $save = $image_upload->save();


            if ($save) {
                $data['success'] = 1;
                $data['message'] = "Image Uploaded Successfully!";
            } else {
                $data['success'] = 1;
                $data['message'] = "Something Went Wrong";
            }
            return response()->json($data);
        }
    }


    public function Cart()
    {
        $cart = Cart::all();
        return view('admin.main.cart', compact('cart'));
    }


    public function Topic($slug, $un_id, $id)
    {
        $topics = Topic::where('course_id', '=', $id)->get();
        return view('admin.main.add_topic', compact('id', 'un_id', 'topics'));
    }


    public function EditTopic($id, $c_id)
    {
        $topic = Topic::where('id', '=', $id)->first();
        $topics = Topic::where('course_id', '=', $c_id)->get();

        return view('admin.main.edit-topic', compact('topics', 'c_id', 'id', 'topic'));
    }


    public function AddTopic(Request $request)
    {
        $topic = new Topic();
        $name =  $request->name;
        $c_id =  $request->c_id;
        $un_id =  $request->un_id;
        $summary = $request->summary;

        // return $request->all();
        if ($name == '') {
            return "Enter a Topic Name";
        } else if ($summary == '') {
            return "Enter a Topic Summary";
        } else {
            $topic->name = $request->name;
            $topic->summary = $request->summary;
            $topic->course_id = $c_id;
            $topic->course_uid = $un_id;
            $save = $topic->save();
            if ($save) {
                return "Topic Added Sucessfully!";
            } else {
                return "Something Went Wrong!";
            }
        }
    }

    public function UpdateTopic(Request $request, $id)
    {
        $topic = Topic::find($id);
        $name =  $request->name;
        $c_id =  $request->c_id;
        $summary = $request->summary;

        // return $request->all();
        if ($name == '') {
            return "Enter a Topic Name";
        } else if ($summary == '') {
            return "Enter a Topic Summary";
        } else {
            $topic->name = $request->name;
            $topic->summary = $request->summary;
            $topic->course_id = $c_id;
            $save = $topic->update();
            if ($save) {
                return "Topic Updated Sucessfully!";
            } else {
                return "Something Went Wrong!";
            }
        }
    }


    public function DeleteTopic($id)
    {
        $topic = Topic::find($id);
        $delete = $topic->delete();
    }

    public function Lesson($t_id, $c_id)
    {
        $lessons = Lesson::where('topic_id', '=', $t_id)->where('course_id', '=', $c_id)->get();
        $course = AdminCourses::where('id', '=', $c_id)->first();
        $topic = Topic::where('id', '=', $t_id)->first();
        return view('admin.main.add_lesson', compact('t_id', 'c_id', 'lessons', 'course', 'topic'));
    }

    public function EditLesson($id)
    {
        $lesson = Lesson::where('id', '=', $id)->first();
        return view('admin.main.edit-lesson', compact('lesson', 'id'));
    }


    public function UpdateLesson(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'description' => 'required|string',
        ]);


        if ($validator->fails()) {

            //pass validator errors as errors object for ajax response

            return response()->json(['errors' => $validator->errors()]);
        } else {
            $lesson = Lesson::find($id);
            $lesson->name = $request->name;
            $lesson->content = htmlspecialchars($request->description);
            $save = $lesson->update();
            if ($save) {
                return "Success";
            } else {
                return "Error";
            }
        }
    }

    public function AddLesson(Request $request, $t_id, $c_id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'source' => 'required|string',
            'url' => 'required|string',
            'description' => 'required|string',
            'hour' => 'required',
            'minute' => 'required',
            'seconds' => 'required',
        ]);


        if ($validator->fails()) {

            //pass validator errors as errors object for ajax response

            return response()->json(['errors' => $validator->errors()]);
        } else {
            $lesson = new Lesson();
            $lesson->name = $request->name;
            $lesson->source = $request->source;
            $lesson->url = $request->url;
            $duration = $request->hour . ':' . $request->minute . ':' . $request->seconds;
            $lesson->duration = $duration;
            $lesson->content = htmlspecialchars($request->description);
            $lesson->topic_id = $t_id;
            $lesson->course_id = $c_id;
            $save = $lesson->save();
            if ($save) {
                return "Success";
            } else {
                return "Error";
            }
        }
    }

    public function ViewLesson($l_id)
    {
        $lessons = Lesson::where('id', '=', $l_id)->first();
        return view('admin.main.view_lessons', compact('lessons'));
    }

    public function DeleteLesson($id)
    {
        $lesson = Lesson::find($id);
        $delete = $lesson->delete();
    }


    public function Comment()
    {
        $comment = Comment::all();
        return view('admin.main.comment', compact('comment'));
    }


    public function ReplyComment($id, $lesson_id)
    {
        $comment = Comment::find($id);
        return view('admin.main.reply-comment', compact('comment', 'lesson_id'));
    }


    public function ReplyCommentDB(Request $request)
    {
        $validated = $request->validate([
            'reply' => 'required|string',
            'comment_id' => 'required',
            'lesson_id' => 'required'
        ]);

        $reply = new Reply();
        $reply->user_id = Auth::user()->id;
        $reply->course_id = $request->comment_id;
        $reply->lesson_id = $request->lesson_id;
        $reply->comment = $request->reply;
        $save = $reply->save();

        if ($save) {
            return redirect()->back()->with('success', 'Reply Posted');
        } else {

            return redirect()->back()->with('error', 'Something Went Wrong!');
        }
    }


    public function DeleteComment($id)
    {
        $comment = Comment::find($id);
        $delete = $comment->delete();
    }


    public function CourseReviews()
    {
        $course_review = Coursereview::all();
        return view('admin.main.course-review', compact('course_review'));
    }

    public function DeleteCourseReview($id)
    {
        $course_review = Coursereview::find($id);
        $delete = $course_review->delete();
    }

    public function UpdateCourseReview($id)
    {
        $course_review = Coursereview::find($id);
        $course_review->status = "Approved";
        $update = $course_review->update();
    }


    public function Certificate()
    {
        $courses = AdminCourses::all();
        return view('admin.main.select-schools', compact('courses'));
    }


    public function SelectUser($course_id)
    {
        $user = Cart::where('course_id', '=', Crypt::decrypt($course_id))->get();
        return view('admin.main.select-user', compact('user'));
    }


    public function UploadCertificate($course_id, $user_id)
    {
        $course_id = Crypt::decrypt($course_id);
        $user_id = Crypt::decrypt($user_id);
        return view('admin.main.upload-certificate', compact('user_id', 'course_id'));
    }



    public function CertificateDB(Request $request, $user_id, $course_id)
    {
        if ($request->file('images')) {
            foreach ($request->file('images') as $cover) {
                // Generate a filename for the cover photo
                $filename = time() . "_" . $cover->getClientOriginalName();

                // Determine the location to which the cover photo should be uploaded
                $location = "certificate";

                // Move the cover photo to the appropriate location
                $cover->move($location, $filename);

                // Determine the URL of the cover photo
                $filepath = url('certificate/' . $filename);

                $certificate = new Certificate();
                $certificate->user_id = Crypt::decrypt($user_id);
                $certificate->course_id = Crypt::decrypt($course_id);
                $certificate->certificate = $filename;
                $save = $certificate->save();

                if ($save) {
                    return response()->json(['success' => true, 'message' => 'Certificate uploaded successfully']);
                } else {
                    return response()->json(['success' => false, 'message' => 'Certificate upload failed']);
                }
            }
        }
    }


    public function CertificateDBInput(Request $request, $user_id, $course_id)
    {
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . "_" . $file->getClientOriginalName();

            // Determine the location to which the cover photo should be uploaded
            $location = "certificate";

            // Move the cover photo to the appropriate location
            $file->move($location, $filename);

            // Determine the URL of the cover photo
            $filepath = url('certificate/' . $filename);

            $certificate = new Certificate();
            $certificate->user_id = Crypt::decrypt($user_id);
            $certificate->course_id = Crypt::decrypt($course_id);
            $certificate->certificate = $filename;
            $save = $certificate->save();

            if ($save) {
                return response()->json(['success' => true, 'message' => 'Certificate uploaded successfully']);
            } else {
                return response()->json(['success' => false, 'message' => 'Certificate upload failed']);
            }
        }
    }


    public function VidoeUpload($id)
    {
        return view('admin.main.upload-video', compact('id'));
    }


    public function UpdateVidoeUpload(Request $request, $id)
    {

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . "_" . $file->getClientOriginalName();

            // Determine the location to which the cover photo should be uploaded
            $location = "video";

            // Move the cover photo to the appropriate location
            $file->move($location, $filename);

            // Determine the URL of the cover photo
            $filepath = url('video/' . $filename);

            $video = new Video();
            $video->course_id = Crypt::decrypt($id);
            $video->video = $filename;
            $save = $video->save();

            if ($save) {
                return response()->json(['success' => true, 'message' => 'Certificate uploaded successfully']);
            } else {
                return response()->json(['success' => false, 'message' => 'Certificate upload failed']);
            }
        }
    }


    public function VidoeUploadDB(Request $request, $id)
    {
        if ($request->file('images')) {
            foreach ($request->file('images') as $cover) {
                // Generate a filename for the cover photo
                $filename = time() . "_" . $cover->getClientOriginalName();

                // Determine the location to which the cover photo should be uploaded
                $location = "video";

                // Move the cover photo to the appropriate location
                $cover->move($location, $filename);

                // Determine the URL of the cover photo
                $filepath = url('video/' . $filename);

                $video = new Video();
                $video->course_id = Crypt::decrypt($id);
                $video->video = $filename;
                $save = $video->save();

                if ($save) {
                    return response()->json(['success' => true, 'message' => 'Video uploaded successfully']);
                } else {
                    return response()->json(['success' => false, 'message' => 'Video upload failed']);
                }
            }
        }
    }



    public function PublishCourse(Request $request, $id)
    {
        $course = AdminCourses::find($id);
        if ($course->status == "published") {
            $course->status = "unpublished";
        } else {
            $course->status = "published";
        }
        $update = $course->update();
    }



    public function LessonVideo($id)
    {
        $id = Crypt::decrypt($id);
        return view('admin.main.upload-lesson-videos', compact('id'));
    }



    public function LessonVideoUpload(Request $request, $id)
    {

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . "_" . $file->getClientOriginalName();

            // Determine the location to which the cover photo should be uploaded
            $location = "lesson_video";

            // Move the cover photo to the appropriate location
            $file->move($location, $filename);

            // Determine the URL of the cover photo
            $filepath = url('lesson_video/' . $filename);

            $video = new Lvideo();
            $video->lesson_id = Crypt::decrypt($id);
            $video->video = $filename;
            $save = $video->save();

            if ($save) {
                return response()->json(['success' => true, 'message' => 'Video uploaded successfully']);
            } else {
                return response()->json(['success' => false, 'message' => 'Video upload failed']);
            }
        }
    }





    public function LessonVideoDB(Request $request, $id)
    {
        if ($request->file('images')) {
            foreach ($request->file('images') as $cover) {
                // Generate a filename for the cover photo
                $filename = time() . "_" . $cover->getClientOriginalName();

                // Determine the location to which the cover photo should be uploaded
                $location = "lesson_video";

                // Move the cover photo to the appropriate location
                $cover->move($location, $filename);

                // Determine the URL of the cover photo
                $filepath = url('lesson_video/' . $filename);

                $video = new Lvideo();
                $video->lesson_id = Crypt::decrypt($id);
                $video->video = $filename;
                $save = $video->save();

                if ($save) {
                    return response()->json(['success' => true, 'message' => 'Video uploaded successfully']);
                } else {
                    return response()->json(['success' => false, 'message' => 'Video upload failed']);
                }
            }
        }
    }


    public function LessonFile($id)
    {
        $id = Crypt::decrypt($id);
        return view('admin.main.lesson-files', compact('id'));
    }

    public function LessonFileDB(Request $request, $id)
    {
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . "_" . $file->getClientOriginalName();

            // Determine the location to which the cover photo should be uploaded
            $location = "lesson_files";

            // Move the cover photo to the appropriate location
            $file->move($location, $filename);

            // Determine the URL of the cover photo
            $filepath = url('llesson_files/' . $filename);

            $video = new Lfile();
            $video->lesson_id = Crypt::decrypt($id);
            $video->file = $filename;
            $save = $video->save();

            if ($save) {
                return response()->json(['success' => true, 'message' => 'Lesson File uploaded successfully']);
            } else {
                return response()->json(['success' => false, 'message' => 'Lesson File upload failed']);
            }
        }
    }


    public function LessonFileUpload(Request $request, $id)
    {
        if ($request->file('images')) {
            foreach ($request->file('images') as $cover) {
                // Generate a filename for the cover photo
                $filename = time() . "_" . $cover->getClientOriginalName();

                // Determine the location to which the cover photo should be uploaded
                $location = "lesson_files";

                // Move the cover photo to the appropriate location
                $cover->move($location, $filename);

                // Determine the URL of the cover photo
                $filepath = url('lesson_files/' . $filename);

                $video = new Lfile();
                $video->lesson_id = Crypt::decrypt($id);
                $video->file = $filename;
                $save = $video->save();

                if ($save) {
                    return response()->json(['success' => true, 'message' => 'Video uploaded successfully']);
                } else {
                    return response()->json(['success' => false, 'message' => 'Video upload failed']);
                }
            }
        }
    }

}
