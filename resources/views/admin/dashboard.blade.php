<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-slate-50">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin Dashboard · Family Care CAMS</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@500;600;700;800&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-full bg-slate-50 font-['Inter'] text-slate-700 antialiased">

    @php
        $appointmentsUrl = Route::has('admin.appointments.index') ? route('admin.appointments.index') : '#';
        $settingsUrl     = Route::has('admin.settings.index') ? route('admin.settings.index') : '#';
        $reportUrl       = Route::has('admin.reports.monthly') ? route('admin.reports.monthly') : '#';

        $statusStyles = [
            'confirmed' => 'bg-emerald-50 text-emerald-700 ring-emerald-600/20',
            'completed' => 'bg-blue-50 text-blue-700 ring-blue-600/20',
            'cancelled' => 'bg-red-50 text-red-700 ring-red-600/20',
            'pending'   => 'bg-amber-50 text-amber-700 ring-amber-600/20',
        ];
        $statusDots = [
            'confirmed' => 'bg-emerald-500',
            'completed' => 'bg-blue-500',
            'cancelled' => 'bg-red-500',
            'pending'   => 'bg-amber-500',
        ];

        $adminName = Auth::user()->name ?? 'Administrator';
        $initials  = collect(explode(' ', trim($adminName)))
                        ->filter()->take(2)
                        ->map(fn ($part) => mb_strtoupper(mb_substr($part, 0, 1)))
                        ->implode('');
    @endphp

    {{-- ===================== TOP NAVIGATION ===================== --}}
    <header class="sticky top-0 z-40 border-b border-slate-200 bg-white/90 backdrop-blur">
        <div class="mx-auto flex h-16 max-w-7xl items-center justify-between px-4 sm:px-6 lg:px-8">

            {{-- Brand --}}
            <a href="{{ url('/') }}" class="group flex items-center gap-3">
                <span class="flex h-10 w-10 items-center justify-center rounded-xl bg-emerald-600 text-white shadow-sm shadow-emerald-600/30 transition group-hover:bg-emerald-700">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                    </svg>
                </span>
                <span class="leading-tight">
                    <span class="block font-['Plus_Jakarta_Sans'] text-base font-extrabold tracking-tight text-slate-900">Family Care</span>
                    <span class="block text-[11px] font-semibold uppercase tracking-wider text-emerald-600">Admin Portal</span>
                </span>
            </a>

            {{-- Desktop links --}}
            <nav class="hidden items-center gap-1 md:flex" aria-label="Primary">
                <a href="{{ route('admin.dashboard') }}"
                   aria-current="page"
                   class="rounded-lg bg-emerald-50 px-4 py-2 text-sm font-semibold text-emerald-700 ring-1 ring-inset ring-emerald-600/10">
                    Dashboard
                </a>
                <a href="{{ route('admin.doctors.index') }}"
                   class="rounded-lg px-4 py-2 text-sm font-medium text-slate-600 transition hover:bg-slate-100 hover:text-slate-900">
                    Manage Doctors
                </a>
                <a href="{{ $appointmentsUrl }}"
                   class="rounded-lg px-4 py-2 text-sm font-medium text-slate-600 transition hover:bg-slate-100 hover:text-slate-900">
                    Appointments
                </a>
            </nav>

            {{-- Profile + logout --}}
            <div class="flex items-center gap-3">
                <div class="hidden items-center gap-2.5 rounded-full border border-slate-200 bg-white py-1 pl-1 pr-4 shadow-sm sm:flex">
                    <span class="flex h-8 w-8 items-center justify-center rounded-full bg-sky-100 text-xs font-bold text-sky-700">{{ $initials }}</span>
                    <span class="leading-tight">
                        <span class="block max-w-[10rem] truncate text-sm font-semibold text-slate-800">{{ Auth::user()->name }}</span>
                        <span class="block text-[10px] font-medium uppercase tracking-wide text-slate-400">Administrator</span>
                    </span>
                </div>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                            class="inline-flex items-center gap-2 rounded-lg border border-slate-200 bg-white px-3.5 py-2 text-sm font-medium text-slate-600 shadow-sm transition hover:border-red-200 hover:bg-red-50 hover:text-red-600 focus:outline-none focus:ring-2 focus:ring-red-500/30">
                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                        </svg>
                        <span class="hidden sm:inline">Logout</span>
                    </button>
                </form>
            </div>
        </div>

        {{-- Mobile links --}}
        <nav class="flex gap-1 overflow-x-auto border-t border-slate-100 px-4 py-2 md:hidden" aria-label="Mobile">
            <a href="{{ route('admin.dashboard') }}" aria-current="page" class="whitespace-nowrap rounded-lg bg-emerald-50 px-3 py-1.5 text-sm font-semibold text-emerald-700">Dashboard</a>
            <a href="{{ route('admin.doctors.index') }}" class="whitespace-nowrap rounded-lg px-3 py-1.5 text-sm font-medium text-slate-600 hover:bg-slate-100">Manage Doctors</a>
            <a href="{{ $appointmentsUrl }}" class="whitespace-nowrap rounded-lg px-3 py-1.5 text-sm font-medium text-slate-600 hover:bg-slate-100">Appointments</a>
        </nav>
    </header>

    {{-- ===================== MAIN ===================== --}}
    <main class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8">

        {{-- Page header --}}
        <div class="flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">
            <div>
                <p class="text-xs font-semibold uppercase tracking-widest text-emerald-600">{{ now()->format('l, F j, Y') }}</p>
                <h1 class="mt-1 font-['Plus_Jakarta_Sans'] text-2xl font-extrabold tracking-tight text-slate-900 sm:text-3xl">
                    Clinic Operations &amp; Management
                </h1>
                <p class="mt-1.5 max-w-2xl text-sm text-slate-500">
                    Real-time overview of medical staff, registered patients, and appointment queues.
                </p>
            </div>

            <a href="{{ route('admin.doctors.create') }}"
               class="inline-flex shrink-0 items-center justify-center gap-2 rounded-xl bg-emerald-600 px-5 py-3 text-sm font-semibold text-white shadow-lg shadow-emerald-600/25 transition hover:bg-emerald-700 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:ring-offset-2">
                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
                </svg>
                Onboard New Doctor
            </a>
        </div>

        {{-- Metrics grid --}}
        <section class="mt-8 grid grid-cols-1 gap-5 sm:grid-cols-2 xl:grid-cols-4" aria-label="Key metrics">

            {{-- Active Doctors --}}
            <div class="relative overflow-hidden rounded-2xl border border-slate-200 bg-white p-6 shadow-sm shadow-slate-900/5 transition hover:-translate-y-0.5 hover:shadow-md">
                <div class="flex items-start justify-between">
                    <div>
                        <p class="text-sm font-medium text-slate-500">Active Doctors</p>
                        <p class="mt-3 font-['Plus_Jakarta_Sans'] text-4xl font-extrabold tracking-tight text-slate-900">{{ number_format($totalDoctors) }}</p>
                    </div>
                    <span class="flex h-12 w-12 items-center justify-center rounded-xl bg-emerald-50 text-emerald-600 ring-1 ring-inset ring-emerald-600/10">
                        {{-- Stethoscope --}}
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 3v6a4 4 0 008 0V3M6 3H5M6 3h1m7 0h1m-1 0h-1m-3 10v1.5a4.5 4.5 0 009 0V13m0 0a2 2 0 100-4 2 2 0 000 4z"/>
                        </svg>
                    </span>
                </div>
                <p class="mt-4 text-xs text-slate-400">Medical staff on the platform</p>
            </div>

            {{-- Registered Patients --}}
            <div class="relative overflow-hidden rounded-2xl border border-slate-200 bg-white p-6 shadow-sm shadow-slate-900/5 transition hover:-translate-y-0.5 hover:shadow-md">
                <div class="flex items-start justify-between">
                    <div>
                        <p class="text-sm font-medium text-slate-500">Registered Patients</p>
                        <p class="mt-3 font-['Plus_Jakarta_Sans'] text-4xl font-extrabold tracking-tight text-slate-900">{{ number_format($totalPatients) }}</p>
                    </div>
                    <span class="flex h-12 w-12 items-center justify-center rounded-xl bg-sky-50 text-sky-500 ring-1 ring-inset ring-sky-400/20">
                        {{-- User group --}}
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                        </svg>
                    </span>
                </div>
                <p class="mt-4 text-xs text-slate-400">Patients with active accounts</p>
            </div>

            {{-- Today's Appointments (accent) --}}
            <div class="relative overflow-hidden rounded-2xl border border-emerald-600 bg-gradient-to-br from-emerald-600 to-emerald-700 p-6 shadow-lg shadow-emerald-600/25 transition hover:-translate-y-0.5">
                <div class="pointer-events-none absolute -right-8 -top-8 h-32 w-32 rounded-full bg-white/10"></div>
                <div class="pointer-events-none absolute -bottom-10 -right-2 h-24 w-24 rounded-full bg-sky-400/20"></div>
                <div class="relative flex items-start justify-between">
                    <div>
                        <p class="text-sm font-medium text-emerald-50">Today's Appointments</p>
                        <p class="mt-3 font-['Plus_Jakarta_Sans'] text-4xl font-extrabold tracking-tight text-white">{{ number_format($todayAppointmentsCount) }}</p>
                    </div>
                    <span class="flex h-12 w-12 items-center justify-center rounded-xl bg-white/15 text-white ring-1 ring-inset ring-white/25">
                        {{-- Calendar clock --}}
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3M4 11h16M5 5h14a1 1 0 011 1v6M4 6v13a1 1 0 001 1h6M4 6a1 1 0 011-1m11 15a4 4 0 100-8 4 4 0 000 8zm0-6v2l1.5 1"/>
                        </svg>
                    </span>
                </div>
                <p class="relative mt-4 inline-flex items-center gap-1.5 text-xs font-medium text-emerald-50">
                    <span class="h-1.5 w-1.5 animate-pulse rounded-full bg-sky-300"></span>
                    Scheduled for {{ now()->format('M d') }}
                </p>
            </div>

            {{-- Total Consultations --}}
            <div class="relative overflow-hidden rounded-2xl border border-slate-200 bg-white p-6 shadow-sm shadow-slate-900/5 transition hover:-translate-y-0.5 hover:shadow-md">
                <div class="flex items-start justify-between">
                    <div>
                        <p class="text-sm font-medium text-slate-500">Total Consultations</p>
                        <p class="mt-3 font-['Plus_Jakarta_Sans'] text-4xl font-extrabold tracking-tight text-slate-900">{{ number_format($totalAppointmentsCount) }}</p>
                    </div>
                    <span class="flex h-12 w-12 items-center justify-center rounded-xl bg-slate-100 text-slate-600 ring-1 ring-inset ring-slate-900/5">
                        {{-- Clipboard check --}}
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/>
                        </svg>
                    </span>
                </div>
                <p class="mt-4 text-xs text-slate-400">All-time bookings recorded</p>
            </div>
        </section>

        {{-- Quick actions --}}
        <section class="mt-8 rounded-2xl border border-slate-200 bg-white p-6 shadow-sm shadow-slate-900/5" aria-labelledby="quick-actions-title">
            <div class="flex items-center justify-between">
                <div>
                    <h2 id="quick-actions-title" class="font-['Plus_Jakarta_Sans'] text-lg font-bold text-slate-900">Quick Management Actions</h2>
                    <p class="mt-0.5 text-sm text-slate-500">Jump straight to the tasks you perform most often.</p>
                </div>
            </div>

            <div class="mt-5 grid grid-cols-1 gap-3 sm:grid-cols-2 lg:grid-cols-4">

                <a href="{{ route('admin.doctors.create') }}"
                   class="group flex items-center gap-3 rounded-xl border border-emerald-200 bg-emerald-50/60 p-4 transition hover:border-emerald-300 hover:bg-emerald-50">
                    <span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-emerald-600 text-white shadow-sm">
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.2" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/></svg>
                    </span>
                    <span class="text-sm font-semibold text-emerald-800">+ Add New Doctor</span>
                </a>

                <a href="{{ route('admin.doctors.index') }}"
                   class="group flex items-center gap-3 rounded-xl border border-slate-200 bg-white p-4 transition hover:border-sky-300 hover:bg-sky-50/50">
                    <span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-sky-50 text-sky-500 ring-1 ring-inset ring-sky-400/20 transition group-hover:bg-sky-100">
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/></svg>
                    </span>
                    <span class="text-sm font-semibold text-slate-700">View All Doctors</span>
                </a>

                <a href="{{ $settingsUrl }}"
                   class="group flex items-center gap-3 rounded-xl border border-slate-200 bg-white p-4 transition hover:border-sky-300 hover:bg-sky-50/50">
                    <span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-sky-50 text-sky-500 ring-1 ring-inset ring-sky-400/20 transition group-hover:bg-sky-100">
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                    </span>
                    <span class="text-sm font-semibold text-slate-700">Clinic Settings &amp; Specialties</span>
                </a>

                <a href="{{ $reportUrl }}"
                   class="group flex items-center gap-3 rounded-xl border border-slate-200 bg-white p-4 transition hover:border-sky-300 hover:bg-sky-50/50">
                    <span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-sky-50 text-sky-500 ring-1 ring-inset ring-sky-400/20 transition group-hover:bg-sky-100">
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M12 10v6m0 0l-3-3m3 3l3-3M3 17v2a2 2 0 002 2h14a2 2 0 002-2v-2M16 4H8a2 2 0 00-2 2v6"/></svg>
                    </span>
                    <span class="text-sm font-semibold text-slate-700">Download Monthly Summary <span class="font-medium text-slate-400">(PDF/CSV)</span></span>
                </a>
            </div>
        </section>

        {{-- Recent appointments --}}
        <section class="mt-8 overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm shadow-slate-900/5" aria-labelledby="recent-title">
            <div class="flex flex-col gap-2 border-b border-slate-100 px-6 py-5 sm:flex-row sm:items-center sm:justify-between">
                <div>
                    <h2 id="recent-title" class="font-['Plus_Jakarta_Sans'] text-lg font-bold text-slate-900">Recent Clinic Bookings</h2>
                    <p class="mt-0.5 text-sm text-slate-500">The latest appointments scheduled across all doctors.</p>
                </div>
                <a href="{{ $appointmentsUrl }}"
                   class="inline-flex items-center gap-1 text-sm font-semibold text-emerald-600 transition hover:text-emerald-700">
                    View All
                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.2" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
                </a>
            </div>

            @if ($recentAppointments->isEmpty())
                <div class="flex flex-col items-center justify-center px-6 py-16 text-center">
                    <span class="flex h-16 w-16 items-center justify-center rounded-2xl bg-slate-100 text-slate-400">
                        <svg class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.6" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3M4 11h16M5 5h14a1 1 0 011 1v13a1 1 0 01-1 1H5a1 1 0 01-1-1V6a1 1 0 011-1z"/>
                        </svg>
                    </span>
                    <h3 class="mt-4 font-['Plus_Jakarta_Sans'] text-base font-bold text-slate-800">No recent appointments recorded</h3>
                    <p class="mt-1 max-w-sm text-sm text-slate-500">New bookings will appear here as soon as patients start scheduling consultations.</p>
                </div>
            @else
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-slate-100">
                        <thead class="bg-slate-50/70">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-[11px] font-semibold uppercase tracking-wider text-slate-500">Token &amp; Ref Number</th>
                                <th scope="col" class="px-6 py-3 text-left text-[11px] font-semibold uppercase tracking-wider text-slate-500">Patient</th>
                                <th scope="col" class="px-6 py-3 text-left text-[11px] font-semibold uppercase tracking-wider text-slate-500">Assigned Doctor</th>
                                <th scope="col" class="px-6 py-3 text-left text-[11px] font-semibold uppercase tracking-wider text-slate-500">Date &amp; Time</th>
                                <th scope="col" class="px-6 py-3 text-left text-[11px] font-semibold uppercase tracking-wider text-slate-500">Status</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100 bg-white">
                            @foreach ($recentAppointments as $apt)
                                @php
                                    $statusKey   = strtolower((string) $apt->status);
                                    $badgeClass  = $statusStyles[$statusKey] ?? 'bg-slate-100 text-slate-600 ring-slate-500/20';
                                    $dotClass    = $statusDots[$statusKey] ?? 'bg-slate-400';
                                    $patientName = $apt->patient?->name ?? 'Unknown patient';
                                    $patientInit = mb_strtoupper(mb_substr($patientName, 0, 1));
                                @endphp
                                <tr class="transition hover:bg-slate-50/70">
                                    {{-- Token & ref --}}
                                    <td class="whitespace-nowrap px-6 py-4">
                                        <div class="flex items-center gap-3">
                                            <span class="inline-flex h-9 min-w-[2.5rem] items-center justify-center rounded-lg bg-emerald-50 px-2 text-sm font-bold text-emerald-700 ring-1 ring-inset ring-emerald-600/10">
                                                #{{ $apt->token_number }}
                                            </span>
                                            <span class="font-mono text-xs text-slate-500">{{ $apt->appointment_number }}</span>
                                        </div>
                                    </td>

                                    {{-- Patient --}}
                                    <td class="whitespace-nowrap px-6 py-4">
                                        <div class="flex items-center gap-3">
                                            <span class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full bg-sky-100 text-sm font-bold text-sky-700">{{ $patientInit }}</span>
                                            <div class="min-w-0">
                                                <p class="truncate text-sm font-semibold text-slate-900">{{ $apt->patient?->name ?? 'Unknown patient' }}</p>
                                                <p class="truncate text-xs text-slate-500">{{ $apt->patient?->email ?? '—' }}</p>
                                            </div>
                                        </div>
                                    </td>

                                    {{-- Doctor --}}
                                    <td class="whitespace-nowrap px-6 py-4">
                                        <p class="text-sm font-semibold text-slate-900">Dr. {{ $apt->doctor?->user?->name ?? 'Unassigned' }}</p>
                                        <p class="text-xs text-slate-500">{{ $apt->doctor?->specialization ?? 'General Practice' }}</p>
                                    </td>

                                    {{-- Date & time --}}
                                    <td class="whitespace-nowrap px-6 py-4">
                                        <p class="text-sm font-medium text-slate-800">
                                            {{ $apt->appointment_date ? date('M d, Y', strtotime($apt->appointment_date)) : '—' }}
                                        </p>
                                        <p class="text-xs text-slate-500">
                                            {{ $apt->appointment_time ? date('h:i A', strtotime($apt->appointment_time)) : '—' }}
                                        </p>
                                    </td>

                                    {{-- Status --}}
                                    <td class="whitespace-nowrap px-6 py-4">
                                        <span class="inline-flex items-center gap-1.5 rounded-full px-2.5 py-1 text-xs font-semibold ring-1 ring-inset {{ $badgeClass }}">
                                            <span class="h-1.5 w-1.5 rounded-full {{ $dotClass }}"></span>
                                            {{ ucfirst($apt->status) }}
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </section>

        {{-- Footer --}}
        <footer class="mt-10 flex flex-col items-center justify-between gap-2 border-t border-slate-200 pt-6 text-xs text-slate-400 sm:flex-row">
            <p>&copy; {{ date('Y') }} Family Care CAMS &middot; MediCare24. All rights reserved.</p>
            <p class="inline-flex items-center gap-1.5">
                <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span>
                All systems operational
            </p>
        </footer>
    </main>
</body>
</html>
