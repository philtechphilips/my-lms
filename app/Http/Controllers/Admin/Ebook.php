<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Ebook as AdminEbook;
use App\Models\Admin\Ebookfile;
use App\Models\Admin\Ebookimage;
use App\Models\Admin\School;
use App\Models\Main\Ebookreview;
use App\Models\Main\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class Ebook extends Controller
{
    public function Ebook(){
        $schools = School::all();
        return view('admin.main.create-ebook', compact('schools'));
    }


    public function EditEbook($id){
        $schools = School::all();
        $ebook = AdminEbook::where('id', '=', $id)->first();
        return view('admin.main.edit-ebook', compact('schools', 'ebook'));
    }


    public function UpdateEbook(Request $request, $id){
        $validated = $request->validate([
            'title' => 'required|max:255',
            'school' => 'required',
            'learn' => 'required',
            'iniPrice' => 'required',
            'realPrice' => 'required',
            'pages' => 'required',
            'av_read_time' => 'required',
            'tag' => 'required',
            'author' => 'required',
            'description' => 'required',
        ]);

        $ebook = AdminEbook::find($id);
        $title = $request->title;
        $school = $request->school;
        $tag = $request->tag;
        $description = $request->description;
        $pages = $request->pages;
        $av_read_time = $request->av_read_time;
        $learn = $request->learn;
        $ini_price = $request->iniPrice;
        $real_price = $request->realPrice;
        $author = Auth::user()->id;

        if($ini_price < $real_price){
            return redirect()->back()->with('error','Intial Price Smaller Than Real Price!');
        }else{
            $ebook->title = $title;
            $ebook->slug = strtolower(preg_replace('/[^A-Za-z0-9-]+/', '-', $request->title));
            $ebook->school = $school;
            $ebook->tag = $tag;
            $ebook->description = htmlspecialchars($description);
            $ebook->pages = $pages;
            $ebook->learn = $learn;
            $ebook->av_read_time = $av_read_time;
            $ebook->school = $school;
            $ebook->ini_price = $ini_price;
            $ebook->real_price = $real_price;
            $ebook->author = $author;

            $save = $ebook->save();
            if($save){
                return redirect()->back()->with('success','E-Book Updated Successfully!');
            }else{
                return redirect()->back()->with('error','Something Went Wrong!');
            }
        }
    }

    public function AddEbook(Request $request){
        $validated = $request->validate([
            'title' => 'required|unique:ebooks|max:255',
            'school' => 'required',
            'learn' => 'required',
            'iniPrice' => 'required',
            'realPrice' => 'required',
            'pages' => 'required',
            'av_read_time' => 'required',
            'tag' => 'required',
            'author' => 'required',
            'description' => 'required',
            'cover' => 'required|mimes:png,jpg,jpeg|max:1024',
            'file' => 'required|mimes:pdf,txt,doc,docx',
        ]);


        // Upload E-Book Cover

                $cover = $request->cover;
                $filename = time()."_".$cover->getClientOriginalName();

                $extension = $cover->getClientOriginalExtension();

                // Upload Location
                $location = "ebook";

                $cover->move($location,$filename);
                 $filepath = url('ebook/'.$filename);

        // Upload E-Book Cover

        // Upload E-Book Cover

            $ebook_file = $request->file;
            $f_filename = time()."_".$ebook_file->getClientOriginalName();

            $extension = $ebook_file->getClientOriginalExtension();

            // Upload Location
            $n_location = "ebook";

            $ebook_file->move($n_location,$f_filename);
            $filepath = url('ebook/'.$f_filename);

    // Upload E-Book Cover

        $ebook = new AdminEbook();
        $title = $request->title;
        $school = $request->school;
        $tag = $request->tag;
        $description = $request->description;
        $pages = $request->pages;
        $av_read_time = $request->av_read_time;
        $learn = $request->learn;
        $ini_price = $request->iniPrice;
        $real_price = $request->realPrice;
        $author = Auth::user()->id;

        if($ini_price < $real_price){
            return redirect()->back()->with('error','Intial Price Smaller Than Real Price!');
        }else{
            $ebook->title = $title;
            $ebook->slug = strtolower(preg_replace('/[^A-Za-z0-9-]+/', '-', $request->title));
            $ebook->school = $school;
            $ebook->tag = $tag;
            $ebook->description = htmlspecialchars($description);
            $ebook->pages = $pages;
            $ebook->learn = $learn;
            $ebook->av_read_time = $av_read_time;
            $ebook->school = $school;
            $ebook->ini_price = $ini_price;
            $ebook->real_price = $real_price;
            $ebook->author = $author;
            $ebook->image = $filename;
            $ebook->file = $f_filename;

            $save = $ebook->save();
            if($save){
                return redirect()->back()->with('success','E-Book Upload is Successfull!');
            }else{
                return redirect()->back()->with('error','Something Went Wrong!');
            }
        }
    }


    public function ViewEbook(){
        $ebooks = AdminEbook::all();
        return view('admin.main.view-ebook', compact('ebooks'));
    }

    public function DeleteEbook($id){
        $ebook = AdminEbook::find($id);
        $delete = $ebook->delete();
    }

    public function ViewEbookUp($id){
        return view('admin.main.upload_ebook_image', compact('id'));
    }

    public function UploadEbook($id){
        return view('admin.main.upload_ebook_image', compact('id'));
    }

    public function UploadEbookImageDB(Request $request, $id){

        // Fetch E-Book ID
        $ebook_id = $id;
        // creating New Course Image
        $image_upload = new Ebookimage();
        $data = array();

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
                $data['message'] = "E-Book Image Uploaded Successfully!";
                // Saving Data
                $image_upload->ebook_image = $filename;
                $image_upload->ebook_id = $id;
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

    public function EbookFile($id){
        return view('admin.main.upload-ebook-file', compact('id'));
    }

    public function UploadEbookFile(Request $request, $id){

        // Fetch E-Book ID
        $ebook_id = $id;
        // creating New Course Image
        $image_upload = new Ebookfile();
        $data = array();

        $validator = Validator::make($request->all(), [
            'file' => 'required|mimes:pdf,txt,doc,docx'
        ]);

        if($validator->fails()){
            $data['success'] = 1;
            $data['message'] = $validator->errors()->first('file');
        }else{
                $file = $request->file;
                $filename = time()."_".$file->getClientOriginalName();

                $extension = $file->getClientOriginalExtension();

                // Upload Location
                $location = "ebook";

                $file->move($location,$filename);
                $filepath = url('ebook/'.$filename);
                $data['success'] = 1;
                $data['message'] = "E-Book File Uploaded Successfully!";
                // Saving Data
                $image_upload->ebook_files = $filename;
                $image_upload->ebook_id = $id;
                $save = $image_upload->save();


                if($save){
                    $data['success'] = 1;
                    $data['message'] = "E-Book Uploaded Successfully!";
                }else{
                    $data['success'] = 1;
                    $data['message'] = "Something Went Wrong";
                }
                return response()->json($data);
        }
    }


    public function ViewEbookDetails(Request $request, $id){
        $ebook = AdminEbook::where('id', '=', $id)->first();
        $ebook_image = Ebookimage::where('ebook_id', '=', $id)->first();
        return view('admin.main.view-ebook-details', compact('ebook', 'ebook_image'));
    }


    public function EbookReviews()
    {
        $ebook_review = Ebookreview::all();
        return view('admin.main.ebook-review', compact('ebook_review'));
    }


    public function DeleteEbookReview($id)
    {
        $ebook_review = Ebookreview::find($id);
        $delete = $ebook_review->delete();
    }


    public function UpdateEbookReview($id)
    {
        $ebook_review = Ebookreview::find($id);
        $ebook_review->status = "Approved";
        $update = $ebook_review->update();
    }


    public function FeedBacks()
    {
        $feedback = Feedback::all();
        return view('admin.main.feedback', compact('feedback'));
    }


    public function DeleteFeedback($id)
    {
        $feedback = Feedback::find($id);
        $delete = $feedback->delete();
    }


    public function UpdateFeedback($id)
    {
        $feedback = Feedback::find($id);
        $feedback->status = "1";
        $update = $feedback->update();
    }
}
