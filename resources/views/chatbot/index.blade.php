<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSRF Token for Secure Laravel AJAX Requests -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>MediCare24 - Family Care Clinic AI Assistant</title>

    <!-- Bootstrap 5 CSS & Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <!-- Google Fonts: Plus Jakarta Sans, Noto Sans Sinhala & Dancing Script (for cursive footer) -->
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@600;700&family=Noto+Sans+Sinhala:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        /* ==========================================================================
           GLOBAL THEME COLORS & TYPOGRAPHY
           ========================================================================== */
        :root {
            --emerald-primary: #10b981;
            --emerald-dark: #064e3b;
            --sidebar-bg: linear-gradient(180deg, #0b5d3b 0%, #053b25 100%);
            --chat-header-bg: linear-gradient(90deg, #0c7c4d 0%, #16a366 55%, #10b981 100%);
            --bot-bubble-bg: #e6f7ef;
            --user-bubble-bg: linear-gradient(135deg, #c7f2e3 0%, #b5ece0 100%);
            --send-btn-bg: linear-gradient(135deg, #22c55e 0%, #0d9488 100%);
            --page-bg: #eef7f4;
        }

        body {
            font-family: 'Plus Jakarta Sans', 'Noto Sans Sinhala', sans-serif;
            background-color: var(--page-bg);
            color: #1e293b;
            margin: 0;
            padding: 0;
            overflow-x: hidden;
        }

        /* ==========================================================================
           1. TOP NAVIGATION BAR
           ========================================================================== */
        .top-navbar {
            background: #ffffff;
            border-bottom: 1px solid #e2e8f0;
            padding: 0.7rem 1.75rem;
            position: sticky;
            top: 0;
            z-index: 1030;
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.03);
        }

        .brand-logo-icon {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            background: linear-gradient(135deg, #2dd4bf, #0d9488);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            color: #ffffff;
            font-size: 18px;
            box-shadow: 0 3px 10px rgba(13, 148, 136, 0.25);
        }

        .nav-menu-item {
            color: #475569;
            font-weight: 600;
            font-size: 13.5px;
            text-decoration: none;
            padding: 6px 12px;
            border-radius: 8px;
            transition: all 0.2s ease;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .nav-menu-item:hover, .nav-menu-item.active {
            color: #059669;
            background-color: #ecfdf5;
        }

        .badge-new-pill {
            background: linear-gradient(135deg, #14b8a6, #0d9488);
            color: #ffffff;
            font-size: 10px;
            font-weight: 700;
            padding: 3px 9px;
            border-radius: 20px;
            letter-spacing: 0.5px;
        }

        .profile-initial-badge {
            width: 34px;
            height: 34px;
            border-radius: 50%;
            background-color: #0d9488;
            color: #ffffff;
            font-weight: 700;
            font-size: 14px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        /* ==========================================================================
           2. MAIN WORKSPACE & LEFT DARK GREEN SIDEBAR
           ========================================================================== */
        .workspace-wrapper {
            display: flex;
            min-height: calc(100vh - 64px);
        }

        .left-green-sidebar {
            width: 225px;
            background: var(--sidebar-bg);
            color: #ffffff;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: 1.5rem 1rem;
            flex-shrink: 0;
            position: relative;
        }

        .sidebar-nav-link {
            display: flex;
            align-items: center;
            gap: 12px;
            color: rgba(255, 255, 255, 0.88);
            text-decoration: none;
            padding: 12px 14px;
            border-radius: 12px;
            font-weight: 600;
            font-size: 14px;
            margin-bottom: 8px;
            transition: all 0.2s ease;
        }

        .sidebar-nav-link:hover {
            background: rgba(255, 255, 255, 0.14);
            color: #ffffff;
        }

        .sidebar-nav-link.active {
            background: rgba(255, 255, 255, 0.18);
            color: #ffffff;
            border-left: 4px solid #34d399;
        }

        .sidebar-footer-brand {
            text-align: center;
            padding: 1rem 0.5rem;
        }

        .heart-glow-orb {
            width: 66px;
            height: 66px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(52, 211, 153, 0.35) 0%, rgba(16, 185, 129, 0.08) 70%);
            border: 1px solid rgba(52, 211, 153, 0.45);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 12px;
            box-shadow: 0 0 28px rgba(52, 211, 153, 0.35);
        }

        /* ==========================================================================
           3. MAIN CHAT CONTAINER CARD
           ========================================================================== */
        .chat-stage-container {
            flex-grow: 1;
            padding: 1.25rem 1.75rem;
            display: flex;
            flex-direction: column;
        }

        .clinic-chat-card {
            background: #ffffff;
            border-radius: 22px;
            box-shadow: 0 10px 35px rgba(15, 23, 42, 0.06);
            border: 1px solid #e2e8f0;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            flex-grow: 1;
            min-height: 620px;
        }

        /* Chat Card Top Emerald Header */
        .clinic-chat-header {
            background: var(--chat-header-bg);
            padding: 1rem 1.75rem;
            color: #ffffff;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header-bot-avatar {
            width: 52px;
            height: 52px;
            border-radius: 50%;
            background: #ffffff;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            flex-shrink: 0;
        }

        .online-status-pill {
            background: #ffffff;
            color: #065f46;
            font-weight: 700;
            font-size: 13px;
            padding: 6px 16px;
            border-radius: 30px;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        }

        .online-pulse-dot {
            width: 9px;
            height: 9px;
            border-radius: 50%;
            background-color: #22c55e;
            box-shadow: 0 0 0 3px rgba(34, 197, 94, 0.25);
        }

        /* ==========================================================================
           4. CHAT BODY WITH RIGHT-SIDE DOCTOR & CHILD ILLUSTRATION
           ========================================================================== */
        .clinic-chat-body {
            position: relative;
            flex-grow: 1;
            background: linear-gradient(135deg, #ffffff 0%, #f4fbf8 60%, #e8f6f0 100%);
            padding: 1.5rem 1.75rem;
            overflow-y: auto;
            max-height: 490px;
            display: flex;
            flex-direction: column;
        }

        /* Decorative Right-Side Family Doctor Illustration */
        .clinic-bg-illustration {
            position: absolute;
            right: 0;
            bottom: 0;
            width: 340px;
            height: 100%;
            pointer-events: none;
            z-index: 1;
            display: flex;
            align-items: flex-end;
            justify-content: flex-end;
            overflow: hidden;
        }

        .clinic-bg-illustration img {
            width: 100%;
            height: 95%;
            object-fit: cover;
            object-position: center top;
            mask-image: linear-gradient(to right, transparent 0%, black 28%);
            -webkit-mask-image: linear-gradient(to right, transparent 0%, black 28%);
            opacity: 0.92;
        }

        /* Floating Green Medical Heart Emblem on Top Right of Chat Canvas */
        .floating-clinic-emblem {
            position: absolute;
            top: 18px;
            right: 26px;
            width: 68px;
            height: 68px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.92);
            box-shadow: 0 8px 20px rgba(16, 185, 129, 0.15);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 2;
            pointer-events: none;
        }

        /* Chat Messages Column (Stays above background illustration) */
        .messages-stream {
            position: relative;
            z-index: 3;
            max-width: 74%;
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        /* Bot Message Row */
        .bot-msg-row {
            display: flex;
            align-items: flex-start;
            gap: 12px;
        }

        .msg-bot-icon {
            width: 42px;
            height: 42px;
            border-radius: 50%;
            background: #e0f2fe;
            border: 2px solid #ffffff;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.08);
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .bot-speech-bubble {
            background: var(--bot-bubble-bg);
            border: 1px solid #cceee0;
            border-radius: 18px;
            border-top-left-radius: 4px;
            padding: 1rem 1.25rem;
            color: #1e293b;
            font-size: 14px;
            line-height: 1.65;
            box-shadow: 0 3px 10px rgba(16, 185, 129, 0.05);
            position: relative;
            min-width: 260px;
        }

        .msg-timestamp {
            font-size: 11px;
            color: #64748b;
            display: block;
            text-align: right;
            margin-top: 6px;
        }

        /* Quick Suggestion Chips Row */
        .quick-chips-wrapper {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            padding-left: 54px;
        }

        .quick-chip-btn {
            background: #ffffff;
            border: 1px solid #cbd5e1;
            border-radius: 25px;
            padding: 7px 14px;
            font-size: 12.5px;
            font-weight: 600;
            color: #1e293b;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            cursor: pointer;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.04);
            transition: all 0.2s ease;
        }

        .quick-chip-btn:hover {
            background: #ecfdf5;
            border-color: #10b981;
            color: #047857;
            transform: translateY(-1px);
        }

        /* User Message Row (Right Aligned) */
        .user-msg-row {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            gap: 10px;
            align-self: flex-end;
        }

        .user-speech-bubble {
            background: var(--user-bubble-bg);
            border: 1px solid #99e6cf;
            border-radius: 22px;
            border-bottom-right-radius: 4px;
            padding: 0.75rem 1.25rem;
            color: #0f172a;
            font-weight: 600;
            font-size: 14px;
            box-shadow: 0 3px 10px rgba(13, 148, 136, 0.08);
            display: inline-flex;
            align-items: center;
            gap: 12px;
        }

        .user-msg-avatar {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background: #10b981;
            color: #ffffff;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        /* Typing Indicator Dots */
        .typing-dots span {
            display: inline-block;
            width: 7px;
            height: 7px;
            background-color: #10b981;
            border-radius: 50%;
            margin: 0 2px;
            animation: bounceTyping 1.3s infinite ease-in-out both;
        }
        .typing-dots span:nth-child(1) { animation-delay: -0.32s; }
        .typing-dots span:nth-child(2) { animation-delay: -0.16s; }

        @keyframes bounceTyping {
            0%, 80%, 100% { transform: scale(0); }
            40% { transform: scale(1); }
        }

        /* ==========================================================================
           5. CHAT INPUT BAR & TRUST FOOTER
           ========================================================================== */
        .chat-input-section {
            background: #f8fafc;
            padding: 0.9rem 1.5rem 0.6rem 1.5rem;
            border-top: 1px solid #e2e8f0;
            position: relative;
            z-index: 5;
        }

        .chat-input-pill {
            background: #ffffff;
            border: 1px solid #cbd5e1;
            border-radius: 50px;
            padding: 6px 8px 6px 16px;
            display: flex;
            align-items: center;
            gap: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.04);
        }

        .chat-input-pill:focus-within {
            border-color: #10b981;
            box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.15);
        }

        .input-action-icon {
            background: transparent;
            border: none;
            color: #0d9488;
            font-size: 18px;
            padding: 4px 6px;
            cursor: pointer;
            transition: color 0.2s;
        }

        .input-action-icon:hover {
            color: #047857;
        }

        .chat-text-input {
            border: none;
            outline: none;
            flex-grow: 1;
            font-size: 14px;
            color: #1e293b;
            background: transparent;
        }

        .btn-send-message {
            background: var(--send-btn-bg);
            color: #ffffff;
            border: none;
            border-radius: 40px;
            padding: 9px 24px;
            font-weight: 700;
            font-size: 14px;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            cursor: pointer;
            box-shadow: 0 4px 12px rgba(16, 185, 129, 0.3);
            transition: transform 0.15s ease, box-shadow 0.15s ease;
        }

        .btn-send-message:hover {
            transform: translateY(-1px);
            box-shadow: 0 6px 16px rgba(16, 185, 129, 0.4);
        }

        .btn-send-message:disabled {
            opacity: 0.65;
            cursor: not-allowed;
        }

        /* Bottom Trust Badges & Cursive Tagline */
        .chat-trust-footer {
            background: #ffffff;
            padding: 0.65rem 1.75rem;
            border-top: 1px solid #f1f5f9;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 12px;
        }

        .trust-badges-group {
            display: flex;
            align-items: center;
            gap: 1.5rem;
            font-size: 12.5px;
            font-weight: 600;
            color: #334155;
        }

        .trust-badge-item {
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .cursive-slogan {
            font-family: 'Dancing Script', cursive;
            font-size: 20px;
            font-weight: 700;
            color: #065f46;
        }

        @media (max-width: 991px) {
            .workspace-wrapper { flex-direction: column; }
            .left-green-sidebar { width: 100%; flex-direction: row; align-items: center; padding: 0.8rem 1rem; }
            .sidebar-footer-brand { display: none; }
            .messages-stream { max-width: 100%; }
            .clinic-bg-illustration { display: none; }
            .chat-stage-container { padding: 0.75rem; }
        }
    </style>
</head>
<body>

    <!-- ======================================================================
         1. TOP NAVIGATION BAR
         ====================================================================== -->
    <header class="top-navbar d-flex justify-content-between align-items-center flex-wrap gap-3">
        <!-- Brand Logo -->
        <a href="{{ route('dashboard') }}" class="d-flex align-items-center gap-2 text-decoration-none">
            <span class="brand-logo-icon">
                <i class="bi bi-heart-pulse-fill"></i>
            </span>
            <span class="fw-bold fs-5 text-dark">MediCare<span style="color: #0d9488;">24</span></span>
        </a>

        <!-- Center Navigation Links -->
        <nav class="d-none d-xl-flex align-items-center gap-2">
            <a href="{{ Route::has('doctors.index') ? route('doctors.index') : '#' }}" class="nav-menu-item">Find Doctors</a>
            <a href="#" class="nav-menu-item">Video Consult</a>
            <a href="{{ Route::has('lab.index') ? route('lab.index') : '#' }}" class="nav-menu-item">Lab Tests</a>
            <a href="#" class="nav-menu-item">Surgeries</a>
            <a href="{{ route('chatbot.index') }}" class="nav-menu-item active">
                AI Chat Bot <span class="badge-new-pill">NEW</span>
            </a>
            <a href="#" class="nav-menu-item">For Providers</a>
            <a href="{{ route('chatbot.info') }}" class="nav-menu-item">AI Info & Help</a>
        </nav>

        <!-- Right User Profile & Logout -->
        <div class="d-flex align-items-center gap-3">
            <div class="d-flex align-items-center gap-2">
                <span class="profile-initial-badge">
                    {{ strtoupper(substr(Auth::user()->name ?? 'M', 0, 1)) }}
                </span>
                <span class="fw-semibold text-dark small">{{ Auth::user()->name ?? 'M.A.D Thennakoon' }}</span>
            </div>
            <span class="text-muted opacity-50">|</span>
            <form method="POST" action="{{ route('logout') }}" class="m-0">
                @csrf
                <button type="submit" class="btn btn-link text-decoration-none text-secondary fw-semibold small p-0">
                    Log Out
                </button>
            </form>
        </div>
    </header>

    <!-- ======================================================================
         2. MAIN WORKSPACE (Left Dark Green Sidebar + Right AI Chat Card)
         ====================================================================== -->
    <div class="workspace-wrapper">

        <!-- Left Dark Green Sidebar (With "AI Info" replacing "Health Information") -->
        <aside class="left-green-sidebar">
            <div>
                <!-- Active Chat Bot Tab -->
                <a href="{{ route('chatbot.index') }}" class="sidebar-nav-link active">
                    <i class="bi bi-robot fs-5"></i>
                    <span>AI Chat Bot</span>
                </a>

                <!-- AI Info Page Link (Opens AI Usage & Medical Disclaimer Page) -->
                <a href="{{ route('chatbot.info') }}" class="sidebar-nav-link">
                    <i class="bi bi-info-circle-fill fs-5"></i>
                    <span>AI Info</span>
                </a>
            </div>

            <!-- Bottom Hospital Health Emblem -->
            <div class="sidebar-footer-brand">
                <div class="heart-glow-orb">
                    <i class="bi bi-heart-pulse-fill text-white fs-3"></i>
                </div>
                <h6 class="fw-bold mb-1">Your Health<br>Our Priority</h6>
                <small class="fst-italic text-white-50" style="font-size: 11px;">Together for a<br>Healthier Life</small>
            </div>
        </aside>

        <!-- Right Main Chat Card Area -->
        <main class="chat-stage-container">
            <div class="clinic-chat-card">

                <!-- Chat Card Emerald Header -->
                <div class="clinic-chat-header">
                    <div class="d-flex align-items-center gap-3">
                        <!-- Cute Friendly 3D-Style Robot SVG Avatar -->
                        <div class="header-bot-avatar">
                            <svg width="34" height="34" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect x="29" y="4" width="6" height="10" rx="3" fill="#0d9488"/>
                                <circle cx="32" cy="4" r="4" fill="#10b981"/>
                                <rect x="12" y="14" width="40" height="34" rx="14" fill="#0f766e"/>
                                <rect x="17" y="20" width="30" height="20" rx="9" fill="#0f172a"/>
                                <circle cx="25" cy="30" r="3.5" fill="#38bdf8"/>
                                <circle cx="39" cy="30" r="3.5" fill="#38bdf8"/>
                                <path d="M27 35C28.5 37 35.5 37 37 35" stroke="#34d399" stroke-width="2.5" stroke-linecap="round"/>
                                <rect x="20" y="50" width="24" height="8" rx="4" fill="#14b8a6"/>
                            </svg>
                        </div>
                        <div>
                            <h5 class="fw-bold mb-0">Family Care Clinic - AI Assistant</h5>
                            <small class="text-white-50">Your friendly health assistant, available 24/7</small>
                        </div>
                    </div>

                    <!-- Online Status Badge -->
                    <div class="online-status-pill">
                        <span class="online-pulse-dot"></span> Online
                    </div>
                </div>

                <!-- Chat Messages Canvas -->
                <div class="clinic-chat-body" id="chatMessagesContainer">

                    <!-- Top-Right Floating Medical Heart Cross Icon -->
                    <div class="floating-clinic-emblem">
                        <i class="bi bi-heart-pulse-fill text-success fs-2"></i>
                    </div>

                    <!-- Right-Side Decorative Doctor & Child Illustration -->
                    <div class="clinic-bg-illustration">
                        <img src="https://plus.unsplash.com/premium_photo-1661777752178-fa6055526eb8?q=80&w=1172&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=NHwxMjA3fDA%3D"
                             alt="Family Doctor Caring">
                    </div>

                    <!-- Active Chat Messages Stream -->
                    <div class="messages-stream" id="messagesStream">

                        <!-- Initial Welcome Bot Message -->
                        <div class="bot-msg-row">
                            <div class="msg-bot-icon">
                                <i class="bi bi-robot text-success fs-5"></i>
                            </div>
                            <div class="bot-speech-bubble">
                                <div class="fw-bold mb-1">ආයුබෝවන්! 👋</div>
                                <div>
                                    <strong>MediCare24 Family Care Clinic AI</strong> සහායක වෙත සාදරයෙන් පිළිගනිමු. ඔබගේ සෞඛ්‍ය ගැටලු සඳහා Clinic එක පිළිබඳ ඕනෑම ප්‍රශ්නයක් තිබේද? මට උදව් කරන්න පුළුවන්.
                                </div>
                                <div class="mt-2 pt-2 border-top border-success-subtle small text-muted">
                                    <i class="bi bi-info-circle text-success me-1"></i>
                                    <em>සටහන: මෙම AI මඟින් සාමාන්‍ය සෞඛ්‍ය තොරතුරු පමණක් ලබා දෙන අතර ඖෂධ නියම කිරීම සිදු නොකරයි.</em>
                                </div>
                                <span class="msg-timestamp" id="welcomeTimestamp"></span>
                            </div>
                        </div>

                        <!-- Quick Suggestion Chips -->
                        <div class="quick-chips-wrapper" id="quickChipsRow">
                            <button type="button" class="quick-chip-btn" onclick="sendQuickPrompt('Clinic එකේ සේවාවන් මොනවාද?')">
                                <i class="bi bi-hospital text-success"></i> Clinic සේවාවන්
                            </button>
                            <button type="button" class="quick-chip-btn" onclick="sendQuickPrompt('උණ සහ සෙම්ප්‍රතිශ්‍යාව රෝග ලක්ෂණ මොනවාද?')">
                                <i class="bi bi-plus-square-fill text-success"></i> රෝග ලක්ෂණ
                            </button>
                            <button type="button" class="quick-chip-btn" onclick="sendQuickPrompt('වෛද්‍යවරයෙකු හමුවීමට Appointment එකක් දාන්නේ කොහොමද?')">
                                <i class="bi bi-calendar-check text-success"></i> Appointment
                            </button>
                            <button type="button" class="quick-chip-btn" onclick="sendQuickPrompt('නිරෝගීව සිටීමට සෞඛ්‍ය උපදෙස් කිහිපයක් දෙන්න')">
                                <i class="bi bi-info-circle-fill text-success"></i> සෞඛ්‍ය උපදෙස්
                            </button>
                            <button type="button" class="quick-chip-btn" onclick="focusChatInput()">
                                <i class="bi bi-question-circle-fill text-success"></i> වෙනත් ප්‍රශ්නයක්
                            </button>
                        </div>

                    </div>
                </div>

                <!-- Chat Bottom Input Area -->
                <div class="chat-input-section">
                    <form id="aiChatForm" class="chat-input-pill">
                        <!-- Voice Input Button (Uses Browser Speech Recognition if supported) -->
                        <button type="button" class="input-action-icon" id="voiceInputBtn" title="Speak your question">
                            <i class="bi bi-mic-fill"></i>
                        </button>

                        <!-- Info Shortcut Button -->
                        <a href="{{ route('chatbot.info') }}" class="input-action-icon" title="AI Usage & Medical Info">
                            <i class="bi bi-paperclip"></i>
                        </a>

                        <!-- User Message Text Input -->
                        <input type="text"
                               id="userMessageInput"
                               class="chat-text-input"
                               placeholder="ඔබගේ ප්‍රශ්නය මෙතන ටයිප් කරන්න..."
                               autocomplete="off"
                               required>

                        <!-- Send Button -->
                        <button type="submit" class="btn-send-message" id="sendMessageBtn">
                            <i class="bi bi-send-fill"></i> Send
                        </button>
                    </form>
                </div>

                <!-- Bottom Trust Badges & Cursive Slogan -->
                <div class="chat-trust-footer">
                    <div class="trust-badges-group">
                        <span class="trust-badge-item">
                            <i class="bi bi-shield-fill-check text-success fs-6"></i> 100% Secure
                        </span>
                        <span class="text-muted opacity-25">|</span>
                        <span class="trust-badge-item">
                            <i class="bi bi-lightning-charge-fill text-success fs-6"></i> Instant Support
                        </span>
                        <span class="text-muted opacity-25">|</span>
                        <span class="trust-badge-item">
                            <i class="bi bi-heart-fill text-success fs-6"></i> Caring Always
                        </span>
                    </div>

                    <div class="cursive-slogan">
                        Healthy Community, Healthy Sri Lanka
                    </div>
                </div>

            </div>
        </main>
    </div>

    <!-- ======================================================================
         JAVASCRIPT: REAL-TIME AI CHAT INTERACTION & UI HELPERS
         ====================================================================== -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const chatForm = document.getElementById('aiChatForm');
            const messageInput = document.getElementById('userMessageInput');
            const sendBtn = document.getElementById('sendMessageBtn');
            const messagesStream = document.getElementById('messagesStream');
            const chatContainer = document.getElementById('chatMessagesContainer');
            const welcomeTimestamp = document.getElementById('welcomeTimestamp');
            const voiceBtn = document.getElementById('voiceInputBtn');

            // Set initial welcome message time
            welcomeTimestamp.textContent = getCurrentFormattedTime();

            // Helper: Format current local time (e.g., 10:15 PM)
            function getCurrentFormattedTime() {
                const now = new Date();
                return now.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });
            }

            // Helper: Smoothly scroll chat container to the latest message
            function scrollToBottom() {
                chatContainer.scrollTop = chatContainer.scrollHeight;
            }

            // Helper: Format AI text response (converts bullet points & bold text into clean HTML)
            function formatAiResponseText(rawText) {
                let escaped = rawText
                    .replace(/&/g, '&amp;')
                    .replace(/</g, '&lt;')
                    .replace(/>/g, '&gt;');

                // Convert **bold** markdown to <strong>
                escaped = escaped.replace(/\*\*(.*?)\*\*/g, '<strong>$1</strong>');

                // Convert bullet lines (* or -) to green checkmark items
                const lines = escaped.split('\n');
                const formattedLines = lines.map(line => {
                    const trimmed = line.trim();
                    if (trimmed.startsWith('* ') || trimmed.startsWith('- ')) {
                        return `<div class="d-flex align-items-start gap-2 my-1">
                                    <i class="bi bi-check-square-fill text-success mt-1"></i>
                                    <span>${trimmed.substring(2)}</span>
                                </div>`;
                    }
                    return line;
                });

                return formattedLines.join('<br>');
            }

            // Append User Message Bubble to the Chat Stream
            function appendUserMessage(text) {
                const row = document.createElement('div');
                row.className = 'user-msg-row';
                row.innerHTML = `
                    <div class="user-speech-bubble">
                        <span>${text.replace(/</g, '&lt;').replace(/>/g, '&gt;')}</span>
                        <small class="text-muted fw-normal" style="font-size: 11px;">
                            ${getCurrentFormattedTime()} <i class="bi bi-check2-all text-success"></i>
                        </small>
                    </div>
                    <div class="user-msg-avatar">
                        <i class="bi bi-person-fill"></i>
                    </div>
                `;
                messagesStream.appendChild(row);
                scrollToBottom();
            }

            // Show Animated Typing Indicator while waiting for Gemini API
            function showTypingIndicator() {
                const typingRow = document.createElement('div');
                typingRow.className = 'bot-msg-row';
                typingRow.id = 'aiTypingIndicator';
                typingRow.innerHTML = `
                    <div class="msg-bot-icon">
                        <i class="bi bi-robot text-success fs-5"></i>
                    </div>
                    <div class="bot-speech-bubble py-2 px-3" style="min-width: auto;">
                        <div class="typing-dots">
                            <span></span><span></span><span></span>
                        </div>
                    </div>
                `;
                messagesStream.appendChild(typingRow);
                scrollToBottom();
            }

            // Remove Typing Indicator
            function removeTypingIndicator() {
                const indicator = document.getElementById('aiTypingIndicator');
                if (indicator) {
                    indicator.remove();
                }
            }

            // Append AI Assistant Response Bubble
            function appendBotMessage(replyText) {
                const row = document.createElement('div');
                row.className = 'bot-msg-row';
                row.innerHTML = `
                    <div class="msg-bot-icon">
                        <i class="bi bi-robot text-success fs-5"></i>
                    </div>
                    <div class="bot-speech-bubble">
                        <div>${formatAiResponseText(replyText)}</div>
                        <span class="msg-timestamp">${getCurrentFormattedTime()}</span>
                    </div>
                `;
                messagesStream.appendChild(row);
                scrollToBottom();
            }

            // Core Function: Send Question to Laravel ChatbotController
            async function submitChatMessage(messageText) {
                const cleanMessage = messageText.trim();
                if (!cleanMessage) return;

                // Disable input while processing
                messageInput.value = '';
                messageInput.disabled = true;
                sendBtn.disabled = true;

                appendUserMessage(cleanMessage);
                showTypingIndicator();

                try {
                    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

                    const response = await fetch("{{ route('chatbot.ask') }}", {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'Accept': 'application/json',
                            'X-CSRF-TOKEN': csrfToken
                        },
                        body: JSON.stringify({ message: cleanMessage })
                    });

                    const data = await response.json();
                    removeTypingIndicator();

                    const botReply = data.reply || data.response || data.message || 'පිළිතුරක් ලබා ගැනීමට නොහැකි විය.';
                    appendBotMessage(botReply);

                } catch (error) {
                    removeTypingIndicator();
                    appendBotMessage('සම්බන්ධතා දෝෂයකි. කරුණාකර අන්තර්ජාල සම්බන්ධතාවය පරීක්ෂා කර නැවත උත්සාහ කරන්න.');
                } finally {
                    messageInput.disabled = false;
                    sendBtn.disabled = false;
                    messageInput.focus();
                }
            }

            // Handle Form Submit
            chatForm.addEventListener('submit', function (e) {
                e.preventDefault();
                submitChatMessage(messageInput.value);
            });

            // Expose Quick Chip Function Globally
            window.sendQuickPrompt = function (promptText) {
                submitChatMessage(promptText);
            };

            // Expose Input Focus Helper Globally
            window.focusChatInput = function () {
                messageInput.focus();
            };

            // Optional Voice-to-Text Support via Browser Web Speech API
            if (voiceBtn) {
                voiceBtn.addEventListener('click', function () {
                    const SpeechRecognition = window.SpeechRecognition || window.webkitSpeechRecognition;
                    if (!SpeechRecognition) {
                        alert('Voice input is not supported in this browser. Please type your question.');
                        return;
                    }
                    const recognition = new SpeechRecognition();
                    recognition.lang = 'en-US';
                    voiceBtn.classList.add('text-danger');

                    recognition.onresult = function (event) {
                        const transcript = event.results[0][0].transcript;
                        messageInput.value = transcript;
                        voiceBtn.classList.remove('text-danger');
                        messageInput.focus();
                    };

                    recognition.onerror = function () {
                        voiceBtn.classList.remove('text-danger');
                    };

                    recognition.start();
                });
            }
        });
    </script>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>