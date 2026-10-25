<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin Dashboard · Family Care CAMS</title>

    {{-- Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@500;600;700;800&display=swap" rel="stylesheet">

    {{-- Alpine.js data registrations — MUST precede @vite so alpine:init fires in time --}}
    <script>
        document.addEventListener('alpine:init', () => {

            /* ── Count-up number animation ── */
            Alpine.data('countUp', (target, delay, duration) => ({
                display: '0',
                _delay:    delay    != null ? delay    : 400,
                _duration: duration != null ? duration : 1400,
                init() {
                    if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
                        this.display = (+target).toLocaleString(); return;
                    }
                    setTimeout(() => {
                        const t0   = performance.now();
                        const step = (now) => {
                            const t      = Math.min((now - t0) / this._duration, 1);
                            const eased  = 1 - Math.pow(1 - t, 3); /* cubic ease-out */
                            this.display = Math.round(eased * (+target)).toLocaleString();
                            if (t < 1) requestAnimationFrame(step);
                            else this.display = (+target).toLocaleString();
                        };
                        requestAnimationFrame(step);
                    }, this._delay);
                }
            }));

            /* ── Live clock + time-aware greeting ── */
            Alpine.data('clock', () => ({
                time: '--:--:--', greeting: 'Hello', emoji: '☀️', date: '',
                init() { this.tick(); setInterval(() => this.tick(), 1000); },
                tick() {
                    const now = new Date(), h = now.getHours();
                    this.emoji    = h < 12 ? '☀️' : h < 17 ? '🌤️' : '🌙';
                    this.greeting = h < 12 ? 'Good morning' : h < 17 ? 'Good afternoon' : 'Good evening';
                    this.time     = now.toLocaleTimeString('en-US', { hour: '2-digit', minute: '2-digit', second: '2-digit' });
                    this.date     = now.toLocaleDateString('en-US', { weekday: 'long', month: 'long', day: 'numeric', year: 'numeric' });
                }
            }));

            /* ── Notification bell shake ── */
            Alpine.data('bell', (hasPending) => ({
                ringing: false,
                init() {
                    if (hasPending && !window.matchMedia('(prefers-reduced-motion: reduce)').matches)
                        setTimeout(() => this.ring(), 2200);
                },
                ring() {
                    if (this.ringing) return;
                    this.ringing = true; setTimeout(() => this.ringing = false, 900);
                }
            }));
        });
    </script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        /* ── Fonts ──────────────────────────────────────────── */
        body { font-family: 'Inter', sans-serif; }
        .font-jakarta { font-family: 'Plus Jakarta Sans', sans-serif; }

        /* ── Animated background blobs ──────────────────────── */
        @keyframes blob1 {
            0%,100% { transform:translate(0,0) scale(1); }
            33%     { transform:translate(45px,-35px) scale(1.08); }
            66%     { transform:translate(-25px,40px) scale(.93); }
        }
        @keyframes blob2 {
            0%,100% { transform:translate(0,0) scale(1); }
            33%     { transform:translate(-38px,28px) scale(.96); }
            66%     { transform:translate(32px,-38px) scale(1.07); }
        }
        @keyframes blob3 {
            0%,100% { transform:translate(0,0) scale(1); }
            50%     { transform:translate(-30px,-20px) scale(1.06); }
        }
        .blob1 { animation: blob1 24s ease-in-out infinite; }
        .blob2 { animation: blob2 28s ease-in-out infinite; }
        .blob3 { animation: blob3 20s ease-in-out infinite; }

        /* ── Staggered page-load fade-up ───────────────────── */
        @keyframes fadeUp {
            from { opacity:0; transform:translateY(22px); }
            to   { opacity:1; transform:translateY(0);    }
        }
        .fade-up { animation: fadeUp .55s cubic-bezier(.4,0,.2,1) both; }

        /* ── ECG / heartbeat path draw ──────────────────────── */
        @keyframes ecgDraw {
            from { stroke-dashoffset: 1400; }
            to   { stroke-dashoffset: 0;    }
        }
        .ecg-path { animation: ecgDraw 3.2s ease-out both .7s; }

        /* ── Today card breathing glow ──────────────────────── */
        @keyframes breatheGlow {
            0%,100% { box-shadow: 0 0 0 0   rgba(251,191,36,.38); }
            50%     { box-shadow: 0 0 0 16px rgba(251,191,36,0);   }
        }
        .breathe { animation: breatheGlow 2.8s ease-in-out infinite; }

        /* ── Live ping dot ──────────────────────────────────── */
        @keyframes livePing {
            0%   { transform:scale(1);   opacity:.75; }
            100% { transform:scale(2.8); opacity:0;   }
        }
        .ping { animation: livePing 1.8s ease-out infinite; }

        /* ── Bar-fill (scaleX from left) ────────────────────── */
        @keyframes barFill {
            from { transform:scaleX(0); }
            to   { transform:scaleX(1); }
        }
        .bar-fill {
            transform-origin:left;
            transform:scaleX(0);
            animation: barFill 1.1s cubic-bezier(.4,0,.2,1) both;
        }

        /* ── Donut arc reveal (via CSS custom prop) ─────────── */
        @keyframes donutReveal { to { stroke-dashoffset: var(--donut-end); } }
        .donut-arc { animation: donutReveal 1.7s cubic-bezier(.4,0,.2,1) both .9s; }

        /* ── Table row slide-in ─────────────────────────────── */
        @keyframes rowSlide {
            from { opacity:0; transform:translateX(-10px); }
            to   { opacity:1; transform:translateX(0);      }
        }
        .row-in { animation: rowSlide .4s cubic-bezier(.4,0,.2,1) both; }

        /* ── Primary button shine sweep ─────────────────────── */
        @keyframes shineSweep {
            from { left:-60%; }
            to   { left:130%; }
        }
        .btn-shine { position:relative; overflow:hidden; }
        .btn-shine::after {
            content:''; position:absolute; top:0; left:-60%;
            width:40%; height:100%;
            background:linear-gradient(90deg,transparent,rgba(255,255,255,.28),transparent);
            transform:skewX(-20deg);
            animation: shineSweep 2.6s ease-in-out infinite 1.2s;
        }

        /* ── Notification bell ring ─────────────────────────── */
        @keyframes bellRing {
            0%,100% { transform:rotate(0);    }
            10%     { transform:rotate(14deg); }
            20%     { transform:rotate(-12deg);}
            30%     { transform:rotate(9deg);  }
            40%     { transform:rotate(-7deg); }
            50%     { transform:rotate(5deg);  }
            65%     { transform:rotate(-3deg); }
            80%     { transform:rotate(2deg);  }
        }
        .bell-ring { animation: bellRing .9s ease-out; }

        /* ── Empty-state float bob ──────────────────────────── */
        @keyframes floatBob {
            0%,100% { transform:translateY(0);    }
            50%     { transform:translateY(-10px); }
        }
        .float-bob { animation: floatBob 3.2s ease-in-out infinite; }

        /* ── Sidebar ────────────────────────────────────────── */
        .sidebar-glass {
            background: rgba(255,255,255,.88);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(255,255,255,.65);
            box-shadow: 0 20px 60px rgba(148,163,184,.22), 0 4px 16px rgba(148,163,184,.12);
        }

        /* ── Card glow on hover ─────────────────────────────── */
        .glow-emerald:hover { box-shadow:0 8px 32px rgba(16,185,129,.18),0 2px 8px rgba(15,23,42,.06); }
        .glow-sky:hover     { box-shadow:0 8px 32px rgba(56,189,248,.18),0 2px 8px rgba(15,23,42,.06); }
        .glow-amber:hover   { box-shadow:0 8px 32px rgba(251,191,36,.22),0 2px 8px rgba(15,23,42,.06); }
        .glow-violet:hover  { box-shadow:0 8px 32px rgba(139,92,246,.18),0 2px 8px rgba(15,23,42,.06); }

        /* ── Quick-action arrow slide ────────────────────────── */
        .tile-arrow { transition:transform .18s ease; }
        .action-tile:hover .tile-arrow { transform:translateX(5px); }

        /* ── Nav active state ───────────────────────────────── */
        .nav-active { background:rgba(16,185,129,.10); }

        /* ── Header glass ───────────────────────────────────── */
        .topbar-glass {
            background: rgba(255,255,255,.80);
            backdrop-filter: blur(18px);
            -webkit-backdrop-filter: blur(18px);
            border: 1px solid rgba(255,255,255,.65);
            box-shadow: 0 4px 24px rgba(148,163,184,.14);
        }

        /* ── prefers-reduced-motion ─────────────────────────── */
        @media (prefers-reduced-motion: reduce) {
            *, *::before, *::after {
                animation-duration: .01ms !important;
                animation-iteration-count: 1 !important;
                transition-duration: .01ms !important;
            }
        }
    </style>
</head>

{{-- ═══════════════════════════════════════════════════════════
     BODY — x-data handles mobile drawer
══════════════════════════════════════════════════════════════ --}}
<body class="min-h-screen bg-slate-50 antialiased overflow-x-hidden"
      x-data="{ mobileOpen: false }">

@php
    /* ── Route URLs (safe fallbacks) ── */
    $appointmentsUrl = Route::has('admin.appointments.index') ? route('admin.appointments.index') : '#';
    $settingsUrl     = Route::has('admin.settings.index')     ? route('admin.settings.index')     : '#';
    $reportUrl       = Route::has('admin.reports.monthly')    ? route('admin.reports.monthly')    : '#';

    /* ── Admin identity ── */
    $adminName = Auth::user()->name ?? 'Administrator';
    $firstName = explode(' ', trim($adminName))[0];
    $initials  = collect(explode(' ', trim($adminName)))
                    ->filter()->take(2)
                    ->map(fn($p) => mb_strtoupper(mb_substr($p, 0, 1)))
                    ->implode('');

    /* ── Appointment breakdown ── */
    $aptCount       = $recentAppointments->count();
    $aptDenom       = max($aptCount, 1);
    $confirmedCount = $recentAppointments->where('status', 'confirmed')->count();
    $completedCount = $recentAppointments->where('status', 'completed')->count();
    $cancelledCount = $recentAppointments->where('status', 'cancelled')->count();
    $pendingCount   = $recentAppointments->where('status', 'pending')->count();

    /* ── Donut chart (today's vs total) ── */
    $donutR    = 52;
    $donutCirc = round(2 * M_PI * $donutR, 2);           // ≈ 326.73
    $fraction  = $totalAppointmentsCount > 0
                    ? min($todayAppointmentsCount / $totalAppointmentsCount, 1)
                    : 0;
    $donutFill = round($fraction * $donutCirc, 2);
    $donutEnd  = round($donutCirc - $donutFill, 2);       // target stroke-dashoffset

    /* ── Status badge palette ── */
    $statusMap = [
        'confirmed' => ['bg'=>'bg-emerald-50','text'=>'text-emerald-700','dot'=>'bg-emerald-500','border'=>'border-emerald-200'],
        'completed' => ['bg'=>'bg-blue-50',   'text'=>'text-blue-700',   'dot'=>'bg-blue-500',   'border'=>'border-blue-200'],
        'cancelled' => ['bg'=>'bg-red-50',    'text'=>'text-red-600',    'dot'=>'bg-red-500',    'border'=>'border-red-200'],
        'pending'   => ['bg'=>'bg-amber-50',  'text'=>'text-amber-700',  'dot'=>'bg-amber-500',  'border'=>'border-amber-200'],
    ];

    /* ── Avatar colour palette (seeded by initial) ── */
    $avatarPalette = ['bg-emerald-500','bg-sky-500','bg-violet-500','bg-amber-500','bg-rose-500','bg-cyan-500','bg-indigo-500'];
@endphp

{{-- ═══ ANIMATED BACKGROUND BLOBS ═══════════════════════════ --}}
<div class="fixed inset-0 z-0 overflow-hidden pointer-events-none" aria-hidden="true">
    <div class="blob1 absolute -top-44 -left-36 w-[640px] h-[640px] rounded-full bg-emerald-300/20 blur-3xl"></div>
    <div class="blob2 absolute top-1/2 -right-44 w-[520px] h-[520px] rounded-full bg-sky-300/15 blur-3xl"></div>
    <div class="blob3 absolute -bottom-52 left-1/3 w-[420px] h-[420px] rounded-full bg-violet-300/10 blur-3xl"></div>
</div>

{{-- ═══ DESKTOP FLOATING SIDEBAR (icon-only → expands on hover) ═══ --}}
<aside x-data="{ wide: false }"
       @mouseenter="wide = true"
       @mouseleave="wide = false"
       :class="wide ? 'w-60' : 'w-[72px]'"
       class="sidebar-glass fixed top-4 left-4 bottom-4 z-40 hidden lg:flex flex-col
              rounded-2xl transition-all duration-300 ease-out overflow-hidden"
       aria-label="Primary navigation">

    {{-- Brand logo ----------------------------------------- --}}
    <div class="flex-shrink-0 flex items-center gap-3 h-[68px] px-[17px] border-b border-slate-100/70">
        <a href="{{ url('/') }}" class="flex items-center gap-3 min-w-0 group" title="Family Care CAMS">
            <span class="flex-shrink-0 w-9 h-9 rounded-xl bg-gradient-to-br from-emerald-500 to-emerald-700 flex items-center justify-center shadow-md shadow-emerald-500/30 group-hover:scale-105 transition-transform duration-200">
                <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="#fff" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                </svg>
            </span>
            <div :class="wide ? 'opacity-100' : 'opacity-0 pointer-events-none'" class="transition-opacity duration-200 whitespace-nowrap overflow-hidden">
                <p class="font-jakarta font-extrabold text-[14px] text-slate-800 leading-snug tracking-tight">Family Care</p>
                <p class="text-[9px] font-bold uppercase tracking-[.12em] text-emerald-600">Admin Portal</p>
            </div>
        </a>
    </div>

    {{-- Navigation ----------------------------------------- --}}
    <nav class="flex-1 overflow-y-auto overflow-x-hidden py-3 px-3 space-y-0.5" aria-label="Sidebar">

        {{-- Section: Main --}}
        <p :class="wide ? 'opacity-100' : 'opacity-0'" class="transition-opacity duration-150 px-2 pt-1 pb-2 text-[9px] font-bold uppercase tracking-[.14em] text-slate-400 whitespace-nowrap">Main</p>

        {{-- Dashboard (active) --}}
        <a href="{{ route('admin.dashboard') }}" title="Dashboard" aria-current="page"
           class="nav-active group relative flex items-center gap-3 px-[9px] py-2.5 rounded-xl text-emerald-700 font-semibold transition-all duration-150">
            <span class="absolute left-0 top-1/2 -translate-y-1/2 w-[3px] h-6 rounded-full bg-emerald-500"></span>
            <span class="flex-shrink-0 w-9 h-9 rounded-lg bg-emerald-500 flex items-center justify-center shadow-md shadow-emerald-500/28 group-hover:scale-105 transition-transform">
                <svg width="17" height="17" fill="none" viewBox="0 0 24 24" stroke="#fff" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                </svg>
            </span>
            <span :class="wide ? 'opacity-100' : 'opacity-0 pointer-events-none'" class="transition-opacity duration-150 text-sm whitespace-nowrap overflow-hidden">Dashboard</span>
        </a>

        {{-- Manage Doctors --}}
        <a href="{{ route('admin.doctors.index') }}" title="Manage Doctors"
           class="group flex items-center gap-3 px-[9px] py-2.5 rounded-xl text-slate-500 font-medium hover:bg-slate-100/70 hover:text-slate-700 transition-all duration-150">
            <span class="flex-shrink-0 w-9 h-9 rounded-lg bg-slate-100 flex items-center justify-center group-hover:bg-slate-200 group-hover:scale-105 transition-all">
                <svg width="17" height="17" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                </svg>
            </span>
            <span :class="wide ? 'opacity-100' : 'opacity-0 pointer-events-none'" class="transition-opacity duration-150 text-sm whitespace-nowrap overflow-hidden">Manage Doctors</span>
        </a>

        {{-- Appointments --}}
        <a href="{{ $appointmentsUrl }}" title="Appointments"
           class="group flex items-center gap-3 px-[9px] py-2.5 rounded-xl text-slate-500 font-medium hover:bg-slate-100/70 hover:text-slate-700 transition-all duration-150">
            <span class="flex-shrink-0 relative w-9 h-9 rounded-lg bg-slate-100 flex items-center justify-center group-hover:bg-slate-200 group-hover:scale-105 transition-all">
                <svg width="17" height="17" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M8 7V3m8 4V3M4 11h16M5 5h14a1 1 0 011 1v13a1 1 0 01-1 1H5a1 1 0 01-1-1V6a1 1 0 011-1z"/>
                </svg>
                @if($pendingCount > 0)
                    <span class="absolute -top-1 -right-1 w-4 h-4 rounded-full bg-amber-500 text-white text-[8px] font-bold flex items-center justify-center border-2 border-white">{{ $pendingCount }}</span>
                @endif
            </span>
            <span :class="wide ? 'opacity-100' : 'opacity-0 pointer-events-none'" class="transition-opacity duration-150 text-sm whitespace-nowrap overflow-hidden flex items-center gap-2">
                Appointments
                @if($pendingCount > 0)
                    <span class="px-1.5 py-0.5 rounded-full bg-amber-100 text-amber-700 text-[9px] font-bold">{{ $pendingCount }}</span>
                @endif
            </span>
        </a>

        {{-- Reports --}}
        <a href="{{ $reportUrl }}" title="Reports"
           class="group flex items-center gap-3 px-[9px] py-2.5 rounded-xl text-slate-500 font-medium hover:bg-slate-100/70 hover:text-slate-700 transition-all duration-150">
            <span class="flex-shrink-0 w-9 h-9 rounded-lg bg-slate-100 flex items-center justify-center group-hover:bg-slate-200 group-hover:scale-105 transition-all">
                <svg width="17" height="17" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                </svg>
            </span>
            <span :class="wide ? 'opacity-100' : 'opacity-0 pointer-events-none'" class="transition-opacity duration-150 text-sm whitespace-nowrap overflow-hidden">Reports</span>
        </a>

        {{-- Divider --}}
        <div class="my-2 h-px bg-slate-100 mx-1"></div>
        <p :class="wide ? 'opacity-100' : 'opacity-0'" class="transition-opacity duration-150 px-2 pb-2 text-[9px] font-bold uppercase tracking-[.14em] text-slate-400 whitespace-nowrap">System</p>

        {{-- Clinic Settings --}}
        <a href="{{ $settingsUrl }}" title="Clinic Settings"
           class="group flex items-center gap-3 px-[9px] py-2.5 rounded-xl text-slate-500 font-medium hover:bg-slate-100/70 hover:text-slate-700 transition-all duration-150">
            <span class="flex-shrink-0 w-9 h-9 rounded-lg bg-slate-100 flex items-center justify-center group-hover:bg-slate-200 group-hover:scale-105 transition-all">
                <svg width="17" height="17" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                    <path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                </svg>
            </span>
            <span :class="wide ? 'opacity-100' : 'opacity-0 pointer-events-none'" class="transition-opacity duration-150 text-sm whitespace-nowrap overflow-hidden">Clinic Settings</span>
        </a>

        {{-- My Profile --}}
        @if(Route::has('profile.edit'))
        <a href="{{ route('profile.edit') }}" title="My Profile"
           class="group flex items-center gap-3 px-[9px] py-2.5 rounded-xl text-slate-500 font-medium hover:bg-slate-100/70 hover:text-slate-700 transition-all duration-150">
            <span class="flex-shrink-0 w-9 h-9 rounded-lg bg-slate-100 flex items-center justify-center group-hover:bg-slate-200 group-hover:scale-105 transition-all">
                <svg width="17" height="17" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0z"/>
                </svg>
            </span>
            <span :class="wide ? 'opacity-100' : 'opacity-0 pointer-events-none'" class="transition-opacity duration-150 text-sm whitespace-nowrap overflow-hidden">My Profile</span>
        </a>
        @endif
    </nav>

    {{-- Admin chip + logout -------------------------------- --}}
    <div class="flex-shrink-0 border-t border-slate-100/70 p-3 space-y-2">
        <div class="flex items-center gap-3 rounded-xl bg-slate-50/80 p-2">
            <span class="flex-shrink-0 w-9 h-9 rounded-full bg-gradient-to-br from-emerald-400 to-sky-500 flex items-center justify-center text-white font-bold text-sm shadow-md shadow-emerald-400/20 select-none">{{ $initials }}</span>
            <div :class="wide ? 'opacity-100' : 'opacity-0 pointer-events-none'" class="transition-opacity duration-150 whitespace-nowrap overflow-hidden min-w-0">
                <p class="text-sm font-semibold text-slate-800 truncate">{{ $adminName }}</p>
                <p class="text-[10px] text-slate-400 font-medium uppercase tracking-widest">Administrator</p>
            </div>
        </div>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" title="Sign out"
                    class="w-full flex items-center gap-2.5 px-[9px] py-2 rounded-xl text-slate-400 hover:text-red-600 hover:bg-red-50 transition-all group focus:outline-none focus:ring-2 focus:ring-red-300 focus:ring-offset-1">
                <svg class="flex-shrink-0 group-hover:scale-110 transition-transform" width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                </svg>
                <span :class="wide ? 'opacity-100' : 'opacity-0 pointer-events-none'" class="transition-opacity duration-150 text-xs font-medium whitespace-nowrap overflow-hidden">Sign out</span>
            </button>
        </form>
    </div>
</aside>

{{-- ═══ MOBILE BACKDROP ════════════════════════════════════ --}}
<div x-show="mobileOpen"
     x-cloak
     x-transition:enter="transition ease-out duration-200"
     x-transition:enter-start="opacity-0"
     x-transition:enter-end="opacity-100"
     x-transition:leave="transition ease-in duration-150"
     x-transition:leave-start="opacity-100"
     x-transition:leave-end="opacity-0"
     @click="mobileOpen = false"
     class="fixed inset-0 z-40 bg-slate-900/50 backdrop-blur-sm lg:hidden"
     aria-hidden="true"></div>

{{-- ═══ MOBILE SLIDE-OVER SIDEBAR ══════════════════════════ --}}
<div x-show="mobileOpen"
     x-cloak
     x-transition:enter="transition ease-out duration-300"
     x-transition:enter-start="-translate-x-full"
     x-transition:enter-end="translate-x-0"
     x-transition:leave="transition ease-in duration-200"
     x-transition:leave-start="translate-x-0"
     x-transition:leave-end="-translate-x-full"
     class="fixed inset-y-0 left-0 z-50 w-72 bg-white/96 backdrop-blur-xl border-r border-slate-200/60 shadow-2xl flex flex-col lg:hidden"
     role="dialog" aria-modal="true" aria-label="Mobile navigation">

    <div class="flex items-center justify-between px-5 h-16 border-b border-slate-100 flex-shrink-0">
        <a href="{{ url('/') }}" class="flex items-center gap-2.5">
            <span class="w-8 h-8 rounded-xl bg-gradient-to-br from-emerald-500 to-emerald-700 flex items-center justify-center shadow-md shadow-emerald-500/28">
                <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="#fff" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                </svg>
            </span>
            <div>
                <p class="font-jakarta font-extrabold text-sm text-slate-800">Family Care</p>
                <p class="text-[9px] font-bold uppercase tracking-widest text-emerald-600">Admin Portal</p>
            </div>
        </a>
        <button @click="mobileOpen = false" class="w-8 h-8 rounded-lg hover:bg-slate-100 flex items-center justify-center text-slate-400 hover:text-slate-600 transition-colors focus:outline-none" aria-label="Close menu">
            <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
        </button>
    </div>

    <nav class="flex-1 overflow-y-auto py-4 px-3 space-y-0.5">
        <p class="px-3 pb-2 text-[9px] font-bold uppercase tracking-widest text-slate-400">Main</p>

        <a href="{{ route('admin.dashboard') }}" @click="mobileOpen=false" class="flex items-center gap-3 px-3 py-2.5 rounded-xl bg-emerald-50 text-emerald-700 font-semibold text-sm">
            <span class="w-8 h-8 rounded-lg bg-emerald-500 flex items-center justify-center shadow-sm"><svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="#fff" stroke-width="2.2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg></span>
            Dashboard
        </a>
        <a href="{{ route('admin.doctors.index') }}" @click="mobileOpen=false" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-slate-600 text-sm font-medium hover:bg-slate-50 transition-colors">
            <span class="w-8 h-8 rounded-lg bg-slate-100 flex items-center justify-center"><svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.9"><path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg></span>
            Manage Doctors
        </a>
        <a href="{{ $appointmentsUrl }}" @click="mobileOpen=false" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-slate-600 text-sm font-medium hover:bg-slate-50 transition-colors">
            <span class="w-8 h-8 rounded-lg bg-slate-100 flex items-center justify-center"><svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.9"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3M4 11h16M5 5h14a1 1 0 011 1v13a1 1 0 01-1 1H5a1 1 0 01-1-1V6a1 1 0 011-1z"/></svg></span>
            Appointments
            @if($pendingCount > 0)<span class="ml-auto px-2 py-0.5 rounded-full bg-amber-100 text-amber-700 text-[10px] font-bold">{{ $pendingCount }}</span>@endif
        </a>
        <a href="{{ $reportUrl }}" @click="mobileOpen=false" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-slate-600 text-sm font-medium hover:bg-slate-50 transition-colors">
            <span class="w-8 h-8 rounded-lg bg-slate-100 flex items-center justify-center"><svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.9"><path stroke-linecap="round" stroke-linejoin="round" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg></span>
            Reports
        </a>
        <div class="my-3 h-px bg-slate-100 mx-2"></div>
        <p class="px-3 pb-2 text-[9px] font-bold uppercase tracking-widest text-slate-400">System</p>
        <a href="{{ $settingsUrl }}" @click="mobileOpen=false" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-slate-600 text-sm font-medium hover:bg-slate-50 transition-colors">
            <span class="w-8 h-8 rounded-lg bg-slate-100 flex items-center justify-center"><svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.9"><path stroke-linecap="round" stroke-linejoin="round" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg></span>
            Clinic Settings
        </a>
        @if(Route::has('profile.edit'))
        <a href="{{ route('profile.edit') }}" @click="mobileOpen=false" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-slate-600 text-sm font-medium hover:bg-slate-50 transition-colors">
            <span class="w-8 h-8 rounded-lg bg-slate-100 flex items-center justify-center"><svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.9"><path stroke-linecap="round" stroke-linejoin="round" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0z"/></svg></span>
            My Profile
        </a>
        @endif
    </nav>

    <div class="border-t border-slate-100 p-4 flex-shrink-0">
        <div class="flex items-center gap-3 mb-3">
            <span class="w-10 h-10 rounded-full bg-gradient-to-br from-emerald-400 to-sky-500 flex items-center justify-center text-white font-bold text-sm shadow-md">{{ $initials }}</span>
            <div><p class="font-semibold text-sm text-slate-800">{{ $adminName }}</p><p class="text-xs text-slate-400">Administrator</p></div>
        </div>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="w-full flex items-center justify-center gap-2 px-4 py-2 rounded-xl border border-red-200 text-red-600 text-sm font-medium hover:bg-red-50 transition-colors">
                <svg width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                Sign out
            </button>
        </form>
    </div>
</div>

{{-- ═══════════════════════════════════════════════════════════
     MAIN CONTENT WRAPPER
══════════════════════════════════════════════════════════════ --}}
<div class="relative z-10 lg:ml-[88px] min-h-screen flex flex-col">

    {{-- ─── STICKY TOP HEADER ──────────────────────────── --}}
    <header class="sticky top-0 z-30 fade-up px-4 pt-4 pb-0" style="animation-delay:.04s">
        <div class="topbar-glass rounded-2xl px-5 h-[60px] flex items-center gap-3">

            {{-- Hamburger --}}
            <button @click="mobileOpen = true"
                    class="lg:hidden flex-shrink-0 w-9 h-9 rounded-xl border border-slate-200 bg-white flex items-center justify-center text-slate-500 hover:bg-slate-50 hover:border-slate-300 transition-colors focus:outline-none focus:ring-2 focus:ring-emerald-400"
                    aria-label="Open navigation">
                <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/></svg>
            </button>

            {{-- Page title + live date --}}
            <div class="hidden lg:block flex-1 min-w-0" x-data="clock()">
                <h1 class="font-jakarta font-bold text-[15px] text-slate-800 leading-tight">Clinic Operations</h1>
                <p class="text-[11px] text-slate-400 font-medium leading-none mt-0.5" x-text="date">Loading…</p>
            </div>

            {{-- Global search (visual) --}}
            <div class="hidden sm:flex flex-1 max-w-[220px] items-center gap-2 bg-slate-50/90 border border-slate-200/70 rounded-xl px-3.5 py-2 text-slate-400 cursor-text hover:border-emerald-400/60 hover:bg-white/70 transition-all">
                <svg width="13" height="13" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" class="flex-shrink-0"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35M11 19a8 8 0 100-16 8 8 0 000 16z"/></svg>
                <span class="text-[12.5px]">Search…</span>
            </div>

            {{-- Live clock (mobile / tablet) --}}
            <div class="lg:hidden flex-1 text-right" x-data="clock()">
                <p class="text-xs font-semibold text-slate-600 tabular-nums" x-text="time">--:--:--</p>
            </div>

            {{-- Notification bell --}}
            <div x-data="bell({{ $pendingCount > 0 ? 'true' : 'false' }})" class="relative flex-shrink-0">
                <button @click="ring()"
                        class="relative w-9 h-9 rounded-xl border border-slate-200 bg-white flex items-center justify-center hover:bg-slate-50 hover:border-amber-300 hover:text-amber-600 text-slate-500 transition-all focus:outline-none focus:ring-2 focus:ring-amber-400 focus:ring-offset-1"
                        aria-label="Notifications">
                    <svg :class="ringing ? 'bell-ring' : ''" width="17" height="17" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                    </svg>
                    @if($pendingCount > 0)
                        <span class="absolute -top-1 -right-1 flex h-4 w-4 items-center justify-center">
                            <span class="ping absolute inline-flex h-full w-full rounded-full bg-amber-400 opacity-60"></span>
                            <span class="relative flex h-3.5 w-3.5 rounded-full bg-amber-500 text-white text-[8px] font-bold items-center justify-center border border-white">{{ $pendingCount }}</span>
                        </span>
                    @endif
                </button>
            </div>

            {{-- Onboard Doctor CTA --}}
            <a href="{{ route('admin.doctors.create') }}"
               class="btn-shine flex-shrink-0 inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-gradient-to-r from-emerald-600 to-emerald-500 text-white text-[13px] font-semibold shadow-lg shadow-emerald-500/28 hover:shadow-emerald-500/40 hover:from-emerald-700 hover:to-emerald-600 active:scale-[.97] transition-all focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:ring-offset-2 whitespace-nowrap">
                <svg width="13" height="13" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
                <span class="hidden sm:inline">Onboard Doctor</span>
                <span class="sm:hidden">Add</span>
            </a>
        </div>
    </header>

    {{-- ─── PAGE BODY ─────────────────────────────────── --}}
    <main class="flex-1 px-4 pt-4 pb-8 space-y-5">

        {{-- ══ HERO STRIP: Greeting + Animated ECG ══════ --}}
        <section class="fade-up relative overflow-hidden rounded-3xl border border-emerald-200/40"
                 style="animation-delay:.08s; background:linear-gradient(135deg,#ecfdf5 0%,#f0f9ff 55%,#fdfcfb 100%);"
                 aria-label="Welcome">

            {{-- Decorative circles --}}
            <div class="pointer-events-none absolute -top-24 -right-16 w-64 h-64 rounded-full bg-emerald-200/25 blur-2xl" aria-hidden="true"></div>
            <div class="pointer-events-none absolute -bottom-16 left-20 w-40 h-40 rounded-full bg-sky-200/20 blur-xl" aria-hidden="true"></div>

            <div class="relative z-10 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-6 px-7 py-7">

                {{-- Greeting --}}
                <div class="flex-1 min-w-0" x-data="clock()">
                    <div class="flex items-center gap-2 mb-2">
                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-emerald-100/80 text-emerald-700 text-[11px] font-semibold border border-emerald-200/60">
                            <span class="relative flex h-2 w-2" aria-hidden="true">
                                <span class="ping absolute inline-flex h-full w-full rounded-full bg-emerald-400"></span>
                                <span class="relative inline-flex h-2 w-2 rounded-full bg-emerald-500"></span>
                            </span>
                            Live · Clinic Active
                        </span>
                    </div>
                    <h2 class="font-jakarta font-extrabold text-2xl sm:text-[26px] text-slate-800 leading-tight"
                        x-text="greeting + ', {{ $firstName }} ' + emoji">Hello, {{ $firstName }}! ☀️</h2>
                    <p class="text-slate-500 text-[13.5px] mt-1.5 max-w-md leading-relaxed">Your clinic's operational overview for today. Everything is running smoothly.</p>
                    <div class="mt-3 flex items-center gap-2 text-xs text-slate-400 font-medium">
                        <svg width="13" height="13" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        <span class="tabular-nums" x-text="time">--:--:--</span>
                        <span class="text-slate-300" aria-hidden="true">·</span>
                        <span x-text="date">Loading…</span>
                    </div>
                </div>

                {{-- ECG / Heartbeat SVG --}}
                <div class="flex-shrink-0 w-full sm:w-80 h-[72px] relative" aria-hidden="true">
                    <svg viewBox="0 0 480 80" class="w-full h-full" preserveAspectRatio="none" role="img" aria-label="ECG heartbeat animation">
                        <defs>
                            <linearGradient id="ecgGrad" x1="0%" y1="0%" x2="100%" y2="0%">
                                <stop offset="0%"   stop-color="#10b981" stop-opacity=".1"/>
                                <stop offset="25%"  stop-color="#10b981" stop-opacity=".85"/>
                                <stop offset="75%"  stop-color="#10b981" stop-opacity=".85"/>
                                <stop offset="100%" stop-color="#10b981" stop-opacity=".1"/>
                            </linearGradient>
                        </defs>
                        {{-- Subtle horizontal baseline grid --}}
                        <line x1="0" y1="40" x2="480" y2="40" stroke="#10b981" stroke-width=".5" stroke-opacity=".12" stroke-dasharray="5,7"/>
                        {{-- ECG waveform: 4 complete QRS complexes --}}
                        <path class="ecg-path"
                              d="M0,40 L45,40 L52,38 L56,33 L60,38 L65,40
                                 L68,43 L72,6 L77,58 L81,40
                                 L88,40 L148,40 L155,38 L159,33 L163,38 L168,40
                                 L171,43 L175,6 L180,58 L184,40
                                 L191,40 L251,40 L258,38 L262,33 L266,38 L271,40
                                 L274,43 L278,6 L283,58 L287,40
                                 L294,40 L354,40 L361,38 L365,33 L369,38 L374,40
                                 L377,43 L381,6 L386,58 L390,40
                                 L397,40 L480,40"
                              fill="none"
                              stroke="url(#ecgGrad)"
                              stroke-width="2.2"
                              stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-dasharray="1400"
                              stroke-dashoffset="1400"/>
                    </svg>
                    <p class="absolute bottom-0 right-0 text-[9px] font-bold text-emerald-600/50 uppercase tracking-widest">Heartbeat Monitor</p>
                </div>
            </div>
        </section>

        {{-- ══ KEY METRIC CARDS (4-up) ══════════════════ --}}
        <section class="grid grid-cols-2 lg:grid-cols-4 gap-4" aria-label="Key metrics">

            {{-- Card 1: Active Doctors — emerald --}}
            <div class="fade-up glow-emerald group relative bg-white/80 backdrop-blur-sm rounded-2xl border border-white/60 shadow-sm p-5 cursor-default hover:-translate-y-1.5 transition-all duration-300" style="animation-delay:.13s">
                <div class="absolute inset-0 rounded-2xl bg-gradient-to-br from-emerald-400/12 to-transparent opacity-0 group-hover:opacity-100 transition-opacity pointer-events-none"></div>
                <div class="relative">
                    <div class="flex items-start justify-between mb-4">
                        <span class="w-11 h-11 rounded-xl bg-gradient-to-br from-emerald-500 to-emerald-700 flex items-center justify-center shadow-lg shadow-emerald-500/28 group-hover:rotate-3 group-hover:scale-110 transition-transform duration-300">
                            <svg width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="#fff" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                        </span>
                        <span class="inline-flex items-center gap-1 px-2 py-1 rounded-full bg-emerald-50 text-emerald-700 text-[10px] font-bold border border-emerald-200/60">
                            <svg width="8" height="8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M5 10l7-7m0 0l7 7m-7-7v18"/></svg>
                            Active
                        </span>
                    </div>
                    <div x-data="countUp({{ $totalDoctors }}, 350)">
                        <p class="font-jakarta font-extrabold text-[38px] leading-none text-slate-900" x-text="display">0</p>
                    </div>
                    <p class="text-[13px] font-semibold text-slate-500 mt-2">Active Doctors</p>
                    <div class="mt-3.5 h-1.5 rounded-full bg-slate-100 overflow-hidden">
                        <div class="bar-fill h-full w-3/4 rounded-full bg-gradient-to-r from-emerald-500 to-emerald-400" style="animation-delay:.75s"></div>
                    </div>
                    <p class="text-[11px] text-slate-400 mt-1.5">Medical staff on platform</p>
                </div>
            </div>

            {{-- Card 2: Registered Patients — sky --}}
            <div class="fade-up glow-sky group relative bg-white/80 backdrop-blur-sm rounded-2xl border border-white/60 shadow-sm p-5 cursor-default hover:-translate-y-1.5 transition-all duration-300" style="animation-delay:.18s">
                <div class="absolute inset-0 rounded-2xl bg-gradient-to-br from-sky-400/12 to-transparent opacity-0 group-hover:opacity-100 transition-opacity pointer-events-none"></div>
                <div class="relative">
                    <div class="flex items-start justify-between mb-4">
                        <span class="w-11 h-11 rounded-xl bg-gradient-to-br from-sky-500 to-sky-700 flex items-center justify-center shadow-lg shadow-sky-500/28 group-hover:-rotate-3 group-hover:scale-110 transition-transform duration-300">
                            <svg width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="#fff" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                        </span>
                        <span class="px-2 py-1 rounded-full bg-sky-50 text-sky-700 text-[10px] font-bold border border-sky-200/60">Patients</span>
                    </div>
                    <div x-data="countUp({{ $totalPatients }}, 470)">
                        <p class="font-jakarta font-extrabold text-[38px] leading-none text-slate-900" x-text="display">0</p>
                    </div>
                    <p class="text-[13px] font-semibold text-slate-500 mt-2">Registered Patients</p>
                    <div class="mt-3.5 h-1.5 rounded-full bg-slate-100 overflow-hidden">
                        <div class="bar-fill h-full w-4/5 rounded-full bg-gradient-to-r from-sky-500 to-sky-400" style="animation-delay:.85s"></div>
                    </div>
                    <p class="text-[11px] text-slate-400 mt-1.5">Patients with active accounts</p>
                </div>
            </div>

            {{-- Card 3: Today's Appointments — amber (breathing glow) --}}
            <div class="fade-up glow-amber breathe group relative bg-white/80 backdrop-blur-sm rounded-2xl border border-amber-200/55 shadow-sm p-5 cursor-default hover:-translate-y-1.5 transition-all duration-300" style="animation-delay:.23s">
                <div class="absolute inset-0 rounded-2xl bg-gradient-to-br from-amber-400/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity pointer-events-none"></div>
                <div class="relative">
                    <div class="flex items-start justify-between mb-4">
                        <span class="w-11 h-11 rounded-xl bg-gradient-to-br from-amber-500 to-orange-500 flex items-center justify-center shadow-lg shadow-amber-500/28 group-hover:scale-110 transition-transform duration-300">
                            <svg width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="#fff" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M8 7V3m8 4V3M4 11h16M5 5h14a1 1 0 011 1v13a1 1 0 01-1 1H5a1 1 0 01-1-1V6a1 1 0 011-1z"/>
                            </svg>
                        </span>
                        <span class="inline-flex items-center gap-1.5 px-2 py-1 rounded-full bg-amber-50 text-amber-700 text-[10px] font-bold border border-amber-200/60">
                            <span class="relative flex h-2 w-2" aria-hidden="true">
                                <span class="ping absolute inline-flex h-full w-full rounded-full bg-amber-400"></span>
                                <span class="relative flex h-2 w-2 rounded-full bg-amber-500"></span>
                            </span>
                            Live
                        </span>
                    </div>
                    <div x-data="countUp({{ $todayAppointmentsCount }}, 580)">
                        <p class="font-jakarta font-extrabold text-[38px] leading-none text-slate-900" x-text="display">0</p>
                    </div>
                    <p class="text-[13px] font-semibold text-slate-500 mt-2">Today's Appointments</p>
                    <div class="mt-3.5 h-1.5 rounded-full bg-amber-100 overflow-hidden">
                        <div class="bar-fill h-full w-3/5 rounded-full bg-gradient-to-r from-amber-500 to-amber-400" style="animation-delay:.95s"></div>
                    </div>
                    <p class="text-[11px] text-slate-400 mt-1.5">Scheduled {{ now()->format('M d, Y') }}</p>
                </div>
            </div>

            {{-- Card 4: Total Consultations — violet --}}
            <div class="fade-up glow-violet group relative bg-white/80 backdrop-blur-sm rounded-2xl border border-white/60 shadow-sm p-5 cursor-default hover:-translate-y-1.5 transition-all duration-300" style="animation-delay:.28s">
                <div class="absolute inset-0 rounded-2xl bg-gradient-to-br from-violet-400/12 to-transparent opacity-0 group-hover:opacity-100 transition-opacity pointer-events-none"></div>
                <div class="relative">
                    <div class="flex items-start justify-between mb-4">
                        <span class="w-11 h-11 rounded-xl bg-gradient-to-br from-violet-500 to-purple-700 flex items-center justify-center shadow-lg shadow-violet-500/28 group-hover:rotate-3 group-hover:scale-110 transition-transform duration-300">
                            <svg width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="#fff" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/>
                            </svg>
                        </span>
                        <span class="px-2 py-1 rounded-full bg-violet-50 text-violet-700 text-[10px] font-bold border border-violet-200/60">All-time</span>
                    </div>
                    <div x-data="countUp({{ $totalAppointmentsCount }}, 680)">
                        <p class="font-jakarta font-extrabold text-[38px] leading-none text-slate-900" x-text="display">0</p>
                    </div>
                    <p class="text-[13px] font-semibold text-slate-500 mt-2">Total Consultations</p>
                    <div class="mt-3.5 h-1.5 rounded-full bg-slate-100 overflow-hidden">
                        <div class="bar-fill h-full w-2/3 rounded-full bg-gradient-to-r from-violet-500 to-violet-400" style="animation-delay:1.05s"></div>
                    </div>
                    <p class="text-[11px] text-slate-400 mt-1.5">All-time bookings recorded</p>
                </div>
            </div>
        </section>

        {{-- ══ CLINIC ACTIVITY + QUICK ACTIONS ══════════ --}}
        <div class="grid grid-cols-1 lg:grid-cols-[1fr_310px] gap-5">

            {{-- ─ Clinic Activity: Donut + Status bars ── --}}
            <div class="fade-up bg-white/80 backdrop-blur-sm rounded-2xl border border-white/60 shadow-sm p-6" style="animation-delay:.33s">
                <div class="flex items-center justify-between mb-5">
                    <div>
                        <h2 class="font-jakarta font-bold text-slate-800 text-[15px] flex items-center gap-2">
                            <span class="w-1 h-5 rounded-full bg-gradient-to-b from-emerald-500 to-sky-400"></span>
                            Clinic Activity
                        </h2>
                        <p class="text-xs text-slate-400 mt-0.5 ml-3">Today's bookings vs all-time totals</p>
                    </div>
                </div>

                <div class="flex flex-col sm:flex-row items-start gap-8">

                    {{-- Donut chart (SVG, PHP-computed) --}}
                    <div class="flex-shrink-0 flex flex-col items-center">
                        <div class="relative w-[144px] h-[144px]">
                            <svg viewBox="0 0 128 128" class="w-full h-full" style="transform:rotate(-90deg)" aria-label="Today's bookings donut chart">
                                {{-- Background track --}}
                                <circle cx="64" cy="64" r="{{ $donutR }}" fill="none" stroke="#f1f5f9" stroke-width="14"/>
                                {{-- Animated fill --}}
                                <circle cx="64" cy="64" r="{{ $donutR }}"
                                        fill="none"
                                        stroke="url(#donutGrad)"
                                        stroke-width="14"
                                        stroke-linecap="round"
                                        stroke-dasharray="{{ $donutCirc }}"
                                        stroke-dashoffset="{{ $donutCirc }}"
                                        class="donut-arc"
                                        style="--donut-end:{{ $donutEnd }}"/>
                                <defs>
                                    <linearGradient id="donutGrad" x1="0%" y1="0%" x2="0%" y2="100%">
                                        <stop offset="0%" stop-color="#34d399"/>
                                        <stop offset="100%" stop-color="#10b981"/>
                                    </linearGradient>
                                </defs>
                            </svg>
                            {{-- Centre label --}}
                            <div class="absolute inset-0 flex flex-col items-center justify-center">
                                <p class="font-jakarta font-extrabold text-2xl text-slate-800 leading-none">{{ $todayAppointmentsCount }}</p>
                                <p class="text-[9.5px] text-slate-400 font-bold uppercase tracking-widest mt-0.5">Today</p>
                            </div>
                        </div>
                        <p class="text-xs text-slate-500 font-medium mt-2 text-center">of {{ number_format($totalAppointmentsCount) }} total</p>
                    </div>

                    {{-- Status breakdown bars --}}
                    <div class="flex-1 w-full space-y-4 min-w-0">
                        @php
                            $bars = [
                                ['label'=>'Confirmed', 'count'=>$confirmedCount, 'grad'=>'from-emerald-500 to-emerald-400', 'tag_bg'=>'bg-emerald-50', 'tag_text'=>'text-emerald-700'],
                                ['label'=>'Completed', 'count'=>$completedCount, 'grad'=>'from-blue-500 to-blue-400',     'tag_bg'=>'bg-blue-50',    'tag_text'=>'text-blue-700'],
                                ['label'=>'Pending',   'count'=>$pendingCount,   'grad'=>'from-amber-500 to-amber-400',   'tag_bg'=>'bg-amber-50',   'tag_text'=>'text-amber-700'],
                                ['label'=>'Cancelled', 'count'=>$cancelledCount, 'grad'=>'from-red-500 to-red-400',       'tag_bg'=>'bg-red-50',     'tag_text'=>'text-red-700'],
                            ];
                        @endphp
                        @foreach($bars as $bar)
                            @php $pct = $aptDenom > 0 ? round($bar['count'] / $aptDenom * 100) : 0; @endphp
                            <div>
                                <div class="flex items-center justify-between mb-1.5">
                                    <span class="text-[13px] font-medium text-slate-600">{{ $bar['label'] }}</span>
                                    <div class="flex items-center gap-2">
                                        <span class="font-bold text-[13px] text-slate-800">{{ $bar['count'] }}</span>
                                        <span class="{{ $bar['tag_bg'] }} {{ $bar['tag_text'] }} text-[10px] font-bold px-1.5 py-0.5 rounded-md">{{ $pct }}%</span>
                                    </div>
                                </div>
                                <div class="h-2 rounded-full bg-slate-100 overflow-hidden">
                                    <div class="bar-fill h-full rounded-full bg-gradient-to-r {{ $bar['grad'] }}"
                                         style="width:{{ max($pct, 0) }}%; animation-delay:{{ .65 + $loop->index * .1 }}s"></div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            {{-- ─ Quick Actions panel ──────────────────── --}}
            <div class="fade-up bg-white/80 backdrop-blur-sm rounded-2xl border border-white/60 shadow-sm p-5" style="animation-delay:.38s">
                <h2 class="font-jakarta font-bold text-slate-800 text-[15px] mb-1">Quick Actions</h2>
                <p class="text-xs text-slate-400 mb-4">Jump to the most common tasks</p>

                <div class="space-y-2.5">

                    {{-- Add New Doctor --}}
                    <a href="{{ route('admin.doctors.create') }}"
                       class="action-tile group flex items-center gap-3.5 p-3.5 rounded-xl bg-gradient-to-r from-emerald-50 to-teal-50/60 border border-emerald-200/60 hover:border-emerald-400/70 hover:shadow-md hover:shadow-emerald-500/10 transition-all">
                        <span class="w-10 h-10 rounded-xl bg-emerald-600 flex items-center justify-center flex-shrink-0 shadow-md shadow-emerald-600/28 group-hover:scale-105 transition-transform">
                            <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="#fff" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/></svg>
                        </span>
                        <div class="flex-1 min-w-0">
                            <p class="text-[13px] font-semibold text-emerald-800">Add New Doctor</p>
                            <p class="text-[11px] text-emerald-600/70">Onboard medical staff</p>
                        </div>
                        <svg class="tile-arrow w-4 h-4 text-emerald-500 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
                    </a>

                    {{-- View All Doctors --}}
                    <a href="{{ route('admin.doctors.index') }}"
                       class="action-tile group flex items-center gap-3.5 p-3.5 rounded-xl bg-slate-50/80 border border-slate-200/60 hover:border-sky-400/60 hover:bg-sky-50/50 hover:shadow-md hover:shadow-sky-500/10 transition-all">
                        <span class="w-10 h-10 rounded-xl bg-sky-500 flex items-center justify-center flex-shrink-0 shadow-md shadow-sky-500/28 group-hover:scale-105 transition-transform">
                            <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 6h16M4 12h16M4 18h16"/></svg>
                        </span>
                        <div class="flex-1 min-w-0">
                            <p class="text-[13px] font-semibold text-slate-700">View All Doctors</p>
                            <p class="text-[11px] text-slate-400">Manage medical staff</p>
                        </div>
                        <svg class="tile-arrow w-4 h-4 text-slate-400 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
                    </a>

                    {{-- Clinic Settings & Specialties --}}
                    <a href="{{ $settingsUrl }}"
                       class="action-tile group flex items-center gap-3.5 p-3.5 rounded-xl bg-slate-50/80 border border-slate-200/60 hover:border-violet-400/60 hover:bg-violet-50/50 hover:shadow-md hover:shadow-violet-500/10 transition-all">
                        <span class="w-10 h-10 rounded-xl bg-violet-500 flex items-center justify-center flex-shrink-0 shadow-md shadow-violet-500/28 group-hover:scale-105 transition-transform">
                            <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        </span>
                        <div class="flex-1 min-w-0">
                            <p class="text-[13px] font-semibold text-slate-700">Clinic Settings</p>
                            <p class="text-[11px] text-slate-400">Specialties &amp; config</p>
                        </div>
                        <svg class="tile-arrow w-4 h-4 text-slate-400 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
                    </a>

                    {{-- Download Monthly Summary --}}
                    <a href="{{ $reportUrl }}"
                       class="action-tile group flex items-center gap-3.5 p-3.5 rounded-xl bg-slate-50/80 border border-slate-200/60 hover:border-amber-400/60 hover:bg-amber-50/50 hover:shadow-md hover:shadow-amber-500/10 transition-all">
                        <span class="w-10 h-10 rounded-xl bg-amber-500 flex items-center justify-center flex-shrink-0 shadow-md shadow-amber-500/28 group-hover:scale-105 transition-transform">
                            <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                        </span>
                        <div class="flex-1 min-w-0">
                            <p class="text-[13px] font-semibold text-slate-700">Download Summary</p>
                            <p class="text-[11px] text-slate-400">Monthly PDF / CSV report</p>
                        </div>
                        <svg class="tile-arrow w-4 h-4 text-slate-400 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
                    </a>
                </div>
            </div>
        </div>

        {{-- ══ RECENT CLINIC BOOKINGS ═══════════════════ --}}
        <section class="fade-up bg-white/80 backdrop-blur-sm rounded-2xl border border-white/60 shadow-sm overflow-hidden" style="animation-delay:.43s" aria-labelledby="bookings-title">

            {{-- Table header --}}
            <div class="flex items-center justify-between px-6 py-5 border-b border-slate-100/80">
                <div>
                    <h2 id="bookings-title" class="font-jakarta font-bold text-slate-800 text-[15px] flex items-center gap-2">
                        <span class="w-1 h-5 rounded-full bg-gradient-to-b from-violet-500 to-emerald-500" aria-hidden="true"></span>
                        Recent Clinic Bookings
                    </h2>
                    <p class="text-xs text-slate-400 mt-0.5 ml-3">Latest appointments across all doctors</p>
                </div>
                <a href="{{ $appointmentsUrl }}"
                   class="inline-flex items-center gap-1.5 text-[13px] font-semibold text-emerald-600 hover:text-emerald-700 transition-colors group">
                    View All
                    <svg class="w-3.5 h-3.5 group-hover:translate-x-0.5 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
                </a>
            </div>

            {{-- ── Empty state ── --}}
            @if($recentAppointments->isEmpty())
                <div class="flex flex-col items-center justify-center py-20 px-6 text-center">
                    <div class="float-bob mb-6" aria-hidden="true">
                        <svg width="110" height="96" viewBox="0 0 110 96" fill="none">
                            <rect x="14" y="12" width="82" height="68" rx="14" fill="#f0fdf4" stroke="#a7f3d0" stroke-width="2"/>
                            <rect x="27" y="26" width="56" height="8" rx="4" fill="#d1fae5"/>
                            <rect x="27" y="40" width="40" height="6" rx="3" fill="#d1fae5"/>
                            <rect x="27" y="52" width="50" height="6" rx="3" fill="#d1fae5"/>
                            <circle cx="90" cy="20" r="16" fill="#ecfdf5" stroke="#6ee7b7" stroke-width="2.5"/>
                            <path d="M83 20h14M90 13v14" stroke="#10b981" stroke-width="2.8" stroke-linecap="round"/>
                        </svg>
                    </div>
                    <h3 class="font-jakarta font-bold text-slate-700 text-lg">No recent appointments recorded</h3>
                    <p class="text-slate-400 text-[13.5px] mt-2 max-w-xs leading-relaxed">New bookings will appear here once patients start scheduling consultations.</p>
                    <a href="{{ route('admin.doctors.create') }}"
                       class="btn-shine mt-5 inline-flex items-center gap-2 px-5 py-2.5 rounded-xl bg-emerald-600 text-white text-[13px] font-semibold hover:bg-emerald-700 transition-colors shadow-md shadow-emerald-500/20">
                        <svg width="13" height="13" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
                        Onboard a Doctor
                    </a>
                </div>

            @else

                {{-- ── Desktop table ── --}}
                <div class="hidden md:block overflow-x-auto">
                    <table class="min-w-full" role="table">
                        <thead>
                            <tr class="border-b border-slate-100 bg-slate-50/60">
                                <th scope="col" class="px-5 py-3.5 text-left text-[10.5px] font-bold uppercase tracking-[.08em] text-slate-400">Token &amp; Ref</th>
                                <th scope="col" class="px-5 py-3.5 text-left text-[10.5px] font-bold uppercase tracking-[.08em] text-slate-400">Patient</th>
                                <th scope="col" class="px-5 py-3.5 text-left text-[10.5px] font-bold uppercase tracking-[.08em] text-slate-400">Doctor</th>
                                <th scope="col" class="px-5 py-3.5 text-left text-[10.5px] font-bold uppercase tracking-[.08em] text-slate-400">Date &amp; Time</th>
                                <th scope="col" class="px-5 py-3.5 text-left text-[10.5px] font-bold uppercase tracking-[.08em] text-slate-400">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($recentAppointments as $apt)
                                @php
                                    $sk       = strtolower((string)($apt->status ?? ''));
                                    $sty      = $statusMap[$sk] ?? ['bg'=>'bg-slate-50','text'=>'text-slate-600','dot'=>'bg-slate-400','border'=>'border-slate-200'];
                                    $patName  = $apt->patient?->name   ?? 'Unknown Patient';
                                    $patEmail = $apt->patient?->email  ?? '—';
                                    $patInit  = mb_strtoupper(mb_substr($patName, 0, 1));
                                    $docName  = $apt->doctor?->user?->name      ?? 'Unassigned';
                                    $spec     = $apt->doctor?->specialization   ?? 'General Practice';
                                    $aptDate  = !empty($apt->appointment_date)
                                                    ? date('M d, Y', strtotime($apt->appointment_date)) : '—';
                                    $aptTime  = !empty($apt->appointment_time)
                                                    ? date('h:i A', strtotime($apt->appointment_time)) : '—';
                                    $avBg     = $avatarPalette[ord($patInit) % count($avatarPalette)];
                                @endphp
                                <tr class="row-in group border-b border-slate-50 last:border-0 hover:bg-slate-50/50 transition-colors relative"
                                    style="animation-delay:{{ .5 + $loop->index * .07 }}s">

                                    {{-- Token & Ref --}}
                                    <td class="relative px-5 py-4">
                                        <span class="absolute left-0 top-3 bottom-3 w-[3px] rounded-full bg-emerald-500 opacity-0 group-hover:opacity-100 transition-opacity" aria-hidden="true"></span>
                                        <div class="flex items-center gap-2.5">
                                            <span class="inline-flex items-center justify-center min-w-[2.2rem] h-7 px-2 rounded-lg bg-gradient-to-br from-emerald-600 to-teal-600 text-white text-[11px] font-extrabold shadow-sm whitespace-nowrap">
                                                #{{ $apt->token_number }}
                                            </span>
                                            <span class="font-mono text-[11px] text-slate-400 whitespace-nowrap">{{ $apt->appointment_number }}</span>
                                        </div>
                                    </td>

                                    {{-- Patient --}}
                                    <td class="px-5 py-4">
                                        <div class="flex items-center gap-3">
                                            <span class="w-9 h-9 rounded-full {{ $avBg }} text-white text-sm font-bold flex items-center justify-center flex-shrink-0 shadow-sm" aria-hidden="true">{{ $patInit }}</span>
                                            <div class="min-w-0">
                                                <p class="text-[13px] font-semibold text-slate-800 truncate max-w-[130px]">{{ $patName }}</p>
                                                <p class="text-[11px] text-slate-400 truncate max-w-[130px]">{{ $patEmail }}</p>
                                            </div>
                                        </div>
                                    </td>

                                    {{-- Doctor --}}
                                    <td class="px-5 py-4 whitespace-nowrap">
                                        <p class="text-[13px] font-semibold text-slate-800">{{ $docName }}</p>
                                        <span class="inline-block mt-0.5 px-2 py-0.5 rounded-md bg-blue-50 text-blue-700 text-[10.5px] font-semibold border border-blue-100">{{ $spec }}</span>
                                    </td>

                                    {{-- Date & Time --}}
                                    <td class="px-5 py-4 whitespace-nowrap">
                                        <p class="text-[13px] font-medium text-slate-700">{{ $aptDate }}</p>
                                        <p class="text-[11px] text-slate-400 mt-0.5">{{ $aptTime }}</p>
                                    </td>

                                    {{-- Status badge --}}
                                    <td class="px-5 py-4">
                                        @if($sk === 'pending')
                                            <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full text-[11px] font-bold {{ $sty['bg'] }} {{ $sty['text'] }} border {{ $sty['border'] }}">
                                                <span class="relative flex h-2 w-2" aria-hidden="true">
                                                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full {{ $sty['dot'] }} opacity-65"></span>
                                                    <span class="relative flex h-2 w-2 rounded-full {{ $sty['dot'] }}"></span>
                                                </span>
                                                Pending
                                            </span>
                                        @else
                                            <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full text-[11px] font-bold {{ $sty['bg'] }} {{ $sty['text'] }} border {{ $sty['border'] }}">
                                                <span class="w-2 h-2 rounded-full {{ $sty['dot'] }}" aria-hidden="true"></span>
                                                {{ ucfirst($apt->status) }}
                                            </span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                {{-- ── Mobile card list ── --}}
                <div class="md:hidden divide-y divide-slate-100/80">
                    @foreach($recentAppointments as $apt)
                        @php
                            $sk      = strtolower((string)($apt->status ?? ''));
                            $sty     = $statusMap[$sk] ?? ['bg'=>'bg-slate-50','text'=>'text-slate-600','dot'=>'bg-slate-400','border'=>'border-slate-200'];
                            $patName = $apt->patient?->name  ?? 'Unknown Patient';
                            $patInit = mb_strtoupper(mb_substr($patName, 0, 1));
                            $docName = $apt->doctor?->user?->name     ?? 'Unassigned';
                            $spec    = $apt->doctor?->specialization  ?? 'General Practice';
                            $aptDate = !empty($apt->appointment_date) ? date('M d, Y', strtotime($apt->appointment_date)) : '—';
                            $aptTime = !empty($apt->appointment_time) ? date('h:i A', strtotime($apt->appointment_time)) : '—';
                            $avBg    = $avatarPalette[ord($patInit) % count($avatarPalette)];
                        @endphp
                        <div class="row-in p-4" style="animation-delay:{{ .5 + $loop->index * .07 }}s">
                            <div class="flex items-start justify-between gap-3">
                                <div class="flex items-center gap-3 min-w-0">
                                    <span class="w-10 h-10 rounded-full {{ $avBg }} text-white text-sm font-bold flex items-center justify-center flex-shrink-0">{{ $patInit }}</span>
                                    <div class="min-w-0">
                                        <p class="font-semibold text-[13px] text-slate-800 truncate">{{ $patName }}</p>
                                        <p class="text-[11.5px] text-slate-400">Dr. {{ $docName }}</p>
                                    </div>
                                </div>
                                @if($sk === 'pending')
                                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-[11px] font-bold {{ $sty['bg'] }} {{ $sty['text'] }} border {{ $sty['border'] }} flex-shrink-0">
                                        <span class="relative flex h-2 w-2"><span class="animate-ping absolute h-full w-full rounded-full {{ $sty['dot'] }} opacity-65"></span><span class="relative h-2 w-2 rounded-full {{ $sty['dot'] }}"></span></span>
                                        Pending
                                    </span>
                                @else
                                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-[11px] font-bold {{ $sty['bg'] }} {{ $sty['text'] }} border {{ $sty['border'] }} flex-shrink-0">
                                        <span class="w-2 h-2 rounded-full {{ $sty['dot'] }}"></span>
                                        {{ ucfirst($apt->status) }}
                                    </span>
                                @endif
                            </div>
                            <div class="flex items-center gap-4 mt-2.5 ml-[52px]">
                                <span class="flex items-center gap-1.5 text-[11.5px] text-slate-400">
                                    <svg width="11" height="11" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3M4 11h16M5 5h14a1 1 0 011 1v13a1 1 0 01-1 1H5a1 1 0 01-1-1V6a1 1 0 011-1z"/></svg>
                                    {{ $aptDate }} · {{ $aptTime }}
                                </span>
                                <span class="inline-flex items-center min-w-[2rem] h-6 px-2 rounded-lg bg-gradient-to-br from-emerald-600 to-teal-600 text-white text-[10px] font-bold">#{{ $apt->token_number }}</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </section>

        {{-- Footer --}}
        <footer class="fade-up flex flex-col sm:flex-row items-center justify-between gap-2 text-[11.5px] text-slate-400 px-1 pb-2" style="animation-delay:.48s">
            <p>&copy; {{ date('Y') }} Family Care CAMS &middot; MediCare24. All rights reserved.</p>
            <p class="inline-flex items-center gap-1.5">
                <span class="relative flex h-2 w-2" aria-hidden="true">
                    <span class="ping absolute inline-flex h-full w-full rounded-full bg-emerald-400"></span>
                    <span class="relative flex h-2 w-2 rounded-full bg-emerald-500"></span>
                </span>
                All systems operational
            </p>
        </footer>

    </main>
</div>{{-- /main wrapper --}}

</body>
</html>
