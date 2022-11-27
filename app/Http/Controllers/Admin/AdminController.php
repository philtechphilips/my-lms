<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Blogs;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function AddBlogDB(Request $request){
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

            if($save){
                return redirect('/administrator/add-blog')->with(['message' => 'Blog Post Saved Sucessfully!', 'status' => 'success']);
            }else{
                return redirect('/administrator/add-blog')->with(['message' => 'Something Went wrong!', 'status' => 'danger']);
            }


    }

}
