@extends('admin.layouts.app')
@section('title', 'Settings')

@section('content')
<div class="mb-6">
    <h2 class="text-xl sm:text-2xl font-bold text-slate-900">Site Settings</h2>
    <p class="text-sm text-slate-600 mt-1">Configure global platform settings.</p>
</div>

@if(session('status'))
    <div class="mb-4 p-3 bg-emerald-50 border border-emerald-200 rounded-lg text-sm text-emerald-700">{{ session('status') }}</div>
@endif

<form method="POST" action="{{ url('/admin/settings') }}" class="space-y-4 sm:space-y-6 max-w-4xl">
    @csrf @method('PUT')

    <!-- General -->
    <div class="bg-white border border-slate-200 rounded-2xl p-5 sm:p-6">
        <h3 class="text-base sm:text-lg font-semibold text-slate-900 mb-1">General</h3>
        <p class="text-sm text-slate-500 mb-5">Basic platform information.</p>
        <div class="space-y-4">
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1.5">Site Name</label>
                    <input type="text" name="site_name" value="{{ old('site_name', $settings['site_name']) }}" class="w-full px-3 py-2.5 bg-white border border-slate-300 rounded-lg text-sm text-slate-900 focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100">
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1.5">Site Tagline</label>
                    <input type="text" name="site_tagline" value="{{ old('site_tagline', $settings['site_tagline']) }}" class="w-full px-3 py-2.5 bg-white border border-slate-300 rounded-lg text-sm text-slate-900 focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100">
                </div>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1.5">Support Email</label>
                    <input type="email" name="support_email" value="{{ old('support_email', $settings['support_email']) }}" class="w-full px-3 py-2.5 bg-white border border-slate-300 rounded-lg text-sm text-slate-900 focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100">
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1.5">Free Daily Credits</label>
                    <input type="number" name="free_daily_credits" min="0" value="{{ old('free_daily_credits', $settings['free_daily_credits']) }}" class="w-full px-3 py-2.5 bg-white border border-slate-300 rounded-lg text-sm text-slate-900 focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100">
                </div>
            </div>
        </div>
    </div>

    <!-- Features -->
    <div class="bg-white border border-slate-200 rounded-2xl p-5 sm:p-6">
        <h3 class="text-base sm:text-lg font-semibold text-slate-900 mb-1">Features</h3>
        <p class="text-sm text-slate-500 mb-5">Enable or disable platform features.</p>
        <div class="space-y-3">
            @foreach([
                'registration_enabled' => ['Allow user registration', 'New users can create accounts'],
                'email_verification_required' => ['Require email verification', 'Users must verify email before full access'],
                'api_enabled' => ['API Access', 'Enable REST API for Enterprise users'],
                'maintenance_mode' => ['Maintenance Mode', 'Show maintenance page to all non-admin users'],
            ] as $key => [$label, $desc])
                <label class="flex items-start justify-between gap-3 p-3 hover:bg-slate-50 rounded-lg cursor-pointer">
                    <div>
                        <p class="text-sm font-medium text-slate-900">{{ $label }}</p>
                        <p class="text-xs text-slate-500 mt-0.5">{{ $desc }}</p>
                    </div>
                    <input type="checkbox" name="{{ $key }}" value="1" {{ old($key, $settings[$key]) ? 'checked' : '' }} class="w-5 h-5 mt-0.5 rounded border-slate-300 text-blue-600 focus:ring-2 focus:ring-blue-100 flex-shrink-0">
                </label>
            @endforeach
        </div>
    </div>

    <div class="flex justify-end gap-2">
        <button type="submit" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold rounded-lg shadow-sm shadow-blue-500/25 transition">Save Settings</button>
    </div>
</form>
@endsection
