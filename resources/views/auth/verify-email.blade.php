@extends('layouts.app')

@section('title', 'Verify Email - XteraPlay')

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
                <div class="inline-flex items-center justify-center w-12 h-12 bg-indigo-500/10 rounded-full mb-3">
                    <svg class="w-6 h-6 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                </div>
                <h1 class="text-lg font-bold text-white mb-1">Verify your email</h1>
                <p class="text-xs text-gray-400 leading-relaxed">
                    We sent a verification link to <span class="text-white font-medium">{{ Auth::user()->email ?? 'your email' }}</span>. Click the link to activate your account.
                </p>
            </div>

            @if(session('status') == 'verification-link-sent')
                <div class="mb-4 p-3 bg-emerald-500/10 border border-emerald-500/30 rounded-lg flex items-start gap-2">
                    <svg class="w-4 h-4 text-emerald-400 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.71-9.29a1 1 0 00-1.42-1.42L9 10.59 7.71 9.29a1 1 0 00-1.42 1.42l2 2a1 1 0 001.42 0l4-4z" clip-rule="evenodd"/></svg>
                    <p class="text-xs text-emerald-400">A new verification link has been sent to your email.</p>
                </div>
            @endif

            <div class="space-y-3">
                <!-- Resend button -->
                <form method="POST" action="{{ url('/email/verification-notification') }}">
                    @csrf
                    <button type="submit" class="w-full py-2.5 bg-gradient-to-r from-indigo-500 to-violet-600 text-white text-sm font-medium rounded-lg hover:opacity-90 transition">
                        Resend Verification Email
                    </button>
                </form>

                <!-- Change email -->
                <a href="{{ url('/dashboard') }}" class="block w-full py-2.5 text-center bg-[#0a0a0f] border border-[#2a2a30] text-gray-300 text-sm rounded-lg hover:border-gray-500 hover:text-white transition">
                    Skip for now
                </a>
            </div>

            <div class="mt-5 pt-4 border-t border-[#2a2a30]">
                <p class="text-[11px] text-gray-500 text-center leading-relaxed">
                    Didn't receive the email? Check your spam folder or
                    <form method="POST" action="{{ url('/logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="text-indigo-400 hover:text-indigo-300">sign out</button>
                    </form>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
