@extends('admin.layouts.app')
@section('title', 'Settings')
@section('content')
<div class="bg-[#1a1a1f] border border-[#2a2a30] rounded-xl p-4 sm:p-6">
    <h2 class="text-lg font-semibold text-white mb-6">Site Settings</h2>
    <form class="space-y-6 max-w-2xl">
        <div>
            <label class="block text-sm font-medium text-gray-300 mb-1">Site Name</label>
            <input type="text" value="XteraPlay" class="w-full px-4 py-2.5 bg-[#111113] border border-[#2a2a30] rounded-lg text-white text-sm focus:outline-none focus:border-indigo-500">
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-300 mb-1">Site Description</label>
            <textarea rows="3" class="w-full px-4 py-2.5 bg-[#111113] border border-[#2a2a30] rounded-lg text-white text-sm focus:outline-none focus:border-indigo-500">Stream and download your favorite videos from Terabox with ease.</textarea>
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-300 mb-1">Support Email</label>
            <input type="email" value="support@xteraplay.com" class="w-full px-4 py-2.5 bg-[#111113] border border-[#2a2a30] rounded-lg text-white text-sm focus:outline-none focus:border-indigo-500">
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-300 mb-1">Default Currency</label>
            <select class="w-full px-4 py-2.5 bg-[#111113] border border-[#2a2a30] rounded-lg text-white text-sm focus:outline-none focus:border-indigo-500">
                <option>USD - US Dollar</option>
                <option>EUR - Euro</option>
                <option>GBP - British Pound</option>
                <option>INR - Indian Rupee</option>
            </select>
        </div>
        <div class="flex items-center justify-between p-4 bg-[#111113] border border-[#2a2a30] rounded-lg">
            <div>
                <p class="text-sm text-white font-medium">Maintenance Mode</p>
                <p class="text-xs text-gray-400">Disable public access to the site</p>
            </div>
            <button type="button" class="w-11 h-6 bg-[#2a2a30] rounded-full relative transition">
                <span class="w-4 h-4 bg-gray-400 rounded-full absolute top-1 left-1 transition"></span>
            </button>
        </div>
        <div>
            <button type="button" class="px-6 py-2.5 bg-gradient-to-r from-indigo-500 to-violet-600 text-white text-sm font-medium rounded-lg hover:from-indigo-600 hover:to-violet-700 transition">Save Settings</button>
        </div>
    </form>
</div>
@endsection
