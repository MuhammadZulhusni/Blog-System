<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog System Dashboard</title>
    @vite('resources/css/app.css')
    <link rel="icon" href="https://www.svgrepo.com/show/378808/firefox-developer-edition-57-70.svg" type="image/x-icon">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.1/dist/cdn.min.js"></script>

    <!-- Trix Editor -->
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.8/dist/trix.css">
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>

    <!-- For chart -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Buang button upload file di text editor form -->
    <style>
        trix-toolbar [data-trix-button-group="file-tools"]{
            display: none;
        }
    </style>
</head>

<body class="bg-gray-100">
    <div x-data="{ open: false }" class="min-h-screen flex">
        @include('backend.dashboard.layouts.sidebar')

        <!-- Main Content -->
        <div class="flex-1 flex flex-col">
            <!-- Mobile Menu Button -->
            <div class="md:hidden">
                <button @click="open = !open" class="p-4 text-gray-600 hover:text-gray-900">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                </button>
            </div>

            <!-- Page Content -->
            <main class="flex-1 p-6">
                @yield('container')
            </main>
        </div>
    </div>
</body>
</html>
