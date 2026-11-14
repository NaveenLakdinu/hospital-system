<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Doctor Dashboard</title>

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

            --red: #dc3545;
            --red-soft: #fff0f1;

            --purple: #7655d9;
            --purple-soft: #f1edff;

            --text: #182236;
            --muted: #758197;
            --border: #e8edf1;
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
            background: rgba(255, 255, 255, 0.94);
            border: 1px solid var(--border);
            border-radius: 18px;

            display: flex;
            align-items: center;
            justify-content: space-between;

            padding: 17px 22px;
            margin-bottom: 22px;

            box-shadow: 0 8px 30px rgba(31, 41, 55, 0.04);
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
            justify-content: center;
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

        /* ================================
   MAIN DOCTOR NAVBAR
================================ */

.main-navbar {
    width: 100%;

    background: rgba(255, 255, 255, 0.97);

    border: 1px solid #e7edf1;
    border-radius: 20px;

    padding: 18px 24px;

    display: flex;
    align-items: center;
    justify-content: space-between;

    gap: 24px;

    margin-bottom: 24px;

    box-shadow:
        0 8px 28px rgba(31, 41, 55, 0.04);
}


/* LEFT */

.navbar-brand {
    display: flex;
    align-items: center;
    gap: 20px;
}


.navbar-logo {
    width: 180px;
    height: 60px;

    object-fit: contain;
    object-position: left center;

    display: block;
}


.navbar-divider {
    width: 1px;
    height: 58px;

    background: #e4e9ed;
}


.navbar-title {
    font-size: 21px;
    font-weight: 800;

    color: #182236;
}


.navbar-subtitle {
    margin-top: 6px;

    color: #8a95a6;

    font-size: 13px;
}


/* RIGHT */

.navbar-actions {
    display: flex;
    align-items: center;

    margin-left: auto;
}


.profile-nav-btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;

    gap: 9px;

    height: 48px;

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


.profile-nav-btn svg {
    flex-shrink: 0;
}


/* RESPONSIVE */

@media(max-width: 750px) {

    .main-navbar {
        flex-direction: column;
        align-items: flex-start;

        padding: 18px;
    }


    .navbar-brand {
        width: 100%;
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

        /* DOCTOR HEADER */

        .doctor-header {
            background:
                linear-gradient(
                    120deg,
                    rgba(220, 250, 240, 0.96),
                    rgba(239, 248, 255, 0.96),
                    rgba(247, 242, 255, 0.94)
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

        .doctor-badge {
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

        .doctor-badge-dot {
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

        .doctor-header h1 {
            margin: 0;
            font-size: 32px;
            letter-spacing: -0.5px;
        }

        .doctor-meta {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 10px;

            margin-top: 13px;
        }

        .meta-item {
            display: inline-flex;
            align-items: center;
            gap: 6px;

            padding: 7px 10px;

            background: rgba(255, 255, 255, 0.72);

            border: 1px solid rgba(215, 229, 225, 0.9);
            border-radius: 8px;

            color: #59677a;
            font-size: 13px;
            font-weight: 600;
        }

        .heartbeat-area {
            min-width: 320px;
        }

        .heartbeat {
            width: 320px;
            opacity: 0.55;
        }

        .heartbeat-label {
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
            background: var(--surface);

            border: 1px solid var(--border);
            border-radius: 18px;

            padding: 20px;

            box-shadow: 0 8px 25px rgba(31, 41, 55, 0.035);
        }

        .stat-top {
            display: flex;
            align-items: center;
            justify-content: space-between;

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
            color: var(--blue);
            background: var(--blue-soft);
        }

        .stat-icon.orange {
            color: var(--orange);
            background: var(--orange-soft);
        }

        .stat-icon.green {
            color: var(--primary);
            background: var(--primary-soft);
        }

        .stat-icon.purple {
            color: var(--purple);
            background: var(--purple-soft);
        }

        .stat-tag {
            font-size: 11px;
            font-weight: 700;

            background: #f1f6f4;
            color: #608073;

            padding: 5px 9px;

            border-radius: 100px;
        }

        .stat-number {
            font-size: 29px;
            font-weight: 800;
        }

        .stat-label {
            color: var(--muted);
            font-size: 13px;

            margin-top: 5px;
        }

        /* SUCCESS */

        .success-message {
            background: #def8ea;
            color: #086b4b;

            border: 1px solid #c3ead7;
            border-radius: 12px;

            padding: 14px 17px;

            margin-bottom: 20px;
        }

        /* SECTION */

        .section-card {
            background: rgba(255, 255, 255, 0.97);

            border: 1px solid var(--border);
            border-radius: 20px;

            padding: 25px;

            margin-bottom: 22px;

            box-shadow: 0 8px 30px rgba(31, 41, 55, 0.035);
        }

        .section-header {
            display: flex;
            align-items: center;
            justify-content: space-between;

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

            background: linear-gradient(
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

            border-radius: 8px;

            background: var(--primary-soft);
            color: var(--primary);

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
            border: 1px solid #e8edef;
            border-radius: 14px;

            padding: 17px 18px;

            display: grid;

            grid-template-columns:
                70px
                minmax(180px, 1.2fr)
                minmax(200px, 1.5fr)
                minmax(260px, 1.5fr)
                125px
                minmax(180px, auto);

            align-items: center;
            gap: 15px;

            background: #fff;

            transition: 0.2s ease;
        }

        .patient-card:hover {
            border-color: #cae9df;

            box-shadow:
                0 8px 24px rgba(31, 41, 55, 0.045);

            transform: translateY(-1px);
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

        .reason-label,
        .vitals-label {
            color: #929cac;

            font-size: 10px;
            font-weight: 700;

            text-transform: uppercase;
            letter-spacing: 0.7px;

            margin-bottom: 5px;
        }

        .reason {
            font-size: 14px;
            color: #364153;
        }

        /* VITALS */

        .quick-vitals {
            display: flex;
            flex-wrap: wrap;
            gap: 7px;
        }

        .vital-chip {
            display: inline-flex;
            align-items: center;
            gap: 5px;

            padding: 6px 8px;

            background: #f6faf9;

            border: 1px solid #e6eeee;
            border-radius: 7px;

            color: #596779;

            font-size: 11px;
            font-weight: 600;
        }

        .no-vitals {
            color: #a0a8b5;
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

        .waiting {
            color: #d77708;
            background: #fff1dd;
        }

        .waiting::before {
            background: #f39a25;
        }

        .confirmed {
            color: #246cd3;
            background: #eaf2ff;
        }

        .confirmed::before {
            background: #2f75db;
        }

        .completed {
            color: #10815a;
            background: #e1f7ec;
        }

        .completed::before {
            background: #11a36d;
        }

        .pending {
            color: #70798a;
            background: #f0f2f5;
        }

        .pending::before {
            background: #7f8795;
        }

        .cancelled {
            color: #ca3443;
            background: #ffe9eb;
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

        .waiting-nurse {
            color: #788397;

            background: #f3f5f7;

            padding: 8px 10px;

            border-radius: 8px;

            font-size: 11px;
            font-weight: 700;

            white-space: nowrap;
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

            transition: 0.2s ease;
        }

        .delete-btn:hover {
            color: white;
            background: var(--red);
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
            grid-template-columns: 80px 1fr 1.4fr 130px;

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

                gap: 13px;
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

            .heartbeat-area {
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

            .doctor-header {
                padding: 24px;
            }

            .doctor-header h1 {
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

    $doctor = Auth::user()->doctor;

    $todayDate = now()->toDateString();

    $todaysAppointments = $appointments->filter(function ($appointment) use ($todayDate) {
        return \Carbon\Carbon::parse($appointment->appointment_date)
            ->toDateString() === $todayDate;
    });

    $upcomingAppointments = $appointments->filter(function ($appointment) use ($todayDate) {
        return \Carbon\Carbon::parse($appointment->appointment_date)
            ->toDateString() > $todayDate;
    });

    $waitingToday = $todaysAppointments->where('status', 'waiting')->count();

    $completedToday = $todaysAppointments->where('status', 'completed')->count();

    $nurseCheckToday = $todaysAppointments->where('status', 'confirmed')->count();

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
                Doctor Portal
            </div>

            <div class="navbar-subtitle">
                Patient Consultations & Clinical Records
            </div>

        </div>

    </div>


    <!-- RIGHT SIDE -->
    <div class="navbar-actions">

        <a
            href="{{ route('doctor.profile') }}"
            class="profile-nav-btn"
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
                <path d="M20 21a8 8 0 0 0-16 0"></path>
                <circle cx="12" cy="7" r="4"></circle>
            </svg>

            My Profile
        </a>

    </div>

</div>

    <!-- DOCTOR HEADER -->

    <div class="doctor-header">

        <div>

            <div class="doctor-badge">

                <span class="doctor-badge-dot"></span>

                Doctor Active

            </div>


            <div class="greeting">
                {{ $greeting }},
            </div>


            <h1>
                {{ Auth::user()->name }}
            </h1>


            <div class="doctor-meta">

                @if($doctor?->specialization)

                    <span class="meta-item">

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

                        {{ $doctor->specialization }}

                    </span>

                @endif


                @if($doctor?->room_number)

                    <span class="meta-item">

                        <svg
                            width="15"
                            height="15"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                        >
                            <rect x="5" y="3" width="14" height="18"></rect>
                            <circle cx="15" cy="12" r="1"></circle>
                        </svg>

                        {{ $doctor->room_number }}

                    </span>

                @endif

            </div>

        </div>


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
                    stroke="#32b88f"
                    stroke-width="3"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                />

            </svg>

            <div class="heartbeat-label">
                CLINICAL WORKSPACE
            </div>

        </div>

    </div>


    <!-- STATISTICS -->

    <div class="stats-grid">

        <!-- TODAY -->

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
                        <path d="M22 21v-2a4 4 0 0 0-3-3.8"></path>
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


        <!-- WAITING -->

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
                        <path d="M12 7v5l3 2"></path>
                    </svg>

                </div>

                <span class="stat-tag">
                    Ready
                </span>

            </div>

            <div class="stat-number">
                {{ $waitingToday }}
            </div>

            <div class="stat-label">
                Waiting for Consultation
            </div>

        </div>


        <!-- COMPLETED -->

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


        <!-- NURSE CHECK -->

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
                        <rect x="5" y="3" width="14" height="18" rx="2"></rect>
                        <path d="M9 8h6"></path>
                        <path d="M9 12h6"></path>
                    </svg>

                </div>

                <span class="stat-tag">
                    Nurse
                </span>

            </div>

            <div class="stat-number">
                {{ $nurseCheckToday }}
            </div>

            <div class="stat-label">
                Awaiting Nurse Check
            </div>

        </div>

    </div>


    @if(session('success'))

        <div class="success-message">
            ✓ {{ session('success') }}
        </div>

    @endif


    <!-- TODAY'S PATIENTS -->

    <div class="section-card">

        <div class="section-header">

            <div class="section-heading">

                <span class="section-mark"></span>

                <div>

                    <div class="section-title">
                        Today's Patients
                    </div>

                    <div class="section-description">
                        Patients scheduled for consultation today
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

                            <div class="reason-label">
                                Reason for Visit
                            </div>

                            <div class="reason">
                                {{ $appointment->reason_for_visit }}
                            </div>

                        </div>


                        <!-- VITAL SIGNS -->

                        <div class="patient-vitals">

                            <div class="vitals-label">
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
                                        {{ $appointment->vitalSign->pulse }}

                                        bpm

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


                            @if(strtolower($appointment->status) === 'confirmed')

                                <span class="waiting-nurse">
                                    Waiting for Nurse
                                </span>


                            @elseif(strtolower($appointment->status) === 'waiting')

                                <a
                                    href="{{ route(
                                        'doctor.consultation.show',
                                        $appointment->id
                                    ) }}"
                                    class="primary-btn"
                                >

                                    Start Consultation

                                    <span>→</span>

                                </a>


                            @elseif(
                                strtolower($appointment->status) === 'completed'
                                && $appointment->prescription
                            )

                                <a
                                    href="{{ route(
                                        'doctor.prescription.summary',
                                        $appointment->prescription->id
                                    ) }}"
                                    class="primary-btn"
                                >

                                    View Summary

                                </a>


                                <form
                                    method="POST"
                                    action="{{ route(
                                        'doctor.consultation.destroy',
                                        $appointment->id
                                    ) }}"
                                    onsubmit="return confirm(
                                        'Are you sure you want to delete this consultation and prescription?'
                                    );"
                                >

                                    @csrf
                                    @method('DELETE')


                                    <button
                                        type="submit"
                                        class="delete-btn"
                                        title="Delete Consultation"
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


                            @elseif(strtolower($appointment->status) === 'completed')

                                <span class="waiting-nurse">
                                    Completed
                                </span>


                            @else

                                <span class="waiting-nurse">
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


    <!-- UPCOMING APPOINTMENTS -->

    <div class="section-card">

        <div class="section-header">

            <div class="section-heading">

                <span class="section-mark"></span>

                <div>

                    <div class="section-title">
                        Upcoming Appointments
                    </div>

                    <div class="section-description">
                        Your future scheduled patient consultations
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