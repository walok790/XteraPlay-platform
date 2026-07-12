@extends('admin.layouts.app')
@section('title', 'Support Tickets')

@section('content')
<div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 mb-6">
    <div>
        <h2 class="text-xl sm:text-2xl font-bold text-slate-900">Support Tickets</h2>
        <p class="text-sm text-slate-600 mt-1">Respond to user support requests.</p>
    </div>
</div>

@if(session('status'))
    <div class="mb-4 p-3 bg-emerald-50 border border-emerald-200 rounded-lg text-sm text-emerald-700">{{ session('status') }}</div>
@endif

<!-- Stats -->
<div class="grid grid-cols-2 sm:grid-cols-4 gap-3 sm:gap-4 mb-6">
    <div class="bg-white border border-slate-200 rounded-2xl p-4 sm:p-5"><p class="text-xs text-slate-500 uppercase tracking-wide mb-1">Open</p><p class="text-2xl sm:text-3xl font-bold text-blue-600">{{ $counts['open'] }}</p></div>
    <div class="bg-white border border-slate-200 rounded-2xl p-4 sm:p-5"><p class="text-xs text-slate-500 uppercase tracking-wide mb-1">Pending</p><p class="text-2xl sm:text-3xl font-bold text-amber-600">{{ $counts['pending'] }}</p></div>
    <div class="bg-white border border-slate-200 rounded-2xl p-4 sm:p-5"><p class="text-xs text-slate-500 uppercase tracking-wide mb-1">Resolved</p><p class="text-2xl sm:text-3xl font-bold text-emerald-600">{{ $counts['resolved'] }}</p></div>
    <div class="bg-white border border-slate-200 rounded-2xl p-4 sm:p-5"><p class="text-xs text-slate-500 uppercase tracking-wide mb-1">Total</p><p class="text-2xl sm:text-3xl font-bold text-slate-900">{{ $counts['total'] }}</p></div>
</div>

<div class="bg-white border border-slate-200 rounded-2xl overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead class="bg-slate-50 border-b border-slate-200">
                <tr>
                    <th class="text-left px-4 sm:px-6 py-3 text-xs font-semibold text-slate-500 uppercase tracking-wide">Ticket</th>
                    <th class="text-left px-4 sm:px-6 py-3 text-xs font-semibold text-slate-500 uppercase tracking-wide hidden md:table-cell">Category</th>
                    <th class="text-left px-4 sm:px-6 py-3 text-xs font-semibold text-slate-500 uppercase tracking-wide hidden lg:table-cell">Priority</th>
                    <th class="text-left px-4 sm:px-6 py-3 text-xs font-semibold text-slate-500 uppercase tracking-wide">Status</th>
                    <th class="text-right px-4 sm:px-6 py-3 text-xs font-semibold text-slate-500 uppercase tracking-wide">Action</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @forelse($tickets as $t)
                <tr class="hover:bg-slate-50">
                    <td class="px-4 sm:px-6 py-4">
                        <p class="text-sm font-medium text-slate-900">{{ $t->subject }}</p>
                        <p class="text-xs text-slate-500 mt-0.5">#T-{{ str_pad($t->id, 4, '0', STR_PAD_LEFT) }} · {{ $t->user?->name ?? 'Unknown' }} · {{ $t->created_at->diffForHumans() }}</p>
                    </td>
                    <td class="px-4 sm:px-6 py-4 hidden md:table-cell text-sm text-slate-600">{{ ucfirst($t->category) }}</td>
                    <td class="px-4 sm:px-6 py-4 hidden lg:table-cell">
                        @php $pc = $t->priority === 'high' ? 'bg-red-50 text-red-700' : ($t->priority === 'medium' ? 'bg-amber-50 text-amber-700' : 'bg-slate-100 text-slate-600'); @endphp
                        <span class="inline-flex px-2 py-0.5 text-xs font-medium rounded-full {{ $pc }}">{{ ucfirst($t->priority) }}</span>
                    </td>
                    <td class="px-4 sm:px-6 py-4"><span class="inline-flex px-2 py-0.5 text-xs font-medium rounded-full {{ $t->status_color }}">{{ ucfirst($t->status) }}</span></td>
                    <td class="px-4 sm:px-6 py-4 text-right"><a href="{{ url('/admin/support/' . $t->id) }}" class="text-sm text-blue-600 hover:text-blue-700 font-medium">View</a></td>
                </tr>
                @empty
                <tr><td colspan="5" class="px-6 py-12 text-center text-slate-500">No tickets yet.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
