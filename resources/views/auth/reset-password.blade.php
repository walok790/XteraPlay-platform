@extends('layouts.app')

@section('title', 'Reset Password - XteraPlay')

@section('content')
<div class="min-h-[calc(100vh-7rem)] flex items-center justify-center px-4 py-8 sm:py-12">
    <div class="w-full max-w-md">
        <div class="bg-white border border-slate-200 rounded-2xl p-6 sm:p-8 shadow-sm">
            <!-- Logo -->
            <div class="flex justify-center mb-5 sm:mb-6">
                <a href="{{ url('/') }}" class="flex items-center gap-2">
                    <div class="w-9 h-9 sm:w-10 sm:h-10 bg-gradient-to-br from-blue-600 to-indigo-600 rounded-xl flex items-center justify-center shadow-sm shadow-blue-500/20">
                        <svg class="w-4 h-4 sm:w-5 sm:h-5 text-white" fill="currentColor" viewBox="0 0 20 20"><path d="M6.3 2.841A1.5 1.5 0 004 4.11V15.89a1.5 1.5 0 002.3 1.269l9.344-5.89a1.5 1.5 0 000-2.538L6.3 2.84z"/></svg>
                    </div>
                    <span class="text-lg sm:text-xl font-bold text-slate-900">XteraPlay</span>
                </a>
            </div>

            <div class="text-center mb-6">
                <div class="inline-flex items-center justify-center w-12 h-12 bg-blue-50 rounded-full mb-3">
                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                </div>
                <h1 class="text-xl sm:text-2xl font-bold text-slate-900 mb-1">Reset password</h1>
                <p class="text-sm text-slate-600">Choose a new password for your account.</p>
            </div>

            <form method="POST" action="{{ url('/reset-password') }}" class="space-y-4">
                @csrf
                <input type="hidden" name="token" value="{{ $token ?? request()->route('token') }}">

                <div>
                    <label for="email" class="block text-sm font-medium text-slate-700 mb-1.5">Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email', request()->email) }}" required
                        class="w-full px-3 py-2.5 bg-white border border-slate-300 rounded-lg text-sm text-slate-900 placeholder-slate-400 focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100 transition"
                        placeholder="you@example.com">
                    @error('email')<p class="mt-1 text-xs text-red-600">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-slate-700 mb-1.5">New Password</label>
                    <input type="password" id="password" name="password" required
                        class="w-full px-3 py-2.5 bg-white border border-slate-300 rounded-lg text-sm text-slate-900 placeholder-slate-400 focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100 transition"
                        placeholder="At least 8 characters">
                    @error('password')<p class="mt-1 text-xs text-red-600">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-slate-700 mb-1.5">Confirm Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" required
                        class="w-full px-3 py-2.5 bg-white border border-slate-300 rounded-lg text-sm text-slate-900 placeholder-slate-400 focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100 transition"
                        placeholder="Repeat password">
                </div>

                <button type="submit" class="w-full py-2.5 bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold rounded-lg shadow-sm shadow-blue-500/25 transition mt-2">
                    Reset Password
                </button>
            </form>

            <div class="mt-6 pt-6 border-t border-slate-200 text-center">
                <a href="{{ url('/login') }}" class="text-sm text-blue-600 hover:text-blue-700 font-medium">Back to sign in</a>
            </div>
        </div>
    </div>
</div>
@endsection
