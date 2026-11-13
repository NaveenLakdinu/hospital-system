<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Nurse Dashboard</title>


    <style>

        * {
            box-sizing: border-box;
        }


        :root {

            --primary: #0a9368;
            --primary-dark: #087553;
            --primary-soft: #e8f8f2;

            --blue: #2589c8;
            --blue-soft: #eaf6ff;

            --orange: #e88316;
            --orange-soft: #fff3e3;

            --purple: #8055c8;
            --purple-soft: #f2ecff;

            --red: #d84a57;
            --red-soft: #fff0f1;

            --text: #182236;
            --muted: #758197;
            --border: #e5ebef;
            --background: #f5f7fa;

        }


        body {

            margin: 0;

            font-family:
                Arial,
                sans-serif;

            color:
                var(--text);

            background:

                radial-gradient(
                    circle at top left,
                    #ddfaf1 0%,
                    transparent 24%
                ),

                radial-gradient(
                    circle at top right,
                    #edf4ff 0%,
                    transparent 28%
                ),

                var(--background);

        }


        a {
            text-decoration: none;
        }


        .page {

            max-width: 1400px;

            margin: auto;

            padding: 24px;

        }


        /* ========================================
           NAVBAR
        ======================================== */

        .main-navbar {

            width: 100%;

            background:
                rgba(255,255,255,.97);

            border:
                1px solid var(--border);

            border-radius:
                20px;

            padding:
                16px 22px;

            display: flex;

            align-items: center;

            justify-content:
                space-between;

            gap: 24px;

            margin-bottom:
                20px;

            box-shadow:
                0 8px 28px
                rgba(31,41,55,.04);

        }


        .navbar-brand {

            display: flex;

            align-items: center;

            gap: 20px;

        }


        .navbar-logo {

            width: 165px;

            height: 62px;

            object-fit: contain;

        }


        .navbar-divider {

            width: 1px;

            height: 58px;

            background:
                #e4e9ed;

        }


        .navbar-title {

            font-size: 20px;

            font-weight: 800;

        }


        .navbar-subtitle {

            margin-top: 5px;

            color:
                var(--muted);

            font-size: 12px;

        }


        .profile-btn {

            height: 46px;

            display: inline-flex;

            align-items: center;

            justify-content: center;

            gap: 8px;

            padding:
                0 17px;

            background:
                #effaf6;

            color:
                var(--primary);

            border:
                1px solid #c9e9dd;

            border-radius:
                11px;

            font-size: 13px;

            font-weight: 700;

            transition:
                .2s ease;

        }


        .profile-btn:hover {

            background:
                var(--primary);

            color: white;

        }


        /* ========================================
           ALERT
        ======================================== */

        .alert {

            padding:
                14px 17px;

            border-radius:
                13px;

            margin-bottom:
                18px;

            font-size:
                13px;

            font-weight:
                600;

        }


        .alert-success {

            background:
                #def8ea;

            border:
                1px solid #c3ead7;

            color:
                #086b4b;

        }


        .alert-error {

            background:
                #fff0f1;

            border:
                1px solid #f1c3c8;

            color:
                #b42331;

        }


        /* ========================================
           WALK-IN CTA
        ======================================== */

        .walkin-action {

            max-width:
                440px;

            margin-bottom:
                20px;

        }


        .walkin-btn {

            width: 100%;

            min-height: 76px;

            padding:
                15px 18px;

            display: flex;

            align-items: center;

            gap: 14px;

            background:

                linear-gradient(
                    135deg,
                    #0a9368,
                    #0cbb85
                );

            border-radius:
                18px;

            color: white;

            box-shadow:
                0 10px 25px
                rgba(10,147,104,.17);

            transition:
                .2s ease;

        }


        .walkin-btn:hover {

            transform:
                translateY(-2px);

            box-shadow:
                0 13px 28px
                rgba(10,147,104,.22);

        }


        .walkin-icon {

            width: 46px;

            height: 46px;

            min-width: 46px;

            display: flex;

            align-items: center;

            justify-content: center;

            background:
                rgba(255,255,255,.17);

            border-radius:
                13px;

        }


        .walkin-content {

            flex: 1;

        }


        .walkin-title {

            font-size: 15px;

            font-weight: 800;

        }


        .walkin-subtitle {

            margin-top: 4px;

            color:
                rgba(255,255,255,.78);

            font-size: 11px;

        }


        /* ========================================
           HERO
        ======================================== */

        .hero {

            position: relative;

            overflow: hidden;

            min-height:
                210px;

            display: flex;

            align-items: center;

            justify-content:
                space-between;

            gap: 25px;

            padding:
                34px;

            margin-bottom:
                20px;

            background:

                linear-gradient(
                    120deg,
                    rgba(220,250,241,.98),
                    rgba(235,247,255,.98),
                    rgba(244,240,255,.95)
                );

            border:
                1px solid #dfeee9;

            border-radius:
                25px;

        }


        .hero-badge {

            display: inline-flex;

            align-items: center;

            gap: 7px;

            padding:
                7px 11px;

            margin-bottom:
                12px;

            background:
                #daf8eb;

            color:
                #087a59;

            border-radius:
                999px;

            font-size:
                11px;

            font-weight: 700;

        }


        .hero-dot {

            width: 8px;

            height: 8px;

            border-radius: 50%;

            background:
                #10b57d;

        }


        .hero h1 {

            margin: 0;

            font-size:
                31px;

            font-weight:
                800;

        }


        .hero p {

            max-width:
                600px;

            margin:
                10px 0 0;

            color:
                #697586;

            font-size:
                14px;

            line-height:
                1.7;

        }


        .heartbeat {

            width: 300px;

            opacity: .5;

        }


        /* ========================================
           STAT CARDS
        ======================================== */

        .stats-grid {

            display: grid;

            grid-template-columns:
                repeat(4, 1fr);

            gap: 16px;

            margin-bottom:
                20px;

        }


        .stat-card {

            padding: 20px;

            background:
                rgba(255,255,255,.97);

            border:
                1px solid var(--border);

            border-radius:
                18px;

            box-shadow:
                0 8px 25px
                rgba(31,41,55,.03);

        }


        .stat-icon {

            width: 45px;

            height: 45px;

            display: flex;

            align-items: center;

            justify-content:
                center;

            border-radius:
                13px;

            margin-bottom:
                16px;

        }


        .green {
            background: var(--primary-soft);
            color: var(--primary);
        }


        .orange {
            background: var(--orange-soft);
            color: var(--orange);
        }


        .blue {
            background: var(--blue-soft);
            color: var(--blue);
        }


        .purple {
            background: var(--purple-soft);
            color: var(--purple);
        }


        .stat-value {

            font-size: 27px;

            font-weight: 800;

        }


        .stat-label {

            margin-top: 5px;

            color:
                var(--muted);

            font-size: 12px;

        }


        /* ========================================
           SEARCH / SORT TOOLBAR
        ======================================== */

        .queue-toolbar {

            display: flex;

            align-items: center;

            gap: 10px;

            padding: 14px;

            margin-bottom:
                20px;

            background:
                white;

            border:
                1px solid var(--border);

            border-radius:
                17px;

            box-shadow:
                0 8px 25px
                rgba(31,41,55,.025);

        }


        .patient-search {

            flex: 1;

            display: flex;

            align-items: center;

            gap: 9px;

            height: 46px;

            padding:
                0 14px;

            background:
                #fafcfd;

            border:
                1px solid #dfe6ea;

            border-radius:
                11px;

            color:
                #8792a2;

        }


        .patient-search input {

            width: 100%;

            height: 100%;

            border: 0;

            outline: none;

            background:
                transparent;

            font-size: 13px;

        }


        .queue-toolbar select {

            height: 46px;

            min-width:
                170px;

            padding:
                0 12px;

            border:
                1px solid #dfe6ea;

            border-radius:
                11px;

            background: white;

            color:
                #485467;

            font-weight: 600;

            outline: none;

        }


        .toolbar-btn {

            height: 46px;

            padding:
                0 18px;

            border: 0;

            border-radius:
                11px;

            background:
                var(--primary);

            color: white;

            font-weight: 700;

            cursor: pointer;

        }


        .clear-btn {

            height: 46px;

            padding:
                0 15px;

            display: inline-flex;

            align-items: center;

            justify-content: center;

            border:
                1px solid #e0e5e9;

            border-radius:
                11px;

            background:
                #f5f7f8;

            color:
                #667085;

            font-size: 12px;

            font-weight: 700;

        }


        /* ========================================
           QUEUE SECTION
        ======================================== */

        .queue-card {

            padding: 25px;

            margin-bottom:
                20px;

            background:
                rgba(255,255,255,.97);

            border:
                1px solid var(--border);

            border-radius:
                20px;

            box-shadow:
                0 8px 30px
                rgba(31,41,55,.03);

        }


        .section-heading {

            display: flex;

            justify-content:
                space-between;

            align-items: center;

            gap: 15px;

            margin-bottom:
                18px;

        }


        .section-title {

            display: flex;

            align-items: center;

            gap: 10px;

            font-size: 19px;

            font-weight: 800;

        }


        .title-mark {

            width: 5px;

            height: 25px;

            border-radius: 20px;

            background:

                linear-gradient(
                    #16c891,
                    #26a5dc
                );

        }


        .queue-count {

            padding:
                6px 10px;

            background:
                #f0f5f7;

            border-radius:
                999px;

            color:
                #667085;

            font-size: 11px;

            font-weight: 700;

        }


        /* ========================================
           PATIENT ROW
        ======================================== */

        .patient-row {

            padding: 17px;

            margin-bottom:
                12px;

            border:
                1px solid #e9eef1;

            border-radius:
                16px;

            background:
                #fff;

            transition:
                .18s ease;

        }


        .patient-row:hover {

            border-color:
                #d6e8e1;

            box-shadow:
                0 7px 18px
                rgba(31,41,55,.04);

        }


        .patient-row:last-child {

            margin-bottom: 0;

        }


        .patient-main {

            display: grid;

            grid-template-columns:
                70px minmax(190px,1.2fr)
                minmax(150px,.8fr)
                minmax(210px,1fr)
                auto;

            gap: 17px;

            align-items: center;

        }


        .token {

            width: 56px;

            height: 56px;

            display: flex;

            flex-direction:
                column;

            align-items: center;

            justify-content: center;

            background:
                #edf9f5;

            color:
                var(--primary);

            border-radius:
                14px;

        }


        .token-small {

            font-size: 8px;

            font-weight: 700;

            text-transform:
                uppercase;

        }


        .token-number {

            margin-top: 2px;

            font-size: 18px;

            font-weight: 900;

        }


        .patient-name {

            font-size: 14px;

            font-weight: 800;

        }


        .patient-meta {

            margin-top: 5px;

            color:
                #8a95a6;

            font-size: 11px;

        }


        .walkin-badge {

            display: inline-block;

            margin-top: 6px;

            padding:
                4px 7px;

            background:
                #fff2df;

            color:
                #d97808;

            border-radius:
                999px;

            font-size: 9px;

            font-weight: 800;

        }


        .status {

            display: inline-flex;

            align-items: center;

            width: fit-content;

            padding:
                6px 9px;

            border-radius:
                999px;

            font-size: 10px;

            font-weight: 800;

            text-transform:
                capitalize;

        }


        .status-confirmed {

            background:
                #eaf5ff;

            color:
                #2589c8;

        }


        .status-waiting {

            background:
                #fff2df;

            color:
                #d97808;

        }


        .status-completed {

            background:
                #e5f8ef;

            color:
                #07845f;

        }


        .status-pending {

            background:
                #f2ecff;

            color:
                #8055c8;

        }


        .status-cancelled {

            background:
                #fff0f1;

            color:
                #c7424f;

        }


        .quick-vitals {

            display: flex;

            flex-wrap: wrap;

            gap: 6px;

        }


        .vital-chip {

            padding:
                6px 8px;

            background:
                #f6f8fa;

            border:
                1px solid #e9eef1;

            border-radius:
                8px;

            color:
                #5e697a;

            font-size:
                10px;

            font-weight: 700;

        }


        .abnormal-badge {

            display: inline-flex;

            align-items: center;

            gap: 5px;

            margin-top: 6px;

            padding:
                5px 8px;

            background:
                #fff0e1;

            color:
                #c56700;

            border:
                1px solid #ffd6a5;

            border-radius:
                8px;

            font-size:
                9px;

            font-weight: 800;

        }


        /* ========================================
           ACTIONS
        ======================================== */

        .row-actions {

            display: flex;

            justify-content:
                flex-end;

            align-items: center;

            gap: 6px;

            flex-wrap: wrap;

        }


        .action-btn {

            min-height: 36px;

            padding:
                0 11px;

            display: inline-flex;

            align-items: center;

            justify-content: center;

            gap: 5px;

            border-radius:
                9px;

            border:
                1px solid transparent;

            font-size:
                10px;

            font-weight: 800;

            cursor: pointer;

        }


        .add-btn {

            background:
                var(--primary);

            color: white;

        }


        .edit-btn {

            background:
                #edf6ff;

            color:
                #2589c8;

            border-color:
                #d1e8f8;

        }


        .summary-btn {

            background:
                #effaf6;

            color:
                #07845f;

            border-color:
                #d0ebdf;

        }


        .delete-btn {

            background:
                #fff1f2;

            color:
                #c94250;

            border:
                1px solid #f3ced2;

        }


        .locked-badge {

            padding:
                6px 9px;

            border-radius:
                8px;

            background:
                #f3f4f6;

            color:
                #7a8493;

            font-size:
                9px;

            font-weight:
                700;

        }


        .delete-form {

            margin: 0;

        }


        /* ========================================
           QUICK SUMMARY
        ======================================== */

        .patient-quick-summary {

            margin-top: 13px;

            padding-top: 11px;

            border-top:
                1px solid #edf1f3;

        }


        .patient-quick-summary summary {

            width: fit-content;

            cursor: pointer;

            color:
                #2589c8;

            font-size:
                11px;

            font-weight: 800;

            user-select: none;

        }


        .quick-summary-grid {

            display: grid;

            grid-template-columns:
                repeat(4, 1fr);

            gap: 9px;

            margin-top:
                12px;

        }


        .quick-item {

            min-height: 62px;

            padding:
                10px 11px;

            background:
                #f8fafb;

            border:
                1px solid #eef1f3;

            border-radius:
                10px;

        }


        .quick-label {

            margin-bottom:
                5px;

            color:
                #929cab;

            font-size:
                9px;

            font-weight:
                700;

            text-transform:
                uppercase;

        }


        .quick-value {

            color:
                #3d4859;

            font-size:
                11px;

            font-weight:
                700;

            line-height:
                1.45;

        }


        /* ========================================
           UPCOMING
        ======================================== */

        .date-group {

            margin-top: 20px;

        }


        .date-label {

            display: inline-flex;

            padding:
                7px 11px;

            margin-bottom:
                10px;

            border-radius:
                9px;

            background:
                #f1f6f8;

            color:
                #667085;

            font-size:
                11px;

            font-weight:
                800;

        }


        /* ========================================
           EMPTY
        ======================================== */

        .empty-state {

            padding:
                45px 20px;

            text-align: center;

            color:
                #8b95a5;

        }


        .empty-icon {

            width: 60px;

            height: 60px;

            margin:
                0 auto 14px;

            display: flex;

            align-items: center;

            justify-content: center;

            border-radius:
                16px;

            background:
                #eef8f4;

            color:
                var(--primary);

        }


        .empty-title {

            color:
                #495465;

            font-size: 15px;

            font-weight: 800;

        }


        .empty-text {

            margin-top: 6px;

            font-size: 12px;

        }


        /* ========================================
           RESPONSIVE
        ======================================== */

        @media(max-width: 1100px) {

            .stats-grid {

                grid-template-columns:
                    repeat(2,1fr);

            }


            .patient-main {

                grid-template-columns:
                    60px 1fr 1fr;

            }


            .row-actions {

                grid-column:
                    2 / -1;

                justify-content:
                    flex-start;

            }


            .quick-summary-grid {

                grid-template-columns:
                    repeat(2,1fr);

            }

        }


        @media(max-width: 750px) {

            .page {

                padding: 14px;

            }


            .main-navbar {

                flex-direction:
                    column;

                align-items:
                    flex-start;

            }


            .navbar-divider,
            .navbar-portal {

                display: none;

            }


            .profile-btn {

                width: 100%;

            }


            .heartbeat {

                display: none;

            }


            .hero {

                padding: 25px;

            }


            .stats-grid {

                grid-template-columns:
                    1fr;

            }


            .queue-toolbar {

                flex-direction:
                    column;

                align-items:
                    stretch;

            }


            .queue-toolbar select,
            .toolbar-btn,
            .clear-btn {

                width: 100%;

            }


            .patient-main {

                grid-template-columns:
                    1fr;

            }


            .row-actions {

                grid-column: auto;

                justify-content:
                    flex-start;

            }


            .quick-summary-grid {

                grid-template-columns:
                    1fr;

            }

        }

    </style>

</head>


<body>


@php

    $todayString = now()->toDateString();


    $todayAppointments = $appointments->filter(
        function ($appointment) use ($todayString) {

            return \Carbon\Carbon::parse(
                $appointment->appointment_date
            )->toDateString() === $todayString;

        }
    );


    $upcomingAppointments = $appointments->filter(
        function ($appointment) use ($todayString) {

            return \Carbon\Carbon::parse(
                $appointment->appointment_date
            )->toDateString() > $todayString;

        }
    );


    $needVitals = $todayAppointments->filter(
        function ($appointment) {

            return !$appointment->vitalSign
                &&
                in_array(
                    $appointment->status,
                    ['confirmed', 'pending']
                );

        }
    )->count();


    $readyForDoctor = $todayAppointments
        ->where(
            'status',
            'waiting'
        )
        ->count();


    $completedToday = $todayAppointments
        ->where(
            'status',
            'completed'
        )
        ->count();

@endphp



<div class="page">


    <!-- =====================================
         NAVBAR
    ====================================== -->

    <div class="main-navbar">


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



        <a
            href="{{ route('nurse.profile') }}"
            class="profile-btn"
        >

            <svg
                width="17"
                height="17"
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="2"
            >

                <circle
                    cx="12"
                    cy="7"
                    r="4"
                ></circle>

                <path
                    d="M5 21v-2a7 7 0 0 1 14 0v2"
                ></path>

            </svg>

            My Profile

        </a>


    </div>



    <!-- =====================================
         ALERTS
    ====================================== -->

    @if(session('success'))

        <div class="alert alert-success">

            ✓ {{ session('success') }}

        </div>

    @endif


    @if(session('error'))

        <div class="alert alert-error">

            {{ session('error') }}

        </div>

    @endif



    <!-- =====================================
         WALK-IN
    ====================================== -->

    <div class="walkin-action">


        <a
            href="{{ route('nurse.walkins.create') }}"
            class="walkin-btn"
        >


            <div class="walkin-icon">

                <svg
                    width="23"
                    height="23"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                >

                    <circle
                        cx="9"
                        cy="7"
                        r="4"
                    ></circle>

                    <path
                        d="M2 21v-2a7 7 0 0 1 14 0v2"
                    ></path>

                    <path
                        d="M19 8v6"
                    ></path>

                    <path
                        d="M16 11h6"
                    ></path>

                </svg>

            </div>


            <div class="walkin-content">

                <div class="walkin-title">

                    Add Walk-in Patient

                </div>


                <div class="walkin-subtitle">

                    Search an existing patient or register a new patient without a prior appointment

                </div>

            </div>


            <svg
                width="19"
                height="19"
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="2"
            >

                <path d="M9 18l6-6-6-6"></path>

            </svg>


        </a>


    </div>



    <!-- =====================================
         HERO
    ====================================== -->

    <div class="hero">


        <div>


            <div class="hero-badge">

                <span class="hero-dot"></span>

                Nurse Active

            </div>


            <h1>

                Hello, {{ Auth::user()->name }}

            </h1>


            <p>

                Manage today's patient preparation queue,
                record and review vital signs, identify patients
                requiring attention and prepare each patient
                for doctor consultation.

            </p>


        </div>



        <svg
            class="heartbeat"
            viewBox="0 0 400 100"
            fill="none"
        >

            <path
                d="
                    M0 55
                    H55
                    L65 52
                    L73 55
                    L82 18
                    L91 88
                    L100 55
                    H160
                    L170 52
                    L178 55
                    L187 20
                    L196 86
                    L205 55
                    H265
                    L275 52
                    L283 55
                    L292 22
                    L301 84
                    L310 55
                    H400
                "
                stroke="#37bb93"
                stroke-width="3"
                stroke-linecap="round"
                stroke-linejoin="round"
            />

        </svg>


    </div>



    <!-- =====================================
         STATS
    ====================================== -->

    <div class="stats-grid">


        <div class="stat-card">

            <div class="stat-icon green">

                <svg
                    width="23"
                    height="23"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                >

                    <path
                        d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"
                    ></path>

                    <circle
                        cx="12"
                        cy="7"
                        r="4"
                    ></circle>

                </svg>

            </div>

            <div class="stat-value">

                {{ $todayAppointments->count() }}

            </div>

            <div class="stat-label">

                Today's Patients

            </div>

        </div>



        <div class="stat-card">

            <div class="stat-icon orange">

                <svg
                    width="23"
                    height="23"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                >

                    <circle
                        cx="12"
                        cy="12"
                        r="9"
                    ></circle>

                    <path
                        d="M12 7v5l3 2"
                    ></path>

                </svg>

            </div>

            <div class="stat-value">

                {{ $needVitals }}

            </div>

            <div class="stat-label">

                Need Vital Signs

            </div>

        </div>



        <div class="stat-card">

            <div class="stat-icon blue">

                <svg
                    width="23"
                    height="23"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                >

                    <path d="M20 6L9 17l-5-5"></path>

                </svg>

            </div>

            <div class="stat-value">

                {{ $readyForDoctor }}

            </div>

            <div class="stat-label">

                Ready for Doctor

            </div>

        </div>



        <div class="stat-card">

            <div class="stat-icon purple">

                <svg
                    width="23"
                    height="23"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                >

                    <path
                        d="M9 11l3 3L22 4"
                    ></path>

                    <path
                        d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"
                    ></path>

                </svg>

            </div>

            <div class="stat-value">

                {{ $completedToday }}

            </div>

            <div class="stat-label">

                Completed Today

            </div>

        </div>


    </div>



    <!-- =====================================
         SEARCH + SORT
    ====================================== -->

    <form
        method="GET"
        action="{{ route('nurse.dashboard') }}"
        class="queue-toolbar"
    >


        <div class="patient-search">


            <svg
                width="18"
                height="18"
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="2"
            >

                <circle
                    cx="11"
                    cy="11"
                    r="8"
                ></circle>

                <path
                    d="m21 21-4.3-4.3"
                ></path>

            </svg>


            <input
                type="text"
                name="search"
                value="{{ $search ?? '' }}"
                placeholder="Search patient name, email or appointment number..."
            >


        </div>



        <select name="sort">


            <option
                value="token"
                {{ ($sort ?? 'token') === 'token' ? 'selected' : '' }}
            >

                Sort by Token

            </option>


            <option
                value="time"
                {{ ($sort ?? '') === 'time' ? 'selected' : '' }}
            >

                Sort by Time

            </option>


        </select>



        <button
            type="submit"
            class="toolbar-btn"
        >

            Apply

        </button>



        @if(!empty($search) || ($sort ?? 'token') !== 'token')

            <a
                href="{{ route('nurse.dashboard') }}"
                class="clear-btn"
            >

                Clear

            </a>

        @endif


    </form>



    <!-- =====================================
         TODAY QUEUE
    ====================================== -->

    <div class="queue-card">


        <div class="section-heading">


            <div class="section-title">

                <span class="title-mark"></span>

                Today's Patient Queue

            </div>


            <span class="queue-count">

                {{ $todayAppointments->count() }}
                Patients

            </span>


        </div>



        @forelse($todayAppointments as $appointment)


            <div class="patient-row">


                <div class="patient-main">


                    <!-- TOKEN -->

                    <div class="token">

                        <div class="token-small">

                            Token

                        </div>

                        <div class="token-number">

                            #{{ $appointment->token_number }}

                        </div>

                    </div>



                    <!-- PATIENT -->

                    <div>


                        <div class="patient-name">

                            {{ $appointment->patient?->name ?? 'Unknown Patient' }}

                        </div>


                        <div class="patient-meta">

                            {{ $appointment->patient?->email ?? 'No email' }}

                            •
                            {{ \Carbon\Carbon::parse(
                                $appointment->appointment_time
                            )->format('h:i A') }}

                        </div>


                        @if($appointment->is_walk_in)

                            <span class="walkin-badge">

                                WALK-IN

                            </span>

                        @endif


                    </div>



                    <!-- STATUS -->

                    <div>


                        <span
                            class="status status-{{ strtolower($appointment->status) }}"
                        >

                            {{ ucfirst($appointment->status) }}

                        </span>


                        @if(
                            $appointment->vitalSign &&
                            $appointment->vitalSign->hasAbnormalVitals()
                        )

                            <div class="abnormal-badge">

                                ⚠ Review Vitals

                            </div>

                        @endif


                    </div>



                    <!-- QUICK VITALS -->

                    <div class="quick-vitals">


                        @if($appointment->vitalSign)


                            <span class="vital-chip">

                                {{ $appointment->vitalSign->temperature }}
                                °C

                            </span>


                            <span class="vital-chip">

                                BP
                                {{ $appointment->vitalSign->systolic_bp }}
                                /
                                {{ $appointment->vitalSign->diastolic_bp }}

                            </span>


                            <span class="vital-chip">

                                {{ $appointment->vitalSign->pulse }}
                                bpm

                            </span>


                            <span class="vital-chip">

                                {{ $appointment->vitalSign->weight }}
                                kg

                            </span>


                        @else


                            <span class="vital-chip">

                                Vitals not recorded

                            </span>


                        @endif


                    </div>



                    <!-- ACTIONS -->

                    <div class="row-actions">


                        @if(!$appointment->vitalSign)


                            @if(!$appointment->consultation_started_at)

                                <a
                                    href="{{ route(
                                        'nurse.vitals.create',
                                        $appointment->id
                                    ) }}"
                                    class="action-btn add-btn"
                                >

                                    + Add Vitals

                                </a>

                            @endif


                        @else


                            @if(!$appointment->consultation_started_at)


                                <a
                                    href="{{ route(
                                        'nurse.vitals.create',
                                        $appointment->id
                                    ) }}"
                                    class="action-btn edit-btn"
                                >

                                    Edit Vitals

                                </a>


                            @endif



                            <a
                                href="{{ route(
                                    'nurse.vitals.summary',
                                    $appointment->id
                                ) }}"
                                class="action-btn summary-btn"
                            >

                                View Summary

                            </a>



                            @if(
                                !$appointment->consultation_started_at &&
                                $appointment->status !== 'completed'
                            )

                                <form
                                    method="POST"
                                    action="{{ route(
                                        'nurse.vitals.destroy',
                                        $appointment->id
                                    ) }}"
                                    class="delete-form"
                                    onsubmit="return confirm('Delete these vital signs?');"
                                >

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="action-btn delete-btn"
                                    >

                                        Delete

                                    </button>

                                </form>

                            @endif


                        @endif



                        @if($appointment->consultation_started_at)

                            <span class="locked-badge">

                                🔒 Consultation Started

                            </span>

                        @endif


                    </div>


                </div>



                <!-- =================================
                     QUICK PATIENT SUMMARY
                ================================== -->

                <details class="patient-quick-summary">


                    <summary>

                        Quick Patient Summary

                    </summary>



                    <div class="quick-summary-grid">


                        <div class="quick-item">

                            <div class="quick-label">
                                Patient
                            </div>

                            <div class="quick-value">

                                {{ $appointment->patient?->name ?? 'Unknown Patient' }}

                            </div>

                        </div>



                        <div class="quick-item">

                            <div class="quick-label">
                                Email
                            </div>

                            <div class="quick-value">

                                {{ $appointment->patient?->email ?? 'Not Available' }}

                            </div>

                        </div>



                        <div class="quick-item">

                            <div class="quick-label">
                                Doctor
                            </div>

                            <div class="quick-value">

                                {{ $appointment->doctor?->user?->name ?? 'Unknown Doctor' }}

                            </div>

                        </div>



                        <div class="quick-item">

                            <div class="quick-label">
                                Token
                            </div>

                            <div class="quick-value">

                                #{{ $appointment->token_number }}

                            </div>

                        </div>



                        <div class="quick-item">

                            <div class="quick-label">
                                Reason for Visit
                            </div>

                            <div class="quick-value">

                                {{ $appointment->reason_for_visit }}

                            </div>

                        </div>



                        <div class="quick-item">

                            <div class="quick-label">
                                Appointment
                            </div>

                            <div class="quick-value">

                                {{ \Carbon\Carbon::parse(
                                    $appointment->appointment_time
                                )->format('h:i A') }}

                            </div>

                        </div>



                        @if($appointment->vitalSign)


                            <div class="quick-item">

                                <div class="quick-label">
                                    Temperature
                                </div>

                                <div class="quick-value">

                                    {{ $appointment->vitalSign->temperature }}
                                    °C

                                </div>

                            </div>



                            <div class="quick-item">

                                <div class="quick-label">
                                    Blood Pressure
                                </div>

                                <div class="quick-value">

                                    {{ $appointment->vitalSign->systolic_bp }}
                                    /
                                    {{ $appointment->vitalSign->diastolic_bp }}
                                    mmHg

                                </div>

                            </div>



                            <div class="quick-item">

                                <div class="quick-label">
                                    Pulse
                                </div>

                                <div class="quick-value">

                                    {{ $appointment->vitalSign->pulse }}
                                    bpm

                                </div>

                            </div>



                            <div class="quick-item">

                                <div class="quick-label">
                                    Weight
                                </div>

                                <div class="quick-value">

                                    {{ $appointment->vitalSign->weight }}
                                    kg

                                </div>

                            </div>


                            @if(
                                $appointment->vitalSign->hasAbnormalVitals()
                            )

                                <div class="quick-item">

                                    <div class="quick-label">

                                        Vitals Alert

                                    </div>

                                    <div
                                        class="quick-value"
                                        style="color:#c56700;"
                                    >

                                        Review:

                                        {{ implode(
                                            ', ',
                                            $appointment
                                                ->vitalSign
                                                ->abnormalFlags()
                                        ) }}

                                    </div>

                                </div>

                            @endif


                        @endif


                    </div>


                </details>


            </div>


        @empty


            <div class="empty-state">


                <div class="empty-icon">

                    <svg
                        width="28"
                        height="28"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                    >

                        <circle
                            cx="12"
                            cy="7"
                            r="4"
                        ></circle>

                        <path
                            d="M5 21v-2a7 7 0 0 1 14 0v2"
                        ></path>

                    </svg>

                </div>


                <div class="empty-title">

                    No patients found

                </div>


                <div class="empty-text">

                    No patient appointments match the current search.

                </div>


            </div>


        @endforelse


    </div>



    <!-- =====================================
         UPCOMING APPOINTMENTS
    ====================================== -->

    <div class="queue-card">


        <div class="section-heading">


            <div class="section-title">

                <span class="title-mark"></span>

                Upcoming Appointments

            </div>


            <span class="queue-count">

                {{ $upcomingAppointments->count() }}
                Appointments

            </span>


        </div>



        @forelse(
            $upcomingAppointments
                ->groupBy(
                    function ($appointment) {

                        return \Carbon\Carbon::parse(
                            $appointment->appointment_date
                        )->toDateString();

                    }
                )
            as $date => $dateAppointments
        )


            <div class="date-group">


                <div class="date-label">

                    {{ \Carbon\Carbon::parse(
                        $date
                    )->format('l, d M Y') }}

                </div>



                @foreach($dateAppointments as $appointment)


                    <div class="patient-row">


                        <div class="patient-main">


                            <div class="token">

                                <div class="token-small">
                                    Token
                                </div>

                                <div class="token-number">

                                    #{{ $appointment->token_number }}

                                </div>

                            </div>



                            <div>


                                <div class="patient-name">

                                    {{ $appointment->patient?->name ?? 'Unknown Patient' }}

                                </div>


                                <div class="patient-meta">

                                    {{ $appointment->patient?->email ?? 'No email' }}

                                </div>


                            </div>



                            <div>

                                <span
                                    class="status status-{{ strtolower($appointment->status) }}"
                                >

                                    {{ ucfirst($appointment->status) }}

                                </span>

                            </div>



                            <div class="quick-vitals">

                                <span class="vital-chip">

                                    {{ \Carbon\Carbon::parse(
                                        $appointment->appointment_time
                                    )->format('h:i A') }}

                                </span>

                                <span class="vital-chip">

                                    {{ $appointment->doctor?->user?->name ?? 'Doctor' }}

                                </span>

                            </div>



                            <div class="row-actions">

                                <span class="locked-badge">

                                    Upcoming

                                </span>

                            </div>


                        </div>



                        <details class="patient-quick-summary">


                            <summary>

                                Quick Patient Summary

                            </summary>


                            <div class="quick-summary-grid">


                                <div class="quick-item">

                                    <div class="quick-label">
                                        Patient
                                    </div>

                                    <div class="quick-value">

                                        {{ $appointment->patient?->name ?? 'Unknown Patient' }}

                                    </div>

                                </div>


                                <div class="quick-item">

                                    <div class="quick-label">
                                        Doctor
                                    </div>

                                    <div class="quick-value">

                                        {{ $appointment->doctor?->user?->name ?? 'Unknown Doctor' }}

                                    </div>

                                </div>


                                <div class="quick-item">

                                    <div class="quick-label">
                                        Reason
                                    </div>

                                    <div class="quick-value">

                                        {{ $appointment->reason_for_visit }}

                                    </div>

                                </div>


                                <div class="quick-item">

                                    <div class="quick-label">
                                        Time
                                    </div>

                                    <div class="quick-value">

                                        {{ \Carbon\Carbon::parse(
                                            $appointment->appointment_time
                                        )->format('h:i A') }}

                                    </div>

                                </div>


                            </div>


                        </details>


                    </div>


                @endforeach


            </div>


        @empty


            <div class="empty-state">


                <div class="empty-title">

                    No upcoming appointments

                </div>


                <div class="empty-text">

                    There are currently no future appointments in the queue.

                </div>


            </div>


        @endforelse


    </div>


</div>


</body>

</html>