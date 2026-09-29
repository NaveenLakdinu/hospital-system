<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Find Doctors — Family Care CAMS</title>

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
<body class="bg-slate-50 text-slate-900 antialiased" x-data="{ showAuthModal: false }">

    @include('layouts.navigation')

    {{-- ============================================================ --}}
    {{-- PAGE HEADER                                                   --}}
    {{-- ============================================================ --}}
    <section class="max-w-7xl mx-auto px-6 pt-12 pb-4">
        <h1 class="font-display text-3xl font-extrabold text-slate-900">Find Experienced Doctors</h1>
        <p class="text-slate-500 mt-2 text-sm sm:text-base">Search verified specialists by name, specialty, or availability — and book in minutes.</p>
    </section>

    {{-- ============================================================ --}}
    {{-- FILTER FORM                                                   --}}
    {{-- ============================================================ --}}
    <section class="max-w-7xl mx-auto px-6 mb-10">
        <form method="GET" action="{{ route('doctors.index') }}"
              class="bg-white rounded-2xl border border-slate-200 shadow-sm shadow-slate-200/60 p-4 sm:p-5">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-[1fr_220px_200px_auto] gap-3">

                {{-- search --}}
                <div class="relative">
                    <svg class="w-[18px] h-[18px] absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6" d="M21 21l-4.35-4.35M11 19a8 8 0 100-16 8 8 0 000 16z"/>
                    </svg>
                    <input
                        type="text"
                        name="query"
                        value="{{ request('query') }}"
                        placeholder="Search by Doctor Name or Keyword..."
                        class="w-full pl-10 pr-4 py-2.5 text-sm rounded-xl border border-slate-200 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-emerald-500/30 focus:border-emerald-500 transition-colors"
                    >
                </div>

                {{-- specialty --}}
                <div class="relative">
                    <select name="specialty"
                            class="w-full appearance-none pl-4 pr-9 py-2.5 text-sm rounded-xl border border-slate-200 text-slate-700 focus:outline-none focus:ring-2 focus:ring-emerald-500/30 focus:border-emerald-500 transition-colors">
                        <option value="">All Specialties</option>
                        @foreach ($specializations as $spec)
                            <option value="{{ $spec }}" @selected(request('specialty') == $spec)>{{ $spec }}</option>
                        @endforeach
                    </select>
                    <svg class="w-4 h-4 text-slate-400 absolute right-3.5 top-1/2 -translate-y-1/2 pointer-events-none" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </div>

                {{-- day --}}
                <div class="relative">
                    <select name="day"
                            class="w-full appearance-none pl-4 pr-9 py-2.5 text-sm rounded-xl border border-slate-200 text-slate-700 focus:outline-none focus:ring-2 focus:ring-emerald-500/30 focus:border-emerald-500 transition-colors">
                        <option value="">Any Day</option>
                        @foreach (['Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday'] as $d)
                            <option value="{{ $d }}" @selected(request('day') == $d)>{{ $d }}</option>
                        @endforeach
                    </select>
                    <svg class="w-4 h-4 text-slate-400 absolute right-3.5 top-1/2 -translate-y-1/2 pointer-events-none" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </div>

                {{-- actions --}}
                <div class="flex items-center gap-2">
                    <button type="submit"
                            class="flex-1 lg:flex-none bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-semibold px-5 py-2.5 rounded-xl shadow-sm hover:shadow-md hover:shadow-emerald-600/20 transition-all whitespace-nowrap">
                        Filter
                    </button>

                    @if (request()->filled('query') || request()->filled('specialty') || request()->filled('day'))
                        <a href="{{ route('doctors.index') }}"
                           class="text-sm font-semibold text-slate-500 hover:text-slate-700 px-3 py-2.5 whitespace-nowrap transition-colors">
                            Reset
                        </a>
                    @endif
                </div>
            </div>
        </form>
    </section>

    {{-- ============================================================ --}}
    {{-- DOCTOR GRID                                                   --}}
    {{-- ============================================================ --}}
    <section class="max-w-7xl mx-auto px-6 pb-16">
        @forelse ($doctors as $doctor)
            @if ($loop->first)
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @endif

            @php
                $initials = collect(explode(' ', $doctor->user->name))
                    ->map(fn($n) => strtoupper(substr($n, 0, 1)))
                    ->take(2)
                    ->implode('');
            @endphp

            <div class="flex flex-col bg-white rounded-2xl border border-slate-200 shadow-sm shadow-slate-200/50 p-6 hover:-translate-y-1 hover:shadow-lg hover:shadow-slate-200/70 transition-all duration-300">

                {{-- header --}}
                <div class="flex items-start gap-3.5">
                    <span class="w-14 h-14 shrink-0 rounded-full bg-gradient-to-br from-emerald-600 to-sky-400 text-white font-bold font-display flex items-center justify-center text-lg">
                        {{ $initials }}
                    </span>
                    <div class="min-w-0">
                        <h3 class="font-display font-bold text-slate-900 text-base truncate">{{ $doctor->user->name }}</h3>
                        <span class="inline-block mt-1 bg-emerald-50 text-emerald-700 text-xs font-semibold px-2.5 py-1 rounded-full">
                            {{ $doctor->specialization }}
                        </span>
                        <p class="text-xs text-slate-400 mt-1.5 truncate">{{ $doctor->qualification }} · {{ $doctor->license_number }}</p>
                    </div>
                </div>

                {{-- bio --}}
                @if ($doctor->bio)
                    <p class="text-sm text-slate-500 mt-4 line-clamp-2">{{ $doctor->bio }}</p>
                @endif

                {{-- schedules --}}
                @if ($doctor->schedules && $doctor->schedules->count())
                    <div class="flex flex-wrap gap-1.5 mt-4">
                        @foreach ($doctor->schedules as $schedule)
                            <span class="inline-flex items-center gap-1 bg-slate-50 border border-slate-100 text-slate-600 text-[11px] font-medium px-2.5 py-1 rounded-lg">
                                <svg class="w-3 h-3 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                {{ Str::limit($schedule->day, 3, '') }}
                                ({{ \Carbon\Carbon::parse($schedule->start_time)->format('h:i A') }}
                                - {{ \Carbon\Carbon::parse($schedule->end_time)->format('h:i A') }})
                            </span>
                        @endforeach
                    </div>
                @endif

                {{-- footer --}}
                <div class="mt-auto pt-5 flex items-center justify-between gap-3">
                    <div>
                        <div class="text-[11px] text-slate-400 font-medium">Consultation Fee</div>
                        <div class="font-display font-bold text-slate-900 text-sm">LKR {{ number_format($doctor->consultation_fee, 2) }}</div>
                    </div>

                    @guest
                        <button
                            type="button"
                            @click.prevent="showAuthModal = true"
                            class="bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-semibold px-5 py-2.5 rounded-xl shadow-sm hover:shadow-md hover:shadow-emerald-600/20 transition-all whitespace-nowrap">
                            Book Appointment
                        </button>
                    @else
                        <a href="{{ url('/appointments/book/' . $doctor->id) }}"
                           class="bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-semibold px-5 py-2.5 rounded-xl shadow-sm hover:shadow-md hover:shadow-emerald-600/20 transition-all whitespace-nowrap">
                            Book Appointment
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
            <div class="flex flex-col items-center justify-center text-center bg-white rounded-2xl border border-slate-200 py-20 px-6">
                <span class="w-14 h-14 rounded-full bg-slate-50 flex items-center justify-center mb-4">
                    <svg class="w-7 h-7 text-slate-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6" d="M21 21l-4.35-4.35M11 19a8 8 0 100-16 8 8 0 000 16z"/>
                    </svg>
                </span>
                <h3 class="font-display font-bold text-slate-900 text-lg">No Doctors Found</h3>
                <p class="text-slate-500 text-sm mt-1.5 max-w-sm">
                    We couldn't find any doctors matching your search. Try adjusting your filters or search term.
                </p>
                <a href="{{ route('doctors.index') }}"
                   class="mt-5 inline-flex items-center gap-1.5 text-emerald-600 hover:text-emerald-700 text-sm font-semibold transition-colors">
                    Reset Filters
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
                </a>
            </div>
        @endforelse

        {{-- ============================================================ --}}
        {{-- PAGINATION                                                    --}}
        {{-- ============================================================ --}}
        @if ($doctors->hasPages())
            <div class="mt-10">
                {{ $doctors->links() }}
            </div>
        @endif
    </section>

    {{-- ============================================================ --}}
    {{-- GUEST AUTH REQUIRED MODAL                                     --}}
    {{-- ============================================================ --}}
    <div
        x-show="showAuthModal"
        x-cloak
        x-transition.opacity
        class="fixed inset-0 z-50 flex items-center justify-center px-6"
    >
        {{-- backdrop --}}
        <div @click="showAuthModal = false" class="absolute inset-0 bg-slate-900/50 backdrop-blur-sm"></div>

        {{-- modal card --}}
        <div
            x-show="showAuthModal"
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 scale-95"
            x-transition:enter-end="opacity-100 scale-100"
            class="relative bg-white rounded-2xl shadow-2xl max-w-sm w-full p-7 text-center"
        >
            <button @click="showAuthModal = false" class="absolute top-4 right-4 text-slate-400 hover:text-slate-600">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>

            <span class="w-14 h-14 rounded-full bg-emerald-50 flex items-center justify-center mx-auto mb-4">
                <svg class="w-7 h-7 text-emerald-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                </svg>
            </span>

            <h3 class="font-display font-bold text-lg text-slate-900">Sign in to book an appointment</h3>
            <p class="text-sm text-slate-500 mt-2">Create a free account or log in to continue booking with this doctor.</p>

            <div class="flex flex-col gap-3 mt-6">
                <a href="{{ route('login') }}"
                   class="w-full bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-semibold py-3 rounded-xl transition-colors">
                    Sign In
                </a>
                <a href="{{ route('register') }}"
                   class="w-full border border-slate-200 hover:bg-slate-50 text-slate-700 text-sm font-semibold py-3 rounded-xl transition-colors">
                    Create Account
                </a>
            </div>
        </div>
    </div>

</body>
</html>
