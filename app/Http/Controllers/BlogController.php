<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Home\Blog;

class BlogController extends Controller
{
    public function search(Request $request){
        $keyword=$request->input('keyword');
        if(session()->exists("userId")){
            $userid=session()->get("userId");
            if($keyword){
                $blogs=Blog::orderBy("create_time","desc")->where("user_id","=",$userid)->where("title","like","%$keyword%")->get(); 
            }else{
                $blogs=Blog::orderBy("create_time","desc")->where("user_id","=",$userid)->get();
            }
        }else{
            if($keyword){
                $blogs=Blog::orderBy("create_time","desc")->where("title","like","%$keyword%")->get(); 
            }else{
                $blogs=Blog::orderBy("create_time","desc")->get();
            }
        }
        return view("index",["blogs"=>$blogs]);
    }

    public function add(Request $request){
        $title=$request->input('title');
        $content=$request->input('content');
        if($request->session()->get('userId')){
            $blog=new Blog();
            $blog->title=$title;
            $blog->content=$content;
            $blog->user_id=$request->session()->get('userId');
            $blog->save();
            return redirect('/index');
        }else{
            return redirect('/index');
        }
    }

    public function del(Request $request,$bid){
        Blog::where('id',$bid)->delete();
        return redirect('/index');
    }

    public function mod(Request $request){
        $bid=$request->input('bid');
        $title=$request->input('title');
        $content=$request->input('content');
        $blog=Blog::where('id',$bid)->first();
        $blog->title=$title;
        $blog->content=$content;
        $blog->save();
        return redirect('/index');
    }

    public function get(Request $request,$bid){
        $blog=Blog::where('id',$bid)->first();
        return view("index",[
            "blog"=>$blog
        ]);
    }
}
