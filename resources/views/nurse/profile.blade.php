<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nurse Profile</title>

    <style>
        * { box-sizing: border-box; }

        :root {
            --primary: #0a9368;
            --primary-dark: #087553;
            --primary-soft: #e9f8f3;
            --text: #182236;
            --muted: #758197;
            --border: #e6edf1;
            --bg: #f5f7fa;
            --surface: #ffffff;
            --blue-soft: #edf6ff;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            color: var(--text);
            background:
                radial-gradient(circle at top left, #dcfaf0 0%, transparent 26%),
                radial-gradient(circle at top right, #edf4ff 0%, transparent 28%),
                var(--bg);
        }

        .page {
            max-width: 1350px;
            margin: 0 auto;
            padding: 28px;
        }
/* =========================
   NURSE PROFILE NAVBAR
========================= */

.profile-topbar {
    width: 100%;

    background: rgba(255, 255, 255, 0.97);

    border: 1px solid #e7edf1;
    border-radius: 20px;

    padding: 16px 22px;

    display: flex;
    align-items: center;
    justify-content: space-between;

    gap: 24px;

    margin-bottom: 24px;

    box-shadow:
        0 8px 28px rgba(31, 41, 55, 0.04);
}


/* LEFT SIDE */

.brand-area {
    display: flex;
    align-items: center;
    gap: 20px;
}

.brand-logo {
    width: 165px;
    height: 62px;

    object-fit: contain;
    object-position: left center;

    display: block;
}

.navbar-divider {
    width: 1px;
    height: 58px;

    background: #e4e9ed;
}

.portal-info {
    display: flex;
    flex-direction: column;
    justify-content: center;
}

.topbar-title {
    font-size: 20px;
    font-weight: 800;

    color: #182236;
}

.topbar-subtitle {
    margin-top: 5px;

    color: #8a95a6;

    font-size: 13px;
}


/* RIGHT SIDE */

.topbar-actions {
    display: flex;
    align-items: center;
    justify-content: flex-end;

    gap: 10px;

    margin-left: auto;
}

.logout-form {
    margin: 0;
}


/* NURSE WORKSPACE BUTTON */

.workspace-btn {
    height: 48px;

    display: inline-flex;
    align-items: center;
    justify-content: center;

    gap: 9px;

    padding: 0 19px;

    background: #08a67a;
    color: white;

    border-radius: 12px;

    text-decoration: none;

    font-size: 14px;
    font-weight: 700;

    transition: 0.2s ease;

    box-shadow:
        0 6px 16px rgba(8, 166, 122, 0.14);
}

.workspace-btn:hover {
    background: #078b67;

    transform: translateY(-1px);

    box-shadow:
        0 8px 20px rgba(8, 166, 122, 0.20);
}


/* LOGOUT */

.logout-btn {
    height: 48px;

    display: inline-flex;
    align-items: center;
    justify-content: center;

    gap: 8px;

    padding: 0 18px;

    background: #fff5f5;
    color: #dc3545;

    border: 1px solid #f0b8bd;
    border-radius: 12px;

    font-family: Arial, sans-serif;
    font-size: 14px;
    font-weight: 700;

    cursor: pointer;

    transition: 0.2s ease;
}

.logout-btn:hover {
    background: #dc3545;
    color: white;

    border-color: #dc3545;

    transform: translateY(-1px);
}


/* MOBILE */

@media(max-width: 850px) {

    .profile-topbar {
        flex-direction: column;
        align-items: flex-start;
    }

    .topbar-actions {
        margin-left: 0;
        width: 100%;
    }
}

@media(max-width: 600px) {

    .brand-area {
        width: 100%;
    }

    .brand-logo {
        width: 140px;
        height: auto;
    }

    .navbar-divider {
        display: none;
    }

    .portal-info {
        display: none;
    }

    .topbar-actions {
        width: 100%;
    }

    .workspace-btn,
    .logout-form {
        flex: 1;
    }

    .logout-btn {
        width: 100%;
    }
}

        .back-btn:hover {
            background: var(--primary);
            color: white;
        }

        .profile-grid {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 22px;
        }

        .card {
            background: rgba(255,255,255,.98);
            border: 1px solid var(--border);
            border-radius: 24px;
            padding: 28px;
            box-shadow: 0 10px 35px rgba(31,41,55,.04);
        }

        .hero-card {
            background: linear-gradient(120deg, rgba(223,250,242,.98), rgba(236,246,255,.98));
            border: 1px solid #dcefe8;
        }

        .badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: #daf8eb;
            color: #087d5a;
            padding: 7px 12px;
            border-radius: 999px;
            font-size: 12px;
            font-weight: 700;
            margin-bottom: 15px;
        }

        .badge-dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: #0fb179;
        }

        .name {
            margin: 0;
            font-size: 34px;
            letter-spacing: -.5px;
        }

        .role {
            margin-top: 8px;
            color: #5d6d82;
            font-size: 15px;
            font-weight: 600;
        }

        .intro {
            margin-top: 15px;
            color: #657387;
            font-size: 14px;
            line-height: 1.7;
            max-width: 750px;
        }

        .section-title {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 22px;
            font-weight: 800;
            margin-bottom: 20px;
        }

        .section-mark {
            width: 5px;
            height: 28px;
            border-radius: 20px;
            background: linear-gradient(to bottom, #16c991, #26a4dc);
        }

        .info-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 18px;
        }

        .info-box {
            background: #fbfcfd;
            border: 1px solid #e9eef2;
            border-radius: 18px;
            padding: 20px;
            display: flex;
            gap: 16px;
            align-items: flex-start;
        }

        .info-icon {
            min-width: 54px;
            width: 54px;
            height: 54px;
            border-radius: 14px;
            background: #e9f8f3;
            color: var(--primary);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .label {
            color: #8a96a8;
            font-size: 13px;
            margin-bottom: 7px;
            font-weight: 600;
        }

        .value {
            font-size: 17px;
            font-weight: 800;
            line-height: 1.5;
        }

        .bio-box {
            background: linear-gradient(120deg, #eefaf5, #f3f8ff);
            border-radius: 18px;
            padding: 22px;
            color: #5b6a80;
            line-height: 1.8;
            font-size: 15px;
        }

        .status-card {
            text-align: center;
        }

        .verified-icon {
            width: 110px;
            height: 110px;
            margin: 0 auto 18px;
            border-radius: 30px;
            background: linear-gradient(135deg, #dff8ef, #edf5ff);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary);
        }

        .status-card h3 {
            margin: 0 0 12px;
            font-size: 22px;
        }

        .status-card p {
            color: #7b8798;
            line-height: 1.8;
            font-size: 15px;
            margin-bottom: 20px;
        }

        .detail-list {
            margin-top: 22px;
            border-top: 1px solid #edf1f3;
        }

        .detail-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 18px 0;
            border-bottom: 1px solid #edf1f3;
        }

        .detail-name {
            color: #7b8798;
            font-size: 14px;
        }

        .detail-value {
            font-weight: 800;
            font-size: 16px;
        }

        .active {
            color: var(--primary);
        }

        @media(max-width: 950px) {
            .profile-grid {
                grid-template-columns: 1fr;
            }

            .info-grid {
                grid-template-columns: 1fr;
            }
        }

        @media(max-width: 700px) {
            .page { padding: 14px; }

            .topbar {
                flex-direction: column;
                align-items: flex-start;
                gap: 14px;
            }

            .name {
                font-size: 28px;
            }
            .back-btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 8px;

    padding: 10px 15px;

    background: #f3faf7;
    color: #0a9368;

    border: 1px solid #cae9dc;
    border-radius: 10px;

    text-decoration: none;

    font-size: 13px;
    font-weight: 700;

    transition: 0.2s ease;
}

.back-btn:hover {
    background: #0a9368;
    color: white;
    border-color: #0a9368;
}

.back-btn svg {
    flex-shrink: 0;
}
        }
    </style>
</head>
<body>

@php
    $user = Auth::user();
@endphp

<div class="page">

   <div class="profile-topbar">

    <!-- LEFT SIDE -->
    <div class="brand-area">

        <img
            src="{{ asset('images/medicare24-logo.png') }}"
            alt="MediCare24"
            class="brand-logo"
        >

        <div class="navbar-divider"></div>

        <div class="portal-info">

            <div class="topbar-title">
                Nurse Portal
            </div>

            <div class="topbar-subtitle">
                Patient Preparation & Clinical Support
            </div>

        </div>

    </div>


    <!-- RIGHT SIDE -->
    <div class="topbar-actions">

        <a
            href="{{ route('nurse.dashboard') }}"
            class="workspace-btn"
        >
            <svg
                width="18"
                height="18"
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="2"
            >
                <rect x="3" y="3" width="7" height="7"></rect>
                <rect x="14" y="3" width="7" height="7"></rect>
                <rect x="3" y="14" width="7" height="7"></rect>
                <rect x="14" y="14" width="7" height="7"></rect>
            </svg>

            Nurse Workspace
        </a>


        <form
            method="POST"
            action="{{ route('logout') }}"
            class="logout-form"
        >
            @csrf

            <button
                type="submit"
                class="logout-btn"
            >
                <svg
                    width="18"
                    height="18"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                >
                    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                    <polyline points="16 17 21 12 16 7"></polyline>
                    <line x1="21" y1="12" x2="9" y2="12"></line>
                </svg>

                Logout
            </button>

        </form>

    </div>

</div>

    <div class="profile-grid">

        <div>
            <div class="card hero-card">
                <div class="badge">
                    <span class="badge-dot"></span>
                    Active Nurse
                </div>

                <h1 class="name">{{ $user->name }}</h1>
                <div class="role">Nurse • Patient Preparation & Vital Signs</div>

                <div class="intro">
                    Responsible for patient intake, vital sign recording, and preparing
                    patients before doctor consultation. This profile summarizes the nurse’s
                    account and current portal access information.
                </div>
            </div>

            <div class="card" style="margin-top: 22px;">
                <div class="section-title">
                    <span class="section-mark"></span>
                    <span>Professional Information</span>
                </div>

                <div class="info-grid">
                    <div class="info-box">
                        <div class="info-icon">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M4 4h16v16H4z"></path>
                                <path d="M4 8h16"></path>
                            </svg>
                        </div>
                        <div>
                            <div class="label">Email Address</div>
                            <div class="value">{{ $user->email }}</div>
                        </div>
                    </div>

                    <div class="info-box">
                        <div class="info-icon">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M12 2v20"></path>
                                <path d="M5 9h14"></path>
                            </svg>
                        </div>
                        <div>
                            <div class="label">Department</div>
                            <div class="value">Patient Preparation Unit</div>
                        </div>
                    </div>

                    <div class="info-box">
                        <div class="info-icon">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <circle cx="12" cy="12" r="9"></circle>
                                <path d="M12 7v5l3 2"></path>
                            </svg>
                        </div>
                        <div>
                            <div class="label">Primary Responsibility</div>
                            <div class="value">Vitals & Pre-Consultation Checks</div>
                        </div>
                    </div>

                    <div class="info-box">
                        <div class="info-icon">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M6 3h12v18H6z"></path>
                                <path d="M9 7h6"></path>
                            </svg>
                        </div>
                        <div>
                            <div class="label">Staff ID</div>
                            <div class="value">{{ 'NUR-' . str_pad($user->id, 3, '0', STR_PAD_LEFT) }}</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card" style="margin-top: 22px;">
                <div class="section-title">
                    <span class="section-mark"></span>
                    <span>About Nurse</span>
                </div>

                <div class="bio-box">
                    Dedicated nursing staff member supporting smooth clinic operations through
                    accurate vital sign documentation, patient handling, and efficient
                    coordination before doctor consultations.
                </div>
            </div>
        </div>

        <div>
            <div class="card status-card">
                <div class="verified-icon">
                    <svg width="52" height="52" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                        <path d="M12 3l2.6 2.2 3.4.4 1.3 3.2 2.4 2.3-1.1 3.3.4 3.4-3.2 1.3-2.3 2.4-3.3-1.1-3.4.4-1.3-3.2-2.4-2.3 1.1-3.3-.4-3.4 3.2-1.3L12 3z"></path>
                        <path d="M9 12l2 2 4-4"></path>
                    </svg>
                </div>

                <h3>Verified Nurse</h3>

                <p>
                    This nursing account is active in the clinic portal and can manage
                    patient preparation and vital sign records.
                </p>

                <div class="detail-list">
                    <div class="detail-row">
                        <span class="detail-name">Account</span>
                        <span class="detail-value active">Active</span>
                    </div>

                    <div class="detail-row">
                        <span class="detail-name">Role</span>
                        <span class="detail-value">{{ ucfirst($user->role) }}</span>
                    </div>

                    <div class="detail-row">
                        <span class="detail-name">Workspace</span>
                        <span class="detail-value">Nurse Portal</span>
                    </div>

                    <div class="detail-row">
                        <span class="detail-name">Access Level</span>
                        <span class="detail-value">Clinical Support</span>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
</body>
</html>