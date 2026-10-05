<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Find Doctors — MediCare24</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@500;600;700;800&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">

    <style>
        body { font-family: 'Inter', sans-serif; }
        .font-display { font-family: 'Plus Jakarta Sans', sans-serif; }
        [x-cloak] { display: none !important; }
        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
    </style>
</head>
<body class="bg-white text-slate-900 antialiased" x-data="{ mobileOpen: false, showAuthModal: false }">

    {{-- ============================================================ --}}
    {{-- STICKY NAVIGATION (matches home.blade.php)                   --}}
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
            <li><a href="{{ route('doctors.index') }}" class="text-sm font-semibold text-emerald-600 transition-colors">Find Doctors</a></li>
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

            @auth
                <div class="flex items-center gap-4 bg-slate-50 border border-slate-200/80 px-3.5 py-1.5 rounded-full">
                    <div class="flex items-center gap-2">
                        <span class="w-7 h-7 rounded-full bg-gradient-to-br from-emerald-600 to-sky-400 text-white font-bold flex items-center justify-center text-xs shadow-sm">
                            {{ strtoupper(substr(Auth::user()?->name ?? 'U', 0, 1)) }}
                        </span>
                        <span class="text-sm font-semibold text-slate-800">
                            {{ Auth::user()?->name }}
                        </span>
                    </div>
                    <div class="w-px h-4 bg-slate-200"></div>
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
        <a href="{{ route('doctors.index') }}" class="block text-sm font-semibold text-emerald-600">Find Doctors</a>
        <a href="#" class="block text-sm font-medium text-slate-700">Video Consult</a>
        <a href="#" class="block text-sm font-medium text-slate-700">Lab Tests</a>
        <a href="#" class="block text-sm font-medium text-slate-700">Surgeries</a>
        <a href="#" class="block text-sm font-medium text-slate-700">AI Chat Bot</a>
        <div class="pt-3 border-t border-slate-100 flex items-center justify-between">
            <a href="#" class="text-xs font-medium text-slate-400">For Providers</a>
            <a href="#" class="text-xs font-medium text-slate-400">Security &amp; Help</a>
        </div>

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
                        {{ strtoupper(substr(Auth::user()?->name ?? 'U', 0, 1)) }}
                    </span>
                    <span class="text-sm font-bold text-slate-800">{{ Auth::user()?->name }}</span>
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
    {{-- HERO HEADER                                                   --}}
    {{-- ============================================================ --}}
    <section class="relative overflow-hidden bg-gradient-to-b from-emerald-50/60 via-white to-white pt-14 pb-12 px-6">

        {{-- Decorative blobs --}}
        <div class="pointer-events-none absolute -top-24 -right-24 w-96 h-96 rounded-full bg-emerald-100/40 blur-3xl"></div>
        <div class="pointer-events-none absolute -bottom-16 -left-16 w-72 h-72 rounded-full bg-sky-100/40 blur-3xl"></div>

        <div class="max-w-3xl mx-auto text-center relative">
            <span class="inline-flex items-center gap-2 bg-white border border-slate-200 shadow-sm rounded-full px-4 py-1.5 text-xs font-semibold text-slate-500">
                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                {{ $doctors->total() }} verified doctors available
            </span>
            <h1 class="font-display mt-5 text-3xl sm:text-4xl md:text-5xl font-extrabold tracking-tight text-slate-900 leading-[1.15]">
                Find the <span class="text-emerald-600">right specialist</span>,<br class="hidden sm:block"> book instantly
            </h1>
            <p class="mt-4 text-slate-500 text-base sm:text-lg max-w-xl mx-auto">
                Search verified doctors by name, specialty, or available days — and secure your appointment in minutes.
            </p>
        </div>
    </section>

    {{-- ============================================================ --}}
    {{-- FILTER FORM                                                   --}}
    {{-- ============================================================ --}}
    <section class="max-w-7xl mx-auto px-6 -mt-2 mb-10">
        <form method="GET" action="{{ route('doctors.index') }}"
              class="bg-white rounded-2xl border border-slate-200 shadow-xl shadow-emerald-500/5 p-3">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-[1fr_220px_200px_auto] gap-2">

                {{-- Keyword search --}}
                <div class="relative">
                    <svg class="w-[17px] h-[17px] absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-400 pointer-events-none" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6" d="M21 21l-4.35-4.35M11 19a8 8 0 100-16 8 8 0 000 16z"/>
                    </svg>
                    <input
                        type="text"
                        name="query"
                        value="{{ request('query') }}"
                        placeholder="Doctor name, specialty or symptom…"
                        class="w-full pl-10 pr-4 py-3 text-sm rounded-xl border border-slate-200 bg-slate-50/50 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-emerald-500/30 focus:border-emerald-500 focus:bg-white transition-all"
                    >
                </div>

                {{-- Specialty --}}
                <div class="relative">
                    <svg class="w-4 h-4 text-slate-400 absolute left-3.5 top-1/2 -translate-y-1/2 pointer-events-none" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                    </svg>
                    <select name="specialty"
                            class="w-full appearance-none pl-10 pr-9 py-3 text-sm rounded-xl border border-slate-200 bg-slate-50/50 text-slate-700 focus:outline-none focus:ring-2 focus:ring-emerald-500/30 focus:border-emerald-500 focus:bg-white transition-all">
                        <option value="">All Specialties</option>
                        @foreach ($specializations as $spec)
                            <option value="{{ $spec }}" @selected(request('specialty') == $spec)>{{ $spec }}</option>
                        @endforeach
                    </select>
                    <svg class="w-4 h-4 text-slate-400 absolute right-3.5 top-1/2 -translate-y-1/2 pointer-events-none" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </div>

                {{-- Day of week --}}
                <div class="relative">
                    <svg class="w-4 h-4 text-slate-400 absolute left-3.5 top-1/2 -translate-y-1/2 pointer-events-none" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                    <select name="day"
                            class="w-full appearance-none pl-10 pr-9 py-3 text-sm rounded-xl border border-slate-200 bg-slate-50/50 text-slate-700 focus:outline-none focus:ring-2 focus:ring-emerald-500/30 focus:border-emerald-500 focus:bg-white transition-all">
                        <option value="">Any Day</option>
                        @foreach (['Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday'] as $d)
                            <option value="{{ $d }}" @selected(request('day') == $d)>{{ $d }}</option>
                        @endforeach
                    </select>
                    <svg class="w-4 h-4 text-slate-400 absolute right-3.5 top-1/2 -translate-y-1/2 pointer-events-none" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </div>

                {{-- Actions --}}
                <div class="flex items-center gap-2">
                    <button type="submit"
                            class="flex-1 lg:flex-none bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-semibold px-6 py-3 rounded-xl shadow-sm hover:shadow-md hover:shadow-emerald-600/20 transition-all whitespace-nowrap flex items-center justify-center gap-2">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35M11 19a8 8 0 100-16 8 8 0 000 16z"/></svg>
                        Search
                    </button>
                    @if (request()->filled('query') || request()->filled('specialty') || request()->filled('day'))
                        <a href="{{ route('doctors.index') }}"
                           class="inline-flex items-center gap-1 text-sm font-semibold text-slate-400 hover:text-slate-600 px-3 py-3 whitespace-nowrap transition-colors">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                            Clear
                        </a>
                    @endif
                </div>
            </div>
        </form>

        {{-- Active filter pills --}}
        @if (request()->filled('query') || request()->filled('specialty') || request()->filled('day'))
            <div class="flex flex-wrap items-center gap-2 mt-3 px-1">
                <span class="text-xs font-medium text-slate-400">Active filters:</span>
                @if (request()->filled('query'))
                    <a href="{{ route('doctors.index', array_merge(request()->except('query'), [])) }}"
                       class="inline-flex items-center gap-1.5 bg-emerald-50 border border-emerald-200 text-emerald-700 text-xs font-semibold px-3 py-1 rounded-full hover:bg-emerald-100 transition-colors">
                        "{{ request('query') }}"
                        <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"/></svg>
                    </a>
                @endif
                @if (request()->filled('specialty'))
                    <a href="{{ route('doctors.index', array_merge(request()->except('specialty'), [])) }}"
                       class="inline-flex items-center gap-1.5 bg-sky-50 border border-sky-200 text-sky-700 text-xs font-semibold px-3 py-1 rounded-full hover:bg-sky-100 transition-colors">
                        {{ request('specialty') }}
                        <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"/></svg>
                    </a>
                @endif
                @if (request()->filled('day'))
                    <a href="{{ route('doctors.index', array_merge(request()->except('day'), [])) }}"
                       class="inline-flex items-center gap-1.5 bg-violet-50 border border-violet-200 text-violet-700 text-xs font-semibold px-3 py-1 rounded-full hover:bg-violet-100 transition-colors">
                        {{ request('day') }}
                        <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"/></svg>
                    </a>
                @endif
            </div>
        @endif
    </section>

    {{-- ============================================================ --}}
    {{-- RESULTS LABEL                                                 --}}
    {{-- ============================================================ --}}
    <div class="max-w-7xl mx-auto px-6 mb-5 flex items-center justify-between">
        <p class="text-sm text-slate-500">
            Showing <span class="font-semibold text-slate-800">{{ $doctors->firstItem() ?? 0 }}–{{ $doctors->lastItem() ?? 0 }}</span>
            of <span class="font-semibold text-slate-800">{{ $doctors->total() }}</span> doctors
        </p>
    </div>

    {{-- ============================================================ --}}
    {{-- DOCTOR GRID                                                   --}}
    {{-- ============================================================ --}}
    <section class="max-w-7xl mx-auto px-6 pb-20">
        @forelse ($doctors as $doctor)
            @if ($loop->first)
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @endif

            @php
                $initials = collect(explode(' ', $doctor->user?->name ?? 'Doctor'))
                    ->map(fn($n) => strtoupper(substr($n, 0, 1)))
                    ->take(2)
                    ->implode('');
                $hasSchedules = $doctor->schedules && $doctor->schedules->count();
            @endphp

            <div class="group flex flex-col bg-white rounded-2xl border border-slate-200 shadow-sm shadow-slate-200/50 p-6 hover:-translate-y-1.5 hover:shadow-xl hover:shadow-slate-200/70 hover:border-emerald-100 transition-all duration-300">

                {{-- Card header --}}
                <div class="flex items-start gap-4">
                    {{-- Avatar --}}
                    <div class="relative shrink-0">
                        <span class="w-16 h-16 rounded-2xl bg-gradient-to-br from-emerald-600 to-sky-400 text-white font-bold font-display flex items-center justify-center text-xl shadow-md shadow-emerald-500/20">
                            {{ $initials }}
                        </span>
                        {{-- Availability dot --}}
                        @if($hasSchedules)
                            <span class="absolute -bottom-1 -right-1 w-4 h-4 rounded-full bg-white flex items-center justify-center shadow-sm border border-white">
                                <span class="w-2.5 h-2.5 rounded-full bg-emerald-500"></span>
                            </span>
                        @endif
                    </div>

                    {{-- Name & specialty --}}
                    <div class="min-w-0 flex-1">
                        <h3 class="font-display font-bold text-slate-900 text-base leading-snug group-hover:text-emerald-700 transition-colors truncate">
                            Dr. {{ $doctor->user?->name ?? 'Doctor' }}
                        </h3>
                        <span class="inline-block mt-1.5 bg-emerald-50 text-emerald-700 text-xs font-semibold px-2.5 py-0.5 rounded-full border border-emerald-100">
                            {{ $doctor->specialization }}
                        </span>
                        <p class="text-xs text-slate-400 mt-1.5 truncate">
                            {{ $doctor->qualification }}
                        </p>
                    </div>
                </div>

                {{-- Divider --}}
                <div class="my-4 border-t border-slate-100"></div>

                {{-- Bio --}}
                @if ($doctor->bio)
                    <p class="text-sm text-slate-500 leading-relaxed line-clamp-2 mb-4">{{ $doctor->bio }}</p>
                @endif

                {{-- Schedule pills --}}
                @if ($hasSchedules)
                    <div class="flex flex-wrap gap-1.5 mb-4">
                        @foreach ($doctor->schedules as $schedule)
                            <span class="inline-flex items-center gap-1 bg-slate-50 border border-slate-100 text-slate-600 text-[11px] font-medium px-2.5 py-1 rounded-lg">
                                <svg class="w-3 h-3 text-slate-400 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                {{ Str::limit($schedule->day, 3, '') }}
                                {{ \Carbon\Carbon::parse($schedule->start_time)->format('h:i A') }}–{{ \Carbon\Carbon::parse($schedule->end_time)->format('h:i A') }}
                            </span>
                        @endforeach
                    </div>
                @else
                    <p class="text-xs text-slate-400 italic mb-4">No active schedule listed</p>
                @endif

                {{-- Footer: fee + CTA --}}
                <div class="mt-auto pt-4 border-t border-slate-100 flex items-center justify-between gap-3">
                    <div>
                        <div class="text-[10px] text-slate-400 font-medium uppercase tracking-wide">Consultation Fee</div>
                        <div class="font-display font-extrabold text-slate-900 text-base mt-0.5">
                            LKR {{ number_format($doctor->consultation_fee, 2) }}
                        </div>
                    </div>

                    @guest
                        <button
                            type="button"
                            @click.prevent="showAuthModal = true"
                            class="bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-semibold px-5 py-2.5 rounded-xl shadow-sm hover:shadow-md hover:shadow-emerald-600/20 transition-all whitespace-nowrap">
                            Book Now
                        </button>
                    @else
                        <a href="{{ url('/appointments/book/' . $doctor->id) }}"
                           class="bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-semibold px-5 py-2.5 rounded-xl shadow-sm hover:shadow-md hover:shadow-emerald-600/20 transition-all whitespace-nowrap">
                            Book Now
                        </a>
                    @endguest
                </div>
            </div>

            @if ($loop->last)
                </div>
            @endif

        @empty
            {{-- ============================================================ --}}
            {{-- EMPTY STATE                                                   --}}
            {{-- ============================================================ --}}
            <div class="flex flex-col items-center justify-center text-center bg-white rounded-2xl border border-slate-200 py-24 px-6 shadow-sm">
                <span class="w-16 h-16 rounded-2xl bg-slate-50 border border-slate-100 flex items-center justify-center mb-5">
                    <svg class="w-8 h-8 text-slate-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.4" d="M21 21l-4.35-4.35M11 19a8 8 0 100-16 8 8 0 000 16z"/>
                    </svg>
                </span>
                <h3 class="font-display font-bold text-slate-900 text-xl">No doctors found</h3>
                <p class="text-slate-500 text-sm mt-2 max-w-sm leading-relaxed">
                    We couldn't find any doctors matching your filters. Try broadening your search or clearing a filter.
                </p>
                <a href="{{ route('doctors.index') }}"
                   class="mt-6 inline-flex items-center gap-2 bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-semibold px-6 py-2.5 rounded-full shadow-sm hover:shadow-md hover:shadow-emerald-600/20 transition-all">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
                    Reset all filters
                </a>
            </div>
        @endforelse

        {{-- ============================================================ --}}
        {{-- PAGINATION                                                    --}}
        {{-- ============================================================ --}}
        @if ($doctors->hasPages())
            <div class="mt-10 flex justify-center">
                {{ $doctors->links() }}
            </div>
        @endif
    </section>

    {{-- ============================================================ --}}
    {{-- FOOTER                                                        --}}
    {{-- ============================================================ --}}
    <footer class="bg-slate-900 text-slate-400 pt-10 pb-7 px-6">
        <div class="max-w-6xl mx-auto flex flex-col sm:flex-row items-center justify-between gap-4 text-xs">
            <div class="flex items-center gap-2.5">
                <span class="w-7 h-7 rounded-lg bg-gradient-to-br from-emerald-600 to-sky-400 flex items-center justify-center">
                    <svg class="w-3.5 h-3.5 text-white" viewBox="0 0 24 24" fill="none"><path d="M12 2C9 2 6.5 4.5 6.5 7.5C6.5 11 9 13 12 16C15 13 17.5 11 17.5 7.5C17.5 4.5 15 2 12 2Z" fill="currentColor"/></svg>
                </span>
                <span class="font-display font-bold text-white text-sm">MediCare24</span>
            </div>
            <span>&copy; {{ date('Y') }} MediCare24. All rights reserved.</span>
            <span>Made for doctors &amp; clinics worldwide.</span>
        </div>
    </footer>

    {{-- ============================================================ --}}
    {{-- GUEST AUTH REQUIRED MODAL                                     --}}
    {{-- ============================================================ --}}
    <div
        x-show="showAuthModal"
        x-cloak
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="fixed inset-0 z-50 flex items-center justify-center px-4"
        @keydown.escape.window="showAuthModal = false"
    >
        {{-- Backdrop --}}
        <div @click="showAuthModal = false" class="absolute inset-0 bg-slate-900/60 backdrop-blur-sm"></div>

        {{-- Modal panel --}}
        <div
            x-show="showAuthModal"
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 scale-95"
            x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-150"
            x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-95"
            class="relative bg-white rounded-2xl shadow-2xl shadow-slate-900/20 w-full max-w-sm p-8 text-center"
        >
            <button @click="showAuthModal = false"
                    class="absolute top-4 right-4 w-8 h-8 flex items-center justify-center rounded-full text-slate-400 hover:text-slate-600 hover:bg-slate-100 transition-colors"
                    aria-label="Close">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>

            <span class="inline-flex items-center justify-center w-14 h-14 rounded-2xl bg-gradient-to-br from-emerald-50 to-sky-50 border border-slate-100 mb-5">
                <svg class="w-7 h-7 text-emerald-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                </svg>
            </span>

            <h2 class="font-display text-xl font-extrabold text-slate-900">Sign in to continue</h2>
            <p class="text-slate-500 text-sm mt-2 leading-relaxed">
                Create a free account or sign in to book an appointment with this doctor.
            </p>

            <div class="flex flex-col gap-3 mt-7">
                <a href="{{ route('login') }}"
                   class="w-full bg-emerald-600 hover:bg-emerald-700 text-white font-semibold text-sm py-3 rounded-xl shadow-md shadow-emerald-600/20 hover:shadow-lg hover:shadow-emerald-600/25 transition-all">
                    Sign In
                </a>
                <a href="{{ route('register') }}"
                   class="w-full border border-slate-200 hover:border-emerald-300 hover:bg-emerald-50/50 text-slate-700 font-semibold text-sm py-3 rounded-xl transition-all">
                    Create Free Account
                </a>
            </div>

            <p class="flex items-center justify-center gap-1.5 text-[11px] text-slate-400 mt-5">
                <svg class="w-3.5 h-3.5 text-emerald-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                </svg>
                Free forever · No credit card required
            </p>
        </div>
    </div>

</body>
</html>
