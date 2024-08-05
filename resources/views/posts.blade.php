@extends('layouts.main') <!-- This tells the view to extend the layout from main.blade.php -->

@section('container')
    <div class="max-w-6xl mx-auto px-4 py-6">
        <!-- Title for the Page -->
        <h1 class="text-4xl font-bold text-gray-900 mb-8">{{ $title }}</h1>

        <!-- Searching -->
        <div class="py-4 px-4 mx-auto max-w-screen-xl lg:px-6">
            <div class="mx-auto max-w-screen-md sm:text-center">
                <form action="/blog" method="GET">
                    <!-- Category and Author Filters
                    @if(request('category'))
                        <input type="hidden" name="category" value="{{ request('category') }}">
                    @endif

                    @if(request('author'))
                        <input type="hidden" name="author" value="{{ request('author') }}">
                    @endif -->

                    <!-- Search Input -->
                    <div class="items-center mx-auto mb-3 space-y-4 max-w-screen-sm sm:flex sm:space-y-0">
                        <div class="relative w-full">
                            <label for="search" class="hidden mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Search</label>
                            <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z"/>
                                </svg>
                            </div>
                            <input class="block p-3 pl-10 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:rounded-none sm:rounded-l-lg focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Search for article" type="text" name="search" value="{{ request('search') }}" autocomplete="off">
                        </div>
                        <div>
                            <button type="submit" class="py-3 px-5 w-full text-sm font-medium text-center text-white rounded-lg border cursor-pointer bg-primary-700 border-primary-600 sm:rounded-none sm:rounded-r-lg hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Search</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>


        <!-- Hero Post -->
        @if($posts->count())
            <div class="bg-white shadow-xl rounded-lg overflow-hidden mb-12">
                <!-- Hero Image -->
                <div class="relative">
                    <img src="https://www.cloudways.com/blog/wp-content/uploads/Laravel-9.jpg" class="w-full h-64 object-cover">
                    <div class="absolute bottom-0 left-0 p-4 bg-gradient-to-t from-black via-transparent to-transparent text-white">
                        <a href="/categories/{{ $posts[0]->category->slug }}" class="text-xl font-semibold hover:text-blue-300 transition duration-300">{{ $posts[0]->category->name }}</a>
                    </div>
                </div>
                
                <div class="p-8">
                    <h2 class="text-3xl font-bold text-gray-900 mb-4 hover:text-blue-700 transition duration-300">
                        <a href="/posts/{{ $posts[0]->slug }}">{{ $posts[0]->title }}</a>
                    </h2>
                    <div class="flex items-center mb-4">
                        <h5 class="text-md text-gray-700 mr-4">
                            By 
                            <a href="/authors/{{ $posts[0]->author->username }}" class="text-blue-500 hover:text-blue-700 transition duration-300">{{ $posts[0]->author->name }}</a> 
                            <br>
                            <span class="text-gray-500">{{ $posts[0]->created_at->diffForHumans() }}</span>
                        </h5>
                    </div>  
                    <p class="text-gray-600 mb-6">{{ $posts[0]->excerpt }}</p>
                    <a href="/posts/{{ $posts[0]->slug }}" class="inline-block border border-blue-500 text-blue-500 font-semibold px-3 py-2 rounded-lg hover:bg-blue-500 hover:text-white transition duration-300">Read more...</a>
                </div>
            </div>

        <!-- Loop through remaining posts -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($posts->skip(1) as $post)
                <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                    <!-- Card Image Top -->
                    <div class="relative">
                        <img src="https://via.placeholder.com/150" class="w-full h-48 object-cover">
                        <div class="absolute bottom-0 left-0 p-4 bg-gradient-to-t from-black via-transparent to-transparent text-white">
                            <a href="/categories/{{ $post->category->slug }}" class="text-sm font-semibold hover:text-blue-300 transition duration-300">{{ $post->category->name }}</a>
                        </div>
                    </div>

                    <div class="p-6 flex flex-col">
                        <h2 class="text-2xl font-bold text-gray-900 mb-2 hover:text-blue-700 transition duration-300">
                            <a href="/posts/{{ $post->slug }}">{{ $post->title }}</a>
                        </h2>
                        <div class="flex items-center mb-4">
                            <h5 class="text-md text-gray-700 mr-4">
                                By 
                                <a href="/authors/{{ $post->author->username }}" class="text-blue-500 hover:text-blue-700 transition duration-300">{{ $post->author->name }}</a> 
                                <br>
                                <span class="text-gray-500">{{ $post->created_at->diffForHumans() }}</span>
                            </h5>
                        </div>  
                        <p class="text-gray-600 mb-6 flex-grow">{{ $post->excerpt }}</p>
                        <a href="/posts/{{ $post->slug }}" class="inline-block border border-blue-500 text-blue-500 font-semibold px-3 py-2 rounded-lg hover:bg-blue-500 hover:text-white transition duration-300 mt-auto text-center">Read more...</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>


@else
    <p>No post found</p>
@endif

@endsection
