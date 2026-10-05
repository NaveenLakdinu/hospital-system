<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Book Appointment — Family Care CAMS</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@500;600;700;800&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">

    <style>
        body { font-family: 'Inter', sans-serif; }
        .font-display { font-family: 'Plus Jakarta Sans', sans-serif; }
        [x-cloak] { display: none !important; }
    </style>
</head>
<body class="bg-white text-slate-900 antialiased" x-data="{ mobileOpen: false }">

    {{-- ============================================================ --}}
    {{-- STICKY NAVIGATION (matches home.blade.php & doctors/index)   --}}
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
            </ul>

            {{-- Right utilities (desktop) --}}
            <div class="hidden md:flex items-center gap-6 shrink-0">
                @auth
                    <div class="flex items-center gap-4 bg-slate-50 border border-slate-200/80 px-3.5 py-1.5 rounded-full">
                        <div class="flex items-center gap-2">
                            <span class="w-7 h-7 rounded-full bg-gradient-to-br from-emerald-600 to-sky-400 text-white font-bold flex items-center justify-center text-xs shadow-sm">
                                {{ strtoupper(substr(Auth::user()?->name ?? 'U', 0, 1)) }}
                            </span>
                            <span class="text-sm font-semibold text-slate-800">{{ Auth::user()?->name }}</span>
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
                @guest
                    <div class="flex items-center gap-2">
                        <a href="{{ route('login') }}" class="text-sm font-semibold text-slate-600 hover:text-emerald-600 px-4 py-2 rounded-full hover:bg-emerald-50 transition-all">Sign In</a>
                        <a href="{{ route('register') }}" class="bg-emerald-600 hover:bg-emerald-700 text-white px-5 py-2 rounded-full font-medium shadow-sm hover:shadow-md hover:shadow-emerald-500/20 text-sm transition-all">Sign Up</a>
                    </div>
                @endguest
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
                        <button type="submit" class="text-xs font-semibold text-red-500 hover:text-red-700 py-1 px-3 rounded-lg bg-red-50">Log Out</button>
                    </form>
                </div>
            @endauth
            @guest
                <div class="flex gap-3 pt-1">
                    <a href="{{ route('login') }}" class="flex-1 text-center border border-slate-200 text-slate-700 hover:border-emerald-400 hover:text-emerald-600 text-sm font-semibold px-4 py-2.5 rounded-full transition-all">Sign In</a>
                    <a href="{{ route('register') }}" class="flex-1 text-center bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-semibold px-4 py-2.5 rounded-full transition-all">Sign Up</a>
                </div>
            @endguest
        </div>
    </header>

    {{-- ============================================================ --}}
    {{-- PAGE HERO STRIP                                               --}}
    {{-- ============================================================ --}}
    <section class="relative overflow-hidden bg-gradient-to-b from-emerald-50/60 via-white to-white pt-10 pb-8 px-6 border-b border-slate-100">

        {{-- Decorative blobs --}}
        <div class="pointer-events-none absolute -top-20 -right-20 w-80 h-80 rounded-full bg-emerald-100/40 blur-3xl"></div>
        <div class="pointer-events-none absolute -bottom-10 -left-10 w-60 h-60 rounded-full bg-sky-100/40 blur-3xl"></div>

        <div class="max-w-4xl mx-auto relative">

            {{-- Breadcrumb --}}
            <a href="{{ route('doctors.index') }}"
               class="inline-flex items-center gap-2 text-sm font-medium text-slate-500 hover:text-emerald-700 transition-colors duration-200 group mb-5">
                <svg class="w-4 h-4 transition-transform duration-200 group-hover:-translate-x-1" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18"/>
                </svg>
                Back to Doctors Directory
            </a>

            {{-- Hero heading --}}
            <div class="flex items-center gap-3 mb-1">
                <span class="inline-flex items-center gap-2 bg-white border border-slate-200 shadow-sm rounded-full px-3.5 py-1 text-xs font-semibold text-slate-500">
                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                    Appointment Booking
                </span>
            </div>
            <h1 class="font-display text-2xl sm:text-3xl font-extrabold tracking-tight text-slate-900 leading-tight mt-2">
                Schedule a <span class="text-emerald-600">clinic visit</span>
            </h1>
            <p class="mt-2 text-slate-500 text-sm sm:text-base max-w-lg">
                Complete the form to confirm your appointment. A token is issued instantly on a first-come, first-served basis.
            </p>
        </div>
    </section>

    {{-- ============================================================ --}}
    {{-- TWO-COLUMN LAYOUT                                             --}}
    {{-- ============================================================ --}}
    <main class="max-w-4xl mx-auto px-6 py-10">
        <div class="grid grid-cols-1 lg:grid-cols-5 gap-7 items-start">

            {{-- ========================================================== --}}
            {{-- LEFT COLUMN — Doctor Profile Card (Sticky)                  --}}
            {{-- ========================================================== --}}
            <aside class="lg:col-span-2 lg:sticky lg:top-24">
                <div class="group bg-white rounded-2xl border border-slate-200 shadow-sm shadow-slate-200/50 p-6 hover:shadow-xl hover:shadow-slate-200/70 hover:border-emerald-100 transition-all duration-300">

                    {{-- Avatar + Name + Badge --}}
                    <div class="flex flex-col items-center text-center mb-6">

                        {{-- Gradient avatar with initials --}}
                        @php
                            $initials = collect(explode(' ', $doctor->user?->name ?? 'Doctor'))
                                ->map(fn($n) => strtoupper(substr($n, 0, 1)))
                                ->take(2)
                                ->implode('');
                        @endphp
                        <div class="relative shrink-0 mb-4">
                            <span class="w-20 h-20 rounded-2xl bg-gradient-to-br from-emerald-600 to-sky-400 text-white font-bold font-display flex items-center justify-center text-2xl shadow-md shadow-emerald-500/20">
                                {{ $initials }}
                            </span>
                            {{-- Availability dot --}}
                            @if ($doctor->schedules && $doctor->schedules->where('is_active', true)->count() > 0)
                                <span class="absolute -bottom-1 -right-1 w-5 h-5 rounded-full bg-white flex items-center justify-center shadow-sm border border-white">
                                    <span class="w-3 h-3 rounded-full bg-emerald-500"></span>
                                </span>
                            @endif
                        </div>

                        <h2 class="font-display font-bold text-slate-900 text-lg leading-snug group-hover:text-emerald-700 transition-colors">
                            Dr. {{ $doctor->user?->name ?? 'N/A' }}
                        </h2>

                        @if ($doctor->specialization)
                            <span class="inline-block mt-2 bg-emerald-50 text-emerald-700 text-xs font-semibold px-3 py-1 rounded-full border border-emerald-100">
                                {{ $doctor->specialization }}
                            </span>
                        @endif
                    </div>

                    {{-- Divider --}}
                    <div class="my-4 border-t border-slate-100"></div>

                    {{-- Details list --}}
                    <ul class="space-y-3 text-sm">

                        {{-- Qualification & SLMC --}}
                        @if ($doctor->qualification || $doctor->license_number)
                            <li class="flex items-start gap-3">
                                <svg class="w-4 h-4 mt-0.5 text-slate-400 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6" d="M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.62 48.62 0 0 1 12 20.904a48.62 48.62 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.636 50.636 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0 1 12 13.489a50.702 50.702 0 0 1 3.741-3.342M6.75 15a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Zm0 0v-3.675A55.378 55.378 0 0 1 12 8.443m-7.007 11.55A5.981 5.981 0 0 0 6.75 15.75v-1.5"/>
                                </svg>
                                <div class="min-w-0">
                                    <p class="text-[10px] font-medium text-slate-400 uppercase tracking-wide mb-0.5">Qualification &amp; License</p>
                                    <p class="text-slate-700 font-medium leading-snug truncate">
                                        {{ $doctor->qualification ?? '—' }}
                                        @if ($doctor->license_number)
                                            <span class="text-slate-400 font-normal">&middot; SLMC: {{ $doctor->license_number }}</span>
                                        @endif
                                    </p>
                                </div>
                            </li>
                        @endif

                        {{-- Room Number --}}
                        @if ($doctor->room_number)
                            <li class="flex items-start gap-3">
                                <svg class="w-4 h-4 mt-0.5 text-slate-400 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6" d="M2.25 21h19.5m-18-18v18m10.5-18v18m6-13.5V21M6.75 6.75h.75m-.75 3h.75m-.75 3h.75m3-6h.75m-.75 3h.75m-.75 3h.75M6.75 21v-3.375c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21M3 3h12m-.75 4.5H21m-3.75 3.75h.008v.008h-.008v-.008Zm0 3h.008v.008h-.008v-.008Zm0 3h.008v.008h-.008v-.008Z"/>
                                </svg>
                                <div>
                                    <p class="text-[10px] font-medium text-slate-400 uppercase tracking-wide mb-0.5">Room</p>
                                    <p class="text-slate-700 font-medium">Room {{ $doctor->room_number }}</p>
                                </div>
                            </li>
                        @endif

                        {{-- Consultation Fee --}}
                        @if ($doctor->consultation_fee)
                            <li class="flex items-start gap-3">
                                <svg class="w-4 h-4 mt-0.5 text-emerald-500 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6" d="M2.25 18.75a60.07 60.07 0 0 1 15.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 0 1 3 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 0 0-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 0 1-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 0 0 3 15h-.75M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm3 0h.008v.008H18V10.5Zm-12 0h.008v.008H6V10.5Z"/>
                                </svg>
                                <div>
                                    <p class="text-[10px] font-medium text-slate-400 uppercase tracking-wide mb-0.5">Consultation Fee</p>
                                    <p class="font-display font-extrabold text-slate-900 text-base mt-0.5">
                                        LKR {{ number_format($doctor->consultation_fee, 2) }}
                                    </p>
                                </div>
                            </li>
                        @endif
                    </ul>

                    {{-- Divider --}}
                    <div class="my-4 border-t border-slate-100"></div>

                    {{-- Weekly Clinic Schedule --}}
                    <div>
                        <p class="text-[10px] font-medium text-slate-400 uppercase tracking-wide mb-3">Weekly Clinic Days</p>

                        @php
                            $activeSchedules = $doctor->schedules?->where('is_active', true) ?? collect();
                        @endphp

                        @if ($activeSchedules->count() > 0)
                            <div class="flex flex-wrap gap-1.5">
                                @foreach ($activeSchedules as $schedule)
                                    <span class="inline-flex items-center gap-1 bg-slate-50 border border-slate-100 text-slate-600 text-[11px] font-medium px-2.5 py-1 rounded-lg">
                                        <svg class="w-3 h-3 text-emerald-500 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                        {{ ucfirst($schedule->day_of_week) }}
                                        @if ($schedule->start_time && $schedule->end_time)
                                            &nbsp;{{ \Carbon\Carbon::parse($schedule->start_time)->format('h:i A') }}&ndash;{{ \Carbon\Carbon::parse($schedule->end_time)->format('h:i A') }}
                                        @endif
                                    </span>
                                @endforeach
                            </div>
                        @else
                            <p class="text-xs text-slate-400 italic">No active schedule published yet.</p>
                        @endif
                    </div>
                </div>
            </aside>

            {{-- ========================================================== --}}
            {{-- RIGHT COLUMN — Booking Form                                 --}}
            {{-- ========================================================== --}}
            <section class="lg:col-span-3">
                <div class="bg-white rounded-2xl border border-slate-200 shadow-sm shadow-slate-200/50 p-6 sm:p-8">

                    {{-- Section heading --}}
                    <div class="mb-7">
                        <h2 class="font-display text-xl font-bold text-slate-900">Schedule an Appointment</h2>
                        <p class="text-slate-500 text-sm mt-1 leading-relaxed">
                            Fill in the details below. Your clinic token is issued instantly upon confirmation.
                        </p>
                    </div>

                    {{-- ── Validation Error Alert ── --}}
                    @if ($errors->any())
                        <div class="mb-6 flex gap-3 rounded-xl border border-red-200 bg-red-50 p-4">
                            <svg class="w-5 h-5 text-red-500 shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z"/>
                            </svg>
                            <div>
                                <h4 class="text-sm font-semibold text-red-700 mb-1">Please correct the following errors:</h4>
                                <ul class="list-disc list-inside space-y-0.5">
                                    @foreach ($errors->all() as $error)
                                        <li class="text-sm text-red-600">{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif

                    {{-- ── Booking Form ── --}}
                    <form method="POST" action="{{ route('appointments.store', $doctor->id) }}" novalidate>
                        @csrf

                        <div class="space-y-5">

                            {{-- ─── Field 1: Patient Info (Read-only) ─── --}}
                            <div>
                                <label class="block text-xs font-medium text-slate-400 uppercase tracking-wide mb-2">Patient</label>
                                <div class="flex items-center gap-3 rounded-xl border border-slate-200 bg-slate-50/50 px-4 py-3 cursor-not-allowed select-none">
                                    <span class="w-9 h-9 rounded-xl bg-gradient-to-br from-emerald-600 to-sky-400 text-white font-bold font-display flex items-center justify-center text-sm shadow-sm shadow-emerald-500/20 shrink-0">
                                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                                    </span>
                                    <div class="min-w-0">
                                        <p class="text-sm font-semibold text-slate-800 truncate">{{ Auth::user()->name }}</p>
                                        <p class="text-xs text-slate-400 truncate">{{ Auth::user()->email }}</p>
                                    </div>
                                    <span class="ml-auto shrink-0 text-xs font-semibold text-emerald-700 bg-emerald-50 border border-emerald-100 px-2 py-0.5 rounded-full">You</span>
                                </div>
                            </div>

                            {{-- ─── Field 2: Appointment Date ─── --}}
                            <div>
                                <label for="appointment_date" class="block text-xs font-medium text-slate-400 uppercase tracking-wide mb-2">
                                    Appointment Date <span class="text-red-500 normal-case">*</span>
                                </label>
                                <input
                                    type="date"
                                    id="appointment_date"
                                    name="appointment_date"
                                    min="{{ date('Y-m-d') }}"
                                    value="{{ old('appointment_date') }}"
                                    required
                                    class="w-full rounded-xl border px-4 py-3 text-sm text-slate-800 shadow-sm placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-offset-0 transition-all
                                        @error('appointment_date') border-red-300 bg-red-50 focus:border-red-400 focus:ring-red-400/20
                                        @else border-slate-200 bg-slate-50/50 focus:border-emerald-500 focus:ring-emerald-500/30 focus:bg-white @enderror"
                                >
                                <p class="mt-2 flex items-start gap-1.5 text-xs text-slate-500">
                                    <svg class="w-3.5 h-3.5 text-sky-400 shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m11.25 11.25.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z"/>
                                    </svg>
                                    Pick a date that falls on one of the doctor's active clinic days shown on the left.
                                </p>
                                @error('appointment_date')
                                    <p class="mt-1.5 text-xs font-medium text-red-600 flex items-center gap-1">
                                        <svg class="w-3.5 h-3.5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z"/></svg>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            {{-- ─── Field 3: Reason for Visit ─── --}}
                            <div>
                                <label for="reason_for_visit" class="block text-xs font-medium text-slate-400 uppercase tracking-wide mb-2">
                                    Reason for Visit
                                </label>
                                <textarea
                                    id="reason_for_visit"
                                    name="reason_for_visit"
                                    rows="3"
                                    placeholder="Briefly describe your symptoms or reason for visit..."
                                    class="w-full rounded-xl border px-4 py-3 text-sm text-slate-800 shadow-sm placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-offset-0 resize-none transition-all
                                        @error('reason_for_visit') border-red-300 bg-red-50 focus:border-red-400 focus:ring-red-400/20
                                        @else border-slate-200 bg-slate-50/50 focus:border-emerald-500 focus:ring-emerald-500/30 focus:bg-white @enderror"
                                >{{ old('reason_for_visit') }}</textarea>
                                @error('reason_for_visit')
                                    <p class="mt-1.5 text-xs font-medium text-red-600 flex items-center gap-1">
                                        <svg class="w-3.5 h-3.5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z"/></svg>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            {{-- ─── Clinic Token Notice ─── --}}
                            <div class="flex gap-3 rounded-xl border border-amber-200 bg-amber-50 p-4">
                                <span class="w-8 h-8 rounded-lg bg-amber-100 flex items-center justify-center shrink-0 mt-0.5">
                                    <svg class="w-4 h-4 text-amber-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6" d="M16.5 6v.75m0 3v.75m0 3v.75m0 3V18m-9-5.25h5.25M7.5 15h3M3.375 5.25c-.621 0-1.125.504-1.125 1.125v3.026a2.999 2.999 0 0 0 .375 5.599v.624c0 .621.504 1.125 1.125 1.125h13.5c.621 0 1.125-.504 1.125-1.125v-.624a2.999 2.999 0 0 0 .375-5.599V6.375c0-.621-.504-1.125-1.125-1.125H3.375Z"/>
                                    </svg>
                                </span>
                                <div>
                                    <h4 class="text-sm font-semibold text-amber-800 mb-0.5">About Your Clinic Token</h4>
                                    <p class="text-xs text-amber-700 leading-relaxed">
                                        Tokens are queued on a <strong class="font-semibold">first-come, first-served</strong> basis. Please <strong class="font-semibold">arrive at least 15 minutes early</strong>. Tokens may be forfeited if you are significantly late.
                                    </p>
                                </div>
                            </div>

                            {{-- ─── Fee Summary Strip ─── --}}
                            @if ($doctor->consultation_fee)
                                <div class="flex items-center justify-between rounded-xl border border-slate-200 bg-slate-50/50 px-4 py-3">
                                    <div class="flex items-center gap-2 text-sm text-slate-500">
                                        <svg class="w-4 h-4 text-emerald-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                        </svg>
                                        Consultation Fee
                                    </div>
                                    <span class="font-display font-extrabold text-slate-900 text-base">
                                        LKR {{ number_format($doctor->consultation_fee, 2) }}
                                    </span>
                                </div>
                            @endif

                            {{-- ─── Submit CTA ─── --}}
                            <div class="pt-1">
                                <button
                                    type="submit"
                                    class="w-full bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-semibold px-6 py-3.5 rounded-xl shadow-md shadow-emerald-600/20 hover:shadow-lg hover:shadow-emerald-600/25 transition-all flex items-center justify-center gap-2.5 group"
                                >
                                    <svg class="w-5 h-5 transition-transform duration-200 group-hover:scale-110" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                    </svg>
                                    Confirm Appointment &amp; Issue Token
                                </button>
                                <p class="mt-3 text-center text-xs text-slate-400">
                                    By confirming, you agree to the clinic's appointment &amp; cancellation policy.
                                </p>
                            </div>

                        </div>{{-- /space-y-5 --}}
                    </form>

                </div>
            </section>

        </div>{{-- /grid --}}
    </main>

    {{-- ============================================================ --}}
    {{-- FOOTER (matches home.blade.php & doctors/index)              --}}
    {{-- ============================================================ --}}
    <footer class="bg-slate-900 text-slate-400 pt-10 pb-7 px-6 mt-10">
        <div class="max-w-6xl mx-auto flex flex-col sm:flex-row items-center justify-between gap-4 text-xs">
            <div class="flex items-center gap-2.5">
                <span class="w-7 h-7 rounded-lg bg-gradient-to-br from-emerald-600 to-sky-400 flex items-center justify-center">
                    <svg class="w-3.5 h-3.5 text-white" viewBox="0 0 24 24" fill="none">
                        <path d="M12 2C9 2 6.5 4.5 6.5 7.5C6.5 11 9 13 12 16C15 13 17.5 11 17.5 7.5C17.5 4.5 15 2 12 2Z" fill="currentColor"/>
                    </svg>
                </span>
                <span class="font-display font-bold text-white text-sm">MediCare24</span>
            </div>
            <span>&copy; {{ date('Y') }} MediCare24. All rights reserved.</span>
            <span>Made for doctors &amp; clinics worldwide.</span>
        </div>
    </footer>

</body>
</html>
