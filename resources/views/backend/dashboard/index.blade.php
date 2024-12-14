@extends('backend.dashboard.layouts.main')

@section('container')
    <div class="py-6">
        <!-- Welcome Section -->
        <div class="mb-6">
            <h1 class="text-3xl font-bold text-gray-900">Welcome, {{ auth()->user()->username }} 👋</h1>
            You're logged in as {{ auth()->user()->name }} ({{ auth()->user()->email }})
            <hr class="border-gray-300 mb-6">
        </div>

        <!-- Stats Section -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 mb-6">
            <!-- Post Count -->
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h3 class="text-xl font-semibold text-gray-800">Your Posts</h3>
                <p class="text-2xl font-bold text-indigo-600">0 Posts</p>
                <a href="#" class="mt-4 inline-block text-indigo-600 hover:text-indigo-800">View All Posts</a>
            </div>

            <!-- New Post Button -->
            <div class="bg-white p-6 rounded-lg shadow-md text-center">
                <h3 class="text-xl font-semibold text-gray-800">Create New Post</h3>
                <a href="#" class="mt-4 inline-block bg-indigo-600 text-white rounded-lg py-2 px-6 hover:bg-indigo-700">Create</a>
            </div>
            
            <!-- Recent Activity -->
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h3 class="text-xl font-semibold text-gray-800">Recent Activity</h3>
                <ul class="list-disc pl-5 mt-2">
                    <li>Updated post "Post Title" on Jan 5, 2024</li>
                    <li>Published "Another Post" on Jan 3, 2024</li>
                    <li>Commented on your post "Post Title" on Jan 2, 2024</li>
                </ul>
            </div>
        </div>

        <!-- How to Use the Blog System Section -->
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h3 class="text-xl font-semibold text-gray-800">How to Use This Blog System</h3>
            <p class="mt-2 text-gray-600">Welcome to the blog management system! Here's a brief guide to help you get started:</p>
            <ul class="list-disc pl-5 mt-4 text-gray-600">
                <li><strong>Create a Post:</strong> Click the "Create New Post" button to begin writing your blog post. Once done, you can edit, or publish it.</li>
                <li><strong>View Your Posts:</strong> In the "Your Posts" section, you can see all the posts you've created. You can click on any post to view or edit it.</li>
                <li><strong>Manage Categories:</strong> Organize your posts by categories to help readers find relevant content more easily.</li>
            </ul>
            <p class="mt-4 text-gray-600">If you need any assistance, feel free to reach out to the admin or check the help section for more tips.</p>
        </div>

        <!-- Help Section -->
        <div class="bg-white p-6 rounded-lg shadow-md mt-6">
            <h3 class="text-xl font-semibold text-gray-800">Need Help?</h3>
            <p class="mt-2 text-gray-600">If you need further assistance or have any questions, the following resources may help:</p>
            <ul class="list-disc pl-5 mt-4 text-gray-600">
                <li><strong>Help Center:</strong> Visit the <a href="https://github.com/MuhammadZulhusni" class="text-indigo-600 hover:text-indigo-800">Help Center</a> for frequently asked questions and guides.</li>
                <li><strong>Contact Support:</strong> Reach out to our support team via email at <a href="zulhusnifamile@example.com" class="text-indigo-600 hover:text-indigo-800">zulhusnifamile@example.com</a>.</li>
            </ul>
            <p class="mt-4 text-gray-600">We're here to help you get the most out of the blog management system!</p>
        </div>
    </div>
@endsection
