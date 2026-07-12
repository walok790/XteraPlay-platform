@extends('installer.layout', ['csrfNeeded' => true])
@section('title', 'Database')

@section('content')
<h1 class="text-xl sm:text-2xl font-bold text-slate-900 mb-2">Database Configuration</h1>
<p class="text-sm text-slate-600 mb-6">Enter your MySQL database credentials. We'll test the connection before continuing.</p>

@if($errors->has('db'))
    <div class="mb-4 p-3 bg-red-50 border border-red-200 rounded-lg text-sm text-red-700">
        <p class="font-medium mb-1">Connection failed</p>
        <p class="text-xs">{{ $errors->first('db') }}</p>
    </div>
@endif

<form method="POST" action="{{ url('/install/database') }}" class="space-y-4">
    @csrf
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
        <div class="sm:col-span-2">
            <label class="block text-sm font-medium text-slate-700 mb-1.5">Database Host <span class="text-red-500">*</span></label>
            <input type="text" name="db_host" value="{{ old('db_host', $env['DB_HOST'] ?? '127.0.0.1') }}" required class="w-full px-3 py-2.5 bg-white border border-slate-300 rounded-lg text-sm focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100">
            <p class="mt-1 text-xs text-slate-500">Usually <code>127.0.0.1</code> or <code>localhost</code></p>
        </div>
        <div>
            <label class="block text-sm font-medium text-slate-700 mb-1.5">Port <span class="text-red-500">*</span></label>
            <input type="number" name="db_port" value="{{ old('db_port', $env['DB_PORT'] ?? '3306') }}" required class="w-full px-3 py-2.5 bg-white border border-slate-300 rounded-lg text-sm focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100">
        </div>
    </div>
    <div>
        <label class="block text-sm font-medium text-slate-700 mb-1.5">Database Name <span class="text-red-500">*</span></label>
        <input type="text" name="db_database" value="{{ old('db_database', $env['DB_DATABASE'] ?? 'xteraplay') }}" required class="w-full px-3 py-2.5 bg-white border border-slate-300 rounded-lg text-sm focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100" placeholder="e.g. xteraplay">
        <p class="mt-1 text-xs text-slate-500">Create this database in your MySQL / cPanel / phpMyAdmin first.</p>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        <div>
            <label class="block text-sm font-medium text-slate-700 mb-1.5">Username <span class="text-red-500">*</span></label>
            <input type="text" name="db_username" value="{{ old('db_username', $env['DB_USERNAME'] ?? 'root') }}" required class="w-full px-3 py-2.5 bg-white border border-slate-300 rounded-lg text-sm focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100">
        </div>
        <div>
            <label class="block text-sm font-medium text-slate-700 mb-1.5">Password</label>
            <input type="password" name="db_password" value="{{ old('db_password', $env['DB_PASSWORD'] ?? '') }}" class="w-full px-3 py-2.5 bg-white border border-slate-300 rounded-lg text-sm focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100" placeholder="Leave empty if none">
        </div>
    </div>

    <div class="p-3 bg-blue-50 border border-blue-200 rounded-lg text-xs text-slate-700 flex items-start gap-2">
        <svg class="w-4 h-4 text-blue-600 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.87.5c-.19.3-.38.6-.63.5a1 1 0 00-1 0v6a1 1 0 002 0v-2a1 1 0 001 1h.5a1 1 0 001-1v-3a1 1 0 00-1-1H10z" clip-rule="evenodd"/></svg>
        <p>These credentials will be written to your <code>.env</code> file. Make sure the database already exists on your server.</p>
    </div>

    <div class="flex justify-between items-center pt-2">
        <a href="{{ url('/install/permissions') }}" class="text-sm text-slate-600 hover:text-slate-900 inline-flex items-center gap-1">← Back</a>
        <button type="submit" class="inline-flex items-center gap-1.5 px-5 py-2.5 bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-semibold rounded-lg transition shadow-sm">
            Test &amp; Continue
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
        </button>
    </div>
</form>
@endsection
