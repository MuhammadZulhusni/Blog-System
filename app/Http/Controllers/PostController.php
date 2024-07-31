<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Post;

class PostController extends Controller
{

    public function index() // index tu nama method
    {
        return view('posts', [
            "title" => "Blog",
            "posts" => Post::all() //method all(), untuk dapatkan semua data Post
        ]); 
    }

    public function show($slug) 
    {
        return view('post',[
            "title" => "Single Post",
            "post" => Post::find($slug)
        ]);
    }
}
