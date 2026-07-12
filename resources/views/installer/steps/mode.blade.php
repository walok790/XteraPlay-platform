@extends('installer.layout', ['csrfNeeded' => true])
@section('title', 'Choose Mode')

@section('content')
<h1 class="text-xl sm:text-2xl font-bold text-slate-900 mb-2">How would you like to install?</h1>
<p class="text-sm text-slate-600 mb-6">Pick <strong>Demo Mode</strong> to explore with pre-loaded sample data, or <strong>Business Mode</strong> for a clean production install.</p>

<form method="POST" action="{{ url('/install/mode') }}" x-data="{ mode: 'demo' }">
    @csrf
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
        <!-- Demo Card -->
        <label class="relative cursor-pointer" :class="mode === 'demo' ? 'ring-2 ring-blue-500 ring-offset-2' : ''">
            <input type="radio" name="mode" value="demo" x-model="mode" class="sr-only">
            <div class="h-full p-5 bg-white border-2 rounded-2xl transition"
                 :class="mode === 'demo' ? 'border-blue-500 bg-blue-50/50' : 'border-slate-200 hover:border-slate-300'">
                <div class="flex items-start justify-between mb-3">
                    <div class="w-11 h-11 bg-amber-100 rounded-xl flex items-center justify-center">
                        <svg class="w-6 h-6 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                    </div>
                    <div x-show="mode === 'demo'" class="w-6 h-6 rounded-full bg-blue-600 flex items-center justify-center">
                        <svg class="w-3.5 h-3.5 text-white" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.7 5.29a1 1 0 010 1.42l-8 8a1 1 0 01-1.42 0l-4-4a1 1 0 011.42-1.42L8 12.59l7.29-7.3a1 1 0 011.41 0z" clip-rule="evenodd"/></svg>
                    </div>
                </div>
                <h3 class="text-base font-semibold text-slate-900 mb-1">Demo Mode</h3>
                <p class="text-xs text-slate-600 leading-relaxed mb-3">Get up and running instantly with sample data.</p>
                <ul class="space-y-1.5 text-xs text-slate-700">
                    <li class="flex items-start gap-1.5"><svg class="w-3.5 h-3.5 text-emerald-600 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.7 5.29a1 1 0 010 1.42l-8 8a1 1 0 01-1.42 0l-4-4a1 1 0 011.42-1.42L8 12.59l7.29-7.3a1 1 0 011.41 0z" clip-rule="evenodd"/></svg>Pre-loaded reviews, coupons, tickets</li>
                    <li class="flex items-start gap-1.5"><svg class="w-3.5 h-3.5 text-emerald-600 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.7 5.29a1 1 0 010 1.42l-8 8a1 1 0 01-1.42 0l-4-4a1 1 0 011.42-1.42L8 12.59l7.29-7.3a1 1 0 011.41 0z" clip-rule="evenodd"/></svg>Default admin credentials shown on login</li>
                    <li class="flex items-start gap-1.5"><svg class="w-3.5 h-3.5 text-emerald-600 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.7 5.29a1 1 0 010 1.42l-8 8a1 1 0 01-1.42 0l-4-4a1 1 0 011.42-1.42L8 12.59l7.29-7.3a1 1 0 011.41 0z" clip-rule="evenodd"/></svg>Best for evaluation &amp; testing</li>
                </ul>
            </div>
        </label>

        <!-- Business Card -->
        <label class="relative cursor-pointer" :class="mode === 'business' ? 'ring-2 ring-blue-500 ring-offset-2' : ''">
            <input type="radio" name="mode" value="business" x-model="mode" class="sr-only">
            <div class="h-full p-5 bg-white border-2 rounded-2xl transition"
                 :class="mode === 'business' ? 'border-blue-500 bg-blue-50/50' : 'border-slate-200 hover:border-slate-300'">
                <div class="flex items-start justify-between mb-3">
                    <div class="w-11 h-11 bg-blue-100 rounded-xl flex items-center justify-center">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                    </div>
                    <div x-show="mode === 'business'" class="w-6 h-6 rounded-full bg-blue-600 flex items-center justify-center">
                        <svg class="w-3.5 h-3.5 text-white" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.7 5.29a1 1 0 010 1.42l-8 8a1 1 0 01-1.42 0l-4-4a1 1 0 011.42-1.42L8 12.59l7.29-7.3a1 1 0 011.41 0z" clip-rule="evenodd"/></svg>
                    </div>
                </div>
                <h3 class="text-base font-semibold text-slate-900 mb-1">Business Mode</h3>
                <p class="text-xs text-slate-600 leading-relaxed mb-3">Clean production install with your own admin.</p>
                <ul class="space-y-1.5 text-xs text-slate-700">
                    <li class="flex items-start gap-1.5"><svg class="w-3.5 h-3.5 text-emerald-600 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.7 5.29a1 1 0 010 1.42l-8 8a1 1 0 01-1.42 0l-4-4a1 1 0 011.42-1.42L8 12.59l7.29-7.3a1 1 0 011.41 0z" clip-rule="evenodd"/></svg>Only essential structure (plans, features)</li>
                    <li class="flex items-start gap-1.5"><svg class="w-3.5 h-3.5 text-emerald-600 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.7 5.29a1 1 0 010 1.42l-8 8a1 1 0 01-1.42 0l-4-4a1 1 0 011.42-1.42L8 12.59l7.29-7.3a1 1 0 011.41 0z" clip-rule="evenodd"/></svg>Create your own admin credentials</li>
                    <li class="flex items-start gap-1.5"><svg class="w-3.5 h-3.5 text-emerald-600 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.7 5.29a1 1 0 010 1.42l-8 8a1 1 0 01-1.42 0l-4-4a1 1 0 011.42-1.42L8 12.59l7.29-7.3a1 1 0 011.41 0z" clip-rule="evenodd"/></svg>Best for real deployments</li>
                </ul>
            </div>
        </label>
    </div>

    <div class="flex justify-between items-center">
        <a href="{{ url('/install/database') }}" class="text-sm text-slate-600 hover:text-slate-900 inline-flex items-center gap-1">← Back</a>
        <button type="submit" class="inline-flex items-center gap-1.5 px-5 py-2.5 bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-semibold rounded-lg transition shadow-sm">
            Continue
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
        </button>
    </div>
</form>
@endsection
