
@extends('layouts.app')

@section('content')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

<style>
:root {
    --green: #159b62;
    --green-dark: #116b43;
    --green-deep: #0c5034;
    --green-light: #eaf8f0;
    --mint: #d7f2e0;
    --dark: #173f2e;
    --muted: #718879;
    --background: #f3f9f5;
    --border: #d4eadb;
    --white: #ffffff;
}

* {
    box-sizing: border-box;
}

.cold-page {
    background: var(--background);
    min-height: 100vh;
    padding: 35px 15px;
    font-family: 'Inter', sans-serif;
    color: var(--dark);
}

.cold-container {
    max-width: 1200px;
    margin: auto;
}

.cold-wrapper {
    background: var(--white);
    border-radius: 25px;
    overflow: hidden;
    box-shadow: 0 12px 45px rgba(21,155,98,.09);
    border: 1px solid var(--border);
}

/* HEADER */

.cold-header {
    padding: 22px 35px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    border-bottom: 1px solid var(--border);
}

.cold-brand {
    display: flex;
    align-items: center;
    gap: 12px;
    font-size: 18px;
    font-weight: 800;
    color: var(--dark);
}

.brand-icon {
    width: 43px;
    height: 43px;
    background: var(--green-light);
    color: var(--green);
    border-radius: 13px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 23px;
}

.brand-small {
    display: block;
    color: var(--muted);
    font-size: 11px;
    font-weight: 500;
    margin-top: 2px;
}

.close-gallery {
    color: var(--muted);
    text-decoration: none;
    border: 1px solid var(--border);
    padding: 9px 16px;
    border-radius: 30px;
    font-size: 13px;
    font-weight: 600;
    transition: .3s;
}

.close-gallery:hover {
    background: var(--green);
    color: white;
}

/* HERO */

.cold-hero {
    margin: 28px;
    min-height: 350px;
    border-radius: 22px;
    overflow: hidden;
    position: relative;
    display: flex;
    align-items: center;
    background:
        linear-gradient(90deg, rgba(232,247,237,.98) 0%,
        rgba(232,247,237,.93) 45%,
        rgba(232,247,237,.15) 100%),
        url('https://plus.unsplash.com/premium_photo-1664910150142-c5fee1b9c1b7?q=80&w=1172&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=NHwxMjA3fDA%3D')
        center/cover;
}

.hero-content {
    padding: 45px;
    max-width: 650px;
    position: relative;
    z-index: 2;
}

.hero-badge {
    display: inline-block;
    background: white;
    color: var(--green-dark);
    padding: 9px 16px;
    border-radius: 30px;
    font-size: 11px;
    font-weight: 800;
    letter-spacing: 1px;
    margin-bottom: 20px;
}

.hero-content h1 {
    font-size: clamp(32px, 5vw, 48px);
    font-weight: 800;
    line-height: 1.15;
    color: var(--dark);
    margin-bottom: 17px;
}

.hero-content h1 span {
    color: var(--green);
}

.hero-content p {
    color: #61786a;
    font-size: 14px;
    line-height: 1.9;
    max-width: 520px;
}

.hero-footer {
    display: inline-flex;
    align-items: center;
    gap: 9px;
    background: #dff4e7;
    color: #11784b;
    padding: 11px 17px;
    border-radius: 30px;
    font-size: 12px;
    font-weight: 700;
    margin-top: 12px;
}

/* SECTIONS */

.gallery-section {
    padding: 15px 35px 35px;
}

.section-heading {
    margin-bottom: 23px;
}

.section-label {
    color: var(--green);
    font-size: 11px;
    font-weight: 800;
    letter-spacing: 1.7px;
    text-transform: uppercase;
    margin-bottom: 8px;
}

.section-heading h2 {
    font-size: 25px;
    font-weight: 800;
    color: var(--dark);
    margin: 0 0 8px;
}

.section-heading p {
    font-size: 13px;
    color: var(--muted);
    line-height: 1.8;
    max-width: 700px;
}

/* INFORMATION CARDS */

.info-card {
    height: 100%;
    padding: 23px;
    border-radius: 17px;
    border: 1px solid var(--border);
    background: #f5fbf7;
    transition: .3s;
}

.info-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 12px 25px rgba(21,155,98,.10);
}

.info-icon {
    width: 47px;
    height: 47px;
    border-radius: 14px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: var(--green-light);
    color: var(--green);
    font-size: 23px;
    margin-bottom: 17px;
}

.info-card h4 {
    font-size: 16px;
    font-weight: 800;
    color: var(--dark);
    margin-bottom: 10px;
}

.info-card p,
.info-card li {
    color: var(--muted);
    font-size: 12px;
    line-height: 1.9;
}

.info-card ul {
    padding-left: 18px;
    margin-bottom: 0;
}

.info-blue {
    background: #eff8f4;
}

.info-yellow {
    background: #fbf8e9;
    border-color: #eee8c9;
}

.info-purple {
    background: #f2f5ee;
}

/* IMAGE CARDS */

.photo-card {
    background: white;
    border: 1px solid var(--border);
    border-radius: 17px;
    overflow: hidden;
    height: 100%;
    transition: .3s;
}

.photo-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 12px 25px rgba(21,155,98,.12);
}

.photo-card img {
    width: 100%;
    height: 195px;
    object-fit: cover;
    display: block;
}

.photo-content {
    padding: 19px;
}

.photo-content h4 {
    font-size: 15px;
    font-weight: 800;
    color: var(--dark);
    margin-bottom: 9px;
}

.photo-content p {
    color: var(--muted);
    font-size: 12px;
    line-height: 1.8;
    margin-bottom: 0;
}

/* LIST */

.health-list {
    list-style: none;
    padding: 0;
    margin: 0;
}

.health-list li {
    display: flex;
    align-items: flex-start;
    gap: 12px;
    color: var(--muted);
    font-size: 13px;
    line-height: 1.8;
    padding: 11px 0;
    border-bottom: 1px solid #edf4ef;
}

.health-list li:last-child {
    border-bottom: none;
}

.health-list i {
    color: var(--green);
    font-size: 17px;
    margin-top: 2px;
}

/* WARNING */

.warning-banner {
    margin: 0 35px 35px;
    padding: 25px;
    border-radius: 18px;
    background: #fff8e9;
    border: 1px solid #f2dfb7;
    display: flex;
    gap: 18px;
    align-items: flex-start;
}

.warning-icon {
    width: 48px;
    height: 48px;
    min-width: 48px;
    border-radius: 14px;
    background: #ffedc7;
    color: #c18420;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 24px;
}

.warning-banner h4 {
    color: #8a5b13;
    font-size: 16px;
    font-weight: 800;
}

.warning-banner p {
    color: #92764a;
    font-size: 12px;
    line-height: 1.8;
    margin-bottom: 0;
}

/* FOOTER */

.cold-footer {
    background: linear-gradient(110deg, #159b62, #0d6b43);
    color: white;
    text-align: center;
    padding: 28px 20px;
}

.cold-footer h4 {
    font-size: 17px;
    font-weight: 800;
    margin-bottom: 8px;
}

.cold-footer p {
    font-size: 11px;
    opacity: .85;
    margin: 0;
    line-height: 1.8;
}

/* RESPONSIVE */

@media(max-width:768px) {
    .cold-page {
        padding: 12px 8px;
    }

    .cold-header {
        padding: 17px;
    }

    .cold-hero {
        margin: 15px;
        min-height: 400px;
        background:
            linear-gradient(90deg, rgba(232,247,237,.97),
            rgba(232,247,237,.78)),
            url('https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?w=900&q=85')
            center/cover;
    }

    .hero-content {
        padding: 25px;
    }

    .gallery-section {
        padding: 15px 18px 25px;
    }

    .section-heading h2 {
        font-size: 21px;
    }

    .warning-banner {
        margin: 0 18px 25px;
        padding: 19px;
    }

    .photo-card img {
        height: 180px;
    }
}
</style>

<div class="cold-page">
<div class="cold-container">
<div class="cold-wrapper">

    <!-- HEADER -->
    <header class="cold-header">
        <div class="cold-brand">
            <div class="brand-icon">
                <i class="bi bi-heart-pulse-fill"></i>
            </div>
            <div>
                Cold, Cough & Fever Gallery
                <span class="brand-small">Breathe Better, Stay Healthy</span>
            </div>
        </div>

        <a href="{{ route('dashboard') }}" class="close-gallery">
            <i class="bi bi-x-lg"></i> Close Gallery
        </a>
    </header>

    <!-- HERO -->
    <section class="cold-hero">
        <div class="hero-content">
            <div class="hero-badge">
                <i class="bi bi-shield-plus"></i>
                RESPIRATORY HEALTH AWARENESS
            </div>

            <h1>
                Understand Cold, Cough
                <span>& Fever.</span>
            </h1>

            <p>
                Learn about common cold symptoms, cough, fever,
                possible causes, home care, prevention and when
                to seek medical attention.
            </p>

            <div class="hero-footer">
                <i class="bi bi-heart-pulse-fill"></i>
                Simple health knowledge for everyday life
            </div>
        </div>
    </section>

    <!-- ABOUT -->
    <section class="gallery-section">
        <div class="section-heading">
            <div class="section-label">01 — Understanding the Conditions</div>
            <h2>What Are Cold, Cough and Fever?</h2>
            <p>
                These are common health problems. They can occur
                together, but they are not the same condition.
            </p>
        </div>

        <div class="row g-4">

            <div class="col-md-4">
                <div class="info-card">
                    <div class="info-icon">
                        <i class="bi bi-wind"></i>
                    </div>
                    <h4>Common Cold</h4>
                    <p>
                        A common cold is usually a viral infection
                        affecting the nose and throat. It can cause
                        sneezing, a runny nose and a sore throat.
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="info-card info-blue">
                    <div class="info-icon">
                        <i class="bi bi-lungs"></i>
                    </div>
                    <h4>Cough</h4>
                    <p>
                        A cough is a natural reflex that helps clear
                        the airways. It may occur with infections
                        or other respiratory conditions.
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="info-card">
                    <div class="info-icon">
                        <i class="bi bi-thermometer-half"></i>
                    </div>
                    <h4>Fever</h4>
                    <p>
                        Fever is a rise in body temperature, often
                        associated with infections. It is a sign
                        that the body is responding to illness.
                    </p>
                </div>
            </div>

        </div>
    </section>

    <!-- COMMON SYMPTOMS -->
    <section class="gallery-section">
        <div class="section-heading">
            <div class="section-label">02 — Recognizing Symptoms</div>
            <h2>Common Signs and Symptoms</h2>
            <p>
                Symptoms vary from person to person and depend
                on the cause of the illness.
            </p>
        </div>

        <div class="row g-4">

            <div class="col-md-4">
                <div class="photo-card">
                    <img src="https://images.unsplash.com/photo-1674049406329-fe7b19a0dc24?q=80&w=1170&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=NHwxMjA3fDA%3D"
                         alt="Person resting while unwell">
                    <div class="photo-content">
                        <h4>Cold Symptoms</h4>
                        <p>
                            Runny or blocked nose, sneezing, sore throat,
                            mild cough and tiredness.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="photo-card">
                    <img src="https://images.unsplash.com/photo-1610786555801-0ea62c9755ed?q=80&w=1170&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=NHwxMjA3fDA%3D"
                         alt="Respiratory health consultation">
                    <div class="photo-content">
                        <h4>Cough Symptoms</h4>
                        <p>
                            Dry cough, mucus-producing cough,
                            throat irritation or chest discomfort.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="photo-card">
                    <img src="https://images.unsplash.com/photo-1607583449928-4ab0cb473e6a?q=80&w=1170&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=NHwxMjA3fDA%3D"
                         alt="Thermometer for checking temperature">
                    <div class="photo-content">
                        <h4>Fever Symptoms</h4>
                        <p>
                            High body temperature, chills, sweating,
                            headache, muscle aches and weakness.
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- CAUSES -->
    <section class="gallery-section">
        <div class="section-heading">
            <div class="section-label">03 — Possible Causes</div>
            <h2>What Causes Cold, Cough and Fever?</h2>
            <p>
                Several infections and other health conditions
                may cause these symptoms.
            </p>
        </div>

        <div class="row g-4">

            <div class="col-md-4">
                <div class="info-card">
                    <div class="info-icon">
                        <i class="bi bi-virus"></i>
                    </div>
                    <h4>Viral Infections</h4>
                    <p>
                        Viruses such as common cold viruses,
                        influenza and COVID-19 can cause
                        respiratory symptoms and fever.
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="info-card info-blue">
                    <div class="info-icon">
                        <i class="bi bi-people"></i>
                    </div>
                    <h4>Close Contact</h4>
                    <p>
                        Respiratory infections can spread through
                        infectious respiratory particles and
                        contaminated hands or surfaces.
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="info-card">
                    <div class="info-icon">
                        <i class="bi bi-lungs"></i>
                    </div>
                    <h4>Respiratory Conditions</h4>
                    <p>
                        Conditions such as bronchitis or pneumonia
                        can cause cough and sometimes fever.
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="info-card info-yellow">
                    <div class="info-icon">
                        <i class="bi bi-flower1"></i>
                    </div>
                    <h4>Allergies</h4>
                    <p>
                        Allergies can cause sneezing, a runny nose
                        and coughing, although they do not usually
                        cause a fever.
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="info-card info-purple">
                    <div class="info-icon">
                        <i class="bi bi-wind"></i>
                    </div>
                    <h4>Environmental Irritants</h4>
                    <p>
                        Dust, smoke and air pollution can irritate
                        the respiratory tract and trigger coughing.
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="info-card">
                    <div class="info-icon">
                        <i class="bi bi-hospital"></i>
                    </div>
                    <h4>Other Infections</h4>
                    <p>
                        Some bacterial infections and other illnesses
                        may also cause fever and respiratory symptoms.
                    </p>
                </div>
            </div>

        </div>
    </section>

    <!-- COLD CARE -->
    <section class="gallery-section">
        <div class="section-heading">
            <div class="section-label">04 — Common Cold Care</div>
            <h2>How to Care for a Common Cold</h2>
            <p>
                Most uncomplicated colds improve with time
                and supportive care.
            </p>
        </div>

        <div class="row g-4">

            <div class="col-md-6">
                <div class="photo-card">
                    <img src="https://images.unsplash.com/photo-1547592180-85f173990554?w=900&q=85"
                         alt="Warm healthy soup">
                    <div class="photo-content">
                        <h4>Warm Fluids and Nourishing Food</h4>
                        <p>
                            Drink enough fluids and choose foods
                            that are comfortable to eat.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="photo-card">
                    <img src="https://images.unsplash.com/photo-1758273239410-1c5b9e17679b?q=80&w=1631&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=NHwxMjA3fDA%3D"
                         alt="Comfortable resting environment">
                    <div class="photo-content">
                        <h4>Rest and Recovery</h4>
                        <p>
                            Get adequate rest and avoid overexertion
                            while recovering.
                        </p>
                    </div>
                </div>
            </div>

        </div>

        <div class="info-card mt-4">
            <h4>Helpful Cold Care Tips</h4>
            <ul class="health-list">
                <li><i class="bi bi-check-circle-fill"></i> Drink water and other suitable fluids.</li>
                <li><i class="bi bi-check-circle-fill"></i> Rest and get enough sleep.</li>
                <li><i class="bi bi-check-circle-fill"></i> Use saline nasal drops or spray if appropriate.</li>
                <li><i class="bi bi-check-circle-fill"></i> Wash your hands regularly.</li>
                <li><i class="bi bi-check-circle-fill"></i> Avoid smoking and second-hand smoke.</li>
            </ul>
        </div>
    </section>

    <!-- COUGH CARE -->
    <section class="gallery-section">
        <div class="section-heading">
            <div class="section-label">05 — Cough Care</div>
            <h2>How to Manage a Cough</h2>
            <p>
                The right approach depends on what is causing
                the cough.
            </p>
        </div>

        <div class="row g-4">

            <div class="col-md-4">
                <div class="info-card">
                    <div class="info-icon">
                        <i class="bi bi-cup-hot"></i>
                    </div>
                    <h4>Warm Drinks</h4>
                    <p>
                        Warm drinks may soothe an irritated throat
                        and help maintain fluid intake.
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="info-card info-blue">
                    <div class="info-icon">
                        <i class="bi bi-droplet-half"></i>
                    </div>
                    <h4>Stay Hydrated</h4>
                    <p>
                        Drinking enough fluids can help prevent
                        dehydration and may make mucus easier
                        to clear.
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="info-card">
                    <div class="info-icon">
                        <i class="bi bi-moon-stars"></i>
                    </div>
                    <h4>Rest</h4>
                    <p>
                        Rest and avoid activities that worsen
                        your cough or breathing discomfort.
                    </p>
                </div>
            </div>

        </div>

        <div class="info-card mt-4">
            <h4>Important Cough Care Information</h4>
            <p class="mb-0">
                Honey may help soothe a cough in adults and children
                aged over one year. Never give honey to a child
                younger than one year. Ask a healthcare professional
                or pharmacist before using cough medicines,
                especially for children.
            </p>
        </div>
    </section>

    <!-- FEVER CARE -->
    <section class="gallery-section">
        <div class="section-heading">
            <div class="section-label">06 — Fever Care</div>
            <h2>How to Manage a Fever</h2>
        </div>

        <div class="row g-4">

            <div class="col-md-6">
                <div class="photo-card">
                    <img src="https://images.unsplash.com/photo-1584362917165-526a968579e8?w=900&q=85"
                         alt="Digital thermometer">
                    <div class="photo-content">
                        <h4>Monitor Body Temperature</h4>
                        <p>
                            Use a suitable thermometer to check
                            temperature and monitor changes.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="photo-card">
                    <img src="https://blog.fontiswater.com/wp-content/uploads/2020/04/drinking-water-sick-1024x768.jpg"
                         alt="Healthy food and fluids">
                    <div class="photo-content">
                        <h4>Fluids and Rest</h4>
                        <p>
                            Drink enough fluids and rest.
                            Look out for signs of dehydration.
                        </p>
                    </div>
                </div>
            </div>

        </div>

        <div class="info-card mt-4">
            <h4>Fever Care Tips</h4>
            <ul class="health-list">
                <li><i class="bi bi-check-circle-fill"></i> Drink fluids regularly.</li>
                <li><i class="bi bi-check-circle-fill"></i> Wear comfortable, lightweight clothing.</li>
                <li><i class="bi bi-check-circle-fill"></i> Rest and avoid excessive physical activity.</li>
                <li><i class="bi bi-check-circle-fill"></i> Monitor temperature and other symptoms.</li>
                <li><i class="bi bi-check-circle-fill"></i> Ask a healthcare professional about suitable fever medicine.</li>
            </ul>
        </div>
    </section>

    <!-- PREVENTION -->
    <section class="gallery-section">
        <div class="section-heading">
            <div class="section-label">07 — Prevention</div>
            <h2>How to Prevent Respiratory Infections</h2>
            <p>
                Healthy everyday habits can reduce the risk
                of spreading many respiratory infections.
            </p>
        </div>

        <div class="row g-4">

            <div class="col-md-4">
                <div class="info-card">
                    <div class="info-icon">
                        <i class="bi bi-hand-wash"></i>
                    </div>
                    <h4>Wash Your Hands</h4>
                    <p>
                        Wash your hands regularly with soap and water,
                        especially before eating and after coughing
                        or sneezing.
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="info-card info-blue">
                    <div class="info-icon">
                        <i class="bi bi-mask"></i>
                    </div>
                    <h4>Use a Mask When Needed</h4>
                    <p>
                        A well-fitting mask can help reduce the spread
                        of respiratory infections in appropriate settings.
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="info-card">
                    <div class="info-icon">
                        <i class="bi bi-house-door"></i>
                    </div>
                    <h4>Improve Ventilation</h4>
                    <p>
                        Open windows when appropriate and allow
                        fresh air to circulate indoors.
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="info-card info-yellow">
                    <div class="info-icon">
                        <i class="bi bi-emoji-smile"></i>
                    </div>
                    <h4>Cover Coughs and Sneezes</h4>
                    <p>
                        Use a tissue or your elbow and dispose
                        of used tissues safely.
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="info-card info-purple">
                    <div class="info-icon">
                        <i class="bi bi-house-heart"></i>
                    </div>
                    <h4>Stay Home When Sick</h4>
                    <p>
                        Limit close contact with others while
                        you are unwell, especially vulnerable people.
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="info-card">
                    <div class="info-icon">
                        <i class="bi bi-shield-check"></i>
                    </div>
                    <h4>Stay Up to Date with Vaccines</h4>
                    <p>
                        Follow recommended vaccination advice
                        for influenza, COVID-19 and other
                        relevant infections.
                    </p>
                </div>
            </div>

        </div>
    </section>

    <!-- WARNING SIGNS -->
    <div class="warning-banner">
        <div class="warning-icon">
            <i class="bi bi-exclamation-triangle-fill"></i>
        </div>
        <div>
            <h4>Warning Signs — When to Get Medical Help</h4>
            <p>
                Seek urgent medical attention for difficulty breathing,
                chest pain, confusion, severe weakness, blue or grey lips,
                seizures or signs of severe dehydration. A fever in a baby
                younger than 3 months requires immediate medical assessment.
                Seek medical advice if fever persists, symptoms worsen,
                or you are concerned about a child, older adult or person
                with an underlying health condition.
            </p>
        </div>
    </div>

    <!-- CHILDREN -->
    <section class="gallery-section">
        <div class="section-heading">
            <div class="section-label">08 — Special Care</div>
            <h2>Cold, Cough and Fever in Children</h2>
            <p>
                Children may need additional attention when they
                develop respiratory symptoms or fever.
            </p>
        </div>

        <div class="row g-4">

            <div class="col-md-6">
                <div class="photo-card">
                    <img src="https://images.unsplash.com/photo-1516627145497-ae6968895b74?w=900&q=85"
                         alt="Parent caring for a child">
                    <div class="photo-content">
                        <h4>Monitor Your Child</h4>
                        <p>
                            Watch breathing, drinking, urination,
                            alertness and changes in symptoms.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="info-card">
                    <h4>Important Advice for Parents</h4>
                    <ul class="health-list">
                        <li><i class="bi bi-check-circle-fill"></i> Encourage suitable fluid intake.</li>
                        <li><i class="bi bi-check-circle-fill"></i> Allow adequate rest.</li>
                        <li><i class="bi bi-check-circle-fill"></i> Do not give aspirin to children unless specifically prescribed.</li>
                        <li><i class="bi bi-check-circle-fill"></i> Never give honey to babies under one year.</li>
                        <li><i class="bi bi-check-circle-fill"></i> Ask a healthcare professional before giving medicines.</li>
                    </ul>
                </div>
            </div>

        </div>
    </section>

    <!-- MYTHS -->
    <section class="gallery-section">
        <div class="section-heading">
            <div class="section-label">09 — Health Awareness</div>
            <h2>Common Myths and Facts</h2>
        </div>

        <div class="row g-4">

            <div class="col-md-6">
                <div class="info-card info-yellow">
                    <h4><i class="bi bi-x-circle-fill text-danger me-2"></i>Myth: Antibiotics cure every cold.</h4>
                    <p>
                        Fact: Antibiotics work against bacteria,
                        not viruses. They do not treat an ordinary
                        viral cold.
                    </p>
                </div>
            </div>

            <div class="col-md-6">
                <div class="info-card">
                    <h4><i class="bi bi-check-circle-fill text-success me-2"></i>Fact: Rest and fluids can help.</h4>
                    <p>
                        Supportive care, including adequate rest
                        and hydration, can help with recovery
                        from many uncomplicated illnesses.
                    </p>
                </div>
            </div>

            <div class="col-md-6">
                <div class="info-card info-yellow">
                    <h4><i class="bi bi-x-circle-fill text-danger me-2"></i>Myth: Every cough needs antibiotics.</h4>
                    <p>
                        Fact: Many coughs are caused by viruses
                        or irritation and do not need antibiotics.
                    </p>
                </div>
            </div>

            <div class="col-md-6">
                <div class="info-card">
                    <h4><i class="bi bi-check-circle-fill text-success me-2"></i>Fact: Fever is a symptom.</h4>
                    <p>
                        Fever can be a sign of an infection or
                        another medical condition. The underlying
                        cause may need assessment.
                    </p>
                </div>
            </div>

        </div>
    </section>

    <!-- GALLERY -->
    <section class="gallery-section">
        <div class="section-heading">
            <div class="section-label">10 — Health and Wellness</div>
            <h2>Healthy Living Gallery</h2>
            <p>
                Build healthy habits to support your general
                wellbeing and respiratory health.
            </p>
        </div>

        <div class="row g-4">

            <div class="col-md-4">
                <div class="photo-card">
                    <img src="https://images.unsplash.com/photo-1490645935967-10de6ba17061?w=800&q=85"
                         alt="Healthy nutritious food">
                    <div class="photo-content">
                        <h4>Balanced Nutrition</h4>
                        <p>Enjoy a variety of nutritious foods every day.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="photo-card">
                    <img src="https://images.unsplash.com/photo-1544367567-0f2fcb009e0b?w=800&q=85"
                         alt="Gentle exercise">
                    <div class="photo-content">
                        <h4>Regular Activity</h4>
                        <p>Stay active with exercises suitable for your health.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="photo-card">
                    <img src="https://images.unsplash.com/photo-1576091160550-2173dba999ef?w=800&q=85"
                         alt="Medical consultation">
                    <div class="photo-content">
                        <h4>Professional Healthcare</h4>
                        <p>Seek medical advice when symptoms need attention.</p>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- DISCLAIMER -->
    <section class="gallery-section">
        <div class="info-card">
            <div class="d-flex gap-3 align-items-start">
                <div class="info-icon mb-0">
                    <i class="bi bi-info-circle-fill"></i>
                </div>
                <div>
                    <h4>Important Health Information</h4>
                    <p class="mb-0">
                        This gallery provides general educational
                        information about cold, cough and fever.
                        It is not a medical diagnosis or a substitute
                        for professional medical advice, examination
                        or treatment. Do not start antibiotics or
                        other medicines without appropriate medical
                        advice. Always consult a qualified healthcare
                        professional about your symptoms.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <footer class="cold-footer">
        <h4>
            <i class="bi bi-heart-pulse-fill me-2"></i>
            Breathe Better, Stay Healthy
        </h4>
        <p>
            Learn • Prevent • Care • Recover
            <br>
            Cold, Cough & Fever Information Gallery
        </p>
    </footer>

</div>
</div>
</div>

@endsection
