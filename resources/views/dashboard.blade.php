@extends('layouts.app')
@section('title', 'Dashboard - XteraPlay')
@section('content')
<div class="min-h-screen pt-20 pb-12">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- Header -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-8">
            <div>
                <h1 class="text-2xl sm:text-3xl font-bold text-white">Welcome, {{ Auth::user()->name }}!</h1>
                <p class="text-gray-400 text-sm mt-1">Stream TeraBox videos instantly.</p>
            </div>
            <form method="POST" action="{{ url('/logout') }}">
                @csrf
                <button type="submit" class="px-4 py-2 text-sm text-gray-400 hover:text-white border border-[#1e1e2e] hover:border-gray-600 rounded-lg transition-colors">Sign Out</button>
            </form>
        </div>

        <!-- Stream Box -->
        <div class="bg-[#12121a] border border-[#1e1e2e] rounded-2xl p-6 sm:p-8 mb-8">
            <h2 class="text-lg font-semibold text-white mb-4">Stream a Video</h2>
            <div class="flex flex-col sm:flex-row gap-3">
                <input type="url" placeholder="Paste TeraBox URL here..."
                       class="flex-1 px-4 py-3 bg-[#0a0a0f] border border-[#1e1e2e] rounded-lg text-white placeholder-gray-500 focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 transition-colors">
                <button class="px-6 py-3 bg-gradient-to-r from-indigo-500 to-violet-500 hover:from-indigo-600 hover:to-violet-600 text-white font-semibold rounded-lg transition-all shadow-lg shadow-indigo-500/25 whitespace-nowrap">
                    Watch Now
                </button>
            </div>
        </div>

        <!-- Stats -->
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
            <div class="bg-[#12121a] border border-[#1e1e2e] rounded-xl p-5">
                <p class="text-gray-400 text-xs mb-1">Streams Today</p>
                <p class="text-2xl font-bold text-white">15 <span class="text-sm font-normal text-gray-500">left</span></p>
            </div>
            <div class="bg-[#12121a] border border-[#1e1e2e] rounded-xl p-5">
                <p class="text-gray-400 text-xs mb-1">Total Watched</p>
                <p class="text-2xl font-bold text-white">24</p>
            </div>
            <div class="bg-[#12121a] border border-[#1e1e2e] rounded-xl p-5">
                <p class="text-gray-400 text-xs mb-1">Bookmarks</p>
                <p class="text-2xl font-bold text-white">7</p>
            </div>
            <div class="bg-[#12121a] border border-[#1e1e2e] rounded-xl p-5">
                <p class="text-gray-400 text-xs mb-1">Plan</p>
                <p class="text-2xl font-bold bg-gradient-to-r from-indigo-400 to-violet-400 bg-clip-text text-transparent">Free</p>
            </div>
        </div>

        <!-- Recent Activity -->
        <div class="bg-[#12121a] border border-[#1e1e2e] rounded-2xl p-6 sm:p-8">
            <h2 class="text-lg font-semibold text-white mb-4">Recent Activity</h2>
            <div class="space-y-3">
                <div class="flex items-center gap-4 p-3 bg-[#0a0a0f] rounded-xl">
                    <div class="w-10 h-10 bg-indigo-500/10 rounded-lg flex items-center justify-center flex-shrink-0">
                        <svg class="w-5 h-5 text-indigo-400" fill="currentColor" viewBox="0 0 20 20"><path d="M6.3 2.841A1.5 1.5 0 004 4.11V15.89a1.5 1.5 0 002.3 1.269l9.344-5.89a1.5 1.5 0 000-2.538L6.3 2.84z"/></svg>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm text-white truncate">Sample_Video_1080p.mp4</p>
                        <p class="text-xs text-gray-500">Streamed 2 hours ago</p>
                    </div>
                    <span class="text-xs text-green-400 bg-green-400/10 px-2 py-0.5 rounded-full">1080p</span>
                </div>
                <div class="flex items-center gap-4 p-3 bg-[#0a0a0f] rounded-xl">
                    <div class="w-10 h-10 bg-violet-500/10 rounded-lg flex items-center justify-center flex-shrink-0">
                        <svg class="w-5 h-5 text-violet-400" fill="currentColor" viewBox="0 0 20 20"><path d="M6.3 2.841A1.5 1.5 0 004 4.11V15.89a1.5 1.5 0 002.3 1.269l9.344-5.89a1.5 1.5 0 000-2.538L6.3 2.84z"/></svg>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm text-white truncate">Tutorial_Part3.mp4</p>
                        <p class="text-xs text-gray-500">Streamed 5 hours ago</p>
                    </div>
                    <span class="text-xs text-blue-400 bg-blue-400/10 px-2 py-0.5 rounded-full">720p</span>
                </div>
                <div class="flex items-center gap-4 p-3 bg-[#0a0a0f] rounded-xl">
                    <div class="w-10 h-10 bg-orange-500/10 rounded-lg flex items-center justify-center flex-shrink-0">
                        <svg class="w-5 h-5 text-orange-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm text-white truncate">Movie_HD.mp4</p>
                        <p class="text-xs text-gray-500">Downloaded yesterday</p>
                    </div>
                    <span class="text-xs text-orange-400 bg-orange-400/10 px-2 py-0.5 rounded-full">Downloaded</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
