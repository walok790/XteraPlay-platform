<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'XteraPlay - Stream & Download Videos')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        'inter': ['Inter', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
    @yield('styles')
</head>
<body class="bg-[#111113] text-white min-h-screen flex flex-col">

    <!-- Navbar -->
    <nav class="fixed top-0 left-0 right-0 z-50 bg-[#111113] border-b border-[#2a2a30]" x-data="{ mobileOpen: false, userDropdown: false }">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <!-- Logo -->
                <div class="flex items-center">
                    <a href="{{ url('/') }}" class="flex items-center space-x-2">
                        <div class="w-8 h-8 bg-gradient-to-br from-indigo-500 to-violet-600 rounded-lg flex items-center justify-center">
                            <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M6.3 2.841A1.5 1.5 0 004 4.11V15.89a1.5 1.5 0 002.3 1.269l9.344-5.89a1.5 1.5 0 000-2.538L6.3 2.84z"/>
                            </svg>
                        </div>
                        <span class="text-xl font-bold text-white">XteraPlay</span>
                    </a>
                </div>

                <!-- Center Navigation (Desktop) -->
                <div class="hidden md:flex items-center space-x-8">
                    @auth
                        <a href="{{ url('/home') }}" class="text-gray-300 hover:text-white transition text-sm font-medium">Home</a>
                    @else
                        <a href="{{ url('/') }}" class="text-gray-300 hover:text-white transition text-sm font-medium">Home</a>
                    @endauth
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-gray-300 hover:text-white transition text-sm font-medium">Dashboard</a>
                        <a href="{{ url('/bookmarks') }}" class="text-gray-300 hover:text-white transition text-sm font-medium">Bookmarks</a>
                        <a href="{{ url('/history') }}" class="text-gray-300 hover:text-white transition text-sm font-medium">History</a>
                    @endauth
                    <a href="{{ url('/subscription') }}" class="text-gray-300 hover:text-white transition text-sm font-medium">Subscription</a>
                    <a href="{{ url('/contact') }}" class="text-gray-300 hover:text-white transition text-sm font-medium">Contact</a>
                </div>

                <!-- Right Side -->
                <div class="hidden md:flex items-center space-x-4">
                    @guest
                        <a href="{{ url('/login') }}" class="text-gray-300 hover:text-white transition text-sm font-medium">Sign In</a>
                        <a href="{{ url('/register') }}" class="px-4 py-2 bg-gradient-to-r from-indigo-500 to-violet-600 text-white text-sm font-medium rounded-lg hover:from-indigo-600 hover:to-violet-700 transition">Get Started</a>
                    @endguest
                    @auth
                        <!-- Notification Bell Dropdown -->
                        <div class="relative" x-data="{ notifOpen: false }" @click.away="notifOpen = false">
                            <button @click="notifOpen = !notifOpen" class="relative text-gray-400 hover:text-white transition focus:outline-none">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                                </svg>
                                <!-- Unread badge -->
                                <span class="absolute -top-1 -right-1 w-2.5 h-2.5 bg-red-500 rounded-full border-2 border-[#111113]"></span>
                            </button>
                            <!-- Notification Dropdown -->
                            <div x-show="notifOpen" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute right-0 mt-2 w-80 bg-[#1a1a1f] border border-[#2a2a30] rounded-xl shadow-xl z-50" style="display: none;">
                                <div class="px-4 py-3 border-b border-[#2a2a30] flex items-center justify-between">
                                    <p class="text-sm font-semibold text-white">Notifications</p>
                                    <span class="px-2 py-0.5 bg-red-500/10 text-red-400 text-xs font-medium rounded-full">3 new</span>
                                </div>
                                <div class="max-h-64 overflow-y-auto">
                                    <div class="px-4 py-3 hover:bg-[#2a2a30] transition border-b border-[#2a2a30]">
                                        <div class="flex items-start space-x-3">
                                            <div class="w-8 h-8 bg-indigo-500/10 rounded-full flex items-center justify-center flex-shrink-0 mt-0.5">
                                                <svg class="w-4 h-4 text-indigo-400" fill="currentColor" viewBox="0 0 20 20"><path d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6z"/></svg>
                                            </div>
                                            <div>
                                                <p class="text-sm text-white">Welcome to XteraPlay!</p>
                                                <p class="text-xs text-gray-500 mt-0.5">2 hours ago</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="px-4 py-3 hover:bg-[#2a2a30] transition border-b border-[#2a2a30]">
                                        <div class="flex items-start space-x-3">
                                            <div class="w-8 h-8 bg-green-500/10 rounded-full flex items-center justify-center flex-shrink-0 mt-0.5">
                                                <svg class="w-4 h-4 text-green-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4 2a1 1 0 011 1v2.101a7.002 7.002 0 0111.601 2.566 1 1 0 11-1.885.666A5.002 5.002 0 005.999 7H9a1 1 0 010 2H4a1 1 0 01-1-1V3a1 1 0 011-1z" clip-rule="evenodd"/></svg>
                                            </div>
                                            <div>
                                                <p class="text-sm text-white">Your daily credits refreshed</p>
                                                <p class="text-xs text-gray-500 mt-0.5">5 hours ago</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="px-4 py-3 hover:bg-[#2a2a30] transition">
                                        <div class="flex items-start space-x-3">
                                            <div class="w-8 h-8 bg-violet-500/10 rounded-full flex items-center justify-center flex-shrink-0 mt-0.5">
                                                <svg class="w-4 h-4 text-violet-400" fill="currentColor" viewBox="0 0 20 20"><path d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM14 11a1 1 0 011 1v1h1a1 1 0 110 2h-1v1a1 1 0 11-2 0v-1h-1a1 1 0 110-2h1v-1a1 1 0 011-1z"/></svg>
                                            </div>
                                            <div>
                                                <p class="text-sm text-white">New feature: Batch downloads</p>
                                                <p class="text-xs text-gray-500 mt-0.5">1 day ago</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="px-4 py-3 border-t border-[#2a2a30]">
                                    <a href="#" class="text-sm text-indigo-400 hover:text-indigo-300 transition font-medium">View All Notifications</a>
                                </div>
                            </div>
                        </div>
                        <!-- User Dropdown -->
                        <div class="relative" @click.away="userDropdown = false">
                            <button @click="userDropdown = !userDropdown" class="w-9 h-9 rounded-full bg-gradient-to-br from-indigo-500 to-violet-600 flex items-center justify-center text-white text-sm font-semibold focus:outline-none">
                                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                            </button>
                            <!-- Dropdown Menu -->
                            <div x-show="userDropdown" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute right-0 mt-2 w-64 bg-[#1a1a1f] border border-[#2a2a30] rounded-xl shadow-xl py-2 z-50" style="display: none;">
                                <div class="px-4 py-3 border-b border-[#2a2a30]">
                                    <p class="text-sm font-semibold text-white">{{ Auth::user()->name }}</p>
                                    <p class="text-xs text-gray-400">{{ Auth::user()->email }}</p>
                                </div>
                                <a href="{{ url('/profile') }}" class="flex items-center px-4 py-2 text-sm text-gray-300 hover:bg-[#2a2a30] hover:text-white transition">
                                    <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                                    My Profile
                                </a>
                                <a href="{{ url('/dashboard') }}" class="flex items-center px-4 py-2 text-sm text-gray-300 hover:bg-[#2a2a30] hover:text-white transition">
                                    <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/></svg>
                                    Dashboard
                                </a>
                                <a href="{{ url('/bookmarks') }}" class="flex items-center px-4 py-2 text-sm text-gray-300 hover:bg-[#2a2a30] hover:text-white transition">
                                    <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"/></svg>
                                    My Bookmarks
                                </a>
                                <a href="{{ url('/history') }}" class="flex items-center px-4 py-2 text-sm text-gray-300 hover:bg-[#2a2a30] hover:text-white transition">
                                    <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                    My History
                                </a>
                                <a href="{{ url('/subscription') }}" class="flex items-center px-4 py-2 text-sm text-gray-300 hover:bg-[#2a2a30] hover:text-white transition">
                                    <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/></svg>
                                    Upgrade Premium
                                </a>
                                <a href="{{ url('/support') }}" class="flex items-center px-4 py-2 text-sm text-gray-300 hover:bg-[#2a2a30] hover:text-white transition">
                                    <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                                    Support
                                </a>
                                <div class="border-t border-[#2a2a30] mt-1 pt-1">
                                    <form method="POST" action="{{ url('/logout') }}">
                                        @csrf
                                        <button type="submit" class="flex items-center w-full px-4 py-2 text-sm text-red-400 hover:bg-[#2a2a30] hover:text-red-300 transition">
                                            <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                                            Logout
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endauth
                </div>

                <!-- Mobile Hamburger -->
                <div class="md:hidden">
                    <button @click="mobileOpen = !mobileOpen" class="text-gray-400 hover:text-white focus:outline-none">
                        <svg x-show="!mobileOpen" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                        </svg>
                        <svg x-show="mobileOpen" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="display: none;">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div x-show="mobileOpen" x-transition class="md:hidden bg-[#1a1a1f] border-t border-[#2a2a30]" style="display: none;">
            <div class="px-4 py-4 space-y-2">
                @auth
                    <a href="{{ url('/home') }}" class="block px-3 py-2 text-gray-300 hover:text-white hover:bg-[#2a2a30] rounded-lg transition text-sm">Home</a>
                @else
                    <a href="{{ url('/') }}" class="block px-3 py-2 text-gray-300 hover:text-white hover:bg-[#2a2a30] rounded-lg transition text-sm">Home</a>
                @endauth
                @auth
                    <a href="{{ url('/dashboard') }}" class="block px-3 py-2 text-gray-300 hover:text-white hover:bg-[#2a2a30] rounded-lg transition text-sm">Dashboard</a>
                    <a href="{{ url('/bookmarks') }}" class="block px-3 py-2 text-gray-300 hover:text-white hover:bg-[#2a2a30] rounded-lg transition text-sm">Bookmarks</a>
                    <a href="{{ url('/history') }}" class="block px-3 py-2 text-gray-300 hover:text-white hover:bg-[#2a2a30] rounded-lg transition text-sm">History</a>
                @endauth
                <a href="{{ url('/subscription') }}" class="block px-3 py-2 text-gray-300 hover:text-white hover:bg-[#2a2a30] rounded-lg transition text-sm">Subscription</a>
                <a href="{{ url('/contact') }}" class="block px-3 py-2 text-gray-300 hover:text-white hover:bg-[#2a2a30] rounded-lg transition text-sm">Contact</a>
                @guest
                    <div class="pt-4 border-t border-[#2a2a30] space-y-2">
                        <a href="{{ url('/login') }}" class="block px-3 py-2 text-gray-300 hover:text-white hover:bg-[#2a2a30] rounded-lg transition text-sm">Sign In</a>
                        <a href="{{ url('/register') }}" class="block px-3 py-2 text-center bg-gradient-to-r from-indigo-500 to-violet-600 text-white rounded-lg text-sm font-medium">Get Started</a>
                    </div>
                @endguest
                @auth
                    <div class="pt-4 border-t border-[#2a2a30] space-y-2">
                        <a href="{{ url('/profile') }}" class="block px-3 py-2 text-gray-300 hover:text-white hover:bg-[#2a2a30] rounded-lg transition text-sm">My Profile</a>
                        <a href="{{ url('/subscription') }}" class="block px-3 py-2 text-gray-300 hover:text-white hover:bg-[#2a2a30] rounded-lg transition text-sm">Upgrade Premium</a>
                        <form method="POST" action="{{ url('/logout') }}">
                            @csrf
                            <button type="submit" class="block w-full text-left px-3 py-2 text-red-400 hover:bg-[#2a2a30] rounded-lg transition text-sm">Logout</button>
                        </form>
                    </div>
                @endauth
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="flex-1 pt-16">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-[#111113] border-t border-[#2a2a30] mt-auto">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Brand -->
                <div>
                    <a href="{{ url('/') }}" class="flex items-center space-x-2 mb-4">
                        <div class="w-8 h-8 bg-gradient-to-br from-indigo-500 to-violet-600 rounded-lg flex items-center justify-center">
                            <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M6.3 2.841A1.5 1.5 0 004 4.11V15.89a1.5 1.5 0 002.3 1.269l9.344-5.89a1.5 1.5 0 000-2.538L6.3 2.84z"/>
                            </svg>
                        </div>
                        <span class="text-lg font-bold text-white">XteraPlay</span>
                    </a>
                    <p class="text-gray-400 text-sm mb-4">Stream and download your favorite videos from Terabox with ease. Fast, secure, and reliable.</p>
                    <div class="flex items-center space-x-3">
                        <a href="#" class="w-8 h-8 bg-[#1a1a1f] border border-[#2a2a30] rounded-lg flex items-center justify-center text-gray-400 hover:text-white transition">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/></svg>
                        </a>
                        <a href="#" class="w-8 h-8 bg-[#1a1a1f] border border-[#2a2a30] rounded-lg flex items-center justify-center text-gray-400 hover:text-white transition">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/></svg>
                        </a>
                        <a href="#" class="w-8 h-8 bg-[#1a1a1f] border border-[#2a2a30] rounded-lg flex items-center justify-center text-gray-400 hover:text-white transition">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
                        </a>
                    </div>
                </div>

                <!-- Product Links -->
                <div>
                    <h3 class="text-white font-semibold mb-4">Product</h3>
                    <ul class="space-y-2">
                        <li><a href="{{ url('/features') }}" class="text-gray-400 hover:text-white text-sm transition">Features</a></li>
                        <li><a href="{{ url('/pricing') }}" class="text-gray-400 hover:text-white text-sm transition">Pricing</a></li>
                        <li><a href="{{ url('/contact') }}" class="text-gray-400 hover:text-white text-sm transition">Contact Us</a></li>
                    </ul>
                </div>

                <!-- Legal Links -->
                <div>
                    <h3 class="text-white font-semibold mb-4">Legal</h3>
                    <ul class="space-y-2">
                        <li><a href="{{ url('/privacy') }}" class="text-gray-400 hover:text-white text-sm transition">Privacy Policy</a></li>
                        <li><a href="{{ url('/terms') }}" class="text-gray-400 hover:text-white text-sm transition">Terms of Service</a></li>
                        <li><a href="{{ url('/refund') }}" class="text-gray-400 hover:text-white text-sm transition">Refund Policy</a></li>
                        <li><a href="{{ url('/dmca') }}" class="text-gray-400 hover:text-white text-sm transition">DMCA</a></li>
                    </ul>
                </div>
            </div>

            <!-- Bottom Bar -->
            <div class="mt-10 pt-8 border-t border-[#2a2a30] flex flex-col sm:flex-row items-center justify-between">
                <p class="text-gray-500 text-sm">&copy; {{ date('Y') }} XteraPlay. All rights reserved.</p>
                <p class="text-gray-500 text-sm mt-2 sm:mt-0">Powered by <span class="text-gray-400">XteraPlay Platform</span></p>
            </div>
        </div>
    </footer>

</body>
</html>
