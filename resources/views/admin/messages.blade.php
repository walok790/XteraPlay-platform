@extends('admin.layouts.app')
@section('title', 'Messages')

@section('content')
<div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 mb-6">
    <div>
        <h2 class="text-xl sm:text-2xl font-bold text-slate-900">Contact Messages</h2>
        <p class="text-sm text-slate-600 mt-1">Messages received via the public contact form.</p>
    </div>
    <div class="flex items-center gap-2">
        @foreach(['all' => 'All', 'unread' => 'Unread', 'replied' => 'Replied'] as $key => $label)
        <a href="{{ url('/admin/messages?filter=' . $key) }}" class="px-3 py-1.5 text-xs font-medium rounded-lg transition {{ ($filter ?? 'all') === $key ? 'bg-blue-600 text-white' : 'bg-white border border-slate-300 text-slate-700 hover:bg-slate-50' }}">{{ $label }}</a>
        @endforeach
    </div>
</div>

@if(session('status'))
    <div class="mb-4 p-3 bg-emerald-50 border border-emerald-200 rounded-lg text-sm text-emerald-700">{{ session('status') }}</div>
@endif

<div class="space-y-3 sm:space-y-4">
    @forelse($messages as $m)
    <div class="bg-white border {{ ! $m->is_read ? 'border-blue-200' : 'border-slate-200' }} rounded-2xl p-5 hover:shadow-md transition">
        <div class="flex items-start justify-between gap-3 mb-2">
            <div class="min-w-0 flex-1">
                <div class="flex items-center gap-2 mb-1">
                    @if(! $m->is_read)<span class="w-2 h-2 bg-blue-500 rounded-full flex-shrink-0"></span>@endif
                    <p class="text-sm sm:text-base font-semibold text-slate-900 truncate">{{ $m->subject }}</p>
                </div>
                <p class="text-xs text-slate-500">{{ $m->name }} · <a href="mailto:{{ $m->email }}" class="text-blue-600 hover:underline">{{ $m->email }}</a> · {{ $m->created_at->diffForHumans() }}</p>
            </div>
            <div class="flex items-center gap-1 flex-shrink-0">
                @if(! $m->is_read)<span class="px-2 py-0.5 bg-blue-50 text-blue-700 text-xs font-medium rounded-full">New</span>@endif
                @if($m->is_replied)<span class="px-2 py-0.5 bg-emerald-50 text-emerald-700 text-xs font-medium rounded-full">Replied</span>@endif
            </div>
        </div>
        <p class="text-sm text-slate-700 leading-relaxed mb-3 whitespace-pre-wrap">{{ $m->message }}</p>
        <div class="flex items-center gap-2 pt-3 border-t border-slate-100">
            <a href="mailto:{{ $m->email }}?subject=Re: {{ urlencode($m->subject) }}" class="px-3 py-1.5 bg-blue-600 hover:bg-blue-700 text-white text-xs font-medium rounded-lg transition">Reply via Email</a>
            @if(! $m->is_read)
            <form method="POST" action="{{ url('/admin/messages/' . $m->id . '/read') }}" class="inline">
                @csrf
                <button type="submit" class="px-3 py-1.5 bg-white hover:bg-slate-50 border border-slate-300 text-slate-700 text-xs font-medium rounded-lg transition">Mark as read</button>
            </form>
            @endif
            @if(! $m->is_replied)
            <form method="POST" action="{{ url('/admin/messages/' . $m->id . '/replied') }}" class="inline">
                @csrf
                <button type="submit" class="px-3 py-1.5 bg-emerald-50 hover:bg-emerald-100 border border-emerald-200 text-emerald-700 text-xs font-medium rounded-lg transition">Mark as replied</button>
            </form>
            @endif
            <form method="POST" action="{{ url('/admin/messages/' . $m->id) }}" onsubmit="return confirm('Delete this message?');" class="inline ml-auto">
                @csrf @method('DELETE')
                <button type="submit" class="px-3 py-1.5 text-red-600 hover:bg-red-50 text-xs font-medium rounded-lg transition">Delete</button>
            </form>
        </div>
    </div>
    @empty
    <div class="bg-white border border-slate-200 rounded-2xl p-12 text-center text-slate-500">No messages found.</div>
    @endforelse
</div>
@endsection
