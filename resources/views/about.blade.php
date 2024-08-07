@extends('layouts.main') <!-- Ni akan beritahu halaman ini mengambil/layout dari main.blade.php -->

@section('container')
    <!-- Hero Section 1 -->
    <div class="relative bg-gray-900 text-white h-[80vh]">
        <!-- Background Image -->
        <div class="absolute inset-0">
            <img src="https://mir-s3-cdn-cf.behance.net/project_modules/disp/212b34104893379.5f6cc87656bf0.gif" alt="Hero Image" class="w-full h-full object-cover"">
            <div class="absolute inset-0 bg-black opacity-50"></div>
        </div>
        <!-- Hero Content -->
        <div class="relative z-10 flex flex-col items-center justify-center h-full px-4 text-center">
            <h1 class="text-6xl font-extrabold mb-4">About Us</h1>
            <p class="text-xl mb-8 max-w-3xl">Discover more about our blog system, our mission, and the driving forces behind our work.</p>
            <a href="#main-content" class="inline-block px-6 py-3 text-lg font-semibold text-white border border-white rounded-lg bg-transparent hover:bg-gray-900 hover:border-gray-900 hover:text-white transition duration-300">Explore More</a>
        </div>
    </div>

    <!-- Main Content Section -->
    <div id="main-content" class="max-w-6xl mx-auto px-4 py-16">
        <h2 class="text-4xl font-bold text-gray-900 mb-12 text-center">Our Mission</h2>
        <div class="flex flex-col md:flex-row md:space-x-8">
            <div class="flex-1 bg-white shadow-lg rounded-lg border-l-8 border-blue-600 p-6 mb-8 md:mb-0">
                <h3 class="text-2xl font-semibold text-gray-900 mb-4">Empowering Knowledge</h3>
                <p class="text-lg text-gray-700">Our blog system is dedicated to providing insightful and engaging content on various topics. Our mission is to empower readers with knowledge and foster a community of passionate individuals.</p>
            </div>
            <div class="flex-1 bg-white shadow-lg rounded-lg border-l-8 border-blue-600 p-6 mb-8 md:mb-0">
                <h3 class="text-2xl font-semibold text-gray-900 mb-4">Fostering Community</h3>
                <p class="text-lg text-gray-700">We believe in the power of sharing ideas and stories, and our team works tirelessly to bring valuable content to our audience. Whether you're here to read the latest trends or dive deep into niche subjects, we aim to deliver quality articles that inform and inspire.</p>
            </div>
        </div>
    </div>

    <!-- Hero Section 2: Technology Showcase -->
    <div class="relative bg-gray-900 text-white h-[80vh]">
        <!-- Background Image -->
        <div class="absolute inset-0 overflow-hidde ">
            <div class="absolute inset-0 bg-gradient-to-r bg-gray-900"></div>
        </div>
        <!-- Hero Content -->
        <div class="relative z-10 flex flex-col items-center justify-center h-full px-4 text-center">
            <h1 class="text-5xl font-extrabold mb-4">Powered by Modern Technology</h1>
            <p class="text-lg mb-8 max-w-3xl">Our blog system is built with Laravel and styled using Tailwind CSS, combining powerful backend functionality with sleek, responsive design. Discover why these technologies make our system stand out.</p>
            <a href="#tech-details" class="inline-block px-6 py-3 text-lg font-semibold text-white border border-white rounded-lg bg-transparent hover:bg-gray-900 hover:border-gray-700 hover:text-white transition duration-300">Learn More</a>
        </div>
    </div>

    <!-- Technology Details Section -->
    <div id="tech-details" class="bg-gray py-16">
        <div class="max-w-6xl mx-auto px-4">
            <h2 class="text-3xl font-bold text-gray-900 mb-6 text-center">Why Laravel & Tailwind CSS?</h2>
            <div class="flex flex-col md:flex-row md:space-x-8">
                <div class="flex-1 bg-white shadow-lg rounded-lg border-l-8 border-blue-600 p-6 mb-8 md:mb-0">
                    <h3 class="text-2xl font-semibold text-gray-900 mb-4">Laravel: Powerful Backend</h3>
                    <p class="text-lg text-gray-700">Laravel provides a robust and scalable backend framework, offering elegant syntax and a powerful toolkit for building and managing our blog system's features efficiently. Its built-in functionalities enhance security, ease of development, and maintainability.</p>
                </div>
                <div class="flex-1 bg-white shadow-lg rounded-lg border-l-8 border-blue-600 p-6 mb-8 md:mb-0">
                    <h3 class="text-2xl font-semibold text-gray-900 mb-4">Tailwind CSS: Modern Styling</h3>
                    <p class="text-lg text-gray-700">Tailwind CSS enables us to create custom, responsive designs with ease. Its utility-first approach allows for rapid development of unique styles, ensuring our blog system looks modern and performs well on all devices.</p>
                </div>
            </div>
        </div>
    </div>
@endsection
