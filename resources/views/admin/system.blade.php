@extends('admin.layouts.app')
@section('title', 'System Info')
@section('content')
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 mb-6">
    <div class="bg-[#1a1a1f] border border-[#2a2a30] rounded-xl p-4">
        <p class="text-gray-400 text-xs font-medium">PHP Version</p>
        <p class="text-xl font-bold text-white mt-1">{{ phpversion() }}</p>
    </div>
    <div class="bg-[#1a1a1f] border border-[#2a2a30] rounded-xl p-4">
        <p class="text-gray-400 text-xs font-medium">Laravel Version</p>
        <p class="text-xl font-bold text-white mt-1">{{ app()->version() }}</p>
    </div>
    <div class="bg-[#1a1a1f] border border-[#2a2a30] rounded-xl p-4">
        <p class="text-gray-400 text-xs font-medium">Server OS</p>
        <p class="text-xl font-bold text-white mt-1">{{ php_uname('s') }}</p>
    </div>
</div>

<div class="bg-[#1a1a1f] border border-[#2a2a30] rounded-xl p-4 sm:p-6">
    <h2 class="text-lg font-semibold text-white mb-4">System Details</h2>
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <tbody class="divide-y divide-[#2a2a30]">
                <tr>
                    <td class="py-3 pr-4 text-gray-400 font-medium w-48">Environment</td>
                    <td class="py-3 text-white">{{ app()->environment() }}</td>
                </tr>
                <tr>
                    <td class="py-3 pr-4 text-gray-400 font-medium">Debug Mode</td>
                    <td class="py-3 text-white">{{ config('app.debug') ? 'Enabled' : 'Disabled' }}</td>
                </tr>
                <tr>
                    <td class="py-3 pr-4 text-gray-400 font-medium">Cache Driver</td>
                    <td class="py-3 text-white">{{ config('cache.default') }}</td>
                </tr>
                <tr>
                    <td class="py-3 pr-4 text-gray-400 font-medium">Session Driver</td>
                    <td class="py-3 text-white">{{ config('session.driver') }}</td>
                </tr>
                <tr>
                    <td class="py-3 pr-4 text-gray-400 font-medium">Queue Driver</td>
                    <td class="py-3 text-white">{{ config('queue.default') }}</td>
                </tr>
                <tr>
                    <td class="py-3 pr-4 text-gray-400 font-medium">Database</td>
                    <td class="py-3 text-white">{{ config('database.default') }}</td>
                </tr>
                <tr>
                    <td class="py-3 pr-4 text-gray-400 font-medium">Timezone</td>
                    <td class="py-3 text-white">{{ config('app.timezone') }}</td>
                </tr>
                <tr>
                    <td class="py-3 pr-4 text-gray-400 font-medium">Max Upload Size</td>
                    <td class="py-3 text-white">{{ ini_get('upload_max_filesize') }}</td>
                </tr>
                <tr>
                    <td class="py-3 pr-4 text-gray-400 font-medium">Memory Limit</td>
                    <td class="py-3 text-white">{{ ini_get('memory_limit') }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
