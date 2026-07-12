@extends('admin.layouts.app')
@section('title', 'Users')
@section('content')
<div class="bg-[#1a1a1f] border border-[#2a2a30] rounded-xl">
    <div class="p-4 sm:p-6 border-b border-[#2a2a30] flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
        <h2 class="text-lg font-semibold text-white">All Users</h2>
        <input type="text" placeholder="Search users..." class="px-4 py-2 bg-[#111113] border border-[#2a2a30] rounded-lg text-sm text-white placeholder-gray-500 focus:outline-none focus:border-indigo-500 w-full sm:w-64">
    </div>
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead>
                <tr class="border-b border-[#2a2a30]">
                    <th class="text-left px-4 sm:px-6 py-3 text-xs font-medium text-gray-400 uppercase">ID</th>
                    <th class="text-left px-4 sm:px-6 py-3 text-xs font-medium text-gray-400 uppercase">Name</th>
                    <th class="text-left px-4 sm:px-6 py-3 text-xs font-medium text-gray-400 uppercase">Email</th>
                    <th class="text-left px-4 sm:px-6 py-3 text-xs font-medium text-gray-400 uppercase">Plan</th>
                    <th class="text-left px-4 sm:px-6 py-3 text-xs font-medium text-gray-400 uppercase">Status</th>
                    <th class="text-left px-4 sm:px-6 py-3 text-xs font-medium text-gray-400 uppercase">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-[#2a2a30]">
                <tr class="hover:bg-[#111113] transition">
                    <td class="px-4 sm:px-6 py-3 text-gray-300">1</td>
                    <td class="px-4 sm:px-6 py-3 text-white font-medium">John Doe</td>
                    <td class="px-4 sm:px-6 py-3 text-gray-300">john@example.com</td>
                    <td class="px-4 sm:px-6 py-3"><span class="px-2 py-0.5 bg-violet-500/10 text-violet-400 text-xs rounded-full">Premium</span></td>
                    <td class="px-4 sm:px-6 py-3"><span class="px-2 py-0.5 bg-green-500/10 text-green-400 text-xs rounded-full">Active</span></td>
                    <td class="px-4 sm:px-6 py-3"><button class="text-indigo-400 hover:text-indigo-300 text-xs">Edit</button></td>
                </tr>
                <tr class="hover:bg-[#111113] transition">
                    <td class="px-4 sm:px-6 py-3 text-gray-300">2</td>
                    <td class="px-4 sm:px-6 py-3 text-white font-medium">Sarah Smith</td>
                    <td class="px-4 sm:px-6 py-3 text-gray-300">sarah@example.com</td>
                    <td class="px-4 sm:px-6 py-3"><span class="px-2 py-0.5 bg-gray-500/10 text-gray-400 text-xs rounded-full">Free</span></td>
                    <td class="px-4 sm:px-6 py-3"><span class="px-2 py-0.5 bg-green-500/10 text-green-400 text-xs rounded-full">Active</span></td>
                    <td class="px-4 sm:px-6 py-3"><button class="text-indigo-400 hover:text-indigo-300 text-xs">Edit</button></td>
                </tr>
                <tr class="hover:bg-[#111113] transition">
                    <td class="px-4 sm:px-6 py-3 text-gray-300">3</td>
                    <td class="px-4 sm:px-6 py-3 text-white font-medium">Mike Wilson</td>
                    <td class="px-4 sm:px-6 py-3 text-gray-300">mike@example.com</td>
                    <td class="px-4 sm:px-6 py-3"><span class="px-2 py-0.5 bg-indigo-500/10 text-indigo-400 text-xs rounded-full">Pro</span></td>
                    <td class="px-4 sm:px-6 py-3"><span class="px-2 py-0.5 bg-red-500/10 text-red-400 text-xs rounded-full">Suspended</span></td>
                    <td class="px-4 sm:px-6 py-3"><button class="text-indigo-400 hover:text-indigo-300 text-xs">Edit</button></td>
                </tr>
                <tr class="hover:bg-[#111113] transition">
                    <td class="px-4 sm:px-6 py-3 text-gray-300">4</td>
                    <td class="px-4 sm:px-6 py-3 text-white font-medium">Emily Brown</td>
                    <td class="px-4 sm:px-6 py-3 text-gray-300">emily@example.com</td>
                    <td class="px-4 sm:px-6 py-3"><span class="px-2 py-0.5 bg-violet-500/10 text-violet-400 text-xs rounded-full">Premium</span></td>
                    <td class="px-4 sm:px-6 py-3"><span class="px-2 py-0.5 bg-green-500/10 text-green-400 text-xs rounded-full">Active</span></td>
                    <td class="px-4 sm:px-6 py-3"><button class="text-indigo-400 hover:text-indigo-300 text-xs">Edit</button></td>
                </tr>
                <tr class="hover:bg-[#111113] transition">
                    <td class="px-4 sm:px-6 py-3 text-gray-300">5</td>
                    <td class="px-4 sm:px-6 py-3 text-white font-medium">Demo User</td>
                    <td class="px-4 sm:px-6 py-3 text-gray-300">demo@xteraplay.com</td>
                    <td class="px-4 sm:px-6 py-3"><span class="px-2 py-0.5 bg-gray-500/10 text-gray-400 text-xs rounded-full">Free</span></td>
                    <td class="px-4 sm:px-6 py-3"><span class="px-2 py-0.5 bg-green-500/10 text-green-400 text-xs rounded-full">Active</span></td>
                    <td class="px-4 sm:px-6 py-3"><button class="text-indigo-400 hover:text-indigo-300 text-xs">Edit</button></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
