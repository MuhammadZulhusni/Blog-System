<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{

    public function index() // index tu nama method
    {
        return view('posts', [
            "title" => "All Posts",
            // "posts" => Post::all(), //method all(), untuk dapatkan semua data Post
            "posts" => Post::latest()->filter(request(['search']))->get() 
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
