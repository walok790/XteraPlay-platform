@extends('layouts.app')

@section('title', 'My Bookmarks - XteraPlay')

@section('content')
<div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <!-- Header -->
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-white">My Bookmarks</h1>
    </div>

    <!-- Empty State -->
    <div class="bg-[#1a1a1f] border border-[#2a2a30] rounded-2xl p-12 text-center">
        <div class="w-16 h-16 bg-[#2a2a30] rounded-full flex items-center justify-center mx-auto mb-4">
            <svg class="w-8 h-8 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"/>
            </svg>
        </div>
        <h3 class="text-lg font-semibold text-white mb-2">No bookmarks yet</h3>
        <p class="text-gray-400 text-sm mb-6">Start bookmarking videos to see them here</p>
        <a href="{{ url('/home') }}" class="inline-flex items-center px-5 py-2.5 bg-gradient-to-r from-indigo-500 to-violet-600 text-white text-sm font-medium rounded-lg hover:from-indigo-600 hover:to-violet-700 transition">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
            </svg>
            Search Videos
        </a>
    </div>
</div>
@endsection
