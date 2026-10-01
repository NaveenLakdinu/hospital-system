<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>My Appointments — Family Care CAMS</title>

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
<body class="bg-white text-slate-900 antialiased min-h-screen" x-data="{ mobileOpen: false }">

    {{-- ============================================================ --}}
    {{-- STICKY NAVIGATION (matches home.blade.php & doctors/index)   --}}
    {{-- ============================================================ --}}
    <header class="sticky top-0 z-50 bg-white/90 backdrop-blur-md border-b border-slate-100">
        <nav class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between gap-8">

            {{-- Logo --}}
            <a href="{{ url('/') }}" class="flex items-center gap-2.5 shrink-0">
                <span class="w-9 h-9 rounded-xl bg-gradient-to-br from-emerald-600 to-sky-400 flex items-center justify-center">
                    <svg class="w-5 h-5 text-white" viewBox="0 0 24 24" fill="none">
                        <path d="M12 2C9 2 6.5 4.5 6.5 7.5C6.5 11 9 13 12 16C15 13 17.5 11 17.5 7.5C17.5 4.5 15 2 12 2Z" fill="currentColor"/>
                        <path d="M4 15C4 19 7.5 22 12 22C16.5 22 20 19 20 15" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/>
                    </svg>
                </span>
                <span class="font-display font-bold text-lg tracking-tight">
                    Medi<span class="text-sky-400">Care</span>24
                </span>
            </a>

            {{-- Desktop nav links --}}
            <ul class="hidden md:flex items-center gap-8 flex-1">
                <li><a href="{{ route('doctors.index') }}" class="text-sm font-medium text-slate-700 hover:text-emerald-600 transition-colors">Find Doctors</a></li>
                <li><a href="#" class="text-sm font-medium text-slate-700 hover:text-emerald-600 transition-colors">Video Consult</a></li>
                <li><a href="#" class="text-sm font-medium text-slate-700 hover:text-emerald-600 transition-colors">Lab Tests</a></li>
                <li><a href="#" class="text-sm font-medium text-slate-700 hover:text-emerald-600 transition-colors">Surgeries</a></li>
                <li>
                    <a href="{{ route('appointments.index') }}"
                       class="text-sm font-semibold text-emerald-600 transition-colors">
                        My Appointments
                    </a>
                </li>
            </ul>

            {{-- Desktop auth pill --}}
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
                            <button type="submit" class="text-xs font-semibold text-slate-500 hover:text-red-600 transition-colors">Log Out</button>
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

        {{-- Mobile menu --}}
        <div x-show="mobileOpen" x-cloak x-transition class="md:hidden border-t border-slate-100 bg-white px-6 py-5 space-y-4">
            <a href="{{ route('doctors.index') }}" class="block text-sm font-medium text-slate-700">Find Doctors</a>
            <a href="#" class="block text-sm font-medium text-slate-700">Video Consult</a>
            <a href="#" class="block text-sm font-medium text-slate-700">Lab Tests</a>
            <a href="#" class="block text-sm font-medium text-slate-700">Surgeries</a>
            <a href="{{ route('appointments.index') }}" class="block text-sm font-semibold text-emerald-600">My Appointments</a>
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
    {{-- PAGE HERO STRIP  (matches home.blade.php & doctors/index)    --}}
    {{-- ============================================================ --}}
    <section class="relative overflow-hidden bg-gradient-to-b from-emerald-50/60 via-white to-white pt-14 pb-12 px-6">

        {{-- Decorative blobs --}}
        <div class="pointer-events-none absolute -top-24 -right-24 w-96 h-96 rounded-full bg-emerald-100/40 blur-3xl"></div>
        <div class="pointer-events-none absolute -bottom-16 -left-16 w-72 h-72 rounded-full bg-sky-100/40 blur-3xl"></div>

        <div class="max-w-5xl mx-auto relative">
            <div class="flex flex-col sm:flex-row sm:items-end sm:justify-between gap-6">
                <div>
                    {{-- Pill badge — mirrors doctors/index count badge --}}
                    <span class="inline-flex items-center gap-2 bg-white border border-slate-200 shadow-sm rounded-full px-4 py-1.5 text-xs font-semibold text-slate-500">
                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                        {{ $appointments->total() }} appointment{{ $appointments->total() !== 1 ? 's' : '' }} on record
                    </span>
                    <h1 class="font-display mt-4 text-3xl sm:text-4xl font-extrabold tracking-tight text-slate-900 leading-[1.15]">
                        My Appointments <span class="text-emerald-600">&amp; Tokens</span>
                    </h1>
                    <p class="mt-3 text-slate-500 text-base max-w-lg">
                        View your upcoming clinic consultations, token numbers, and appointment status.
                    </p>
                </div>

                {{-- CTA — matches "View All Specialities" button on home.blade.php --}}
                <a href="{{ route('doctors.index') }}"
                   class="shrink-0 inline-flex items-center gap-2 bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-semibold px-5 py-2.5 rounded-xl shadow-md shadow-emerald-600/20 hover:shadow-lg hover:shadow-emerald-600/25 transition-all whitespace-nowrap group">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.5v15m7.5-7.5h-15"/>
                    </svg>
                    Book New Appointment
                </a>
            </div>
        </div>
    </section>

    {{-- ============================================================ --}}
    {{-- MAIN CONTENT                                                  --}}
    {{-- ============================================================ --}}
    <main class="max-w-5xl mx-auto px-6 pb-20 -mt-2">

        {{-- ── Results label (matches doctors/index pattern) ── --}}
        @if ($appointments->total() > 0)
            <div class="mb-5 flex items-center justify-between">
                <p class="text-sm text-slate-500">
                    Showing
                    <span class="font-semibold text-slate-800">{{ $appointments->firstItem() }}–{{ $appointments->lastItem() }}</span>
                    of
                    <span class="font-semibold text-slate-800">{{ $appointments->total() }}</span>
                    appointments
                </p>
            </div>
        @endif

        {{-- ============================================================ --}}
        {{-- FLASH: SUCCESS BANNER                                         --}}
        {{-- ============================================================ --}}
        @if (session('success'))
            <div class="mb-6 flex items-start gap-3 rounded-xl border border-emerald-200 bg-emerald-50 p-4"
                 x-data="{ show: true }" x-show="show"
                 x-transition:leave="transition ease-in duration-150"
                 x-transition:leave-start="opacity-100"
                 x-transition:leave-end="opacity-0">
                <span class="w-8 h-8 rounded-lg bg-emerald-100 flex items-center justify-center shrink-0 mt-0.5">
                    <svg class="w-4 h-4 text-emerald-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                    </svg>
                </span>
                <div class="flex-1 min-w-0">
                    <h4 class="text-sm font-semibold text-emerald-800">Booking Confirmed!</h4>
                    <p class="text-sm text-emerald-700 mt-0.5 leading-relaxed">{{ session('success') }}</p>
                </div>
                <button @click="show = false"
                        class="shrink-0 w-6 h-6 flex items-center justify-center rounded-full text-emerald-500 hover:text-emerald-700 hover:bg-emerald-100 transition-colors"
                        aria-label="Dismiss">
                    <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18 18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        @endif

        {{-- ============================================================ --}}
        {{-- APPOINTMENTS LIST                                             --}}
        {{-- ============================================================ --}}
        @forelse ($appointments as $appointment)

            @php
                $initials = collect(explode(' ', $appointment->doctor->user?->name ?? 'Doctor'))
                    ->map(fn($n) => strtoupper(substr($n, 0, 1)))
                    ->take(2)
                    ->implode('');

                $statusStyles = match($appointment->status) {
                    'Confirmed' => 'bg-emerald-50 text-emerald-700 border-emerald-200',
                    'Completed' => 'bg-blue-50   text-blue-700   border-blue-200',
                    'Cancelled' => 'bg-rose-50   text-rose-700   border-rose-200',
                    'Pending'   => 'bg-amber-50  text-amber-700  border-amber-200',
                    default     => 'bg-slate-50  text-slate-600  border-slate-200',
                };
                $statusDot = match($appointment->status) {
                    'Confirmed' => 'bg-emerald-500',
                    'Completed' => 'bg-blue-500',
                    'Cancelled' => 'bg-rose-500',
                    'Pending'   => 'bg-amber-500',
                    default     => 'bg-slate-400',
                };
            @endphp

            {{-- ── Appointment Card — hover matches doctors/index exactly ── --}}
            <div class="group flex flex-col bg-white rounded-2xl border border-slate-200 shadow-sm shadow-slate-200/50 hover:-translate-y-1.5 hover:shadow-xl hover:shadow-slate-200/70 hover:border-emerald-100 transition-all duration-300 mb-5 overflow-hidden">

                {{-- ── Card Header ── --}}
                <div class="flex items-center justify-between gap-4 px-6 py-4 border-b border-slate-100">

                    {{-- Left: Reference number + relative booking time --}}
                    <div class="flex items-center gap-3 min-w-0">
                        <div class="w-8 h-8 rounded-lg bg-gradient-to-br from-emerald-600 to-sky-400 flex items-center justify-center shadow-sm shadow-emerald-500/20 shrink-0">
                            <svg class="w-4 h-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M9 5H7a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-2M9 5a2 2 0 0 0 2 2h2a2 2 0 0 0 2-2M9 5a2 2 0 0 1 2-2h2a2 2 0 0 1 2 2"/>
                            </svg>
                        </div>
                        <div class="min-w-0">
                            <p class="font-display font-bold text-slate-900 text-sm truncate tracking-wide group-hover:text-emerald-700 transition-colors">
                                {{ $appointment->appointment_number }}
                            </p>
                            <p class="text-[11px] text-slate-400 font-medium">
                                Booked {{ $appointment->created_at->diffForHumans() }}
                            </p>
                        </div>
                    </div>

                    {{-- Right: Status badge --}}
                    <span class="shrink-0 inline-flex items-center gap-1.5 px-3 py-1 rounded-full border text-xs font-semibold {{ $statusStyles }}">
                        <span class="w-1.5 h-1.5 rounded-full {{ $statusDot }}"></span>
                        {{ $appointment->status }}
                    </span>
                </div>

                {{-- ── Card Body ── --}}
                <div class="flex flex-col sm:flex-row flex-1">

                    {{-- ─ LEFT STRIPE: Token Number ─ --}}
                    <div class="sm:w-36 shrink-0 flex flex-col items-center justify-center gap-1 bg-gradient-to-br from-emerald-50 to-sky-50 border-b sm:border-b-0 sm:border-r border-emerald-100 px-5 py-5 text-center">
                        <span class="text-[9px] font-bold text-emerald-600 uppercase tracking-widest">Token No.</span>
                        <span class="font-display font-extrabold text-slate-900 text-5xl leading-none mt-0.5">
                            {{ str_pad($appointment->token_number, 2, '0', STR_PAD_LEFT) }}
                        </span>
                        <span class="text-[9px] font-semibold text-slate-400 uppercase tracking-wide mt-1 leading-tight">
                            First-come<br>first-served
                        </span>
                    </div>

                    {{-- ─ RIGHT CONTENT: 3-col grid ─ --}}
                    <div class="flex-1 p-5 grid grid-cols-1 sm:grid-cols-3 gap-5">

                        {{-- Doctor Details --}}
                        <div>
                            <p class="text-[10px] font-medium text-slate-400 uppercase tracking-wide mb-2.5">Doctor</p>
                            <div class="flex items-start gap-2.5">
                                <div class="relative shrink-0">
                                    <span class="w-10 h-10 rounded-xl bg-gradient-to-br from-emerald-600 to-sky-400 text-white font-bold font-display flex items-center justify-center text-sm shadow-md shadow-emerald-500/20">
                                        {{ $initials }}
                                    </span>
                                </div>
                                <div class="min-w-0">
                                    <p class="font-display font-bold text-slate-900 text-sm leading-snug truncate">
                                        Dr. {{ $appointment->doctor->user?->name ?? 'N/A' }}
                                    </p>
                                    @if ($appointment->doctor->specialization)
                                        <span class="inline-block mt-1 bg-emerald-50 text-emerald-700 text-[11px] font-semibold px-2 py-0.5 rounded-full border border-emerald-100">
                                            {{ $appointment->doctor->specialization }}
                                        </span>
                                    @endif
                                    <p class="mt-1.5 flex items-center gap-1 text-xs text-slate-400 truncate">
                                        <svg class="w-3 h-3 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.25 21h19.5m-18-18v18m10.5-18v18m6-13.5V21M6.75 6.75h.75m-.75 3h.75m-.75 3h.75m3-6h.75m-.75 3h.75m-.75 3h.75M6.75 21v-3.375c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21"/>
                                        </svg>
                                        {{ $appointment->doctor->room_number ? 'Room ' . $appointment->doctor->room_number : 'Consultation Room' }}
                                    </p>
                                </div>
                            </div>
                        </div>

                        {{-- Date & Time --}}
                        <div>
                            <p class="text-[10px] font-medium text-slate-400 uppercase tracking-wide mb-2.5">Date &amp; Time</p>
                            <div class="space-y-2">
                                <div class="flex items-center gap-2">
                                    <span class="w-7 h-7 rounded-lg bg-slate-100 flex items-center justify-center shrink-0">
                                        <svg class="w-3.5 h-3.5 text-slate-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5"/>
                                        </svg>
                                    </span>
                                    <div>
                                        <p class="text-xs font-semibold text-slate-800 leading-tight">
                                            {{ date('D, M d, Y', strtotime($appointment->appointment_date)) }}
                                        </p>
                                        <p class="text-[11px] text-slate-400">Appointment Date</p>
                                    </div>
                                </div>
                                <div class="flex items-center gap-2">
                                    <span class="w-7 h-7 rounded-lg bg-slate-100 flex items-center justify-center shrink-0">
                                        <svg class="w-3.5 h-3.5 text-slate-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                        </svg>
                                    </span>
                                    <div>
                                        <p class="text-xs font-semibold text-slate-800 leading-tight">
                                            {{ date('h:i A', strtotime($appointment->appointment_time)) }}
                                        </p>
                                        <p class="text-[11px] text-slate-400">Session Time</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Reason for Visit --}}
                        <div>
                            <p class="text-[10px] font-medium text-slate-400 uppercase tracking-wide mb-2.5">Reason for Visit</p>
                            <div class="flex items-start gap-2">
                                <span class="w-7 h-7 rounded-lg bg-slate-100 flex items-center justify-center shrink-0 mt-0.5">
                                    <svg class="w-3.5 h-3.5 text-slate-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z"/>
                                    </svg>
                                </span>
                                <p class="text-sm text-slate-600 leading-relaxed line-clamp-2">
                                    {{ $appointment->reason_for_visit ?? 'General Consultation' }}
                                </p>
                            </div>
                        </div>

                    </div>{{-- /right content --}}
                </div>{{-- /card body --}}

                {{-- ── Card Footer / Actions (mt-auto pushes it down) ── --}}
                <div class="mt-auto border-t border-slate-100">

                    @if ($appointment->status === 'Confirmed' || $appointment->status === 'Pending')
                        <div class="px-6 py-3.5 flex flex-wrap items-center justify-between gap-3">
                            <p class="text-xs text-slate-400 flex items-center gap-1.5">
                                <svg class="w-3.5 h-3.5 text-amber-400 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z"/>
                                </svg>
                                Please arrive at least 15 minutes before your session time.
                            </p>
                            <form
                                method="POST"
                                action="{{ route('appointments.cancel', $appointment->id) }}"
                                onsubmit="return confirm('Are you sure you want to cancel this appointment? This action cannot be undone.');"
                            >
                                @csrf
                                @method('PATCH')
                                <button
                                    type="submit"
                                    class="inline-flex items-center gap-1.5 text-xs font-semibold text-rose-600 hover:text-white bg-rose-50 hover:bg-rose-600 border border-rose-200 hover:border-rose-600 px-3.5 py-2 rounded-xl transition-all duration-200 whitespace-nowrap"
                                >
                                    <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18 18 6M6 6l12 12"/>
                                    </svg>
                                    Cancel Appointment
                                </button>
                            </form>
                        </div>

                    @elseif ($appointment->status === 'Completed')
                        <div class="px-6 py-3 flex items-center gap-2 bg-blue-50/40">
                            <svg class="w-4 h-4 text-blue-500 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                            </svg>
                            <p class="text-xs font-medium text-blue-600">Visit completed. Thank you for choosing us!</p>
                        </div>

                    @elseif ($appointment->status === 'Cancelled')
                        <div class="px-6 py-3 flex items-center justify-between gap-3 bg-rose-50/40">
                            <div class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-rose-400 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 0 0 5.636 5.636m12.728 12.728A9 9 0 0 1 5.636 5.636m12.728 12.728L5.636 5.636"/>
                                </svg>
                                <p class="text-xs font-medium text-rose-500">This appointment was cancelled.</p>
                            </div>
                            <a href="{{ route('doctors.index') }}"
                               class="text-xs font-semibold text-emerald-600 hover:text-emerald-700 hover:underline underline-offset-2 whitespace-nowrap transition-colors">
                                Book again →
                            </a>
                        </div>
                    @endif

                </div>{{-- /card footer --}}

            </div>{{-- /appointment card --}}

        {{-- ============================================================ --}}
        {{-- EMPTY STATE  (matches doctors/index empty state exactly)      --}}
        {{-- ============================================================ --}}
        @empty
            <div class="flex flex-col items-center justify-center text-center bg-white rounded-2xl border border-slate-200 py-24 px-6 shadow-sm">
                <span class="w-16 h-16 rounded-2xl bg-slate-50 border border-slate-100 flex items-center justify-center mb-5">
                    <svg class="w-8 h-8 text-slate-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.4" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z"/>
                    </svg>
                </span>
                <h3 class="font-display font-bold text-slate-900 text-xl">No Appointments Scheduled Yet</h3>
                <p class="text-slate-500 text-sm mt-2 max-w-sm leading-relaxed">
                    You haven't booked any appointments yet. Find a specialist and schedule your first clinic visit in minutes.
                </p>
                <a href="{{ route('doctors.index') }}"
                   class="mt-6 inline-flex items-center gap-2 bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-semibold px-6 py-2.5 rounded-full shadow-sm hover:shadow-md hover:shadow-emerald-600/20 transition-all">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35M11 19a8 8 0 100-16 8 8 0 000 16z"/>
                    </svg>
                    Find a Doctor
                </a>
            </div>
        @endforelse

        {{-- ============================================================ --}}
        {{-- PAGINATION  (matches doctors/index mt-10 flex justify-center) --}}
        {{-- ============================================================ --}}
        @if ($appointments->hasPages())
            <div class="mt-10 flex justify-center">
                {{ $appointments->links() }}
            </div>
        @endif

    </main>

    {{-- ============================================================ --}}
    {{-- FOOTER (matches home.blade.php & doctors/index verbatim)     --}}
    {{-- ============================================================ --}}
    <footer class="bg-slate-900 text-slate-400 pt-10 pb-7 px-6">
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
