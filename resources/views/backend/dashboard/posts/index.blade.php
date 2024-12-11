@extends('backend.dashboard.layouts.main')

@section('container')
    <div class="py-6">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl font-bold text-gray-900">My Posts</h1>
            <!-- Create New Post Button -->
            <a href="/dashboard/posts/create" class="inline-flex items-center bg-green-600 hover:bg-green-500 text-white text-sm font-medium py-2 px-4 rounded-lg shadow-md transition-colors duration-300">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                New Post
            </a>
        </div>

        @if(session()->has('success'))
        <div class="alert alert-success bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4 rounded-lg shadow-md" role="alert">
            <strong class="font-bold">Success!</strong>
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
        @endif


        <!-- Divider Line -->
        <hr class="border-gray-300 mb-4"> 

        <!-- Table Container -->
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-md">
                <!-- Table Header -->
                <thead class="bg-gray-800 text-white">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">#</th>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Title</th>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Category</th>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <!-- Table Body -->
                <tbody class="bg-gray-50 divide-y divide-gray-200">
                    @foreach ($posts as $index => $post)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $index + 1 }}</td> <!-- Auto Number Column -->
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $post->title }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $post->category->name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <div class="flex space-x-2">
                                    <a href="#" class="text-blue-600 hover:text-blue-900">Edit</a>
                                    <a href="/dashboard/posts/{{ $post->slug  }}" class="text-green-600 hover:text-green-900">View</a>

                                    <!-- Button delete & Modal -->
                                    <div x-data="{ openModal: false }" class="inline-block">
                                    <!-- Trigger Button -->
                                    <button 
                                        type="button" 
                                        class="text-red-600 hover:text-red-700 font-semibold transition duration-300 transform hover:scale-105"
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

                                                <!-- Delete Button -->
                                                <form action="/dashboard/posts/{{ $post->slug }}" method="POST" class="inline-block">
                                                    @method('delete')
                                                    @csrf
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
                                <!-- End Button delete & Modal -->
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
