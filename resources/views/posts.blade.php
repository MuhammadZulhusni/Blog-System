@extends('layouts.main')

@section('container')
    <div class="max-w-6xl mx-auto px-4 py-6">
        <!-- Title for the Page -->
        <h1 class="text-4xl font-bold text-gray-900 mb-8">{{ $title }}</h1>

        <!-- Searching form -->
        <div class="py-4 px-4 mx-auto max-w-screen-xl lg:px-6">
            <div class="mx-auto max-w-screen-md sm:text-center">
                <form action="/blog" method="GET">
                    @if(request('category'))
                        <input type="hidden" name="category" value="{{ request('category') }}">
                    @endif
                    @if(request('author'))
                        <input type="hidden" name="author" value="{{ request('author') }}">
                    @endif

                    <!-- Search Input -->
                    <div class="items-center mx-auto mb-3 space-y-4 max-w-screen-sm sm:flex sm:space-y-0">
                        <div class="relative w-full">
                            <label for="search" class="hidden mb-2 text-sm font-medium text-gray-900">Search</label>
                            <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z"/>
                                </svg>
                            </div>
                            <input class="block p-3 pl-10 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" 
                                placeholder="Search for article" type="text" name="search" value="{{ request('search') }}" autocomplete="off">
                        </div>
                        <button type="submit" class="py-3 px-5 text-sm font-medium text-center text-white rounded-lg bg-gray-900 hover:bg-gray-700 border-2 border-gray-900">
                            Search
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Pagination -->
        <div class="mt-4 mb-4">
            {{ $posts->links() }}
        </div>

        @if($posts->count())
        <!-- Hero Post (First Post) -->
        <div class="bg-white shadow-lg rounded-lg overflow-hidden mb-12 hover:shadow-2xl transform hover:scale-105 transition duration-300 ease-in-out border border-gray-700">
            <div class="p-8">
                <h2 class="text-4xl font-extrabold text-gray-900 mb-2 hover:text-indigo-600">
                    <a href="/posts/{{ $posts[0]->slug }}">{{ $posts[0]->title }}</a>
                </h2>
                <div class="flex items-center mb-4 text-sm text-gray-600">
                    <span>By </span>
                    @if($posts[0]->author)
                        <a href="/blog?author={{ $posts[0]->author->username }}" class="text-indigo-500 hover:text-indigo-700 ml-1">{{ $posts[0]->author->name }}</a>
                    @else
                        <span class="text-gray-500">Unknown Author</span>
                    @endif
                    <span class="ml-2">{{ $posts[0]->created_at->diffForHumans() }}</span>
                </div>
                <p class="text-lg text-gray-700 mb-6">{{ $posts[0]->excerpt }}</p>
                <a href="/posts/{{ $posts[0]->slug }}" class="inline-block py-2 px-4 bg-gray-900 text-white font-semibold rounded-md transition duration-300 ease-in-out transform hover:bg-gray-700 hover:scale-105">
                    Read more...
                </a>
            </div>
        </div>

        <!-- Remaining Posts -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($posts->skip(1) as $post)
                <div class="bg-white shadow-lg rounded-lg overflow-hidden hover:shadow-2xl transform hover:scale-105 transition duration-300 ease-in-out border border-gray-700">
                    <div class="p-6">
                        <h2 class="text-2xl font-semibold text-gray-900 mb-2 hover:text-indigo-600">
                            <a href="/posts/{{ $post->slug }}">{{ $post->title }}</a>
                        </h2>
                        <div class="flex items-center mb-4 text-sm text-gray-600">
                            <span>By </span>
                            @if($post->author)
                                <a href="/blog?author={{ $post->author->username }}" class="text-indigo-500 hover:text-indigo-700 ml-1">{{ $post->author->name }}</a>
                            @else
                                <span class="text-gray-500">Unknown Author</span>
                            @endif
                            <span class="ml-2">{{ $post->created_at->diffForHumans() }}</span>
                        </div>
                        <p class="text-md text-gray-600 mb-6">{{ $post->excerpt }}</p>
                        <a href="/posts/{{ $post->slug }}" class="inline-block py-2 px-4 bg-gray-900 text-white font-semibold rounded-md transition duration-300 ease-in-out transform hover:bg-gray-700 hover:scale-105">
                            Read more...
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

        @else
            <p class="text-gray-600">No posts found.</p>
        @endif

        <!-- Pagination -->
        <div class="mt-4 mb-4">
            {{ $posts->links() }}
        </div>
    </div>

@endsection
