@extends('layouts.app')

@section('title', 'Watch History - XteraPlay')

@section('content')
<div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <!-- Header -->
    <div class="flex items-center justify-between mb-8">
        <h1 class="text-3xl font-bold text-white">Watch History</h1>
        <button class="px-4 py-2 bg-[#1a1a1f] border border-[#2a2a30] text-gray-300 text-sm font-medium rounded-lg hover:bg-[#2a2a30] hover:text-white transition">
            Clear All
        </button>
    </div>

    <!-- Empty State -->
    <div class="bg-[#1a1a1f] border border-[#2a2a30] rounded-2xl p-12 text-center">
        <div class="w-16 h-16 bg-[#2a2a30] rounded-full flex items-center justify-center mx-auto mb-4">
            <svg class="w-8 h-8 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
        </div>
        <h3 class="text-lg font-semibold text-white mb-2">No watch history</h3>
        <p class="text-gray-400 text-sm">Videos you watch will appear here</p>
    </div>
</div>
@endsection
