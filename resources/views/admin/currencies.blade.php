@extends('admin.layouts.app')
@section('title', 'Currencies')

@section('content')
<div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 mb-6">
    <div>
        <h2 class="text-xl sm:text-2xl font-bold text-slate-900">Currencies</h2>
        <p class="text-sm text-slate-600 mt-1">Manage supported currencies and exchange rates.</p>
    </div>
    <button class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-lg shadow-sm shadow-blue-500/25 transition self-start sm:self-auto flex items-center gap-1.5">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
        Add Currency
    </button>
</div>

<div class="bg-white border border-slate-200 rounded-2xl overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead class="bg-slate-50 border-b border-slate-200">
                <tr>
                    <th class="text-left px-4 sm:px-6 py-3 text-xs font-semibold text-slate-500 uppercase tracking-wide">Currency</th>
                    <th class="text-left px-4 sm:px-6 py-3 text-xs font-semibold text-slate-500 uppercase tracking-wide">Code</th>
                    <th class="text-left px-4 sm:px-6 py-3 text-xs font-semibold text-slate-500 uppercase tracking-wide hidden md:table-cell">Symbol</th>
                    <th class="text-left px-4 sm:px-6 py-3 text-xs font-semibold text-slate-500 uppercase tracking-wide hidden lg:table-cell">Rate (USD)</th>
                    <th class="text-left px-4 sm:px-6 py-3 text-xs font-semibold text-slate-500 uppercase tracking-wide">Status</th>
                    <th class="text-right px-4 sm:px-6 py-3 text-xs font-semibold text-slate-500 uppercase tracking-wide">Action</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @foreach([['flag'=>'🇺🇸', 'name'=>'US Dollar', 'code'=>'USD', 'symbol'=>'$', 'rate'=>'1.00', 'default'=>true, 'active'=>true], ['flag'=>'🇪🇺', 'name'=>'Euro', 'code'=>'EUR', 'symbol'=>'€', 'rate'=>'0.92', 'default'=>false, 'active'=>true], ['flag'=>'🇬🇧', 'name'=>'British Pound', 'code'=>'GBP', 'symbol'=>'£', 'rate'=>'0.79', 'default'=>false, 'active'=>true], ['flag'=>'🇮🇳', 'name'=>'Indian Rupee', 'code'=>'INR', 'symbol'=>'₹', 'rate'=>'83.21', 'default'=>false, 'active'=>true], ['flag'=>'🇦🇺', 'name'=>'Australian Dollar', 'code'=>'AUD', 'symbol'=>'A$', 'rate'=>'1.52', 'default'=>false, 'active'=>false]] as $c)
                <tr class="hover:bg-slate-50">
                    <td class="px-4 sm:px-6 py-4">
                        <div class="flex items-center gap-3">
                            <span class="text-xl">{{ $c['flag'] }}</span>
                            <div>
                                <p class="text-sm font-medium text-slate-900">{{ $c['name'] }}</p>
                                @if($c['default'])<span class="text-xs text-blue-600 font-medium">Default</span>@endif
                            </div>
                        </div>
                    </td>
                    <td class="px-4 sm:px-6 py-4"><code class="text-sm font-mono text-slate-700">{{ $c['code'] }}</code></td>
                    <td class="px-4 sm:px-6 py-4 hidden md:table-cell text-sm font-semibold text-slate-900">{{ $c['symbol'] }}</td>
                    <td class="px-4 sm:px-6 py-4 hidden lg:table-cell text-sm text-slate-700">{{ $c['rate'] }}</td>
                    <td class="px-4 sm:px-6 py-4">
                        <span class="inline-flex px-2 py-0.5 text-xs font-medium rounded-full {{ $c['active'] ? 'bg-emerald-50 text-emerald-700' : 'bg-slate-100 text-slate-600' }}">{{ $c['active'] ? 'Active' : 'Disabled' }}</span>
                    </td>
                    <td class="px-4 sm:px-6 py-4 text-right"><button class="text-sm text-blue-600 hover:text-blue-700 font-medium">Edit</button></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
