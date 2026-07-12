@extends('admin.layouts.app')
@section('title', 'Dashboard')

@section('content')
<div class="mb-6">
    <h2 class="text-xl sm:text-2xl font-bold text-slate-900">Overview</h2>
    <p class="text-sm text-slate-600 mt-1">Welcome back — here's what's happening today.</p>
</div>

<div class="grid grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-4 mb-6">
    <a href="{{ url('/admin/users') }}" class="bg-white border border-slate-200 hover:border-blue-300 hover:shadow-md rounded-2xl p-4 sm:p-5 transition">
        <div class="w-10 h-10 bg-blue-50 rounded-xl flex items-center justify-center mb-3">
            <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
        </div>
        <p class="text-2xl sm:text-3xl font-bold text-slate-900">{{ number_format($stats['total_users']) }}</p>
        <p class="text-xs text-slate-500 mt-1">Total Users</p>
    </a>
    <a href="{{ url('/admin/subscriptions') }}" class="bg-white border border-slate-200 hover:border-emerald-300 hover:shadow-md rounded-2xl p-4 sm:p-5 transition">
        <div class="w-10 h-10 bg-emerald-50 rounded-xl flex items-center justify-center mb-3">
            <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/></svg>
        </div>
        <p class="text-2xl sm:text-3xl font-bold text-slate-900">{{ number_format($stats['active_subs']) }}</p>
        <p class="text-xs text-slate-500 mt-1">Active Subscriptions</p>
    </a>
    <div class="bg-white border border-slate-200 rounded-2xl p-4 sm:p-5">
        <div class="w-10 h-10 bg-violet-50 rounded-xl flex items-center justify-center mb-3">
            <svg class="w-5 h-5 text-violet-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.66 0-3 .9-3 2s1.34 2 3 2 3 .9 3 2-1.34 2-3 2m0-8c1.11 0 2.08.4 2.6 1M12 8V7m0 1v8"/></svg>
        </div>
        <p class="text-2xl sm:text-3xl font-bold text-slate-900">${{ number_format($stats['revenue_mtd'], 2) }}</p>
        <p class="text-xs text-slate-500 mt-1">Revenue (MTD)</p>
    </div>
    <a href="{{ url('/admin/support') }}" class="bg-white border border-slate-200 hover:border-amber-300 hover:shadow-md rounded-2xl p-4 sm:p-5 transition">
        <div class="w-10 h-10 bg-amber-50 rounded-xl flex items-center justify-center mb-3">
            <svg class="w-5 h-5 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.36 5.64l-3.53 3.53m0 5.66l3.53 3.53M9.17 9.17L5.64 5.64m3.53 9.19l-3.53 3.53M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
        </div>
        <p class="text-2xl sm:text-3xl font-bold text-slate-900">{{ $stats['open_tickets'] }}</p>
        <p class="text-xs text-slate-500 mt-1">Open Tickets</p>
    </a>
</div>

<!-- Action Required -->
@if($stats['pending_reviews'] > 0 || $stats['unread_messages'] > 0)
<div class="bg-blue-50 border border-blue-200 rounded-2xl p-4 sm:p-5 mb-6">
    <div class="flex items-start gap-3">
        <div class="w-9 h-9 bg-blue-100 rounded-full flex items-center justify-center flex-shrink-0">
            <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
        </div>
        <div class="flex-1">
            <p class="text-sm font-semibold text-blue-900">Action Required</p>
            <div class="flex flex-wrap gap-4 mt-2 text-sm">
                @if($stats['pending_reviews'] > 0)
                    <a href="{{ url('/admin/reviews?filter=pending') }}" class="text-blue-700 hover:text-blue-900 font-medium">
                        📝 {{ $stats['pending_reviews'] }} pending review{{ $stats['pending_reviews'] > 1 ? 's' : '' }} to approve →
                    </a>
                @endif
                @if($stats['unread_messages'] > 0)
                    <a href="{{ url('/admin/messages?filter=unread') }}" class="text-blue-700 hover:text-blue-900 font-medium">
                        ✉️ {{ $stats['unread_messages'] }} unread message{{ $stats['unread_messages'] > 1 ? 's' : '' }} →
                    </a>
                @endif
            </div>
        </div>
    </div>
</div>
@endif

<div class="grid grid-cols-1 lg:grid-cols-3 gap-4 sm:gap-6">
    <div class="lg:col-span-2 bg-white border border-slate-200 rounded-2xl p-5 sm:p-6">
        <div class="flex items-center justify-between mb-4">
            <h3 class="text-base sm:text-lg font-semibold text-slate-900">Recent Signups</h3>
            <a href="{{ url('/admin/users') }}" class="text-sm text-blue-600 hover:text-blue-700 font-medium">View all →</a>
        </div>
        <div class="space-y-2">
            @forelse($recent_users as $u)
            <div class="flex items-center gap-3 p-3 hover:bg-slate-50 rounded-xl">
                <div class="w-9 h-9 rounded-full bg-gradient-to-br from-blue-500 to-indigo-600 flex items-center justify-center text-xs font-semibold text-white flex-shrink-0">{{ strtoupper(substr($u->name, 0, 1)) }}</div>
                <div class="min-w-0 flex-1">
                    <p class="text-sm font-medium text-slate-900 truncate">{{ $u->name }}</p>
                    <p class="text-xs text-slate-500 truncate">{{ $u->email }}</p>
                </div>
                <span class="text-xs text-slate-500 flex-shrink-0">{{ $u->created_at->diffForHumans() }}</span>
            </div>
            @empty
            <p class="text-sm text-slate-500 text-center py-6">No users yet.</p>
            @endforelse
        </div>
    </div>

    <div class="bg-white border border-slate-200 rounded-2xl p-5 sm:p-6">
        <h3 class="text-base sm:text-lg font-semibold text-slate-900 mb-4">Quick Actions</h3>
        <div class="space-y-2">
            <a href="{{ url('/admin/plans/create') }}" class="flex items-center gap-3 px-3 py-2.5 text-sm text-slate-700 hover:bg-slate-50 hover:text-blue-600 rounded-lg transition"><svg class="w-4 h-4 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>Add New Plan</a>
            <a href="{{ url('/admin/coupons/create') }}" class="flex items-center gap-3 px-3 py-2.5 text-sm text-slate-700 hover:bg-slate-50 hover:text-blue-600 rounded-lg transition"><svg class="w-4 h-4 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.5 0 1 .2 1.4.6l7 7a2 2 0 010 2.8l-7 7a2 2 0 01-2.8 0l-7-7A2 2 0 013 12V7a4 4 0 014-4z"/></svg>Create Coupon</a>
            <a href="{{ url('/admin/landing') }}" class="flex items-center gap-3 px-3 py-2.5 text-sm text-slate-700 hover:bg-slate-50 hover:text-blue-600 rounded-lg transition"><svg class="w-4 h-4 text-violet-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h12a2 2 0 012 2v12a2 2 0 01-2 2H6a2 2 0 01-2-2V6z"/></svg>Edit Landing Page</a>
            <a href="{{ url('/admin/reviews?filter=pending') }}" class="flex items-center gap-3 px-3 py-2.5 text-sm text-slate-700 hover:bg-slate-50 hover:text-blue-600 rounded-lg transition"><svg class="w-4 h-4 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>Approve Reviews</a>
            <a href="{{ url('/admin/settings') }}" class="flex items-center gap-3 px-3 py-2.5 text-sm text-slate-700 hover:bg-slate-50 hover:text-blue-600 rounded-lg transition"><svg class="w-4 h-4 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.32 4.32c.43-1.76 2.93-1.76 3.35 0a1.72 1.72 0 002.58 1.07c1.54-.94 3.31.82 2.37 2.37a1.72 1.72 0 001.06 2.57c1.76.43 1.76 2.93 0 3.35a1.72 1.72 0 00-1.06 2.58c.94 1.54-.83 3.31-2.37 2.37a1.72 1.72 0 00-2.58 1.06c-.43 1.76-2.93 1.76-3.35 0a1.72 1.72 0 00-2.58-1.06c-1.54.94-3.31-.83-2.37-2.37a1.72 1.72 0 00-1.06-2.58c-1.76-.43-1.76-2.93 0-3.35a1.72 1.72 0 001.06-2.57c-.94-1.54.83-3.31 2.37-2.37 1 .61 2.3.07 2.57-1.07z"/></svg>Site Settings</a>
        </div>
    </div>
</div>
@endsection
