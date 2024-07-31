{{-- @dd($posts) --}}

@extends('layouts.main') <!-- This tells the view to extend the layout from main.blade.php -->

@section('container')
    <div class="max-w-4xl mx-auto px-4 py-6">
        <!-- Loop through posts -->
        @foreach ($posts as $post)
            <div class="bg-white shadow-lg rounded-lg overflow-hidden mb-6">
                <div class="p-6">
                    <h2 class="text-2xl font-bold text-gray-900 mb-2">
                    <a href="/posts/{{ $post['slug']}}">{{ $post["title"] }}</a>
                    </h2>
                    <h5 class="text-lg text-gray-700 mb-4">by: {{ $post["author"] }}</h5>
                    <p class="text-gray-600">{{ $post["body"] }}</p>
                </div>
            </div>
        @endforeach
    </div>
@endsection
