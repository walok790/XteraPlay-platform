@extends('layouts.app')

@section('title', 'XteraPlay - Stream TeraBox Videos Instantly')

@section('content')
<!-- Hero Section -->
<section id="home" class="relative min-h-screen flex items-center justify-center hero-gradient pt-20">
    <!-- Background decorative elements -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute top-1/4 left-1/4 w-96 h-96 bg-primary-500/5 rounded-full blur-3xl"></div>
        <div class="absolute bottom-1/4 right-1/4 w-96 h-96 bg-purple-500/5 rounded-full blur-3xl"></div>
    </div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 lg:py-20">
        <div class="text-center max-w-4xl mx-auto">
            <!-- Badge -->
            <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full glass-card mb-8">
                <span class="w-2 h-2 bg-green-400 rounded-full animate-pulse"></span>
                <span class="text-sm text-dark-300 font-medium">Free to use &bull; No signup required</span>
            </div>

            <!-- Heading -->
            <h1 class="text-4xl sm:text-5xl lg:text-7xl font-extrabold tracking-tight mb-6">
                <span class="text-white">Stream TeraBox</span><br>
                <span class="gradient-text">Videos Instantly</span>
            </h1>

            <!-- Subtitle -->
            <p class="text-lg sm:text-xl text-dark-400 max-w-2xl mx-auto mb-10 leading-relaxed">
                Paste a TeraBox link to stream or download &mdash; no signup required. Lightning-fast, HD quality streaming at your fingertips.
            </p>


            <!-- Search Box -->
            <div x-data="{ link: '', loading: false }" class="max-w-2xl mx-auto mb-8">
                <div class="relative glass-card rounded-2xl p-2 glow-border">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 pl-4">
                            <svg class="w-5 h-5 text-dark-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"/>
                            </svg>
                        </div>
                        <input x-model="link"
                               type="url"
                               placeholder="Paste TeraBox URL here..."
                               class="flex-1 bg-transparent text-white placeholder-dark-500 px-4 py-4 text-sm sm:text-base focus:outline-none font-inter">
                        <button @click="loading = true; setTimeout(() => loading = false, 2000)"
                                :disabled="!link || loading"
                                class="flex-shrink-0 px-6 py-3 bg-gradient-to-r from-primary-600 to-purple-600 hover:from-primary-500 hover:to-purple-500 disabled:opacity-50 disabled:cursor-not-allowed text-white font-semibold text-sm rounded-xl shadow-lg shadow-primary-500/25 hover:shadow-primary-500/40 transition-all mr-1">
                            <span x-show="!loading" class="flex items-center gap-2">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                                Watch Now
                            </span>
                            <span x-show="loading" x-cloak class="flex items-center gap-2">
                                <svg class="animate-spin w-4 h-4" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path>
                                </svg>
                                Loading...
                            </span>
                        </button>
                    </div>
                </div>
            </div>


            <!-- CTA Links -->
            <div class="flex items-center justify-center gap-4 mb-12">
                <span class="inline-flex items-center gap-2 px-4 py-2 glass-card rounded-lg text-sm">
                    <span class="text-dark-400">Daily Credits:</span>
                    <span class="text-white font-bold">5</span>
                </span>
                <span class="inline-flex items-center gap-2 px-4 py-2 bg-green-500/10 border border-green-500/20 rounded-lg text-sm">
                    <span class="w-2 h-2 bg-green-400 rounded-full"></span>
                    <span class="text-green-400 font-medium">5 Free/Day</span>
                </span>
            </div>

            <!-- Upsell Banner -->
            <div class="max-w-lg mx-auto glass-card rounded-xl p-4 flex flex-col sm:flex-row items-center justify-between gap-4">
                <div class="flex items-center gap-3">
                    <span class="text-2xl">&#9889;</span>
                    <div class="text-left">
                        <p class="text-sm font-medium text-white">Want more daily searches?</p>
                        <p class="text-xs text-dark-400">Create a free account for more credits, or upgrade for unlimited.</p>
                    </div>
                </div>
                <div class="flex items-center gap-2">
                    <a href="/register" class="px-4 py-2 text-xs font-semibold bg-primary-600 hover:bg-primary-500 text-white rounded-lg transition-colors">Sign Up Free</a>
                    <a href="/login" class="px-4 py-2 text-xs font-medium text-dark-300 hover:text-white glass-card rounded-lg transition-colors">Login</a>
                </div>
            </div>

            <!-- Quick Feature Pills -->
            <div class="grid grid-cols-2 sm:grid-cols-4 gap-3 mt-12 max-w-2xl mx-auto">
                <div class="glass-card rounded-xl p-4 text-center hover:border-primary-500/30 transition-all">
                    <div class="w-10 h-10 mx-auto mb-2 bg-primary-500/10 rounded-lg flex items-center justify-center">
                        <svg class="w-5 h-5 text-primary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                        </svg>
                    </div>
                    <p class="text-xs font-medium text-dark-300">Instant</p>
                    <p class="text-[10px] text-dark-500">No waiting</p>
                </div>
                <div class="glass-card rounded-xl p-4 text-center hover:border-green-500/30 transition-all">
                    <div class="w-10 h-10 mx-auto mb-2 bg-green-500/10 rounded-lg flex items-center justify-center">
                        <svg class="w-5 h-5 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                        </svg>
                    </div>
                    <p class="text-xs font-medium text-dark-300">Secure</p>
                    <p class="text-[10px] text-dark-500">Private & safe</p>
                </div>
                <div class="glass-card rounded-xl p-4 text-center hover:border-purple-500/30 transition-all">
                    <div class="w-10 h-10 mx-auto mb-2 bg-purple-500/10 rounded-lg flex items-center justify-center">
                        <svg class="w-5 h-5 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 4V2a1 1 0 011-1h8a1 1 0 011 1v2m0 0h4a1 1 0 011 1v2a1 1 0 01-1 1H3a1 1 0 01-1-1V5a1 1 0 011-1h4m0 0V2"/>
                        </svg>
                    </div>
                    <p class="text-xs font-medium text-dark-300">HD Quality</p>
                    <p class="text-[10px] text-dark-500">Up to 1080p</p>
                </div>
                <div class="glass-card rounded-xl p-4 text-center hover:border-cyan-500/30 transition-all">
                    <div class="w-10 h-10 mx-auto mb-2 bg-cyan-500/10 rounded-lg flex items-center justify-center">
                        <svg class="w-5 h-5 text-cyan-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <p class="text-xs font-medium text-dark-300">Mobile Ready</p>
                    <p class="text-[10px] text-dark-500">Any device</p>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Supported Platforms Badge Row -->
<section class="py-12 lg:py-16 relative border-b border-dark-700/30">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-10">
            <p class="text-sm font-medium text-dark-400 uppercase tracking-wider mb-2">Works With All TeraBox Domains</p>
            <h3 class="text-xl sm:text-2xl font-bold text-white">Supported Platforms</h3>
        </div>

        <!-- Scrolling Badge Row -->
        <div class="relative overflow-hidden" x-data="{ offset: 0 }" x-init="setInterval(() => { offset -= 0.5; if (offset <= -50) offset = 0; }, 30)">
            <div class="flex items-center gap-4 sm:gap-6 flex-wrap justify-center">
                <!-- TeraBox -->
                <div class="glass-card rounded-xl px-5 py-3 flex items-center gap-3 hover:border-blue-500/30 transition-all group">
                    <div class="w-8 h-8 bg-blue-500/10 rounded-lg flex items-center justify-center">
                        <svg class="w-5 h-5 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z"/>
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-semibold text-white group-hover:text-blue-400 transition-colors">terabox.com</p>
                        <p class="text-[10px] text-dark-500">Global</p>
                    </div>
                    <span class="ml-2 w-2 h-2 bg-green-400 rounded-full"></span>
                </div>

                <!-- 1024TeraBox -->
                <div class="glass-card rounded-xl px-5 py-3 flex items-center gap-3 hover:border-purple-500/30 transition-all group">
                    <div class="w-8 h-8 bg-purple-500/10 rounded-lg flex items-center justify-center">
                        <svg class="w-5 h-5 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z"/>
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-semibold text-white group-hover:text-purple-400 transition-colors">1024terabox.com</p>
                        <p class="text-[10px] text-dark-500">China/Asia</p>
                    </div>
                    <span class="ml-2 w-2 h-2 bg-green-400 rounded-full"></span>
                </div>

                <!-- TeraBox App -->
                <div class="glass-card rounded-xl px-5 py-3 flex items-center gap-3 hover:border-orange-500/30 transition-all group">
                    <div class="w-8 h-8 bg-orange-500/10 rounded-lg flex items-center justify-center">
                        <svg class="w-5 h-5 text-orange-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-semibold text-white group-hover:text-orange-400 transition-colors">teraboxapp.com</p>
                        <p class="text-[10px] text-dark-500">App Links</p>
                    </div>
                    <span class="ml-2 w-2 h-2 bg-green-400 rounded-full"></span>
                </div>

                <!-- TeraBox Share -->
                <div class="glass-card rounded-xl px-5 py-3 flex items-center gap-3 hover:border-green-500/30 transition-all group">
                    <div class="w-8 h-8 bg-green-500/10 rounded-lg flex items-center justify-center">
                        <svg class="w-5 h-5 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z"/>
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-semibold text-white group-hover:text-green-400 transition-colors">teraboxshare.com</p>
                        <p class="text-[10px] text-dark-500">Share Links</p>
                    </div>
                    <span class="ml-2 w-2 h-2 bg-green-400 rounded-full"></span>
                </div>

                <!-- Freeterabox -->
                <div class="glass-card rounded-xl px-5 py-3 flex items-center gap-3 hover:border-cyan-500/30 transition-all group">
                    <div class="w-8 h-8 bg-cyan-500/10 rounded-lg flex items-center justify-center">
                        <svg class="w-5 h-5 text-cyan-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-semibold text-white group-hover:text-cyan-400 transition-colors">freeterabox.com</p>
                        <p class="text-[10px] text-dark-500">Free Tier</p>
                    </div>
                    <span class="ml-2 w-2 h-2 bg-green-400 rounded-full"></span>
                </div>

                <!-- Mirrobox -->
                <div class="glass-card rounded-xl px-5 py-3 flex items-center gap-3 hover:border-pink-500/30 transition-all group">
                    <div class="w-8 h-8 bg-pink-500/10 rounded-lg flex items-center justify-center">
                        <svg class="w-5 h-5 text-pink-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-semibold text-white group-hover:text-pink-400 transition-colors">mirrobox.com</p>
                        <p class="text-[10px] text-dark-500">Mirror</p>
                    </div>
                    <span class="ml-2 w-2 h-2 bg-green-400 rounded-full"></span>
                </div>
            </div>

            <!-- All supported note -->
            <div class="mt-8 text-center">
                <p class="text-xs text-dark-500 inline-flex items-center gap-2">
                    <svg class="w-4 h-4 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                    All TeraBox regional domains and short-links are fully supported &bull; Auto-detected
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Services Section -->
<section id="services" class="py-20 lg:py-28 relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Section Header -->
        <div class="text-center mb-16">
            <div class="inline-flex items-center gap-2 px-4 py-2 glass-card rounded-full mb-6">
                <svg class="w-4 h-4 text-primary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                </svg>
                <span class="text-sm text-dark-300 font-medium">Our Services</span>
            </div>
            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-white mb-4">Everything You Need</h2>
            <p class="text-lg text-dark-400 max-w-2xl mx-auto">Stream, download, and manage TeraBox content with ease. All tools in one platform.</p>
        </div>

        <!-- Services Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Service 1: Video Downloads -->
            <div class="feature-card glass-card rounded-2xl p-6 transition-all duration-300">
                <div class="w-12 h-12 bg-blue-500/10 rounded-xl flex items-center justify-center mb-5">
                    <svg class="w-6 h-6 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-white mb-2">Video Downloads</h3>
                <p class="text-sm text-dark-400 leading-relaxed">Download TeraBox videos in 480p, 720p, 1080p. Save to your device instantly.</p>
            </div>

            <!-- Service 2: Online Streaming -->
            <div class="feature-card glass-card rounded-2xl p-6 transition-all duration-300">
                <div class="w-12 h-12 bg-orange-500/10 rounded-xl flex items-center justify-center mb-5">
                    <svg class="w-6 h-6 text-orange-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-white mb-2">Online Streaming</h3>
                <p class="text-sm text-dark-400 leading-relaxed">Stream directly in your browser without downloading. Adaptive quality playback.</p>
            </div>

            <!-- Service 3: Link Converter -->
            <div class="feature-card glass-card rounded-2xl p-6 transition-all duration-300">
                <div class="w-12 h-12 bg-green-500/10 rounded-xl flex items-center justify-center mb-5">
                    <svg class="w-6 h-6 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"/>
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-white mb-2">Link Converter</h3>
                <p class="text-sm text-dark-400 leading-relaxed">Convert any TeraBox sharing link to a direct download link. All domains supported.</p>
            </div>


            <!-- Service 4: Batch Processing -->
            <div class="feature-card glass-card rounded-2xl p-6 transition-all duration-300">
                <div class="w-12 h-12 bg-emerald-500/10 rounded-xl flex items-center justify-center mb-5">
                    <svg class="w-6 h-6 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-white mb-2">Batch Processing</h3>
                <p class="text-sm text-dark-400 leading-relaxed">Process multiple links at once. Queue downloads and stream playlists.</p>
            </div>

            <!-- Service 5: Developer API -->
            <div class="feature-card glass-card rounded-2xl p-6 transition-all duration-300">
                <div class="w-12 h-12 bg-purple-500/10 rounded-xl flex items-center justify-center mb-5">
                    <svg class="w-6 h-6 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/>
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-white mb-2">Developer API</h3>
                <p class="text-sm text-dark-400 leading-relaxed">Integrate XteraPlay into your apps with our REST API. Full documentation available.</p>
            </div>

            <!-- Service 6: Privacy First -->
            <div class="feature-card glass-card rounded-2xl p-6 transition-all duration-300">
                <div class="w-12 h-12 bg-pink-500/10 rounded-xl flex items-center justify-center mb-5">
                    <svg class="w-6 h-6 text-pink-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-white mb-2">Privacy First</h3>
                <p class="text-sm text-dark-400 leading-relaxed">We never store your videos or personal information. Zero-log policy.</p>
            </div>
        </div>
    </div>
</section>


<!-- Why XteraPlay Section -->
<section id="features" class="py-20 lg:py-28 bg-dark-900/50 relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Section Header -->
        <div class="text-center mb-16">
            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-white mb-4">Why XteraPlay?</h2>
            <p class="text-lg text-dark-400 max-w-2xl mx-auto">Powerful features for the best experience. Built for speed, security, and convenience.</p>
        </div>

        <!-- Features Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Feature 1 -->
            <div class="feature-card glass-card rounded-2xl p-6 transition-all duration-300">
                <div class="w-12 h-12 bg-yellow-500/10 rounded-xl flex items-center justify-center mb-5">
                    <svg class="w-6 h-6 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-white mb-2">Lightning Fast</h3>
                <p class="text-sm text-dark-400 leading-relaxed">Stream instantly with optimized CDN delivery. No buffering, no waiting.</p>
            </div>

            <!-- Feature 2 -->
            <div class="feature-card glass-card rounded-2xl p-6 transition-all duration-300">
                <div class="w-12 h-12 bg-green-500/10 rounded-xl flex items-center justify-center mb-5">
                    <svg class="w-6 h-6 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-white mb-2">Private & Secure</h3>
                <p class="text-sm text-dark-400 leading-relaxed">End-to-end privacy. Your data is our top priority. No tracking, no logs.</p>
            </div>

            <!-- Feature 3 -->
            <div class="feature-card glass-card rounded-2xl p-6 transition-all duration-300">
                <div class="w-12 h-12 bg-blue-500/10 rounded-xl flex items-center justify-center mb-5">
                    <svg class="w-6 h-6 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 4V2a1 1 0 011-1h8a1 1 0 011 1v2m0 0h4a1 1 0 011 1v2a1 1 0 01-1 1H3a1 1 0 01-1-1V5a1 1 0 011-1h4"/>
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-white mb-2">HD Quality</h3>
                <p class="text-sm text-dark-400 leading-relaxed">Download in 480p to 1080p. Multiple quality options for every connection.</p>
            </div>


            <!-- Feature 4 -->
            <div class="feature-card glass-card rounded-2xl p-6 transition-all duration-300">
                <div class="w-12 h-12 bg-cyan-500/10 rounded-xl flex items-center justify-center mb-5">
                    <svg class="w-6 h-6 text-cyan-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-white mb-2">Mobile Friendly</h3>
                <p class="text-sm text-dark-400 leading-relaxed">Works perfectly on phones, tablets, and desktops. Responsive design everywhere.</p>
            </div>

            <!-- Feature 5 -->
            <div class="feature-card glass-card rounded-2xl p-6 transition-all duration-300">
                <div class="w-12 h-12 bg-indigo-500/10 rounded-xl flex items-center justify-center mb-5">
                    <svg class="w-6 h-6 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"/>
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-white mb-2">Bookmarks</h3>
                <p class="text-sm text-dark-400 leading-relaxed">Save videos to your library. Build playlists and access them anytime.</p>
            </div>

            <!-- Feature 6 -->
            <div class="feature-card glass-card rounded-2xl p-6 transition-all duration-300">
                <div class="w-12 h-12 bg-rose-500/10 rounded-xl flex items-center justify-center mb-5">
                    <svg class="w-6 h-6 text-rose-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-white mb-2">Watch History</h3>
                <p class="text-sm text-dark-400 leading-relaxed">Never lose a video. Full history with search. Resume where you left off.</p>
            </div>
        </div>
    </div>
</section>


<!-- How It Works Section -->
<section class="py-20 lg:py-28 relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-white mb-4">How It Works</h2>
            <p class="text-lg text-dark-400 max-w-2xl mx-auto">Stream TeraBox videos in just 3 simple steps. No account needed.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-4xl mx-auto">
            <!-- Step 1 -->
            <div class="text-center relative">
                <div class="w-16 h-16 mx-auto mb-6 bg-gradient-to-br from-primary-500/20 to-purple-500/20 border border-primary-500/30 rounded-2xl flex items-center justify-center">
                    <span class="text-2xl font-bold gradient-text">1</span>
                </div>
                <h3 class="text-lg font-semibold text-white mb-2">Copy Link</h3>
                <p class="text-sm text-dark-400">Copy any TeraBox video sharing link from the app or website.</p>
                <!-- Connector -->
                <div class="hidden md:block absolute top-8 left-[60%] w-[80%] border-t border-dashed border-dark-600"></div>
            </div>

            <!-- Step 2 -->
            <div class="text-center relative">
                <div class="w-16 h-16 mx-auto mb-6 bg-gradient-to-br from-purple-500/20 to-pink-500/20 border border-purple-500/30 rounded-2xl flex items-center justify-center">
                    <span class="text-2xl font-bold gradient-text">2</span>
                </div>
                <h3 class="text-lg font-semibold text-white mb-2">Paste & Play</h3>
                <p class="text-sm text-dark-400">Paste the link into XteraPlay's search bar and hit Watch Now.</p>
                <!-- Connector -->
                <div class="hidden md:block absolute top-8 left-[60%] w-[80%] border-t border-dashed border-dark-600"></div>
            </div>

            <!-- Step 3 -->
            <div class="text-center">
                <div class="w-16 h-16 mx-auto mb-6 bg-gradient-to-br from-pink-500/20 to-orange-500/20 border border-pink-500/30 rounded-2xl flex items-center justify-center">
                    <span class="text-2xl font-bold gradient-text">3</span>
                </div>
                <h3 class="text-lg font-semibold text-white mb-2">Enjoy</h3>
                <p class="text-sm text-dark-400">Stream in HD or download the video. It's that simple!</p>
            </div>
        </div>
    </div>
</section>


<!-- Pricing Section -->
<section id="pricing" class="py-20 lg:py-28 bg-dark-900/50 relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-white mb-4">Simple Pricing</h2>
            <p class="text-lg text-dark-400 max-w-2xl mx-auto">Start free. Upgrade when needed. No hidden fees.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 max-w-5xl mx-auto" x-data="{ annual: false }">
            <!-- Toggle -->
            <div class="md:col-span-3 flex items-center justify-center gap-3 mb-8">
                <span :class="!annual ? 'text-white' : 'text-dark-400'" class="text-sm font-medium">Monthly</span>
                <button @click="annual = !annual" :class="annual ? 'bg-primary-600' : 'bg-dark-700'" class="relative w-12 h-6 rounded-full transition-colors">
                    <span :class="annual ? 'translate-x-6' : 'translate-x-1'" class="absolute top-1 w-4 h-4 bg-white rounded-full transition-transform"></span>
                </button>
                <span :class="annual ? 'text-white' : 'text-dark-400'" class="text-sm font-medium">Annual <span class="text-green-400 text-xs">(Save 20%)</span></span>
            </div>

            <!-- Free Plan -->
            <div class="glass-card rounded-2xl p-8 relative">
                <h3 class="text-lg font-semibold text-white mb-2">Free</h3>
                <p class="text-sm text-dark-400 mb-6">Perfect to get started</p>
                <div class="mb-6">
                    <span class="text-4xl font-bold text-white">$0</span>
                    <span class="text-dark-400 text-sm">/month</span>
                </div>
                <ul class="space-y-3 mb-8">
                    <li class="flex items-center gap-3 text-sm text-dark-300">
                        <svg class="w-4 h-4 text-green-400 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                        5 streams per day
                    </li>
                    <li class="flex items-center gap-3 text-sm text-dark-300">
                        <svg class="w-4 h-4 text-green-400 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                        480p & 720p quality
                    </li>
                    <li class="flex items-center gap-3 text-sm text-dark-300">
                        <svg class="w-4 h-4 text-green-400 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                        Basic support
                    </li>
                    <li class="flex items-center gap-3 text-sm text-dark-500">
                        <svg class="w-4 h-4 text-dark-600 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/></svg>
                        No batch processing
                    </li>
                </ul>
                <a href="/register" class="block w-full py-3 text-sm font-semibold text-center text-white bg-dark-700 hover:bg-dark-600 rounded-xl transition-colors">
                    Get Started Free
                </a>
            </div>


            <!-- Pro Plan -->
            <div class="glass-card rounded-2xl p-8 relative border-primary-500/30 glow-border">
                <div class="absolute -top-3 left-1/2 -translate-x-1/2 px-4 py-1 bg-gradient-to-r from-primary-600 to-purple-600 rounded-full text-xs font-semibold text-white">
                    Most Popular
                </div>
                <h3 class="text-lg font-semibold text-white mb-2">Pro</h3>
                <p class="text-sm text-dark-400 mb-6">For power users</p>
                <div class="mb-6">
                    <span class="text-4xl font-bold text-white" x-text="annual ? '$7' : '$9'">$9</span>
                    <span class="text-dark-400 text-sm">/month</span>
                </div>
                <ul class="space-y-3 mb-8">
                    <li class="flex items-center gap-3 text-sm text-dark-300">
                        <svg class="w-4 h-4 text-green-400 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                        Unlimited streams
                    </li>
                    <li class="flex items-center gap-3 text-sm text-dark-300">
                        <svg class="w-4 h-4 text-green-400 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                        Full HD 1080p
                    </li>
                    <li class="flex items-center gap-3 text-sm text-dark-300">
                        <svg class="w-4 h-4 text-green-400 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                        Batch processing (10 links)
                    </li>
                    <li class="flex items-center gap-3 text-sm text-dark-300">
                        <svg class="w-4 h-4 text-green-400 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                        Priority support
                    </li>
                    <li class="flex items-center gap-3 text-sm text-dark-300">
                        <svg class="w-4 h-4 text-green-400 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                        Watch history & bookmarks
                    </li>
                </ul>
                <a href="/register" class="block w-full py-3 text-sm font-semibold text-center text-white bg-gradient-to-r from-primary-600 to-purple-600 hover:from-primary-500 hover:to-purple-500 rounded-xl shadow-lg shadow-primary-500/25 transition-all">
                    Upgrade to Pro
                </a>
            </div>

            <!-- Enterprise Plan -->
            <div class="glass-card rounded-2xl p-8 relative">
                <h3 class="text-lg font-semibold text-white mb-2">Enterprise</h3>
                <p class="text-sm text-dark-400 mb-6">For teams & businesses</p>
                <div class="mb-6">
                    <span class="text-4xl font-bold text-white" x-text="annual ? '$19' : '$25'">$25</span>
                    <span class="text-dark-400 text-sm">/month</span>
                </div>
                <ul class="space-y-3 mb-8">
                    <li class="flex items-center gap-3 text-sm text-dark-300">
                        <svg class="w-4 h-4 text-green-400 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                        Everything in Pro
                    </li>
                    <li class="flex items-center gap-3 text-sm text-dark-300">
                        <svg class="w-4 h-4 text-green-400 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                        API access (REST)
                    </li>
                    <li class="flex items-center gap-3 text-sm text-dark-300">
                        <svg class="w-4 h-4 text-green-400 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                        Unlimited batch (50+ links)
                    </li>
                    <li class="flex items-center gap-3 text-sm text-dark-300">
                        <svg class="w-4 h-4 text-green-400 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                        Dedicated support
                    </li>
                    <li class="flex items-center gap-3 text-sm text-dark-300">
                        <svg class="w-4 h-4 text-green-400 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                        Custom integrations
                    </li>
                </ul>
                <a href="/register" class="block w-full py-3 text-sm font-semibold text-center text-white bg-dark-700 hover:bg-dark-600 rounded-xl transition-colors">
                    Contact Sales
                </a>
            </div>
        </div>
    </div>
</section>


<!-- FAQ Section -->
<section id="faq" class="py-20 lg:py-28 relative">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-white mb-4">Frequently Asked Questions</h2>
            <p class="text-lg text-dark-400">Got questions? We've got answers.</p>
        </div>

        <div x-data="{ open: null }" class="space-y-4">
            <!-- FAQ 1 -->
            <div class="glass-card rounded-xl overflow-hidden">
                <button @click="open = open === 1 ? null : 1" class="w-full px-6 py-5 flex items-center justify-between text-left">
                    <span class="text-sm font-medium text-white">What is XteraPlay?</span>
                    <svg :class="open === 1 ? 'rotate-180' : ''" class="w-5 h-5 text-dark-400 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
                <div x-show="open === 1" x-collapse x-cloak class="px-6 pb-5">
                    <p class="text-sm text-dark-400 leading-relaxed">XteraPlay is a platform that allows you to stream and download TeraBox videos directly in your browser. Simply paste a TeraBox sharing link and enjoy instant playback in HD quality.</p>
                </div>
            </div>

            <!-- FAQ 2 -->
            <div class="glass-card rounded-xl overflow-hidden">
                <button @click="open = open === 2 ? null : 2" class="w-full px-6 py-5 flex items-center justify-between text-left">
                    <span class="text-sm font-medium text-white">Is it free to use?</span>
                    <svg :class="open === 2 ? 'rotate-180' : ''" class="w-5 h-5 text-dark-400 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
                <div x-show="open === 2" x-collapse x-cloak class="px-6 pb-5">
                    <p class="text-sm text-dark-400 leading-relaxed">Yes! You get 5 free streams per day without any account. Create a free account for more daily credits, or upgrade to Pro for unlimited access.</p>
                </div>
            </div>

            <!-- FAQ 3 -->
            <div class="glass-card rounded-xl overflow-hidden">
                <button @click="open = open === 3 ? null : 3" class="w-full px-6 py-5 flex items-center justify-between text-left">
                    <span class="text-sm font-medium text-white">Which TeraBox links are supported?</span>
                    <svg :class="open === 3 ? 'rotate-180' : ''" class="w-5 h-5 text-dark-400 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
                <div x-show="open === 3" x-collapse x-cloak class="px-6 pb-5">
                    <p class="text-sm text-dark-400 leading-relaxed">We support all TeraBox sharing link formats including 1024terabox.com, teraboxapp.com, terabox.com, and other regional variants. Just paste any valid sharing link.</p>
                </div>
            </div>

            <!-- FAQ 4 -->
            <div class="glass-card rounded-xl overflow-hidden">
                <button @click="open = open === 4 ? null : 4" class="w-full px-6 py-5 flex items-center justify-between text-left">
                    <span class="text-sm font-medium text-white">Is my data safe?</span>
                    <svg :class="open === 4 ? 'rotate-180' : ''" class="w-5 h-5 text-dark-400 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
                <div x-show="open === 4" x-collapse x-cloak class="px-6 pb-5">
                    <p class="text-sm text-dark-400 leading-relaxed">Absolutely. We don't store any videos or personal browsing data. Links are processed in real-time and discarded immediately. We follow a strict zero-log policy.</p>
                </div>
            </div>

            <!-- FAQ 5 -->
            <div class="glass-card rounded-xl overflow-hidden">
                <button @click="open = open === 5 ? null : 5" class="w-full px-6 py-5 flex items-center justify-between text-left">
                    <span class="text-sm font-medium text-white">Can I use XteraPlay on mobile?</span>
                    <svg :class="open === 5 ? 'rotate-180' : ''" class="w-5 h-5 text-dark-400 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
                <div x-show="open === 5" x-collapse x-cloak class="px-6 pb-5">
                    <p class="text-sm text-dark-400 leading-relaxed">Yes! XteraPlay is fully responsive and works great on all devices - smartphones, tablets, laptops, and desktops. No app download required.</p>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Stats Section -->
<section class="py-16 bg-dark-900/50 border-y border-dark-700/50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
            <div>
                <div class="text-3xl sm:text-4xl font-bold gradient-text mb-2">50K+</div>
                <p class="text-sm text-dark-400">Active Users</p>
            </div>
            <div>
                <div class="text-3xl sm:text-4xl font-bold gradient-text mb-2">1M+</div>
                <p class="text-sm text-dark-400">Videos Streamed</p>
            </div>
            <div>
                <div class="text-3xl sm:text-4xl font-bold gradient-text mb-2">99.9%</div>
                <p class="text-sm text-dark-400">Uptime</p>
            </div>
            <div>
                <div class="text-3xl sm:text-4xl font-bold gradient-text mb-2">4.9/5</div>
                <p class="text-sm text-dark-400">User Rating</p>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials / Reviews Carousel -->
<section class="py-20 lg:py-28 relative overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Section Header -->
        <div class="text-center mb-16">
            <div class="inline-flex items-center gap-2 px-4 py-2 glass-card rounded-full mb-6">
                <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                </svg>
                <span class="text-sm text-dark-300 font-medium">Trusted by Thousands</span>
            </div>
            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-white mb-4">What Our Users Say</h2>
            <p class="text-lg text-dark-400 max-w-2xl mx-auto">Real reviews from real users who love streaming with XteraPlay.</p>
        </div>

        <!-- Carousel -->
        <div x-data="{
            currentSlide: 0,
            totalSlides: 6,
            autoplay: null,
            reviews: [
                { name: 'Rahul K.', role: 'Content Creator', avatar: 'RK', rating: 5, text: 'XteraPlay is a game-changer! I can stream TeraBox videos instantly without any hassle. The HD quality is amazing and there is zero buffering.', color: 'from-blue-500 to-cyan-500' },
                { name: 'Sarah M.', role: 'Student', avatar: 'SM', rating: 5, text: 'Finally a platform that actually works! I use it daily to watch educational content from TeraBox. The free tier is generous enough for my needs.', color: 'from-purple-500 to-pink-500' },
                { name: 'Ahmed T.', role: 'Developer', avatar: 'AT', rating: 5, text: 'The API access is fantastic for my project. Clean documentation and reliable service. XteraPlay handles all the heavy lifting so I can focus on building.', color: 'from-green-500 to-emerald-500' },
                { name: 'Priya S.', role: 'Designer', avatar: 'PS', rating: 4, text: 'Love the clean UI and how fast it processes links. Batch processing saves me so much time. Highly recommend the Pro plan for power users.', color: 'from-orange-500 to-red-500' },
                { name: 'Michael L.', role: 'Freelancer', avatar: 'ML', rating: 5, text: 'Been using XteraPlay for 6 months now. Never had a single issue. Support team responds quickly and the platform is always improving.', color: 'from-indigo-500 to-purple-500' },
                { name: 'Fatima Z.', role: 'Blogger', avatar: 'FZ', rating: 5, text: 'The mobile experience is flawless. I can watch TeraBox content on my phone without downloading large apps. Works perfectly on any browser!', color: 'from-pink-500 to-rose-500' }
            ],
            init() {
                this.autoplay = setInterval(() => { this.next() }, 5000);
            },
            next() {
                this.currentSlide = (this.currentSlide + 1) % this.totalSlides;
            },
            prev() {
                this.currentSlide = (this.currentSlide - 1 + this.totalSlides) % this.totalSlides;
            },
            goTo(index) {
                this.currentSlide = index;
                clearInterval(this.autoplay);
                this.autoplay = setInterval(() => { this.next() }, 5000);
            }
        }" class="relative">

            <!-- Cards Container - shows 1 on mobile, 3 on desktop -->
            <div class="relative overflow-hidden">
                <!-- Desktop View (3 cards) -->
                <div class="hidden lg:grid lg:grid-cols-3 gap-6">
                    <template x-for="(review, index) in reviews.slice(currentSlide, currentSlide + 3).concat(reviews.slice(0, Math.max(0, (currentSlide + 3) - totalSlides)))" :key="index">
                        <div class="glass-card rounded-2xl p-6 transition-all duration-500 hover:border-primary-500/20">
                            <!-- Stars -->
                            <div class="flex items-center gap-1 mb-4">
                                <template x-for="star in review.rating" :key="star">
                                    <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                    </svg>
                                </template>
                                <template x-for="star in (5 - review.rating)" :key="'empty-'+star">
                                    <svg class="w-4 h-4 text-dark-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                    </svg>
                                </template>
                            </div>

                            <!-- Review Text -->
                            <p class="text-sm text-dark-300 leading-relaxed mb-6" x-text="review.text"></p>

                            <!-- Author -->
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-full flex items-center justify-center text-white text-sm font-bold bg-gradient-to-br" :class="review.color" x-text="review.avatar"></div>
                                <div>
                                    <p class="text-sm font-semibold text-white" x-text="review.name"></p>
                                    <p class="text-xs text-dark-500" x-text="review.role"></p>
                                </div>
                            </div>
                        </div>
                    </template>
                </div>

                <!-- Mobile/Tablet View (1 card) -->
                <div class="lg:hidden">
                    <template x-for="(review, index) in reviews" :key="index">
                        <div x-show="currentSlide === index"
                             x-transition:enter="transition ease-out duration-300"
                             x-transition:enter-start="opacity-0 translate-x-8"
                             x-transition:enter-end="opacity-100 translate-x-0"
                             x-transition:leave="transition ease-in duration-200"
                             x-transition:leave-start="opacity-100 translate-x-0"
                             x-transition:leave-end="opacity-0 -translate-x-8"
                             class="glass-card rounded-2xl p-6 sm:p-8">
                            <!-- Stars -->
                            <div class="flex items-center gap-1 mb-4">
                                <template x-for="star in review.rating" :key="star">
                                    <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                    </svg>
                                </template>
                                <template x-for="star in (5 - review.rating)" :key="'empty-'+star">
                                    <svg class="w-5 h-5 text-dark-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                    </svg>
                                </template>
                            </div>

                            <!-- Review Text -->
                            <p class="text-base text-dark-300 leading-relaxed mb-6" x-text="review.text"></p>

                            <!-- Author -->
                            <div class="flex items-center gap-3">
                                <div class="w-12 h-12 rounded-full flex items-center justify-center text-white text-sm font-bold bg-gradient-to-br" :class="review.color" x-text="review.avatar"></div>
                                <div>
                                    <p class="text-sm font-semibold text-white" x-text="review.name"></p>
                                    <p class="text-xs text-dark-500" x-text="review.role"></p>
                                </div>
                            </div>
                        </div>
                    </template>
                </div>
            </div>

            <!-- Navigation Controls -->
            <div class="flex items-center justify-center gap-4 mt-10">
                <!-- Prev Button -->
                <button @click="prev(); clearInterval(autoplay); autoplay = setInterval(() => { next() }, 5000)"
                        class="w-10 h-10 glass-card rounded-full flex items-center justify-center text-dark-400 hover:text-white hover:border-primary-500/30 transition-all">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                    </svg>
                </button>

                <!-- Dots -->
                <div class="flex items-center gap-2">
                    <template x-for="(dot, index) in totalSlides" :key="index">
                        <button @click="goTo(index)"
                                :class="currentSlide === index ? 'w-8 bg-primary-500' : 'w-2 bg-dark-600 hover:bg-dark-500'"
                                class="h-2 rounded-full transition-all duration-300">
                        </button>
                    </template>
                </div>

                <!-- Next Button -->
                <button @click="next(); clearInterval(autoplay); autoplay = setInterval(() => { next() }, 5000)"
                        class="w-10 h-10 glass-card rounded-full flex items-center justify-center text-dark-400 hover:text-white hover:border-primary-500/30 transition-all">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section id="contact" class="py-20 lg:py-28 relative">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <div class="glass-card rounded-3xl p-8 sm:p-12 lg:p-16 glow-border relative overflow-hidden">
            <!-- Background decoration -->
            <div class="absolute inset-0 bg-gradient-to-br from-primary-500/5 to-purple-500/5"></div>
            <div class="relative">
                <h2 class="text-3xl sm:text-4xl font-bold text-white mb-4">Ready to Start Streaming?</h2>
                <p class="text-lg text-dark-400 mb-8 max-w-xl mx-auto">Join thousands of users who stream TeraBox videos with XteraPlay every day. No signup required to get started.</p>
                <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                    <a href="#home" class="px-8 py-4 bg-gradient-to-r from-primary-600 to-purple-600 hover:from-primary-500 hover:to-purple-500 text-white font-semibold rounded-xl shadow-lg shadow-primary-500/25 hover:shadow-primary-500/40 transition-all">
                        Try It Now &mdash; Free
                    </a>
                    <a href="/register" class="px-8 py-4 glass-card text-white font-semibold rounded-xl hover:bg-dark-700 transition-all">
                        Create Account
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
