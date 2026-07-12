<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="theme-color" content="#2563eb">
    <title>@yield('title', 'Admin') · XteraPlay</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        html { -webkit-text-size-adjust: 100%; }
        body { font-family: 'Inter', -apple-system, system-ui, sans-serif; }
        [x-cloak] { display: none !important; }
        ::-webkit-scrollbar { width: 8px; height: 8px; }
        ::-webkit-scrollbar-track { background: #f1f5f9; }
        ::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 4px; }
    </style>
</head>
<body class="bg-slate-50 text-slate-900 antialiased" x-data="{ sidebar: false }">

    <!-- Mobile Overlay -->
    <div x-show="sidebar" @click="sidebar = false" x-cloak x-transition:enter="transition ease-out duration-200" x-transition:leave="transition ease-in duration-150" class="fixed inset-0 bg-slate-900/40 backdrop-blur-sm z-40 lg:hidden"></div>

    <!-- Sidebar -->
    <aside :class="sidebar ? 'translate-x-0' : '-translate-x-full'" class="fixed top-0 left-0 z-50 w-64 h-full bg-white border-r border-slate-200 transition-transform duration-200 lg:translate-x-0 flex flex-col">
        <!-- Logo -->
        <div class="flex items-center h-16 px-5 border-b border-slate-200">
            <div class="w-9 h-9 bg-gradient-to-br from-blue-600 to-indigo-600 rounded-lg flex items-center justify-center mr-2.5 shadow-sm shadow-blue-500/20">
                <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20"><path d="M6.3 2.841A1.5 1.5 0 004 4.11V15.89a1.5 1.5 0 002.3 1.269l9.344-5.89a1.5 1.5 0 000-2.538L6.3 2.84z"/></svg>
            </div>
            <div>
                <p class="text-sm font-bold text-slate-900 leading-tight">XteraPlay</p>
                <p class="text-[10px] font-medium text-blue-600 uppercase tracking-wide">Admin</p>
            </div>
        </div>

        <!-- Navigation -->
        <nav class="flex-1 px-3 py-4 space-y-0.5 overflow-y-auto">
            @php
                $links = [
                    ['url' => '/admin/dashboard', 'label' => 'Dashboard', 'match' => 'admin/dashboard', 'svg' => 'M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z'],
                    ['url' => '/admin/users', 'label' => 'Users', 'match' => 'admin/users', 'svg' => 'M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z'],
                    ['url' => '/admin/subscriptions', 'label' => 'Subscriptions', 'match' => 'admin/subscriptions', 'svg' => 'M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z'],
                    ['url' => '/admin/coupons', 'label' => 'Coupons', 'match' => 'admin/coupons', 'svg' => 'M7 7h.01M7 3h5c.51 0 1.02.2 1.41.59l7 7a2 2 0 010 2.83l-7 7a2 2 0 01-2.83 0l-7-7A1.99 1.99 0 013 12V7a4 4 0 014-4z'],
                    ['url' => '/admin/reviews', 'label' => 'Reviews', 'match' => 'admin/reviews', 'svg' => 'M11.05 2.93c.3-.92 1.6-.92 1.9 0l1.52 4.67a1 1 0 00.95.69h4.91c.97 0 1.37 1.24.59 1.81l-3.98 2.89a1 1 0 00-.36 1.12l1.52 4.67c.3.92-.76 1.69-1.54 1.12l-3.98-2.89a1 1 0 00-1.18 0l-3.98 2.89c-.78.57-1.84-.2-1.54-1.12l1.52-4.67a1 1 0 00-.36-1.12L3.06 10.1c-.78-.57-.38-1.81.59-1.81h4.91a1 1 0 00.95-.69l1.52-4.67z'],
                    ['url' => '/admin/support', 'label' => 'Support Tickets', 'match' => 'admin/support', 'svg' => 'M18.36 5.64l-3.53 3.53m0 5.66l3.53 3.53M9.17 9.17L5.64 5.64m3.53 9.19l-3.53 3.53M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z'],
                    ['url' => '/admin/messages', 'label' => 'Messages', 'match' => 'admin/messages', 'svg' => 'M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z'],
                    ['url' => '/admin/currencies', 'label' => 'Currencies', 'match' => 'admin/currencies', 'svg' => 'M12 8c-1.66 0-3 .9-3 2s1.34 2 3 2 3 .9 3 2-1.34 2-3 2m0-8c1.11 0 2.08.4 2.6 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.4-2.6-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z'],
                    ['url' => '/admin/settings', 'label' => 'Settings', 'match' => 'admin/settings', 'svg' => 'M10.32 4.32c.43-1.76 2.93-1.76 3.35 0a1.72 1.72 0 002.58 1.07c1.54-.94 3.31.82 2.37 2.37a1.72 1.72 0 001.06 2.57c1.76.43 1.76 2.93 0 3.35a1.72 1.72 0 00-1.06 2.58c.94 1.54-.83 3.31-2.37 2.37a1.72 1.72 0 00-2.58 1.06c-.43 1.76-2.93 1.76-3.35 0a1.72 1.72 0 00-2.58-1.06c-1.54.94-3.31-.83-2.37-2.37a1.72 1.72 0 00-1.06-2.58c-1.76-.43-1.76-2.93 0-3.35a1.72 1.72 0 001.06-2.57c-.94-1.54.83-3.31 2.37-2.37 1 .61 2.3.07 2.57-1.07z'],
                    ['url' => '/admin/system', 'label' => 'System Info', 'match' => 'admin/system', 'svg' => 'M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z'],
                ];
            @endphp

            @foreach($links as $link)
                @php $active = request()->is($link['match']); @endphp
                <a href="{{ url($link['url']) }}"
                   class="flex items-center gap-3 px-3 py-2.5 text-sm font-medium rounded-lg transition
                          {{ $active ? 'bg-blue-50 text-blue-700' : 'text-slate-600 hover:text-slate-900 hover:bg-slate-50' }}">
                    <svg class="w-5 h-5 {{ $active ? 'text-blue-600' : 'text-slate-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $link['svg'] }}"/>
                    </svg>
                    {{ $link['label'] }}
                </a>
            @endforeach

            <div class="pt-3 mt-3 border-t border-slate-200">
                <form method="POST" action="{{ url('/admin/logout') }}">
                    @csrf
                    <button type="submit" class="flex items-center gap-3 w-full px-3 py-2.5 text-sm font-medium rounded-lg text-red-600 hover:bg-red-50 transition">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                        Log Out
                    </button>
                </form>
            </div>
        </nav>
    </aside>

    <!-- Main Content -->
    <div class="lg:ml-64 min-h-screen flex flex-col">
        <!-- Top Bar -->
        <header class="sticky top-0 z-30 bg-white border-b border-slate-200 h-16 flex items-center px-4 sm:px-6">
            <button @click="sidebar = !sidebar" class="lg:hidden w-9 h-9 flex items-center justify-center text-slate-600 hover:bg-slate-100 rounded-lg mr-3">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
            </button>
            <h1 class="text-base sm:text-lg font-semibold text-slate-900 truncate">@yield('title', 'Dashboard')</h1>
            <div class="ml-auto flex items-center gap-3">
                <button class="hidden sm:flex w-9 h-9 items-center justify-center text-slate-500 hover:text-slate-900 hover:bg-slate-100 rounded-lg transition relative">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.4-1.4A2 2 0 0118 14.2V11a6 6 0 00-4-5.7V5a2 2 0 10-4 0v.3C7.7 6.2 6 8.4 6 11v3.2c0 .5-.2 1-.6 1.4L4 17h5m6 0v1a3 3 0 11-6 0v-1"/></svg>
                    <span class="absolute top-1.5 right-1.5 w-2 h-2 bg-red-500 rounded-full ring-2 ring-white"></span>
                </button>
                <div class="flex items-center gap-2 pl-3 border-l border-slate-200">
                    <div class="w-9 h-9 rounded-full bg-gradient-to-br from-blue-600 to-indigo-600 flex items-center justify-center text-sm font-semibold text-white shadow-sm">
                        {{ strtoupper(substr(Auth::guard('admin')->user()->name ?? 'A', 0, 1)) }}
                    </div>
                    <div class="hidden sm:block">
                        <p class="text-xs font-semibold text-slate-900 leading-tight">{{ Auth::guard('admin')->user()->name ?? 'Admin' }}</p>
                        <p class="text-[10px] text-slate-500 leading-tight">Administrator</p>
                    </div>
                </div>
            </div>
        </header>

        <!-- Page Content -->
        <main class="flex-1 p-4 sm:p-6 lg:p-8">
            @yield('content')
        </main>
    </div>

</body>
</html>
