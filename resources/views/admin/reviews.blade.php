@extends('admin.layouts.app')
@section('title', 'Reviews')

@section('content')
<div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 mb-6">
    <div>
        <h2 class="text-xl sm:text-2xl font-bold text-slate-900">Reviews</h2>
        <p class="text-sm text-slate-600 mt-1">User feedback and ratings.</p>
    </div>
    <div class="flex items-center gap-2">
        <select class="px-3 py-2 bg-white border border-slate-300 rounded-lg text-sm text-slate-700 focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100 transition">
            <option>All ratings</option>
            <option>5 stars</option>
            <option>4 stars</option>
            <option>3 stars</option>
        </select>
    </div>
</div>

<!-- Summary -->
<div class="bg-white border border-slate-200 rounded-2xl p-5 sm:p-6 mb-6">
    <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 sm:gap-6">
        <div class="col-span-2 sm:col-span-1 flex flex-col items-center justify-center">
            <p class="text-4xl sm:text-5xl font-bold text-slate-900">4.9</p>
            <div class="flex items-center gap-0.5 mt-1">
                @for($i = 0; $i < 5; $i++)<svg class="w-4 h-4 text-amber-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.05 2.93c.3-.92 1.6-.92 1.9 0l1.07 3.29a1 1 0 00.95.69h3.46c.97 0 1.37 1.24.59 1.81l-2.8 2.03a1 1 0 00-.37 1.12l1.07 3.29c.3.92-.75 1.69-1.54 1.12l-2.8-2.03a1 1 0 00-1.17 0l-2.8 2.03c-.78.57-1.84-.2-1.54-1.12l1.07-3.29a1 1 0 00-.37-1.12L2.98 8.72c-.78-.57-.38-1.81.59-1.81h3.46a1 1 0 00.95-.69l1.07-3.29z"/></svg>@endfor
            </div>
            <p class="text-xs text-slate-500 mt-1">1,247 reviews</p>
        </div>
        @foreach([['stars'=>5, 'pct'=>85], ['stars'=>4, 'pct'=>10], ['stars'=>3, 'pct'=>3], ['stars'=>2, 'pct'=>2]] as $r)
        <div class="col-span-2 sm:col-span-1">
            <div class="flex items-center gap-2 mb-1">
                <span class="text-xs text-slate-600 w-8">{{ $r['stars'] }} ★</span>
                <div class="flex-1 h-2 bg-slate-100 rounded-full overflow-hidden">
                    <div class="h-full bg-amber-400 rounded-full" style="width: {{ $r['pct'] }}%"></div>
                </div>
                <span class="text-xs text-slate-500 w-8 text-right">{{ $r['pct'] }}%</span>
            </div>
        </div>
        @endforeach
    </div>
</div>

<!-- Reviews List -->
<div class="space-y-3 sm:space-y-4">
    @foreach([['name'=>'Rahul K.', 'rating'=>5, 'text'=>'Finally a Terabox tool that just works. Super fast, no ads, and the mobile experience is smooth.', 'time'=>'2 days ago', 'color'=>'from-blue-500 to-cyan-500'], ['name'=>'Sarah M.', 'rating'=>5, 'text'=>'Batch processing is a game-changer. I download entire folders in one click. Worth every penny.', 'time'=>'3 days ago', 'color'=>'from-purple-500 to-pink-500'], ['name'=>'Ahmed T.', 'rating'=>5, 'text'=>'The API is clean and well-documented. Integrated it into our app in under an hour.', 'time'=>'5 days ago', 'color'=>'from-emerald-500 to-teal-500'], ['name'=>'Priya S.', 'rating'=>4, 'text'=>'Great tool for downloading. Would love to see 4K support in the free plan.', 'time'=>'1 week ago', 'color'=>'from-orange-500 to-red-500']] as $rev)
    <div class="bg-white border border-slate-200 rounded-2xl p-5 hover:shadow-md transition">
        <div class="flex items-start justify-between gap-3 mb-3">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-full bg-gradient-to-br {{ $rev['color'] }} flex items-center justify-center text-sm font-semibold text-white flex-shrink-0">{{ strtoupper(substr($rev['name'], 0, 1)) }}</div>
                <div>
                    <p class="text-sm font-semibold text-slate-900">{{ $rev['name'] }}</p>
                    <div class="flex items-center gap-1">
                        @for($i = 0; $i < $rev['rating']; $i++)<svg class="w-3 h-3 text-amber-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.05 2.93c.3-.92 1.6-.92 1.9 0l1.07 3.29a1 1 0 00.95.69h3.46c.97 0 1.37 1.24.59 1.81l-2.8 2.03a1 1 0 00-.37 1.12l1.07 3.29c.3.92-.75 1.69-1.54 1.12l-2.8-2.03a1 1 0 00-1.17 0l-2.8 2.03c-.78.57-1.84-.2-1.54-1.12l1.07-3.29a1 1 0 00-.37-1.12L2.98 8.72c-.78-.57-.38-1.81.59-1.81h3.46a1 1 0 00.95-.69l1.07-3.29z"/></svg>@endfor
                        <span class="text-xs text-slate-500 ml-1">· {{ $rev['time'] }}</span>
                    </div>
                </div>
            </div>
            <button class="w-8 h-8 flex items-center justify-center text-slate-500 hover:text-red-600 hover:bg-red-50 rounded-lg transition"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.87 12.14A2 2 0 0116.14 21H7.86a2 2 0 01-2-1.86L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg></button>
        </div>
        <p class="text-sm text-slate-700 leading-relaxed">"{{ $rev['text'] }}"</p>
    </div>
    @endforeach
</div>
@endsection
