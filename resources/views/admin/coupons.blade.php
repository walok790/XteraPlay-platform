@extends('admin.layouts.app')
@section('title', 'Coupons')

@section('content')
<div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 mb-6">
    <div>
        <h2 class="text-xl sm:text-2xl font-bold text-slate-900">Coupons</h2>
        <p class="text-sm text-slate-600 mt-1">Create and manage discount codes.</p>
    </div>
    <button class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-lg shadow-sm shadow-blue-500/25 transition self-start sm:self-auto flex items-center gap-1.5">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
        Create Coupon
    </button>
</div>

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
                    <th class="text-right px-4 sm:px-6 py-3 text-xs font-semibold text-slate-500 uppercase tracking-wide">Action</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @foreach([['code'=>'WELCOME25', 'discount'=>'25% off', 'used'=>'142/500', 'expires'=>'Feb 28, 2025', 'status'=>'Active'], ['code'=>'BLACKFRIDAY', 'discount'=>'50% off', 'used'=>'890/1000', 'expires'=>'Dec 31, 2024', 'status'=>'Expired'], ['code'=>'NEWYEAR2025', 'discount'=>'30% off', 'used'=>'56/200', 'expires'=>'Jan 31, 2025', 'status'=>'Active'], ['code'=>'SUMMERPRO', 'discount'=>'$5 off', 'used'=>'0/100', 'expires'=>'Jun 30, 2025', 'status'=>'Scheduled']] as $c)
                <tr class="hover:bg-slate-50">
                    <td class="px-4 sm:px-6 py-4">
                        <code class="px-2 py-1 bg-slate-100 text-slate-900 text-xs font-mono font-semibold rounded">{{ $c['code'] }}</code>
                    </td>
                    <td class="px-4 sm:px-6 py-4"><span class="text-sm font-semibold text-blue-600">{{ $c['discount'] }}</span></td>
                    <td class="px-4 sm:px-6 py-4 hidden md:table-cell text-sm text-slate-700">{{ $c['used'] }}</td>
                    <td class="px-4 sm:px-6 py-4 hidden lg:table-cell text-sm text-slate-600">{{ $c['expires'] }}</td>
                    <td class="px-4 sm:px-6 py-4">
                        @php $sc = $c['status']==='Active' ? 'bg-emerald-50 text-emerald-700' : ($c['status']==='Scheduled' ? 'bg-blue-50 text-blue-700' : 'bg-slate-100 text-slate-600'); @endphp
                        <span class="inline-flex px-2 py-0.5 text-xs font-medium rounded-full {{ $sc }}">{{ $c['status'] }}</span>
                    </td>
                    <td class="px-4 sm:px-6 py-4 text-right">
                        <button class="text-sm text-blue-600 hover:text-blue-700 font-medium">Edit</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
