@extends('layouts.app')

@section('title', 'XteraPlay - Stream & Download Videos from Terabox')

@section('content')
<!-- Hero Section -->
<section class="py-20 px-4">
    <div class="max-w-4xl mx-auto text-center">
        <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-4">Terabox Search</h1>
        <p class="text-gray-400 text-lg md:text-xl mb-8">Paste a link to stream or download — no signup required</p>

        <!-- Daily Credits Badge -->
        <div class="inline-flex items-center px-4 py-2 bg-[#1a1a1f] border border-[#2a2a30] rounded-full mb-8">
            <svg class="w-4 h-4 text-amber-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"/>
            </svg>
            <span class="text-sm text-gray-300">Daily Credits: <span class="text-amber-500 font-semibold">5/5</span></span>
        </div>


        <!-- URL Input -->
        <div class="flex flex-col sm:flex-row items-stretch gap-3 max-w-2xl mx-auto mb-6">
            <input type="text" placeholder="Paste your Terabox link here..." class="flex-1 px-5 py-4 bg-[#111113] border border-[#2a2a30] rounded-xl text-white placeholder-gray-500 focus:outline-none focus:border-indigo-500 transition text-sm">
            <button class="px-8 py-4 bg-gradient-to-r from-indigo-500 to-violet-600 text-white font-semibold rounded-xl hover:from-indigo-600 hover:to-violet-700 transition whitespace-nowrap">Watch Now</button>
        </div>

        <!-- Upsell Banner -->
        <div class="max-w-xl mx-auto bg-[#1a1a1f] border border-[#2a2a30] rounded-xl p-4 mb-8">
            <p class="text-gray-400 text-sm mb-3">Want more daily searches?</p>
            <div class="flex items-center justify-center gap-3">
                <a href="{{ url('/register') }}" class="px-4 py-2 bg-gradient-to-r from-indigo-500 to-violet-600 text-white text-sm font-medium rounded-lg hover:from-indigo-600 hover:to-violet-700 transition">Sign Up Free</a>
                <a href="{{ url('/login') }}" class="px-4 py-2 bg-[#111113] border border-[#2a2a30] text-gray-300 text-sm font-medium rounded-lg hover:border-gray-500 transition">Login</a>
            </div>
        </div>

        <!-- Feature Pills -->
        <div class="flex flex-wrap items-center justify-center gap-3">
            <div class="flex items-center px-3 py-1.5 bg-[#1a1a1f] border border-[#2a2a30] rounded-full">
                <svg class="w-3.5 h-3.5 text-amber-500 mr-2" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M11.3 1.046A1 1 0 0112 2v5h4a1 1 0 01.82 1.573l-7 10A1 1 0 018 18v-5H4a1 1 0 01-.82-1.573l7-10a1 1 0 011.12-.38z" clip-rule="evenodd"/></svg>
                <span class="text-xs text-gray-300">Instant</span>
            </div>
            <div class="flex items-center px-3 py-1.5 bg-[#1a1a1f] border border-[#2a2a30] rounded-full">
                <svg class="w-3.5 h-3.5 text-emerald-500 mr-2" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"/></svg>
                <span class="text-xs text-gray-300">Secure</span>
            </div>
            <div class="flex items-center px-3 py-1.5 bg-[#1a1a1f] border border-[#2a2a30] rounded-full">
                <svg class="w-3.5 h-3.5 text-blue-500 mr-2" fill="currentColor" viewBox="0 0 20 20"><path d="M2 6a2 2 0 012-2h6a2 2 0 012 2v8a2 2 0 01-2 2H4a2 2 0 01-2-2V6zM14.553 7.106A1 1 0 0014 8v4a1 1 0 00.553.894l2 1A1 1 0 0018 13V7a1 1 0 00-1.447-.894l-2 1z"/></svg>
                <span class="text-xs text-gray-300">HD Quality</span>
            </div>
            <div class="flex items-center px-3 py-1.5 bg-[#1a1a1f] border border-[#2a2a30] rounded-full">
                <svg class="w-3.5 h-3.5 text-purple-500 mr-2" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M7 2a2 2 0 00-2 2v12a2 2 0 002 2h6a2 2 0 002-2V4a2 2 0 00-2-2H7zm3 14a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"/></svg>
                <span class="text-xs text-gray-300">Mobile Ready</span>
            </div>
        </div>
    </div>
</section>


<!-- Services Section -->
<section class="py-20 px-4">
    <div class="max-w-6xl mx-auto">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">Everything You Need</h2>
            <p class="text-gray-400 max-w-2xl mx-auto">Powerful tools to stream, download, and manage your Terabox content effortlessly.</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Card 1: Video Downloads -->
            <div class="bg-[#1a1a1f] border border-[#2a2a30] rounded-2xl p-6 hover:border-[#3a3a40] transition">
                <div class="w-12 h-12 bg-blue-500/10 rounded-xl flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                </div>
                <h3 class="text-white font-semibold text-lg mb-2">Video Downloads</h3>
                <p class="text-gray-400 text-sm">Download videos directly from Terabox links in multiple quality options.</p>
            </div>
            <!-- Card 2: Online Streaming -->
            <div class="bg-[#1a1a1f] border border-[#2a2a30] rounded-2xl p-6 hover:border-[#3a3a40] transition">
                <div class="w-12 h-12 bg-green-500/10 rounded-xl flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
                <h3 class="text-white font-semibold text-lg mb-2">Online Streaming</h3>
                <p class="text-gray-400 text-sm">Stream videos directly in your browser without downloading large files.</p>
            </div>
            <!-- Card 3: Link Converter -->
            <div class="bg-[#1a1a1f] border border-[#2a2a30] rounded-2xl p-6 hover:border-[#3a3a40] transition">
                <div class="w-12 h-12 bg-orange-500/10 rounded-xl flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"/></svg>
                </div>
                <h3 class="text-white font-semibold text-lg mb-2">Link Converter</h3>
                <p class="text-gray-400 text-sm">Convert Terabox sharing links into direct downloadable URLs instantly.</p>
            </div>
            <!-- Card 4: Batch Processing -->
            <div class="bg-[#1a1a1f] border border-[#2a2a30] rounded-2xl p-6 hover:border-[#3a3a40] transition">
                <div class="w-12 h-12 bg-purple-500/10 rounded-xl flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
                </div>
                <h3 class="text-white font-semibold text-lg mb-2">Batch Processing</h3>
                <p class="text-gray-400 text-sm">Process multiple links at once and download them in bulk efficiently.</p>
            </div>
            <!-- Card 5: Developer API -->
            <div class="bg-[#1a1a1f] border border-[#2a2a30] rounded-2xl p-6 hover:border-[#3a3a40] transition">
                <div class="w-12 h-12 bg-pink-500/10 rounded-xl flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-pink-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/></svg>
                </div>
                <h3 class="text-white font-semibold text-lg mb-2">Developer API</h3>
                <p class="text-gray-400 text-sm">Integrate XteraPlay into your own applications with our RESTful API.</p>
            </div>
            <!-- Card 6: Privacy First -->
            <div class="bg-[#1a1a1f] border border-[#2a2a30] rounded-2xl p-6 hover:border-[#3a3a40] transition">
                <div class="w-12 h-12 bg-emerald-500/10 rounded-xl flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                </div>
                <h3 class="text-white font-semibold text-lg mb-2">Privacy First</h3>
                <p class="text-gray-400 text-sm">Your data stays private. We never store your links or personal info.</p>
            </div>
        </div>
    </div>
</section>


<!-- Why XteraPlay Section -->
<section class="py-20 px-4 bg-[#0d0d0f]">
    <div class="max-w-6xl mx-auto">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">Why XteraPlay?</h2>
            <p class="text-gray-400 max-w-2xl mx-auto">The best way to access your Terabox content with powerful features.</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="bg-[#1a1a1f] border border-[#2a2a30] rounded-2xl p-6">
                <div class="w-10 h-10 bg-amber-500/10 rounded-lg flex items-center justify-center mb-3">
                    <svg class="w-5 h-5 text-amber-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M11.3 1.046A1 1 0 0112 2v5h4a1 1 0 01.82 1.573l-7 10A1 1 0 018 18v-5H4a1 1 0 01-.82-1.573l7-10a1 1 0 011.12-.38z" clip-rule="evenodd"/></svg>
                </div>
                <h3 class="text-white font-semibold mb-2">Lightning Fast</h3>
                <p class="text-gray-400 text-sm">Get your download links in seconds with our optimized servers.</p>
            </div>
            <div class="bg-[#1a1a1f] border border-[#2a2a30] rounded-2xl p-6">
                <div class="w-10 h-10 bg-emerald-500/10 rounded-lg flex items-center justify-center mb-3">
                    <svg class="w-5 h-5 text-emerald-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"/></svg>
                </div>
                <h3 class="text-white font-semibold mb-2">Private & Secure</h3>
                <p class="text-gray-400 text-sm">End-to-end encryption ensures your activity remains private.</p>
            </div>
            <div class="bg-[#1a1a1f] border border-[#2a2a30] rounded-2xl p-6">
                <div class="w-10 h-10 bg-blue-500/10 rounded-lg flex items-center justify-center mb-3">
                    <svg class="w-5 h-5 text-blue-500" fill="currentColor" viewBox="0 0 20 20"><path d="M2 6a2 2 0 012-2h6a2 2 0 012 2v8a2 2 0 01-2 2H4a2 2 0 01-2-2V6zM14.553 7.106A1 1 0 0014 8v4a1 1 0 00.553.894l2 1A1 1 0 0018 13V7a1 1 0 00-1.447-.894l-2 1z"/></svg>
                </div>
                <h3 class="text-white font-semibold mb-2">HD Quality</h3>
                <p class="text-gray-400 text-sm">Stream and download in full HD quality without compression.</p>
            </div>
            <div class="bg-[#1a1a1f] border border-[#2a2a30] rounded-2xl p-6">
                <div class="w-10 h-10 bg-purple-500/10 rounded-lg flex items-center justify-center mb-3">
                    <svg class="w-5 h-5 text-purple-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M7 2a2 2 0 00-2 2v12a2 2 0 002 2h6a2 2 0 002-2V4a2 2 0 00-2-2H7zm3 14a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"/></svg>
                </div>
                <h3 class="text-white font-semibold mb-2">Mobile Friendly</h3>
                <p class="text-gray-400 text-sm">Fully responsive design works perfectly on any device.</p>
            </div>
            <div class="bg-[#1a1a1f] border border-[#2a2a30] rounded-2xl p-6">
                <div class="w-10 h-10 bg-pink-500/10 rounded-lg flex items-center justify-center mb-3">
                    <svg class="w-5 h-5 text-pink-500" fill="currentColor" viewBox="0 0 20 20"><path d="M5 4a2 2 0 012-2h6a2 2 0 012 2v14l-5-2.5L5 18V4z"/></svg>
                </div>
                <h3 class="text-white font-semibold mb-2">Bookmarks</h3>
                <p class="text-gray-400 text-sm">Save your favorite videos and access them anytime later.</p>
            </div>
            <div class="bg-[#1a1a1f] border border-[#2a2a30] rounded-2xl p-6">
                <div class="w-10 h-10 bg-indigo-500/10 rounded-lg flex items-center justify-center mb-3">
                    <svg class="w-5 h-5 text-indigo-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/></svg>
                </div>
                <h3 class="text-white font-semibold mb-2">Watch History</h3>
                <p class="text-gray-400 text-sm">Keep track of everything you've watched with detailed history.</p>
            </div>
        </div>
    </div>
</section>


<!-- Pricing Section -->
<section class="py-20 px-4">
    <div class="max-w-6xl mx-auto">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">Simple Pricing</h2>
            <p class="text-gray-400 max-w-2xl mx-auto">Choose the plan that fits your needs. Upgrade or downgrade anytime.</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 max-w-5xl mx-auto">
            <!-- Free Plan -->
            <div class="bg-[#1a1a1f] border border-[#2a2a30] rounded-2xl p-8">
                <h3 class="text-white font-semibold text-lg mb-1">Free</h3>
                <div class="mb-4">
                    <span class="text-4xl font-bold text-white">$0</span>
                    <span class="text-gray-400 text-sm">/forever</span>
                </div>
                <p class="text-gray-400 text-sm mb-6">Perfect for casual users who need basic access.</p>
                <a href="{{ url('/register') }}" class="block w-full py-3 px-4 bg-[#111113] border border-[#2a2a30] text-white text-center text-sm font-medium rounded-xl hover:border-gray-500 transition mb-6">Get Started</a>
                <ul class="space-y-3">
                    <li class="flex items-center text-sm text-gray-300">
                        <svg class="w-4 h-4 text-emerald-500 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                        5 daily searches
                    </li>
                    <li class="flex items-center text-sm text-gray-300">
                        <svg class="w-4 h-4 text-emerald-500 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                        Online streaming
                    </li>
                    <li class="flex items-center text-sm text-gray-300">
                        <svg class="w-4 h-4 text-emerald-500 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                        Basic quality
                    </li>
                    <li class="flex items-center text-sm text-gray-300">
                        <svg class="w-4 h-4 text-emerald-500 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                        Bookmarks
                    </li>
                </ul>
            </div>


            <!-- Pro Plan (Most Popular) -->
            <div class="bg-[#1a1a1f] border-2 border-indigo-500 rounded-2xl p-8 relative">
                <div class="absolute -top-3 left-1/2 -translate-x-1/2 px-3 py-1 bg-gradient-to-r from-indigo-500 to-violet-600 text-white text-xs font-semibold rounded-full">MOST POPULAR</div>
                <h3 class="text-white font-semibold text-lg mb-1">Pro</h3>
                <div class="mb-4">
                    <span class="text-4xl font-bold text-white">$9</span>
                    <span class="text-gray-400 text-sm">/month</span>
                </div>
                <p class="text-gray-400 text-sm mb-6">For power users who need unlimited access and features.</p>
                <a href="{{ url('/register') }}" class="block w-full py-3 px-4 bg-gradient-to-r from-indigo-500 to-violet-600 text-white text-center text-sm font-medium rounded-xl hover:from-indigo-600 hover:to-violet-700 transition mb-6">Get Started</a>
                <ul class="space-y-3">
                    <li class="flex items-center text-sm text-gray-300">
                        <svg class="w-4 h-4 text-emerald-500 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                        Unlimited searches
                    </li>
                    <li class="flex items-center text-sm text-gray-300">
                        <svg class="w-4 h-4 text-emerald-500 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                        HD streaming & downloads
                    </li>
                    <li class="flex items-center text-sm text-gray-300">
                        <svg class="w-4 h-4 text-emerald-500 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                        Batch processing
                    </li>
                    <li class="flex items-center text-sm text-gray-300">
                        <svg class="w-4 h-4 text-emerald-500 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                        Priority support
                    </li>
                    <li class="flex items-center text-sm text-gray-300">
                        <svg class="w-4 h-4 text-emerald-500 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                        No ads
                    </li>
                </ul>
            </div>


            <!-- Enterprise Plan -->
            <div class="bg-[#1a1a1f] border border-[#2a2a30] rounded-2xl p-8">
                <h3 class="text-white font-semibold text-lg mb-1">Enterprise</h3>
                <div class="mb-4">
                    <span class="text-4xl font-bold text-white">$29</span>
                    <span class="text-gray-400 text-sm">/month</span>
                </div>
                <p class="text-gray-400 text-sm mb-6">For teams and businesses that need API access and more.</p>
                <a href="{{ url('/register') }}" class="block w-full py-3 px-4 bg-[#111113] border border-[#2a2a30] text-white text-center text-sm font-medium rounded-xl hover:border-gray-500 transition mb-6">Get Started</a>
                <ul class="space-y-3">
                    <li class="flex items-center text-sm text-gray-300">
                        <svg class="w-4 h-4 text-emerald-500 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                        Everything in Pro
                    </li>
                    <li class="flex items-center text-sm text-gray-300">
                        <svg class="w-4 h-4 text-emerald-500 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                        API access
                    </li>
                    <li class="flex items-center text-sm text-gray-300">
                        <svg class="w-4 h-4 text-emerald-500 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                        Dedicated support
                    </li>
                    <li class="flex items-center text-sm text-gray-300">
                        <svg class="w-4 h-4 text-emerald-500 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                        Custom integrations
                    </li>
                    <li class="flex items-center text-sm text-gray-300">
                        <svg class="w-4 h-4 text-emerald-500 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                        SLA guarantee
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>


<!-- CTA Section -->
<section class="py-20 px-4">
    <div class="max-w-3xl mx-auto text-center">
        <div class="bg-[#1a1a1f] border border-[#2a2a30] rounded-2xl p-12">
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">Ready to start?</h2>
            <p class="text-gray-400 mb-8">Join thousands of users who trust XteraPlay for their Terabox needs.</p>
            <a href="{{ url('/register') }}" class="inline-block px-8 py-4 bg-gradient-to-r from-indigo-500 to-violet-600 text-white font-semibold rounded-xl hover:from-indigo-600 hover:to-violet-700 transition">Get Started for Free</a>
        </div>
    </div>
</section>
@endsection
