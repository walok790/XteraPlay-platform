@extends('admin.layouts.app')
@section('title', 'System Info')

@section('content')
<div class="mb-6">
    <h2 class="text-xl sm:text-2xl font-bold text-slate-900">System Information</h2>
    <p class="text-sm text-slate-600 mt-1">Server environment and platform details.</p>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 gap-4 sm:gap-6">
    <!-- Application -->
    <div class="bg-white border border-slate-200 rounded-2xl p-5 sm:p-6">
        <h3 class="text-base sm:text-lg font-semibold text-slate-900 mb-4 flex items-center gap-2">
            <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z"/></svg>
            Application
        </h3>
        <dl class="space-y-3 text-sm">
            <div class="flex justify-between items-center pb-2 border-b border-slate-100"><dt class="text-slate-500">Laravel Version</dt><dd class="font-medium text-slate-900">{{ app()->version() }}</dd></div>
            <div class="flex justify-between items-center pb-2 border-b border-slate-100"><dt class="text-slate-500">Environment</dt><dd><span class="px-2 py-0.5 bg-blue-50 text-blue-700 rounded text-xs font-medium">{{ config('app.env') }}</span></dd></div>
            <div class="flex justify-between items-center pb-2 border-b border-slate-100"><dt class="text-slate-500">Debug Mode</dt><dd><span class="px-2 py-0.5 rounded text-xs font-medium {{ config('app.debug') ? 'bg-amber-50 text-amber-700' : 'bg-emerald-50 text-emerald-700' }}">{{ config('app.debug') ? 'On' : 'Off' }}</span></dd></div>
            <div class="flex justify-between items-center pb-2 border-b border-slate-100"><dt class="text-slate-500">URL</dt><dd class="font-mono text-xs text-slate-900 truncate">{{ config('app.url') }}</dd></div>
            <div class="flex justify-between items-center"><dt class="text-slate-500">Timezone</dt><dd class="font-medium text-slate-900">{{ config('app.timezone') }}</dd></div>
        </dl>
    </div>

    <!-- Server -->
    <div class="bg-white border border-slate-200 rounded-2xl p-5 sm:p-6">
        <h3 class="text-base sm:text-lg font-semibold text-slate-900 mb-4 flex items-center gap-2">
            <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12H3l9-9 9 9h-2M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7M9 21V12h6v9"/></svg>
            Server
        </h3>
        <dl class="space-y-3 text-sm">
            <div class="flex justify-between items-center pb-2 border-b border-slate-100"><dt class="text-slate-500">PHP Version</dt><dd class="font-medium text-slate-900">{{ PHP_VERSION }}</dd></div>
            <div class="flex justify-between items-center pb-2 border-b border-slate-100"><dt class="text-slate-500">Server Software</dt><dd class="font-medium text-slate-900 text-xs">{{ $_SERVER['SERVER_SOFTWARE'] ?? 'CLI' }}</dd></div>
            <div class="flex justify-between items-center pb-2 border-b border-slate-100"><dt class="text-slate-500">Memory Limit</dt><dd class="font-medium text-slate-900">{{ ini_get('memory_limit') }}</dd></div>
            <div class="flex justify-between items-center pb-2 border-b border-slate-100"><dt class="text-slate-500">Max Upload Size</dt><dd class="font-medium text-slate-900">{{ ini_get('upload_max_filesize') }}</dd></div>
            <div class="flex justify-between items-center"><dt class="text-slate-500">Max Execution Time</dt><dd class="font-medium text-slate-900">{{ ini_get('max_execution_time') }}s</dd></div>
        </dl>
    </div>

    <!-- Database -->
    <div class="bg-white border border-slate-200 rounded-2xl p-5 sm:p-6">
        <h3 class="text-base sm:text-lg font-semibold text-slate-900 mb-4 flex items-center gap-2">
            <svg class="w-5 h-5 text-violet-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10c0 2.21 3.58 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.58 4 8 4s8-1.79 8-4M4 7c0-2.21 3.58-4 8-4s8 1.79 8 4m0 5c0 2.21-3.58 4-8 4s-8-1.79-8-4"/></svg>
            Database
        </h3>
        <dl class="space-y-3 text-sm">
            <div class="flex justify-between items-center pb-2 border-b border-slate-100"><dt class="text-slate-500">Connection</dt><dd><span class="px-2 py-0.5 bg-blue-50 text-blue-700 rounded text-xs font-medium">{{ config('database.default') }}</span></dd></div>
            <div class="flex justify-between items-center pb-2 border-b border-slate-100"><dt class="text-slate-500">Database</dt><dd class="font-mono text-xs text-slate-900 truncate">{{ config('database.connections.' . config('database.default') . '.database') }}</dd></div>
            <div class="flex justify-between items-center pb-2 border-b border-slate-100"><dt class="text-slate-500">Cache Driver</dt><dd class="font-medium text-slate-900">{{ config('cache.default') }}</dd></div>
            <div class="flex justify-between items-center"><dt class="text-slate-500">Session Driver</dt><dd class="font-medium text-slate-900">{{ config('session.driver') }}</dd></div>
        </dl>
    </div>

    <!-- Extensions -->
    <div class="bg-white border border-slate-200 rounded-2xl p-5 sm:p-6">
        <h3 class="text-base sm:text-lg font-semibold text-slate-900 mb-4 flex items-center gap-2">
            <svg class="w-5 h-5 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.24 12.24a6 6 0 00-8.48-8.48L5 10.5V19h8.5z"/></svg>
            PHP Extensions
        </h3>
        <div class="flex flex-wrap gap-2">
            @foreach(['bcmath', 'curl', 'gd', 'json', 'mbstring', 'mysqli', 'openssl', 'pdo_mysql', 'tokenizer', 'xml', 'zip'] as $ext)
                @php $loaded = extension_loaded($ext); @endphp
                <span class="inline-flex items-center gap-1 px-2 py-1 rounded text-xs font-medium {{ $loaded ? 'bg-emerald-50 text-emerald-700' : 'bg-slate-100 text-slate-500' }}">
                    <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                        @if($loaded)
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.71-9.29a1 1 0 00-1.42-1.42L9 10.59 7.71 9.29a1 1 0 00-1.42 1.42l2 2a1 1 0 001.42 0l4-4z" clip-rule="evenodd"/>
                        @else
                            <path fill-rule="evenodd" d="M4.29 4.29a1 1 0 011.42 0L10 8.59l4.29-4.3a1 1 0 111.42 1.42L11.41 10l4.3 4.29a1 1 0 01-1.42 1.42L10 11.41l-4.29 4.3a1 1 0 01-1.42-1.42L8.59 10 4.29 5.71a1 1 0 010-1.42z" clip-rule="evenodd"/>
                        @endif
                    </svg>
                    {{ $ext }}
                </span>
            @endforeach
        </div>
    </div>
</div>
@endsection
