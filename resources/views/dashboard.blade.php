@extends('layouts.app')

@section('title', 'Dashboard - XteraPlay')

@section('content')
<section class="py-8 px-4">
    <div class="max-w-7xl mx-auto">
        <!-- Header -->
        <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-8">
            <div>
                <h1 class="text-2xl md:text-3xl font-bold text-white mb-1">Welcome back, {{ Auth::user()->name }}!</h1>
                <p class="text-gray-400 text-sm">Here's your activity overview.</p>
            </div>
            <div class="flex items-center gap-3 mt-4 md:mt-0">
                <span class="px-3 py-1.5 bg-[#1a1a1f] border border-[#2a2a30] rounded-full text-xs text-gray-300 font-medium">Free Plan</span>
                <a href="{{ url('/') }}" class="px-4 py-2 bg-gradient-to-r from-indigo-500 to-violet-600 text-white text-sm font-medium rounded-lg hover:from-indigo-600 hover:to-violet-700 transition">Search Videos</a>
            </div>
        </div>


        <!-- Stat Cards -->
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4 mb-8">
            <!-- Videos Watched -->
            <div class="bg-[#1a1a1f] border border-[#2a2a30] rounded-xl p-4">
                <div class="flex items-center justify-between mb-3">
                    <div class="w-9 h-9 bg-blue-500/10 rounded-lg flex items-center justify-center">
                        <svg class="w-4.5 h-4.5 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </div>
                </div>
                <p class="text-2xl font-bold text-white">0</p>
                <p class="text-xs text-gray-400 mt-1">Videos Watched</p>
            </div>
            <!-- Downloads -->
            <div class="bg-[#1a1a1f] border border-[#2a2a30] rounded-xl p-4">
                <div class="flex items-center justify-between mb-3">
                    <div class="w-9 h-9 bg-green-500/10 rounded-lg flex items-center justify-center">
                        <svg class="w-4.5 h-4.5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                    </div>
                </div>
                <p class="text-2xl font-bold text-white">0</p>
                <p class="text-xs text-gray-400 mt-1">Downloads</p>
            </div>
            <!-- Bookmarks -->
            <div class="bg-[#1a1a1f] border border-[#2a2a30] rounded-xl p-4">
                <div class="flex items-center justify-between mb-3">
                    <div class="w-9 h-9 bg-amber-500/10 rounded-lg flex items-center justify-center">
                        <svg class="w-4.5 h-4.5 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"/></svg>
                    </div>
                </div>
                <p class="text-2xl font-bold text-white">0</p>
                <p class="text-xs text-gray-400 mt-1">Bookmarks</p>
            </div>
            <!-- History -->
            <div class="bg-[#1a1a1f] border border-[#2a2a30] rounded-xl p-4">
                <div class="flex items-center justify-between mb-3">
                    <div class="w-9 h-9 bg-purple-500/10 rounded-lg flex items-center justify-center">
                        <svg class="w-4.5 h-4.5 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </div>
                </div>
                <p class="text-2xl font-bold text-white">0</p>
                <p class="text-xs text-gray-400 mt-1">History</p>
            </div>
            <!-- Credits Today -->
            <div class="bg-[#1a1a1f] border border-[#2a2a30] rounded-xl p-4">
                <div class="flex items-center justify-between mb-3">
                    <div class="w-9 h-9 bg-emerald-500/10 rounded-lg flex items-center justify-center">
                        <svg class="w-4.5 h-4.5 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                    </div>
                </div>
                <p class="text-2xl font-bold text-white">5</p>
                <p class="text-xs text-gray-400 mt-1">Credits Today</p>
            </div>
        </div>


        <!-- Today's Usage -->
        <div class="bg-[#1a1a1f] border border-[#2a2a30] rounded-xl p-6 mb-8">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-4">
                <h2 class="text-white font-semibold text-lg">Today's Usage</h2>
                <div class="flex items-center gap-3 mt-2 sm:mt-0">
                    <a href="{{ url('/') }}" class="text-indigo-400 hover:text-indigo-300 text-sm font-medium transition">Search Now</a>
                    <a href="{{ url('/subscription') }}" class="text-amber-500 hover:text-amber-400 text-sm font-medium transition">Upgrade for More</a>
                </div>
            </div>
            <div class="flex items-center gap-4">
                <div class="flex-1 bg-[#111113] rounded-full h-3 overflow-hidden">
                    <div class="bg-gradient-to-r from-indigo-500 to-violet-600 h-full rounded-full" style="width: 0%"></div>
                </div>
                <span class="text-sm text-gray-400 whitespace-nowrap">0 / 5</span>
            </div>
        </div>


        <!-- Two Column Layout -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Left: Recent History -->
            <div class="lg:col-span-2">
                <div class="bg-[#1a1a1f] border border-[#2a2a30] rounded-xl p-6">
                    <div class="flex items-center justify-between mb-4">
                        <h2 class="text-white font-semibold text-lg">Recent History</h2>
                        <a href="{{ url('/history') }}" class="text-indigo-400 hover:text-indigo-300 text-sm font-medium transition">View All</a>
                    </div>
                    <!-- Empty State -->
                    <div class="text-center py-12">
                        <div class="w-16 h-16 bg-[#111113] rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        </div>
                        <p class="text-gray-400 text-sm">No history yet.</p>
                        <p class="text-gray-500 text-xs mt-1">Start watching videos to see your history here.</p>
                    </div>
                </div>
            </div>

            <!-- Right Column -->
            <div class="space-y-6">
                <!-- Your Plan -->
                <div class="bg-[#1a1a1f] border border-[#2a2a30] rounded-xl p-6">
                    <h2 class="text-white font-semibold text-lg mb-4">Your Plan</h2>
                    <div class="space-y-3 mb-4">
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-gray-400">Current Plan</span>
                            <span class="text-sm text-white font-medium">Free</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-gray-400">Daily Searches</span>
                            <span class="text-sm text-white font-medium">5</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-gray-400">API Access</span>
                            <span class="text-sm text-red-400 font-medium">No</span>
                        </div>
                    </div>
                    <a href="{{ url('/subscription') }}" class="block w-full py-2.5 px-4 bg-gradient-to-r from-indigo-500 to-violet-600 text-white text-center text-sm font-medium rounded-xl hover:from-indigo-600 hover:to-violet-700 transition">Upgrade Plan</a>
                </div>

                <!-- Quick Links -->
                <div class="bg-[#1a1a1f] border border-[#2a2a30] rounded-xl p-6">
                    <h2 class="text-white font-semibold text-lg mb-4">Quick Links</h2>
                    <div class="space-y-2">
                        <a href="{{ url('/bookmarks') }}" class="flex items-center px-3 py-2.5 text-sm text-gray-300 hover:bg-[#111113] hover:text-white rounded-lg transition">
                            <svg class="w-4 h-4 mr-3 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"/></svg>
                            My Bookmarks
                        </a>
                        <a href="{{ url('/history') }}" class="flex items-center px-3 py-2.5 text-sm text-gray-300 hover:bg-[#111113] hover:text-white rounded-lg transition">
                            <svg class="w-4 h-4 mr-3 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            Watch History
                        </a>
                        <a href="{{ url('/transactions') }}" class="flex items-center px-3 py-2.5 text-sm text-gray-300 hover:bg-[#111113] hover:text-white rounded-lg transition">
                            <svg class="w-4 h-4 mr-3 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/></svg>
                            Transactions
                        </a>
                        <a href="{{ url('/support') }}" class="flex items-center px-3 py-2.5 text-sm text-gray-300 hover:bg-[#111113] hover:text-white rounded-lg transition">
                            <svg class="w-4 h-4 mr-3 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                            Support
                        </a>
                        <a href="{{ url('/profile') }}" class="flex items-center px-3 py-2.5 text-sm text-gray-300 hover:bg-[#111113] hover:text-white rounded-lg transition">
                            <svg class="w-4 h-4 mr-3 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                            Edit Profile
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
