<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Nurse Dashboard</title>

    <style>
        * {
            box-sizing: border-box;
        }

        :root {
            --primary: #0a9368;
            --primary-dark: #087553;
            --primary-soft: #e7f8f2;

            --blue: #2589c8;
            --blue-soft: #e9f5fd;

            --orange: #e88714;
            --orange-soft: #fff3e1;

            --purple: #7655d9;
            --purple-soft: #f1edff;

            --red: #dc3545;

            --text: #182236;
            --muted: #758197;
            --border: #e7edf1;
            --surface: #ffffff;
            --background: #f5f7fa;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            color: var(--text);

            background:
                radial-gradient(circle at top left, #ddfaf1 0%, transparent 25%),
                radial-gradient(circle at top right, #edf3ff 0%, transparent 28%),
                var(--background);
        }

        a {
            text-decoration: none;
        }

        .page {
            max-width: 1450px;
            margin: 0 auto;
            padding: 28px;
        }

        /* TOP BAR */

        .topbar {
            background: rgba(255,255,255,0.95);

            border: 1px solid var(--border);
            border-radius: 18px;

            padding: 17px 22px;

            display: flex;
            align-items: center;
            justify-content: space-between;

            margin-bottom: 22px;

            box-shadow: 0 8px 30px rgba(31,41,55,0.04);
        }

        .brand-title {
            font-size: 20px;
            font-weight: 800;
        }

        .brand-subtitle {
            margin-top: 4px;

            color: var(--muted);
            font-size: 13px;
        }

        .profile-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;

            padding: 11px 17px;

            border-radius: 11px;

            border: 1px solid #c9e9dc;

            background: #effaf6;
            color: var(--primary);

            font-weight: 700;

            transition: 0.2s ease;
        }

        .profile-btn:hover {
            background: var(--primary);
            color: white;
        }

        .main-navbar {
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

.navbar-brand {
    display: flex;
    align-items: center;
    gap: 20px;
}

.navbar-logo {
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

.navbar-portal {
    display: flex;
    flex-direction: column;
    justify-content: center;
}

.navbar-title {
    font-size: 20px;
    font-weight: 800;

    color: #182236;
}

.navbar-subtitle {
    margin-top: 5px;

    color: #8a95a6;

    font-size: 13px;
}


/* RIGHT SIDE */

.navbar-actions {
    display: flex;
    align-items: center;

    margin-left: auto;
}

.profile-nav-btn {
    height: 48px;

    display: inline-flex;
    align-items: center;
    justify-content: center;

    gap: 9px;

    padding: 0 19px;

    background: #effaf6;
    color: #0a9368;

    border: 1px solid #c8e9dc;
    border-radius: 12px;

    text-decoration: none;

    font-size: 14px;
    font-weight: 700;

    transition: 0.2s ease;
}

.profile-nav-btn:hover {
    background: #0a9368;
    color: white;

    border-color: #0a9368;

    transform: translateY(-1px);

    box-shadow:
        0 6px 16px rgba(10, 147, 104, 0.16);
}


/* MOBILE */

@media(max-width: 750px) {

    .main-navbar {
        flex-direction: column;
        align-items: flex-start;
    }

    .navbar-logo {
        width: 145px;
        height: auto;
    }

    .navbar-divider {
        display: none;
    }

    .navbar-portal {
        display: none;
    }

    .navbar-actions {
        width: 100%;
        margin-left: 0;
    }

    .profile-nav-btn {
        width: 100%;
    }
}

        /* HERO */

        .nurse-header {
            background:
                linear-gradient(
                    120deg,
                    rgba(220,250,240,0.96),
                    rgba(235,247,255,0.96),
                    rgba(244,241,255,0.93)
                );

            border: 1px solid #dcefe8;
            border-radius: 24px;

            padding: 30px 34px;

            display: flex;
            align-items: center;
            justify-content: space-between;

            margin-bottom: 22px;

            overflow: hidden;
        }

        .walkin-btn {
    display: flex;
    align-items: center;

    gap: 14px;

    width: 100%;
    max-width: 430px;

    padding: 16px 18px;

    margin: 0 0 22px;

    background: linear-gradient(
        135deg,
        #0a9368,
        #0bb783
    );

    color: white;

    border-radius: 16px;

    text-decoration: none;

    box-shadow:
        0 10px 25px rgba(10, 147, 104, 0.20);

    transition: 0.2s ease;
}

.walkin-btn:hover {
    transform: translateY(-2px);

    box-shadow:
        0 14px 30px rgba(10, 147, 104, 0.28);

    background: linear-gradient(
        135deg,
        #087553,
        #0aa676
    );
}

.walkin-icon {
    min-width: 48px;
    width: 48px;
    height: 48px;

    display: flex;
    align-items: center;
    justify-content: center;

    background: rgba(255,255,255,0.18);

    border-radius: 13px;
}

.walkin-text {
    display: flex;
    flex-direction: column;

    flex: 1;
}

.walkin-title {
    font-size: 16px;
    font-weight: 800;

    margin-bottom: 4px;
}

.walkin-subtitle {
    font-size: 11px;

    color: rgba(255,255,255,0.82);

    line-height: 1.4;
}

.walkin-arrow {
    flex-shrink: 0;
    opacity: 0.9;
}

        .nurse-badge {
            display: inline-flex;
            align-items: center;
            gap: 7px;

            background: #d9f8eb;
            color: #087a59;

            padding: 7px 12px;

            border-radius: 100px;

            font-size: 12px;
            font-weight: 700;

            margin-bottom: 14px;
        }

        .nurse-dot {
            width: 8px;
            height: 8px;

            border-radius: 50%;

            background: #11b67d;
        }

        .greeting {
            color: #738095;

            font-size: 14px;
            font-weight: 600;

            margin-bottom: 5px;
        }

        .nurse-header h1 {
            margin: 0;

            font-size: 32px;

            letter-spacing: -0.5px;
        }

        .nurse-description {
            margin-top: 10px;

            color: #637186;

            font-size: 14px;

            line-height: 1.6;
        }

        .nurse-meta {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;

            margin-top: 14px;
        }

        .meta-chip {
            display: inline-flex;
            align-items: center;
            gap: 7px;

            background: rgba(255,255,255,0.8);

            border: 1px solid #dce9e4;
            border-radius: 9px;

            padding: 7px 10px;

            color: #5f6c7d;

            font-size: 12px;
            font-weight: 600;
        }

        .monitor-area {
            min-width: 320px;
        }

        .heartbeat {
            width: 320px;
            opacity: 0.55;
        }

        .monitor-label {
            text-align: right;

            color: #54a78c;

            font-size: 10px;
            font-weight: 800;

            letter-spacing: 2px;
        }

        /* STATS */

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);

            gap: 16px;

            margin-bottom: 22px;
        }

        .stat-card {
            background: white;

            border: 1px solid var(--border);
            border-radius: 18px;

            padding: 20px;

            box-shadow: 0 8px 25px rgba(31,41,55,0.035);
        }

        .stat-top {
            display: flex;
            justify-content: space-between;
            align-items: center;

            margin-bottom: 18px;
        }

        .stat-icon {
            width: 48px;
            height: 48px;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 13px;
        }

        .stat-icon.blue {
            background: var(--blue-soft);
            color: var(--blue);
        }

        .stat-icon.orange {
            background: var(--orange-soft);
            color: var(--orange);
        }

        .stat-icon.green {
            background: var(--primary-soft);
            color: var(--primary);
        }

        .stat-icon.purple {
            background: var(--purple-soft);
            color: var(--purple);
        }

        .stat-tag {
            padding: 5px 9px;

            background: #f1f6f4;
            color: #608073;

            border-radius: 100px;

            font-size: 11px;
            font-weight: 700;
        }

        .stat-number {
            font-size: 29px;
            font-weight: 800;
        }

        .stat-label {
            margin-top: 5px;

            color: var(--muted);

            font-size: 13px;
        }

        /* SUCCESS */

        .success-message {
            background: #def8ea;
            color: #086b4b;

            border: 1px solid #c3ead7;
            border-radius: 12px;

            padding: 14px 17px;

            margin-bottom: 20px;

            font-weight: 600;
        }

        /* SECTION */

        .section-card {
            background: rgba(255,255,255,0.97);

            border: 1px solid var(--border);
            border-radius: 20px;

            padding: 25px;

            margin-bottom: 22px;

            box-shadow: 0 8px 30px rgba(31,41,55,0.035);
        }

        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;

            margin-bottom: 22px;
        }

        .section-heading {
            display: flex;
            align-items: flex-start;
            gap: 11px;
        }

        .section-mark {
            width: 5px;
            height: 29px;

            border-radius: 20px;

            background:
                linear-gradient(
                    to bottom,
                    #17c991,
                    #26a4dc
                );
        }

        .section-title {
            font-size: 20px;
            font-weight: 800;
        }

        .section-description {
            color: var(--muted);

            font-size: 12px;

            margin-top: 4px;
        }

        .date-chip {
            padding: 7px 11px;

            background: var(--primary-soft);
            color: var(--primary);

            border-radius: 8px;

            font-size: 12px;
            font-weight: 700;
        }

        /* PATIENT CARDS */

        .patient-list {
            display: flex;
            flex-direction: column;

            gap: 12px;
        }

        .patient-card {
            display: grid;

            grid-template-columns:
                70px
                minmax(160px, 1.1fr)
                minmax(180px, 1.4fr)
                minmax(230px, 1.4fr)
                125px
                minmax(170px, auto);

            align-items: center;

            gap: 15px;

            padding: 17px 18px;

            background: white;

            border: 1px solid #e8edef;
            border-radius: 14px;

            transition: 0.2s ease;
        }

        .patient-card:hover {
            border-color: #cae9df;

            transform: translateY(-1px);

            box-shadow: 0 8px 24px rgba(31,41,55,0.045);
        }

        .token {
            width: 45px;
            height: 38px;

            display: flex;
            align-items: center;
            justify-content: center;

            background: #eaf8f3;
            color: #087e5d;

            border-radius: 9px;

            font-weight: 800;
        }

        .patient-name {
            font-size: 15px;
            font-weight: 800;

            margin-bottom: 4px;
        }

        .patient-sub {
            color: #8a95a6;

            font-size: 11px;
        }

        .small-label {
            color: #929cac;

            font-size: 10px;
            font-weight: 700;

            text-transform: uppercase;

            letter-spacing: .6px;

            margin-bottom: 5px;
        }

        .reason {
            color: #364153;

            font-size: 14px;
        }

        /* VITALS */

        .quick-vitals {
            display: flex;
            flex-wrap: wrap;

            gap: 6px;
        }

        .vital-chip {
            display: inline-flex;
            align-items: center;
            gap: 5px;

            padding: 6px 8px;

            background: #f6faf9;

            border: 1px solid #e5eeee;
            border-radius: 7px;

            color: #596779;

            font-size: 11px;
            font-weight: 600;
        }

        .no-vitals {
            color: #9aa4b2;

            font-size: 12px;
        }

        /* STATUS */

        .status {
            display: inline-flex;
            align-items: center;
            gap: 6px;

            width: fit-content;

            padding: 7px 10px;

            border-radius: 100px;

            font-size: 12px;
            font-weight: 700;
        }

        .status::before {
            content: "";

            width: 7px;
            height: 7px;

            border-radius: 50%;
        }

        .confirmed {
            background: #eaf2ff;
            color: #246cd3;
        }

        .confirmed::before {
            background: #2f75db;
        }

        .waiting {
            background: #fff1dd;
            color: #d77708;
        }

        .waiting::before {
            background: #f39a25;
        }

        .completed {
            background: #e1f7ec;
            color: #10815a;
        }

        .completed::before {
            background: #11a36d;
        }

        .pending {
            background: #f0f2f5;
            color: #70798a;
        }

        .pending::before {
            background: #7f8795;
        }

        .cancelled {
            background: #ffe9eb;
            color: #ca3443;
        }

        .cancelled::before {
            background: #dd3e4d;
        }

        /* ACTIONS */

        .action-area {
            display: flex;
            align-items: center;
            justify-content: flex-end;

            gap: 7px;
        }

        .primary-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 7px;

            background: var(--primary);
            color: white;

            padding: 10px 13px;

            border-radius: 8px;

            font-size: 12px;
            font-weight: 700;

            white-space: nowrap;

            transition: 0.2s ease;
        }

        .primary-btn:hover {
            background: var(--primary-dark);
        }

        .summary-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 7px;

            background: #eef6ff;
            color: var(--blue);

            border: 1px solid #d5e7fb;

            padding: 9px 12px;

            border-radius: 8px;

            font-size: 12px;
            font-weight: 700;

            white-space: nowrap;
        }

        .summary-btn:hover {
            background: var(--blue);
            color: white;
        }

        .action-area form {
            margin: 0;
        }

        .delete-btn {
            width: 37px;
            height: 37px;

            display: inline-flex;
            align-items: center;
            justify-content: center;

            background: white;
            color: var(--red);

            border: 1px solid #ed5d69;
            border-radius: 8px;

            cursor: pointer;

            transition: .2s;
        }

        .delete-btn:hover {
            background: var(--red);
            color: white;
        }

        .completed-label {
            padding: 8px 10px;

            background: #f1f6f4;
            color: #678073;

            border-radius: 8px;

            font-size: 11px;
            font-weight: 700;
        }

        /* UPCOMING */

        .date-group {
            margin-top: 15px;
        }

        .date-group:first-child {
            margin-top: 0;
        }

        .date-divider {
            display: flex;
            align-items: center;
            justify-content: space-between;

            padding: 11px 14px;

            background:
                linear-gradient(
                    90deg,
                    #e8f9f3,
                    #edf6ff
                );

            border: 1px solid #dceee8;
            border-radius: 9px;

            margin-bottom: 10px;
        }

        .date-main {
            display: flex;
            align-items: center;
            gap: 8px;

            font-weight: 800;
            font-size: 13px;
        }

        .date-day {
            color: var(--primary);
        }

        .patient-count {
            color: #788397;

            font-size: 11px;
            font-weight: 700;
        }

        .upcoming-row {
            display: grid;

            grid-template-columns:
                80px
                1fr
                1.4fr
                130px;

            align-items: center;

            gap: 16px;

            padding: 14px 15px;

            border-bottom: 1px solid #eef1f3;
        }

        .upcoming-row:last-child {
            border-bottom: none;
        }

        .upcoming-patient {
            font-weight: 700;
        }

        .upcoming-reason {
            color: #667386;

            font-size: 13px;
        }

        .empty {
            text-align: center;

            padding: 35px 20px;

            color: #8a94a4;

            background: #fafcfc;

            border: 1px dashed #dce3e5;
            border-radius: 12px;
        }

        /* RESPONSIVE */

        @media(max-width: 1150px) {

            .patient-card {
                grid-template-columns:
                    60px
                    1fr
                    1.3fr
                    1fr;
            }

            .patient-vitals {
                grid-column: 2 / 4;
            }

            .action-area {
                grid-column: 4;
            }

        }

        @media(max-width: 950px) {

            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .monitor-area {
                display: none;
            }

        }

        @media(max-width: 700px) {

            .page {
                padding: 14px;
            }

            .topbar {
                flex-direction: column;
                align-items: flex-start;

                gap: 14px;
            }

            .nurse-header {
                padding: 24px;
            }

            .nurse-header h1 {
                font-size: 26px;
            }

            .stats-grid {
                grid-template-columns: 1fr;
            }

            .section-card {
                padding: 18px;
            }

            .patient-card {
                display: flex;
                flex-direction: column;
                align-items: flex-start;
            }

            .action-area {
                width: 100%;

                justify-content: flex-start;
            }

            .upcoming-row {
                grid-template-columns: 60px 1fr;
            }

            .upcoming-reason,
            .upcoming-status {
                grid-column: 2;
            }

            

        }
    </style>

</head>

<body>

@php

    $todayDate = now()->toDateString();

    $todaysAppointments = $appointments->filter(function ($appointment) use ($todayDate) {
        return \Carbon\Carbon::parse($appointment->appointment_date)
            ->toDateString() === $todayDate;
    });

    $upcomingAppointments = $appointments->filter(function ($appointment) use ($todayDate) {
        return \Carbon\Carbon::parse($appointment->appointment_date)
            ->toDateString() > $todayDate;
    });

    $needVitals = $todaysAppointments
        ->where('status', 'confirmed')
        ->count();

    $readyForDoctor = $todaysAppointments
        ->where('status', 'waiting')
        ->count();

    $completedToday = $todaysAppointments
        ->where('status', 'completed')
        ->count();

    $upcomingGrouped = $upcomingAppointments->groupBy(function ($appointment) {
        return \Carbon\Carbon::parse($appointment->appointment_date)
            ->format('Y-m-d');
    });

    $hour = now()->hour;

    if ($hour < 12) {
        $greeting = 'Good morning';
    } elseif ($hour < 17) {
        $greeting = 'Good afternoon';
    } else {
        $greeting = 'Good evening';
    }

@endphp


<div class="page">


    <!-- TOP BAR -->

   <div class="main-navbar">

    <!-- LEFT SIDE -->
    <div class="navbar-brand">

        <img
            src="{{ asset('images/medicare24-logo.png') }}"
            alt="MediCare24"
            class="navbar-logo"
        >

        <div class="navbar-divider"></div>

        <div class="navbar-portal">

            <div class="navbar-title">
                Nurse Portal
            </div>

            <div class="navbar-subtitle">
                Patient Preparation & Clinical Support
            </div>

        </div>

    </div>


    <!-- RIGHT SIDE -->
    <div class="navbar-actions">

        <a
            href="{{ route('nurse.profile') }}"
            class="profile-nav-btn"
        >
            <svg
                width="18"
                height="18"
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="2"
            >
                <path d="M20 21a8 8 0 0 0-16 0"></path>
                <circle cx="12" cy="7" r="4"></circle>
            </svg>

            My Profile
        </a>

    </div>

</div>

    <div style="display:flex; gap:10px;">

    <a
    href="{{ route('nurse.walkins.create') }}"
    class="walkin-btn"
>
    <div class="walkin-icon">

        <svg
            width="24"
            height="24"
            viewBox="0 0 24 24"
            fill="none"
            stroke="currentColor"
            stroke-width="2"
        >
            <path d="M12 5v14"></path>
            <path d="M5 12h14"></path>
        </svg>

    </div>

    <div class="walkin-text">

        <span class="walkin-title">
            Add Walk-in Patient
        </span>

        <span class="walkin-subtitle">
            Register a patient without a prior appointment
        </span>

    </div>

    <svg
        class="walkin-arrow"
        width="20"
        height="20"
        viewBox="0 0 24 24"
        fill="none"
        stroke="currentColor"
        stroke-width="2"
    >
        <path d="M5 12h14"></path>
        <path d="M13 6l6 6-6 6"></path>
    </svg>

</a>

  

</div>


    <!-- NURSE HEADER -->

    <div class="nurse-header">

        <div>

            <div class="nurse-badge">

                <span class="nurse-dot"></span>

                Nurse Active

            </div>


            <div class="greeting">
                {{ $greeting }},
            </div>


            <h1>
                {{ Auth::user()->name }}
            </h1>


            <div class="nurse-description">
                Prepare patients for consultation by recording and reviewing vital signs.
            </div>


            <div class="nurse-meta">

                <span class="meta-chip">

                    <svg
                        width="15"
                        height="15"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                    >
                        <path d="M12 2v20"></path>
                        <path d="M5 9h14"></path>
                    </svg>

                    Patient Preparation

                </span>


                <span class="meta-chip">

                    <svg
                        width="15"
                        height="15"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                    >
                        <circle cx="12" cy="12" r="9"></circle>
                        <path d="M8 12h8"></path>
                    </svg>

                    Vital Signs

                </span>

            </div>

        </div>


        <div class="monitor-area">

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
                    stroke="#32b88f"
                    stroke-width="3"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                />
            </svg>

            <div class="monitor-label">
                PATIENT PREPARATION
            </div>

        </div>

    </div>


    <!-- STAT CARDS -->

    <div class="stats-grid">


        <div class="stat-card">

            <div class="stat-top">

                <div class="stat-icon blue">

                    <svg
                        width="23"
                        height="23"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                    >
                        <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path>
                        <circle cx="9" cy="7" r="4"></circle>
                    </svg>

                </div>

                <span class="stat-tag">
                    Today
                </span>

            </div>

            <div class="stat-number">
                {{ $todaysAppointments->count() }}
            </div>

            <div class="stat-label">
                Today's Patients
            </div>

        </div>


        <div class="stat-card">

            <div class="stat-top">

                <div class="stat-icon orange">

                    <svg
                        width="23"
                        height="23"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                    >
                        <circle cx="12" cy="12" r="9"></circle>
                        <path d="M12 7v5"></path>
                        <path d="M12 16h.01"></path>
                    </svg>

                </div>

                <span class="stat-tag">
                    Action
                </span>

            </div>

            <div class="stat-number">
                {{ $needVitals }}
            </div>

            <div class="stat-label">
                Need Vital Signs
            </div>

        </div>


        <div class="stat-card">

            <div class="stat-top">

                <div class="stat-icon green">

                    <svg
                        width="23"
                        height="23"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                    >
                        <circle cx="12" cy="12" r="9"></circle>
                        <path d="M8 12l3 3 5-6"></path>
                    </svg>

                </div>

                <span class="stat-tag">
                    Ready
                </span>

            </div>

            <div class="stat-number">
                {{ $readyForDoctor }}
            </div>

            <div class="stat-label">
                Ready for Doctor
            </div>

        </div>


        <div class="stat-card">

            <div class="stat-top">

                <div class="stat-icon purple">

                    <svg
                        width="23"
                        height="23"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                    >
                        <path d="M9 12l2 2 4-4"></path>
                        <circle cx="12" cy="12" r="9"></circle>
                    </svg>

                </div>

                <span class="stat-tag">
                    Done
                </span>

            </div>

            <div class="stat-number">
                {{ $completedToday }}
            </div>

            <div class="stat-label">
                Completed Today
            </div>

        </div>

    </div>


    @if(session('success'))

        <div class="success-message">
            ✓ {{ session('success') }}
        </div>

    @endif


    <!-- TODAY -->

    <div class="section-card">

        <div class="section-header">

            <div class="section-heading">

                <span class="section-mark"></span>

                <div>

                    <div class="section-title">
                        Today's Patients
                    </div>

                    <div class="section-description">
                        Record vital signs before sending patients to the doctor
                    </div>

                </div>

            </div>


            <div class="date-chip">
                {{ now()->format('d M Y') }}
            </div>

        </div>


        @if($todaysAppointments->count())


            <div class="patient-list">


                @foreach($todaysAppointments as $appointment)

                    <div class="patient-card">


                        <!-- TOKEN -->

                        <div>

                            <div class="token">
                                #{{ $appointment->token_number }}
                            </div>

                        </div>


                        <!-- PATIENT -->

                       <div>

    <div class="patient-name">
        {{ $appointment->patient?->name ?? 'Unknown Patient' }}
    </div>

    @if($appointment->is_walk_in)

        <span style="
            display:inline-block;
            margin-top:5px;
            padding:4px 7px;
            background:#fff3df;
            color:#d97808;
            border-radius:20px;
            font-size:10px;
            font-weight:700;
        ">
            WALK-IN
        </span>

    @else

        <div class="patient-sub">
            Patient
        </div>

    @endif

</div>


                        <!-- REASON -->

                        <div>

                            <div class="small-label">
                                Reason for Visit
                            </div>

                            <div class="reason">
                                {{ $appointment->reason_for_visit }}
                            </div>

                        </div>


                        <!-- VITALS -->

                        <div class="patient-vitals">

                            <div class="small-label">
                                Vital Signs
                            </div>


                            @if($appointment->vitalSign)

                                <div class="quick-vitals">

                                    <span class="vital-chip">
                                        🌡
                                        {{ $appointment->vitalSign->temperature }}°C
                                    </span>


                                    <span class="vital-chip">

                                        BP

                                        {{ $appointment->vitalSign->systolic_bp }}
                                        /
                                        {{ $appointment->vitalSign->diastolic_bp }}

                                    </span>


                                    <span class="vital-chip">

                                        ♥
                                        {{ $appointment->vitalSign->pulse }} bpm

                                    </span>

                                </div>

                            @else

                                <span class="no-vitals">
                                    Not recorded yet
                                </span>

                            @endif

                        </div>


                        <!-- STATUS -->

                        <div>

                            <span class="status {{ strtolower($appointment->status) }}">

                                {{ ucfirst($appointment->status) }}

                            </span>

                        </div>


                        <!-- ACTION -->

                        <div class="action-area">


                            @if(
                                strtolower($appointment->status) === 'confirmed'
                            )

                                <a
                                    href="{{ route(
                                        'nurse.vitals.create',
                                        $appointment->id
                                    ) }}"
                                    class="primary-btn"
                                >

                                    Add Vital Signs
                                    →

                                </a>


                            @elseif(
                                strtolower($appointment->status) === 'waiting'
                                && $appointment->vitalSign
                            )

                                <a
                                    href="{{ route(
                                        'nurse.vitals.summary',
                                        $appointment->id
                                    ) }}"
                                    class="summary-btn"
                                >

                                    View Summary

                                </a>


                                <form
                                    method="POST"
                                    action="{{ route(
                                        'nurse.vitals.destroy',
                                        $appointment->id
                                    ) }}"
                                    onsubmit="return confirm(
                                        'Are you sure you want to delete these vital signs?'
                                    );"
                                >

                                    @csrf
                                    @method('DELETE')


                                    <button
                                        type="submit"
                                        class="delete-btn"
                                        title="Delete Vital Signs"
                                    >

                                        <svg
                                            width="17"
                                            height="17"
                                            viewBox="0 0 24 24"
                                            fill="none"
                                            stroke="currentColor"
                                            stroke-width="2"
                                        >
                                            <polyline points="3 6 5 6 21 6"></polyline>
                                            <path d="M19 6l-1 14H6L5 6"></path>
                                            <path d="M10 11v6"></path>
                                            <path d="M14 11v6"></path>
                                            <path d="M9 6V4h6v2"></path>
                                        </svg>

                                    </button>

                                </form>


                            @elseif(
                                strtolower($appointment->status) === 'waiting'
                                && !$appointment->vitalSign
                            )

                                <a
                                    href="{{ route(
                                        'nurse.vitals.create',
                                        $appointment->id
                                    ) }}"
                                    class="primary-btn"
                                >

                                    Add Vital Signs

                                </a>


                            @elseif(
                                strtolower($appointment->status) === 'completed'
                                && $appointment->vitalSign
                            )

                                <a
                                    href="{{ route(
                                        'nurse.vitals.summary',
                                        $appointment->id
                                    ) }}"
                                    class="summary-btn"
                                >

                                    View Summary

                                </a>


                            @elseif(
                                strtolower($appointment->status) === 'completed'
                            )

                                <span class="completed-label">
                                    Completed
                                </span>


                            @else

                                <span class="completed-label">

                                    {{ ucfirst($appointment->status) }}

                                </span>

                            @endif

                        </div>

                    </div>

                @endforeach

            </div>


        @else

            <div class="empty">
                No patients are scheduled for today.
            </div>

        @endif

    </div>


    <!-- UPCOMING -->

    <div class="section-card">

        <div class="section-header">

            <div class="section-heading">

                <span class="section-mark"></span>

                <div>

                    <div class="section-title">
                        Upcoming Appointments
                    </div>

                    <div class="section-description">
                        Patients scheduled for future clinic dates
                    </div>

                </div>

            </div>

        </div>


        @forelse($upcomingGrouped as $date => $dayAppointments)


            @php

                $appointmentDate =
                    \Carbon\Carbon::parse($date);

            @endphp


            <div class="date-group">


                <div class="date-divider">

                    <div class="date-main">

                        <span class="date-day">

                            {{ $appointmentDate->format('D') }}

                        </span>

                        <span>

                            {{ $appointmentDate->format('d M Y') }}

                        </span>

                    </div>


                    <span class="patient-count">

                        {{ $dayAppointments->count() }}

                        {{ $dayAppointments->count() === 1
                            ? 'Patient'
                            : 'Patients'
                        }}

                    </span>

                </div>


                @foreach($dayAppointments as $appointment)

                    <div class="upcoming-row">


                        <div>

                            <span class="token">
                                #{{ $appointment->token_number }}
                            </span>

                        </div>


                        <div class="upcoming-patient">

                            {{ $appointment->patient?->name ?? 'Unknown Patient' }}

                        </div>


                        <div class="upcoming-reason">

                            {{ $appointment->reason_for_visit }}

                        </div>


                        <div class="upcoming-status">

                            <span class="status {{ strtolower($appointment->status) }}">

                                {{ ucfirst($appointment->status) }}

                            </span>

                        </div>

                    </div>

                @endforeach

            </div>


        @empty

            <div class="empty">
                No upcoming appointments scheduled.
            </div>

        @endforelse

    </div>

</div>

</body>

</html>