<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Add Walk-in Patient</title>

    <style>
        * {
            box-sizing: border-box;
        }

        :root {
            --primary: #0a9368;
            --primary-dark: #087553;
            --primary-soft: #e7f8f2;

            --blue: #2589c8;
            --blue-soft: #eaf5fd;

            --text: #182236;
            --muted: #758197;
            --border: #e6edf1;
            --bg: #f5f7fa;
            --red: #dc3545;
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
            max-width: 1000px;
            margin: auto;
            padding: 28px;
        }

        .topbar {
            background: white;

            border: 1px solid var(--border);
            border-radius: 18px;

            padding: 18px 22px;

            display: flex;
            justify-content: space-between;
            align-items: center;

            margin-bottom: 22px;

            box-shadow: 0 8px 28px rgba(31,41,55,.04);
        }

        .top-title {
            font-size: 21px;
            font-weight: 800;
        }

        .top-subtitle {
            color: var(--muted);
            font-size: 13px;
            margin-top: 5px;
        }

        .back-btn {
            text-decoration: none;

            display: inline-flex;
            align-items: center;
            gap: 8px;

            color: var(--primary);
            background: #effaf5;

            padding: 10px 14px;

            border: 1px solid #ccebdd;
            border-radius: 10px;

            font-weight: 700;
        }

        .hero {
            background:
                linear-gradient(
                    120deg,
                    #e4faf2,
                    #edf7ff
                );

            border: 1px solid #dcefe8;
            border-radius: 22px;

            padding: 28px;

            margin-bottom: 22px;
        }

        .badge {
            display: inline-flex;

            background: #d9f8eb;
            color: #087a59;

            border-radius: 100px;

            padding: 7px 11px;

            font-size: 12px;
            font-weight: 700;

            margin-bottom: 12px;
        }

        .hero h1 {
            margin: 0;

            font-size: 29px;
        }

        .hero p {
            color: #657387;

            line-height: 1.6;

            margin-bottom: 0;
        }

        .card {
            background: white;

            border: 1px solid var(--border);
            border-radius: 20px;

            padding: 26px;

            box-shadow: 0 8px 30px rgba(31,41,55,.04);
        }

        /* PATIENT TYPE */

        .patient-type-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);

            gap: 14px;

            margin-bottom: 26px;
        }

        .patient-type {
            position: relative;
        }

        .patient-type input {
            position: absolute;
            opacity: 0;
        }

        .patient-type label {
            display: block;

            padding: 18px;

            border: 2px solid #e4eaee;
            border-radius: 14px;

            cursor: pointer;

            transition: .2s;
        }

        .patient-type input:checked + label {
            border-color: var(--primary);

            background: var(--primary-soft);

            box-shadow:
                0 0 0 4px rgba(10,147,104,.06);
        }

        .type-title {
            font-size: 16px;
            font-weight: 800;

            margin-bottom: 6px;
        }

        .type-description {
            color: var(--muted);

            font-size: 12px;
            line-height: 1.5;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label.field-label {
            display: block;

            font-weight: 700;

            margin-bottom: 8px;
        }

        input,
        select,
        textarea {
            width: 100%;

            padding: 13px 14px;

            border: 1px solid #dbe3e8;
            border-radius: 11px;

            font-family: Arial, sans-serif;
            font-size: 14px;

            background: #fbfcfd;
        }

        textarea {
            min-height: 120px;

            resize: vertical;
        }

        input:focus,
        select:focus,
        textarea:focus {
            outline: none;

            border-color: #93d5be;

            background: white;

            box-shadow:
                0 0 0 4px rgba(10,147,104,.08);
        }

        .form-section {
            padding: 20px;

            background: #fafcfd;

            border: 1px solid #e9eef1;
            border-radius: 15px;

            margin-bottom: 22px;
        }

        .section-title {
            font-size: 16px;
            font-weight: 800;

            margin-bottom: 17px;
        }

        .hidden {
            display: none;
        }

        .error {
            color: var(--red);

            font-size: 13px;

            margin-top: 6px;
        }

        .btn {
            border: 0;

            display: inline-flex;
            align-items: center;
            gap: 8px;

            background: var(--primary);
            color: white;

            padding: 12px 18px;

            border-radius: 10px;

            font-size: 14px;
            font-weight: 700;

            cursor: pointer;
        }

        .btn:hover {
            background: var(--primary-dark);
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

            .patient-type-grid {
                grid-template-columns: 1fr;
            }

        }
    </style>

</head>

<body>

<div class="page">

    <div class="topbar">

        <div>

            <div class="top-title">
                Add Walk-in Patient
            </div>

            <div class="top-subtitle">
                Add an existing patient or register a completely new patient
            </div>

        </div>


        <a
            href="{{ route('nurse.dashboard') }}"
            class="back-btn"
        >
            ← Back to Dashboard
        </a>

    </div>


    <div class="hero">

        <span class="badge">
            WALK-IN REGISTRATION
        </span>

        <h1>
            Add Patient to Today's Queue
        </h1>

        <p>
            Choose whether this patient already has an account
            or is visiting the clinic for the first time.
        </p>

    </div>


    <div class="card">

        <form
            method="POST"
            action="{{ route('nurse.walkins.store') }}"
        >

            @csrf


            <!-- PATIENT TYPE -->

            <div class="patient-type-grid">

                <div class="patient-type">

                    <input
                        type="radio"
                        name="patient_type"
                        value="existing"
                        id="existing_patient"
                        {{ old('patient_type', 'existing') === 'existing' ? 'checked' : '' }}
                    >

                    <label for="existing_patient">

                        <div class="type-title">
                            Existing Patient
                        </div>

                        <div class="type-description">
                            Patient already has an account in the system.
                        </div>

                    </label>

                </div>


                <div class="patient-type">

                    <input
                        type="radio"
                        name="patient_type"
                        value="new"
                        id="new_patient"
                        {{ old('patient_type') === 'new' ? 'checked' : '' }}
                    >

                    <label for="new_patient">

                        <div class="type-title">
                            + New Patient
                        </div>

                        <div class="type-description">
                            Register a first-time patient and add them to today's queue.
                        </div>

                    </label>

                </div>

            </div>


            <!-- EXISTING PATIENT -->

            <div
                id="existingPatientSection"
                class="form-section"
            >

                <div class="section-title">
                    Select Existing Patient
                </div>


                <div class="form-group">

                    <label
                        for="patient_id"
                        class="field-label"
                    >
                        Patient
                    </label>

                    <select
                        name="patient_id"
                        id="patient_id"
                    >

                        <option value="">
                            Select Patient
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


            <!-- NEW PATIENT -->

            <div
                id="newPatientSection"
                class="form-section hidden"
            >

                <div class="section-title">
                    New Patient Information
                </div>


                <div class="form-group">

                    <label
                        for="new_patient_name"
                        class="field-label"
                    >
                        Full Name
                    </label>

                    <input
                        type="text"
                        name="new_patient_name"
                        id="new_patient_name"
                        value="{{ old('new_patient_name') }}"
                        placeholder="Enter patient full name"
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


            <!-- DOCTOR -->

            <div class="form-group">

                <label
                    for="doctor_id"
                    class="field-label"
                >
                    Select Doctor
                </label>

                <select
                    name="doctor_id"
                    id="doctor_id"
                    required
                >

                    <option value="">
                        Select Doctor
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


            <!-- REASON -->

            <div class="form-group">

                <label
                    for="reason_for_visit"
                    class="field-label"
                >
                    Reason for Visit
                </label>

                <textarea
                    name="reason_for_visit"
                    id="reason_for_visit"
                    placeholder="Enter reason for visit..."
                    required
                >{{ old('reason_for_visit') }}</textarea>


                @error('reason_for_visit')

                    <div class="error">
                        {{ $message }}
                    </div>

                @enderror

            </div>


            <button
                type="submit"
                class="btn"
            >
                + Add Patient to Today's Queue
            </button>

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


    function updatePatientType()
    {
        if (newRadio.checked) {

            newSection.classList.remove('hidden');

            existingSection.classList.add('hidden');

        } else {

            existingSection.classList.remove('hidden');

            newSection.classList.add('hidden');

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