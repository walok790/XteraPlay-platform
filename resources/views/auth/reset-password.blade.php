@extends('layouts.app')

@section('title', 'Reset Password - XteraPlay')

@section('content')
<div class="min-h-[calc(100vh-3.5rem)] flex items-center justify-center px-4 py-6">
    <div class="w-full max-w-sm">
        <div class="bg-[#12121a] border border-[#2a2a30] rounded-2xl p-5 sm:p-6">
            <!-- Logo -->
            <div class="flex justify-center mb-4">
                <a href="{{ url('/') }}" class="flex items-center gap-2">
                    <div class="w-8 h-8 bg-gradient-to-br from-indigo-500 to-violet-600 rounded-lg flex items-center justify-center">
                        <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20"><path d="M6.3 2.841A1.5 1.5 0 004 4.11V15.89a1.5 1.5 0 002.3 1.269l9.344-5.89a1.5 1.5 0 000-2.538L6.3 2.84z"/></svg>
                    </div>
                    <span class="text-base font-bold">XteraPlay</span>
                </a>
            </div>

            <div class="text-center mb-5">
                <div class="inline-flex items-center justify-center w-10 h-10 bg-indigo-500/10 rounded-full mb-3">
                    <svg class="w-5 h-5 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                </div>
                <h1 class="text-lg font-bold text-white mb-1">Reset password</h1>
                <p class="text-xs text-gray-400">Choose a new password for your account.</p>
            </div>

            <form method="POST" action="{{ url('/reset-password') }}" class="space-y-3">
                @csrf
                <input type="hidden" name="token" value="{{ $token ?? request()->route('token') }}">

                <div>
                    <label for="email" class="block text-xs font-medium text-gray-400 mb-1.5">Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email', request()->email) }}" required
                        class="w-full px-3 py-2.5 bg-[#0a0a0f] border border-[#2a2a30] rounded-lg text-sm text-white placeholder-gray-500 focus:outline-none focus:border-indigo-500 transition"
                        placeholder="you@example.com">
                    @error('email')<p class="mt-1 text-[11px] text-red-400">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label for="password" class="block text-xs font-medium text-gray-400 mb-1.5">New Password</label>
                    <input type="password" id="password" name="password" required
                        class="w-full px-3 py-2.5 bg-[#0a0a0f] border border-[#2a2a30] rounded-lg text-sm text-white placeholder-gray-500 focus:outline-none focus:border-indigo-500 transition"
                        placeholder="At least 8 characters">
                    @error('password')<p class="mt-1 text-[11px] text-red-400">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label for="password_confirmation" class="block text-xs font-medium text-gray-400 mb-1.5">Confirm Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" required
                        class="w-full px-3 py-2.5 bg-[#0a0a0f] border border-[#2a2a30] rounded-lg text-sm text-white placeholder-gray-500 focus:outline-none focus:border-indigo-500 transition"
                        placeholder="Repeat password">
                </div>

                <button type="submit" class="w-full py-2.5 bg-gradient-to-r from-indigo-500 to-violet-600 text-white text-sm font-medium rounded-lg hover:opacity-90 transition">
                    Reset Password
                </button>
            </form>

            <div class="mt-4 pt-4 border-t border-[#2a2a30] text-center">
                <a href="{{ url('/login') }}" class="text-xs text-indigo-400 hover:text-indigo-300 transition">
                    Back to sign in
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
