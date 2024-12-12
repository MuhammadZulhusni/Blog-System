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
            <!-- Back to My Posts Button -->
            <a href="/dashboard/posts" class="inline-flex items-center text-white bg-gray-900 hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-gray-900 focus:ring-opacity-50 text-lg font-medium py-2 px-6 rounded-lg shadow-md transition-colors duration-300">
                <img src="https://cdn-icons-png.flaticon.com/128/10238/10238209.png" class="w-5 h-5 mr-2" alt="Back Icon">
                Back to My Posts
            </a>

            <!-- Edit and Delete Buttons -->
            <div class="flex space-x-4">
                <!-- Edit Button -->
                <a href="/dashboard/posts/{{ $post->slug }}/edit" class="inline-flex items-center text-white bg-blue-600 hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-opacity-50 text-lg font-medium py-2 px-6 rounded-lg shadow-md transition-colors duration-300">
                    Edit
                </a>

                <!-- Delete Button with Modal -->
                <div x-data="{ openModal: false }" class="inline-block">
                    <button 
                        type="button" 
                        class="inline-flex items-center text-white bg-red-600 hover:bg-red-500 focus:outline-none focus:ring-2 focus:ring-red-600 focus:ring-opacity-50 text-lg font-medium py-2 px-6 rounded-lg shadow-md transition-colors duration-300"
                        @click="openModal = true">
                        Delete
                    </button>

                    <!-- Modal -->
                    <div 
                        x-show="openModal" 
                        class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 backdrop-blur-sm"
                        x-cloak
                        x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0 scale-90"
                        x-transition:enter-end="opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-200"
                        x-transition:leave-start="opacity-100 scale-100"
                        x-transition:leave-end="opacity-0 scale-90"
                    >
                        <!-- Modal Content -->
                        <div class="relative bg-white rounded-xl shadow-lg w-full max-w-md p-6 overflow-hidden">
                            <!-- Close Button -->
                            <button 
                                type="button" 
                                @click="openModal = false" 
                                class="absolute top-3 right-3 text-gray-400 hover:text-gray-600 focus:outline-none">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>

                            <!-- Modal Header -->
                            <div class="text-center">
                                <h2 class="text-2xl font-bold text-gray-900">Confirm Deletion</h2>
                                <p class="mt-2 text-sm text-gray-500">
                                    Are you sure you want to delete this post? 
                                </p>
                            </div>

                            <!-- Modal Footer -->
                            <div class="mt-6 flex justify-center space-x-4">
                                <!-- Cancel Button -->
                                <button 
                                    type="button" 
                                    @click="openModal = false" 
                                    class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-medium py-2 px-6 rounded-lg shadow-md transition duration-300 transform hover:scale-105">
                                    Cancel
                                </button>

                                <!-- Confirm Delete Button -->
                                <form action="/dashboard/posts/{{ $post->slug }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button 
                                        type="submit" 
                                        class="bg-red-600 hover:bg-red-700 text-white font-medium py-2 px-6 rounded-lg shadow-md transition duration-300 transform hover:scale-105">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
