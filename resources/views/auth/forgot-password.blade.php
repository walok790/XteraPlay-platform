@extends('layouts.app')

@section('title', 'Forgot Password - XteraPlay')

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

            <!-- Icon + Title -->
            <div class="text-center mb-5">
                <div class="inline-flex items-center justify-center w-10 h-10 bg-amber-500/10 rounded-full mb-3">
                    <svg class="w-5 h-5 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.7 5.7l-4.3 4.3H10v2H6v-2l4.3-4.3A6 6 0 1121 9z"/></svg>
                </div>
                <h1 class="text-lg font-bold text-white mb-1">Forgot password?</h1>
                <p class="text-xs text-gray-400">Enter your email and we'll send you a reset link.</p>
            </div>

            @if(session('status'))
                <div class="mb-4 p-3 bg-emerald-500/10 border border-emerald-500/30 rounded-lg">
                    <p class="text-xs text-emerald-400">{{ session('status') }}</p>
                </div>
            @endif

            <form method="POST" action="{{ url('/forgot-password') }}" class="space-y-3">
                @csrf
                <div>
                    <label for="email" class="block text-xs font-medium text-gray-400 mb-1.5">Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus
                        class="w-full px-3 py-2.5 bg-[#0a0a0f] border border-[#2a2a30] rounded-lg text-sm text-white placeholder-gray-500 focus:outline-none focus:border-indigo-500 transition"
                        placeholder="you@example.com">
                    @error('email')<p class="mt-1 text-[11px] text-red-400">{{ $message }}</p>@enderror
                </div>

                <button type="submit" class="w-full py-2.5 bg-gradient-to-r from-indigo-500 to-violet-600 text-white text-sm font-medium rounded-lg hover:opacity-90 transition">
                    Send Reset Link
                </button>
            </form>

            <div class="mt-4 pt-4 border-t border-[#2a2a30] text-center">
                <a href="{{ url('/login') }}" class="text-xs text-indigo-400 hover:text-indigo-300 transition inline-flex items-center gap-1">
                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                    Back to sign in
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
