<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MediCare24 - AI Assistant Information & Safety Guidelines</title>

    <!-- Bootstrap 5.3 CSS & Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <!-- Google Fonts: Plus Jakarta Sans (English) & Noto Sans Sinhala (Sinhala) -->
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Sinhala:wght@400;500;600;700;800&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        /* ==========================================================================
           1. GLOBAL THEME VARIABLES & BASE TYPOGRAPHY
           ========================================================================== */
        :root {
            --emerald-primary: #10b981;
            --emerald-dark: #064e3b;
            --sidebar-gradient: linear-gradient(180deg, #0b5d3b 0%, #053b25 100%);
            --banner-gradient: linear-gradient(90deg, #0b6e44 0%, #10945d 60%, #15a86a 100%);
            --page-bg: #eef7f4;
            --card-shadow: 0 6px 22px rgba(15, 23, 42, 0.05);
        }

        body {
            font-family: 'Plus Jakarta Sans', 'Noto Sans Sinhala', sans-serif;
            background-color: var(--page-bg);
            color: #1e293b;
            margin: 0;
            padding: 0;
        }

        /* ==========================================================================
           2. TOP NAVIGATION BAR (Consistent with MediCare24 Header)
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

        .brand-logo-circle {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            background: linear-gradient(135deg, #2dd4bf, #0d9488);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            color: #ffffff;
            font-size: 18px;
        }

        .top-nav-item {
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

        .top-nav-item:hover, .top-nav-item.active {
            color: #059669;
            background-color: #ecfdf5;
        }

        .badge-new-tag {
            background: linear-gradient(135deg, #14b8a6, #0d9488);
            color: #ffffff;
            font-size: 10px;
            font-weight: 700;
            padding: 3px 8px;
            border-radius: 20px;
        }

        .user-initial-avatar {
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
           3. WORKSPACE LAYOUT & LEFT DARK GREEN SIDEBAR
           ========================================================================== */
        .workspace-container {
            display: flex;
            min-height: calc(100vh - 64px);
        }

        .left-green-sidebar {
            width: 225px;
            background: var(--sidebar-gradient);
            color: #ffffff;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: 1.5rem 1rem;
            flex-shrink: 0;
        }

        .sidebar-menu-link {
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

        .sidebar-menu-link:hover {
            background: rgba(255, 255, 255, 0.14);
            color: #ffffff;
        }

        .sidebar-menu-link.active {
            background: rgba(255, 255, 255, 0.2);
            color: #ffffff;
            border-left: 4px solid #34d399;
        }

        .sidebar-emblem-box {
            text-align: center;
            padding: 1rem 0.5rem;
        }

        .shield-glow-circle {
            width: 64px;
            height: 64px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(52, 211, 153, 0.35) 0%, rgba(16, 185, 129, 0.08) 70%);
            border: 1px solid rgba(52, 211, 153, 0.45);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 10px;
            box-shadow: 0 0 25px rgba(52, 211, 153, 0.3);
        }

        /* ==========================================================================
           4. AI INFO PAGE SPECIFIC SECTIONS (HERO, WARNING, CARDS, HELPLINES)
           ========================================================================== */
        .info-main-content {
            flex-grow: 1;
            padding: 1.5rem 2rem;
            max-width: 1220px;
            margin: 0 auto;
        }

        /* Top Dark Green Hero Banner */
        .ai-hero-banner {
            background: var(--banner-gradient);
            border-radius: 18px;
            padding: 1.5rem 2rem;
            color: #ffffff;
            box-shadow: 0 8px 24px rgba(11, 110, 68, 0.18);
            margin-bottom: 1.25rem;
        }

        .hero-icon-badge {
            width: 56px;
            height: 56px;
            border-radius: 16px;
            background: rgba(255, 255, 255, 0.16);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 28px;
            flex-shrink: 0;
        }

        /* Yellow Medical Disclaimer Notice Box */
        .important-notice-box {
            background: linear-gradient(135deg, #fefce8 0%, #fef9c3 100%);
            border: 1px solid #fde047;
            border-left: 6px solid #eab308;
            border-radius: 16px;
            padding: 1.35rem 1.75rem;
            box-shadow: var(--card-shadow);
            margin-bottom: 1.5rem;
        }

        .warning-triangle-wrap {
            width: 56px;
            height: 56px;
            border-radius: 14px;
            background: #fef08a;
            color: #ca8a04;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 30px;
            flex-shrink: 0;
        }

        /* 3-Column Illustrated Guide Cards */
        .guide-photo-card {
            background: #ffffff;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: var(--card-shadow);
            border: 1px solid #e2e8f0;
            height: 100%;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
            display: flex;
            flex-direction: column;
        }

        .guide-photo-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 28px rgba(15, 23, 42, 0.09);
        }

        .guide-card-image {
            width: 100%;
            height: 165px;
            object-fit: cover;
        }

        .guide-pill-badge {
            background-color: #10b981;
            color: #ffffff;
            font-size: 11px;
            font-weight: 700;
            padding: 4px 12px;
            border-radius: 20px;
            display: inline-block;
            margin-bottom: 10px;
        }

        /* 4-Column Quick Mini Feature Pills */
        .mini-feature-pill {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 14px;
            padding: 0.9rem 1rem;
            display: flex;
            align-items: center;
            gap: 12px;
            box-shadow: 0 4px 14px rgba(0, 0, 0, 0.03);
            height: 100%;
            transition: border-color 0.2s ease;
        }

        .mini-feature-pill:hover {
            border-color: #10b981;
        }

        .mini-pill-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: #d1fae5;
            color: #059669;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            flex-shrink: 0;
        }

        /* Split Illustration & Safety Checklist Card */
        .safety-split-card {
            background: #ffffff;
            border-radius: 20px;
            padding: 1.75rem;
            box-shadow: var(--card-shadow);
            border: 1px solid #e2e8f0;
            margin-bottom: 1.5rem;
        }

        .illustration-mint-frame {
            background: linear-gradient(135deg, #d1fae5 0%, #e0f2fe 100%);
            border-radius: 16px;
            padding: 1.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100%;
            min-height: 230px;
        }

        /* Emergency Callout Row */
        .emergency-phone-card {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 16px;
            padding: 1.25rem 1.5rem;
            display: flex;
            align-items: center;
            gap: 16px;
            box-shadow: var(--card-shadow);
            height: 100%;
        }

        .emergency-red-banner {
            background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
            color: #ffffff;
            border-radius: 16px;
            padding: 1.25rem 1.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 16px;
            box-shadow: 0 8px 20px rgba(220, 38, 38, 0.25);
            height: 100%;
            text-decoration: none;
            transition: transform 0.2s ease;
        }

        .emergency-red-banner:hover {
            transform: translateY(-2px);
            color: #ffffff;
        }

        /* Ministry of Health Sri Lanka Card */
        .moh-info-card {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 20px;
            padding: 1.75rem;
            box-shadow: var(--card-shadow);
            margin-bottom: 1.5rem;
        }

        .moh-helpline-row {
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 0.75rem 1rem;
            border-radius: 12px;
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            margin-bottom: 10px;
        }

        .moh-icon-box {
            width: 42px;
            height: 42px;
            border-radius: 10px;
            background: #d1fae5;
            color: #047857;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            flex-shrink: 0;
        }

        /* Bottom Dark Green Action Button */
        .btn-bottom-cta {
            background: linear-gradient(90deg, #0b6e44 0%, #0f8a56 100%);
            color: #ffffff;
            font-weight: 700;
            font-size: 16px;
            padding: 14px 36px;
            border-radius: 14px;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            box-shadow: 0 8px 20px rgba(11, 110, 68, 0.22);
            transition: all 0.2s ease;
        }

        .btn-bottom-cta:hover {
            background: linear-gradient(90deg, #085735 0%, #0b6e44 100%);
            color: #ffffff;
            transform: translateY(-2px);
        }

        @media (max-width: 991px) {
            .workspace-container { flex-direction: column; }
            .left-green-sidebar { width: 100%; flex-direction: row; align-items: center; padding: 0.85rem 1rem; }
            .sidebar-emblem-box { display: none; }
            .info-main-content { padding: 1rem; }
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
            <span class="brand-logo-circle">
                <i class="bi bi-heart-pulse-fill"></i>
            </span>
            <span class="fw-bold fs-5 text-dark">MediCare<span style="color: #0d9488;">24</span></span>
        </a>

        <!-- Center Navigation Links -->
        <nav class="d-none d-xl-flex align-items-center gap-2">
            <a href="{{ Route::has('doctors.index') ? route('doctors.index') : '#' }}" class="top-nav-item">Find Doctors</a>
            <a href="#" class="top-nav-item">Video Consult</a>
            <a href="{{ Route::has('lab.index') ? route('lab.index') : '#' }}" class="top-nav-item">Lab Tests</a>
            <a href="#" class="top-nav-item">Surgeries</a>
            <a href="{{ route('chatbot.index') }}" class="top-nav-item">
                AI Chat Bot <span class="badge-new-tag">NEW</span>
            </a>
            <a href="#" class="top-nav-item">For Providers</a>
            <a href="{{ route('chatbot.info') }}" class="top-nav-item active">AI Info & Help</a>
        </nav>

        <!-- Right User Profile & Logout -->
        <div class="d-flex align-items-center gap-3">
            <div class="d-flex align-items-center gap-2">
                <span class="user-initial-avatar">
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
         2. MAIN WORKSPACE (Left Dark Green Sidebar + Right AI Info Content)
         ====================================================================== -->
    <div class="workspace-container">

        <!-- Left Dark Green Sidebar -->
        <aside class="left-green-sidebar">
            <div>
                <!-- Link to AI Chatbot Interface -->
                <a href="{{ route('chatbot.index') }}" class="sidebar-menu-link">
                    <i class="bi bi-robot fs-5"></i>
                    <span>AI Chat Bot</span>
                </a>

                <!-- Active Link: AI Info & Guidelines -->
                <a href="{{ route('chatbot.info') }}" class="sidebar-menu-link active">
                    <i class="bi bi-journal-medical fs-5"></i>
                    <span>AI Info</span>
                </a>
            </div>

            <!-- Bottom Safety & Health Shield Emblem -->
            <div class="sidebar-emblem-box">
                <div class="shield-glow-circle">
                    <i class="bi bi-shield-fill-check text-white fs-3"></i>
                </div>
                <h6 class="fw-bold mb-1">Your Health<br>Our Priority</h6>
                <small class="text-white-50" style="font-size: 11px;">Safe AI Guidance</small>
            </div>
        </aside>

        <!-- Right Main Content Area -->
        <main class="info-main-content">

            <!-- ==============================================================
                 SECTION A: TOP DARK GREEN HERO BANNER
                 ============================================================== -->
            <div class="ai-hero-banner d-flex justify-content-between align-items-center flex-wrap gap-3">
                <div class="d-flex align-items-center gap-3">
                    <div class="hero-icon-badge">
                        <i class="bi bi-robot"></i>
                    </div>
                    <div>
                        <h4 class="fw-bold mb-1">ආරක්ෂිත සෞඛ්‍ය තොරතුරු සඳහා AI සහාය ලබා ගනිමු...</h4>
                        <small class="text-white-50">MediCare24 AI Health Assistant භාවිතා කරන නිවැරදි ආකාරය සහ සීමාවන්</small>
                    </div>
                </div>

                <!-- Action Button to Open AI Chat Bot -->
                <a href="{{ route('chatbot.index') }}" class="btn btn-light text-success fw-bold rounded-3 px-4 py-2 shadow-sm">
                    <i class="bi bi-play-fill me-1"></i> AI Chat Bot බලන්න
                </a>
            </div>

            <!-- ==============================================================
                 SECTION B: YELLOW IMPORTANT NOTICE BOX (NO PRESCRIPTIONS)
                 ============================================================== -->
            <div class="important-notice-box">
                <div class="d-flex align-items-start gap-3 flex-wrap flex-md-nowrap">
                    <div class="warning-triangle-wrap">
                        <i class="bi bi-exclamation-triangle-fill"></i>
                    </div>
                    <div>
                        <h5 class="fw-bold text-dark mb-1">වැදගත් දැනුම්දීමක්! (Important Medical Disclaimer)</h5>
                        <p class="text-dark small fw-semibold mb-2">
                            MediCare24 AI සහායකයා භාවිතා කිරීමට පෙර, අනිවාර්යයෙන්ම පහත කරුණු පිළිබඳව සැලකිලිමත් වන්න:
                        </p>
                        <ul class="list-unstyled mb-0 small text-dark">
                            <li class="mb-1 d-flex align-items-center gap-2">
                                <i class="bi bi-check-circle-fill text-success"></i>
                                <span><strong>AI මඟින් බෙහෙත් නියම කිරීම (Prescriptions) සිදු නොකරයි</strong> — මෙමඟින් ලබා දෙන්නේ සාමාන්‍ය සෞඛ්‍ය තොරතුරු (Health Information) පමණි.</span>
                            </li>
                            <li class="mb-1 d-flex align-items-center gap-2">
                                <i class="bi bi-check-circle-fill text-success"></i>
                                <span>කිසිදු ඖෂධයක් AI පිළිතුරු මත පදනම්ව තනිවම ලබා නොගන්න; සෑම විටම සුදුසුකම් ලත් වෛද්‍යවරයෙකු හමුවන්න.</span>
                            </li>
                            <li class="d-flex align-items-center gap-2">
                                <i class="bi bi-check-circle-fill text-success"></i>
                                <span>හදිසි රෝගී තත්ත්වයකදී AI Chat භාවිතා නොකර වහාම 1990 හෝ ළඟම ඇති රෝහල වෙත යොමු වන්න.</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- ==============================================================
                 SECTION C: 3 ILLUSTRATED AI GUIDE CARDS
                 ============================================================== -->
            <div class="row g-3 mb-3">
                <!-- Card 1: General Health Info -->
                <div class="col-md-4">
                    <div class="guide-photo-card">
                        <img src="https://images.unsplash.com/photo-1576091160550-2173dba999ef?auto=format&fit=crop&w=800&q=80"
                             alt="AI Health Information" class="guide-card-image">
                        <div class="p-3 d-flex flex-column flex-grow-1 justify-content-between">
                            <div>
                                <span class="guide-pill-badge">මූලික තොරතුරු</span>
                                <h6 class="fw-bold text-dark mb-1">සෞඛ්‍ය තොරතුරු පමණයි</h6>
                                <p class="text-secondary small mb-2">
                                    රෝග ලක්ෂණ සහ සෞඛ්‍ය පුරුදු පිළිබඳ නිවැරදි මූලික තොරතුරු AI මඟින් ලබා ගන්නා ආකාරය.
                                </p>
                            </div>
                            <div class="text-end">
                                <a href="{{ route('chatbot.index') }}" class="text-success fw-bold text-decoration-none">
                                    <i class="bi bi-arrow-right fs-5"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card 2: Digital Health & Stethoscope -->
                <div class="col-md-4">
                    <div class="guide-photo-card">
                        <img src="https://images.unsplash.com/photo-1505751172876-fa1923c5c528?auto=format&fit=crop&w=800&q=80"
                             alt="Doctor Consultation" class="guide-card-image">
                        <div class="p-3 d-flex flex-column flex-grow-1 justify-content-between">
                            <div>
                                <span class="guide-pill-badge">සෞඛ්‍ය උපදෙස්</span>
                                <h6 class="fw-bold text-dark mb-1">ඩිජිටල් සෞඛ්‍ය සහාය</h6>
                                <p class="text-secondary small mb-2">
                                    වෛද්‍යවරයෙකු හමුවීමට පෙර ඔබගේ ගැටලුව නිරවුල්ව තේරුම් ගැනීමට AI සහාය ලබා ගන්න.
                                </p>
                            </div>
                            <div class="text-end">
                                <a href="{{ route('chatbot.index') }}" class="text-success fw-bold text-decoration-none">
                                    <i class="bi bi-arrow-right fs-5"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card 3: Privacy & Data Protection -->
                <div class="col-md-4">
                    <div class="guide-photo-card">
                        <img src="https://images.unsplash.com/photo-1563986768609-322da13575f3?auto=format&fit=crop&w=800&q=80"
                             alt="Patient Data Security" class="guide-card-image">
                        <div class="p-3 d-flex flex-column flex-grow-1 justify-content-between">
                            <div>
                                <span class="guide-pill-badge">දත්ත ආරක්ෂාව</span>
                                <h6 class="fw-bold text-dark mb-1">රෝගී තොරතුරු ආරක්ෂාව</h6>
                                <p class="text-secondary small mb-2">
                                    ඔබ AI සමඟ බෙදාගන්නා සෞඛ්‍ය ගැටලු 100% ක් පෞද්ගලිකව හා ආරක්ෂිතව සුරැකේ.
                                </p>
                            </div>
                            <div class="text-end">
                                <a href="{{ route('chatbot.index') }}" class="text-success fw-bold text-decoration-none">
                                    <i class="bi bi-arrow-right fs-5"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ==============================================================
                 SECTION D: 4 MINI HORIZONTAL QUICK FEATURE PILLS
                 ============================================================== -->
            <div class="row g-3 mb-4">
                <div class="col-sm-6 col-lg-3">
                    <div class="mini-feature-pill">
                        <div class="mini-pill-icon">
                            <i class="bi bi-shield-check"></i>
                        </div>
                        <div class="lh-sm">
                            <div class="fw-bold text-dark small">ආරක්ෂිත AI භාවිතය</div>
                            <small class="text-muted" style="font-size: 11px;">(සිංහල සහ English)</small>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-lg-3">
                    <div class="mini-feature-pill">
                        <div class="mini-pill-icon">
                            <i class="bi bi-capsule"></i>
                        </div>
                        <div class="lh-sm">
                            <div class="fw-bold text-dark small">ඖෂධ නියම නොකරයි</div>
                            <small class="text-muted" style="font-size: 11px;">(තොරතුරු පමණක් ලබා දේ)</small>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-lg-3">
                    <div class="mini-feature-pill">
                        <div class="mini-pill-icon">
                            <i class="bi bi-calendar2-check"></i>
                        </div>
                        <div class="lh-sm">
                            <div class="fw-bold text-dark small">Clinic සේවා විස්තර</div>
                            <small class="text-muted" style="font-size: 11px;">(වෛද්‍ය හමුවීම් සඳහා)</small>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-lg-3">
                    <div class="mini-feature-pill">
                        <div class="mini-pill-icon">
                            <i class="bi bi-info-circle-fill"></i>
                        </div>
                        <div class="lh-sm">
                            <div class="fw-bold text-dark small">වැදගත් නිවේදන</div>
                            <small class="text-muted" style="font-size: 11px;">(පැය 24 පුරා සේවාව)</small>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ==============================================================
                 SECTION E: SPLIT ILLUSTRATION & AI SAFETY CHECKLIST CARD
                 ============================================================== -->
            <div class="safety-split-card">
                <div class="row g-4 align-items-center">
                    <!-- Left Illustration: AI Medical Shield & Security Graphic -->
                    <div class="col-lg-5">
                        <div class="illustration-mint-frame">
                            <svg width="210" height="190" viewBox="0 0 240 210" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <!-- Background Soft Circle -->
                                <circle cx="120" cy="105" r="88" fill="#ffffff" fill-opacity="0.75"/>
                                <!-- Medical Shield Body -->
                                <path d="M120 26L182 52V104C182 145.5 155.6 182.8 120 194C84.4 182.8 58 145.5 58 104V52L120 26Z" fill="#0d9488"/>
                                <path d="M120 36L172 58V104C172 139.5 149.5 171.5 120 182C90.5 171.5 68 139.5 68 104V58L120 36Z" fill="#10b981"/>
                                <!-- White Medical Cross Inside Shield -->
                                <rect x="110" y="74" width="20" height="60" rx="5" fill="#ffffff"/>
                                <rect x="90" y="94" width="60" height="20" rx="5" fill="#ffffff"/>
                                <!-- Floating AI Chat Badge -->
                                <rect x="144" y="132" width="66" height="42" rx="12" fill="#064e3b"/>
                                <circle cx="166" cy="153" r="4" fill="#34d399"/>
                                <circle cx="177" cy="153" r="4" fill="#34d399"/>
                                <circle cx="188" cy="153" r="4" fill="#34d399"/>
                            </svg>
                        </div>
                    </div>

                    <!-- Right Checklist: AI Usage Rules -->
                    <div class="col-lg-7">
                        <h4 class="fw-bold text-dark mb-2">
                            AI සෞඛ්‍ය සහායකයා පිළිබඳ නිවැරදි අවබෝධය (AI Usage & Safety)
                        </h4>
                        <p class="text-secondary fw-semibold small mb-3">
                            MediCare24 AI පද්ධතිය වඩාත් ආරක්ෂිතව සහ ඵලදායීව භාවිතා කිරීමට පහත ක්‍රම අනුගමනය කරන්න:
                        </p>

                        <ul class="list-unstyled mb-3">
                            <li class="mb-2 d-flex align-items-center gap-2 fw-semibold text-dark small">
                                <i class="bi bi-check-lg text-success fs-5"></i>
                                <span>ඔබගේ රෝග ලක්ෂණ පැහැදිලිව සඳහන් කර සාමාන්‍ය තොරතුරු විමසන්න.</span>
                            </li>
                            <li class="mb-2 d-flex align-items-center gap-2 fw-semibold text-dark small">
                                <i class="bi bi-check-lg text-success fs-5"></i>
                                <span>AI මඟින් ලබා දෙන තොරතුරු වෛද්‍ය උපදෙස් (Prescription) ලෙස නොසලකන්න.</span>
                            </li>
                            <li class="mb-2 d-flex align-items-center gap-2 fw-semibold text-dark small">
                                <i class="bi bi-check-lg text-success fs-5"></i>
                                <span>ඔබගේ බැංකු තොරතුරු හෝ මුරපද (Passwords) Chat එක තුළ ඇතුළත් නොකරන්න.</span>
                            </li>
                            <li class="d-flex align-items-center gap-2 fw-semibold text-dark small">
                                <i class="bi bi-check-lg text-success fs-5"></i>
                                <span>ඖෂධ ලබා ගැනීමට අවශ්‍ය නම් MediCare24 වෛද්‍යවරයෙකු වෙන් කරගන්න.</span>
                            </li>
                        </ul>

                        <p class="fw-bold text-success small mb-0">
                            නිවැරදි තොරතුරු සමඟ සෞඛ්‍ය සම්පන්න දිවියක් ගත කරන්න!
                        </p>
                    </div>
                </div>
            </div>

            <!-- ==============================================================
                 SECTION F: EMERGENCY HELPLINE SPLIT ROW
                 ============================================================== -->
            <div class="row g-3 mb-4">
                <!-- Left Card: 1990 Suwaseriya Ambulance Helpline -->
                <div class="col-md-6">
                    <div class="emergency-phone-card">
                        <div class="rounded-circle bg-success-subtle text-success d-flex align-items-center justify-content-center flex-shrink-0" style="width: 54px; height: 54px;">
                            <i class="bi bi-telephone-fill fs-3"></i>
                        </div>
                        <div>
                            <div class="fw-bold text-dark fs-5">හදිසි ගිලන්රථ සේවාව සඳහා</div>
                            <div class="fw-bold text-success fs-4">අමතන්න – 1990</div>
                        </div>
                    </div>
                </div>

                <!-- Right Card: Red Emergency Alert Banner -->
                <div class="col-md-6">
                    <a href="tel:1990" class="emergency-red-banner">
                        <i class="bi bi-bell-fill fs-1"></i>
                        <div>
                            <div class="fw-bold fs-4">හදිසි අවස්ථාවක්</div>
                            <div class="fw-semibold opacity-90">(Emergency - Call 1990 / 119)</div>
                        </div>
                    </a>
                </div>
            </div>

            <!-- ==============================================================
                 SECTION G: MINISTRY OF HEALTH SRI LANKA INFO CARD
                 ============================================================== -->
            <div class="moh-info-card">
                <div class="row g-4 align-items-center">
                    <!-- Left Column: Ministry Title & Custom Hospital Building SVG -->
                    <div class="col-lg-6 text-center">
                        <h5 class="fw-bold text-dark mb-1">ශ්‍රී ලංකා සෞඛ්‍ය අමාත්‍යාංශය</h5>
                        <p class="text-secondary fw-semibold small mb-3">(Ministry of Health - Sri Lanka)</p>

                        <!-- Clean Hospital Building Vector Illustration -->
                        <svg width="260" height="170" viewBox="0 0 280 180" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <!-- Ground Line -->
                            <rect x="20" y="164" width="240" height="6" rx="3" fill="#10b981"/>
                            <!-- Side Wings -->
                            <rect x="35" y="75" width="55" height="89" rx="4" fill="#d1fae5" stroke="#059669" stroke-width="2.5"/>
                            <rect x="190" y="75" width="55" height="89" rx="4" fill="#d1fae5" stroke="#059669" stroke-width="2.5"/>
                            <!-- Main Central Hospital Tower -->
                            <rect x="85" y="42" width="110" height="122" rx="6" fill="#ecfdf5" stroke="#047857" stroke-width="3"/>
                            <!-- Top Medical Cross Emblem -->
                            <circle cx="140" cy="30" r="22" fill="#ffffff" stroke="#059669" stroke-width="3"/>
                            <rect x="135" y="18" width="10" height="24" rx="2" fill="#10b981"/>
                            <rect x="128" y="25" width="24" height="10" rx="2" fill="#10b981"/>
                            <!-- Windows Grid -->
                            <rect x="102" y="64" width="18" height="16" rx="2" fill="#6ee7b7"/>
                            <rect x="131" y="64" width="18" height="16" rx="2" fill="#6ee7b7"/>
                            <rect x="160" y="64" width="18" height="16" rx="2" fill="#6ee7b7"/>
                            <rect x="102" y="92" width="18" height="16" rx="2" fill="#6ee7b7"/>
                            <rect x="131" y="92" width="18" height="16" rx="2" fill="#6ee7b7"/>
                            <rect x="160" y="92" width="18" height="16" rx="2" fill="#6ee7b7"/>
                            <!-- Entrance Door -->
                            <rect x="122" y="126" width="36" height="38" rx="4" fill="#059669"/>
                        </svg>
                    </div>

                    <!-- Right Column: National Health Helplines & Official Portal -->
                    <div class="col-lg-6">
                        <div class="moh-helpline-row">
                            <div class="moh-icon-box">
                                <i class="bi bi-ambulance"></i>
                            </div>
                            <div>
                                <div class="fw-bold text-dark">1990 – සුවසැරිය හදිසි ගිලන්රථ සේවාව</div>
                                <small class="text-muted">24/7 Free Pre-Hospital Emergency Ambulance Service</small>
                            </div>
                        </div>

                        <div class="moh-helpline-row">
                            <div class="moh-icon-box">
                                <i class="bi bi-headset"></i>
                            </div>
                            <div>
                                <div class="fw-bold text-dark">1926 – ජාතික සෞඛ්‍ය උපදෙස් දුරකථන අංකය</div>
                                <small class="text-muted">National Mental Health & Medical Helpline</small>
                            </div>
                        </div>

                        <div class="moh-helpline-row">
                            <div class="moh-icon-box">
                                <i class="bi bi-heart-pulse-fill"></i>
                            </div>
                            <div>
                                <div class="fw-bold text-dark">MOH සේවාව – මව සහ ළදරු සඳහා උපදෙස්</div>
                                <small class="text-muted">Maternal & Child Health Clinic Guidance</small>
                            </div>
                        </div>

                        <div class="mt-3 ps-2 d-flex align-items-center gap-2">
                            <i class="bi bi-globe2 text-success fs-5"></i>
                            <span class="fw-bold text-dark small">වෙබ් අඩවිය:</span>
                            <a href="https://www.health.gov.lk" target="_blank" rel="noopener" class="fw-bold text-success text-decoration-none small">
                                www.health.gov.lk
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ==============================================================
                 SECTION H: BOTTOM CALL-TO-ACTION BUTTON
                 ============================================================== -->
            <div class="text-center pb-3">
                <a href="{{ route('chatbot.index') }}" class="btn-bottom-cta">
                    <i class="bi bi-chat-dots-fill"></i>
                    <span>AI Chat Bot වෙත ගොස් සෞඛ්‍ය තොරතුරු විමසන්න</span>
                    <i class="bi bi-arrow-right"></i>
                </a>
            </div>

        </main>
    </div>

    <!-- Bootstrap 5.3 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>