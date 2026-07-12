@extends('admin.layouts.app')
@section('title', 'Coupons')

@section('content')
<div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 mb-6">
    <div>
        <h2 class="text-xl sm:text-2xl font-bold text-slate-900">Coupons</h2>
        <p class="text-sm text-slate-600 mt-1">Create and manage discount codes.</p>
    </div>
    <a href="{{ url('/admin/coupons/create') }}" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-lg shadow-sm shadow-blue-500/25 transition self-start sm:self-auto flex items-center gap-1.5">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
        Create Coupon
    </a>
</div>

@if(session('status'))
    <div class="mb-4 p-3 bg-emerald-50 border border-emerald-200 rounded-lg text-sm text-emerald-700">{{ session('status') }}</div>
@endif

<div class="bg-white border border-slate-200 rounded-2xl overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead class="bg-slate-50 border-b border-slate-200">
                <tr>
                    <th class="text-left px-4 sm:px-6 py-3 text-xs font-semibold text-slate-500 uppercase tracking-wide">Code</th>
                    <th class="text-left px-4 sm:px-6 py-3 text-xs font-semibold text-slate-500 uppercase tracking-wide">Discount</th>
                    <th class="text-left px-4 sm:px-6 py-3 text-xs font-semibold text-slate-500 uppercase tracking-wide hidden md:table-cell">Used</th>
                    <th class="text-left px-4 sm:px-6 py-3 text-xs font-semibold text-slate-500 uppercase tracking-wide hidden lg:table-cell">Expires</th>
                    <th class="text-left px-4 sm:px-6 py-3 text-xs font-semibold text-slate-500 uppercase tracking-wide">Status</th>
                    <th class="text-right px-4 sm:px-6 py-3 text-xs font-semibold text-slate-500 uppercase tracking-wide">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @forelse($coupons as $c)
                <tr class="hover:bg-slate-50">
                    <td class="px-4 sm:px-6 py-4"><code class="px-2 py-1 bg-slate-100 text-slate-900 text-xs font-mono font-semibold rounded">{{ $c->code }}</code></td>
                    <td class="px-4 sm:px-6 py-4"><span class="text-sm font-semibold text-blue-600">{{ $c->discount_type === 'percentage' ? $c->discount_value . '%' : '$' . $c->discount_value }} off</span></td>
                    <td class="px-4 sm:px-6 py-4 hidden md:table-cell text-sm text-slate-700">{{ $c->times_used }}{{ $c->usage_limit ? '/' . $c->usage_limit : '' }}</td>
                    <td class="px-4 sm:px-6 py-4 hidden lg:table-cell text-sm text-slate-600">{{ $c->expires_at?->format('M j, Y') ?? '—' }}</td>
                    <td class="px-4 sm:px-6 py-4">
                        @php
                            $sc = match($c->status) {
                                'Active' => 'bg-emerald-50 text-emerald-700',
                                'Scheduled' => 'bg-blue-50 text-blue-700',
                                'Expired' => 'bg-slate-100 text-slate-600',
                                default => 'bg-slate-100 text-slate-600',
                            };
                        @endphp
                        <span class="inline-flex px-2 py-0.5 text-xs font-medium rounded-full {{ $sc }}">{{ $c->status }}</span>
                    </td>
                    <td class="px-4 sm:px-6 py-4 text-right">
                        <div class="inline-flex items-center gap-1">
                            <a href="{{ url('/admin/coupons/' . $c->id . '/edit') }}" class="px-3 py-1.5 text-xs text-blue-600 hover:bg-blue-50 rounded-lg transition font-medium">Edit</a>
                            <form method="POST" action="{{ url('/admin/coupons/' . $c->id) }}" onsubmit="return confirm('Delete this coupon?');" class="inline">
                                @csrf @method('DELETE')
                                <button type="submit" class="px-3 py-1.5 text-xs text-red-600 hover:bg-red-50 rounded-lg transition font-medium">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr><td colspan="6" class="px-6 py-12 text-center text-slate-500">No coupons yet.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
