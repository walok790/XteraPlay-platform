@extends('admin.layouts.app')
@section('title', 'Support Tickets')

@section('content')
<div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 mb-6">
    <div>
        <h2 class="text-xl sm:text-2xl font-bold text-slate-900">Support Tickets</h2>
        <p class="text-sm text-slate-600 mt-1">Respond to user support requests.</p>
    </div>
    <div class="flex items-center gap-2">
        <select class="px-3 py-2 bg-white border border-slate-300 rounded-lg text-sm text-slate-700 focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100 transition">
            <option>All statuses</option>
            <option>Open</option>
            <option>Pending</option>
            <option>Resolved</option>
        </select>
        <select class="px-3 py-2 bg-white border border-slate-300 rounded-lg text-sm text-slate-700 focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100 transition">
            <option>All priorities</option>
            <option>High</option>
            <option>Medium</option>
            <option>Low</option>
        </select>
    </div>
</div>

<!-- Stats -->
<div class="grid grid-cols-2 sm:grid-cols-4 gap-3 sm:gap-4 mb-6">
    <div class="bg-white border border-slate-200 rounded-2xl p-4 sm:p-5">
        <p class="text-xs text-slate-500 uppercase tracking-wide mb-1">Open</p>
        <p class="text-2xl sm:text-3xl font-bold text-blue-600">12</p>
    </div>
    <div class="bg-white border border-slate-200 rounded-2xl p-4 sm:p-5">
        <p class="text-xs text-slate-500 uppercase tracking-wide mb-1">Pending</p>
        <p class="text-2xl sm:text-3xl font-bold text-amber-600">5</p>
    </div>
    <div class="bg-white border border-slate-200 rounded-2xl p-4 sm:p-5">
        <p class="text-xs text-slate-500 uppercase tracking-wide mb-1">Resolved</p>
        <p class="text-2xl sm:text-3xl font-bold text-emerald-600">168</p>
    </div>
    <div class="bg-white border border-slate-200 rounded-2xl p-4 sm:p-5">
        <p class="text-xs text-slate-500 uppercase tracking-wide mb-1">Avg. Response</p>
        <p class="text-2xl sm:text-3xl font-bold text-slate-900">2h</p>
    </div>
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
                @foreach([['id'=>'#T-1024', 'title'=>'Video not loading after paste', 'user'=>'Rahul K.', 'cat'=>'Bug Report', 'priority'=>'High', 'status'=>'Open'], ['id'=>'#T-1023', 'title'=>'Payment failed but was charged', 'user'=>'Sarah M.', 'cat'=>'Billing', 'priority'=>'High', 'status'=>'Pending'], ['id'=>'#T-1022', 'title'=>'How do I upgrade my plan?', 'user'=>'Priya S.', 'cat'=>'Account', 'priority'=>'Low', 'status'=>'Open'], ['id'=>'#T-1021', 'title'=>'Request: Dark mode toggle', 'user'=>'Michael L.', 'cat'=>'Feature Request', 'priority'=>'Medium', 'status'=>'Resolved']] as $t)
                <tr class="hover:bg-slate-50">
                    <td class="px-4 sm:px-6 py-4">
                        <p class="text-sm font-medium text-slate-900">{{ $t['title'] }}</p>
                        <p class="text-xs text-slate-500 mt-0.5">{{ $t['id'] }} · {{ $t['user'] }}</p>
                    </td>
                    <td class="px-4 sm:px-6 py-4 hidden md:table-cell text-sm text-slate-600">{{ $t['cat'] }}</td>
                    <td class="px-4 sm:px-6 py-4 hidden lg:table-cell">
                        @php $pc = $t['priority']==='High' ? 'bg-red-50 text-red-700' : ($t['priority']==='Medium' ? 'bg-amber-50 text-amber-700' : 'bg-slate-100 text-slate-600'); @endphp
                        <span class="inline-flex px-2 py-0.5 text-xs font-medium rounded-full {{ $pc }}">{{ $t['priority'] }}</span>
                    </td>
                    <td class="px-4 sm:px-6 py-4">
                        @php $sc = $t['status']==='Open' ? 'bg-blue-50 text-blue-700' : ($t['status']==='Pending' ? 'bg-amber-50 text-amber-700' : 'bg-emerald-50 text-emerald-700'); @endphp
                        <span class="inline-flex px-2 py-0.5 text-xs font-medium rounded-full {{ $sc }}">{{ $t['status'] }}</span>
                    </td>
                    <td class="px-4 sm:px-6 py-4 text-right">
                        <button class="text-sm text-blue-600 hover:text-blue-700 font-medium">Reply</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
