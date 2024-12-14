<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog | {{ $title }}</title>
    @vite('resources/css/app.css')
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="icon" href="https://www.svgrepo.com/show/378808/firefox-developer-edition-57-70.svg" type="image/x-icon"> 
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.1/dist/cdn.min.js"></script>
</head>

<body class="flex flex-col min-h-screen">
    @include('partials.navbar') <!-- Navigation bar -->

    <main class="flex-1">
        @yield('container') <!-- Dynamic content -->
    </main>

    @unless (request()->is('login') || request()->is('register'))
        @include('partials.footer') <!-- Footer -->
    @endunless

    <!-- JavaScript file from the public folder -->
    <script src="{{ asset('js/about.js') }}"></script>
</body>
</html>
