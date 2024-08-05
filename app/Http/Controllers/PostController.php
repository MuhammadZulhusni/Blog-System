<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{

    public function index() // index tu nama method
    {

        $posts = Post::latest();

        if(request('search')) {
            $posts->where('title', 'like', '%' . request('search') . '%')
                  ->orWhere('body', 'like', '%' . request('search') . '%');
        }

        return view('posts', [
            "title" => "All Posts",
            // "posts" => Post::all(), //method all(), untuk dapatkan semua data Post
            "posts" => $posts->get( ) 
        ]); 
    }

    public function show(Post $post)  // This is route model binding
    {
        return view('post',[
            "title" => "Single Post",
            "post" => $post
        ]);
    }
}
