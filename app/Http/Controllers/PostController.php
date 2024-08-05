<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class PostController extends Controller
{

    public function index() // index tu nama method
    {
        $title = '';
        if(request('category'))
        {
            $category = Category::firstWhere('slug', request('category'));
            $title = ' in ' . $category->name;
        }
        if(request('author'))
        {
            $author = User::firstWhere('username', request('author'));
            $title = ' by ' . $author->name;
        }

        return view('posts', [
            "title" => "All Posts" . $title,
            // "posts" => Post::all(), //method all(), untuk dapatkan semua data Post
            "posts" => Post::latest()->filter(request(['search', 'category', 'author']))->get() 
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
