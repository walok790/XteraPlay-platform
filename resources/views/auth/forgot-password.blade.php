@extends('layouts.app')

@section('title', 'Forgot Password - XteraPlay')

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
                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.7 5.7l-4.3 4.3H10v2H6v-2l4.3-4.3A6 6 0 1121 9z"/></svg>
                </div>
                <h1 class="text-xl sm:text-2xl font-bold text-slate-900 mb-1">Forgot password?</h1>
                <p class="text-sm text-slate-600">Enter your email and we'll send you a reset link.</p>
            </div>

            @if(session('status'))
                <div class="mb-4 p-3 bg-emerald-50 border border-emerald-200 rounded-lg flex items-start gap-2">
                    <svg class="w-4 h-4 text-emerald-600 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.71-9.29a1 1 0 00-1.42-1.42L9 10.59 7.71 9.29a1 1 0 00-1.42 1.42l2 2a1 1 0 001.42 0l4-4z" clip-rule="evenodd"/></svg>
                    <p class="text-sm text-emerald-700">{{ session('status') }}</p>
                </div>
            @endif

            <form method="POST" action="{{ url('/forgot-password') }}" class="space-y-4">
                @csrf
                <div>
                    <label for="email" class="block text-sm font-medium text-slate-700 mb-1.5">Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus
                        class="w-full px-3 py-2.5 bg-white border border-slate-300 rounded-lg text-sm text-slate-900 placeholder-slate-400 focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100 transition"
                        placeholder="you@example.com">
                    @error('email')<p class="mt-1 text-xs text-red-600">{{ $message }}</p>@enderror
                </div>

                <button type="submit" class="w-full py-2.5 bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold rounded-lg shadow-sm shadow-blue-500/25 transition">
                    Send Reset Link
                </button>
            </form>

            <div class="mt-6 pt-6 border-t border-slate-200 text-center">
                <a href="{{ url('/login') }}" class="text-sm text-blue-600 hover:text-blue-700 font-medium inline-flex items-center gap-1">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                    Back to sign in
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
