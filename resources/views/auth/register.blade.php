@extends('layouts.app')

@section('title', 'Create Account - XteraPlay')

@section('content')
<section class="min-h-[calc(100vh-4rem)] flex items-center justify-center px-4 py-12">
    <div class="w-full max-w-md">
        <div class="bg-[#1a1a1f] border border-[#2a2a30] rounded-2xl p-8">
            <!-- Logo -->
            <div class="flex justify-center mb-6">
                <a href="{{ url('/') }}" class="flex items-center space-x-2">
                    <div class="w-10 h-10 bg-gradient-to-br from-indigo-500 to-violet-600 rounded-xl flex items-center justify-center">
                        <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M6.3 2.841A1.5 1.5 0 004 4.11V15.89a1.5 1.5 0 002.3 1.269l9.344-5.89a1.5 1.5 0 000-2.538L6.3 2.84z"/>
                        </svg>
                    </div>
                    <span class="text-xl font-bold text-white">XteraPlay</span>
                </a>
            </div>

            <!-- Title -->
            <h1 class="text-2xl font-bold text-white text-center mb-2">Create Account</h1>
            <p class="text-gray-400 text-sm text-center mb-8">Join XteraPlay and start streaming today</p>

            <!-- Form -->
            <form method="POST" action="{{ url('/register') }}">
                @csrf

                <!-- Name -->
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-300 mb-2">Full Name</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}" required autofocus
                        class="w-full px-4 py-3 bg-[#111113] border border-[#2a2a30] rounded-xl text-white placeholder-gray-500 focus:outline-none focus:border-indigo-500 transition text-sm"
                        placeholder="Enter your name">
                    @error('name')
                        <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email -->
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-300 mb-2">Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" required
                        class="w-full px-4 py-3 bg-[#111113] border border-[#2a2a30] rounded-xl text-white placeholder-gray-500 focus:outline-none focus:border-indigo-500 transition text-sm"
                        placeholder="Enter your email">
                    @error('email')
                        <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password -->
                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-300 mb-2">Password</label>
                    <input type="password" id="password" name="password" required
                        class="w-full px-4 py-3 bg-[#111113] border border-[#2a2a30] rounded-xl text-white placeholder-gray-500 focus:outline-none focus:border-indigo-500 transition text-sm"
                        placeholder="Create a password (min 8 characters)">
                    @error('password')
                        <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Confirm Password -->
                <div class="mb-4">
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-300 mb-2">Confirm Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" required
                        class="w-full px-4 py-3 bg-[#111113] border border-[#2a2a30] rounded-xl text-white placeholder-gray-500 focus:outline-none focus:border-indigo-500 transition text-sm"
                        placeholder="Confirm your password">
                </div>

                <!-- Terms -->
                <div class="mb-6">
                    <label class="flex items-start">
                        <input type="checkbox" name="terms" value="1" class="w-4 h-4 mt-0.5 rounded border-[#2a2a30] bg-[#111113] text-indigo-500 focus:ring-indigo-500 focus:ring-offset-0">
                        <span class="ml-2 text-sm text-gray-400">I agree to the <a href="{{ url('/terms') }}" class="text-indigo-400 hover:text-indigo-300">Terms of Service</a> and <a href="{{ url('/privacy') }}" class="text-indigo-400 hover:text-indigo-300">Privacy Policy</a></span>
                    </label>
                    @error('terms')
                        <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Submit -->
                <button type="submit" class="w-full py-3 px-4 bg-gradient-to-r from-indigo-500 to-violet-600 text-white font-semibold rounded-xl hover:from-indigo-600 hover:to-violet-700 transition text-sm">
                    Create Account
                </button>
            </form>

            <!-- Login Link -->
            <p class="mt-6 text-center text-sm text-gray-400">
                Already have an account? <a href="{{ url('/login') }}" class="text-indigo-400 hover:text-indigo-300 font-medium transition">Sign In</a>
            </p>
        </div>
    </div>
</section>
@endsection
