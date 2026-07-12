@extends('admin.layouts.app')
@section('title', 'Users')

@section('content')
<div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 mb-6">
    <div>
        <h2 class="text-xl sm:text-2xl font-bold text-slate-900">Users</h2>
        <p class="text-sm text-slate-600 mt-1">Manage user accounts and permissions.</p>
    </div>
    <div class="flex items-center gap-2">
        <div class="relative">
            <svg class="absolute left-2.5 top-1/2 -translate-y-1/2 w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
            <input type="text" placeholder="Search users..." class="pl-8 pr-3 py-2 bg-white border border-slate-300 rounded-lg text-sm w-full sm:w-56 focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100 transition">
        </div>
        <button class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-lg shadow-sm shadow-blue-500/25 transition whitespace-nowrap">+ Add User</button>
    </div>
</div>

<div class="bg-white border border-slate-200 rounded-2xl overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead class="bg-slate-50 border-b border-slate-200">
                <tr>
                    <th class="text-left px-4 sm:px-6 py-3 text-xs font-semibold text-slate-500 uppercase tracking-wide">User</th>
                    <th class="text-left px-4 sm:px-6 py-3 text-xs font-semibold text-slate-500 uppercase tracking-wide hidden md:table-cell">Plan</th>
                    <th class="text-left px-4 sm:px-6 py-3 text-xs font-semibold text-slate-500 uppercase tracking-wide hidden lg:table-cell">Joined</th>
                    <th class="text-left px-4 sm:px-6 py-3 text-xs font-semibold text-slate-500 uppercase tracking-wide">Status</th>
                    <th class="text-right px-4 sm:px-6 py-3 text-xs font-semibold text-slate-500 uppercase tracking-wide">Action</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @foreach([['name'=>'Demo User', 'email'=>'demo@xteraplay.com', 'plan'=>'Free', 'joined'=>'Jan 15, 2025', 'status'=>'Active', 'color'=>'from-blue-500 to-cyan-500'], ['name'=>'Rahul K.', 'email'=>'rahul@example.com', 'plan'=>'Free', 'joined'=>'Jan 12, 2025', 'status'=>'Active', 'color'=>'from-purple-500 to-pink-500'], ['name'=>'Sarah M.', 'email'=>'sarah@example.com', 'plan'=>'Pro', 'joined'=>'Jan 10, 2025', 'status'=>'Active', 'color'=>'from-emerald-500 to-teal-500'], ['name'=>'Ahmed T.', 'email'=>'ahmed@example.com', 'plan'=>'Enterprise', 'joined'=>'Jan 8, 2025', 'status'=>'Active', 'color'=>'from-orange-500 to-red-500'], ['name'=>'Priya S.', 'email'=>'priya@example.com', 'plan'=>'Free', 'joined'=>'Jan 5, 2025', 'status'=>'Suspended', 'color'=>'from-indigo-500 to-violet-500']] as $u)
                <tr class="hover:bg-slate-50">
                    <td class="px-4 sm:px-6 py-4">
                        <div class="flex items-center gap-3">
                            <div class="w-9 h-9 rounded-full bg-gradient-to-br {{ $u['color'] }} flex items-center justify-center text-xs font-semibold text-white flex-shrink-0">{{ strtoupper(substr($u['name'], 0, 1)) }}</div>
                            <div class="min-w-0">
                                <p class="text-sm font-medium text-slate-900 truncate">{{ $u['name'] }}</p>
                                <p class="text-xs text-slate-500 truncate">{{ $u['email'] }}</p>
                            </div>
                        </div>
                    </td>
                    <td class="px-4 sm:px-6 py-4 hidden md:table-cell"><span class="text-sm text-slate-700">{{ $u['plan'] }}</span></td>
                    <td class="px-4 sm:px-6 py-4 hidden lg:table-cell text-sm text-slate-600">{{ $u['joined'] }}</td>
                    <td class="px-4 sm:px-6 py-4">
                        <span class="inline-flex px-2 py-0.5 text-xs font-medium rounded-full {{ $u['status']==='Active' ? 'bg-emerald-50 text-emerald-700' : 'bg-red-50 text-red-700' }}">{{ $u['status'] }}</span>
                    </td>
                    <td class="px-4 sm:px-6 py-4 text-right">
                        <div class="inline-flex items-center gap-1">
                            <button class="w-8 h-8 flex items-center justify-center text-slate-500 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.4-9.4a2 2 0 112.8 2.8L11.8 15.8 8 17l1.2-3.8L18.6 3.6z"/></svg></button>
                            <button class="w-8 h-8 flex items-center justify-center text-slate-500 hover:text-red-600 hover:bg-red-50 rounded-lg transition"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.87 12.14A2 2 0 0116.14 21H7.86a2 2 0 01-2-1.86L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg></button>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="px-4 sm:px-6 py-3 border-t border-slate-200 flex items-center justify-between text-sm text-slate-600">
        <span>Showing 1–5 of 2,481 users</span>
        <div class="flex items-center gap-1">
            <button class="px-2.5 py-1 text-slate-500 hover:bg-slate-100 rounded transition">‹</button>
            <button class="px-2.5 py-1 bg-blue-600 text-white rounded">1</button>
            <button class="px-2.5 py-1 hover:bg-slate-100 rounded transition">2</button>
            <button class="px-2.5 py-1 hover:bg-slate-100 rounded transition">3</button>
            <button class="px-2.5 py-1 text-slate-500 hover:bg-slate-100 rounded transition">›</button>
        </div>
    </div>
</div>
@endsection
