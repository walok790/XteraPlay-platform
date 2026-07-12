@extends('layouts.app')

@section('title', 'Sign In - XteraPlay')

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
                <h1 class="text-xl sm:text-2xl font-bold text-slate-900 mb-1">Welcome back</h1>
                <p class="text-sm text-slate-600">Sign in to continue to your account</p>
            </div>

            @if(session('status'))
                <div class="mb-4 p-3 bg-emerald-50 border border-emerald-200 rounded-lg">
                    <p class="text-sm text-emerald-700">{{ session('status') }}</p>
                </div>
            @endif

            @php
                try {
                    $isDemoMode = \App\Models\Setting::get('install_mode') === 'demo';
                } catch (\Throwable $e) {
                    $isDemoMode = false;
                }
            @endphp
            @if($isDemoMode)
                <div class="mb-4 p-3 bg-amber-50 border border-amber-200 rounded-lg">
                    <p class="text-xs font-semibold text-amber-900 mb-1.5">🎯 Demo Mode — try it out</p>
                    <div class="space-y-1 text-xs">
                        <p class="text-slate-700"><span class="text-slate-500">User:</span> <code class="bg-white px-1 py-0.5 rounded">demo@xteraplay.com</code> / <code class="bg-white px-1 py-0.5 rounded">demo1234</code></p>
                        <p class="text-slate-700"><span class="text-slate-500">Admin:</span> <a href="{{ url('/admin/login') }}" class="text-blue-600 hover:underline">/admin/login</a> · <code class="bg-white px-1 py-0.5 rounded">admin@xteraplay.com</code> / <code class="bg-white px-1 py-0.5 rounded">admin1234</code></p>
                    </div>
                </div>
            @endif

            <form method="POST" action="{{ url('/login') }}" class="space-y-4">
                @csrf
                <div>
                    <label for="email" class="block text-sm font-medium text-slate-700 mb-1.5">Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus
                        class="w-full px-3 py-2.5 bg-white border border-slate-300 rounded-lg text-sm text-slate-900 placeholder-slate-400 focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100 transition"
                        placeholder="you@example.com">
                    @error('email')<p class="mt-1 text-xs text-red-600">{{ $message }}</p>@enderror
                </div>

                <div>
                    <div class="flex items-center justify-between mb-1.5">
                        <label for="password" class="block text-sm font-medium text-slate-700">Password</label>
                        <a href="{{ url('/forgot-password') }}" class="text-xs text-blue-600 hover:text-blue-700 font-medium transition">Forgot?</a>
                    </div>
                    <input type="password" id="password" name="password" required
                        class="w-full px-3 py-2.5 bg-white border border-slate-300 rounded-lg text-sm text-slate-900 placeholder-slate-400 focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100 transition"
                        placeholder="Enter your password">
                    @error('password')<p class="mt-1 text-xs text-red-600">{{ $message }}</p>@enderror
                </div>

                <label class="flex items-center gap-2 pt-1">
                    <input type="checkbox" name="remember" class="w-4 h-4 rounded border-slate-300 text-blue-600 focus:ring-2 focus:ring-blue-100">
                    <span class="text-sm text-slate-600">Remember me</span>
                </label>

                <button type="submit" class="w-full py-2.5 bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold rounded-lg shadow-sm shadow-blue-500/25 transition mt-2">
                    Sign In
                </button>
            </form>

            <div class="mt-6 pt-6 border-t border-slate-200 text-center">
                <p class="text-sm text-slate-600">
                    Don't have an account?
                    <a href="{{ url('/register') }}" class="text-blue-600 hover:text-blue-700 font-semibold ml-1">Create one</a>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
