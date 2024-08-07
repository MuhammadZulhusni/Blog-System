@extends('layouts.main')

@section('container')
<div class="max-w-md mx-auto mt-10 p-8 bg-white rounded-lg shadow-lg">
    <!-- Logo -->
    <div class="flex justify-center mb-6">
        <img src="https://cdn-icons-png.flaticon.com/128/10290/10290447.png" alt="Logo" class="h-16">
    </div>
    
    <h2 class="text-2xl font-bold text-center mb-6">Login</h2>
    
    <!-- Display Success Message -->
    @if(session('success'))
        <div class="mb-4 p-4 bg-green-100 border border-green-300 text-green-700 rounded">
            {{ session('success') }}
        </div>
    @endif
    <!-- Display Error Message -->
    @if(session('Error'))
        <div class="mb-4 p-4 bg-red-100 border border-red-300 text-red-700 rounded">
            {{ session('Error') }}
        </div>
    @endif
    
    <form action="/login" method="POST">
    @csrf
        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
            <input type="email" name="email" id="email" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('email') @enderror" value="{{ old('email') }}" autofocus required>
            @error('email')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
            <input type="password" name="password" id="password" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('password') @enderror" value="{{ old('password') }}" required>
            @error('password')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
        <button type="submit" class="w-full bg-indigo-600 text-white font-bold py-2 px-4 rounded hover:bg-indigo-700 focus:outline-none focus:shadow-outline mt-2">Login</button>
        <div class="mt-4 text-sm text-center">
            <span>Not registered yet? <a href="/register" class="font-medium text-indigo-600 hover:text-indigo-500">Register now</a></span>
        </div>
        <div class="mt-4 text-center"> <!-- href="{{ url()->previous() }}" -->
            <a href="/" class="text-indigo-600 hover:text-indigo-800 ">Back</a>
        </div>
    </form>
</div>
@endsection
