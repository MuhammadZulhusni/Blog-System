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
                            <input class="block p-3 pl-10 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300" 
                                placeholder="Search for article" type="text" name="search" value="{{ request('search') }}" autocomplete="off">
                        </div>
                        <div>
                            <button type="submit" class="py-3 px-5 w-full text-sm font-medium text-center text-white rounded-lg border bg-gray-800 hover:bg-gray-900">Search</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Pagination -->
        <div class="mt-4 mb-4">
            {{ $posts->links() }}
        </div>

        @if($posts->count())
            <!-- Hero Post -->
            <div class="bg-white shadow-xl rounded-lg overflow-hidden mb-12">
                <div class="relative">
                    <img src="{{ $posts[0]->image ?? 'https://via.placeholder.com/600x400' }}" class="w-full h-64 object-cover">
                    <div class="absolute bottom-0 left-0 p-4 bg-gradient-to-t from-black via-transparent to-transparent text-white">
                        <a href="/blog?category={{ $posts[0]->category->slug }}" class="text-xl font-semibold hover:text-blue-300 transition duration-300">
                            {{ $posts[0]->category->name }}
                        </a>
                    </div>
                </div>
                <div class="p-8">
                    <h2 class="text-3xl font-bold text-gray-900 mb-4 hover:text-blue-700 transition duration-300">
                        <a href="/posts/{{ $posts[0]->slug }}">{{ $posts[0]->title }}</a>
                    </h2>
                    <div class="flex items-center mb-4">
                        <h5 class="text-md text-gray-700 mr-4">
                            By 
                            @if($posts[0]->author)
                                <a href="/blog?author={{ $posts[0]->author->username }}" class="text-blue-500 hover:text-blue-700">
                                    {{ $posts[0]->author->name }}
                                </a>
                            @else
                                <span class="text-gray-500">Unknown Author</span>
                            @endif
                            <br>
                            <span class="text-gray-500">{{ $posts[0]->created_at->diffForHumans() }}</span>
                        </h5>
                    </div>
                    <p class="text-gray-600 mb-6">{{ $posts[0]->excerpt }}</p>
                    <a href="/posts/{{ $posts[0]->slug }}" class="inline-block border border-gray-900 text-white bg-gray-900 font-semibold px-3 py-2 rounded-lg hover:bg-white hover:text-gray-900">
                        Read more...
                    </a>
                </div>
            </div>

            <!-- Remaining Posts -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($posts->skip(1) as $post)
                    <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                        <div class="relative">
                            <img src="{{ $post->image ?? 'https://via.placeholder.com/150' }}" class="w-full h-48 object-cover">
                            <div class="absolute bottom-0 left-0 p-4 bg-gradient-to-t from-black via-transparent to-transparent text-white">
                                <a href="/blog?category={{ $post->category->slug }}" class="text-sm font-semibold hover:text-blue-300">
                                    {{ $post->category->name }}
                                </a>
                            </div>
                        </div>
                        <div class="p-6">
                            <h2 class="text-2xl font-bold text-gray-900 mb-2 hover:text-blue-700">
                                <a href="/posts/{{ $post->slug }}">{{ $post->title }}</a>
                            </h2>
                            <div class="flex items-center mb-4">
                                <h5 class="text-md text-gray-700 mr-4">
                                    By 
                                    @if($post->author)
                                        <a href="/blog?author={{ $post->author->username }}" class="text-blue-500 hover:text-blue-700">
                                            {{ $post->author->name }}
                                        </a>
                                    @else
                                        <span class="text-gray-500">Unknown Author</span>
                                    @endif
                                    <br>
                                    <span class="text-gray-500">{{ $post->created_at->diffForHumans() }}</span>
                                </h5>
                            </div>
                            <p class="text-gray-600 mb-6">{{ $post->excerpt }}</p>
                            <a href="/posts/{{ $post->slug }}" class="inline-block border border-gray-900 text-white bg-gray-900 font-semibold px-3 py-2 rounded-lg hover:bg-white hover:text-gray-900">
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
