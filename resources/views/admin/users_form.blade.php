@extends('admin.layouts.app')
@section('title', $user->exists ? 'Edit User' : 'New User')

@section('content')
<div class="mb-6">
    <a href="{{ url('/admin/users') }}" class="text-sm text-blue-600 hover:text-blue-700 inline-flex items-center gap-1 mb-2">← Back to Users</a>
    <h2 class="text-xl sm:text-2xl font-bold text-slate-900">{{ $user->exists ? 'Edit User' : 'Create New User' }}</h2>
</div>

<form method="POST" action="{{ url('/admin/users' . ($user->exists ? '/' . $user->id : '')) }}" class="max-w-2xl bg-white border border-slate-200 rounded-2xl p-5 sm:p-6 space-y-4">
    @csrf
    @if($user->exists) @method('PUT') @endif
    <div>
        <label class="block text-sm font-medium text-slate-700 mb-1.5">Name <span class="text-red-500">*</span></label>
        <input type="text" name="name" value="{{ old('name', $user->name) }}" required class="w-full px-3 py-2.5 bg-white border border-slate-300 rounded-lg text-sm text-slate-900 focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100">
        @error('name')<p class="mt-1 text-xs text-red-600">{{ $message }}</p>@enderror
    </div>
    <div>
        <label class="block text-sm font-medium text-slate-700 mb-1.5">Email <span class="text-red-500">*</span></label>
        <input type="email" name="email" value="{{ old('email', $user->email) }}" required class="w-full px-3 py-2.5 bg-white border border-slate-300 rounded-lg text-sm text-slate-900 focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100">
        @error('email')<p class="mt-1 text-xs text-red-600">{{ $message }}</p>@enderror
    </div>
    <div>
        <label class="block text-sm font-medium text-slate-700 mb-1.5">Password {!! $user->exists ? '<span class="text-xs text-slate-500">(leave blank to keep current)</span>' : '<span class="text-red-500">*</span>' !!}</label>
        <input type="password" name="password" {{ $user->exists ? '' : 'required' }} class="w-full px-3 py-2.5 bg-white border border-slate-300 rounded-lg text-sm text-slate-900 focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100" placeholder="At least 8 characters">
        @error('password')<p class="mt-1 text-xs text-red-600">{{ $message }}</p>@enderror
    </div>
    <div class="flex justify-end gap-2 pt-2 border-t border-slate-100">
        <a href="{{ url('/admin/users') }}" class="px-4 py-2 bg-white hover:bg-slate-50 border border-slate-300 text-slate-700 text-sm font-medium rounded-lg transition">Cancel</a>
        <button type="submit" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold rounded-lg shadow-sm shadow-blue-500/25 transition">{{ $user->exists ? 'Save Changes' : 'Create User' }}</button>
    </div>
</form>
@endsection
