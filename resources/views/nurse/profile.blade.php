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

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: rgba(255,255,255,.95);
            border: 1px solid var(--border);
            border-radius: 18px;
            padding: 18px 22px;
            margin-bottom: 22px;
        }

        .title {
            font-size: 22px;
            font-weight: 800;
        }

        .subtitle {
            margin-top: 4px;
            color: var(--muted);
            font-size: 13px;
        }

        .back-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 11px 16px;
            border-radius: 12px;
            border: 1px solid #ccebdd;
            background: #effaf5;
            color: var(--primary);
            font-weight: 700;
            text-decoration: none;
            transition: .2s ease;
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
        }
    </style>
</head>
<body>

@php
    $user = Auth::user();
@endphp

<div class="page">

    <div class="topbar">
        <div>
            <div class="title">Nurse Profile</div>
            <div class="subtitle">Professional details and account information</div>
        </div>

        <a href="{{ route('nurse.dashboard') }}" class="back-btn">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M19 12H5"></path>
                <path d="M12 19l-7-7 7-7"></path>
            </svg>
            Back to Dashboard
        </a>
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