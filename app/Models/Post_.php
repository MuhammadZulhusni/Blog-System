<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post 
{
    // private here means that it can only be accessed within the class in which it is defined
     private static $blog_posts = [
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
        ]
    ];

    public static function all()
    {
        return collect(self::$blog_posts); // self::$blog_posts is used to access a 'static property' named $blog_posts within the same class.
    }


    public static function find($slug)
    {
        // Retrieve all blog posts using the static method `all()`
        $posts = static::all(); 
        
        // Find and return the first post where the 'slug' matches the provided $slug
        // `firstWhere` is a method that returns the first item in the collection where the key matches the value
        return $posts->firstWhere('slug', $slug);
    }
    
    
}
