@extends('layouts.app')

@section('title', 'Create Account - XteraPlay')

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
                <h1 class="text-lg font-bold text-white mb-1">Create account</h1>
                <p class="text-xs text-gray-400">Start streaming Terabox videos today</p>
            </div>

            <form method="POST" action="{{ url('/register') }}" class="space-y-3">
                @csrf
                <div>
                    <label for="name" class="block text-xs font-medium text-gray-400 mb-1.5">Full Name</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}" required autofocus
                        class="w-full px-3 py-2.5 bg-[#0a0a0f] border border-[#2a2a30] rounded-lg text-sm text-white placeholder-gray-500 focus:outline-none focus:border-indigo-500 transition"
                        placeholder="John Doe">
                    @error('name')<p class="mt-1 text-[11px] text-red-400">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label for="email" class="block text-xs font-medium text-gray-400 mb-1.5">Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" required
                        class="w-full px-3 py-2.5 bg-[#0a0a0f] border border-[#2a2a30] rounded-lg text-sm text-white placeholder-gray-500 focus:outline-none focus:border-indigo-500 transition"
                        placeholder="you@example.com">
                    @error('email')<p class="mt-1 text-[11px] text-red-400">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label for="password" class="block text-xs font-medium text-gray-400 mb-1.5">Password</label>
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

                <label class="flex items-start gap-2 pt-1">
                    <input type="checkbox" name="terms" value="1" required class="w-3.5 h-3.5 mt-0.5 rounded border-[#2a2a30] bg-[#0a0a0f] text-indigo-500 focus:ring-0 focus:ring-offset-0 flex-shrink-0">
                    <span class="text-[11px] text-gray-400 leading-relaxed">
                        I agree to the <a href="#" class="text-indigo-400 hover:text-indigo-300">Terms</a> and <a href="#" class="text-indigo-400 hover:text-indigo-300">Privacy Policy</a>
                    </span>
                </label>
                @error('terms')<p class="text-[11px] text-red-400">{{ $message }}</p>@enderror

                <button type="submit" class="w-full py-2.5 bg-gradient-to-r from-indigo-500 to-violet-600 text-white text-sm font-medium rounded-lg hover:opacity-90 transition mt-2">
                    Create Account
                </button>
            </form>

            <div class="mt-4 pt-4 border-t border-[#2a2a30] text-center">
                <p class="text-xs text-gray-400">
                    Already have an account?
                    <a href="{{ url('/login') }}" class="text-indigo-400 hover:text-indigo-300 font-medium ml-1">Sign in</a>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
