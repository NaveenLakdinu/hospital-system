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

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            color: #172033;

            background:
                radial-gradient(circle at top left, #dcfaf0 0%, transparent 28%),
                radial-gradient(circle at top right, #edf4ff 0%, transparent 30%),
                #f5f7fa;
        }

        .page {
            max-width: 1400px;
            margin: auto;
            padding: 25px;
        }

        /* TOP BAR */

        .topbar {
            background: rgba(255,255,255,0.95);
            border: 1px solid #edf1f4;
            border-radius: 18px;

            padding: 16px 22px;

            display: flex;
            align-items: center;
            justify-content: space-between;

            box-shadow: 0 8px 30px rgba(31,41,55,0.04);

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

        .profile-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;

            background: #eef9f5;
            color: #078d64;

            border: 1px solid #c8eadc;
            border-radius: 11px;

            padding: 11px 17px;

            text-decoration: none;
            font-weight: 700;

            transition: 0.2s;
        }

        .profile-btn:hover {
            background: #0a9d71;
            color: white;
        }

        /* HERO */

        .hero {
            background:
                linear-gradient(
                    120deg,
                    rgba(220,251,240,0.95),
                    rgba(239,249,255,0.95),
                    rgba(246,241,255,0.9)
                );

            border: 1px solid #ddf1e9;
            border-radius: 25px;

            padding: 35px;

            display: flex;
            justify-content: space-between;
            align-items: center;

            margin-bottom: 22px;
            overflow: hidden;
        }

        .live-badge {
            display: inline-flex;
            align-items: center;
            gap: 7px;

            background: #d8f9eb;
            color: #087d5b;

            padding: 7px 12px;
            border-radius: 50px;

            font-size: 13px;
            font-weight: 700;

            margin-bottom: 14px;
        }

        .live-dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: #14bd83;
        }

        .hero h1 {
            margin: 0;
            font-size: 34px;
        }

        .hero-description {
            color: #6f7c8e;
            margin: 10px 0 0;
            line-height: 1.6;
        }

        .heartbeat {
            width: 320px;
            opacity: 0.55;
        }

        .heartbeat-label {
            text-align: right;
            color: #5da88f;
            letter-spacing: 2px;
            font-size: 11px;
            font-weight: 700;
        }

        /* STATS */

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 18px;
            margin-bottom: 22px;
        }

        .stat-card {
            background: rgba(255,255,255,0.96);
            border: 1px solid #edf0f3;
            border-radius: 18px;
            padding: 22px;

            box-shadow: 0 8px 28px rgba(31,41,55,0.035);
        }

        .stat-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 18px;
        }

        .icon-box {
            width: 50px;
            height: 50px;
            border-radius: 14px;

            display: flex;
            align-items: center;
            justify-content: center;
        }

        .green-icon {
            background: #dcf8ed;
            color: #07966b;
        }

        .orange-icon {
            background: #fff0dc;
            color: #f28a14;
        }

        .blue-icon {
            background: #e2f4ff;
            color: #168ac4;
        }

        .purple-icon {
            background: #f0e7ff;
            color: #8147dc;
        }

        .tag {
            padding: 6px 10px;
            border-radius: 50px;
            font-size: 11px;
            font-weight: 700;
            background: #f0f6f4;
            color: #528273;
        }

        .stat-number {
            font-size: 30px;
            font-weight: 750;
        }

        .stat-label {
            color: #697586;
            margin-top: 6px;
            font-size: 14px;
        }

        /* SUCCESS */

        .success {
            background: #dff7ea;
            color: #0d684c;

            padding: 14px 18px;
            border-radius: 12px;

            margin-bottom: 20px;

            border: 1px solid #c3ebd8;
        }

        /* QUEUE CARD */

        .queue-card {
            background: rgba(255,255,255,0.97);

            border: 1px solid #edf0f3;
            border-radius: 20px;

            padding: 28px;

            box-shadow: 0 8px 30px rgba(31,41,55,0.035);
        }

        .queue-header {
            display: flex;
            align-items: center;
            justify-content: space-between;

            margin-bottom: 22px;
        }

        .section-title {
            display: flex;
            align-items: center;
            gap: 10px;

            font-size: 20px;
            font-weight: 700;
        }

        .title-mark {
            width: 5px;
            height: 26px;
            border-radius: 10px;

            background: linear-gradient(
                #14c88f,
                #25a7dd
            );
        }

        .queue-subtitle {
            color: #8a94a6;
            font-size: 13px;
            margin-top: 5px;
        }

        /* TABLE */

        .table-wrapper {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            padding: 15px;
            text-align: left;

            background: #edf9f7;

            color: #263244;
            font-size: 14px;
        }

        th:first-child {
            border-radius: 10px 0 0 10px;
        }

        th:last-child {
            border-radius: 0 10px 10px 0;
        }

        td {
            padding: 18px 15px;
            border-bottom: 1px solid #edf0f2;
            vertical-align: middle;
        }

        tbody tr:hover {
            background: #fbfdfd;
        }

        .patient-name {
            font-weight: 700;
        }

        .token {
            display: inline-flex;
            align-items: center;
            justify-content: center;

            min-width: 42px;
            height: 34px;

            background: #eef8f5;
            color: #087e5d;

            border-radius: 8px;

            font-weight: 700;
        }

        /* STATUS */

        .status {
            display: inline-flex;
            align-items: center;
            gap: 7px;

            padding: 7px 11px;

            border-radius: 50px;

            font-size: 13px;
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
            color: #246bd7;
        }

        .confirmed::before {
            background: #246bd7;
        }

        .waiting {
            background: #fff2df;
            color: #df7b08;
        }

        .waiting::before {
            background: #f59b23;
        }

        .completed {
            background: #e2f8ed;
            color: #128459;
        }

        .completed::before {
            background: #11a36b;
        }

        .cancelled {
            background: #ffe8eb;
            color: #cc3544;
        }

        .cancelled::before {
            background: #dc3545;
        }

        .pending {
            background: #f1f3f5;
            color: #6c757d;
        }

        .pending::before {
            background: #6c757d;
        }

        /* BUTTONS */

        .btn {
            display: inline-flex;
            align-items: center;
            gap: 7px;

            background: #0b9369;
            color: white;

            padding: 10px 15px;

            border-radius: 9px;

            text-decoration: none;

            font-size: 14px;
            font-weight: 600;

            transition: 0.2s;
        }

        .btn:hover {
            background: #087a58;
            transform: translateY(-1px);
        }

        .action-buttons {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .action-buttons form {
            margin: 0;
        }

        .btn-delete {
            width: 40px;
            height: 40px;

            display: inline-flex;
            align-items: center;
            justify-content: center;

            background: white;
            color: #e63946;

            border: 1px solid #e63946;
            border-radius: 9px;

            cursor: pointer;

            transition: 0.2s;
        }

        .btn-delete:hover {
            background: #e63946;
            color: white;
        }

        .waiting-nurse {
            display: inline-flex;
            align-items: center;
            gap: 7px;

            color: #707b8c;
            font-size: 13px;
            font-weight: 600;

            background: #f3f5f7;

            padding: 8px 11px;
            border-radius: 8px;
        }

        .date-row td {
    padding: 20px 10px 10px;
    border-bottom: none;
    background: transparent;
}

.date-heading {
    display: flex;
    align-items: center;
    justify-content: space-between;

    background: linear-gradient(
        90deg,
        #e7f9f2,
        #eef7ff
    );

    border: 1px solid #dcefe8;
    border-radius: 10px;

    padding: 12px 16px;

    color: #263244;
}

.today-label {
    display: inline-block;

    background: #198754;
    color: white;

    padding: 5px 10px;
    border-radius: 20px;

    font-size: 12px;
    font-weight: 700;

    margin-right: 8px;
}

.patient-count {
    color: #718096;
    font-size: 13px;
    font-weight: 600;
}

        .empty {
            text-align: center;
            padding: 35px;
            color: #8993a4;
        }

        @media(max-width: 950px) {
            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .heartbeat-area {
                display: none;
            }
        }

        @media(max-width: 650px) {
            .page {
                padding: 14px;
            }

            .topbar {
                flex-direction: column;
                align-items: flex-start;
                gap: 14px;
            }

            .stats-grid {
                grid-template-columns: 1fr;
            }

            .hero {
                padding: 24px;
            }

            .hero h1 {
                font-size: 27px;
            }

            .queue-card {
                padding: 18px;
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
                Doctor Portal
            </div>

            <div class="brand-subtitle">
                Clinical consultations & patient care
            </div>
        </div>


        <a
            href="{{ route('doctor.profile') }}"
            class="profile-btn"
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


    <!-- HERO -->

    <div class="hero">

        <div>

            <div class="live-badge">
                <span class="live-dot"></span>
                Doctor Active
            </div>

            <h1>
                Welcome, Dr. {{ Auth::user()->name }}
            </h1>

            <p class="hero-description">
                Review patients, begin consultations and manage completed clinical records.
            </p>

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
                PATIENT MONITOR
            </div>

        </div>

    </div>


    <!-- STAT CARDS -->

    <div class="stats-grid">

        <!-- Total Patients -->

        <div class="stat-card">

            <div class="stat-header">

                <div class="icon-box blue-icon">

                    <svg
                        width="25"
                        height="25"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                    >
                        <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path>
                        <circle cx="9" cy="7" r="4"></circle>
                        <path d="M22 21v-2a4 4 0 0 0-3-3.87"></path>
                    </svg>

                </div>

                <span class="tag">
                    Queue
                </span>

            </div>

            <div class="stat-number">
                {{ $appointments->count() }}
            </div>

            <div class="stat-label">
                Total Patients
            </div>

        </div>


        <!-- Waiting -->

        <div class="stat-card">

            <div class="stat-header">

                <div class="icon-box orange-icon">

                    <svg
                        width="25"
                        height="25"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                    >
                        <circle cx="12" cy="12" r="9"></circle>
                        <path d="M12 7v5l3 2"></path>
                    </svg>

                </div>

                <span class="tag">
                    Ready
                </span>

            </div>

            <div class="stat-number">
                {{ $appointments->where('status', 'waiting')->count() }}
            </div>

            <div class="stat-label">
                Waiting for Consultation
            </div>

        </div>


        <!-- Completed -->

        <div class="stat-card">

            <div class="stat-header">

                <div class="icon-box green-icon">

                    <svg
                        width="25"
                        height="25"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                    >
                        <circle cx="12" cy="12" r="9"></circle>
                        <path d="M8 12l3 3 5-6"></path>
                    </svg>

                </div>

                <span class="tag">
                    Done
                </span>

            </div>

            <div class="stat-number">
                {{ $appointments->where('status', 'completed')->count() }}
            </div>

            <div class="stat-label">
                Completed Consultations
            </div>

        </div>


        <!-- Nurse Check -->

        <div class="stat-card">

            <div class="stat-header">

                <div class="icon-box purple-icon">

                    <svg
                        width="25"
                        height="25"
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

                <span class="tag">
                    Nurse
                </span>

            </div>

            <div class="stat-number">
                {{ $appointments->where('status', 'confirmed')->count() }}
            </div>

            <div class="stat-label">
                Awaiting Nurse Check
            </div>

        </div>

    </div>


    <!-- SUCCESS -->

    @if(session('success'))

        <div class="success">
            ✓ {{ session('success') }}
        </div>

    @endif


    <!-- PATIENT QUEUE -->

    <div class="queue-card">

        <div class="queue-header">

            <div>

                <div class="section-title">

                    <span class="title-mark"></span>

                    Patient Queue

                </div>

                <div class="queue-subtitle">
                    Patients assigned to your consultation list
                </div>

            </div>

        </div>


        <div class="table-wrapper">

            <table>

                <thead>

                    <tr>
                        <th>Token</th>
                        <th>Patient</th>
                        <th>Reason</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>

                </thead>


               <tbody>

@php
    $groupedAppointments = $appointments->groupBy(function ($appointment) {
        return \Carbon\Carbon::parse(
            $appointment->appointment_date
        )->format('Y-m-d');
    });
@endphp


@forelse($groupedAppointments as $date => $dayAppointments)

    @php
        $appointmentDate = \Carbon\Carbon::parse($date);
        $isToday = $appointmentDate->isToday();
    @endphp


    <!-- DATE HEADER -->

    <tr class="date-row">

        <td colspan="5">

            <div class="date-heading">

                <div>

                    @if($isToday)

                        <span class="today-label">
                            Today
                        </span>

                    @endif

                    <strong>
                        {{ $appointmentDate->format('d/m/Y') }}
                    </strong>

                </div>


                <span class="patient-count">

                    {{ $dayAppointments->count() }}

                    {{ $dayAppointments->count() === 1 ? 'Patient' : 'Patients' }}

                </span>

            </div>

        </td>

    </tr>


    <!-- PATIENTS FOR THIS DATE -->

    @foreach($dayAppointments as $appointment)

        <tr>

            <!-- TOKEN -->

            <td>

                <span class="token">
                    #{{ $appointment->token_number }}
                </span>

            </td>


            <!-- PATIENT -->

            <td>

                <span class="patient-name">
                    {{ $appointment->patient?->name ?? 'Unknown Patient' }}
                </span>

            </td>


            <!-- REASON -->

            <td>
                {{ $appointment->reason_for_visit }}
            </td>


            <!-- STATUS -->

            <td>

                <span class="status {{ strtolower($appointment->status) }}">

                    {{ ucfirst($appointment->status) }}

                </span>

            </td>


            <!-- ACTION -->

            <td>

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
                        class="btn"
                    >

                        Start Consultation

                    </a>


                @elseif(
                    strtolower($appointment->status) === 'completed'
                    && $appointment->prescription
                )

                    <div class="action-buttons">

                        <a
                            href="{{ route(
                                'doctor.prescription.summary',
                                $appointment->prescription->id
                            ) }}"
                            class="btn"
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
                                class="btn-delete"
                                title="Delete Consultation"
                            >

                                <svg
                                    width="18"
                                    height="18"
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

                    </div>


                @elseif(strtolower($appointment->status) === 'completed')

                    Completed


                @else

                    {{ ucfirst($appointment->status) }}

                @endif

            </td>

        </tr>

    @endforeach


@empty

    <tr>

        <td colspan="5" class="empty">

            No upcoming appointments available.

        </td>

    </tr>

@endforelse

</tbody>
            </table>

        </div>

    </div>

</div>

</body>

</html>