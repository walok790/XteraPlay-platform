@extends('installer.layout', ['csrfNeeded' => true])
@section('title', 'Create Admin')

@section('content')
<h1 class="text-xl sm:text-2xl font-bold text-slate-900 mb-2">Create Your Admin Account</h1>
<p class="text-sm text-slate-600 mb-6">This is the account you'll use to log in to the admin panel at <code class="text-slate-700 bg-slate-100 px-1 py-0.5 rounded text-xs">/admin/login</code>.</p>

<form method="POST" action="{{ url('/install/admin') }}" class="space-y-4">
    @csrf
    <div>
        <label class="block text-sm font-medium text-slate-700 mb-1.5">Full Name <span class="text-red-500">*</span></label>
        <input type="text" name="name" value="{{ old('name') }}" required class="w-full px-3 py-2.5 bg-white border border-slate-300 rounded-lg text-sm focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100" placeholder="John Doe">
        @error('name')<p class="mt-1 text-xs text-red-600">{{ $message }}</p>@enderror
    </div>
    <div>
        <label class="block text-sm font-medium text-slate-700 mb-1.5">Email <span class="text-red-500">*</span></label>
        <input type="email" name="email" value="{{ old('email') }}" required class="w-full px-3 py-2.5 bg-white border border-slate-300 rounded-lg text-sm focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100" placeholder="admin@yoursite.com">
        @error('email')<p class="mt-1 text-xs text-red-600">{{ $message }}</p>@enderror
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        <div>
            <label class="block text-sm font-medium text-slate-700 mb-1.5">Password <span class="text-red-500">*</span></label>
            <input type="password" name="password" required class="w-full px-3 py-2.5 bg-white border border-slate-300 rounded-lg text-sm focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100" placeholder="At least 8 characters">
            @error('password')<p class="mt-1 text-xs text-red-600">{{ $message }}</p>@enderror
        </div>
        <div>
            <label class="block text-sm font-medium text-slate-700 mb-1.5">Confirm Password <span class="text-red-500">*</span></label>
            <input type="password" name="password_confirmation" required class="w-full px-3 py-2.5 bg-white border border-slate-300 rounded-lg text-sm focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100" placeholder="Repeat">
        </div>
    </div>

    <div class="p-3 bg-amber-50 border border-amber-200 rounded-lg text-xs text-amber-800 flex items-start gap-2">
        <svg class="w-4 h-4 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M8.26 3.09c.77-1.33 2.7-1.33 3.47 0l6.28 10.87c.77 1.33-.19 3-1.73 3H3.71c-1.54 0-2.5-1.67-1.73-3L8.26 3.09zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
        <p>Save these credentials securely — you'll need them to access the admin panel.</p>
    </div>

    <div class="flex justify-between items-center pt-2">
        <a href="{{ url('/install/mode') }}" class="text-sm text-slate-600 hover:text-slate-900 inline-flex items-center gap-1">← Back</a>
        <button type="submit" class="inline-flex items-center gap-1.5 px-5 py-2.5 bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-semibold rounded-lg transition shadow-sm">
            Continue
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
        </button>
    </div>
</form>
@endsection
