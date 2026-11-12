<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Doctor Profile</title>

    <style>
        * {
            box-sizing: border-box;
        }

        :root {
            --primary: #0a9368;
            --primary-dark: #087553;
            --primary-soft: #e7f8f2;

            --blue: #2589c8;
            --blue-soft: #edf6fd;

            --text: #182236;
            --muted: #758197;
            --border: #e5ebef;
            --background: #f5f7fa;
            --red: #dc3545;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            color: var(--text);

            background:
                radial-gradient(circle at top left, #ddfaf1 0%, transparent 25%),
                radial-gradient(circle at top right, #edf4ff 0%, transparent 28%),
                var(--background);
        }

        a {
            text-decoration: none;
        }

        .page {
            max-width: 1250px;
            margin: auto;
            padding: 28px;
        }

        /* NAVBAR */

        .main-navbar {
            width: 100%;

            background: rgba(255,255,255,.97);

            border: 1px solid var(--border);
            border-radius: 20px;

            padding: 16px 22px;

            display: flex;
            align-items: center;
            justify-content: space-between;

            gap: 24px;

            margin-bottom: 24px;

            box-shadow:
                0 8px 28px rgba(31,41,55,.04);
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

            background: #e4e9ed;
        }

        .navbar-title {
            font-size: 20px;
            font-weight: 800;
        }

        .navbar-subtitle {
            color: var(--muted);
            font-size: 13px;

            margin-top: 5px;
        }

        .back-btn {
            height: 46px;

            display: inline-flex;
            align-items: center;
            justify-content: center;

            gap: 8px;

            padding: 0 17px;

            background: #effaf6;
            color: var(--primary);

            border: 1px solid #c8e9dc;
            border-radius: 11px;

            font-size: 13px;
            font-weight: 700;
        }

        .back-btn:hover {
            background: var(--primary);
            color: white;
        }

        /* HERO */

        .hero {
            background:
                linear-gradient(
                    120deg,
                    rgba(222,250,241,.98),
                    rgba(237,247,255,.98),
                    rgba(247,243,255,.95)
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

            background: #10b57d;
            border-radius: 50%;
        }

        .hero h1 {
            margin: 0;

            font-size: 30px;
            font-weight: 800;
        }

        .hero p {
            color: #637186;

            margin: 10px 0 0;

            line-height: 1.7;

            font-size: 14px;
        }

        .doctor-icon {
            width: 90px;
            height: 90px;

            flex-shrink: 0;

            display: flex;
            align-items: center;
            justify-content: center;

            background: rgba(255,255,255,.75);

            border: 1px solid #dcebe6;
            border-radius: 25px;

            color: var(--primary);
        }

        /* LAYOUT */

        .layout {
            display: grid;

            grid-template-columns: 1.5fr .7fr;

            gap: 22px;

            align-items: start;
        }

        .card {
            background: white;

            border: 1px solid var(--border);
            border-radius: 20px;

            padding: 26px;

            box-shadow:
                0 8px 30px rgba(31,41,55,.035);
        }

        .section-heading {
            display: flex;
            align-items: flex-start;
            gap: 11px;

            margin-bottom: 22px;
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
            font-size: 20px;
            font-weight: 800;
        }

        .section-description {
            color: var(--muted);

            font-size: 12px;

            margin-top: 4px;
        }

        /* FORM */

        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);

            gap: 17px;
        }

        .form-group {
            margin-bottom: 18px;
        }

        .form-group.full {
            grid-column: 1 / -1;
        }

        label {
            display: block;

            font-size: 13px;
            font-weight: 700;

            margin-bottom: 8px;
        }

        input,
        textarea {
            width: 100%;

            padding: 13px 14px;

            border: 1px solid #dbe3e8;
            border-radius: 11px;

            font-family: Arial, sans-serif;
            font-size: 14px;

            background: #fbfcfd;

            transition: .2s;
        }

        textarea {
            min-height: 150px;

            resize: vertical;
        }

        input:focus,
        textarea:focus {
            outline: none;

            border-color: #91d3bc;

            background: white;

            box-shadow:
                0 0 0 4px rgba(10,147,104,.07);
        }

        .input-prefix {
            position: relative;
        }

        .input-prefix .prefix {
            position: absolute;

            left: 14px;
            top: 50%;

            transform: translateY(-50%);

            color: #7d8998;

            font-size: 13px;
            font-weight: 700;
        }

        .input-prefix input {
            padding-left: 42px;
        }

        .error {
            color: var(--red);

            font-size: 12px;
            font-weight: 600;

            margin-top: 6px;
        }

        /* READ ONLY */

        .readonly-title {
            font-size: 16px;
            font-weight: 800;

            margin-bottom: 18px;
        }

        .readonly-row {
            padding: 15px 0;

            border-bottom: 1px solid #edf1f3;
        }

        .readonly-row:first-of-type {
            padding-top: 0;
        }

        .readonly-label {
            color: var(--muted);

            font-size: 11px;
            font-weight: 700;

            text-transform: uppercase;

            margin-bottom: 6px;
        }

        .readonly-value {
            font-size: 15px;
            font-weight: 800;
        }

        .verified {
            color: var(--primary);
        }

        .notice {
            margin-top: 20px;

            padding: 14px;

            background: #f0faf6;

            border: 1px solid #d9ede4;
            border-radius: 12px;

            color: #627084;

            font-size: 12px;
            line-height: 1.6;
        }

        /* FOOTER */

        .form-footer {
            display: flex;
            justify-content: flex-end;
            align-items: center;

            gap: 10px;

            padding-top: 22px;

            border-top: 1px solid #edf1f3;

            margin-top: 5px;
        }

        .cancel-btn,
        .save-btn {
            min-height: 46px;

            display: inline-flex;
            align-items: center;
            justify-content: center;

            gap: 8px;

            padding: 0 18px;

            border-radius: 11px;

            font-size: 13px;
            font-weight: 700;
        }

        .cancel-btn {
            color: #5f6b7c;

            background: #f4f7f8;

            border: 1px solid #e2e8eb;
        }

        .cancel-btn:hover {
            background: #e9eef1;
        }

        .save-btn {
            border: none;

            background:
                linear-gradient(
                    135deg,
                    #0a9368,
                    #0bb783
                );

            color: white;

            cursor: pointer;

            box-shadow:
                0 7px 18px rgba(10,147,104,.15);
        }

        .save-btn:hover {
            background:
                linear-gradient(
                    135deg,
                    #087553,
                    #0aa676
                );
        }

        @media(max-width: 900px) {

            .layout {
                grid-template-columns: 1fr;
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

            .navbar-divider,
            .navbar-portal {
                display: none;
            }

            .navbar-logo {
                width: 145px;
                height: auto;
            }

            .back-btn {
                width: 100%;
            }

            .hero {
                padding: 24px;
            }

            .doctor-icon {
                display: none;
            }

            .form-grid {
                grid-template-columns: 1fr;
            }

            .form-group.full {
                grid-column: auto;
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
                    Doctor Portal
                </div>

                <div class="navbar-subtitle">
                    Medical Profile & Clinical Credentials
                </div>

            </div>

        </div>


        <a
            href="{{ route('doctor.profile') }}"
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

            Back to Profile

        </a>

    </div>


    <!-- HERO -->

    <div class="hero">

        <div>

            <div class="hero-badge">
                <span></span>
                Profile Settings
            </div>

            <h1>
                Edit Professional Profile
            </h1>

            <p>
                Keep your clinical information accurate and up to date.
                Administrative and verified credentials remain protected.
            </p>

        </div>


        <div class="doctor-icon">

            <svg
                width="44"
                height="44"
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="1.8"
            >
                <circle cx="12" cy="7" r="4"></circle>
                <path d="M5 21v-2a7 7 0 0 1 14 0v2"></path>
                <path d="M8 14v2"></path>
                <path d="M16 14v2"></path>
            </svg>

        </div>

    </div>


    <div class="layout">


        <!-- EDIT FORM -->

        <div class="card">

            <div class="section-heading">

                <span class="section-mark"></span>

                <div>

                    <div class="section-title">
                        Professional Information
                    </div>

                    <div class="section-description">
                        Update the information displayed in your doctor profile
                    </div>

                </div>

            </div>


            <form
                method="POST"
                action="{{ route('doctor.profile.update') }}"
            >

                @csrf
                @method('PUT')


                <div class="form-grid">


                    <!-- EMAIL -->

                    <div class="form-group">

                        <label for="email">
                            Email Address
                        </label>

                        <input
                            type="email"
                            name="email"
                            id="email"
                            value="{{ old('email', $doctor->user->email) }}"
                            required
                        >

                        @error('email')
                            <div class="error">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    <!-- QUALIFICATION -->

                    <div class="form-group">

                        <label for="qualification">
                            Qualification
                        </label>

                        <input
                            type="text"
                            name="qualification"
                            id="qualification"
                            value="{{ old('qualification', $doctor->qualification) }}"
                            placeholder="e.g. MBBS (Sri Lanka)"
                        >

                        @error('qualification')
                            <div class="error">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    <!-- SPECIALIZATION -->

                    <div class="form-group">

                        <label for="specialization">
                            Specialization
                        </label>

                        <input
                            type="text"
                            name="specialization"
                            id="specialization"
                            value="{{ old('specialization', $doctor->specialization) }}"
                            placeholder="e.g. General Physician"
                        >

                        @error('specialization')
                            <div class="error">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    <!-- ROOM -->

                    <div class="form-group">

                        <label for="room_number">
                            Consultation Room
                        </label>

                        <input
                            type="text"
                            name="room_number"
                            id="room_number"
                            value="{{ old('room_number', $doctor->room_number) }}"
                            placeholder="e.g. Room 01"
                        >

                        @error('room_number')
                            <div class="error">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    <!-- FEE -->

                    <div class="form-group">

                        <label for="consultation_fee">
                            Consultation Fee
                        </label>

                        <div class="input-prefix">

                            <span class="prefix">
                                Rs.
                            </span>

                            <input
                                type="number"
                                step="0.01"
                                min="0"
                                name="consultation_fee"
                                id="consultation_fee"
                                value="{{ old('consultation_fee', $doctor->consultation_fee) }}"
                                placeholder="0.00"
                            >

                        </div>

                        @error('consultation_fee')
                            <div class="error">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    <!-- BIO -->

                    <div class="form-group full">

                        <label for="bio">
                            About Doctor
                        </label>

                        <textarea
                            name="bio"
                            id="bio"
                            placeholder="Write a short professional introduction..."
                        >{{ old('bio', $doctor->bio) }}</textarea>

                        @error('bio')
                            <div class="error">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                </div>


                <div class="form-footer">

                    <a
                        href="{{ route('doctor.profile') }}"
                        class="cancel-btn"
                    >
                        Cancel
                    </a>


                    <button
                        type="submit"
                        class="save-btn"
                    >
                        <svg
                            width="17"
                            height="17"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                        >
                            <path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path>
                            <polyline points="17 21 17 13 7 13 7 21"></polyline>
                            <polyline points="7 3 7 8 15 8"></polyline>
                        </svg>

                        Save Changes
                    </button>

                </div>

            </form>

        </div>


        <!-- PROTECTED INFO -->

        <div class="card">

            <div class="readonly-title">
                Protected Credentials
            </div>


            <div class="readonly-row">

                <div class="readonly-label">
                    Doctor Name
                </div>

                <div class="readonly-value">
                    {{ $doctor->user->name }}
                </div>

            </div>


            <div class="readonly-row">

                <div class="readonly-label">
                    Medical License
                </div>

                <div class="readonly-value">
                    {{ $doctor->license_number ?? 'Not Available' }}
                </div>

            </div>


            <div class="readonly-row">

                <div class="readonly-label">
                    Account Role
                </div>

                <div class="readonly-value">
                    Doctor
                </div>

            </div>


            <div class="readonly-row">

                <div class="readonly-label">
                    Verification Status
                </div>

                <div class="readonly-value verified">
                    ✓ Verified
                </div>

            </div>


            <div class="notice">

                Medical license, account role, name and verification
                status are protected administrative information and
                cannot be changed from the doctor portal.

            </div>

        </div>

    </div>

</div>

</body>

</html>