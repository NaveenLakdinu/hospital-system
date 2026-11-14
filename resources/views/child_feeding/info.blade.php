
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

.child-page {
    background: var(--background);
    min-height: 100vh;
    padding: 35px 15px;
    font-family: 'Inter', sans-serif;
    color: var(--dark);
}

.child-container {
    max-width: 1200px;
    margin: auto;
}

.child-wrapper {
    background: var(--white);
    border-radius: 25px;
    overflow: hidden;
    box-shadow: 0 12px 45px rgba(21,155,98,.09);
    border: 1px solid var(--border);
}

/* HEADER */

.child-header {
    padding: 22px 35px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    border-bottom: 1px solid var(--border);
}

.child-brand {
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

.child-hero {
    margin: 28px;
    min-height: 370px;
    border-radius: 22px;
    overflow: hidden;
    position: relative;
    display: flex;
    align-items: center;
    background:
        linear-gradient(90deg, rgba(232,247,237,.98) 0%,
        rgba(232,247,237,.92) 45%,
        rgba(232,247,237,.12) 100%),
        url('https://images.unsplash.com/photo-1492725764893-90b379c2b6e7?w=1400&q=85')
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

/* EMERGENCY BOX */

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

.child-footer {
    background: linear-gradient(110deg, #159b62, #0d6b43);
    color: white;
    text-align: center;
    padding: 28px 20px;
}

.child-footer h4 {
    font-size: 17px;
    font-weight: 800;
    margin-bottom: 8px;
}

.child-footer p {
    font-size: 11px;
    opacity: .85;
    margin: 0;
    line-height: 1.8;
}

/* RESPONSIVE */

@media(max-width:768px) {
    .child-page {
        padding: 12px 8px;
    }

    .child-header {
        padding: 17px;
    }

    .child-brand {
        font-size: 14px;
    }

    .close-gallery {
        padding: 8px 10px;
        font-size: 11px;
    }

    .child-hero {
        margin: 15px;
        min-height: 410px;
        background:
            linear-gradient(90deg, rgba(232,247,237,.97),
            rgba(232,247,237,.80)),
            url('https://images.unsplash.com/photo-1492725764893-90b379c2b6e7?w=900&q=85')
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
    .emergency-banner {
        margin: 0 18px 25px;
        padding: 19px;
    }

    .photo-card img {
        height: 180px;
    }
}
</style>

<div class="child-page">
<div class="child-container">
<div class="child-wrapper">

    <!-- HEADER -->
    <header class="child-header">
        <div class="child-brand">
            <div class="brand-icon">
                <i class="bi bi-heart-pulse-fill"></i>
            </div>
            <div>
                Child Feeding Health Gallery
                <span class="brand-small">Healthy Feeding, Happy Baby</span>
            </div>
        </div>

        <a href="{{ route('dashboard') }}" class="close-gallery">
            <i class="bi bi-x-lg"></i> Close Gallery
        </a>
    </header>

    <!-- HERO -->
    <section class="child-hero">
        <div class="hero-content">
            <div class="hero-badge">
                <i class="bi bi-emoji-smile"></i>
                CHILD NUTRITION AWARENESS
            </div>

            <h1>
                When Your Child Is
                <span>Not Feeding Well.</span>
            </h1>

            <p>
                Learn about common feeding difficulties, possible causes,
                breastfeeding support, healthy feeding habits and warning
                signs that need medical attention.
            </p>

            <div class="hero-footer">
                <i class="bi bi-heart-fill"></i>
                Every little feed matters
            </div>
        </div>
    </section>

    <!-- ABOUT -->
    <section class="gallery-section">
        <div class="section-heading">
            <div class="section-label">01 — Understanding Feeding Problems</div>
            <h2>What Does "Not Feeding Well" Mean?</h2>
            <p>
                A child may be feeding less than usual, refusing feeds,
                having difficulty sucking or swallowing, or becoming
                tired during feeding.
            </p>
        </div>

        <div class="row g-4">

            <div class="col-md-4">
                <div class="info-card">
                    <div class="info-icon">
                        <i class="bi bi-cup-straw"></i>
                    </div>
                    <h4>Reduced Feeding</h4>
                    <p>
                        The child takes less milk or food than usual,
                        or feeds for shorter periods than normal.
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="info-card info-blue">
                    <div class="info-icon">
                        <i class="bi bi-emoji-frown"></i>
                    </div>
                    <h4>Refusing Feeds</h4>
                    <p>
                        The child may turn away, become upset,
                        or repeatedly refuse breast milk, formula
                        or age-appropriate foods.
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="info-card">
                    <div class="info-icon">
                        <i class="bi bi-clock-history"></i>
                    </div>
                    <h4>Difficulty During Feeding</h4>
                    <p>
                        The child may struggle to latch, suck,
                        swallow or complete a feed comfortably.
                    </p>
                </div>
            </div>

        </div>
    </section>

    <!-- COMMON SIGNS -->
    <section class="gallery-section">
        <div class="section-heading">
            <div class="section-label">02 — Recognizing the Signs</div>
            <h2>Common Signs of Poor Feeding</h2>
            <p>
                Parents and caregivers should pay attention to
                changes in feeding patterns and the child's behaviour.
            </p>
        </div>

        <div class="row g-4">

            <div class="col-md-4">
                <div class="photo-card">
                    <img src="https://assets.babycenter.com/ims/2015/01/iStock_54956324_4x3.jpg"
                         alt="Parent caring for a baby">
                    <div class="photo-content">
                        <h4>Refusing Milk or Food</h4>
                        <p>
                            The child may refuse the breast, bottle
                            or usual meals more often than normal.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="photo-card">
                    <img src="https://cdn-jdbmn.nitrocdn.com/OPXVGBFbJNpHuizjpEvrPAZpgJKiZRsS/assets/images/optimized/rev-d9cc2a6/newbornbaby.com.au/wp-content/uploads/2020/04/Newborn-baby-girl-yawning.jpg"
                         alt="Mother holding a young baby">
                    <div class="photo-content">
                        <h4>Unusual Tiredness</h4>
                        <p>
                            The child may become unusually sleepy,
                            weak or less interested in feeding.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="photo-card">
                    <img src="https://images.unsplash.com/photo-1519689680058-324335c77eba?w=800&q=85"
                         alt="Baby resting">
                    <div class="photo-content">
                        <h4>Changes in Wet Nappies</h4>
                        <p>
                            Fewer wet nappies than usual may be
                            a sign that the child is not getting
                            enough fluid.
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- POSSIBLE CAUSES -->
    <section class="gallery-section">
        <div class="section-heading">
            <div class="section-label">03 — Possible Causes</div>
            <h2>Why Is Your Child Not Feeding Well?</h2>
            <p>
                Feeding difficulties can happen for several reasons.
                A healthcare professional can help identify the cause.
            </p>
        </div>

        <div class="row g-4">

            <div class="col-md-4">
                <div class="info-card">
                    <div class="info-icon">
                        <i class="bi bi-thermometer-half"></i>
                    </div>
                    <h4>Illness or Fever</h4>
                    <p>
                        Infections, fever or general discomfort
                        may reduce a child's appetite and interest
                        in feeding.
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="info-card info-blue">
                    <div class="info-icon">
                        <i class="bi bi-wind"></i>
                    </div>
                    <h4>Blocked Nose</h4>
                    <p>
                        Nasal congestion can make it difficult
                        for babies to breathe comfortably
                        while feeding.
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="info-card">
                    <div class="info-icon">
                        <i class="bi bi-droplet-half"></i>
                    </div>
                    <h4>Breastfeeding or Latch Problems</h4>
                    <p>
                        Difficulty attaching to the breast or
                        transferring milk may affect feeding.
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="info-card info-yellow">
                    <div class="info-icon">
                        <i class="bi bi-emoji-frown"></i>
                    </div>
                    <h4>Mouth Pain</h4>
                    <p>
                        Mouth ulcers, oral thrush or other
                        discomfort may make sucking and eating painful.
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="info-card info-purple">
                    <div class="info-icon">
                        <i class="bi bi-activity"></i>
                    </div>
                    <h4>Digestive Discomfort</h4>
                    <p>
                        Vomiting, reflux, constipation or other
                        digestive problems may affect feeding.
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="info-card">
                    <div class="info-icon">
                        <i class="bi bi-heart-pulse"></i>
                    </div>
                    <h4>Other Health Conditions</h4>
                    <p>
                        Some medical conditions can affect sucking,
                        swallowing, breathing or appetite.
                    </p>
                </div>
            </div>

        </div>
    </section>

    <!-- BREASTFEEDING -->
    <section class="gallery-section">
        <div class="section-heading">
            <div class="section-label">04 — Breastfeeding Support</div>
            <h2>Helping Your Baby Breastfeed</h2>
            <p>
                Comfortable positioning and effective attachment
                can help make breastfeeding easier.
            </p>
        </div>

        <div class="row g-4">

            <div class="col-md-6">
                <div class="photo-card">
                    <img src="https://teddyydiaper.in/wp-content/uploads/2023/02/breastfeeding-positions-mom-baby.jpg"
                         alt="Mother and baby resting together">
                    <div class="photo-content">
                        <h4>Comfortable Positioning</h4>
                        <p>
                            Support your baby's head, neck and body.
                            Keep the baby close and facing the breast.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="photo-card">
                    <img src="https://partnersinpediatrics.com/wp-content/uploads/2019/09/partners-in-pediatrics-denver-englewood-dtc-parker-pediatrician-integrative-holistic-breastfeeding-newborn-mother-nutrition-babies-bottle-formula.jpg"
                         alt="Mother holding her baby">
                    <div class="photo-content">
                        <h4>Look for Effective Feeding</h4>
                        <p>
                            Watch for rhythmic sucking and swallowing.
                            Ask a trained breastfeeding professional
                            to assess attachment if feeding is difficult.
                        </p>
                    </div>
                </div>
            </div>

        </div>

        <div class="info-card mt-4">
            <h4>Breastfeeding Support Tips</h4>
            <ul class="health-list">
                <li><i class="bi bi-check-circle-fill"></i> Offer feeds in response to your baby's hunger cues.</li>
                <li><i class="bi bi-check-circle-fill"></i> Try a comfortable feeding position.</li>
                <li><i class="bi bi-check-circle-fill"></i> Check whether your baby is attaching properly.</li>
                <li><i class="bi bi-check-circle-fill"></i> Look and listen for swallowing during feeds.</li>
                <li><i class="bi bi-check-circle-fill"></i> Seek help from a midwife or lactation professional if needed.</li>
            </ul>
        </div>
    </section>

    <!-- BOTTLE FEEDING -->
    <section class="gallery-section">
        <div class="section-heading">
            <div class="section-label">05 — Bottle Feeding Support</div>
            <h2>Safe Bottle Feeding Practices</h2>
            <p>
                If your baby receives expressed breast milk or formula,
                safe preparation and feeding practices are important.
            </p>
        </div>

        <div class="row g-4">

            <div class="col-md-4">
                <div class="info-card">
                    <div class="info-icon">
                        <i class="bi bi-bottle"></i>
                    </div>
                    <h4>Check the Feeding Bottle</h4>
                    <p>
                        Keep bottles and feeding equipment clean.
                        Follow recommended cleaning and sterilising
                        guidance for your baby's age and circumstances.
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="info-card info-blue">
                    <div class="info-icon">
                        <i class="bi bi-person-heart"></i>
                    </div>
                    <h4>Hold Your Baby Safely</h4>
                    <p>
                        Hold your baby close during feeds.
                        Never prop up a bottle or leave a baby
                        feeding unattended.
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="info-card">
                    <div class="info-icon">
                        <i class="bi bi-clock"></i>
                    </div>
                    <h4>Follow Feeding Cues</h4>
                    <p>
                        Allow your baby to pause and stop when
                        showing signs of fullness. Do not force
                        the baby to finish a bottle.
                    </p>
                </div>
            </div>

        </div>

        <div class="info-card mt-4">
            <h4>Important Formula Feeding Advice</h4>
            <p class="mb-0">
                Prepare infant formula exactly according to the
                manufacturer's instructions and local health guidance.
                Use the correct water-to-powder ratio. Never dilute
                formula or add extra powder. Do not give homemade
                formula or ordinary cow's milk as a replacement
                for infant formula in babies under 12 months.
            </p>
        </div>
    </section>

    <!-- AGE APPROPRIATE FOOD -->
    <section class="gallery-section">
        <div class="section-heading">
            <div class="section-label">06 — Age-Appropriate Nutrition</div>
            <h2>Feeding According to Your Child's Age</h2>
            <p>
                Children's nutritional needs change as they grow.
                Follow age-appropriate feeding guidance.
            </p>
        </div>

        <div class="row g-4">

            <div class="col-md-4">
                <div class="photo-card">
                    <img src="https://images.unsplash.com/photo-1701839640941-02c5bb0bb0b6?q=80&w=1171&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=NHwxMjA3fDA%3D"
                         alt="Young infant">
                    <div class="photo-content">
                        <h4>Birth to Around 6 Months</h4>
                        <p>
                            Breast milk is recommended exclusively
                            for around the first six months.
                            If breastfeeding is not possible,
                            use appropriate infant formula
                            with professional guidance.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="photo-card">
                    <img src="https://images.unsplash.com/photo-1566004100631-35d015d6a491?q=80&w=1170&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=NHwxMjA3fDA%3D"
                         alt="Baby beginning solid foods">
                    <div class="photo-content">
                        <h4>Around 6 to 12 Months</h4>
                        <p>
                            Introduce safe, age-appropriate
                            complementary foods around six months
                            while continuing breast milk or formula.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="photo-card">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTVQ9-Bz77dhoIjDAzwZF64bata7qV5Pqz8jENO3dI_Cns7hSzbxACjvoc&s=10"
                         alt="Nutritious food">
                    <div class="photo-content">
                        <h4>12 Months and Older</h4>
                        <p>
                            Offer a varied, balanced diet with
                            age-appropriate textures and suitable
                            family foods.
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- DEHYDRATION -->
    <section class="gallery-section">
        <div class="section-heading">
            <div class="section-label">07 — Important Health Signs</div>
            <h2>Signs of Possible Dehydration</h2>
            <p>
                Poor feeding can sometimes lead to dehydration,
                especially in babies and young children.
            </p>
        </div>

        <div class="row g-4">

            <div class="col-md-6">
                <div class="photo-card">
                    <img src="https://images.unsplash.com/photo-1516627145497-ae6968895b74?w=900&q=85"
                         alt="Parent caring for baby">
                    <div class="photo-content">
                        <h4>Watch Your Baby Carefully</h4>
                        <p>
                            Monitor wet nappies, alertness, mouth
                            moisture and general behaviour.
                            Seek medical advice if you notice changes.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="info-card">
                    <h4>Possible Dehydration Signs</h4>
                    <ul class="health-list">
                        <li><i class="bi bi-exclamation-circle-fill"></i> Fewer wet nappies or less urine than usual.</li>
                        <li><i class="bi bi-exclamation-circle-fill"></i> Dry mouth or tongue.</li>
                        <li><i class="bi bi-exclamation-circle-fill"></i> Few or no tears when crying.</li>
                        <li><i class="bi bi-exclamation-circle-fill"></i> Unusual sleepiness or irritability.</li>
                        <li><i class="bi bi-exclamation-circle-fill"></i> Sunken eyes or a sunken soft spot on an infant's head.</li>
                    </ul>
                </div>
            </div>

        </div>
    </section>

    <!-- PARENT CARE -->
    <section class="gallery-section">
        <div class="section-heading">
            <div class="section-label">08 — Parent and Caregiver Guidance</div>
            <h2>What Can Parents Do?</h2>
        </div>

        <div class="row g-4">

            <div class="col-md-4">
                <div class="info-card">
                    <div class="info-icon">
                        <i class="bi bi-heart"></i>
                    </div>
                    <h4>Stay Calm and Comfort Your Child</h4>
                    <p>
                        Keep your child comfortable and offer
                        gentle reassurance during feeding.
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="info-card info-blue">
                    <div class="info-icon">
                        <i class="bi bi-journal-check"></i>
                    </div>
                    <h4>Monitor Feeding Patterns</h4>
                    <p>
                        Note feeding frequency, amounts taken,
                        wet nappies and changes in behaviour.
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="info-card">
                    <div class="info-icon">
                        <i class="bi bi-hospital"></i>
                    </div>
                    <h4>Seek Professional Support</h4>
                    <p>
                        Contact a doctor, midwife or child health
                        professional if feeding difficulties continue.
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
            <h4>When Should You Contact a Doctor?</h4>
            <p>
                Seek prompt medical advice if your child is feeding
                much less than usual, has fewer wet nappies, repeatedly
                vomits, has persistent diarrhoea, develops a fever,
                or is not gaining weight as expected. Do not wait
                for symptoms to become severe if you are concerned.
            </p>
        </div>
    </div>

    <!-- EMERGENCY -->
    <div class="emergency-banner">
        <div class="emergency-icon">
            <i class="bi bi-ambulance"></i>
        </div>
        <div>
            <h4>Emergency Warning Signs</h4>
            <p>
                Get emergency medical help if your child is difficult
                to wake, unusually floppy, struggling to breathe,
                turning blue or grey, having a seizure, or unable
                to swallow. A baby younger than 3 months with a
                temperature of 38°C or higher needs immediate
                medical assessment. Do not force-feed a child
                who is very drowsy or struggling to breathe.
            </p>
        </div>
    </div>

    <!-- MYTHS -->
    <section class="gallery-section">
        <div class="section-heading">
            <div class="section-label">09 — Health Awareness</div>
            <h2>Common Feeding Myths and Facts</h2>
        </div>

        <div class="row g-4">

            <div class="col-md-6">
                <div class="info-card info-yellow">
                    <h4>
                        <i class="bi bi-x-circle-fill text-danger me-2"></i>
                        Myth: Force the child to finish every feed.
                    </h4>
                    <p>
                        Fact: Forcing feeds can cause distress.
                        Follow hunger and fullness cues and
                        seek advice if intake is poor.
                    </p>
                </div>
            </div>

            <div class="col-md-6">
                <div class="info-card">
                    <h4>
                        <i class="bi bi-check-circle-fill text-success me-2"></i>
                        Fact: Feeding changes need attention.
                    </h4>
                    <p>
                        A noticeable change in feeding can be
                        an important sign of illness or discomfort.
                    </p>
                </div>
            </div>

            <div class="col-md-6">
                <div class="info-card info-yellow">
                    <h4>
                        <i class="bi bi-x-circle-fill text-danger me-2"></i>
                        Myth: Give water to every young baby.
                    </h4>
                    <p>
                        Fact: Babies under around six months
                        generally get the fluid they need from
                        breast milk or correctly prepared formula.
                        Do not give extra water unless advised
                        by a healthcare professional.
                    </p>
                </div>
            </div>

            <div class="col-md-6">
                <div class="info-card">
                    <h4>
                        <i class="bi bi-check-circle-fill text-success me-2"></i>
                        Fact: Early support can help.
                    </h4>
                    <p>
                        A healthcare professional can assess
                        feeding, hydration, growth and possible
                        underlying health problems.
                    </p>
                </div>
            </div>

        </div>
    </section>

    <!-- GALLERY -->
    <section class="gallery-section">
        <div class="section-heading">
            <div class="section-label">10 — Baby Care Gallery</div>
            <h2>Healthy Baby, Happy Family</h2>
            <p>
                Good feeding support, careful monitoring and
                professional guidance help children grow well.
            </p>
        </div>

        <div class="row g-4">

            <div class="col-md-4">
                <div class="photo-card">
                    <img src="https://images.unsplash.com/photo-1492725764893-90b379c2b6e7?w=800&q=85"
                         alt="Mother holding baby">
                    <div class="photo-content">
                        <h4>Mother and Baby Care</h4>
                        <p>Provide comfort, care and responsive feeding.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="photo-card">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR-Jr5dkxS51PGVuY_S_YIEdDOtU6WHiq1HbSp6kvWCwpD2oZvS6I-0s1o&s=10"
                         alt="Baby food">
                    <div class="photo-content">
                        <h4>Healthy Nutrition</h4>
                        <p>Offer safe foods suitable for the child's age.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="photo-card">
                    <img src="https://img.magnific.com/premium-photo/care-happy-family-foster-baby-home-love-support-bonding-together-mother-father-cute-adopted-kid-with-parents-connection-interracial-diversity-with-child-living-room_590464-436933.jpg?semt=ais_hybrid&w=740&q=80"
                         alt="Parent and child">
                    <div class="photo-content">
                        <h4>Family Support</h4>
                        <p>Support parents and seek help when needed.</p>
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
                    <h4>Important Child Health Information</h4>
                    <p class="mb-0">
                        This gallery provides general educational
                        information about child feeding difficulties.
                        It is not a medical diagnosis or a substitute
                        for professional medical advice. Feeding
                        difficulties in babies can become serious
                        quickly. If your child is not feeding well,
                        contact a qualified healthcare professional
                        for an assessment.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <footer class="child-footer">
        <h4>
            <i class="bi bi-heart-fill me-2"></i>
            Healthy Feeding, Happy Baby
        </h4>
        <p>
            Care • Feed • Protect • Grow
            <br>
            Child Feeding Health Information Gallery
        </p>
    </footer>

</div>
</div>
</div>

@endsection
