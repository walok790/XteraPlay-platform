@extends('admin.layouts.app')
@section('title', 'Subscriptions')

@section('content')
<div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 mb-6">
    <div>
        <h2 class="text-xl sm:text-2xl font-bold text-slate-900">Subscriptions</h2>
        <p class="text-sm text-slate-600 mt-1">Manage user subscriptions and plans.</p>
    </div>
    <select class="px-3 py-2 bg-white border border-slate-300 rounded-lg text-sm text-slate-700 focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100 transition self-start sm:self-auto">
        <option>All plans</option>
        <option>Free</option>
        <option>Pro</option>
        <option>Enterprise</option>
    </select>
</div>

<div class="grid grid-cols-1 sm:grid-cols-3 gap-3 sm:gap-4 mb-6">
    <div class="bg-white border border-slate-200 rounded-2xl p-5">
        <p class="text-xs text-slate-500 uppercase tracking-wide mb-2">Free Plans</p>
        <p class="text-2xl sm:text-3xl font-bold text-slate-900">2,081</p>
        <p class="text-xs text-emerald-600 mt-1 font-medium">+12% this month</p>
    </div>
    <div class="bg-white border-2 border-blue-200 rounded-2xl p-5">
        <p class="text-xs text-blue-600 uppercase tracking-wide mb-2 font-semibold">Pro Plans</p>
        <p class="text-2xl sm:text-3xl font-bold text-slate-900">347</p>
        <p class="text-xs text-emerald-600 mt-1 font-medium">+24% this month</p>
    </div>
    <div class="bg-white border border-slate-200 rounded-2xl p-5">
        <p class="text-xs text-slate-500 uppercase tracking-wide mb-2">Enterprise Plans</p>
        <p class="text-2xl sm:text-3xl font-bold text-slate-900">53</p>
        <p class="text-xs text-emerald-600 mt-1 font-medium">+8% this month</p>
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
                    <th class="text-left px-4 sm:px-6 py-3 text-xs font-semibold text-slate-500 uppercase tracking-wide hidden lg:table-cell">Renews</th>
                    <th class="text-left px-4 sm:px-6 py-3 text-xs font-semibold text-slate-500 uppercase tracking-wide">Status</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @foreach([['user'=>'Sarah M.', 'email'=>'sarah@example.com', 'plan'=>'Pro', 'amount'=>'$9', 'start'=>'Jan 1, 2025', 'renew'=>'Feb 1, 2025', 'status'=>'Active'], ['user'=>'Ahmed T.', 'email'=>'ahmed@example.com', 'plan'=>'Enterprise', 'amount'=>'$29', 'start'=>'Dec 15, 2024', 'renew'=>'Jan 15, 2025', 'status'=>'Active'], ['user'=>'Michael L.', 'email'=>'michael@example.com', 'plan'=>'Pro', 'amount'=>'$9', 'start'=>'Nov 20, 2024', 'renew'=>'Feb 20, 2025', 'status'=>'Active'], ['user'=>'Emma R.', 'email'=>'emma@example.com', 'plan'=>'Pro', 'amount'=>'$9', 'start'=>'Nov 5, 2024', 'renew'=>'Feb 5, 2025', 'status'=>'Cancelled']] as $s)
                <tr class="hover:bg-slate-50">
                    <td class="px-4 sm:px-6 py-4">
                        <p class="text-sm font-medium text-slate-900">{{ $s['user'] }}</p>
                        <p class="text-xs text-slate-500">{{ $s['email'] }}</p>
                    </td>
                    <td class="px-4 sm:px-6 py-4">
                        <p class="text-sm font-medium text-slate-900">{{ $s['plan'] }}</p>
                        <p class="text-xs text-slate-500">{{ $s['amount'] }}/mo</p>
                    </td>
                    <td class="px-4 sm:px-6 py-4 hidden md:table-cell text-sm text-slate-600">{{ $s['start'] }}</td>
                    <td class="px-4 sm:px-6 py-4 hidden lg:table-cell text-sm text-slate-600">{{ $s['renew'] }}</td>
                    <td class="px-4 sm:px-6 py-4">
                        <span class="inline-flex px-2 py-0.5 text-xs font-medium rounded-full {{ $s['status']==='Active' ? 'bg-emerald-50 text-emerald-700' : 'bg-slate-100 text-slate-600' }}">{{ $s['status'] }}</span>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
