<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\About;
use App\Models\Admin\Banner;
use App\Models\Admin\Intro_video;
use App\Models\Admin\Mission;
use App\Models\Admin\School;
use App\Models\Admin\Vision;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class MainFunctions extends Controller
{
    public function allAdmins(){
        $all_admin = DB::table('users')->where('user_type', '=', 'admin')->get();
        return view('admin.main.admin_user', compact('all_admin'));
    }

    public function allUsers(){
        $all_user = DB::table('users')->where('user_type', '=', 'user')->get();
        return view('admin.main.users', compact('all_user'));
    }

    public function addAdmin(){
        return view('admin.main.add_admin');
    }


    public function addAdminDatabase(Request $request){
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = Hash::make($request->password);
        if($request->password === $request->password_confirmation){
            $user->save();
            if($user->save()){
                return redirect('/administrator/add-admin')->with(['message' => 'Admin Added Sucessfully!!!', 'status' => 'success']);
            }else{
                return redirect('/administrator/add-admin')->with(['message' => 'Something Went Wrong!!!', 'status' => 'danger']);
            }
        }else{
            return redirect('/administrator/add-admin')->with(['message' => 'Password and Confirm Password Must Be Same', 'status' => 'danger']);
        }
    }

    // Show School Page
    public function schools(){
        $all_schools = DB::table('schools')->get();
        return view('admin.main.schools', compact('all_schools'));
    }
    // Show School Page


     // Show Add School Page
     public function addSchools(){

        return view('admin.main.add_schools');
    }
    // Show Add School Page

    // Add School to Database
    public function addSchoolDb(Request $request){
        $school = new School();
        $school->name = $request->name;
        $school->recommended = $request->priority;

        // Check if school exist
        $old_schools = DB::table('schools')->where('name', '=', $school->name)->first();

        if($request->name == ''){
            echo "Enter a School Name";
        }else{
            if($old_schools != ''){
                echo "The School Exists Enter a New School!";
            }else{
                $sch_save = $school->save();
                if($sch_save){
                    echo "School Added Sucessfully!";
                }else{
                    echo "Something Went Wrong!";
                }
            }
        }
    }
    // Add School to Database

    // Delete School from Database
    public function deleSchoolDb($id)
    {
        $school = School::find($id);
        $delete = $school->delete();
    }
    // Delete School from Database

    //Show Vision Page
    public function vision(){
        // $all_schools = DB::table('schools')->get();
        $visions = Vision::all();
        return view('admin.main.vision', compact('visions'));
    }
    // Show Vision Page


      // Add Vision to Database
      public function addVision(Request $request){
        $vision= new Vision();
        $vision->vision = htmlspecialchars($request->vision);


        // Check if school exist
        $old_vision = DB::table('visions')->where('vision', '=', htmlspecialchars($request->vision))->first();

        if($request->vision == ''){
            echo "Enter a Vision!!";
        }else{
            if($old_vision != ''){
                echo "The Vision Exists Enter a New Vision!";
            }else{
                $vision_save = $vision->save();
                if($vision_save){
                    echo "Vision Added Sucessfully!";
                }else{
                    echo "Something Went Wrong!";
                }
            }
        }
    }
    // Add Vision to Database


    // Delete Vision
    public function deleteVision($id){
        $vision = Vision::find($id);
        $delete = $vision->delete();
    }
    // Delete Vision


     //Show Vision Page
     public function mission(){
        $missions = Mission::all();
        return view('admin.main.mission', compact('missions'));
    }
    // Show Vision Page


    // Add Mission to Database
    public function addMission(Request $request){
        $mission= new Mission();
        $mission->mission = htmlspecialchars($request->mission);


        // Check if school exist
        $old_mission = DB::table('missions')->where('mission', '=', htmlspecialchars($request->mission))->first();

        if($request->mission == ''){
            echo "Enter a Mission!!";
        }else{
            if($old_mission != ''){
                echo "The Mission Exists Enter a New Mission!";
            }else{
                $mission_save = $mission->save();
                if($mission_save){
                    echo "Mission Added Sucessfully!";
                }else{
                    echo "Something Went Wrong!";
                }
            }
        }
    }
    // Add Mision to Database

    // Delete Mission to Database
    public function deleteMission($id){
        $mission = Mission::find($id);
        $delete = $mission->delete();
    }
    // Delete Mision to Database

     //Show About Us
     public function whoWeAre(){
        $about = About::all();
        return view('admin.main.who_we_are', compact('about'));
    }
    // Show About Us


    // Add Vision to Database
      public function addwhoWeAre(Request $request){
        $mission= new About();
        $mission->about = htmlspecialchars($request->mission);


        // Check if school exist
        $old_mission = DB::table('abouts')->where('about', '=', htmlspecialchars($request->mission))->first();

        if($request->mission == ''){
            echo "Fill in TextField!!";
        }else{
            if($old_mission != ''){
                echo "The About Us Exists!";
            }else{
                $mission_save = $mission->save();
                if($mission_save){
                    echo "About Added Sucessfully!";
                }else{
                    echo "Something Went Wrong!";
                }
            }
        }
    }
    // Add Mision to Database

     // Delete Mission to Database
     public function deleteAbout($id){
        $about = About::find($id);
        $delete = $about->delete();
    }
    // Delete Mision to Database

    // Show Add Intro Video Page
    public function IntroVideo(){
        $intro_video = Intro_video::first();
        return view('admin.main.add_intro_video', compact('intro_video'));
    }
    // Show Add Intro Video Page

    // Add Intro Video To Database
    public function AddIntroVideo(Request $request)
    {
        $introVideo = new Intro_video();
        $url = $request->url;
        $source = $request->source;
       if($url =='' || $source ==''){
            echo "Empty Fields!";
       }else{
            $introVideo->url = $url;
            $introVideo->source = $source;
            $introSave = $introVideo->save();
            if($introSave){
                echo "Intro Video added Sucessfully!";
            }else{
                echo "Something Went Wrong!";
            }
       }
    }
    // Add Intro Video To Database


       // Delete Intro Video To Database
       public function dIntro($id)
       {
          $intro = Intro_video::find($id);
          $intro->delete();
       }
       // Delete Intro Video To Database

         // Get Banner Page
         public function Banner()
         {
            $banner = Banner::all();
            return view('admin.main.banner', compact('banner'));
         }
         // Get Banner Page

        // Get Banner Page
        public function AddBanner(Request $request)
        {
            $banner= new Banner();
            $banner->banner = htmlspecialchars($request->banner);


            // Check if school exist
            $old_banner = DB::table('banners')->where('banner', '=', htmlspecialchars($request->banner))->first();

            if($request->banner == ''){
                echo "Enter a Banner Text!!!";
            }else{
                if($old_banner != ''){
                    echo "The Banner Text Exists Enter a New Banner Text!";
                }else{
                    $banner_save = $banner->save();
                    if($banner_save){
                        echo "Banner Text Added Sucessfully!";
                    }else{
                        echo "Something Went Wrong!";
                    }
                }
            }
        }
        // Get Banner Page

        // Delete Banner Text From Database
       public function DeleteBanner($id)
       {
          $banner = Banner::find($id);
          $banner->delete();
       }
       // Delete Banner Text From Database


        // Show Blog Page
        public function AddBlog()
        {
          return view('admin.main.add_blog');
        }
        // Show Blog Page

}
