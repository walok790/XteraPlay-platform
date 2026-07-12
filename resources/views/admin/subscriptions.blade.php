@extends('admin.layouts.app')
@section('title', 'Subscriptions')
@section('content')
<div class="bg-[#1a1a1f] border border-[#2a2a30] rounded-xl">
    <div class="p-4 sm:p-6 border-b border-[#2a2a30]">
        <h2 class="text-lg font-semibold text-white">Subscription Management</h2>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead>
                <tr class="border-b border-[#2a2a30]">
                    <th class="text-left px-4 sm:px-6 py-3 text-xs font-medium text-gray-400 uppercase">User</th>
                    <th class="text-left px-4 sm:px-6 py-3 text-xs font-medium text-gray-400 uppercase">Plan</th>
                    <th class="text-left px-4 sm:px-6 py-3 text-xs font-medium text-gray-400 uppercase">Amount</th>
                    <th class="text-left px-4 sm:px-6 py-3 text-xs font-medium text-gray-400 uppercase">Start Date</th>
                    <th class="text-left px-4 sm:px-6 py-3 text-xs font-medium text-gray-400 uppercase">Expires</th>
                    <th class="text-left px-4 sm:px-6 py-3 text-xs font-medium text-gray-400 uppercase">Status</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-[#2a2a30]">
                <tr class="hover:bg-[#111113] transition">
                    <td class="px-4 sm:px-6 py-3 text-white">John Doe</td>
                    <td class="px-4 sm:px-6 py-3"><span class="px-2 py-0.5 bg-violet-500/10 text-violet-400 text-xs rounded-full">Premium</span></td>
                    <td class="px-4 sm:px-6 py-3 text-gray-300">$9.99/mo</td>
                    <td class="px-4 sm:px-6 py-3 text-gray-300">Jan 15, 2024</td>
                    <td class="px-4 sm:px-6 py-3 text-gray-300">Feb 15, 2024</td>
                    <td class="px-4 sm:px-6 py-3"><span class="px-2 py-0.5 bg-green-500/10 text-green-400 text-xs rounded-full">Active</span></td>
                </tr>
                <tr class="hover:bg-[#111113] transition">
                    <td class="px-4 sm:px-6 py-3 text-white">Mike Wilson</td>
                    <td class="px-4 sm:px-6 py-3"><span class="px-2 py-0.5 bg-indigo-500/10 text-indigo-400 text-xs rounded-full">Pro</span></td>
                    <td class="px-4 sm:px-6 py-3 text-gray-300">$4.99/mo</td>
                    <td class="px-4 sm:px-6 py-3 text-gray-300">Dec 01, 2023</td>
                    <td class="px-4 sm:px-6 py-3 text-gray-300">Jan 01, 2024</td>
                    <td class="px-4 sm:px-6 py-3"><span class="px-2 py-0.5 bg-yellow-500/10 text-yellow-400 text-xs rounded-full">Expiring</span></td>
                </tr>
                <tr class="hover:bg-[#111113] transition">
                    <td class="px-4 sm:px-6 py-3 text-white">Emily Brown</td>
                    <td class="px-4 sm:px-6 py-3"><span class="px-2 py-0.5 bg-violet-500/10 text-violet-400 text-xs rounded-full">Premium</span></td>
                    <td class="px-4 sm:px-6 py-3 text-gray-300">$9.99/mo</td>
                    <td class="px-4 sm:px-6 py-3 text-gray-300">Jan 20, 2024</td>
                    <td class="px-4 sm:px-6 py-3 text-gray-300">Feb 20, 2024</td>
                    <td class="px-4 sm:px-6 py-3"><span class="px-2 py-0.5 bg-green-500/10 text-green-400 text-xs rounded-full">Active</span></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
