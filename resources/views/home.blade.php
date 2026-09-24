<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MediCare24 — Find Doctors, Book Appointments &amp; Consult Online</title>

    {{--
        This file assumes a standard Laravel Breeze + Vite + Tailwind setup, where
        resources/css/app.css already contains the @tailwind base/components/utilities
        directives, and resources/js/app.js already boots Alpine.js (Breeze's default).
        If your project doesn't have Alpine yet, add:
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@500;600;700;800&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">

    <style>
        body { font-family: 'Inter', sans-serif; }
        .font-display { font-family: 'Plus Jakarta Sans', sans-serif; }
        .scrollbar-hide::-webkit-scrollbar { display: none; }
        .scrollbar-hide { -ms-overflow-style: none; scrollbar-width: none; }
    </style>
</head>
<body class="bg-white text-slate-900 antialiased" x-data="{ mobileOpen: false }" x-data="{ showAuthModal: false }">

    {{-- ============================================================ --}}
    {{-- 1. STICKY NAVIGATION                                          --}}
    {{-- ============================================================ --}}
    <header class="sticky top-0 z-50 bg-white/90 backdrop-blur-md border-b border-slate-100">
    <nav class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between gap-8">

        {{-- Logo --}}
        <a href="{{ url('/') }}" class="flex items-center gap-2.5 shrink-0">
            <span class="w-9 h-9 rounded-xl bg-gradient-to-br from-emerald-600 to-sky-400 flex items-center justify-center">
                <svg class="w-5 h-5 text-white" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 2C9 2 6.5 4.5 6.5 7.5C6.5 11 9 13 12 16C15 13 17.5 11 17.5 7.5C17.5 4.5 15 2 12 2Z" fill="currentColor"/>
                    <path d="M4 15C4 19 7.5 22 12 22C16.5 22 20 19 20 15" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/>
                </svg>
            </span>
            <span class="font-display font-bold text-lg tracking-tight">
                Medi<span class="text-sky-400">Care</span>24
            </span>
        </a>

        {{-- Main links (desktop) --}}
        <ul class="hidden md:flex items-center gap-8 flex-1">
            <li><a href="#" class="text-sm font-medium text-slate-700 hover:text-emerald-600 transition-colors">Find Doctors</a></li>
            <li><a href="#" class="text-sm font-medium text-slate-700 hover:text-emerald-600 transition-colors">Video Consult</a></li>
            <li><a href="#" class="text-sm font-medium text-slate-700 hover:text-emerald-600 transition-colors">Lab Tests</a></li>
            <li><a href="#" class="text-sm font-medium text-slate-700 hover:text-emerald-600 transition-colors">Surgeries</a></li>
            <li>
                <a href="#" class="inline-flex items-center gap-1.5 text-sm font-medium text-slate-700 hover:text-emerald-600 transition-colors">
                    AI Chat Bot
                    <span class="relative inline-flex items-center">
                        <span class="absolute inline-flex h-full w-full rounded-full bg-sky-300 opacity-60 animate-ping"></span>
                        <span class="relative rounded-full bg-gradient-to-r from-emerald-600 to-sky-400 text-white text-[10px] font-bold px-1.5 py-0.5 tracking-wide">NEW</span>
                    </span>
                </a>
            </li>
        </ul>

        {{-- Right utilities (desktop) --}}
        <div class="hidden md:flex items-center gap-6 shrink-0">
            <a href="#" class="hidden lg:inline text-xs font-medium text-slate-400 hover:text-slate-600 transition-colors">For Providers</a>
            <a href="#" class="hidden lg:inline text-xs font-medium text-slate-400 hover:text-slate-600 transition-colors">Security &amp; Help</a>

            {{-- LOGGED OUT (GUEST) --}}
            @guest
                <div class="flex items-center gap-2">
                    <a href="{{ route('login') }}" class="text-sm font-semibold text-slate-600 hover:text-emerald-600 px-4 py-2 rounded-full hover:bg-emerald-50 transition-all">
                        Sign In
                    </a>
                    <a href="{{ route('register') }}" class="bg-emerald-600 hover:bg-emerald-700 text-white px-5 py-2 rounded-full font-medium shadow-sm hover:shadow-md hover:shadow-emerald-500/20 text-sm transition-all">
                        Sign Up
                    </a>
                </div>
            @endguest

            {{-- LOGGED IN (AUTH USER) --}}
            @auth
                <div class="flex items-center gap-4 bg-slate-50 border border-slate-200/80 px-3.5 py-1.5 rounded-full">
                    <div class="flex items-center gap-2">
                        <span class="w-7 h-7 rounded-full bg-gradient-to-br from-emerald-600 to-sky-400 text-white font-bold flex items-center justify-center text-xs shadow-sm">
                            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                        </span>
                        <span class="text-sm font-semibold text-slate-800">
                            {{ Auth::user()->name }}
                        </span>
                    </div>

                    <div class="w-px h-4 bg-slate-200"></div>

                    {{-- Logout Action --}}
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="text-xs font-semibold text-slate-500 hover:text-red-600 transition-colors">
                            Log Out
                        </button>
                    </form>
                </div>
            @endauth
        </div>

        {{-- Mobile hamburger --}}
        <button @click="mobileOpen = !mobileOpen" class="md:hidden p-2 -mr-2 text-slate-700" aria-label="Toggle menu">
            <svg x-show="!mobileOpen" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
            <svg x-show="mobileOpen" x-cloak class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
        </button>
    </nav>

    {{-- Mobile menu panel --}}
    <div x-show="mobileOpen" x-cloak x-transition class="md:hidden border-t border-slate-100 bg-white px-6 py-5 space-y-4">
        <a href="#" class="block text-sm font-medium text-slate-700">Find Doctors</a>
        <a href="#" class="block text-sm font-medium text-slate-700">Video Consult</a>
        <a href="#" class="block text-sm font-medium text-slate-700">Lab Tests</a>
        <a href="#" class="block text-sm font-medium text-slate-700">Surgeries</a>
        <a href="#" class="block text-sm font-medium text-slate-700">AI Chat Bot</a>
        <div class="pt-3 border-t border-slate-100 flex items-center justify-between">
            <a href="#" class="text-xs font-medium text-slate-400">For Providers</a>
            <a href="#" class="text-xs font-medium text-slate-400">Security &amp; Help</a>
        </div>

        {{-- Mobile Guest vs Auth --}}
        @guest
            <div class="flex gap-3 pt-1">
                <a href="{{ route('login') }}" class="flex-1 text-center border border-slate-200 text-slate-700 hover:border-emerald-400 hover:text-emerald-600 text-sm font-semibold px-4 py-2.5 rounded-full transition-all">
                    Sign In
                </a>
                <a href="{{ route('register') }}" class="flex-1 text-center bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-semibold px-4 py-2.5 rounded-full transition-all">
                    Sign Up
                </a>
            </div>
        @endguest

        @auth
            <div class="pt-2 border-t border-slate-100 flex items-center justify-between">
                <div class="flex items-center gap-2.5">
                    <span class="w-8 h-8 rounded-full bg-gradient-to-br from-emerald-600 to-sky-400 text-white font-bold flex items-center justify-center text-xs">
                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                    </span>
                    <span class="text-sm font-bold text-slate-800">{{ Auth::user()->name }}</span>
                </div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="text-xs font-semibold text-red-500 hover:text-red-700 py-1 px-3 rounded-lg bg-red-50">
                        Log Out
                    </button>
                </form>
            </div>
        @endauth
    </div>
</header>

    {{-- ============================================================ --}}
    {{-- 2. HERO + SEARCH BAR MODULE                                   --}}
    {{-- ============================================================ --}}
    {{-- PRIMARY token: from-emerald-50/60 (was from-blue-50/60) --}}
    <section class="relative overflow-hidden bg-gradient-to-b from-emerald-50/60 via-white to-white pt-16 pb-14 px-6">
        <div class="max-w-3xl mx-auto text-center mb-10">
            <span class="inline-flex items-center gap-2 bg-white border border-slate-200 shadow-sm rounded-full px-4 py-1.5 text-xs font-semibold text-slate-500">
                {{-- ACCENT token: bg-sky-400 (was bg-teal-500) --}}
                <span class="w-1.5 h-1.5 rounded-full bg-sky-400"></span>
                Trusted by 5,000+ clinics worldwide
            </span>
            <h1 class="font-display mt-5 text-3xl sm:text-4xl md:text-5xl font-extrabold tracking-tight text-slate-900 leading-[1.15]">
                {{-- PRIMARY token: text-emerald-600 (was text-blue-600) --}}
                Find &amp; book the <span class="text-emerald-600">right doctor</span>, instantly
            </h1>
            <p class="mt-4 text-slate-500 text-base sm:text-lg max-w-xl mx-auto">
                Search verified doctors, book appointments, and manage your family's health — all in one place.
            </p>
        </div>

        {{-- Floating search card --}}
        {{-- PRIMARY token: shadow-emerald-500/5 (was shadow-blue-500/5) --}}
        <div class="max-w-5xl mx-auto shadow-xl shadow-emerald-500/5 rounded-2xl border border-slate-200 bg-white p-2 sm:p-3">
            <div class="flex flex-col sm:flex-row items-stretch">

                {{-- Location --}}
                <button type="button" class="flex items-center gap-2.5 px-4 py-3 sm:py-2 sm:w-48 shrink-0 rounded-xl hover:bg-slate-50 transition-colors">
                    <svg class="w-5 h-5 text-slate-400 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6" d="M17.657 16.657L13.414 20.9a2 2 0 01-2.828 0l-4.243-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                    <span class="text-sm font-medium text-slate-700 truncate">Sri Lanka</span>
                    <svg class="w-4 h-4 text-slate-400 ml-auto shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                </button>

                <div class="hidden sm:block w-px bg-slate-200 my-2"></div>

                {{-- Search --}}
                <div class="flex items-center gap-2.5 px-4 py-3 sm:py-2 flex-1 min-w-0">
                    <svg class="w-5 h-5 text-slate-400 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6" d="M21 21l-4.35-4.35M11 19a8 8 0 100-16 8 8 0 000 16z"/></svg>
                    <input type="text" placeholder="Search doctors, clinics, specialties, or symptoms…"
                           class="w-full text-sm text-slate-700 placeholder-slate-400 border-none focus:ring-0 p-0 bg-transparent">
                </div>

                {{-- Search button --}}
                {{-- PRIMARY token: bg-emerald-600 hover:bg-emerald-700 (was bg-blue-600 hover:bg-blue-700) --}}
                <button type="button" class="bg-emerald-600 hover:bg-emerald-700 text-white rounded-xl px-6 py-3 font-semibold shadow-md flex items-center justify-center gap-2 m-1 transition-colors">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35M11 19a8 8 0 100-16 8 8 0 000 16z"/></svg>
                    Search
                </button>
            </div>
        </div>

        {{-- ============================================================ --}}
        {{-- 3. FOUR CORE HEALTHCARE SERVICES                             --}}
        {{-- ============================================================ --}}
        <div class="max-w-5xl mx-auto mt-12 grid grid-cols-2 md:grid-cols-4 gap-4 sm:gap-6">

            {{-- Card 1: Video Consult — PRIMARY (emerald) --}}
            {{-- PRIMARY token: hover:border-emerald-200 (was hover:border-blue-200) --}}
            <a href="#" class="group bg-white rounded-2xl border border-slate-100 p-5 sm:p-6 hover:-translate-y-1.5 hover:shadow-xl hover:border-emerald-200 transition-all duration-300">
                {{-- PRIMARY token: bg-emerald-50 text-emerald-600 group-hover:bg-emerald-100 (was bg-blue-50 text-blue-600 group-hover:bg-blue-100) --}}
                <span class="w-12 h-12 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center mb-4 group-hover:bg-emerald-100 transition-colors">
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"/></svg>
                </span>
                <h3 class="font-display font-bold text-sm sm:text-base text-slate-900">Online Video Consultation</h3>
                <p class="text-xs sm:text-sm text-slate-500 mt-1.5 leading-relaxed">Connect with specialists in 60 seconds</p>
            </a>

            {{-- Card 2: Book Appointment — ACCENT (sky) --}}
            {{-- PRIMARY token: hover:border-emerald-200 (was hover:border-blue-200) --}}
            <a href="#" class="group bg-white rounded-2xl border border-slate-100 p-5 sm:p-6 hover:-translate-y-1.5 hover:shadow-xl hover:border-emerald-200 transition-all duration-300">
                {{-- ACCENT token: bg-sky-50 text-sky-500 group-hover:bg-sky-100 (was bg-teal-50 text-teal-600 group-hover:bg-teal-100) --}}
                <span class="w-12 h-12 rounded-xl bg-sky-50 text-sky-500 flex items-center justify-center mb-4 group-hover:bg-sky-100 transition-colors">
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6" d="M9.5 15.5l1.5 1.5 3-3"/></svg>
                </span>
                <h3 class="font-display font-bold text-sm sm:text-base text-slate-900">Book Appointment</h3>
                <p class="text-xs sm:text-sm text-slate-500 mt-1.5 leading-relaxed">Zero wait-time in-clinic bookings</p>
            </a>

            {{-- Card 3: Lab Tests — amber (unchanged, harmonizes with emerald/sky palette) --}}
            <a href="#" class="group bg-white rounded-2xl border border-slate-100 p-5 sm:p-6 hover:-translate-y-1.5 hover:shadow-xl hover:border-emerald-200 transition-all duration-300">
                <span class="w-12 h-12 rounded-xl bg-amber-50 text-amber-600 flex items-center justify-center mb-4 group-hover:bg-amber-100 transition-colors">
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6" d="M9 3h6M10 3v6.5L4.5 18a1.8 1.8 0 001.5 2.8h12a1.8 1.8 0 001.5-2.8L14 9.5V3"/></svg>
                </span>
                <h3 class="font-display font-bold text-sm sm:text-base text-slate-900">Lab Tests</h3>
                <p class="text-xs sm:text-sm text-slate-500 mt-1.5 leading-relaxed">Sample collection at home</p>
            </a>

            {{-- Card 4: AI Chat Bot — violet (unchanged, harmonizes with emerald/sky palette) --}}
            <a href="#" class="group bg-white rounded-2xl border border-slate-100 p-5 sm:p-6 hover:-translate-y-1.5 hover:shadow-xl hover:border-emerald-200 transition-all duration-300">
                <span class="w-12 h-12 rounded-xl bg-violet-50 text-violet-600 flex items-center justify-center mb-4 group-hover:bg-violet-100 transition-colors">
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.86 9.86 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>
                </span>
                <h3 class="font-display font-bold text-sm sm:text-base text-slate-900">AI Chat Bot</h3>
                <p class="text-xs sm:text-sm text-slate-500 mt-1.5 leading-relaxed">Instant AI health assessment</p>
            </a>
        </div>
    </section>

    {{-- ============================================================ --}}
    {{-- 4. CONSULT TOP DOCTORS + SYMPTOMS ROW                         --}}
    {{-- ============================================================ --}}
    <section class="bg-slate-50/70 py-16 px-6">
        <div class="max-w-6xl mx-auto">
            <div class="flex flex-col sm:flex-row sm:items-end sm:justify-between gap-4 mb-10">
                <div>
                    <h2 class="font-display text-2xl md:text-3xl font-extrabold text-slate-900">Consult top doctors online for any health concern</h2>
                    <p class="text-slate-500 mt-2 text-sm sm:text-base">Private online consultations with verified doctors across all specialties</p>
                </div>
                {{-- PRIMARY token: border-emerald-600 text-emerald-600 hover:bg-emerald-600 (was border-blue-600 text-blue-600 hover:bg-blue-600) --}}
                <a href="#" class="shrink-0 inline-flex items-center justify-center border-2 border-emerald-600 text-emerald-600 hover:bg-emerald-600 hover:text-white font-semibold text-sm px-6 py-2.5 rounded-full transition-colors">
                    View All Specialities
                </a>
            </div>

            <div class="flex gap-6 overflow-x-auto scrollbar-hide pb-2 -mx-1 px-1">
                @php
                    $symptoms = [
                        ['name' => 'Pregnancy',                  'bg' => 'bg-rose-100',   'img' => 'https://images.unsplash.com/photo-1519689680058-324335c77eba?q=80&w=200&auto=format&fit=crop'],
                        ['name' => 'Acne, pimples or skin issues','bg' => 'bg-amber-100',  'img' => 'https://images.unsplash.com/photo-1517841905240-472988babdf9?q=80&w=200&auto=format&fit=crop'],
                        ['name' => 'Joint pain issues',           'bg' => 'bg-emerald-100','img' => 'https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?q=80&w=200&auto=format&fit=crop'],
                        ['name' => 'Cold, cough or fever',        'bg' => 'bg-sky-100',    'img' => 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?q=80&w=200&auto=format&fit=crop'],
                        ['name' => 'Child not feeding well',      'bg' => 'bg-lime-100',   'img' => 'https://images.unsplash.com/photo-1503919545889-aef636e10ad4?q=80&w=200&auto=format&fit=crop'],
                        ['name' => 'Depression or anxiety',       'bg' => 'bg-violet-100', 'img' => 'https://images.unsplash.com/photo-1544005313-94ddf0286df2?q=80&w=200&auto=format&fit=crop'],
                    ];
                @endphp

                @foreach ($symptoms as $s)
                    <a href="#" class="group shrink-0 w-28 flex flex-col items-center text-center gap-2.5">
                        {{-- PRIMARY token: group-hover:ring-emerald-100 (was group-hover:ring-blue-100) --}}
                        <span class="{{ $s['bg'] }} p-1.5 rounded-full ring-2 ring-white group-hover:ring-4 group-hover:ring-emerald-100 transition-all duration-200">
                            <img src="{{ $s['img'] }}" alt="{{ $s['name'] }}" class="w-16 h-16 rounded-full object-cover">
                        </span>
                        <span class="text-xs font-semibold text-slate-800 leading-tight">{{ $s['name'] }}</span>
                        {{-- ACCENT token: text-sky-500 (was text-teal-600) --}}
                        <span class="text-[11px] font-bold text-sky-500 uppercase tracking-wide inline-flex items-center gap-0.5">
                            Consult now
                            <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                        </span>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ============================================================ --}}
    {{-- 5. BOOK IN-CLINIC CONSULTATION — SPECIALTY CARDS              --}}
    {{-- ============================================================ --}}
    <section class="py-16 px-6">
        <div class="max-w-6xl mx-auto">
            <div class="flex flex-col sm:flex-row sm:items-end sm:justify-between gap-4 mb-10">
                <div>
                    <h2 class="font-display text-2xl md:text-3xl font-extrabold text-slate-900">Book an appointment for an in-clinic consultation</h2>
                    <p class="text-slate-500 mt-2 text-sm sm:text-base">Find experienced doctors across all specialties</p>
                </div>
                {{-- PRIMARY token: text-emerald-600 hover:text-emerald-700 (was text-blue-600 hover:text-blue-700) --}}
                <a href="#" class="shrink-0 inline-flex items-center gap-1.5 text-emerald-600 font-semibold text-sm hover:text-emerald-700 transition-colors">
                    View all specialties
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </a>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">

                {{-- Specialty 1: Dentist — PRIMARY (emerald, was blue) --}}
                <div class="bg-white rounded-2xl border border-slate-100 p-6 hover:-translate-y-1 hover:shadow-lg transition-all duration-300">
                    {{-- PRIMARY token: from-emerald-50 to-emerald-100 text-emerald-600 (was from-blue-50 to-blue-100 text-blue-600) --}}
                    <span class="w-12 h-12 rounded-xl bg-gradient-to-br from-emerald-50 to-emerald-100 text-emerald-600 flex items-center justify-center mb-5">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6" d="M9 3C9 3 8 5 8 8c0 3 2 4 4 4s4-1 4-4c0-3-1-5-1-5M6 21c0-5 2.5-8 6-8s6 3 6 8"/></svg>
                    </span>
                    <h3 class="font-display font-bold text-slate-900">Dentist</h3>
                    <p class="text-sm text-slate-500 mt-1.5 leading-relaxed">Teething troubles? Schedule a dental checkup</p>
                </div>

                {{-- Specialty 2: Gynecologist — pink (unchanged, harmonizes) --}}
                <div class="bg-white rounded-2xl border border-slate-100 p-6 hover:-translate-y-1 hover:shadow-lg transition-all duration-300">
                    <span class="w-12 h-12 rounded-xl bg-gradient-to-br from-pink-50 to-pink-100 text-pink-600 flex items-center justify-center mb-5">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><circle cx="12" cy="8" r="4" stroke-width="1.6"/><path stroke-linecap="round" stroke-width="1.6" d="M5 21c0-4 3-7 7-7s7 3 7 7"/></svg>
                    </span>
                    <h3 class="font-display font-bold text-slate-900">Gynecologist / Obstetrician</h3>
                    <p class="text-sm text-slate-500 mt-1.5 leading-relaxed">Explore women's health, pregnancy &amp; fertility treatments</p>
                </div>

                {{-- Specialty 3: Dietitian — emerald (already in new palette, unchanged) --}}
                <div class="bg-white rounded-2xl border border-slate-100 p-6 hover:-translate-y-1 hover:shadow-lg transition-all duration-300">
                    <span class="w-12 h-12 rounded-xl bg-gradient-to-br from-emerald-50 to-emerald-100 text-emerald-600 flex items-center justify-center mb-5">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6" d="M4 12h4l2-6 4 12 2-6h4"/></svg>
                    </span>
                    <h3 class="font-display font-bold text-slate-900">Dietitian / Nutrition</h3>
                    <p class="text-sm text-slate-500 mt-1.5 leading-relaxed">Guidance on healthy eating, weight management &amp; sports nutrition</p>
                </div>

                {{-- Specialty 4: Physiotherapist — amber (unchanged, harmonizes) --}}
                <div class="bg-white rounded-2xl border border-slate-100 p-6 hover:-translate-y-1 hover:shadow-lg transition-all duration-300">
                    <span class="w-12 h-12 rounded-xl bg-gradient-to-br from-amber-50 to-amber-100 text-amber-600 flex items-center justify-center mb-5">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6" d="M13 3L5 14h6l-1 7 8-11h-6l1-7z"/></svg>
                    </span>
                    <h3 class="font-display font-bold text-slate-900">Physiotherapist</h3>
                    <p class="text-sm text-slate-500 mt-1.5 leading-relaxed">Overcome muscle pain, joint stiffness &amp; post-op recovery</p>
                </div>
            </div>
        </div>
    </section>

    {{-- ============================================================ --}}
    {{-- 6. FOOTER                                                     --}}
    {{-- ============================================================ --}}
    <footer class="bg-slate-900 text-slate-400 pt-14 pb-8 px-6">
        <div class="max-w-6xl mx-auto">

            {{-- Emergency banner — NEVER recolor safety/alert elements --}}
            <div class="flex items-center gap-3 bg-red-500/10 border border-red-500/20 text-red-300 rounded-xl px-4 py-3 text-sm font-medium mb-12">
                <svg class="w-5 h-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 9v3.75m0 3.75h.008M12 3l9 16.5H3L12 3z"/></svg>
                In case of medical emergency, dial <span class="font-bold text-red-200">1990</span> immediately.
            </div>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-10 mb-12">
                <div class="col-span-2 md:col-span-1">
                    <div class="flex items-center gap-2.5 mb-4">
                        {{-- PRIMARY+ACCENT token: from-emerald-600 to-sky-400 (was from-blue-600 to-teal-500) --}}
                        <span class="w-8 h-8 rounded-lg bg-gradient-to-br from-emerald-600 to-sky-400 flex items-center justify-center">
                            <svg class="w-4 h-4 text-white" viewBox="0 0 24 24" fill="none"><path d="M12 2C9 2 6.5 4.5 6.5 7.5C6.5 11 9 13 12 16C15 13 17.5 11 17.5 7.5C17.5 4.5 15 2 12 2Z" fill="currentColor"/></svg>
                        </span>
                        <span class="font-display font-bold text-white text-base">MediCare24</span>
                    </div>
                    <p class="text-sm leading-relaxed">Medical appointment scheduling software for doctors &amp; clinics — HIPAA-ready and free forever.</p>
                </div>

                <div>
                    <h4 class="text-white font-semibold text-sm mb-4">For Patients</h4>
                    <ul class="space-y-2.5 text-sm">
                        <li><a href="#" class="hover:text-white transition-colors">Find Doctors</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Video Consult</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Lab Tests</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Surgeries</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="text-white font-semibold text-sm mb-4">For Providers</h4>
                    <ul class="space-y-2.5 text-sm">
                        <li><a href="#" class="hover:text-white transition-colors">List Your Practice</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Clinic Dashboard</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">API &amp; Integrations</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="text-white font-semibold text-sm mb-4">Company</h4>
                    <ul class="space-y-2.5 text-sm">
                        <li><a href="#" class="hover:text-white transition-colors">Security &amp; Help</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Privacy Policy</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Contact Us</a></li>
                    </ul>
                </div>
            </div>

            <div class="border-t border-slate-800 pt-6 flex flex-col sm:flex-row items-center justify-between gap-3 text-xs">
                <span>&copy; {{ date('Y') }} MediCare24. All rights reserved.</span>
                <span>Made for doctors &amp; clinics worldwide.</span>
            </div>
        </div>
    </footer>

</body>
</html>
