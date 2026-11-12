<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Nurse Profile</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;

            background:
                radial-gradient(circle at top left, #dff9f1 0%, transparent 28%),
                radial-gradient(circle at top right, #eef2ff 0%, transparent 30%),
                #f5f7fa;

            color: #172033;
        }

        .page {
            max-width: 1300px;
            margin: auto;
            padding: 24px;
        }

        /* TOP BAR */

        .topbar {
            background: rgba(255, 255, 255, 0.94);
            border: 1px solid #edf1f4;
            border-radius: 18px;

            padding: 16px 22px;

            display: flex;
            align-items: center;
            justify-content: space-between;

            box-shadow: 0 8px 30px rgba(31, 41, 55, 0.04);

            margin-bottom: 22px;
        }

        .brand-title {
            font-size: 20px;
            font-weight: 700;
        }

        .brand-subtitle {
            color: #8993a4;
            font-size: 13px;
            margin-top: 4px;
        }

        .dashboard-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;

            background: #0aa273;
            color: white;

            padding: 11px 17px;

            border-radius: 11px;

            text-decoration: none;
            font-weight: 600;

            box-shadow: 0 5px 15px rgba(10, 162, 115, 0.18);
        }

        .dashboard-btn:hover {
            background: #078b63;
        }

        /* HERO */

        .profile-hero {
            position: relative;

            min-height: 240px;

            background:
                linear-gradient(
                    120deg,
                    rgba(219, 252, 240, 0.95),
                    rgba(237, 248, 255, 0.95),
                    rgba(243, 237, 255, 0.90)
                );

            border: 1px solid #e5f2ed;
            border-radius: 26px;

            padding: 38px;

            display: flex;
            align-items: center;
            justify-content: space-between;

            margin-bottom: 24px;

            overflow: hidden;
        }

        .nurse-main {
            display: flex;
            align-items: center;
            gap: 24px;
            z-index: 2;
        }

        .avatar {
            width: 115px;
            height: 115px;

            border-radius: 28px;

            display: flex;
            align-items: center;
            justify-content: center;

            background: linear-gradient(145deg, #0ba87a, #087f68);

            color: white;

            font-size: 42px;
            font-weight: 700;

            box-shadow: 0 15px 35px rgba(10, 162, 115, 0.24);

            border: 5px solid rgba(255, 255, 255, 0.8);
        }

        .online-badge {
            display: inline-flex;
            align-items: center;
            gap: 7px;

            background: #d9faec;
            color: #087a59;

            padding: 7px 12px;
            border-radius: 50px;

            font-size: 13px;
            font-weight: 600;

            margin-bottom: 12px;
        }

        .dot {
            width: 8px;
            height: 8px;

            background: #12bd82;
            border-radius: 50%;
        }

        .nurse-name {
            margin: 0;

            font-size: 34px;
            letter-spacing: -0.5px;
        }

        .nurse-role {
            margin-top: 8px;

            color: #667085;
            font-size: 17px;
        }

        .nurse-email {
            margin-top: 9px;

            color: #8a94a6;
            font-size: 14px;

            display: flex;
            align-items: center;
            gap: 7px;
        }

        /* HEARTBEAT */

        .heartbeat {
            width: 330px;
            opacity: 0.55;
        }

        .heartbeat-label {
            text-align: right;

            color: #5eae93;

            font-size: 11px;
            letter-spacing: 2px;
            font-weight: 700;

            margin-top: 7px;
        }

        /* STATS */

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);

            gap: 18px;

            margin-bottom: 24px;
        }

        .stat-card {
            background: rgba(255,255,255,0.94);

            border: 1px solid #edf0f3;
            border-radius: 18px;

            padding: 22px;

            box-shadow: 0 8px 28px rgba(31,41,55,0.035);
        }

        .stat-top {
            display: flex;
            justify-content: space-between;
            align-items: center;

            margin-bottom: 22px;
        }

        .icon-box {
            width: 52px;
            height: 52px;

            border-radius: 14px;

            display: flex;
            align-items: center;
            justify-content: center;
        }

        .green-icon {
            background: #def9ed;
            color: #07966c;
        }

        .blue-icon {
            background: #e2f4ff;
            color: #168ac4;
        }

        .purple-icon {
            background: #f0e7ff;
            color: #8147db;
        }

        .small-tag {
            padding: 6px 10px;

            border-radius: 50px;

            background: #edf9f4;
            color: #178965;

            font-size: 12px;
            font-weight: 600;
        }

        .stat-value {
            font-size: 23px;
            font-weight: 700;
        }

        .stat-label {
            color: #697586;

            margin-top: 6px;

            font-size: 14px;
        }

        /* CONTENT */

        .content-grid {
            display: grid;
            grid-template-columns: 2fr 1fr;

            gap: 20px;
        }

        .content-card {
            background: rgba(255,255,255,0.95);

            border: 1px solid #edf0f3;
            border-radius: 20px;

            padding: 28px;

            box-shadow: 0 8px 30px rgba(31,41,55,0.035);
        }

        .section-title {
            display: flex;
            align-items: center;
            gap: 10px;

            font-size: 19px;
            font-weight: 700;

            margin-bottom: 22px;
        }

        .title-mark {
            width: 5px;
            height: 25px;

            border-radius: 10px;

            background: linear-gradient(#17c995, #25a7dd);
        }

        .info-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);

            gap: 14px;
        }

        .info-item {
            border: 1px solid #edf0f3;

            border-radius: 14px;

            padding: 17px;

            display: flex;
            align-items: center;
            gap: 14px;

            background: #fbfcfd;
        }

        .info-icon {
            min-width: 42px;
            height: 42px;

            border-radius: 11px;

            background: #eaf8f3;
            color: #0a9c71;

            display: flex;
            align-items: center;
            justify-content: center;
        }

        .info-label {
            color: #8b95a5;

            font-size: 12px;

            margin-bottom: 5px;
        }

        .info-value {
            font-size: 14px;
            font-weight: 600;

            word-break: break-word;
        }

        /* STATUS */

        .profile-status {
            text-align: center;
        }

        .large-icon {
            width: 80px;
            height: 80px;

            margin: 5px auto 18px;

            border-radius: 22px;

            background: linear-gradient(145deg, #dff8ef, #e7f5ff);

            display: flex;
            justify-content: center;
            align-items: center;

            color: #099a70;
        }

        .verified-title {
            font-size: 20px;
            font-weight: 700;
        }

        .verified-text {
            color: #8993a4;

            font-size: 13px;

            margin: 8px 0 22px;

            line-height: 1.6;
        }

        .status-row {
            display: flex;
            justify-content: space-between;

            padding: 14px 0;

            border-top: 1px solid #edf0f3;

            font-size: 14px;
        }

        .status-name {
            color: #7b8798;
        }

        .active-text {
            color: #079c6e;
            font-weight: 600;
        }

        @media(max-width: 900px) {

            .stats-grid {
                grid-template-columns: 1fr;
            }

            .content-grid {
                grid-template-columns: 1fr;
            }

            .heartbeat-area {
                display: none;
            }
        }

        @media(max-width: 650px) {

            .page {
                padding: 14px;
            }

            .profile-hero {
                padding: 25px;
            }

            .nurse-main {
                flex-direction: column;
                text-align: center;
            }

            .nurse-email {
                justify-content: center;
            }

            .info-grid {
                grid-template-columns: 1fr;
            }

            .topbar {
                flex-direction: column;
                align-items: flex-start;

                gap: 14px;
            }
        }
    </style>

</head>

<body>

<div class="page">

    <!-- TOP BAR -->

    <div class="topbar">

        <div>

            <div class="brand-title">
                Nurse Portal
            </div>

            <div class="brand-subtitle">
                Clinical profile & patient care
            </div>

        </div>


        <a
            href="{{ route('nurse.dashboard') }}"
            class="dashboard-btn"
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

            Dashboard

        </a>

    </div>


    <!-- HERO -->

    <div class="profile-hero">

        <div class="nurse-main">

            <div class="avatar">

                {{ strtoupper(substr($nurse->name, 0, 1)) }}

            </div>


            <div>

                <div class="online-badge">

                    <span class="dot"></span>

                    Active Nurse

                </div>


                <h1 class="nurse-name">

                    {{ $nurse->name }}

                </h1>


                <div class="nurse-role">

                    Registered Nursing Staff

                </div>


                <div class="nurse-email">

                    <svg
                        width="16"
                        height="16"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                    >

                        <rect x="3" y="5" width="18" height="14" rx="2"></rect>
                        <path d="M3 7l9 6 9-6"></path>

                    </svg>

                    {{ $nurse->email }}

                </div>

            </div>

        </div>


        <!-- Heartbeat -->

        <div class="heartbeat-area">

            <svg
                class="heartbeat"
                viewBox="0 0 400 100"
                fill="none"
            >

                <path
                    d="
                    M0 55
                    H50
                    L62 52
                    L70 55
                    L78 18
                    L86 88
                    L94 55
                    H145
                    L157 52
                    L165 55
                    L173 22
                    L181 84
                    L189 55
                    H240
                    L250 52
                    L258 55
                    L266 20
                    L274 86
                    L282 55
                    H335
                    L345 52
                    L353 55
                    L361 25
                    L369 82
                    L377 55
                    H400
                    "
                    stroke="#37bb93"
                    stroke-width="3"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                />

            </svg>

            <div class="heartbeat-label">
                PATIENT CARE MONITOR
            </div>

        </div>

    </div>


    <!-- STAT CARDS -->

    <div class="stats-grid">


        <div class="stat-card">

            <div class="stat-top">

                <div class="icon-box green-icon">

                    <svg
                        width="25"
                        height="25"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                    >

                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                        <circle cx="12" cy="7" r="4"></circle>

                    </svg>

                </div>

                <span class="small-tag">
                    Active
                </span>

            </div>


            <div class="stat-value">
                Nurse
            </div>

            <div class="stat-label">
                Staff Role
            </div>

        </div>



        <div class="stat-card">

            <div class="stat-top">

                <div class="icon-box blue-icon">

                    <svg
                        width="25"
                        height="25"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                    >

                        <path d="M12 2v20"></path>
                        <path d="M2 12h20"></path>

                    </svg>

                </div>

                <span class="small-tag">
                    Care
                </span>

            </div>


            <div class="stat-value">
                Vital Signs
            </div>

            <div class="stat-label">
                Patient Assessment
            </div>

        </div>



        <div class="stat-card">

            <div class="stat-top">

                <div class="icon-box purple-icon">

                    <svg
                        width="25"
                        height="25"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                    >

                        <path d="M9 12l2 2 4-4"></path>
                        <circle cx="12" cy="12" r="9"></circle>

                    </svg>

                </div>

                <span class="small-tag">
                    Verified
                </span>

            </div>


            <div class="stat-value">
                Active
            </div>

            <div class="stat-label">
                Account Status
            </div>

        </div>

    </div>


    <!-- CONTENT -->

    <div class="content-grid">


        <!-- PROFILE INFO -->

        <div class="content-card">

            <div class="section-title">

                <span class="title-mark"></span>

                Nurse Information

            </div>


            <div class="info-grid">


                <div class="info-item">

                    <div class="info-icon">

                        <svg
                            width="20"
                            height="20"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                        >

                            <path d="M20 21a8 8 0 0 0-16 0"></path>
                            <circle cx="12" cy="7" r="4"></circle>

                        </svg>

                    </div>


                    <div>

                        <div class="info-label">
                            Full Name
                        </div>

                        <div class="info-value">
                            {{ $nurse->name }}
                        </div>

                    </div>

                </div>



                <div class="info-item">

                    <div class="info-icon">

                        <svg
                            width="20"
                            height="20"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                        >

                            <rect x="3" y="5" width="18" height="14" rx="2"></rect>
                            <path d="M3 7l9 6 9-6"></path>

                        </svg>

                    </div>


                    <div>

                        <div class="info-label">
                            Email Address
                        </div>

                        <div class="info-value">
                            {{ $nurse->email }}
                        </div>

                    </div>

                </div>



                <div class="info-item">

                    <div class="info-icon">

                        <svg
                            width="20"
                            height="20"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                        >

                            <path d="M12 2v20"></path>
                            <path d="M5 9h14"></path>

                        </svg>

                    </div>


                    <div>

                        <div class="info-label">
                            System Role
                        </div>

                        <div class="info-value">
                            {{ ucfirst($nurse->role) }}
                        </div>

                    </div>

                </div>



                <div class="info-item">

                    <div class="info-icon">

                        <svg
                            width="20"
                            height="20"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                        >

                            <rect x="3" y="4" width="18" height="17" rx="2"></rect>
                            <path d="M8 2v4"></path>
                            <path d="M16 2v4"></path>
                            <path d="M3 9h18"></path>

                        </svg>

                    </div>


                    <div>

                        <div class="info-label">
                            Joined System
                        </div>

                        <div class="info-value">

                            {{ $nurse->created_at
                                ? $nurse->created_at->format('M d, Y')
                                : 'Not available'
                            }}

                        </div>

                    </div>

                </div>

            </div>

        </div>


        <!-- STATUS CARD -->

        <div class="content-card profile-status">


            <div class="large-icon">

                <svg
                    width="42"
                    height="42"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                >

                    <path d="M9 12l2 2 4-4"></path>
                    <circle cx="12" cy="12" r="9"></circle>

                </svg>

            </div>


            <div class="verified-title">
                Nursing Staff
            </div>


            <div class="verified-text">
                Authorized nursing staff member responsible for recording patient vital signs before doctor consultation.
            </div>


            <div class="status-row">

                <span class="status-name">
                    Account
                </span>

                <span class="active-text">
                    Active
                </span>

            </div>


            <div class="status-row">

                <span class="status-name">
                    Role
                </span>

                <strong>
                    Nurse
                </strong>

            </div>


            <div class="status-row">

                <span class="status-name">
                    Patient Care
                </span>

                <strong>
                    Enabled
                </strong>

            </div>


            <div class="status-row">

                <span class="status-name">
                    Vital Signs
                </span>

                <strong>
                    Authorized
                </strong>

            </div>

        </div>

    </div>

</div>

</body>

</html>