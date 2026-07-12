@extends('installer.layout')
@section('title', 'Permissions')

@section('content')
<h1 class="text-xl sm:text-2xl font-bold text-slate-900 mb-2">Directory Permissions</h1>
<p class="text-sm text-slate-600 mb-6">The installer needs write access to these directories.</p>

<div class="bg-slate-50 border border-slate-200 rounded-xl overflow-hidden mb-6">
    @foreach($checks as $check)
    <div class="flex items-center justify-between px-4 py-3 {{ ! $loop->last ? 'border-b border-slate-200' : '' }}">
        <div>
            <p class="text-sm font-medium text-slate-800">{{ $check['path'] }}</p>
            <p class="text-xs text-slate-500 mt-0.5">
                {{ $check['type'] }} ·
                @if(! $check['exists']) <span class="text-red-600">Doesn't exist</span>
                @elseif(! $check['ok']) <span class="text-red-600">Not writable</span>
                @else <span class="text-emerald-600">Writable</span> @endif
            </p>
        </div>
        @if($check['ok'])
            <div class="w-6 h-6 rounded-full bg-emerald-500 flex items-center justify-center"><svg class="w-3.5 h-3.5 text-white" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.7 5.29a1 1 0 010 1.42l-8 8a1 1 0 01-1.42 0l-4-4a1 1 0 011.42-1.42L8 12.59l7.29-7.3a1 1 0 011.41 0z" clip-rule="evenodd"/></svg></div>
        @else
            <div class="w-6 h-6 rounded-full bg-red-500 flex items-center justify-center"><svg class="w-3.5 h-3.5 text-white" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4.29 4.29a1 1 0 011.42 0L10 8.59l4.29-4.3a1 1 0 111.42 1.42L11.41 10l4.3 4.29a1 1 0 01-1.42 1.42L10 11.41l-4.29 4.3a1 1 0 01-1.42-1.42L8.59 10 4.29 5.71a1 1 0 010-1.42z" clip-rule="evenodd"/></svg></div>
        @endif
    </div>
    @endforeach
</div>

@if($allPass)
    <div class="p-3 bg-emerald-50 border border-emerald-200 rounded-lg text-sm text-emerald-700 mb-5">All directories are writable — you can continue.</div>
@else
    <div class="p-3 bg-red-50 border border-red-200 rounded-lg text-sm text-red-700 mb-5">
        <p class="font-medium mb-1">Some paths need write access.</p>
        <p class="text-xs">On Linux/shared hosting, set permissions with:</p>
        <code class="block mt-1 p-2 bg-red-100 text-red-800 text-xs rounded font-mono">chmod -R 775 storage bootstrap/cache</code>
    </div>
@endif

<div class="flex justify-between items-center">
    <a href="{{ url('/install/requirements') }}" class="text-sm text-slate-600 hover:text-slate-900 inline-flex items-center gap-1">← Back</a>
    <a href="{{ url('/install/database') }}" class="{{ $allPass ? 'bg-emerald-600 hover:bg-emerald-700' : 'bg-slate-300 cursor-not-allowed pointer-events-none' }} inline-flex items-center gap-1.5 px-5 py-2.5 text-white text-sm font-semibold rounded-lg transition shadow-sm">
        Continue
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
    </a>
</div>
@endsection
