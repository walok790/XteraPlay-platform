<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="XteraPlay - Stream and play TeraBox videos instantly. Paste your link and watch in HD quality.">
    <title>@yield('title', 'XteraPlay - Stream TeraBox Videos Instantly')</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        'jakarta': ['Plus Jakarta Sans', 'sans-serif'],
                        'inter': ['Inter', 'sans-serif'],
                    },
                    colors: {
                        primary: {
                            50: '#eef2ff',
                            100: '#e0e7ff',
                            200: '#c7d2fe',
                            300: '#a5b4fc',
                            400: '#818cf8',
                            500: '#6366f1',
                            600: '#4f46e5',
                            700: '#4338ca',
                            800: '#3730a3',
                            900: '#312e81',
                        },
                        dark: {
                            50: '#f8fafc',
                            100: '#f1f5f9',
                            200: '#e2e8f0',
                            300: '#cbd5e1',
                            400: '#94a3b8',
                            500: '#64748b',
                            600: '#475569',
                            700: '#334155',
                            800: '#1e293b',
                            900: '#0f172a',
                            950: '#020617',
                        },
                        accent: {
                            green: '#10b981',
                            blue: '#3b82f6',
                            purple: '#8b5cf6',
                            pink: '#ec4899',
                            orange: '#f97316',
                            cyan: '#06b6d4',
                        }
                    }
                }
            }
        }
    </script>

    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        .gradient-text {
            background: linear-gradient(135deg, #6366f1, #8b5cf6, #ec4899);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .glass-card {
            background: rgba(30, 41, 59, 0.5);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(148, 163, 184, 0.1);
        }

        .glow-border {
            box-shadow: 0 0 20px rgba(99, 102, 241, 0.15), inset 0 0 20px rgba(99, 102, 241, 0.05);
        }

        .hero-gradient {
            background: radial-gradient(ellipse at top, rgba(99, 102, 241, 0.15) 0%, transparent 60%),
                        radial-gradient(ellipse at bottom right, rgba(139, 92, 246, 0.1) 0%, transparent 50%);
        }

        .feature-card:hover {
            transform: translateY(-4px);
            border-color: rgba(99, 102, 241, 0.3);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
        }

        .animate-float {
            animation: float 6s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }

        .animate-pulse-slow {
            animation: pulse 3s cubic-bezier(0.4, 0, 0.6, 1) infinite;
        }

        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }
        ::-webkit-scrollbar-track {
            background: #0f172a;
        }
        ::-webkit-scrollbar-thumb {
            background: #334155;
            border-radius: 4px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #475569;
        }
    </style>

    @yield('styles')
</head>
<body class="bg-dark-950 text-white antialiased font-jakarta">
    <!-- Navigation -->
    <nav x-data="{ mobileOpen: false, scrolled: false }"
         x-init="window.addEventListener('scroll', () => { scrolled = window.scrollY > 20 })"
         :class="scrolled ? 'bg-dark-950/90 backdrop-blur-xl shadow-lg shadow-black/20 border-b border-dark-700/50' : 'bg-transparent'"
         class="fixed top-0 left-0 right-0 z-50 transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16 lg:h-20">
                <!-- Logo -->
                <a href="/" class="flex items-center space-x-2 group">
                    <div class="w-9 h-9 bg-gradient-to-br from-primary-500 to-purple-600 rounded-lg flex items-center justify-center shadow-lg shadow-primary-500/20 group-hover:shadow-primary-500/40 transition-shadow">
                        <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M8 5v14l11-7z"/>
                        </svg>
                    </div>
                    <span class="text-xl font-bold text-white">Xtera<span class="text-primary-400">Play</span></span>
                </a>

                <!-- Desktop Navigation -->
                <div class="hidden lg:flex items-center space-x-1">
                    <a href="#home" class="px-4 py-2 text-sm font-medium text-dark-300 hover:text-white rounded-lg hover:bg-dark-800/50 transition-all">Home</a>
                    <a href="#features" class="px-4 py-2 text-sm font-medium text-dark-300 hover:text-white rounded-lg hover:bg-dark-800/50 transition-all">Features</a>
                    <a href="#services" class="px-4 py-2 text-sm font-medium text-dark-300 hover:text-white rounded-lg hover:bg-dark-800/50 transition-all">Services</a>
                    <a href="#pricing" class="px-4 py-2 text-sm font-medium text-dark-300 hover:text-white rounded-lg hover:bg-dark-800/50 transition-all">Pricing</a>
                    <a href="#faq" class="px-4 py-2 text-sm font-medium text-dark-300 hover:text-white rounded-lg hover:bg-dark-800/50 transition-all">FAQ</a>
                    <a href="#contact" class="px-4 py-2 text-sm font-medium text-dark-300 hover:text-white rounded-lg hover:bg-dark-800/50 transition-all">Contact</a>
                </div>

                <!-- Desktop Auth Buttons -->
                <div class="hidden lg:flex items-center space-x-3">
                    <a href="/login" class="px-4 py-2 text-sm font-medium text-dark-300 hover:text-white transition-colors">Sign In</a>
                    <a href="/register" class="px-5 py-2.5 text-sm font-semibold bg-gradient-to-r from-primary-600 to-purple-600 hover:from-primary-500 hover:to-purple-500 text-white rounded-xl shadow-lg shadow-primary-500/25 hover:shadow-primary-500/40 transition-all">
                        Get Started
                    </a>
                </div>

                <!-- Mobile Menu Button -->
                <button @click="mobileOpen = !mobileOpen" class="lg:hidden p-2 rounded-lg text-dark-400 hover:text-white hover:bg-dark-800 transition-colors">
                    <svg x-show="!mobileOpen" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                    <svg x-show="mobileOpen" x-cloak class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div x-show="mobileOpen" x-cloak
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0 -translate-y-2"
             x-transition:enter-end="opacity-100 translate-y-0"
             x-transition:leave="transition ease-in duration-150"
             x-transition:leave-start="opacity-100 translate-y-0"
             x-transition:leave-end="opacity-0 -translate-y-2"
             class="lg:hidden bg-dark-900/95 backdrop-blur-xl border-t border-dark-700/50">
            <div class="px-4 py-4 space-y-1">
                <a href="#home" @click="mobileOpen = false" class="block px-4 py-3 text-sm font-medium text-dark-300 hover:text-white hover:bg-dark-800 rounded-lg transition-colors">Home</a>
                <a href="#features" @click="mobileOpen = false" class="block px-4 py-3 text-sm font-medium text-dark-300 hover:text-white hover:bg-dark-800 rounded-lg transition-colors">Features</a>
                <a href="#services" @click="mobileOpen = false" class="block px-4 py-3 text-sm font-medium text-dark-300 hover:text-white hover:bg-dark-800 rounded-lg transition-colors">Services</a>
                <a href="#pricing" @click="mobileOpen = false" class="block px-4 py-3 text-sm font-medium text-dark-300 hover:text-white hover:bg-dark-800 rounded-lg transition-colors">Pricing</a>
                <a href="#faq" @click="mobileOpen = false" class="block px-4 py-3 text-sm font-medium text-dark-300 hover:text-white hover:bg-dark-800 rounded-lg transition-colors">FAQ</a>
                <a href="#contact" @click="mobileOpen = false" class="block px-4 py-3 text-sm font-medium text-dark-300 hover:text-white hover:bg-dark-800 rounded-lg transition-colors">Contact</a>
                <div class="pt-4 border-t border-dark-700/50 space-y-2">
                    <a href="/login" class="block px-4 py-3 text-sm font-medium text-dark-300 hover:text-white hover:bg-dark-800 rounded-lg transition-colors text-center">Sign In</a>
                    <a href="/register" class="block px-4 py-3 text-sm font-semibold bg-gradient-to-r from-primary-600 to-purple-600 text-white rounded-xl text-center shadow-lg shadow-primary-500/25">Get Started</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-dark-900 border-t border-dark-700/50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 lg:py-16">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 lg:gap-12">
                <!-- Brand -->
                <div class="lg:col-span-1">
                    <a href="/" class="flex items-center space-x-2 mb-4">
                        <div class="w-9 h-9 bg-gradient-to-br from-primary-500 to-purple-600 rounded-lg flex items-center justify-center">
                            <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M8 5v14l11-7z"/>
                            </svg>
                        </div>
                        <span class="text-xl font-bold text-white">Xtera<span class="text-primary-400">Play</span></span>
                    </a>
                    <p class="text-dark-400 text-sm leading-relaxed mb-6">
                        Your ultimate TeraBox video streaming platform. Stream, download, and enjoy content with lightning-fast speeds.
                    </p>
                    <div class="flex items-center space-x-3">
                        <a href="#" class="w-9 h-9 bg-dark-800 hover:bg-primary-600 rounded-lg flex items-center justify-center text-dark-400 hover:text-white transition-all">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/></svg>
                        </a>
                        <a href="#" class="w-9 h-9 bg-dark-800 hover:bg-primary-600 rounded-lg flex items-center justify-center text-dark-400 hover:text-white transition-all">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/></svg>
                        </a>
                        <a href="#" class="w-9 h-9 bg-dark-800 hover:bg-primary-600 rounded-lg flex items-center justify-center text-dark-400 hover:text-white transition-all">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
                        </a>
                        <a href="#" class="w-9 h-9 bg-dark-800 hover:bg-primary-600 rounded-lg flex items-center justify-center text-dark-400 hover:text-white transition-all">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
                        </a>
                    </div>
                </div>

                <!-- Product Links -->
                <div>
                    <h4 class="text-sm font-semibold text-white uppercase tracking-wider mb-4">Product</h4>
                    <ul class="space-y-3">
                        <li><a href="#features" class="text-sm text-dark-400 hover:text-primary-400 transition-colors">Features</a></li>
                        <li><a href="#pricing" class="text-sm text-dark-400 hover:text-primary-400 transition-colors">Pricing</a></li>
                        <li><a href="#" class="text-sm text-dark-400 hover:text-primary-400 transition-colors">API Access</a></li>
                        <li><a href="#" class="text-sm text-dark-400 hover:text-primary-400 transition-colors">Changelog</a></li>
                        <li><a href="#contact" class="text-sm text-dark-400 hover:text-primary-400 transition-colors">Contact Us</a></li>
                    </ul>
                </div>

                <!-- Legal Links -->
                <div>
                    <h4 class="text-sm font-semibold text-white uppercase tracking-wider mb-4">Legal</h4>
                    <ul class="space-y-3">
                        <li><a href="#" class="text-sm text-dark-400 hover:text-primary-400 transition-colors">Privacy Policy</a></li>
                        <li><a href="#" class="text-sm text-dark-400 hover:text-primary-400 transition-colors">Terms of Service</a></li>
                        <li><a href="#" class="text-sm text-dark-400 hover:text-primary-400 transition-colors">Refund Policy</a></li>
                        <li><a href="#" class="text-sm text-dark-400 hover:text-primary-400 transition-colors">DMCA Policy</a></li>
                        <li><a href="#" class="text-sm text-dark-400 hover:text-primary-400 transition-colors">Cookie Policy</a></li>
                    </ul>
                </div>

                <!-- Support Links -->
                <div>
                    <h4 class="text-sm font-semibold text-white uppercase tracking-wider mb-4">Support</h4>
                    <ul class="space-y-3">
                        <li><a href="#faq" class="text-sm text-dark-400 hover:text-primary-400 transition-colors">FAQ</a></li>
                        <li><a href="#" class="text-sm text-dark-400 hover:text-primary-400 transition-colors">Help Center</a></li>
                        <li><a href="#" class="text-sm text-dark-400 hover:text-primary-400 transition-colors">Report a Bug</a></li>
                        <li><a href="#" class="text-sm text-dark-400 hover:text-primary-400 transition-colors">Status Page</a></li>
                        <li><a href="#" class="text-sm text-dark-400 hover:text-primary-400 transition-colors">Community</a></li>
                    </ul>
                </div>
            </div>

            <!-- Bottom Bar -->
            <div class="mt-12 pt-8 border-t border-dark-700/50 flex flex-col sm:flex-row items-center justify-between gap-4">
                <p class="text-sm text-dark-500">&copy; {{ date('Y') }} XteraPlay. All rights reserved.</p>
                <p class="text-sm text-dark-600">Powered by <span class="text-primary-400 font-medium">XteraPlay Platform</span></p>
            </div>
        </div>
    </footer>

    @yield('scripts')
</body>
</html>
