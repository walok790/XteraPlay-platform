<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin Login · XteraPlay</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>body { font-family: 'Inter', system-ui, sans-serif; }</style>
</head>
<body class="bg-gradient-to-br from-slate-50 via-blue-50 to-slate-50 min-h-screen flex items-center justify-center px-4 py-8">
    <div class="w-full max-w-md">
        <div class="bg-white border border-slate-200 rounded-2xl p-6 sm:p-8 shadow-lg shadow-blue-500/5">
            <!-- Logo -->
            <div class="flex justify-center mb-6">
                <a href="{{ url('/') }}" class="flex items-center gap-2">
                    <div class="w-10 h-10 bg-gradient-to-br from-blue-600 to-indigo-600 rounded-xl flex items-center justify-center shadow-sm shadow-blue-500/20">
                        <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20"><path d="M6.3 2.841A1.5 1.5 0 004 4.11V15.89a1.5 1.5 0 002.3 1.269l9.344-5.89a1.5 1.5 0 000-2.538L6.3 2.84z"/></svg>
                    </div>
                    <div>
                        <span class="text-lg font-bold text-slate-900">XteraPlay</span>
                        <span class="block text-[10px] font-semibold text-blue-600 uppercase tracking-wider leading-none">Admin Panel</span>
                    </div>
                </a>
            </div>

            <div class="text-center mb-6">
                <div class="inline-flex items-center justify-center w-12 h-12 bg-blue-50 rounded-full mb-3">
                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                </div>
                <h1 class="text-xl sm:text-2xl font-bold text-slate-900 mb-1">Admin Login</h1>
                <p class="text-sm text-slate-600">Sign in to access the admin panel</p>
            </div>

            @if(session('status'))
                <div class="mb-4 p-3 bg-emerald-50 border border-emerald-200 rounded-lg">
                    <p class="text-sm text-emerald-700">{{ session('status') }}</p>
                </div>
            @endif

            @php
                try {
                    $isDemoMode = \App\Models\Setting::get('install_mode') === 'demo';
                } catch (\Throwable $e) {
                    $isDemoMode = false;
                }
            @endphp
            @if($isDemoMode)
                <div class="mb-4 p-3 bg-amber-50 border border-amber-200 rounded-lg">
                    <p class="text-xs font-semibold text-amber-900 mb-1.5">🎯 Demo Mode — admin credentials</p>
                    <div class="space-y-1 text-xs">
                        <p class="text-slate-700"><span class="text-slate-500">Email:</span> <code class="bg-white px-1 py-0.5 rounded">admin@xteraplay.com</code></p>
                        <p class="text-slate-700"><span class="text-slate-500">Password:</span> <code class="bg-white px-1 py-0.5 rounded">admin1234</code></p>
                    </div>
                </div>
            @endif

            <form method="POST" action="{{ url('/admin/login') }}" class="space-y-4">
                @csrf
                <div>
                    <label for="email" class="block text-sm font-medium text-slate-700 mb-1.5">Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus
                        class="w-full px-3 py-2.5 bg-white border border-slate-300 rounded-lg text-sm text-slate-900 placeholder-slate-400 focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100 transition"
                        placeholder="admin@xteraplay.com">
                    @error('email')<p class="mt-1 text-xs text-red-600">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-slate-700 mb-1.5">Password</label>
                    <input type="password" id="password" name="password" required
                        class="w-full px-3 py-2.5 bg-white border border-slate-300 rounded-lg text-sm text-slate-900 placeholder-slate-400 focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100 transition"
                        placeholder="Enter password">
                    @error('password')<p class="mt-1 text-xs text-red-600">{{ $message }}</p>@enderror
                </div>

                <label class="flex items-center gap-2">
                    <input type="checkbox" name="remember" class="w-4 h-4 rounded border-slate-300 text-blue-600 focus:ring-2 focus:ring-blue-100">
                    <span class="text-sm text-slate-600">Remember me</span>
                </label>

                <button type="submit" class="w-full py-2.5 bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold rounded-lg shadow-sm shadow-blue-500/25 transition">
                    Sign In to Admin
                </button>
            </form>

            <div class="mt-6 pt-6 border-t border-slate-200 text-center">
                <a href="{{ url('/') }}" class="text-sm text-slate-600 hover:text-blue-600 font-medium inline-flex items-center gap-1">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                    Back to main site
                </a>
            </div>
        </div>
    </div>
</body>
</html>
