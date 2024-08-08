<aside :class="{ 'translate-x-0': open, '-translate-x-full': !open }" class="fixed inset-y-0 left-0 w-64 bg-gray-900 text-white shadow-lg transform transition-transform duration-300 ease-in-out md:relative md:translate-x-0 z-50">
    <div class="flex items-center justify-between px-4 py-3 border-b border-gray-700">
        <!-- Logo and Company Name -->
        <div class="flex items-center">
            <img class="h-8 w-8" src="https://cdn-icons-png.flaticon.com/128/10290/10290447.png" alt="My System">
            <span class="ml-3 text-xl font-semibold text-white">Blog System</span>
        </div>
        <!-- Close Button -->
        <button @click="open = false" class="md:hidden p-2 text-gray-400 hover:text-white">
            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>
    <nav class="mt-5">
        <a href="/dashboard" class="flex items-center px-4 py-2 {{ request()->is('dashboard') ? 'bg-gray-700 text-blue-500' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}">
            <img src="https://cdn-icons-png.flaticon.com/128/1828/1828673.png" alt="Dashboard Icon" class="w-5 h-5 mr-2">
            Dashboard
        </a>
        <!-- Make sure route sama -->
        <a href="/dashboard/posts" class="flex items-center px-4 py-2 {{ request()->is('dashboard/posts') ? 'bg-gray-700 text-blue-500' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}">
            <img src="https://cdn-icons-png.flaticon.com/128/3389/3389004.png" alt="Posts Icon" class="w-5 h-5 mr-2">
            My Posts
        </a>
        <div class="absolute bottom-0 w-full border-t border-gray-700 mt-5">
            <form method="POST" action="/logout" class="px-4 pb-3">
                @csrf
                <button type="submit" class="w-full px-4 py-2 text-gray-300 hover:text-white text-center transition-colors duration-300 flex flex-col items-center">
                    <img src="https://cdn-icons-png.flaticon.com/128/16470/16470837.png" alt="Logout Icon" class="w-6 h-6 mb-1"> <!-- Increased size -->
                    <span class="font-bold">Logout</span>
                </button>
            </form>
        </div>
    </nav>
</aside>
