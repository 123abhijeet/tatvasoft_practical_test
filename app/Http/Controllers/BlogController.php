<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Blog;
use Auth;
use File;

class BlogController extends Controller
{
    public function index()
    {
        $blog = Blog::all();
        return view('index',compact('blog'));
    }
    public function dashboard()
    {
        $blog = Blog::where('user_id',Auth::id())->get();
        return view('listblog',compact('blog'));
    }
    public function addblog()
    {
        return view('addblog');
    }
    public function storeblog(Request $request)
    {
        $this->validate($request,[
            'blog_title' => 'required|max:255',
            'blog_tag' => 'required',
            'blog_description' => 'required',
            'blog_image' => 'required|file',
        ]);
        Blog::create([
            'user_id' => Auth::id(),
            'blog_title' => $request->blog_title,
            'blog_tag' => $request->blog_tag,
            'blog_description' => $request->blog_description,
            'blog_image' => $request->blog_image->store('Blog_Images','public'),
        ]);
        return redirect()->route('dashboard')->with("success",'Blog Added Successfully!');;
    }
    public function updateblog($id)
    {
        $blog = Blog::find($id);
        return view('editblog',compact('blog'));
    }
    public function storeupdatedblog(Request $request,$id)
    {
        $data =  Blog::find($id);
        $pic = $data->blog_image;
        if($request->blog_image)
        {
            if(File::exists("storage/".$pic)){
                File::delete("storage/".$pic);
            }
        $this->validate($request,[
            'blog_title' => 'required|max:255',
            'blog_tag' => 'required',
            'blog_description' => 'required',
            'blog_image' => 'required|file',
        ]);
        Blog::where('id',$id)->update([
            'blog_title' => $request->blog_title,
            'blog_tag' => $request->blog_tag,
            'blog_description' => $request->blog_description,
            'blog_image' => $request->blog_image->store('Blog_Images','public'),
        ]);
        return redirect()->route('dashboard')->with("success",'Blog Updated Successfully!');
    }else{
        $this->validate($request,[
            'blog_title' => 'required|max:255',
            'blog_tag' => 'required',
            'blog_description' => 'required',
        ]);
        Blog::where('id',$id)->update([
            'blog_title' => $request->blog_title,
            'blog_tag' => $request->blog_tag,
            'blog_description' => $request->blog_description,
        ]);
        return redirect()->route('dashboard')->with("success",'Blog Updated Successfully!');
    }
    }
    public function deleteblog($id)
    {
        $data = Blog::where('id','=',$id)->first();
        $pic = $data->blog_image;
            if(File::exists("storage/".$pic)){
                File::delete("storage/".$pic);
            }
        $data->delete();
        return redirect()->route('dashboard')->with("success",'Blog Delete Successfully!');
    }
}