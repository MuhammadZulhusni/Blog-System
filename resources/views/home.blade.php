@extends('layouts.main')

@section('container')
    <div class="relative bg-gray-900 text-white h-[80vh]"> 
        <!-- Background GIF -->
        <div class="absolute inset-0">
            <img src="https://i.pinimg.com/originals/55/01/60/5501609ee45d514d1f2c4a63502045e2.gif" alt="Background GIF" class="w-full h-full object-cover">
        </div>
        <div class="absolute inset-0 bg-black opacity-60"></div>
        <div class="relative container mx-auto py-16 px-4 sm:px-6 lg:px-8 text-center flex flex-col justify-center h-full">
            <!-- Animated Heading -->
            <h1 class="text-5xl font-extrabold sm:text-6xl lg:text-7xl mb-4 animate-heading">
                Welcome to Blog System
            </h1>
            <!-- Animated Paragraph -->
            <p class="text-lg sm:text-xl lg:text-2xl mb-8 animate-paragraph">
                Discover insightful articles, connect with other writers, and share your thoughts with the world.
            </p>
            <div class="flex justify-center">
                <!-- Animated Button -->
                <a href="/blog" class="inline-block px-6 py-3 text-lg font-semibold text-white border border-white rounded-lg bg-transparent hover:bg-blue-600 hover:border-blue-600 hover:text-white transition duration-300 transform hover:-translate-y-1 hover:scale-105 animate-button">
                    Explore Blog Posts &raquo;
                </a>
            </div>
        </div>
    </div>

    <!-- New Section with Cards and Vertical Blue Lines -->
    <div class="container mx-auto py-16 px-4 sm:px-6 lg:px-8">
        <!-- Section Title -->
        <h2 class="text-3xl font-bold text-center mb-12">Explore Our Blog Features</h2>
        
        <div class="flex flex-col lg:flex-row items-center lg:space-x-8">
            <!-- Card 1 -->
            <div class="bg-white text-gray-900 p-6 rounded-lg shadow-lg mb-8 lg:mb-0">
                <h3 class="text-2xl font-bold mb-4">Featured Articles</h3>
                <p class="text-lg mb-4">Read our most popular and trending articles. Stay updated with the latest insights and thought-provoking content from our writers.</p>
            </div>
            <!-- Vertical Line -->
            <div class="hidden lg:flex items-center">
                <div class="w-1 h-64 bg-blue-600"></div>
            </div>
            <!-- Card 2 -->
            <div class="bg-white text-gray-900 p-6 rounded-lg shadow-lg mb-8 lg:mb-0">
                <h3 class="text-2xl font-bold mb-4">Join the Community</h3>
                <p class="text-lg mb-4">Connect with other writers and readers. Share your thoughts, participate in discussions, and build a network within our blog system.</p>
            </div>
            <!-- Vertical Line -->
            <div class="hidden lg:flex items-center">
                <div class="w-1 h-64 bg-blue-600"></div>
            </div>
            <!-- Card 3 -->
            <div class="bg-white text-gray-900 p-6 rounded-lg shadow-lg mb-8 lg:mb-0">
                <h3 class="text-2xl font-bold mb-4">Submit Your Article</h3>
                <p class="text-lg mb-4">Have something to share? Submit your article to our blog system and reach a wider audience. We welcome contributions from all writers.</p>
            </div>
        </div>
    </div>

    <!-- Divider Line -->
    <div class="my-5 mx-auto w-3/4 h-px bg-gray-400"></div>

    <!-- Blog System Development Journey Section -->
    <div class="relative mx-auto max-w-4xl mt-15">
        <div class="text-center">
            <h2 class="text-3xl sm:text-3xl md:text-4xl tracking-tight text-gray-900 font-extrabold">
                Evolution of Our Blog System
            </h2>
            <p class="mt-4 text-lg leading-8 text-gray-700">The development of our blog system has been a journey of growth and enhancement. From initial planning to implementing core features, each stage has contributed to creating a robust platform for managing blog content. Here's a glimpse into the key milestones and features that have shaped our system.</p>
        </div>
        <div class="relative mt-12">
            <!-- Line in the center -->
            <div class="absolute inset-0 flex justify-center">
                <div class="w-1 bg-blue-600"></div>
            </div>
            <div class="mt-8 space-y-8">
                <div class="relative flex items-center">
                    <div class="flex items-center justify-center w-8 h-8 bg-blue-600 rounded-full shadow-lg text-white font-bold">
                        1
                    </div>
                    <div class="ml-4 pl-8 pr-4 py-4 bg-white shadow-lg rounded-lg w-full relative">
                        <div class="absolute left-0 -ml-2 w-4 h-4 bg-white transform rotate-45"></div>
                        <h3 class="text-xl font-semibold text-blue-700">Initial Planning</h3>
                        <p class="mt-2 text-gray-600">Identified core functionalities and designed the system architecture. Focused on creating a user-friendly platform for managing blog posts.</p>
                    </div>
                </div>
                <div class="relative flex items-center">
                    <div class="flex items-center justify-center w-8 h-8 bg-blue-600 rounded-full shadow-lg text-white font-bold">
                        2
                    </div>
                    <div class="ml-4 pl-8 pr-4 py-4 bg-white shadow-lg rounded-lg w-full relative">
                        <div class="absolute left-0 -ml-2 w-4 h-4 bg-white transform rotate-45"></div>
                        <h3 class="text-xl font-semibold text-blue-700">CRUD Implementation</h3>
                        <p class="mt-2 text-gray-600">Developed the core CRUD functionalities: Create, Read, Update, and Delete for managing blog posts, allowing users to interact with the content dynamically.</p>
                    </div>
                </div>
                <div class="relative flex items-center">
                    <div class="flex items-center justify-center w-8 h-8 bg-blue-600 rounded-full shadow-lg text-white font-bold">
                        3
                    </div>
                    <div class="ml-4 pl-8 pr-4 py-4 bg-white shadow-lg rounded-lg w-full relative">
                        <div class="absolute left-0 -ml-2 w-4 h-4 bg-white transform rotate-45"></div>
                        <h3 class="text-xl font-semibold text-blue-700">Advanced Features</h3>
                        <p class="mt-2 text-gray-600">Enhanced the system with additional features such as user authentication, category management, and search functionality to improve user experience and content organization.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

