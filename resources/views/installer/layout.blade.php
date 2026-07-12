<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @if(!empty($csrfNeeded))<meta name="csrf-token" content="{{ csrf_token() }}">@endif
    <title>@yield('title', 'Installation') · XteraPlay</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>body { font-family: 'Inter', system-ui, sans-serif; }</style>
</head>
<body class="bg-slate-50 text-slate-900 antialiased min-h-screen">

<div class="min-h-screen py-8 sm:py-12 px-4">
    <div class="max-w-3xl mx-auto">
        <!-- Brand -->
        <div class="flex items-center justify-center gap-2 mb-8">
            <div class="w-10 h-10 bg-gradient-to-br from-blue-600 to-indigo-600 rounded-xl flex items-center justify-center shadow-sm shadow-blue-500/20">
                <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20"><path d="M6.3 2.841A1.5 1.5 0 004 4.11V15.89a1.5 1.5 0 002.3 1.269l9.344-5.89a1.5 1.5 0 000-2.538L6.3 2.84z"/></svg>
            </div>
            <div>
                <p class="text-lg font-bold text-slate-900 leading-tight">XteraPlay</p>
                <p class="text-[10px] font-semibold text-blue-600 uppercase tracking-wider leading-none">Installer</p>
            </div>
        </div>

        <!-- Progress Steps -->
        @php
            $steps = [
                1 => 'Requirements',
                2 => 'Permissions',
                3 => 'Database',
                4 => 'Mode',
                5 => 'Admin',
                6 => 'Import',
            ];
            $currentStep = $step ?? 1;
            $mode = session('install_mode');
        @endphp
        <div class="bg-white border border-slate-200 rounded-2xl p-4 sm:p-5 mb-6">
            <div class="flex items-center justify-between gap-1 sm:gap-2 overflow-x-auto">
                @foreach($steps as $num => $label)
                    {{-- Hide the Admin step (5) if we're in demo mode --}}
                    @if($num === 5 && $mode === 'demo')
                        @continue
                    @endif
                    @php
                        $isDone = $currentStep > $num;
                        $isCurrent = $currentStep === $num;
                        $isFuture = $currentStep < $num;
                    @endphp
                    <div class="flex items-center gap-2 flex-shrink-0">
                        <div class="flex items-center gap-1.5 sm:gap-2">
                            <div class="w-7 h-7 sm:w-8 sm:h-8 rounded-full flex items-center justify-center text-xs font-semibold flex-shrink-0
                                @if($isDone) bg-emerald-500 text-white
                                @elseif($isCurrent) bg-blue-600 text-white ring-4 ring-blue-100
                                @else bg-slate-100 text-slate-400
                                @endif">
                                @if($isDone)
                                    <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.7 5.29a1 1 0 010 1.42l-8 8a1 1 0 01-1.42 0l-4-4a1 1 0 011.42-1.42L8 12.59l7.29-7.3a1 1 0 011.41 0z" clip-rule="evenodd"/></svg>
                                @else
                                    {{ $num }}
                                @endif
                            </div>
                            <span class="text-xs sm:text-sm font-medium hidden sm:inline
                                @if($isDone) text-emerald-700
                                @elseif($isCurrent) text-slate-900
                                @else text-slate-400
                                @endif">{{ $label }}</span>
                        </div>
                        @if(! $loop->last)
                            <svg class="w-4 h-4 text-slate-300 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Content -->
        @if(session('status'))
            <div class="mb-4 p-3 bg-emerald-50 border border-emerald-200 rounded-2xl text-sm text-emerald-700">{{ session('status') }}</div>
        @endif

        <div class="bg-white border border-slate-200 rounded-2xl p-5 sm:p-6 md:p-8">
            @yield('content')
        </div>

        <p class="text-center text-xs text-slate-500 mt-6">XteraPlay Installer · If you get stuck, delete <code class="text-slate-700 bg-slate-100 px-1 py-0.5 rounded">storage/app/installed.lock</code> to restart</p>
    </div>
</div>

</body>
</html>
