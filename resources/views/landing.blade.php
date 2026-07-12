@extends('layouts.app')

@section('content')

<!-- Hero Section -->
<section id="home" class="relative pt-28 pb-16 sm:pb-24 overflow-hidden">
    <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_center,_rgba(99,102,241,0.08)_0%,_transparent_70%)]"></div>
    <div class="relative max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-white leading-tight tracking-tight">
            Stream TeraBox Videos <span class="bg-gradient-to-r from-indigo-400 to-violet-400 bg-clip-text text-transparent">Instantly</span>
        </h1>
        <p class="mt-4 text-base sm:text-lg text-gray-400 max-w-2xl mx-auto">
            Paste your TeraBox link and start watching immediately. No downloads, no waiting — just smooth, instant playback.
        </p>

        <div x-data="{ url: '' }" class="mt-8 max-w-xl mx-auto">
            <div class="flex items-center bg-[#12121a] border border-[#1e1e2e] rounded-xl p-1.5 focus-within:border-indigo-500/50 transition-colors">
                <input
                    x-model="url"
                    type="text"
                    placeholder="Paste your TeraBox link here..."
                    class="flex-1 bg-transparent px-4 py-2.5 text-sm text-white placeholder-gray-500 focus:outline-none"
                >
                <button
                    :disabled="!url.trim()"
                    :class="url.trim() ? 'bg-gradient-to-r from-indigo-500 to-violet-500 hover:from-indigo-600 hover:to-violet-600 shadow-lg shadow-indigo-500/25' : 'bg-gray-700 cursor-not-allowed'"
                    class="px-5 py-2.5 text-sm font-medium text-white rounded-lg transition-all duration-200"
                >
                    Watch Now
                </button>
            </div>
        </div>

        <p class="mt-4 text-sm text-gray-500">5 free streams daily — no signup needed</p>
    </div>
</section>

<!-- Features Section -->
<section id="features" class="py-16 sm:py-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl sm:text-4xl font-bold text-white">Why Choose XteraPlay</h2>
            <p class="mt-3 text-gray-400 text-base max-w-xl mx-auto">Everything you need for the best TeraBox streaming experience.</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Lightning Fast -->
            <div class="bg-[#12121a] border border-[#1e1e2e] rounded-xl p-6 hover:border-indigo-500/30 transition-colors">
                <div class="w-10 h-10 bg-indigo-500/10 rounded-lg flex items-center justify-center mb-4">
                    <svg class="w-5 h-5 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                    </svg>
                </div>
                <h3 class="text-white font-semibold text-lg">Lightning Fast</h3>
                <p class="mt-2 text-gray-400 text-sm leading-relaxed">Start streaming in seconds with our optimized video delivery infrastructure.</p>
            </div>

            <!-- HD Quality -->
            <div class="bg-[#12121a] border border-[#1e1e2e] rounded-xl p-6 hover:border-indigo-500/30 transition-colors">
                <div class="w-10 h-10 bg-violet-500/10 rounded-lg flex items-center justify-center mb-4">
                    <svg class="w-5 h-5 text-violet-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                    </svg>
                </div>
                <h3 class="text-white font-semibold text-lg">HD Quality</h3>
                <p class="mt-2 text-gray-400 text-sm leading-relaxed">Watch videos in full HD quality with adaptive bitrate streaming.</p>
            </div>

            <!-- Secure & Private -->
            <div class="bg-[#12121a] border border-[#1e1e2e] rounded-xl p-6 hover:border-indigo-500/30 transition-colors">
                <div class="w-10 h-10 bg-indigo-500/10 rounded-lg flex items-center justify-center mb-4">
                    <svg class="w-5 h-5 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                    </svg>
                </div>
                <h3 class="text-white font-semibold text-lg">Secure & Private</h3>
                <p class="mt-2 text-gray-400 text-sm leading-relaxed">Your activity stays private. We don't store your links or viewing history on our servers.</p>
            </div>

            <!-- Mobile Friendly -->
            <div class="bg-[#12121a] border border-[#1e1e2e] rounded-xl p-6 hover:border-indigo-500/30 transition-colors">
                <div class="w-10 h-10 bg-violet-500/10 rounded-lg flex items-center justify-center mb-4">
                    <svg class="w-5 h-5 text-violet-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                    </svg>
                </div>
                <h3 class="text-white font-semibold text-lg">Mobile Friendly</h3>
                <p class="mt-2 text-gray-400 text-sm leading-relaxed">Fully responsive player that works beautifully on any device or screen size.</p>
            </div>

            <!-- Batch Downloads -->
            <div class="bg-[#12121a] border border-[#1e1e2e] rounded-xl p-6 hover:border-indigo-500/30 transition-colors">
                <div class="w-10 h-10 bg-indigo-500/10 rounded-lg flex items-center justify-center mb-4">
                    <svg class="w-5 h-5 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                    </svg>
                </div>
                <h3 class="text-white font-semibold text-lg">Batch Downloads</h3>
                <p class="mt-2 text-gray-400 text-sm leading-relaxed">Download multiple files at once from TeraBox folders with a single click.</p>
            </div>

            <!-- Watch History -->
            <div class="bg-[#12121a] border border-[#1e1e2e] rounded-xl p-6 hover:border-indigo-500/30 transition-colors">
                <div class="w-10 h-10 bg-violet-500/10 rounded-lg flex items-center justify-center mb-4">
                    <svg class="w-5 h-5 text-violet-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <h3 class="text-white font-semibold text-lg">Watch History</h3>
                <p class="mt-2 text-gray-400 text-sm leading-relaxed">Keep track of everything you've watched and easily resume where you left off.</p>
            </div>
        </div>
    </div>
</section>

<!-- Supported Platforms Section -->
<section class="py-16 sm:py-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl sm:text-4xl font-bold text-white">Supported Platforms</h2>
        <p class="mt-3 text-gray-400 text-base max-w-xl mx-auto">Works with all major TeraBox domains and mirrors.</p>

        <div class="mt-8 flex flex-wrap items-center justify-center gap-3">
            <span class="px-4 py-2 bg-[#12121a] border border-[#1e1e2e] rounded-full text-sm text-gray-300 font-medium">terabox.com</span>
            <span class="px-4 py-2 bg-[#12121a] border border-[#1e1e2e] rounded-full text-sm text-gray-300 font-medium">1024terabox.com</span>
            <span class="px-4 py-2 bg-[#12121a] border border-[#1e1e2e] rounded-full text-sm text-gray-300 font-medium">teraboxapp.com</span>
            <span class="px-4 py-2 bg-[#12121a] border border-[#1e1e2e] rounded-full text-sm text-gray-300 font-medium">teraboxshare.com</span>
            <span class="px-4 py-2 bg-[#12121a] border border-[#1e1e2e] rounded-full text-sm text-gray-300 font-medium">freeterabox.com</span>
            <span class="px-4 py-2 bg-[#12121a] border border-[#1e1e2e] rounded-full text-sm text-gray-300 font-medium">mirrobox.com</span>
        </div>
    </div>
</section>

<!-- Pricing Section -->
<section id="pricing" class="py-16 sm:py-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl sm:text-4xl font-bold text-white">Simple Pricing</h2>
            <p class="mt-3 text-gray-400 text-base max-w-xl mx-auto">Choose the plan that works best for you.</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 max-w-5xl mx-auto">
            <!-- Free Plan -->
            <div class="bg-[#12121a] border border-[#1e1e2e] rounded-xl p-6">
                <h3 class="text-white font-semibold text-lg">Free</h3>
                <div class="mt-4">
                    <span class="text-4xl font-bold text-white">$0</span>
                    <span class="text-gray-500 text-sm">/month</span>
                </div>
                <ul class="mt-6 space-y-3">
                    <li class="flex items-center text-sm text-gray-400">
                        <svg class="w-4 h-4 text-indigo-400 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        5 streams per day
                    </li>
                    <li class="flex items-center text-sm text-gray-400">
                        <svg class="w-4 h-4 text-indigo-400 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        720p quality
                    </li>
                    <li class="flex items-center text-sm text-gray-400">
                        <svg class="w-4 h-4 text-indigo-400 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        Basic support
                    </li>
                </ul>
                <a href="{{ url('/register') }}" class="mt-6 block w-full text-center px-4 py-2.5 border border-[#1e1e2e] text-white text-sm font-medium rounded-lg hover:bg-[#1e1e2e] transition-colors">
                    Get Started
                </a>
            </div>

            <!-- Pro Plan -->
            <div class="relative bg-[#12121a] border border-indigo-500/50 rounded-xl p-6">
                <span class="absolute -top-3 left-1/2 -translate-x-1/2 px-3 py-0.5 bg-gradient-to-r from-indigo-500 to-violet-500 text-white text-xs font-semibold rounded-full">Popular</span>
                <h3 class="text-white font-semibold text-lg">Pro</h3>
                <div class="mt-4">
                    <span class="text-4xl font-bold text-white">$9</span>
                    <span class="text-gray-500 text-sm">/month</span>
                </div>
                <ul class="mt-6 space-y-3">
                    <li class="flex items-center text-sm text-gray-400">
                        <svg class="w-4 h-4 text-indigo-400 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        Unlimited streams
                    </li>
                    <li class="flex items-center text-sm text-gray-400">
                        <svg class="w-4 h-4 text-indigo-400 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        1080p HD quality
                    </li>
                    <li class="flex items-center text-sm text-gray-400">
                        <svg class="w-4 h-4 text-indigo-400 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        Batch downloads
                    </li>
                    <li class="flex items-center text-sm text-gray-400">
                        <svg class="w-4 h-4 text-indigo-400 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        Priority support
                    </li>
                </ul>
                <a href="{{ url('/register') }}" class="mt-6 block w-full text-center px-4 py-2.5 bg-gradient-to-r from-indigo-500 to-violet-500 hover:from-indigo-600 hover:to-violet-600 text-white text-sm font-medium rounded-lg transition-all duration-200 shadow-lg shadow-indigo-500/25">
                    Get Started
                </a>
            </div>

            <!-- Enterprise Plan -->
            <div class="bg-[#12121a] border border-[#1e1e2e] rounded-xl p-6">
                <h3 class="text-white font-semibold text-lg">Enterprise</h3>
                <div class="mt-4">
                    <span class="text-4xl font-bold text-white">$25</span>
                    <span class="text-gray-500 text-sm">/month</span>
                </div>
                <ul class="mt-6 space-y-3">
                    <li class="flex items-center text-sm text-gray-400">
                        <svg class="w-4 h-4 text-indigo-400 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        Everything in Pro
                    </li>
                    <li class="flex items-center text-sm text-gray-400">
                        <svg class="w-4 h-4 text-indigo-400 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        4K streaming
                    </li>
                    <li class="flex items-center text-sm text-gray-400">
                        <svg class="w-4 h-4 text-indigo-400 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        API access
                    </li>
                    <li class="flex items-center text-sm text-gray-400">
                        <svg class="w-4 h-4 text-indigo-400 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        Dedicated support
                    </li>
                </ul>
                <a href="{{ url('/register') }}" class="mt-6 block w-full text-center px-4 py-2.5 border border-[#1e1e2e] text-white text-sm font-medium rounded-lg hover:bg-[#1e1e2e] transition-colors">
                    Get Started
                </a>
            </div>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section id="faq" class="py-16 sm:py-24">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl sm:text-4xl font-bold text-white">Frequently Asked Questions</h2>
            <p class="mt-3 text-gray-400 text-base">Got questions? We've got answers.</p>
        </div>

        <div class="space-y-3" x-data="{ active: null }">
            <!-- FAQ Item 1 -->
            <div class="bg-[#12121a] border border-[#1e1e2e] rounded-xl overflow-hidden">
                <button @click="active = active === 1 ? null : 1" class="w-full flex items-center justify-between p-5 text-left">
                    <span class="text-white font-medium text-sm">How does XteraPlay work?</span>
                    <svg class="w-4 h-4 text-gray-400 transition-transform" :class="active === 1 ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
                <div x-show="active === 1" x-collapse>
                    <p class="px-5 pb-5 text-sm text-gray-400 leading-relaxed">Simply paste your TeraBox video link into the input field and click "Watch Now". Our system processes the link and delivers the video stream directly to your browser — no downloads required.</p>
                </div>
            </div>

            <!-- FAQ Item 2 -->
            <div class="bg-[#12121a] border border-[#1e1e2e] rounded-xl overflow-hidden">
                <button @click="active = active === 2 ? null : 2" class="w-full flex items-center justify-between p-5 text-left">
                    <span class="text-white font-medium text-sm">Is it free to use?</span>
                    <svg class="w-4 h-4 text-gray-400 transition-transform" :class="active === 2 ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
                <div x-show="active === 2" x-collapse>
                    <p class="px-5 pb-5 text-sm text-gray-400 leading-relaxed">Yes! You can stream up to 5 videos per day completely free with no signup required. For unlimited streams and HD quality, check out our Pro and Enterprise plans.</p>
                </div>
            </div>

            <!-- FAQ Item 3 -->
            <div class="bg-[#12121a] border border-[#1e1e2e] rounded-xl overflow-hidden">
                <button @click="active = active === 3 ? null : 3" class="w-full flex items-center justify-between p-5 text-left">
                    <span class="text-white font-medium text-sm">Which TeraBox domains are supported?</span>
                    <svg class="w-4 h-4 text-gray-400 transition-transform" :class="active === 3 ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
                <div x-show="active === 3" x-collapse>
                    <p class="px-5 pb-5 text-sm text-gray-400 leading-relaxed">We support all major TeraBox domains including terabox.com, 1024terabox.com, teraboxapp.com, teraboxshare.com, freeterabox.com, and mirrobox.com.</p>
                </div>
            </div>

            <!-- FAQ Item 4 -->
            <div class="bg-[#12121a] border border-[#1e1e2e] rounded-xl overflow-hidden">
                <button @click="active = active === 4 ? null : 4" class="w-full flex items-center justify-between p-5 text-left">
                    <span class="text-white font-medium text-sm">Is my data safe and private?</span>
                    <svg class="w-4 h-4 text-gray-400 transition-transform" :class="active === 4 ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
                <div x-show="active === 4" x-collapse>
                    <p class="px-5 pb-5 text-sm text-gray-400 leading-relaxed">Absolutely. We don't store your video links or track your viewing habits. All streams are processed in real-time and nothing is saved on our servers.</p>
                </div>
            </div>

            <!-- FAQ Item 5 -->
            <div class="bg-[#12121a] border border-[#1e1e2e] rounded-xl overflow-hidden">
                <button @click="active = active === 5 ? null : 5" class="w-full flex items-center justify-between p-5 text-left">
                    <span class="text-white font-medium text-sm">Can I download videos?</span>
                    <svg class="w-4 h-4 text-gray-400 transition-transform" :class="active === 5 ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
                <div x-show="active === 5" x-collapse>
                    <p class="px-5 pb-5 text-sm text-gray-400 leading-relaxed">Yes, Pro and Enterprise users can download videos directly. The batch download feature lets you grab multiple files from TeraBox folders in one go.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-16 sm:py-24">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl sm:text-4xl font-bold text-white">Ready to start?</h2>
        <p class="mt-3 text-gray-400 text-base">Join thousands of users streaming TeraBox videos effortlessly.</p>
        <a href="{{ url('/register') }}" class="mt-6 inline-block px-8 py-3 bg-gradient-to-r from-indigo-500 to-violet-500 hover:from-indigo-600 hover:to-violet-600 text-white font-medium rounded-lg transition-all duration-200 shadow-lg shadow-indigo-500/25">
            Get Started Free
        </a>
    </div>
</section>

@endsection
