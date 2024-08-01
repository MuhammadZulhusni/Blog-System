{{-- @dd($posts) --}}

@extends('layouts.main') <!-- This tells the view to extend the layout from main.blade.php -->

@section('container')
    <div class="max-w-4xl mx-auto px-4 py-6">
        <!-- Title for Categories Section -->
        <h1 class="text-4xl font-bold text-gray-900 mb-8">Post Categories</h1>
        
        <!-- Loop through categories -->
        @foreach ($categories as $category)
            <div class="bg-white shadow-lg rounded-lg overflow-hidden mb-6 p-6">
                <ul class="space-y-4">
                    <li>
                        <a href="/categories/{{ $category->slug }}" class="text-lg font-medium text-blue-500 hover:text-blue-700">{{ $category->name }}</a>
                    </li>
                </ul>
            </div>
        @endforeach
    </div> 
@endsection

