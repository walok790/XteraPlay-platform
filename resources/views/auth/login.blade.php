@extends('layouts.app')
@section('title', 'Sign In - XteraPlay')
@section('content')
<div class="min-h-screen flex items-center justify-center pt-20 pb-12 px-4">
    <div class="w-full max-w-md">
        <div class="bg-[#12121a] border border-[#1e1e2e] rounded-2xl p-8">
            <div class="text-center mb-8">
                <a href="{{ url('/') }}" class="inline-flex items-center space-x-2 mb-6">
                    <div class="w-10 h-10 bg-gradient-to-br from-indigo-500 to-violet-500 rounded-xl flex items-center justify-center">
                        <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20"><path d="M6.3 2.841A1.5 1.5 0 004 4.11V15.89a1.5 1.5 0 002.3 1.269l9.344-5.89a1.5 1.5 0 000-2.538L6.3 2.84z"/></svg>
                    </div>
                    <span class="text-2xl font-bold bg-gradient-to-r from-indigo-400 to-violet-400 bg-clip-text text-transparent">XteraPlay</span>
                </a>
                <h1 class="text-2xl font-bold text-white">Welcome back</h1>
                <p class="text-gray-400 text-sm mt-1">Sign in to your account</p>
            </div>

            <form method="POST" action="{{ url('/login') }}" class="space-y-5">
                @csrf
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-300 mb-2">Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" required autofocus
                           class="w-full px-4 py-3 bg-[#0a0a0f] border border-[#1e1e2e] rounded-lg text-white placeholder-gray-500 focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 transition-colors"
                           placeholder="you@example.com">
                    @error('email')<p class="mt-1 text-sm text-red-400">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-300 mb-2">Password</label>
                    <input type="password" name="password" id="password" required
                           class="w-full px-4 py-3 bg-[#0a0a0f] border border-[#1e1e2e] rounded-lg text-white placeholder-gray-500 focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 transition-colors"
                           placeholder="Enter your password">
                    @error('password')<p class="mt-1 text-sm text-red-400">{{ $message }}</p>@enderror
                </div>
                <div class="flex items-center justify-between">
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="checkbox" name="remember" class="w-4 h-4 rounded border-gray-600 bg-[#0a0a0f] text-indigo-500 focus:ring-indigo-500">
                        <span class="text-sm text-gray-400">Remember me</span>
                    </label>
                </div>
                <button type="submit" class="w-full py-3 bg-gradient-to-r from-indigo-500 to-violet-500 hover:from-indigo-600 hover:to-violet-600 text-white font-semibold rounded-lg transition-all shadow-lg shadow-indigo-500/25">
                    Sign In
                </button>
            </form>

            <p class="text-center text-sm text-gray-400 mt-6">
                Don't have an account? <a href="{{ url('/register') }}" class="text-indigo-400 hover:text-indigo-300 font-medium">Create one</a>
            </p>
        </div>
    </div>
</div>
@endsection
