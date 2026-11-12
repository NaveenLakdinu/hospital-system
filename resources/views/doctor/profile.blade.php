<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Doctor Profile</title>

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
            max-width: 1400px;
            margin: auto;
            padding: 24px;
        }

        /* TOP BAR */

        .topbar {
            background: rgba(255, 255, 255, 0.92);
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

        .top-actions {
            display: flex;
            align-items: center;
            gap: 12px;
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

.profile-topbar {
    width: 100%;

    background: rgba(255, 255, 255, 0.96);

    border: 1px solid #e7edf1;
    border-radius: 20px;

    padding: 16px 22px;

    display: flex;
    align-items: center;
    justify-content: space-between;

    gap: 24px;

    margin-bottom: 24px;

    box-shadow: 0 8px 28px rgba(31, 41, 55, 0.04);
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

.portal-info {
    border-left: 1px solid #e6eaee;
    padding-left: 20px;
}

.topbar-title {
    font-size: 19px;
    font-weight: 800;

    color: #182236;
}

.topbar-subtitle {
    margin-top: 5px;

    color: #8a95a6;

    font-size: 12px;
}


/* RIGHT SIDE */

.topbar-actions {
    display: flex;
    align-items: center;

    gap: 10px;

    margin-left: auto;
}

.logout-form {
    margin: 0;
}


/* DASHBOARD */

.dashboard-btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;

    gap: 8px;

    height: 46px;

    padding: 0 17px;

    background: #08a67a;
    color: white;

    border-radius: 11px;

    text-decoration: none;

    font-size: 13px;
    font-weight: 700;

    transition: 0.2s ease;
}

.dashboard-btn:hover {
    background: #078b67;

    transform: translateY(-1px);
}


/* LOGOUT */

.logout-btn {
    height: 46px;

    display: inline-flex;
    align-items: center;
    justify-content: center;

    gap: 8px;

    padding: 0 17px;

    background: #fff4f5;
    color: #dc3545;

    border: 1px solid #f0b8bd;
    border-radius: 11px;

    font-family: Arial, sans-serif;
    font-size: 13px;
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


/* RESPONSIVE */

@media(max-width: 850px) {

    .profile-topbar {
        flex-direction: column;
        align-items: flex-start;
    }

    .brand-area {
        width: 100%;
    }

    .topbar-actions {
        margin-left: 0;
    }

}

@media(max-width: 600px) {

    .brand-area {
        flex-direction: column;
        align-items: flex-start;
    }

    .portal-info {
        border-left: 0;
        padding-left: 0;
    }

    .topbar-actions {
        width: 100%;
    }

    .dashboard-btn,
    .logout-form {
        flex: 1;
    }

    .logout-btn {
        width: 100%;
    }
}


        /* HERO */

        .profile-hero {
            position: relative;
            overflow: hidden;

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
        }

        .doctor-main {
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
            border: 5px solid rgba(255,255,255,0.8);
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

        .doctor-name {
            margin: 0;
            font-size: 34px;
            letter-spacing: -0.5px;
        }

        .doctor-specialization {
            margin-top: 8px;
            color: #667085;
            font-size: 17px;
        }

        .doctor-email {
            margin-top: 9px;
            color: #8a94a6;
            font-size: 14px;

            display: flex;
            align-items: center;
            gap: 7px;
        }


        /* HEARTBEAT DECORATION */

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
            grid-template-columns: repeat(4, 1fr);
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

        .orange-icon {
            background: #fff0db;
            color: #f38b11;
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
            font-size: 25px;
            font-weight: 700;
        }

        .stat-label {
            color: #697586;
            margin-top: 6px;
            font-size: 14px;
        }


        /* MAIN CONTENT */

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


        /* INFO GRID */

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


        /* ABOUT */

        .about-box {
            margin-top: 20px;
            background: linear-gradient(120deg, #effaf6, #f4f8ff);
            border-radius: 15px;
            padding: 20px;

            color: #596579;
            line-height: 1.7;
            font-size: 14px;
        }


        /* SIDE CARD */

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


        /* MOBILE */

        @media(max-width: 900px) {

            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
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

            .doctor-main {
                flex-direction: column;
                text-align: center;
            }

            .doctor-email {
                justify-content: center;
            }

            .stats-grid,
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

   <div class="profile-topbar">

    <!-- LEFT SIDE -->
    <div class="brand-area">

        <img
            src="{{ asset('images/medicare24-logo.png') }}"
            alt="MediCare24"
            class="brand-logo"
        >

        <div class="portal-info">

            <div class="topbar-title">
                Doctor Portal
            </div>

            <div class="topbar-subtitle">
                Medical profile & professional information
            </div>

        </div>

    </div>


    <!-- RIGHT SIDE -->
    <div class="topbar-actions">

        <a
            href="{{ route('doctor.dashboard') }}"
            class="dashboard-btn"
        >
            <svg
                width="17"
                height="17"
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
                    width="17"
                    height="17"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
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

    <!-- PROFILE HERO -->

    <div class="profile-hero">

        <div class="doctor-main">

            <div class="avatar">

                {{ strtoupper(substr($doctor->user->name, 0, 1)) }}

            </div>


            <div>

                <div class="online-badge">

                    <span class="dot"></span>

                    Active Doctor

                </div>


                <h1 class="doctor-name">

                    Dr. {{ $doctor->user->name }}

                </h1>


                <div class="doctor-specialization">

                    {{ $doctor->specialization ?? 'Medical Doctor' }}

                </div>


                <div class="doctor-email">

                    <svg width="16" height="16"
                         viewBox="0 0 24 24"
                         fill="none"
                         stroke="currentColor"
                         stroke-width="2">

                        <rect x="3" y="5" width="18" height="14" rx="2"></rect>

                        <path d="M3 7l9 6 9-6"></path>

                    </svg>

                    {{ $doctor->user->email }}

                </div>

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
                    stroke="#37bb93"
                    stroke-width="3"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                />

            </svg>

            <div class="heartbeat-label">
                HEARTBEAT MONITOR
            </div>

        </div>

    </div>



    <!-- QUICK STAT CARDS -->

    <div class="stats-grid">


        <!-- SPECIALIZATION -->

        <div class="stat-card">

            <div class="stat-top">

                <div class="icon-box green-icon">

                    <svg width="25" height="25"
                         viewBox="0 0 24 24"
                         fill="none"
                         stroke="currentColor"
                         stroke-width="2">

                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                        <circle cx="12" cy="7" r="4"></circle>

                    </svg>

                </div>

                <span class="small-tag">
                    Active
                </span>

            </div>

            <div class="stat-value">
                {{ $doctor->specialization ?? 'Doctor' }}
            </div>

            <div class="stat-label">
                Medical Specialization
            </div>

        </div>



        <!-- ROOM -->

        <div class="stat-card">

            <div class="stat-top">

                <div class="icon-box blue-icon">

                    <svg width="25" height="25"
                         viewBox="0 0 24 24"
                         fill="none"
                         stroke="currentColor"
                         stroke-width="2">

                        <path d="M3 21h18"></path>
                        <path d="M6 21V4h12v17"></path>
                        <path d="M10 9h4"></path>

                    </svg>

                </div>

                <span class="small-tag">
                    Room
                </span>

            </div>

            <div class="stat-value">
                {{ $doctor->room_number ?? 'N/A' }}
            </div>

            <div class="stat-label">
                Consultation Room
            </div>

        </div>



        <!-- FEE -->

        <div class="stat-card">

            <div class="stat-top">

                <div class="icon-box orange-icon">

                    <svg width="25" height="25"
                         viewBox="0 0 24 24"
                         fill="none"
                         stroke="currentColor"
                         stroke-width="2">

                        <circle cx="12" cy="12" r="9"></circle>
                        <path d="M12 6v12"></path>
                        <path d="M15 9.5c0-1.1-1.3-2-3-2s-3 .9-3 2 1.3 2 3 2 3 .9 3 2-1.3 2-3 2-3-.9-3-2"></path>

                    </svg>

                </div>

                <span class="small-tag">
                    Fee
                </span>

            </div>

            <div class="stat-value">
                Rs. {{ number_format($doctor->consultation_fee ?? 0, 2) }}
            </div>

            <div class="stat-label">
                Consultation Fee
            </div>

        </div>



        <!-- LICENSE -->

        <div class="stat-card">

            <div class="stat-top">

                <div class="icon-box purple-icon">

                    <svg width="25" height="25"
                         viewBox="0 0 24 24"
                         fill="none"
                         stroke="currentColor"
                         stroke-width="2">

                        <rect x="5" y="3" width="14" height="18" rx="2"></rect>
                        <path d="M9 7h6"></path>
                        <path d="M9 11h6"></path>
                        <path d="M9 15h3"></path>

                    </svg>

                </div>

                <span class="small-tag">
                    Verified
                </span>

            </div>

            <div class="stat-value">
                {{ $doctor->license_number ?? 'N/A' }}
            </div>

            <div class="stat-label">
                Medical License
            </div>

        </div>

    </div>



    <!-- MAIN CONTENT -->

    <div class="content-grid">


        <!-- DOCTOR INFORMATION -->

        <div class="content-card">

            <div class="section-title">

                <span class="title-mark"></span>

                Professional Information

            </div>


            <div class="info-grid">


                <!-- EMAIL -->

                <div class="info-item">

                    <div class="info-icon">

                        <svg width="20" height="20"
                             viewBox="0 0 24 24"
                             fill="none"
                             stroke="currentColor"
                             stroke-width="2">

                            <rect x="3" y="5" width="18" height="14" rx="2"></rect>
                            <path d="M3 7l9 6 9-6"></path>

                        </svg>

                    </div>

                    <div>

                        <div class="info-label">
                            Email Address
                        </div>

                        <div class="info-value">
                            {{ $doctor->user->email }}
                        </div>

                    </div>

                </div>



                <!-- QUALIFICATION -->

                <div class="info-item">

                    <div class="info-icon">

                        <svg width="20" height="20"
                             viewBox="0 0 24 24"
                             fill="none"
                             stroke="currentColor"
                             stroke-width="2">

                            <path d="M3 10l9-5 9 5-9 5-9-5z"></path>
                            <path d="M7 12v5c3 2 7 2 10 0v-5"></path>

                        </svg>

                    </div>

                    <div>

                        <div class="info-label">
                            Qualification
                        </div>

                        <div class="info-value">
                            {{ $doctor->qualification ?? 'Not available' }}
                        </div>

                    </div>

                </div>



                <!-- SPECIALIZATION -->

                <div class="info-item">

                    <div class="info-icon">

                        <svg width="20" height="20"
                             viewBox="0 0 24 24"
                             fill="none"
                             stroke="currentColor"
                             stroke-width="2">

                            <path d="M12 2v20"></path>
                            <path d="M5 9h14"></path>

                        </svg>

                    </div>

                    <div>

                        <div class="info-label">
                            Specialization
                        </div>

                        <div class="info-value">
                            {{ $doctor->specialization ?? 'Not available' }}
                        </div>

                    </div>

                </div>



                <!-- ROOM -->

                <div class="info-item">

                    <div class="info-icon">

                        <svg width="20" height="20"
                             viewBox="0 0 24 24"
                             fill="none"
                             stroke="currentColor"
                             stroke-width="2">

                            <path d="M4 21h16"></path>
                            <path d="M6 21V3h12v18"></path>
                            <circle cx="14" cy="12" r="1"></circle>

                        </svg>

                    </div>

                    <div>

                        <div class="info-label">
                            Room Number
                        </div>

                        <div class="info-value">
                            {{ $doctor->room_number ?? 'Not assigned' }}
                        </div>

                    </div>

                </div>

            </div>



            <div class="section-title" style="margin-top:28px;">

                <span class="title-mark"></span>

                About Doctor

            </div>


            <div class="about-box">

                {{ $doctor->bio ?? 'No professional biography has been added for this doctor yet.' }}

            </div>

        </div>



        <!-- PROFILE STATUS -->

        <div class="content-card profile-status">

            <div class="large-icon">

                <svg width="42" height="42"
                     viewBox="0 0 24 24"
                     fill="none"
                     stroke="currentColor"
                     stroke-width="2">

                    <path d="M12 2l3 3 4 .5.5 4 3 3-3 3-.5 4-4 .5-3 3-3-3-4-.5-.5-4-3-3 3-3 .5-4 4-.5 3-3z"></path>

                    <path d="M8 12l2.5 2.5L16 9"></path>

                </svg>

            </div>


            <div class="verified-title">
                Verified Doctor
            </div>


            <div class="verified-text">
                This medical professional is registered and active in the clinic system.
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
                    Doctor
                </strong>

            </div>


            <div class="status-row">

                <span class="status-name">
                    Room
                </span>

                <strong>
                    {{ $doctor->room_number ?? 'N/A' }}
                </strong>

            </div>


            <div class="status-row">

                <span class="status-name">
                    License
                </span>

                <strong>
                    {{ $doctor->license_number ?? 'N/A' }}
                </strong>

            </div>

        </div>

    </div>

</div>

</body>
</html>