<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin') - XteraPlay Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>body { font-family: 'Inter', sans-serif; }</style>
</head>
<body class="bg-[#111113] text-white min-h-screen" x-data="{ sidebarOpen: false }">

    <!-- Mobile Overlay -->
    <div x-show="sidebarOpen" @click="sidebarOpen = false" class="fixed inset-0 bg-black/50 z-40 lg:hidden" x-transition:enter="transition-opacity ease-out duration-200" x-transition:leave="transition-opacity ease-in duration-150" style="display: none;"></div>

    <!-- Sidebar -->
    <aside :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'" class="fixed top-0 left-0 z-50 w-64 h-full bg-[#0d0d10] border-r border-[#1e1e2e] transition-transform duration-200 lg:translate-x-0">
        <!-- Logo -->
        <div class="flex items-center h-16 px-6 border-b border-[#1e1e2e]">
            <div class="w-8 h-8 bg-gradient-to-br from-indigo-500 to-violet-600 rounded-lg flex items-center justify-center mr-3">
                <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20"><path d="M6.3 2.841A1.5 1.5 0 004 4.11V15.89a1.5 1.5 0 002.3 1.269l9.344-5.89a1.5 1.5 0 000-2.538L6.3 2.84z"/></svg>
            </div>
            <span class="text-lg font-bold text-white">XteraPlay Admin</span>
        </div>

        <!-- Navigation -->
        <nav class="px-3 py-4 space-y-1 overflow-y-auto h-[calc(100%-4rem)]">
            <a href="{{ url('/admin/dashboard') }}" class="{{ request()->is('admin/dashboard') ? 'bg-indigo-500/10 text-indigo-400 border-l-2 border-indigo-500' : 'text-gray-400 hover:text-white hover:bg-[#1a1a1f]' }} flex items-center px-3 py-2.5 rounded-lg text-sm font-medium transition">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/></svg>
                Dashboard
            </a>
            <a href="{{ url('/admin/users') }}" class="{{ request()->is('admin/users') ? 'bg-indigo-500/10 text-indigo-400 border-l-2 border-indigo-500' : 'text-gray-400 hover:text-white hover:bg-[#1a1a1f]' }} flex items-center px-3 py-2.5 rounded-lg text-sm font-medium transition">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                Users
            </a>
            <a href="{{ url('/admin/subscriptions') }}" class="{{ request()->is('admin/subscriptions') ? 'bg-indigo-500/10 text-indigo-400 border-l-2 border-indigo-500' : 'text-gray-400 hover:text-white hover:bg-[#1a1a1f]' }} flex items-center px-3 py-2.5 rounded-lg text-sm font-medium transition">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/></svg>
                Subscriptions
            </a>
            <a href="{{ url('/admin/coupons') }}" class="{{ request()->is('admin/coupons') ? 'bg-indigo-500/10 text-indigo-400 border-l-2 border-indigo-500' : 'text-gray-400 hover:text-white hover:bg-[#1a1a1f]' }} flex items-center px-3 py-2.5 rounded-lg text-sm font-medium transition">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/></svg>
                Coupons
            </a>
            <a href="{{ url('/admin/reviews') }}" class="{{ request()->is('admin/reviews') ? 'bg-indigo-500/10 text-indigo-400 border-l-2 border-indigo-500' : 'text-gray-400 hover:text-white hover:bg-[#1a1a1f]' }} flex items-center px-3 py-2.5 rounded-lg text-sm font-medium transition">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/></svg>
                Reviews
            </a>
            <a href="{{ url('/admin/support') }}" class="{{ request()->is('admin/support') ? 'bg-indigo-500/10 text-indigo-400 border-l-2 border-indigo-500' : 'text-gray-400 hover:text-white hover:bg-[#1a1a1f]' }} flex items-center px-3 py-2.5 rounded-lg text-sm font-medium transition">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                Support Tickets
            </a>
            <a href="{{ url('/admin/messages') }}" class="{{ request()->is('admin/messages') ? 'bg-indigo-500/10 text-indigo-400 border-l-2 border-indigo-500' : 'text-gray-400 hover:text-white hover:bg-[#1a1a1f]' }} flex items-center px-3 py-2.5 rounded-lg text-sm font-medium transition">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                Messages
            </a>
            <a href="{{ url('/admin/currencies') }}" class="{{ request()->is('admin/currencies') ? 'bg-indigo-500/10 text-indigo-400 border-l-2 border-indigo-500' : 'text-gray-400 hover:text-white hover:bg-[#1a1a1f]' }} flex items-center px-3 py-2.5 rounded-lg text-sm font-medium transition">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                Currencies
            </a>
            <a href="{{ url('/admin/settings') }}" class="{{ request()->is('admin/settings') ? 'bg-indigo-500/10 text-indigo-400 border-l-2 border-indigo-500' : 'text-gray-400 hover:text-white hover:bg-[#1a1a1f]' }} flex items-center px-3 py-2.5 rounded-lg text-sm font-medium transition">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.066 2.573c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.573 1.066c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.066-2.573c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                Settings
            </a>
            <a href="{{ url('/admin/system') }}" class="{{ request()->is('admin/system') ? 'bg-indigo-500/10 text-indigo-400 border-l-2 border-indigo-500' : 'text-gray-400 hover:text-white hover:bg-[#1a1a1f]' }} flex items-center px-3 py-2.5 rounded-lg text-sm font-medium transition">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z"/></svg>
                System Info
            </a>

            <div class="pt-4 mt-4 border-t border-[#1e1e2e]">
                <form method="POST" action="{{ url('/admin/logout') }}">
                    @csrf
                    <button type="submit" class="flex items-center w-full px-3 py-2.5 rounded-lg text-sm font-medium text-red-400 hover:text-red-300 hover:bg-[#1a1a1f] transition">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                        Logout
                    </button>
                </form>
            </div>
        </nav>
    </aside>

    <!-- Main Content -->
    <div class="ml-0 lg:ml-64 min-h-screen">
        <!-- Top Bar -->
        <header class="sticky top-0 z-30 bg-[#111113] border-b border-[#2a2a30] h-16 flex items-center px-4 sm:px-6">
            <!-- Mobile hamburger -->
            <button @click="sidebarOpen = !sidebarOpen" class="lg:hidden text-gray-400 hover:text-white mr-4">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
            </button>
            <h1 class="text-lg font-semibold text-white">@yield('title', 'Dashboard')</h1>
            <div class="ml-auto flex items-center space-x-3">
                <span class="text-sm text-gray-400">{{ Auth::guard('admin')->user()->name ?? 'Admin' }}</span>
                <div class="w-8 h-8 rounded-full bg-gradient-to-br from-indigo-500 to-violet-600 flex items-center justify-center text-white text-xs font-bold">A</div>
            </div>
        </header>

        <!-- Page Content -->
        <main class="p-4 sm:p-6">
            @yield('content')
        </main>
    </div>

</body>
</html>
