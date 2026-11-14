<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        {{ $appointment->vitalSign ? 'Edit Vital Signs' : 'Record Vital Signs' }}
    </title>


    <style>

        * {
            box-sizing: border-box;
        }


        :root {

            --primary: #0a9368;
            --primary-dark: #087553;
            --primary-soft: #e9f8f3;

            --blue: #2589c8;
            --blue-soft: #edf7ff;

            --text: #182236;
            --muted: #758197;
            --border: #e6edf1;

            --bg: #f5f7fa;

            --red: #dc3545;

            --orange: #e78313;
            --orange-soft: #fff5e8;

        }


        body {

            margin: 0;

            font-family:
                Arial,
                sans-serif;

            color: var(--text);

            background:

                radial-gradient(
                    circle at top left,
                    #dcfaf0 0%,
                    transparent 26%
                ),

                radial-gradient(
                    circle at top right,
                    #edf4ff 0%,
                    transparent 28%
                ),

                var(--bg);

        }


        a {
            text-decoration: none;
        }


        .page {

            max-width: 1200px;

            margin: 0 auto;

            padding: 28px;

        }


        /* =========================
           TOP BAR
        ========================== */

        .topbar {

            background:
                rgba(255,255,255,.96);

            border:
                1px solid var(--border);

            border-radius: 18px;

            padding: 18px 22px;

            margin-bottom: 22px;

            display: flex;

            justify-content:
                space-between;

            align-items: center;

            box-shadow:
                0 8px 28px
                rgba(31,41,55,.035);

        }


        .title {

            font-size: 22px;

            font-weight: 800;

        }


        .subtitle {

            color: var(--muted);

            font-size: 13px;

            margin-top: 4px;

        }


        .back-btn {

            display: inline-flex;

            align-items: center;

            justify-content: center;

            gap: 7px;

            padding: 9px 14px;

            border-radius: 11px;

            border:
                1px solid #ccebdd;

            background:
                #effaf5;

            color:
                var(--primary);

            font-size: 13px;

            font-weight: 700;

            transition:
                .2s ease;

        }


        .back-btn:hover {

            background:
                var(--primary);

            color: white;

        }


        /* =========================
           STATUS MESSAGES
        ========================== */

        .alert {

            padding: 15px 17px;

            border-radius: 13px;

            margin-bottom: 18px;

            font-size: 14px;

            font-weight: 600;

        }


        .alert-success {

            background:
                #def8ea;

            color:
                #086b4b;

            border:
                1px solid #c3ead7;

        }


        .alert-error {

            background:
                #fff0f1;

            color:
                #b42331;

            border:
                1px solid #f4c5ca;

        }


        /* =========================
           CARDS
        ========================== */

        .card {

            background:
                rgba(255,255,255,.98);

            border:
                1px solid var(--border);

            border-radius: 22px;

            padding: 28px;

            box-shadow:
                0 10px 35px
                rgba(31,41,55,.04);

        }


        .patient-card {

            background:

                linear-gradient(
                    120deg,
                    rgba(223,250,242,.98),
                    rgba(236,246,255,.98)
                );

            border:
                1px solid #dcefe8;

            margin-bottom: 22px;

        }


        .section-header {

            display: flex;

            justify-content:
                space-between;

            align-items: center;

            gap: 20px;

            margin-bottom: 20px;

        }


        .section-title {

            font-size: 23px;

            font-weight: 800;

            margin: 0;

        }


        .mode-badge {

            display: inline-flex;

            align-items: center;

            gap: 6px;

            padding:
                7px 11px;

            border-radius:
                999px;

            background:
                #e8f7f2;

            color:
                #07845f;

            font-size:
                11px;

            font-weight: 800;

        }


        .mode-badge.edit {

            background:
                #edf6ff;

            color:
                #2589c8;

        }


        /* =========================
           PATIENT OVERVIEW
        ========================== */

        .patient-grid {

            display: grid;

            grid-template-columns:
                repeat(3, 1fr);

            gap: 15px;

        }


        .info-item {

            background:
                rgba(255,255,255,.72);

            border:
                1px solid #e6f1ed;

            border-radius: 15px;

            padding: 16px;

        }


        .label {

            color: #8a96a8;

            font-size: 11px;

            margin-bottom: 7px;

            font-weight: 700;

            text-transform:
                uppercase;

            letter-spacing:
                .5px;

        }


        .value {

            font-size: 15px;

            font-weight: 800;

            line-height: 1.5;

            word-break:
                break-word;

        }


        .walkin-badge {

            display: inline-block;

            margin-left: 7px;

            padding:
                4px 7px;

            border-radius:
                999px;

            background:
                #fff2dd;

            color:
                #d97808;

            font-size:
                9px;

            font-weight:
                800;

            vertical-align:
                middle;

        }


        /* =========================
           TEMP ACCOUNT
        ========================== */

        .patient-account {

            background:
                #eef6ff;

            border:
                1px solid #d5e7fb;

            border-radius:
                15px;

            padding: 18px;

            margin-bottom: 20px;

            color: #344054;

        }


        .account-title {

            font-size: 15px;

            font-weight: 800;

            margin-bottom: 13px;

        }


        .account-row {

            margin-top: 7px;

            font-size: 13px;

        }


        .account-help {

            margin-top: 13px;

            color:
                #758197;

            font-size:
                11px;

        }


        /* =========================
           FORM
        ========================== */

        .helper-box {

            background:
                #eef8f4;

            border:
                1px solid #d7eee5;

            border-radius:
                14px;

            padding:
                14px 16px;

            color:
                #557085;

            font-size:
                13px;

            margin-bottom:
                22px;

            line-height:
                1.7;

        }


        .form-grid {

            display: grid;

            grid-template-columns:
                repeat(2, 1fr);

            gap:
                18px 20px;

        }


        .field {

            margin-bottom:
                5px;

        }


        .field label {

            display: flex;

            align-items: center;

            justify-content:
                space-between;

            gap: 10px;

            font-weight: 700;

            margin-bottom:
                8px;

            font-size:
                14px;

        }


        .normal-range {

            color:
                #98a2b3;

            font-size:
                10px;

            font-weight:
                600;

        }


        .input-wrap {

            position: relative;

        }


        .field input {

            width: 100%;

            height: 56px;

            border:
                1px solid #d8e4e9;

            border-radius:
                14px;

            padding:
                0 70px 0 16px;

            font-size:
                16px;

            outline: none;

            transition:
                .2s ease;

            background: #fff;

        }


        .field input:focus {

            border-color:
                var(--primary);

            box-shadow:
                0 0 0 4px
                rgba(10,147,104,.08);

        }


        .field input.abnormal-input {

            border-color:
                #f1a340;

            background:
                #fffaf4;

            box-shadow:
                0 0 0 3px
                rgba(241,163,64,.08);

        }


        .unit {

            position: absolute;

            right: 16px;

            top: 50%;

            transform:
                translateY(-50%);

            color:
                #8a95a6;

            font-size:
                12px;

            font-weight: 700;

            pointer-events:
                none;

        }


        .error {

            color:
                var(--red);

            font-size:
                12px;

            margin-top:
                7px;

            font-weight:
                600;

        }


        /* =========================
           ABNORMAL WARNING
        ========================== */

        .abnormal-warning {

            display: none;

            align-items:
                flex-start;

            gap: 12px;

            margin-bottom:
                20px;

            padding:
                15px 17px;

            background:
                var(--orange-soft);

            border:
                1px solid #ffd7a2;

            border-radius:
                14px;

            color:
                #9b5600;

        }


        .abnormal-warning.show {

            display: flex;

        }


        .warning-icon {

            width: 35px;

            height: 35px;

            min-width: 35px;

            display: flex;

            align-items: center;

            justify-content:
                center;

            border-radius:
                10px;

            background:
                #f39a2b;

            color: white;

            font-size:
                18px;

            font-weight:
                900;

        }


        .warning-title {

            font-size:
                13px;

            font-weight:
                800;

            margin-bottom:
                4px;

        }


        .warning-text {

            font-size:
                12px;

            line-height:
                1.5;

        }


        /* =========================
           ACTIONS
        ========================== */

        .actions {

            margin-top:
                28px;

            padding-top:
                22px;

            border-top:
                1px solid #edf1f3;

            display: flex;

            gap: 11px;

            flex-wrap: wrap;

            justify-content:
                flex-end;

        }


        .btn {

            border: none;

            cursor: pointer;

            display: inline-flex;

            align-items: center;

            justify-content: center;

            gap: 8px;

            min-height: 46px;

            padding:
                0 18px;

            border-radius:
                12px;

            font-size:
                13px;

            font-weight:
                700;

            transition:
                .2s ease;

        }


        .btn-primary {

            background:

                linear-gradient(
                    135deg,
                    #0a9368,
                    #0bb783
                );

            color: #fff;

            box-shadow:
                0 7px 18px
                rgba(10,147,104,.15);

        }


        .btn-primary:hover {

            background:

                linear-gradient(
                    135deg,
                    #087553,
                    #0aa676
                );

            transform:
                translateY(-1px);

        }


        .btn-secondary {

            background:
                #f3f7f9;

            color:
                #556274;

            border:
                1px solid #e1e8ec;

        }


        .btn-secondary:hover {

            background:
                #eaf0f3;

        }


        /* =========================
           RESPONSIVE
        ========================== */

        @media(max-width: 900px) {

            .patient-grid,
            .form-grid {

                grid-template-columns:
                    1fr;

            }

        }


        @media(max-width: 700px) {

            .page {

                padding:
                    14px;

            }


            .topbar {

                flex-direction:
                    column;

                align-items:
                    flex-start;

                gap:
                    14px;

            }


            .back-btn {

                width:
                    100%;

            }


            .section-header {

                align-items:
                    flex-start;

                flex-direction:
                    column;

            }


            .actions {

                justify-content:
                    stretch;

            }


            .btn {

                width:
                    100%;

            }

        }

    </style>

</head>


<body>


<div class="page">


    <!-- =========================
         TOP BAR
    ========================== -->

    <div class="topbar">

        <div>

            <div class="title">

                @if($appointment->vitalSign)

                    Edit Vital Signs

                @else

                    Record Vital Signs

                @endif

            </div>


            <div class="subtitle">

                @if($appointment->vitalSign)

                    Review and update patient vitals before the doctor starts consultation

                @else

                    Capture patient vital data before consultation

                @endif

            </div>

        </div>


        <a
            href="{{ route('nurse.dashboard') }}"
            class="back-btn"
        >

            <svg
                width="16"
                height="16"
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="2"
            >

                <path d="M19 12H5"></path>
                <path d="M12 19l-7-7 7-7"></path>

            </svg>

            Back to Dashboard

        </a>

    </div>



    <!-- =========================
         SESSION MESSAGES
    ========================== -->

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



    <!-- =========================
         NEW PATIENT LOGIN DETAILS
    ========================== -->

    @if(session('temporary_password'))

        <div class="patient-account">

            <div class="account-title">

                New Patient Login Details

            </div>


            <div class="account-row">

                Email:

                <strong>
                    {{ session('new_patient_email') }}
                </strong>

            </div>


            <div class="account-row">

                Temporary Password:

                <strong>
                    {{ session('temporary_password') }}
                </strong>

            </div>


            <div class="account-help">

                Give these temporary login details to the patient.
                These details are shown for this registration session.

            </div>

        </div>

    @endif



    <!-- =========================
         PATIENT OVERVIEW
    ========================== -->

    <div class="card patient-card">


        <div class="section-header">


            <h2 class="section-title">

                Patient Overview

            </h2>


            @if($appointment->is_walk_in)

                <span class="mode-badge">

                    Walk-in Patient

                </span>

            @else

                <span class="mode-badge">

                    Scheduled Patient

                </span>

            @endif

        </div>



        <div class="patient-grid">


            <!-- PATIENT -->

            <div class="info-item">

                <div class="label">

                    Patient Name

                </div>


                <div class="value">

                    {{ $appointment->patient?->name ?? 'Unknown Patient' }}

                    @if($appointment->is_walk_in)

                        <span class="walkin-badge">
                            WALK-IN
                        </span>

                    @endif

                </div>

            </div>



            <!-- EMAIL -->

            <div class="info-item">

                <div class="label">

                    Patient Email

                </div>


                <div class="value">

                    {{ $appointment->patient?->email ?? 'Not Available' }}

                </div>

            </div>



            <!-- TOKEN -->

            <div class="info-item">

                <div class="label">

                    Queue Token

                </div>


                <div class="value">

                    #{{ $appointment->token_number }}

                </div>

            </div>



            <!-- DOCTOR -->

            <div class="info-item">

                <div class="label">

                    Doctor

                </div>


                <div class="value">

                    {{ $appointment->doctor?->user?->name ?? 'Unknown Doctor' }}

                </div>

            </div>



            <!-- DATE / TIME -->

            <div class="info-item">

                <div class="label">

                    Appointment

                </div>


                <div class="value">

                    {{ \Carbon\Carbon::parse(
                        $appointment->appointment_date
                    )->format('d M Y') }}

                    <br>

                    <span
                        style="
                            color:#758197;
                            font-size:12px;
                        "
                    >

                        {{ \Carbon\Carbon::parse(
                            $appointment->appointment_time
                        )->format('h:i A') }}

                    </span>

                </div>

            </div>



            <!-- REASON -->

            <div class="info-item">

                <div class="label">

                    Reason for Visit

                </div>


                <div class="value">

                    {{ $appointment->reason_for_visit }}

                </div>

            </div>


        </div>

    </div>



    <!-- =========================
         VITAL FORM
    ========================== -->

    <div class="card">


        <div class="section-header">


            <h2 class="section-title">

                @if($appointment->vitalSign)

                    Update Vital Signs

                @else

                    Vital Sign Entry

                @endif

            </h2>


            @if($appointment->vitalSign)

                <span class="mode-badge edit">

                    Edit Mode

                </span>

            @else

                <span class="mode-badge">

                    New Record

                </span>

            @endif


        </div>



        <div class="helper-box">

            @if($appointment->vitalSign)

                Existing vital signs are loaded below.
                You can make corrections while the patient is still waiting.
                Once the doctor starts the consultation, these vitals will be locked.

            @else

                Enter the patient’s latest vital signs carefully.
                After saving, the patient will move to the doctor consultation queue.

            @endif

        </div>



        <!-- LIVE ABNORMAL WARNING -->

        <div
            class="abnormal-warning"
            id="abnormalWarning"
        >

            <div class="warning-icon">

                !

            </div>


            <div>

                <div class="warning-title">

                    Vital signs require review

                </div>


                <div
                    class="warning-text"
                    id="warningText"
                >

                    One or more entered values are outside the configured reference range.

                </div>

            </div>

        </div>



        <form
            method="POST"
            action="{{ route(
                'nurse.vitals.store',
                $appointment->id
            ) }}"
        >

            @csrf



            <div class="form-grid">


                <!-- =========================
                     TEMPERATURE
                ========================== -->

                <div class="field">


                    <label for="temperature">

                        <span>
                            Temperature
                        </span>

                        <span class="normal-range">
                            Reference: 36–37.5 °C
                        </span>

                    </label>


                    <div class="input-wrap">


                        <input
                            type="number"
                            step="0.1"
                            name="temperature"
                            id="temperature"

                            value="{{ old(
                                'temperature',
                                optional(
                                    $appointment->vitalSign
                                )->temperature
                            ) }}"

                            placeholder="Enter temperature"

                            required
                        >


                        <span class="unit">

                            °C

                        </span>

                    </div>


                    @error('temperature')

                        <div class="error">

                            {{ $message }}

                        </div>

                    @enderror


                </div>



                <!-- =========================
                     PULSE
                ========================== -->

                <div class="field">


                    <label for="pulse">

                        <span>
                            Pulse
                        </span>

                        <span class="normal-range">
                            Reference: 60–100 bpm
                        </span>

                    </label>


                    <div class="input-wrap">


                        <input
                            type="number"
                            name="pulse"
                            id="pulse"

                            value="{{ old(
                                'pulse',
                                optional(
                                    $appointment->vitalSign
                                )->pulse
                            ) }}"

                            placeholder="Enter pulse"

                            required
                        >


                        <span class="unit">

                            bpm

                        </span>

                    </div>


                    @error('pulse')

                        <div class="error">

                            {{ $message }}

                        </div>

                    @enderror


                </div>



                <!-- =========================
                     SYSTOLIC
                ========================== -->

                <div class="field">


                    <label for="systolic_bp">

                        <span>
                            Systolic Blood Pressure
                        </span>

                        <span class="normal-range">
                            Reference: 90–140
                        </span>

                    </label>


                    <div class="input-wrap">


                        <input
                            type="number"
                            name="systolic_bp"
                            id="systolic_bp"

                            value="{{ old(
                                'systolic_bp',
                                optional(
                                    $appointment->vitalSign
                                )->systolic_bp
                            ) }}"

                            placeholder="Enter systolic BP"

                            required
                        >


                        <span class="unit">

                            mmHg

                        </span>

                    </div>


                    @error('systolic_bp')

                        <div class="error">

                            {{ $message }}

                        </div>

                    @enderror


                </div>



                <!-- =========================
                     DIASTOLIC
                ========================== -->

                <div class="field">


                    <label for="diastolic_bp">

                        <span>
                            Diastolic Blood Pressure
                        </span>

                        <span class="normal-range">
                            Reference: 60–90
                        </span>

                    </label>


                    <div class="input-wrap">


                        <input
                            type="number"
                            name="diastolic_bp"
                            id="diastolic_bp"

                            value="{{ old(
                                'diastolic_bp',
                                optional(
                                    $appointment->vitalSign
                                )->diastolic_bp
                            ) }}"

                            placeholder="Enter diastolic BP"

                            required
                        >


                        <span class="unit">

                            mmHg

                        </span>

                    </div>


                    @error('diastolic_bp')

                        <div class="error">

                            {{ $message }}

                        </div>

                    @enderror


                </div>



                <!-- =========================
                     WEIGHT
                ========================== -->

                <div class="field">


                    <label for="weight">

                        <span>
                            Weight
                        </span>

                    </label>


                    <div class="input-wrap">


                        <input
                            type="number"
                            step="0.1"
                            name="weight"
                            id="weight"

                            value="{{ old(
                                'weight',
                                optional(
                                    $appointment->vitalSign
                                )->weight
                            ) }}"

                            placeholder="Enter weight"

                            required
                        >


                        <span class="unit">

                            kg

                        </span>

                    </div>


                    @error('weight')

                        <div class="error">

                            {{ $message }}

                        </div>

                    @enderror


                </div>


            </div>



            <!-- =========================
                 ACTION BUTTONS
            ========================== -->

            <div class="actions">


                <a
                    href="{{ route('nurse.dashboard') }}"
                    class="btn btn-secondary"
                >

                    Cancel

                </a>



                <button
                    type="submit"
                    class="btn btn-primary"
                >


                    <svg
                        width="17"
                        height="17"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                    >

                        <path
                            d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"
                        ></path>

                        <polyline
                            points="17 21 17 13 7 13 7 21"
                        ></polyline>

                        <polyline
                            points="7 3 7 8 15 8"
                        ></polyline>

                    </svg>


                    @if($appointment->vitalSign)

                        Update Vital Signs

                    @else

                        Save Vital Signs

                    @endif


                </button>


            </div>


        </form>


    </div>


</div>



<!-- =========================
     LIVE ABNORMAL CHECK
========================== -->

<script>

    const temperature =
        document.getElementById(
            'temperature'
        );

    const pulse =
        document.getElementById(
            'pulse'
        );

    const systolic =
        document.getElementById(
            'systolic_bp'
        );

    const diastolic =
        document.getElementById(
            'diastolic_bp'
        );

    const abnormalWarning =
        document.getElementById(
            'abnormalWarning'
        );

    const warningText =
        document.getElementById(
            'warningText'
        );


    function numberValue(element)
    {
        if (
            !element ||
            element.value === ''
        ) {
            return null;
        }

        return parseFloat(
            element.value
        );
    }


    function checkVitals()
    {
        const problems = [];


        const tempValue =
            numberValue(
                temperature
            );

        const pulseValue =
            numberValue(
                pulse
            );

        const systolicValue =
            numberValue(
                systolic
            );

        const diastolicValue =
            numberValue(
                diastolic
            );


        /*
        |--------------------------------------------------------------------------
        | Temperature
        |--------------------------------------------------------------------------
        */

        temperature.classList.remove(
            'abnormal-input'
        );


        if (
            tempValue !== null &&
            (
                tempValue < 36 ||
                tempValue > 37.5
            )
        ) {

            problems.push(
                'Temperature'
            );

            temperature.classList.add(
                'abnormal-input'
            );

        }


        /*
        |--------------------------------------------------------------------------
        | Pulse
        |--------------------------------------------------------------------------
        */

        pulse.classList.remove(
            'abnormal-input'
        );


        if (
            pulseValue !== null &&
            (
                pulseValue < 60 ||
                pulseValue > 100
            )
        ) {

            problems.push(
                'Pulse'
            );

            pulse.classList.add(
                'abnormal-input'
            );

        }


        /*
        |--------------------------------------------------------------------------
        | Systolic BP
        |--------------------------------------------------------------------------
        */

        systolic.classList.remove(
            'abnormal-input'
        );


        if (
            systolicValue !== null &&
            (
                systolicValue < 90 ||
                systolicValue > 140
            )
        ) {

            problems.push(
                'Systolic Blood Pressure'
            );

            systolic.classList.add(
                'abnormal-input'
            );

        }


        /*
        |--------------------------------------------------------------------------
        | Diastolic BP
        |--------------------------------------------------------------------------
        */

        diastolic.classList.remove(
            'abnormal-input'
        );


        if (
            diastolicValue !== null &&
            (
                diastolicValue < 60 ||
                diastolicValue > 90
            )
        ) {

            problems.push(
                'Diastolic Blood Pressure'
            );

            diastolic.classList.add(
                'abnormal-input'
            );

        }


        /*
        |--------------------------------------------------------------------------
        | Warning
        |--------------------------------------------------------------------------
        */

        if (problems.length > 0) {

            abnormalWarning.classList.add(
                'show'
            );

            warningText.textContent =
                'Please review: ' +
                problems.join(', ') +
                '.';

        } else {

            abnormalWarning.classList.remove(
                'show'
            );

        }

    }


    [
        temperature,
        pulse,
        systolic,
        diastolic
    ].forEach(
        function (field) {

            field.addEventListener(
                'input',
                checkVitals
            );

        }
    );


    /*
     * Check existing values when editing
     */
    checkVitals();

</script>


</body>

</html>