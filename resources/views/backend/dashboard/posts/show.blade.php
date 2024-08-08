@extends('backend.dashboard.layouts.main')

@section('container')
    <div class="max-w-4xl mx-auto px-4 py-6">

        <!-- Breadcrumb -->
        <nav class="flex mb-6 text-sm text-gray-700" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="/dashboard" class="inline-flex items-center hover:underline">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7l6 6-6 6M21 7l-6 6 6 6"></path>
                        </svg>
                        Dashboard
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="w-4 h-4 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v12a1 1 0 01-2 0V4a1 1 0 011-1zM3 9a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                        </svg>
                        <a href="/dashboard/posts" class="ml-1 hover:underline">My Posts</a>
                    </div>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="w-4 h-4 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v12a1 1 0 01-2 0V4a1 1 0 011-1zM3 9a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="ml-1 text-gray-500">{{ $post->title }}</span>
                    </div>
                </li>
            </ol>
        </nav>

        <!-- Post Container -->
        <div class="bg-white shadow-md rounded-lg overflow-hidden mb-6">
            <!-- Card Image Top -->
            <img src="https://via.placeholder.com/1200x400" class="w-full h-64 object-cover" alt="Post Image">
            
            <div class="p-6">
                <!-- Title -->
                <h2 class="text-3xl font-bold text-gray-900 mb-4">{{ $post->title }}</h2>

                <!-- Content -->
                <div class="text-gray-700 leading-relaxed">
                    {!! $post->body !!}
                </div>
            </div>
        </div>

        <!-- Buttons -->
        <div class="flex justify-between items-center">
            <a href="/dashboard/posts" class="inline-flex items-center text-white bg-gray-900 hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-gray-900 focus:ring-opacity-50 text-lg font-medium py-2 px-6 rounded-lg shadow-md transition-colors duration-300">
                <img src="https://cdn-icons-png.flaticon.com/128/10238/10238209.png" class="w-5 h-5 mr-2" alt="Back Icon">
                Back to My Posts
            </a>
            <div class="flex space-x-4">
                <a href="{{ route('posts.edit', $post->id) }}" class="inline-flex items-center text-white bg-blue-600 hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-opacity-50 text-lg font-medium py-2 px-6 rounded-lg shadow-md transition-colors duration-300">
                    Edit
                </a>
                <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="inline-flex items-center text-white bg-red-600 hover:bg-red-500 focus:outline-none focus:ring-2 focus:ring-red-600 focus:ring-opacity-50 text-lg font-medium py-2 px-6 rounded-lg shadow-md transition-colors duration-300">
                        Delete
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
