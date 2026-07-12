@extends('layouts.app')

@section('title', 'XteraPlay - Stream Terabox Videos')

@section('content')

<!-- Hero -->
<section id="home" class="relative overflow-hidden bg-gradient-to-b from-blue-50 via-white to-white">
    <!-- Decorative background -->
    <div class="absolute inset-0 -z-10">
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[800px] h-[400px] bg-gradient-radial from-blue-200/40 via-transparent to-transparent blur-3xl"></div>
    </div>

    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 pt-10 pb-12 sm:pt-16 sm:pb-16 md:pt-20 md:pb-20 lg:pt-24 lg:pb-24 text-center">
        <div class="inline-flex items-center gap-2 px-3 py-1.5 bg-white border border-blue-200 rounded-full mb-5 sm:mb-6 shadow-sm">
            <span class="w-1.5 h-1.5 bg-emerald-500 rounded-full animate-pulse"></span>
            <span class="text-xs font-medium text-slate-600">No signup required · 5 free/day</span>
        </div>

        <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-bold text-slate-900 leading-tight tracking-tight mb-3 sm:mb-4">
            Stream Terabox Videos <br class="hidden sm:block">
            <span class="bg-gradient-to-r from-blue-600 to-indigo-600 bg-clip-text text-transparent">Instantly</span>
        </h1>
        <p class="text-sm sm:text-base md:text-lg text-slate-600 mb-6 sm:mb-8 max-w-xl mx-auto leading-relaxed">
            Paste any Terabox link and start watching in seconds — no downloads, no waiting, no signup.
        </p>

        <!-- Search Input -->
        <div class="max-w-2xl mx-auto mb-4 sm:mb-5">
            <div class="flex items-stretch gap-2 bg-white border-2 border-slate-200 rounded-xl sm:rounded-2xl p-1.5 sm:p-2 shadow-lg shadow-blue-500/5 focus-within:border-blue-500 transition">
                <div class="flex items-center pl-3">
                    <svg class="w-4 h-4 sm:w-5 sm:h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"/></svg>
                </div>
                <input type="text" placeholder="Paste your Terabox URL here..." class="flex-1 min-w-0 bg-transparent text-sm sm:text-base text-slate-900 placeholder-slate-400 focus:outline-none py-2 sm:py-2.5">
                <button class="px-4 sm:px-6 py-2 sm:py-2.5 bg-blue-600 hover:bg-blue-700 text-white text-sm sm:text-base font-medium rounded-lg shadow-sm shadow-blue-500/25 transition whitespace-nowrap flex items-center gap-1.5">
                    <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4" fill="currentColor" viewBox="0 0 20 20"><path d="M6.3 2.841A1.5 1.5 0 004 4.11V15.89a1.5 1.5 0 002.3 1.269l9.344-5.89a1.5 1.5 0 000-2.538L6.3 2.84z"/></svg>
                    Watch
                </button>
            </div>
        </div>

        <!-- Credits -->
        <div class="inline-flex items-center gap-2 px-3 py-1.5 bg-blue-50 border border-blue-100 rounded-full">
            <svg class="w-3.5 h-3.5 text-blue-600" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.75 6a.75.75 0 000 1.5H10v3a.75.75 0 001.5 0V7h1.25a.75.75 0 000-1.5h-4z" clip-rule="evenodd"/></svg>
            <span class="text-xs font-medium text-slate-700">Daily Credits</span>
            <span class="text-xs font-bold text-blue-600">5 / 5</span>
        </div>

        <!-- Trust badges -->
        <div class="mt-8 sm:mt-10 flex flex-wrap items-center justify-center gap-2 sm:gap-3">
            <div class="flex items-center gap-1.5 px-3 py-1.5 bg-white border border-slate-200 rounded-full">
                <svg class="w-3.5 h-3.5 text-amber-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M11.3 1.046A1 1 0 0112 2v5h4a1 1 0 01.82 1.573l-7 10A1 1 0 018 18v-5H4a1 1 0 01-.82-1.573l7-10a1 1 0 011.12-.38z" clip-rule="evenodd"/></svg>
                <span class="text-xs font-medium text-slate-700">Instant</span>
            </div>
            <div class="flex items-center gap-1.5 px-3 py-1.5 bg-white border border-slate-200 rounded-full">
                <svg class="w-3.5 h-3.5 text-emerald-600" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2z" clip-rule="evenodd"/></svg>
                <span class="text-xs font-medium text-slate-700">Secure</span>
            </div>
            <div class="flex items-center gap-1.5 px-3 py-1.5 bg-white border border-slate-200 rounded-full">
                <svg class="w-3.5 h-3.5 text-blue-600" fill="currentColor" viewBox="0 0 20 20"><path d="M2 6a2 2 0 012-2h6a2 2 0 012 2v8a2 2 0 01-2 2H4a2 2 0 01-2-2V6zm12.6 1.1A1 1 0 0014 8v4a1 1 0 00.55.89l2 1A1 1 0 0018 13V7a1 1 0 00-1.45-.89l-2 1z"/></svg>
                <span class="text-xs font-medium text-slate-700">HD Quality</span>
            </div>
            <div class="flex items-center gap-1.5 px-3 py-1.5 bg-white border border-slate-200 rounded-full">
                <svg class="w-3.5 h-3.5 text-violet-600" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M7 2a2 2 0 00-2 2v12a2 2 0 002 2h6a2 2 0 002-2V4a2 2 0 00-2-2H7z" clip-rule="evenodd"/></svg>
                <span class="text-xs font-medium text-slate-700">Mobile Ready</span>
            </div>
        </div>
    </div>
</section>

<!-- Supported Domains -->
<section class="py-8 sm:py-10 md:py-12 border-t border-slate-200 bg-white">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <p class="text-xs sm:text-sm uppercase tracking-wider text-slate-500 font-medium mb-4 sm:mb-5">Works with all Terabox domains</p>
        <div class="flex flex-wrap justify-center gap-2 sm:gap-2.5">
            <span class="px-3 sm:px-4 py-1.5 sm:py-2 bg-slate-100 border border-slate-200 rounded-full text-xs sm:text-sm text-slate-700 font-medium">terabox.com</span>
            <span class="px-3 sm:px-4 py-1.5 sm:py-2 bg-slate-100 border border-slate-200 rounded-full text-xs sm:text-sm text-slate-700 font-medium">1024terabox.com</span>
            <span class="px-3 sm:px-4 py-1.5 sm:py-2 bg-slate-100 border border-slate-200 rounded-full text-xs sm:text-sm text-slate-700 font-medium">teraboxapp.com</span>
            <span class="px-3 sm:px-4 py-1.5 sm:py-2 bg-slate-100 border border-slate-200 rounded-full text-xs sm:text-sm text-slate-700 font-medium">teraboxshare.com</span>
            <span class="px-3 sm:px-4 py-1.5 sm:py-2 bg-slate-100 border border-slate-200 rounded-full text-xs sm:text-sm text-slate-700 font-medium">freeterabox.com</span>
            <span class="px-3 sm:px-4 py-1.5 sm:py-2 bg-slate-100 border border-slate-200 rounded-full text-xs sm:text-sm text-slate-700 font-medium">mirrobox.com</span>
        </div>
    </div>
</section>

<!-- Features -->
<section id="features" class="py-12 sm:py-16 md:py-20 lg:py-24 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-2xl mx-auto mb-10 sm:mb-12 md:mb-14">
            <span class="inline-block px-3 py-1 bg-blue-100 text-blue-700 text-xs font-medium rounded-full mb-3">Features</span>
            <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-slate-900 mb-3">Everything you need</h2>
            <p class="text-sm sm:text-base text-slate-600">Powerful tools to stream and manage Terabox content, built for speed.</p>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-5 md:gap-6">
            <div class="bg-white border border-slate-200 rounded-2xl p-5 sm:p-6 hover:border-blue-300 hover:shadow-md transition">
                <div class="w-10 h-10 sm:w-12 sm:h-12 bg-blue-50 rounded-xl flex items-center justify-center mb-4">
                    <svg class="w-5 h-5 sm:w-6 sm:h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                </div>
                <h3 class="text-base sm:text-lg font-semibold text-slate-900 mb-2">Video Downloads</h3>
                <p class="text-sm text-slate-600 leading-relaxed">Direct downloads with multiple quality options up to 1080p HD.</p>
            </div>
            <div class="bg-white border border-slate-200 rounded-2xl p-5 sm:p-6 hover:border-blue-300 hover:shadow-md transition">
                <div class="w-10 h-10 sm:w-12 sm:h-12 bg-emerald-50 rounded-xl flex items-center justify-center mb-4">
                    <svg class="w-5 h-5 sm:w-6 sm:h-6 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.75 11.17l-3.2-2.13A1 1 0 0010 9.87v4.26a1 1 0 001.55.83l3.2-2.13a1 1 0 000-1.66z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
                <h3 class="text-base sm:text-lg font-semibold text-slate-900 mb-2">Online Streaming</h3>
                <p class="text-sm text-slate-600 leading-relaxed">Stream directly in your browser without downloading anything.</p>
            </div>
            <div class="bg-white border border-slate-200 rounded-2xl p-5 sm:p-6 hover:border-blue-300 hover:shadow-md transition">
                <div class="w-10 h-10 sm:w-12 sm:h-12 bg-orange-50 rounded-xl flex items-center justify-center mb-4">
                    <svg class="w-5 h-5 sm:w-6 sm:h-6 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.83 10.17a4 4 0 00-5.66 0l-4 4a4 4 0 105.66 5.66l1.1-1.1m-.76-4.9a4 4 0 005.66 0l4-4a4 4 0 00-5.66-5.66l-1.1 1.1"/></svg>
                </div>
                <h3 class="text-base sm:text-lg font-semibold text-slate-900 mb-2">Link Converter</h3>
                <p class="text-sm text-slate-600 leading-relaxed">Convert Terabox share links to direct downloadable URLs.</p>
            </div>
            <div class="bg-white border border-slate-200 rounded-2xl p-5 sm:p-6 hover:border-blue-300 hover:shadow-md transition">
                <div class="w-10 h-10 sm:w-12 sm:h-12 bg-violet-50 rounded-xl flex items-center justify-center mb-4">
                    <svg class="w-5 h-5 sm:w-6 sm:h-6 text-violet-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
                </div>
                <h3 class="text-base sm:text-lg font-semibold text-slate-900 mb-2">Batch Processing</h3>
                <p class="text-sm text-slate-600 leading-relaxed">Process multiple links at once. Perfect for large folders.</p>
            </div>
            <div class="bg-white border border-slate-200 rounded-2xl p-5 sm:p-6 hover:border-blue-300 hover:shadow-md transition">
                <div class="w-10 h-10 sm:w-12 sm:h-12 bg-pink-50 rounded-xl flex items-center justify-center mb-4">
                    <svg class="w-5 h-5 sm:w-6 sm:h-6 text-pink-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/></svg>
                </div>
                <h3 class="text-base sm:text-lg font-semibold text-slate-900 mb-2">Developer API</h3>
                <p class="text-sm text-slate-600 leading-relaxed">Clean REST API with full docs. Integrate in minutes.</p>
            </div>
            <div class="bg-white border border-slate-200 rounded-2xl p-5 sm:p-6 hover:border-blue-300 hover:shadow-md transition">
                <div class="w-10 h-10 sm:w-12 sm:h-12 bg-teal-50 rounded-xl flex items-center justify-center mb-4">
                    <svg class="w-5 h-5 sm:w-6 sm:h-6 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.62-4.02A11.96 11.96 0 0112 2.94a11.96 11.96 0 01-8.62 3.04A12.02 12.02 0 003 9c0 5.59 3.82 10.29 9 11.62 5.18-1.33 9-6.03 9-11.62 0-1.04-.13-2.05-.38-3.02z"/></svg>
                </div>
                <h3 class="text-base sm:text-lg font-semibold text-slate-900 mb-2">Privacy First</h3>
                <p class="text-sm text-slate-600 leading-relaxed">Zero-log policy. Your data stays private, always.</p>
            </div>
        </div>
    </div>
</section>

<!-- Pricing -->
<section id="pricing" class="py-12 sm:py-16 md:py-20 lg:py-24 bg-white">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-2xl mx-auto mb-10 sm:mb-12 md:mb-14">
            <span class="inline-block px-3 py-1 bg-blue-100 text-blue-700 text-xs font-medium rounded-full mb-3">Pricing</span>
            <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-slate-900 mb-3">Simple, transparent pricing</h2>
            <p class="text-sm sm:text-base text-slate-600">Start free. Upgrade when you need more. No hidden fees.</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 sm:gap-5 md:gap-6 max-w-5xl mx-auto">
            <!-- Free -->
            <div class="bg-white border border-slate-200 rounded-2xl p-6 sm:p-7 hover:shadow-md transition">
                <h3 class="text-base sm:text-lg font-semibold text-slate-900 mb-1">Free</h3>
                <p class="text-xs sm:text-sm text-slate-500 mb-4">Perfect for casual users</p>
                <div class="mb-5 pb-5 border-b border-slate-100">
                    <span class="text-3xl sm:text-4xl font-bold text-slate-900">$0</span>
                    <span class="text-sm text-slate-500">/forever</span>
                </div>
                <a href="{{ url('/register') }}" class="block w-full py-2.5 sm:py-3 text-center text-sm font-medium bg-slate-100 hover:bg-slate-200 text-slate-900 rounded-lg transition mb-5">Get Started</a>
                <ul class="space-y-2.5">
                    <li class="flex items-start gap-2 text-sm text-slate-700"><svg class="w-4 h-4 text-emerald-600 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.7 5.29a1 1 0 010 1.42l-8 8a1 1 0 01-1.42 0l-4-4a1 1 0 011.42-1.42L8 12.59l7.29-7.3a1 1 0 011.41 0z" clip-rule="evenodd"/></svg>5 daily searches</li>
                    <li class="flex items-start gap-2 text-sm text-slate-700"><svg class="w-4 h-4 text-emerald-600 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.7 5.29a1 1 0 010 1.42l-8 8a1 1 0 01-1.42 0l-4-4a1 1 0 011.42-1.42L8 12.59l7.29-7.3a1 1 0 011.41 0z" clip-rule="evenodd"/></svg>Online streaming</li>
                    <li class="flex items-start gap-2 text-sm text-slate-700"><svg class="w-4 h-4 text-emerald-600 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.7 5.29a1 1 0 010 1.42l-8 8a1 1 0 01-1.42 0l-4-4a1 1 0 011.42-1.42L8 12.59l7.29-7.3a1 1 0 011.41 0z" clip-rule="evenodd"/></svg>Basic quality (720p)</li>
                    <li class="flex items-start gap-2 text-sm text-slate-700"><svg class="w-4 h-4 text-emerald-600 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.7 5.29a1 1 0 010 1.42l-8 8a1 1 0 01-1.42 0l-4-4a1 1 0 011.42-1.42L8 12.59l7.29-7.3a1 1 0 011.41 0z" clip-rule="evenodd"/></svg>Bookmarks &amp; history</li>
                </ul>
            </div>
            <!-- Pro -->
            <div class="bg-gradient-to-br from-blue-600 to-indigo-600 rounded-2xl p-6 sm:p-7 shadow-xl shadow-blue-500/30 relative md:-mt-4">
                <div class="absolute -top-3 left-1/2 -translate-x-1/2 px-3 py-1 bg-white text-blue-600 text-xs font-bold rounded-full shadow-md">POPULAR</div>
                <h3 class="text-base sm:text-lg font-semibold text-white mb-1">Pro</h3>
                <p class="text-xs sm:text-sm text-blue-100 mb-4">For power users</p>
                <div class="mb-5 pb-5 border-b border-white/20">
                    <span class="text-3xl sm:text-4xl font-bold text-white">$9</span>
                    <span class="text-sm text-blue-100">/month</span>
                </div>
                <a href="{{ url('/register') }}" class="block w-full py-2.5 sm:py-3 text-center text-sm font-semibold bg-white hover:bg-blue-50 text-blue-600 rounded-lg transition mb-5">Get Started</a>
                <ul class="space-y-2.5">
                    <li class="flex items-start gap-2 text-sm text-white"><svg class="w-4 h-4 text-blue-200 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.7 5.29a1 1 0 010 1.42l-8 8a1 1 0 01-1.42 0l-4-4a1 1 0 011.42-1.42L8 12.59l7.29-7.3a1 1 0 011.41 0z" clip-rule="evenodd"/></svg>Unlimited searches</li>
                    <li class="flex items-start gap-2 text-sm text-white"><svg class="w-4 h-4 text-blue-200 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.7 5.29a1 1 0 010 1.42l-8 8a1 1 0 01-1.42 0l-4-4a1 1 0 011.42-1.42L8 12.59l7.29-7.3a1 1 0 011.41 0z" clip-rule="evenodd"/></svg>HD streaming (1080p)</li>
                    <li class="flex items-start gap-2 text-sm text-white"><svg class="w-4 h-4 text-blue-200 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.7 5.29a1 1 0 010 1.42l-8 8a1 1 0 01-1.42 0l-4-4a1 1 0 011.42-1.42L8 12.59l7.29-7.3a1 1 0 011.41 0z" clip-rule="evenodd"/></svg>Batch processing</li>
                    <li class="flex items-start gap-2 text-sm text-white"><svg class="w-4 h-4 text-blue-200 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.7 5.29a1 1 0 010 1.42l-8 8a1 1 0 01-1.42 0l-4-4a1 1 0 011.42-1.42L8 12.59l7.29-7.3a1 1 0 011.41 0z" clip-rule="evenodd"/></svg>Priority support</li>
                    <li class="flex items-start gap-2 text-sm text-white"><svg class="w-4 h-4 text-blue-200 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.7 5.29a1 1 0 010 1.42l-8 8a1 1 0 01-1.42 0l-4-4a1 1 0 011.42-1.42L8 12.59l7.29-7.3a1 1 0 011.41 0z" clip-rule="evenodd"/></svg>No ads</li>
                </ul>
            </div>
            <!-- Enterprise -->
            <div class="bg-white border border-slate-200 rounded-2xl p-6 sm:p-7 hover:shadow-md transition">
                <h3 class="text-base sm:text-lg font-semibold text-slate-900 mb-1">Enterprise</h3>
                <p class="text-xs sm:text-sm text-slate-500 mb-4">For teams &amp; businesses</p>
                <div class="mb-5 pb-5 border-b border-slate-100">
                    <span class="text-3xl sm:text-4xl font-bold text-slate-900">$29</span>
                    <span class="text-sm text-slate-500">/month</span>
                </div>
                <a href="{{ url('/register') }}" class="block w-full py-2.5 sm:py-3 text-center text-sm font-medium bg-slate-100 hover:bg-slate-200 text-slate-900 rounded-lg transition mb-5">Get Started</a>
                <ul class="space-y-2.5">
                    <li class="flex items-start gap-2 text-sm text-slate-700"><svg class="w-4 h-4 text-emerald-600 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.7 5.29a1 1 0 010 1.42l-8 8a1 1 0 01-1.42 0l-4-4a1 1 0 011.42-1.42L8 12.59l7.29-7.3a1 1 0 011.41 0z" clip-rule="evenodd"/></svg>Everything in Pro</li>
                    <li class="flex items-start gap-2 text-sm text-slate-700"><svg class="w-4 h-4 text-emerald-600 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.7 5.29a1 1 0 010 1.42l-8 8a1 1 0 01-1.42 0l-4-4a1 1 0 011.42-1.42L8 12.59l7.29-7.3a1 1 0 011.41 0z" clip-rule="evenodd"/></svg>API access</li>
                    <li class="flex items-start gap-2 text-sm text-slate-700"><svg class="w-4 h-4 text-emerald-600 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.7 5.29a1 1 0 010 1.42l-8 8a1 1 0 01-1.42 0l-4-4a1 1 0 011.42-1.42L8 12.59l7.29-7.3a1 1 0 011.41 0z" clip-rule="evenodd"/></svg>Dedicated support</li>
                    <li class="flex items-start gap-2 text-sm text-slate-700"><svg class="w-4 h-4 text-emerald-600 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.7 5.29a1 1 0 010 1.42l-8 8a1 1 0 01-1.42 0l-4-4a1 1 0 011.42-1.42L8 12.59l7.29-7.3a1 1 0 011.41 0z" clip-rule="evenodd"/></svg>Custom integrations</li>
                    <li class="flex items-start gap-2 text-sm text-slate-700"><svg class="w-4 h-4 text-emerald-600 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.7 5.29a1 1 0 010 1.42l-8 8a1 1 0 01-1.42 0l-4-4a1 1 0 011.42-1.42L8 12.59l7.29-7.3a1 1 0 011.41 0z" clip-rule="evenodd"/></svg>SLA guarantee</li>
                </ul>
            </div>
        </div>
        <p class="text-center text-xs sm:text-sm text-slate-500 mt-6 sm:mt-8">Sign up first, then upgrade anytime from your account.</p>
    </div>
</section>

<!-- Reviews / Testimonials -->
<section id="reviews" class="py-12 sm:py-16 md:py-20 lg:py-24 bg-slate-50">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-2xl mx-auto mb-10 sm:mb-12 md:mb-14">
            <span class="inline-block px-3 py-1 bg-amber-100 text-amber-700 text-xs font-medium rounded-full mb-3">Reviews</span>
            <div class="flex items-center justify-center gap-1 mb-3">
                @for($i = 0; $i < 5; $i++)
                    <svg class="w-4 h-4 sm:w-5 sm:h-5 text-amber-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.05 2.93c.3-.92 1.6-.92 1.9 0l1.07 3.29a1 1 0 00.95.69h3.46c.97 0 1.37 1.24.59 1.81l-2.8 2.03a1 1 0 00-.37 1.12l1.07 3.29c.3.92-.75 1.69-1.54 1.12l-2.8-2.03a1 1 0 00-1.17 0l-2.8 2.03c-.78.57-1.84-.2-1.54-1.12l1.07-3.29a1 1 0 00-.37-1.12L2.98 8.72c-.78-.57-.38-1.81.59-1.81h3.46a1 1 0 00.95-.69l1.07-3.29z"/></svg>
                @endfor
                <span class="ml-1.5 text-sm font-medium text-slate-700">4.9 from 12,000+ users</span>
            </div>
            <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-slate-900 mb-3">Loved by users worldwide</h2>
            <p class="text-sm sm:text-base text-slate-600">Real stories from real people using XteraPlay every day.</p>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-5 md:gap-6">
            <div class="bg-white border border-slate-200 rounded-2xl p-5 sm:p-6 hover:shadow-md transition">
                <div class="flex items-center gap-0.5 mb-3">
                    @for($i = 0; $i < 5; $i++)<svg class="w-3.5 h-3.5 text-amber-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.05 2.93c.3-.92 1.6-.92 1.9 0l1.07 3.29a1 1 0 00.95.69h3.46c.97 0 1.37 1.24.59 1.81l-2.8 2.03a1 1 0 00-.37 1.12l1.07 3.29c.3.92-.75 1.69-1.54 1.12l-2.8-2.03a1 1 0 00-1.17 0l-2.8 2.03c-.78.57-1.84-.2-1.54-1.12l1.07-3.29a1 1 0 00-.37-1.12L2.98 8.72c-.78-.57-.38-1.81.59-1.81h3.46a1 1 0 00.95-.69l1.07-3.29z"/></svg>@endfor
                </div>
                <p class="text-sm text-slate-700 leading-relaxed mb-4">"Finally a Terabox tool that just works. Super fast, no ads, and the mobile experience is smooth as butter."</p>
                <div class="flex items-center gap-3 pt-4 border-t border-slate-100">
                    <div class="w-9 h-9 rounded-full bg-gradient-to-br from-blue-500 to-cyan-500 flex items-center justify-center text-xs font-semibold text-white">RK</div>
                    <div><p class="text-sm font-semibold text-slate-900">Rahul K.</p><p class="text-xs text-slate-500">Free user</p></div>
                </div>
            </div>
            <div class="bg-white border border-slate-200 rounded-2xl p-5 sm:p-6 hover:shadow-md transition">
                <div class="flex items-center gap-0.5 mb-3">
                    @for($i = 0; $i < 5; $i++)<svg class="w-3.5 h-3.5 text-amber-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.05 2.93c.3-.92 1.6-.92 1.9 0l1.07 3.29a1 1 0 00.95.69h3.46c.97 0 1.37 1.24.59 1.81l-2.8 2.03a1 1 0 00-.37 1.12l1.07 3.29c.3.92-.75 1.69-1.54 1.12l-2.8-2.03a1 1 0 00-1.17 0l-2.8 2.03c-.78.57-1.84-.2-1.54-1.12l1.07-3.29a1 1 0 00-.37-1.12L2.98 8.72c-.78-.57-.38-1.81.59-1.81h3.46a1 1 0 00.95-.69l1.07-3.29z"/></svg>@endfor
                </div>
                <p class="text-sm text-slate-700 leading-relaxed mb-4">"Batch processing is a game-changer. I download entire folders in one click. Worth every penny of Pro."</p>
                <div class="flex items-center gap-3 pt-4 border-t border-slate-100">
                    <div class="w-9 h-9 rounded-full bg-gradient-to-br from-purple-500 to-pink-500 flex items-center justify-center text-xs font-semibold text-white">SM</div>
                    <div><p class="text-sm font-semibold text-slate-900">Sarah M.</p><p class="text-xs text-slate-500">Pro user</p></div>
                </div>
            </div>
            <div class="bg-white border border-slate-200 rounded-2xl p-5 sm:p-6 hover:shadow-md transition">
                <div class="flex items-center gap-0.5 mb-3">
                    @for($i = 0; $i < 5; $i++)<svg class="w-3.5 h-3.5 text-amber-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.05 2.93c.3-.92 1.6-.92 1.9 0l1.07 3.29a1 1 0 00.95.69h3.46c.97 0 1.37 1.24.59 1.81l-2.8 2.03a1 1 0 00-.37 1.12l1.07 3.29c.3.92-.75 1.69-1.54 1.12l-2.8-2.03a1 1 0 00-1.17 0l-2.8 2.03c-.78.57-1.84-.2-1.54-1.12l1.07-3.29a1 1 0 00-.37-1.12L2.98 8.72c-.78-.57-.38-1.81.59-1.81h3.46a1 1 0 00.95-.69l1.07-3.29z"/></svg>@endfor
                </div>
                <p class="text-sm text-slate-700 leading-relaxed mb-4">"The API is clean and well-documented. Integrated it into our app in under an hour. Fantastic support."</p>
                <div class="flex items-center gap-3 pt-4 border-t border-slate-100">
                    <div class="w-9 h-9 rounded-full bg-gradient-to-br from-emerald-500 to-teal-500 flex items-center justify-center text-xs font-semibold text-white">AT</div>
                    <div><p class="text-sm font-semibold text-slate-900">Ahmed T.</p><p class="text-xs text-slate-500">Enterprise</p></div>
                </div>
            </div>
            <div class="bg-white border border-slate-200 rounded-2xl p-5 sm:p-6 hover:shadow-md transition">
                <div class="flex items-center gap-0.5 mb-3">
                    @for($i = 0; $i < 4; $i++)<svg class="w-3.5 h-3.5 text-amber-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.05 2.93c.3-.92 1.6-.92 1.9 0l1.07 3.29a1 1 0 00.95.69h3.46c.97 0 1.37 1.24.59 1.81l-2.8 2.03a1 1 0 00-.37 1.12l1.07 3.29c.3.92-.75 1.69-1.54 1.12l-2.8-2.03a1 1 0 00-1.17 0l-2.8 2.03c-.78.57-1.84-.2-1.54-1.12l1.07-3.29a1 1 0 00-.37-1.12L2.98 8.72c-.78-.57-.38-1.81.59-1.81h3.46a1 1 0 00.95-.69l1.07-3.29z"/></svg>@endfor
                    <svg class="w-3.5 h-3.5 text-slate-300" fill="currentColor" viewBox="0 0 20 20"><path d="M9.05 2.93c.3-.92 1.6-.92 1.9 0l1.07 3.29a1 1 0 00.95.69h3.46c.97 0 1.37 1.24.59 1.81l-2.8 2.03a1 1 0 00-.37 1.12l1.07 3.29c.3.92-.75 1.69-1.54 1.12l-2.8-2.03a1 1 0 00-1.17 0l-2.8 2.03c-.78.57-1.84-.2-1.54-1.12l1.07-3.29a1 1 0 00-.37-1.12L2.98 8.72c-.78-.57-.38-1.81.59-1.81h3.46a1 1 0 00.95-.69l1.07-3.29z"/></svg>
                </div>
                <p class="text-sm text-slate-700 leading-relaxed mb-4">"Great tool for downloading. Would love to see 4K support in the free plan someday."</p>
                <div class="flex items-center gap-3 pt-4 border-t border-slate-100">
                    <div class="w-9 h-9 rounded-full bg-gradient-to-br from-orange-500 to-red-500 flex items-center justify-center text-xs font-semibold text-white">PS</div>
                    <div><p class="text-sm font-semibold text-slate-900">Priya S.</p><p class="text-xs text-slate-500">Free user</p></div>
                </div>
            </div>
            <div class="bg-white border border-slate-200 rounded-2xl p-5 sm:p-6 hover:shadow-md transition">
                <div class="flex items-center gap-0.5 mb-3">
                    @for($i = 0; $i < 5; $i++)<svg class="w-3.5 h-3.5 text-amber-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.05 2.93c.3-.92 1.6-.92 1.9 0l1.07 3.29a1 1 0 00.95.69h3.46c.97 0 1.37 1.24.59 1.81l-2.8 2.03a1 1 0 00-.37 1.12l1.07 3.29c.3.92-.75 1.69-1.54 1.12l-2.8-2.03a1 1 0 00-1.17 0l-2.8 2.03c-.78.57-1.84-.2-1.54-1.12l1.07-3.29a1 1 0 00-.37-1.12L2.98 8.72c-.78-.57-.38-1.81.59-1.81h3.46a1 1 0 00.95-.69l1.07-3.29z"/></svg>@endfor
                </div>
                <p class="text-sm text-slate-700 leading-relaxed mb-4">"Zero-log policy sold me. Privacy matters and XteraPlay respects it. Been using for 6 months now."</p>
                <div class="flex items-center gap-3 pt-4 border-t border-slate-100">
                    <div class="w-9 h-9 rounded-full bg-gradient-to-br from-indigo-500 to-violet-500 flex items-center justify-center text-xs font-semibold text-white">ML</div>
                    <div><p class="text-sm font-semibold text-slate-900">Michael L.</p><p class="text-xs text-slate-500">Pro user</p></div>
                </div>
            </div>
            <div class="bg-white border border-slate-200 rounded-2xl p-5 sm:p-6 hover:shadow-md transition">
                <div class="flex items-center gap-0.5 mb-3">
                    @for($i = 0; $i < 5; $i++)<svg class="w-3.5 h-3.5 text-amber-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.05 2.93c.3-.92 1.6-.92 1.9 0l1.07 3.29a1 1 0 00.95.69h3.46c.97 0 1.37 1.24.59 1.81l-2.8 2.03a1 1 0 00-.37 1.12l1.07 3.29c.3.92-.75 1.69-1.54 1.12l-2.8-2.03a1 1 0 00-1.17 0l-2.8 2.03c-.78.57-1.84-.2-1.54-1.12l1.07-3.29a1 1 0 00-.37-1.12L2.98 8.72c-.78-.57-.38-1.81.59-1.81h3.46a1 1 0 00.95-.69l1.07-3.29z"/></svg>@endfor
                </div>
                <p class="text-sm text-slate-700 leading-relaxed mb-4">"Mobile experience is perfect. Works flawlessly on my phone without any lag. Love the clean UI!"</p>
                <div class="flex items-center gap-3 pt-4 border-t border-slate-100">
                    <div class="w-9 h-9 rounded-full bg-gradient-to-br from-pink-500 to-rose-500 flex items-center justify-center text-xs font-semibold text-white">FZ</div>
                    <div><p class="text-sm font-semibold text-slate-900">Fatima Z.</p><p class="text-xs text-slate-500">Free user</p></div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="py-12 sm:py-16 md:py-20 bg-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-gradient-to-br from-blue-600 to-indigo-600 rounded-2xl sm:rounded-3xl p-8 sm:p-10 md:p-14 text-center shadow-xl shadow-blue-500/20">
            <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-white mb-3">Ready to get started?</h2>
            <p class="text-sm sm:text-base text-blue-100 mb-6 sm:mb-8 max-w-xl mx-auto">Join thousands of creators and everyday users streaming Terabox videos every day.</p>
            <div class="flex flex-col sm:flex-row items-center justify-center gap-3">
                <a href="{{ url('/register') }}" class="w-full sm:w-auto px-6 sm:px-8 py-3 bg-white hover:bg-blue-50 text-blue-600 text-sm sm:text-base font-semibold rounded-lg shadow-sm transition">Get Started Free</a>
                <a href="{{ url('/') }}#features" class="w-full sm:w-auto px-6 sm:px-8 py-3 bg-blue-500/20 hover:bg-blue-500/30 text-white text-sm sm:text-base font-semibold rounded-lg border border-white/20 transition">Learn More</a>
            </div>
        </div>
    </div>
</section>

@endsection
