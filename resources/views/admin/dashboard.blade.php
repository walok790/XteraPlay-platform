@extends('admin.layouts.app')
@section('title', 'Dashboard')
@section('content')
<!-- Stats Cards -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
    <div class="bg-[#1a1a1f] border border-[#2a2a30] rounded-xl p-4">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-400 text-xs font-medium">Total Users</p>
                <p class="text-2xl font-bold text-white mt-1">1,234</p>
                <p class="text-green-400 text-xs mt-1">+12% this month</p>
            </div>
            <div class="w-10 h-10 bg-indigo-500/10 rounded-lg flex items-center justify-center">
                <svg class="w-5 h-5 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
            </div>
        </div>
    </div>
    <div class="bg-[#1a1a1f] border border-[#2a2a30] rounded-xl p-4">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-400 text-xs font-medium">Active Subscriptions</p>
                <p class="text-2xl font-bold text-white mt-1">487</p>
                <p class="text-green-400 text-xs mt-1">+8% this month</p>
            </div>
            <div class="w-10 h-10 bg-green-500/10 rounded-lg flex items-center justify-center">
                <svg class="w-5 h-5 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/></svg>
            </div>
        </div>
    </div>
    <div class="bg-[#1a1a1f] border border-[#2a2a30] rounded-xl p-4">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-400 text-xs font-medium">Revenue (Monthly)</p>
                <p class="text-2xl font-bold text-white mt-1">$4,890</p>
                <p class="text-green-400 text-xs mt-1">+15% this month</p>
            </div>
            <div class="w-10 h-10 bg-violet-500/10 rounded-lg flex items-center justify-center">
                <svg class="w-5 h-5 text-violet-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            </div>
        </div>
    </div>
    <div class="bg-[#1a1a1f] border border-[#2a2a30] rounded-xl p-4">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-400 text-xs font-medium">Open Tickets</p>
                <p class="text-2xl font-bold text-white mt-1">23</p>
                <p class="text-red-400 text-xs mt-1">5 urgent</p>
            </div>
            <div class="w-10 h-10 bg-red-500/10 rounded-lg flex items-center justify-center">
                <svg class="w-5 h-5 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
            </div>
        </div>
    </div>
</div>

<!-- Recent Activity -->
<div class="bg-[#1a1a1f] border border-[#2a2a30] rounded-xl p-4 sm:p-6">
    <h2 class="text-lg font-semibold text-white mb-4">Recent Activity</h2>
    <div class="space-y-4">
        <div class="flex items-start space-x-3">
            <div class="w-8 h-8 bg-green-500/10 rounded-full flex items-center justify-center flex-shrink-0">
                <svg class="w-4 h-4 text-green-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
            </div>
            <div>
                <p class="text-sm text-white">New user registered: <span class="text-indigo-400">john@example.com</span></p>
                <p class="text-xs text-gray-500 mt-0.5">2 minutes ago</p>
            </div>
        </div>
        <div class="flex items-start space-x-3">
            <div class="w-8 h-8 bg-violet-500/10 rounded-full flex items-center justify-center flex-shrink-0">
                <svg class="w-4 h-4 text-violet-400" fill="currentColor" viewBox="0 0 20 20"><path d="M4 4a2 2 0 00-2 2v1h16V6a2 2 0 00-2-2H4z"/><path fill-rule="evenodd" d="M18 9H2v5a2 2 0 002 2h12a2 2 0 002-2V9zM4 13a1 1 0 011-1h1a1 1 0 110 2H5a1 1 0 01-1-1zm5-1a1 1 0 100 2h1a1 1 0 100-2H9z" clip-rule="evenodd"/></svg>
            </div>
            <div>
                <p class="text-sm text-white">Subscription upgraded: <span class="text-indigo-400">sarah@example.com</span> to Premium</p>
                <p class="text-xs text-gray-500 mt-0.5">15 minutes ago</p>
            </div>
        </div>
        <div class="flex items-start space-x-3">
            <div class="w-8 h-8 bg-yellow-500/10 rounded-full flex items-center justify-center flex-shrink-0">
                <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
            </div>
            <div>
                <p class="text-sm text-white">New support ticket: <span class="text-indigo-400">#1045</span> - Payment issue</p>
                <p class="text-xs text-gray-500 mt-0.5">1 hour ago</p>
            </div>
        </div>
        <div class="flex items-start space-x-3">
            <div class="w-8 h-8 bg-indigo-500/10 rounded-full flex items-center justify-center flex-shrink-0">
                <svg class="w-4 h-4 text-indigo-400" fill="currentColor" viewBox="0 0 20 20"><path d="M2 5a2 2 0 012-2h7a2 2 0 012 2v4a2 2 0 01-2 2H9l-3 3v-3H4a2 2 0 01-2-2V5z"/></svg>
            </div>
            <div>
                <p class="text-sm text-white">New contact message from <span class="text-indigo-400">mike@example.com</span></p>
                <p class="text-xs text-gray-500 mt-0.5">3 hours ago</p>
            </div>
        </div>
    </div>
</div>
@endsection
