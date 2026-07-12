@extends('layouts.app')

@section('title', 'Support - XteraPlay')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-6 sm:py-8 md:py-10" x-data="{ showForm: {{ $errors->any() ? 'true' : 'false' }} }">
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 mb-6 sm:mb-8">
        <div>
            <h1 class="text-2xl sm:text-3xl font-bold text-slate-900">Support Tickets</h1>
            <p class="text-sm text-slate-600 mt-1">Get help from our team. Track your open tickets below.</p>
        </div>
        <button @click="showForm = !showForm" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-lg shadow-sm shadow-blue-500/25 transition self-start sm:self-auto flex items-center gap-1.5">
            <svg class="w-4 h-4" x-show="!showForm" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            <svg class="w-4 h-4" x-show="showForm" x-cloak fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            <span x-text="showForm ? 'Cancel' : 'New Ticket'"></span>
        </button>
    </div>

    @if(session('status'))
        <div class="mb-4 p-3 bg-emerald-50 border border-emerald-200 rounded-2xl text-sm text-emerald-700">{{ session('status') }}</div>
    @endif

    <!-- New Ticket Form -->
    <div x-show="showForm" x-cloak x-transition class="bg-white border border-slate-200 rounded-2xl p-5 sm:p-6 mb-6">
        <h3 class="text-base sm:text-lg font-semibold text-slate-900 mb-4">Create New Ticket</h3>
        <form method="POST" action="{{ url('/support') }}" class="space-y-4">
            @csrf
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1.5">Subject <span class="text-red-500">*</span></label>
                <input type="text" name="subject" value="{{ old('subject') }}" required placeholder="Brief description of your issue" class="w-full px-3 py-2.5 bg-white border border-slate-300 rounded-lg text-sm text-slate-900 placeholder-slate-400 focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100 transition">
                @error('subject')<p class="mt-1 text-xs text-red-600">{{ $message }}</p>@enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1.5">Category <span class="text-red-500">*</span></label>
                <select name="category" required class="w-full px-3 py-2.5 bg-white border border-slate-300 rounded-lg text-sm text-slate-900 focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100 transition">
                    <option value="">Select a category</option>
                    <option value="bug" @selected(old('category') === 'bug')>Bug Report</option>
                    <option value="feature" @selected(old('category') === 'feature')>Feature Request</option>
                    <option value="account" @selected(old('category') === 'account')>Account</option>
                    <option value="billing" @selected(old('category') === 'billing')>Billing</option>
                    <option value="other" @selected(old('category') === 'other')>Other</option>
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1.5">Message <span class="text-red-500">*</span></label>
                <textarea name="message" rows="4" required placeholder="Describe your issue in detail..." class="w-full px-3 py-2.5 bg-white border border-slate-300 rounded-lg text-sm text-slate-900 placeholder-slate-400 focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100 transition resize-none">{{ old('message') }}</textarea>
                @error('message')<p class="mt-1 text-xs text-red-600">{{ $message }}</p>@enderror
            </div>
            <button type="submit" class="px-5 py-2.5 bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold rounded-lg shadow-sm shadow-blue-500/25 transition">Submit Ticket</button>
        </form>
    </div>

    <!-- Ticket List -->
    <div class="space-y-3 sm:space-y-4">
        @forelse($tickets as $t)
        <div class="bg-white border border-slate-200 rounded-2xl p-5 hover:shadow-md transition">
            <div class="flex items-start justify-between gap-3 mb-2">
                <div>
                    <h4 class="text-sm sm:text-base font-semibold text-slate-900">{{ $t->subject }}</h4>
                    <p class="text-xs text-slate-500 mt-0.5">#T-{{ str_pad($t->id, 4, '0', STR_PAD_LEFT) }} · {{ $t->created_at->diffForHumans() }}</p>
                </div>
                <span class="px-2.5 py-1 text-xs font-medium rounded-full whitespace-nowrap {{ $t->status_color }}">{{ ucfirst($t->status) }}</span>
            </div>
            <p class="text-sm text-slate-600 mb-3">{{ Str::limit($t->message, 200) }}</p>
            @if($t->admin_reply)
                <div class="mt-3 p-3 bg-blue-50 rounded-lg">
                    <p class="text-xs font-semibold text-blue-700 mb-1">Admin Reply:</p>
                    <p class="text-sm text-slate-700">{{ $t->admin_reply }}</p>
                </div>
            @endif
            <div class="flex items-center gap-3 text-xs text-slate-500 mt-3 pt-3 border-t border-slate-100">
                <span>{{ ucfirst($t->category) }}</span>
                <span class="w-1 h-1 bg-slate-400 rounded-full"></span>
                <span>Priority: {{ ucfirst($t->priority) }}</span>
            </div>
        </div>
        @empty
        <div class="bg-white border border-slate-200 rounded-2xl p-8 sm:p-12 text-center">
            <div class="w-14 h-14 bg-blue-50 rounded-full flex items-center justify-center mx-auto mb-3">
                <svg class="w-7 h-7 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M18.36 5.64l-3.53 3.53m0 5.66l3.53 3.53M9.17 9.17L5.64 5.64m3.53 9.19l-3.53 3.53M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            </div>
            <p class="text-sm font-medium text-slate-700">No tickets yet</p>
            <p class="text-xs text-slate-500 mt-1">Create a ticket above and our team will help you out.</p>
        </div>
        @endforelse
    </div>
</div>
@endsection
