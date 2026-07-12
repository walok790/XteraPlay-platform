@extends('admin.layouts.app')
@section('title', 'Currencies')

@section('content')
<div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 mb-6" x-data="{ showAdd: false }">
    <div>
        <h2 class="text-xl sm:text-2xl font-bold text-slate-900">Currencies</h2>
        <p class="text-sm text-slate-600 mt-1">Manage supported currencies and exchange rates.</p>
    </div>
    <button @click="showAdd = !showAdd" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-lg shadow-sm shadow-blue-500/25 transition self-start sm:self-auto flex items-center gap-1.5">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
        <span x-text="showAdd ? 'Cancel' : 'Add Currency'"></span>
    </button>
</div>

@if(session('status'))
    <div class="mb-4 p-3 bg-emerald-50 border border-emerald-200 rounded-lg text-sm text-emerald-700">{{ session('status') }}</div>
@endif

<div x-data="{ showAdd: false }" x-show="showAdd" x-cloak class="bg-white border border-slate-200 rounded-2xl p-5 sm:p-6 mb-4">
    <h3 class="text-base font-semibold text-slate-900 mb-4">Add Currency</h3>
    <form method="POST" action="{{ url('/admin/currencies') }}" class="grid grid-cols-2 sm:grid-cols-6 gap-3">
        @csrf
        <input type="text" name="code" required maxlength="3" placeholder="USD" class="col-span-1 uppercase px-3 py-2 bg-white border border-slate-300 rounded-lg text-sm focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100">
        <input type="text" name="name" required placeholder="US Dollar" class="col-span-2 sm:col-span-2 px-3 py-2 bg-white border border-slate-300 rounded-lg text-sm focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100">
        <input type="text" name="symbol" required maxlength="5" placeholder="$" class="col-span-1 px-3 py-2 bg-white border border-slate-300 rounded-lg text-sm focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100">
        <input type="number" name="exchange_rate" required step="0.000001" min="0" placeholder="1.0" class="col-span-1 px-3 py-2 bg-white border border-slate-300 rounded-lg text-sm focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100">
        <button type="submit" class="col-span-1 px-3 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-lg">Add</button>
    </form>
</div>

<div class="bg-white border border-slate-200 rounded-2xl overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead class="bg-slate-50 border-b border-slate-200">
                <tr>
                    <th class="text-left px-4 sm:px-6 py-3 text-xs font-semibold text-slate-500 uppercase tracking-wide">Currency</th>
                    <th class="text-left px-4 sm:px-6 py-3 text-xs font-semibold text-slate-500 uppercase tracking-wide hidden sm:table-cell">Symbol</th>
                    <th class="text-left px-4 sm:px-6 py-3 text-xs font-semibold text-slate-500 uppercase tracking-wide hidden md:table-cell">Rate (USD)</th>
                    <th class="text-left px-4 sm:px-6 py-3 text-xs font-semibold text-slate-500 uppercase tracking-wide">Status</th>
                    <th class="text-right px-4 sm:px-6 py-3 text-xs font-semibold text-slate-500 uppercase tracking-wide">Action</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @foreach($currencies as $c)
                <tr class="hover:bg-slate-50">
                    <td class="px-4 sm:px-6 py-4">
                        <div class="flex items-center gap-3">
                            <span class="text-xl">{{ $c->flag_emoji ?? '🌐' }}</span>
                            <div>
                                <p class="text-sm font-medium text-slate-900">{{ $c->name }} <code class="ml-1 text-xs text-slate-500">{{ $c->code }}</code></p>
                                @if($c->is_default)<span class="text-xs text-blue-600 font-medium">Default</span>@endif
                            </div>
                        </div>
                    </td>
                    <td class="px-4 sm:px-6 py-4 hidden sm:table-cell text-sm font-semibold text-slate-900">{{ $c->symbol }}</td>
                    <td class="px-4 sm:px-6 py-4 hidden md:table-cell text-sm text-slate-700">{{ number_format($c->exchange_rate, 4) }}</td>
                    <td class="px-4 sm:px-6 py-4"><span class="inline-flex px-2 py-0.5 text-xs font-medium rounded-full {{ $c->is_active ? 'bg-emerald-50 text-emerald-700' : 'bg-slate-100 text-slate-600' }}">{{ $c->is_active ? 'Active' : 'Disabled' }}</span></td>
                    <td class="px-4 sm:px-6 py-4 text-right">
                        @if(! $c->is_default)
                        <form method="POST" action="{{ url('/admin/currencies/' . $c->id) }}" onsubmit="return confirm('Delete this currency?');" class="inline">
                            @csrf @method('DELETE')
                            <button type="submit" class="text-sm text-red-600 hover:text-red-700 font-medium">Delete</button>
                        </form>
                        @else
                        <span class="text-xs text-slate-400">—</span>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
