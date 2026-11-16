<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MediCare24 - AI Assistant Information & Guidelines</title>

    <!-- Bootstrap 5 CSS & Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <!-- Google Fonts: Plus Jakarta Sans & Noto Sans Sinhala -->
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Sinhala:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        /* ==========================================================================
           GLOBAL STYLES & COLOR VARIABLES
           ========================================================================== */
        :root {
            --primary-green: #10b981;
            --dark-green: #064e3b;
            --sidebar-gradient: linear-gradient(180deg, #0b5d3b 0%, #063f28 100%);
            --header-gradient: linear-gradient(90deg, #0d7a4e 0%, #16a366 55%, #10b981 100%);
            --soft-mint-bg: #eef7f4;
        }

        body {
            font-family: 'Plus Jakarta Sans', 'Noto Sans Sinhala', sans-serif;
            background-color: var(--soft-mint-bg);
            color: #1e293b;
            margin: 0;
            padding: 0;
        }

        /* ==========================================================================
           TOP NAVIGATION BAR STYLES
           ========================================================================== */
        .top-navbar {
            background: #ffffff;
            border-bottom: 1px solid #e2e8f0;
            padding: 0.75rem 1.75rem;
            position: sticky;
            top: 0;
            z-index: 1030;
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.03);
        }

        .brand-badge {
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

        .top-nav-link {
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

        .top-nav-link:hover, .top-nav-link.active {
            color: #059669;
            background-color: #ecfdf5;
        }

        .badge-new {
            background: linear-gradient(135deg, #14b8a6, #0d9488);
            color: #fff;
            font-size: 10px;
            font-weight: 700;
            padding: 3px 8px;
            border-radius: 20px;
            letter-spacing: 0.4px;
        }

        .user-avatar-circle {
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
           LEFT DARK GREEN SIDEBAR STYLES
           ========================================================================== */
        .app-layout {
            display: flex;
            min-height: calc(100vh - 65px);
        }

        .left-sidebar {
            width: 225px;
            background: var(--sidebar-gradient);
            color: #ffffff;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: 1.5rem 1rem;
            flex-shrink: 0;
        }

        .sidebar-menu-btn {
            display: flex;
            align-items: center;
            gap: 12px;
            color: rgba(255, 255, 255, 0.85);
            text-decoration: none;
            padding: 12px 14px;
            border-radius: 12px;
            font-weight: 600;
            font-size: 14px;
            margin-bottom: 8px;
            transition: all 0.2s ease;
        }

        .sidebar-menu-btn:hover {
            background: rgba(255, 255, 255, 0.12);
            color: #ffffff;
        }

        .sidebar-menu-btn.active {
            background: rgba(255, 255, 255, 0.18);
            color: #ffffff;
            border-left: 4px solid #34d399;
        }

        .sidebar-bottom-emblem {
            text-align: center;
            padding: 1rem 0.5rem;
        }

        .glowing-heart-circle {
            width: 64px;
            height: 64px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(52, 211, 153, 0.35) 0%, rgba(16, 185, 129, 0.1) 70%);
            border: 1px solid rgba(52, 211, 153, 0.4);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 12px;
            box-shadow: 0 0 25px rgba(52, 211, 153, 0.3);
        }

        /* ==========================================================================
           AI INFO MAIN CONTENT CARDS & ILLUSTRATIONS
           ========================================================================== */
        .main-content-area {
            flex-grow: 1;
            padding: 1.75rem 2rem;
        }

        .info-hero-banner {
            background: var(--header-gradient);
            border-radius: 20px;
            padding: 2rem;
            color: #ffffff;
            box-shadow: 0 10px 25px rgba(16, 185, 129, 0.18);
            margin-bottom: 1.75rem;
        }

        .disclaimer-alert-card {
            background: linear-gradient(135deg, #fffbeb 0%, #fef3c7 100%);
            border-left: 6px solid #f59e0b;
            border-radius: 16px;
            padding: 1.5rem;
            box-shadow: 0 4px 15px rgba(245, 158, 11, 0.08);
            margin-bottom: 1.75rem;
        }

        .feature-guide-card {
            background: #ffffff;
            border: none;
            border-radius: 18px;
            overflow: hidden;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.04);
            height: 100%;
            transition: transform 0.2s ease;
        }

        .feature-guide-card:hover {
            transform: translateY(-4px);
        }

        .feature-card-img {
            width: 100%;
            height: 180px;
            object-fit: cover;
        }

        .step-number-badge {
            width: 34px;
            height: 34px;
            border-radius: 50%;
            background-color: #d1fae5;
            color: #047857;
            font-weight: 800;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        @media (max-width: 991px) {
            .app-layout { flex-direction: column; }
            .left-sidebar { width: 100%; flex-direction: row; align-items: center; padding: 1rem; }
            .sidebar-bottom-emblem { display: none; }
            .main-content-area { padding: 1rem; }
        }
    </style>
</head>
<body>

    <!-- ======================================================================
         TOP NAVIGATION BAR (Matches MediCare24 Dashboard Header)
         ====================================================================== -->
    <header class="top-navbar d-flex justify-content-between align-items-center flex-wrap gap-3">
        <!-- Brand Logo -->
        <a href="{{ route('dashboard') }}" class="d-flex align-items-center gap-2 text-decoration-none">
            <span class="brand-badge">
                <i class="bi bi-heart-pulse-fill"></i>
            </span>
            <span class="fw-bold fs-5 text-dark">MediCare<span style="color: #0d9488;">24</span></span>
        </a>

        <!-- Center Navigation Links -->
        <nav class="d-none d-xl-flex align-items-center gap-2">
            <a href="{{ Route::has('doctors.index') ? route('doctors.index') : '#' }}" class="top-nav-link">Find Doctors</a>
            <a href="#" class="top-nav-link">Video Consult</a>
            <a href="{{ Route::has('lab.index') ? route('lab.index') : '#' }}" class="top-nav-link">Lab Tests</a>
            <a href="#" class="top-nav-link">Surgeries</a>
            <a href="{{ route('chatbot.index') }}" class="top-nav-link">
                AI Chat Bot <span class="badge-new">NEW</span>
            </a>
            <a href="#" class="top-nav-link">For Providers</a>
            <a href="{{ route('chatbot.info') }}" class="top-nav-link active">AI Info & Help</a>
        </nav>

        <!-- Right User Profile & Logout -->
        <div class="d-flex align-items-center gap-3">
            <div class="d-flex align-items-center gap-2">
                <span class="user-avatar-circle">
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
         MAIN LAYOUT WRAPPER (Left Dark Green Sidebar + Right AI Info Content)
         ====================================================================== -->
    <div class="app-layout">

        <!-- Left Dark Green Sidebar -->
        <aside class="left-sidebar">
            <div>
                <!-- Navigation Link Back to AI Chatbot -->
                <a href="{{ route('chatbot.index') }}" class="sidebar-menu-btn">
                    <i class="bi bi-robot fs-5"></i>
                    <span>AI Chat Bot</span>
                </a>

                <!-- Active AI Info Page Link -->
                <a href="{{ route('chatbot.info') }}" class="sidebar-menu-btn active">
                    <i class="bi bi-info-circle-fill fs-5"></i>
                    <span>AI Info</span>
                </a>
            </div>

            <!-- Bottom Hospital Health Emblem -->
            <div class="sidebar-bottom-emblem">
                <div class="glowing-heart-circle">
                    <i class="bi bi-heart-pulse-fill text-white fs-3"></i>
                </div>
                <h6 class="fw-bold mb-1">Your Health<br>Our Priority</h6>
                <small class="fst-italic text-white-50" style="font-size: 11px;">Together for a<br>Healthier Life</small>
            </div>
        </aside>

        <!-- Right Main Content Area: AI Usage Guide & Disclaimers -->
        <main class="main-content-area">

            <!-- Hero Header Banner -->
            <div class="info-hero-banner d-flex justify-content-between align-items-center flex-wrap gap-3">
                <div>
                    <span class="badge bg-white text-success fw-bold px-3 py-1 rounded-pill mb-2">
                        <i class="bi bi-stars me-1"></i> MediCare24 AI Guide
                    </span>
                    <h3 class="fw-bold mb-1">About MediCare24 AI Health Assistant</h3>
                    <p class="mb-0 text-white-50">
                        ඔබගේ සෞඛ්‍ය ගැටලු සඳහා ක්ෂණික තොරතුරු සහ මඟපෙන්වීම් ලබා ගන්නා ආකාරය දැනගන්න.
                    </p>
                </div>
                <a href="{{ route('chatbot.index') }}" class="btn btn-light text-success fw-bold rounded-pill px-4 py-2 shadow-sm">
                    <i class="bi bi-chat-dots-fill me-2"></i> Open AI Chat Bot
                </a>
            </div>

            <!-- IMPORTANT MEDICAL DISCLAIMER BOX (No Prescriptions / Information Only) -->
            <div class="disclaimer-alert-card">
                <div class="d-flex align-items-start gap-3">
                    <div class="bg-warning text-dark rounded-circle p-3 d-flex align-items-center justify-content-center flex-shrink-0">
                        <i class="bi bi-exclamation-triangle-fill fs-4"></i>
                    </div>
                    <div>
                        <h5 class="fw-bold text-dark mb-2">
                            වැදගත් දැනුම්දීමයි: AI සහායකයා මඟින් බෙහෙත් නියම කිරීම (Prescriptions) සිදු නොකරයි!
                        </h5>
                        <p class="text-dark mb-2">
                            <strong>MediCare24 AI Assistant</strong> නිර්මාණය කර ඇත්තේ ඔබට <strong>සාමාන්‍ය සෞඛ්‍ය තොරතුරු (General Health Information)</strong>, රෝග ලක්ෂණ පිළිබඳ මූලික අවබෝධය, සහ සුදුසු වෛද්‍යවරයෙකු වෙත යොමු වීමට මඟපෙන්වීම සඳහා පමණි.
                        </p>
                        <ul class="mb-0 text-secondary small fw-semibold">
                            <li class="mb-1">❌ මෙම AI පද්ධතිය මඟින් කිසිදු ඖෂධයක් (Medicines) නියම කිරීම හෝ මාත්‍රාවන් (Dosage) ලබා දීම සිදු නොකරයි.</li>
                            <li class="mb-1">✅ ඖෂධ ලබා ගැනීම සඳහා සෑම විටම <strong>MediCare24</strong> සුදුසුකම් ලත් වෛද්‍යවරයෙකු හමුවී නිල වෛද්‍ය උපදෙස් (Prescription) ලබා ගන්න.</li>
                            <li>🚑 හදිසි රෝගී තත්ත්වයකදී (පපුවේ වේදනාව, හුස්ම ගැනීමේ අපහසුතා ආදිය) වහාම ළඟම ඇති රෝහල වෙත යොමු වන්න.</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- 3 Illustrated Info Cards on How AI Works -->
            <div class="row g-4 mb-4">
                <!-- Card 1: General Health Info Only -->
                <div class="col-md-4">
                    <div class="feature-guide-card">
                        <img src="https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?auto=format&fit=crop&w=800&q=80"
                             alt="Digital Health Information" class="feature-card-img">
                        <div class="p-4">
                            <span class="badge bg-success-subtle text-success mb-2">Health Information Only</span>
                            <h6 class="fw-bold text-dark">සෞඛ්‍ය තොරතුරු පමණක් ලබා දීම</h6>
                            <p class="text-secondary small mb-0">
                                උණ, සෙම්ප්‍රතිශ්‍යාව, දියවැඩියාව වැනි රෝග ලක්ෂණ සහ සෞඛ්‍ය සම්පන්න ජීවන රටාව පිළිබඳ නිවැරදි තොරතුරු සිංහලෙන් හෝ ඉංග්‍රීසියෙන් විමසිය හැක.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Card 2: Doctor Consultation Guidance -->
                <div class="col-md-4">
                    <div class="feature-guide-card">
                        <img src="https://images.unsplash.com/photo-1584982751601-97dcc096659c?auto=format&fit=crop&w=800&q=80"
                             alt="Doctor Consultation" class="feature-card-img">
                        <div class="p-4">
                            <span class="badge bg-info-subtle text-info mb-2">Specialist Guidance</span>
                            <h6 class="fw-bold text-dark">වෛද්‍යවරුන් හා සායන සේවාවන්</h6>
                            <p class="text-secondary small mb-0">
                                ඔබගේ රෝග ලක්ෂණ අනුව හමුවිය යුතු විශේෂඥ වෛද්‍යවරයා කවුරුන්ද යන්න සහ Clinic Appointments වෙන් කරගන්නා ආකාරය AI මඟින් පෙන්වා දෙයි.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Card 3: 100% Private & 24/7 Available -->
                <div class="col-md-4">
                    <div class="feature-guide-card">
                        <img src="https://images.unsplash.com/photo-1551076805-e1869033e561?auto=format&fit=crop&w=800&q=80"
                             alt="24/7 Secure Support" class="feature-card-img">
                        <div class="p-4">
                            <span class="badge bg-primary-subtle text-primary mb-2">24/7 Secure Support</span>
                            <h6 class="fw-bold text-dark">පැය 24 පුරා ආරක්ෂිත සේවාව</h6>
                            <p class="text-secondary small mb-0">
                                ඕනෑම වේලාවක ඔබගේ සෞඛ්‍ය ගැටලු විමසිය හැකි අතර, ඔබගේ පෞද්ගලික තොරතුරු 100% ක් ආරක්ෂිතව සුරැකේ.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Step-by-Step User Instructions -->
            <div class="card border-0 rounded-4 shadow-sm p-4">
                <h5 class="fw-bold text-dark mb-3">
                    <i class="bi bi-journal-check text-success me-2"></i> AI Chat Bot භාවිතා කරන ආකාරය (How to Use)
                </h5>
                <div class="row g-3">
                    <div class="col-md-4 d-flex align-items-start gap-3">
                        <span class="step-number-badge">1</span>
                        <div>
                            <h6 class="fw-bold mb-1">ඔබගේ ප්‍රශ්නය ටයිප් කරන්න</h6>
                            <small class="text-secondary">පහළ ඇති Text Box එකේ සිංහලෙන් හෝ English වලින් ඔබගේ සෞඛ්‍ය ගැටලුව ඇතුළත් කරන්න.</small>
                        </div>
                    </div>
                    <div class="col-md-4 d-flex align-items-start gap-3">
                        <span class="step-number-badge">2</span>
                        <div>
                            <h6 class="fw-bold mb-1">Quick Buttons භාවිතා කරන්න</h6>
                            <small class="text-secondary">"Clinic සේවාවන්", "රෝග ලක්ෂණ", "Appointment" වැනි ඉක්මන් බොත්තම් Click කර ක්ෂණික තොරතුරු ලබා ගන්න.</small>
                        </div>
                    </div>
                    <div class="col-md-4 d-flex align-items-start gap-3">
                        <span class="step-number-badge">3</span>
                        <div>
                            <h6 class="fw-bold mb-1">වෛද්‍යවරයෙකු වෙත යොමු වන්න</h6>
                            <small class="text-secondary">AI ලබා දෙන තොරතුරු මත පදනම්ව අවශ්‍ය නම් Find Doctors හරහා වෛද්‍යවරයෙකු වෙන් කරගන්න.</small>
                        </div>
                    </div>
                </div>
            </div>

        </main>
    </div>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>