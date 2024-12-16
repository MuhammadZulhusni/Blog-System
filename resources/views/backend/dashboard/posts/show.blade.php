@extends('backend.dashboard.layouts.main')

@section('container')
    <div class="max-w-4xl mx-auto px-6 py-8">

        <!-- Breadcrumb -->
        <nav class="flex items-center text-sm text-gray-600 mb-8" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-2">
                <li>
                    <a href="/dashboard" class="flex items-center text-blue-600 hover:underline">
                        <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7l6 6-6 6M21 7l-6 6 6 6"></path>
                        </svg>
                        Dashboard
                    </a>
                </li>
                <li class="flex items-center">
                    <svg class="w-5 h-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v12a1 1 0 01-2 0V4a1 1 0 011-1zM3 9a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                    </svg>
                    <a href="/dashboard/posts" class="ml-2 text-blue-600 hover:underline">My Posts</a>
                </li>
                <li class="flex items-center">
                    <svg class="w-5 h-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v12a1 1 0 01-2 0V4a1 1 0 011-1zM3 9a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                    </svg>
                    <span class="ml-2 text-gray-500">{{ $post->title }}</span>
                </li>
            </ol>
        </nav>

        <!-- Post Content -->
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <div class="p-6">
                <!-- Post Title -->
                <h1 class="text-4xl font-bold text-gray-900 mb-6">{{ $post->title }}</h1>

                <!-- Post Body -->
                <div class="text-gray-700 leading-relaxed space-y-4">
                    {!! $post->body !!}
                </div>
            </div>
        </div>

        <!-- Actions -->
        <div class="flex justify-between items-center mt-8">
            <!-- Back Button -->
            <a href="javascript:history.back()" class="flex items-center text-gray-700 bg-gray-100 hover:bg-gray-200 py-2 px-4 rounded-lg shadow-md transition">
                <img src="https://cdn-icons-png.flaticon.com/128/10238/10238209.png" class="w-5 h-5 mr-2" alt="Back Icon">
                Back to My Posts
            </a>

            <!-- Edit and Delete Buttons -->
            <div class="flex items-center space-x-4">
                <a href="/dashboard/posts/{{ $post->slug }}/edit" class="text-white bg-blue-600 hover:bg-blue-500 py-2 px-6 rounded-lg shadow-md transition">
                    Edit
                </a>
                
                <div x-data="{ openModal: false }">
                    <!-- Delete Button -->
                    <button @click="openModal = true" class="text-white bg-red-600 hover:bg-red-500 py-2 px-6 rounded-lg shadow-md transition">
                        Delete
                    </button>

                    <!-- Modal -->
                    <div 
                        x-show="openModal" 
                        class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 backdrop-blur-sm p-4"
                        x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0 scale-90"
                        x-transition:enter-end="opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-200"
                        x-transition:leave-start="opacity-100 scale-100"
                        x-transition:leave-end="opacity-0 scale-90"
                        x-cloak>
                        <div class="bg-white rounded-lg shadow-lg w-full max-w-md p-6">
                            <h2 class="text-xl font-bold text-gray-800 mb-4">Confirm Deletion</h2>
                            <p class="text-sm text-gray-600 mb-6">Are you sure you want to delete this post? This action cannot be undone.</p>

                            <div class="flex justify-end space-x-4">
                                <button @click="openModal = false" class="py-2 px-4 bg-gray-200 text-gray-800 rounded-lg hover:bg-gray-300 transition">Cancel</button>
                                <form action="/dashboard/posts/{{ $post->slug }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="py-2 px-4 bg-red-600 text-white rounded-lg hover:bg-red-700 transition">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
