@extends('layouts.app')

@section('title', 'Support - XteraPlay')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-6 sm:py-8 md:py-10" x-data="{ showForm: false }">
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 mb-6 sm:mb-8">
        <div>
            <h1 class="text-2xl sm:text-3xl font-bold text-slate-900">Support Tickets</h1>
            <p class="text-sm text-slate-600 mt-1">Get help from our team.</p>
        </div>
        <button @click="showForm = !showForm" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-lg shadow-sm shadow-blue-500/25 transition self-start sm:self-auto flex items-center gap-1.5">
            <svg class="w-4 h-4" x-show="!showForm" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            <svg class="w-4 h-4" x-show="showForm" x-cloak fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            <span x-text="showForm ? 'Cancel' : 'New Ticket'"></span>
        </button>
    </div>

    <!-- New Ticket Form -->
    <div x-show="showForm" x-cloak x-transition class="bg-white border border-slate-200 rounded-2xl p-5 sm:p-6 mb-6">
        <h3 class="text-base sm:text-lg font-semibold text-slate-900 mb-4">Create New Ticket</h3>
        <form class="space-y-4">
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1.5">Subject</label>
                <input type="text" placeholder="Brief description of your issue" class="w-full px-3 py-2.5 bg-white border border-slate-300 rounded-lg text-sm text-slate-900 placeholder-slate-400 focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100 transition">
            </div>
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1.5">Category</label>
                <select class="w-full px-3 py-2.5 bg-white border border-slate-300 rounded-lg text-sm text-slate-900 focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100 transition">
                    <option>Select a category</option>
                    <option>Bug Report</option>
                    <option>Feature Request</option>
                    <option>Account</option>
                    <option>Billing</option>
                    <option>Other</option>
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1.5">Message</label>
                <textarea rows="4" placeholder="Describe your issue in detail..." class="w-full px-3 py-2.5 bg-white border border-slate-300 rounded-lg text-sm text-slate-900 placeholder-slate-400 focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100 transition resize-none"></textarea>
            </div>
            <button type="submit" class="px-5 py-2.5 bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold rounded-lg shadow-sm shadow-blue-500/25 transition">Submit Ticket</button>
        </form>
    </div>

    <!-- Ticket List -->
    <div class="space-y-3 sm:space-y-4">
        <div class="bg-white border border-slate-200 rounded-2xl p-5 hover:shadow-md transition">
            <div class="flex items-start justify-between gap-3 mb-2">
                <h4 class="text-sm sm:text-base font-semibold text-slate-900">Video not loading after paste</h4>
                <span class="px-2.5 py-1 bg-amber-100 text-amber-700 text-xs font-medium rounded-full whitespace-nowrap">Pending</span>
            </div>
            <p class="text-sm text-slate-600 mb-3">I pasted a valid TeraBox link but the video player shows a blank screen. Tried multiple browsers...</p>
            <div class="flex items-center gap-3 text-xs text-slate-500">
                <span>Bug Report</span>
                <span class="w-1 h-1 bg-slate-400 rounded-full"></span>
                <span>Jan 12, 2025</span>
            </div>
        </div>
        <div class="bg-white border border-slate-200 rounded-2xl p-5 hover:shadow-md transition">
            <div class="flex items-start justify-between gap-3 mb-2">
                <h4 class="text-sm sm:text-base font-semibold text-slate-900">Request: Dark mode toggle</h4>
                <span class="px-2.5 py-1 bg-emerald-100 text-emerald-700 text-xs font-medium rounded-full whitespace-nowrap">Resolved</span>
            </div>
            <p class="text-sm text-slate-600 mb-3">Would be great to have a light/dark mode toggle option in the settings for late-night viewing.</p>
            <div class="flex items-center gap-3 text-xs text-slate-500">
                <span>Feature Request</span>
                <span class="w-1 h-1 bg-slate-400 rounded-full"></span>
                <span>Jan 8, 2025</span>
            </div>
        </div>
    </div>
</div>
@endsection
