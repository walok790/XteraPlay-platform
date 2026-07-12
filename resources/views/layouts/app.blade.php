<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="theme-color" content="#2563eb">
    <title>@yield('title', 'XteraPlay')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        html { -webkit-text-size-adjust: 100%; scroll-behavior: smooth; }
        body { font-family: 'Inter', -apple-system, system-ui, sans-serif; }
        [x-cloak] { display: none !important; }
        ::-webkit-scrollbar { width: 8px; height: 8px; }
        ::-webkit-scrollbar-track { background: #f1f5f9; }
        ::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 4px; }
        ::-webkit-scrollbar-thumb:hover { background: #94a3b8; }
    </style>
    @yield('styles')
</head>
<body class="bg-slate-50 text-slate-900 antialiased">

<nav x-data="{ open: false, notif: false, user: false }" class="fixed top-0 inset-x-0 z-50 bg-white/95 backdrop-blur-md border-b border-slate-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-14 sm:h-16">
            <a href="{{ url('/') }}" class="flex items-center gap-2 shrink-0">
                <div class="w-8 h-8 sm:w-9 sm:h-9 bg-gradient-to-br from-blue-600 to-indigo-600 rounded-lg flex items-center justify-center shadow-sm shadow-blue-500/20">
                    <svg class="w-4 h-4 sm:w-4.5 sm:h-4.5 text-white" fill="currentColor" viewBox="0 0 20 20"><path d="M6.3 2.841A1.5 1.5 0 004 4.11V15.89a1.5 1.5 0 002.3 1.269l9.344-5.89a1.5 1.5 0 000-2.538L6.3 2.84z"/></svg>
                </div>
                <span class="text-base sm:text-lg font-bold text-slate-900">XteraPlay</span>
            </a>

            <div class="hidden md:flex items-center gap-6 lg:gap-8">
                @auth
                    <a href="{{ url('/home') }}" class="text-sm text-slate-600 hover:text-slate-900 font-medium transition">Home</a>
                    <a href="{{ url('/dashboard') }}" class="text-sm text-slate-600 hover:text-slate-900 font-medium transition">Dashboard</a>
                    <a href="{{ url('/bookmarks') }}" class="text-sm text-slate-600 hover:text-slate-900 font-medium transition">Bookmarks</a>
                    <a href="{{ url('/history') }}" class="text-sm text-slate-600 hover:text-slate-900 font-medium transition">History</a>
                    <a href="{{ url('/subscription') }}" class="text-sm text-slate-600 hover:text-slate-900 font-medium transition">Plans</a>
                @else
                    <a href="{{ url('/') }}" class="text-sm text-slate-600 hover:text-slate-900 font-medium transition">Home</a>
                    <a href="{{ url('/') }}#features" class="text-sm text-slate-600 hover:text-slate-900 font-medium transition">Features</a>
                    <a href="{{ url('/') }}#pricing" class="text-sm text-slate-600 hover:text-slate-900 font-medium transition">Pricing</a>
                    <a href="{{ url('/') }}#reviews" class="text-sm text-slate-600 hover:text-slate-900 font-medium transition">Reviews</a>
                    <a href="{{ url('/contact') }}" class="text-sm text-slate-600 hover:text-slate-900 font-medium transition">Contact</a>
                @endauth
            </div>

            <div class="hidden md:flex items-center gap-3">
                @guest
                    <a href="{{ url('/login') }}" class="text-sm text-slate-600 hover:text-slate-900 font-medium transition">Sign In</a>
                    <a href="{{ url('/register') }}" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-lg shadow-sm shadow-blue-500/20 transition">Get Started</a>
                @endguest
                @auth
                    <div class="relative" @click.away="notif = false">
                        <button @click="notif = !notif" class="relative w-9 h-9 flex items-center justify-center text-slate-500 hover:text-slate-900 rounded-lg hover:bg-slate-100 transition">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.4-1.4A2 2 0 0118 14.2V11a6 6 0 00-4-5.7V5a2 2 0 10-4 0v.3C7.7 6.2 6 8.4 6 11v3.2c0 .5-.2 1-.6 1.4L4 17h5m6 0v1a3 3 0 11-6 0v-1"/></svg>
                            <span class="absolute top-1.5 right-1.5 w-2 h-2 bg-red-500 rounded-full ring-2 ring-white"></span>
                        </button>
                        <div x-show="notif" x-cloak x-transition class="absolute right-0 mt-2 w-80 bg-white border border-slate-200 rounded-xl shadow-lg overflow-hidden">
                            <div class="px-4 py-3 border-b border-slate-200 flex items-center justify-between">
                                <p class="text-sm font-semibold text-slate-900">Notifications</p>
                                <span class="px-2 py-0.5 bg-red-100 text-red-700 text-xs font-medium rounded-full">3 new</span>
                            </div>
                            <div class="max-h-72 overflow-y-auto">
                                <div class="px-4 py-3 hover:bg-slate-50 border-b border-slate-100">
                                    <p class="text-sm text-slate-900 font-medium">Welcome to XteraPlay!</p>
                                    <p class="text-xs text-slate-500 mt-0.5">2 hours ago</p>
                                </div>
                                <div class="px-4 py-3 hover:bg-slate-50 border-b border-slate-100">
                                    <p class="text-sm text-slate-900 font-medium">Daily credits refreshed</p>
                                    <p class="text-xs text-slate-500 mt-0.5">5 hours ago</p>
                                </div>
                                <div class="px-4 py-3 hover:bg-slate-50">
                                    <p class="text-sm text-slate-900 font-medium">New feature: Batch downloads</p>
                                    <p class="text-xs text-slate-500 mt-0.5">1 day ago</p>
                                </div>
                            </div>
                            <a href="#" class="block px-4 py-2.5 text-center text-sm text-blue-600 hover:bg-slate-50 border-t border-slate-200 font-medium">View All</a>
                        </div>
                    </div>
                    <div class="relative" @click.away="user = false">
                        <button @click="user = !user" class="w-9 h-9 rounded-full bg-gradient-to-br from-blue-600 to-indigo-600 flex items-center justify-center text-sm font-semibold text-white shadow-sm shadow-blue-500/20">
                            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                        </button>
                        <div x-show="user" x-cloak x-transition class="absolute right-0 mt-2 w-60 bg-white border border-slate-200 rounded-xl shadow-lg overflow-hidden">
                            <div class="px-4 py-3 border-b border-slate-200">
                                <p class="text-sm font-semibold text-slate-900 truncate">{{ Auth::user()->name }}</p>
                                <p class="text-xs text-slate-500 truncate">{{ Auth::user()->email }}</p>
                            </div>
                            <div class="py-1">
                                <a href="{{ url('/dashboard') }}" class="block px-4 py-2 text-sm text-slate-700 hover:bg-slate-50 hover:text-slate-900">Dashboard</a>
                                <a href="{{ url('/subscription') }}" class="block px-4 py-2 text-sm text-slate-700 hover:bg-slate-50 hover:text-slate-900">My Plan</a>
                                <a href="{{ url('/support') }}" class="block px-4 py-2 text-sm text-slate-700 hover:bg-slate-50 hover:text-slate-900">Support</a>
                            </div>
                            <form method="POST" action="{{ url('/logout') }}" class="border-t border-slate-200">
                                @csrf
                                <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-red-50 font-medium">Sign Out</button>
                            </form>
                        </div>
                    </div>
                @endauth
            </div>

            <div class="flex items-center gap-2 md:hidden">
                @auth
                    <a href="{{ url('/dashboard') }}" class="w-8 h-8 rounded-full bg-gradient-to-br from-blue-600 to-indigo-600 flex items-center justify-center text-xs font-semibold text-white">
                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                    </a>
                @endauth
                <button @click="open = !open" class="w-9 h-9 flex items-center justify-center text-slate-600 hover:bg-slate-100 rounded-lg">
                    <svg x-show="!open" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                    <svg x-show="open" x-cloak class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>
        </div>
    </div>

    <div x-show="open" x-cloak x-transition class="md:hidden bg-white border-t border-slate-200">
        <div class="px-4 py-3 space-y-1">
            @auth
                <a href="{{ url('/home') }}" class="block px-3 py-2.5 text-sm text-slate-700 hover:bg-slate-100 rounded-lg font-medium">Home</a>
                <a href="{{ url('/dashboard') }}" class="block px-3 py-2.5 text-sm text-slate-700 hover:bg-slate-100 rounded-lg font-medium">Dashboard</a>
                <a href="{{ url('/bookmarks') }}" class="block px-3 py-2.5 text-sm text-slate-700 hover:bg-slate-100 rounded-lg font-medium">Bookmarks</a>
                <a href="{{ url('/history') }}" class="block px-3 py-2.5 text-sm text-slate-700 hover:bg-slate-100 rounded-lg font-medium">History</a>
                <a href="{{ url('/subscription') }}" class="block px-3 py-2.5 text-sm text-slate-700 hover:bg-slate-100 rounded-lg font-medium">My Plan</a>
                <a href="{{ url('/support') }}" class="block px-3 py-2.5 text-sm text-slate-700 hover:bg-slate-100 rounded-lg font-medium">Support</a>
                <a href="{{ url('/contact') }}" class="block px-3 py-2.5 text-sm text-slate-700 hover:bg-slate-100 rounded-lg font-medium">Contact</a>
                <form method="POST" action="{{ url('/logout') }}" class="pt-2 border-t border-slate-200 mt-2">
                    @csrf
                    <button type="submit" class="block w-full text-left px-3 py-2.5 text-sm text-red-600 hover:bg-red-50 rounded-lg font-medium">Sign Out</button>
                </form>
            @else
                <a href="{{ url('/') }}" class="block px-3 py-2.5 text-sm text-slate-700 hover:bg-slate-100 rounded-lg font-medium">Home</a>
                <a href="{{ url('/') }}#features" class="block px-3 py-2.5 text-sm text-slate-700 hover:bg-slate-100 rounded-lg font-medium">Features</a>
                <a href="{{ url('/') }}#pricing" class="block px-3 py-2.5 text-sm text-slate-700 hover:bg-slate-100 rounded-lg font-medium">Pricing</a>
                <a href="{{ url('/') }}#reviews" class="block px-3 py-2.5 text-sm text-slate-700 hover:bg-slate-100 rounded-lg font-medium">Reviews</a>
                <a href="{{ url('/contact') }}" class="block px-3 py-2.5 text-sm text-slate-700 hover:bg-slate-100 rounded-lg font-medium">Contact</a>
                <div class="pt-2 border-t border-slate-200 mt-2 space-y-1">
                    <a href="{{ url('/login') }}" class="block px-3 py-2.5 text-sm text-slate-700 hover:bg-slate-100 rounded-lg font-medium">Sign In</a>
                    <a href="{{ url('/register') }}" class="block px-3 py-2.5 text-center text-sm font-medium bg-blue-600 hover:bg-blue-700 text-white rounded-lg">Get Started</a>
                </div>
            @endauth
        </div>
    </div>
</nav>

<main class="pt-14 sm:pt-16">
    @yield('content')
</main>

<footer class="bg-white border-t border-slate-200 mt-16 sm:mt-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 sm:py-12">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 mb-8">
            <div class="col-span-2">
                <a href="{{ url('/') }}" class="flex items-center gap-2 mb-4">
                    <div class="w-8 h-8 bg-gradient-to-br from-blue-600 to-indigo-600 rounded-lg flex items-center justify-center">
                        <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20"><path d="M6.3 2.841A1.5 1.5 0 004 4.11V15.89a1.5 1.5 0 002.3 1.269l9.344-5.89a1.5 1.5 0 000-2.538L6.3 2.84z"/></svg>
                    </div>
                    <span class="text-base font-bold text-slate-900">XteraPlay</span>
                </a>
                <p class="text-sm text-slate-600 leading-relaxed max-w-sm">Stream and download videos from Terabox. Fast, secure, reliable — built for creators and everyday users.</p>
                <div class="flex items-center gap-2 mt-4">
                    <a href="#" class="w-8 h-8 border border-slate-200 rounded-lg flex items-center justify-center text-slate-500 hover:text-blue-600 hover:border-blue-300 transition">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/></svg>
                    </a>
                    <a href="#" class="w-8 h-8 border border-slate-200 rounded-lg flex items-center justify-center text-slate-500 hover:text-blue-600 hover:border-blue-300 transition">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/></svg>
                    </a>
                    <a href="#" class="w-8 h-8 border border-slate-200 rounded-lg flex items-center justify-center text-slate-500 hover:text-blue-600 hover:border-blue-300 transition">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M20.317 4.37a19.79 19.79 0 00-4.885-1.515.074.074 0 00-.079.037c-.21.375-.444.864-.608 1.25a18.27 18.27 0 00-5.487 0 12.64 12.64 0 00-.617-1.25.077.077 0 00-.079-.037A19.74 19.74 0 003.677 4.37a.07.07 0 00-.032.027C.533 9.046-.32 13.58.099 18.057a.082.082 0 00.031.057 19.9 19.9 0 005.993 3.03.078.078 0 00.084-.028c.462-.63.874-1.295 1.226-1.994a.076.076 0 00-.041-.106 13.11 13.11 0 01-1.872-.892.077.077 0 01-.008-.128 10.2 10.2 0 00.372-.292.074.074 0 01.077-.01c3.928 1.793 8.18 1.793 12.062 0a.074.074 0 01.078.01c.12.098.246.198.373.292a.077.077 0 01-.006.127 12.3 12.3 0 01-1.873.892.077.077 0 00-.041.107c.36.698.772 1.362 1.225 1.993a.076.076 0 00.084.028 19.84 19.84 0 006.002-3.03.077.077 0 00.032-.054c.5-5.177-.838-9.674-3.549-13.66a.061.061 0 00-.031-.03zM8.02 15.33c-1.183 0-2.157-1.085-2.157-2.419 0-1.333.956-2.419 2.157-2.419 1.21 0 2.176 1.096 2.157 2.42 0 1.333-.956 2.418-2.157 2.418zm7.975 0c-1.183 0-2.157-1.085-2.157-2.419 0-1.333.956-2.419 2.157-2.419 1.21 0 2.176 1.096 2.157 2.42 0 1.333-.946 2.418-2.157 2.418z"/></svg>
                    </a>
                </div>
            </div>
            <div>
                <h4 class="text-sm font-semibold text-slate-900 mb-3">Product</h4>
                <ul class="space-y-2">
                    <li><a href="{{ url('/') }}#features" class="text-sm text-slate-600 hover:text-blue-600 transition">Features</a></li>
                    <li><a href="{{ url('/') }}#pricing" class="text-sm text-slate-600 hover:text-blue-600 transition">Pricing</a></li>
                    <li><a href="{{ url('/') }}#reviews" class="text-sm text-slate-600 hover:text-blue-600 transition">Reviews</a></li>
                    <li><a href="{{ url('/contact') }}" class="text-sm text-slate-600 hover:text-blue-600 transition">Contact</a></li>
                </ul>
            </div>
            <div>
                <h4 class="text-sm font-semibold text-slate-900 mb-3">Legal</h4>
                <ul class="space-y-2">
                    <li><a href="#" class="text-sm text-slate-600 hover:text-blue-600 transition">Privacy</a></li>
                    <li><a href="#" class="text-sm text-slate-600 hover:text-blue-600 transition">Terms</a></li>
                    <li><a href="#" class="text-sm text-slate-600 hover:text-blue-600 transition">Refund</a></li>
                    <li><a href="#" class="text-sm text-slate-600 hover:text-blue-600 transition">DMCA</a></li>
                </ul>
            </div>
        </div>
        <div class="pt-6 border-t border-slate-200 flex flex-col sm:flex-row items-center justify-between gap-3">
            <p class="text-xs text-slate-500">&copy; {{ date('Y') }} XteraPlay. All rights reserved.</p>
            <p class="text-xs text-slate-500">Powered by <span class="text-blue-600 font-medium">XteraPlay Platform</span></p>
        </div>
    </div>
</footer>

</body>
</html>
