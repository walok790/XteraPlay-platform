@extends('layouts.app')

@section('title', 'XteraPlay - Stream Terabox Videos')

@section('content')

<!-- Hero -->
<section id="home" class="px-4 pt-6 pb-8 sm:pt-10 sm:pb-12 md:pt-16 md:pb-20">
    <div class="max-w-3xl mx-auto text-center">
        <div class="inline-flex items-center gap-1.5 px-2.5 py-1 bg-[#12121a] border border-[#2a2a30] rounded-full mb-4">
            <span class="w-1.5 h-1.5 bg-emerald-500 rounded-full animate-pulse"></span>
            <span class="text-[10px] text-gray-400">No signup required · 5 free/day</span>
        </div>

        <h1 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold text-white leading-tight mb-2 sm:mb-3">
            Terabox Search
        </h1>
        <p class="text-xs sm:text-sm md:text-base text-gray-400 mb-5 sm:mb-6 max-w-md mx-auto">
            Paste a link to stream or download instantly
        </p>

        <!-- URL Input -->
        <div class="max-w-xl mx-auto mb-4">
            <div class="flex items-stretch gap-2 bg-[#12121a] border border-[#2a2a30] rounded-xl p-1.5 focus-within:border-indigo-500 transition">
                <div class="flex items-center pl-2.5 pr-1">
                    <svg class="w-3.5 h-3.5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"/></svg>
                </div>
                <input type="text" placeholder="Paste Terabox URL..." class="flex-1 min-w-0 bg-transparent text-xs sm:text-sm text-white placeholder-gray-500 focus:outline-none py-2">
                <button class="px-3 sm:px-4 py-2 bg-gradient-to-r from-indigo-500 to-violet-600 text-white text-xs sm:text-sm font-medium rounded-lg hover:opacity-90 transition whitespace-nowrap">
                    <svg class="w-3 h-3 inline mr-0.5" fill="currentColor" viewBox="0 0 20 20"><path d="M6.3 2.841A1.5 1.5 0 004 4.11V15.89a1.5 1.5 0 002.3 1.269l9.344-5.89a1.5 1.5 0 000-2.538L6.3 2.84z"/></svg>
                    Watch
                </button>
            </div>
        </div>

        <!-- Credits -->
        <div class="inline-flex items-center gap-2 px-3 py-1.5 bg-[#12121a] border border-[#2a2a30] rounded-full">
            <span class="text-[10px] text-gray-500">Daily Credits</span>
            <span class="text-[10px] font-bold text-amber-500">5 / 5</span>
        </div>

        <!-- Feature pills -->
        <div class="mt-6 flex flex-wrap justify-center gap-1.5">
            <span class="inline-flex items-center gap-1 px-2 py-1 bg-[#12121a] border border-[#2a2a30] rounded-full text-[10px] text-gray-400">
                <svg class="w-2.5 h-2.5 text-amber-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M11.3 1a1 1 0 01.7 1v5h4a1 1 0 01.82 1.573l-7 10A1 1 0 018 18v-5H4a1 1 0 01-.82-1.573l7-10a1 1 0 011.12-.38z" clip-rule="evenodd"/></svg>
                Instant
            </span>
            <span class="inline-flex items-center gap-1 px-2 py-1 bg-[#12121a] border border-[#2a2a30] rounded-full text-[10px] text-gray-400">
                <svg class="w-2.5 h-2.5 text-emerald-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2z" clip-rule="evenodd"/></svg>
                Secure
            </span>
            <span class="inline-flex items-center gap-1 px-2 py-1 bg-[#12121a] border border-[#2a2a30] rounded-full text-[10px] text-gray-400">
                <svg class="w-2.5 h-2.5 text-blue-500" fill="currentColor" viewBox="0 0 20 20"><path d="M2 6a2 2 0 012-2h6a2 2 0 012 2v8a2 2 0 01-2 2H4a2 2 0 01-2-2V6zm12.6 1.1A1 1 0 0014 8v4a1 1 0 00.55.89l2 1A1 1 0 0018 13V7a1 1 0 00-1.45-.89l-2 1z"/></svg>
                HD Quality
            </span>
            <span class="inline-flex items-center gap-1 px-2 py-1 bg-[#12121a] border border-[#2a2a30] rounded-full text-[10px] text-gray-400">
                <svg class="w-2.5 h-2.5 text-purple-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M7 2a2 2 0 00-2 2v12a2 2 0 002 2h6a2 2 0 002-2V4a2 2 0 00-2-2H7z" clip-rule="evenodd"/></svg>
                Mobile Ready
            </span>
        </div>
    </div>
</section>

<!-- Features -->
<section id="features" class="px-4 py-8 sm:py-12 md:py-16 border-t border-[#1e1e2e]">
    <div class="max-w-6xl mx-auto">
        <div class="text-center mb-6 sm:mb-8">
            <h2 class="text-xl sm:text-2xl md:text-3xl font-bold text-white mb-1.5">Everything You Need</h2>
            <p class="text-xs sm:text-sm text-gray-400 max-w-md mx-auto">Powerful tools to stream and manage Terabox content.</p>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-3 gap-3">
            <div class="bg-[#12121a] border border-[#2a2a30] rounded-xl p-3 sm:p-4 hover:border-indigo-500/30 transition">
                <div class="w-8 h-8 bg-blue-500/10 rounded-lg flex items-center justify-center mb-2.5">
                    <svg class="w-4 h-4 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                </div>
                <h3 class="text-xs sm:text-sm font-semibold text-white mb-1">Video Downloads</h3>
                <p class="text-[10px] sm:text-xs text-gray-500 leading-relaxed">Direct downloads in multiple quality options.</p>
            </div>
            <div class="bg-[#12121a] border border-[#2a2a30] rounded-xl p-3 sm:p-4 hover:border-indigo-500/30 transition">
                <div class="w-8 h-8 bg-green-500/10 rounded-lg flex items-center justify-center mb-2.5">
                    <svg class="w-4 h-4 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.75 11.17l-3.2-2.13A1 1 0 0010 9.87v4.26a1 1 0 001.55.83l3.2-2.13a1 1 0 000-1.66z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
                <h3 class="text-xs sm:text-sm font-semibold text-white mb-1">Online Streaming</h3>
                <p class="text-[10px] sm:text-xs text-gray-500 leading-relaxed">Stream directly in your browser.</p>
            </div>
            <div class="bg-[#12121a] border border-[#2a2a30] rounded-xl p-3 sm:p-4 hover:border-indigo-500/30 transition">
                <div class="w-8 h-8 bg-orange-500/10 rounded-lg flex items-center justify-center mb-2.5">
                    <svg class="w-4 h-4 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.83 10.17a4 4 0 00-5.66 0l-4 4a4 4 0 105.66 5.66l1.1-1.1m-.76-4.9a4 4 0 005.66 0l4-4a4 4 0 00-5.66-5.66l-1.1 1.1"/></svg>
                </div>
                <h3 class="text-xs sm:text-sm font-semibold text-white mb-1">Link Converter</h3>
                <p class="text-[10px] sm:text-xs text-gray-500 leading-relaxed">Convert to direct downloadable URLs.</p>
            </div>
            <div class="bg-[#12121a] border border-[#2a2a30] rounded-xl p-3 sm:p-4 hover:border-indigo-500/30 transition">
                <div class="w-8 h-8 bg-purple-500/10 rounded-lg flex items-center justify-center mb-2.5">
                    <svg class="w-4 h-4 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
                </div>
                <h3 class="text-xs sm:text-sm font-semibold text-white mb-1">Batch Processing</h3>
                <p class="text-[10px] sm:text-xs text-gray-500 leading-relaxed">Process multiple links at once.</p>
            </div>
            <div class="bg-[#12121a] border border-[#2a2a30] rounded-xl p-3 sm:p-4 hover:border-indigo-500/30 transition">
                <div class="w-8 h-8 bg-pink-500/10 rounded-lg flex items-center justify-center mb-2.5">
                    <svg class="w-4 h-4 text-pink-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/></svg>
                </div>
                <h3 class="text-xs sm:text-sm font-semibold text-white mb-1">Developer API</h3>
                <p class="text-[10px] sm:text-xs text-gray-500 leading-relaxed">RESTful API for integrations.</p>
            </div>
            <div class="bg-[#12121a] border border-[#2a2a30] rounded-xl p-3 sm:p-4 hover:border-indigo-500/30 transition">
                <div class="w-8 h-8 bg-emerald-500/10 rounded-lg flex items-center justify-center mb-2.5">
                    <svg class="w-4 h-4 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.62-4.02A11.96 11.96 0 0112 2.94a11.96 11.96 0 01-8.62 3.04A12.02 12.02 0 003 9c0 5.59 3.82 10.29 9 11.62 5.18-1.33 9-6.03 9-11.62 0-1.04-.13-2.05-.38-3.02z"/></svg>
                </div>
                <h3 class="text-xs sm:text-sm font-semibold text-white mb-1">Privacy First</h3>
                <p class="text-[10px] sm:text-xs text-gray-500 leading-relaxed">Zero-log policy. Your data stays private.</p>
            </div>
        </div>
    </div>
</section>

<!-- Supported Domains -->
<section class="px-4 py-6 sm:py-8 border-t border-[#1e1e2e]">
    <div class="max-w-4xl mx-auto text-center">
        <p class="text-[10px] uppercase tracking-wider text-gray-500 mb-3">Works with all Terabox domains</p>
        <div class="flex flex-wrap justify-center gap-1.5">
            <span class="px-2.5 py-1 bg-[#12121a] border border-[#2a2a30] rounded-full text-[10px] sm:text-xs text-gray-400">terabox.com</span>
            <span class="px-2.5 py-1 bg-[#12121a] border border-[#2a2a30] rounded-full text-[10px] sm:text-xs text-gray-400">1024terabox.com</span>
            <span class="px-2.5 py-1 bg-[#12121a] border border-[#2a2a30] rounded-full text-[10px] sm:text-xs text-gray-400">teraboxapp.com</span>
            <span class="px-2.5 py-1 bg-[#12121a] border border-[#2a2a30] rounded-full text-[10px] sm:text-xs text-gray-400">teraboxshare.com</span>
            <span class="px-2.5 py-1 bg-[#12121a] border border-[#2a2a30] rounded-full text-[10px] sm:text-xs text-gray-400">freeterabox.com</span>
            <span class="px-2.5 py-1 bg-[#12121a] border border-[#2a2a30] rounded-full text-[10px] sm:text-xs text-gray-400">mirrobox.com</span>
        </div>
    </div>
</section>

<!-- Pricing -->
<section id="pricing" class="px-4 py-8 sm:py-12 md:py-16 border-t border-[#1e1e2e]">
    <div class="max-w-5xl mx-auto">
        <div class="text-center mb-6 sm:mb-8">
            <h2 class="text-xl sm:text-2xl md:text-3xl font-bold text-white mb-1.5">Simple Pricing</h2>
            <p class="text-xs sm:text-sm text-gray-400">Choose the plan that fits your needs.</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-3 sm:gap-4">
            <!-- Free -->
            <div class="bg-[#12121a] border border-[#2a2a30] rounded-xl p-4 sm:p-5">
                <h3 class="text-sm font-semibold text-white mb-1">Free</h3>
                <div class="mb-3">
                    <span class="text-2xl sm:text-3xl font-bold text-white">$0</span>
                    <span class="text-xs text-gray-500">/forever</span>
                </div>
                <a href="{{ url('/register') }}" class="block w-full py-2 text-center text-xs font-medium bg-[#0a0a0f] border border-[#2a2a30] text-white rounded-lg hover:border-gray-500 transition mb-4">Get Started</a>
                <ul class="space-y-1.5">
                    <li class="flex items-center gap-1.5 text-[11px] text-gray-400"><svg class="w-3 h-3 text-emerald-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.7 5.29a1 1 0 010 1.42l-8 8a1 1 0 01-1.42 0l-4-4a1 1 0 011.42-1.42L8 12.59l7.29-7.3a1 1 0 011.41 0z" clip-rule="evenodd"/></svg>5 daily searches</li>
                    <li class="flex items-center gap-1.5 text-[11px] text-gray-400"><svg class="w-3 h-3 text-emerald-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.7 5.29a1 1 0 010 1.42l-8 8a1 1 0 01-1.42 0l-4-4a1 1 0 011.42-1.42L8 12.59l7.29-7.3a1 1 0 011.41 0z" clip-rule="evenodd"/></svg>Online streaming</li>
                    <li class="flex items-center gap-1.5 text-[11px] text-gray-400"><svg class="w-3 h-3 text-emerald-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.7 5.29a1 1 0 010 1.42l-8 8a1 1 0 01-1.42 0l-4-4a1 1 0 011.42-1.42L8 12.59l7.29-7.3a1 1 0 011.41 0z" clip-rule="evenodd"/></svg>Basic quality</li>
                    <li class="flex items-center gap-1.5 text-[11px] text-gray-400"><svg class="w-3 h-3 text-emerald-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.7 5.29a1 1 0 010 1.42l-8 8a1 1 0 01-1.42 0l-4-4a1 1 0 011.42-1.42L8 12.59l7.29-7.3a1 1 0 011.41 0z" clip-rule="evenodd"/></svg>Bookmarks</li>
                </ul>
            </div>
            <!-- Pro (popular) -->
            <div class="bg-[#12121a] border-2 border-indigo-500 rounded-xl p-4 sm:p-5 relative">
                <div class="absolute -top-2.5 left-1/2 -translate-x-1/2 px-2.5 py-0.5 bg-gradient-to-r from-indigo-500 to-violet-600 text-white text-[10px] font-semibold rounded-full">POPULAR</div>
                <h3 class="text-sm font-semibold text-white mb-1">Pro</h3>
                <div class="mb-3">
                    <span class="text-2xl sm:text-3xl font-bold text-white">$9</span>
                    <span class="text-xs text-gray-500">/month</span>
                </div>
                <a href="{{ url('/register') }}" class="block w-full py-2 text-center text-xs font-medium bg-gradient-to-r from-indigo-500 to-violet-600 text-white rounded-lg hover:opacity-90 transition mb-4">Get Started</a>
                <ul class="space-y-1.5">
                    <li class="flex items-center gap-1.5 text-[11px] text-gray-400"><svg class="w-3 h-3 text-emerald-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.7 5.29a1 1 0 010 1.42l-8 8a1 1 0 01-1.42 0l-4-4a1 1 0 011.42-1.42L8 12.59l7.29-7.3a1 1 0 011.41 0z" clip-rule="evenodd"/></svg>Unlimited searches</li>
                    <li class="flex items-center gap-1.5 text-[11px] text-gray-400"><svg class="w-3 h-3 text-emerald-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.7 5.29a1 1 0 010 1.42l-8 8a1 1 0 01-1.42 0l-4-4a1 1 0 011.42-1.42L8 12.59l7.29-7.3a1 1 0 011.41 0z" clip-rule="evenodd"/></svg>HD streaming</li>
                    <li class="flex items-center gap-1.5 text-[11px] text-gray-400"><svg class="w-3 h-3 text-emerald-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.7 5.29a1 1 0 010 1.42l-8 8a1 1 0 01-1.42 0l-4-4a1 1 0 011.42-1.42L8 12.59l7.29-7.3a1 1 0 011.41 0z" clip-rule="evenodd"/></svg>Batch processing</li>
                    <li class="flex items-center gap-1.5 text-[11px] text-gray-400"><svg class="w-3 h-3 text-emerald-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.7 5.29a1 1 0 010 1.42l-8 8a1 1 0 01-1.42 0l-4-4a1 1 0 011.42-1.42L8 12.59l7.29-7.3a1 1 0 011.41 0z" clip-rule="evenodd"/></svg>Priority support</li>
                    <li class="flex items-center gap-1.5 text-[11px] text-gray-400"><svg class="w-3 h-3 text-emerald-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.7 5.29a1 1 0 010 1.42l-8 8a1 1 0 01-1.42 0l-4-4a1 1 0 011.42-1.42L8 12.59l7.29-7.3a1 1 0 011.41 0z" clip-rule="evenodd"/></svg>No ads</li>
                </ul>
            </div>
            <!-- Enterprise -->
            <div class="bg-[#12121a] border border-[#2a2a30] rounded-xl p-4 sm:p-5">
                <h3 class="text-sm font-semibold text-white mb-1">Enterprise</h3>
                <div class="mb-3">
                    <span class="text-2xl sm:text-3xl font-bold text-white">$29</span>
                    <span class="text-xs text-gray-500">/month</span>
                </div>
                <a href="{{ url('/register') }}" class="block w-full py-2 text-center text-xs font-medium bg-[#0a0a0f] border border-[#2a2a30] text-white rounded-lg hover:border-gray-500 transition mb-4">Get Started</a>
                <ul class="space-y-1.5">
                    <li class="flex items-center gap-1.5 text-[11px] text-gray-400"><svg class="w-3 h-3 text-emerald-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.7 5.29a1 1 0 010 1.42l-8 8a1 1 0 01-1.42 0l-4-4a1 1 0 011.42-1.42L8 12.59l7.29-7.3a1 1 0 011.41 0z" clip-rule="evenodd"/></svg>Everything in Pro</li>
                    <li class="flex items-center gap-1.5 text-[11px] text-gray-400"><svg class="w-3 h-3 text-emerald-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.7 5.29a1 1 0 010 1.42l-8 8a1 1 0 01-1.42 0l-4-4a1 1 0 011.42-1.42L8 12.59l7.29-7.3a1 1 0 011.41 0z" clip-rule="evenodd"/></svg>API access</li>
                    <li class="flex items-center gap-1.5 text-[11px] text-gray-400"><svg class="w-3 h-3 text-emerald-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.7 5.29a1 1 0 010 1.42l-8 8a1 1 0 01-1.42 0l-4-4a1 1 0 011.42-1.42L8 12.59l7.29-7.3a1 1 0 011.41 0z" clip-rule="evenodd"/></svg>Dedicated support</li>
                    <li class="flex items-center gap-1.5 text-[11px] text-gray-400"><svg class="w-3 h-3 text-emerald-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.7 5.29a1 1 0 010 1.42l-8 8a1 1 0 01-1.42 0l-4-4a1 1 0 011.42-1.42L8 12.59l7.29-7.3a1 1 0 011.41 0z" clip-rule="evenodd"/></svg>Custom integrations</li>
                    <li class="flex items-center gap-1.5 text-[11px] text-gray-400"><svg class="w-3 h-3 text-emerald-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.7 5.29a1 1 0 010 1.42l-8 8a1 1 0 01-1.42 0l-4-4a1 1 0 011.42-1.42L8 12.59l7.29-7.3a1 1 0 011.41 0z" clip-rule="evenodd"/></svg>SLA guarantee</li>
                </ul>
            </div>
        </div>
        <p class="text-center text-[10px] text-gray-500 mt-4">Sign up first, upgrade anytime from your account.</p>
    </div>
</section>

<!-- Reviews / Testimonials -->
<section id="reviews" class="px-4 py-8 sm:py-12 md:py-16 border-t border-[#1e1e2e]">
    <div class="max-w-5xl mx-auto">
        <div class="text-center mb-6 sm:mb-8">
            <div class="inline-flex items-center gap-1 mb-2">
                @for($i = 0; $i < 5; $i++)
                    <svg class="w-3.5 h-3.5 text-amber-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.05 2.93c.3-.92 1.6-.92 1.9 0l1.07 3.29a1 1 0 00.95.69h3.46c.97 0 1.37 1.24.59 1.81l-2.8 2.03a1 1 0 00-.37 1.12l1.07 3.29c.3.92-.75 1.69-1.54 1.12l-2.8-2.03a1 1 0 00-1.17 0l-2.8 2.03c-.78.57-1.84-.2-1.54-1.12l1.07-3.29a1 1 0 00-.37-1.12L2.98 8.72c-.78-.57-.38-1.81.59-1.81h3.46a1 1 0 00.95-.69l1.07-3.29z"/></svg>
                @endfor
                <span class="ml-1 text-[11px] font-medium text-gray-400">4.9 from 12,000+ users</span>
            </div>
            <h2 class="text-xl sm:text-2xl md:text-3xl font-bold text-white mb-1.5">Loved by Users</h2>
            <p class="text-xs sm:text-sm text-gray-400">See what our community is saying.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-3 sm:gap-4">
            <div class="bg-[#12121a] border border-[#2a2a30] rounded-xl p-4">
                <div class="flex items-center gap-1 mb-2">
                    @for($i = 0; $i < 5; $i++)
                        <svg class="w-3 h-3 text-amber-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.05 2.93c.3-.92 1.6-.92 1.9 0l1.07 3.29a1 1 0 00.95.69h3.46c.97 0 1.37 1.24.59 1.81l-2.8 2.03a1 1 0 00-.37 1.12l1.07 3.29c.3.92-.75 1.69-1.54 1.12l-2.8-2.03a1 1 0 00-1.17 0l-2.8 2.03c-.78.57-1.84-.2-1.54-1.12l1.07-3.29a1 1 0 00-.37-1.12L2.98 8.72c-.78-.57-.38-1.81.59-1.81h3.46a1 1 0 00.95-.69l1.07-3.29z"/></svg>
                    @endfor
                </div>
                <p class="text-xs text-gray-300 leading-relaxed mb-3">"Finally a Terabox tool that just works. Super fast, no ads, and the mobile experience is smooth."</p>
                <div class="flex items-center gap-2">
                    <div class="w-7 h-7 rounded-full bg-gradient-to-br from-blue-500 to-cyan-500 flex items-center justify-center text-[10px] font-semibold text-white">RK</div>
                    <div>
                        <p class="text-[11px] font-medium text-white">Rahul K.</p>
                        <p class="text-[10px] text-gray-500">Free user</p>
                    </div>
                </div>
            </div>
            <div class="bg-[#12121a] border border-[#2a2a30] rounded-xl p-4">
                <div class="flex items-center gap-1 mb-2">
                    @for($i = 0; $i < 5; $i++)
                        <svg class="w-3 h-3 text-amber-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.05 2.93c.3-.92 1.6-.92 1.9 0l1.07 3.29a1 1 0 00.95.69h3.46c.97 0 1.37 1.24.59 1.81l-2.8 2.03a1 1 0 00-.37 1.12l1.07 3.29c.3.92-.75 1.69-1.54 1.12l-2.8-2.03a1 1 0 00-1.17 0l-2.8 2.03c-.78.57-1.84-.2-1.54-1.12l1.07-3.29a1 1 0 00-.37-1.12L2.98 8.72c-.78-.57-.38-1.81.59-1.81h3.46a1 1 0 00.95-.69l1.07-3.29z"/></svg>
                    @endfor
                </div>
                <p class="text-xs text-gray-300 leading-relaxed mb-3">"Batch processing is a game-changer. I download entire folders in one click. Worth every penny."</p>
                <div class="flex items-center gap-2">
                    <div class="w-7 h-7 rounded-full bg-gradient-to-br from-purple-500 to-pink-500 flex items-center justify-center text-[10px] font-semibold text-white">SM</div>
                    <div>
                        <p class="text-[11px] font-medium text-white">Sarah M.</p>
                        <p class="text-[10px] text-gray-500">Pro user</p>
                    </div>
                </div>
            </div>
            <div class="bg-[#12121a] border border-[#2a2a30] rounded-xl p-4">
                <div class="flex items-center gap-1 mb-2">
                    @for($i = 0; $i < 5; $i++)
                        <svg class="w-3 h-3 text-amber-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.05 2.93c.3-.92 1.6-.92 1.9 0l1.07 3.29a1 1 0 00.95.69h3.46c.97 0 1.37 1.24.59 1.81l-2.8 2.03a1 1 0 00-.37 1.12l1.07 3.29c.3.92-.75 1.69-1.54 1.12l-2.8-2.03a1 1 0 00-1.17 0l-2.8 2.03c-.78.57-1.84-.2-1.54-1.12l1.07-3.29a1 1 0 00-.37-1.12L2.98 8.72c-.78-.57-.38-1.81.59-1.81h3.46a1 1 0 00.95-.69l1.07-3.29z"/></svg>
                    @endfor
                </div>
                <p class="text-xs text-gray-300 leading-relaxed mb-3">"The API is clean and well-documented. Integrated it into our app in under an hour. Great support team."</p>
                <div class="flex items-center gap-2">
                    <div class="w-7 h-7 rounded-full bg-gradient-to-br from-emerald-500 to-teal-500 flex items-center justify-center text-[10px] font-semibold text-white">AT</div>
                    <div>
                        <p class="text-[11px] font-medium text-white">Ahmed T.</p>
                        <p class="text-[10px] text-gray-500">Enterprise</p>
                    </div>
                </div>
            </div>
            <div class="bg-[#12121a] border border-[#2a2a30] rounded-xl p-4">
                <div class="flex items-center gap-1 mb-2">
                    @for($i = 0; $i < 4; $i++)
                        <svg class="w-3 h-3 text-amber-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.05 2.93c.3-.92 1.6-.92 1.9 0l1.07 3.29a1 1 0 00.95.69h3.46c.97 0 1.37 1.24.59 1.81l-2.8 2.03a1 1 0 00-.37 1.12l1.07 3.29c.3.92-.75 1.69-1.54 1.12l-2.8-2.03a1 1 0 00-1.17 0l-2.8 2.03c-.78.57-1.84-.2-1.54-1.12l1.07-3.29a1 1 0 00-.37-1.12L2.98 8.72c-.78-.57-.38-1.81.59-1.81h3.46a1 1 0 00.95-.69l1.07-3.29z"/></svg>
                    @endfor
                    <svg class="w-3 h-3 text-gray-600" fill="currentColor" viewBox="0 0 20 20"><path d="M9.05 2.93c.3-.92 1.6-.92 1.9 0l1.07 3.29a1 1 0 00.95.69h3.46c.97 0 1.37 1.24.59 1.81l-2.8 2.03a1 1 0 00-.37 1.12l1.07 3.29c.3.92-.75 1.69-1.54 1.12l-2.8-2.03a1 1 0 00-1.17 0l-2.8 2.03c-.78.57-1.84-.2-1.54-1.12l1.07-3.29a1 1 0 00-.37-1.12L2.98 8.72c-.78-.57-.38-1.81.59-1.81h3.46a1 1 0 00.95-.69l1.07-3.29z"/></svg>
                </div>
                <p class="text-xs text-gray-300 leading-relaxed mb-3">"Great tool for downloading. Would love to see 4K support in the free plan someday."</p>
                <div class="flex items-center gap-2">
                    <div class="w-7 h-7 rounded-full bg-gradient-to-br from-orange-500 to-red-500 flex items-center justify-center text-[10px] font-semibold text-white">PS</div>
                    <div>
                        <p class="text-[11px] font-medium text-white">Priya S.</p>
                        <p class="text-[10px] text-gray-500">Free user</p>
                    </div>
                </div>
            </div>
            <div class="bg-[#12121a] border border-[#2a2a30] rounded-xl p-4">
                <div class="flex items-center gap-1 mb-2">
                    @for($i = 0; $i < 5; $i++)
                        <svg class="w-3 h-3 text-amber-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.05 2.93c.3-.92 1.6-.92 1.9 0l1.07 3.29a1 1 0 00.95.69h3.46c.97 0 1.37 1.24.59 1.81l-2.8 2.03a1 1 0 00-.37 1.12l1.07 3.29c.3.92-.75 1.69-1.54 1.12l-2.8-2.03a1 1 0 00-1.17 0l-2.8 2.03c-.78.57-1.84-.2-1.54-1.12l1.07-3.29a1 1 0 00-.37-1.12L2.98 8.72c-.78-.57-.38-1.81.59-1.81h3.46a1 1 0 00.95-.69l1.07-3.29z"/></svg>
                    @endfor
                </div>
                <p class="text-xs text-gray-300 leading-relaxed mb-3">"Zero-log policy sold me. Privacy matters and XteraPlay respects it. Been using for 6 months now."</p>
                <div class="flex items-center gap-2">
                    <div class="w-7 h-7 rounded-full bg-gradient-to-br from-indigo-500 to-violet-500 flex items-center justify-center text-[10px] font-semibold text-white">ML</div>
                    <div>
                        <p class="text-[11px] font-medium text-white">Michael L.</p>
                        <p class="text-[10px] text-gray-500">Pro user</p>
                    </div>
                </div>
            </div>
            <div class="bg-[#12121a] border border-[#2a2a30] rounded-xl p-4">
                <div class="flex items-center gap-1 mb-2">
                    @for($i = 0; $i < 5; $i++)
                        <svg class="w-3 h-3 text-amber-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.05 2.93c.3-.92 1.6-.92 1.9 0l1.07 3.29a1 1 0 00.95.69h3.46c.97 0 1.37 1.24.59 1.81l-2.8 2.03a1 1 0 00-.37 1.12l1.07 3.29c.3.92-.75 1.69-1.54 1.12l-2.8-2.03a1 1 0 00-1.17 0l-2.8 2.03c-.78.57-1.84-.2-1.54-1.12l1.07-3.29a1 1 0 00-.37-1.12L2.98 8.72c-.78-.57-.38-1.81.59-1.81h3.46a1 1 0 00.95-.69l1.07-3.29z"/></svg>
                    @endfor
                </div>
                <p class="text-xs text-gray-300 leading-relaxed mb-3">"Mobile experience is perfect. Works flawlessly on my phone without any lag. Love it!"</p>
                <div class="flex items-center gap-2">
                    <div class="w-7 h-7 rounded-full bg-gradient-to-br from-pink-500 to-rose-500 flex items-center justify-center text-[10px] font-semibold text-white">FZ</div>
                    <div>
                        <p class="text-[11px] font-medium text-white">Fatima Z.</p>
                        <p class="text-[10px] text-gray-500">Free user</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="px-4 py-8 sm:py-12 md:py-16 border-t border-[#1e1e2e]">
    <div class="max-w-2xl mx-auto text-center bg-[#12121a] border border-[#2a2a30] rounded-2xl p-6 sm:p-8">
        <h2 class="text-lg sm:text-xl md:text-2xl font-bold text-white mb-2">Ready to start?</h2>
        <p class="text-xs sm:text-sm text-gray-400 mb-4 sm:mb-5">Join thousands using XteraPlay every day.</p>
        <a href="{{ url('/register') }}" class="inline-block px-6 py-2.5 bg-gradient-to-r from-indigo-500 to-violet-600 text-white text-xs sm:text-sm font-medium rounded-lg hover:opacity-90 transition">Get Started Free</a>
    </div>
</section>

@endsection
