<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard &bull; ShopNext Control Hub</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['"Plus Jakarta Sans"', 'system-ui', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    <style>
        body {
            font-family: 'Plus Jakarta Sans', system-ui, -apple-system, sans-serif;
        }
    </style>
</head>
<body class="min-h-screen bg-slate-900 text-slate-100 flex flex-col antialiased">

    <!-- Top Admin Bar -->
    <header class="sticky top-0 z-40 bg-slate-900/90 backdrop-blur-md border-b border-slate-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-16 flex items-center justify-between">
            
            <!-- Logo & Brand -->
            <div class="flex items-center gap-3">
                <a href="{{ url('/') }}" class="flex items-center gap-2 group">
                    <div class="w-9 h-9 rounded-xl bg-gradient-to-tr from-rose-600 via-rose-500 to-indigo-600 flex items-center justify-center text-white font-bold shadow-md shadow-rose-600/30">
                        ⚡
                    </div>
                    <span class="text-lg font-extrabold text-white">
                        Shop<span class="text-rose-400">Next</span>
                    </span>
                </a>
                <span class="px-2.5 py-0.5 rounded-full text-xs font-bold uppercase tracking-wider bg-rose-500/20 text-rose-300 border border-rose-500/30">
                    Admin Panel
                </span>
            </div>

            <!-- User Info & Logout -->
            <div class="flex items-center gap-4">
                <a href="{{ url('/') }}" class="text-xs text-slate-400 hover:text-white transition hidden sm:inline">
                    &larr; View Storefront
                </a>
                <div class="flex items-center gap-2 pl-3 border-l border-slate-800">
                    <div class="w-8 h-8 rounded-full bg-rose-600 flex items-center justify-center text-white text-xs font-bold">
                        AD
                    </div>
                    <div class="hidden sm:flex flex-col text-left">
                        <span class="text-xs font-bold text-white">{{ auth()->user()->name }}</span>
                        <span class="text-[10px] text-rose-400 font-semibold">{{ auth()->user()->email }}</span>
                    </div>
                </div>
                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="px-3 py-1.5 rounded-xl bg-rose-600/20 hover:bg-rose-600 text-rose-300 hover:text-white border border-rose-500/30 text-xs font-semibold transition cursor-pointer">
                        Sign Out
                    </button>
                </form>
            </div>

        </div>
    </header>

    <!-- Main Content -->
    <main class="flex-1 max-w-7xl w-full mx-auto px-4 sm:px-6 lg:px-8 py-8">
        
        <!-- Welcome Banner -->
        <div class="mb-8 p-6 sm:p-8 rounded-3xl bg-gradient-to-r from-rose-950/60 via-slate-900 to-indigo-950/60 border border-rose-500/20 shadow-xl flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
            <div>
                <h1 class="text-2xl sm:text-3xl font-extrabold text-white tracking-tight">
                    Welcome back, {{ auth()->user()->name }}! 👋
                </h1>
                <p class="text-xs sm:text-sm text-slate-400 mt-1">
                    Here is your live marketplace overview. Manage buyers, sellers, and system activities.
                </p>
            </div>
            <div class="flex items-center gap-2">
                <span class="flex h-3 w-3 relative">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-3 w-3 bg-emerald-500"></span>
                </span>
                <span class="text-xs font-semibold text-emerald-400">System Live &bull; Database Connected</span>
            </div>
        </div>

        <!-- Metric Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
            
            <!-- Buyers Count -->
            <div class="p-5 rounded-2xl bg-slate-800/60 border border-slate-700/60 flex items-center justify-between">
                <div>
                    <span class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Registered Buyers</span>
                    <h3 class="text-2xl font-extrabold text-white mt-1">{{ $buyerCount ?? 0 }}</h3>
                    <span class="text-[11px] text-emerald-400 font-medium">Customer accounts</span>
                </div>
                <div class="w-12 h-12 rounded-xl bg-indigo-500/20 text-indigo-400 flex items-center justify-center text-xl font-bold">
                    🛍️
                </div>
            </div>

            <!-- Sellers Count -->
            <div class="p-5 rounded-2xl bg-slate-800/60 border border-slate-700/60 flex items-center justify-between">
                <div>
                    <span class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Active Sellers</span>
                    <h3 class="text-2xl font-extrabold text-white mt-1">{{ $sellerCount ?? 0 }}</h3>
                    <span class="text-[11px] text-purple-400 font-medium">Shop merchants</span>
                </div>
                <div class="w-12 h-12 rounded-xl bg-purple-500/20 text-purple-400 flex items-center justify-center text-xl font-bold">
                    🏪
                </div>
            </div>

            <!-- Admins Count -->
            <div class="p-5 rounded-2xl bg-slate-800/60 border border-slate-700/60 flex items-center justify-between">
                <div>
                    <span class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Super Admins</span>
                    <h3 class="text-2xl font-extrabold text-white mt-1">{{ $adminCount ?? 1 }}</h3>
                    <span class="text-[11px] text-rose-400 font-medium">Platform operators</span>
                </div>
                <div class="w-12 h-12 rounded-xl bg-rose-500/20 text-rose-400 flex items-center justify-center text-xl font-bold">
                    🛡️
                </div>
            </div>

            <!-- Platform Orders / Health -->
            <div class="p-5 rounded-2xl bg-slate-800/60 border border-slate-700/60 flex items-center justify-between">
                <div>
                    <span class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Platform Status</span>
                    <h3 class="text-2xl font-extrabold text-emerald-400 mt-1">100% OK</h3>
                    <span class="text-[11px] text-slate-400 font-medium">Zero pending issues</span>
                </div>
                <div class="w-12 h-12 rounded-xl bg-emerald-500/20 text-emerald-400 flex items-center justify-center text-xl font-bold">
                    ⚡
                </div>
            </div>

        </div>

        <!-- Registered Users Table (Buyers & Sellers Control) -->
        <div class="bg-slate-800/60 border border-slate-700/60 rounded-3xl overflow-hidden shadow-xl">
            <div class="p-6 border-b border-slate-700/60 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                <div>
                    <h2 class="text-lg font-bold text-white">Users &amp; Merchants Directory</h2>
                    <p class="text-xs text-slate-400 mt-0.5">Control registered buyers and sellers across the marketplace</p>
                </div>
                <div class="flex items-center gap-2">
                    <span class="px-3 py-1 rounded-xl bg-slate-700/60 text-xs font-semibold text-slate-300">
                        Total Users: {{ count($users ?? []) }}
                    </span>
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm text-slate-300">
                    <thead class="bg-slate-900/50 text-xs uppercase font-semibold text-slate-400 tracking-wider">
                        <tr>
                            <th class="px-6 py-3.5">User</th>
                            <th class="px-6 py-3.5">Role</th>
                            <th class="px-6 py-3.5">Phone</th>
                            <th class="px-6 py-3.5">Joined Date</th>
                            <th class="px-6 py-3.5">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-700/60">
                        @forelse($users as $user)
                            <tr class="hover:bg-slate-700/30 transition">
                                <td class="px-6 py-4 flex items-center gap-3">
                                    <div class="w-9 h-9 rounded-xl {{ $user->role === 'admin' ? 'bg-rose-500/20 text-rose-400' : ($user->role === 'seller' ? 'bg-purple-500/20 text-purple-400' : 'bg-indigo-500/20 text-indigo-400') }} flex items-center justify-center font-bold text-xs shrink-0">
                                        {{ strtoupper(substr($user->name, 0, 2)) }}
                                    </div>
                                    <div>
                                        <div class="font-bold text-white">{{ $user->name }}</div>
                                        <div class="text-xs text-slate-400">{{ $user->email }}</div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    @if($user->role === 'admin')
                                        <span class="px-2.5 py-0.5 rounded-full text-xs font-bold bg-rose-500/20 text-rose-300 border border-rose-500/30">
                                            Admin
                                        </span>
                                    @elseif($user->role === 'seller')
                                        <span class="px-2.5 py-0.5 rounded-full text-xs font-bold bg-purple-500/20 text-purple-300 border border-purple-500/30">
                                            Seller
                                        </span>
                                    @else
                                        <span class="px-2.5 py-0.5 rounded-full text-xs font-bold bg-indigo-500/20 text-indigo-300 border border-indigo-500/30">
                                            Buyer
                                        </span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 text-xs font-mono text-slate-300">
                                    {{ $user->phone ?? '—' }}
                                </td>
                                <td class="px-6 py-4 text-xs text-slate-400">
                                    {{ $user->created_at ? $user->created_at->format('M d, Y') : 'Recent' }}
                                </td>
                                <td class="px-6 py-4">
                                    <span class="inline-flex items-center gap-1.5 px-2 py-0.5 rounded-md text-[11px] font-semibold bg-emerald-500/20 text-emerald-400">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-400"></span>
                                        Active
                                    </span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-8 text-center text-slate-500">
                                    No users found in database.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </main>

    <!-- Footer -->
    <footer class="py-4 text-center text-xs text-slate-500 border-t border-slate-800">
        &copy; {{ date('Y') }} ShopNext Platform Control Hub &bull; Super Admin Console
    </footer>

</body>
</html>
