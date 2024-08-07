@extends('layouts.main')

@section('container')
<div class="max-w-md mx-auto mt-10 p-8 bg-white rounded-lg shadow-lg">
    <!-- Logo -->
    <div class="flex justify-center mb-6">
        <img src="https://cdn-icons-png.flaticon.com/128/10290/10290447.png" alt="Logo" class="h-16">
    </div>

    <h2 class="text-2xl font-bold text-center mb-6">Register</h2>

    <form action="/register" method="POST">
        @csrf
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
            <input type="text" name="name" id="name" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('name') @enderror" value="{{ old('name') }}" required>
            @error('name')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
            <input type="text" name="username" id="username" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('username') @enderror" value="{{ old('username') }}" required>
            @error('username')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
            <input type="email" name="email" id="email" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('email') @enderror" value="{{ old('email') }}" required>
            @error('email')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
            <input type="password" name="password" id="password" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('password') @enderror" required>
            @error('password')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
        <button type="submit" class="w-full bg-indigo-600 text-white font-bold py-2 px-4 rounded hover:bg-indigo-700 focus:outline-none focus:shadow-outline">Register</button>
    </form>
    <div class="mt-4 text-center">
        <p class="text-sm text-gray-600">Already registered? <a href="/login" class="text-indigo-600 hover:text-indigo-800">Login</a></p>
    </div>
</div>
@endsection
