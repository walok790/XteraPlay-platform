@extends('admin.layouts.app')
@section('title', 'Reviews')

@section('content')
<div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 mb-6">
    <div>
        <h2 class="text-xl sm:text-2xl font-bold text-slate-900">Reviews</h2>
        <p class="text-sm text-slate-600 mt-1">Approve, unapprove, or delete user reviews. Only approved reviews show on the landing page.</p>
    </div>
    <div class="flex items-center gap-2 flex-wrap">
        @foreach(['all' => 'All', 'pending' => 'Pending', 'approved' => 'Approved'] as $key => $label)
        <a href="{{ url('/admin/reviews?filter=' . $key) }}" class="px-3 py-1.5 text-xs font-medium rounded-lg transition {{ ($filter ?? 'all') === $key ? 'bg-blue-600 text-white' : 'bg-white border border-slate-300 text-slate-700 hover:bg-slate-50' }}">
            {{ $label }}
            <span class="ml-1 text-[10px] opacity-70">({{ $counts[$key] ?? 0 }})</span>
        </a>
        @endforeach
    </div>
</div>

@if(session('status'))
    <div class="mb-4 p-3 bg-emerald-50 border border-emerald-200 rounded-lg text-sm text-emerald-700">{{ session('status') }}</div>
@endif

<!-- Rating Summary -->
<div class="bg-white border border-slate-200 rounded-2xl p-5 sm:p-6 mb-6">
    <div class="grid grid-cols-3 gap-4 sm:gap-6">
        <div>
            <p class="text-xs text-slate-500 uppercase tracking-wide mb-1">Average Rating</p>
            <p class="text-3xl font-bold text-slate-900">{{ $counts['avg_rating'] }} <span class="text-amber-400 text-2xl">★</span></p>
        </div>
        <div>
            <p class="text-xs text-slate-500 uppercase tracking-wide mb-1">Approved</p>
            <p class="text-3xl font-bold text-emerald-600">{{ $counts['approved'] }}</p>
        </div>
        <div>
            <p class="text-xs text-slate-500 uppercase tracking-wide mb-1">Pending</p>
            <p class="text-3xl font-bold text-amber-600">{{ $counts['pending'] }}</p>
        </div>
    </div>
</div>

<div class="space-y-3 sm:space-y-4">
    @forelse($reviews as $r)
    <div class="bg-white border {{ $r->is_approved ? 'border-slate-200' : 'border-amber-200 bg-amber-50/30' }} rounded-2xl p-5 hover:shadow-md transition">
        <div class="flex items-start justify-between gap-3 mb-3">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-full bg-gradient-to-br {{ $r->avatar_color }} flex items-center justify-center text-sm font-semibold text-white flex-shrink-0">{{ $r->initials }}</div>
                <div>
                    <p class="text-sm font-semibold text-slate-900">{{ $r->display_name }}</p>
                    <div class="flex items-center gap-1">
                        @for($i = 0; $i < $r->rating; $i++)<svg class="w-3 h-3 text-amber-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.05 2.93c.3-.92 1.6-.92 1.9 0l1.07 3.29a1 1 0 00.95.69h3.46c.97 0 1.37 1.24.59 1.81l-2.8 2.03a1 1 0 00-.37 1.12l1.07 3.29c.3.92-.75 1.69-1.54 1.12l-2.8-2.03a1 1 0 00-1.17 0l-2.8 2.03c-.78.57-1.84-.2-1.54-1.12l1.07-3.29a1 1 0 00-.37-1.12L2.98 8.72c-.78-.57-.38-1.81.59-1.81h3.46a1 1 0 00.95-.69l1.07-3.29z"/></svg>@endfor
                        <span class="text-xs text-slate-500 ml-1">· {{ $r->created_at->diffForHumans() }} · {{ $r->role ?? 'user' }}</span>
                    </div>
                </div>
            </div>
            <div class="flex items-center gap-1 flex-shrink-0">
                @if($r->is_approved)
                    <span class="px-2 py-0.5 text-xs font-medium bg-emerald-50 text-emerald-700 rounded-full">Approved</span>
                @else
                    <span class="px-2 py-0.5 text-xs font-medium bg-amber-100 text-amber-700 rounded-full">Pending</span>
                @endif
                @if($r->is_featured)<span class="px-2 py-0.5 text-xs font-medium bg-blue-50 text-blue-700 rounded-full">Featured</span>@endif
            </div>
        </div>
        <p class="text-sm text-slate-700 leading-relaxed mb-4">"{{ $r->message }}"</p>
        <div class="flex flex-wrap items-center gap-2 pt-3 border-t border-slate-100">
            @if($r->is_approved)
                <form method="POST" action="{{ url('/admin/reviews/' . $r->id . '/reject') }}" class="inline">
                    @csrf
                    <button type="submit" class="px-3 py-1.5 text-xs bg-white border border-slate-300 text-slate-700 hover:bg-slate-50 rounded-lg transition font-medium">Unapprove</button>
                </form>
            @else
                <form method="POST" action="{{ url('/admin/reviews/' . $r->id . '/approve') }}" class="inline">
                    @csrf
                    <button type="submit" class="px-3 py-1.5 text-xs bg-emerald-600 hover:bg-emerald-700 text-white rounded-lg transition font-medium">✓ Approve</button>
                </form>
            @endif
            <form method="POST" action="{{ url('/admin/reviews/' . $r->id . '/featured') }}" class="inline">
                @csrf
                <button type="submit" class="px-3 py-1.5 text-xs bg-white border border-slate-300 text-slate-700 hover:bg-slate-50 rounded-lg transition font-medium">{{ $r->is_featured ? 'Unfeature' : 'Feature' }}</button>
            </form>
            <form method="POST" action="{{ url('/admin/reviews/' . $r->id) }}" onsubmit="return confirm('Delete this review?');" class="inline ml-auto">
                @csrf @method('DELETE')
                <button type="submit" class="px-3 py-1.5 text-xs text-red-600 hover:bg-red-50 rounded-lg transition font-medium">Delete</button>
            </form>
        </div>
    </div>
    @empty
    <div class="bg-white border border-slate-200 rounded-2xl p-12 text-center text-slate-500">No reviews yet.</div>
    @endforelse
</div>
@endsection
