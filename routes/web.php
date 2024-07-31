<?php

use App\Http\Controllers\PostController;
use App\Models\Post;
use Illuminate\Support\Facades\Route;

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
Route::get('posts/{slug}', [PostController::class, 'show']);

