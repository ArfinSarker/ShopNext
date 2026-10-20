<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seller Dashboard &bull; ShopNext Merchant Center</title>
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
<body class="min-h-screen bg-slate-950 text-slate-100 flex flex-col antialiased">

    <!-- Top Seller Bar -->
    <header class="sticky top-0 z-40 bg-slate-900/90 backdrop-blur-md border-b border-slate-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-16 flex items-center justify-between">
            
            <div class="flex items-center gap-3">
                <a href="{{ url('/') }}" class="flex items-center gap-2 group">
                    <div class="w-9 h-9 rounded-xl bg-gradient-to-tr from-purple-600 to-indigo-600 flex items-center justify-center text-white font-bold shadow-md shadow-purple-600/30">
                        🏪
                    </div>
                    <span class="text-lg font-extrabold text-white">
                        Shop<span class="text-purple-400">Next</span>
                    </span>
                </a>
                <span class="px-2.5 py-0.5 rounded-full text-xs font-bold uppercase tracking-wider bg-purple-500/20 text-purple-300 border border-purple-500/30">
                    Seller Hub
                </span>
            </div>

            <div class="flex items-center gap-4">
                <a href="{{ url('/') }}" class="text-xs text-slate-400 hover:text-white transition hidden sm:inline">
                    &larr; View Storefront
                </a>
                <div class="flex items-center gap-2 pl-3 border-l border-slate-800">
                    <div class="w-8 h-8 rounded-full bg-purple-600 flex items-center justify-center text-white text-xs font-bold">
                        SE
                    </div>
                    <div class="hidden sm:flex flex-col text-left">
                        <span class="text-xs font-bold text-white">{{ auth()->user()->name }}</span>
                        <span class="text-[10px] text-purple-400 font-semibold">Verified Merchant</span>
                    </div>
                </div>
                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="px-3 py-1.5 rounded-xl bg-white/10 hover:bg-rose-500/20 hover:text-rose-400 text-slate-300 text-xs font-semibold transition cursor-pointer">
                        Sign Out
                    </button>
                </form>
            </div>

        </div>
    </header>

    <!-- Main Seller Content -->
    <main class="flex-1 max-w-7xl w-full mx-auto px-4 sm:px-6 lg:px-8 py-8">
        
        <!-- Welcome Banner -->
        <div class="mb-8 p-6 sm:p-8 rounded-3xl bg-gradient-to-r from-purple-950/60 via-slate-900 to-indigo-950/60 border border-purple-500/20 shadow-xl flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
            <div>
                <h1 class="text-2xl sm:text-3xl font-extrabold text-white tracking-tight">
                    Welcome to your Shop Dashboard, {{ auth()->user()->name }}! 🏪
                </h1>
                <p class="text-xs sm:text-sm text-slate-400 mt-1">
                    Manage your store products, fulfill incoming customer orders, and scale your sales.
                </p>
            </div>
            <button class="px-5 py-2.5 rounded-2xl bg-purple-600 hover:bg-purple-500 text-white font-bold text-xs sm:text-sm shadow-lg shadow-purple-600/30 transition">
                + Add New Product
            </button>
        </div>

        <!-- Metric Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
            <div class="p-5 rounded-2xl bg-slate-900/60 border border-slate-800 flex items-center justify-between">
                <div>
                    <span class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Total Sales</span>
                    <h3 class="text-2xl font-extrabold text-white mt-1">$2,450.00</h3>
                    <span class="text-[11px] text-emerald-400 font-medium">+18% this week</span>
                </div>
                <div class="w-12 h-12 rounded-xl bg-emerald-500/20 text-emerald-400 flex items-center justify-center text-xl font-bold">
                    💵
                </div>
            </div>

            <div class="p-5 rounded-2xl bg-slate-900/60 border border-slate-800 flex items-center justify-between">
                <div>
                    <span class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Pending Orders</span>
                    <h3 class="text-2xl font-extrabold text-white mt-1">12 Orders</h3>
                    <span class="text-[11px] text-amber-400 font-medium">Ready to dispatch</span>
                </div>
                <div class="w-12 h-12 rounded-xl bg-amber-500/20 text-amber-400 flex items-center justify-center text-xl font-bold">
                    📦
                </div>
            </div>

            <div class="p-5 rounded-2xl bg-slate-900/60 border border-slate-800 flex items-center justify-between">
                <div>
                    <span class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Active Listings</span>
                    <h3 class="text-2xl font-extrabold text-white mt-1">28 Items</h3>
                    <span class="text-[11px] text-purple-400 font-medium">Published in shop</span>
                </div>
                <div class="w-12 h-12 rounded-xl bg-purple-500/20 text-purple-400 flex items-center justify-center text-xl font-bold">
                    🏷️
                </div>
            </div>

            <div class="p-5 rounded-2xl bg-slate-900/60 border border-slate-800 flex items-center justify-between">
                <div>
                    <span class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Seller Rating</span>
                    <h3 class="text-2xl font-extrabold text-amber-400 mt-1">4.9 / 5.0</h3>
                    <span class="text-[11px] text-slate-400 font-medium">From 142 reviews</span>
                </div>
                <div class="w-12 h-12 rounded-xl bg-amber-500/20 text-amber-400 flex items-center justify-center text-xl font-bold">
                    ★
                </div>
            </div>
        </div>

    </main>

    <footer class="py-4 text-center text-xs text-slate-500 border-t border-slate-800">
        &copy; {{ date('Y') }} ShopNext Seller Partner Hub
    </footer>

</body>
</html>
