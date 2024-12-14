<?php

use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardPostController;

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
Route::get('/blog', [PostController::class, 'index']); 

// Single Post route
Route::get('posts/{post:slug}', [PostController::class, 'show']); 

// Route untuk category page
Route::get('categories', function() {
    return view('categories',[
        'title' => "Post Categories",
        'categories' => Category::all() 
    ]);
});

//Route untuk login
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']); 
Route::post('/logout', [LoginController::class, 'logout']);

//Route untuk register
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');  
Route::post('/register', [RegisterController::class, 'store']); 

// Route untuk dashboard (controller method)
Route::get('/dashboard', [DashboardPostController::class, 'dashboard'])->middleware('auth');

//Route untuk checkSlug
Route::get('/dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug'])->middleware('auth');

//Route untuk 'My Posts' (Backend)
Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');
