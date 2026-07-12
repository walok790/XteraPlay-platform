@extends('admin.layouts.app')
@section('title', 'Announcements')

@section('content')
<div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 mb-6" x-data="{ showForm: false }">
    <div>
        <h2 class="text-xl sm:text-2xl font-bold text-slate-900">Announcements</h2>
        <p class="text-sm text-slate-600 mt-1">Post updates and notices to logged-in users on the home page.</p>
    </div>
    <button @click="showForm = !showForm" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-lg shadow-sm shadow-blue-500/25 transition self-start sm:self-auto">
        <span x-text="showForm ? 'Cancel' : '+ New Announcement'"></span>
    </button>
</div>

@if(session('status'))
    <div class="mb-4 p-3 bg-emerald-50 border border-emerald-200 rounded-lg text-sm text-emerald-700">{{ session('status') }}</div>
@endif

<div x-data="{ showForm: false }" x-show="showForm" x-cloak class="bg-white border border-slate-200 rounded-2xl p-5 sm:p-6 mb-4">
    <form method="POST" action="{{ url('/admin/announcements') }}" class="space-y-4">
        @csrf
        <div>
            <label class="block text-sm font-medium text-slate-700 mb-1.5">Title</label>
            <input type="text" name="title" required class="w-full px-3 py-2.5 bg-white border border-slate-300 rounded-lg text-sm focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100">
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1.5">Type</label>
                <select name="type" class="w-full px-3 py-2.5 bg-white border border-slate-300 rounded-lg text-sm focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100">
                    <option value="info">Info (blue)</option>
                    <option value="success">Success (green)</option>
                    <option value="warning">Warning (amber)</option>
                    <option value="notice">Notice (gray)</option>
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1.5">Published At</label>
                <input type="datetime-local" name="published_at" class="w-full px-3 py-2.5 bg-white border border-slate-300 rounded-lg text-sm focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100">
            </div>
        </div>
        <div>
            <label class="block text-sm font-medium text-slate-700 mb-1.5">Message</label>
            <textarea name="message" rows="3" required class="w-full px-3 py-2.5 bg-white border border-slate-300 rounded-lg text-sm focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100 resize-none"></textarea>
        </div>
        <label class="flex items-center gap-2">
            <input type="checkbox" name="is_active" value="1" checked class="w-4 h-4 rounded border-slate-300 text-blue-600 focus:ring-2 focus:ring-blue-100">
            <span class="text-sm text-slate-700">Publish immediately</span>
        </label>
        <div class="flex justify-end">
            <button type="submit" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold rounded-lg shadow-sm shadow-blue-500/25 transition">Publish</button>
        </div>
    </form>
</div>

<div class="space-y-3">
    @forelse($announcements as $a)
    <div class="bg-white border border-slate-200 rounded-2xl p-5 hover:shadow-md transition">
        <div class="flex items-start justify-between gap-3 mb-2">
            <div class="flex items-center gap-2">
                <span class="px-2 py-0.5 text-xs font-medium rounded-full {{ $a->type_color }}">{{ ucfirst($a->type) }}</span>
                <h4 class="text-sm sm:text-base font-semibold text-slate-900">{{ $a->title }}</h4>
            </div>
            <div class="flex items-center gap-1">
                @if(! $a->is_active)<span class="px-2 py-0.5 text-xs bg-slate-100 text-slate-600 rounded-full">Draft</span>@endif
            </div>
        </div>
        <p class="text-sm text-slate-600 mb-3">{{ $a->message }}</p>
        <div class="flex items-center gap-2 pt-3 border-t border-slate-100">
            <span class="text-xs text-slate-500 flex-1">{{ $a->published_at?->format('M j, Y') ?? 'Not published' }}</span>
            <form method="POST" action="{{ url('/admin/announcements/' . $a->id . '/toggle') }}" class="inline">
                @csrf
                <button type="submit" class="px-3 py-1.5 text-xs bg-white border border-slate-300 text-slate-700 hover:bg-slate-50 rounded-lg font-medium">{{ $a->is_active ? 'Unpublish' : 'Publish' }}</button>
            </form>
            <form method="POST" action="{{ url('/admin/announcements/' . $a->id) }}" onsubmit="return confirm('Delete?');" class="inline">
                @csrf @method('DELETE')
                <button type="submit" class="px-3 py-1.5 text-xs text-red-600 hover:bg-red-50 rounded-lg font-medium">Delete</button>
            </form>
        </div>
    </div>
    @empty
    <div class="bg-white border border-slate-200 rounded-2xl p-12 text-center text-slate-500">No announcements yet.</div>
    @endforelse
</div>
@endsection
