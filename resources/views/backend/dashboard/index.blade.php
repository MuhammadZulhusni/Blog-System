@extends('backend.dashboard.layouts.main')

@section('container')
    <div class="py-8">

        <!-- Welcome Section -->
        <div class="mb-12 text-center">
            <div class="bg-gradient-to-r from-blue-950 to-blue-800 p-10 rounded-lg shadow-lg border-2 border-transparent 
                hover:shadow-xl hover:border-blue-600 transition-all duration-300 ease-in-out">
                
                <h1 class="text-4xl font-bold text-white">
                    Welcome, {{ auth()->user()->username }}! 👋
                </h1>

                <p class="text-xl text-gray-200 mt-4">
                    It's fantastic to see you. You're logged in as <strong class="text-blue-300">{{ auth()->user()->name }}</strong> ({{ auth()->user()->email }})
                </p>

                <img src="https://cdn-icons-png.flaticon.com/256/7259/7259543.png" alt="Welcome Icon" class="w-32 h-32 mt-6 mx-auto rounded-full shadow-xl">

                <p class="text-lg text-gray-300 mt-4">
                    We're so glad you're here! Take a look around, and let’s make something amazing together.
                </p>
            </div>

            <hr class="border-blue-600 my-6">
        </div>

        <!-- Stats Section -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 mb-12">

            <!-- Post Count -->
            <div class="bg-purple-50 border-2 border-purple-500 text-gray-900 p-8 rounded-xl shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:scale-105 flex flex-col justify-between h-full mb-10">
                <img src="https://www.svgrepo.com/show/444877/article.svg" alt="Post Icon" class="h-16 w-16 mb-6">
                <div>
                    <h3 class="text-2xl font-extrabold text-purple-600">Your Posts</h3>
                    @if ($totalPosts > 0)
                        <p class="text-4xl font-extrabold text-gray-800 mt-4">{{ $totalPosts }}</p>
                        <p class="text-lg text-gray-700 mt-1">You've written <span class="font-bold text-green-600">{{ $totalPosts }}</span> posts! Keep going!</p>
                    @else
                        <p class="text-lg text-gray-700 mt-4">You haven't written any posts yet.</p>
                        <p class="text-lg text-gray-700 mt-1">Start by creating your first blog post!</p>
                    @endif
                </div>
                @if ($totalPosts > 0)
                    <a href="{{ url('/dashboard/posts') }}" class="mt-6 inline-block bg-purple-600 text-white text-lg font-semibold py-4 px-8 rounded-lg shadow-xl hover:bg-purple-700 hover:scale-105 transition-all duration-300 self-center">View All Posts</a>
                @else
                    <a href="{{ url('/dashboard/posts/create') }}" class="mt-6 inline-block bg-purple-600 text-white text-lg font-semibold py-4 px-8 rounded-lg shadow-xl hover:bg-purple-700 hover:scale-105 transition-all duration-300 self-center">Create Your First Post</a>
                @endif
            </div>

            <!-- Latest Post Section -->
            <div class="bg-purple-50 border-2 border-purple-500 text-gray-900 p-8 rounded-xl shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:scale-105 flex flex-col justify-between h-full mb-10">
                <img src="https://cdn-icons-png.flaticon.com/128/16493/16493564.png" alt="Latest Post Icon" class="h-16 w-16 mb-6">
                <div>
                    <h3 class="text-2xl font-extrabold text-purple-600">Latest Post</h3>
                    @if ($latestPost)
                        <p class="text-lg text-gray-700 mt-4">Check out your latest post:</p>
                        <p class="text-lg font-bold text-green-600">{{ $latestPost->title }}</p>
                        <p class="text-lg text-gray-700 mt-1">Published on: <span class="font-bold text-green-600">{{ $latestPost->created_at->format('F j, Y') }}</span></p>
                    @else
                        <p class="text-lg text-gray-700 mt-4">You haven't created any posts yet.</p>
                    @endif
                </div>
                <a href="/dashboard/posts/{{ $latestPost->slug ?? '#' }}" class="mt-6 inline-block bg-purple-600 text-white text-lg font-semibold py-4 px-8 rounded-lg shadow-xl hover:bg-purple-700 hover:scale-105 transition-all duration-300 self-center">View Post</a>
            </div>

            <!-- Total Words Written -->
            <div class="bg-purple-50 border-2 border-purple-500 text-gray-900 p-8 rounded-xl shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:scale-105 flex flex-col justify-between h-full mb-10">
                <img src="https://cdn-icons-png.flaticon.com/128/1188/1188519.png" alt="Word Count Icon" class="h-16 w-16 mb-6">
                <div>
                    <h3 class="text-2xl font-extrabold text-purple-600">Total Words Written</h3>
                    @if ($totalWords > 0)
                        <p class="text-4xl font-extrabold text-gray-800 mt-4">{{ $totalWords }}</p>
                        <p class="text-lg text-gray-700 mt-1">You’ve written a total of <span class="font-bold text-green-600">{{ $totalWords }}</span> words across all your posts!</p>
                    @else
                        <p class="text-lg text-gray-700 mt-4">You haven’t written any words yet. Start blogging today!</p>
                    @endif
                </div>
                @if ($totalPosts > 0)
                    <a href="{{ url('/dashboard/posts') }}" class="mt-6 inline-block bg-purple-600 text-white text-lg font-semibold py-4 px-8 rounded-lg shadow-xl hover:bg-purple-700 hover:scale-105 transition-all duration-300 self-center">View Posts</a>
                @else
                    <a href="{{ url('/dashboard/posts/create') }}" class="mt-6 inline-block bg-purple-600 text-white text-lg font-semibold py-4 px-8 rounded-lg shadow-xl hover:bg-purple-700 hover:scale-105 transition-all duration-300 self-center">Start Writing</a>
                @endif
            </div>

            <!-- Longest Post Section -->
            <div class="bg-orange-50 border-2 border-orange-500 text-gray-900 p-8 rounded-xl shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:scale-105 flex flex-col justify-between h-full mb-10">
                <img src="https://cdn-icons-png.flaticon.com/128/2620/2620540.png" alt="Longest Post Icon" class="h-16 w-16 mb-6">
                <div>
                    <h3 class="text-2xl font-extrabold text-orange-600">Longest Post</h3>
                    @if ($longestPost)
                        <p class="text-lg text-gray-700 mt-4">Your longest post is:</p>
                        <p class="text-lg font-bold text-green-600">{{ $longestPost->title }}</p>
                        <p class="text-lg text-gray-700 mt-1">It contains <span class="font-bold text-green-600">{{ Str::wordCount($longestPost->body) }}</span> words.</p>
                    @else
                        <p class="text-lg text-gray-700 mt-4">You haven't written any posts yet.</p>
                    @endif
                </div>
                @if ($longestPost)
                    <a href="/dashboard/posts/{{ $longestPost->slug }}" class="mt-6 inline-block bg-orange-600 text-white text-lg font-semibold py-4 px-8 rounded-lg shadow-xl hover:bg-orange-700 hover:scale-105 transition-all duration-300 self-center">View Longest Post</a>
                @else
                    <a href="{{ url('/dashboard/posts/create') }}" class="mt-6 inline-block bg-orange-600 text-white text-lg font-semibold py-4 px-8 rounded-lg shadow-xl hover:bg-orange-700 hover:scale-105 transition-all duration-300 self-center">Create Your First Post</a>
                @endif
            </div>

            <!-- Shortest Post Section -->
            <div class="bg-orange-50 border-2 border-orange-500 text-gray-900 p-8 rounded-xl shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:scale-105 flex flex-col justify-between h-full mb-10">
                <img src="https://cdn-icons-png.flaticon.com/128/2332/2332998.png" alt="Shortest Post Icon" class="h-16 w-16 mb-6">
                <div>
                    <h3 class="text-2xl font-extrabold text-orange-600">Shortest Post</h3>
                    @if ($shortestPost)
                        <p class="text-lg text-gray-700 mt-4">Your shortest post is:</p>
                        <p class="text-lg font-bold text-green-600">{{ $shortestPost->title }}</p>
                        <p class="text-lg text-gray-700 mt-1">It contains <span class="font-bold text-green-600">{{ Str::wordCount($shortestPost->body) }}</span> words.</p>
                    @else
                        <p class="text-lg text-gray-700 mt-4">You haven't written any posts yet.</p>
                    @endif
                </div>
                @if ($shortestPost)
                    <a href="/dashboard/posts/{{ $shortestPost->slug }}" class="mt-6 inline-block bg-orange-600 text-white text-lg font-semibold py-4 px-8 rounded-lg shadow-xl hover:bg-orange-700 hover:scale-105 transition-all duration-300 self-center">View Shortest Post</a>
                @else
                    <a href="{{ url('/dashboard/posts/create') }}" class="mt-6 inline-block bg-orange-600 text-white text-lg font-semibold py-4 px-8 rounded-lg shadow-xl hover:bg-orange-700 hover:scale-105 transition-all duration-300 self-center">Create Your First Post</a>
                @endif
            </div>

            <!-- New Post Button -->
            <div class="bg-orange-50 border-2 border-orange-500 text-gray-900 p-8 rounded-xl shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:scale-105 flex flex-col justify-between h-full mb-10">
                <img src="https://www.svgrepo.com/show/463480/create-note-alt.svg" alt="Create Post Icon" class="h-16 w-16 mb-6">
                <div>
                    <h3 class="text-2xl font-extrabold text-orange-600">Create Your Next Blog Post</h3>
                    <p class="text-lg text-gray-700 mt-4">Ready to share your thoughts with the world? Start writing your post now and inspire your readers!</p>
                </div>
                <a href="{{ url('/dashboard/posts/create') }}" class="mt-6 inline-block bg-orange-600 text-white text-lg font-semibold py-4 px-8 rounded-lg shadow-xl hover:bg-orange-700 hover:scale-105 transition-all duration-300 self-center">Create Your Post</a>
            </div>
        </div>

        <!-- Post Distribution by Category Section -->
        <div class="bg-white border-2 border-indigo-500 text-gray-900 p-8 rounded-xl shadow-xl col-span-full mb-10">
            <h3 class="text-3xl font-extrabold text-gray-900 mb-6 text-center">Post Distribution by Category</h3>
            <div id="chartContainer" class="flex justify-center">
                <canvas id="postsCategoryChart" class="w-full max-w-[600px]"></canvas>
            </div>
            <div id="noPostsMessage" class="text-center text-gray-500 hidden">No posts available yet. Add some posts to see the distribution!</div>
        </div>

        <!-- How to Use the Blog System Section -->
        <div class="bg-white border-2 border-teal-500 text-gray-900 p-8 rounded-xl shadow-xl hover:shadow-xl transition-all duration-300 mb-12">
            <img src="https://cdn-icons-png.flaticon.com/128/1995/1995574.png" alt="How to Use Icon" class="h-16 w-16 mb-6">
            <h3 class="text-3xl font-extrabold text-gray-900">How to Use This Blog System</h3>
            <p class="mt-4 text-lg text-gray-700">Welcome to the blog management system! Here's a brief guide to help you get started:</p>
            <ul class="list-disc pl-5 mt-4 text-gray-700 space-y-2">
                <li><strong>Create a Post:</strong> Click the "Create New Post" button to begin writing your blog post. Once done, you can edit or publish it.</li>
                <li><strong>View Your Posts:</strong> In the "Your Posts" section, you can see all the posts you've created. You can click on any post to view or edit it.</li>
                <li><strong>Manage Categories:</strong> Organize your posts by categories to help readers find relevant content more easily.</li>
            </ul>
            <p class="mt-6 text-lg text-gray-700">If you need any assistance, feel free to reach out to the admin or check the help section for more tips.</p>
        </div>

        <!-- Help Section -->
        <div class="bg-white border-2 border-pink-500 text-gray-900 p-8 rounded-xl shadow-xl hover:shadow-xl transition-all duration-300 mt-12">
            <img src="https://cdn-icons-png.flaticon.com/128/16754/16754867.png" alt="Need Help Icon" class="h-16 w-16 mb-6">
            <h3 class="text-3xl font-extrabold text-gray-900">Need Help?</h3>
            <p class="mt-4 text-lg text-gray-700">If you need further assistance or have any questions, the following resources may help:</p>
            <ul class="list-disc pl-5 mt-4 text-gray-700 space-y-2">
                <li><strong>Help Center:</strong> Visit the <a href="https://github.com/MuhammadZulhusni" class="text-blue-600 hover:text-blue-800">Help Center</a> for frequently asked questions and guides.</li>
                <li><strong>Contact Support:</strong> Reach out to our support team via email at <a href="mailto:zulhusnifamile@example.com" class="text-blue-600 hover:text-blue-800">zulhusnifamile@example.com</a>.</li>
            </ul>
            <p class="mt-6 text-lg text-gray-700">We're here to help you get the most out of the blog management system!</p>
        </div>
    </div>

      <!-- Floating Help Button -->
      <div x-data="{ openModal: false }" class="fixed bottom-6 right-6">
            <button
                type="button"
                class="w-20 h-20 flex items-center justify-center bg-purple-600 hover:bg-purple-700 text-white rounded-full shadow-lg focus:outline-none focus:ring-2 focus:ring-purple-600 focus:ring-opacity-50 transition-transform duration-300 transform hover:scale-110"
                @click="openModal = true">
                <img src="https://cdn-icons-png.flaticon.com/128/4961/4961759.png" alt="Help Icon" class="w-12 h-12">
            </button>

            <!-- Modal (Alpine.js) -->
            <div
                x-show="openModal"
                class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 backdrop-blur-sm"
                x-cloak
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 scale-90"
                x-transition:enter-end="opacity-100 scale-100"
                x-transition:leave="transition ease-in duration-200"
                x-transition:leave-start="opacity-100 scale-100"
                x-transition:leave-end="opacity-0 scale-90"
            >
                <!-- Modal Content -->
                <div class="relative bg-white rounded-xl shadow-lg w-full max-w-md p-6 overflow-hidden">
                    <!-- Close Button -->
                    <button
                        type="button"
                        @click="openModal = false"
                        class="absolute top-3 right-3 text-gray-400 hover:text-gray-600 focus:outline-none">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>

                    <!-- Modal Header -->
                    <div class="text-center">
                        <h2 class="text-2xl font-bold text-gray-900">Contact Customer Support</h2>
                        <p class="mt-2 text-sm text-gray-500">
                            Do you want to open WhatsApp to contact our customer support?
                        </p>
                    </div>

                    <!-- Modal Footer -->
                    <div class="mt-6 flex justify-center space-x-4">
                        <!-- Cancel Button -->
                        <button
                            type="button"
                            @click="openModal = false"
                            class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-medium py-2 px-6 rounded-lg shadow-md transition duration-300 transform hover:scale-105">
                            Cancel
                        </button>

                        <!-- Confirm Button -->
                        <a
                            href="https://wa.me/60182400849"
                            target="_blank"
                            class="bg-purple-600 hover:bg-purple-700 text-white font-medium py-2 px-6 rounded-lg shadow-md transition duration-300 transform hover:scale-105">
                            Confirm
                        </a>
                    </div>
                </div>
            </div>
        </div>


    <!-- Link js file to make bar chart -->
    <script>
    // Pass the PHP data to a JavaScript variable in the Blade template
    const postsPerCategory = @json($postsPerCategoryData);
    </script>

    <!-- Link to external JS file -->
    <script src="{{ asset('js/dashboard.js') }}"></script>  

@endsection