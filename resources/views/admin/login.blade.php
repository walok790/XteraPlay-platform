<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - XteraPlay</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>body { font-family: 'Inter', sans-serif; }</style>
</head>
<body class="bg-[#111113] text-white min-h-screen flex items-center justify-center px-4">

    <div class="w-full max-w-md">
        <!-- Logo -->
        <div class="text-center mb-8">
            <div class="w-12 h-12 bg-gradient-to-br from-indigo-500 to-violet-600 rounded-xl flex items-center justify-center mx-auto mb-4">
                <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20"><path d="M6.3 2.841A1.5 1.5 0 004 4.11V15.89a1.5 1.5 0 002.3 1.269l9.344-5.89a1.5 1.5 0 000-2.538L6.3 2.84z"/></svg>
            </div>
            <h1 class="text-2xl font-bold">Admin Login</h1>
            <p class="text-gray-400 text-sm mt-1">Sign in to the admin panel</p>
        </div>

        <!-- Login Card -->
        <div class="bg-[#1a1a1f] border border-[#2a2a30] rounded-xl p-6">
            @if($errors->any())
                <div class="mb-4 p-3 bg-red-500/10 border border-red-500/20 rounded-lg">
                    <p class="text-red-400 text-sm">{{ $errors->first() }}</p>
                </div>
            @endif

            <form method="POST" action="{{ url('/admin/login') }}">
                @csrf
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-1">Email</label>
                        <input type="email" name="email" value="{{ old('email') }}" required autofocus class="w-full px-4 py-2.5 bg-[#111113] border border-[#2a2a30] rounded-lg text-white placeholder-gray-500 focus:outline-none focus:border-indigo-500 text-sm" placeholder="admin@xteraplay.com">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-1">Password</label>
                        <input type="password" name="password" required class="w-full px-4 py-2.5 bg-[#111113] border border-[#2a2a30] rounded-lg text-white placeholder-gray-500 focus:outline-none focus:border-indigo-500 text-sm" placeholder="Enter password">
                    </div>
                    <div class="flex items-center">
                        <input type="checkbox" name="remember" id="remember" class="w-4 h-4 rounded border-[#2a2a30] bg-[#111113] text-indigo-500 focus:ring-indigo-500">
                        <label for="remember" class="ml-2 text-sm text-gray-400">Remember me</label>
                    </div>
                    <button type="submit" class="w-full py-2.5 bg-gradient-to-r from-indigo-500 to-violet-600 text-white text-sm font-medium rounded-lg hover:from-indigo-600 hover:to-violet-700 transition">Sign In</button>
                </div>
            </form>
        </div>

        <p class="text-center text-gray-500 text-xs mt-6">&copy; {{ date('Y') }} XteraPlay. Admin Panel.</p>
    </div>

</body>
</html>
