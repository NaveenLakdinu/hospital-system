<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Create Prescription</title>

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

        .page {
            max-width: 1250px;
            margin: auto;
            padding: 28px;
        }

        a {
            text-decoration: none;
        }

        .topbar {
            background: rgba(255,255,255,.96);

            border: 1px solid var(--border);
            border-radius: 18px;

            padding: 18px 22px;

            display: flex;
            justify-content: space-between;
            align-items: center;

            margin-bottom: 22px;

            box-shadow: 0 8px 28px rgba(31,41,55,.04);
        }

        .topbar-title {
            font-size: 20px;
            font-weight: 800;
        }

        .topbar-subtitle {
            margin-top: 5px;

            color: var(--muted);
            font-size: 13px;
        }

        .back-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;

            padding: 11px 16px;

            background: #effaf6;
            color: var(--primary);

            border: 1px solid #c9e9dc;
            border-radius: 10px;

            font-size: 13px;
            font-weight: 700;
        }

        .back-btn:hover {
            background: var(--primary);
            color: white;
        }

        .hero {
            background:
                linear-gradient(
                    120deg,
                    rgba(220,250,240,.96),
                    rgba(239,248,255,.96),
                    rgba(247,242,255,.93)
                );

            border: 1px solid #dcefe8;
            border-radius: 24px;

            padding: 28px 30px;

            margin-bottom: 22px;
        }

        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 7px;

            background: #d9f8eb;
            color: #087a59;

            padding: 7px 12px;

            border-radius: 100px;

            font-size: 12px;
            font-weight: 700;

            margin-bottom: 12px;
        }

        .hero-badge span {
            width: 8px;
            height: 8px;

            border-radius: 50%;

            background: #11b67d;
        }

        .hero h1 {
            margin: 0;

            font-size: 30px;
        }

        .hero p {
            margin: 9px 0 0;

            color: #667386;
        }

        .info-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);

            gap: 14px;

            margin-top: 20px;
        }

        .info-box {
            background: rgba(255,255,255,.8);

            border: 1px solid #e0ebe7;
            border-radius: 12px;

            padding: 14px;
        }

        .info-label {
            color: #8a95a6;

            font-size: 11px;
            font-weight: 700;

            margin-bottom: 6px;

            text-transform: uppercase;
        }

        .info-value {
            font-weight: 700;
            line-height: 1.4;
        }

        .layout {
            display: grid;
            grid-template-columns: .85fr 1.4fr;

            gap: 22px;

            align-items: start;
        }

        .card {
            background: rgba(255,255,255,.97);

            border: 1px solid var(--border);
            border-radius: 20px;

            padding: 24px;

            box-shadow: 0 8px 30px rgba(31,41,55,.035);
        }

        .section-title {
            display: flex;
            gap: 11px;
            align-items: center;

            margin-bottom: 20px;
        }

        .section-mark {
            width: 5px;
            height: 28px;

            border-radius: 20px;

            background: linear-gradient(
                to bottom,
                #17c991,
                #26a4dc
            );
        }

        .section-title h2 {
            margin: 0;

            font-size: 21px;
        }

        .section-title p {
            margin: 4px 0 0;

            color: var(--muted);
            font-size: 12px;
        }

        .diagnosis-box {
            background: #f5faf8;

            border: 1px solid #e0eee8;
            border-radius: 13px;

            padding: 16px;

            margin-bottom: 13px;
        }

        .small-label {
            color: #8b95a5;

            font-size: 11px;
            font-weight: 700;

            margin-bottom: 7px;

            text-transform: uppercase;
        }

        .small-value {
            color: #334155;

            font-size: 14px;
            line-height: 1.6;

            font-weight: 600;
        }

        .form-group {
            margin-bottom: 18px;
        }

        label {
            display: block;

            font-size: 14px;
            font-weight: 700;

            margin-bottom: 8px;
        }

        input,
        textarea {
            width: 100%;

            padding: 13px 14px;

            border: 1px solid #dbe2e8;
            border-radius: 10px;

            font-family: Arial, sans-serif;
            font-size: 14px;

            background: #fbfcfd;

            transition: .2s;
        }

        textarea {
            min-height: 110px;
            resize: vertical;
        }

        input:focus,
        textarea:focus {
            outline: none;

            border-color: #92d4bd;

            background: white;

            box-shadow: 0 0 0 4px rgba(10,147,104,.07);
        }

        .two-column {
            display: grid;
            grid-template-columns: repeat(2, 1fr);

            gap: 14px;
        }

        .error {
            color: #dc3545;

            font-size: 12px;
            font-weight: 600;

            margin-top: 6px;
        }

        .submit-row {
            display: flex;
            justify-content: flex-end;

            margin-top: 10px;
        }

        .submit-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;

            border: none;

            background: var(--primary);
            color: white;

            padding: 12px 18px;

            border-radius: 10px;

            font-size: 14px;
            font-weight: 700;

            cursor: pointer;
        }

        .submit-btn:hover {
            background: var(--primary-dark);
        }

        @media(max-width: 900px) {

            .layout {
                grid-template-columns: 1fr;
            }

            .info-grid,
            .two-column {
                grid-template-columns: 1fr;
            }

        }

        @media(max-width: 600px) {

            .page {
                padding: 14px;
            }

            .topbar {
                flex-direction: column;
                align-items: flex-start;

                gap: 13px;
            }

            .submit-btn {
                width: 100%;
            }

        }
    </style>

</head>

<body>

<div class="page">

    <!-- TOP BAR -->

    <div class="topbar">

        <div>

            <div class="topbar-title">
                Create Prescription
            </div>

            <div class="topbar-subtitle">
                Complete the patient's medication plan
            </div>

        </div>


        <a
            href="{{ route(
                'doctor.consultation.show',
                $consultation->appointment_id
            ) }}"
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

            Back to Consultation

        </a>

    </div>


    <!-- HERO -->

    <div class="hero">

        <div class="hero-badge">
            <span></span>
            Prescription Preparation
        </div>


        <h1>
            {{ $consultation->appointment->patient?->name ?? 'Patient' }}
        </h1>


        <p>
            Review the diagnosis and create the medication instructions for this consultation.
        </p>


        <div class="info-grid">

            <div class="info-box">

                <div class="info-label">
                    Token
                </div>

                <div class="info-value">
                    #{{ $consultation->appointment->token_number }}
                </div>

            </div>


            <div class="info-box">

                <div class="info-label">
                    Reason for Visit
                </div>

                <div class="info-value">
                    {{ $consultation->appointment->reason_for_visit }}
                </div>

            </div>


            <div class="info-box">

                <div class="info-label">
                    Diagnosis
                </div>

                <div class="info-value">
                    {{ $consultation->diagnosis }}
                </div>

            </div>

        </div>

    </div>


    <div class="layout">

        <!-- CONSULTATION SUMMARY -->

        <div class="card">

            <div class="section-title">

                <span class="section-mark"></span>

                <div>

                    <h2>
                        Consultation Summary
                    </h2>

                    <p>
                        Clinical information from this consultation
                    </p>

                </div>

            </div>


            <div class="diagnosis-box">

                <div class="small-label">
                    Diagnosis
                </div>

                <div class="small-value">
                    {{ $consultation->diagnosis }}
                </div>

            </div>


            <div class="diagnosis-box">

                <div class="small-label">
                    Consultation Notes
                </div>

                <div class="small-value">

                    {{ $consultation->consultation_notes
                        ?? 'No consultation notes recorded.'
                    }}

                </div>

            </div>

        </div>


        <!-- PRESCRIPTION FORM -->

        <div class="card">

            <div class="section-title">

                <span class="section-mark"></span>

                <div>

                    <h2>
                        Medication Details
                    </h2>

                    <p>
                        Enter medicine, dosage and treatment instructions
                    </p>

                </div>

            </div>


            <form
                method="POST"
                action="{{ route(
                    'doctor.prescription.store',
                    $consultation->id
                ) }}"
            >

                @csrf


                <div class="form-group">

                    <label for="medicine_name">
                        Medicine Name
                    </label>

                    <input
                        id="medicine_name"
                        type="text"
                        name="medicine_name"
                        value="{{ old('medicine_name') }}"
                        placeholder="e.g. Paracetamol 500 mg"
                        required
                    >

                    @error('medicine_name')
                        <div class="error">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                <div class="two-column">

                    <div class="form-group">

                        <label for="dosage">
                            Dosage
                        </label>

                        <input
                            id="dosage"
                            type="text"
                            name="dosage"
                            value="{{ old('dosage') }}"
                            placeholder="e.g. 500 mg"
                            required
                        >

                        @error('dosage')
                            <div class="error">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    <div class="form-group">

                        <label for="frequency">
                            Frequency
                        </label>

                        <input
                            id="frequency"
                            type="text"
                            name="frequency"
                            value="{{ old('frequency') }}"
                            placeholder="e.g. 3 times daily"
                            required
                        >

                        @error('frequency')
                            <div class="error">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                </div>


                <div class="form-group">

                    <label for="duration">
                        Duration
                    </label>

                    <input
                        id="duration"
                        type="text"
                        name="duration"
                        value="{{ old('duration') }}"
                        placeholder="e.g. 5 days"
                        required
                    >

                    @error('duration')
                        <div class="error">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                <div class="form-group">

                    <label for="instructions">
                        Instructions
                    </label>

                    <textarea
                        id="instructions"
                        name="instructions"
                        placeholder="e.g. Take after meals..."
                    >{{ old('instructions') }}</textarea>

                    @error('instructions')
                        <div class="error">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                <div class="submit-row">

                    <button
                        type="submit"
                        class="submit-btn"
                    >

                        Save Prescription

                        <span>→</span>

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

</body>

</html>