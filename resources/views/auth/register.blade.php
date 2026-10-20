<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
    <title>Create Account &bull; ShopNext</title>
    <meta name="description" content="Register for a new ShopNext account as a customer or seller to start buying or selling products online.">
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
            50% { transform: translateY(-8px) rotate(1deg); }
        }

        @keyframes floatingReverse {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(7px) rotate(-1deg); }
        }

        /* Role selector active states */
        .role-card-active {
            border-color: #6366f1 !important;
            background: #eef2ff !important;
            box-shadow: 0 4px 14px -2px rgba(99, 102, 241, 0.25);
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

    <!-- Ambient background glowing blobs -->
    <div class="fixed inset-0 pointer-events-none overflow-hidden z-0">
        <div class="absolute -top-32 -left-32 w-96 h-96 bg-indigo-500/20 rounded-full blur-3xl"></div>
        <div class="absolute top-1/2 -right-32 w-96 h-96 bg-purple-500/20 rounded-full blur-3xl"></div>
        <div class="absolute -bottom-32 left-1/3 w-96 h-96 bg-blue-500/15 rounded-full blur-3xl"></div>
    </div>

    <!-- Header bar -->
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
            <span class="hidden sm:inline-block text-xs font-medium text-slate-300">Already registered?</span>
            <a href="{{ route('login') }}" class="inline-flex items-center gap-1.5 text-xs sm:text-sm font-semibold text-white bg-white/10 hover:bg-white/20 border border-white/20 backdrop-blur-md px-3.5 py-1.5 sm:px-4 sm:py-2 rounded-xl transition duration-200">
                <span>Sign In</span>
                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                </svg>
            </a>
        </div>
    </header>

    <!-- Main Content -->
    <main class="relative z-10 flex-1 flex items-center justify-center p-4 sm:p-6 lg:p-8">
        <div class="w-full max-w-5xl mx-auto">
            <div class="glass-panel rounded-3xl shadow-2xl shadow-black/40 overflow-hidden grid grid-cols-1 lg:grid-cols-12 border border-white/40">
                
                <!-- Left Showcase Column (Desktop only) -->
                <div class="hidden lg:flex lg:col-span-5 bg-gradient-to-br from-indigo-900 via-slate-900 to-purple-950 p-8 xl:p-10 text-white flex-col justify-between relative overflow-hidden">
                    <div class="absolute inset-0 opacity-10 bg-[radial-gradient(#fff_1px,transparent_1px)] [background-size:16px_16px]"></div>
                    <div class="absolute -top-24 -right-24 w-64 h-64 bg-indigo-500/30 rounded-full blur-2xl"></div>
                    <div class="absolute -bottom-24 -left-24 w-64 h-64 bg-purple-500/30 rounded-full blur-2xl"></div>

                    <!-- Top Showcase -->
                    <div class="relative z-10">
                        <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-white/10 border border-white/15 backdrop-blur-md text-xs font-semibold text-indigo-200 mb-6">
                            <span class="flex h-2 w-2 rounded-full bg-emerald-400 animate-pulse"></span>
                            Fast 1-Minute Setup
                        </div>
                        <h1 class="text-3xl xl:text-4xl font-extrabold tracking-tight leading-tight mb-3">
                            Join the modern commerce revolution.
                        </h1>
                        <p class="text-sm text-slate-300 leading-relaxed">
                            Create your free ShopNext profile today. Whether shopping or selling, you get world-class speed, safety, and tools.
                        </p>
                    </div>

                    <!-- Value Highlights -->
                    <div class="relative z-10 my-8 space-y-4">
                        <div class="glass-badge rounded-2xl p-4 flex items-center gap-3.5 floating-element shadow-lg">
                            <div class="w-10 h-10 rounded-xl bg-gradient-to-tr from-indigo-500 to-blue-500 flex items-center justify-center text-white shrink-0">
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                                </svg>
                            </div>
                            <div>
                                <h2 class="text-xs font-bold text-white uppercase tracking-wider">For Shoppers</h2>
                                <p class="text-xs text-indigo-200">Express delivery, verified reviews & loyalty rewards</p>
                            </div>
                        </div>

                        <div class="glass-badge rounded-2xl p-4 flex items-center gap-3.5 floating-element-reverse shadow-lg">
                            <div class="w-10 h-10 rounded-xl bg-gradient-to-tr from-purple-500 to-pink-500 flex items-center justify-center text-white shrink-0">
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 21v-7.5a.75.75 0 01.75-.75h3a.75.75 0 01.75.75V21m-4.5 0H2.25A2.25 2.25 0 010 18.75V10.5m18 10.5h3.75A2.25 2.25 0 0024 18.75V10.5M12 3l10.5 7.5H1.5L12 3z" />
                                </svg>
                            </div>
                            <div>
                                <h2 class="text-xs font-bold text-white uppercase tracking-wider">For Sellers</h2>
                                <p class="text-xs text-indigo-200">Zero setup fees, automated analytics & instant payouts</p>
                            </div>
                        </div>
                    </div>

                    <!-- Bottom Guarantee -->
                    <div class="relative z-10 pt-4 border-t border-white/10 flex items-center gap-3 text-xs text-slate-300">
                        <div class="w-8 h-8 rounded-full bg-emerald-500/20 text-emerald-400 flex items-center justify-center shrink-0">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                            </svg>
                        </div>
                        <span>Encrypted SSL security with zero hidden subscription costs</span>
                    </div>
                </div>

                <!-- Right Form Column -->
                <div class="col-span-1 lg:col-span-7 p-6 sm:p-8 xl:p-10 flex flex-col justify-center bg-white/95">
                    
                    <!-- Mobile Brand Header -->
                    <div class="lg:hidden flex items-center justify-between mb-5 pb-3 border-b border-slate-100">
                        <div class="flex items-center gap-2">
                            <div class="w-8 h-8 rounded-lg bg-indigo-600 flex items-center justify-center text-white">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                                </svg>
                            </div>
                            <span class="font-bold text-slate-900">ShopNext</span>
                        </div>
                        <a href="{{ route('login') }}" class="text-xs font-semibold text-indigo-600 hover:text-indigo-700">
                            Already registered? Sign In &rarr;
                        </a>
                    </div>

                    <!-- Header -->
                    <div class="mb-5">
                        <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight">
                            Create Account
                        </h2>
                        <p class="text-xs sm:text-sm text-slate-500 mt-1">
                            Choose your account type and fill in your details below
                        </p>
                    </div>

                    <!-- Flash & Error alerts -->
                    @if ($errors->any())
                        <div class="mb-5 p-4 rounded-2xl bg-rose-50 border border-rose-200 text-rose-800 text-sm flex items-start gap-3 shadow-sm">
                            <svg class="w-5 h-5 text-rose-500 shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
                            </svg>
                            <div class="flex-1">
                                <p class="font-semibold text-rose-900">Please correct the following:</p>
                                <ul class="mt-1 list-disc list-inside text-xs text-rose-700 space-y-0.5">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif

                    <form action="{{ route('register') }}" method="POST" class="space-y-4" novalidate id="registerForm">
                        @csrf

                        <!-- Role Selection (Visual Interactive Cards) -->
                        <div>
                            <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-2">
                                I want to register as <span class="text-rose-500">*</span>
                            </label>
                            
                            <!-- Hidden inputs for fallback / form submission -->
                            <input type="radio" name="role" id="role_customer" value="customer" class="sr-only" {{ old('role', 'customer') === 'customer' ? 'checked' : '' }}>
                            <input type="radio" name="role" id="role_seller" value="seller" class="sr-only" {{ old('role') === 'seller' ? 'checked' : '' }}>

                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3" role="radiogroup" aria-label="Account Role">
                                
                                <!-- Customer Card -->
                                <div 
                                    id="cardCustomer" 
                                    onclick="selectRole('customer')" 
                                    tabindex="0"
                                    onkeydown="if(event.key === ' ' || event.key === 'Enter') { selectRole('customer'); event.preventDefault(); }"
                                    class="relative p-3.5 sm:p-4 rounded-2xl border-2 cursor-pointer transition-all duration-200 select-none flex items-start gap-3 bg-white border-slate-200 hover:border-indigo-300 {{ old('role', 'customer') === 'customer' ? 'role-card-active' : '' }}"
                                >
                                    <div class="w-10 h-10 rounded-xl bg-indigo-100 text-indigo-600 flex items-center justify-center shrink-0">
                                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                                        </svg>
                                    </div>
                                    <div class="flex-1 pr-4">
                                        <div class="flex items-center gap-1.5">
                                            <span class="text-sm font-bold text-slate-900">Customer</span>
                                            <span class="text-[10px] uppercase font-bold px-1.5 py-0.5 rounded-md bg-indigo-100 text-indigo-700">Buyer</span>
                                        </div>
                                        <p class="text-[11px] text-slate-500 mt-0.5 leading-snug">Shop millions of items & track orders</p>
                                    </div>
                                    <div class="check-icon-customer absolute top-3 right-3 {{ old('role', 'customer') === 'customer' ? 'text-indigo-600' : 'text-slate-300' }}">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                    </div>
                                </div>

                                <!-- Seller Card -->
                                <div 
                                    id="cardSeller" 
                                    onclick="selectRole('seller')" 
                                    tabindex="0"
                                    onkeydown="if(event.key === ' ' || event.key === 'Enter') { selectRole('seller'); event.preventDefault(); }"
                                    class="relative p-3.5 sm:p-4 rounded-2xl border-2 cursor-pointer transition-all duration-200 select-none flex items-start gap-3 bg-white border-slate-200 hover:border-purple-300 {{ old('role') === 'seller' ? 'role-card-active' : '' }}"
                                >
                                    <div class="w-10 h-10 rounded-xl bg-purple-100 text-purple-600 flex items-center justify-center shrink-0">
                                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 21v-7.5a.75.75 0 01.75-.75h3a.75.75 0 01.75.75V21m-4.5 0H2.25A2.25 2.25 0 010 18.75V10.5m18 10.5h3.75A2.25 2.25 0 0024 18.75V10.5M12 3l10.5 7.5H1.5L12 3z" />
                                        </svg>
                                    </div>
                                    <div class="flex-1 pr-4">
                                        <div class="flex items-center gap-1.5">
                                            <span class="text-sm font-bold text-slate-900">Seller</span>
                                            <span class="text-[10px] uppercase font-bold px-1.5 py-0.5 rounded-md bg-purple-100 text-purple-700">Merchant</span>
                                        </div>
                                        <p class="text-[11px] text-slate-500 mt-0.5 leading-snug">Sell products & grow your business</p>
                                    </div>
                                    <div class="check-icon-seller absolute top-3 right-3 {{ old('role') === 'seller' ? 'text-indigo-600' : 'text-slate-300' }}">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                    </div>
                                </div>

                            </div>
                            @error('role')
                                <p class="text-xs text-rose-600 mt-1 font-medium">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Name and Email Row (2 cols on tablet/desktop, 1 col on mobile) -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3.5">
                            
                            <!-- Full Name -->
                            <div>
                                <label for="name" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1">
                                    Full Name <span class="text-rose-500">*</span>
                                </label>
                                <div class="relative rounded-2xl shadow-sm">
                                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                                        </svg>
                                    </div>
                                    <input 
                                        type="text" 
                                        name="name" 
                                        id="name" 
                                        value="{{ old('name') }}" 
                                        required 
                                        autocomplete="name"
                                        placeholder="John Doe"
                                        class="w-full pl-10 pr-3.5 py-2.5 sm:py-3 text-sm rounded-2xl bg-slate-50 border @error('name') border-rose-300 ring-1 ring-rose-300 @else border-slate-200 @enderror text-slate-900 placeholder:text-slate-400 focus:outline-none focus:border-indigo-600 focus:ring-4 focus:ring-indigo-500/15 focus:bg-white transition-all duration-200"
                                    >
                                </div>
                                @error('name')
                                    <p class="text-xs text-rose-600 mt-1 font-medium">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Phone Number -->
                            <div>
                                <label for="phone" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1">
                                    Phone Number <span class="text-slate-400 font-normal lowercase">(optional)</span>
                                </label>
                                <div class="relative rounded-2xl shadow-sm">
                                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />
                                        </svg>
                                    </div>
                                    <input 
                                        type="tel" 
                                        name="phone" 
                                        id="phone" 
                                        value="{{ old('phone') }}" 
                                        autocomplete="tel"
                                        placeholder="+1 (555) 000-0000"
                                        class="w-full pl-10 pr-3.5 py-2.5 sm:py-3 text-sm rounded-2xl bg-slate-50 border @error('phone') border-rose-300 ring-1 ring-rose-300 @else border-slate-200 @enderror text-slate-900 placeholder:text-slate-400 focus:outline-none focus:border-indigo-600 focus:ring-4 focus:ring-indigo-500/15 focus:bg-white transition-all duration-200"
                                    >
                                </div>
                                @error('phone')
                                    <p class="text-xs text-rose-600 mt-1 font-medium">{{ $message }}</p>
                                @enderror
                            </div>

                        </div>

                        <!-- Email Address -->
                        <div>
                            <label for="email" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1">
                                Email Address <span class="text-rose-500">*</span>
                            </label>
                            <div class="relative rounded-2xl shadow-sm">
                                <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
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
                                    class="w-full pl-10 pr-3.5 py-2.5 sm:py-3 text-sm rounded-2xl bg-slate-50 border @error('email') border-rose-300 ring-1 ring-rose-300 @else border-slate-200 @enderror text-slate-900 placeholder:text-slate-400 focus:outline-none focus:border-indigo-600 focus:ring-4 focus:ring-indigo-500/15 focus:bg-white transition-all duration-200"
                                >
                            </div>
                            @error('email')
                                <p class="text-xs text-rose-600 mt-1 font-medium">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Passwords Grid (2 columns on tablet/desktop, 1 col on mobile) -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3.5">
                            
                            <!-- Password -->
                            <div>
                                <label for="password" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1">
                                    Password <span class="text-rose-500">*</span>
                                </label>
                                <div class="relative rounded-2xl shadow-sm">
                                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
                                        </svg>
                                    </div>
                                    <input 
                                        type="password" 
                                        name="password" 
                                        id="password" 
                                        required 
                                        autocomplete="new-password"
                                        placeholder="Min. 6 chars"
                                        class="w-full pl-10 pr-10 py-2.5 sm:py-3 text-sm rounded-2xl bg-slate-50 border @error('password') border-rose-300 ring-1 ring-rose-300 @else border-slate-200 @enderror text-slate-900 placeholder:text-slate-400 focus:outline-none focus:border-indigo-600 focus:ring-4 focus:ring-indigo-500/15 focus:bg-white transition-all duration-200"
                                    >
                                    <button 
                                        type="button" 
                                        id="togglePassword" 
                                        aria-label="Toggle password"
                                        class="absolute inset-y-0 right-0 pr-3 flex items-center text-slate-400 hover:text-slate-600 focus:outline-none cursor-pointer"
                                    >
                                        <svg id="eyeIcon" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                        <svg id="eyeOffIcon" class="w-4 h-4 hidden" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 001.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.45 10.45 0 0112 4.5c4.756 0 8.773 3.162 10.065 7.498a10.523 10.523 0 01-4.293 5.774M6.228 6.228L3 3m3.228 3.228l3.65 3.65m7.894 7.894L21 21m-3.228-3.228l-3.65-3.65m0 0a3 3 0 10-4.243-4.243m4.242 4.242L9.88 9.88" />
                                        </svg>
                                    </button>
                                </div>
                                @error('password')
                                    <p class="text-xs text-rose-600 mt-1 font-medium">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Confirm Password -->
                            <div>
                                <label for="password_confirmation" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1">
                                    Confirm Password <span class="text-rose-500">*</span>
                                </label>
                                <div class="relative rounded-2xl shadow-sm">
                                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z" />
                                        </svg>
                                    </div>
                                    <input 
                                        type="password" 
                                        name="password_confirmation" 
                                        id="password_confirmation" 
                                        required 
                                        autocomplete="new-password"
                                        placeholder="Repeat password"
                                        class="w-full pl-10 pr-10 py-2.5 sm:py-3 text-sm rounded-2xl bg-slate-50 border border-slate-200 text-slate-900 placeholder:text-slate-400 focus:outline-none focus:border-indigo-600 focus:ring-4 focus:ring-indigo-500/15 focus:bg-white transition-all duration-200"
                                    >
                                    <button 
                                        type="button" 
                                        id="toggleConfirmPassword" 
                                        aria-label="Toggle confirm password"
                                        class="absolute inset-y-0 right-0 pr-3 flex items-center text-slate-400 hover:text-slate-600 focus:outline-none cursor-pointer"
                                    >
                                        <svg id="confirmEyeIcon" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                        <svg id="confirmEyeOffIcon" class="w-4 h-4 hidden" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 001.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.45 10.45 0 0112 4.5c4.756 0 8.773 3.162 10.065 7.498a10.523 10.523 0 01-4.293 5.774M6.228 6.228L3 3m3.228 3.228l3.65 3.65m7.894 7.894L21 21m-3.228-3.228l-3.65-3.65m0 0a3 3 0 10-4.243-4.243m4.242 4.242L9.88 9.88" />
                                        </svg>
                                    </button>
                                </div>
                            </div>

                        </div>

                        <!-- Password strength & match feedback -->
                        <div class="space-y-1.5 pt-0.5">
                            <div class="flex items-center justify-between text-[11px] text-slate-500">
                                <span>Password Strength: <strong id="strengthLabel" class="text-slate-700">None</strong></span>
                                <span id="matchFeedback" class="hidden font-medium text-emerald-600">✓ Passwords match</span>
                            </div>
                            <div class="w-full bg-slate-100 rounded-full h-1.5 overflow-hidden">
                                <div id="strengthBar" class="h-full w-0 bg-slate-300 transition-all duration-300"></div>
                            </div>
                        </div>

                        <!-- Agreement checkbox -->
                        <div class="pt-1">
                            <label class="flex items-start gap-2.5 cursor-pointer select-none group">
                                <input 
                                    type="checkbox" 
                                    required 
                                    name="terms" 
                                    id="terms" 
                                    checked
                                    class="w-4 h-4 mt-0.5 rounded-md border-slate-300 text-indigo-600 focus:ring-indigo-500/20 cursor-pointer accent-indigo-600 shrink-0"
                                >
                                <span class="text-xs text-slate-600 leading-snug">
                                    I agree to the <a href="#" class="text-indigo-600 hover:underline font-semibold" onclick="alert('ShopNext Terms: You are agreeing to our fair commerce, privacy and service policies.'); return false;">Terms of Service</a> &amp; <a href="#" class="text-indigo-600 hover:underline font-semibold" onclick="alert('ShopNext Privacy Policy: Your data is protected by 256-bit encryption.'); return false;">Privacy Policy</a>.
                                </span>
                            </label>
                        </div>

                        <!-- Submit Button -->
                        <div class="pt-2">
                            <button 
                                type="submit" 
                                id="registerSubmitBtn"
                                class="w-full relative group overflow-hidden bg-gradient-to-r from-indigo-600 via-indigo-700 to-purple-600 hover:from-indigo-500 hover:to-purple-500 text-white font-bold py-3.5 px-6 rounded-2xl shadow-xl shadow-indigo-600/25 hover:shadow-indigo-600/35 active:scale-[0.99] transition-all duration-200 flex items-center justify-center gap-2 cursor-pointer"
                            >
                                <span class="text-sm sm:text-base tracking-wide">Create Free Account</span>
                                <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform duration-200" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                                </svg>
                            </button>
                        </div>

                    </form>

                    <!-- Bottom Sign In Callout -->
                    <p class="text-center text-xs sm:text-sm text-slate-600 mt-6 pt-4 border-t border-slate-100">
                        Already have an account? 
                        <a href="{{ route('login') }}" class="font-bold text-indigo-600 hover:text-indigo-800 transition underline underline-offset-4 decoration-indigo-300 hover:decoration-indigo-600">
                            Sign in here
                        </a>
                    </p>
                </div>
            </div>

            <!-- Trust badges -->
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
                    100% Free Registration
                </div>
                <div class="flex items-center gap-1.5">
                    <svg class="w-4 h-4 text-emerald-400" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    Instant Activation
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="relative z-10 py-4 text-center text-xs text-slate-400">
        &copy; {{ date('Y') }} ShopNext Inc. All rights reserved.
    </footer>

    <script>
        function selectRole(role) {
            const customerRadio = document.getElementById('role_customer');
            const sellerRadio = document.getElementById('role_seller');
            const cardCustomer = document.getElementById('cardCustomer');
            const cardSeller = document.getElementById('cardSeller');
            const customerIcon = document.querySelector('.check-icon-customer');
            const sellerIcon = document.querySelector('.check-icon-seller');

            if (role === 'customer') {
                customerRadio.checked = true;
                sellerRadio.checked = false;
                cardCustomer.classList.add('role-card-active');
                cardSeller.classList.remove('role-card-active');
                if (customerIcon) {
                    customerIcon.classList.add('text-indigo-600');
                    customerIcon.classList.remove('text-slate-300');
                }
                if (sellerIcon) {
                    sellerIcon.classList.remove('text-indigo-600');
                    sellerIcon.classList.add('text-slate-300');
                }
            } else {
                customerRadio.checked = false;
                sellerRadio.checked = true;
                cardCustomer.classList.remove('role-card-active');
                cardSeller.classList.add('role-card-active');
                if (customerIcon) {
                    customerIcon.classList.remove('text-indigo-600');
                    customerIcon.classList.add('text-slate-300');
                }
                if (sellerIcon) {
                    sellerIcon.classList.add('text-indigo-600');
                    sellerIcon.classList.remove('text-slate-300');
                }
            }
        }

        // Setup password show/hide
        function setupToggle(toggleId, inputId, eyeId, eyeOffId) {
            const btn = document.getElementById(toggleId);
            const input = document.getElementById(inputId);
            const eye = document.getElementById(eyeId);
            const eyeOff = document.getElementById(eyeOffId);
            if (btn && input && eye && eyeOff) {
                btn.addEventListener('click', function() {
                    const isPass = input.type === 'password';
                    input.type = isPass ? 'text' : 'password';
                    eye.classList.toggle('hidden', isPass);
                    eyeOff.classList.toggle('hidden', !isPass);
                });
            }
        }

        setupToggle('togglePassword', 'password', 'eyeIcon', 'eyeOffIcon');
        setupToggle('toggleConfirmPassword', 'password_confirmation', 'confirmEyeIcon', 'confirmEyeOffIcon');

        // Real-time password strength and match check
        const passInput = document.getElementById('password');
        const confirmPassInput = document.getElementById('password_confirmation');
        const strengthBar = document.getElementById('strengthBar');
        const strengthLabel = document.getElementById('strengthLabel');
        const matchFeedback = document.getElementById('matchFeedback');

        function evaluatePassword() {
            const val = passInput ? passInput.value : '';
            const confirmVal = confirmPassInput ? confirmPassInput.value : '';

            let score = 0;
            if (val.length >= 6) score++;
            if (val.length >= 8) score++;
            if (/[A-Z]/.test(val) && /[a-z]/.test(val)) score++;
            if (/\d/.test(val) || /[^A-Za-z0-9]/.test(val)) score++;

            if (!val) {
                strengthBar.style.width = '0%';
                strengthBar.className = 'h-full transition-all duration-300 bg-slate-300';
                strengthLabel.textContent = 'None';
                strengthLabel.className = 'text-slate-500';
            } else if (score <= 1) {
                strengthBar.style.width = '25%';
                strengthBar.className = 'h-full transition-all duration-300 bg-rose-500';
                strengthLabel.textContent = 'Weak (min 6 chars)';
                strengthLabel.className = 'text-rose-600 font-bold';
            } else if (score === 2) {
                strengthBar.style.width = '50%';
                strengthBar.className = 'h-full transition-all duration-300 bg-amber-500';
                strengthLabel.textContent = 'Fair';
                strengthLabel.className = 'text-amber-600 font-bold';
            } else if (score === 3) {
                strengthBar.style.width = '75%';
                strengthBar.className = 'h-full transition-all duration-300 bg-blue-500';
                strengthLabel.textContent = 'Good';
                strengthLabel.className = 'text-blue-600 font-bold';
            } else {
                strengthBar.style.width = '100%';
                strengthBar.className = 'h-full transition-all duration-300 bg-emerald-500';
                strengthLabel.textContent = 'Strong';
                strengthLabel.className = 'text-emerald-600 font-bold';
            }

            if (confirmVal && val === confirmVal) {
                matchFeedback.classList.remove('hidden');
            } else {
                matchFeedback.classList.add('hidden');
            }
        }

        if (passInput) passInput.addEventListener('input', evaluatePassword);
        if (confirmPassInput) confirmPassInput.addEventListener('input', evaluatePassword);
    </script>
</body>
</html>