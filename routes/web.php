<?php

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


Route::get('/blog', function () {

$blog_posts = [
    [
        "title" => "Title 1",
        "slug" => "title-1",
        "author" => "zul",
        "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut eaque beatae aperiam sapiente praesentium quisquam temporibus iste corrupti odio! Inventore odio quod voluptate repellendus at, incidunt mollitia quisquam fuga adipisci!"
    ],
    [
        "title" => "Title 2",
        "slug" => "title-2",
        "author" => "zul2 ",
        "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut eaque beatae aperiam sapiente praesentium quisquam temporibus iste corrupti odio! Inventore odio quod voluptate repellendus at, incidunt mollitia quisquam fuga adipisci!"
    ],
];

    return view('posts', [
        "title" => "Blog",
        "posts" => $blog_posts
    ]);
});

// Single Post route
Route::get('posts/{slug}', function ($slug) {

    // Try letak sini kejap
    $blog_posts = [
        [
            "title" => "Title 1",
            "slug" => "title-1",
            "author" => "zul",
            "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut eaque beatae aperiam sapiente praesentium quisquam temporibus iste corrupti odio! Inventore odio quod voluptate repellendus at, incidunt mollitia quisquam fuga adipisci!"
        ],
        [
            "title" => "Title 2",
            "slug" => "title-2",
            "author" => "zul2 ",
            "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut eaque beatae aperiam sapiente praesentium quisquam temporibus iste corrupti odio! Inventore odio quod voluptate repellendus at, incidunt mollitia quisquam fuga adipisci!"
        ],
    ];

    $new_post = [];
    foreach($blog_posts as $post){
        if($post["slug"] === $slug) {
            $new_post = $post;
        }
    }

    return view('post',[
        "title" => "Single Post",
        "post" => $new_post
    ]);
});

