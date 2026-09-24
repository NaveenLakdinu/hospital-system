<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login — MediCare24</title>

    {{-- Assumes standard Laravel Breeze + Vite + Tailwind setup (see home.blade.php) --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,500;0,600;0,700;0,800;1,700&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">

    <style>
        body { font-family: 'Inter', sans-serif; }
        .font-display { font-family: 'Plus Jakarta Sans', sans-serif; }

        /* ── ECG pulse animation ─────────────────────────────────── */
        @keyframes ecg-draw {
            0%   { stroke-dashoffset: 400; opacity: 0; }
            10%  { opacity: 1; }
            80%  { opacity: 1; }
            100% { stroke-dashoffset: 0; opacity: 0; }
        }
        .ecg-line {
            stroke-dasharray: 400;
            stroke-dashoffset: 400;
            animation: ecg-draw 3s ease-in-out infinite;
        }

        /* ── floating cards ──────────────────────────────────────── */
        @keyframes float-up {
            0%, 100% { transform: translateY(0px) rotate(var(--rot, 0deg)); }
            50%       { transform: translateY(-10px) rotate(var(--rot, 0deg)); }
        }
        .float-card   { animation: float-up 4s ease-in-out infinite; }
        .float-card-2 { animation: float-up 5s ease-in-out 1s infinite; }
        .float-card-3 { animation: float-up 4.5s ease-in-out 0.5s infinite; }

        /* ── ambient pulse ring ──────────────────────────────────── */
        @keyframes ping-slow {
            0%   { transform: scale(1); opacity: .35; }
            100% { transform: scale(1.9); opacity: 0; }
        }
        .ping-slow { animation: ping-slow 3s cubic-bezier(0,0,.2,1) infinite; }

        /* ── stat counter fade-in ────────────────────────────────── */
        @keyframes fade-up {
            from { opacity: 0; transform: translateY(12px); }
            to   { opacity: 1; transform: translateY(0); }
        }
        .fade-up-1 { animation: fade-up .6s .2s both; }
        .fade-up-2 { animation: fade-up .6s .4s both; }
        .fade-up-3 { animation: fade-up .6s .6s both; }

        /* ── shimmer on image ────────────────────────────────────── */
        @keyframes shimmer {
            0%   { background-position: -600px 0; }
            100% { background-position: 600px 0; }
        }
        .panel-img-wrap::after {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(
                105deg,
                transparent 40%,
                rgba(255,255,255,.06) 50%,
                transparent 60%
            );
            background-size: 600px 100%;
            animation: shimmer 4s linear infinite;
            pointer-events: none;
        }

        /* ── glassmorphism ───────────────────────────────────────── */
        .glass {
            background: rgba(255,255,255,.08);
            backdrop-filter: blur(14px);
            -webkit-backdrop-filter: blur(14px);
            border: 1px solid rgba(255,255,255,.15);
        }
        .glass-teal {
            background: rgba(45,212,191,.12);
            backdrop-filter: blur(14px);
            -webkit-backdrop-filter: blur(14px);
            border: 1px solid rgba(45,212,191,.25);
        }

        /* ── gradient text ───────────────────────────────────────── */
        .gradient-text {
            background: linear-gradient(135deg, #fff 0%, #5eead4 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
    </style>
</head>
<body class="bg-white text-slate-900 antialiased">
<div x-data="{ tab: 'login', showPw: false }" class="min-h-screen grid lg:grid-cols-2">

    {{-- ============================================================ --}}
    {{-- LEFT — brand panel (hidden on mobile)                        --}}
    {{-- ============================================================ --}}
    <div class="hidden lg:flex relative flex-col justify-between overflow-hidden text-white"
         style="background: linear-gradient(145deg, #060f1e 0%, #0c1f38 45%, #0e2744 70%, #0a2038 100%);">

        {{-- ── Full-panel background image ───────────────────────── --}}
        <div class="panel-img-wrap absolute inset-0 z-0">
            <img src="{{ asset('images/login-panel.jpg') }}"
                 alt="MediCare24 Dashboard"
                 class="w-full h-full object-cover object-center opacity-90"
                 style="mix-blend-mode: luminosity;">
            {{-- dark gradient overlay for text legibility --}}
            <div class="absolute inset-0"
                 style="background: linear-gradient(
                     to bottom,
                     rgba(6,15,30,.55)  0%,
                     rgba(6,15,30,.10) 30%,
                     rgba(6,15,30,.10) 65%,
                     rgba(6,15,30,.80) 100%
                 );"></div>
        </div>

        {{-- ── Ambient glow orbs ───────────────────────────────────── --}}
        <span class="absolute w-72 h-72 rounded-full bg-teal-400 opacity-15 blur-[110px] -top-16 -left-16 z-0"></span>
        <span class="absolute w-64 h-64 rounded-full bg-blue-500 opacity-20 blur-[100px] bottom-10 right-0 z-0"></span>
        <span class="absolute w-40 h-40 rounded-full bg-teal-300 opacity-10 blur-[80px] top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 z-0"></span>

        {{-- ── Ping ring behind cross icon ─────────────────────────── --}}
        <div class="absolute left-1/2 top-[42%] -translate-x-1/2 -translate-y-1/2 z-0">
            <span class="ping-slow block w-32 h-32 rounded-full bg-teal-400/20"></span>
        </div>

        {{-- ── TOP: Logo ────────────────────────────────────────────── --}}
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
            {{-- Live badge --}}
            <span class="ml-2 flex items-center gap-1.5 glass px-2.5 py-1 rounded-full text-[10px] font-bold text-teal-300">
                <span class="w-1.5 h-1.5 rounded-full bg-teal-400 animate-pulse"></span>
                LIVE
            </span>
        </a>

        {{-- ── MIDDLE: Floating UI cards ───────────────────────────── --}}
        <div class="relative z-10 flex flex-col items-center gap-5 px-10">

            {{-- ECG pulse strip card --}}
            <div class="float-card w-full max-w-[340px] glass rounded-2xl p-4 shadow-xl">
                <div class="flex items-center justify-between mb-3">
                    <div class="flex items-center gap-2">
                        <span class="w-7 h-7 rounded-lg bg-red-500/20 flex items-center justify-center">
                            <svg class="w-4 h-4 text-red-400" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 21.593c-5.63-5.539-11-10.297-11-14.402C1 3.518 3.39 1 7 1c1.71 0 3.437.742 5 2.708C13.563 1.742 15.29 1 17 1c3.61 0 6 2.518 6 6.191 0 4.105-5.37 8.863-11 14.402z"/>
                            </svg>
                        </span>
                        <span class="text-xs font-semibold text-white/80">Live Heart Rate</span>
                    </div>
                    <span class="text-xs font-bold text-teal-400">72 bpm</span>
                </div>
                {{-- ECG SVG --}}
                <svg viewBox="0 0 300 60" class="w-full h-10" fill="none">
                    <polyline
                        points="0,30 30,30 45,30 55,5 65,55 75,30 105,30 120,30 130,15 140,45 150,30 180,30 195,30 205,8 215,52 225,30 255,30 270,30 280,18 290,42 300,30"
                        stroke="#2dd4bf" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        fill="none"
                        class="ecg-line"
                    />
                </svg>
            </div>

            {{-- Appointment card --}}
            <div class="float-card-2 w-full max-w-[340px] glass rounded-2xl p-4 shadow-xl">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-10 h-10 rounded-xl flex items-center justify-center text-white font-bold text-sm shadow-md"
                         style="background: linear-gradient(135deg,#3b82f6,#14b8a6);">AK</div>
                    <div class="flex-1">
                        <div class="font-display font-bold text-sm text-white">Dr. Anjali Perera</div>
                        <div class="text-[11px] text-white/50">Cardiologist · 12 yrs exp</div>
                    </div>
                    <span class="glass-teal text-teal-300 text-[10px] font-bold px-2.5 py-1 rounded-full">Online</span>
                </div>
                <div class="flex gap-2">
                    <span class="flex-1 text-center text-xs font-semibold py-2 rounded-xl glass text-white/50">2:00 pm</span>
                    <span class="flex-1 text-center text-xs font-bold py-2 rounded-xl shadow-md text-white"
                          style="background: linear-gradient(135deg,#3b82f6,#2563eb);">3:30 pm</span>
                    <span class="flex-1 text-center text-xs font-semibold py-2 rounded-xl glass text-white/50">5:00 pm</span>
                </div>
                <div class="mt-3 flex items-center justify-center gap-2 py-2 rounded-xl text-xs font-bold text-slate-900"
                     style="background: linear-gradient(135deg,#2dd4bf,#14b8a6);">
                    <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/>
                    </svg>
                    Appointment Confirmed
                </div>
            </div>

            {{-- Mini available doctor card (offset/tilted) --}}
            <div class="float-card-3 self-start ml-8 w-[190px] glass rounded-xl p-3 shadow-lg" style="--rot:-2deg; transform: rotate(-2deg);">
                <div class="flex items-center gap-2.5">
                    <div class="w-8 h-8 rounded-lg flex items-center justify-center text-white text-[11px] font-bold"
                         style="background: linear-gradient(135deg,#14b8a6,#3b82f6);">KS</div>
                    <div>
                        <div class="font-display font-bold text-[11px] text-white">Dr. Kasun Silva</div>
                        <div class="flex items-center gap-1 text-[10px] text-teal-400">
                            <span class="w-1.5 h-1.5 rounded-full bg-teal-400"></span>
                            Available now
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- ── BOTTOM: Tagline + stats ──────────────────────────────── --}}
        <div class="relative z-10 px-10 pb-10">
            {{-- tagline --}}
            <p class="font-display text-2xl font-bold leading-tight max-w-xs gradient-text mb-6">
                Your health, managed <em>smarter</em> — all in one place.
            </p>

            {{-- decorative separator --}}
            <div class="h-px w-full mb-6" style="background: linear-gradient(90deg, rgba(45,212,191,.5) 0%, transparent 100%);"></div>

            {{-- stats row --}}
            <div class="flex items-start gap-8">
                <div class="fade-up-1">
                    <div class="font-display text-2xl font-extrabold text-white">10,000<span class="text-teal-400">+</span></div>
                    <div class="text-[11px] text-white/50 mt-0.5 font-medium uppercase tracking-wider">Verified Doctors</div>
                </div>
                <div class="w-px self-stretch bg-white/10"></div>
                <div class="fade-up-2">
                    <div class="font-display text-2xl font-extrabold text-white">500<span class="text-teal-400">+</span></div>
                    <div class="text-[11px] text-white/50 mt-0.5 font-medium uppercase tracking-wider">Partner Clinics</div>
                </div>
                <div class="w-px self-stretch bg-white/10"></div>
                <div class="fade-up-3">
                    <div class="font-display text-2xl font-extrabold text-white">4.8 <span class="text-yellow-400">★</span></div>
                    <div class="text-[11px] text-white/50 mt-0.5 font-medium uppercase tracking-wider">Avg. Rating</div>
                </div>
            </div>
        </div>
    </div>

    {{-- ============================================================ --}}
    {{-- RIGHT — form panel                                            --}}
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

            {{-- login / register segmented switch --}}
            <div class="inline-flex bg-slate-100 rounded-full p-1 mb-8">
                <button type="button" @click="tab = 'login'"
                        :class="tab === 'login' ? 'bg-white shadow-sm text-slate-900' : 'text-slate-500'"
                        class="px-5 py-2 rounded-full text-sm font-semibold transition-all">
                    Login
                </button>
                <button type="button" @click="tab = 'register'"
                        :class="tab === 'register' ? 'bg-white shadow-sm text-slate-900' : 'text-slate-500'"
                        class="px-5 py-2 rounded-full text-sm font-semibold transition-all">
                    Register
                </button>
            </div>

            <h1 class="font-display text-2xl font-extrabold text-slate-900">Welcome back</h1>
            <p class="text-slate-500 text-sm mt-1.5">Log in to manage your appointments and records.</p>

            <form method="POST" action="{{ route('login') }}" class="mt-8 space-y-5">
                @csrf

                {{-- identifier --}}
                <div>
                    <label class="block text-xs font-semibold text-slate-700 mb-1.5">Mobile Number / Email ID</label>
                    <div class="relative">
                        <svg class="w-[18px] h-[18px] absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                        <input type="text" name="identifier" placeholder="you@example.com"
                               class="w-full pl-10 pr-4 py-3 text-sm rounded-xl border border-slate-200 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-blue-500/30 focus:border-blue-500 transition-colors">
                    </div>
                </div>

                {{-- password --}}
                <div>
                    <div class="flex items-center justify-between mb-1.5">
                        <label class="block text-xs font-semibold text-slate-700">Password</label>
                        <a href="#" class="text-xs font-semibold text-blue-600 hover:text-blue-700">Forgot password?</a>
                    </div>
                    <div class="relative">
                        <svg class="w-[18px] h-[18px] absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                        </svg>
                        <input :type="showPw ? 'text' : 'password'" name="password" placeholder="••••••••"
                               class="w-full pl-10 pr-10 py-3 text-sm rounded-xl border border-slate-200 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-blue-500/30 focus:border-blue-500 transition-colors">
                        <button type="button" @click="showPw = !showPw" class="absolute right-3.5 top-1/2 -translate-y-1/2 text-slate-400 hover:text-slate-600">
                            <svg x-show="!showPw" class="w-[18px] h-[18px]" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            <svg x-show="showPw" x-cloak class="w-[18px] h-[18px]" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6" d="M3.98 8.223A10.477 10.477 0 001.934 12c1.292 4.338 5.31 7.5 10.066 7.5.993 0 1.953-.138 2.863-.395M6.228 6.228A10.45 10.45 0 0112 4.5c4.756 0 8.773 3.162 10.065 7.498a10.523 10.523 0 01-4.293 5.774M6.228 6.228L3 3m3.228 3.228l3.65 3.65m7.894 7.894L21 21m-3.228-3.228l-3.65-3.65m0 0a3 3 0 10-4.243-4.243m4.243 4.243L9.88 9.88"/></svg>
                        </button>
                    </div>
                </div>

                {{-- options row --}}
                <div class="flex items-center justify-between text-xs pt-1">
                    <label class="flex items-center gap-2 text-slate-600 cursor-pointer">
                        <input type="checkbox" name="remember" class="w-4 h-4 rounded border-slate-300 text-blue-600 focus:ring-blue-500/30">
                        Remember me
                    </label>
                    <button type="button" class="font-semibold text-slate-600 hover:text-blue-600 transition-colors">
                        Login with OTP instead
                    </button>
                </div>

                <button type="submit"
                        class="w-full text-white font-semibold text-sm py-3.5 rounded-xl shadow-md transition-all hover:opacity-90 hover:shadow-lg"
                        style="background: linear-gradient(135deg, #2563eb, #1d4ed8); box-shadow: 0 4px 18px rgba(37,99,235,.30);">
                    Login
                </button>
            </form>

            {{-- ── Social login ─────────────────────────────────────── --}}
            <div class="flex items-center gap-3 my-6">
                <div class="flex-1 h-px bg-slate-200"></div>
                <span class="text-xs text-slate-400 font-medium whitespace-nowrap">or continue with</span>
                <div class="flex-1 h-px bg-slate-200"></div>
            </div>

            {{-- Google --}}
            <a href="{{ route('social.redirect', 'google') }}"
               class="group w-full flex items-center gap-3 border border-slate-200 rounded-xl px-4 py-3 text-sm font-semibold text-slate-700 hover:border-blue-300 hover:bg-blue-50/50 hover:shadow-sm transition-all">
                {{-- Google "G" logo --}}
                <span class="w-8 h-8 flex items-center justify-center rounded-lg bg-white shadow-sm border border-slate-100 group-hover:shadow-md transition-shadow flex-shrink-0">
                    <svg class="w-4 h-4" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path fill="#4285F4" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/>
                        <path fill="#34A853" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/>
                        <path fill="#FBBC05" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l3.66-2.84z"/>
                        <path fill="#EA4335" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"/>
                    </svg>
                </span>
                <span class="flex-1 text-center">Continue with Google</span>
                <svg class="w-4 h-4 text-slate-400 group-hover:text-blue-500 transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
            </a>

            {{-- Trust / security micro-copy --}}
            <p class="flex items-center justify-center gap-1.5 text-[11px] text-slate-400 mt-4">
                <svg class="w-3.5 h-3.5 text-teal-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                </svg>
                Secured with OAuth 2.0 · We never store your social password
            </p>

            <p class="text-center text-sm text-slate-500 mt-6">
                Don't have an account?
                <a href="{{ route('register') }}" class="font-semibold text-blue-600 hover:text-blue-700">Sign up free</a>
            </p>
        </div>
    </div>

</div>
</body>
</html>
