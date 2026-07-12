@extends('layouts.app')

@section('title', 'Subscription - XteraPlay')

@section('content')
<div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-6 sm:py-8 md:py-12">
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

    @if(session('status'))
        <div class="mb-4 p-3 bg-emerald-50 border border-emerald-200 rounded-2xl text-sm text-emerald-700">{{ session('status') }}</div>
    @endif

    <!-- Pricing Cards (Dynamic) -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 sm:gap-5 md:gap-6 mb-8">
        @foreach($plans as $plan)
        <div class="{{ $plan->is_popular ? 'bg-gradient-to-br from-blue-600 to-indigo-600 shadow-xl shadow-blue-500/30 md:-mt-4' : 'bg-white border border-slate-200 hover:shadow-md' }} rounded-2xl p-6 sm:p-7 flex flex-col relative transition">
            @if($plan->is_popular)
                <div class="absolute -top-3 left-1/2 -translate-x-1/2 px-3 py-1 bg-white text-blue-600 text-xs font-bold rounded-full shadow-md">MOST POPULAR</div>
            @endif
            <div class="mb-5">
                <h3 class="text-lg font-semibold {{ $plan->is_popular ? 'text-white' : 'text-slate-900' }} mb-1">{{ $plan->name }}</h3>
                <p class="text-sm {{ $plan->is_popular ? 'text-blue-100' : 'text-slate-500' }}">{{ $plan->tagline }}</p>
            </div>
            <div class="mb-5 pb-5 border-b {{ $plan->is_popular ? 'border-white/20' : 'border-slate-100' }}">
                <span class="text-3xl sm:text-4xl font-bold {{ $plan->is_popular ? 'text-white' : 'text-slate-900' }}">${{ number_format($plan->price, 0) }}</span>
                <span class="text-sm {{ $plan->is_popular ? 'text-blue-100' : 'text-slate-500' }}">/{{ $plan->billing_period }}</span>
            </div>
            <ul class="space-y-2.5 mb-6 flex-1">
                @foreach($plan->features ?? [] as $feature)
                <li class="flex items-start gap-2 text-sm {{ $plan->is_popular ? 'text-white' : 'text-slate-700' }}">
                    <svg class="w-4 h-4 {{ $plan->is_popular ? 'text-blue-200' : 'text-emerald-600' }} flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.7 5.29a1 1 0 010 1.42l-8 8a1 1 0 01-1.42 0l-4-4a1 1 0 011.42-1.42L8 12.59l7.29-7.3a1 1 0 011.41 0z" clip-rule="evenodd"/></svg>
                    {{ $feature }}
                </li>
                @endforeach
            </ul>
            @if($plan->price == 0)
                <button disabled class="w-full py-2.5 bg-slate-100 text-slate-500 text-sm font-medium rounded-lg cursor-not-allowed">Current Plan</button>
            @else
                <div class="space-y-2">
                    <button class="w-full py-2.5 {{ $plan->is_popular ? 'bg-white hover:bg-blue-50 text-blue-600' : 'bg-blue-600 hover:bg-blue-700 text-white' }} text-sm font-semibold rounded-lg transition flex items-center justify-center gap-1.5">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M11.3 1.046A1 1 0 0112 2v5h4a1 1 0 01.82 1.573l-7 10A1 1 0 018 18v-5H4a1 1 0 01-.82-1.573l7-10a1 1 0 011.12-.38z" clip-rule="evenodd"/></svg>
                        Auto Pay (Instant)
                    </button>
                    <button class="w-full py-2.5 {{ $plan->is_popular ? 'bg-blue-500/20 hover:bg-blue-500/30 text-white border border-white/20' : 'bg-white hover:bg-slate-50 text-slate-700 border border-slate-200' }} text-sm font-medium rounded-lg transition flex items-center justify-center gap-1.5">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                        Manual Pay
                    </button>
                </div>
            @endif
        </div>
        @endforeach
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
