@extends('layouts.app')

@section('title', 'Edit Profile - XteraPlay')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-6 sm:py-8 md:py-10">
    <div class="mb-6 sm:mb-8">
        <h1 class="text-2xl sm:text-3xl font-bold text-slate-900">Edit Profile</h1>
        <p class="text-sm text-slate-600 mt-1">Manage your account details and preferences.</p>
    </div>

    @if(session('status'))
        <div class="mb-6 p-4 bg-emerald-50 border border-emerald-200 rounded-lg flex items-start gap-3">
            <svg class="w-5 h-5 text-emerald-600 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.71-9.29a1 1 0 00-1.42-1.42L9 10.59 7.71 9.29a1 1 0 00-1.42 1.42l2 2a1 1 0 001.42 0l4-4z" clip-rule="evenodd"/></svg>
            <p class="text-sm text-emerald-700">{{ session('status') }}</p>
        </div>
    @endif

    <div class="space-y-4 sm:space-y-6">
        <!-- Profile Picture -->
        <div class="bg-white border border-slate-200 rounded-2xl p-5 sm:p-6">
            <h2 class="text-base sm:text-lg font-semibold text-slate-900 mb-4">Profile Picture</h2>
            <div class="flex flex-col sm:flex-row items-start sm:items-center gap-4 sm:gap-6">
                <div class="w-20 h-20 sm:w-24 sm:h-24 rounded-full bg-gradient-to-br from-blue-600 to-indigo-600 flex items-center justify-center text-white text-2xl sm:text-3xl font-bold shadow-lg shadow-blue-500/20 flex-shrink-0">
                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                </div>
                <div class="flex-1">
                    <p class="text-sm text-slate-700 mb-3">Upload a photo. JPG, PNG or GIF, max 5MB.</p>
                    <div class="flex flex-wrap gap-2">
                        <button class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-lg shadow-sm shadow-blue-500/25 transition">Upload New</button>
                        <button class="px-4 py-2 bg-white hover:bg-slate-50 border border-slate-300 text-slate-700 text-sm font-medium rounded-lg transition">Remove</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Personal Info -->
        <div class="bg-white border border-slate-200 rounded-2xl p-5 sm:p-6">
            <h2 class="text-base sm:text-lg font-semibold text-slate-900 mb-1">Personal Information</h2>
            <p class="text-sm text-slate-500 mb-5">Update your name and email address.</p>
            <form method="POST" action="{{ url('/profile') }}" class="space-y-4">
                @csrf
                @method('PATCH')
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1.5">Full Name</label>
                        <input type="text" name="name" value="{{ old('name', Auth::user()->name) }}" class="w-full px-3 py-2.5 bg-white border border-slate-300 rounded-lg text-sm text-slate-900 focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100 transition">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1.5">Email</label>
                        <input type="email" name="email" value="{{ old('email', Auth::user()->email) }}" class="w-full px-3 py-2.5 bg-white border border-slate-300 rounded-lg text-sm text-slate-900 focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100 transition">
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1.5">Bio (optional)</label>
                    <textarea rows="3" name="bio" placeholder="Tell us a bit about yourself..." class="w-full px-3 py-2.5 bg-white border border-slate-300 rounded-lg text-sm text-slate-900 placeholder-slate-400 focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100 transition resize-none"></textarea>
                </div>
                <div class="flex justify-end gap-2 pt-2 border-t border-slate-100">
                    <button type="button" class="px-4 py-2 bg-white hover:bg-slate-50 border border-slate-300 text-slate-700 text-sm font-medium rounded-lg transition">Cancel</button>
                    <button type="submit" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold rounded-lg shadow-sm shadow-blue-500/25 transition">Save Changes</button>
                </div>
            </form>
        </div>

        <!-- Password -->
        <div class="bg-white border border-slate-200 rounded-2xl p-5 sm:p-6">
            <h2 class="text-base sm:text-lg font-semibold text-slate-900 mb-1">Password</h2>
            <p class="text-sm text-slate-500 mb-5">Change your password to keep your account secure.</p>
            <form method="POST" action="{{ url('/profile/password') }}" class="space-y-4">
                @csrf
                @method('PUT')
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1.5">Current Password</label>
                    <input type="password" name="current_password" class="w-full px-3 py-2.5 bg-white border border-slate-300 rounded-lg text-sm text-slate-900 focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100 transition" placeholder="Enter current password">
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1.5">New Password</label>
                        <input type="password" name="password" class="w-full px-3 py-2.5 bg-white border border-slate-300 rounded-lg text-sm text-slate-900 focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100 transition" placeholder="At least 8 characters">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1.5">Confirm Password</label>
                        <input type="password" name="password_confirmation" class="w-full px-3 py-2.5 bg-white border border-slate-300 rounded-lg text-sm text-slate-900 focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100 transition" placeholder="Repeat new password">
                    </div>
                </div>
                <div class="flex justify-end pt-2 border-t border-slate-100">
                    <button type="submit" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold rounded-lg shadow-sm shadow-blue-500/25 transition">Update Password</button>
                </div>
            </form>
        </div>

        <!-- Notifications -->
        <div class="bg-white border border-slate-200 rounded-2xl p-5 sm:p-6">
            <h2 class="text-base sm:text-lg font-semibold text-slate-900 mb-1">Notification Preferences</h2>
            <p class="text-sm text-slate-500 mb-5">Choose what emails you receive.</p>
            <div class="space-y-3">
                <label class="flex items-start gap-3 p-3 hover:bg-slate-50 rounded-lg cursor-pointer">
                    <input type="checkbox" checked class="w-4 h-4 mt-0.5 rounded border-slate-300 text-blue-600 focus:ring-2 focus:ring-blue-100">
                    <div>
                        <p class="text-sm font-medium text-slate-900">Product updates</p>
                        <p class="text-xs text-slate-500">Get notified when we launch new features.</p>
                    </div>
                </label>
                <label class="flex items-start gap-3 p-3 hover:bg-slate-50 rounded-lg cursor-pointer">
                    <input type="checkbox" checked class="w-4 h-4 mt-0.5 rounded border-slate-300 text-blue-600 focus:ring-2 focus:ring-blue-100">
                    <div>
                        <p class="text-sm font-medium text-slate-900">Security alerts</p>
                        <p class="text-xs text-slate-500">Important account and security notifications.</p>
                    </div>
                </label>
                <label class="flex items-start gap-3 p-3 hover:bg-slate-50 rounded-lg cursor-pointer">
                    <input type="checkbox" class="w-4 h-4 mt-0.5 rounded border-slate-300 text-blue-600 focus:ring-2 focus:ring-blue-100">
                    <div>
                        <p class="text-sm font-medium text-slate-900">Marketing emails</p>
                        <p class="text-xs text-slate-500">Occasional tips and promotions.</p>
                    </div>
                </label>
            </div>
        </div>

        <!-- Danger Zone -->
        <div class="bg-white border border-red-200 rounded-2xl p-5 sm:p-6">
            <h2 class="text-base sm:text-lg font-semibold text-red-700 mb-1">Danger Zone</h2>
            <p class="text-sm text-slate-500 mb-4">Permanently delete your account and all data. This cannot be undone.</p>
            <button class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white text-sm font-semibold rounded-lg shadow-sm transition">Delete Account</button>
        </div>
    </div>
</div>
@endsection
