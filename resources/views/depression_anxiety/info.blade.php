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

.mental-page {
    background: var(--background);
    min-height: 100vh;
    padding: 35px 15px;
    font-family: 'Inter', sans-serif;
    color: var(--dark);
}

.mental-container {
    max-width: 1200px;
    margin: auto;
}

.mental-wrapper {
    background: var(--white);
    border-radius: 25px;
    overflow: hidden;
    box-shadow: 0 12px 45px rgba(21,155,98,.09);
    border: 1px solid var(--border);
}

/* HEADER */

.mental-header {
    padding: 22px 35px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    border-bottom: 1px solid var(--border);
}

.mental-brand {
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

.mental-hero {
    margin: 28px;
    min-height: 370px;
    border-radius: 22px;
    overflow: hidden;
    position: relative;
    display: flex;
    align-items: center;
    background:
        linear-gradient(
            90deg,
            rgba(232,247,237,.98) 0%,
            rgba(232,247,237,.91) 48%,
            rgba(232,247,237,.12) 100%
        ),
        url('https://images.unsplash.com/photo-1477332552946-cfb384aeaf1c?q=80&w=1170&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=NHwxMjA3fDA%3D')
        center/cover;
}

.hero-content {
    padding: 45px;
    max-width: 680px;
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
    max-width: 530px;
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

/* INFO CARDS */

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

/* PHOTO CARDS */

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

/* SUPPORT BANNER */

.support-banner {
    margin: 0 35px 35px;
    padding: 25px;
    border-radius: 18px;
    background: #eaf8f0;
    border: 1px solid #ccebd8;
    display: flex;
    gap: 18px;
    align-items: flex-start;
}

.support-icon {
    width: 48px;
    height: 48px;
    min-width: 48px;
    border-radius: 14px;
    background: #d2f0df;
    color: #159b62;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 24px;
}

.support-banner h4 {
    color: #116b43;
    font-size: 16px;
    font-weight: 800;
}

.support-banner p {
    color: #61786a;
    font-size: 12px;
    line-height: 1.8;
    margin-bottom: 0;
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

/* EMERGENCY */

.emergency-banner {
    margin: 0 35px 35px;
    padding: 23px;
    border-radius: 18px;
    background: #fff0ef;
    border: 1px solid #f2d0ce;
    display: flex;
    gap: 16px;
    align-items: flex-start;
}

.emergency-icon {
    width: 48px;
    height: 48px;
    min-width: 48px;
    border-radius: 14px;
    background: #ffe0de;
    color: #c83c35;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 23px;
}

.emergency-banner h4 {
    color: #a52d28;
    font-size: 16px;
    font-weight: 800;
}

.emergency-banner p {
    color: #895c59;
    font-size: 12px;
    line-height: 1.8;
    margin-bottom: 0;
}

/* FOOTER */

.mental-footer {
    background: linear-gradient(110deg, #159b62, #0d6b43);
    color: white;
    text-align: center;
    padding: 28px 20px;
}

.mental-footer h4 {
    font-size: 17px;
    font-weight: 800;
    margin-bottom: 8px;
}

.mental-footer p {
    font-size: 11px;
    opacity: .85;
    margin: 0;
    line-height: 1.8;
}

/* RESPONSIVE */

@media(max-width:768px) {

    .mental-page {
        padding: 12px 8px;
    }

    .mental-header {
        padding: 17px;
    }

    .mental-brand {
        font-size: 14px;
    }

    .close-gallery {
        padding: 8px 10px;
        font-size: 11px;
    }

    .mental-hero {
        margin: 15px;
        min-height: 410px;
        background:
            linear-gradient(
                90deg,
                rgba(232,247,237,.97),
                rgba(232,247,237,.85)
            ),
            url('https://images.unsplash.com/photo-1470252649378-9c29740c9fa8?w=900&q=85')
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

    .warning-banner,
    .emergency-banner,
    .support-banner {
        margin: 0 18px 25px;
        padding: 19px;
    }

    .photo-card img {
        height: 180px;
    }
}

@media(max-width:420px) {
    .mental-brand {
        font-size: 12px;
    }

    .brand-icon {
        width: 38px;
        height: 38px;
    }

    .close-gallery {
        padding: 7px 8px;
        font-size: 10px;
    }

    .hero-content h1 {
        font-size: 32px;
    }

    .support-banner,
    .warning-banner,
    .emergency-banner {
        gap: 12px;
    }
}
</style>

<div class="mental-page">
<div class="mental-container">
<div class="mental-wrapper">

    <!-- HEADER -->

    <header class="mental-header">

        <div class="mental-brand">

            <div class="brand-icon">
                <i class="bi bi-heart-pulse-fill"></i>
            </div>

            <div>
                Mental Health Awareness Gallery
                <span class="brand-small">
                    Healthy Mind, Happy Life
                </span>
            </div>

        </div>

        <a href="{{ route('dashboard') }}" class="close-gallery">
            <i class="bi bi-x-lg"></i> Close Gallery
        </a>

    </header>


    <!-- HERO -->

    <section class="mental-hero">

        <div class="hero-content">

            <div class="hero-badge">
                <i class="bi bi-heart-fill"></i>
                MENTAL HEALTH AWARENESS
            </div>

            <h1>
                Your Mental Health
                <span>Matters.</span>
            </h1>

            <p>
                Learn about depression and anxiety, understand
                common symptoms, discover healthy coping strategies
                and find out when to seek professional mental
                health support.
            </p>

            <div class="hero-footer">
                <i class="bi bi-flower1"></i>
                It's okay to ask for help
            </div>

        </div>

    </section>


    <!-- INTRODUCTION -->

    <section class="gallery-section">

        <div class="section-heading">

            <div class="section-label">
                01 — Understanding Mental Health
            </div>

            <h2>
                What Are Depression and Anxiety?
            </h2>

            <p>
                Depression and anxiety are common mental health
                conditions. They can affect emotions, thoughts,
                physical health, relationships and everyday activities.
                Both conditions can be managed with appropriate
                support and treatment.
            </p>

        </div>

        <div class="row g-4">

            <div class="col-md-4">
                <div class="info-card">

                    <div class="info-icon">
                        <i class="bi bi-cloud-rain"></i>
                    </div>

                    <h4>Depression</h4>

                    <p>
                        Depression is a mental health condition
                        that may cause persistent sadness,
                        loss of interest, low energy and
                        difficulty enjoying everyday life.
                    </p>

                </div>
            </div>

            <div class="col-md-4">
                <div class="info-card info-blue">

                    <div class="info-icon">
                        <i class="bi bi-activity"></i>
                    </div>

                    <h4>Anxiety</h4>

                    <p>
                        Anxiety involves excessive worry,
                        fear or nervousness that may interfere
                        with daily activities and wellbeing.
                    </p>

                </div>
            </div>

            <div class="col-md-4">
                <div class="info-card">

                    <div class="info-icon">
                        <i class="bi bi-heart-pulse"></i>
                    </div>

                    <h4>Mental Wellbeing</h4>

                    <p>
                        Mental wellbeing includes emotional
                        balance, healthy relationships,
                        resilience and the ability to cope
                        with everyday challenges.
                    </p>

                </div>
            </div>

        </div>

    </section>


    <!-- DEPRESSION -->

    <section class="gallery-section">

        <div class="section-heading">

            <div class="section-label">
                02 — Understanding Depression
            </div>

            <h2>
                Common Signs and Symptoms of Depression
            </h2>

            <p>
                Depression affects people differently.
                Symptoms may last for weeks or longer
                and can affect daily life.
            </p>

        </div>

        <div class="row g-4">

            <div class="col-md-4">

                <div class="photo-card">

                    <img
                        src="https://images.unsplash.com/photo-1610354878912-08f1ab8ae913?q=80&w=1170&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=NHwxMjA3fDA%3D"
                        alt="Quiet peaceful natural environment">

                    <div class="photo-content">

                        <h4>Persistent Sadness</h4>

                        <p>
                            Feeling sad, empty, hopeless
                            or emotionally low for much
                            of the day.
                        </p>

                    </div>

                </div>

            </div>

            <div class="col-md-4">

                <div class="photo-card">

                    <img
                        src="https://img.lb.wbmdstatic.com/vim/live/webmd/consumer_assets/site_images/article_thumbnails/blog_posts/migraine/1800x1200_getty_rf_depressed_woman_working_from_home.jpg"
                        alt="Person enjoying a peaceful outdoor moment">

                    <div class="photo-content">

                        <h4>Loss of Interest</h4>

                        <p>
                            Losing interest or pleasure
                            in hobbies, social activities
                            and things previously enjoyed.
                        </p>

                    </div>

                </div>

            </div>

            <div class="col-md-4">

                <div class="photo-card">

                    <img
                        src="https://images.unsplash.com/photo-1758598497429-6eb3895d5bfa?q=80&w=1332&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=NHwxMjA3fDA%3D"
                        alt="Peaceful sunrise">

                    <div class="photo-content">

                        <h4>Low Energy</h4>

                        <p>
                            Feeling tired, lacking motivation
                            or struggling to complete
                            ordinary daily tasks.
                        </p>

                    </div>

                </div>

            </div>

        </div>

        <div class="info-card mt-4">

            <h4>
                Other Possible Symptoms
            </h4>

            <ul class="health-list">

                <li>
                    <i class="bi bi-check-circle-fill"></i>
                    Difficulty concentrating or making decisions.
                </li>

                <li>
                    <i class="bi bi-check-circle-fill"></i>
                    Changes in sleeping patterns.
                </li>

                <li>
                    <i class="bi bi-check-circle-fill"></i>
                    Changes in appetite or body weight.
                </li>

                <li>
                    <i class="bi bi-check-circle-fill"></i>
                    Feelings of worthlessness or excessive guilt.
                </li>

                <li>
                    <i class="bi bi-check-circle-fill"></i>
                    Withdrawing from friends and family.
                </li>

                <li>
                    <i class="bi bi-check-circle-fill"></i>
                    Thoughts about death or self-harm.
                </li>

            </ul>

        </div>

    </section>


    <!-- ANXIETY -->

    <section class="gallery-section">

        <div class="section-heading">

            <div class="section-label">
                03 — Understanding Anxiety
            </div>

            <h2>
                Common Signs and Symptoms of Anxiety
            </h2>

            <p>
                Anxiety can affect both the mind and body.
                Symptoms can vary from person to person.
            </p>

        </div>

        <div class="row g-4">

            <div class="col-md-4">

                <div class="info-card">

                    <div class="info-icon">
                        <i class="bi bi-lightning-charge"></i>
                    </div>

                    <h4>Excessive Worry</h4>

                    <p>
                        Constantly worrying about everyday
                        situations, future events or things
                        that may go wrong.
                    </p>

                </div>

            </div>

            <div class="col-md-4">

                <div class="info-card info-blue">

                    <div class="info-icon">
                        <i class="bi bi-heart-pulse"></i>
                    </div>

                    <h4>Physical Symptoms</h4>

                    <p>
                        A racing heartbeat, sweating,
                        trembling, muscle tension or
                        stomach discomfort.
                    </p>

                </div>

            </div>

            <div class="col-md-4">

                <div class="info-card">

                    <div class="info-icon">
                        <i class="bi bi-moon-stars"></i>
                    </div>

                    <h4>Sleep Difficulties</h4>

                    <p>
                        Difficulty falling asleep,
                        staying asleep or relaxing
                        because of repeated worries.
                    </p>

                </div>

            </div>

            <div class="col-md-4">

                <div class="info-card info-yellow">

                    <div class="info-icon">
                        <i class="bi bi-emoji-dizzy"></i>
                    </div>

                    <h4>Restlessness</h4>

                    <p>
                        Feeling nervous, uncomfortable
                        or unable to relax and sit still.
                    </p>

                </div>

            </div>

            <div class="col-md-4">

                <div class="info-card info-purple">

                    <div class="info-icon">
                        <i class="bi bi-people"></i>
                    </div>

                    <h4>Social Avoidance</h4>

                    <p>
                        Avoiding social situations,
                        conversations or activities
                        because of fear or worry.
                    </p>

                </div>

            </div>

            <div class="col-md-4">

                <div class="info-card">

                    <div class="info-icon">
                        <i class="bi bi-brain"></i>
                    </div>

                    <h4>Difficulty Concentrating</h4>

                    <p>
                        Finding it difficult to focus
                        because of excessive thoughts
                        and worries.
                    </p>

                </div>

            </div>

        </div>

    </section>


    <!-- CAUSES -->

    <section class="gallery-section">

        <div class="section-heading">

            <div class="section-label">
                04 — Possible Causes
            </div>

            <h2>
                What Can Contribute to Depression and Anxiety?
            </h2>

            <p>
                Mental health conditions can develop through
                a combination of biological, psychological
                and environmental factors.
            </p>

        </div>

        <div class="row g-4">

            <div class="col-md-4">

                <div class="info-card">

                    <div class="info-icon">
                        <i class="bi bi-briefcase"></i>
                    </div>

                    <h4>Stress and Work Pressure</h4>

                    <p>
                        Long-term stress, workplace pressure
                        and academic difficulties may affect
                        emotional wellbeing.
                    </p>

                </div>

            </div>

            <div class="col-md-4">

                <div class="info-card info-blue">

                    <div class="info-icon">
                        <i class="bi bi-people"></i>
                    </div>

                    <h4>Relationship Problems</h4>

                    <p>
                        Family conflicts, loneliness,
                        relationship difficulties or
                        lack of social support.
                    </p>

                </div>

            </div>

            <div class="col-md-4">

                <div class="info-card">

                    <div class="info-icon">
                        <i class="bi bi-heartbreak"></i>
                    </div>

                    <h4>Traumatic Experiences</h4>

                    <p>
                        Difficult life experiences,
                        grief, abuse or other traumatic
                        events may contribute to distress.
                    </p>

                </div>

            </div>

            <div class="col-md-4">

                <div class="info-card info-yellow">

                    <div class="info-icon">
                        <i class="bi bi-diagram-3"></i>
                    </div>

                    <h4>Family History</h4>

                    <p>
                        A family history of mental health
                        conditions may increase the
                        likelihood of developing them.
                    </p>

                </div>

            </div>

            <div class="col-md-4">

                <div class="info-card info-purple">

                    <div class="info-icon">
                        <i class="bi bi-moon"></i>
                    </div>

                    <h4>Poor Sleep</h4>

                    <p>
                        Ongoing sleep difficulties and
                        unhealthy sleep patterns can
                        affect mental wellbeing.
                    </p>

                </div>

            </div>

            <div class="col-md-4">

                <div class="info-card">

                    <div class="info-icon">
                        <i class="bi bi-activity"></i>
                    </div>

                    <h4>Health and Biological Factors</h4>

                    <p>
                        Physical health conditions,
                        hormonal changes and other
                        biological factors can play a role.
                    </p>

                </div>

            </div>

        </div>

    </section>


    <!-- DIFFERENCES -->

    <section class="gallery-section">

        <div class="section-heading">

            <div class="section-label">
                05 — Know the Difference
            </div>

            <h2>
                Depression vs Anxiety
            </h2>

            <p>
                Depression and anxiety are different
                conditions, although some people
                experience both at the same time.
            </p>

        </div>

        <div class="row g-4">

            <div class="col-md-6">

                <div class="photo-card">

                    <img
                        src="https://images.unsplash.com/photo-1533175069760-268143ce2e51?q=80&w=1170&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=NHwxMjA3fDA%3D"
                        alt="Calm natural landscape">

                    <div class="photo-content">

                        <h4>
                            <i class="bi bi-cloud-rain me-2"
                               style="color:#159b62"></i>
                            Depression
                        </h4>

                        <p>
                            Often involves persistent low mood,
                            hopelessness, reduced interest
                            and low energy.
                        </p>

                    </div>

                </div>

            </div>

            <div class="col-md-6">

                <div class="photo-card">

                    <img
                        src="https://images.unsplash.com/photo-1595178156906-2396ef837b0f?q=80&w=1170&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=NHwxMjA3fDA%3D"
                        alt="Peaceful mountain landscape">

                    <div class="photo-content">

                        <h4>
                            <i class="bi bi-lightning me-2"
                               style="color:#159b62"></i>
                            Anxiety
                        </h4>

                        <p>
                            Often involves excessive worry,
                            fear, nervousness and physical
                            symptoms of stress.
                        </p>

                    </div>

                </div>

            </div>

        </div>

        <div class="info-card mt-4">

            <h4>
                Important to Remember
            </h4>

            <p class="mb-0">
                Depression and anxiety are not signs of weakness.
                They are genuine health conditions that deserve
                understanding, care and appropriate professional
                support.
            </p>

        </div>

    </section>


    <!-- SELF CARE -->

    <section class="gallery-section">

        <div class="section-heading">

            <div class="section-label">
                06 — Healthy Lifestyle
            </div>

            <h2>
                Simple Ways to Support Your Mental Health
            </h2>

            <p>
                Healthy daily habits may support emotional
                wellbeing. They are helpful alongside
                professional treatment when needed.
            </p>

        </div>

        <div class="row g-4">

            <div class="col-md-4">

                <div class="photo-card">

                    <img
                        src="https://images.unsplash.com/photo-1600618528240-fb9fc964b853?q=80&w=1170&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=NHwxMjA3fDA%3D"
                        alt="Person practicing meditation">

                    <div class="photo-content">

                        <h4>Practice Relaxation</h4>

                        <p>
                            Try gentle breathing exercises,
                            mindfulness or meditation
                            to support relaxation.
                        </p>

                    </div>

                </div>

            </div>

            <div class="col-md-4">

                <div class="photo-card">

                    <img
                        src="https://images.unsplash.com/photo-1607962837359-5e7e89f86776?q=80&w=1170&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=NHwxMjA3fDA%3D"
                        alt="Person walking outdoors">

                    <div class="photo-content">

                        <h4>Stay Physically Active</h4>

                        <p>
                            Walking, stretching and suitable
                            physical activities can support
                            general health and wellbeing.
                        </p>

                    </div>

                </div>

            </div>

            <div class="col-md-4">

                <div class="photo-card">

                    <img
                        src="https://images.unsplash.com/photo-1520206183501-b80df61043c2?q=80&w=1171&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=NHwxMjA3fDA%3D"
                        alt="Peaceful sunrise">

                    <div class="photo-content">

                        <h4>Maintain Healthy Sleep</h4>

                        <p>
                            Follow a regular sleep schedule
                            and create a comfortable,
                            relaxing sleeping environment.
                        </p>

                    </div>

                </div>

            </div>

        </div>

        <div class="info-card mt-4">

            <h4>
                Everyday Mental Wellness Tips
            </h4>

            <ul class="health-list">

                <li>
                    <i class="bi bi-check-circle-fill"></i>
                    Maintain a regular daily routine.
                </li>

                <li>
                    <i class="bi bi-check-circle-fill"></i>
                    Eat balanced meals and drink enough water.
                </li>

                <li>
                    <i class="bi bi-check-circle-fill"></i>
                    Spend time outdoors when possible.
                </li>

                <li>
                    <i class="bi bi-check-circle-fill"></i>
                    Stay connected with trusted friends and family.
                </li>

                <li>
                    <i class="bi bi-check-circle-fill"></i>
                    Make time for activities you enjoy.
                </li>

                <li>
                    <i class="bi bi-check-circle-fill"></i>
                    Avoid using alcohol or drugs to cope with emotional distress.
                </li>

            </ul>

        </div>

    </section>


    <!-- BREATHING -->

    <section class="gallery-section">

        <div class="section-heading">

            <div class="section-label">
                07 — Relaxation Techniques
            </div>

            <h2>
                Gentle Breathing and Relaxation
            </h2>

            <p>
                Slow, comfortable breathing may help some
                people manage moments of stress and anxiety.
            </p>

        </div>

        <div class="row g-4">

            <div class="col-md-6">

                <div class="photo-card">

                    <img
                        src="https://images.unsplash.com/photo-1758274535230-3641d0632878?q=80&w=1631&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=NHwxMjA3fDA%3D"
                        alt="Person meditating in a peaceful environment">

                    <div class="photo-content">

                        <h4>Mindful Breathing</h4>

                        <p>
                            Sit comfortably and breathe gently.
                            Pay attention to your breathing
                            without trying to force it.Take a slow, deep breath in through your nose, and slowly breathe out through your mouth. 
                            Pay attention to your natural breathing without trying to force or control it.
                            Notice how your chest and stomach gently rise and fall with each breath
                        </p>

                    </div>

                </div>

            </div>

            <div class="col-md-6">

                <div class="info-card">

                    <h4>
                        A Simple Relaxation Exercise
                    </h4>

                    <ul class="health-list">

                        <li>
                            <i class="bi bi-1-circle-fill"></i>
                            Find a comfortable and quiet place.
                        </li>

                        <li>
                            <i class="bi bi-2-circle-fill"></i>
                            Relax your shoulders and muscles.
                        </li>

                        <li>
                            <i class="bi bi-3-circle-fill"></i>
                            Breathe in gently through your nose.
                        </li>

                        <li>
                            <i class="bi bi-4-circle-fill"></i>
                            Slowly breathe out without forcing it.
                        </li>

                        <li>
                            <i class="bi bi-5-circle-fill"></i>
                            Repeat comfortably for a few minutes.
                        </li>

                    </ul>

                    <p class="mt-3 mb-0">
                        Stop if you feel dizzy or uncomfortable.
                        This exercise is not a replacement
                        for mental health treatment.
                    </p>

                </div>

            </div>

        </div>

    </section>


    <!-- TREATMENT -->

    <section class="gallery-section">

        <div class="section-heading">

            <div class="section-label">
                08 — Professional Treatment
            </div>

            <h2>
                Getting Help for Depression and Anxiety
            </h2>

            <p>
                Effective treatments are available.
                A qualified mental health professional
                can help identify the most appropriate care.
            </p>

        </div>

        <div class="row g-4">

            <div class="col-md-4">

                <div class="info-card">

                    <div class="info-icon">
                        <i class="bi bi-chat-heart"></i>
                    </div>

                    <h4>Psychological Therapy</h4>

                    <p>
                        Talking therapies such as cognitive
                        behavioural therapy (CBT) can help
                        people understand and manage
                        difficult thoughts and feelings.
                    </p>

                </div>

            </div>

            <div class="col-md-4">

                <div class="info-card info-blue">

                    <div class="info-icon">
                        <i class="bi bi-hospital"></i>
                    </div>

                    <h4>Medical Support</h4>

                    <p>
                        Doctors and mental health specialists
                        can assess symptoms, provide guidance
                        and recommend suitable treatment.
                    </p>

                </div>

            </div>

            <div class="col-md-4">

                <div class="info-card">

                    <div class="info-icon">
                        <i class="bi bi-capsule"></i>
                    </div>

                    <h4>Medication When Needed</h4>

                    <p>
                        Certain prescribed medicines may
                        help manage depression or anxiety.
                        Medication should only be used
                        under professional guidance.
                    </p>

                </div>

            </div>

        </div>

        <div class="info-card mt-4">

            <h4>
                Who Can Provide Support?
            </h4>

            <ul class="health-list">

                <li>
                    <i class="bi bi-check-circle-fill"></i>
                    Psychiatrists.
                </li>

                <li>
                    <i class="bi bi-check-circle-fill"></i>
                    Clinical psychologists.
                </li>

                <li>
                    <i class="bi bi-check-circle-fill"></i>
                    Qualified counsellors and therapists.
                </li>

                <li>
                    <i class="bi bi-check-circle-fill"></i>
                    General practitioners and other healthcare professionals.
                </li>

            </ul>

        </div>

    </section>


    <!-- FAMILY SUPPORT -->

    <section class="gallery-section">

        <div class="section-heading">

            <div class="section-label">
                09 — Family and Social Support
            </div>

            <h2>
                How Can You Support Someone?
            </h2>

            <p>
                Understanding, patience and emotional support
                can make a meaningful difference to someone
                experiencing mental health difficulties.
            </p>

        </div>

        <div class="row g-4">

            <div class="col-md-4">

                <div class="photo-card">

                    <img
                        src="https://images.unsplash.com/photo-1511632765486-a01980e01a18?w=800&q=85"
                        alt="Friends spending time together">

                    <div class="photo-content">

                        <h4>Listen Without Judgement</h4>

                        <p>
                            Give the person time to express
                            their feelings. Listen with
                            kindness and understanding.
                        </p>

                    </div>

                </div>

            </div>

            <div class="col-md-4">

                <div class="photo-card">

                    <img
                        src="https://images.unsplash.com/photo-1758525226653-490405551ce9?q=80&w=1632&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=NHwxMjA3fDA%3D"
                        alt="Friends supporting each other">

                    <div class="photo-content">

                        <h4>Offer Emotional Support</h4>

                        <p>
                            Remind them that they are not alone
                            and that asking for help is okay.
                        </p>

                    </div>

                </div>

            </div>

            <div class="col-md-4">

                <div class="photo-card">

                    <img
                        src="https://images.unsplash.com/photo-1578574577315-3fbeb0cecdc2?q=80&w=1172&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=NHwxMjA3fDA%3D"
                        alt="Family spending time together">

                    <div class="photo-content">

                        <h4>Encourage Professional Help</h4>

                        <p>
                            Encourage appropriate medical
                            support and offer to help
                            arrange an appointment.
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </section>


    <!-- WARNING -->

    <div class="warning-banner">

        <div class="warning-icon">
            <i class="bi bi-exclamation-triangle-fill"></i>
        </div>

        <div>

            <h4>
                When Should You Seek Professional Help?
            </h4>

            <p>
                Consider speaking to a healthcare professional
                if sadness, worry, fear, sleep difficulties
                or changes in behaviour continue, become
                overwhelming or interfere with work,
                education, relationships or everyday life.
                You do not need to wait until symptoms
                become severe before asking for help.
            </p>

        </div>

    </div>


    <!-- EMERGENCY -->

    <div class="emergency-banner">

        <div class="emergency-icon">
            <i class="bi bi-heart-pulse-fill"></i>
        </div>

        <div>

            <h4>
                Mental Health Emergency
            </h4>

            <p>
                If someone is thinking about suicide, has
                plans to harm themselves or someone else,
                or cannot stay safe, seek immediate help
                from emergency medical services or the
                nearest hospital. Stay with the person
                if it is safe to do so, listen without
                judgement and help them reach professional
                support. Do not leave an immediate
                safety crisis untreated.
            </p>

        </div>

    </div>


    <!-- MYTHS -->

    <section class="gallery-section">

        <div class="section-heading">

            <div class="section-label">
                10 — Mental Health Awareness
            </div>

            <h2>
                Common Mental Health Myths and Facts
            </h2>

            <p>
                Understanding the truth about mental health
                helps reduce stigma and encourages people
                to seek support.
            </p>

        </div>

        <div class="row g-4">

            <div class="col-md-6">

                <div class="info-card info-yellow">

                    <h4>
                        <i class="bi bi-x-circle-fill text-danger me-2"></i>
                        Myth: Depression is just sadness.
                    </h4>

                    <p>
                        Fact: Depression is a real health
                        condition that can affect emotions,
                        physical health, thoughts and
                        everyday functioning.
                    </p>

                </div>

            </div>

            <div class="col-md-6">

                <div class="info-card">

                    <h4>
                        <i class="bi bi-check-circle-fill text-success me-2"></i>
                        Fact: Mental health conditions are treatable.
                    </h4>

                    <p>
                        Professional treatment and
                        appropriate support can help
                        many people improve.   

                    </p>

                </div>

            </div>

            <div class="col-md-6">

                <div class="info-card info-yellow">

                    <h4>
                        <i class="bi bi-x-circle-fill text-danger me-2"></i>
                        Myth: Asking for help is weakness.
                    </h4>

                    <p>
                        Fact: Seeking help is a positive
                        and courageous step towards
                        better mental wellbeing.
                    </p>

                </div>

            </div>

            <div class="col-md-6">

                <div class="info-card">

                    <h4>
                        <i class="bi bi-check-circle-fill text-success me-2"></i>
                        Fact: Everyone deserves support.
                    </h4>

                    <p>
                        Mental health difficulties can
                        affect people from all backgrounds
                        and at any stage of life.
                    </p>

                </div>

            </div>

        </div>

    </section>


    <!-- POSITIVE MENTAL HEALTH -->

    <section class="gallery-section">

        <div class="section-heading">

            <div class="section-label">
                11 — Positive Mental Wellbeing
            </div>

            <h2>
                Small Steps Towards a Healthier Mind
            </h2>

            <p>
                Building supportive daily habits and
                meaningful relationships can help
                maintain emotional wellbeing.
            </p>

        </div>

        <div class="row g-4">

            <div class="col-md-4">

                <div class="photo-card">

                    <img
                        src="https://images.unsplash.com/photo-1470770841072-f978cf4d019e?w=800&q=85"
                        alt="Peaceful nature scenery">

                    <div class="photo-content">

                        <h4>Spend Time in Nature</h4>

                        <p>
                            Enjoy peaceful outdoor activities
                            and take time to relax.
                        </p>

                    </div>

                </div>

            </div>

            <div class="col-md-4">

                <div class="photo-card">

                    <img
                        src="https://images.unsplash.com/photo-1490645935967-10de6ba17061?w=800&q=85"
                        alt="Healthy balanced food">

                    <div class="photo-content">

                        <h4>Eat Balanced Meals</h4>

                        <p>
                            Maintain a healthy eating routine
                            and care for your physical health.
                        </p>

                    </div>

                </div>

            </div>

            <div class="col-md-4">

                <div class="photo-card">

                    <img
                        src="https://images.unsplash.com/photo-1776062356815-d5e8312792a8?q=80&w=1339&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=NHwxMjA3fDA%3D"
                        alt="Friends enjoying time together">

                    <div class="photo-content">

                        <h4>Build Positive Connections</h4>

                        <p>
                            Spend time with supportive people
                            and maintain meaningful relationships.
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </section>


    <!-- SUPPORT -->

    <div class="support-banner">

        <div class="support-icon">
            <i class="bi bi-heart-fill"></i>
        </div>

        <div>

            <h4>
                You Are Not Alone
            </h4>

            <p>
                It is okay to have difficult days.
                Your feelings matter and you deserve
                care, understanding and support.
                Talking to someone you trust or
                contacting a qualified mental health
                professional can be an important
                first step.
            </p>

        </div>

    </div>


    <!-- GALLERY -->

    <section class="gallery-section">

        <div class="section-heading">

            <div class="section-label">
                12 — Mental Wellness Gallery
            </div>

            <h2>
                A Peaceful Mind, A Healthier Life
            </h2>

            <p>
                Mental wellbeing is an important part
                of overall health. Every small step
                towards self-care and support matters.
            </p>

        </div>

        <div class="row g-4">

            <div class="col-md-4">

                <div class="photo-card">

                    <img
                        src="https://images.unsplash.com/photo-1545205597-3d9d02c29597?q=80&w=1170&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=NHwxMjA3fDA%3D"
                        alt="Mindfulness and meditation">

                    <div class="photo-content">

                        <h4>Mindfulness</h4>

                        <p>
                            Take a moment to relax,
                            breathe and reconnect with yourself.
                        </p>

                    </div>

                </div>

            </div>

            <div class="col-md-4">

                <div class="photo-card">

                    <img
                        src="https://img.magnific.com/free-photo/positive-emotions-young-beautiful-bearded-caucasian-male-blue-t-shirt-lying-grass-smiling-with-teeth-laughing-relaxing-outside-summer-morning-with-happy-face-expression_176420-19933.jpg?semt=ais_hybrid&w=740&q=80"
                        alt="Beautiful sunrise">

                    <div class="photo-content">

                        <h4>Fresh Beginnings</h4>

                        <p>
                            Every day is an opportunity
                            to take a positive step forward.
                        </p>

                    </div>

                </div>

            </div>

            <div class="col-md-4">

                <div class="photo-card">

                    <img
                        src="https://images.unsplash.com/photo-1529156069898-49953e39b3ac?w=800&q=85"
                        alt="Friends supporting each other">

                    <div class="photo-content">

                        <h4>Support and Friendship</h4>

                        <p>
                            Strong relationships can provide
                            comfort and encouragement.
                        </p>

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

                    <h4>
                        Important Mental Health Information
                    </h4>

                    <p class="mb-0">
                        This gallery provides general educational
                        information about depression, anxiety
                        and mental wellbeing. It is not intended
                        to diagnose, treat or replace professional
                        medical advice. If you are experiencing
                        mental health difficulties, consult a
                        qualified healthcare professional.
                        In an emergency or immediate safety crisis,
                        seek urgent medical assistance.
                    </p>

                </div>

            </div>

        </div>

    </section>


    <!-- FOOTER -->

    <footer class="mental-footer">

        <h4>
            <i class="bi bi-heart-fill me-2"></i>
            Your Mental Health Matters
        </h4>

        <p>
            Care • Understand • Support • Recover
            <br>
            Depression and Anxiety Awareness Gallery
        </p>

    </footer>


</div>
</div>
</div>

@endsection
