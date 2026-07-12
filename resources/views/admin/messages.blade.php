@extends('admin.layouts.app')
@section('title', 'Messages')

@section('content')
<div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 mb-6">
    <div>
        <h2 class="text-xl sm:text-2xl font-bold text-slate-900">Contact Messages</h2>
        <p class="text-sm text-slate-600 mt-1">Messages received via the contact form.</p>
    </div>
    <select class="px-3 py-2 bg-white border border-slate-300 rounded-lg text-sm text-slate-700 focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100 transition self-start sm:self-auto">
        <option>All messages</option>
        <option>Unread</option>
        <option>Replied</option>
    </select>
</div>

<div class="space-y-3 sm:space-y-4">
    @foreach([['name'=>'John Anderson', 'email'=>'john@example.com', 'subject'=>'Partnership inquiry', 'preview'=>'Hi team, we are interested in partnering with XteraPlay for our creator platform...', 'time'=>'2 hours ago', 'unread'=>true], ['name'=>'Maria Garcia', 'email'=>'maria@example.com', 'subject'=>'Bulk pricing question', 'preview'=>'Do you offer bulk discounts for teams of 20+ users? We are looking to onboard...', 'time'=>'5 hours ago', 'unread'=>true], ['name'=>'David Chen', 'email'=>'david@example.com', 'subject'=>'API rate limits', 'preview'=>'What are the API rate limits on the Enterprise plan? Our use case requires...', 'time'=>'1 day ago', 'unread'=>false], ['name'=>'Anna Kim', 'email'=>'anna@example.com', 'subject'=>'Feature request', 'preview'=>'Would love to see support for scheduled downloads. Any plans to add this?', 'time'=>'2 days ago', 'unread'=>false]] as $m)
    <div class="bg-white border {{ $m['unread'] ? 'border-blue-200' : 'border-slate-200' }} rounded-2xl p-5 hover:shadow-md transition">
        <div class="flex items-start justify-between gap-3 mb-2">
            <div class="min-w-0 flex-1">
                <div class="flex items-center gap-2 mb-1">
                    @if($m['unread'])<span class="w-2 h-2 bg-blue-500 rounded-full flex-shrink-0"></span>@endif
                    <p class="text-sm sm:text-base font-semibold text-slate-900 truncate">{{ $m['subject'] }}</p>
                </div>
                <p class="text-xs text-slate-500">{{ $m['name'] }} · {{ $m['email'] }} · {{ $m['time'] }}</p>
            </div>
            @if($m['unread'])<span class="px-2 py-0.5 bg-blue-50 text-blue-700 text-xs font-medium rounded-full flex-shrink-0">New</span>@endif
        </div>
        <p class="text-sm text-slate-700 leading-relaxed line-clamp-2 mb-3">{{ $m['preview'] }}</p>
        <div class="flex items-center gap-2">
            <button class="px-3 py-1.5 bg-blue-600 hover:bg-blue-700 text-white text-xs font-medium rounded-lg transition">Reply</button>
            <button class="px-3 py-1.5 bg-white hover:bg-slate-50 border border-slate-300 text-slate-700 text-xs font-medium rounded-lg transition">Mark as read</button>
            <button class="px-3 py-1.5 text-slate-500 hover:text-red-600 text-xs font-medium rounded-lg transition">Delete</button>
        </div>
    </div>
    @endforeach
</div>
@endsection
