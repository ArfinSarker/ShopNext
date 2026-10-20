<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
    <title>Sign In &bull; ShopNext</title>
    <meta name="description" content="Sign in to your ShopNext account to access your orders, wishlist, or manage your seller store.">
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
                            950: '#1e1b4b',
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

        .glass-panel {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.7);
        }

        .glass-badge {
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.25);
        }

        .floating-element {
            animation: floating 6s ease-in-out infinite;
        }

        .floating-element-reverse {
            animation: floatingReverse 7s ease-in-out infinite;
        }

        @keyframes floating {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-10px) rotate(1deg); }
        }

        @keyframes floatingReverse {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(8px) rotate(-1deg); }
        }

        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 6px;
        }
        ::-webkit-scrollbar-track {
            background: transparent;
        }
        ::-webkit-scrollbar-thumb {
            background: rgba(99, 102, 241, 0.3);
            border-radius: 999px;
        }
    </style>
</head>
<body class="min-h-[100dvh] bg-mesh-pattern text-slate-800 flex flex-col justify-between selection:bg-indigo-500 selection:text-white antialiased relative overflow-x-hidden">

    <!-- Ambient background glowing blobs for desktop & mobile -->
    <div class="fixed inset-0 pointer-events-none overflow-hidden z-0">
        <div class="absolute -top-32 -left-32 w-96 h-96 bg-indigo-500/20 rounded-full blur-3xl"></div>
        <div class="absolute top-1/2 -right-32 w-96 h-96 bg-purple-500/20 rounded-full blur-3xl"></div>
        <div class="absolute -bottom-32 left-1/3 w-96 h-96 bg-blue-500/15 rounded-full blur-3xl"></div>
    </div>

    <!-- Header bar / brand for mobile & desktop -->
    <header class="relative z-10 w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-5 pb-2 flex items-center justify-between">
        <a href="{{ url('/') }}" class="group flex items-center gap-2.5 transition duration-200">
            <div class="w-10 h-10 rounded-xl bg-gradient-to-tr from-indigo-600 via-indigo-500 to-purple-500 flex items-center justify-center shadow-lg shadow-indigo-500/30 group-hover:scale-105 transition-transform duration-300">
                <svg class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke-width="2.2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                </svg>
            </div>
            <div class="flex flex-col">
                <span class="text-xl font-bold tracking-tight text-white flex items-center gap-1.5">
                    Shop<span class="text-transparent bg-clip-text bg-gradient-to-r from-indigo-400 to-purple-400">Next</span>
                </span>
                <span class="text-[10px] uppercase font-semibold tracking-wider text-slate-400">Next-Gen E-Commerce</span>
            </div>
        </a>

        <div class="flex items-center gap-3">
            <span class="hidden sm:inline-block text-xs font-medium text-slate-300">New to ShopNext?</span>
            <a href="{{ route('register') }}" class="inline-flex items-center gap-1.5 text-xs sm:text-sm font-semibold text-white bg-white/10 hover:bg-white/20 border border-white/20 backdrop-blur-md px-3.5 py-1.5 sm:px-4 sm:py-2 rounded-xl transition duration-200">
                <span>Create account</span>
                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                </svg>
            </a>
        </div>
    </header>

    <!-- Main Content Container -->
    <main class="relative z-10 flex-1 flex items-center justify-center p-4 sm:p-6 lg:p-8">
        <div class="w-full max-w-5xl mx-auto">
            <div class="glass-panel rounded-3xl shadow-2xl shadow-black/40 overflow-hidden grid grid-cols-1 lg:grid-cols-12 border border-white/40">
                
                <!-- Left Showcase Column (Visible on Desktop & Tablet Landscape) -->
                <div class="hidden lg:flex lg:col-span-5 bg-gradient-to-br from-indigo-900 via-slate-900 to-purple-950 p-8 xl:p-10 text-white flex-col justify-between relative overflow-hidden">
                    <!-- Background ambient patterns -->
                    <div class="absolute inset-0 opacity-10 bg-[radial-gradient(#fff_1px,transparent_1px)] [background-size:16px_16px]"></div>
                    <div class="absolute -top-24 -right-24 w-64 h-64 bg-indigo-500/30 rounded-full blur-2xl"></div>
                    <div class="absolute -bottom-24 -left-24 w-64 h-64 bg-purple-500/30 rounded-full blur-2xl"></div>

                    <!-- Top Showcase Tag -->
                    <div class="relative z-10">
                        <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-white/10 border border-white/15 backdrop-blur-md text-xs font-semibold text-indigo-200 mb-6">
                            <span class="flex h-2 w-2 rounded-full bg-emerald-400 animate-pulse"></span>
                            Secure Platform 2.0
                        </div>
                        <h1 class="text-3xl xl:text-4xl font-extrabold tracking-tight leading-tight mb-3">
                            Welcome back to your commerce hub.
                        </h1>
                        <p class="text-sm text-slate-300 leading-relaxed">
                            Discover millions of authentic products, exclusive discounts, and smart seller tools designed for growth.
                        </p>
                    </div>

                    <!-- Floating Interactive Cards -->
                    <div class="relative z-10 my-8 space-y-4">
                        <!-- Stat badge 1 -->
                        <div class="glass-badge rounded-2xl p-4 flex items-center gap-4 floating-element shadow-lg">
                            <div class="w-12 h-12 rounded-xl bg-gradient-to-tr from-emerald-500 to-teal-400 flex items-center justify-center text-white font-bold text-lg shadow-md shrink-0">
                                4.9★
                            </div>
                            <div>
                                <h2 class="text-sm font-bold text-white">50,000+ Verified Users</h2>
                                <p class="text-xs text-indigo-200">Trusted by buyers & top merchants</p>
                            </div>
                        </div>

                        <!-- Stat badge 2 -->
                        <div class="glass-badge rounded-2xl p-4 flex items-center gap-4 floating-element-reverse shadow-lg">
                            <div class="w-12 h-12 rounded-xl bg-gradient-to-tr from-indigo-500 to-purple-500 flex items-center justify-center text-white shrink-0 shadow-md">
                                <svg class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z" />
                                </svg>
                            </div>
                            <div>
                                <h2 class="text-sm font-bold text-white">100% Buyer Protection</h2>
                                <p class="text-xs text-indigo-200">Escrow security & 7-day hassle-free returns</p>
                            </div>
                        </div>
                    </div>

                    <!-- Bottom Customer Stack -->
                    <div class="relative z-10 pt-4 border-t border-white/10 flex items-center justify-between text-xs text-slate-300">
                        <div class="flex items-center -space-x-2">
                            <div class="w-8 h-8 rounded-full ring-2 ring-indigo-900 bg-amber-400 flex items-center justify-center text-slate-900 font-bold text-xs">AK</div>
                            <div class="w-8 h-8 rounded-full ring-2 ring-indigo-900 bg-emerald-400 flex items-center justify-center text-slate-900 font-bold text-xs">SM</div>
                            <div class="w-8 h-8 rounded-full ring-2 ring-indigo-900 bg-purple-400 flex items-center justify-center text-slate-900 font-bold text-xs">RT</div>
                            <div class="w-8 h-8 rounded-full ring-2 ring-indigo-900 bg-indigo-600 flex items-center justify-center text-white font-semibold text-[10px]">+12k</div>
                        </div>
                        <span class="font-medium text-indigo-200">Joined this month</span>
                    </div>
                </div>

                <!-- Right Form Column -->
                <div class="col-span-1 lg:col-span-7 p-6 sm:p-10 xl:p-12 flex flex-col justify-center bg-white/95">
                    
                    <!-- Mobile Brand Icon (shows on small screens) -->
                    <div class="lg:hidden flex items-center justify-between mb-6 pb-4 border-b border-slate-100">
                        <div class="flex items-center gap-2">
                            <div class="w-8 h-8 rounded-lg bg-indigo-600 flex items-center justify-center text-white">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                                </svg>
                            </div>
                            <span class="font-bold text-slate-900">ShopNext</span>
                        </div>
                        <a href="{{ route('register') }}" class="text-xs font-semibold text-indigo-600 hover:text-indigo-700">
                            Create account &rarr;
                        </a>
                    </div>

                    <!-- Form Header -->
                    <div class="mb-7">
                        <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight">
                            Sign In
                        </h2>
                        <p class="text-sm text-slate-500 mt-1">
                            Enter your credentials to access your account
                        </p>
                    </div>

                    <!-- Flash Messages -->
                    @if (session('success'))
                        <div class="mb-5 p-4 rounded-2xl bg-emerald-50 border border-emerald-200 text-emerald-800 text-sm flex items-start gap-3 shadow-sm animate-fade-in">
                            <svg class="w-5 h-5 text-emerald-500 shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <div>
                                <p class="font-semibold">Success</p>
                                <p class="text-emerald-700 text-xs mt-0.5">{{ session('success') }}</p>
                            </div>
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="mb-5 p-4 rounded-2xl bg-rose-50 border border-rose-200 text-rose-800 text-sm flex items-start gap-3 shadow-sm">
                            <svg class="w-5 h-5 text-rose-500 shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
                            </svg>
                            <div class="flex-1">
                                <p class="font-semibold text-rose-900">Please check the following errors:</p>
                                <ul class="mt-1 list-disc list-inside text-xs text-rose-700 space-y-0.5">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif

                    <form action="{{ route('login') }}" method="POST" class="space-y-4" novalidate id="loginForm">
                        @csrf

                        <!-- Email Address Input -->
                        <div>
                            <label for="email" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">
                                Email Address <span class="text-rose-500">*</span>
                            </label>
                            <div class="relative rounded-2xl shadow-sm">
                                <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                                    </svg>
                                </div>
                                <input 
                                    type="email" 
                                    name="email" 
                                    id="email" 
                                    value="{{ old('email') }}" 
                                    required 
                                    autocomplete="email"
                                    placeholder="name@example.com"
                                    class="w-full pl-11 pr-4 py-3 sm:py-3.5 text-sm sm:text-base rounded-2xl bg-slate-50 border @error('email') border-rose-300 ring-1 ring-rose-300 @else border-slate-200 @enderror text-slate-900 placeholder:text-slate-400 focus:outline-none focus:border-indigo-600 focus:ring-4 focus:ring-indigo-500/15 focus:bg-white transition-all duration-200"
                                >
                            </div>
                            @error('email')
                                <p class="text-xs text-rose-600 mt-1 font-medium">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Password Input -->
                        <div>
                            <div class="flex items-center justify-between mb-1.5">
                                <label for="password" class="block text-xs font-bold uppercase tracking-wider text-slate-700">
                                    Password <span class="text-rose-500">*</span>
                                </label>
                                <a href="#" onclick="alert('Password reset link will be sent to your email.'); return false;" class="text-xs font-semibold text-indigo-600 hover:text-indigo-700 transition duration-150">
                                    Forgot password?
                                </a>
                            </div>
                            <div class="relative rounded-2xl shadow-sm">
                                <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
                                    </svg>
                                </div>
                                <input 
                                    type="password" 
                                    name="password" 
                                    id="password" 
                                    required 
                                    autocomplete="current-password"
                                    placeholder="••••••••"
                                    class="w-full pl-11 pr-12 py-3 sm:py-3.5 text-sm sm:text-base rounded-2xl bg-slate-50 border @error('password') border-rose-300 ring-1 ring-rose-300 @else border-slate-200 @enderror text-slate-900 placeholder:text-slate-400 focus:outline-none focus:border-indigo-600 focus:ring-4 focus:ring-indigo-500/15 focus:bg-white transition-all duration-200"
                                >
                                <button 
                                    type="button" 
                                    id="togglePassword" 
                                    aria-label="Toggle password visibility"
                                    class="absolute inset-y-0 right-0 pr-3.5 flex items-center text-slate-400 hover:text-slate-600 focus:outline-none cursor-pointer"
                                >
                                    <svg id="eyeIcon" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                    <svg id="eyeOffIcon" class="w-5 h-5 hidden" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 001.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.45 10.45 0 0112 4.5c4.756 0 8.773 3.162 10.065 7.498a10.523 10.523 0 01-4.293 5.774M6.228 6.228L3 3m3.228 3.228l3.65 3.65m7.894 7.894L21 21m-3.228-3.228l-3.65-3.65m0 0a3 3 0 10-4.243-4.243m4.242 4.242L9.88 9.88" />
                                    </svg>
                                </button>
                            </div>
                            @error('password')
                                <p class="text-xs text-rose-600 mt-1 font-medium">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Remember Me & Quick action -->
                        <div class="flex items-center justify-between pt-1">
                            <label class="flex items-center gap-2.5 cursor-pointer select-none group">
                                <input 
                                    type="checkbox" 
                                    name="remember" 
                                    id="remember"
                                    class="w-4 h-4 rounded-md border-slate-300 text-indigo-600 focus:ring-indigo-500/20 cursor-pointer accent-indigo-600 transition"
                                >
                                <span class="text-xs sm:text-sm font-medium text-slate-600 group-hover:text-slate-900 transition-colors">
                                    Remember me for 30 days
                                </span>
                            </label>
                        </div>

                        <!-- Submit Button -->
                        <div class="pt-2">
                            <button 
                                type="submit" 
                                id="submitBtn"
                                class="w-full relative group overflow-hidden bg-gradient-to-r from-indigo-600 via-indigo-700 to-purple-600 hover:from-indigo-500 hover:to-purple-500 text-white font-bold py-3.5 px-6 rounded-2xl shadow-xl shadow-indigo-600/25 hover:shadow-indigo-600/35 active:scale-[0.99] transition-all duration-200 flex items-center justify-center gap-2 cursor-pointer"
                            >
                                <span class="text-sm sm:text-base tracking-wide">Sign In to ShopNext</span>
                                <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform duration-200" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                                </svg>
                            </button>
                        </div>
                    </form>

                    <!-- Bottom Signup Callout -->
                    <p class="text-center text-xs sm:text-sm text-slate-600 mt-6 pt-4 border-t border-slate-100">
                        Don't have an account yet? 
                        <a href="{{ route('register') }}" class="font-bold text-indigo-600 hover:text-indigo-800 transition underline underline-offset-4 decoration-indigo-300 hover:decoration-indigo-600">
                            Create free account
                        </a>
                    </p>
                </div>
            </div>

            <!-- Trust badges below form for mobile & desktop -->
            <div class="mt-8 flex flex-wrap items-center justify-center gap-6 text-xs text-slate-400 font-medium">
                <div class="flex items-center gap-1.5">
                    <svg class="w-4 h-4 text-emerald-400" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    256-Bit SSL Encrypted
                </div>
                <div class="flex items-center gap-1.5">
                    <svg class="w-4 h-4 text-emerald-400" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    Customer & Seller Protection
                </div>
                <div class="flex items-center gap-1.5">
                    <svg class="w-4 h-4 text-emerald-400" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    Fast & Verified Registration
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="relative z-10 py-4 text-center text-xs text-slate-400">
        &copy; {{ date('Y') }} ShopNext Inc. All rights reserved.
    </footer>

    <!-- Password visibility toggle & helper scripts -->
    <script>
        const toggleBtn = document.getElementById('togglePassword');
        const passwordInput = document.getElementById('password');
        const eyeIcon = document.getElementById('eyeIcon');
        const eyeOffIcon = document.getElementById('eyeOffIcon');

        if (toggleBtn && passwordInput) {
            toggleBtn.addEventListener('click', function() {
                const isPassword = passwordInput.type === 'password';
                passwordInput.type = isPassword ? 'text' : 'password';
                eyeIcon.classList.toggle('hidden', isPassword);
                eyeOffIcon.classList.toggle('hidden', !isPassword);
            });
        }
    </script>
</body>
</html>