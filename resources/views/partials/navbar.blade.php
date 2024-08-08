<nav class="bg-gray-900" x-data="{ isOpen: false, isUserMenuOpen: false, isMenuOpen: false, currentPage: window.location.pathname }">
    <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
        <div class="relative flex h-16 items-center justify-between">
            <!-- Logo -->
            <div class="flex items-center">
                <a href="/" class="flex-shrink-0">
                    <img class="h-8 w-auto" src="https://cdn-icons-png.flaticon.com/128/10290/10290447.png" alt="Logo">
                </a>
            </div>

            <!-- Desktop Navigation Links and Login Button -->
            <div class="hidden sm:flex sm:items-center sm:space-x-6">
                <!-- Dropdown Menu for Navigation Links -->
                @guest
                <div class="relative">
                    <button @click="console.log('Menu button clicked'); isMenuOpen = !isMenuOpen" class="flex items-center text-white rounded-md px-4 py-2 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition-colors duration-300">
                        <span class="mr-2">Menu</span>
                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div x-show="isMenuOpen" @click.away="isMenuOpen = false" class="absolute right-0 mt-2 w-48 bg-gray-800 text-white border border-gray-700 shadow-lg rounded-lg overflow-hidden z-50 transition-opacity duration-300">
                        <div class="py-2">
                            <a href="/" :class="{'bg-gray-900 text-white': currentPage === '/', 'text-gray-300 hover:bg-gray-700': currentPage !== '/'}" class="block px-4 py-2 transition-colors duration-300">Home</a>
                            <a href="/about" :class="{'bg-gray-900 text-white': currentPage === '/about', 'text-gray-300 hover:bg-gray-700': currentPage !== '/about'}" class="block px-4 py-2 transition-colors duration-300">About</a>
                            <a href="/blog" :class="{'bg-gray-900 text-white': currentPage === '/blog', 'text-gray-300 hover:bg-gray-700': currentPage !== '/blog'}" class="block px-4 py-2 transition-colors duration-300">Blog</a>
                            <a href="/categories" :class="{'bg-gray-900 text-white': currentPage === '/categories', 'text-gray-300 hover:bg-gray-700': currentPage !== '/categories'}" class="block px-4 py-2 transition-colors duration-300">Categories</a>
                        </div>
                    </div>
                </div>
                @endguest

                <!-- Login Button -->
                @guest
                <a href="/login" class="flex items-center text-white rounded-md px-4 py-2 bg-gray-900 hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition-colors duration-300">
                    <img src="{{ asset('https://www.svgrepo.com/show/449958/user.svg') }}" alt="Login Icon" class="w-6 h-6 mr-2">
                    <span>Login</span>
                </a>
                @endguest

                @auth
                <!-- User Menu -->
                <div class="relative">
                    <button @click="console.log('Menu button clicked'); isMenuOpen = !isMenuOpen" class="flex items-center text-white rounded-md px-4 py-2 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition-colors duration-300">
                        <img src="{{ asset('https://www.svgrepo.com/show/449958/user.svg') }}" alt="User Icon" class="w-6 h-6 mr-2">
                        <span>Welcome, {{ auth()->user()->name }}</span>
                        <svg class="w-5 h-5 ml-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div x-show="isUserMenuOpen" @click.away="isUserMenuOpen = false" class="absolute right-0 mt-2 w-48 bg-gray-800 text-white border border-gray-700 shadow-lg rounded-lg overflow-hidden z-50 transition-opacity duration-300">
                        <div class="py-2">
                            <a href="/dashboard" :class="{'bg-gray-900 text-white': currentPage === '/dashboard', 'text-gray-300 hover:bg-gray-700': currentPage !== '/dashboard'}" class="block px-4 py-2 transition-colors duration-300">My Dashboard</a>
                            <form method="POST" action="/logout" class="py-2">
                                @csrf
                                <button type="submit" class="block w-full px-4 py-2 text-gray-300 hover:bg-gray-700 transition-colors duration-300">Logout</button>
                            </form>
                        </div>
                    </div>
                </div>
                @endauth
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
            <a href="/dashboard" :class="{'bg-gray-900 text-white': currentPage === '/dashboard', 'text-gray-300 hover:bg-gray-700': currentPage !== '/dashboard'}" class="block rounded-md px-3 py-2 text-base font-medium transition-colors duration-300">My Dashboard</a>
            <form method="POST" action="/logout" class="mt-4">
                @csrf
                <button type="submit" class="block w-full px-4 py-2 text-gray-300 hover:bg-gray-700 transition-colors duration-300">Logout</button>
            </form>
            @else
            <!-- Navigation Links for Guest Users -->
            <a href="/" :class="{'bg-gray-900 text-white': currentPage === '/', 'text-gray-300 hover:bg-gray-700': currentPage !== '/'}" class="block rounded-md px-3 py-2 text-base font-medium transition-colors duration-300">Home</a>
            <a href="/about" :class="{'bg-gray-900 text-white': currentPage === '/about', 'text-gray-300 hover:bg-gray-700': currentPage !== '/about'}" class="block rounded-md px-3 py-2 text-base font-medium transition-colors duration-300">About</a>
            <a href="/blog" :class="{'bg-gray-900 text-white': currentPage === '/blog', 'text-gray-300 hover:bg-gray-700': currentPage !== '/blog'}" class="block rounded-md px-3 py-2 text-base font-medium transition-colors duration-300">Blog</a>
            <a href="/categories" :class="{'bg-gray-900 text-white': currentPage === '/categories', 'text-gray-300 hover:bg-gray-700': currentPage !== '/categories'}" class="block rounded-md px-3 py-2 text-base font-medium transition-colors duration-300">Categories</a>
            <div class="flex justify-center mt-4">
                <a href="/login" class="flex items-center text-white rounded-md px-4 py-2 bg-gray-800 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition-colors duration-300">
                    <img src="{{ asset('https://www.svgrepo.com/show/449958/user.svg') }}" alt="Login Icon" class="w-6 h-6 mr-2">
                    <span>Login</span>
                </a>
            </div>
            @endauth
        </div>
    </div>
</nav>
