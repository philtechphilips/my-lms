<?php

namespace App\Http\Controllers\MainPages;

use App\Http\Controllers\Controller;
use App\Mail\ContactForm as MailContactForm;
use App\Models\Admin\Blogs;
use App\Models\Admin\Courses;
use App\Models\Admin\Ebook;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactForm extends Controller
{
    public function Contact(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required',
            'message' => 'required',
        ]);

        $name = $request->input('name');
        $email = $request->input('email');
        $subject = $request->input('subject');
        $messages = $request->input('message');

        $admin = User::where('user_type', '=', 'admin')->get();

        foreach($admin as $admin){
            Mail::to($admin->email)->send(new MailContactForm($name, $email, $messages, $subject));
        }

        return redirect()->back()->with('success', 'Your message has been sent!');

    }


    public function Search(Request $request){
        $validatedData = $request->validate([
            'search' => 'required',
        ]);

        $search = strtolower($request->input('search'));

        $courses = Courses::where('title', 'LIKE', '%' . $search . '%')->get();

        $m_courses = Courses::where('title', 'LIKE', '%' . $search . '%')->get();

        $ebooks = Ebook::where('title', 'LIKE', '%' . $search . '%')->get();

        $m_ebooks = Ebook::where('title', 'LIKE', '%' . $search . '%')->get();

        $blogs = Blogs::where('name', 'LIKE', '%' . $search . '%')->get();

        return view('main.searchpage', compact('courses', 'm_courses', 'ebooks', 'm_ebooks', 'blogs'));

    }
}
