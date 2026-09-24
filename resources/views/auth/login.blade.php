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
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@500;600;700;800&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">

    <style>
        body { font-family: 'Inter', sans-serif; }
        .font-display { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="bg-white text-slate-900 antialiased">
<div x-data="{ tab: 'login', showPw: false }" class="min-h-screen grid lg:grid-cols-2">

    {{-- ============================================================ --}}
    {{-- LEFT — brand panel (hidden on mobile)                        --}}
    {{-- ============================================================ --}}
    <div class="hidden lg:flex relative flex-col justify-between overflow-hidden bg-gradient-to-br from-[#0E1B2C] to-[#16304f] p-12 text-white">

        {{-- ambient glow --}}
        <span class="absolute w-80 h-80 rounded-full bg-teal-400 opacity-20 blur-[100px] -top-20 -left-16"></span>
        <span class="absolute w-72 h-72 rounded-full bg-blue-500 opacity-20 blur-[100px] bottom-0 right-0"></span>

        {{-- logo --}}
        <a href="{{ url('/') }}" class="relative z-10 flex items-center gap-2.5">
            <span class="w-9 h-9 rounded-xl bg-gradient-to-br from-blue-500 to-teal-400 flex items-center justify-center">
                <svg class="w-5 h-5 text-white" viewBox="0 0 24 24" fill="none">
                    <path d="M12 2C9 2 6.5 4.5 6.5 7.5C6.5 11 9 13 12 16C15 13 17.5 11 17.5 7.5C17.5 4.5 15 2 12 2Z" fill="currentColor"/>
                    <path d="M4 15C4 19 7.5 22 12 22C16.5 22 20 19 20 15" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/>
                </svg>
            </span>
            <span class="font-display font-bold text-lg">Medi<span class="text-teal-400">Care</span>24</span>
        </a>

        {{-- floating mock appointment card --}}
        <div class="relative z-10 my-auto">
            <div class="max-w-sm bg-white text-slate-900 rounded-2xl shadow-2xl shadow-black/30 p-5">
                <div class="flex items-center gap-3">
                    <span class="w-11 h-11 rounded-full bg-gradient-to-br from-blue-500 to-teal-400"></span>
                    <div>
                        <div class="font-display font-bold text-sm">Dr. Anjali Perera</div>
                        <div class="text-xs text-slate-500 mt-0.5">Cardiologist · 12 yrs exp</div>
                    </div>
                    <span class="ml-auto text-[10px] font-bold text-teal-600 bg-teal-50 px-2 py-1 rounded-full">Online</span>
                </div>
                <div class="flex gap-2 mt-5">
                    <span class="flex-1 text-center text-xs font-semibold py-2 rounded-lg bg-slate-50 text-slate-500">2:00pm</span>
                    <span class="flex-1 text-center text-xs font-semibold py-2 rounded-lg bg-blue-600 text-white">3:30pm</span>
                    <span class="flex-1 text-center text-xs font-semibold py-2 rounded-lg bg-slate-50 text-slate-500">5:00pm</span>
                </div>
                <div class="mt-4 text-center bg-teal-400 text-slate-900 text-xs font-bold py-2.5 rounded-lg">
                    Appointment Confirmed
                </div>
            </div>

            <div class="max-w-[190px] bg-white text-slate-900 rounded-xl shadow-xl shadow-black/30 p-3.5 mt-4 ml-10 -rotate-2">
                <div class="flex items-center gap-2">
                    <span class="w-8 h-8 rounded-full bg-gradient-to-br from-teal-400 to-blue-500"></span>
                    <div>
                        <div class="font-display font-bold text-xs">Dr. Kasun Silva</div>
                        <div class="text-[10px] text-slate-500">Available now</div>
                    </div>
                </div>
            </div>
        </div>

        {{-- trust copy --}}
        <div class="relative z-10">
            <p class="font-display text-2xl font-bold leading-snug max-w-sm">
                Manage appointments, records &amp; consultations — all in one secure platform.
            </p>
            <div class="flex items-center gap-8 mt-8">
                <div>
                    <div class="font-display text-xl font-bold">10,000+</div>
                    <div class="text-xs text-white/60 mt-0.5">Verified Doctors</div>
                </div>
                <div class="w-px h-8 bg-white/15"></div>
                <div>
                    <div class="font-display text-xl font-bold">500+</div>
                    <div class="text-xs text-white/60 mt-0.5">Partner Clinics</div>
                </div>
                <div class="w-px h-8 bg-white/15"></div>
                <div>
                    <div class="font-display text-xl font-bold">4.8 ★</div>
                    <div class="text-xs text-white/60 mt-0.5">Avg. Rating</div>
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
                        <svg class="w-4.5 h-4.5 w-[18px] h-[18px] absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
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
                        class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold text-sm py-3.5 rounded-xl shadow-md shadow-blue-600/20 hover:shadow-lg hover:shadow-blue-600/25 transition-all">
                    Login
                </button>
            </form>

            {{-- divider --}}
            <div class="flex items-center gap-3 my-7">
                <div class="flex-1 h-px bg-slate-200"></div>
                <span class="text-xs text-slate-400 font-medium">or continue with</span>
                <div class="flex-1 h-px bg-slate-200"></div>
            </div>

            <button type="button" class="w-full flex items-center justify-center gap-2.5 border border-slate-200 rounded-xl py-3 text-sm font-semibold text-slate-700 hover:bg-slate-50 transition-colors">
                <svg class="w-4.5 h-4.5" viewBox="0 0 24 24"><path fill="#4285F4" d="M23.52 12.27c0-.85-.08-1.67-.22-2.45H12v4.63h6.47a5.54 5.54 0 01-2.4 3.63v3.02h3.88c2.27-2.09 3.57-5.17 3.57-8.83z"/><path fill="#34A853" d="M12 24c3.24 0 5.95-1.08 7.93-2.9l-3.88-3.02c-1.08.72-2.45 1.15-4.05 1.15-3.11 0-5.75-2.1-6.69-4.93H1.3v3.11A12 12 0 0012 24z"/><path fill="#FBBC05" d="M5.31 14.3a7.2 7.2 0 010-4.6V6.59H1.3a12 12 0 000 10.82l4.01-3.11z"/><path fill="#EA4335" d="M12 4.77c1.76 0 3.34.6 4.59 1.8l3.44-3.44C17.94 1.19 15.24 0 12 0A12 12 0 001.3 6.59l4.01 3.11C6.25 6.87 8.89 4.77 12 4.77z"/></svg>
                Continue with Google
            </button>

            <p class="text-center text-sm text-slate-500 mt-8">
                Don't have an account?
                <a href="{{ route('register') }}" class="font-semibold text-blue-600 hover:text-blue-700">Sign up free</a>
            </p>
        </div>
    </div>

</div>
</body>
</html>
