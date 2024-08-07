<nav class="bg-gray-800" x-data="{ isOpen: false, isUserMenuOpen: false, currentPage: window.location.pathname }">
    <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
        <div class="relative flex h-16 items-center justify-between">
            <!-- Logo -->
            <div class="flex items-center">
                <a href="/" class="flex-shrink-0">
                    <img class="h-8 w-auto" src="https://cdn-icons-png.flaticon.com/128/10290/10290447.png" alt="Logo">
                </a>
            </div>

            <!-- Navigation Links -->
            <div class="hidden sm:flex sm:items-center flex-1 justify-center space-x-4">
                @auth
                <!-- User Menu -->
                <div class="relative">
                    <button @click="isUserMenuOpen = !isUserMenuOpen" class="flex items-center text-white rounded-md px-4 py-2 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                        <img src="{{ asset('https://www.svgrepo.com/show/449958/user.svg') }}" alt="User Icon" class="w-6 h-6 mr-2">
                        <span>Welcome, {{ auth()->user()->name }}</span>
                        <svg class="w-5 h-5 ml-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div x-show="isUserMenuOpen" @click.away="isUserMenuOpen = false" class="absolute right-0 mt-2 w-48 bg-white border border-gray-200 shadow-lg rounded-lg overflow-hidden z-50">
                        <div class="py-2">
                            <a href="/dashboard" :class="{'bg-gray-900 text-white': currentPage === '/dashboard', 'text-gray-800 hover:bg-gray-100': currentPage !== '/dashboard'}" class="block px-4 py-2">My Dashboard</a>
                            <form method="POST" action="/logout" class="py-2">
                                @csrf
                                <button type="submit" class="block w-full px-4 py-2 text-left text-gray-800 hover:bg-gray-100">Logout</button>
                            </form>
                        </div>
                    </div>
                </div>
                @else
                <!-- Navigation Links for Guests -->
                <a href="/" :class="{'bg-gray-900 text-white': currentPage === '/', 'text-gray-300 hover:bg-gray-700': currentPage !== '/'}" class="text-white rounded-md px-4 py-2">Home</a>
                <a href="/about" :class="{'bg-gray-900 text-white': currentPage === '/about', 'text-gray-300 hover:bg-gray-700': currentPage !== '/about'}" class="text-white rounded-md px-4 py-2">About</a>
                <a href="/blog" :class="{'bg-gray-900 text-white': currentPage === '/blog', 'text-gray-300 hover:bg-gray-700': currentPage !== '/blog'}" class="text-white rounded-md px-4 py-2">Blog</a>
                <a href="/categories" :class="{'bg-gray-900 text-white': currentPage === '/categories', 'text-gray-300 hover:bg-gray-700': currentPage !== '/categories'}" class="text-white rounded-md px-4 py-2">Categories</a>
                @endauth
            </div>

            <!-- Login Button -->
            <div class="flex items-center">
                @guest
                <a href="/login" class="flex items-center text-white rounded-md px-4 py-2 bg-gray-800 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                    <img src="{{ asset('https://www.svgrepo.com/show/449958/user.svg') }}" alt="Login Icon" class="w-6 h-6 mr-2">
                    <span>Login</span>
                </a>
                @endguest
            </div>

            <!-- Mobile Menu Button -->
            <div class="-mr-2 flex sm:hidden">
                <button @click="isOpen = !isOpen" type="button" class="inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white">
                    <span class="sr-only">Open main menu</span>
                    <svg x-show="!isOpen" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                    <svg x-show="isOpen" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile menu -->
    <div x-show="isOpen" @click.away="isOpen = false" class="sm:hidden">
        <div class="space-y-1 px-2 pb-3 pt-2 bg-gray-800 text-white">
            @auth
            <!-- Navigation Links for Authenticated Users -->
            <a href="/dashboard" :class="{'bg-gray-900 text-white': currentPage === '/dashboard', 'text-gray-300 hover:bg-gray-700': currentPage !== '/dashboard'}" class="block rounded-md px-3 py-2 text-base font-medium">My Dashboard</a>
            <form method="POST" action="/logout" class="mt-4">
                @csrf
                <button type="submit" class="block w-full px-4 py-2 text-white bg-gray-800 hover:bg-gray-700 rounded-md text-center">Logout</button>
            </form>
            @else
            <!-- Navigation Links for Guest Users -->
            <a href="/" :class="{'bg-gray-900 text-white': currentPage === '/', 'text-gray-300 hover:bg-gray-700': currentPage !== '/'}" class="block rounded-md px-3 py-2 text-base font-medium">Home</a>
            <a href="/about" :class="{'bg-gray-900 text-white': currentPage === '/about', 'text-gray-300 hover:bg-gray-700': currentPage !== '/about'}" class="block rounded-md px-3 py-2 text-base font-medium">About</a>
            <a href="/blog" :class="{'bg-gray-900 text-white': currentPage === '/blog', 'text-gray-300 hover:bg-gray-700': currentPage !== '/blog'}" class="block rounded-md px-3 py-2 text-base font-medium">Blog</a>
            <a href="/categories" :class="{'bg-gray-900 text-white': currentPage === '/categories', 'text-gray-300 hover:bg-gray-700': currentPage !== '/categories'}" class="block rounded-md px-3 py-2 text-base font-medium">Categories</a>
            <div class="flex justify-center mt-4">
                <a href="/login" class="flex items-center text-white rounded-md px-4 py-2 bg-gray-800 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                    <img src="{{ asset('https://www.svgrepo.com/show/449958/user.svg') }}" alt="Login Icon" class="w-6 h-6 mr-2">
                    <span>Login</span>
                </a>
            </div>
            @endauth
        </div>
    </div>
</nav>
