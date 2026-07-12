@extends('admin.layouts.app')
@section('title', 'Dashboard')

@section('content')
<div class="mb-6">
    <h2 class="text-xl sm:text-2xl font-bold text-slate-900">Overview</h2>
    <p class="text-sm text-slate-600 mt-1">Welcome back, here's what's happening today.</p>
</div>

<!-- Stat Cards -->
<div class="grid grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-4 mb-6">
    <div class="bg-white border border-slate-200 rounded-2xl p-4 sm:p-5">
        <div class="flex items-center justify-between mb-3">
            <div class="w-10 h-10 bg-blue-50 rounded-xl flex items-center justify-center">
                <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
            </div>
            <span class="text-xs px-2 py-0.5 bg-emerald-50 text-emerald-700 rounded-full font-medium">+12%</span>
        </div>
        <p class="text-2xl sm:text-3xl font-bold text-slate-900">2,481</p>
        <p class="text-xs text-slate-500 mt-1">Total Users</p>
    </div>
    <div class="bg-white border border-slate-200 rounded-2xl p-4 sm:p-5">
        <div class="flex items-center justify-between mb-3">
            <div class="w-10 h-10 bg-emerald-50 rounded-xl flex items-center justify-center">
                <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/></svg>
            </div>
            <span class="text-xs px-2 py-0.5 bg-emerald-50 text-emerald-700 rounded-full font-medium">+8%</span>
        </div>
        <p class="text-2xl sm:text-3xl font-bold text-slate-900">352</p>
        <p class="text-xs text-slate-500 mt-1">Active Subscriptions</p>
    </div>
    <div class="bg-white border border-slate-200 rounded-2xl p-4 sm:p-5">
        <div class="flex items-center justify-between mb-3">
            <div class="w-10 h-10 bg-violet-50 rounded-xl flex items-center justify-center">
                <svg class="w-5 h-5 text-violet-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.66 0-3 .9-3 2s1.34 2 3 2 3 .9 3 2-1.34 2-3 2m0-8c1.11 0 2.08.4 2.6 1M12 8V7m0 1v8"/></svg>
            </div>
            <span class="text-xs px-2 py-0.5 bg-emerald-50 text-emerald-700 rounded-full font-medium">+24%</span>
        </div>
        <p class="text-2xl sm:text-3xl font-bold text-slate-900">$4,182</p>
        <p class="text-xs text-slate-500 mt-1">Revenue (MTD)</p>
    </div>
    <div class="bg-white border border-slate-200 rounded-2xl p-4 sm:p-5">
        <div class="flex items-center justify-between mb-3">
            <div class="w-10 h-10 bg-amber-50 rounded-xl flex items-center justify-center">
                <svg class="w-5 h-5 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.36 5.64l-3.53 3.53m0 5.66l3.53 3.53M9.17 9.17L5.64 5.64m3.53 9.19l-3.53 3.53M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
            </div>
            <span class="text-xs px-2 py-0.5 bg-red-50 text-red-700 rounded-full font-medium">3 new</span>
        </div>
        <p class="text-2xl sm:text-3xl font-bold text-slate-900">17</p>
        <p class="text-xs text-slate-500 mt-1">Open Tickets</p>
    </div>
</div>

<!-- Recent Activity -->
<div class="grid grid-cols-1 lg:grid-cols-3 gap-4 sm:gap-6">
    <div class="lg:col-span-2 bg-white border border-slate-200 rounded-2xl p-5 sm:p-6">
        <div class="flex items-center justify-between mb-4">
            <h3 class="text-base sm:text-lg font-semibold text-slate-900">Recent Signups</h3>
            <a href="{{ url('/admin/users') }}" class="text-sm text-blue-600 hover:text-blue-700 font-medium">View all →</a>
        </div>
        <div class="space-y-3">
            @foreach([['name'=>'Rahul K.', 'email'=>'rahul@example.com', 'plan'=>'Free', 'time'=>'2h ago', 'color'=>'from-blue-500 to-cyan-500'], ['name'=>'Sarah M.', 'email'=>'sarah@example.com', 'plan'=>'Pro', 'time'=>'5h ago', 'color'=>'from-purple-500 to-pink-500'], ['name'=>'Ahmed T.', 'email'=>'ahmed@example.com', 'plan'=>'Enterprise', 'time'=>'1d ago', 'color'=>'from-emerald-500 to-teal-500'], ['name'=>'Priya S.', 'email'=>'priya@example.com', 'plan'=>'Free', 'time'=>'1d ago', 'color'=>'from-orange-500 to-red-500']] as $u)
            <div class="flex items-center gap-3 p-3 bg-slate-50 rounded-xl">
                <div class="w-9 h-9 rounded-full bg-gradient-to-br {{ $u['color'] }} flex items-center justify-center text-xs font-semibold text-white flex-shrink-0">{{ strtoupper(substr($u['name'], 0, 1)) }}</div>
                <div class="min-w-0 flex-1">
                    <p class="text-sm font-medium text-slate-900 truncate">{{ $u['name'] }}</p>
                    <p class="text-xs text-slate-500 truncate">{{ $u['email'] }}</p>
                </div>
                <span class="text-xs px-2 py-0.5 bg-blue-50 text-blue-700 rounded-full font-medium">{{ $u['plan'] }}</span>
                <span class="text-xs text-slate-400 hidden sm:block">{{ $u['time'] }}</span>
            </div>
            @endforeach
        </div>
    </div>

    <div class="bg-white border border-slate-200 rounded-2xl p-5 sm:p-6">
        <h3 class="text-base sm:text-lg font-semibold text-slate-900 mb-4">Quick Actions</h3>
        <div class="space-y-2">
            <a href="{{ url('/admin/users') }}" class="flex items-center gap-3 px-3 py-2.5 text-sm text-slate-700 hover:bg-slate-50 hover:text-blue-600 rounded-lg transition"><svg class="w-4 h-4 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.35a4 4 0 110 5.3M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.2M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>Manage Users</a>
            <a href="{{ url('/admin/coupons') }}" class="flex items-center gap-3 px-3 py-2.5 text-sm text-slate-700 hover:bg-slate-50 hover:text-blue-600 rounded-lg transition"><svg class="w-4 h-4 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.5 0 1 .2 1.4.6l7 7a2 2 0 010 2.8l-7 7a2 2 0 01-2.8 0l-7-7A2 2 0 013 12V7a4 4 0 014-4z"/></svg>Create Coupon</a>
            <a href="{{ url('/admin/support') }}" class="flex items-center gap-3 px-3 py-2.5 text-sm text-slate-700 hover:bg-slate-50 hover:text-blue-600 rounded-lg transition"><svg class="w-4 h-4 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.36 5.64l-3.53 3.53m0 5.66l3.53 3.53M9.17 9.17L5.64 5.64m3.53 9.19l-3.53 3.53M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"/></svg>Handle Tickets</a>
            <a href="{{ url('/admin/settings') }}" class="flex items-center gap-3 px-3 py-2.5 text-sm text-slate-700 hover:bg-slate-50 hover:text-blue-600 rounded-lg transition"><svg class="w-4 h-4 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.32 4.32c.43-1.76 2.93-1.76 3.35 0a1.72 1.72 0 002.58 1.07c1.54-.94 3.31.82 2.37 2.37a1.72 1.72 0 001.06 2.57c1.76.43 1.76 2.93 0 3.35a1.72 1.72 0 00-1.06 2.58c.94 1.54-.83 3.31-2.37 2.37a1.72 1.72 0 00-2.58 1.06c-.43 1.76-2.93 1.76-3.35 0a1.72 1.72 0 00-2.58-1.06c-1.54.94-3.31-.83-2.37-2.37a1.72 1.72 0 00-1.06-2.58c-1.76-.43-1.76-2.93 0-3.35a1.72 1.72 0 001.06-2.57c-.94-1.54.83-3.31 2.37-2.37 1 .61 2.3.07 2.57-1.07z"/></svg>Site Settings</a>
        </div>
    </div>
</div>
@endsection
