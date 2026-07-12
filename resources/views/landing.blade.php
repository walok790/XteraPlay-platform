@extends('layouts.app')

@section('title', 'XteraPlay - Stream TeraBox Videos Instantly')

@section('content')
<!-- Hero Section -->
<section id="home" class="relative hero-gradient pt-24 pb-16 sm:pt-32 sm:pb-20 lg:pt-40 lg:pb-28">
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute top-1/4 left-1/4 w-72 h-72 sm:w-96 sm:h-96 bg-primary-500/5 rounded-full blur-3xl"></div>
        <div class="absolute bottom-1/4 right-1/4 w-72 h-72 sm:w-96 sm:h-96 bg-purple-500/5 rounded-full blur-3xl"></div>
    </div>

    <div class="relative w-full max-w-7xl mx-auto px-5 sm:px-6 lg:px-8">
        <div class="text-center">
            <!-- Badge -->
            <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full glass-card mb-6 sm:mb-8">
                <span class="w-2 h-2 bg-green-400 rounded-full animate-pulse"></span>
                <span class="text-xs sm:text-sm text-dark-300 font-medium">Free to use &bull; No signup required</span>
            </div>

            <!-- Heading -->
            <h1 class="text-3xl sm:text-5xl md:text-6xl lg:text-7xl font-extrabold tracking-tight mb-4 sm:mb-6 leading-tight">
                <span class="text-white">Stream TeraBox</span><br>
                <span class="gradient-text">Videos Instantly</span>
            </h1>

            <!-- Subtitle -->
            <p class="text-base sm:text-lg lg:text-xl text-dark-400 max-w-xl sm:max-w-2xl mx-auto mb-8 sm:mb-10 leading-relaxed px-2">
                Paste a TeraBox link to stream or download &mdash; no signup required. Lightning-fast, HD quality streaming.
            </p>

            <!-- Search Box -->
            <div x-data="{ link: '', loading: false }" class="w-full max-w-xl sm:max-w-2xl mx-auto mb-6 sm:mb-8">
                <div class="glass-card rounded-2xl p-1.5 sm:p-2 glow-border">
                    <div class="flex items-center gap-2">
                        <div class="flex-shrink-0 pl-3 sm:pl-4">
                            <svg class="w-5 h-5 text-dark-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"/>
                            </svg>
                        </div>
                        <input x-model="link" type="url" placeholder="Paste TeraBox URL here..."
                               class="flex-1 min-w-0 bg-transparent text-white placeholder-dark-500 px-2 sm:px-4 py-3 sm:py-4 text-sm sm:text-base focus:outline-none font-inter">
                        <button @click="loading = true; setTimeout(() => loading = false, 2000)"
                                :disabled="!link || loading"
                                class="flex-shrink-0 px-4 sm:px-6 py-2.5 sm:py-3 bg-gradient-to-r from-primary-600 to-purple-600 hover:from-primary-500 hover:to-purple-500 disabled:opacity-50 disabled:cursor-not-allowed text-white font-semibold text-xs sm:text-sm rounded-xl shadow-lg shadow-primary-500/25 hover:shadow-primary-500/40 transition-all">
                            <span x-show="!loading" class="flex items-center gap-1.5 sm:gap-2">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                                <span class="hidden sm:inline">Watch Now</span>
                                <span class="sm:hidden">Play</span>
                            </span>
                            <span x-show="loading" x-cloak class="flex items-center gap-2">
                                <svg class="animate-spin w-4 h-4" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path>
                                </svg>
                            </span>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Credits Info -->
            <div class="flex flex-wrap items-center justify-center gap-3 mb-8 sm:mb-10">
                <span class="inline-flex items-center gap-2 px-3 py-1.5 glass-card rounded-lg text-xs sm:text-sm">
                    <span class="text-dark-400">Credits:</span>
                    <span class="text-white font-bold">5/day</span>
                </span>
                <span class="inline-flex items-center gap-2 px-3 py-1.5 bg-green-500/10 border border-green-500/20 rounded-lg text-xs sm:text-sm">
                    <span class="w-2 h-2 bg-green-400 rounded-full"></span>
                    <span class="text-green-400 font-medium">Free</span>
                </span>
            </div>

            <!-- Upsell Banner -->
            <div class="w-full max-w-md sm:max-w-lg mx-auto glass-card rounded-xl p-3 sm:p-4 flex flex-col sm:flex-row items-center justify-between gap-3 sm:gap-4 mb-10 sm:mb-14">
                <div class="flex items-center gap-3 text-center sm:text-left">
                    <span class="text-xl sm:text-2xl">&#9889;</span>
                    <div>
                        <p class="text-xs sm:text-sm font-medium text-white">Want more daily searches?</p>
                        <p class="text-[11px] sm:text-xs text-dark-400">Create a free account or upgrade for unlimited.</p>
                    </div>
                </div>
                <div class="flex items-center gap-2 flex-shrink-0">
                    <a href="/register" class="px-3 sm:px-4 py-2 text-xs font-semibold bg-primary-600 hover:bg-primary-500 text-white rounded-lg transition-colors">Sign Up Free</a>
                    <a href="/login" class="px-3 sm:px-4 py-2 text-xs font-medium text-dark-300 hover:text-white glass-card rounded-lg transition-colors">Login</a>
                </div>
            </div>

            <!-- Quick Feature Pills -->
            <div class="grid grid-cols-2 sm:grid-cols-4 gap-3 sm:gap-4 max-w-xs sm:max-w-2xl mx-auto">
                <div class="glass-card rounded-xl p-3 sm:p-4 text-center hover:border-primary-500/30 transition-all">
                    <div class="w-10 h-10 sm:w-12 sm:h-12 mx-auto mb-2 bg-primary-500/10 rounded-lg flex items-center justify-center">
                        <svg class="w-5 h-5 sm:w-6 sm:h-6 text-primary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                        </svg>
                    </div>
                    <p class="text-xs sm:text-sm font-medium text-dark-200">Instant</p>
                    <p class="text-[10px] sm:text-xs text-dark-500 mt-0.5">No waiting</p>
                </div>
                <div class="glass-card rounded-xl p-3 sm:p-4 text-center hover:border-green-500/30 transition-all">
                    <div class="w-10 h-10 sm:w-12 sm:h-12 mx-auto mb-2 bg-green-500/10 rounded-lg flex items-center justify-center">
                        <svg class="w-5 h-5 sm:w-6 sm:h-6 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                        </svg>
                    </div>
                    <p class="text-xs sm:text-sm font-medium text-dark-200">Secure</p>
                    <p class="text-[10px] sm:text-xs text-dark-500 mt-0.5">Private & safe</p>
                </div>
                <div class="glass-card rounded-xl p-3 sm:p-4 text-center hover:border-purple-500/30 transition-all">
                    <div class="w-10 h-10 sm:w-12 sm:h-12 mx-auto mb-2 bg-purple-500/10 rounded-lg flex items-center justify-center">
                        <svg class="w-5 h-5 sm:w-6 sm:h-6 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <p class="text-xs sm:text-sm font-medium text-dark-200">HD Quality</p>
                    <p class="text-[10px] sm:text-xs text-dark-500 mt-0.5">Up to 1080p</p>
                </div>
                <div class="glass-card rounded-xl p-3 sm:p-4 text-center hover:border-cyan-500/30 transition-all">
                    <div class="w-10 h-10 sm:w-12 sm:h-12 mx-auto mb-2 bg-cyan-500/10 rounded-lg flex items-center justify-center">
                        <svg class="w-5 h-5 sm:w-6 sm:h-6 text-cyan-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <p class="text-xs sm:text-sm font-medium text-dark-200">Mobile Ready</p>
                    <p class="text-[10px] sm:text-xs text-dark-500 mt-0.5">Any device</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Supported Platforms -->
<section class="py-10 sm:py-14 lg:py-16 border-b border-dark-700/30">
    <div class="w-full max-w-7xl mx-auto px-5 sm:px-6 lg:px-8">
        <div class="text-center mb-8 sm:mb-10">
            <p class="text-xs sm:text-sm font-medium text-dark-400 uppercase tracking-wider mb-1.5">Works With All TeraBox Domains</p>
            <h3 class="text-lg sm:text-xl lg:text-2xl font-bold text-white">Supported Platforms</h3>
        </div>

        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-3 sm:gap-4">
            <div class="glass-card rounded-xl px-3 sm:px-4 py-3 flex items-center gap-2 sm:gap-3 hover:border-blue-500/30 transition-all group">
                <div class="w-8 h-8 bg-blue-500/10 rounded-lg flex items-center justify-center flex-shrink-0">
                    <svg class="w-4 h-4 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z"/></svg>
                </div>
                <div class="min-w-0">
                    <p class="text-xs sm:text-sm font-semibold text-white truncate group-hover:text-blue-400 transition-colors">terabox.com</p>
                    <p class="text-[10px] text-dark-500">Global</p>
                </div>
            </div>
            <div class="glass-card rounded-xl px-3 sm:px-4 py-3 flex items-center gap-2 sm:gap-3 hover:border-purple-500/30 transition-all group">
                <div class="w-8 h-8 bg-purple-500/10 rounded-lg flex items-center justify-center flex-shrink-0">
                    <svg class="w-4 h-4 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z"/></svg>
                </div>
                <div class="min-w-0">
                    <p class="text-xs sm:text-sm font-semibold text-white truncate group-hover:text-purple-400 transition-colors">1024terabox.com</p>
                    <p class="text-[10px] text-dark-500">Asia</p>
                </div>
            </div>
            <div class="glass-card rounded-xl px-3 sm:px-4 py-3 flex items-center gap-2 sm:gap-3 hover:border-orange-500/30 transition-all group">
                <div class="w-8 h-8 bg-orange-500/10 rounded-lg flex items-center justify-center flex-shrink-0">
                    <svg class="w-4 h-4 text-orange-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"/></svg>
                </div>
                <div class="min-w-0">
                    <p class="text-xs sm:text-sm font-semibold text-white truncate group-hover:text-orange-400 transition-colors">teraboxapp.com</p>
                    <p class="text-[10px] text-dark-500">App</p>
                </div>
            </div>
            <div class="glass-card rounded-xl px-3 sm:px-4 py-3 flex items-center gap-2 sm:gap-3 hover:border-green-500/30 transition-all group">
                <div class="w-8 h-8 bg-green-500/10 rounded-lg flex items-center justify-center flex-shrink-0">
                    <svg class="w-4 h-4 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z"/></svg>
                </div>
                <div class="min-w-0">
                    <p class="text-xs sm:text-sm font-semibold text-white truncate group-hover:text-green-400 transition-colors">teraboxshare.com</p>
                    <p class="text-[10px] text-dark-500">Share</p>
                </div>
            </div>
            <div class="glass-card rounded-xl px-3 sm:px-4 py-3 flex items-center gap-2 sm:gap-3 hover:border-cyan-500/30 transition-all group">
                <div class="w-8 h-8 bg-cyan-500/10 rounded-lg flex items-center justify-center flex-shrink-0">
                    <svg class="w-4 h-4 text-cyan-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
                <div class="min-w-0">
                    <p class="text-xs sm:text-sm font-semibold text-white truncate group-hover:text-cyan-400 transition-colors">freeterabox.com</p>
                    <p class="text-[10px] text-dark-500">Free</p>
                </div>
            </div>
            <div class="glass-card rounded-xl px-3 sm:px-4 py-3 flex items-center gap-2 sm:gap-3 hover:border-pink-500/30 transition-all group">
                <div class="w-8 h-8 bg-pink-500/10 rounded-lg flex items-center justify-center flex-shrink-0">
                    <svg class="w-4 h-4 text-pink-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                </div>
                <div class="min-w-0">
                    <p class="text-xs sm:text-sm font-semibold text-white truncate group-hover:text-pink-400 transition-colors">mirrobox.com</p>
                    <p class="text-[10px] text-dark-500">Mirror</p>
                </div>
            </div>
        </div>

        <p class="text-center text-xs text-dark-500 mt-6 flex items-center justify-center gap-2">
            <svg class="w-4 h-4 text-green-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
            All TeraBox domains &amp; short-links supported
        </p>
    </div>
</section>


<!-- Services Section -->
<section id="services" class="py-14 sm:py-20 lg:py-28">
    <div class="w-full max-w-7xl mx-auto px-5 sm:px-6 lg:px-8">
        <div class="text-center mb-10 sm:mb-14 lg:mb-16">
            <div class="inline-flex items-center gap-2 px-3 sm:px-4 py-1.5 sm:py-2 glass-card rounded-full mb-4 sm:mb-6">
                <svg class="w-4 h-4 text-primary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
                <span class="text-xs sm:text-sm text-dark-300 font-medium">Our Services</span>
            </div>
            <h2 class="text-2xl sm:text-3xl lg:text-5xl font-bold text-white mb-3 sm:mb-4">Everything You Need</h2>
            <p class="text-sm sm:text-base lg:text-lg text-dark-400 max-w-2xl mx-auto">Stream, download, and manage TeraBox content with ease.</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-5 lg:gap-6">
            <div class="feature-card glass-card rounded-2xl p-5 sm:p-6 lg:p-7 transition-all duration-300">
                <div class="w-11 h-11 sm:w-12 sm:h-12 bg-blue-500/10 rounded-xl flex items-center justify-center mb-4 sm:mb-5">
                    <svg class="w-5 h-5 sm:w-6 sm:h-6 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                </div>
                <h3 class="text-base sm:text-lg font-semibold text-white mb-2">Video Downloads</h3>
                <p class="text-xs sm:text-sm text-dark-400 leading-relaxed">Download TeraBox videos in 480p, 720p, 1080p. Save to your device instantly.</p>
            </div>
            <div class="feature-card glass-card rounded-2xl p-5 sm:p-6 lg:p-7 transition-all duration-300">
                <div class="w-11 h-11 sm:w-12 sm:h-12 bg-orange-500/10 rounded-xl flex items-center justify-center mb-4 sm:mb-5">
                    <svg class="w-5 h-5 sm:w-6 sm:h-6 text-orange-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
                <h3 class="text-base sm:text-lg font-semibold text-white mb-2">Online Streaming</h3>
                <p class="text-xs sm:text-sm text-dark-400 leading-relaxed">Stream directly in your browser without downloading. Adaptive quality playback.</p>
            </div>
            <div class="feature-card glass-card rounded-2xl p-5 sm:p-6 lg:p-7 transition-all duration-300">
                <div class="w-11 h-11 sm:w-12 sm:h-12 bg-green-500/10 rounded-xl flex items-center justify-center mb-4 sm:mb-5">
                    <svg class="w-5 h-5 sm:w-6 sm:h-6 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"/></svg>
                </div>
                <h3 class="text-base sm:text-lg font-semibold text-white mb-2">Link Converter</h3>
                <p class="text-xs sm:text-sm text-dark-400 leading-relaxed">Convert any TeraBox sharing link to a direct download link. All domains supported.</p>
            </div>
            <div class="feature-card glass-card rounded-2xl p-5 sm:p-6 lg:p-7 transition-all duration-300">
                <div class="w-11 h-11 sm:w-12 sm:h-12 bg-emerald-500/10 rounded-xl flex items-center justify-center mb-4 sm:mb-5">
                    <svg class="w-5 h-5 sm:w-6 sm:h-6 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
                </div>
                <h3 class="text-base sm:text-lg font-semibold text-white mb-2">Batch Processing</h3>
                <p class="text-xs sm:text-sm text-dark-400 leading-relaxed">Process multiple links at once. Queue downloads and stream playlists.</p>
            </div>
            <div class="feature-card glass-card rounded-2xl p-5 sm:p-6 lg:p-7 transition-all duration-300">
                <div class="w-11 h-11 sm:w-12 sm:h-12 bg-purple-500/10 rounded-xl flex items-center justify-center mb-4 sm:mb-5">
                    <svg class="w-5 h-5 sm:w-6 sm:h-6 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/></svg>
                </div>
                <h3 class="text-base sm:text-lg font-semibold text-white mb-2">Developer API</h3>
                <p class="text-xs sm:text-sm text-dark-400 leading-relaxed">Integrate XteraPlay into your apps with our REST API. Full documentation.</p>
            </div>
            <div class="feature-card glass-card rounded-2xl p-5 sm:p-6 lg:p-7 transition-all duration-300">
                <div class="w-11 h-11 sm:w-12 sm:h-12 bg-pink-500/10 rounded-xl flex items-center justify-center mb-4 sm:mb-5">
                    <svg class="w-5 h-5 sm:w-6 sm:h-6 text-pink-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                </div>
                <h3 class="text-base sm:text-lg font-semibold text-white mb-2">Privacy First</h3>
                <p class="text-xs sm:text-sm text-dark-400 leading-relaxed">We never store your videos or personal information. Zero-log policy.</p>
            </div>
        </div>
    </div>
</section>

<!-- Why XteraPlay -->
<section id="features" class="py-14 sm:py-20 lg:py-28 bg-dark-900/50">
    <div class="w-full max-w-7xl mx-auto px-5 sm:px-6 lg:px-8">
        <div class="text-center mb-10 sm:mb-14 lg:mb-16">
            <h2 class="text-2xl sm:text-3xl lg:text-5xl font-bold text-white mb-3 sm:mb-4">Why XteraPlay?</h2>
            <p class="text-sm sm:text-base lg:text-lg text-dark-400 max-w-2xl mx-auto">Powerful features for the best streaming experience.</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-5 lg:gap-6">
            <div class="feature-card glass-card rounded-2xl p-5 sm:p-6 lg:p-7 transition-all duration-300">
                <div class="w-11 h-11 sm:w-12 sm:h-12 bg-yellow-500/10 rounded-xl flex items-center justify-center mb-4 sm:mb-5">
                    <svg class="w-5 h-5 sm:w-6 sm:h-6 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                </div>
                <h3 class="text-base sm:text-lg font-semibold text-white mb-2">Lightning Fast</h3>
                <p class="text-xs sm:text-sm text-dark-400 leading-relaxed">Stream instantly with optimized CDN delivery. No buffering.</p>
            </div>
            <div class="feature-card glass-card rounded-2xl p-5 sm:p-6 lg:p-7 transition-all duration-300">
                <div class="w-11 h-11 sm:w-12 sm:h-12 bg-green-500/10 rounded-xl flex items-center justify-center mb-4 sm:mb-5">
                    <svg class="w-5 h-5 sm:w-6 sm:h-6 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                </div>
                <h3 class="text-base sm:text-lg font-semibold text-white mb-2">Private & Secure</h3>
                <p class="text-xs sm:text-sm text-dark-400 leading-relaxed">End-to-end privacy. No tracking, no logs.</p>
            </div>
            <div class="feature-card glass-card rounded-2xl p-5 sm:p-6 lg:p-7 transition-all duration-300">
                <div class="w-11 h-11 sm:w-12 sm:h-12 bg-blue-500/10 rounded-xl flex items-center justify-center mb-4 sm:mb-5">
                    <svg class="w-5 h-5 sm:w-6 sm:h-6 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"/></svg>
                </div>
                <h3 class="text-base sm:text-lg font-semibold text-white mb-2">HD Quality</h3>
                <p class="text-xs sm:text-sm text-dark-400 leading-relaxed">480p to 1080p. Multiple quality options.</p>
            </div>
            <div class="feature-card glass-card rounded-2xl p-5 sm:p-6 lg:p-7 transition-all duration-300">
                <div class="w-11 h-11 sm:w-12 sm:h-12 bg-cyan-500/10 rounded-xl flex items-center justify-center mb-4 sm:mb-5">
                    <svg class="w-5 h-5 sm:w-6 sm:h-6 text-cyan-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"/></svg>
                </div>
                <h3 class="text-base sm:text-lg font-semibold text-white mb-2">Mobile Friendly</h3>
                <p class="text-xs sm:text-sm text-dark-400 leading-relaxed">Works perfectly on phones, tablets, and desktops.</p>
            </div>
            <div class="feature-card glass-card rounded-2xl p-5 sm:p-6 lg:p-7 transition-all duration-300">
                <div class="w-11 h-11 sm:w-12 sm:h-12 bg-indigo-500/10 rounded-xl flex items-center justify-center mb-4 sm:mb-5">
                    <svg class="w-5 h-5 sm:w-6 sm:h-6 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"/></svg>
                </div>
                <h3 class="text-base sm:text-lg font-semibold text-white mb-2">Bookmarks</h3>
                <p class="text-xs sm:text-sm text-dark-400 leading-relaxed">Save videos to your library. Build playlists.</p>
            </div>
            <div class="feature-card glass-card rounded-2xl p-5 sm:p-6 lg:p-7 transition-all duration-300">
                <div class="w-11 h-11 sm:w-12 sm:h-12 bg-rose-500/10 rounded-xl flex items-center justify-center mb-4 sm:mb-5">
                    <svg class="w-5 h-5 sm:w-6 sm:h-6 text-rose-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
                <h3 class="text-base sm:text-lg font-semibold text-white mb-2">Watch History</h3>
                <p class="text-xs sm:text-sm text-dark-400 leading-relaxed">Full history with search. Resume where you left off.</p>
            </div>
        </div>
    </div>
</section>

<!-- How It Works -->
<section class="py-14 sm:py-20 lg:py-28">
    <div class="w-full max-w-7xl mx-auto px-5 sm:px-6 lg:px-8">
        <div class="text-center mb-10 sm:mb-14 lg:mb-16">
            <h2 class="text-2xl sm:text-3xl lg:text-5xl font-bold text-white mb-3 sm:mb-4">How It Works</h2>
            <p class="text-sm sm:text-base lg:text-lg text-dark-400 max-w-2xl mx-auto">Stream TeraBox videos in 3 simple steps.</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 sm:gap-8 max-w-4xl mx-auto">
            <div class="text-center relative">
                <div class="w-14 h-14 sm:w-16 sm:h-16 mx-auto mb-4 sm:mb-6 bg-gradient-to-br from-primary-500/20 to-purple-500/20 border border-primary-500/30 rounded-2xl flex items-center justify-center">
                    <span class="text-xl sm:text-2xl font-bold gradient-text">1</span>
                </div>
                <h3 class="text-base sm:text-lg font-semibold text-white mb-2">Copy Link</h3>
                <p class="text-xs sm:text-sm text-dark-400">Copy any TeraBox video sharing link.</p>
                <div class="hidden sm:block absolute top-7 left-[60%] w-[80%] border-t border-dashed border-dark-600"></div>
            </div>
            <div class="text-center relative">
                <div class="w-14 h-14 sm:w-16 sm:h-16 mx-auto mb-4 sm:mb-6 bg-gradient-to-br from-purple-500/20 to-pink-500/20 border border-purple-500/30 rounded-2xl flex items-center justify-center">
                    <span class="text-xl sm:text-2xl font-bold gradient-text">2</span>
                </div>
                <h3 class="text-base sm:text-lg font-semibold text-white mb-2">Paste & Play</h3>
                <p class="text-xs sm:text-sm text-dark-400">Paste the link and hit Watch Now.</p>
                <div class="hidden sm:block absolute top-7 left-[60%] w-[80%] border-t border-dashed border-dark-600"></div>
            </div>
            <div class="text-center">
                <div class="w-14 h-14 sm:w-16 sm:h-16 mx-auto mb-4 sm:mb-6 bg-gradient-to-br from-pink-500/20 to-orange-500/20 border border-pink-500/30 rounded-2xl flex items-center justify-center">
                    <span class="text-xl sm:text-2xl font-bold gradient-text">3</span>
                </div>
                <h3 class="text-base sm:text-lg font-semibold text-white mb-2">Enjoy</h3>
                <p class="text-xs sm:text-sm text-dark-400">Stream in HD or download. Simple!</p>
            </div>
        </div>
    </div>
</section>


<!-- Pricing Section -->
<section id="pricing" class="py-14 sm:py-20 lg:py-28 bg-dark-900/50">
    <div class="w-full max-w-7xl mx-auto px-5 sm:px-6 lg:px-8">
        <div class="text-center mb-10 sm:mb-14 lg:mb-16">
            <h2 class="text-2xl sm:text-3xl lg:text-5xl font-bold text-white mb-3 sm:mb-4">Simple Pricing</h2>
            <p class="text-sm sm:text-base lg:text-lg text-dark-400 max-w-2xl mx-auto">Start free. Upgrade when needed.</p>
        </div>

        <div x-data="{ annual: false }" class="max-w-5xl mx-auto">
            <div class="flex items-center justify-center gap-3 mb-8 sm:mb-10">
                <span :class="!annual ? 'text-white' : 'text-dark-400'" class="text-xs sm:text-sm font-medium">Monthly</span>
                <button @click="annual = !annual" :class="annual ? 'bg-primary-600' : 'bg-dark-700'" class="relative w-11 h-6 rounded-full transition-colors">
                    <span :class="annual ? 'translate-x-5' : 'translate-x-1'" class="absolute top-1 w-4 h-4 bg-white rounded-full transition-transform"></span>
                </button>
                <span :class="annual ? 'text-white' : 'text-dark-400'" class="text-xs sm:text-sm font-medium">Annual <span class="text-green-400 text-[10px] sm:text-xs">(Save 20%)</span></span>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-5 lg:gap-6">
                <!-- Free -->
                <div class="glass-card rounded-2xl p-5 sm:p-6 lg:p-8">
                    <h3 class="text-base sm:text-lg font-semibold text-white mb-1">Free</h3>
                    <p class="text-xs sm:text-sm text-dark-400 mb-4 sm:mb-6">Perfect to get started</p>
                    <div class="mb-4 sm:mb-6">
                        <span class="text-3xl sm:text-4xl font-bold text-white">$0</span>
                        <span class="text-dark-400 text-xs sm:text-sm">/month</span>
                    </div>
                    <ul class="space-y-2.5 sm:space-y-3 mb-6 sm:mb-8">
                        <li class="flex items-center gap-2.5 text-xs sm:text-sm text-dark-300">
                            <svg class="w-4 h-4 text-green-400 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                            5 streams per day
                        </li>
                        <li class="flex items-center gap-2.5 text-xs sm:text-sm text-dark-300">
                            <svg class="w-4 h-4 text-green-400 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                            480p &amp; 720p quality
                        </li>
                        <li class="flex items-center gap-2.5 text-xs sm:text-sm text-dark-300">
                            <svg class="w-4 h-4 text-green-400 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                            Basic support
                        </li>
                    </ul>
                    <a href="/register" class="block w-full py-2.5 sm:py-3 text-xs sm:text-sm font-semibold text-center text-white bg-dark-700 hover:bg-dark-600 rounded-xl transition-colors">Get Started Free</a>
                </div>

                <!-- Pro -->
                <div class="glass-card rounded-2xl p-5 sm:p-6 lg:p-8 relative border-primary-500/30 glow-border">
                    <div class="absolute -top-3 left-1/2 -translate-x-1/2 px-3 sm:px-4 py-1 bg-gradient-to-r from-primary-600 to-purple-600 rounded-full text-[10px] sm:text-xs font-semibold text-white whitespace-nowrap">Most Popular</div>
                    <h3 class="text-base sm:text-lg font-semibold text-white mb-1">Pro</h3>
                    <p class="text-xs sm:text-sm text-dark-400 mb-4 sm:mb-6">For power users</p>
                    <div class="mb-4 sm:mb-6">
                        <span class="text-3xl sm:text-4xl font-bold text-white" x-text="annual ? '$7' : '$9'">$9</span>
                        <span class="text-dark-400 text-xs sm:text-sm">/month</span>
                    </div>
                    <ul class="space-y-2.5 sm:space-y-3 mb-6 sm:mb-8">
                        <li class="flex items-center gap-2.5 text-xs sm:text-sm text-dark-300">
                            <svg class="w-4 h-4 text-green-400 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                            Unlimited streams
                        </li>
                        <li class="flex items-center gap-2.5 text-xs sm:text-sm text-dark-300">
                            <svg class="w-4 h-4 text-green-400 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                            Full HD 1080p
                        </li>
                        <li class="flex items-center gap-2.5 text-xs sm:text-sm text-dark-300">
                            <svg class="w-4 h-4 text-green-400 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                            Batch processing
                        </li>
                        <li class="flex items-center gap-2.5 text-xs sm:text-sm text-dark-300">
                            <svg class="w-4 h-4 text-green-400 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                            Priority support
                        </li>
                    </ul>
                    <a href="/register" class="block w-full py-2.5 sm:py-3 text-xs sm:text-sm font-semibold text-center text-white bg-gradient-to-r from-primary-600 to-purple-600 hover:from-primary-500 hover:to-purple-500 rounded-xl shadow-lg shadow-primary-500/25 transition-all">Upgrade to Pro</a>
                </div>

                <!-- Enterprise -->
                <div class="glass-card rounded-2xl p-5 sm:p-6 lg:p-8 sm:col-span-2 lg:col-span-1">
                    <h3 class="text-base sm:text-lg font-semibold text-white mb-1">Enterprise</h3>
                    <p class="text-xs sm:text-sm text-dark-400 mb-4 sm:mb-6">For teams &amp; businesses</p>
                    <div class="mb-4 sm:mb-6">
                        <span class="text-3xl sm:text-4xl font-bold text-white" x-text="annual ? '$19' : '$25'">$25</span>
                        <span class="text-dark-400 text-xs sm:text-sm">/month</span>
                    </div>
                    <ul class="space-y-2.5 sm:space-y-3 mb-6 sm:mb-8">
                        <li class="flex items-center gap-2.5 text-xs sm:text-sm text-dark-300">
                            <svg class="w-4 h-4 text-green-400 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                            Everything in Pro
                        </li>
                        <li class="flex items-center gap-2.5 text-xs sm:text-sm text-dark-300">
                            <svg class="w-4 h-4 text-green-400 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                            API access (REST)
                        </li>
                        <li class="flex items-center gap-2.5 text-xs sm:text-sm text-dark-300">
                            <svg class="w-4 h-4 text-green-400 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                            Unlimited batch
                        </li>
                        <li class="flex items-center gap-2.5 text-xs sm:text-sm text-dark-300">
                            <svg class="w-4 h-4 text-green-400 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                            Dedicated support
                        </li>
                    </ul>
                    <a href="/register" class="block w-full py-2.5 sm:py-3 text-xs sm:text-sm font-semibold text-center text-white bg-dark-700 hover:bg-dark-600 rounded-xl transition-colors">Contact Sales</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FAQ -->
<section id="faq" class="py-14 sm:py-20 lg:py-28">
    <div class="w-full max-w-3xl mx-auto px-5 sm:px-6 lg:px-8">
        <div class="text-center mb-10 sm:mb-14">
            <h2 class="text-2xl sm:text-3xl lg:text-5xl font-bold text-white mb-3 sm:mb-4">FAQ</h2>
            <p class="text-sm sm:text-base text-dark-400">Got questions? We've got answers.</p>
        </div>

        <div x-data="{ open: null }" class="space-y-3 sm:space-y-4">
            <div class="glass-card rounded-xl overflow-hidden">
                <button @click="open = open === 1 ? null : 1" class="w-full px-4 sm:px-6 py-4 sm:py-5 flex items-center justify-between text-left gap-4">
                    <span class="text-xs sm:text-sm font-medium text-white">What is XteraPlay?</span>
                    <svg :class="open === 1 ? 'rotate-180' : ''" class="w-4 h-4 sm:w-5 sm:h-5 text-dark-400 transition-transform flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                </button>
                <div x-show="open === 1" x-collapse x-cloak class="px-4 sm:px-6 pb-4 sm:pb-5">
                    <p class="text-xs sm:text-sm text-dark-400 leading-relaxed">XteraPlay lets you stream and download TeraBox videos directly in your browser. Paste a link and enjoy instant HD playback.</p>
                </div>
            </div>
            <div class="glass-card rounded-xl overflow-hidden">
                <button @click="open = open === 2 ? null : 2" class="w-full px-4 sm:px-6 py-4 sm:py-5 flex items-center justify-between text-left gap-4">
                    <span class="text-xs sm:text-sm font-medium text-white">Is it free to use?</span>
                    <svg :class="open === 2 ? 'rotate-180' : ''" class="w-4 h-4 sm:w-5 sm:h-5 text-dark-400 transition-transform flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                </button>
                <div x-show="open === 2" x-collapse x-cloak class="px-4 sm:px-6 pb-4 sm:pb-5">
                    <p class="text-xs sm:text-sm text-dark-400 leading-relaxed">Yes! 5 free streams per day without an account. Sign up for more, or upgrade to Pro for unlimited.</p>
                </div>
            </div>
            <div class="glass-card rounded-xl overflow-hidden">
                <button @click="open = open === 3 ? null : 3" class="w-full px-4 sm:px-6 py-4 sm:py-5 flex items-center justify-between text-left gap-4">
                    <span class="text-xs sm:text-sm font-medium text-white">Which TeraBox links are supported?</span>
                    <svg :class="open === 3 ? 'rotate-180' : ''" class="w-4 h-4 sm:w-5 sm:h-5 text-dark-400 transition-transform flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                </button>
                <div x-show="open === 3" x-collapse x-cloak class="px-4 sm:px-6 pb-4 sm:pb-5">
                    <p class="text-xs sm:text-sm text-dark-400 leading-relaxed">All formats: 1024terabox.com, teraboxapp.com, terabox.com, and other regional variants.</p>
                </div>
            </div>
            <div class="glass-card rounded-xl overflow-hidden">
                <button @click="open = open === 4 ? null : 4" class="w-full px-4 sm:px-6 py-4 sm:py-5 flex items-center justify-between text-left gap-4">
                    <span class="text-xs sm:text-sm font-medium text-white">Is my data safe?</span>
                    <svg :class="open === 4 ? 'rotate-180' : ''" class="w-4 h-4 sm:w-5 sm:h-5 text-dark-400 transition-transform flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                </button>
                <div x-show="open === 4" x-collapse x-cloak class="px-4 sm:px-6 pb-4 sm:pb-5">
                    <p class="text-xs sm:text-sm text-dark-400 leading-relaxed">Yes. We don't store videos or browsing data. Zero-log policy.</p>
                </div>
            </div>
            <div class="glass-card rounded-xl overflow-hidden">
                <button @click="open = open === 5 ? null : 5" class="w-full px-4 sm:px-6 py-4 sm:py-5 flex items-center justify-between text-left gap-4">
                    <span class="text-xs sm:text-sm font-medium text-white">Can I use XteraPlay on mobile?</span>
                    <svg :class="open === 5 ? 'rotate-180' : ''" class="w-4 h-4 sm:w-5 sm:h-5 text-dark-400 transition-transform flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                </button>
                <div x-show="open === 5" x-collapse x-cloak class="px-4 sm:px-6 pb-4 sm:pb-5">
                    <p class="text-xs sm:text-sm text-dark-400 leading-relaxed">Yes! Fully responsive on all devices. No app download needed.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Stats -->
<section class="py-12 sm:py-16 bg-dark-900/50 border-y border-dark-700/50">
    <div class="w-full max-w-7xl mx-auto px-5 sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 sm:grid-cols-4 gap-6 sm:gap-8 text-center">
            <div>
                <div class="text-2xl sm:text-3xl lg:text-4xl font-bold gradient-text mb-1 sm:mb-2">50K+</div>
                <p class="text-xs sm:text-sm text-dark-400">Active Users</p>
            </div>
            <div>
                <div class="text-2xl sm:text-3xl lg:text-4xl font-bold gradient-text mb-1 sm:mb-2">1M+</div>
                <p class="text-xs sm:text-sm text-dark-400">Videos Streamed</p>
            </div>
            <div>
                <div class="text-2xl sm:text-3xl lg:text-4xl font-bold gradient-text mb-1 sm:mb-2">99.9%</div>
                <p class="text-xs sm:text-sm text-dark-400">Uptime</p>
            </div>
            <div>
                <div class="text-2xl sm:text-3xl lg:text-4xl font-bold gradient-text mb-1 sm:mb-2">4.9/5</div>
                <p class="text-xs sm:text-sm text-dark-400">User Rating</p>
            </div>
        </div>
    </div>
</section>

<!-- CTA -->
<section id="contact" class="py-14 sm:py-20 lg:py-28">
    <div class="w-full max-w-4xl mx-auto px-5 sm:px-6 lg:px-8 text-center">
        <div class="glass-card rounded-2xl sm:rounded-3xl p-6 sm:p-10 lg:p-16 glow-border relative overflow-hidden">
            <div class="absolute inset-0 bg-gradient-to-br from-primary-500/5 to-purple-500/5"></div>
            <div class="relative">
                <h2 class="text-xl sm:text-3xl lg:text-4xl font-bold text-white mb-3 sm:mb-4">Ready to Start Streaming?</h2>
                <p class="text-sm sm:text-base lg:text-lg text-dark-400 mb-6 sm:mb-8 max-w-xl mx-auto">Join thousands of users streaming TeraBox videos daily.</p>
                <div class="flex flex-col sm:flex-row items-center justify-center gap-3 sm:gap-4">
                    <a href="#home" class="w-full sm:w-auto px-6 sm:px-8 py-3 sm:py-4 bg-gradient-to-r from-primary-600 to-purple-600 hover:from-primary-500 hover:to-purple-500 text-white font-semibold text-sm rounded-xl shadow-lg shadow-primary-500/25 hover:shadow-primary-500/40 transition-all text-center">Try It Now &mdash; Free</a>
                    <a href="/register" class="w-full sm:w-auto px-6 sm:px-8 py-3 sm:py-4 glass-card text-white font-semibold text-sm rounded-xl hover:bg-dark-700 transition-all text-center">Create Account</a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
