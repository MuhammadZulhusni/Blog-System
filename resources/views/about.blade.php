@extends('layouts.main') <!-- Ni akan beritahu halaman ini mengambil/layout dari main.blade.php -->

@section('container')
    <div class="max-w-2xl mx-auto px-4 py-8">
        <!-- Profile Header -->
        <div class="text-center mb-6">
            <img src="{{ $img }}" alt="Profile Image" class="w-40 h-40 rounded-full mx-auto object-cover shadow-lg">
            <h1 class="text-3xl font-bold text-gray-900 mt-4">{{ $name }}</h1>
            <p class="text-gray-600 text-lg mt-2">{{ $email }}</p>
        </div>
    </div>
@endsection
