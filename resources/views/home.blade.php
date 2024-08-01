@extends('layouts.main') <!-- Ni akan beritahu halaman ini mengambil/layout dari main.blade.php -->
 
@section('container')
    <div class="container mx-auto py-12 px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h1 class="text-4xl font-bold text-gray-900 mb-4">Welcome to Our Homepage</h1>
            <p class="text-lg text-gray-700 mb-8">
                Discover amazing content and join our community. We're excited to have you here!
            </p>
            <div class="flex justify-center space-x-4">
                <a href="/about" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded-md shadow-lg">Learn More About Us</a>
                <a href="#" class="bg-gray-100 hover:bg-gray-200 text-gray-800 font-bold py-2 px-4 rounded-md shadow-lg">Contact Us</a>
            </div>
        </div>
    </div>
@endsection