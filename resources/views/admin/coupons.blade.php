@extends('admin.layouts.app')
@section('title', 'Coupons')
@section('content')
<div class="bg-[#1a1a1f] border border-[#2a2a30] rounded-xl">
    <div class="p-4 sm:p-6 border-b border-[#2a2a30] flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
        <h2 class="text-lg font-semibold text-white">Coupon Codes</h2>
        <button class="px-4 py-2 bg-gradient-to-r from-indigo-500 to-violet-600 text-white text-sm font-medium rounded-lg hover:from-indigo-600 hover:to-violet-700 transition">Create Coupon</button>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead>
                <tr class="border-b border-[#2a2a30]">
                    <th class="text-left px-4 sm:px-6 py-3 text-xs font-medium text-gray-400 uppercase">Code</th>
                    <th class="text-left px-4 sm:px-6 py-3 text-xs font-medium text-gray-400 uppercase">Discount</th>
                    <th class="text-left px-4 sm:px-6 py-3 text-xs font-medium text-gray-400 uppercase">Uses</th>
                    <th class="text-left px-4 sm:px-6 py-3 text-xs font-medium text-gray-400 uppercase">Expires</th>
                    <th class="text-left px-4 sm:px-6 py-3 text-xs font-medium text-gray-400 uppercase">Status</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-[#2a2a30]">
                <tr class="hover:bg-[#111113] transition">
                    <td class="px-4 sm:px-6 py-3 text-white font-mono">WELCOME20</td>
                    <td class="px-4 sm:px-6 py-3 text-gray-300">20%</td>
                    <td class="px-4 sm:px-6 py-3 text-gray-300">45 / 100</td>
                    <td class="px-4 sm:px-6 py-3 text-gray-300">Mar 31, 2024</td>
                    <td class="px-4 sm:px-6 py-3"><span class="px-2 py-0.5 bg-green-500/10 text-green-400 text-xs rounded-full">Active</span></td>
                </tr>
                <tr class="hover:bg-[#111113] transition">
                    <td class="px-4 sm:px-6 py-3 text-white font-mono">PREMIUM50</td>
                    <td class="px-4 sm:px-6 py-3 text-gray-300">50%</td>
                    <td class="px-4 sm:px-6 py-3 text-gray-300">12 / 50</td>
                    <td class="px-4 sm:px-6 py-3 text-gray-300">Feb 28, 2024</td>
                    <td class="px-4 sm:px-6 py-3"><span class="px-2 py-0.5 bg-green-500/10 text-green-400 text-xs rounded-full">Active</span></td>
                </tr>
                <tr class="hover:bg-[#111113] transition">
                    <td class="px-4 sm:px-6 py-3 text-white font-mono">NEWYEAR24</td>
                    <td class="px-4 sm:px-6 py-3 text-gray-300">30%</td>
                    <td class="px-4 sm:px-6 py-3 text-gray-300">100 / 100</td>
                    <td class="px-4 sm:px-6 py-3 text-gray-300">Jan 15, 2024</td>
                    <td class="px-4 sm:px-6 py-3"><span class="px-2 py-0.5 bg-red-500/10 text-red-400 text-xs rounded-full">Expired</span></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
