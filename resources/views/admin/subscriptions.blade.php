@extends('admin.layouts.app')
@section('title', 'Subscriptions')

@section('content')
<div class="mb-6">
    <h2 class="text-xl sm:text-2xl font-bold text-slate-900">Subscriptions</h2>
    <p class="text-sm text-slate-600 mt-1">Manage active user subscriptions.</p>
</div>

@if(session('status'))
    <div class="mb-4 p-3 bg-emerald-50 border border-emerald-200 rounded-lg text-sm text-emerald-700">{{ session('status') }}</div>
@endif

<div class="grid grid-cols-1 sm:grid-cols-3 gap-3 sm:gap-4 mb-6">
    <div class="bg-white border border-slate-200 rounded-2xl p-5">
        <p class="text-xs text-slate-500 uppercase tracking-wide mb-2">Free Plans</p>
        <p class="text-2xl sm:text-3xl font-bold text-slate-900">{{ number_format($stats['free']) }}</p>
    </div>
    <div class="bg-white border-2 border-blue-200 rounded-2xl p-5">
        <p class="text-xs text-blue-600 uppercase tracking-wide mb-2 font-semibold">Pro Plans</p>
        <p class="text-2xl sm:text-3xl font-bold text-slate-900">{{ number_format($stats['pro']) }}</p>
    </div>
    <div class="bg-white border border-slate-200 rounded-2xl p-5">
        <p class="text-xs text-slate-500 uppercase tracking-wide mb-2">Enterprise Plans</p>
        <p class="text-2xl sm:text-3xl font-bold text-slate-900">{{ number_format($stats['enterprise']) }}</p>
    </div>
</div>

<div class="bg-white border border-slate-200 rounded-2xl overflow-hidden">
    <div class="p-5 border-b border-slate-200">
        <h3 class="text-base sm:text-lg font-semibold text-slate-900">Active Subscriptions</h3>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead class="bg-slate-50 border-b border-slate-200">
                <tr>
                    <th class="text-left px-4 sm:px-6 py-3 text-xs font-semibold text-slate-500 uppercase tracking-wide">User</th>
                    <th class="text-left px-4 sm:px-6 py-3 text-xs font-semibold text-slate-500 uppercase tracking-wide">Plan</th>
                    <th class="text-left px-4 sm:px-6 py-3 text-xs font-semibold text-slate-500 uppercase tracking-wide hidden md:table-cell">Started</th>
                    <th class="text-left px-4 sm:px-6 py-3 text-xs font-semibold text-slate-500 uppercase tracking-wide">Status</th>
                    <th class="text-right px-4 sm:px-6 py-3 text-xs font-semibold text-slate-500 uppercase tracking-wide">Action</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @forelse($subscriptions as $s)
                <tr class="hover:bg-slate-50">
                    <td class="px-4 sm:px-6 py-4">
                        <p class="text-sm font-medium text-slate-900">{{ $s->user?->name }}</p>
                        <p class="text-xs text-slate-500">{{ $s->user?->email }}</p>
                    </td>
                    <td class="px-4 sm:px-6 py-4">
                        <p class="text-sm font-medium text-slate-900">{{ $s->plan?->name }}</p>
                        <p class="text-xs text-slate-500">${{ number_format($s->plan?->price ?? 0, 2) }}/{{ $s->plan?->billing_period ?? 'mo' }}</p>
                    </td>
                    <td class="px-4 sm:px-6 py-4 hidden md:table-cell text-sm text-slate-600">{{ $s->starts_at?->format('M j, Y') ?? $s->created_at->format('M j, Y') }}</td>
                    <td class="px-4 sm:px-6 py-4"><span class="inline-flex px-2 py-0.5 text-xs font-medium rounded-full {{ $s->status === 'active' ? 'bg-emerald-50 text-emerald-700' : 'bg-slate-100 text-slate-600' }}">{{ ucfirst($s->status) }}</span></td>
                    <td class="px-4 sm:px-6 py-4 text-right">
                        @if($s->status === 'active')
                        <form method="POST" action="{{ url('/admin/subscriptions/' . $s->id . '/cancel') }}" onsubmit="return confirm('Cancel this subscription?');" class="inline">
                            @csrf
                            <button type="submit" class="text-sm text-red-600 hover:text-red-700 font-medium">Cancel</button>
                        </form>
                        @endif
                    </td>
                </tr>
                @empty
                <tr><td colspan="5" class="px-6 py-12 text-center text-slate-500">No active subscriptions yet.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
