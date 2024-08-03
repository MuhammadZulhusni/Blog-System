<?php

use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::get('/', function () {
    return view('home',[
        "title" => "Home"
    ]);
});

Route::get('/about', function () {
    return view('about',[
        "title" => "About",
        "name" => "zulhusni",
        "email" => "aa@gmail.com",
        "img" => "https://irp.cdn-website.com/93aa737e/dms3rep/multi/hacker-computer-systems.jpg"
    ]);
});

// All Posts route
Route::get('/blog', [PostController::class, 'index']); // 'index' tu nama method

// Single Post route
Route::get('posts/{post:slug}', [PostController::class, 'show']);


Route::get('categories', function() {
    return view('categories',[
        'title' => "Post Categories",
        'categories' => Category::all() 
    ]);
});


// Route to display posts for a specific "category" identified by its slug
Route::get('categories/{category:slug}', function(Category $category){
    return view('posts',[
        'title' => "Post By Category : $category->name",
        'posts' => $category->posts->load('category', 'author'), // "load" tu ialah Lazy eager Loading
    ]);
});

// Route to display posts for a specific "author" identified by its slug
Route::get('/authors/{author:username}', function(User $author){
    return view('posts',[
        'title' => "Post By Author : $author->name",
        'posts' => $author->posts->load('category', 'author'), // Corrected to use `posts` instead of `post`, check dekat user model & "load" tu ialah Lazy eager Loading
    ]);
});
