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

        /* ── PART 4: Symptoms carousel ────────────────────────────── */

        /* Hide scrollbar cross-browser while keeping scroll */
        .symptom-scroll {
            -ms-overflow-style: none;
            scrollbar-width: none;
            scroll-snap-type: x mandatory;
            -webkit-overflow-scrolling: touch;
        }
        .symptom-scroll::-webkit-scrollbar { display: none; }

        /* Each card snaps into place on mobile */
        .symptom-card { scroll-snap-align: start; }

        /* Circle image container */
        .symptom-avatar {
            transition: transform 0.22s cubic-bezier(0.34,1.56,0.64,1),
                        box-shadow 0.2s ease;
        }
        .symptom-card:hover .symptom-avatar {
            transform: translateY(-5px) scale(1.04);
        }

        /* Fade-in gradient left/right edge on desktop to hint scroll */
        .symptom-track-wrap { position: relative; }
        .symptom-track-wrap::before,
        .symptom-track-wrap::after {
            content: '';
            position: absolute;
            top: 0; bottom: 0;
            width: 48px;
            z-index: 2;
            pointer-events: none;
        }
        .symptom-track-wrap::before {
            left: 0;
            background: linear-gradient(to right, #f9fafb, transparent);
        }
        .symptom-track-wrap::after {
            right: 0;
            background: linear-gradient(to left, #f9fafb, transparent);
        }

        /* "CONSULT NOW" hover chevron nudge */
        .consult-link .chevron {
            display: inline-block;
            transition: transform 0.18s ease;
        }
        .consult-link:hover .chevron { transform: translateX(3px); }
        .consult-link:hover { color: #0369a1; }

        /* Scroll arrow buttons */
        .scroll-arrow {
            transition: background 0.15s, box-shadow 0.15s, transform 0.15s;
        }
        .scroll-arrow:hover {
            background: #fff;
            box-shadow: 0 4px 12px rgba(14,165,233,0.18);
            transform: scale(1.08);
        }
        .scroll-arrow:active { transform: scale(0.96); }

        /* ── PART 5: In-Clinic specialty cards ────────────────────── */
        .clinic-card {
            transition: transform 0.22s cubic-bezier(0.34,1.56,0.64,1),
                        box-shadow 0.22s ease,
                        border-color 0.2s ease;
        }
        .clinic-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 20px 40px -8px rgba(14,165,233,0.15),
                        0 8px 16px -4px rgba(0,0,0,0.06);
        }
        .clinic-card:active { transform: translateY(-2px); }

        .clinic-icon-wrap {
            transition: box-shadow 0.22s ease;
        }
        .clinic-card:hover .clinic-icon-wrap {
            box-shadow: 0 0 0 6px rgba(14,165,233,0.12);
        }

        /* Book Now link chevron nudge */
        .book-link .bchevron {
            display: inline-block;
            transition: transform 0.18s ease;
        }
        .book-link:hover .bchevron { transform: translateX(3px); }
        .book-link:hover { color: #0369a1; }

        /* ── PART 5: Footer ────────────────────────────────────────── */
        .footer-link {
            transition: color 0.15s ease;
        }
        .footer-link:hover { color: #38bdf8; }

        .footer-divider {
            background: linear-gradient(to right, transparent, rgba(255,255,255,0.12), transparent);
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

    {{-- ================================================================
         PART 4 – Common Symptoms & Health Concerns Carousel
         ================================================================ --}}
    <section id="symptoms" class="py-14 bg-gray-50" aria-labelledby="symptoms-heading">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- ── Section header ─────────────────────────────────────── --}}
            <div class="flex items-center justify-between mb-8">
                <div>
                    {{-- Eyebrow --}}
                    <div class="flex items-center gap-2 mb-2">
                        <div class="w-6 h-0.5 bg-gradient-to-r from-sky-500 to-indigo-500 rounded-full"></div>
                        <span class="text-xs font-semibold uppercase tracking-widest text-sky-600">
                            Common Health Concerns
                        </span>
                    </div>
                    <h2 id="symptoms-heading"
                        class="text-2xl sm:text-3xl font-extrabold text-gray-900 tracking-tight leading-tight">
                        What are you dealing with
                        <span class="text-transparent bg-clip-text bg-gradient-to-r from-sky-500 to-indigo-600">today?</span>
                    </h2>
                </div>

                {{-- Desktop scroll arrows --}}
                <div class="hidden sm:flex items-center gap-2" aria-label="Scroll symptoms">
                    <button id="sym-prev"
                            class="scroll-arrow w-9 h-9 rounded-full border border-gray-200 bg-white
                                   flex items-center justify-center text-gray-500"
                            aria-label="Scroll left">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/>
                        </svg>
                    </button>
                    <button id="sym-next"
                            class="scroll-arrow w-9 h-9 rounded-full border border-gray-200 bg-white
                                   flex items-center justify-center text-gray-500"
                            aria-label="Scroll right">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                        </svg>
                    </button>
                </div>
            </div>

            {{-- ── Scroll track wrapper ─────────────────────────────────── --}}
            <div class="symptom-track-wrap">
                <div id="symptom-track"
                     class="symptom-scroll flex gap-5 overflow-x-auto pb-4"
                     role="list"
                     aria-label="Symptom categories">

                    @php
                        $symptoms = [
                            [
                                'label'    => 'Pregnancy',
                                'href'     => '#find-doctors',
                                'bg_from'  => '#fce7f3',  /* pink-100  */
                                'bg_to'    => '#fbcfe8',  /* pink-200  */
                                'icon_stroke' => '#ec4899',
                                /* Simplified inline SVG path for the illustration */
                                'svg_paths' => [
                                    /* Body silhouette — simple pregnant figure */
                                    ['d'=>'M12 3a3 3 0 110 6 3 3 0 010-6z', 'stroke'=>'#ec4899', 'fill'=>'none'],
                                    ['d'=>'M7 21v-2a5 5 0 015-5h.5a5.5 5.5 0 015.5 5.5V21', 'stroke'=>'#ec4899', 'fill'=>'none'],
                                    ['d'=>'M13 13c1.5 0 3 1.5 3 4', 'stroke'=>'#f9a8d4', 'fill'=>'none'],
                                ],
                                'emoji' => '🤰',
                                'dot_color' => '#f472b6',
                            ],
                            [
                                'label'    => 'Acne & Skin Issues',
                                'href'     => '#find-doctors',
                                'bg_from'  => '#fef9c3',  /* yellow-100 */
                                'bg_to'    => '#fef08a',  /* yellow-200 */
                                'icon_stroke' => '#eab308',
                                'svg_paths' => [
                                    ['d'=>'M12 2a10 10 0 100 20A10 10 0 0012 2z', 'stroke'=>'#eab308','fill'=>'none'],
                                    ['d'=>'M8.5 10a.5.5 0 110 1 .5.5 0 010-1z', 'stroke'=>'#ca8a04','fill'=>'#ca8a04'],
                                    ['d'=>'M15.5 9a.5.5 0 110 1 .5.5 0 010-1z', 'stroke'=>'#ca8a04','fill'=>'#ca8a04'],
                                ],
                                'emoji' => '🧴',
                                'dot_color' => '#facc15',
                            ],
                            [
                                'label'    => 'Joint Pain',
                                'href'     => '#find-doctors',
                                'bg_from'  => '#fee2e2',  /* red-100   */
                                'bg_to'    => '#fecaca',  /* red-200   */
                                'icon_stroke' => '#ef4444',
                                'svg_paths' => [
                                    ['d'=>'M4 16l4-4 4 4 4-4 4 4', 'stroke'=>'#ef4444','fill'=>'none'],
                                    ['d'=>'M12 8a2 2 0 110 4 2 2 0 010-4z', 'stroke'=>'#ef4444','fill'=>'#fecaca'],
                                ],
                                'emoji' => '🦴',
                                'dot_color' => '#f87171',
                            ],
                            [
                                'label'    => 'Cold, Cough or Fever',
                                'href'     => '#find-doctors',
                                'bg_from'  => '#dbeafe',  /* blue-100  */
                                'bg_to'    => '#bfdbfe',  /* blue-200  */
                                'icon_stroke' => '#3b82f6',
                                'svg_paths' => [
                                    ['d'=>'M12 2a10 10 0 100 20A10 10 0 0012 2z', 'stroke'=>'#3b82f6','fill'=>'none'],
                                    ['d'=>'M8 14s1.5 2 4 2 4-2 4-2', 'stroke'=>'#3b82f6','fill'=>'none'],
                                    ['d'=>'M9 9h.01M15 9h.01', 'stroke'=>'#3b82f6','fill'=>'none'],
                                ],
                                'emoji' => '🤧',
                                'dot_color' => '#60a5fa',
                            ],
                            [
                                'label'    => 'Child Not Feeling Well',
                                'href'     => '#find-doctors',
                                'bg_from'  => '#d1fae5',  /* emerald-100 */
                                'bg_to'    => '#a7f3d0',  /* emerald-200 */
                                'icon_stroke' => '#10b981',
                                'svg_paths' => [
                                    ['d'=>'M12 3a3 3 0 110 6 3 3 0 010-6z', 'stroke'=>'#10b981','fill'=>'none'],
                                    ['d'=>'M5 21v-1a7 7 0 0114 0v1', 'stroke'=>'#10b981','fill'=>'none'],
                                    ['d'=>'M9 14c0 0 1 2 3 2s3-2 3-2', 'stroke'=>'#6ee7b7','fill'=>'none'],
                                ],
                                'emoji' => '👶',
                                'dot_color' => '#34d399',
                            ],
                            [
                                'label'    => 'Depression or Anxiety',
                                'href'     => '#find-doctors',
                                'bg_from'  => '#ede9fe',  /* violet-100 */
                                'bg_to'    => '#ddd6fe',  /* violet-200 */
                                'icon_stroke' => '#8b5cf6',
                                'svg_paths' => [
                                    ['d'=>'M12 2a10 10 0 100 20A10 10 0 0012 2z', 'stroke'=>'#8b5cf6','fill'=>'none'],
                                    ['d'=>'M8 15s1-2 4-2 4 2 4 2', 'stroke'=>'#8b5cf6','fill'=>'none'],
                                    ['d'=>'M9 9.5h.01M15 9.5h.01', 'stroke'=>'#8b5cf6','fill'=>'none'],
                                ],
                                'emoji' => '🧠',
                                'dot_color' => '#a78bfa',
                            ],
                        ];
                    @endphp

                    @foreach ($symptoms as $sym)
                    <div class="symptom-card flex-shrink-0 flex flex-col items-center text-center
                                w-[148px] sm:w-[160px] group cursor-pointer"
                         role="listitem">
                        <a href="{{ $sym['href'] }}?symptom={{ urlencode($sym['label']) }}"
                           class="flex flex-col items-center gap-0 w-full"
                           aria-label="Consult for {{ $sym['label'] }}">

                            {{-- Circular avatar --}}
                            <div class="symptom-avatar relative w-28 h-28 sm:w-32 sm:h-32 rounded-full
                                        flex items-center justify-center mb-4 flex-shrink-0
                                        ring-2 ring-transparent group-hover:ring-2 group-hover:ring-sky-400
                                        ring-offset-2 ring-offset-gray-50
                                        transition-all duration-300"
                                 style="background: linear-gradient(145deg, {{ $sym['bg_from'] }}, {{ $sym['bg_to'] }});">

                                {{-- Inner soft ring --}}
                                <div class="absolute inset-2 rounded-full border border-white/70"></div>

                                {{-- Dot accent --}}
                                <div class="absolute top-3 right-3 w-2.5 h-2.5 rounded-full border-2 border-white"
                                     style="background: {{ $sym['dot_color'] }};" aria-hidden="true"></div>

                                {{-- Emoji illustration (large, centered) --}}
                                <span class="relative text-4xl sm:text-5xl select-none leading-none"
                                      role="img" aria-hidden="true">
                                    {{ $sym['emoji'] }}
                                </span>
                            </div>

                            {{-- Label --}}
                            <p class="text-sm font-semibold text-gray-800 leading-snug
                                       group-hover:text-sky-700 transition-colors duration-200 px-1">
                                {{ $sym['label'] }}
                            </p>

                            {{-- CONSULT NOW CTA --}}
                            <span class="consult-link mt-2 inline-flex items-center gap-0.5
                                          text-[11px] font-bold uppercase tracking-widest text-sky-500
                                          transition-colors duration-150">
                                Consult Now
                                <svg class="chevron w-3 h-3 ml-0.5" fill="none" stroke="currentColor"
                                     stroke-width="2.5" viewBox="0 0 24 24" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                                </svg>
                            </span>
                        </a>
                    </div>
                    @endforeach

                    {{-- "View All" terminal card --}}
                    <div class="symptom-card flex-shrink-0 flex flex-col items-center justify-center text-center
                                w-[148px] sm:w-[160px]" role="listitem">
                        <a href="#find-doctors"
                           class="group flex flex-col items-center gap-3"
                           aria-label="View all symptoms">
                            <div class="w-28 h-28 sm:w-32 sm:h-32 rounded-full flex items-center justify-center
                                        bg-gradient-to-br from-sky-50 to-indigo-100
                                        border-2 border-dashed border-sky-300
                                        group-hover:border-sky-500 group-hover:from-sky-100
                                        transition-all duration-200">
                                <svg class="w-8 h-8 text-sky-500 group-hover:text-sky-700 transition-colors"
                                     fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M4 6h16M4 10h16M4 14h10M4 18h6"/>
                                </svg>
                            </div>
                            <p class="text-sm font-semibold text-sky-600 group-hover:text-sky-800 transition-colors leading-snug">
                                View All<br/>Symptoms
                            </p>
                        </a>
                    </div>

                </div>{{-- /symptom-track --}}
            </div>{{-- /symptom-track-wrap --}}

            {{-- ── Mobile swipe hint ──────────────────────────────────── --}}
            <p class="mt-3 text-center text-[11px] text-gray-400 sm:hidden select-none" aria-hidden="true">
                ← Swipe to explore more →
            </p>

        </div>
    </section>

    <section id="lab-tests"     class="py-16 bg-white            text-center text-gray-300 text-sm tracking-widest uppercase">Lab Tests &mdash; Placeholder</section>
    <section id="surgeries"     class="py-16 bg-gray-50           text-center text-gray-300 text-sm tracking-widest uppercase">Surgeries &mdash; Placeholder</section>
    <section id="ai-chatbot"    class="py-16 bg-white            text-center text-gray-300 text-sm tracking-widest uppercase">AI Chat Bot &mdash; Placeholder</section>
    <section id="for-providers" class="py-16 bg-gray-50           text-center text-gray-300 text-sm tracking-widest uppercase">For Providers &mdash; Placeholder</section>
    <section id="help"          class="py-16 bg-white            text-center text-gray-300 text-sm tracking-widest uppercase">Security &amp; Help &mdash; Placeholder</section>

    {{-- ================================================================
         PART 5 – SECTION 1: In-Clinic Consultation Specialty Cards
         ================================================================ --}}
    <section id="in-clinic" class="py-16 bg-white" aria-labelledby="clinic-heading">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- ── Section header ──────────────────────────────────────── --}}
            <div class="flex flex-col sm:flex-row sm:items-end sm:justify-between gap-4 mb-10">

                <div class="max-w-xl">
                    {{-- Eyebrow --}}
                    <div class="flex items-center gap-2 mb-3">
                        <div class="w-6 h-0.5 bg-gradient-to-r from-sky-500 to-indigo-500 rounded-full"></div>
                        <span class="text-xs font-semibold uppercase tracking-widest text-sky-600">In-Clinic Appointments</span>
                    </div>

                    {{-- Headline --}}
                    <h2 id="clinic-heading"
                        class="text-2xl sm:text-3xl lg:text-[2.1rem] font-extrabold text-gray-900 leading-tight tracking-tight">
                        Book an appointment for an<br class="hidden sm:block" />
                        <span class="text-transparent bg-clip-text bg-gradient-to-r from-sky-500 to-indigo-600">
                            in-clinic consultation
                        </span>
                    </h2>

                    {{-- Subtitle --}}
                    <p class="mt-3 text-sm sm:text-base text-gray-500 leading-relaxed">
                        Find experienced doctors across all specialties —
                        <span class="font-medium text-gray-700">at a clinic near you.</span>
                    </p>
                </div>

                {{-- Desktop CTA --}}
                <div class="flex-shrink-0 self-start sm:self-end">
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

            {{-- ── 4 Specialty Cards ──────────────────────────────────────── --}}
            @php
                $clinicCards = [
                    [
                        'id'          => 'dentist',
                        'specialty'   => 'Dentist',
                        'tagline'     => 'Teething troubles? Schedule a dental checkup',
                        'description' => 'From routine cleanings to advanced orthodontics, our verified dental specialists handle it all.',
                        'badge'       => 'Oral Health',
                        'emoji'       => '🦷',
                        'bg_from'     => '#ecfdf5',   /* emerald-50  */
                        'bg_to'       => '#d1fae5',   /* emerald-100 */
                        'accent'      => '#059669',   /* emerald-600 */
                        'badge_bg'    => 'bg-emerald-50 text-emerald-700 border-emerald-200',
                        'dot'         => 'bg-emerald-400',
                        'count'       => '175+ Dentists',
                        'icon_path'   => 'M9 3H5a2 2 0 00-2 2v4m6-6h10a2 2 0 012 2v4M9 3v18m0 0h10a2 2 0 002-2V9M9 21H5a2 2 0 01-2-2V9m0 0h18',
                    ],
                    [
                        'id'          => 'gyno',
                        'specialty'   => 'Gynecologist / Obstetrician',
                        'tagline'     => 'Explore for women\'s health, pregnancy and infertility treatments',
                        'description' => 'Trusted gynecologists for prenatal care, fertility consultations, and comprehensive women\'s health.',
                        'badge'       => "Women's Health",
                        'emoji'       => '🌸',
                        'bg_from'     => '#fdf2f8',   /* pink-50  */
                        'bg_to'       => '#fce7f3',   /* pink-100 */
                        'accent'      => '#db2777',   /* pink-600 */
                        'badge_bg'    => 'bg-pink-50 text-pink-700 border-pink-200',
                        'dot'         => 'bg-pink-400',
                        'count'       => '120+ Specialists',
                        'icon_path'   => 'M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z',
                    ],
                    [
                        'id'          => 'dietitian',
                        'specialty'   => 'Dietitian / Nutrition',
                        'tagline'     => 'Get guidance on eating right, weight management and sports nutrition',
                        'description' => 'Certified nutritionists craft personalised meal plans for your lifestyle, health goals and medical needs.',
                        'badge'       => 'Nutrition',
                        'emoji'       => '🥗',
                        'bg_from'     => '#fffbeb',   /* amber-50  */
                        'bg_to'       => '#fef3c7',   /* amber-100 */
                        'accent'      => '#d97706',   /* amber-600 */
                        'badge_bg'    => 'bg-amber-50 text-amber-700 border-amber-200',
                        'dot'         => 'bg-amber-400',
                        'count'       => '80+ Experts',
                        'icon_path'   => 'M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z',
                    ],
                    [
                        'id'          => 'physio',
                        'specialty'   => 'Physiotherapist',
                        'tagline'     => 'Pulled a muscle? Get it treated by a trained physiotherapist',
                        'description' => 'Expert physiotherapists for sports injuries, post-surgery rehab, back pain and mobility recovery.',
                        'badge'       => 'Rehabilitation',
                        'emoji'       => '🏃',
                        'bg_from'     => '#eff6ff',   /* blue-50   */
                        'bg_to'       => '#dbeafe',   /* blue-100  */
                        'accent'      => '#2563eb',   /* blue-600  */
                        'badge_bg'    => 'bg-blue-50 text-blue-700 border-blue-200',
                        'dot'         => 'bg-blue-400',
                        'count'       => '95+ Therapists',
                        'icon_path'   => 'M13 10V3L4 14h7v7l9-11h-7z',
                    ],
                ];
            @endphp

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5 sm:gap-6">
                @foreach ($clinicCards as $card)
                <a href="{{ url('#find-doctors') }}?specialty={{ urlencode($card['specialty']) }}"
                   class="clinic-card group relative flex flex-col bg-white border border-gray-100
                          rounded-2xl overflow-hidden shadow-sm hover:border-sky-100 cursor-pointer"
                   aria-label="Book {{ $card['specialty'] }} appointment">

                    {{-- ── Top tinted illustration band ──────────────────── --}}
                    <div class="relative h-36 flex items-center justify-center overflow-hidden flex-shrink-0"
                         style="background: linear-gradient(135deg, {{ $card['bg_from'] }} 0%, {{ $card['bg_to'] }} 100%);">

                        {{-- Decorative soft circle blob --}}
                        <div class="absolute -bottom-6 -right-6 w-24 h-24 rounded-full opacity-40"
                             style="background: radial-gradient(circle, {{ $card['bg_to'] }}, transparent);"
                             aria-hidden="true"></div>

                        {{-- Icon circle --}}
                        <div class="clinic-icon-wrap relative z-10 w-16 h-16 rounded-2xl flex items-center justify-center shadow-sm"
                             style="background: white;">
                            <span class="text-3xl select-none leading-none" role="img" aria-hidden="true">
                                {{ $card['emoji'] }}
                            </span>
                        </div>

                        {{-- Specialty badge top-left --}}
                        <span class="absolute top-3 left-3 inline-flex items-center gap-1
                                     text-[10px] font-semibold uppercase tracking-wider
                                     px-2.5 py-1 rounded-full border {{ $card['badge_bg'] }}">
                            <span class="w-1.5 h-1.5 rounded-full {{ $card['dot'] }} inline-block"></span>
                            {{ $card['badge'] }}
                        </span>

                        {{-- Doctor count badge top-right --}}
                        <span class="absolute top-3 right-3 text-[10px] font-semibold text-gray-500
                                     bg-white/80 backdrop-blur-sm px-2 py-0.5 rounded-full border border-gray-100">
                            {{ $card['count'] }}
                        </span>
                    </div>

                    {{-- ── Card body ──────────────────────────────────────── --}}
                    <div class="flex flex-col flex-1 p-5">

                        {{-- Specialty name --}}
                        <h3 class="font-bold text-base text-gray-900 leading-snug mb-1
                                   group-hover:text-sky-700 transition-colors duration-200">
                            {{ $card['specialty'] }}
                        </h3>

                        {{-- Tagline --}}
                        <p class="text-[13px] text-gray-500 leading-relaxed mb-4 flex-1">
                            {{ $card['tagline'] }}
                        </p>

                        {{-- Book Now CTA --}}
                        <div class="mt-auto pt-3 border-t border-gray-50 flex items-center justify-between">
                            <span class="book-link inline-flex items-center gap-1
                                         text-[11px] font-bold uppercase tracking-widest text-sky-500
                                         transition-colors duration-150">
                                Book Now
                                <svg class="bchevron w-3.5 h-3.5 ml-0.5" fill="none" stroke="currentColor"
                                     stroke-width="2.5" viewBox="0 0 24 24" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                                </svg>
                            </span>

                            {{-- Mini icon --}}
                            <div class="w-7 h-7 rounded-lg flex items-center justify-center flex-shrink-0
                                        opacity-60 group-hover:opacity-100 transition-opacity duration-200"
                                 style="background: {{ $card['bg_from'] }};">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="{{ $card['accent'] }}"
                                     stroke-width="2" viewBox="0 0 24 24" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="{{ $card['icon_path'] }}" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </a>
                @endforeach
            </div>

            {{-- ── Bottom reassurance strip ───────────────────────────────── --}}
            <div class="mt-10 flex flex-col sm:flex-row items-center justify-center gap-6 sm:gap-10
                        text-sm text-gray-500">
                @foreach([
                    ['icon'=>'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z', 'text'=>'Verified & credentialed doctors'],
                    ['icon'=>'M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z',   'text'=>'Flexible appointment slots'],
                    ['icon'=>'M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z', 'text'=>'Zero booking fees'],
                ] as $pill)
                <div class="flex items-center gap-2">
                    <svg class="w-4 h-4 text-sky-500 flex-shrink-0" fill="none" stroke="currentColor"
                         stroke-width="1.8" viewBox="0 0 24 24" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="{{ $pill['icon'] }}" />
                    </svg>
                    <span class="font-medium text-gray-600">{{ $pill['text'] }}</span>
                </div>
                @endforeach
            </div>

        </div>
    </section>

</main>

{{-- ===================================================================
     PART 5 – FOOTER
     =================================================================== --}}
<footer class="bg-gray-900 text-gray-300" aria-label="Site footer">

    {{-- ── Main footer grid ─────────────────────────────────────────── --}}
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 pt-14 pb-10">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-10">

            {{-- Col 1: Brand --}}
            <div class="lg:col-span-1">
                {{-- Logo --}}
                <a href="{{ url('/') }}" class="inline-flex items-center gap-2.5 mb-4 group" aria-label="MediCare24 Home">
                    <div class="relative w-8 h-8 flex-shrink-0">
                        <svg viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg"
                             class="w-8 h-8 drop-shadow-sm group-hover:scale-105 transition-transform duration-200">
                            <circle cx="18" cy="18" r="17" fill="url(#grad-footer)" />
                            <rect x="15" y="8"  width="6" height="20" rx="2" fill="white" />
                            <rect x="8"  y="15" width="20" height="6"  rx="2" fill="white" />
                            <circle cx="18" cy="18" r="2.5" fill="url(#grad-footer)" />
                            <line x1="18" y1="18" x2="18" y2="13.5" stroke="white" stroke-width="1.8" stroke-linecap="round"/>
                            <line x1="18" y1="18" x2="21.5" y2="18" stroke="white" stroke-width="1.8" stroke-linecap="round"/>
                            <defs>
                                <linearGradient id="grad-footer" x1="0" y1="0" x2="36" y2="36" gradientUnits="userSpaceOnUse">
                                    <stop offset="0%"   stop-color="#0ea5e9" />
                                    <stop offset="100%" stop-color="#6366f1" />
                                </linearGradient>
                            </defs>
                        </svg>
                    </div>
                    <span class="text-lg font-bold tracking-tight leading-none select-none">
                        <span class="text-sky-400">Medi</span><span class="text-indigo-400">Care</span><span class="text-white">24</span>
                    </span>
                </a>

                <p class="text-[13px] text-gray-400 leading-relaxed mb-5 max-w-[220px]">
                    Quality healthcare, anytime — connecting patients with verified doctors across Sri Lanka.
                </p>

                {{-- Emergency contact --}}
                <div class="flex items-start gap-2.5 p-3 rounded-xl bg-red-900/30 border border-red-800/50">
                    <svg class="w-4 h-4 text-red-400 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor"
                         stroke-width="2" viewBox="0 0 24 24" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                    <div>
                        <p class="text-[10px] font-semibold uppercase tracking-widest text-red-400 mb-0.5">24/7 Emergency</p>
                        <a href="tel:+94117123456"
                           class="text-sm font-bold text-white hover:text-red-300 transition-colors duration-150">
                            +94 117 123 456
                        </a>
                    </div>
                </div>
            </div>

            {{-- Col 2: Services --}}
            <div>
                <h3 class="text-xs font-semibold uppercase tracking-widest text-gray-500 mb-4">Services</h3>
                <ul class="space-y-2.5">
                    @foreach([
                        ['label' => 'Find Doctors',         'href' => '#find-doctors'],
                        ['label' => 'Video Consultation',   'href' => '#video-consult'],
                        ['label' => 'In-Clinic Booking',    'href' => '#in-clinic'],
                        ['label' => 'Lab Tests at Home',    'href' => '#lab-tests'],
                        ['label' => 'Surgeries & Procedures','href'=> '#surgeries'],
                        ['label' => 'AI Health Chat Bot',   'href' => '#ai-chatbot'],
                    ] as $lnk)
                    <li>
                        <a href="{{ $lnk['href'] }}"
                           class="footer-link text-sm text-gray-400 hover:text-sky-400 flex items-center gap-1.5 group/fl">
                            <svg class="w-3 h-3 text-gray-600 group-hover/fl:text-sky-500 transition-colors flex-shrink-0"
                                 fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                            </svg>
                            {{ $lnk['label'] }}
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>

            {{-- Col 3: Specialties --}}
            <div>
                <h3 class="text-xs font-semibold uppercase tracking-widest text-gray-500 mb-4">Top Specialties</h3>
                <ul class="space-y-2.5">
                    @foreach([
                        'General Physician', 'Cardiologist', 'Dermatologist',
                        'Pediatrician', 'Orthopedic', 'Gynecologist',
                    ] as $spec)
                    <li>
                        <a href="{{ url('#find-doctors') }}?specialty={{ urlencode($spec) }}"
                           class="footer-link text-sm text-gray-400 hover:text-sky-400 flex items-center gap-1.5 group/fl">
                            <svg class="w-3 h-3 text-gray-600 group-hover/fl:text-sky-500 transition-colors flex-shrink-0"
                                 fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                            </svg>
                            {{ $spec }}
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>

            {{-- Col 4: Company + Trust badges --}}
            <div>
                <h3 class="text-xs font-semibold uppercase tracking-widest text-gray-500 mb-4">Company</h3>
                <ul class="space-y-2.5 mb-7">
                    @foreach([
                        ['label' => 'About Us',        'href' => '#about'],
                        ['label' => 'For Providers',   'href' => '#for-providers'],
                        ['label' => 'Careers',         'href' => '#careers'],
                        ['label' => 'Privacy Policy',  'href' => '#privacy'],
                        ['label' => 'Terms of Service','href' => '#terms'],
                        ['label' => 'Security & Help', 'href' => '#help'],
                    ] as $lnk)
                    <li>
                        <a href="{{ $lnk['href'] }}"
                           class="footer-link text-sm text-gray-400 hover:text-sky-400 flex items-center gap-1.5 group/fl">
                            <svg class="w-3 h-3 text-gray-600 group-hover/fl:text-sky-500 transition-colors flex-shrink-0"
                                 fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                            </svg>
                            {{ $lnk['label'] }}
                        </a>
                    </li>
                    @endforeach
                </ul>

                {{-- Trust badges --}}
                <div class="flex flex-col gap-2">
                    <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-lg bg-gray-800 border border-gray-700">
                        <svg class="w-3.5 h-3.5 text-sky-400 flex-shrink-0" fill="none" stroke="currentColor"
                             stroke-width="2" viewBox="0 0 24 24" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z" />
                        </svg>
                        <span class="text-[11px] text-gray-300 font-medium">SSL Secured</span>
                    </div>
                    <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-lg bg-gray-800 border border-gray-700">
                        <svg class="w-3.5 h-3.5 text-emerald-400 flex-shrink-0" fill="none" stroke="currentColor"
                             stroke-width="2" viewBox="0 0 24 24" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0" />
                        </svg>
                        <span class="text-[11px] text-gray-300 font-medium">1,200+ Verified Doctors</span>
                    </div>
                    <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-lg bg-gray-800 border border-gray-700">
                        <svg class="w-3.5 h-3.5 text-amber-400 flex-shrink-0" fill="none" stroke="currentColor"
                             stroke-width="2" viewBox="0 0 24 24" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                        </svg>
                        <span class="text-[11px] text-gray-300 font-medium">Rated 4.9 / 5 by patients</span>
                    </div>
                </div>
            </div>

        </div>
    </div>

    {{-- ── Divider ─────────────────────────────────────────────────────── --}}
    <div class="footer-divider h-px mx-8 my-0" aria-hidden="true"></div>

    {{-- ── Bottom bar ──────────────────────────────────────────────────── --}}
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-5">
        <div class="flex flex-col sm:flex-row items-center justify-between gap-3">

            {{-- Copyright --}}
            <p class="text-[12px] text-gray-500 text-center sm:text-left">
                &copy; {{ date('Y') }} MediCare24. All rights reserved.
                Made with
                <svg class="w-3 h-3 inline-block text-red-400 -mt-0.5 mx-0.5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                    <path d="M12 21.593c-5.63-5.539-11-10.297-11-14.402 0-3.791 3.068-5.191 5.281-5.191 1.312 0 4.151.501 5.719 4.457 1.59-3.968 4.464-4.447 5.726-4.447 2.54 0 5.274 1.621 5.274 5.181 0 4.069-5.136 8.625-11 14.402z"/>
                </svg>
                for better healthcare in Sri Lanka.
            </p>

            {{-- Social / utility links --}}
            <div class="flex items-center gap-4">
                <a href="#privacy"
                   class="text-[12px] text-gray-500 hover:text-sky-400 transition-colors duration-150">
                    Privacy
                </a>
                <a href="#terms"
                   class="text-[12px] text-gray-500 hover:text-sky-400 transition-colors duration-150">
                    Terms
                </a>
                <a href="#help"
                   class="text-[12px] text-gray-500 hover:text-sky-400 transition-colors duration-150">
                    Help
                </a>

                {{-- Social icons --}}
                <div class="flex items-center gap-2 ml-2">
                    {{-- Facebook --}}
                    <a href="#" aria-label="Facebook"
                       class="w-7 h-7 rounded-full bg-gray-800 hover:bg-sky-500 flex items-center justify-center
                              transition-colors duration-150 group/soc border border-gray-700 hover:border-sky-500">
                        <svg class="w-3.5 h-3.5 text-gray-400 group-hover/soc:text-white transition-colors"
                             fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                        </svg>
                    </a>
                    {{-- Twitter / X --}}
                    <a href="#" aria-label="Twitter"
                       class="w-7 h-7 rounded-full bg-gray-800 hover:bg-sky-500 flex items-center justify-center
                              transition-colors duration-150 group/soc border border-gray-700 hover:border-sky-500">
                        <svg class="w-3.5 h-3.5 text-gray-400 group-hover/soc:text-white transition-colors"
                             fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/>
                        </svg>
                    </a>
                    {{-- Instagram --}}
                    <a href="#" aria-label="Instagram"
                       class="w-7 h-7 rounded-full bg-gray-800 hover:bg-pink-500 flex items-center justify-center
                              transition-colors duration-150 group/soc border border-gray-700 hover:border-pink-500">
                        <svg class="w-3.5 h-3.5 text-gray-400 group-hover/soc:text-white transition-colors"
                             fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>

</footer>

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

    // ── PART 4: Symptom carousel arrow scroll ──────────────────────────
    (function () {
        const track = document.getElementById('symptom-track');
        const prev  = document.getElementById('sym-prev');
        const next  = document.getElementById('sym-next');
        if (!track || !prev || !next) return;

        const SCROLL_BY = 340;

        next.addEventListener('click', function () {
            track.scrollBy({ left: SCROLL_BY, behavior: 'smooth' });
        });
        prev.addEventListener('click', function () {
            track.scrollBy({ left: -SCROLL_BY, behavior: 'smooth' });
        });

        function syncArrows() {
            prev.style.opacity = track.scrollLeft > 10 ? '1' : '0.4';
            next.style.opacity = (track.scrollLeft + track.clientWidth < track.scrollWidth - 10) ? '1' : '0.4';
        }
        track.addEventListener('scroll', syncArrows, { passive: true });
        syncArrows();
    })();

</script>

</body>
</html>
