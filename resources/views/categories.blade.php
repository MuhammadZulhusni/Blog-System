@extends('layouts.main')

@section('container')
    <div class="max-w-7xl mx-auto px-6 py-8">
        <!-- Title for Categories Section -->
        <h1 class="text-4xl font-semibold text-gray-800 mb-12 text-center">Explore Categories</h1>

        <!-- Loop through categories in a grid layout with better styling -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10">
            @foreach ($categories as $category)
                <div class="bg-white rounded-xl shadow-lg hover:shadow-2xl transition duration-300 ease-in-out transform hover:scale-105">
                    <div class="flex items-center justify-center p-8">
                        <a href="/blog?category={{ $category->slug }}" class="text-xl font-bold text-gray-900 hover:text-indigo-600 transition duration-300 ease-in-out">
                            {{ $category->name }}
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
