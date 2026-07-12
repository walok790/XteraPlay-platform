@extends('admin.layouts.app')
@section('title', 'Support Tickets')
@section('content')
<div class="bg-[#1a1a1f] border border-[#2a2a30] rounded-xl">
    <div class="p-4 sm:p-6 border-b border-[#2a2a30]">
        <h2 class="text-lg font-semibold text-white">Support Tickets</h2>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead>
                <tr class="border-b border-[#2a2a30]">
                    <th class="text-left px-4 sm:px-6 py-3 text-xs font-medium text-gray-400 uppercase">ID</th>
                    <th class="text-left px-4 sm:px-6 py-3 text-xs font-medium text-gray-400 uppercase">Subject</th>
                    <th class="text-left px-4 sm:px-6 py-3 text-xs font-medium text-gray-400 uppercase">User</th>
                    <th class="text-left px-4 sm:px-6 py-3 text-xs font-medium text-gray-400 uppercase">Priority</th>
                    <th class="text-left px-4 sm:px-6 py-3 text-xs font-medium text-gray-400 uppercase">Status</th>
                    <th class="text-left px-4 sm:px-6 py-3 text-xs font-medium text-gray-400 uppercase">Created</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-[#2a2a30]">
                <tr class="hover:bg-[#111113] transition">
                    <td class="px-4 sm:px-6 py-3 text-gray-300">#1045</td>
                    <td class="px-4 sm:px-6 py-3 text-white">Payment not processed</td>
                    <td class="px-4 sm:px-6 py-3 text-gray-300">john@example.com</td>
                    <td class="px-4 sm:px-6 py-3"><span class="px-2 py-0.5 bg-red-500/10 text-red-400 text-xs rounded-full">High</span></td>
                    <td class="px-4 sm:px-6 py-3"><span class="px-2 py-0.5 bg-yellow-500/10 text-yellow-400 text-xs rounded-full">Open</span></td>
                    <td class="px-4 sm:px-6 py-3 text-gray-300">Jan 22, 2024</td>
                </tr>
                <tr class="hover:bg-[#111113] transition">
                    <td class="px-4 sm:px-6 py-3 text-gray-300">#1044</td>
                    <td class="px-4 sm:px-6 py-3 text-white">Download speed slow</td>
                    <td class="px-4 sm:px-6 py-3 text-gray-300">sarah@example.com</td>
                    <td class="px-4 sm:px-6 py-3"><span class="px-2 py-0.5 bg-yellow-500/10 text-yellow-400 text-xs rounded-full">Medium</span></td>
                    <td class="px-4 sm:px-6 py-3"><span class="px-2 py-0.5 bg-indigo-500/10 text-indigo-400 text-xs rounded-full">In Progress</span></td>
                    <td class="px-4 sm:px-6 py-3 text-gray-300">Jan 21, 2024</td>
                </tr>
                <tr class="hover:bg-[#111113] transition">
                    <td class="px-4 sm:px-6 py-3 text-gray-300">#1043</td>
                    <td class="px-4 sm:px-6 py-3 text-white">Cannot access premium features</td>
                    <td class="px-4 sm:px-6 py-3 text-gray-300">mike@example.com</td>
                    <td class="px-4 sm:px-6 py-3"><span class="px-2 py-0.5 bg-red-500/10 text-red-400 text-xs rounded-full">High</span></td>
                    <td class="px-4 sm:px-6 py-3"><span class="px-2 py-0.5 bg-yellow-500/10 text-yellow-400 text-xs rounded-full">Open</span></td>
                    <td class="px-4 sm:px-6 py-3 text-gray-300">Jan 20, 2024</td>
                </tr>
                <tr class="hover:bg-[#111113] transition">
                    <td class="px-4 sm:px-6 py-3 text-gray-300">#1042</td>
                    <td class="px-4 sm:px-6 py-3 text-white">Account deletion request</td>
                    <td class="px-4 sm:px-6 py-3 text-gray-300">emily@example.com</td>
                    <td class="px-4 sm:px-6 py-3"><span class="px-2 py-0.5 bg-gray-500/10 text-gray-400 text-xs rounded-full">Low</span></td>
                    <td class="px-4 sm:px-6 py-3"><span class="px-2 py-0.5 bg-green-500/10 text-green-400 text-xs rounded-full">Resolved</span></td>
                    <td class="px-4 sm:px-6 py-3 text-gray-300">Jan 18, 2024</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
