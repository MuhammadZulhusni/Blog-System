<nav class="bg-gray-800" x-data="{ isOpen: false, currentPage: window.location.pathname }">
    <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
        <div class="relative flex h-16 items-center justify-between">
            <!-- Logo -->
            <div class="flex items-center">
                <a href="/" class="flex-shrink-0">
                    <img class="h-8 w-auto" src="https://cdn-icons-png.flaticon.com/128/7914/7914881.png">
                </a>
            </div>
            <!-- Desktop Menu -->
            <div class="hidden sm:flex sm:items-center sm:justify-center sm:space-x-4">
                <a href="/" :class="{'bg-gray-900 text-white': currentPage === '/', 'text-gray-300 hover:bg-gray-700 hover:text-white': currentPage !== '/'}" class="rounded-md px-3 py-2 text-sm font-medium">Home</a>
                <a href="/about" :class="{'bg-gray-900 text-white': currentPage === '/about', 'text-gray-300 hover:bg-gray-700 hover:text-white': currentPage !== '/about'}" class="rounded-md px-3 py-2 text-sm font-medium">About</a>
                <a href="/blog" :class="{'bg-gray-900 text-white': currentPage === '/blog', 'text-gray-300 hover:bg-gray-700 hover:text-white': currentPage !== '/blog'}" class="rounded-md px-3 py-2 text-sm font-medium">Blog</a>
                <a href="/categories" :class="{'bg-gray-900 text-white': currentPage === '/categories', 'text-gray-300 hover:bg-gray-700 hover:text-white': currentPage !== '/categories'}" class="rounded-md px-3 py-2 text-sm font-medium">Categories</a>
            </div>
            <!-- Login Button -->
            <a href="/login" class="flex items-center rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">
                <img src="{{ asset('https://www.svgrepo.com/show/449958/user.svg') }}" alt="Login Icon" class="w-5 h-5 mr-2">
                <span>Login</span>
            </a>
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
    <div class="sm:hidden" x-show="isOpen" @click.away="isOpen = false">
        <div class="space-y-1 px-2 pb-3 pt-2">
            <a href="/" :class="{'bg-gray-900 text-white': currentPage === '/', 'text-gray-300 hover:bg-gray-700 hover:text-white': currentPage !== '/'}" class="block rounded-md px-3 py-2 text-base font-medium">Home</a>
            <a href="/about" :class="{'bg-gray-900 text-white': currentPage === '/about', 'text-gray-300 hover:bg-gray-700 hover:text-white': currentPage !== '/about'}" class="block rounded-md px-3 py-2 text-base font-medium">About</a>
            <a href="/blog" :class="{'bg-gray-900 text-white': currentPage === '/blog', 'text-gray-300 hover:bg-gray-700 hover:text-white': currentPage !== '/blog'}" class="block rounded-md px-3 py-2 text-base font-medium">Blog</a>
            <a href="/categories" :class="{'bg-gray-900 text-white': currentPage === '/categories', 'text-gray-300 hover:bg-gray-700 hover:text-white': currentPage !== '/categories'}" class="block rounded-md px-3 py-2 text-base font-medium">Categories</a>
        </div>
    </div>
</nav>
