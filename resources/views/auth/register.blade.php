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
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@500;600;700;800&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">

    <style>
        body { font-family: 'Inter', sans-serif; }
        .font-display { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="bg-white text-slate-900 antialiased">

    <div x-data="{ showPw: false }" class="min-h-screen grid lg:grid-cols-2">

    {{-- LEFT — Brand Panel Container --}}
    <div class="hidden lg:flex relative flex-col justify-between overflow-hidden bg-gradient-to-br from-[#0E1B2C] to-[#16304f] p-12 text-white">
        <span class="absolute w-80 h-80 rounded-full bg-teal-400 opacity-20 blur-[100px] -top-20 -left-16"></span>
        <span class="absolute w-72 h-72 rounded-full bg-blue-500 opacity-20 blur-[100px] bottom-0 right-0"></span>

        <a href="{{ url('/') }}" class="relative z-10 flex items-center gap-2.5">
            <span class="w-9 h-9 rounded-xl bg-gradient-to-br from-blue-500 to-teal-400 flex items-center justify-center">
                <svg class="w-5 h-5 text-white" viewBox="0 0 24 24" fill="none">
                    <path d="M12 2C9 2 6.5 4.5 6.5 7.5C6.5 11 9 13 12 16C15 13 17.5 11 17.5 7.5C17.5 4.5 15 2 12 2Z" fill="currentColor"/>
                    <path d="M4 15C4 19 7.5 22 12 22C16.5 22 20 19 20 15" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/>
                </svg>
            </span>
            <span class="font-display font-bold text-lg">Medi<span class="text-teal-400">Care</span>24</span>
        </a>

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

        <div class="relative z-10">
            <p class="font-display text-2xl font-bold leading-snug max-w-sm">
                Join 5,000+ clinics already simplifying healthcare with MediCare24.
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
                    <div class="font-display text-xl font-bold">Free</div>
                    <div class="text-xs text-white/60 mt-0.5">Forever Plan</div>
                </div>
            </div>
        </div>
    </div>

    {{-- RIGHT — Form Panel Container --}}
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
                <a href="{{ route('login') }}" class="px-5 py-2 rounded-full text-sm font-semibold text-slate-500 hover:text-slate-700 transition-all">
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
                               class="w-full pl-10 pr-4 py-3 text-sm rounded-xl border border-slate-200 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-blue-500/30 focus:border-blue-500 transition-colors">
                    </div>
                </div>

                {{-- identifier --}}
                <div>
                    <label class="block text-xs font-semibold text-slate-700 mb-1.5">Mobile Number / Email</label>
                    <div class="relative">
                        <svg class="w-[18px] h-[18px] absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                        <input type="text" name="identifier" placeholder="you@example.com"
                               class="w-full pl-10 pr-4 py-3 text-sm rounded-xl border border-slate-200 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-blue-500/30 focus:border-blue-500 transition-colors">
                    </div>
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
                </div>
        </div>
    </div>

</div>
</body>
</html>
