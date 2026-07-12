@extends('layouts.app')

@section('title', 'Home - XteraPlay')

@section('content')
<div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-6 sm:py-8 md:py-10 space-y-4 sm:space-y-6">

    <!-- Terabox Search Card -->
    <div class="bg-white border border-slate-200 rounded-2xl p-5 sm:p-7 md:p-8">
        <div class="flex flex-col sm:flex-row sm:items-start sm:justify-between gap-3 mb-4 sm:mb-5">
            <div>
                <h1 class="text-xl sm:text-2xl font-bold text-slate-900">Terabox Search</h1>
                <p class="text-sm text-slate-600 mt-0.5">Paste a link to stream or download</p>
            </div>
            <span class="inline-flex items-center gap-2 px-3 py-1.5 bg-blue-50 border border-blue-100 rounded-full self-start">
                <span class="text-xs font-medium text-slate-600">Daily Credits</span>
                <span class="text-xs font-bold text-blue-600">5/5</span>
            </span>
        </div>
        <div class="flex flex-col sm:flex-row gap-2 sm:gap-3">
            <div class="flex-1 relative">
                <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.83 10.17a4 4 0 00-5.66 0l-4 4a4 4 0 105.66 5.66l1.1-1.1m-.76-4.9a4 4 0 005.66 0l4-4a4 4 0 00-5.66-5.66l-1.1 1.1"/></svg>
                <input type="text" placeholder="Paste Terabox link here..." class="w-full pl-10 pr-3 py-3 bg-white border border-slate-300 rounded-lg text-sm text-slate-900 placeholder-slate-400 focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100 transition">
            </div>
            <button class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold rounded-lg shadow-sm shadow-blue-500/25 transition whitespace-nowrap flex items-center justify-center gap-1.5">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path d="M6.3 2.841A1.5 1.5 0 004 4.11V15.89a1.5 1.5 0 002.3 1.269l9.344-5.89a1.5 1.5 0 000-2.538L6.3 2.84z"/></svg>
                Watch Now
            </button>
        </div>
    </div>

    <!-- Your Stats -->
    <div class="grid grid-cols-3 gap-3 sm:gap-4">
        <div class="bg-white border border-slate-200 rounded-2xl p-4 sm:p-5">
            <div class="flex items-center gap-3">
                <div class="w-9 h-9 sm:w-10 sm:h-10 bg-blue-50 rounded-lg flex items-center justify-center flex-shrink-0">
                    <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.75 11.17l-3.2-2.13A1 1 0 0010 9.87v4.26a1 1 0 001.55.83l3.2-2.13a1 1 0 000-1.66z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
                <div class="min-w-0">
                    <p class="text-lg sm:text-2xl font-bold text-slate-900">0</p>
                    <p class="text-xs text-slate-500">Watched</p>
                </div>
            </div>
        </div>
        <div class="bg-white border border-slate-200 rounded-2xl p-4 sm:p-5">
            <div class="flex items-center gap-3">
                <div class="w-9 h-9 sm:w-10 sm:h-10 bg-emerald-50 rounded-lg flex items-center justify-center flex-shrink-0">
                    <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                </div>
                <div class="min-w-0">
                    <p class="text-lg sm:text-2xl font-bold text-slate-900">0</p>
                    <p class="text-xs text-slate-500">Downloads</p>
                </div>
            </div>
        </div>
        <div class="bg-white border border-slate-200 rounded-2xl p-4 sm:p-5">
            <div class="flex items-center gap-3">
                <div class="w-9 h-9 sm:w-10 sm:h-10 bg-violet-50 rounded-lg flex items-center justify-center flex-shrink-0">
                    <svg class="w-5 h-5 text-violet-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                </div>
                <div class="min-w-0">
                    <p class="text-lg sm:text-2xl font-bold text-slate-900">0</p>
                    <p class="text-xs text-slate-500">Searches</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Recently Watched -->
    <div class="bg-white border border-slate-200 rounded-2xl p-5 sm:p-6">
        <h3 class="text-base sm:text-lg font-semibold text-slate-900 mb-4">Recently Watched</h3>
        <div class="text-center py-8">
            <div class="w-12 h-12 bg-slate-100 rounded-full flex items-center justify-center mx-auto mb-3">
                <svg class="w-6 h-6 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M14.75 11.17l-3.2-2.13A1 1 0 0010 9.87v4.26a1 1 0 001.55.83l3.2-2.13a1 1 0 000-1.66z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            </div>
            <p class="text-sm font-medium text-slate-700">No videos watched yet</p>
            <p class="text-xs text-slate-500 mt-1">Your recently watched videos will appear here</p>
        </div>
    </div>

    <!-- Feedback -->
    <div class="bg-white border border-slate-200 rounded-2xl p-5 sm:p-6" x-data="{ rating: 0, hover: 0 }">
        <h3 class="text-base sm:text-lg font-semibold text-slate-900 mb-1">Share Your Feedback</h3>
        <p class="text-sm text-slate-600 mb-4">Help us improve XteraPlay</p>
        <form class="space-y-4">
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-2">Rating</label>
                <div class="flex items-center gap-1">
                    <template x-for="star in 5" :key="star">
                        <button type="button" @click="rating = star" @mouseenter="hover = star" @mouseleave="hover = 0" class="focus:outline-none">
                            <svg class="w-7 h-7 sm:w-8 sm:h-8 transition" :class="(hover >= star || rating >= star) ? 'text-amber-400' : 'text-slate-300'" fill="currentColor" viewBox="0 0 20 20"><path d="M9.05 2.93c.3-.92 1.6-.92 1.9 0l1.07 3.29a1 1 0 00.95.69h3.46c.97 0 1.37 1.24.59 1.81l-2.8 2.03a1 1 0 00-.37 1.12l1.07 3.29c.3.92-.75 1.69-1.54 1.12l-2.8-2.03a1 1 0 00-1.17 0l-2.8 2.03c-.78.57-1.84-.2-1.54-1.12l1.07-3.29a1 1 0 00-.37-1.12L2.98 8.72c-.78-.57-.38-1.81.59-1.81h3.46a1 1 0 00.95-.69l1.07-3.29z"/></svg>
                        </button>
                    </template>
                </div>
            </div>
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-2">Message</label>
                <textarea rows="3" placeholder="Tell us what you think..." class="w-full px-3 py-2.5 bg-white border border-slate-300 rounded-lg text-sm text-slate-900 placeholder-slate-400 focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100 transition resize-none"></textarea>
            </div>
            <button type="submit" class="px-6 py-2.5 bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold rounded-lg shadow-sm shadow-blue-500/25 transition">Submit Feedback</button>
        </form>
    </div>

    <!-- Announcements -->
    <div class="bg-white border border-slate-200 rounded-2xl p-5 sm:p-6">
        <h3 class="text-base sm:text-lg font-semibold text-slate-900 mb-4">Latest Announcements</h3>
        <div class="space-y-4">
            <div class="pb-4 border-b border-slate-100">
                <div class="flex items-center gap-2 mb-1">
                    <span class="text-xs text-slate-500">Jan 15, 2025</span>
                    <span class="w-1 h-1 bg-slate-400 rounded-full"></span>
                    <span class="px-2 py-0.5 bg-blue-50 text-blue-700 text-xs font-medium rounded-full">New Feature</span>
                </div>
                <h4 class="text-sm font-semibold text-slate-900 mb-1">Batch Downloads Now Available</h4>
                <p class="text-sm text-slate-600 leading-relaxed">Pro users can now download multiple files at once from their dashboard.</p>
            </div>
            <div class="pb-4 border-b border-slate-100">
                <div class="flex items-center gap-2 mb-1">
                    <span class="text-xs text-slate-500">Jan 10, 2025</span>
                    <span class="w-1 h-1 bg-slate-400 rounded-full"></span>
                    <span class="px-2 py-0.5 bg-emerald-50 text-emerald-700 text-xs font-medium rounded-full">Improvement</span>
                </div>
                <h4 class="text-sm font-semibold text-slate-900 mb-1">Faster Streaming Speeds</h4>
                <p class="text-sm text-slate-600 leading-relaxed">We've upgraded our servers for 2× faster streaming on all plans.</p>
            </div>
            <div>
                <div class="flex items-center gap-2 mb-1">
                    <span class="text-xs text-slate-500">Jan 5, 2025</span>
                    <span class="w-1 h-1 bg-slate-400 rounded-full"></span>
                    <span class="px-2 py-0.5 bg-amber-50 text-amber-700 text-xs font-medium rounded-full">Notice</span>
                </div>
                <h4 class="text-sm font-semibold text-slate-900 mb-1">Scheduled Maintenance</h4>
                <p class="text-sm text-slate-600 leading-relaxed">Brief maintenance on Jan 20th from 2–4 AM UTC.</p>
            </div>
        </div>
    </div>

</div>
@endsection
