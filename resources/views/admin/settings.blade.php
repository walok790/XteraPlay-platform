@extends('admin.layouts.app')
@section('title', 'Settings')

@section('content')
<div class="mb-6">
    <h2 class="text-xl sm:text-2xl font-bold text-slate-900">Site Settings</h2>
    <p class="text-sm text-slate-600 mt-1">Configure global platform settings.</p>
</div>

<div class="space-y-4 sm:space-y-6 max-w-4xl">
    <!-- General -->
    <div class="bg-white border border-slate-200 rounded-2xl p-5 sm:p-6">
        <h3 class="text-base sm:text-lg font-semibold text-slate-900 mb-1">General</h3>
        <p class="text-sm text-slate-500 mb-5">Basic platform information.</p>
        <form class="space-y-4">
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1.5">Site Name</label>
                    <input type="text" value="XteraPlay" class="w-full px-3 py-2.5 bg-white border border-slate-300 rounded-lg text-sm text-slate-900 focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100 transition">
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1.5">Tagline</label>
                    <input type="text" value="Stream Terabox Videos Instantly" class="w-full px-3 py-2.5 bg-white border border-slate-300 rounded-lg text-sm text-slate-900 focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100 transition">
                </div>
            </div>
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1.5">Support Email</label>
                <input type="email" value="support@xteraplay.com" class="w-full px-3 py-2.5 bg-white border border-slate-300 rounded-lg text-sm text-slate-900 focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100 transition">
            </div>
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1.5">Description</label>
                <textarea rows="3" class="w-full px-3 py-2.5 bg-white border border-slate-300 rounded-lg text-sm text-slate-900 focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100 transition resize-none">Fast, secure Terabox video streaming and download platform.</textarea>
            </div>
        </form>
    </div>

    <!-- Free Plan -->
    <div class="bg-white border border-slate-200 rounded-2xl p-5 sm:p-6">
        <h3 class="text-base sm:text-lg font-semibold text-slate-900 mb-1">Free Plan Limits</h3>
        <p class="text-sm text-slate-500 mb-5">Configure limits for free users.</p>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1.5">Daily Search Credits</label>
                <input type="number" value="5" class="w-full px-3 py-2.5 bg-white border border-slate-300 rounded-lg text-sm text-slate-900 focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100 transition">
            </div>
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1.5">Max Video Quality</label>
                <select class="w-full px-3 py-2.5 bg-white border border-slate-300 rounded-lg text-sm text-slate-900 focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100 transition">
                    <option>720p</option>
                    <option>480p</option>
                    <option>360p</option>
                </select>
            </div>
        </div>
    </div>

    <!-- Features Toggle -->
    <div class="bg-white border border-slate-200 rounded-2xl p-5 sm:p-6">
        <h3 class="text-base sm:text-lg font-semibold text-slate-900 mb-1">Features</h3>
        <p class="text-sm text-slate-500 mb-5">Enable or disable platform features.</p>
        <div class="space-y-3">
            @foreach([['label'=>'User Registration', 'desc'=>'Allow new users to sign up', 'on'=>true], ['label'=>'Email Verification', 'desc'=>'Require email verification on signup', 'on'=>true], ['label'=>'API Access', 'desc'=>'Enable API for Enterprise users', 'on'=>true], ['label'=>'Maintenance Mode', 'desc'=>'Show maintenance page to all users', 'on'=>false]] as $f)
            <label class="flex items-start justify-between gap-3 p-3 hover:bg-slate-50 rounded-lg cursor-pointer">
                <div>
                    <p class="text-sm font-medium text-slate-900">{{ $f['label'] }}</p>
                    <p class="text-xs text-slate-500 mt-0.5">{{ $f['desc'] }}</p>
                </div>
                <div class="relative inline-flex items-center flex-shrink-0">
                    <input type="checkbox" {{ $f['on'] ? 'checked' : '' }} class="sr-only peer">
                    <div class="w-10 h-5.5 bg-slate-200 rounded-full peer-checked:bg-blue-600 transition"></div>
                    <div class="absolute left-0.5 top-0.5 w-4.5 h-4.5 bg-white rounded-full transition peer-checked:translate-x-4"></div>
                </div>
            </label>
            @endforeach
        </div>
    </div>

    <div class="flex justify-end gap-2">
        <button class="px-4 py-2 bg-white hover:bg-slate-50 border border-slate-300 text-slate-700 text-sm font-medium rounded-lg transition">Cancel</button>
        <button class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold rounded-lg shadow-sm shadow-blue-500/25 transition">Save Settings</button>
    </div>
</div>
@endsection
