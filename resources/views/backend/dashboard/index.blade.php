@extends('backend.dashboard.layouts.main')

@section('container')
    <div class="py-8">

        <!-- Welcome Section -->
        <div class="mb-12 text-center">
            <div class="relative bg-gradient-to-r from-blue-950 to-blue-800 p-12 rounded-lg shadow-lg border-2 border-transparent 
                hover:shadow-2xl hover:border-blue-500 transition-all duration-300 ease-in-out overflow-hidden">

                <!-- Subtle Background Gradient -->
                <div class="absolute inset-0 bg-gradient-to-br from-blue-700 via-blue-800 to-transparent opacity-20 rounded-lg pointer-events-none"></div>

                <!-- Animated Emoji with Welcome Text -->
                <div class="flex flex-col items-center space-y-4 animate-fadeInUp">
                    <h1 class="text-5xl font-extrabold text-white flex items-center space-x-2">
                        Welcome, {{ auth()->user()->username }}!
                        <img src="https://media.tenor.com/nebZyl8oN7IAAAAi/wave-hello.gif" 
                            alt="wave emoji" class="inline-block w-14 h-14">
                    </h1>

                    <!-- User Info -->
                    <p class="text-lg text-blue-200">
                        You are logged in as 
                        <strong class="text-white">{{ auth()->user()->name }}</strong> 
                        (<span class="text-gray-300">{{ auth()->user()->email }}</span>).
                    </p>
                </div>

                <!-- Divider -->
                <div class="w-16 h-1 bg-blue-400 mx-auto my-6 rounded"></div>

                <!-- Motivational Message -->
                <p class="text-lg text-blue-300 leading-relaxed">
                    Let’s make today productive. Explore, collaborate, and achieve your goals with us.
                </p>

                <!-- Call-to-Action Button -->
                <div class="mt-8">
                    <a href="#stats-section"
                    class="inline-block px-8 py-3 text-blue-600 bg-white font-semibold border-2 border-blue-600 rounded-full shadow-md 
                    hover:bg-blue-600 hover:text-white hover:border-blue-700 hover:shadow-lg transition-all duration-300">
                        View Your Stats
                    </a>
                </div>
            </div>

            <hr class="border-blue-600 my-10">
        </div>

        <!-- Stats Section -->
        <div id="stats-section" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 mb-12">

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
                        <p class="text-4xl font-extrabold text-gray-800 mt-4">{{ number_format($totalWords) }}</p>
                        <p class="text-lg text-gray-700 mt-1">You’ve written a total of <span class="font-bold text-green-600">{{ number_format($totalWords) }}</span> words across all your posts!</p>
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
                        <p class="text-lg text-gray-700 mt-1">It contains <span class="font-bold text-green-600">{{ $longestPostWordCount }}</span> words.</p>
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
                        <p class="text-lg text-gray-700 mt-1">It contains <span class="font-bold text-green-600">{{ $shortestPostWordCount }}</span> words.</p>
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

            <!-- Frequent Categories Section -->
            <div class="bg-orange-50 border-2 border-orange-500 text-gray-900 p-8 rounded-xl shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:scale-105 flex flex-col justify-between h-full mb-10">
                <img src="https://cdn-icons-png.flaticon.com/128/6724/6724239.png" alt="Category Icon" class="h-16 w-16 mb-6">
                <div>
                    <h3 class="text-2xl font-extrabold text-orange-600">Frequent Category</h3>
                    @if ($mostFrequentCategory)
                        <p class="text-lg text-gray-700 mt-4">The category with the most posts is:</p>
                        <p class="text-lg font-bold text-green-600">{{ $mostFrequentCategory->name }}</p>
                    @else
                        <p class="text-lg text-gray-700 mt-4">You haven't written any posts yet.</p>
                    @endif
                </div>
                @if ($mostFrequentCategory)
                    <a href="{{ url('/dashboard/posts') }}" class="mt-6 inline-block bg-orange-600 text-white text-lg font-semibold py-4 px-8 rounded-lg shadow-xl hover:bg-orange-700 hover:scale-105 transition-all duration-300 self-center">View All Categories</a>
                @else
                    <a href="{{ url('/dashboard/posts/create') }}" class="mt-6 inline-block bg-orange-600 text-white text-lg font-semibold py-4 px-8 rounded-lg shadow-xl hover:bg-orange-700 hover:scale-105 transition-all duration-300 self-center">Create Your First Post</a>
                @endif
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
            <p class="mt-4 text-lg text-gray-700">Welcome to your personalized blogging dashboard! Here's a quick guide to help you navigate and make the most of the features:</p>
            <ul class="list-disc pl-5 mt-4 text-gray-700 space-y-2">
                <li><strong>Track Your Progress</strong> View key statistics like the total number of posts, the total words you've written, and your longest post. These stats help you keep track of your blogging journey and motivate you to keep writing.</li>
                <li><strong>Create New Posts</strong> If you haven't written any posts yet, get started by clicking the "Create Your First Post" button. It’s simple and fast to create engaging content for your readers.</li>
                <li><strong>View and Manage Your Posts</strong> Access all your posts in one place by clicking "View All Posts". You can edit, delete, or update them anytime to keep your blog fresh and relevant.</li>
                <li><strong>Check Out Your Latest Post</strong> See your most recent creation highlighted in the Latest Post section. You can easily view or share it to connect with your audience.</li>
                <li><strong>Analyze Your Writing</strong> Dive into insights about your writing habits, like the total word count and details of your longest post, to better understand your writing style and productivity.</li>
            </ul>
            <p class="mt-6 text-lg text-gray-700">By exploring these features, you can stay organized, monitor your progress, and make your blogging journey enjoyable and efficient.</p>
        </div>

        <!-- Help Section -->
        <div class="bg-white border-2 border-pink-500 text-gray-900 p-8 rounded-xl shadow-xl hover:shadow-xl transition-all duration-300 mt-12">
            <img src="https://cdn-icons-png.flaticon.com/128/16754/16754867.png" alt="Need Help Icon" class="h-16 w-16 mb-6">
            <h3 class="text-3xl font-extrabold text-gray-900">Need Help?</h3>
            <p class="mt-4 text-lg text-gray-700">If you’re feeling stuck or have questions about using this blog system, here are some ways to get assistance:</p>
            <ul class="list-disc pl-5 mt-4 text-gray-700 space-y-2">
                <li><strong>Help Center:</strong> Visit the <a href="https://github.com/MuhammadZulhusni" class="text-blue-600 hover:text-blue-800">Help Center</a> for frequently asked questions and guides.</li>
                <li><strong>Contact Support:</strong> Reach out to our support team via email at <a href="mailto:zulhusnifamile@example.com" class="text-blue-600 hover:text-blue-800">zulhusnifamile@example.com</a>.</li>
                <li><strong>Support Button:</strong> You can contact our customer support via WhatsApp by pressing the support button provided.</li>
            </ul>
            <p class="mt-6 text-lg text-gray-700">Remember, whether it’s your first post or your hundredth, we’re here to help you every step of the way. Don’t hesitate to reach out if you need a hand!</p>
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