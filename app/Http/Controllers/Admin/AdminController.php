<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\Blog;
use App\Mail\NewsLetter;
use App\Models\Admin\Blogs;
use App\Models\Admin\Describe;
use App\Models\Admin\School;
use App\Models\Main\Cart;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{
    // Add Blog Posts to DB
    public function AddBlogDB(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:blogs',
            'blog' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = date('YmdHis') . '.' . $request->image->extension();
        $request->image->move(public_path('blogImages'), $imageName);

        $blog = new Blogs();
        $blog->name = $request->name;
        $blog->blog = htmlspecialchars($request->blog);
        $blog->image = $imageName;
        $blog->slug = preg_replace('/[^A-Za-z0-9-]+/', '-', $request->name);

        $save = $blog->save();

        if ($save) {
            $user = User::all();

            foreach($user as $user){
                $blogname = $blog;
                Mail::to($user->email)->send(new Blog($blogname));
            }

            return redirect('/administrator/add-blog')->with(['message' => 'Blog Post Saved Sucessfully!', 'status' => 'success']);
        } else {
            return redirect('/administrator/add-blog')->with(['message' => 'Something Went wrong!', 'status' => 'danger']);
        }
    }


    //Show All Blog Posts
    public function BlogPost()
    {
        $blog = Blogs::all();
        return view('admin.main.blog_post', compact('blog'));
    }

    //Delete Blog Posts
    public function DeleteBlog($id)
    {
        $blog = Blogs::find($id);
        $delete = $blog->delete();
    }

    // Show Create Course Page
    public function CreateCourse()
    {
        $schools = School::all();
        return view('admin.main.create_course', compact('schools'));
    }

    // Show Create Course Page
    public function AboutMe()
    {
        $description = Describe::get();
        return view('admin.main.about-me', compact('description'));
    }

    public function EditAbout($id)
    {
        $description = Describe::where('id', '=', Crypt::decrypt($id))->first();
        return view('admin.main.edit_about_me', compact('description'));
    }


    public function EditAboutMe(Request $request, $id)
    {
        $describe = Describe::find($id);
        $describe->describe = htmlspecialchars($request->mission);
        $update = $describe->update();
        if ($update) {
            return "Record Updated Sucessfully!";
        }
    }


    // Add Admin description to Database
    public function AddAboutMe(Request $request)
    {
        $describe = new Describe();
        $describe->user_id = Auth::user()->id;
        $describe->describe = htmlspecialchars($request->mission);


        // Check if school exist
        $old_describe = DB::table('describes')->where('user_id', '=', $describe->user_id)->first();

        if ($request->mission == '') {
            echo "Please Describe Yourself!!!";
        } else {
            if ($old_describe != '') {
                echo "A Description Exists!!!";
            } else {
                $describe_save = $describe->save();
                if ($describe_save) {
                    echo "Description Added Sucessfully!";
                } else {
                    echo "Something Went Wrong!";
                }
            }
        }
    }
    // Add Admin description to Database

    // Delete Description from Database
    public function DeleteAboutMe($id)
    {
        $describe = Describe::find($id);
        $delete = $describe->delete();
    }
    // Delete Description from Database

    public function Cart()
    {
        $cart = Cart::all();
        $user = User::all();
        return view('admin.main.cart', compact('cart', 'user'));
    }


    public function SendMail(){
        return view('admin.main.send-mail');
    }

    public function SendMailNW(Request $request){
        $validated = $request->validate([
            'recipient' => 'required',
            'message' => 'required',
            'subject' => 'required'
        ]);

        $recipient = $request->recipient;
        $subject = $request->subject;
        $messages = htmlspecialchars($request->message);

        if($recipient == 'all'){
            $user = User::all();
            foreach($user as $user){
                Mail::to($user->email)->send(new NewsLetter($messages, $subject));
            }

        }else if($recipient == 'admin'){
            $user = User::where('user_type', '=', 'admin')->get();
            foreach($user as $user){
                Mail::to($user->email)->send(new NewsLetter($messages, $subject));
            }
        }else if($recipient == 'user'){
            $user = User::where('user_type', '=', 'user')->get();
            foreach($user as $user){
                Mail::to($user->email)->send(new NewsLetter($messages, $subject));
            }
        }else if($recipient == 'teacher'){
            $user = User::where('user_type', '=', 'teacher')->get();
            foreach($user as $user){
                Mail::to($user->email)->send(new NewsLetter($messages, $subject));
            }
        }

        return redirect()->back()->with('success', 'Mail Sent Out Successfully!');
    }

}
