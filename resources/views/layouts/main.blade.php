<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog | {{ $title }}</title>
    @vite('resources/css/app.css')
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="icon" href="https://www.svgrepo.com/show/378808/firefox-developer-edition-57-70.svg" type="image/x-icon"> 
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.1/dist/cdn.min.js"></script>
</head>

<body>

     @include('partials.navbar') <!-- Ni akan ambil called file partials/navbar --> 
     
     @yield('container') <!-- Ni akan ambil dari child view like home,about,posts. So it will be difference based on child view data -->

     <!-- <script src="{{ asset('js/script.js') }}"></script> -->
</body>
</html>
 
