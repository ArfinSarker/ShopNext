<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
    <title>ShopNext &bull; Next-Gen Commerce Platform</title>
    <meta name="description" content="ShopNext - Modern e-commerce marketplace connecting verified sellers and happy buyers worldwide.">
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
                    },
                    colors: {
                        brand: {
                            50: '#eef2ff',
                            100: '#e0e7ff',
                            200: '#c7d2fe',
                            300: '#a5b4fc',
                            400: '#818cf8',
                            500: '#6366f1',
                            600: '#4f46e5',
                            700: '#4338ca',
                            800: '#3730a3',
                            900: '#312e81',
                        }
                    }
                }
            }
        }
    </script>

    <style>
        body {
            font-family: 'Plus Jakarta Sans', system-ui, -apple-system, sans-serif;
            -webkit-font-smoothing: antialiased;
        }

        .bg-mesh-pattern {
            background-color: #0b0f19;
            background-image: 
                radial-gradient(at 0% 0%, rgba(99, 102, 241, 0.22) 0px, transparent 50%),
                radial-gradient(at 100% 0%, rgba(168, 85, 247, 0.25) 0px, transparent 50%),
                radial-gradient(at 100% 100%, rgba(59, 130, 246, 0.2) 0px, transparent 50%),
                radial-gradient(at 0% 100%, rgba(236, 72, 153, 0.15) 0px, transparent 50%);
        }

        .glass-header {
            background: rgba(11, 15, 25, 0.85);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .glass-card-light {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.8);
        }
    </style>
</head>
<body class="min-h-screen bg-slate-950 text-slate-100 flex flex-col selection:bg-indigo-500 selection:text-white antialiased">

    <!-- Top Announcement Bar -->
    <div class="bg-gradient-to-r from-indigo-900 via-indigo-700 to-purple-800 text-white text-xs py-2 px-4 text-center font-medium relative z-50">
        <span>✨ Welcome to ShopNext 2.0 &bull; Multi-Vendor Commerce Platform for Buyers, Sellers &amp; Admins</span>
    </div>

    <!-- Navigation Header -->
    <header class="sticky top-0 z-40 glass-header">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-18 flex items-center justify-between gap-4">
            
            <!-- Brand Logo -->
            <a href="{{ url('/') }}" class="flex items-center gap-2.5 shrink-0 group">
                <div class="w-10 h-10 rounded-xl bg-gradient-to-tr from-indigo-600 via-indigo-500 to-purple-500 flex items-center justify-center shadow-lg shadow-indigo-500/30 group-hover:scale-105 transition-transform duration-200">
                    <svg class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke-width="2.2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                    </svg>
                </div>
                <div class="flex flex-col">
                    <span class="text-xl font-bold tracking-tight text-white flex items-center gap-1">
                        Shop<span class="text-transparent bg-clip-text bg-gradient-to-r from-indigo-400 to-purple-400">Next</span>
                    </span>
                    <span class="text-[9px] uppercase font-bold tracking-widest text-slate-400">Marketplace</span>
                </div>
            </a>

            <!-- Search Bar (Desktop) -->
            <div class="hidden md:flex flex-1 max-w-md mx-6">
                <div class="relative w-full">
                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                        </svg>
                    </div>
                    <input 
                        type="text" 
                        placeholder="Search millions of products, electronics, brands..." 
                        class="w-full pl-10 pr-4 py-2 rounded-xl bg-white/5 border border-white/10 text-slate-200 placeholder:text-slate-500 text-sm focus:outline-none focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20"
                    >
                </div>
            </div>

            <!-- Right Auth Actions -->
            <div class="flex items-center gap-3">
                @auth
                    <!-- User Role Badge -->
                    @if(auth()->user()->role === 'admin')
                        <span class="px-2.5 py-1 rounded-full text-xs font-bold bg-rose-500/20 border border-rose-500/40 text-rose-300 flex items-center gap-1.5">
                            <span class="w-1.5 h-1.5 rounded-full bg-rose-400 animate-pulse"></span>
                            Admin
                        </span>
                    @elseif(auth()->user()->role === 'seller')
                        <span class="px-2.5 py-1 rounded-full text-xs font-bold bg-purple-500/20 border border-purple-500/40 text-purple-300 flex items-center gap-1.5">
                            <span class="w-1.5 h-1.5 rounded-full bg-purple-400 animate-pulse"></span>
                            Seller
                        </span>
                    @else
                        <span class="px-2.5 py-1 rounded-full text-xs font-bold bg-indigo-500/20 border border-indigo-500/40 text-indigo-300 flex items-center gap-1.5">
                            <span class="w-1.5 h-1.5 rounded-full bg-indigo-400 animate-pulse"></span>
                            Buyer
                        </span>
                    @endif

                    <!-- Go to Dashboard -->
                    @if(auth()->user()->role === 'admin')
                        <a href="{{ url('/admin/dashboard') }}" class="px-3 py-1.5 rounded-xl bg-indigo-600 hover:bg-indigo-500 text-white text-xs sm:text-sm font-semibold transition shadow-md shadow-indigo-600/30 flex items-center gap-1.5">
                            <span>Admin Panel</span>
                            <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                            </svg>
                        </a>
                    @elseif(auth()->user()->role === 'seller')
                        <a href="{{ url('/seller/dashboard') }}" class="px-3 py-1.5 rounded-xl bg-purple-600 hover:bg-purple-500 text-white text-xs sm:text-sm font-semibold transition shadow-md shadow-purple-600/30 flex items-center gap-1.5">
                            <span>Seller Dashboard</span>
                            <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                            </svg>
                        </a>
                    @endif

                    <!-- User Name & Logout -->
                    <div class="flex items-center gap-2 pl-2 border-l border-white/10">
                        <span class="hidden sm:inline text-xs font-medium text-slate-300">{{ auth()->user()->name }}</span>
                        <form action="{{ route('logout') }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" class="p-2 rounded-xl bg-white/10 hover:bg-rose-500/20 hover:text-rose-400 text-slate-300 transition text-xs font-semibold flex items-center gap-1 cursor-pointer" title="Log Out">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
                                </svg>
                                <span class="hidden sm:inline">Logout</span>
                            </button>
                        </form>
                    </div>

                @else
                    <!-- Guest Links -->
                    <a href="{{ route('login') }}" class="px-3.5 py-1.5 sm:px-4 sm:py-2 text-xs sm:text-sm font-semibold text-slate-200 hover:text-white transition">
                        Sign In
                    </a>
                    <a href="{{ route('register') }}" class="px-3.5 py-1.5 sm:px-4 sm:py-2 rounded-xl bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-500 hover:to-purple-500 text-white text-xs sm:text-sm font-bold shadow-lg shadow-indigo-600/30 transition duration-150">
                        Create Account
                    </a>
                @endauth
            </div>

        </div>
    </header>

    <!-- Hero Section -->
    <main class="flex-1 bg-mesh-pattern relative overflow-hidden">
        
        <!-- Ambient background glows -->
        <div class="absolute -top-40 left-1/4 w-[500px] h-[500px] bg-indigo-600/15 rounded-full blur-[120px] pointer-events-none"></div>
        <div class="absolute top-1/2 -right-20 w-[450px] h-[450px] bg-purple-600/15 rounded-full blur-[120px] pointer-events-none"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 sm:py-16 lg:py-20 relative z-10">
            
            <!-- Hero Title & Subtitle -->
            <div class="text-center max-w-3xl mx-auto mb-12 sm:mb-16">
                <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-white/10 border border-white/15 text-xs font-semibold text-indigo-300 mb-6 backdrop-blur-md">
                    <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                    Unified Multi-Vendor Commerce Platform
                </div>
                <h1 class="text-3xl sm:text-5xl lg:text-6xl font-extrabold text-white tracking-tight leading-tight sm:leading-none mb-5">
                    Buy, Sell &amp; Scale with <br class="hidden sm:inline">
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-indigo-400 via-purple-300 to-pink-400">ShopNext Hub</span>
                </h1>
                <p class="text-sm sm:text-lg text-slate-300 leading-relaxed max-w-2xl mx-auto">
                    A modern marketplace platform with role-based access for Buyers, Sellers, and Admins. Enjoy lightning-fast browsing, escrow security, and comprehensive seller analytics.
                </p>

                <!-- Action CTA Buttons -->
                <div class="mt-8 flex flex-wrap items-center justify-center gap-4">
                    @auth
                        @if(auth()->user()->role === 'admin')
                            <a href="{{ url('/admin/dashboard') }}" class="px-6 py-3.5 rounded-2xl bg-gradient-to-r from-rose-600 to-indigo-600 hover:from-rose-500 hover:to-indigo-500 text-white font-bold text-sm sm:text-base shadow-xl shadow-rose-600/25 transition duration-200 flex items-center gap-2">
                                <span>Enter Admin Dashboard</span>
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                                </svg>
                            </a>
                        @elseif(auth()->user()->role === 'seller')
                            <a href="{{ url('/seller/dashboard') }}" class="px-6 py-3.5 rounded-2xl bg-gradient-to-r from-purple-600 to-indigo-600 hover:from-purple-500 hover:to-indigo-500 text-white font-bold text-sm sm:text-base shadow-xl shadow-purple-600/25 transition duration-200 flex items-center gap-2">
                                <span>Go to Seller Dashboard</span>
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                                </svg>
                            </a>
                        @else
                            <a href="#products" class="px-6 py-3.5 rounded-2xl bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-500 hover:to-purple-500 text-white font-bold text-sm sm:text-base shadow-xl shadow-indigo-600/25 transition duration-200 flex items-center gap-2">
                                <span>Start Shopping</span>
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 13.5L12 21m0 0l-7.5-7.5M12 21V3" />
                                </svg>
                            </a>
                        @endif
                    @else
                        <a href="{{ route('register') }}" class="px-6 py-3.5 rounded-2xl bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-500 hover:to-purple-500 text-white font-bold text-sm sm:text-base shadow-xl shadow-indigo-600/25 transition duration-200 flex items-center gap-2">
                            <span>Get Started Free</span>
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                            </svg>
                        </a>
                        <a href="{{ route('login') }}" class="px-6 py-3.5 rounded-2xl bg-white/10 hover:bg-white/15 border border-white/20 text-white font-semibold text-sm sm:text-base backdrop-blur-md transition duration-200">
                            Sign In to Account
                        </a>
                    @endauth
                </div>
            </div>

            <!-- 3 Role Portals Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-16">
                
                <!-- Card 1: Admin Control -->
                <div class="glass-card rounded-3xl p-6 sm:p-7 relative overflow-hidden group hover:border-rose-500/40 transition duration-300">
                    <div class="w-12 h-12 rounded-2xl bg-rose-500/20 text-rose-400 flex items-center justify-center mb-5 border border-rose-500/30">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z" />
                        </svg>
                    </div>
                    <div class="inline-block px-2.5 py-0.5 rounded-md text-[10px] font-bold uppercase tracking-wider bg-rose-500/20 text-rose-300 mb-2">
                        Platform Authority
                    </div>
                    <h3 class="text-xl font-bold text-white mb-2">Main Admin Control</h3>
                    <p class="text-xs sm:text-sm text-slate-300 leading-relaxed mb-4">
                        Oversee all sellers and buyers, monitor marketplace activities, manage catalog approvals, and maintain security.
                    </p>
                    <a href="{{ auth()->check() && auth()->user()->role === 'admin' ? url('/admin/dashboard') : route('login') }}" class="inline-flex items-center gap-1.5 text-xs font-bold text-rose-400 hover:text-rose-300">
                        <span>{{ auth()->check() && auth()->user()->role === 'admin' ? 'Open Admin Dashboard' : 'Admin Login' }}</span>
                        &rarr;
                    </a>
                </div>

                <!-- Card 2: Seller Partner -->
                <div class="glass-card rounded-3xl p-6 sm:p-7 relative overflow-hidden group hover:border-purple-500/40 transition duration-300">
                    <div class="w-12 h-12 rounded-2xl bg-purple-500/20 text-purple-400 flex items-center justify-center mb-5 border border-purple-500/30">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 21v-7.5a.75.75 0 01.75-.75h3a.75.75 0 01.75.75V21m-4.5 0H2.25A2.25 2.25 0 010 18.75V10.5m18 10.5h3.75A2.25 2.25 0 0024 18.75V10.5M12 3l10.5 7.5H1.5L12 3z" />
                        </svg>
                    </div>
                    <div class="inline-block px-2.5 py-0.5 rounded-md text-[10px] font-bold uppercase tracking-wider bg-purple-500/20 text-purple-300 mb-2">
                        Merchant Center
                    </div>
                    <h3 class="text-xl font-bold text-white mb-2">Seller Hub</h3>
                    <p class="text-xs sm:text-sm text-slate-300 leading-relaxed mb-4">
                        Create product listings, manage inventory, process customer orders, and track revenue with advanced shop metrics.
                    </p>
                    <a href="{{ auth()->check() && auth()->user()->role === 'seller' ? url('/seller/dashboard') : route('register') }}" class="inline-flex items-center gap-1.5 text-xs font-bold text-purple-400 hover:text-purple-300">
                        <span>{{ auth()->check() && auth()->user()->role === 'seller' ? 'Open Seller Dashboard' : 'Become a Seller' }}</span>
                        &rarr;
                    </a>
                </div>

                <!-- Card 3: Customer Shopping -->
                <div class="glass-card rounded-3xl p-6 sm:p-7 relative overflow-hidden group hover:border-indigo-500/40 transition duration-300">
                    <div class="w-12 h-12 rounded-2xl bg-indigo-500/20 text-indigo-400 flex items-center justify-center mb-5 border border-indigo-500/30">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                        </svg>
                    </div>
                    <div class="inline-block px-2.5 py-0.5 rounded-md text-[10px] font-bold uppercase tracking-wider bg-indigo-500/20 text-indigo-300 mb-2">
                        Buyer Storefront
                    </div>
                    <h3 class="text-xl font-bold text-white mb-2">Customer Experience</h3>
                    <p class="text-xs sm:text-sm text-slate-300 leading-relaxed mb-4">
                        Discover top electronics, fashion, and home deals from verified merchants with 100% money-back escrow protection.
                    </p>
                    <a href="{{ route('register') }}" class="inline-flex items-center gap-1.5 text-xs font-bold text-indigo-400 hover:text-indigo-300">
                        <span>Create Buyer Account</span>
                        &rarr;
                    </a>
                </div>

            </div>

            <!-- Featured Products Section -->
            <div id="products" class="pt-6">
                <div class="flex items-center justify-between mb-8">
                    <div>
                        <h2 class="text-2xl sm:text-3xl font-extrabold text-white">Trending on ShopNext</h2>
                        <p class="text-xs sm:text-sm text-slate-400 mt-1">Curated products from top-rated platform merchants</p>
                    </div>
                    <div class="hidden sm:flex items-center gap-2">
                        <span class="px-3 py-1.5 rounded-xl bg-white/10 text-xs font-semibold text-white">Electronics</span>
                        <span class="px-3 py-1.5 rounded-xl bg-white/5 hover:bg-white/10 text-xs font-semibold text-slate-400 hover:text-white cursor-pointer transition">Fashion</span>
                        <span class="px-3 py-1.5 rounded-xl bg-white/5 hover:bg-white/10 text-xs font-semibold text-slate-400 hover:text-white cursor-pointer transition">Home</span>
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    
                    <!-- Product 1 -->
                    <div class="glass-card rounded-2xl p-4 flex flex-col justify-between group hover:border-white/30 transition duration-200">
                        <div class="relative w-full aspect-square rounded-xl bg-gradient-to-tr from-slate-800 to-slate-700 flex items-center justify-center overflow-hidden mb-4">
                            <span class="text-5xl group-hover:scale-110 transition duration-300">🎧</span>
                            <span class="absolute top-2.5 left-2.5 px-2 py-0.5 rounded-md bg-rose-500 text-white text-[10px] font-bold">25% OFF</span>
                        </div>
                        <div>
                            <div class="flex items-center justify-between text-xs text-slate-400 mb-1">
                                <span>Audio Pro</span>
                                <span class="text-amber-400 font-semibold">★ 4.9 (1.2k)</span>
                            </div>
                            <h4 class="font-bold text-white text-sm line-clamp-1">Wireless Noise-Canceling Headphones</h4>
                            <div class="flex items-center justify-between mt-3">
                                <div>
                                    <span class="text-lg font-extrabold text-white">$149.00</span>
                                    <span class="text-xs text-slate-400 line-through ml-1.5">$199.00</span>
                                </div>
                                <button class="p-2 rounded-xl bg-indigo-600 hover:bg-indigo-500 text-white transition cursor-pointer" title="Add to cart">
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Product 2 -->
                    <div class="glass-card rounded-2xl p-4 flex flex-col justify-between group hover:border-white/30 transition duration-200">
                        <div class="relative w-full aspect-square rounded-xl bg-gradient-to-tr from-slate-800 to-slate-700 flex items-center justify-center overflow-hidden mb-4">
                            <span class="text-5xl group-hover:scale-110 transition duration-300">⌚</span>
                            <span class="absolute top-2.5 left-2.5 px-2 py-0.5 rounded-md bg-emerald-500 text-white text-[10px] font-bold">NEW</span>
                        </div>
                        <div>
                            <div class="flex items-center justify-between text-xs text-slate-400 mb-1">
                                <span>TechWear</span>
                                <span class="text-amber-400 font-semibold">★ 4.8 (850)</span>
                            </div>
                            <h4 class="font-bold text-white text-sm line-clamp-1">Smartwatch Series X Titanium</h4>
                            <div class="flex items-center justify-between mt-3">
                                <div>
                                    <span class="text-lg font-extrabold text-white">$219.00</span>
                                </div>
                                <button class="p-2 rounded-xl bg-indigo-600 hover:bg-indigo-500 text-white transition cursor-pointer" title="Add to cart">
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Product 3 -->
                    <div class="glass-card rounded-2xl p-4 flex flex-col justify-between group hover:border-white/30 transition duration-200">
                        <div class="relative w-full aspect-square rounded-xl bg-gradient-to-tr from-slate-800 to-slate-700 flex items-center justify-center overflow-hidden mb-4">
                            <span class="text-5xl group-hover:scale-110 transition duration-300">⌨️</span>
                        </div>
                        <div>
                            <div class="flex items-center justify-between text-xs text-slate-400 mb-1">
                                <span>KeyMaster</span>
                                <span class="text-amber-400 font-semibold">★ 5.0 (310)</span>
                            </div>
                            <h4 class="font-bold text-white text-sm line-clamp-1">Custom RGB Mechanical Keyboard</h4>
                            <div class="flex items-center justify-between mt-3">
                                <div>
                                    <span class="text-lg font-extrabold text-white">$89.99</span>
                                </div>
                                <button class="p-2 rounded-xl bg-indigo-600 hover:bg-indigo-500 text-white transition cursor-pointer" title="Add to cart">
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Product 4 -->
                    <div class="glass-card rounded-2xl p-4 flex flex-col justify-between group hover:border-white/30 transition duration-200">
                        <div class="relative w-full aspect-square rounded-xl bg-gradient-to-tr from-slate-800 to-slate-700 flex items-center justify-center overflow-hidden mb-4">
                            <span class="text-5xl group-hover:scale-110 transition duration-300">🎒</span>
                            <span class="absolute top-2.5 left-2.5 px-2 py-0.5 rounded-md bg-purple-500 text-white text-[10px] font-bold">POPULAR</span>
                        </div>
                        <div>
                            <div class="flex items-center justify-between text-xs text-slate-400 mb-1">
                                <span>UrbanGear</span>
                                <span class="text-amber-400 font-semibold">★ 4.7 (940)</span>
                            </div>
                            <h4 class="font-bold text-white text-sm line-clamp-1">Waterproof Daily Travel Backpack</h4>
                            <div class="flex items-center justify-between mt-3">
                                <div>
                                    <span class="text-lg font-extrabold text-white">$65.00</span>
                                    <span class="text-xs text-slate-400 line-through ml-1.5">$85.00</span>
                                </div>
                                <button class="p-2 rounded-xl bg-indigo-600 hover:bg-indigo-500 text-white transition cursor-pointer" title="Add to cart">
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-slate-950 border-t border-white/10 py-8 text-xs text-slate-400">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col sm:flex-row items-center justify-between gap-4">
            <div class="flex items-center gap-2">
                <span class="font-bold text-white">ShopNext Inc.</span>
                <span>&bull;</span>
                <span>All rights reserved.</span>
            </div>
            <div class="flex items-center gap-6">
                <a href="{{ route('login') }}" class="hover:text-white transition">Sign In</a>
                <a href="{{ route('register') }}" class="hover:text-white transition">Register</a>
                <a href="{{ url('/admin/dashboard') }}" class="hover:text-white transition">Admin Portal</a>
            </div>
        </div>
    </footer>

</body>
</html>
