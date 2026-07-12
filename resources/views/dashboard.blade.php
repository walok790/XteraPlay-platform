@extends('layouts.app')

@section('title', 'Dashboard - XteraPlay')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 sm:py-8 md:py-10">
    <!-- Header -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6 sm:mb-8">
        <div>
            <h1 class="text-2xl sm:text-3xl font-bold text-slate-900">Welcome back, {{ Auth::user()->name }}!</h1>
            <p class="text-sm text-slate-600 mt-1">Here's your streaming activity overview.</p>
        </div>
        <div class="flex items-center gap-2">
            <span class="px-3 py-1.5 bg-slate-100 border border-slate-200 rounded-full text-xs font-medium text-slate-700">Free Plan</span>
            <a href="{{ url('/home') }}" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-lg shadow-sm shadow-blue-500/25 transition flex items-center gap-1.5">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path d="M6.3 2.841A1.5 1.5 0 004 4.11V15.89a1.5 1.5 0 002.3 1.269l9.344-5.89a1.5 1.5 0 000-2.538L6.3 2.84z"/></svg>
                Search Videos
            </a>
        </div>
    </div>

    <!-- Stats Grid -->
    <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 gap-3 sm:gap-4 mb-6 sm:mb-8">
        <div class="bg-white border border-slate-200 rounded-2xl p-4 sm:p-5">
            <div class="w-9 h-9 sm:w-10 sm:h-10 bg-blue-50 rounded-xl flex items-center justify-center mb-3">
                <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.46 12C3.73 7.94 7.52 5 12 5c4.48 0 8.27 2.94 9.54 7-1.27 4.06-5.06 7-9.54 7-4.48 0-8.27-2.94-9.54-7z"/></svg>
            </div>
            <p class="text-2xl sm:text-3xl font-bold text-slate-900">0</p>
            <p class="text-xs text-slate-500 mt-0.5">Videos Watched</p>
        </div>
        <div class="bg-white border border-slate-200 rounded-2xl p-4 sm:p-5">
            <div class="w-9 h-9 sm:w-10 sm:h-10 bg-emerald-50 rounded-xl flex items-center justify-center mb-3">
                <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
            </div>
            <p class="text-2xl sm:text-3xl font-bold text-slate-900">0</p>
            <p class="text-xs text-slate-500 mt-0.5">Downloads</p>
        </div>
        <div class="bg-white border border-slate-200 rounded-2xl p-4 sm:p-5">
            <div class="w-9 h-9 sm:w-10 sm:h-10 bg-amber-50 rounded-xl flex items-center justify-center mb-3">
                <svg class="w-5 h-5 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"/></svg>
            </div>
            <p class="text-2xl sm:text-3xl font-bold text-slate-900">0</p>
            <p class="text-xs text-slate-500 mt-0.5">Bookmarks</p>
        </div>
        <div class="bg-white border border-slate-200 rounded-2xl p-4 sm:p-5">
            <div class="w-9 h-9 sm:w-10 sm:h-10 bg-violet-50 rounded-xl flex items-center justify-center mb-3">
                <svg class="w-5 h-5 text-violet-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            </div>
            <p class="text-2xl sm:text-3xl font-bold text-slate-900">0</p>
            <p class="text-xs text-slate-500 mt-0.5">History</p>
        </div>
        <div class="bg-white border border-slate-200 rounded-2xl p-4 sm:p-5 col-span-2 sm:col-span-1">
            <div class="w-9 h-9 sm:w-10 sm:h-10 bg-teal-50 rounded-xl flex items-center justify-center mb-3">
                <svg class="w-5 h-5 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
            </div>
            <p class="text-2xl sm:text-3xl font-bold text-slate-900">5</p>
            <p class="text-xs text-slate-500 mt-0.5">Credits Today</p>
        </div>
    </div>

    <!-- Today's Usage -->
    <div class="bg-white border border-slate-200 rounded-2xl p-5 sm:p-6 mb-6 sm:mb-8">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 mb-4">
            <h2 class="text-base sm:text-lg font-semibold text-slate-900 flex items-center gap-2">
                <svg class="w-5 h-5 text-blue-600" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M11.3 1.046A1 1 0 0112 2v5h4a1 1 0 01.82 1.573l-7 10A1 1 0 018 18v-5H4a1 1 0 01-.82-1.573l7-10a1 1 0 011.12-.38z" clip-rule="evenodd"/></svg>
                Today's Usage
            </h2>
            <div class="flex items-center gap-3">
                <a href="{{ url('/home') }}" class="text-sm text-blue-600 hover:text-blue-700 font-medium">Search Now</a>
                <a href="{{ url('/subscription') }}" class="text-sm text-amber-600 hover:text-amber-700 font-medium">Upgrade for More</a>
            </div>
        </div>
        <div class="flex items-center gap-3">
            <div class="flex-1 bg-slate-100 rounded-full h-2 overflow-hidden">
                <div class="bg-gradient-to-r from-blue-600 to-indigo-600 h-full rounded-full" style="width: 0%"></div>
            </div>
            <span class="text-sm text-slate-600 whitespace-nowrap font-medium">0 / 5</span>
        </div>
    </div>

    <!-- Two Column Layout -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-4 sm:gap-6">
        <div class="lg:col-span-2">
            <div class="bg-white border border-slate-200 rounded-2xl p-5 sm:p-6">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-base sm:text-lg font-semibold text-slate-900">Recent History</h2>
                    <a href="{{ url('/history') }}" class="text-sm text-blue-600 hover:text-blue-700 font-medium">View All →</a>
                </div>
                <div class="text-center py-10 sm:py-12">
                    <div class="w-14 h-14 bg-slate-100 rounded-full flex items-center justify-center mx-auto mb-3">
                        <svg class="w-7 h-7 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </div>
                    <p class="text-sm font-medium text-slate-700">No history yet.</p>
                    <p class="text-xs text-slate-500 mt-1">Start watching videos to see them here.</p>
                </div>
            </div>
        </div>
        <div class="space-y-4 sm:space-y-6">
            <div class="bg-gradient-to-br from-blue-600 to-indigo-600 rounded-2xl p-5 sm:p-6 text-white shadow-lg shadow-blue-500/20">
                <h2 class="text-base sm:text-lg font-semibold mb-4 flex items-center gap-2">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M11.3 1.046A1 1 0 0112 2v5h4a1 1 0 01.82 1.573l-7 10A1 1 0 018 18v-5H4a1 1 0 01-.82-1.573l7-10a1 1 0 011.12-.38z"/></svg>
                    Your Plan
                </h2>
                <div class="space-y-2.5 mb-5 pb-5 border-b border-white/20">
                    <div class="flex items-center justify-between"><span class="text-sm text-blue-100">Current Plan</span><span class="text-sm font-semibold">Free</span></div>
                    <div class="flex items-center justify-between"><span class="text-sm text-blue-100">Daily Searches</span><span class="text-sm font-semibold">5</span></div>
                    <div class="flex items-center justify-between"><span class="text-sm text-blue-100">API Access</span><span class="text-sm font-semibold">No</span></div>
                </div>
                <a href="{{ url('/subscription') }}" class="block w-full py-2.5 bg-white text-blue-600 text-center text-sm font-semibold rounded-lg hover:bg-blue-50 transition">Upgrade Plan</a>
            </div>
            <div class="bg-white border border-slate-200 rounded-2xl p-5 sm:p-6">
                <h2 class="text-base sm:text-lg font-semibold text-slate-900 mb-4">Quick Links</h2>
                <div class="space-y-1">
                    <a href="{{ url('/bookmarks') }}" class="flex items-center gap-3 px-3 py-2.5 text-sm text-slate-700 hover:bg-slate-50 hover:text-slate-900 rounded-lg transition"><svg class="w-4 h-4 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"/></svg>My Bookmarks</a>
                    <a href="{{ url('/history') }}" class="flex items-center gap-3 px-3 py-2.5 text-sm text-slate-700 hover:bg-slate-50 hover:text-slate-900 rounded-lg transition"><svg class="w-4 h-4 text-violet-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>Watch History</a>
                    <a href="{{ url('/transactions') }}" class="flex items-center gap-3 px-3 py-2.5 text-sm text-slate-700 hover:bg-slate-50 hover:text-slate-900 rounded-lg transition"><svg class="w-4 h-4 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/></svg>Transactions</a>
                    <a href="{{ url('/support') }}" class="flex items-center gap-3 px-3 py-2.5 text-sm text-slate-700 hover:bg-slate-50 hover:text-slate-900 rounded-lg transition"><svg class="w-4 h-4 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.36 5.64l-3.53 3.53m0 5.66l3.53 3.53M9.17 9.17L5.64 5.64m3.53 9.19l-3.53 3.53M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"/></svg>Support</a>
                    <a href="{{ url('/profile') }}" class="flex items-center gap-3 px-3 py-2.5 text-sm text-slate-700 hover:bg-slate-50 hover:text-slate-900 rounded-lg transition"><svg class="w-4 h-4 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>Edit Profile</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
