@extends('layouts.app')

@section('title', 'Verify Email - XteraPlay')

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
                <div class="inline-flex items-center justify-center w-14 h-14 bg-blue-50 rounded-full mb-3">
                    <svg class="w-7 h-7 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                </div>
                <h1 class="text-xl sm:text-2xl font-bold text-slate-900 mb-1">Verify your email</h1>
                <p class="text-sm text-slate-600 leading-relaxed">
                    We sent a verification link to<br>
                    <span class="text-slate-900 font-medium">{{ Auth::user()->email ?? 'your email' }}</span>
                </p>
            </div>

            @if(session('status') == 'verification-link-sent')
                <div class="mb-4 p-3 bg-emerald-50 border border-emerald-200 rounded-lg flex items-start gap-2">
                    <svg class="w-4 h-4 text-emerald-600 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.71-9.29a1 1 0 00-1.42-1.42L9 10.59 7.71 9.29a1 1 0 00-1.42 1.42l2 2a1 1 0 001.42 0l4-4z" clip-rule="evenodd"/></svg>
                    <p class="text-sm text-emerald-700">A new verification link has been sent.</p>
                </div>
            @endif

            <div class="space-y-3">
                <form method="POST" action="{{ url('/email/verification-notification') }}">
                    @csrf
                    <button type="submit" class="w-full py-2.5 bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold rounded-lg shadow-sm shadow-blue-500/25 transition">
                        Resend Verification Email
                    </button>
                </form>

                <a href="{{ url('/dashboard') }}" class="block w-full py-2.5 text-center bg-slate-100 hover:bg-slate-200 text-slate-700 text-sm font-medium rounded-lg transition">
                    Skip for now
                </a>
            </div>

            <div class="mt-6 pt-6 border-t border-slate-200 text-center">
                <p class="text-xs text-slate-500 leading-relaxed">
                    Didn't receive the email? Check spam or
                    <form method="POST" action="{{ url('/logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="text-blue-600 hover:text-blue-700 font-medium">sign out</button>
                    </form>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
