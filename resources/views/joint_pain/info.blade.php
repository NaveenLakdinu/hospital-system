
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

.joint-page {
    background: var(--background);
    min-height: 100vh;
    padding: 35px 15px;
    font-family: 'Inter', sans-serif;
    color: var(--dark);
}

.joint-container {
    max-width: 1200px;
    margin: auto;
}

.joint-wrapper {
    background: var(--white);
    border-radius: 25px;
    overflow: hidden;
    box-shadow: 0 12px 45px rgba(21, 155, 98, .09);
    border: 1px solid var(--border);
}

/* HEADER */

.joint-header {
    padding: 22px 35px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    border-bottom: 1px solid var(--border);
}

.joint-brand {
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

.joint-hero {
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
        url('https://images.unsplash.com/photo-1767972463825-96eaa9e0766b?q=80&w=1170&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=NHwxMjA3fDA%3D')
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

.pain-list {
    list-style: none;
    padding: 0;
    margin: 0;
}

.pain-list li {
    display: flex;
    align-items: flex-start;
    gap: 12px;
    color: var(--muted);
    font-size: 13px;
    line-height: 1.8;
    padding: 11px 0;
    border-bottom: 1px solid #edf4ef;
}

.pain-list li:last-child {
    border-bottom: none;
}

.pain-list i {
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

.joint-footer {
    background: linear-gradient(110deg, #159b62, #0d6b43);
    color: white;
    text-align: center;
    padding: 28px 20px;
}

.joint-footer h4 {
    font-size: 17px;
    font-weight: 800;
    margin-bottom: 8px;
}

.joint-footer p {
    font-size: 11px;
    opacity: .85;
    margin: 0;
    line-height: 1.8;
}

/* RESPONSIVE */

@media(max-width:768px) {
    .joint-page {
        padding: 12px 8px;
    }

    .joint-header {
        padding: 17px;
    }

    .joint-hero {
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

<div class="joint-page">
<div class="joint-container">
<div class="joint-wrapper">

    <!-- HEADER -->
    <header class="joint-header">
        <div class="joint-brand">
            <div class="brand-icon">
                <i class="bi bi-heart-pulse-fill"></i>
            </div>
            <div>
                Joint Health Gallery
                <span class="brand-small">Healthy Joints, Active Life</span>
            </div>
        </div>

        <a href="{{ route('dashboard') }}" class="close-gallery">
            <i class="bi bi-x-lg"></i> Close Gallery
        </a>
    </header>

    <!-- HERO -->
    <section class="joint-hero">
        <div class="hero-content">
            <div class="hero-badge">
                <i class="bi bi-heart-pulse"></i>
                JOINT HEALTH AWARENESS
            </div>

            <h1>
                Understand Your Joint Pain,
                <span>Move Better.</span>
            </h1>

            <p>
                Learn about common joint pain problems, possible causes,
                symptoms, treatment options and healthy habits that can
                support your joint health and everyday movement.
            </p>

            <div class="hero-footer">
                <i class="bi bi-shield-check"></i>
                Knowledge for a healthier, active lifestyle
            </div>
        </div>
    </section>

    <!-- ABOUT JOINT PAIN -->
    <section class="gallery-section">
        <div class="section-heading">
            <div class="section-label">01 — Understanding Joint Pain</div>
            <h2>What Is Joint Pain?</h2>
            <p>
                Joint pain is discomfort, aching or soreness in one or more
                joints. It can affect movement and daily activities.
            </p>
        </div>

        <div class="row g-4">
            <div class="col-md-6">
                <div class="info-card">
                    <div class="info-icon">
                        <i class="bi bi-person-walking"></i>
                    </div>
                    <h4>What Happens in a Joint?</h4>
                    <p>
                        Joints connect two or more bones. Cartilage,
                        ligaments, tendons and surrounding tissues help
                        joints move smoothly and provide support.
                    </p>
                </div>
            </div>

            <div class="col-md-6">
                <div class="info-card info-blue">
                    <div class="info-icon">
                        <i class="bi bi-activity"></i>
                    </div>
                    <h4>How Can Joint Pain Affect You?</h4>
                    <p>
                        Joint discomfort may make walking, climbing stairs,
                        bending, lifting objects or completing everyday
                        activities difficult.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- COMMON TYPES -->
    <section class="gallery-section">
        <div class="section-heading">
            <div class="section-label">02 — Common Joint Problems</div>
            <h2>Types of Joint Pain</h2>
            <p>
                Joint pain can affect different parts of the body.
                Here are some commonly affected areas.
            </p>
        </div>

        <div class="row g-4">

            <div class="col-md-4">
                <div class="photo-card">
                    <img src="https://images.unsplash.com/photo-1609113160023-4e31f3765fd7?q=80&w=1170&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=NHwxMjA3fDA%3D"
                         alt="Person exercising and supporting knee health">
                    <div class="photo-content">
                        <h4>Knee Pain</h4>
                        <p>
                            Knee discomfort may affect walking, standing,
                            bending and climbing stairs.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="photo-card">
                    <img src="https://images.unsplash.com/photo-1645005512968-0c1fe99f0093?q=80&w=1170&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=NHwxMjA3fDA%3D"
                         alt="Person doing shoulder exercise">
                    <div class="photo-content">
                        <h4>Shoulder Pain</h4>
                        <p>
                            Shoulder pain can make reaching overhead,
                            lifting and moving the arm uncomfortable.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="photo-card">
                    <img src="https://images.unsplash.com/photo-1650897492414-8661563845a7?q=80&w=1226&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=NHwxMjA3fDA%3D"
                         alt="Person doing a gentle fitness exercise">
                    <div class="photo-content">
                        <h4>Hip Pain</h4>
                        <p>
                            Hip discomfort may affect walking, sitting,
                            standing and body movement.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="photo-card">
                    <img src="https://plus.unsplash.com/premium_photo-1726812095690-996fdfec071f?q=80&w=1170&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=NHwxMjA3fDA%3D"
                         alt="Gentle stretching exercise">
                    <div class="photo-content">
                        <h4>Back and Spine Pain</h4>
                        <p>
                            Pain around the back and spine may affect
                            posture, flexibility and movement.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="photo-card">
                    <img src="https://images.unsplash.com/photo-1626524815950-559398d5abea?q=80&w=1170&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=NHwxMjA3fDA%3D"
                         alt="Hand care and health">
                    <div class="photo-content">
                        <h4>Finger and Hand Pain</h4>
                        <p>
                            Hand discomfort may affect gripping,
                            writing and handling small objects.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="photo-card">
                    <img src="https://plus.unsplash.com/premium_photo-1664300505124-2500287eb7c3?q=80&w=687&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=NHwxMjA3fDA%3D"
                         alt="Healthcare professional consultation">
                    <div class="photo-content">
                        <h4>Ankle Pain</h4>
                        <p>
                            Ankle discomfort may affect balance,
                            standing and walking.
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
            <h2>What Can Cause Joint Pain?</h2>
            <p>
                Different conditions and injuries can contribute to
                joint pain. The cause depends on the person and symptoms.
            </p>
        </div>

        <div class="row g-4">
            <div class="col-md-4">
                <div class="info-card">
                    <div class="info-icon"><i class="bi bi-hourglass-split"></i></div>
                    <h4>Age-Related Changes</h4>
                    <p>
                        Joint structures may change over time and can
                        contribute to stiffness or discomfort.
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="info-card info-blue">
                    <div class="info-icon"><i class="bi bi-bandaid"></i></div>
                    <h4>Injuries</h4>
                    <p>
                        Sprains, strains and other injuries can affect
                        joints and surrounding tissues.
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="info-card">
                    <div class="info-icon"><i class="bi bi-activity"></i></div>
                    <h4>Arthritis</h4>
                    <p>
                        Conditions such as osteoarthritis and rheumatoid
                        arthritis can cause joint pain and stiffness.
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="info-card info-yellow">
                    <div class="info-icon"><i class="bi bi-person-arms-up"></i></div>
                    <h4>Overuse</h4>
                    <p>
                        Repeated movements or excessive physical activity
                        may irritate joints and surrounding tissues.
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="info-card info-purple">
                    <div class="info-icon"><i class="bi bi-droplet-half"></i></div>
                    <h4>Inflammation</h4>
                    <p>
                        Some inflammatory conditions can cause swelling,
                        warmth, tenderness and pain.
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="info-card">
                    <div class="info-icon"><i class="bi bi-heart-pulse"></i></div>
                    <h4>Other Health Conditions</h4>
                    <p>
                        Some infections and other medical conditions
                        can also cause joint symptoms.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- SYMPTOMS -->
    <section class="gallery-section">
        <div class="section-heading">
            <div class="section-label">04 — Recognizing Symptoms</div>
            <h2>Common Signs and Symptoms</h2>
        </div>

        <div class="row g-4">
            <div class="col-md-6">
                <div class="info-card">
                    <h4><i class="bi bi-clipboard2-pulse text-success me-2"></i>Common Symptoms</h4>
                    <ul class="pain-list">
                        <li><i class="bi bi-check-circle-fill"></i> Pain or aching around a joint</li>
                        <li><i class="bi bi-check-circle-fill"></i> Joint stiffness, especially after rest</li>
                        <li><i class="bi bi-check-circle-fill"></i> Swelling around the joint</li>
                        <li><i class="bi bi-check-circle-fill"></i> Difficulty moving the affected area</li>
                        <li><i class="bi bi-check-circle-fill"></i> Tenderness when touching the joint</li>
                        <li><i class="bi bi-check-circle-fill"></i> Reduced flexibility or movement</li>
                    </ul>
                </div>
            </div>

            <div class="col-md-6">
                <div class="photo-card">
                    <img src="https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?w=900&q=85"
                         alt="Doctor discussing health symptoms">
                    <div class="photo-content">
                        <h4>Pay Attention to Your Symptoms</h4>
                        <p>
                            Notice when the pain starts, how long it lasts,
                            and whether swelling or movement difficulties
                            are getting worse. Share these details with
                            a healthcare professional.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- TREATMENT -->
    <section class="gallery-section">
        <div class="section-heading">
            <div class="section-label">05 — Care and Treatment</div>
            <h2>How Can Joint Pain Be Managed?</h2>
            <p>
                Treatment depends on the cause and severity of the
                symptoms. A healthcare professional can recommend
                an appropriate care plan.
            </p>
        </div>

        <div class="row g-4">
            <div class="col-md-4">
                <div class="info-card">
                    <div class="info-icon"><i class="bi bi-person-walking"></i></div>
                    <h4>Gentle Movement</h4>
                    <p>
                        Suitable low-impact activities may help maintain
                        mobility. Choose activities according to your
                        symptoms and professional advice.
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="info-card info-blue">
                    <div class="info-icon"><i class="bi bi-snow"></i></div>
                    <h4>Cold or Warm Compress</h4>
                    <p>
                        Cold or warm packs may help some types of joint
                        discomfort. Protect the skin and avoid extreme
                        temperatures.
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="info-card">
                    <div class="info-icon"><i class="bi bi-person-check"></i></div>
                    <h4>Physiotherapy</h4>
                    <p>
                        A physiotherapist may recommend suitable exercises
                        to improve strength, flexibility and movement.
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="info-card info-yellow">
                    <div class="info-icon"><i class="bi bi-capsule"></i></div>
                    <h4>Medical Treatment</h4>
                    <p>
                        A doctor may recommend medicines or other
                        treatments depending on the underlying cause.
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="info-card info-purple">
                    <div class="info-icon"><i class="bi bi-moon-stars"></i></div>
                    <h4>Rest and Recovery</h4>
                    <p>
                        Adjust activities and allow time for recovery
                        when a joint is painful. Avoid prolonged
                        inactivity unless advised.
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="info-card">
                    <div class="info-icon"><i class="bi bi-hospital"></i></div>
                    <h4>Professional Assessment</h4>
                    <p>
                        Persistent or unexplained joint pain should be
                        assessed to identify the cause and suitable care.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- HEALTHY LIFESTYLE -->
    <section class="gallery-section">
        <div class="section-heading">
            <div class="section-label">06 — Healthy Lifestyle</div>
            <h2>Daily Habits for Healthy Joints</h2>
        </div>

        <div class="row g-4">
            <div class="col-md-6">
                <div class="photo-card">
                    <img src="https://images.unsplash.com/photo-1544367567-0f2fcb009e0b?w=900&q=85"
                         alt="Person practising gentle yoga">
                    <div class="photo-content">
                        <h4>Stay Active</h4>
                        <p>
                            Gentle walking, swimming and suitable stretching
                            can support mobility and general physical health.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="photo-card">
                    <img src="https://images.unsplash.com/photo-1490645935967-10de6ba17061?w=900&q=85"
                         alt="Healthy balanced food">
                    <div class="photo-content">
                        <h4>Eat a Balanced Diet</h4>
                        <p>
                            Include vegetables, fruits, whole grains,
                            protein sources and other nutritious foods
                            as part of a balanced eating pattern.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-4 mt-1">
            <div class="col-md-4">
                <div class="info-card">
                    <div class="info-icon"><i class="bi bi-droplet"></i></div>
                    <h4>Stay Hydrated</h4>
                    <p>
                        Drink enough water throughout the day according
                        to your needs and medical advice.
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="info-card">
                    <div class="info-icon"><i class="bi bi-moon-stars"></i></div>
                    <h4>Get Enough Sleep</h4>
                    <p>
                        Good sleep supports overall wellbeing and
                        everyday recovery.
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="info-card">
                    <div class="info-icon"><i class="bi bi-person-standing"></i></div>
                    <h4>Maintain Good Posture</h4>
                    <p>
                        Use comfortable positions and avoid remaining
                        in the same position for too long.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- WHEN TO SEE DOCTOR -->
    <div class="warning-banner">
        <div class="warning-icon">
            <i class="bi bi-exclamation-triangle-fill"></i>
        </div>
        <div>
            <h4>When Should You See a Doctor?</h4>
            <p>
                Seek medical advice if joint pain is persistent, keeps
                returning, becomes worse or affects everyday activities.
                Get urgent medical attention if a joint is suddenly very
                painful, hot and swollen, especially with fever or feeling
                unwell. Seek emergency care after a serious injury or if
                you cannot move or put weight on the joint.
            </p>
        </div>
    </div>

    <!-- PREVENTION -->
    <section class="gallery-section">
        <div class="section-heading">
            <div class="section-label">07 — Prevention and Awareness</div>
            <h2>Simple Joint Care Checklist</h2>
            <p>
                Healthy habits can support joint function and general
                wellbeing. They cannot prevent every joint condition.
            </p>
        </div>

        <div class="info-card">
            <div class="row g-3">
                <div class="col-md-6">
                    <ul class="pain-list">
                        <li><i class="bi bi-check-circle-fill"></i> Choose suitable regular physical activity</li>
                        <li><i class="bi bi-check-circle-fill"></i> Warm up before exercise</li>
                        <li><i class="bi bi-check-circle-fill"></i> Increase exercise intensity gradually</li>
                        <li><i class="bi bi-check-circle-fill"></i> Use correct techniques when lifting</li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <ul class="pain-list">
                        <li><i class="bi bi-check-circle-fill"></i> Take breaks from repetitive activities</li>
                        <li><i class="bi bi-check-circle-fill"></i> Wear suitable comfortable footwear</li>
                        <li><i class="bi bi-check-circle-fill"></i> Maintain a balanced diet</li>
                        <li><i class="bi bi-check-circle-fill"></i> Get professional advice for ongoing pain</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- GALLERY -->
    <section class="gallery-section">
        <div class="section-heading">
            <div class="section-label">08 — Health and Wellness</div>
            <h2>Joint Health & Active Lifestyle Gallery</h2>
            <p>
                Small healthy habits can help support a more active
                and comfortable lifestyle.
            </p>
        </div>

        <div class="row g-4">
            <div class="col-md-4">
                <div class="photo-card">
                    <img src="https://images.unsplash.com/photo-1518611012118-696072aa579a?w=800&q=85"
                         alt="Fitness and movement">
                    <div class="photo-content">
                        <h4>Healthy Movement</h4>
                        <p>Keep your body moving with activities that suit you.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="photo-card">
                    <img src="https://images.unsplash.com/photo-1490645935967-10de6ba17061?w=800&q=85"
                         alt="Healthy nutrition">
                    <div class="photo-content">
                        <h4>Healthy Nutrition</h4>
                        <p>Choose a balanced variety of nutritious foods.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="photo-card">
                    <img src="https://images.unsplash.com/photo-1576091160550-2173dba999ef?w=800&q=85"
                         alt="Healthcare consultation">
                    <div class="photo-content">
                        <h4>Professional Care</h4>
                        <p>Discuss ongoing symptoms with a healthcare professional.</p>
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
                        information about joint health. It is not a
                        diagnosis or a substitute for professional
                        medical advice, examination or treatment.
                        Always consult a qualified healthcare
                        professional about your symptoms and treatment.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <footer class="joint-footer">
        <h4><i class="bi bi-heart-pulse-fill me-2"></i>Healthy Joints, Better Living</h4>
        <p>
            Learn • Care • Move • Live Better
            <br>
            Joint Health Information Gallery
        </p>
    </footer>

</div>
</div>
</div>

@endsection
