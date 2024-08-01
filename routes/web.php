<?php

use App\Models\Category;
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


// Route to display posts for a specific category identified by its slug
Route::get('categories/{category:slug}', function(Category $category){
    return view('category',[
        'title' => $category->name,
        'posts' => $category->posts,
        'category' => $category->name
    ]);
});
