@extends('admin.layouts.app')
@section('title', 'Users')

@section('content')
<div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 mb-6">
    <div>
        <h2 class="text-xl sm:text-2xl font-bold text-slate-900">Users</h2>
        <p class="text-sm text-slate-600 mt-1">Manage user accounts and permissions.</p>
    </div>
    <div class="flex items-center gap-2">
        <form method="GET" action="{{ url('/admin/users') }}" class="relative">
            <svg class="absolute left-2.5 top-1/2 -translate-y-1/2 w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
            <input type="text" name="search" value="{{ $search ?? '' }}" placeholder="Search users..." class="pl-8 pr-3 py-2 bg-white border border-slate-300 rounded-lg text-sm w-full sm:w-56 focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100 transition">
        </form>
        <a href="{{ url('/admin/users/create') }}" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-lg shadow-sm shadow-blue-500/25 transition whitespace-nowrap">+ Add User</a>
    </div>
</div>

@if(session('status'))
    <div class="mb-4 p-3 bg-emerald-50 border border-emerald-200 rounded-lg text-sm text-emerald-700">{{ session('status') }}</div>
@endif

<div class="bg-white border border-slate-200 rounded-2xl overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead class="bg-slate-50 border-b border-slate-200">
                <tr>
                    <th class="text-left px-4 sm:px-6 py-3 text-xs font-semibold text-slate-500 uppercase tracking-wide">User</th>
                    <th class="text-left px-4 sm:px-6 py-3 text-xs font-semibold text-slate-500 uppercase tracking-wide hidden md:table-cell">Joined</th>
                    <th class="text-left px-4 sm:px-6 py-3 text-xs font-semibold text-slate-500 uppercase tracking-wide hidden lg:table-cell">Verified</th>
                    <th class="text-right px-4 sm:px-6 py-3 text-xs font-semibold text-slate-500 uppercase tracking-wide">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @forelse($users as $u)
                <tr class="hover:bg-slate-50">
                    <td class="px-4 sm:px-6 py-4">
                        <div class="flex items-center gap-3">
                            <div class="w-9 h-9 rounded-full bg-gradient-to-br from-blue-500 to-indigo-600 flex items-center justify-center text-xs font-semibold text-white flex-shrink-0">{{ strtoupper(substr($u->name, 0, 1)) }}</div>
                            <div class="min-w-0">
                                <p class="text-sm font-medium text-slate-900 truncate">{{ $u->name }}</p>
                                <p class="text-xs text-slate-500 truncate">{{ $u->email }}</p>
                            </div>
                        </div>
                    </td>
                    <td class="px-4 sm:px-6 py-4 hidden md:table-cell text-sm text-slate-600">{{ $u->created_at->format('M j, Y') }}</td>
                    <td class="px-4 sm:px-6 py-4 hidden lg:table-cell">
                        @if($u->email_verified_at)<span class="px-2 py-0.5 text-xs font-medium bg-emerald-50 text-emerald-700 rounded-full">Verified</span>@else<span class="px-2 py-0.5 text-xs font-medium bg-amber-50 text-amber-700 rounded-full">Pending</span>@endif
                    </td>
                    <td class="px-4 sm:px-6 py-4 text-right">
                        <div class="inline-flex items-center gap-1">
                            <a href="{{ url('/admin/users/' . $u->id . '/edit') }}" class="px-3 py-1.5 text-xs text-blue-600 hover:bg-blue-50 rounded-lg transition font-medium">Edit</a>
                            <form method="POST" action="{{ url('/admin/users/' . $u->id) }}" onsubmit="return confirm('Delete this user?');" class="inline">
                                @csrf @method('DELETE')
                                <button type="submit" class="px-3 py-1.5 text-xs text-red-600 hover:bg-red-50 rounded-lg transition font-medium">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr><td colspan="4" class="px-6 py-12 text-center text-slate-500">No users found.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="px-4 sm:px-6 py-3 border-t border-slate-200 text-sm text-slate-600">
        Showing {{ $users->count() }} of {{ $users->count() }} users
    </div>
</div>
@endsection
