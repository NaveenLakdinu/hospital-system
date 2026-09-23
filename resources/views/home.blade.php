<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>MediCare24 &mdash; Quality Healthcare, Anytime</title>
    <meta name="description" content="Book doctor appointments, video consultations, lab tests and surgeries with MediCare24 &mdash; your trusted healthcare partner." />

    {{-- Google Fonts: Inter for crisp medical-grade typography --}}
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet" />

    {{-- Vite: Tailwind CSS + App JS --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body { font-family: 'Inter', ui-sans-serif, system-ui, sans-serif; }

        /* Smooth nav link underline animation */
        .nav-link-animated { position: relative; }
        .nav-link-animated::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 0;
            height: 2px;
            background: linear-gradient(90deg, #0ea5e9, #6366f1);
            border-radius: 9999px;
            transition: width 0.25s ease;
        }
        .nav-link-animated:hover::after { width: 100%; }

        /* AI badge shimmer */
        @keyframes shimmer {
            0%   { background-position: -200% center; }
            100% { background-position:  200% center; }
        }
        .badge-ai {
            background: linear-gradient(90deg, #7c3aed, #0ea5e9, #6d28d9, #38bdf8);
            background-size: 200% auto;
            animation: shimmer 3s linear infinite;
        }

        /* Mobile menu slide transition */
        #mobile-menu {
            transition: max-height 0.35s cubic-bezier(0.4, 0, 0.2, 1), opacity 0.3s ease;
            max-height: 0;
            opacity: 0;
            overflow: hidden;
        }
        #mobile-menu.open { max-height: 600px; opacity: 1; }
    </style>
</head>

<body class="bg-white text-gray-900 antialiased">

{{-- ===================================================================
     NAVIGATION BAR
     =================================================================== --}}
<header class="sticky top-0 z-50 w-full bg-white/95 backdrop-blur-md border-b border-gray-100 shadow-sm">
    <nav class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8" aria-label="Main navigation">

        {{-- Desktop Nav Row --}}
        <div class="flex items-center justify-between h-16">

            {{-- Brand Logo --}}
            <a href="{{ url('/') }}"
               class="flex items-center gap-2.5 group flex-shrink-0"
               aria-label="MediCare24 Home">

                <div class="relative w-9 h-9 flex-shrink-0">
                    <svg viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg"
                         class="w-9 h-9 drop-shadow-sm group-hover:scale-105 transition-transform duration-200">
                        <circle cx="18" cy="18" r="17" fill="url(#grad-logo)" />
                        <rect x="15" y="8"  width="6" height="20" rx="2" fill="white" />
                        <rect x="8"  y="15" width="20" height="6"  rx="2" fill="white" />
                        <circle cx="18" cy="18" r="2.5" fill="url(#grad-logo)" />
                        <line x1="18" y1="18" x2="18" y2="13.5" stroke="white" stroke-width="1.8" stroke-linecap="round"/>
                        <line x1="18" y1="18" x2="21.5" y2="18" stroke="white" stroke-width="1.8" stroke-linecap="round"/>
                        <defs>
                            <linearGradient id="grad-logo" x1="0" y1="0" x2="36" y2="36" gradientUnits="userSpaceOnUse">
                                <stop offset="0%"   stop-color="#0ea5e9" />
                                <stop offset="100%" stop-color="#6366f1" />
                            </linearGradient>
                        </defs>
                    </svg>
                </div>

                <span class="text-xl font-bold tracking-tight leading-none select-none">
                    <span class="text-sky-500">Medi</span><span class="text-indigo-600">Care</span><span class="text-gray-800">24</span>
                </span>
            </a>

            {{-- Main Nav Links (Desktop) --}}
            <div class="hidden lg:flex items-center gap-1 ml-10">

                @php
                    $mainLinks = [
                        [
                            'label' => 'Find Doctors',
                            'href'  => '#find-doctors',
                            'icon'  => 'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0',
                        ],
                        [
                            'label' => 'Video Consult',
                            'href'  => '#video-consult',
                            'icon'  => 'M15 10l4.553-2.069A1 1 0 0121 8.82v6.36a1 1 0 01-1.447.894L15 14M3 8a2 2 0 012-2h10a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2V8z',
                        ],
                        [
                            'label' => 'Lab Tests',
                            'href'  => '#lab-tests',
                            'icon'  => 'M9 3H5a2 2 0 00-2 2v4m6-6h10a2 2 0 012 2v4M9 3v18m0 0h10a2 2 0 002-2V9M9 21H5a2 2 0 01-2-2V9m0 0h18',
                        ],
                        [
                            'label' => 'Surgeries',
                            'href'  => '#surgeries',
                            'icon'  => 'M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z',
                        ],
                    ];
                @endphp

                @foreach ($mainLinks as $link)
                <a href="{{ $link['href'] }}"
                   class="nav-link-animated flex items-center gap-1.5 px-3 py-2 text-sm font-medium text-gray-600 hover:text-sky-600 rounded-lg hover:bg-sky-50/60 transition-colors duration-150 group/nl">
                    <svg class="w-4 h-4 text-gray-400 group-hover/nl:text-sky-500 transition-colors duration-150"
                         fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="{{ $link['icon'] }}" />
                    </svg>
                    {{ $link['label'] }}
                </a>
                @endforeach
            </div>

            {{-- Utility Links + CTA (Desktop) --}}
            <div class="hidden lg:flex items-center gap-1.5 ml-auto pl-6">

                {{-- AI Chat Bot --}}
                <a href="#ai-chatbot"
                   class="flex items-center gap-2 px-3 py-1.5 text-sm font-medium text-indigo-700 hover:text-indigo-900 hover:bg-indigo-50/70 rounded-lg transition-colors duration-150 group/ai">
                    <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M9.75 3.104v5.714a2.25 2.25 0 01-.659 1.591L5 14.5M9.75 3.104c-.251.023-.501.05-.75.082m.75-.082a24.301 24.301 0 014.5 0m0 0v5.714c0 .597.237 1.17.659 1.591L19.8 15M14.25 3.104c.251.023.501.05.75.082M19.8 15l-3.6 3.6a2.25 2.25 0 01-3.182 0L9.4 15M19.8 15l.9-.9m-11.3.9-.9-.9M12 12.75a.75.75 0 100-1.5.75.75 0 000 1.5z" />
                    </svg>
                    AI Chat Bot
                    <span class="badge-ai text-white text-[10px] font-semibold tracking-wide px-1.5 py-0.5 rounded-full leading-none select-none">
                        NEW
                    </span>
                </a>

                <div class="w-px h-4 bg-gray-200 mx-1" aria-hidden="true"></div>

                {{-- For Providers --}}
                <a href="#for-providers"
                   class="px-3 py-1.5 text-sm font-medium text-gray-600 hover:text-gray-900 hover:bg-gray-50 rounded-lg transition-colors duration-150">
                    For Providers
                </a>

                {{-- Security & Help --}}
                <a href="#help"
                   class="flex items-center gap-1 px-3 py-1.5 text-sm font-medium text-gray-600 hover:text-gray-900 hover:bg-gray-50 rounded-lg transition-colors duration-150">
                    <svg class="w-3.5 h-3.5 text-gray-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z" />
                    </svg>
                    Security &amp; Help
                </a>

                <div class="w-px h-4 bg-gray-200 mx-1" aria-hidden="true"></div>

                {{-- Auth Buttons --}}
                @auth
                    <a href="{{ route('dashboard') }}"
                       class="flex items-center gap-1.5 px-4 py-2 text-sm font-semibold text-white bg-gradient-to-r from-sky-500 to-indigo-600 hover:from-sky-600 hover:to-indigo-700 rounded-full shadow-sm hover:shadow-md transition-all duration-200">
                        Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}"
                       class="px-4 py-2 text-sm font-semibold text-sky-600 border border-sky-200 hover:border-sky-400 hover:bg-sky-50 rounded-full transition-all duration-200">
                        Login
                    </a>
                    <a href="{{ route('register') }}"
                       class="flex items-center gap-1.5 px-4 py-2 text-sm font-semibold text-white bg-gradient-to-r from-sky-500 to-indigo-600 hover:from-sky-600 hover:to-indigo-700 rounded-full shadow-sm hover:shadow-md transition-all duration-200">
                        Sign Up
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                        </svg>
                    </a>
                @endauth
            </div>

            {{-- Mobile Hamburger Button --}}
            <button id="mobile-menu-btn"
                    type="button"
                    aria-controls="mobile-menu"
                    aria-expanded="false"
                    aria-label="Toggle navigation menu"
                    class="lg:hidden flex items-center justify-center w-9 h-9 rounded-lg text-gray-500 hover:text-gray-900 hover:bg-gray-100 transition-colors duration-150 ml-3 flex-shrink-0">
                <svg id="icon-menu" class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
                <svg id="icon-close" class="w-5 h-5 hidden" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        {{-- Mobile Menu --}}
        <div id="mobile-menu" role="dialog" aria-label="Mobile navigation">
            <div class="border-t border-gray-100 py-4 space-y-1">

                <p class="px-4 pb-1 text-[10px] font-semibold uppercase tracking-widest text-gray-400">Services</p>

                <a href="#find-doctors"
                   class="flex items-center gap-3 px-4 py-2.5 text-sm font-medium text-gray-700 hover:text-sky-600 hover:bg-sky-50 rounded-lg transition-colors duration-150 mx-2">
                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0" />
                    </svg>
                    Find Doctors
                </a>

                <a href="#video-consult"
                   class="flex items-center gap-3 px-4 py-2.5 text-sm font-medium text-gray-700 hover:text-sky-600 hover:bg-sky-50 rounded-lg transition-colors duration-150 mx-2">
                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 10l4.553-2.069A1 1 0 0121 8.82v6.36a1 1 0 01-1.447.894L15 14M3 8a2 2 0 012-2h10a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2V8z" />
                    </svg>
                    Video Consult
                </a>

                <a href="#lab-tests"
                   class="flex items-center gap-3 px-4 py-2.5 text-sm font-medium text-gray-700 hover:text-sky-600 hover:bg-sky-50 rounded-lg transition-colors duration-150 mx-2">
                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 3H5a2 2 0 00-2 2v4m6-6h10a2 2 0 012 2v4M9 3v18m0 0h10a2 2 0 002-2V9M9 21H5a2 2 0 01-2-2V9m0 0h18" />
                    </svg>
                    Lab Tests
                </a>

                <a href="#surgeries"
                   class="flex items-center gap-3 px-4 py-2.5 text-sm font-medium text-gray-700 hover:text-sky-600 hover:bg-sky-50 rounded-lg transition-colors duration-150 mx-2">
                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                    </svg>
                    Surgeries
                </a>

                <div class="pt-3 border-t border-gray-100 mx-2 mt-2">
                    <p class="px-2 pb-1 text-[10px] font-semibold uppercase tracking-widest text-gray-400">More</p>

                    <a href="#ai-chatbot"
                       class="flex items-center gap-3 px-4 py-2.5 text-sm font-medium text-indigo-700 hover:bg-indigo-50 rounded-lg transition-colors duration-150">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 3.104v5.714a2.25 2.25 0 01-.659 1.591L5 14.5M9.75 3.104c-.251.023-.501.05-.75.082m.75-.082a24.301 24.301 0 014.5 0m0 0v5.714c0 .597.237 1.17.659 1.591L19.8 15M14.25 3.104c.251.023.501.05.75.082M19.8 15l-3.6 3.6a2.25 2.25 0 01-3.182 0L9.4 15M19.8 15l.9-.9m-11.3.9-.9-.9M12 12.75a.75.75 0 100-1.5.75.75 0 000 1.5z" />
                        </svg>
                        AI Chat Bot
                        <span class="badge-ai text-white text-[10px] font-semibold tracking-wide px-1.5 py-0.5 rounded-full leading-none ml-1">NEW</span>
                    </a>

                    <a href="#for-providers"
                       class="flex items-center gap-3 px-4 py-2.5 text-sm font-medium text-gray-700 hover:bg-gray-50 rounded-lg transition-colors duration-150">
                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                        </svg>
                        For Providers
                    </a>

                    <a href="#help"
                       class="flex items-center gap-3 px-4 py-2.5 text-sm font-medium text-gray-700 hover:bg-gray-50 rounded-lg transition-colors duration-150">
                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z" />
                        </svg>
                        Security &amp; Help
                    </a>
                </div>

                <div class="pt-3 pb-2 px-2 border-t border-gray-100 mt-2 flex flex-col gap-2">
                    @auth
                        <a href="{{ route('dashboard') }}"
                           class="flex items-center justify-center gap-2 w-full py-2.5 text-sm font-semibold text-white bg-gradient-to-r from-sky-500 to-indigo-600 rounded-full shadow-sm">
                            Go to Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}"
                           class="flex items-center justify-center w-full py-2.5 text-sm font-semibold text-sky-600 border border-sky-200 hover:border-sky-400 hover:bg-sky-50 rounded-full transition-all duration-200">
                            Login
                        </a>
                        <a href="{{ route('register') }}"
                           class="flex items-center justify-center gap-2 w-full py-2.5 text-sm font-semibold text-white bg-gradient-to-r from-sky-500 to-indigo-600 rounded-full shadow-sm hover:shadow-md transition-all duration-200">
                            Create Free Account
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                            </svg>
                        </a>
                    @endauth
                </div>
            </div>
        </div>

    </nav>
</header>

{{-- ===================================================================
     MAIN CONTENT
     =================================================================== --}}
<main id="main-content">

    {{-- Hero Section Placeholder --}}
    <section id="hero" class="min-h-[calc(100vh-4rem)] flex items-center justify-center bg-gradient-to-br from-sky-50 via-white to-indigo-50">
        <div class="text-center px-4">
            <div class="inline-flex items-center gap-2 px-3 py-1.5 mb-6 text-xs font-medium text-sky-700 bg-sky-100 border border-sky-200 rounded-full">
                <span class="relative flex h-2 w-2">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-sky-400 opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-2 w-2 bg-sky-500"></span>
                </span>
                PART 1 Complete &mdash; Navigation Bar Rendered
            </div>
            <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold tracking-tight text-gray-900 mb-4">
                Hero Section
                <span class="block bg-gradient-to-r from-sky-500 to-indigo-600 bg-clip-text text-transparent">
                    Coming in PART 2
                </span>
            </h1>
            <p class="mt-4 text-lg text-gray-500 max-w-xl mx-auto">
                The hero, search bar, feature cards, and trust indicators will be built here next.
            </p>
        </div>
    </section>

    <section id="find-doctors"  class="py-16 bg-white            text-center text-gray-300 text-sm tracking-widest uppercase">Find Doctors &mdash; Placeholder</section>
    <section id="video-consult" class="py-16 bg-gray-50           text-center text-gray-300 text-sm tracking-widest uppercase">Video Consult &mdash; Placeholder</section>
    <section id="lab-tests"     class="py-16 bg-white            text-center text-gray-300 text-sm tracking-widest uppercase">Lab Tests &mdash; Placeholder</section>
    <section id="surgeries"     class="py-16 bg-gray-50           text-center text-gray-300 text-sm tracking-widest uppercase">Surgeries &mdash; Placeholder</section>
    <section id="ai-chatbot"    class="py-16 bg-white            text-center text-gray-300 text-sm tracking-widest uppercase">AI Chat Bot &mdash; Placeholder</section>
    <section id="for-providers" class="py-16 bg-gray-50           text-center text-gray-300 text-sm tracking-widest uppercase">For Providers &mdash; Placeholder</section>
    <section id="help"          class="py-16 bg-white            text-center text-gray-300 text-sm tracking-widest uppercase">Security &amp; Help &mdash; Placeholder</section>

</main>

{{-- ===================================================================
     JAVASCRIPT: Hamburger Menu Toggle (zero dependencies)
     =================================================================== --}}
<script>
(function () {
    const btn       = document.getElementById('mobile-menu-btn');
    const menu      = document.getElementById('mobile-menu');
    const iconMenu  = document.getElementById('icon-menu');
    const iconClose = document.getElementById('icon-close');

    if (!btn || !menu) return;

    function closeMenu() {
        menu.classList.remove('open');
        btn.setAttribute('aria-expanded', 'false');
        iconMenu.classList.remove('hidden');
        iconClose.classList.add('hidden');
    }

    btn.addEventListener('click', function () {
        const isOpen = menu.classList.toggle('open');
        btn.setAttribute('aria-expanded', String(isOpen));
        iconMenu.classList.toggle('hidden', isOpen);
        iconClose.classList.toggle('hidden', !isOpen);
    });

    menu.querySelectorAll('a').forEach(function (link) {
        link.addEventListener('click', closeMenu);
    });

    document.addEventListener('click', function (e) {
        if (!btn.contains(e.target) && !menu.contains(e.target)) {
            closeMenu();
        }
    });
})();
</script>

</body>
</html>
