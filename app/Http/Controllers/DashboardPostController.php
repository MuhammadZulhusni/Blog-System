<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        
        // Get post distribution by category
        $postsPerCategory = Category::withCount(['posts' => function ($query) {
            $query->where('user_id', Auth::id()); // Only count posts for the authenticated user
        }])->get();
        
        // Calculate total words in all posts by the authenticated user
        $totalWords = auth()->user()->posts->sum(function ($post) {
            return str_word_count(strip_tags($post->body)); // Count words in each post's content
        });
    
        // Get the longest post (post with the most words)
        $longestPost = Post::where('user_id', Auth::id())
            ->select('title', 'body', 'slug') // Selecting only necessary columns for performance
            ->orderByRaw('LENGTH(body) - LENGTH(REPLACE(body, " ", "")) DESC') // Sort by word count
            ->first();
        
        // Calculate word count for the longest post
        $longestPostWordCount = $longestPost ? str_word_count(strip_tags($longestPost->body)) : 0;
        
        // Get the shortest post (post with the least words)
        $shortestPost = Post::where('user_id', Auth::id())
            ->select('title', 'body', 'slug') // Selecting only necessary columns for performance
            ->orderByRaw('LENGTH(body) - LENGTH(REPLACE(body, " ", "")) ASC') // Sort by word count
            ->first();
        
        // Calculate word count for the shortest post
        $shortestPostWordCount = $shortestPost ? str_word_count(strip_tags($shortestPost->body)) : 0;
        
        // Fetch the category with the most posts for the logged-in user
        $mostFrequentCategory = Category::select('categories.name')
            ->join('posts', 'categories.id', '=', 'posts.category_id')
            ->where('posts.user_id', auth()->id()) // Filter posts by the logged-in user
            ->groupBy('categories.name')
            ->orderByDesc(DB::raw('COUNT(posts.id)')) // Sort by the count of posts in descending order
            ->first(); // Get only the category with the most posts
        
        // Prepare data for passing to the frontend for the chart
        $postsPerCategoryData = $postsPerCategory->map(function ($category) {
            return [
                'category_name' => $category->name,
                'post_count' => $category->posts_count,
            ];
        });
        
        // Pass the data to the view
        return view('backend.dashboard.index', [
            'totalPosts' => $totalPosts,
            'latestPost' => $latestPost,
            'postsPerCategoryData' => $postsPerCategoryData,
            'totalWords' => $totalWords,
            'longestPost' => $longestPost,
            'longestPostWordCount' => $longestPostWordCount, // Pass the word count for the longest post
            'shortestPost' => $shortestPost,
            'shortestPostWordCount' => $shortestPostWordCount, // Pass the word count for the shortest post
            'mostFrequentCategory' => $mostFrequentCategory, // Pass the most frequent category to the view
        ]);
    }
    
    // Method for showing all posts
    public function index()
    {
        return view('backend.dashboard.posts.index', [
            'posts' => Post::where('user_id', auth()->user()->id)->get()
        ]);
    } 

    // Method for showing the create post form
    public function create()
    {
        return view('backend.dashboard.posts.create', [
            "categories" => Category::all()
        ]);
    }

    // Method for storing a new post
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

    // Method for showing a single post
    public function show(Post $post)
    {
        return view('backend.dashboard.posts.show', [
            'post' => $post
        ]);
    }

    // Method for editing an existing post
    public function edit(Post $post)
    {
        return view('backend.dashboard.posts.edit', [
            "post" => $post,
            "categories" => Category::all()
        ]);
    }

    // Method for updating a post
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

        $validatedData = $request->validate($rules);

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200);

        // Update the post data in the database
        Post::where('id', $post->id)
            ->update($validatedData);

        return redirect('/dashboard/posts')->with('success', 'Post has been updated!');
    }

    // Method for deleting a post
    public function destroy(Post $post)
    {
        Post::destroy($post->id);

        return redirect('/dashboard/posts')->with('success', 'Post has been deleted');
    }

    // Method for checking and generating a unique slug
    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}