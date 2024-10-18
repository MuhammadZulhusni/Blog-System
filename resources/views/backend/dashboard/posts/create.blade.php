@extends('backend.dashboard.layouts.main')

@section('container')
<div class="py-6">
    <h1 class="text-2xl font-bold text-gray-900 mb-2">Create New Post</h1>
    <!-- Divider Line -->
    <hr class="border-gray-300 mb-4">

    <!-- Form Container -->
    <div class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow-lg">
        <form action="/dashboard/posts" method="POST">
            @csrf
            <!-- Title Input -->
            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                <input type="text" name="title" id="title" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" placeholder="Enter post title">
            </div>

            <!-- Slug Input -->
            <div class="mb-6">
                <label for="slug" class="block text-sm font-medium text-gray-700">Slug</label>
                <input type="text" name="slug" id="slug" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" placeholder="Enter post slug">
            </div>

            <!-- Create Post Button -->
            <div class="flex justify-end">
                <button type="submit" class="inline-flex items-center text-white bg-blue-600 hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-opacity-50 text-lg font-medium py-2 px-6 rounded-lg shadow-md transition-colors duration-300">
                    Create Post
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    const title = document.querySelector('#title');
    const slug = document.querySelector('#slug');

    title.addEventListener('change', function() {
        fetch('/dashboard/posts/checkSlug?title=' + title.value)
            .then(response => response.json())
            .then(data => slug.value = data.slug);
    });
</script>
@endsection