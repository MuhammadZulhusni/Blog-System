@extends('layouts.main')

@section('container')
    <div class="max-w-4xl mx-auto px-4 py-6">
        <!-- Post Container -->
        <div class="bg-white shadow-md rounded-lg overflow-hidden mb-6">
            <div class="p-6">
                <!-- Title -->
                <h2 class="text-3xl font-bold text-gray-900 mb-4">{{ $post->title }}</h2>
                
                <!-- Author & c=Category-->
                <div class="flex items-center mb-4">
                    <h5 class="text-lg text-gray-700 mr-4">
                        By 
                        <a href="/authors/{{ $post->author->username }}" class="text-blue-500 hover:text-blue-700">{{ $post->author->name }}</a> 
                        in 
                        <a href="/categories/{{ $post->category->slug }}" class="text-blue-500 hover:text-blue-700">{{ $post->category->name }}</a></h5> <!-- Show the name of the category related to this post -->
                </div>
                
                <!-- Content -->
                <div class="text-gray-700 leading-relaxed">
                    {!! $post->body !!}
                </div>
            </div>
        </div>

        <!-- Back to posts link -->
        <a href="{{ url()->previous() }}" class="inline-flex items-center text-blue-500 hover:text-blue-700 text-lg font-medium">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg>
            Back 
        </a>
        <!-- "url()->previous()" helper to navigate to the previous page -->
    </div>
@endsection

