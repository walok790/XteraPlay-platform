@extends('layouts.app')

@section('title', 'XteraPlay - Stream Terabox Videos')

@section('content')

@if(session('installer_success'))
    @php $s = session('installer_success'); @endphp
    <div x-data="{ show: true }" x-show="show" x-transition class="fixed top-4 left-1/2 -translate-x-1/2 z-50 max-w-2xl w-[calc(100%-2rem)]">
        <div class="bg-white border-2 border-emerald-500 rounded-2xl shadow-xl shadow-emerald-500/20 p-4 sm:p-5">
            <div class="flex items-start gap-3">
                <div class="w-10 h-10 bg-emerald-100 rounded-full flex items-center justify-center flex-shrink-0">
                    <svg class="w-5 h-5 text-emerald-600" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.71-9.29a1 1 0 00-1.42-1.42L9 10.59 7.71 9.29a1 1 0 00-1.42 1.42l2 2a1 1 0 001.42 0l4-4z" clip-rule="evenodd"/></svg>
                </div>
                <div class="min-w-0 flex-1">
                    <p class="text-sm sm:text-base font-bold text-slate-900">🎉 Installation complete!</p>
                    <p class="text-xs sm:text-sm text-slate-600 mt-0.5">Your XteraPlay platform is ready. Sign in with your admin account at <a href="{{ url('/admin/login') }}" class="text-blue-600 hover:underline font-medium">/admin/login</a>.</p>
                    @if($s['mode'] === 'demo' && $s['admin_password'])
                    <div class="mt-2.5 p-2.5 bg-amber-50 border border-amber-200 rounded-lg text-xs">
                        <p class="font-semibold text-amber-900 mb-1">Demo credentials:</p>
                        <p class="text-slate-700"><span class="text-slate-500">Email:</span> <code class="bg-white px-1 py-0.5 rounded">{{ $s['admin_email'] }}</code></p>
                        <p class="text-slate-700"><span class="text-slate-500">Password:</span> <code class="bg-white px-1 py-0.5 rounded">{{ $s['admin_password'] }}</code></p>
                    </div>
                    @endif
                </div>
                <button @click="show = false" class="text-slate-400 hover:text-slate-600 flex-shrink-0">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>
        </div>
    </div>
@endif

@php
    $iconColors = [
        'blue' => ['bg' => 'bg-blue-50', 'text' => 'text-blue-600'],
        'emerald' => ['bg' => 'bg-emerald-50', 'text' => 'text-emerald-600'],
        'amber' => ['bg' => 'bg-amber-50', 'text' => 'text-amber-600'],
        'violet' => ['bg' => 'bg-violet-50', 'text' => 'text-violet-600'],
        'pink' => ['bg' => 'bg-pink-50', 'text' => 'text-pink-600'],
        'orange' => ['bg' => 'bg-orange-50', 'text' => 'text-orange-600'],
        'teal' => ['bg' => 'bg-teal-50', 'text' => 'text-teal-600'],
        'indigo' => ['bg' => 'bg-indigo-50', 'text' => 'text-indigo-600'],
        'red' => ['bg' => 'bg-red-50', 'text' => 'text-red-600'],
    ];
@endphp

<!-- Hero -->
<section id="home" class="relative overflow-hidden bg-gradient-to-b from-blue-50 via-white to-white">
    <div class="absolute inset-0 -z-10">
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[800px] h-[400px] bg-gradient-radial from-blue-200/40 via-transparent to-transparent blur-3xl"></div>
    </div>

    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 pt-10 pb-12 sm:pt-16 sm:pb-16 md:pt-20 md:pb-20 lg:pt-24 lg:pb-24 text-center">
        @if($content['hero_badge_text'])
        <div class="inline-flex items-center gap-2 px-3 py-1.5 bg-white border border-blue-200 rounded-full mb-5 sm:mb-6 shadow-sm">
            <span class="w-1.5 h-1.5 bg-emerald-500 rounded-full animate-pulse"></span>
            <span class="text-xs font-medium text-slate-600">{{ $content['hero_badge_text'] }}</span>
        </div>
        @endif

        <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-bold text-slate-900 leading-tight tracking-tight mb-3 sm:mb-4">
            {{ $content['hero_title_line_1'] }} <br class="hidden sm:block">
            <span class="bg-gradient-to-r from-blue-600 to-indigo-600 bg-clip-text text-transparent">{{ $content['hero_title_line_2'] }}</span>
        </h1>
        <p class="text-sm sm:text-base md:text-lg text-slate-600 mb-6 sm:mb-8 max-w-xl mx-auto leading-relaxed">{{ $content['hero_description'] }}</p>

        <!-- Search Input -->
        <div class="max-w-2xl mx-auto mb-4 sm:mb-5">
            <div class="flex items-stretch gap-2 bg-white border-2 border-slate-200 rounded-xl sm:rounded-2xl p-1.5 sm:p-2 shadow-lg shadow-blue-500/5 focus-within:border-blue-500 transition">
                <div class="flex items-center pl-3"><svg class="w-4 h-4 sm:w-5 sm:h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"/></svg></div>
                <input type="text" placeholder="Paste your Terabox URL here..." class="flex-1 min-w-0 bg-transparent text-sm sm:text-base text-slate-900 placeholder-slate-400 focus:outline-none py-2 sm:py-2.5">
                <button class="px-4 sm:px-6 py-2 sm:py-2.5 bg-blue-600 hover:bg-blue-700 text-white text-sm sm:text-base font-medium rounded-lg shadow-sm shadow-blue-500/25 transition whitespace-nowrap flex items-center gap-1.5">
                    <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4" fill="currentColor" viewBox="0 0 20 20"><path d="M6.3 2.841A1.5 1.5 0 004 4.11V15.89a1.5 1.5 0 002.3 1.269l9.344-5.89a1.5 1.5 0 000-2.538L6.3 2.84z"/></svg>
                    Watch
                </button>
            </div>
        </div>

        <div class="inline-flex items-center gap-2 px-3 py-1.5 bg-blue-50 border border-blue-100 rounded-full">
            <svg class="w-3.5 h-3.5 text-blue-600" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.75 6a.75.75 0 000 1.5H10v3a.75.75 0 001.5 0V7h1.25a.75.75 0 000-1.5h-4z" clip-rule="evenodd"/></svg>
            <span class="text-xs font-medium text-slate-700">Daily Credits</span>
            <span class="text-xs font-bold text-blue-600">5 / 5</span>
        </div>
    </div>
</section>

@if($sections['domains'])
<!-- Supported Domains -->
<section class="py-8 sm:py-10 md:py-12 border-t border-slate-200 bg-white">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <p class="text-xs sm:text-sm uppercase tracking-wider text-slate-500 font-medium mb-4 sm:mb-5">Works with all Terabox domains</p>
        <div class="flex flex-wrap justify-center gap-2 sm:gap-2.5">
            @foreach(['terabox.com', '1024terabox.com', 'teraboxapp.com', 'teraboxshare.com', 'freeterabox.com', 'mirrobox.com'] as $domain)
                <span class="px-3 sm:px-4 py-1.5 sm:py-2 bg-slate-100 border border-slate-200 rounded-full text-xs sm:text-sm text-slate-700 font-medium">{{ $domain }}</span>
            @endforeach
        </div>
    </div>
</section>
@endif

@if($sections['features'] && $features->count())
<!-- Features -->
<section id="features" class="py-12 sm:py-16 md:py-20 lg:py-24 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-2xl mx-auto mb-10 sm:mb-12 md:mb-14">
            <span class="inline-block px-3 py-1 bg-blue-100 text-blue-700 text-xs font-medium rounded-full mb-3">Features</span>
            <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-slate-900 mb-3">{{ $content['features_heading'] }}</h2>
            <p class="text-sm sm:text-base text-slate-600">{{ $content['features_subheading'] }}</p>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-5 md:gap-6">
            @foreach($features as $f)
            @php $c = $iconColors[$f->icon_color] ?? $iconColors['blue']; @endphp
            <div class="bg-white border border-slate-200 rounded-2xl p-5 sm:p-6 hover:border-blue-300 hover:shadow-md transition">
                <div class="w-10 h-10 sm:w-12 sm:h-12 {{ $c['bg'] }} rounded-xl flex items-center justify-center mb-4">
                    <svg class="w-5 h-5 sm:w-6 sm:h-6 {{ $c['text'] }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                </div>
                <h3 class="text-base sm:text-lg font-semibold text-slate-900 mb-2">{{ $f->title }}</h3>
                <p class="text-sm text-slate-600 leading-relaxed">{{ $f->description }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

@if($sections['pricing'] && $plans->count())
<!-- Pricing -->
<section id="pricing" class="py-12 sm:py-16 md:py-20 lg:py-24 bg-white">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-2xl mx-auto mb-10 sm:mb-12 md:mb-14">
            <span class="inline-block px-3 py-1 bg-blue-100 text-blue-700 text-xs font-medium rounded-full mb-3">Pricing</span>
            <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-slate-900 mb-3">{{ $content['pricing_heading'] }}</h2>
            <p class="text-sm sm:text-base text-slate-600">{{ $content['pricing_subheading'] }}</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 sm:gap-5 md:gap-6 max-w-5xl mx-auto">
            @foreach($plans as $plan)
            <div class="{{ $plan->is_popular ? 'bg-gradient-to-br from-blue-600 to-indigo-600 shadow-xl shadow-blue-500/30 md:-mt-4' : 'bg-white border border-slate-200 hover:shadow-md' }} rounded-2xl p-6 sm:p-7 relative transition">
                @if($plan->is_popular)
                    <div class="absolute -top-3 left-1/2 -translate-x-1/2 px-3 py-1 bg-white text-blue-600 text-xs font-bold rounded-full shadow-md">POPULAR</div>
                @endif
                <h3 class="text-base sm:text-lg font-semibold {{ $plan->is_popular ? 'text-white' : 'text-slate-900' }} mb-1">{{ $plan->name }}</h3>
                <p class="text-xs sm:text-sm {{ $plan->is_popular ? 'text-blue-100' : 'text-slate-500' }} mb-4">{{ $plan->tagline }}</p>
                <div class="mb-5 pb-5 border-b {{ $plan->is_popular ? 'border-white/20' : 'border-slate-100' }}">
                    <span class="text-3xl sm:text-4xl font-bold {{ $plan->is_popular ? 'text-white' : 'text-slate-900' }}">${{ number_format($plan->price, 0) }}</span>
                    <span class="text-sm {{ $plan->is_popular ? 'text-blue-100' : 'text-slate-500' }}">/{{ $plan->billing_period }}</span>
                </div>
                <a href="{{ url('/register') }}" class="{{ $plan->is_popular ? 'block w-full py-2.5 sm:py-3 text-center text-sm font-semibold bg-white hover:bg-blue-50 text-blue-600 rounded-lg transition mb-5' : 'block w-full py-2.5 sm:py-3 text-center text-sm font-medium bg-slate-100 hover:bg-slate-200 text-slate-900 rounded-lg transition mb-5' }}">Get Started</a>
                <ul class="space-y-2.5">
                    @foreach($plan->features ?? [] as $feature)
                    <li class="flex items-start gap-2 text-sm {{ $plan->is_popular ? 'text-white' : 'text-slate-700' }}">
                        <svg class="w-4 h-4 {{ $plan->is_popular ? 'text-blue-200' : 'text-emerald-600' }} flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.7 5.29a1 1 0 010 1.42l-8 8a1 1 0 01-1.42 0l-4-4a1 1 0 011.42-1.42L8 12.59l7.29-7.3a1 1 0 011.41 0z" clip-rule="evenodd"/></svg>
                        {{ $feature }}
                    </li>
                    @endforeach
                </ul>
            </div>
            @endforeach
        </div>
        <p class="text-center text-xs sm:text-sm text-slate-500 mt-6 sm:mt-8">Sign up first, then upgrade anytime from your account.</p>
    </div>
</section>
@endif

@if($sections['reviews'] && $reviews->count())
<!-- Reviews / Testimonials (only approved) -->
<section id="reviews" class="py-12 sm:py-16 md:py-20 lg:py-24 bg-slate-50">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-2xl mx-auto mb-10 sm:mb-12 md:mb-14">
            <span class="inline-block px-3 py-1 bg-amber-100 text-amber-700 text-xs font-medium rounded-full mb-3">Reviews</span>
            <div class="flex items-center justify-center gap-1 mb-3">
                @for($i = 0; $i < 5; $i++)<svg class="w-4 h-4 sm:w-5 sm:h-5 text-amber-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.05 2.93c.3-.92 1.6-.92 1.9 0l1.07 3.29a1 1 0 00.95.69h3.46c.97 0 1.37 1.24.59 1.81l-2.8 2.03a1 1 0 00-.37 1.12l1.07 3.29c.3.92-.75 1.69-1.54 1.12l-2.8-2.03a1 1 0 00-1.17 0l-2.8 2.03c-.78.57-1.84-.2-1.54-1.12l1.07-3.29a1 1 0 00-.37-1.12L2.98 8.72c-.78-.57-.38-1.81.59-1.81h3.46a1 1 0 00.95-.69l1.07-3.29z"/></svg>@endfor
                <span class="ml-1.5 text-sm font-medium text-slate-700">{{ number_format($reviews->avg('rating'), 1) }} from {{ $reviews->count() }}+ approved reviews</span>
            </div>
            <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-slate-900 mb-3">{{ $content['reviews_heading'] }}</h2>
            <p class="text-sm sm:text-base text-slate-600">{{ $content['reviews_subheading'] }}</p>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-5 md:gap-6">
            @foreach($reviews as $r)
            <div class="bg-white border border-slate-200 rounded-2xl p-5 sm:p-6 hover:shadow-md transition">
                <div class="flex items-center gap-0.5 mb-3">
                    @for($i = 0; $i < $r->rating; $i++)<svg class="w-3.5 h-3.5 text-amber-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.05 2.93c.3-.92 1.6-.92 1.9 0l1.07 3.29a1 1 0 00.95.69h3.46c.97 0 1.37 1.24.59 1.81l-2.8 2.03a1 1 0 00-.37 1.12l1.07 3.29c.3.92-.75 1.69-1.54 1.12l-2.8-2.03a1 1 0 00-1.17 0l-2.8 2.03c-.78.57-1.84-.2-1.54-1.12l1.07-3.29a1 1 0 00-.37-1.12L2.98 8.72c-.78-.57-.38-1.81.59-1.81h3.46a1 1 0 00.95-.69l1.07-3.29z"/></svg>@endfor
                    @for($i = $r->rating; $i < 5; $i++)<svg class="w-3.5 h-3.5 text-slate-300" fill="currentColor" viewBox="0 0 20 20"><path d="M9.05 2.93c.3-.92 1.6-.92 1.9 0l1.07 3.29a1 1 0 00.95.69h3.46c.97 0 1.37 1.24.59 1.81l-2.8 2.03a1 1 0 00-.37 1.12l1.07 3.29c.3.92-.75 1.69-1.54 1.12l-2.8-2.03a1 1 0 00-1.17 0l-2.8 2.03c-.78.57-1.84-.2-1.54-1.12l1.07-3.29a1 1 0 00-.37-1.12L2.98 8.72c-.78-.57-.38-1.81.59-1.81h3.46a1 1 0 00.95-.69l1.07-3.29z"/></svg>@endfor
                </div>
                <p class="text-sm text-slate-700 leading-relaxed mb-4">"{{ $r->message }}"</p>
                <div class="flex items-center gap-3 pt-4 border-t border-slate-100">
                    <div class="w-9 h-9 rounded-full bg-gradient-to-br {{ $r->avatar_color }} flex items-center justify-center text-xs font-semibold text-white">{{ $r->initials }}</div>
                    <div>
                        <p class="text-sm font-semibold text-slate-900">{{ $r->display_name }}</p>
                        <p class="text-xs text-slate-500">{{ $r->role ?: 'User' }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

@if($sections['cta'])
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
@endif

@endsection
