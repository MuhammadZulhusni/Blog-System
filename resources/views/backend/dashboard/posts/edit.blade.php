@extends('backend.dashboard.layouts.main')

@section('container')
<div class="py-8">
    <!-- Page Header -->
    <h1 class="text-3xl font-extrabold text-gray-800 text-center mb-4">Edit Post</h1>
    <p class="text-gray-600 text-center mb-8">Update the details of your blog post with ease</p>

    <!-- Form Container -->
    <div class="w-full max-w-4xl mx-auto bg-white p-8 rounded-lg shadow-md">
        <form action="/dashboard/posts/{{ $post->slug }}" method="POST">
            @method('put')
            @csrf
            
            <!-- Title Input -->
            <div class="mb-6">
                <label for="title" class="block text-lg font-medium text-gray-700">Title</label>
                <input 
                    type="text" 
                    name="title" 
                    id="title" 
                    required 
                    autofocus 
                    value="{{ old('title', $post->title) }}" 
                    class="block w-full mt-2 px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 text-sm text-gray-900 @error('title') border-red-500 @enderror" 
                    placeholder="Enter the post title"
                >
                @error('title')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Slug Input -->
            <div class="mb-6">
                <label for="slug" class="block text-lg font-medium text-gray-700">Slug</label>
                <input 
                    type="text" 
                    name="slug" 
                    id="slug" 
                    required 
                    value="{{ old('slug', $post->slug) }}" 
                    class="block w-full mt-2 px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 text-sm text-gray-900 @error('slug') border-red-500 @enderror" 
                    placeholder="Enter the post slug"
                >
                @error('slug')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Category Input -->
            <div class="mb-6">
                <label for="category" class="block text-lg font-medium text-gray-700">Category</label>
                <select 
                    name="category_id" 
                    id="category" 
                    required 
                    class="block w-full mt-2 px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 text-sm text-gray-900">
                    <option value="" disabled>Select a category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Body Input -->
            <div class="mb-6">
                <label for="body" class="block text-lg font-medium text-gray-700">Body</label>
                <input 
                    id="body" 
                    type="hidden" 
                    name="body" 
                    value="{{ old('body', $post->body) }}"
                >
                <trix-editor 
                    input="body" 
                    class="mt-2 text-sm text-gray-900 border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 @error('body') border-red-500 @enderror">
                </trix-editor>
                @error('body')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <!-- Buttons -->
            <div class="flex justify-between items-center mt-8">
                <!-- Back Button -->
                <a 
                    href="javascript:void(0);" 
                    onclick="window.history.back();" 
                    class="text-gray-600 hover:text-blue-600 border border-gray-300 hover:border-blue-300 bg-white px-6 py-3 rounded-lg text-sm font-medium shadow-md transition-all duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 inline-block mr-2" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M15 18l-6-6 6-6"></path>
                    </svg>
                    Back
                </a>
                
                <!-- Update Post Button -->
                <button 
                    type="submit" 
                    class="text-white bg-blue-600 hover:bg-blue-700 px-8 py-3 rounded-lg text-sm font-medium shadow-md transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                    Update Post
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

    // Disable file upload for Trix editor
    document.addEventListener('trix-file-accept', function(e) {
        e.preventDefault();
    });
</script>
@endsection
