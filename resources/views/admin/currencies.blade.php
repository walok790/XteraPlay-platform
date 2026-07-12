@extends('admin.layouts.app')
@section('title', 'Currencies')
@section('content')
<div class="bg-[#1a1a1f] border border-[#2a2a30] rounded-xl">
    <div class="p-4 sm:p-6 border-b border-[#2a2a30] flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
        <h2 class="text-lg font-semibold text-white">Currency Settings</h2>
        <button class="px-4 py-2 bg-gradient-to-r from-indigo-500 to-violet-600 text-white text-sm font-medium rounded-lg hover:from-indigo-600 hover:to-violet-700 transition">Add Currency</button>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead>
                <tr class="border-b border-[#2a2a30]">
                    <th class="text-left px-4 sm:px-6 py-3 text-xs font-medium text-gray-400 uppercase">Code</th>
                    <th class="text-left px-4 sm:px-6 py-3 text-xs font-medium text-gray-400 uppercase">Name</th>
                    <th class="text-left px-4 sm:px-6 py-3 text-xs font-medium text-gray-400 uppercase">Symbol</th>
                    <th class="text-left px-4 sm:px-6 py-3 text-xs font-medium text-gray-400 uppercase">Rate (USD)</th>
                    <th class="text-left px-4 sm:px-6 py-3 text-xs font-medium text-gray-400 uppercase">Status</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-[#2a2a30]">
                <tr class="hover:bg-[#111113] transition">
                    <td class="px-4 sm:px-6 py-3 text-white font-mono">USD</td>
                    <td class="px-4 sm:px-6 py-3 text-gray-300">US Dollar</td>
                    <td class="px-4 sm:px-6 py-3 text-gray-300">$</td>
                    <td class="px-4 sm:px-6 py-3 text-gray-300">1.00</td>
                    <td class="px-4 sm:px-6 py-3"><span class="px-2 py-0.5 bg-green-500/10 text-green-400 text-xs rounded-full">Default</span></td>
                </tr>
                <tr class="hover:bg-[#111113] transition">
                    <td class="px-4 sm:px-6 py-3 text-white font-mono">EUR</td>
                    <td class="px-4 sm:px-6 py-3 text-gray-300">Euro</td>
                    <td class="px-4 sm:px-6 py-3 text-gray-300">&euro;</td>
                    <td class="px-4 sm:px-6 py-3 text-gray-300">0.92</td>
                    <td class="px-4 sm:px-6 py-3"><span class="px-2 py-0.5 bg-green-500/10 text-green-400 text-xs rounded-full">Active</span></td>
                </tr>
                <tr class="hover:bg-[#111113] transition">
                    <td class="px-4 sm:px-6 py-3 text-white font-mono">GBP</td>
                    <td class="px-4 sm:px-6 py-3 text-gray-300">British Pound</td>
                    <td class="px-4 sm:px-6 py-3 text-gray-300">&pound;</td>
                    <td class="px-4 sm:px-6 py-3 text-gray-300">0.79</td>
                    <td class="px-4 sm:px-6 py-3"><span class="px-2 py-0.5 bg-green-500/10 text-green-400 text-xs rounded-full">Active</span></td>
                </tr>
                <tr class="hover:bg-[#111113] transition">
                    <td class="px-4 sm:px-6 py-3 text-white font-mono">INR</td>
                    <td class="px-4 sm:px-6 py-3 text-gray-300">Indian Rupee</td>
                    <td class="px-4 sm:px-6 py-3 text-gray-300">&#8377;</td>
                    <td class="px-4 sm:px-6 py-3 text-gray-300">83.12</td>
                    <td class="px-4 sm:px-6 py-3"><span class="px-2 py-0.5 bg-green-500/10 text-green-400 text-xs rounded-full">Active</span></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
