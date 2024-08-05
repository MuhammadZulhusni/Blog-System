<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // protected $fillable = ['title', 'excerpt', 'body'];
    protected $quarded = ['id']; // Mean id x boleh di isi oleh user, selain dari id user boleh isi
    protected $with = ['author', 'category']; // Eager Loading

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
        $query->when($filters['search'] ?? false, function($query, $search)
        {
            return $query->where('title', 'like', '%' . $search . '%')
                  ->orWhere('body', 'like', '%' . $search . '%');
        });
    }
}
