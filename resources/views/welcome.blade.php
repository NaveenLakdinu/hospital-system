<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MediCare24 — Medical Appointment Scheduling Software</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@500;600;700;800&family=IBM+Plex+Sans:wght@400;500&display=swap" rel="stylesheet">
    <style>
        :root {
            --ink: #0E1B2C;
            --blue: #1B5FA8;
            --blue-dark: #144a86;
            --teal: #21C7A8;
            --muted: #C7D3E0;
            --white: #FFFFFF;
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'IBM Plex Sans', sans-serif;
            background: var(--ink);
        }

        /* ---------- Hero ---------- */
        .hero {
            position: relative;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            overflow: hidden;
        }

        .hero__bg {
            position: absolute;
            inset: 0;
            background-image:
                linear-gradient(100deg, rgba(10,20,35,.94) 0%, rgba(10,20,35,.82) 30%, rgba(10,20,35,.45) 58%, rgba(10,20,35,.15) 78%),
                url('https://images.unsplash.com/photo-1622253692010-333f2da6031d?q=80&w=1800&auto=format&fit=crop');
            background-size: cover;
            background-position: center right;
            z-index: 0;
        }

        /* ---------- Hero content ---------- */
        .hero__content {
            position: relative;
            z-index: 5;
            flex: 1;
            display: flex;
            align-items: center;
            padding: 40px 48px 100px;
        }

        .hero__inner { max-width: 600px; }

        .hero__headline {
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-weight: 700;
            font-size: 52px;
            line-height: 1.12;
            letter-spacing: -0.02em;
            color: var(--white);
        }

        .hero__headline .accent { color: var(--teal); }

        .hero__sub {
            margin-top: 24px;
            font-size: 17px;
            line-height: 1.65;
            color: rgba(255,255,255,0.75);
            max-width: 480px;
        }

        .hero__actions {
            margin-top: 36px;
            display: flex;
            align-items: center;
            gap: 16px;
            flex-wrap: wrap;
        }

        .btn-primary {
            background: var(--blue);
            color: var(--white);
            border: none;
            padding: 15px 28px;
            border-radius: 999px;
            font-size: 15px;
            font-weight: 600;
            text-decoration: none;
            display: inline-block;
            box-shadow: 0 12px 28px rgba(27, 95, 168, 0.4);
            transition: transform .2s ease, background .2s ease;
        }

        .btn-primary:hover {
            background: var(--blue-dark);
            transform: translateY(-2px);
        }

        .btn-secondary {
            color: var(--white);
            border: 1px solid rgba(255,255,255,0.35);
            padding: 15px 26px;
            border-radius: 999px;
            font-size: 15px;
            font-weight: 600;
            text-decoration: none;
            display: inline-block;
            transition: border-color .2s ease, background .2s ease;
        }

        .btn-secondary:hover {
            border-color: rgba(255,255,255,0.7);
            background: rgba(255,255,255,0.06);
        }

        .hero__trust {
            margin-top: 26px;
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 13.5px;
            color: rgba(255,255,255,0.6);
        }

        .hero__trust svg { width: 15px; height: 15px; flex-shrink: 0; }

        /* ---------- Scroll cue ---------- */
        .scroll-cue {
            position: absolute;
            bottom: 32px;
            left: 50%;
            transform: translateX(-50%);
            z-index: 5;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 8px;
            color: rgba(255,255,255,0.55);
            font-size: 12px;
            letter-spacing: 0.02em;
        }

        .scroll-cue svg {
            animation: floatDown 1.8s ease-in-out infinite;
        }

        @keyframes floatDown {
            0%, 100% { transform: translateY(0); opacity: .5; }
            50% { transform: translateY(6px); opacity: 1; }
        }

        @media (prefers-reduced-motion: reduce) {
            .scroll-cue svg { animation: none; }
        }

        /* ---------- Responsive ---------- */
        @media (max-width: 860px) {
            .nav { padding: 18px 20px; }
            .nav__links { display: none; }
            .hero__content { padding: 20px 24px 90px; }
            .hero__headline { font-size: 36px; }
            .hero__sub { font-size: 16px; }
            .hero__bg { background-position: 70% center; }
            .btn-primary, .btn-secondary { width: 100%; text-align: center; }
            .hero__actions { flex-direction: column; align-items: stretch; }
        }

        @media (max-width: 420px) {
            .hero__headline { font-size: 30px; }
        }
    </style>
</head>
<body>

    <section class="hero">
        <div class="hero__bg" role="img" aria-label="Doctor in white coat with stethoscope"></div>



        <div class="hero__content">
            <div class="hero__inner">
                <h1 class="hero__headline">
                    Medical appointment scheduling <span class="accent">made effortless</span> for doctors &amp; clinics
                </h1>
                <p class="hero__sub">
                    Streamline your practice with intelligent booking, electronic medical records, telemedicine, and digital prescriptions — all in one HIPAA-ready platform.
                </p>
                <div class="hero__actions">
                    <a href="{{ route('register') }}" class="btn-primary">Sign up for a free account</a>
                    <a href="#how-it-works" class="btn-secondary">See how it works</a>
                </div>
                <div class="hero__trust">
                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="12" cy="12" r="11" stroke="#21C7A8" stroke-width="1.5"/>
                        <path d="M7 12.5L10.2 15.5L17 8.5" stroke="#21C7A8" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    No payment details required — our free plan is free forever
                </div>
            </div>
        </div>

        <div class="scroll-cue">
            <span>Scroll to explore</span>
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M6 9L12 15L18 9" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </div>
    </section>

</body>
</html>
