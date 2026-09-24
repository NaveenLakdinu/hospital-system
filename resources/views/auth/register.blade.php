<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register — MediCare24</title>

    {{-- Laravel Breeze + Vite + Tailwind setup --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,500;0,600;0,700;0,800;1,700&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">

    <style>
        body { font-family: 'Inter', sans-serif; }
        .font-display { font-family: 'Plus Jakarta Sans', sans-serif; }

        /* ── Floating card animations ────────────────────────────── */
        @keyframes float-a {
            0%, 100% { transform: translateY(0px); }
            50%       { transform: translateY(-12px); }
        }
        @keyframes float-b {
            0%, 100% { transform: translateY(0px) rotate(-2deg); }
            50%       { transform: translateY(-8px) rotate(-2deg); }
        }
        @keyframes float-c {
            0%, 100% { transform: translateY(0px) rotate(1.5deg); }
            50%       { transform: translateY(-10px) rotate(1.5deg); }
        }
        .float-a { animation: float-a 4.5s ease-in-out infinite; }
        .float-b { animation: float-b 5s ease-in-out 0.8s infinite; }
        .float-c { animation: float-c 4s ease-in-out 1.4s infinite; }

        /* ── Step connector pulse ───────────────────────────────── */
        @keyframes step-pulse {
            0%, 100% { opacity: 1; box-shadow: 0 0 0 0 rgba(45,212,191,.5); }
            50%       { opacity: .85; box-shadow: 0 0 0 8px rgba(45,212,191,.0); }
        }
        .step-active { animation: step-pulse 2.4s ease-in-out infinite; }

        /* ── Connector line draw ────────────────────────────────── */
        @keyframes line-grow {
            from { height: 0; }
            to   { height: 100%; }
        }
        .line-grow { animation: line-grow 1s ease-out both; }

        /* ── Notification slide in ──────────────────────────────── */
        @keyframes slide-in-right {
            from { opacity: 0; transform: translateX(24px); }
            to   { opacity: 1; transform: translateX(0); }
        }
        .slide-in { animation: slide-in-right .6s .4s both; }

        /* ── Pill badges entrance ───────────────────────────────── */
        @keyframes fade-pop {
            from { opacity: 0; transform: scale(.8); }
            to   { opacity: 1; transform: scale(1); }
        }
        .pop-1 { animation: fade-pop .4s .1s both; }
        .pop-2 { animation: fade-pop .4s .25s both; }
        .pop-3 { animation: fade-pop .4s .4s both; }

        /* ── Stat fade-up ───────────────────────────────────────── */
        @keyframes fade-up {
            from { opacity: 0; transform: translateY(10px); }
            to   { opacity: 1; transform: translateY(0); }
        }
        .fade-up-1 { animation: fade-up .6s .1s both; }
        .fade-up-2 { animation: fade-up .6s .3s both; }
        .fade-up-3 { animation: fade-up .6s .5s both; }

        /* ── Shimmer sweep ──────────────────────────────────────── */
        @keyframes shimmer {
            0%   { background-position: -700px 0; }
            100% { background-position: 700px 0; }
        }
        .panel-img-wrap::after {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(
                108deg,
                transparent 38%,
                rgba(255,255,255,.05) 50%,
                transparent 62%
            );
            background-size: 700px 100%;
            animation: shimmer 5s linear infinite;
            pointer-events: none;
        }

        /* ── Glassmorphism ──────────────────────────────────────── */
        .glass {
            background: rgba(255,255,255,.07);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid rgba(255,255,255,.13);
        }
        .glass-teal {
            background: rgba(45,212,191,.10);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(45,212,191,.22);
        }

        /* ── Gradient text ──────────────────────────────────────── */
        .gradient-text {
            background: linear-gradient(135deg, #fff 0%, #5eead4 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        /* ── Step connector line ────────────────────────────────── */
        .step-line {
            width: 2px;
            background: linear-gradient(to bottom, #2dd4bf, rgba(45,212,191,.15));
            margin: 0 auto;
        }
    </style>
</head>
<body class="bg-white text-slate-900 antialiased">
<div x-data="{ showPw: false }" class="min-h-screen grid lg:grid-cols-2">

    {{-- ============================================================ --}}
    {{-- LEFT — Brand Panel                                            --}}
    {{-- ============================================================ --}}
    <div class="hidden lg:flex relative flex-col justify-between overflow-hidden text-white"
         style="background: linear-gradient(150deg, #060f1e 0%, #0b1d35 40%, #0d2340 70%, #071529 100%);">

        {{-- ── Full-panel background illustration ──────────────── --}}
        <div class="panel-img-wrap absolute inset-0 z-0">
            <img src="{{ asset('images/register-panel.jpg') }}"
                 alt="MediCare24 Onboarding"
                 class="w-full h-full object-cover object-center"
                 style="opacity: .88; mix-blend-mode: luminosity;">
            {{-- Gradient overlay for text readability --}}
            <div class="absolute inset-0" style="background: linear-gradient(
                to bottom,
                rgba(6,15,30,.60)  0%,
                rgba(6,15,30,.08) 28%,
                rgba(6,15,30,.08) 62%,
                rgba(6,15,30,.82) 100%
            );"></div>
        </div>

        {{-- ── Ambient glow orbs ─────────────────────────────── --}}
        <span class="absolute w-64 h-64 rounded-full bg-teal-400 opacity-15 blur-[100px] -top-12 -left-12 z-0 pointer-events-none"></span>
        <span class="absolute w-56 h-56 rounded-full bg-blue-500 opacity-18 blur-[90px] bottom-16 right-0 z-0 pointer-events-none"></span>
        <span class="absolute w-36 h-36 rounded-full bg-teal-300 opacity-10 blur-[70px] top-[55%] right-16 z-0 pointer-events-none"></span>

        {{-- ── TOP: Logo + badge ──────────────────────────────── --}}
        <a href="{{ url('/') }}" class="relative z-10 flex items-center gap-3 p-10">
            <span class="w-10 h-10 rounded-2xl flex items-center justify-center shadow-lg shadow-teal-500/30"
                  style="background: linear-gradient(135deg, #3b82f6, #14b8a6);">
                <svg class="w-5 h-5 text-white" viewBox="0 0 24 24" fill="none">
                    <path d="M12 2C9 2 6.5 4.5 6.5 7.5C6.5 11 9 13 12 16C15 13 17.5 11 17.5 7.5C17.5 4.5 15 2 12 2Z" fill="currentColor"/>
                    <path d="M4 15C4 19 7.5 22 12 22C16.5 22 20 19 20 15" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
                </svg>
            </span>
            <span class="font-display font-bold text-xl tracking-tight">
                Medi<span class="text-teal-400">Care</span><span class="text-white/80">24</span>
            </span>
            {{-- Free badge --}}
            <span class="ml-2 flex items-center gap-1.5 glass px-2.5 py-1 rounded-full text-[10px] font-bold text-teal-300">
                <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                </svg>
                FREE FOREVER
            </span>
        </a>

        {{-- ── MIDDLE: Onboarding journey cards ──────────────── --}}
        <div class="relative z-10 flex flex-col gap-5 px-10">

            {{-- ── Step progress tracker (glassmorphism card) ─── --}}
            <div class="float-a w-full max-w-[340px] mx-auto glass rounded-2xl p-5 shadow-2xl">
                <div class="text-[11px] font-bold text-teal-400 uppercase tracking-widest mb-4">Your Journey</div>

                {{-- Step 1 — done --}}
                <div class="flex items-center gap-3">
                    <div class="step-active w-8 h-8 rounded-full flex items-center justify-center flex-shrink-0"
                         style="background: linear-gradient(135deg,#2dd4bf,#14b8a6);">
                        <svg class="w-4 h-4 text-slate-900" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/>
                        </svg>
                    </div>
                    <div class="flex-1">
                        <div class="text-xs font-bold text-white">Create Account</div>
                        <div class="text-[10px] text-white/50">Name, email & password</div>
                    </div>
                    <span class="glass-teal text-teal-300 text-[10px] font-bold px-2 py-0.5 rounded-full">Done</span>
                </div>

                {{-- Connector --}}
                <div class="ml-4 step-line h-5 my-1"></div>

                {{-- Step 2 — active --}}
                <div class="flex items-center gap-3">
                    <div class="w-8 h-8 rounded-full flex items-center justify-center flex-shrink-0 border-2 border-blue-400"
                         style="background: rgba(59,130,246,.15);">
                        <span class="text-xs font-bold text-blue-400">2</span>
                    </div>
                    <div class="flex-1">
                        <div class="text-xs font-bold text-white">Set Up Profile</div>
                        <div class="text-[10px] text-white/50">Specialties & preferences</div>
                    </div>
                    <span class="bg-blue-500/20 text-blue-300 text-[10px] font-bold px-2 py-0.5 rounded-full border border-blue-400/30">Next</span>
                </div>

                {{-- Connector --}}
                <div class="ml-4 step-line h-5 my-1 opacity-40"></div>

                {{-- Step 3 — pending --}}
                <div class="flex items-center gap-3 opacity-50">
                    <div class="w-8 h-8 rounded-full flex items-center justify-center flex-shrink-0 border-2 border-white/20"
                         style="background: rgba(255,255,255,.05);">
                        <span class="text-xs font-bold text-white/50">3</span>
                    </div>
                    <div class="flex-1">
                        <div class="text-xs font-bold text-white/60">Start Booking</div>
                        <div class="text-[10px] text-white/30">Find & book doctors</div>
                    </div>
                </div>
            </div>

            {{-- ── Specialty chips card ──────────────────────── --}}
            <div class="float-b self-end w-[260px] glass rounded-xl p-3.5 shadow-xl">
                <div class="text-[10px] font-bold text-white/60 uppercase tracking-wider mb-2.5">Choose Specialties</div>
                <div class="flex flex-wrap gap-1.5">
                    <span class="pop-1 flex items-center gap-1 glass-teal text-teal-300 text-[10px] font-semibold px-2.5 py-1 rounded-full">
                        ❤️ Cardiology
                    </span>
                    <span class="pop-2 flex items-center gap-1 glass text-white/70 text-[10px] font-semibold px-2.5 py-1 rounded-full">
                        🧠 Neurology
                    </span>
                    <span class="pop-3 flex items-center gap-1 glass text-white/70 text-[10px] font-semibold px-2.5 py-1 rounded-full">
                        🦷 Dentistry
                    </span>
                    <span class="pop-1 flex items-center gap-1 glass text-white/70 text-[10px] font-semibold px-2.5 py-1 rounded-full">
                        🦴 Orthopedics
                    </span>
                </div>
            </div>

            {{-- ── Welcome toast ─────────────────────────────── --}}
            <div class="float-c slide-in self-start ml-4 max-w-[230px] glass rounded-xl p-3 shadow-lg">
                <div class="flex items-center gap-2.5">
                    <span class="w-8 h-8 rounded-lg flex items-center justify-center flex-shrink-0"
                          style="background: linear-gradient(135deg,#2dd4bf,#3b82f6);">
                        <svg class="w-4 h-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                        </svg>
                    </span>
                    <div>
                        <div class="text-xs font-bold text-white">Welcome to MediCare24!</div>
                        <div class="text-[10px] text-teal-400 mt-0.5">Your account is ready 🎉</div>
                    </div>
                </div>
            </div>
        </div>

        {{-- ── BOTTOM: Tagline + stats ───────────────────────── --}}
        <div class="relative z-10 px-10 pb-10">
            <p class="font-display text-2xl font-bold leading-tight max-w-xs gradient-text mb-5">
                Join 5,000+ clinics already simplifying healthcare.
            </p>

            {{-- teal gradient separator --}}
            <div class="h-px w-full mb-5" style="background: linear-gradient(90deg, rgba(45,212,191,.5) 0%, transparent 100%);"></div>

            {{-- Stats --}}
            <div class="flex items-start gap-7">
                <div class="fade-up-1">
                    <div class="font-display text-2xl font-extrabold text-white">Free <span class="text-teal-400">∞</span></div>
                    <div class="text-[11px] text-white/50 mt-0.5 font-medium uppercase tracking-wider">Forever Plan</div>
                </div>
                <div class="w-px self-stretch bg-white/10"></div>
                <div class="fade-up-2">
                    <div class="font-display text-2xl font-extrabold text-white">5,000<span class="text-teal-400">+</span></div>
                    <div class="text-[11px] text-white/50 mt-0.5 font-medium uppercase tracking-wider">Partner Clinics</div>
                </div>
                <div class="w-px self-stretch bg-white/10"></div>
                <div class="fade-up-3">
                    <div class="font-display text-2xl font-extrabold text-white">
                        <svg class="w-5 h-5 text-teal-400 inline -mt-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                        </svg>
                        Instant
                    </div>
                    <div class="text-[11px] text-white/50 mt-0.5 font-medium uppercase tracking-wider">Account Access</div>
                </div>
            </div>
        </div>
    </div>

    {{-- ============================================================ --}}
    {{-- RIGHT — Form Panel                                            --}}
    {{-- ============================================================ --}}
    <div class="flex items-center justify-center px-6 py-12 sm:px-12">
        <div class="w-full max-w-sm">

            {{-- mobile-only logo --}}
            <a href="{{ url('/') }}" class="lg:hidden flex items-center gap-2.5 mb-10">
                <span class="w-9 h-9 rounded-xl bg-gradient-to-br from-blue-600 to-teal-500 flex items-center justify-center">
                    <svg class="w-5 h-5 text-white" viewBox="0 0 24 24" fill="none">
                        <path d="M12 2C9 2 6.5 4.5 6.5 7.5C6.5 11 9 13 12 16C15 13 17.5 11 17.5 7.5C17.5 4.5 15 2 12 2Z" fill="currentColor"/>
                        <path d="M4 15C4 19 7.5 22 12 22C16.5 22 20 19 20 15" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/>
                    </svg>
                </span>
                <span class="font-display font-bold text-lg">Medi<span class="text-teal-500">Care</span>24</span>
            </a>

            {{-- Login / Register tab switch --}}
            <div class="inline-flex bg-slate-100 rounded-full p-1 mb-8">
                <a href="{{ route('login') }}"
                   class="px-5 py-2 rounded-full text-sm font-semibold text-slate-500 hover:text-slate-700 transition-all">
                    Login
                </a>
                <span class="px-5 py-2 rounded-full text-sm font-semibold bg-white shadow-sm text-slate-900">
                    Register
                </span>
            </div>

            <h1 class="font-display text-2xl font-extrabold text-slate-900">Join MediCare24</h1>
            <p class="text-slate-500 text-sm mt-1.5">Create your free account — no card required.</p>

            <form method="POST" action="{{ route('register') }}" class="mt-8 space-y-5">
                @csrf

                {{-- full name --}}
                <div>
                    <label class="block text-xs font-semibold text-slate-700 mb-1.5">Full Name</label>
                    <div class="relative">
                        <svg class="w-[18px] h-[18px] absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                        <input type="text" name="name" placeholder="Nimal Perera"
                               value="{{ old('name') }}"
                               class="w-full pl-10 pr-4 py-3 text-sm rounded-xl border border-slate-200 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-blue-500/30 focus:border-blue-500 transition-colors">
                    </div>
                    @error('name')
                        <p class="text-red-500 text-[11px] mt-1.5">{{ $message }}</p>
                    @enderror
                </div>

                {{-- email --}}
                <div>
                    <label class="block text-xs font-semibold text-slate-700 mb-1.5">Mobile Number / Email</label>
                    <div class="relative">
                        <svg class="w-[18px] h-[18px] absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                        <input type="text" name="email" placeholder="you@example.com"
                               value="{{ old('email') }}"
                               class="w-full pl-10 pr-4 py-3 text-sm rounded-xl border border-slate-200 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-blue-500/30 focus:border-blue-500 transition-colors">
                    </div>
                    @error('email')
                        <p class="text-red-500 text-[11px] mt-1.5">{{ $message }}</p>
                    @enderror
                </div>

                {{-- password --}}
                <div>
                    <label class="block text-xs font-semibold text-slate-700 mb-1.5">Create Password</label>
                    <div class="relative">
                        <svg class="w-[18px] h-[18px] absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                        </svg>
                        <input :type="showPw ? 'text' : 'password'" name="password" placeholder="At least 8 characters"
                               class="w-full pl-10 pr-10 py-3 text-sm rounded-xl border border-slate-200 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-blue-500/30 focus:border-blue-500 transition-colors">
                        <button type="button" @click="showPw = !showPw" class="absolute right-3.5 top-1/2 -translate-y-1/2 text-slate-400 hover:text-slate-600">
                            <svg x-show="!showPw" class="w-[18px] h-[18px]" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            <svg x-show="showPw" x-cloak class="w-[18px] h-[18px]" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6" d="M3.98 8.223A10.477 10.477 0 001.934 12c1.292 4.338 5.31 7.5 10.066 7.5.993 0 1.953-.138 2.863-.395M6.228 6.228A10.45 10.45 0 0112 4.5c4.756 0 8.773 3.162 10.065 7.498a10.523 10.523 0 01-4.293 5.774M6.228 6.228L3 3m3.228 3.228l3.65 3.65m7.894 7.894L21 21m-3.228-3.228l-3.65-3.65m0 0a3 3 0 10-4.243-4.243m4.243 4.243L9.88 9.88"/></svg>
                        </button>
                    </div>
                    <p class="text-[11px] text-slate-400 mt-1.5">Use 8+ characters with a mix of letters &amp; numbers.</p>
                    @error('password')
                        <p class="text-red-500 text-[11px] mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- confirm password --}}
                <div>
                    <label class="block text-xs font-semibold text-slate-700 mb-1.5">Confirm Password</label>
                    <div class="relative">
                        <svg class="w-[18px] h-[18px] absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                        </svg>
                        <input type="password" name="password_confirmation" placeholder="Repeat password"
                               class="w-full pl-10 pr-4 py-3 text-sm rounded-xl border border-slate-200 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-blue-500/30 focus:border-blue-500 transition-colors">
                    </div>
                </div>

                {{-- terms --}}
                <label class="flex items-start gap-2.5 text-xs text-slate-600 cursor-pointer pt-1">
                    <input type="checkbox" name="terms" required
                           class="w-4 h-4 mt-0.5 rounded border-slate-300 text-blue-600 focus:ring-blue-500/30 shrink-0">
                    <span>
                        By signing up, I agree to MediCare24's
                        <a href="#" class="font-semibold text-blue-600 hover:text-blue-700">Terms of Service</a>
                        and
                        <a href="#" class="font-semibold text-blue-600 hover:text-blue-700">Privacy Policy</a>.
                    </span>
                </label>

                <button type="submit"
                        class="w-full text-white font-semibold text-sm py-3.5 rounded-xl transition-all hover:opacity-90 hover:shadow-lg"
                        style="background: linear-gradient(135deg, #2563eb, #1d4ed8); box-shadow: 0 4px 18px rgba(37,99,235,.30);">
                    Create Account
                </button>
            </form>

            {{-- ── Social sign-up ─────────────────────────────── --}}
            <div class="flex items-center gap-3 my-6">
                <div class="flex-1 h-px bg-slate-200"></div>
                <span class="text-xs text-slate-400 font-medium whitespace-nowrap">or sign up with</span>
                <div class="flex-1 h-px bg-slate-200"></div>
            </div>

            {{-- Google --}}
            <a href="{{ route('social.redirect', 'google') }}"
               class="group w-full flex items-center gap-3 border border-slate-200 rounded-xl px-4 py-3 text-sm font-semibold text-slate-700 hover:border-blue-300 hover:bg-blue-50/50 hover:shadow-sm transition-all">
                <span class="w-8 h-8 flex items-center justify-center rounded-lg bg-white shadow-sm border border-slate-100 group-hover:shadow-md transition-shadow flex-shrink-0">
                    <svg class="w-4 h-4" viewBox="0 0 24 24">
                        <path fill="#4285F4" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/>
                        <path fill="#34A853" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/>
                        <path fill="#FBBC05" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l3.66-2.84z"/>
                        <path fill="#EA4335" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"/>
                    </svg>
                </span>
                <span class="flex-1 text-center">Sign up with Google</span>
                <svg class="w-4 h-4 text-slate-400 group-hover:text-blue-500 transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
            </a>

            {{-- Trust micro-copy --}}
            <p class="flex items-center justify-center gap-1.5 text-[11px] text-slate-400 mt-4">
                <svg class="w-3.5 h-3.5 text-teal-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                </svg>
                Secured with OAuth 2.0 · We never store your social password
            </p>

            <p class="text-center text-sm text-slate-500 mt-6">
                Already have an account?
                <a href="{{ route('login') }}" class="font-semibold text-blue-600 hover:text-blue-700">Log in</a>
            </p>
        </div>
    </div>

</div>
</body>
</html>
