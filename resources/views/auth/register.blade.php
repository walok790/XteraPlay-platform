@extends('layouts.app')

@section('title', 'Create Account - XteraPlay')

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
                <h1 class="text-xl sm:text-2xl font-bold text-slate-900 mb-1">Create account</h1>
                <p class="text-sm text-slate-600">Start streaming Terabox videos today</p>
            </div>

            <form method="POST" action="{{ url('/register') }}" class="space-y-4">
                @csrf
                <div>
                    <label for="name" class="block text-sm font-medium text-slate-700 mb-1.5">Full Name</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}" required autofocus
                        class="w-full px-3 py-2.5 bg-white border border-slate-300 rounded-lg text-sm text-slate-900 placeholder-slate-400 focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100 transition"
                        placeholder="John Doe">
                    @error('name')<p class="mt-1 text-xs text-red-600">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-slate-700 mb-1.5">Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" required
                        class="w-full px-3 py-2.5 bg-white border border-slate-300 rounded-lg text-sm text-slate-900 placeholder-slate-400 focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100 transition"
                        placeholder="you@example.com">
                    @error('email')<p class="mt-1 text-xs text-red-600">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-slate-700 mb-1.5">Password</label>
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

                <label class="flex items-start gap-2 pt-1">
                    <input type="checkbox" name="terms" value="1" required class="w-4 h-4 mt-0.5 rounded border-slate-300 text-blue-600 focus:ring-2 focus:ring-blue-100 flex-shrink-0">
                    <span class="text-sm text-slate-600 leading-relaxed">
                        I agree to the <a href="#" class="text-blue-600 hover:text-blue-700 font-medium">Terms</a> and <a href="#" class="text-blue-600 hover:text-blue-700 font-medium">Privacy Policy</a>
                    </span>
                </label>
                @error('terms')<p class="text-xs text-red-600">{{ $message }}</p>@enderror

                <button type="submit" class="w-full py-2.5 bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold rounded-lg shadow-sm shadow-blue-500/25 transition mt-2">
                    Create Account
                </button>
            </form>

            <div class="mt-6 pt-6 border-t border-slate-200 text-center">
                <p class="text-sm text-slate-600">
                    Already have an account?
                    <a href="{{ url('/login') }}" class="text-blue-600 hover:text-blue-700 font-semibold ml-1">Sign in</a>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
