@extends('layouts.app')

@section('title', 'Home - XteraPlay')

@section('content')
<div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-12 space-y-8">

    <!-- TeraBox Search Section -->
    <div class="bg-[#1a1a1f] border border-[#2a2a30] rounded-2xl p-8">
        <div class="flex items-center justify-between mb-2">
            <h2 class="text-2xl font-bold text-white">Terabox Search</h2>
            <span class="px-3 py-1 bg-indigo-500/10 border border-indigo-500/30 text-indigo-400 text-xs font-medium rounded-full">Daily Credits: 5/5</span>
        </div>
        <p class="text-gray-400 text-sm mb-6">Paste a link to stream or download</p>
        <div class="flex items-center space-x-3">
            <input type="text" placeholder="Paste TeraBox link here..." class="flex-1 px-5 py-4 bg-[#111113] border border-[#2a2a30] rounded-xl text-white text-sm placeholder-gray-500 focus:outline-none focus:border-indigo-500 transition">
            <button class="px-8 py-4 bg-gradient-to-r from-indigo-500 to-violet-600 text-white text-sm font-semibold rounded-xl hover:from-indigo-600 hover:to-violet-700 transition whitespace-nowrap">
                Watch Now
            </button>
        </div>
    </div>


    <!-- Your Stats -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <div class="bg-[#1a1a1f] border border-[#2a2a30] rounded-xl p-5">
            <div class="flex items-center space-x-3">
                <div class="w-10 h-10 bg-indigo-500/10 rounded-lg flex items-center justify-center">
                    <svg class="w-5 h-5 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <div>
                    <p class="text-2xl font-bold text-white">0</p>
                    <p class="text-xs text-gray-500">Videos Watched</p>
                </div>
            </div>
        </div>
        <div class="bg-[#1a1a1f] border border-[#2a2a30] rounded-xl p-5">
            <div class="flex items-center space-x-3">
                <div class="w-10 h-10 bg-green-500/10 rounded-lg flex items-center justify-center">
                    <svg class="w-5 h-5 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                    </svg>
                </div>
                <div>
                    <p class="text-2xl font-bold text-white">0</p>
                    <p class="text-xs text-gray-500">Downloads</p>
                </div>
            </div>
        </div>
        <div class="bg-[#1a1a1f] border border-[#2a2a30] rounded-xl p-5">
            <div class="flex items-center space-x-3">
                <div class="w-10 h-10 bg-violet-500/10 rounded-lg flex items-center justify-center">
                    <svg class="w-5 h-5 text-violet-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                </div>
                <div>
                    <p class="text-2xl font-bold text-white">0</p>
                    <p class="text-xs text-gray-500">Today's Searches</p>
                </div>
            </div>
        </div>
    </div>


    <!-- Recent Watch -->
    <div class="bg-[#1a1a1f] border border-[#2a2a30] rounded-2xl p-6">
        <h3 class="text-lg font-semibold text-white mb-4">Recently Watched</h3>
        <div class="text-center py-8">
            <div class="w-12 h-12 bg-[#2a2a30] rounded-full flex items-center justify-center mx-auto mb-3">
                <svg class="w-6 h-6 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
            <p class="text-gray-400 text-sm">No videos watched yet</p>
            <p class="text-gray-500 text-xs mt-1">Your recently watched videos will appear here</p>
        </div>
    </div>


    <!-- Feedback Form -->
    <div class="bg-[#1a1a1f] border border-[#2a2a30] rounded-2xl p-6" x-data="{ rating: 0, hoverRating: 0 }">
        <h3 class="text-lg font-semibold text-white mb-4">Share Your Feedback</h3>
        <form>
            <!-- Star Rating -->
            <div class="mb-4">
                <label class="block text-sm text-gray-400 mb-2">Rating</label>
                <div class="flex items-center space-x-1">
                    <template x-for="star in 5" :key="star">
                        <button type="button" @click="rating = star" @mouseenter="hoverRating = star" @mouseleave="hoverRating = 0" class="focus:outline-none">
                            <svg class="w-8 h-8 transition" :class="(hoverRating >= star || rating >= star) ? 'text-yellow-400' : 'text-gray-600'" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                            </svg>
                        </button>
                    </template>
                </div>
            </div>
            <!-- Message -->
            <div class="mb-4">
                <label class="block text-sm text-gray-400 mb-2">Message</label>
                <textarea rows="3" placeholder="Tell us what you think..." class="w-full px-4 py-3 bg-[#111113] border border-[#2a2a30] rounded-lg text-white text-sm placeholder-gray-500 focus:outline-none focus:border-indigo-500 transition resize-none"></textarea>
            </div>
            <button type="submit" class="px-6 py-2.5 bg-gradient-to-r from-indigo-500 to-violet-600 text-white text-sm font-medium rounded-lg hover:from-indigo-600 hover:to-violet-700 transition">
                Submit Feedback
            </button>
        </form>
    </div>


    <!-- Latest Announcements -->
    <div class="bg-[#1a1a1f] border border-[#2a2a30] rounded-2xl p-6">
        <h3 class="text-lg font-semibold text-white mb-4">Latest Announcements</h3>
        <div class="space-y-4">
            <div class="border-b border-[#2a2a30] pb-4">
                <div class="flex items-center space-x-2 mb-1">
                    <span class="text-xs text-gray-500">Jan 15, 2025</span>
                    <span class="w-1 h-1 bg-gray-600 rounded-full"></span>
                    <span class="text-xs text-indigo-400">New Feature</span>
                </div>
                <h4 class="text-sm font-medium text-white mb-1">Batch Downloads Now Available</h4>
                <p class="text-xs text-gray-400">Pro and Enterprise users can now download multiple files at once. Check out the new batch download feature in your dashboard.</p>
            </div>
            <div class="border-b border-[#2a2a30] pb-4">
                <div class="flex items-center space-x-2 mb-1">
                    <span class="text-xs text-gray-500">Jan 10, 2025</span>
                    <span class="w-1 h-1 bg-gray-600 rounded-full"></span>
                    <span class="text-xs text-green-400">Improvement</span>
                </div>
                <h4 class="text-sm font-medium text-white mb-1">Faster Streaming Speeds</h4>
                <p class="text-xs text-gray-400">We've upgraded our servers for 2x faster streaming. Enjoy buffer-free playback on all plans.</p>
            </div>
            <div>
                <div class="flex items-center space-x-2 mb-1">
                    <span class="text-xs text-gray-500">Jan 5, 2025</span>
                    <span class="w-1 h-1 bg-gray-600 rounded-full"></span>
                    <span class="text-xs text-amber-400">Notice</span>
                </div>
                <h4 class="text-sm font-medium text-white mb-1">Scheduled Maintenance</h4>
                <p class="text-xs text-gray-400">Brief maintenance window on Jan 20th from 2-4 AM UTC. Service may be temporarily unavailable.</p>
            </div>
        </div>
    </div>

</div>
@endsection
