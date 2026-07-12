@extends('layouts.app')
@section('title', 'Create Account - XteraPlay')
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
                <h1 class="text-2xl font-bold text-white">Create Account</h1>
                <p class="text-gray-400 text-sm mt-1">Get started with XteraPlay</p>
            </div>

            <form method="POST" action="{{ url('/register') }}" class="space-y-5">
                @csrf
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-300 mb-2">Full Name</label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}" required
                           class="w-full px-4 py-3 bg-[#0a0a0f] border border-[#1e1e2e] rounded-lg text-white placeholder-gray-500 focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 transition-colors"
                           placeholder="John Doe">
                    @error('name')<p class="mt-1 text-sm text-red-400">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-300 mb-2">Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" required
                           class="w-full px-4 py-3 bg-[#0a0a0f] border border-[#1e1e2e] rounded-lg text-white placeholder-gray-500 focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 transition-colors"
                           placeholder="you@example.com">
                    @error('email')<p class="mt-1 text-sm text-red-400">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-300 mb-2">Password</label>
                    <input type="password" name="password" id="password" required
                           class="w-full px-4 py-3 bg-[#0a0a0f] border border-[#1e1e2e] rounded-lg text-white placeholder-gray-500 focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 transition-colors"
                           placeholder="Min. 8 characters">
                    @error('password')<p class="mt-1 text-sm text-red-400">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-300 mb-2">Confirm Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" required
                           class="w-full px-4 py-3 bg-[#0a0a0f] border border-[#1e1e2e] rounded-lg text-white placeholder-gray-500 focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 transition-colors"
                           placeholder="Repeat password">
                </div>
                <div class="flex items-start gap-2">
                    <input type="checkbox" name="terms" id="terms" required class="w-4 h-4 mt-0.5 rounded border-gray-600 bg-[#0a0a0f] text-indigo-500 focus:ring-indigo-500">
                    <label for="terms" class="text-sm text-gray-400">I agree to the <a href="#" class="text-indigo-400 hover:text-indigo-300">Terms</a> & <a href="#" class="text-indigo-400 hover:text-indigo-300">Privacy Policy</a></label>
                </div>
                <button type="submit" class="w-full py-3 bg-gradient-to-r from-indigo-500 to-violet-500 hover:from-indigo-600 hover:to-violet-600 text-white font-semibold rounded-lg transition-all shadow-lg shadow-indigo-500/25">
                    Create Account
                </button>
            </form>

            <p class="text-center text-sm text-gray-400 mt-6">
                Already have an account? <a href="{{ url('/login') }}" class="text-indigo-400 hover:text-indigo-300 font-medium">Sign In</a>
            </p>
        </div>
    </div>
</div>
@endsection
