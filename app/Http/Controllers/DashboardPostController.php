<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardPostController extends Controller
{
    // Method for showing the stats on the dashboard
    public function dashboard()
    {
        // Count the total posts by the authenticated user
        $totalPosts = Post::where('user_id', Auth::id())->count();
        
        // Fetch the latest post by the authenticated user
        $latestPost = Post::where('user_id', Auth::id())->latest()->first();
        
        // Get post distribution by category (count of posts in each category, filtered by the authenticated user)
        $postsPerCategory = Category::withCount(['posts' => function ($query) {
            $query->where('user_id', Auth::id()); // Only count posts for the authenticated user
        }])->get();
        
        // Prepare data for passing to the frontend for the chart
        $postsPerCategoryData = $postsPerCategory->map(function ($category) {
            return [
                'category_name' => $category->name,
                'post_count' => $category->posts_count,
            ];
        });
    
        // Pass the data to the view
        return view('backend.dashboard.index', compact('totalPosts', 'latestPost', 'postsPerCategoryData'));
    }
    
    // Method for showing all posts
    public function index()
    {
        return view('backend.dashboard.posts.index', [
            'posts' => Post::where('user_id', auth()->user()->id)->get()
        ]);
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.dashboard.posts.create', [
            "categories" => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|unique:posts',
            'category_id' => 'required',
            'body' => 'required'
        ]);
    
        // Add the authenticated user ID and excerpt to the validated data
        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200);
    
        // Insert the validated data into the posts table
        Post::create($validatedData);
    
        // Redirect back with a success message
        return redirect('/dashboard/posts')->with('success', 'New post has been added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('backend.dashboard.posts.show', [
            'post' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('backend.dashboard.posts.edit', [
            "post" => $post,
            "categories" => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $rules = [
            'title' => 'required|max:255',
            'category_id' => 'required',
            'body' => 'required'
        ];

        if($request->slug != $post->slug) {
            $rules['slug'] = 'required|unique:posts';
        }

        $validateData = $request->validate($rules);

        $validateData['user_id'] = auth()->user()->id;
        $validateData['excerpt'] = Str::limit(strip_tags($request->body), 200);

        Post::where('id', $post->id)
            ->update($validateData);

        return redirect('/dashboard/posts')->with('success', 'Post has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        Post::destroy($post->id);

        return redirect('/dashboard/posts')->with('success', 'Post has been deleted');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}
