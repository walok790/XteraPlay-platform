@extends('layouts.app')

@section('title', 'Transactions - XteraPlay')

@section('content')
<div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-6 sm:py-8 md:py-10">
    <div class="mb-6 sm:mb-8">
        <h1 class="text-2xl sm:text-3xl font-bold text-slate-900">Transactions</h1>
        <p class="text-sm text-slate-600 mt-1">Your billing and payment history.</p>
    </div>

    @php
        $totalSpent = $transactions->where('status', 'success')->sum('amount');
        $successCount = $transactions->where('status', 'success')->count();
        $pendingCount = $transactions->where('status', 'pending')->count();
    @endphp

    <!-- Summary Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-3 sm:gap-4 mb-6 sm:mb-8">
        <div class="bg-white border border-slate-200 rounded-2xl p-5">
            <div class="flex items-center gap-3 mb-2">
                <div class="w-10 h-10 bg-emerald-50 rounded-lg flex items-center justify-center"><svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.66 0-3 .9-3 2s1.34 2 3 2 3 .9 3 2-1.34 2-3 2m0-8c1.11 0 2.08.4 2.6 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.4-2.6-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg></div>
                <p class="text-xs text-slate-500 uppercase tracking-wide">Total Spent</p>
            </div>
            <p class="text-2xl sm:text-3xl font-bold text-slate-900">${{ number_format($totalSpent, 2) }}</p>
        </div>
        <div class="bg-white border border-slate-200 rounded-2xl p-5">
            <div class="flex items-center gap-3 mb-2">
                <div class="w-10 h-10 bg-blue-50 rounded-lg flex items-center justify-center"><svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/></svg></div>
                <p class="text-xs text-slate-500 uppercase tracking-wide">Successful</p>
            </div>
            <p class="text-2xl sm:text-3xl font-bold text-slate-900">{{ $successCount }}</p>
        </div>
        <div class="bg-white border border-slate-200 rounded-2xl p-5">
            <div class="flex items-center gap-3 mb-2">
                <div class="w-10 h-10 bg-amber-50 rounded-lg flex items-center justify-center"><svg class="w-5 h-5 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg></div>
                <p class="text-xs text-slate-500 uppercase tracking-wide">Pending</p>
            </div>
            <p class="text-2xl sm:text-3xl font-bold text-slate-900">{{ $pendingCount }}</p>
        </div>
    </div>

    <!-- Transaction Table -->
    <div class="bg-white border border-slate-200 rounded-2xl overflow-hidden">
        <div class="p-5 sm:p-6 border-b border-slate-200">
            <h2 class="text-base sm:text-lg font-semibold text-slate-900">Transaction History</h2>
        </div>

        @if($transactions->count() === 0)
            <div class="p-8 sm:p-12 md:p-16 text-center">
                <div class="w-16 h-16 bg-emerald-50 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/></svg>
                </div>
                <h3 class="text-lg font-semibold text-slate-900 mb-2">No transactions yet</h3>
                <p class="text-sm text-slate-600 mb-6 max-w-xs mx-auto">Your billing history will appear here once you make your first purchase.</p>
                <a href="{{ url('/subscription') }}" class="inline-flex items-center gap-2 px-5 py-2.5 bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold rounded-lg shadow-sm shadow-blue-500/25 transition">View Plans</a>
            </div>
        @else
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead class="bg-slate-50 border-b border-slate-200">
                        <tr>
                            <th class="text-left px-5 py-3 text-xs font-semibold text-slate-500 uppercase tracking-wide">Date</th>
                            <th class="text-left px-5 py-3 text-xs font-semibold text-slate-500 uppercase tracking-wide">Plan</th>
                            <th class="text-left px-5 py-3 text-xs font-semibold text-slate-500 uppercase tracking-wide">Amount</th>
                            <th class="text-left px-5 py-3 text-xs font-semibold text-slate-500 uppercase tracking-wide">Status</th>
                            <th class="text-right px-5 py-3 text-xs font-semibold text-slate-500 uppercase tracking-wide">Reference</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @foreach($transactions as $t)
                        <tr class="hover:bg-slate-50">
                            <td class="px-5 py-4 text-slate-900">{{ $t->created_at->format('M j, Y') }}</td>
                            <td class="px-5 py-4 text-slate-900">{{ $t->plan?->name ?? '—' }}</td>
                            <td class="px-5 py-4 text-slate-900 font-semibold">${{ number_format($t->amount, 2) }}</td>
                            <td class="px-5 py-4">
                                @php $sc = ['success' => 'bg-emerald-100 text-emerald-700', 'pending' => 'bg-amber-100 text-amber-700', 'failed' => 'bg-red-100 text-red-700', 'refunded' => 'bg-slate-100 text-slate-700'][$t->status] ?? 'bg-slate-100 text-slate-700'; @endphp
                                <span class="px-2.5 py-1 text-xs font-medium rounded-full {{ $sc }}">{{ ucfirst($t->status) }}</span>
                            </td>
                            <td class="px-5 py-4 text-right"><code class="text-xs text-slate-500">{{ $t->reference }}</code></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</div>
@endsection
