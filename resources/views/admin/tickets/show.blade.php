@extends('admin.layouts.app')
@section('title', 'Ticket #' . str_pad($ticket->id, 4, '0', STR_PAD_LEFT))

@section('content')
<div class="max-w-4xl">
    <a href="{{ url('/admin/support') }}" class="text-sm text-blue-600 hover:text-blue-700 inline-flex items-center gap-1 mb-3">← Back to Tickets</a>

    @if(session('status'))
        <div class="mb-4 p-3 bg-emerald-50 border border-emerald-200 rounded-lg text-sm text-emerald-700">{{ session('status') }}</div>
    @endif

    <div class="bg-white border border-slate-200 rounded-2xl p-5 sm:p-6 mb-4">
        <div class="flex items-start justify-between gap-3 mb-4 pb-4 border-b border-slate-100">
            <div>
                <h2 class="text-lg sm:text-xl font-bold text-slate-900">{{ $ticket->subject }}</h2>
                <p class="text-xs text-slate-500 mt-1">#T-{{ str_pad($ticket->id, 4, '0', STR_PAD_LEFT) }} · {{ $ticket->user?->name }} ({{ $ticket->user?->email }}) · {{ $ticket->created_at->format('M j, Y g:i a') }}</p>
            </div>
            <span class="inline-flex px-2.5 py-1 text-xs font-medium rounded-full {{ $ticket->status_color }}">{{ ucfirst($ticket->status) }}</span>
        </div>

        <div class="flex items-center gap-4 text-xs text-slate-500 mb-4">
            <span>Category: <span class="font-medium text-slate-700">{{ ucfirst($ticket->category) }}</span></span>
            <span>Priority: <span class="font-medium text-slate-700">{{ ucfirst($ticket->priority) }}</span></span>
        </div>

        <div class="bg-slate-50 rounded-xl p-4 mb-4">
            <p class="text-xs text-slate-500 uppercase tracking-wide mb-2">User Message</p>
            <p class="text-sm text-slate-800 whitespace-pre-wrap">{{ $ticket->message }}</p>
        </div>

        @if($ticket->admin_reply)
        <div class="bg-blue-50 rounded-xl p-4">
            <p class="text-xs text-blue-700 uppercase tracking-wide mb-2 font-semibold">Admin Reply</p>
            <p class="text-sm text-slate-800 whitespace-pre-wrap">{{ $ticket->admin_reply }}</p>
        </div>
        @endif
    </div>

    <form method="POST" action="{{ url('/admin/support/' . $ticket->id . '/reply') }}" class="bg-white border border-slate-200 rounded-2xl p-5 sm:p-6 space-y-4">
        @csrf
        <h3 class="text-base font-semibold text-slate-900">{{ $ticket->admin_reply ? 'Update Reply' : 'Reply to Ticket' }}</h3>
        <div>
            <label class="block text-sm font-medium text-slate-700 mb-1.5">Reply</label>
            <textarea name="admin_reply" rows="5" required class="w-full px-3 py-2.5 bg-white border border-slate-300 rounded-lg text-sm text-slate-900 focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100">{{ old('admin_reply', $ticket->admin_reply) }}</textarea>
        </div>
        <div>
            <label class="block text-sm font-medium text-slate-700 mb-1.5">Update Status</label>
            <select name="status" class="w-full sm:w-64 px-3 py-2.5 bg-white border border-slate-300 rounded-lg text-sm text-slate-900 focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100">
                @foreach(['open' => 'Open', 'pending' => 'Pending', 'resolved' => 'Resolved', 'closed' => 'Closed'] as $key => $label)
                    <option value="{{ $key }}" @selected(old('status', $ticket->status) === $key)>{{ $label }}</option>
                @endforeach
            </select>
        </div>
        <div class="flex justify-between items-center pt-3 border-t border-slate-100">
            <form method="POST" action="{{ url('/admin/support/' . $ticket->id) }}" onsubmit="return confirm('Delete this ticket?');" class="inline">
                @csrf @method('DELETE')
                <button type="submit" class="text-sm text-red-600 hover:text-red-700 font-medium">Delete Ticket</button>
            </form>
            <div class="flex gap-2">
                <a href="{{ url('/admin/support') }}" class="px-4 py-2 bg-white hover:bg-slate-50 border border-slate-300 text-slate-700 text-sm font-medium rounded-lg transition">Cancel</a>
                <button type="submit" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold rounded-lg shadow-sm shadow-blue-500/25 transition">Send Reply</button>
            </div>
        </div>
    </form>
</div>
@endsection
