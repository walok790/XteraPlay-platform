@extends('layouts.app')

@section('title', 'Dashboard - XteraPlay')

@section('styles')
<style>
    .sidebar-link.active { background: rgba(99, 102, 241, 0.1); border-left-color: #6366f1; color: #fff; }
    .sidebar-link { border-left: 3px solid transparent; }
</style>
@endsection

@section('content')
<div class="min-h-screen pt-16 lg:pt-20" x-data="{ tab: 'overview', mobileSidebar: false }">
    <div class="flex">
        <!-- Sidebar - Desktop -->
        <aside class="hidden lg:flex flex-col w-64 fixed left-0 top-20 bottom-0 bg-dark-900 border-r border-dark-700/50 overflow-y-auto">
            <!-- User Info -->
            <div class="p-5 border-b border-dark-700/50">
                <div class="flex items-center gap-3">
                    <div class="w-11 h-11 bg-gradient-to-br from-primary-500 to-purple-600 rounded-full flex items-center justify-center text-sm font-bold text-white shadow-lg shadow-primary-500/20">
                        {{ strtoupper(substr(Auth::user()->name, 0, 2)) }}
                    </div>
                    <div class="min-w-0">
                        <p class="text-sm font-semibold text-white truncate">{{ Auth::user()->name }}</p>
                        <p class="text-xs text-dark-400 truncate">{{ Auth::user()->email }}</p>
                    </div>
                </div>
                <div class="mt-3 flex items-center gap-2">
                    <span class="px-2 py-0.5 text-[10px] font-semibold bg-primary-500/10 text-primary-400 border border-primary-500/20 rounded-full">Free Plan</span>
                    <a href="/#pricing" class="text-[10px] text-dark-400 hover:text-primary-400 transition-colors">Upgrade</a>
                </div>
            </div>

            <!-- Navigation -->
            <nav class="flex-1 p-3 space-y-1">

                <button @click="tab = 'overview'" :class="tab === 'overview' ? 'active' : ''" class="sidebar-link w-full flex items-center gap-3 px-4 py-2.5 text-sm text-dark-300 hover:text-white rounded-lg transition-all text-left">
                    <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zm10 0a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zm10 0a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/></svg>
                    Overview
                </button>
                <button @click="tab = 'stream'" :class="tab === 'stream' ? 'active' : ''" class="sidebar-link w-full flex items-center gap-3 px-4 py-2.5 text-sm text-dark-300 hover:text-white rounded-lg transition-all text-left">
                    <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    Stream Video
                </button>
                <button @click="tab = 'history'" :class="tab === 'history' ? 'active' : ''" class="sidebar-link w-full flex items-center gap-3 px-4 py-2.5 text-sm text-dark-300 hover:text-white rounded-lg transition-all text-left">
                    <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    Watch History
                </button>
                <button @click="tab = 'bookmarks'" :class="tab === 'bookmarks' ? 'active' : ''" class="sidebar-link w-full flex items-center gap-3 px-4 py-2.5 text-sm text-dark-300 hover:text-white rounded-lg transition-all text-left">
                    <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"/></svg>
                    Bookmarks
                </button>
                <button @click="tab = 'settings'" :class="tab === 'settings' ? 'active' : ''" class="sidebar-link w-full flex items-center gap-3 px-4 py-2.5 text-sm text-dark-300 hover:text-white rounded-lg transition-all text-left">
                    <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.066 2.573c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.573 1.066c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.066-2.573c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                    Settings
                </button>
            </nav>

            <!-- Sidebar Footer -->
            <div class="p-4 border-t border-dark-700/50">
                <div class="glass-card rounded-xl p-4 text-center">
                    <p class="text-xs font-medium text-white mb-1">Upgrade to Pro</p>
                    <p class="text-[10px] text-dark-400 mb-3">Unlimited streams & HD quality</p>
                    <a href="/#pricing" class="block w-full py-2 text-xs font-semibold bg-gradient-to-r from-primary-600 to-purple-600 text-white rounded-lg">Upgrade Now</a>
                </div>
            </div>
        </aside>


        <!-- Mobile Sidebar Toggle -->
        <div class="lg:hidden fixed bottom-4 right-4 z-40">
            <button @click="mobileSidebar = !mobileSidebar" class="w-12 h-12 bg-primary-600 rounded-full flex items-center justify-center shadow-lg shadow-primary-500/30 text-white">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
            </button>
        </div>

        <!-- Mobile Sidebar Overlay -->
        <div x-show="mobileSidebar" x-cloak @click="mobileSidebar = false" class="lg:hidden fixed inset-0 bg-black/60 z-40"></div>
        <aside x-show="mobileSidebar" x-cloak
               x-transition:enter="transition ease-out duration-200" x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0"
               x-transition:leave="transition ease-in duration-150" x-transition:leave-start="translate-x-0" x-transition:leave-end="-translate-x-full"
               class="lg:hidden fixed left-0 top-0 bottom-0 w-72 bg-dark-900 border-r border-dark-700/50 z-50 overflow-y-auto pt-20">
            <div class="p-5 border-b border-dark-700/50">
                <div class="flex items-center gap-3">
                    <div class="w-11 h-11 bg-gradient-to-br from-primary-500 to-purple-600 rounded-full flex items-center justify-center text-sm font-bold text-white">{{ strtoupper(substr(Auth::user()->name, 0, 2)) }}</div>
                    <div class="min-w-0">
                        <p class="text-sm font-semibold text-white truncate">{{ Auth::user()->name }}</p>
                        <p class="text-xs text-dark-400 truncate">{{ Auth::user()->email }}</p>
                    </div>
                </div>
            </div>
            <nav class="p-3 space-y-1">
                <button @click="tab = 'overview'; mobileSidebar = false" :class="tab === 'overview' ? 'active' : ''" class="sidebar-link w-full flex items-center gap-3 px-4 py-3 text-sm text-dark-300 hover:text-white rounded-lg transition-all text-left">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zm10 0a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zm10 0a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/></svg>
                    Overview
                </button>
                <button @click="tab = 'stream'; mobileSidebar = false" :class="tab === 'stream' ? 'active' : ''" class="sidebar-link w-full flex items-center gap-3 px-4 py-3 text-sm text-dark-300 hover:text-white rounded-lg transition-all text-left">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    Stream Video
                </button>
                <button @click="tab = 'history'; mobileSidebar = false" :class="tab === 'history' ? 'active' : ''" class="sidebar-link w-full flex items-center gap-3 px-4 py-3 text-sm text-dark-300 hover:text-white rounded-lg transition-all text-left">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    Watch History
                </button>
                <button @click="tab = 'bookmarks'; mobileSidebar = false" :class="tab === 'bookmarks' ? 'active' : ''" class="sidebar-link w-full flex items-center gap-3 px-4 py-3 text-sm text-dark-300 hover:text-white rounded-lg transition-all text-left">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"/></svg>
                    Bookmarks
                </button>
                <button @click="tab = 'settings'; mobileSidebar = false" :class="tab === 'settings' ? 'active' : ''" class="sidebar-link w-full flex items-center gap-3 px-4 py-3 text-sm text-dark-300 hover:text-white rounded-lg transition-all text-left">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.066 2.573c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.573 1.066c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.066-2.573c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                    Settings
                </button>
            </nav>
        </aside>


        <!-- Main Content -->
        <div class="lg:ml-64 flex-1 min-h-screen">
            <div class="p-4 sm:p-6 lg:p-8">

                <!-- ===== OVERVIEW TAB ===== -->
                <div x-show="tab === 'overview'" x-cloak>
                    <div class="mb-6 sm:mb-8">
                        <h1 class="text-xl sm:text-2xl font-bold text-white mb-1">Welcome back, {{ Auth::user()->name }}!</h1>
                        <p class="text-sm text-dark-400">Here's your streaming activity overview.</p>
                    </div>

                    <!-- Stats Grid -->
                    <div class="grid grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-4 mb-6 sm:mb-8">
                        <div class="glass-card rounded-xl p-4 sm:p-5">
                            <div class="flex items-center justify-between mb-2">
                                <svg class="w-5 h-5 text-primary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                <span class="text-[10px] px-2 py-0.5 bg-green-500/10 text-green-400 rounded-full font-medium">Active</span>
                            </div>
                            <p class="text-2xl sm:text-3xl font-bold text-white">15</p>
                            <p class="text-[11px] sm:text-xs text-dark-400 mt-1">Streams Left Today</p>
                        </div>
                        <div class="glass-card rounded-xl p-4 sm:p-5">
                            <div class="flex items-center justify-between mb-2">
                                <svg class="w-5 h-5 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            </div>
                            <p class="text-2xl sm:text-3xl font-bold text-white">24</p>
                            <p class="text-[11px] sm:text-xs text-dark-400 mt-1">Total Videos Watched</p>
                        </div>
                        <div class="glass-card rounded-xl p-4 sm:p-5">
                            <div class="flex items-center justify-between mb-2">
                                <svg class="w-5 h-5 text-cyan-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"/></svg>
                            </div>
                            <p class="text-2xl sm:text-3xl font-bold text-white">7</p>
                            <p class="text-[11px] sm:text-xs text-dark-400 mt-1">Bookmarked Videos</p>
                        </div>
                        <div class="glass-card rounded-xl p-4 sm:p-5">
                            <div class="flex items-center justify-between mb-2">
                                <svg class="w-5 h-5 text-orange-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                            </div>
                            <p class="text-2xl sm:text-3xl font-bold text-white">12</p>
                            <p class="text-[11px] sm:text-xs text-dark-400 mt-1">Downloads</p>
                        </div>
                    </div>

                    <!-- Quick Stream -->
                    <div class="glass-card rounded-2xl p-5 sm:p-6 mb-6 sm:mb-8">
                        <h2 class="text-base sm:text-lg font-semibold text-white mb-4">Quick Stream</h2>
                        <div x-data="{ link: '', loading: false }" class="flex flex-col sm:flex-row gap-3">
                            <div class="flex-1 relative">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <svg class="w-4 h-4 text-dark-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"/></svg>
                                </div>
                                <input x-model="link" type="url" placeholder="Paste TeraBox URL here..."
                                       class="w-full pl-10 pr-4 py-3 bg-dark-800/50 border border-dark-700/50 rounded-xl text-sm text-white placeholder-dark-500 focus:outline-none focus:border-primary-500/50 focus:ring-1 focus:ring-primary-500/25 transition-all">
                            </div>
                            <button :disabled="!link" class="px-6 py-3 bg-gradient-to-r from-primary-600 to-purple-600 hover:from-primary-500 hover:to-purple-500 disabled:opacity-50 text-white font-semibold text-sm rounded-xl shadow-lg shadow-primary-500/25 transition-all whitespace-nowrap">
                                Watch Now
                            </button>
                        </div>
                    </div>


                    <!-- Recent Activity -->
                    <div class="glass-card rounded-2xl p-5 sm:p-6">
                        <div class="flex items-center justify-between mb-4">
                            <h2 class="text-base sm:text-lg font-semibold text-white">Recent Activity</h2>
                            <button @click="tab = 'history'" class="text-xs text-primary-400 hover:text-primary-300 font-medium">View All</button>
                        </div>
                        <div class="space-y-3">
                            <div class="flex items-center gap-3 p-3 bg-dark-800/30 rounded-xl">
                                <div class="w-10 h-10 bg-blue-500/10 rounded-lg flex items-center justify-center flex-shrink-0">
                                    <svg class="w-5 h-5 text-blue-400" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                                </div>
                                <div class="min-w-0 flex-1">
                                    <p class="text-sm text-white truncate">Sample_Video_1080p.mp4</p>
                                    <p class="text-xs text-dark-500">Streamed 2 hours ago &bull; 1080p</p>
                                </div>
                                <span class="text-[10px] px-2 py-0.5 bg-green-500/10 text-green-400 rounded-full">Completed</span>
                            </div>
                            <div class="flex items-center gap-3 p-3 bg-dark-800/30 rounded-xl">
                                <div class="w-10 h-10 bg-purple-500/10 rounded-lg flex items-center justify-center flex-shrink-0">
                                    <svg class="w-5 h-5 text-purple-400" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                                </div>
                                <div class="min-w-0 flex-1">
                                    <p class="text-sm text-white truncate">Tutorial_Part3_720p.mp4</p>
                                    <p class="text-xs text-dark-500">Streamed 5 hours ago &bull; 720p</p>
                                </div>
                                <span class="text-[10px] px-2 py-0.5 bg-green-500/10 text-green-400 rounded-full">Completed</span>
                            </div>
                            <div class="flex items-center gap-3 p-3 bg-dark-800/30 rounded-xl">
                                <div class="w-10 h-10 bg-orange-500/10 rounded-lg flex items-center justify-center flex-shrink-0">
                                    <svg class="w-5 h-5 text-orange-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                                </div>
                                <div class="min-w-0 flex-1">
                                    <p class="text-sm text-white truncate">Movie_Scene_HD.mp4</p>
                                    <p class="text-xs text-dark-500">Downloaded yesterday &bull; 1080p</p>
                                </div>
                                <span class="text-[10px] px-2 py-0.5 bg-blue-500/10 text-blue-400 rounded-full">Downloaded</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ===== STREAM TAB ===== -->
                <div x-show="tab === 'stream'" x-cloak>
                    <h1 class="text-xl sm:text-2xl font-bold text-white mb-6">Stream Video</h1>
                    <div class="glass-card rounded-2xl p-5 sm:p-8 max-w-3xl">
                        <p class="text-sm text-dark-400 mb-5">Paste a TeraBox sharing link below to start streaming instantly.</p>
                        <div x-data="{ link: '' }" class="space-y-4">
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <svg class="w-5 h-5 text-dark-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"/></svg>
                                </div>
                                <input x-model="link" type="url" placeholder="https://terabox.com/s/..."
                                       class="w-full pl-12 pr-4 py-4 bg-dark-800/50 border border-dark-700/50 rounded-xl text-sm text-white placeholder-dark-500 focus:outline-none focus:border-primary-500/50 focus:ring-1 focus:ring-primary-500/25 transition-all">
                            </div>
                            <div class="flex flex-col sm:flex-row gap-3">
                                <button :disabled="!link" class="flex-1 py-3 bg-gradient-to-r from-primary-600 to-purple-600 hover:from-primary-500 hover:to-purple-500 disabled:opacity-50 text-white font-semibold text-sm rounded-xl shadow-lg shadow-primary-500/25 transition-all flex items-center justify-center gap-2">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                                    Stream Now
                                </button>
                                <button :disabled="!link" class="flex-1 py-3 glass-card text-white font-semibold text-sm rounded-xl hover:bg-dark-700 disabled:opacity-50 transition-all flex items-center justify-center gap-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                                    Download
                                </button>
                            </div>
                        </div>
                        <div class="mt-6 pt-5 border-t border-dark-700/50">
                            <p class="text-xs text-dark-500 mb-2">Supported formats:</p>
                            <div class="flex flex-wrap gap-2">
                                <span class="px-2 py-1 text-[10px] glass-card rounded text-dark-300">terabox.com</span>
                                <span class="px-2 py-1 text-[10px] glass-card rounded text-dark-300">1024terabox.com</span>
                                <span class="px-2 py-1 text-[10px] glass-card rounded text-dark-300">teraboxapp.com</span>
                                <span class="px-2 py-1 text-[10px] glass-card rounded text-dark-300">teraboxshare.com</span>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- ===== HISTORY TAB ===== -->
                <div x-show="tab === 'history'" x-cloak>
                    <h1 class="text-xl sm:text-2xl font-bold text-white mb-6">Watch History</h1>
                    <div class="space-y-3">
                        <div class="glass-card rounded-xl p-4 flex items-center gap-4 hover:border-dark-600 transition-all">
                            <div class="w-16 h-12 sm:w-20 sm:h-14 bg-dark-800 rounded-lg flex items-center justify-center flex-shrink-0">
                                <svg class="w-6 h-6 text-dark-500" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                            </div>
                            <div class="min-w-0 flex-1">
                                <p class="text-sm font-medium text-white truncate">Sample_Video_1080p.mp4</p>
                                <p class="text-xs text-dark-500">1080p &bull; 45 min &bull; 2 hours ago</p>
                            </div>
                            <div class="flex items-center gap-2 flex-shrink-0">
                                <button class="p-2 text-dark-400 hover:text-primary-400 transition-colors" title="Re-watch">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                                </button>
                                <button class="p-2 text-dark-400 hover:text-red-400 transition-colors" title="Remove">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                </button>
                            </div>
                        </div>
                        <div class="glass-card rounded-xl p-4 flex items-center gap-4 hover:border-dark-600 transition-all">
                            <div class="w-16 h-12 sm:w-20 sm:h-14 bg-dark-800 rounded-lg flex items-center justify-center flex-shrink-0">
                                <svg class="w-6 h-6 text-dark-500" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                            </div>
                            <div class="min-w-0 flex-1">
                                <p class="text-sm font-medium text-white truncate">Tutorial_Part3_720p.mp4</p>
                                <p class="text-xs text-dark-500">720p &bull; 22 min &bull; 5 hours ago</p>
                            </div>
                            <div class="flex items-center gap-2 flex-shrink-0">
                                <button class="p-2 text-dark-400 hover:text-primary-400 transition-colors"><svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg></button>
                                <button class="p-2 text-dark-400 hover:text-red-400 transition-colors"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg></button>
                            </div>
                        </div>
                        <div class="glass-card rounded-xl p-4 flex items-center gap-4 hover:border-dark-600 transition-all">
                            <div class="w-16 h-12 sm:w-20 sm:h-14 bg-dark-800 rounded-lg flex items-center justify-center flex-shrink-0">
                                <svg class="w-6 h-6 text-dark-500" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                            </div>
                            <div class="min-w-0 flex-1">
                                <p class="text-sm font-medium text-white truncate">Movie_Scene_HD.mp4</p>
                                <p class="text-xs text-dark-500">1080p &bull; 1h 32min &bull; Yesterday</p>
                            </div>
                            <div class="flex items-center gap-2 flex-shrink-0">
                                <button class="p-2 text-dark-400 hover:text-primary-400 transition-colors"><svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg></button>
                                <button class="p-2 text-dark-400 hover:text-red-400 transition-colors"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg></button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ===== BOOKMARKS TAB ===== -->
                <div x-show="tab === 'bookmarks'" x-cloak>
                    <h1 class="text-xl sm:text-2xl font-bold text-white mb-6">Bookmarks</h1>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                        <div class="glass-card rounded-xl overflow-hidden hover:border-dark-600 transition-all group">
                            <div class="h-32 sm:h-36 bg-dark-800 flex items-center justify-center relative">
                                <svg class="w-10 h-10 text-dark-600" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                                <div class="absolute inset-0 bg-black/0 group-hover:bg-black/30 transition-all flex items-center justify-center opacity-0 group-hover:opacity-100">
                                    <button class="w-10 h-10 bg-primary-600 rounded-full flex items-center justify-center text-white shadow-lg"><svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg></button>
                                </div>
                                <span class="absolute bottom-2 right-2 px-1.5 py-0.5 bg-black/70 text-[10px] text-white rounded">45:12</span>
                            </div>
                            <div class="p-3">
                                <p class="text-sm font-medium text-white truncate">Sample_Video_1080p.mp4</p>
                                <p class="text-xs text-dark-500 mt-1">Saved 2 days ago &bull; 1080p</p>
                            </div>
                        </div>
                        <div class="glass-card rounded-xl overflow-hidden hover:border-dark-600 transition-all group">
                            <div class="h-32 sm:h-36 bg-dark-800 flex items-center justify-center relative">
                                <svg class="w-10 h-10 text-dark-600" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                                <div class="absolute inset-0 bg-black/0 group-hover:bg-black/30 transition-all flex items-center justify-center opacity-0 group-hover:opacity-100">
                                    <button class="w-10 h-10 bg-primary-600 rounded-full flex items-center justify-center text-white shadow-lg"><svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg></button>
                                </div>
                                <span class="absolute bottom-2 right-2 px-1.5 py-0.5 bg-black/70 text-[10px] text-white rounded">1:32:05</span>
                            </div>
                            <div class="p-3">
                                <p class="text-sm font-medium text-white truncate">Movie_Scene_HD.mp4</p>
                                <p class="text-xs text-dark-500 mt-1">Saved 3 days ago &bull; 1080p</p>
                            </div>
                        </div>
                        <div class="glass-card rounded-xl overflow-hidden hover:border-dark-600 transition-all group">
                            <div class="h-32 sm:h-36 bg-dark-800 flex items-center justify-center relative">
                                <svg class="w-10 h-10 text-dark-600" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                                <div class="absolute inset-0 bg-black/0 group-hover:bg-black/30 transition-all flex items-center justify-center opacity-0 group-hover:opacity-100">
                                    <button class="w-10 h-10 bg-primary-600 rounded-full flex items-center justify-center text-white shadow-lg"><svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg></button>
                                </div>
                                <span class="absolute bottom-2 right-2 px-1.5 py-0.5 bg-black/70 text-[10px] text-white rounded">22:30</span>
                            </div>
                            <div class="p-3">
                                <p class="text-sm font-medium text-white truncate">Tutorial_Episode_5.mp4</p>
                                <p class="text-xs text-dark-500 mt-1">Saved 5 days ago &bull; 720p</p>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- ===== SETTINGS TAB ===== -->
                <div x-show="tab === 'settings'" x-cloak>
                    <h1 class="text-xl sm:text-2xl font-bold text-white mb-6">Account Settings</h1>
                    <div class="max-w-2xl space-y-6">
                        <!-- Profile -->
                        <div class="glass-card rounded-2xl p-5 sm:p-6">
                            <h2 class="text-base font-semibold text-white mb-4">Profile Information</h2>
                            <form class="space-y-4">
                                <div>
                                    <label class="block text-xs sm:text-sm font-medium text-dark-300 mb-1.5">Full Name</label>
                                    <input type="text" value="{{ Auth::user()->name }}" class="w-full px-4 py-2.5 bg-dark-800/50 border border-dark-700/50 rounded-xl text-sm text-white focus:outline-none focus:border-primary-500/50 transition-all">
                                </div>
                                <div>
                                    <label class="block text-xs sm:text-sm font-medium text-dark-300 mb-1.5">Email</label>
                                    <input type="email" value="{{ Auth::user()->email }}" class="w-full px-4 py-2.5 bg-dark-800/50 border border-dark-700/50 rounded-xl text-sm text-white focus:outline-none focus:border-primary-500/50 transition-all">
                                </div>
                                <button type="button" class="px-5 py-2.5 bg-primary-600 hover:bg-primary-500 text-white text-sm font-semibold rounded-xl transition-colors">Save Changes</button>
                            </form>
                        </div>

                        <!-- Password -->
                        <div class="glass-card rounded-2xl p-5 sm:p-6">
                            <h2 class="text-base font-semibold text-white mb-4">Change Password</h2>
                            <form class="space-y-4">
                                <div>
                                    <label class="block text-xs sm:text-sm font-medium text-dark-300 mb-1.5">Current Password</label>
                                    <input type="password" placeholder="Enter current password" class="w-full px-4 py-2.5 bg-dark-800/50 border border-dark-700/50 rounded-xl text-sm text-white placeholder-dark-500 focus:outline-none focus:border-primary-500/50 transition-all">
                                </div>
                                <div>
                                    <label class="block text-xs sm:text-sm font-medium text-dark-300 mb-1.5">New Password</label>
                                    <input type="password" placeholder="Enter new password" class="w-full px-4 py-2.5 bg-dark-800/50 border border-dark-700/50 rounded-xl text-sm text-white placeholder-dark-500 focus:outline-none focus:border-primary-500/50 transition-all">
                                </div>
                                <button type="button" class="px-5 py-2.5 bg-primary-600 hover:bg-primary-500 text-white text-sm font-semibold rounded-xl transition-colors">Update Password</button>
                            </form>
                        </div>

                        <!-- Plan -->
                        <div class="glass-card rounded-2xl p-5 sm:p-6">
                            <div class="flex items-center justify-between mb-4">
                                <h2 class="text-base font-semibold text-white">Current Plan</h2>
                                <span class="px-3 py-1 text-xs font-semibold bg-dark-700 text-dark-200 rounded-full">Free</span>
                            </div>
                            <p class="text-sm text-dark-400 mb-4">You're on the Free plan with 15 daily streams. Upgrade to Pro for unlimited access.</p>
                            <a href="/#pricing" class="inline-block px-5 py-2.5 bg-gradient-to-r from-primary-600 to-purple-600 hover:from-primary-500 hover:to-purple-500 text-white text-sm font-semibold rounded-xl shadow-lg shadow-primary-500/25 transition-all">Upgrade to Pro</a>
                        </div>

                        <!-- Danger Zone -->
                        <div class="glass-card rounded-2xl p-5 sm:p-6 border-red-500/10">
                            <h2 class="text-base font-semibold text-red-400 mb-2">Danger Zone</h2>
                            <p class="text-xs text-dark-400 mb-4">Once you delete your account, there is no going back.</p>
                            <button type="button" class="px-5 py-2.5 bg-red-500/10 hover:bg-red-500/20 text-red-400 text-sm font-semibold rounded-xl border border-red-500/20 transition-colors">Delete Account</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
