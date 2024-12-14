@extends('backend.dashboard.layouts.main')

@section('container')
    <div class="py-8">

        <!-- Welcome Section -->
        <div class="mb-12">
            <h1 class="text-4xl font-extrabold text-gray-900">Welcome, {{ auth()->user()->username }} 👋</h1>
            <p class="text-lg text-gray-700 mt-2">You're logged in as <strong>{{ auth()->user()->name }}</strong> ({{ auth()->user()->email }})</p>
            <hr class="border-gray-300 my-6">
        </div>

        <!-- Stats Section -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 mb-12">

            <!-- Post Count -->
            <div class="bg-blue-50 border-2 border-blue-500 text-gray-900 p-8 rounded-xl shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:scale-105 flex flex-col justify-between h-full">
                <img src="https://www.svgrepo.com/show/444877/article.svg" alt="Post Icon" class="h-16 w-16 mb-6">
                <div>
                    <h3 class="text-2xl font-extrabold text-blue-600">Your Posts</h3>
                    @if ($totalPosts > 0)
                        <p class="text-4xl font-extrabold text-gray-800 mt-4">{{ $totalPosts }}</p>
                        <p class="text-lg text-gray-700 mt-1">You’ve written <span class="font-bold text-green-600">{{ $totalPosts }}</span> posts! Keep going!</p>
                    @else
                        <p class="text-lg text-gray-700 mt-4">You haven’t written any posts yet.</p>
                        <p class="text-lg text-gray-700 mt-1">Start by creating your first blog post!</p>
                    @endif
                </div>
                @if ($totalPosts > 0)
                    <a href="{{ url('/dashboard/posts') }}" class="mt-6 inline-block bg-blue-600 text-white text-lg font-semibold py-4 px-8 rounded-lg shadow-xl hover:bg-blue-700 hover:scale-105 transition-all duration-300 self-center">View All Posts</a>
                @else
                    <a href="{{ url('/dashboard/posts/create') }}" class="mt-6 inline-block bg-blue-600 text-white text-lg font-semibold py-4 px-8 rounded-lg shadow-xl hover:bg-blue-700 hover:scale-105 transition-all duration-300 self-center">Create Your First Post</a>
                @endif
            </div>

            <!-- Latest Post Section -->
            <div class="bg-yellow-50 border-2 border-yellow-500 text-gray-900 p-8 rounded-xl shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:scale-105 flex flex-col justify-between h-full">
                <img src="https://cdn-icons-png.flaticon.com/128/16493/16493564.png" alt="Latest Post Icon" class="h-16 w-16 mb-6">
                <div>
                    <h3 class="text-2xl font-extrabold text-yellow-600">Latest Post</h3>
                    @if ($latestPost)
                        <p class="text-lg text-gray-700 mt-4">Check out your latest post:</p>
                        <p class="text-lg text-green-600">{{ $latestPost->title }}</p>
                        <p class="text-lg text-gray-700 mt-1">Published on: <span class="text-green-600">{{ $latestPost->created_at->format('F j, Y') }}</span></p>
                    @else
                        <p class="text-lg text-gray-700 mt-4">You haven't created any posts yet.</p>
                    @endif
                </div>
                <a href="/dashboard/posts/{{ $latestPost->slug ?? '#' }}" class="mt-6 inline-block bg-yellow-600 text-white text-lg font-semibold py-4 px-8 rounded-lg shadow-xl hover:bg-yellow-700 hover:scale-105 transition-all duration-300 self-center">View Post</a>
            </div>

            <!-- New Post Button -->
            <div class="bg-green-50 border-2 border-green-500 text-gray-900 p-8 rounded-xl shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:scale-105 flex flex-col justify-between h-full">
                <img src="https://www.svgrepo.com/show/463480/create-note-alt.svg" alt="Create Post Icon" class="h-16 w-16 mb-6">
                <div>
                    <h3 class="text-2xl font-extrabold text-green-600">Create Your Next Blog Post</h3>
                    <p class="text-lg text-gray-700 mt-4">Ready to share your thoughts with the world? Start writing your post now and inspire your readers!</p>
                </div>
                <a href="{{ url('/dashboard/posts/create') }}" class="mt-6 inline-block bg-green-600 text-white text-lg font-semibold py-4 px-8 rounded-lg shadow-xl hover:bg-green-700 hover:scale-105 transition-all duration-300 self-center">Create Your Post</a>
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




<!-- Nanti asingkan ke file lain -->
<script>
// Data for categories and posts count (passed from your controller)
const postsPerCategory = @json($postsPerCategoryData);

// Extract category names and post counts
const categories = postsPerCategory.map(item => item.category_name);
const postCounts = postsPerCategory.map(item => item.post_count);

// Color mapping for categories using distinct
const categoryColors = {
    "Programming": "rgba(255, 205, 86, 0.6)",  // Yellow
    "Design": "rgba(153, 102, 255, 0.6)",     // Purple
    "Personal": "rgba(255, 99, 71, 0.6)",     // Tomato Red (distinct from Marketing)
};

// Assign colors dynamically based on category
const colors = categories.map(category => categoryColors[category] || "rgba(255, 205, 86, 0.6)"); // Default to Yellow

// Initialize Chart.js
const ctx = document.getElementById('postsCategoryChart').getContext('2d');
const postsCategoryChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: categories,
        datasets: [{
            data: postCounts,
            backgroundColor: colors,  // Use the mapped colors
            borderColor: colors.map(color => color.replace("0.6", "1")), // Darker border color
            borderWidth: 1,
            hoverBackgroundColor: colors.map(color => color.replace("0.6", "0.8")), // Darker shade on hover
            hoverBorderColor: colors.map(color => color.replace("0.6", "1.0")), // Darker border on hover
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        scales: {
            x: {
                ticks: {
                    font: {
                        size: 14,
                        weight: 'bold',
                    }
                }
            },
            y: {
                ticks: {
                    font: {
                        size: 14,
                        weight: 'bold',
                    },
                    beginAtZero: true
                }
            }
        },
        plugins: {
            legend: {
                display: false // Hide the legend
            }
        }
    }
});

// Show message if there are no posts
if (postCounts.every(count => count === 0)) {
    document.getElementById('noPostsMessage').classList.remove('hidden');
}
</script>
@endsection
