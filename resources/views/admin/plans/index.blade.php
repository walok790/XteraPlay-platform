@extends('admin.layouts.app')
@section('title', 'Plans')

@section('content')
<div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 mb-6">
    <div>
        <h2 class="text-xl sm:text-2xl font-bold text-slate-900">Subscription Plans</h2>
        <p class="text-sm text-slate-600 mt-1">Manage pricing plans shown on landing and subscription pages.</p>
    </div>
    <a href="{{ url('/admin/plans/create') }}" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-lg shadow-sm shadow-blue-500/25 transition self-start sm:self-auto flex items-center gap-1.5">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
        New Plan
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
                    <th class="text-left px-4 sm:px-6 py-3 text-xs font-semibold text-slate-500 uppercase tracking-wide">Name</th>
                    <th class="text-left px-4 sm:px-6 py-3 text-xs font-semibold text-slate-500 uppercase tracking-wide">Price</th>
                    <th class="text-left px-4 sm:px-6 py-3 text-xs font-semibold text-slate-500 uppercase tracking-wide hidden md:table-cell">Features</th>
                    <th class="text-left px-4 sm:px-6 py-3 text-xs font-semibold text-slate-500 uppercase tracking-wide">Status</th>
                    <th class="text-right px-4 sm:px-6 py-3 text-xs font-semibold text-slate-500 uppercase tracking-wide">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @forelse($plans as $plan)
                <tr class="hover:bg-slate-50">
                    <td class="px-4 sm:px-6 py-4">
                        <p class="text-sm font-medium text-slate-900">{{ $plan->name }}</p>
                        <p class="text-xs text-slate-500">{{ $plan->tagline }}</p>
                    </td>
                    <td class="px-4 sm:px-6 py-4">
                        <p class="text-sm font-semibold text-slate-900">${{ number_format($plan->price, 2) }}</p>
                        <p class="text-xs text-slate-500">/{{ $plan->billing_period }}</p>
                    </td>
                    <td class="px-4 sm:px-6 py-4 hidden md:table-cell text-sm text-slate-600">{{ count($plan->features ?? []) }} features</td>
                    <td class="px-4 sm:px-6 py-4">
                        <div class="flex flex-wrap gap-1">
                            @if($plan->is_active)<span class="px-2 py-0.5 text-xs font-medium bg-emerald-50 text-emerald-700 rounded-full">Active</span>@else<span class="px-2 py-0.5 text-xs font-medium bg-slate-100 text-slate-500 rounded-full">Inactive</span>@endif
                            @if($plan->is_popular)<span class="px-2 py-0.5 text-xs font-medium bg-blue-50 text-blue-700 rounded-full">Popular</span>@endif
                        </div>
                    </td>
                    <td class="px-4 sm:px-6 py-4 text-right">
                        <div class="inline-flex items-center gap-1">
                            <a href="{{ url('/admin/plans/' . $plan->id . '/edit') }}" class="px-3 py-1.5 text-xs text-blue-600 hover:bg-blue-50 rounded-lg transition font-medium">Edit</a>
                            <form method="POST" action="{{ url('/admin/plans/' . $plan->id) }}" onsubmit="return confirm('Delete this plan?');" class="inline">
                                @csrf @method('DELETE')
                                <button type="submit" class="px-3 py-1.5 text-xs text-red-600 hover:bg-red-50 rounded-lg transition font-medium">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr><td colspan="5" class="px-6 py-12 text-center text-slate-500">No plans yet. <a href="{{ url('/admin/plans/create') }}" class="text-blue-600 hover:underline">Create the first one</a>.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
