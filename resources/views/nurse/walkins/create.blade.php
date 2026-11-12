<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Walk-in Registration</title>

    <style>
        * {
            box-sizing: border-box;
        }

        :root {
            --primary: #0a9368;
            --primary-dark: #087553;
            --primary-soft: #e8f8f2;

            --blue: #2589c8;
            --blue-soft: #edf6fd;

            --orange: #e88714;
            --orange-soft: #fff4e4;

            --text: #182236;
            --muted: #758197;
            --border: #e4ebef;
            --background: #f5f7fa;
            --surface: #ffffff;

            --danger: #dc3545;
        }

        body {
            margin: 0;

            font-family: Arial, sans-serif;

            color: var(--text);

            background:
                radial-gradient(circle at top left, #ddfaf1 0%, transparent 26%),
                radial-gradient(circle at top right, #edf4ff 0%, transparent 28%),
                var(--background);
        }

        a {
            text-decoration: none;
        }

        .page {
            max-width: 1250px;

            margin: 0 auto;

            padding: 28px;
        }

        /* =========================
           NAVBAR
        ========================= */

        .main-navbar {
            width: 100%;

            background: rgba(255,255,255,0.97);

            border: 1px solid var(--border);
            border-radius: 20px;

            padding: 16px 22px;

            display: flex;
            align-items: center;
            justify-content: space-between;

            gap: 24px;

            margin-bottom: 24px;

            box-shadow:
                0 8px 28px rgba(31,41,55,0.04);
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
            object-position: left center;
        }

        .navbar-divider {
            width: 1px;
            height: 58px;

            background: #e4e9ed;
        }

        .navbar-title {
            font-size: 20px;
            font-weight: 800;
        }

        .navbar-subtitle {
            margin-top: 5px;

            color: var(--muted);

            font-size: 13px;
        }

        .back-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;

            gap: 8px;

            height: 46px;

            padding: 0 17px;

            background: #effaf6;
            color: var(--primary);

            border: 1px solid #c8e9dc;
            border-radius: 11px;

            font-size: 13px;
            font-weight: 700;

            transition: 0.2s ease;
        }

        .back-btn:hover {
            background: var(--primary);
            color: white;
        }

        /* =========================
           HERO
        ========================= */

        .hero {
            position: relative;

            overflow: hidden;

            background:
                linear-gradient(
                    120deg,
                    rgba(222,250,241,0.98),
                    rgba(237,247,255,0.98),
                    rgba(247,243,255,0.95)
                );

            border: 1px solid #dcefe8;
            border-radius: 24px;

            padding: 30px 34px;

            margin-bottom: 22px;

            display: flex;
            justify-content: space-between;
            align-items: center;

            gap: 20px;
        }

        .hero-badge {
            display: inline-flex;
            align-items: center;

            gap: 7px;

            padding: 7px 11px;

            background: #daf8eb;
            color: #087a59;

            border-radius: 999px;

            font-size: 12px;
            font-weight: 700;

            margin-bottom: 13px;
        }

        .hero-badge span {
            width: 8px;
            height: 8px;

            border-radius: 50%;

            background: #10b57d;
        }

        .hero h1 {
            margin: 0;

            font-size: 31px;
            font-weight: 800;

            letter-spacing: -0.4px;
        }

        .hero p {
            margin: 10px 0 0;

            max-width: 650px;

            color: #637186;

            font-size: 14px;
            line-height: 1.7;
        }

        .hero-icon {
            width: 100px;
            height: 100px;

            display: flex;
            align-items: center;
            justify-content: center;

            flex-shrink: 0;

            background: rgba(255,255,255,0.72);

            border: 1px solid #dcebe6;
            border-radius: 28px;

            color: var(--primary);
        }

        /* =========================
           PROGRESS
        ========================= */

        .steps {
            display: grid;
            grid-template-columns: repeat(3, 1fr);

            gap: 12px;

            margin-bottom: 22px;
        }

        .step {
            display: flex;
            align-items: center;

            gap: 11px;

            padding: 13px 15px;

            background: white;

            border: 1px solid var(--border);
            border-radius: 14px;
        }

        .step-number {
            width: 32px;
            height: 32px;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 9px;

            background: var(--primary-soft);
            color: var(--primary);

            font-size: 13px;
            font-weight: 800;
        }

        .step-title {
            font-size: 13px;
            font-weight: 800;
        }

        .step-subtitle {
            margin-top: 3px;

            color: var(--muted);

            font-size: 10px;
        }

        /* =========================
           MAIN CARD
        ========================= */

        .form-card {
            background: rgba(255,255,255,0.98);

            border: 1px solid var(--border);
            border-radius: 22px;

            padding: 28px;

            box-shadow:
                0 10px 35px rgba(31,41,55,0.04);
        }

        .section-heading {
            display: flex;
            align-items: flex-start;

            gap: 11px;

            margin-bottom: 18px;
        }

        .section-mark {
            width: 5px;
            height: 28px;

            border-radius: 20px;

            background:
                linear-gradient(
                    to bottom,
                    #17c991,
                    #26a4dc
                );
        }

        .section-title {
            font-size: 19px;
            font-weight: 800;
        }

        .section-description {
            margin-top: 4px;

            color: var(--muted);

            font-size: 12px;
        }

        /* =========================
           PATIENT TYPE
        ========================= */

        .patient-type-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);

            gap: 15px;

            margin-bottom: 24px;
        }

        .patient-type {
            position: relative;
        }

        .patient-type input {
            position: absolute;
            opacity: 0;
            pointer-events: none;
        }

        .patient-type label {
            min-height: 105px;

            padding: 18px;

            display: flex;
            align-items: center;

            gap: 15px;

            background: #fbfcfd;

            border: 2px solid #e4eaee;
            border-radius: 16px;

            cursor: pointer;

            transition: 0.2s ease;
        }

        .patient-type label:hover {
            border-color: #b9dfd2;

            background: #f8fcfa;
        }

        .patient-type input:checked + label {
            background: var(--primary-soft);

            border-color: var(--primary);

            box-shadow:
                0 0 0 4px rgba(10,147,104,0.06);
        }

        .type-icon {
            width: 52px;
            height: 52px;

            display: flex;
            align-items: center;
            justify-content: center;

            flex-shrink: 0;

            background: white;

            border: 1px solid #e4ece8;
            border-radius: 14px;

            color: var(--primary);
        }

        .type-title {
            font-size: 15px;
            font-weight: 800;
        }

        .type-description {
            margin-top: 5px;

            color: var(--muted);

            font-size: 11px;
            line-height: 1.5;
        }

        /* =========================
           FORM SECTIONS
        ========================= */

        .form-section {
            margin-bottom: 22px;

            padding: 20px;

            background: #fafcfd;

            border: 1px solid #e8eef2;
            border-radius: 16px;
        }

        .form-section-title {
            display: flex;
            align-items: center;

            gap: 8px;

            margin-bottom: 18px;

            font-size: 15px;
            font-weight: 800;
        }

        .form-section-title svg {
            color: var(--primary);
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);

            gap: 16px;
        }

        .form-group {
            margin-bottom: 18px;
        }

        .form-group:last-child {
            margin-bottom: 0;
        }

        label.field-label {
            display: block;

            margin-bottom: 8px;

            font-size: 13px;
            font-weight: 700;
        }

        .required {
            color: var(--danger);
        }

        input,
        select,
        textarea {
            width: 100%;

            padding: 13px 14px;

            border: 1px solid #dbe3e8;
            border-radius: 11px;

            background: white;

            color: var(--text);

            font-family: Arial, sans-serif;
            font-size: 14px;

            transition: 0.2s ease;
        }

        select {
            height: 48px;
        }

        textarea {
            min-height: 120px;

            resize: vertical;
        }

        input:focus,
        select:focus,
        textarea:focus {
            outline: none;

            border-color: #8fd1ba;

            box-shadow:
                0 0 0 4px rgba(10,147,104,0.07);
        }

        input::placeholder,
        textarea::placeholder {
            color: #9aa4b2;
        }

        .error {
            margin-top: 6px;

            color: var(--danger);

            font-size: 12px;
            font-weight: 600;
        }

        .hidden {
            display: none;
        }

        /* =========================
           FOOTER
        ========================= */

        .form-footer {
            padding-top: 22px;

            border-top: 1px solid #edf1f3;

            display: flex;
            justify-content: space-between;
            align-items: center;

            gap: 15px;
        }

        .footer-note {
            color: var(--muted);

            font-size: 12px;
            line-height: 1.5;
        }

        .submit-btn {
            min-height: 48px;

            display: inline-flex;
            align-items: center;
            justify-content: center;

            gap: 9px;

            padding: 0 20px;

            background:
                linear-gradient(
                    135deg,
                    #0a9368,
                    #0bb783
                );

            color: white;

            border: none;
            border-radius: 12px;

            font-size: 14px;
            font-weight: 800;

            cursor: pointer;

            box-shadow:
                0 8px 20px rgba(10,147,104,0.16);

            transition: 0.2s ease;
        }

        .submit-btn:hover {
            transform: translateY(-1px);

            background:
                linear-gradient(
                    135deg,
                    #087553,
                    #0aa676
                );

            box-shadow:
                0 10px 25px rgba(10,147,104,0.22);
        }

        /* =========================
           RESPONSIVE
        ========================= */

        @media(max-width: 850px) {

            .steps {
                grid-template-columns: 1fr;
            }

            .patient-type-grid,
            .form-grid {
                grid-template-columns: 1fr;
            }

            .hero-icon {
                display: none;
            }

        }

        @media(max-width: 700px) {

            .page {
                padding: 14px;
            }

            .main-navbar {
                flex-direction: column;
                align-items: flex-start;
            }

            .navbar-logo {
                width: 145px;
                height: auto;
            }

            .navbar-divider,
            .navbar-portal {
                display: none;
            }

            .back-btn {
                width: 100%;
            }

            .hero {
                padding: 24px;
            }

            .hero h1 {
                font-size: 25px;
            }

            .form-card {
                padding: 18px;
            }

            .form-footer {
                flex-direction: column;
                align-items: stretch;
            }

            .submit-btn {
                width: 100%;
            }

        }
    </style>

</head>

<body>

<div class="page">

    <!-- NAVBAR -->

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
            href="{{ route('nurse.dashboard') }}"
            class="back-btn"
        >
            <svg
                width="17"
                height="17"
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="2"
            >
                <path d="M19 12H5"></path>
                <path d="M12 19l-7-7 7-7"></path>
            </svg>

            Nurse Workspace
        </a>

    </div>


    <!-- HERO -->

    <div class="hero">

        <div>

            <div class="hero-badge">
                <span></span>
                Walk-in Registration
            </div>

            <h1>
                Add Patient to Today's Queue
            </h1>

            <p>
                Register a patient who arrived without a prior appointment.
                Existing patients can be selected directly, while first-time
                visitors can be registered before being added to the queue.
            </p>

        </div>


        <div class="hero-icon">

            <svg
                width="48"
                height="48"
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="1.8"
            >
                <circle cx="9" cy="7" r="4"></circle>
                <path d="M2 21v-2a7 7 0 0 1 14 0v2"></path>
                <path d="M19 8v6"></path>
                <path d="M16 11h6"></path>
            </svg>

        </div>

    </div>


    <!-- STEPS -->

    <div class="steps">

        <div class="step">

            <div class="step-number">
                1
            </div>

            <div>
                <div class="step-title">
                    Patient
                </div>

                <div class="step-subtitle">
                    Select or register patient
                </div>
            </div>

        </div>


        <div class="step">

            <div class="step-number">
                2
            </div>

            <div>
                <div class="step-title">
                    Visit
                </div>

                <div class="step-subtitle">
                    Assign doctor and reason
                </div>
            </div>

        </div>


        <div class="step">

            <div class="step-number">
                3
            </div>

            <div>
                <div class="step-title">
                    Queue
                </div>

                <div class="step-subtitle">
                    Generate today's token
                </div>
            </div>

        </div>

    </div>


    <!-- FORM -->

    <div class="form-card">

        <form
            method="POST"
            action="{{ route('nurse.walkins.store') }}"
        >

            @csrf


            <!-- PATIENT TYPE -->

            <div class="section-heading">

                <span class="section-mark"></span>

                <div>

                    <div class="section-title">
                        Patient Type
                    </div>

                    <div class="section-description">
                        Choose whether the patient already exists in the system
                    </div>

                </div>

            </div>


            <div class="patient-type-grid">


                <!-- EXISTING -->

                <div class="patient-type">

                    <input
                        type="radio"
                        name="patient_type"
                        value="existing"
                        id="existing_patient"
                        {{ old('patient_type', 'existing') === 'existing' ? 'checked' : '' }}
                    >

                    <label for="existing_patient">

                        <div class="type-icon">

                            <svg
                                width="25"
                                height="25"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2"
                            >
                                <circle cx="12" cy="8" r="4"></circle>
                                <path d="M4 21a8 8 0 0 1 16 0"></path>
                            </svg>

                        </div>

                        <div>

                            <div class="type-title">
                                Existing Patient
                            </div>

                            <div class="type-description">
                                Select a patient who already has an account in MediCare24.
                            </div>

                        </div>

                    </label>

                </div>


                <!-- NEW -->

                <div class="patient-type">

                    <input
                        type="radio"
                        name="patient_type"
                        value="new"
                        id="new_patient"
                        {{ old('patient_type') === 'new' ? 'checked' : '' }}
                    >

                    <label for="new_patient">

                        <div class="type-icon">

                            <svg
                                width="25"
                                height="25"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2"
                            >
                                <circle cx="9" cy="7" r="4"></circle>
                                <path d="M2 21a7 7 0 0 1 14 0"></path>
                                <path d="M19 8v6"></path>
                                <path d="M16 11h6"></path>
                            </svg>

                        </div>

                        <div>

                            <div class="type-title">
                                New Patient
                            </div>

                            <div class="type-description">
                                Register a first-time visitor and add them directly to today's queue.
                            </div>

                        </div>

                    </label>

                </div>

            </div>


            <!-- EXISTING PATIENT SECTION -->

            <div
                id="existingPatientSection"
                class="form-section"
            >

                <div class="form-section-title">

                    <svg
                        width="18"
                        height="18"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                    >
                        <circle cx="12" cy="8" r="4"></circle>
                        <path d="M4 21a8 8 0 0 1 16 0"></path>
                    </svg>

                    Patient Information

                </div>


                <div class="form-group">

                    <label
                        for="patient_id"
                        class="field-label"
                    >
                        Select Patient
                        <span class="required">*</span>
                    </label>


                    <select
                        name="patient_id"
                        id="patient_id"
                    >

                        <option value="">
                            Choose an existing patient
                        </option>


                        @foreach($patients as $patient)

                            <option
                                value="{{ $patient->id }}"
                                {{ old('patient_id') == $patient->id ? 'selected' : '' }}
                            >

                                {{ $patient->name }}
                                — {{ $patient->email }}

                            </option>

                        @endforeach

                    </select>


                    @error('patient_id')

                        <div class="error">
                            {{ $message }}
                        </div>

                    @enderror

                </div>

            </div>


            <!-- NEW PATIENT SECTION -->

            <div
                id="newPatientSection"
                class="form-section hidden"
            >

                <div class="form-section-title">

                    <svg
                        width="18"
                        height="18"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                    >
                        <circle cx="9" cy="7" r="4"></circle>
                        <path d="M2 21a7 7 0 0 1 14 0"></path>
                        <path d="M19 8v6"></path>
                        <path d="M16 11h6"></path>
                    </svg>

                    New Patient Information

                </div>


                <div class="form-grid">


                    <div class="form-group">

                        <label
                            for="new_patient_name"
                            class="field-label"
                        >
                            Full Name
                            <span class="required">*</span>
                        </label>


                        <input
                            type="text"
                            name="new_patient_name"
                            id="new_patient_name"
                            value="{{ old('new_patient_name') }}"
                            placeholder="Enter patient's full name"
                        >


                        @error('new_patient_name')

                            <div class="error">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>


                    <div class="form-group">

                        <label
                            for="new_patient_email"
                            class="field-label"
                        >
                            Email Address
                            <span class="required">*</span>
                        </label>


                        <input
                            type="email"
                            name="new_patient_email"
                            id="new_patient_email"
                            value="{{ old('new_patient_email') }}"
                            placeholder="patient@example.com"
                        >


                        @error('new_patient_email')

                            <div class="error">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>

                </div>

            </div>


            <!-- VISIT DETAILS -->

            <div class="form-section">

                <div class="form-section-title">

                    <svg
                        width="18"
                        height="18"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                    >
                        <rect x="4" y="3" width="16" height="18" rx="2"></rect>
                        <path d="M8 7h8"></path>
                        <path d="M8 11h8"></path>
                    </svg>

                    Visit Details

                </div>


                <div class="form-group">

                    <label
                        for="doctor_id"
                        class="field-label"
                    >
                        Assign Doctor
                        <span class="required">*</span>
                    </label>


                    <select
                        name="doctor_id"
                        id="doctor_id"
                        required
                    >

                        <option value="">
                            Select doctor for consultation
                        </option>


                        @foreach($doctors as $doctor)

                            <option
                                value="{{ $doctor->id }}"
                                {{ old('doctor_id') == $doctor->id ? 'selected' : '' }}
                            >

                                {{ $doctor->user?->name }}

                                @if($doctor->specialization)

                                    — {{ $doctor->specialization }}

                                @endif

                            </option>

                        @endforeach

                    </select>


                    @error('doctor_id')

                        <div class="error">
                            {{ $message }}
                        </div>

                    @enderror

                </div>


                <div class="form-group">

                    <label
                        for="reason_for_visit"
                        class="field-label"
                    >
                        Reason for Visit
                        <span class="required">*</span>
                    </label>


                    <textarea
                        name="reason_for_visit"
                        id="reason_for_visit"
                        placeholder="Briefly describe the patient's reason for today's visit..."
                        required
                    >{{ old('reason_for_visit') }}</textarea>


                    @error('reason_for_visit')

                        <div class="error">
                            {{ $message }}
                        </div>

                    @enderror

                </div>

            </div>


            <!-- FOOTER -->

            <div class="form-footer">

                <div class="footer-note">
                    The patient will automatically receive the next available token for the selected doctor.
                </div>


                <button
                    type="submit"
                    class="submit-btn"
                >
                    <svg
                        width="18"
                        height="18"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                    >
                        <path d="M12 5v14"></path>
                        <path d="M5 12h14"></path>
                    </svg>

                    Add Patient to Queue

                    <span>→</span>

                </button>

            </div>

        </form>

    </div>

</div>


<script>

    const existingRadio =
        document.getElementById('existing_patient');

    const newRadio =
        document.getElementById('new_patient');

    const existingSection =
        document.getElementById('existingPatientSection');

    const newSection =
        document.getElementById('newPatientSection');

    const patientSelect =
        document.getElementById('patient_id');

    const newPatientName =
        document.getElementById('new_patient_name');

    const newPatientEmail =
        document.getElementById('new_patient_email');


    function updatePatientType()
    {
        if (newRadio.checked) {

            newSection.classList.remove('hidden');

            existingSection.classList.add('hidden');

            patientSelect.required = false;

            newPatientName.required = true;

            newPatientEmail.required = true;

        } else {

            existingSection.classList.remove('hidden');

            newSection.classList.add('hidden');

            patientSelect.required = true;

            newPatientName.required = false;

            newPatientEmail.required = false;
        }
    }


    existingRadio.addEventListener(
        'change',
        updatePatientType
    );

    newRadio.addEventListener(
        'change',
        updatePatientType
    );


    updatePatientType();

</script>

</body>

</html>