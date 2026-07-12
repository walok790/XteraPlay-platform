@extends('layouts.app')

@section('title', 'Subscription - XteraPlay')

@section('content')
<div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <!-- Header -->
    <div class="text-center mb-10">
        <h1 class="text-3xl md:text-4xl font-bold text-white mb-3">Choose Your Plan</h1>
        <p class="text-gray-400 text-lg">Select the perfect plan that fits your streaming needs</p>
    </div>

    <!-- Current Plan Banner -->
    <div class="bg-[#1a1a1f] border border-[#2a2a30] rounded-xl p-4 mb-10 flex items-center space-x-4">
        <div class="w-10 h-10 bg-amber-500/10 rounded-full flex items-center justify-center">
            <svg class="w-5 h-5 text-amber-500" fill="currentColor" viewBox="0 0 20 20">
                <path d="M2 4l3 3 5-6 5 6 3-3v10a1 1 0 01-1 1H3a1 1 0 01-1-1V4z"/>
            </svg>
        </div>
        <div>
            <p class="text-sm text-gray-400">Current Plan: <span class="text-amber-500 font-semibold">Free</span></p>
            <p class="text-xs text-gray-500">Free forever — upgrade for more features</p>
        </div>
    </div>

    <!-- Pricing Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
        <!-- Free Plan -->
        <div class="bg-[#1a1a1f] border border-[#2a2a30] rounded-2xl p-6 flex flex-col">
            <div class="mb-6">
                <h3 class="text-lg font-semibold text-white mb-1">Free</h3>
                <p class="text-sm text-gray-500">For casual users</p>
            </div>
            <div class="mb-6">
                <span class="text-4xl font-bold text-white">$0</span>
                <span class="text-gray-500 text-sm">/forever</span>
            </div>
            <ul class="space-y-3 mb-8 flex-1">
                <li class="flex items-center space-x-3">
                    <svg class="w-5 h-5 text-green-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                    <span class="text-sm text-gray-300">5 daily searches</span>
                </li>
                <li class="flex items-center space-x-3">
                    <svg class="w-5 h-5 text-green-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                    <span class="text-sm text-gray-300">Standard streaming</span>
                </li>
                <li class="flex items-center space-x-3">
                    <svg class="w-5 h-5 text-green-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                    <span class="text-sm text-gray-300">Basic support</span>
                </li>
                <li class="flex items-center space-x-3">
                    <svg class="w-5 h-5 text-gray-600 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/></svg>
                    <span class="text-sm text-gray-500">HD downloads</span>
                </li>
                <li class="flex items-center space-x-3">
                    <svg class="w-5 h-5 text-gray-600 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/></svg>
                    <span class="text-sm text-gray-500">Batch downloads</span>
                </li>
            </ul>
            <button disabled class="w-full py-3 px-4 bg-[#2a2a30] text-gray-500 text-sm font-medium rounded-lg cursor-not-allowed">
                Current Plan
            </button>
        </div>

        <!-- Pro Plan -->
        <div class="bg-[#1a1a1f] border-2 border-indigo-500 rounded-2xl p-6 flex flex-col relative">
            <div class="absolute -top-3 left-1/2 -translate-x-1/2">
                <span class="px-3 py-1 bg-gradient-to-r from-indigo-500 to-violet-600 text-white text-xs font-semibold rounded-full">MOST POPULAR</span>
            </div>
            <div class="mb-6">
                <h3 class="text-lg font-semibold text-white mb-1">Pro</h3>
                <p class="text-sm text-gray-500">For power users</p>
            </div>
            <div class="mb-6">
                <span class="text-4xl font-bold text-white">$9</span>
                <span class="text-gray-500 text-sm">/month</span>
            </div>
            <ul class="space-y-3 mb-8 flex-1">
                <li class="flex items-center space-x-3">
                    <svg class="w-5 h-5 text-green-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                    <span class="text-sm text-gray-300">Unlimited searches</span>
                </li>
                <li class="flex items-center space-x-3">
                    <svg class="w-5 h-5 text-green-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                    <span class="text-sm text-gray-300">HD streaming</span>
                </li>
                <li class="flex items-center space-x-3">
                    <svg class="w-5 h-5 text-green-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                    <span class="text-sm text-gray-300">HD downloads</span>
                </li>
                <li class="flex items-center space-x-3">
                    <svg class="w-5 h-5 text-green-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                    <span class="text-sm text-gray-300">Priority support</span>
                </li>
                <li class="flex items-center space-x-3">
                    <svg class="w-5 h-5 text-green-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                    <span class="text-sm text-gray-300">Batch downloads</span>
                </li>
            </ul>
            <div class="space-y-2">
                <button class="w-full py-3 px-4 bg-gradient-to-r from-indigo-500 to-violet-600 text-white text-sm font-medium rounded-lg hover:from-indigo-600 hover:to-violet-700 transition">
                    Auto Pay (Instant)
                </button>
                <button class="w-full py-3 px-4 bg-[#111113] border border-[#2a2a30] text-gray-300 text-sm font-medium rounded-lg hover:bg-[#2a2a30] hover:text-white transition">
                    Manual Pay
                </button>
            </div>
        </div>

        <!-- Enterprise Plan -->
        <div class="bg-[#1a1a1f] border border-[#2a2a30] rounded-2xl p-6 flex flex-col">
            <div class="mb-6">
                <h3 class="text-lg font-semibold text-white mb-1">Enterprise</h3>
                <p class="text-sm text-gray-500">For teams & businesses</p>
            </div>
            <div class="mb-6">
                <span class="text-4xl font-bold text-white">$29</span>
                <span class="text-gray-500 text-sm">/month</span>
            </div>
            <ul class="space-y-3 mb-8 flex-1">
                <li class="flex items-center space-x-3">
                    <svg class="w-5 h-5 text-green-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                    <span class="text-sm text-gray-300">Everything in Pro</span>
                </li>
                <li class="flex items-center space-x-3">
                    <svg class="w-5 h-5 text-green-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                    <span class="text-sm text-gray-300">API access</span>
                </li>
                <li class="flex items-center space-x-3">
                    <svg class="w-5 h-5 text-green-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                    <span class="text-sm text-gray-300">Dedicated support</span>
                </li>
                <li class="flex items-center space-x-3">
                    <svg class="w-5 h-5 text-green-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                    <span class="text-sm text-gray-300">Custom branding</span>
                </li>
                <li class="flex items-center space-x-3">
                    <svg class="w-5 h-5 text-green-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                    <span class="text-sm text-gray-300">Team management</span>
                </li>
            </ul>
            <div class="space-y-2">
                <button class="w-full py-3 px-4 bg-gradient-to-r from-indigo-500 to-violet-600 text-white text-sm font-medium rounded-lg hover:from-indigo-600 hover:to-violet-700 transition">
                    Auto Pay (Instant)
                </button>
                <button class="w-full py-3 px-4 bg-[#111113] border border-[#2a2a30] text-gray-300 text-sm font-medium rounded-lg hover:bg-[#2a2a30] hover:text-white transition">
                    Manual Pay
                </button>
            </div>
        </div>
    </div>

    <!-- Coupon Code Section -->
    <div class="bg-[#1a1a1f] border border-[#2a2a30] rounded-xl p-6">
        <h3 class="text-white font-semibold mb-2">Have a coupon code?</h3>
        <p class="text-gray-400 text-sm mb-4">Enter your coupon code below to get a discount on your subscription.</p>
        <div class="flex items-center space-x-3">
            <input type="text" placeholder="Enter coupon code" class="flex-1 px-4 py-3 bg-[#111113] border border-[#2a2a30] rounded-lg text-white text-sm placeholder-gray-500 focus:outline-none focus:border-indigo-500 transition">
            <button class="px-6 py-3 bg-gradient-to-r from-indigo-500 to-violet-600 text-white text-sm font-medium rounded-lg hover:from-indigo-600 hover:to-violet-700 transition">
                Apply
            </button>
        </div>
    </div>
</div>
@endsection
