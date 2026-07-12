@extends('layouts.app')

@section('title', 'Watch History - XteraPlay')

@section('content')
<div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-6 sm:py-8 md:py-10">
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 mb-6 sm:mb-8">
        <div>
            <h1 class="text-2xl sm:text-3xl font-bold text-slate-900">Watch History</h1>
            <p class="text-sm text-slate-600 mt-1">Videos you've watched recently.</p>
        </div>
        <button class="px-4 py-2 bg-white hover:bg-slate-50 border border-slate-300 text-slate-700 text-sm font-medium rounded-lg transition self-start sm:self-auto">Clear All</button>
    </div>

    <div class="bg-white border border-slate-200 rounded-2xl p-8 sm:p-12 md:p-16 text-center">
        <div class="w-16 h-16 bg-violet-50 rounded-full flex items-center justify-center mx-auto mb-4">
            <svg class="w-8 h-8 text-violet-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
        </div>
        <h3 class="text-lg font-semibold text-slate-900 mb-2">No watch history</h3>
        <p class="text-sm text-slate-600 mb-6 max-w-xs mx-auto">Videos you watch will appear here so you can quickly access them.</p>
        <a href="{{ url('/home') }}" class="inline-flex items-center gap-2 px-5 py-2.5 bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold rounded-lg shadow-sm shadow-blue-500/25 transition">
            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path d="M6.3 2.841A1.5 1.5 0 004 4.11V15.89a1.5 1.5 0 002.3 1.269l9.344-5.89a1.5 1.5 0 000-2.538L6.3 2.84z"/></svg>
            Start Watching
        </a>
    </div>
</div>
@endsection
