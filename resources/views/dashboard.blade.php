@extends('layouts.app')

@section('title', 'Dashboard - XteraPlay')

@section('content')
<section class="min-h-screen pt-24 pb-16 px-5">
    <div class="w-full max-w-7xl mx-auto">
        <!-- Welcome Header -->
        <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 mb-8 sm:mb-10">
            <div>
                <h1 class="text-2xl sm:text-3xl font-bold text-white mb-1">Welcome, {{ Auth::user()->name }}!</h1>
                <p class="text-sm text-dark-400">Stream TeraBox videos with your account benefits.</p>
            </div>
            <form method="POST" action="/logout">
                @csrf
                <button type="submit" class="px-4 py-2 text-sm font-medium text-dark-300 hover:text-white glass-card rounded-lg hover:border-red-500/30 transition-all">
                    Sign Out
                </button>
            </form>
        </div>

        <!-- Search Box -->
        <div x-data="{ link: '', loading: false }" class="w-full max-w-3xl mb-10">
            <div class="glass-card rounded-2xl p-2 glow-border">
                <div class="flex items-center gap-2">
                    <div class="flex-shrink-0 pl-4">
                        <svg class="w-5 h-5 text-dark-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"/></svg>
                    </div>
                    <input x-model="link" type="url" placeholder="Paste TeraBox URL here..."
                           class="flex-1 min-w-0 bg-transparent text-white placeholder-dark-500 px-3 py-3.5 text-sm focus:outline-none font-inter">
                    <button :disabled="!link || loading"
                            class="flex-shrink-0 px-5 py-2.5 bg-gradient-to-r from-primary-600 to-purple-600 hover:from-primary-500 hover:to-purple-500 disabled:opacity-50 text-white font-semibold text-sm rounded-xl shadow-lg shadow-primary-500/25 transition-all">
                        Watch Now
                    </button>
                </div>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 sm:gap-5 mb-10">
            <div class="glass-card rounded-xl p-5">
                <p class="text-xs text-dark-400 mb-1">Daily Streams Left</p>
                <p class="text-2xl font-bold text-white">15 <span class="text-sm font-normal text-dark-500">/ 15</span></p>
            </div>
            <div class="glass-card rounded-xl p-5">
                <p class="text-xs text-dark-400 mb-1">Videos Watched</p>
                <p class="text-2xl font-bold text-white">0</p>
            </div>
            <div class="glass-card rounded-xl p-5">
                <p class="text-xs text-dark-400 mb-1">Plan</p>
                <p class="text-2xl font-bold gradient-text">Free</p>
            </div>
        </div>

        <!-- Recent History Placeholder -->
        <div class="glass-card rounded-2xl p-6 sm:p-8">
            <h2 class="text-lg font-semibold text-white mb-4">Recent Watch History</h2>
            <div class="text-center py-12">
                <svg class="w-12 h-12 text-dark-600 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"/></svg>
                <p class="text-sm text-dark-400 mb-2">No videos watched yet</p>
                <p class="text-xs text-dark-500">Paste a TeraBox link above to start streaming!</p>
            </div>
        </div>
    </div>
</section>
@endsection
