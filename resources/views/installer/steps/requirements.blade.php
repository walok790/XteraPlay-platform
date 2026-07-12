@extends('installer.layout')
@section('title', 'Requirements')

@section('content')
<h1 class="text-xl sm:text-2xl font-bold text-slate-900 mb-2">Server Requirements</h1>
<p class="text-sm text-slate-600 mb-6">Make sure your server has all required PHP extensions.</p>

<div class="bg-slate-50 border border-slate-200 rounded-xl overflow-hidden mb-6">
    @foreach($checks as $check)
    <div class="flex items-center justify-between px-4 py-3 {{ ! $loop->last ? 'border-b border-slate-200' : '' }}">
        <span class="text-sm font-medium text-slate-800">{{ $check['name'] }}</span>
        @if($check['ok'])
            <div class="w-6 h-6 rounded-full bg-emerald-500 flex items-center justify-center">
                <svg class="w-3.5 h-3.5 text-white" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.7 5.29a1 1 0 010 1.42l-8 8a1 1 0 01-1.42 0l-4-4a1 1 0 011.42-1.42L8 12.59l7.29-7.3a1 1 0 011.41 0z" clip-rule="evenodd"/></svg>
            </div>
        @else
            <div class="w-6 h-6 rounded-full bg-red-500 flex items-center justify-center">
                <svg class="w-3.5 h-3.5 text-white" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4.29 4.29a1 1 0 011.42 0L10 8.59l4.29-4.3a1 1 0 111.42 1.42L11.41 10l4.3 4.29a1 1 0 01-1.42 1.42L10 11.41l-4.29 4.3a1 1 0 01-1.42-1.42L8.59 10 4.29 5.71a1 1 0 010-1.42z" clip-rule="evenodd"/></svg>
            </div>
        @endif
    </div>
    @endforeach
</div>

@if($allPass)
    <div class="p-3 bg-emerald-50 border border-emerald-200 rounded-lg text-sm text-emerald-700 mb-5 flex items-start gap-2">
        <svg class="w-5 h-5 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.71-9.29a1 1 0 00-1.42-1.42L9 10.59 7.71 9.29a1 1 0 00-1.42 1.42l2 2a1 1 0 001.42 0l4-4z" clip-rule="evenodd"/></svg>
        <p>All extensions are enabled — you can continue to the next step.</p>
    </div>
@else
    <div class="p-3 bg-red-50 border border-red-200 rounded-lg text-sm text-red-700 mb-5 flex items-start gap-2">
        <svg class="w-5 h-5 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
        <p>Some required extensions are missing. Please enable them in your PHP configuration.</p>
    </div>
@endif

<div class="flex justify-end">
    <a href="{{ url('/install/permissions') }}" class="{{ $allPass ? 'bg-emerald-600 hover:bg-emerald-700' : 'bg-slate-300 cursor-not-allowed pointer-events-none' }} inline-flex items-center gap-1.5 px-5 py-2.5 text-white text-sm font-semibold rounded-lg transition shadow-sm">
        Continue
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
    </a>
</div>
@endsection
