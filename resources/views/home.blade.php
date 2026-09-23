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
        /* ── Hero floating search bar ─────────────────────────────── */
        .hero-search-bar {
            background: rgba(255,255,255,0.92);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(226,232,240,0.8);
            box-shadow:
                0 4px 6px -1px rgba(0,0,0,0.05),
                0 20px 40px -8px rgba(14,165,233,0.12),
                0 0 0 1px rgba(255,255,255,0.6) inset;
        }
        .hero-search-bar:focus-within {
            box-shadow:
                0 4px 6px -1px rgba(0,0,0,0.05),
                0 20px 50px -8px rgba(14,165,233,0.22),
                0 0 0 2px rgba(14,165,233,0.18) inset;
        }
        .search-divider {
            width: 1px;
            background: linear-gradient(to bottom, transparent, #cbd5e1, transparent);
        }
        .location-dropdown option { font-size: 0.875rem; }
        .hero-search-input::placeholder { color: #94a3b8; }
        .hero-search-input:focus { outline: none; }

        /* search button pulse ring on hover */
        .search-btn-ring {
            position: relative;
        }
        .search-btn-ring::after {
            content: '';
            position: absolute;
            inset: -3px;
            border-radius: inherit;
            background: linear-gradient(135deg, #0ea5e9, #6366f1);
            opacity: 0;
            z-index: -1;
            transition: opacity 0.2s;
        }
        .search-btn-ring:hover::after { opacity: 0.25; }

        /* Quick tag pills */
        .quick-tag {
            transition: background 0.15s, color 0.15s, border-color 0.15s;
        }
        .quick-tag:hover {
            background: #e0f2fe;
            border-color: #7dd3fc;
            color: #0369a1;
        }

        /* Floating ambient blobs */
        @keyframes blobFloat {
            0%, 100% { transform: translate(0, 0) scale(1); }
            33%       { transform: translate(18px, -22px) scale(1.04); }
            66%       { transform: translate(-14px, 10px) scale(0.97); }
        }
        .blob { animation: blobFloat 9s ease-in-out infinite; }
        .blob-2 { animation-delay: -4s; animation-duration: 11s; }
        .blob-3 { animation-delay: -7s; animation-duration: 13s; }

        /* Trust pill counter animation */
        @keyframes countUp { from { opacity:0; transform:translateY(4px);} to {opacity:1; transform:translateY(0);} }
        .trust-stat { animation: countUp 0.6s ease both; }
        .trust-stat:nth-child(2) { animation-delay: 0.1s; }
        .trust-stat:nth-child(3) { animation-delay: 0.2s; }
        .trust-stat:nth-child(4) { animation-delay: 0.3s; }
        /* ── PART 3: Service shortcut cards ───────────────────────── */
        .service-card {
            transition: transform 0.22s cubic-bezier(0.34,1.56,0.64,1),
                        box-shadow 0.22s ease;
        }
        .service-card:hover {
            transform: translateY(-6px) scale(1.015);
            box-shadow: 0 20px 40px -8px rgba(14,165,233,0.18),
                        0 8px 16px -4px rgba(0,0,0,0.06);
        }
        .service-card:active { transform: translateY(-2px) scale(1.005); }

        /* Illustration ring glow on card hover */
        .service-card:hover .illus-ring { opacity: 1; }
        .illus-ring {
            opacity: 0;
            transition: opacity 0.22s ease;
        }

        /* Consult section specialty pill chips */
        .spec-chip {
            transition: background 0.15s, color 0.15s, border-color 0.15s, transform 0.15s;
        }
        .spec-chip:hover {
            background: #f0f9ff;
            border-color: #7dd3fc;
            color: #0369a1;
            transform: translateY(-1px);
        }
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

    {{-- ================================================================
         HERO SECTION — PART 2: Elevated Search Module
         ================================================================ --}}
    <section id="hero" class="relative min-h-[calc(100vh-4rem)] flex flex-col items-center justify-center overflow-hidden
                               bg-gradient-to-br from-sky-50 via-white to-indigo-50 px-4 pt-12 pb-20">

        {{-- ── Ambient floating blobs (decorative) ─────────────────── --}}
        <div aria-hidden="true" class="pointer-events-none absolute inset-0 overflow-hidden">
            <div class="blob absolute -top-24 -left-24 w-[480px] h-[480px] rounded-full opacity-[0.35]"
                 style="background: radial-gradient(circle, #bae6fd 0%, transparent 70%);"></div>
            <div class="blob blob-2 absolute top-1/3 -right-32 w-[420px] h-[420px] rounded-full opacity-[0.28]"
                 style="background: radial-gradient(circle, #c7d2fe 0%, transparent 70%);"></div>
            <div class="blob blob-3 absolute -bottom-20 left-1/3 w-[380px] h-[380px] rounded-full opacity-[0.22]"
                 style="background: radial-gradient(circle, #a5f3fc 0%, transparent 70%);"></div>
        </div>

        {{-- ── Pre-headline badge ────────────────────────────────────── --}}
        <div class="relative z-10 inline-flex items-center gap-2 px-3.5 py-1.5 mb-5
                    text-xs font-semibold text-sky-700 bg-sky-100 border border-sky-200/80
                    rounded-full shadow-sm select-none">
            <span class="relative flex h-2 w-2">
                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-sky-400 opacity-75"></span>
                <span class="relative inline-flex rounded-full h-2 w-2 bg-sky-500"></span>
            </span>
            Trusted by 500,000+ patients across Sri Lanka
        </div>

        {{-- ── Headline ──────────────────────────────────────────────── --}}
        <div class="relative z-10 text-center max-w-3xl mx-auto mb-10">
            <h1 class="text-4xl sm:text-5xl lg:text-[3.5rem] font-extrabold tracking-tight text-gray-900 leading-[1.12]">
                Find the Right Doctor,
                <span class="relative inline-block">
                    <span class="bg-gradient-to-r from-sky-500 via-cyan-400 to-indigo-600 bg-clip-text text-transparent">
                        Right Now
                    </span>
                    {{-- Underline squiggle --}}
                    <svg class="absolute -bottom-1.5 left-0 w-full" viewBox="0 0 300 8" fill="none" preserveAspectRatio="none" aria-hidden="true">
                        <path d="M1 5.5 Q37 1 75 5.5 Q113 10 150 5.5 Q188 1 225 5.5 Q262 10 299 5.5"
                              stroke="url(#squiggle-grad)" stroke-width="2.5" stroke-linecap="round" fill="none"/>
                        <defs>
                            <linearGradient id="squiggle-grad" x1="0" y1="0" x2="300" y2="0" gradientUnits="userSpaceOnUse">
                                <stop offset="0%" stop-color="#0ea5e9"/>
                                <stop offset="100%" stop-color="#6366f1"/>
                            </linearGradient>
                        </defs>
                    </svg>
                </span>
            </h1>
            <p class="mt-5 text-base sm:text-lg text-gray-500 font-normal leading-relaxed">
                Book verified doctors, instant video consults, lab tests &amp; surgeries —
                <span class="font-medium text-gray-700">all in one place.</span>
            </p>
        </div>

        {{-- ═══════════════════════════════════════════════════════════
             ELEVATED SEARCH BAR
             ═══════════════════════════════════════════════════════════ --}}
        <div class="relative z-10 w-full max-w-4xl mx-auto">

            {{-- ── Desktop search bar (rounded-full pill) ─────────────── --}}
            <form action="#" method="GET"
                  class="hero-search-bar hidden sm:flex items-stretch rounded-2xl overflow-hidden"
                  role="search"
                  aria-label="Search doctors and clinics">

                {{-- Location Selector --}}
                <div class="flex items-center gap-2 px-5 py-0 min-w-[185px] max-w-[210px] flex-shrink-0 group/loc">
                    {{-- Pin icon --}}
                    <svg class="w-4 h-4 text-sky-500 flex-shrink-0 group-focus-within/loc:text-sky-600 transition-colors"
                         fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>

                    <select name="location"
                            class="w-full py-4 bg-transparent text-sm font-medium text-gray-700
                                   appearance-none cursor-pointer focus:outline-none
                                   location-dropdown"
                            aria-label="Select your location">
                        <option value="sri-lanka"  selected>Sri Lanka</option>
                        <option value="colombo">Colombo</option>
                        <option value="kandy">Kandy</option>
                        <option value="galle">Galle</option>
                        <option value="jaffna">Jaffna</option>
                        <option value="negombo">Negombo</option>
                        <option value="kurunegala">Kurunegala</option>
                        <option value="ratnapura">Ratnapura</option>
                        <option value="matara">Matara</option>
                        <option value="badulla">Badulla</option>
                        <option value="anuradhapura">Anuradhapura</option>
                    </select>

                    {{-- Chevron icon (decorative — since select has native arrow) --}}
                    <svg class="w-3.5 h-3.5 text-gray-400 flex-shrink-0 pointer-events-none -ml-1" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                    </svg>
                </div>

                {{-- Vertical Divider --}}
                <div class="search-divider self-stretch my-3 flex-shrink-0" aria-hidden="true"></div>

                {{-- Doctor / Specialty Search Input --}}
                <div class="flex items-center flex-1 px-5 gap-3 min-w-0 group/srch">
                    {{-- Search icon --}}
                    <svg class="w-4.5 h-4.5 text-gray-400 flex-shrink-0 group-focus-within/srch:text-sky-500 transition-colors"
                         style="width:1.125rem;height:1.125rem"
                         fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>

                    <input type="search"
                           name="query"
                           id="hero-search-input"
                           class="hero-search-input flex-1 py-4 bg-transparent text-sm text-gray-800 font-normal min-w-0"
                           placeholder="Search doctors, clinics, hospitals, or specialties..."
                           autocomplete="off"
                           spellcheck="false"
                           aria-label="Search doctors, clinics, hospitals, or specialties" />
                </div>

                {{-- Search CTA Button --}}
                <div class="p-2 flex-shrink-0">
                    <button type="submit"
                            class="search-btn-ring h-full px-7 flex items-center gap-2 font-semibold text-sm text-white
                                   bg-gradient-to-br from-sky-500 to-indigo-600
                                   hover:from-sky-600 hover:to-indigo-700
                                   rounded-xl shadow-sm hover:shadow-md
                                   transition-all duration-200 active:scale-[0.97]"
                            aria-label="Search">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                        <span>Search</span>
                    </button>
                </div>
            </form>

            {{-- ── Mobile search bar (stacked card) ───────────────────── --}}
            <form action="#" method="GET"
                  class="sm:hidden flex flex-col gap-0 rounded-2xl overflow-hidden
                         bg-white border border-gray-200/80 shadow-lg shadow-sky-100/40"
                  role="search"
                  aria-label="Search doctors and clinics">

                {{-- Location row --}}
                <div class="flex items-center gap-2.5 px-4 py-3.5 border-b border-gray-100">
                    <svg class="w-4 h-4 text-sky-500 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    <select name="location"
                            class="flex-1 bg-transparent text-sm font-medium text-gray-700 appearance-none focus:outline-none"
                            aria-label="Select your location">
                        <option value="sri-lanka" selected>Sri Lanka</option>
                        <option value="colombo">Colombo</option>
                        <option value="kandy">Kandy</option>
                        <option value="galle">Galle</option>
                        <option value="jaffna">Jaffna</option>
                        <option value="negombo">Negombo</option>
                        <option value="kurunegala">Kurunegala</option>
                    </select>
                    <svg class="w-3.5 h-3.5 text-gray-400 flex-shrink-0 pointer-events-none" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                    </svg>
                </div>

                {{-- Search input row --}}
                <div class="flex items-center gap-2.5 px-4 py-3.5">
                    <svg class="w-4 h-4 text-gray-400 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                    <input type="search"
                           name="query"
                           class="hero-search-input flex-1 bg-transparent text-sm text-gray-800"
                           placeholder="Search doctors, clinics, hospitals..."
                           autocomplete="off"
                           aria-label="Search doctors" />
                </div>

                {{-- Mobile submit button --}}
                <div class="px-4 pb-4">
                    <button type="submit"
                            class="w-full py-3 flex items-center justify-center gap-2 font-semibold text-sm text-white
                                   bg-gradient-to-r from-sky-500 to-indigo-600
                                   hover:from-sky-600 hover:to-indigo-700
                                   rounded-xl shadow-sm active:scale-[0.98]
                                   transition-all duration-200">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                        Search Doctors
                    </button>
                </div>
            </form>

            {{-- ── Quick-access tag pills ───────────────────────────────── --}}
            <div class="mt-4 flex items-center flex-wrap gap-2 justify-center" aria-label="Popular searches">
                <span class="text-xs text-gray-400 font-medium mr-1">Popular:</span>

                @php
                    $quickTags = [
                        ['label' => '🩺 General Physician', 'q' => 'general+physician'],
                        ['label' => '🦷 Dentist',           'q' => 'dentist'],
                        ['label' => '❤️ Cardiologist',      'q' => 'cardiologist'],
                        ['label' => '🧒 Pediatrician',      'q' => 'pediatrician'],
                        ['label' => '🧠 Neurologist',       'q' => 'neurologist'],
                        ['label' => '👁 Eye Specialist',    'q' => 'eye+specialist'],
                    ];
                @endphp

                @foreach ($quickTags as $tag)
                    <a href="?query={{ $tag['q'] }}"
                       class="quick-tag inline-flex items-center px-3 py-1 text-xs font-medium
                              text-gray-600 bg-white border border-gray-200 rounded-full
                              hover:shadow-sm transition-all duration-150 cursor-pointer select-none">
                        {{ $tag['label'] }}
                    </a>
                @endforeach
            </div>
        </div>

        {{-- ── Trust stats row ──────────────────────────────────────── --}}
        <div class="relative z-10 mt-12 flex flex-wrap items-center justify-center gap-x-8 gap-y-4"
             aria-label="Platform statistics">

            @php
                $trustStats = [
                    ['icon' => 'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0',
                     'value' => '1,200+', 'label' => 'Verified Doctors', 'color' => 'sky'],
                    ['icon' => 'M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4',
                     'value' => '350+', 'label' => 'Clinics & Hospitals', 'color' => 'indigo'],
                    ['icon' => 'M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z',
                     'value' => '500K+', 'label' => 'Appointments Booked', 'color' => 'cyan'],
                    ['icon' => 'M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z',
                     'value' => '4.9 / 5', 'label' => 'Average Rating', 'color' => 'amber'],
                ];
            @endphp

            @foreach ($trustStats as $i => $stat)
            <div class="trust-stat flex items-center gap-2.5 group">
                <div class="flex-shrink-0 w-8 h-8 rounded-lg flex items-center justify-center
                            @if($stat['color'] === 'sky')    bg-sky-100   @elseif($stat['color'] === 'indigo') bg-indigo-100
                            @elseif($stat['color'] === 'cyan') bg-cyan-100 @else                               bg-amber-100 @endif">
                    <svg class="w-4 h-4
                                @if($stat['color'] === 'sky')    text-sky-600   @elseif($stat['color'] === 'indigo') text-indigo-600
                                @elseif($stat['color'] === 'cyan') text-cyan-600 @else                               text-amber-500 @endif"
                         fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="{{ $stat['icon'] }}" />
                    </svg>
                </div>
                <div>
                    <p class="text-sm font-bold text-gray-800 leading-none">{{ $stat['value'] }}</p>
                    <p class="text-xs text-gray-500 mt-0.5">{{ $stat['label'] }}</p>
                </div>
                @if (!$loop->last)
                <div class="hidden sm:block w-px h-7 bg-gray-200 ml-5" aria-hidden="true"></div>
                @endif
            </div>
            @endforeach
        </div>

    </section>


    {{-- ================================================================
         PART 3 – SECTION 1: Four Primary Service Shortcuts
         ================================================================ --}}
    <section id="services" class="py-16 bg-white" aria-labelledby="services-heading">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- Section label --}}
            <p id="services-heading" class="sr-only">Primary Healthcare Services</p>

            {{-- 4-column card grid --}}
            <div class="grid grid-cols-2 md:grid-cols-4 gap-5 sm:gap-6">

                @php
                    $services = [

                        /* ─── 1. Online Video Consultation ─── */
                        [
                            'id'       => 'video-consult',
                            'href'     => '#video-consult',
                            'label'    => 'Online Video
Consultation',
                            'badge'    => 'Available 24/7',
                            'badge_color' => 'emerald',
                            'from'     => '#dbeafe',   /* blue-100  */
                            'to'       => '#bfdbfe',   /* blue-200  */
                            'icon_bg'  => '#3b82f6',   /* blue-500  */
                            'icon_path'=> 'M15 10l4.553-2.069A1 1 0 0121 8.82v6.36a1 1 0 01-1.447.894L15 14M3 8a2 2 0 012-2h10a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2V8z',
                            /* decorative mini illustration paths */
                            'deco_fill'=> '#93c5fd',
                        ],

                        /* ─── 2. Book Appointment ─── */
                        [
                            'id'       => 'book-appt',
                            'href'     => '#find-doctors',
                            'label'    => 'Book
Appointment',
                            'badge'    => 'Instant Booking',
                            'badge_color' => 'sky',
                            'from'     => '#e0e7ff',   /* indigo-100 */
                            'to'       => '#c7d2fe',   /* indigo-200 */
                            'icon_bg'  => '#6366f1',   /* indigo-500 */
                            'icon_path'=> 'M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z',
                            'deco_fill'=> '#a5b4fc',
                        ],

                        /* ─── 3. Lab Tests ─── */
                        [
                            'id'       => 'lab',
                            'href'     => '#lab-tests',
                            'label'    => 'Lab Tests
at Home',
                            'badge'    => 'Home Collection',
                            'badge_color' => 'cyan',
                            'from'     => '#cffafe',   /* cyan-100  */
                            'to'       => '#a5f3fc',   /* cyan-200  */
                            'icon_bg'  => '#06b6d4',   /* cyan-500  */
                            'icon_path'=> 'M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z',
                            'deco_fill'=> '#67e8f9',
                        ],

                        /* ─── 4. AI Chat Bot ─── */
                        [
                            'id'       => 'ai',
                            'href'     => '#ai-chatbot',
                            'label'    => 'AI Health
Chat Bot',
                            'badge'    => 'NEW',
                            'badge_color' => 'violet',
                            'from'     => '#ede9fe',   /* violet-100 */
                            'to'       => '#ddd6fe',   /* violet-200 */
                            'icon_bg'  => '#8b5cf6',   /* violet-500 */
                            'icon_path'=> 'M9.75 3.104v5.714a2.25 2.25 0 01-.659 1.591L5 14.5M9.75 3.104c-.251.023-.501.05-.75.082m.75-.082a24.301 24.301 0 014.5 0m0 0v5.714c0 .597.237 1.17.659 1.591L19.8 15M14.25 3.104c.251.023.501.05.75.082M19.8 15l-3.6 3.6a2.25 2.25 0 01-3.182 0L9.4 15M19.8 15l.9-.9m-11.3.9-.9-.9M12 12.75a.75.75 0 100-1.5.75.75 0 000 1.5z',
                            'deco_fill'=> '#c4b5fd',
                        ],
                    ];
                @endphp

                @foreach ($services as $svc)
                <a href="{{ $svc['href'] }}"
                   class="service-card group relative flex flex-col items-center text-center
                          bg-white border border-gray-100 rounded-2xl p-6 sm:p-7
                          shadow-sm cursor-pointer select-none overflow-hidden"
                   aria-label="{{ str_replace(chr(10), ' ', $svc['label']) }}">

                    {{-- Subtle corner gradient tint --}}
                    <div class="absolute inset-0 opacity-0 group-hover:opacity-100 transition-opacity duration-300 pointer-events-none rounded-2xl"
                         style="background: radial-gradient(ellipse at 50% 0%, {{ $svc['from'] }}55, transparent 70%);"
                         aria-hidden="true"></div>

                    {{-- Illustration container --}}
                    <div class="relative mb-5 w-[88px] h-[88px] sm:w-24 sm:h-24 flex-shrink-0">

                        {{-- Ambient glow ring --}}
                        <div class="illus-ring absolute inset-0 rounded-full"
                             style="box-shadow: 0 0 0 8px {{ $svc['from'] }}, 0 0 0 14px {{ $svc['to'] }}40;"
                             aria-hidden="true"></div>

                        {{-- Gradient circle background --}}
                        <div class="relative w-full h-full rounded-full flex items-center justify-center"
                             style="background: linear-gradient(135deg, {{ $svc['from'] }} 0%, {{ $svc['to'] }} 100%);">

                            {{-- Decorative inner ring --}}
                            <div class="absolute inset-2 rounded-full border-2 border-white/60" aria-hidden="true"></div>

                            {{-- Service icon --}}
                            <svg class="relative w-9 h-9 sm:w-10 sm:h-10 drop-shadow-sm"
                                 fill="none" stroke="{{ $svc['icon_bg'] }}" stroke-width="1.7"
                                 viewBox="0 0 24 24" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="{{ $svc['icon_path'] }}" />
                            </svg>
                        </div>

                        {{-- AI badge shimmer for the AI card --}}
                        @if($svc['id'] === 'ai')
                        <span class="badge-ai absolute -top-1 -right-1 text-white text-[9px] font-bold
                                     tracking-wide px-1.5 py-0.5 rounded-full leading-none shadow-sm">
                            NEW
                        </span>
                        @endif
                    </div>

                    {{-- Title --}}
                    <h3 class="font-bold text-sm sm:text-base text-gray-800 leading-snug
                               group-hover:text-sky-700 transition-colors duration-200 whitespace-pre-line">{{ $svc['label'] }}</h3>

                    {{-- Badge pill --}}
                    <span class="mt-2.5 inline-flex items-center px-2.5 py-0.5 rounded-full text-[10px] font-semibold
                                 @if($svc['badge_color'] === 'emerald') bg-emerald-50 text-emerald-700
                                 @elseif($svc['badge_color'] === 'sky')    bg-sky-50    text-sky-700
                                 @elseif($svc['badge_color'] === 'cyan')   bg-cyan-50   text-cyan-700
                                 @elseif($svc['badge_color'] === 'violet') bg-violet-50 text-violet-700
                                 @else bg-gray-100 text-gray-600 @endif">
                        @if($svc['badge_color'] === 'emerald')
                            <span class="mr-1 inline-block w-1.5 h-1.5 rounded-full bg-emerald-400 animate-pulse"></span>
                        @endif
                        {{ $svc['badge'] }}
                    </span>

                    {{-- Hover arrow indicator --}}
                    <div class="mt-3 opacity-0 group-hover:opacity-100 transition-all duration-200 translate-y-1 group-hover:translate-y-0">
                        <svg class="w-4 h-4 text-sky-500 mx-auto" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                        </svg>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ================================================================
         PART 3 – SECTION 2: Consult Top Doctors Header + Specialties
         ================================================================ --}}
    <section id="video-consult" class="py-16 bg-gradient-to-b from-gray-50 to-white" aria-labelledby="consult-heading">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- ── Header row: headline + CTA button ───────────────────── --}}
            <div class="flex flex-col sm:flex-row sm:items-start sm:justify-between gap-4 mb-10">

                <div class="max-w-xl">
                    {{-- Eyebrow --}}
                    <div class="flex items-center gap-2 mb-3">
                        <div class="w-6 h-0.5 bg-gradient-to-r from-sky-500 to-indigo-500 rounded-full"></div>
                        <span class="text-xs font-semibold uppercase tracking-widest text-sky-600">Online Consultations</span>
                    </div>

                    {{-- Main headline --}}
                    <h2 id="consult-heading"
                        class="text-2xl sm:text-3xl lg:text-[2.1rem] font-extrabold text-gray-900 leading-tight tracking-tight">
                        Consult top doctors online<br class="hidden sm:block" />
                        <span class="text-transparent bg-clip-text bg-gradient-to-r from-sky-500 to-indigo-600">
                            for any health concern
                        </span>
                    </h2>

                    {{-- Subtitle --}}
                    <p class="mt-3 text-sm sm:text-base text-gray-500 leading-relaxed">
                        Private online consultations with verified doctors in all specialties —
                        <span class="font-medium text-gray-700">results in minutes, not days.</span>
                    </p>
                </div>

                {{-- CTA — desktop: right-aligned, mobile: below subtitle --}}
                <div class="flex-shrink-0 self-start sm:mt-2">
                    <a href="#find-doctors"
                       class="inline-flex items-center gap-2 px-5 py-2.5 text-sm font-semibold
                              text-sky-600 border-2 border-sky-200 hover:border-sky-400 hover:bg-sky-50
                              rounded-full transition-all duration-200 group/cta whitespace-nowrap">
                        View All Specialities
                        <svg class="w-3.5 h-3.5 transition-transform duration-200 group-hover/cta:translate-x-0.5"
                             fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                        </svg>
                    </a>
                </div>
            </div>

            {{-- ── Specialty chips grid ──────────────────────────────────── --}}
            @php
                $specialties = [
                    ['label'=>'🩺 General Physician',  'count'=>'280+ Doctors'],
                    ['label'=>'❤️  Cardiologist',       'count'=>'95+ Doctors'],
                    ['label'=>'🧠 Neurologist',         'count'=>'60+ Doctors'],
                    ['label'=>'🦷 Dentist',             'count'=>'175+ Doctors'],
                    ['label'=>'👶 Pediatrician',        'count'=>'130+ Doctors'],
                    ['label'=>'🧬 Dermatologist',       'count'=>'88+ Doctors'],
                    ['label'=>'👁  Eye Specialist',     'count'=>'72+ Doctors'],
                    ['label'=>'🦴 Orthopedic',          'count'=>'65+ Doctors'],
                    ['label'=>'🏃 Physiotherapist',     'count'=>'54+ Doctors'],
                    ['label'=>'🌿 Ayurveda',            'count'=>'42+ Doctors'],
                    ['label'=>'🧪 Pathologist',         'count'=>'38+ Doctors'],
                    ['label'=>'🔬 Oncologist',          'count'=>'29+ Doctors'],
                ];
            @endphp

            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-3 sm:gap-4">
                @foreach ($specialties as $spec)
                <a href="{{ url('#find-doctors') }}?specialty={{ urlencode($spec['label']) }}"
                   class="spec-chip flex items-center justify-between gap-3 px-4 py-3.5
                          bg-white border border-gray-100 rounded-xl shadow-sm
                          cursor-pointer group/spec">
                    <span class="text-sm font-semibold text-gray-800 leading-tight">{{ $spec['label'] }}</span>
                    <span class="text-[11px] font-medium text-gray-400 whitespace-nowrap group-hover/spec:text-sky-600 transition-colors">
                        {{ $spec['count'] }}
                    </span>
                </a>
                @endforeach
            </div>

            {{-- ── Bottom promo strip ───────────────────────────────────── --}}
            <div class="mt-10 flex flex-col sm:flex-row items-center justify-between gap-4
                        bg-gradient-to-r from-sky-50 via-indigo-50 to-sky-50
                        border border-sky-100 rounded-2xl px-6 py-4">

                <div class="flex items-center gap-3">
                    {{-- Stacked avatar dots --}}
                    <div class="flex -space-x-2" aria-hidden="true">
                        @foreach(['#bae6fd','#c7d2fe','#99f6e4','#fde68a'] as $color)
                        <div class="w-8 h-8 rounded-full border-2 border-white flex items-center justify-center"
                             style="background:{{ $color }};">
                        </div>
                        @endforeach
                        <div class="w-8 h-8 rounded-full border-2 border-white bg-gradient-to-br from-sky-400 to-indigo-500
                                    flex items-center justify-center text-white text-[9px] font-bold">
                            +496
                        </div>
                    </div>
                    <p class="text-sm text-gray-600">
                        <span class="font-semibold text-gray-900">500+ doctors</span> available right now for instant consultation
                    </p>
                </div>

                <a href="#find-doctors"
                   class="flex-shrink-0 inline-flex items-center gap-2 px-5 py-2.5 text-sm font-semibold text-white
                          bg-gradient-to-r from-sky-500 to-indigo-600 hover:from-sky-600 hover:to-indigo-700
                          rounded-full shadow-sm hover:shadow-md transition-all duration-200">
                    <span class="relative flex h-2 w-2" aria-hidden="true">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-white opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2 w-2 bg-white"></span>
                    </span>
                    Consult Now
                </a>
            </div>

        </div>
    </section>
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
