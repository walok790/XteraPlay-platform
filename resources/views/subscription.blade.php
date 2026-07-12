@extends('layouts.app')

@section('title', 'Subscription - XteraPlay')

@section('content')
<div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-6 sm:py-8 md:py-12">
    <!-- Header -->
    <div class="text-center max-w-2xl mx-auto mb-8 sm:mb-10">
        <h1 class="text-2xl sm:text-3xl md:text-4xl font-bold text-slate-900 mb-2">Choose Your Plan</h1>
        <p class="text-sm sm:text-base text-slate-600">Select the plan that fits your streaming needs. Cancel anytime.</p>
    </div>

    <!-- Current Plan Banner -->
    <div class="bg-white border border-slate-200 rounded-2xl p-4 sm:p-5 mb-6 sm:mb-8 flex items-center gap-4">
        <div class="w-10 h-10 sm:w-12 sm:h-12 bg-amber-50 rounded-full flex items-center justify-center flex-shrink-0">
            <svg class="w-5 h-5 sm:w-6 sm:h-6 text-amber-500" fill="currentColor" viewBox="0 0 20 20"><path d="M2 4l3 3 5-6 5 6 3-3v10a1 1 0 01-1 1H3a1 1 0 01-1-1V4z"/></svg>
        </div>
        <div class="min-w-0 flex-1">
            <p class="text-sm sm:text-base text-slate-700">Current Plan: <span class="text-amber-600 font-semibold">Free</span></p>
            <p class="text-xs sm:text-sm text-slate-500">Free forever — upgrade for more features</p>
        </div>
    </div>

    <!-- Pricing Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 sm:gap-5 md:gap-6 mb-8">
        <!-- Free -->
        <div class="bg-white border border-slate-200 rounded-2xl p-6 sm:p-7 flex flex-col">
            <div class="mb-5">
                <h3 class="text-lg font-semibold text-slate-900 mb-1">Free</h3>
                <p class="text-sm text-slate-500">Get started basics</p>
            </div>
            <div class="mb-5 pb-5 border-b border-slate-100">
                <span class="text-3xl sm:text-4xl font-bold text-slate-900">$0</span>
                <span class="text-sm text-slate-500">/forever</span>
            </div>
            <ul class="space-y-2.5 mb-6 flex-1">
                <li class="flex items-start gap-2 text-sm text-slate-700"><svg class="w-4 h-4 text-emerald-600 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.7 5.29a1 1 0 010 1.42l-8 8a1 1 0 01-1.42 0l-4-4a1 1 0 011.42-1.42L8 12.59l7.29-7.3a1 1 0 011.41 0z" clip-rule="evenodd"/></svg>5 videos per day</li>
                <li class="flex items-start gap-2 text-sm text-slate-700"><svg class="w-4 h-4 text-emerald-600 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.7 5.29a1 1 0 010 1.42l-8 8a1 1 0 01-1.42 0l-4-4a1 1 0 011.42-1.42L8 12.59l7.29-7.3a1 1 0 011.41 0z" clip-rule="evenodd"/></svg>720p quality</li>
                <li class="flex items-start gap-2 text-sm text-slate-700"><svg class="w-4 h-4 text-emerald-600 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.7 5.29a1 1 0 010 1.42l-8 8a1 1 0 01-1.42 0l-4-4a1 1 0 011.42-1.42L8 12.59l7.29-7.3a1 1 0 011.41 0z" clip-rule="evenodd"/></svg>Basic watch history</li>
                <li class="flex items-start gap-2 text-sm text-slate-400"><svg class="w-4 h-4 text-slate-300 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4.29 4.29a1 1 0 011.42 0L10 8.59l4.29-4.3a1 1 0 111.42 1.42L11.41 10l4.3 4.29a1 1 0 01-1.42 1.42L10 11.41l-4.29 4.3a1 1 0 01-1.42-1.42L8.59 10 4.29 5.71a1 1 0 010-1.42z" clip-rule="evenodd"/></svg>No bookmarks</li>
                <li class="flex items-start gap-2 text-sm text-slate-400"><svg class="w-4 h-4 text-slate-300 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4.29 4.29a1 1 0 011.42 0L10 8.59l4.29-4.3a1 1 0 111.42 1.42L11.41 10l4.3 4.29a1 1 0 01-1.42 1.42L10 11.41l-4.29 4.3a1 1 0 01-1.42-1.42L8.59 10 4.29 5.71a1 1 0 010-1.42z" clip-rule="evenodd"/></svg>No priority speed</li>
            </ul>
            <button disabled class="w-full py-2.5 bg-slate-100 text-slate-500 text-sm font-medium rounded-lg cursor-not-allowed">Current Plan</button>
        </div>

        <!-- Pro (highlighted) -->
        <div class="bg-gradient-to-br from-blue-600 to-indigo-600 rounded-2xl p-6 sm:p-7 flex flex-col relative shadow-xl shadow-blue-500/30 md:-mt-4">
            <div class="absolute -top-3 left-1/2 -translate-x-1/2 px-3 py-1 bg-white text-blue-600 text-xs font-bold rounded-full shadow-md">MOST POPULAR</div>
            <div class="mb-5">
                <h3 class="text-lg font-semibold text-white mb-1">Pro</h3>
                <p class="text-sm text-blue-100">For power users</p>
            </div>
            <div class="mb-5 pb-5 border-b border-white/20">
                <span class="text-3xl sm:text-4xl font-bold text-white">$9</span>
                <span class="text-sm text-blue-100">/month</span>
            </div>
            <ul class="space-y-2.5 mb-6 flex-1">
                <li class="flex items-start gap-2 text-sm text-white"><svg class="w-4 h-4 text-blue-200 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.7 5.29a1 1 0 010 1.42l-8 8a1 1 0 01-1.42 0l-4-4a1 1 0 011.42-1.42L8 12.59l7.29-7.3a1 1 0 011.41 0z" clip-rule="evenodd"/></svg>Unlimited videos</li>
                <li class="flex items-start gap-2 text-sm text-white"><svg class="w-4 h-4 text-blue-200 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.7 5.29a1 1 0 010 1.42l-8 8a1 1 0 01-1.42 0l-4-4a1 1 0 011.42-1.42L8 12.59l7.29-7.3a1 1 0 011.41 0z" clip-rule="evenodd"/></svg>1080p HD quality</li>
                <li class="flex items-start gap-2 text-sm text-white"><svg class="w-4 h-4 text-blue-200 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.7 5.29a1 1 0 010 1.42l-8 8a1 1 0 01-1.42 0l-4-4a1 1 0 011.42-1.42L8 12.59l7.29-7.3a1 1 0 011.41 0z" clip-rule="evenodd"/></svg>Unlimited bookmarks</li>
                <li class="flex items-start gap-2 text-sm text-white"><svg class="w-4 h-4 text-blue-200 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.7 5.29a1 1 0 010 1.42l-8 8a1 1 0 01-1.42 0l-4-4a1 1 0 011.42-1.42L8 12.59l7.29-7.3a1 1 0 011.41 0z" clip-rule="evenodd"/></svg>Priority speed</li>
                <li class="flex items-start gap-2 text-sm text-white"><svg class="w-4 h-4 text-blue-200 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.7 5.29a1 1 0 010 1.42l-8 8a1 1 0 01-1.42 0l-4-4a1 1 0 011.42-1.42L8 12.59l7.29-7.3a1 1 0 011.41 0z" clip-rule="evenodd"/></svg>No ads</li>
            </ul>
            <div class="space-y-2">
                <button class="w-full py-2.5 bg-white hover:bg-blue-50 text-blue-600 text-sm font-semibold rounded-lg transition flex items-center justify-center gap-1.5">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M11.3 1.046A1 1 0 0112 2v5h4a1 1 0 01.82 1.573l-7 10A1 1 0 018 18v-5H4a1 1 0 01-.82-1.573l7-10a1 1 0 011.12-.38z" clip-rule="evenodd"/></svg>
                    Auto Pay (Instant)
                </button>
                <button class="w-full py-2.5 bg-blue-500/20 hover:bg-blue-500/30 text-white text-sm font-medium rounded-lg border border-white/20 transition flex items-center justify-center gap-1.5">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                    Manual Pay
                </button>
            </div>
        </div>

        <!-- Enterprise -->
        <div class="bg-white border border-slate-200 rounded-2xl p-6 sm:p-7 flex flex-col">
            <div class="mb-5">
                <h3 class="text-lg font-semibold text-slate-900 mb-1">Enterprise</h3>
                <p class="text-sm text-slate-500">For teams</p>
            </div>
            <div class="mb-5 pb-5 border-b border-slate-100">
                <span class="text-3xl sm:text-4xl font-bold text-slate-900">$29</span>
                <span class="text-sm text-slate-500">/month</span>
            </div>
            <ul class="space-y-2.5 mb-6 flex-1">
                <li class="flex items-start gap-2 text-sm text-slate-700"><svg class="w-4 h-4 text-emerald-600 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.7 5.29a1 1 0 010 1.42l-8 8a1 1 0 01-1.42 0l-4-4a1 1 0 011.42-1.42L8 12.59l7.29-7.3a1 1 0 011.41 0z" clip-rule="evenodd"/></svg>Everything in Pro</li>
                <li class="flex items-start gap-2 text-sm text-slate-700"><svg class="w-4 h-4 text-emerald-600 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.7 5.29a1 1 0 010 1.42l-8 8a1 1 0 01-1.42 0l-4-4a1 1 0 011.42-1.42L8 12.59l7.29-7.3a1 1 0 011.41 0z" clip-rule="evenodd"/></svg>4K quality</li>
                <li class="flex items-start gap-2 text-sm text-slate-700"><svg class="w-4 h-4 text-emerald-600 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.7 5.29a1 1 0 010 1.42l-8 8a1 1 0 01-1.42 0l-4-4a1 1 0 011.42-1.42L8 12.59l7.29-7.3a1 1 0 011.41 0z" clip-rule="evenodd"/></svg>API access</li>
                <li class="flex items-start gap-2 text-sm text-slate-700"><svg class="w-4 h-4 text-emerald-600 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.7 5.29a1 1 0 010 1.42l-8 8a1 1 0 01-1.42 0l-4-4a1 1 0 011.42-1.42L8 12.59l7.29-7.3a1 1 0 011.41 0z" clip-rule="evenodd"/></svg>5 team seats</li>
                <li class="flex items-start gap-2 text-sm text-slate-700"><svg class="w-4 h-4 text-emerald-600 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.7 5.29a1 1 0 010 1.42l-8 8a1 1 0 01-1.42 0l-4-4a1 1 0 011.42-1.42L8 12.59l7.29-7.3a1 1 0 011.41 0z" clip-rule="evenodd"/></svg>Priority support</li>
            </ul>
            <div class="space-y-2">
                <button class="w-full py-2.5 bg-slate-100 hover:bg-slate-200 text-slate-900 text-sm font-medium rounded-lg transition">Auto Pay (Instant)</button>
                <button class="w-full py-2.5 bg-white hover:bg-slate-50 text-slate-700 text-sm font-medium rounded-lg border border-slate-200 transition">Manual Pay</button>
            </div>
        </div>
    </div>

    <!-- Coupon Section -->
    <div class="bg-white border border-slate-200 rounded-2xl p-5 sm:p-6">
        <div class="flex flex-col sm:flex-row sm:items-center gap-4">
            <div class="flex items-center gap-3 flex-1">
                <div class="w-10 h-10 bg-blue-50 rounded-lg flex items-center justify-center flex-shrink-0">
                    <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.51 0 1.02.2 1.41.59l7 7a2 2 0 010 2.83l-7 7a2 2 0 01-2.83 0l-7-7A1.99 1.99 0 013 12V7a4 4 0 014-4z"/></svg>
                </div>
                <div>
                    <p class="text-sm font-semibold text-slate-900">Have a coupon code?</p>
                    <p class="text-xs text-slate-500">Apply it at checkout for a discount</p>
                </div>
            </div>
            <div class="flex items-center gap-2 sm:flex-shrink-0">
                <input type="text" placeholder="Enter code..." class="flex-1 sm:w-48 px-3 py-2 bg-white border border-slate-300 rounded-lg text-sm text-slate-900 placeholder-slate-400 focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100 transition">
                <button class="px-4 py-2 bg-slate-900 hover:bg-slate-800 text-white text-sm font-medium rounded-lg transition">Apply</button>
            </div>
        </div>
    </div>
</div>
@endsection
