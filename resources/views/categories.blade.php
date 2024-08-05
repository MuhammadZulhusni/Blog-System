{{-- @dd($posts) --}}

@extends('layouts.main') <!-- This tells the view to extend the layout from main.blade.php -->

@section('container')
    <div class="max-w-6xl mx-auto px-4 py-6">
        <!-- Title for Categories Section -->
        <h1 class="text-4xl font-bold text-gray-900 mb-8 text-center">Post Categories</h1>

        <!-- Loop through categories in a grid layout -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($categories as $category)
                <div class="bg-white shadow-lg rounded-lg overflow-hidden group relative">
                    <div class="relative">
                        <!-- Card Image -->
                        <img src="https://media.dev.to/cdn-cgi/image/width=1080,height=1080,fit=cover,gravity=auto,format=auto/https%3A%2F%2Fdev-to-uploads.s3.amazonaws.com%2Fuploads%2Farticles%2F096baapsqqt9fks0us99.png" class="w-full h-48 object-cover transition duration-300 ease-in-out lg:group-hover:blur-sm">

                        <!-- Overlay Text -->
                        <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent flex items-center justify-center p-4">
                            <a href="/blog?category={{ $category->slug }}" class="text-xl font-semibold text-white text-center opacity-100 lg:opacity-0 lg:group-hover:opacity-100 transition-opacity duration-300">
                                {{ $category->name }}
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
