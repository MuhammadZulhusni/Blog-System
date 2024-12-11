<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
    use HasFactory, Sluggable;

    protected $with = ['author', 'category']; // Eager Loading

    // Define the fillable fields to allow mass assignment
    protected $fillable = [
        'title', 
        'slug', 
        'category_id', 
        'body', 
        'user_id', 
        'excerpt'
    ];

    // Define a relationship where each 'Post' belongs to a single 'Category'.
    // Each Post belongs to one Category. This means a post can be associated with only one category.
    // A Category can have many Posts. This means multiple posts can be associated with the same category.
    public function category()
    {
        return $this->belongsTo(Category::class); 
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id'); 
    }

    public function scopeFilter($query, array $filters)
    {
        // Callback function
        $query->when($filters['search'] ?? false, function($query, $search) {
            return $query->where('title', 'like', '%' . $search . '%')
                         ->orWhere('body', 'like', '%' . $search . '%');
        });

        $query->when($filters['category'] ?? false, function($query, $category) {
            return $query->whereHas('category', function($query) use ($category) {
                $query->where('slug', $category);
            });
        });

        $query->when($filters['author'] ?? false, function($query, $author) {
            return $query->whereHas('author', function($query) use ($author) {
                $query->where('username', $author);
            });
        });
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
