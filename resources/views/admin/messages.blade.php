@extends('admin.layouts.app')
@section('title', 'Messages')
@section('content')
<div class="bg-[#1a1a1f] border border-[#2a2a30] rounded-xl">
    <div class="p-4 sm:p-6 border-b border-[#2a2a30]">
        <h2 class="text-lg font-semibold text-white">Contact Form Submissions</h2>
    </div>
    <div class="divide-y divide-[#2a2a30]">
        <div class="p-4 sm:p-6 hover:bg-[#111113] transition">
            <div class="flex items-start justify-between mb-2">
                <div>
                    <h3 class="text-white font-medium text-sm">Partnership Inquiry</h3>
                    <p class="text-gray-400 text-xs">From: mike@example.com &bull; Jan 22, 2024</p>
                </div>
                <span class="px-2 py-0.5 bg-yellow-500/10 text-yellow-400 text-xs rounded-full">Unread</span>
            </div>
            <p class="text-gray-300 text-sm">Hi, I'm interested in partnering with XteraPlay for content distribution. Could we schedule a call?</p>
        </div>
        <div class="p-4 sm:p-6 hover:bg-[#111113] transition">
            <div class="flex items-start justify-between mb-2">
                <div>
                    <h3 class="text-white font-medium text-sm">Feature Request</h3>
                    <p class="text-gray-400 text-xs">From: sarah@example.com &bull; Jan 20, 2024</p>
                </div>
                <span class="px-2 py-0.5 bg-green-500/10 text-green-400 text-xs rounded-full">Read</span>
            </div>
            <p class="text-gray-300 text-sm">Would love to see a browser extension for easier downloading. Any plans for that?</p>
        </div>
        <div class="p-4 sm:p-6 hover:bg-[#111113] transition">
            <div class="flex items-start justify-between mb-2">
                <div>
                    <h3 class="text-white font-medium text-sm">Bug Report</h3>
                    <p class="text-gray-400 text-xs">From: john@example.com &bull; Jan 19, 2024</p>
                </div>
                <span class="px-2 py-0.5 bg-green-500/10 text-green-400 text-xs rounded-full">Read</span>
            </div>
            <p class="text-gray-300 text-sm">I found an issue where the progress bar shows 100% but the file isn't actually complete.</p>
        </div>
        <div class="p-4 sm:p-6 hover:bg-[#111113] transition">
            <div class="flex items-start justify-between mb-2">
                <div>
                    <h3 class="text-white font-medium text-sm">Billing Question</h3>
                    <p class="text-gray-400 text-xs">From: emily@example.com &bull; Jan 17, 2024</p>
                </div>
                <span class="px-2 py-0.5 bg-green-500/10 text-green-400 text-xs rounded-full">Replied</span>
            </div>
            <p class="text-gray-300 text-sm">Can I get a refund for my last payment? I was charged twice for some reason.</p>
        </div>
    </div>
</div>
@endsection
