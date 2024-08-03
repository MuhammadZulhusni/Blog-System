{{-- @dd($posts) --}}

@extends('layouts.main') <!-- This tells the view to extend the layout from main.blade.php -->

@section('container')
    <div class="max-w-4xl mx-auto px-4 py-6">
        <!-- Loop through posts -->
        @foreach ($posts as $post)
            <div class="bg-white shadow-lg rounded-lg overflow-hidden mb-6">
                <div class="p-6">
                    <h2 class="text-2xl font-bold text-gray-900 mb-2 hover:text-blue-700">
                        <a href="/posts/{{ $post->slug }}">{{ $post->title }}</a>
                    </h2>
                    <div class="flex items-center mb-4">
                        <h5 class="text-lg text-gray-700 mr-4">
                        By 
                        <a href="/authors/{{ $post->author->username }}" class="text-blue-500 hover:text-blue-700">{{ $post->author->name }}</a> 
                        in 
                        <a href="/categories/{{ $post->category->slug }}" class="text-blue-500 hover:text-blue-700">{{ $post->category->name }}</a></h5>
                    </div>  
                    <p class="text-gray-600 mb-4">{{ $post->excerpt }}</p>
                    <a href="/posts/{{ $post->slug }}" class="inline-block border border-blue-500 text-blue-500 font-semibold px-4 py-2 rounded-lg hover:bg-blue-500 hover:text-white transition duration-300">Read more..</a>
                </div>
            </div>
        @endforeach
    </div>
@endsection
