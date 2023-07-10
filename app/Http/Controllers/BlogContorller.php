<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Comment;
use Illuminate\Http\Request;

class BlogContorller extends Controller
{
    public function blogList(){
        return Blog::all();
    }

    public function blog($id){
      $blog =   Blog::find($id);
      $comments = Comment::where("blog_id", $id)->get();
        return view("pages.blog", compact('blog', $blog));
    }

    public function singleBlog($id){
        return Blog::find($id);
    }

    public function comments($id){
        return Comment::where('blog_id', $id)->get();
    }


    public function storeComment(Request $request){
       $res =  Comment::insert([
        'blog_id'=> $request->blog_id,
        'name' => $request->name,
        'text' => $request->comment

        ]
       );
       return "comment submited";
    }
}
