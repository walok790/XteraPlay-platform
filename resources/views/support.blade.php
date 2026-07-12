@extends('layouts.app')

@section('title', 'Support - XteraPlay')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12" x-data="{ showForm: false }">
    <!-- Header -->
    <div class="flex items-center justify-between mb-8">
        <h1 class="text-3xl font-bold text-white">Support Tickets</h1>
        <button @click="showForm = !showForm" class="px-5 py-2.5 bg-gradient-to-r from-indigo-500 to-violet-600 text-white text-sm font-medium rounded-lg hover:from-indigo-600 hover:to-violet-700 transition">
            <span x-show="!showForm">New Ticket</span>
            <span x-show="showForm" style="display: none;">Cancel</span>
        </button>
    </div>


    <!-- New Ticket Form -->
    <div x-show="showForm" x-transition class="bg-[#1a1a1f] border border-[#2a2a30] rounded-2xl p-6 mb-8" style="display: none;">
        <h3 class="text-lg font-semibold text-white mb-4">Create New Ticket</h3>
        <form class="space-y-4">
            <div>
                <label class="block text-sm text-gray-400 mb-2">Subject</label>
                <input type="text" placeholder="Brief description of your issue" class="w-full px-4 py-3 bg-[#111113] border border-[#2a2a30] rounded-lg text-white text-sm placeholder-gray-500 focus:outline-none focus:border-indigo-500 transition">
            </div>
            <div>
                <label class="block text-sm text-gray-400 mb-2">Category</label>
                <select class="w-full px-4 py-3 bg-[#111113] border border-[#2a2a30] rounded-lg text-white text-sm focus:outline-none focus:border-indigo-500 transition">
                    <option value="" class="bg-[#111113]">Select a category</option>
                    <option value="bug" class="bg-[#111113]">Bug</option>
                    <option value="feature" class="bg-[#111113]">Feature Request</option>
                    <option value="account" class="bg-[#111113]">Account</option>
                    <option value="billing" class="bg-[#111113]">Billing</option>
                    <option value="other" class="bg-[#111113]">Other</option>
                </select>
            </div>
            <div>
                <label class="block text-sm text-gray-400 mb-2">Message</label>
                <textarea rows="4" placeholder="Describe your issue in detail..." class="w-full px-4 py-3 bg-[#111113] border border-[#2a2a30] rounded-lg text-white text-sm placeholder-gray-500 focus:outline-none focus:border-indigo-500 transition resize-none"></textarea>
            </div>
            <button type="submit" class="px-6 py-2.5 bg-gradient-to-r from-indigo-500 to-violet-600 text-white text-sm font-medium rounded-lg hover:from-indigo-600 hover:to-violet-700 transition">
                Submit Ticket
            </button>
        </form>
    </div>


    <!-- Ticket List -->
    <div class="space-y-4">
        <!-- Sample Ticket 1 -->
        <div class="bg-[#1a1a1f] border border-[#2a2a30] rounded-xl p-5">
            <div class="flex items-center justify-between mb-2">
                <h4 class="text-sm font-medium text-white">Video not loading after paste</h4>
                <span class="px-2.5 py-1 bg-amber-500/10 text-amber-400 text-xs font-medium rounded-full">Pending</span>
            </div>
            <p class="text-xs text-gray-400 mb-3">I pasted a valid TeraBox link but the video player shows a blank screen...</p>
            <div class="flex items-center space-x-4 text-xs text-gray-500">
                <span>Category: Bug</span>
                <span>Created: Jan 12, 2025</span>
            </div>
        </div>

        <!-- Sample Ticket 2 -->
        <div class="bg-[#1a1a1f] border border-[#2a2a30] rounded-xl p-5">
            <div class="flex items-center justify-between mb-2">
                <h4 class="text-sm font-medium text-white">Request: Dark mode toggle</h4>
                <span class="px-2.5 py-1 bg-green-500/10 text-green-400 text-xs font-medium rounded-full">Resolved</span>
            </div>
            <p class="text-xs text-gray-400 mb-3">Would be great to have a light/dark mode toggle option in settings...</p>
            <div class="flex items-center space-x-4 text-xs text-gray-500">
                <span>Category: Feature Request</span>
                <span>Created: Jan 8, 2025</span>
            </div>
        </div>
    </div>
</div>
@endsection
