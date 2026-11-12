
@extends('layouts.app')

@section('content')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

<style>
:root {
    --pink:#ed5794;
    --pink-light:#fff0f6;
    --blue:#2675ed;
    --blue-light:#edf5ff;
    --green:#20ae79;
    --green-light:#eaf9f1;
    --dark:#172b50;
    --muted:#72819a;
    --purple:#8957d9;
    --background:#f5f8fd;
}

.skin-page {
    font-family:'Inter',sans-serif;
    background:var(--background);
    padding:28px 0 65px;
    color:var(--dark);
    min-height:100vh;
}

.skin-container { max-width:1250px; }

.skin-wrapper {
    background:white;
    border-radius:26px;
    overflow:hidden;
    box-shadow:0 12px 45px rgba(31,59,100,.07);
}

.skin-header {
    padding:24px 32px;
    display:flex;
    align-items:center;
    justify-content:space-between;
    border-bottom:1px solid #edf0f7;
}

.skin-brand {
    display:flex;
    align-items:center;
    gap:13px;
}

.brand-icon {
    width:48px;
    height:48px;
    border-radius:16px;
    background:#ffe7f0;
    color:#e94f8c;
    display:flex;
    justify-content:center;
    align-items:center;
    font-size:24px;
}

.skin-brand h4 {
    font-size:18px;
    font-weight:800;
    margin:0;
}

.skin-brand p {
    color:var(--muted);
    font-size:12px;
    margin:3px 0 0;
}

.close-gallery {
    width:42px;
    height:42px;
    border:1px solid #e7ebf3;
    border-radius:50%;
    background:white;
    color:var(--dark);
    display:flex;
    justify-content:center;
    align-items:center;
    font-size:19px;
    text-decoration:none;
}

.close-gallery:hover {
    background:var(--pink);
    color:white;
}

/* HERO */

.skin-hero {
    margin:24px;
    min-height:390px;
    border-radius:23px;
    overflow:hidden;
    display:flex;
    align-items:center;
    position:relative;
    background-image:
        linear-gradient(
            90deg,
            rgba(240,247,255,.97) 0%,
            rgba(240,247,255,.90) 42%,
            rgba(240,247,255,.12) 100%
        ),
        url('https://images.unsplash.com/photo-1616394584738-fc6e612e71b9?auto=format&fit=crop&w=1600&q=85');
    background-position:center;
    background-size:cover;
    background-repeat:no-repeat;
    border:1px solid #dce9ff;
}

.hero-content {
    padding:45px;
    max-width:650px;
    position:relative;
    z-index:2;
}

.hero-badge {
    background:white;
    color:#20a978;
    border-radius:50px;
    padding:9px 17px;
    display:inline-block;
    font-size:12px;
    font-weight:800;
    margin-bottom:22px;
}

.hero-content h1 {
    font-size:clamp(32px,4vw,47px);
    line-height:1.17;
    font-weight:800;
    letter-spacing:-1.5px;
    color:#142c56;
}

.hero-content h1 span { color:#a343cc; }

.hero-content p {
    color:#536d91;
    font-size:14px;
    line-height:1.9;
    max-width:510px;
}

.hero-footer {
    display:inline-flex;
    align-items:center;
    gap:9px;
    background:#ffe1f0;
    color:#d83e83;
    padding:11px 18px;
    border-radius:50px;
    font-size:12px;
    font-weight:700;
    margin-top:12px;
}

/* SECTION */

.gallery-section { padding:15px 28px 25px; }

.section-heading { margin-bottom:20px; }

.section-heading h3 {
    font-size:22px;
    font-weight:800;
    color:var(--dark);
    margin-bottom:7px;
}

.section-heading p {
    font-size:13px;
    color:var(--muted);
    margin:0;
}

.section-label {
    color:var(--pink);
    font-size:11px;
    font-weight:800;
    letter-spacing:1.4px;
    margin-bottom:8px;
    display:block;
}

/* CARDS */

.info-card {
    border-radius:20px;
    padding:23px;
    height:100%;
    border:1px solid transparent;
}

.info-card h5 {
    font-weight:800;
    font-size:16px;
    margin-bottom:12px;
}

.info-card p {
    font-size:12px;
    color:#5f708a;
    line-height:1.85;
    margin:0;
}

.info-blue { background:#edf5ff; border-color:#dceaff; }
.info-pink { background:#fff0f6; border-color:#ffe0ed; }
.info-green { background:#eaf9f1; border-color:#d5f0e1; }
.info-yellow { background:#fff8e8; border-color:#f8edcf; }
.info-purple { background:#f5efff; border-color:#e9ddff; }

.info-icon {
    width:45px;
    height:45px;
    border-radius:14px;
    background:white;
    display:flex;
    justify-content:center;
    align-items:center;
    font-size:22px;
    margin-bottom:14px;
}

.pink-text { color:#e74e8c; }
.blue-text { color:#2778ed; }
.green-text { color:#20aa77; }
.purple-text { color:#8957d9; }

/* IMAGE CARDS */

.photo-card {
    background:white;
    border-radius:18px;
    overflow:hidden;
    height:100%;
    border:1px solid #edf0f6;
    transition:.3s;
}

.photo-card:hover {
    transform:translateY(-5px);
    box-shadow:0 12px 28px rgba(30,65,110,.12);
}

.photo-card img {
    width:100%;
    height:185px;
    object-fit:cover;
    display:block;
}

.photo-content { padding:17px; }

.photo-content h6 {
    font-size:14px;
    font-weight:800;
    margin-bottom:8px;
}

.photo-content p {
    font-size:12px;
    color:var(--muted);
    line-height:1.8;
    margin:0;
}

/* LIST */

.skin-list {
    list-style:none;
    padding:0;
    margin:0;
}

.skin-list li {
    display:flex;
    gap:10px;
    align-items:flex-start;
    font-size:12px;
    color:#53647d;
    line-height:1.8;
    margin-bottom:11px;
}

.skin-list i {
    color:#24b477;
    font-size:15px;
    margin-top:2px;
}

/* SKIN TYPES */

.skin-type {
    background:white;
    border:1px solid #edf0f6;
    border-radius:19px;
    padding:19px;
    text-align:center;
    height:100%;
    transition:.3s;
}

.skin-type:hover {
    transform:translateY(-4px);
}

.skin-type .type-icon {
    width:65px;
    height:65px;
    border-radius:50%;
    margin:0 auto 13px;
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:27px;
}

.skin-type h6 {
    font-size:13px;
    font-weight:800;
}

.skin-type p {
    font-size:11px;
    line-height:1.7;
    color:var(--muted);
    margin:0;
}

/* ROUTINE */

.routine-card {
    border-radius:20px;
    padding:24px;
    height:100%;
    background:white;
    border:1px solid #edf0f6;
}

.routine-number {
    width:35px;
    height:35px;
    border-radius:11px;
    display:flex;
    align-items:center;
    justify-content:center;
    font-weight:800;
    background:#fff0f6;
    color:#e74e8c;
    margin-bottom:14px;
}

/* INGREDIENTS */

.ingredient-card {
    background:white;
    padding:20px;
    border-radius:18px;
    height:100%;
    border:1px solid #edf0f6;
}

.ingredient-card h6 {
    font-size:14px;
    font-weight:800;
    margin-bottom:8px;
}

.ingredient-card p {
    font-size:12px;
    color:var(--muted);
    line-height:1.8;
    margin:0;
}

/* TIPS */

.tip-banner {
    background:linear-gradient(110deg,#f5f0ff,#eaf5ff);
    border:1px solid #e3e6fa;
    border-radius:22px;
    padding:27px;
}

/* WARNING */

.skin-warning {
    background:linear-gradient(110deg,#fff3d9,#fff9eb);
    border:1px solid #ffe5b0;
    border-radius:22px;
    overflow:hidden;
}

.skin-warning-content { padding:30px; }

.skin-warning h4 {
    font-size:21px;
    font-weight:800;
    color:#a65d00;
}

.skin-warning p {
    font-size:12px;
    line-height:1.8;
    color:#765e3c;
}

.skin-warning-image {
    width:100%;
    height:100%;
    min-height:240px;
    object-fit:cover;
}

/* GALLERY */

.gallery-photo {
    overflow:hidden;
    border-radius:17px;
}

.gallery-image {
    width:100%;
    height:195px;
    object-fit:cover;
    border-radius:17px;
    transition:.4s;
    display:block;
}

.gallery-image:hover {
    transform:scale(1.04);
}

/* FOOTER */

.skin-footer {
    margin:15px 24px 24px;
    padding:25px;
    background:linear-gradient(110deg,#3779ed,#7b65db);
    border-radius:20px;
    color:white;
}

.skin-footer h5 {
    font-size:16px;
    font-weight:800;
}

.skin-footer p {
    font-size:12px;
    margin:0;
    opacity:.9;
}

@media(max-width:768px) {
    .skin-page { padding:12px 0 35px; }

    .skin-wrapper { border-radius:18px; }

    .skin-header { padding:17px; }

    .skin-brand h4 { font-size:14px; }

    .skin-hero {
        margin:13px;
        min-height:360px;
        background-position:center;
        background-image:
            linear-gradient(
                90deg,
                rgba(240,247,255,.95),
                rgba(240,247,255,.70)
            ),
            url('https://images.unsplash.com/photo-1616394584738-fc6e612e71b9?auto=format&fit=crop&w=1000&q=85');
    }

    .hero-content { padding:25px; }

    .hero-content h1 { font-size:32px; }

    .gallery-section { padding:13px 17px 20px; }

    .section-heading h3 { font-size:19px; }

    .skin-footer { margin:10px 13px 13px; }
}

/* ================= GREEN BRAND THEME OVERRIDES ================= */
:root {
    --pink: #159b62;
    --pink-light: #eaf8f0;
    --blue: #168653;
    --blue-light: #effaf3;
    --green: #159b62;
    --green-light: #eaf8f0;
    --purple: #278b59;
    --background: #f2faf5;
}

.skin-page {
    background: linear-gradient(180deg, #edf8f1 0%, #f7fbf8 48%, #edf8f1 100%);
}

.skin-wrapper {
    border: 1px solid #d9eee1;
    box-shadow: 0 14px 45px rgba(21, 110, 67, .09);
}

.skin-header {
    background: #f5fbf7;
    border-bottom-color: #dcefe3;
}

.brand-icon {
    background: #dff4e7;
    color: #13834f;
}

.close-gallery:hover {
    background: #159b62;
}

.skin-hero {
    background-image:
        linear-gradient(
            90deg,
            rgba(235, 249, 240, .98) 0%,
            rgba(235, 249, 240, .91) 42%,
            rgba(235, 249, 240, .16) 100%
        ),
        url('https://images.unsplash.com/photo-1616394584738-fc6e612e71b9?auto=format&fit=crop&w=1600&q=85');
    border: 1px solid #ccebd8;
}

.hero-badge {
    background: #dcf5e6;
    color: #117a49;
}

.hero-content h1 {
    color: #164b32;
}

.hero-content h1 span {
    color: #159b62;
}

.hero-content p {
    color: #496b58;
}

.hero-footer {
    background: #d9f3e3;
    color: #117a49;
}

.section-label {
    color: #138653;
}

.info-blue,
.info-pink,
.info-purple {
    background: #eff9f2;
    border-color: #d7efdf;
}

.info-green {
    background: #e4f6ea;
    border-color: #c9e9d4;
}

.pink-text,
.blue-text,
.purple-text {
    color: #168653;
}

.green-text {
    color: #11834e;
}

.photo-card,
.skin-type,
.routine-card,
.ingredient-card {
    border-color: #dceee2;
}

.photo-card:hover,
.skin-type:hover {
    box-shadow: 0 12px 28px rgba(21, 110, 67, .12);
}

.routine-number {
    background: #e2f5e9;
    color: #138653;
}

.tip-banner {
    background: linear-gradient(110deg, #e7f7ec, #f3fbf5);
    border-color: #d3ecdc;
}

.skin-list li i {
    color: #159b62;
}

.skin-footer {
    background: linear-gradient(110deg, #117a49, #20ae79);
}

@media(max-width:768px) {
    .skin-hero {
        background-image:
            linear-gradient(
                90deg,
                rgba(235, 249, 240, .97),
                rgba(235, 249, 240, .78)
            ),
            url('https://images.unsplash.com/photo-1616394584738-fc6e612e71b9?auto=format&fit=crop&w=1000&q=85');
    }
}
/* ================= END GREEN BRAND THEME ================= */

</style>


<div class="skin-page">
<div class="container skin-container">
<div class="skin-wrapper">

    <!-- HEADER -->

    <div class="skin-header">

        <div class="skin-brand">
            <div class="brand-icon">
                <i class="bi bi-droplet-half"></i>
            </div>

            <div>
                <h4>Skin Health Information Gallery</h4>
                <p>Healthy Skin · Healthy Confidence</p>
            </div>
        </div>

        <a href="{{ route('dashboard') }}" class="close-gallery">
            <i class="bi bi-x-lg"></i>
        </a>

    </div>


    <!-- HERO -->

    <div class="skin-hero">

        <div class="hero-content">

            <span class="hero-badge">
                <i class="bi bi-stars me-1"></i>
                SKINCARE & DERMATOLOGY INFORMATION
            </span>

            <h1>
                Healthy Skin<br>
                Starts With <span>Good Care</span>
            </h1>

            <p>
                Discover helpful information about acne, pimples,
                skincare routines, skin types and common skin problems.
                Learn how to maintain healthy skin with proper daily care.
            </p>

            <div class="hero-footer">
                <i class="bi bi-heart-fill"></i>
                Healthy Skin · Happy Life
            </div>

        </div>

    </div>


    <!-- ABOUT ACNE -->

    <div class="gallery-section">

        <div class="row g-4 align-items-center">

            <div class="col-lg-5">

                <div class="info-card info-pink">

                    <div class="info-icon pink-text">
                        <i class="bi bi-brightness-high"></i>
                    </div>

                    <h5>What Is Acne?</h5>

                    <p>
                        Acne is a common skin condition that occurs when
                        hair follicles become blocked with oil and dead
                        skin cells. It can cause blackheads, whiteheads,
                        pimples and deeper skin bumps. Acne commonly
                        affects the face, chest, shoulders and back.
                    </p>

                </div>

            </div>

            <div class="col-lg-7">

                <img
                    src="https://images.unsplash.com/photo-1556229010-6c3f2c9ca5f8?auto=format&fit=crop&w=1000&q=85"
                    alt="Skincare products and skin care"
                    class="w-100 rounded-4"
                    style="height:280px;object-fit:cover;">

            </div>

        </div>

    </div>


    <!-- TYPES OF ACNE -->

    <div class="gallery-section">

        <div class="section-heading">
            <span class="section-label">UNDERSTANDING ACNE</span>
            <h3>Different Types of Acne</h3>
            <p>Learn about common forms of acne and their appearance.</p>
        </div>

        <div class="row g-3">

            <div class="col-md-6 col-lg-3">

                <div class="photo-card">
                    <img src="https://images.unsplash.com/photo-1616394584738-fc6e612e71b9?w=600&q=85"
                         alt="Whiteheads and skincare">

                    <div class="photo-content">
                        <h6>Whiteheads</h6>
                        <p>
                            Small closed bumps that form when pores
                            become blocked with oil and dead skin cells.
                        </p>
                    </div>
                </div>

            </div>

            <div class="col-md-6 col-lg-3">

                <div class="photo-card">
                    <img src="https://images.unsplash.com/photo-1608248543803-ba4f8c70ae0b?w=600&q=85"
                         alt="Skincare closeup">

                    <div class="photo-content">
                        <h6>Blackheads</h6>
                        <p>
                            Open blocked pores with a dark appearance
                            caused by oxidation of the pore contents.
                        </p>
                    </div>
                </div>

            </div>

            <div class="col-md-6 col-lg-3">

                <div class="photo-card">
                    <img src="https://images.unsplash.com/photo-1570172619644-dfd03ed5d881?w=600&q=85"
                         alt="Facial skincare treatment">

                    <div class="photo-content">
                        <h6>Papules & Pustules</h6>
                        <p>
                            Inflamed bumps that may appear red.
                            Pustules can contain visible pus.
                        </p>
                    </div>
                </div>

            </div>

            <div class="col-md-6 col-lg-3">

                <div class="photo-card">
                    <img src="https://images.unsplash.com/photo-1611930022073-b7a4ba5fcccd?w=600&q=85"
                         alt="Skin treatment">

                    <div class="photo-content">
                        <h6>Nodules & Cysts</h6>
                        <p>
                            Deeper, often painful acne lesions that
                            can increase the risk of permanent scars.
                        </p>
                    </div>
                </div>

            </div>

        </div>

    </div>


    <!-- CAUSES -->

    <div class="gallery-section">

        <div class="section-heading">
            <span class="section-label">WHY DOES ACNE HAPPEN?</span>
            <h3>Common Causes of Pimples</h3>
            <p>Several factors can contribute to acne development.</p>
        </div>

        <div class="row g-3">

            <div class="col-md-6 col-lg-3">
                <div class="info-card info-blue">
                    <div class="info-icon blue-text">
                        <i class="bi bi-droplet"></i>
                    </div>
                    <h5>Excess Oil</h5>
                    <p>
                        Sebum is natural skin oil. Excess production
                        can contribute to blocked pores.
                    </p>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="info-card info-pink">
                    <div class="info-icon pink-text">
                        <i class="bi bi-activity"></i>
                    </div>
                    <h5>Hormonal Changes</h5>
                    <p>
                        Hormonal changes during puberty, menstruation
                        and other life stages can influence acne.
                    </p>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="info-card info-green">
                    <div class="info-icon green-text">
                        <i class="bi bi-moisture"></i>
                    </div>
                    <h5>Blocked Pores</h5>
                    <p>
                        Dead skin cells and oil can accumulate
                        inside hair follicles.
                    </p>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="info-card info-purple">
                    <div class="info-icon purple-text">
                        <i class="bi bi-shield-exclamation"></i>
                    </div>
                    <h5>Inflammation</h5>
                    <p>
                        Bacteria and immune responses can contribute
                        to inflammation in acne.
                    </p>
                </div>
            </div>

        </div>

    </div>


    <!-- SKIN TYPES -->

    <div class="gallery-section">

        <div class="section-heading">
            <span class="section-label">KNOW YOUR SKIN</span>
            <h3>Different Skin Types</h3>
            <p>Understanding your skin type helps you choose suitable skincare products.</p>
        </div>

        <div class="row row-cols-2 row-cols-md-3 row-cols-lg-5 g-3">

            <div class="col">
                <div class="skin-type">
                    <div class="type-icon" style="background:#fff0f6;color:#e74e8c;">
                        <i class="bi bi-droplet-fill"></i>
                    </div>
                    <h6>Oily Skin</h6>
                    <p>Often produces excess oil and may have visible pores.</p>
                </div>
            </div>

            <div class="col">
                <div class="skin-type">
                    <div class="type-icon" style="background:#edf5ff;color:#2778ed;">
                        <i class="bi bi-water"></i>
                    </div>
                    <h6>Dry Skin</h6>
                    <p>May feel tight, rough or flaky.</p>
                </div>
            </div>

            <div class="col">
                <div class="skin-type">
                    <div class="type-icon" style="background:#eaf9f1;color:#20aa77;">
                        <i class="bi bi-brightness-high"></i>
                    </div>
                    <h6>Normal Skin</h6>
                    <p>Generally feels comfortable without excessive oiliness or dryness.</p>
                </div>
            </div>

            <div class="col">
                <div class="skin-type">
                    <div class="type-icon" style="background:#f5efff;color:#8957d9;">
                        <i class="bi bi-circle-half"></i>
                    </div>
                    <h6>Combination Skin</h6>
                    <p>Some areas are oily while others are dry.</p>
                </div>
            </div>

            <div class="col">
                <div class="skin-type">
                    <div class="type-icon" style="background:#fff8e8;color:#d18b16;">
                        <i class="bi bi-heart-pulse"></i>
                    </div>
                    <h6>Sensitive Skin</h6>
                    <p>May react with redness, itching or irritation.</p>
                </div>
            </div>

        </div>

    </div>


    <!-- SKINCARE ROUTINE -->

    <div class="gallery-section">

        <div class="section-heading">
            <span class="section-label">DAILY SKINCARE</span>
            <h3>Simple Daily Skincare Routine</h3>
            <p>A gentle and consistent routine can support skin health.</p>
        </div>

        <div class="row g-3">

            <div class="col-md-6 col-lg-3">
                <div class="routine-card">
                    <div class="routine-number">01</div>
                    <i class="bi bi-droplet-half fs-2 text-primary mb-3 d-block"></i>
                    <h6 class="fw-bold">Gentle Cleansing</h6>
                    <p class="small text-secondary">
                        Wash your face gently with a suitable cleanser.
                        Avoid excessive scrubbing.
                    </p>
                    <span class="badge bg-primary-subtle text-primary">Morning & Evening</span>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="routine-card">
                    <div class="routine-number">02</div>
                    <i class="bi bi-moisture fs-2 text-success mb-3 d-block"></i>
                    <h6 class="fw-bold">Moisturizing</h6>
                    <p class="small text-secondary">
                        Use a suitable moisturizer to support
                        the skin barrier.
                    </p>
                    <span class="badge bg-success-subtle text-success">Daily</span>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="routine-card">
                    <div class="routine-number">03</div>
                    <i class="bi bi-sun fs-2 text-warning mb-3 d-block"></i>
                    <h6 class="fw-bold">Sun Protection</h6>
                    <p class="small text-secondary">
                        Apply broad-spectrum SPF 30 or higher
                        sunscreen and reapply as directed.
                    </p>
                    <span class="badge bg-warning-subtle text-warning">Every Morning</span>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="routine-card">
                    <div class="routine-number">04</div>
                    <i class="bi bi-moon-stars fs-2 text-purple mb-3 d-block"></i>
                    <h6 class="fw-bold">Night Care</h6>
                    <p class="small text-secondary">
                        Remove makeup, cleanse gently and
                        moisturize before sleeping.
                    </p>
                    <span class="badge bg-info-subtle text-info">Every Night</span>
                </div>
            </div>

        </div>

    </div>


    <!-- SKINCARE INGREDIENTS -->

    <div class="gallery-section">

        <div class="section-heading">
            <span class="section-label">SKINCARE INGREDIENTS</span>
            <h3>Common Ingredients Used for Acne</h3>
            <p>Learn what common skincare ingredients are used for.</p>
        </div>

        <div class="row g-3">

            <div class="col-md-6 col-lg-3">
                <div class="ingredient-card">
                    <div class="info-icon pink-text">
                        <i class="bi bi-droplet"></i>
                    </div>
                    <h6>Salicylic Acid</h6>
                    <p>A beta-hydroxy acid that helps exfoliate inside pores and is commonly used for blackheads and acne.</p>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="ingredient-card">
                    <div class="info-icon blue-text">
                        <i class="bi bi-shield-check"></i>
                    </div>
                    <h6>Benzoyl Peroxide</h6>
                    <p>Helps reduce acne-causing bacteria and is commonly used for inflammatory acne.</p>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="ingredient-card">
                    <div class="info-icon green-text">
                        <i class="bi bi-flower1"></i>
                    </div>
                    <h6>Azelaic Acid</h6>
                    <p>Can help with acne and uneven pigmentation. Suitability depends on the individual.</p>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="ingredient-card">
                    <div class="info-icon purple-text">
                        <i class="bi bi-stars"></i>
                    </div>
                    <h6>Niacinamide</h6>
                    <p>May support the skin barrier and help improve the appearance of uneven skin tone.</p>
                </div>
            </div>

        </div>

        <div class="alert alert-info border-0 rounded-4 mt-3 small">
            <i class="bi bi-info-circle-fill me-2"></i>
            Introduce skincare ingredients carefully. Some may cause irritation.
            Ask a dermatologist or pharmacist about suitable products.
            Retinoids such as adapalene should be avoided during pregnancy
            unless specifically advised by your healthcare professional.
        </div>

    </div>


    <!-- FOOD AND SKIN -->

    <div class="gallery-section">

        <div class="section-heading">
            <span class="section-label">HEALTHY LIFESTYLE</span>
            <h3>Food & Skin Health</h3>
            <p>Balanced nutrition supports general health and skin wellbeing.</p>
        </div>

        <div class="row row-cols-2 row-cols-md-3 row-cols-lg-6 g-3">

            <div class="col">
                <div class="skin-type">
                    <img src="https://images.unsplash.com/photo-1490818387583-1baba5e638af?w=300&q=80"
                         class="rounded-circle mb-3"
                         style="width:95px;height:95px;object-fit:cover;"
                         alt="Fresh fruits">
                    <h6>Fresh Fruits</h6>
                    <p>Vitamins and fibre.</p>
                </div>
            </div>

            <div class="col">
                <div class="skin-type">
                    <img src="https://images.unsplash.com/photo-1540420773420-3366772f4999?w=300&q=80"
                         class="rounded-circle mb-3"
                         style="width:95px;height:95px;object-fit:cover;"
                         alt="Vegetables">
                    <h6>Vegetables</h6>
                    <p>Fibre and nutrients.</p>
                </div>
            </div>

            <div class="col">
                <div class="skin-type">
                    <img src="https://images.unsplash.com/photo-1548839140-29a749e1cf4d?w=300&q=80"
                         class="rounded-circle mb-3"
                         style="width:95px;height:95px;object-fit:cover;"
                         alt="Water">
                    <h6>Water</h6>
                    <p>Supports hydration.</p>
                </div>
            </div>

            <div class="col">
                <div class="skin-type">
                    <img src="https://images.unsplash.com/photo-1574323347407-f5e1ad6d020b?w=300&q=80"
                         class="rounded-circle mb-3"
                         style="width:95px;height:95px;object-fit:cover;"
                         alt="Whole grains">
                    <h6>Whole Grains</h6>
                    <p>Fibre and energy.</p>
                </div>
            </div>

            <div class="col">
                <div class="skin-type">
                    <img src="https://images.unsplash.com/photo-1490645935967-10de6ba17061?w=300&q=80"
                         class="rounded-circle mb-3"
                         style="width:95px;height:95px;object-fit:cover;"
                         alt="Healthy food">
                    <h6>Balanced Meals</h6>
                    <p>Varied nutrients.</p>
                </div>
            </div>

            <div class="col">
                <div class="skin-type">
                    <img src="https://images.unsplash.com/photo-1505576399270-565b52d4ac71?w=300&q=80"
                         class="rounded-circle mb-3"
                         style="width:95px;height:95px;object-fit:cover;"
                         alt="Healthy nuts">
                    <h6>Nuts & Seeds</h6>
                    <p>Healthy fats and nutrients.</p>
                </div>
            </div>

        </div>

        <p class="small text-secondary mt-3">
            There is no single diet that cures acne. Some people may notice
            links between their acne and particular foods. Individual
            responses vary.
        </p>

    </div>


    <!-- COMMON SKIN PROBLEMS -->

    <div class="gallery-section">

        <div class="section-heading">
            <span class="section-label">SKIN CONDITIONS</span>
            <h3>Common Skin Problems</h3>
            <p>Different skin conditions can affect appearance and comfort.</p>
        </div>

        <div class="row g-3">

            <div class="col-md-6 col-lg-3">
                <div class="info-card info-pink">
                    <div class="info-icon pink-text">
                        <i class="bi bi-circle-fill"></i>
                    </div>
                    <h5>Acne</h5>
                    <p>Blocked pores can cause blackheads, whiteheads and inflamed pimples.</p>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="info-card info-blue">
                    <div class="info-icon blue-text">
                        <i class="bi bi-flower2"></i>
                    </div>
                    <h5>Eczema</h5>
                    <p>A condition that can cause dry, itchy and inflamed patches of skin.</p>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="info-card info-green">
                    <div class="info-icon green-text">
                        <i class="bi bi-patch-exclamation"></i>
                    </div>
                    <h5>Skin Allergy</h5>
                    <p>Some substances can trigger redness, itching or skin irritation.</p>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="info-card info-purple">
                    <div class="info-icon purple-text">
                        <i class="bi bi-brightness-high"></i>
                    </div>
                    <h5>Hyperpigmentation</h5>
                    <p>Areas of skin may become darker due to increased pigment production.</p>
                </div>
            </div>

        </div>

    </div>


    <!-- ACNE PREVENTION -->

    <div class="gallery-section">

        <div class="section-heading">
            <span class="section-label">PREVENTION & DAILY CARE</span>
            <h3>Important Tips for Healthy Skin</h3>
            <p>Simple habits that may help reduce irritation and support your skin.</p>
        </div>

        <div class="tip-banner">

            <div class="row g-3">

                <div class="col-md-6">

                    <ul class="skin-list">
                        <li><i class="bi bi-check-circle-fill"></i> Wash your face gently twice daily and after heavy sweating.</li>
                        <li><i class="bi bi-check-circle-fill"></i> Choose non-comedogenic skincare products.</li>
                        <li><i class="bi bi-check-circle-fill"></i> Use a suitable moisturizer.</li>
                        <li><i class="bi bi-check-circle-fill"></i> Apply broad-spectrum sunscreen.</li>
                        <li><i class="bi bi-check-circle-fill"></i> Remove makeup before sleeping.</li>
                    </ul>

                </div>

                <div class="col-md-6">

                    <ul class="skin-list">
                        <li><i class="bi bi-check-circle-fill"></i> Avoid frequently touching your face.</li>
                        <li><i class="bi bi-check-circle-fill"></i> Keep pillowcases and personal items clean.</li>
                        <li><i class="bi bi-check-circle-fill"></i> Avoid harsh scrubs and over-washing.</li>
                        <li><i class="bi bi-check-circle-fill"></i> Never squeeze or pick pimples.</li>
                        <li><i class="bi bi-check-circle-fill"></i> Follow a consistent skincare routine.</li>
                    </ul>

                </div>

            </div>

        </div>

    </div>


    <!-- SCARS -->

    <div class="gallery-section">

        <div class="section-heading">
            <span class="section-label">SKIN RECOVERY</span>
            <h3>Acne Scars & Dark Spots</h3>
            <p>Understand the difference between acne marks and scars.</p>
        </div>

        <div class="row g-4 align-items-center">

            <div class="col-lg-6">

                <img
                    src="https://images.unsplash.com/photo-1616394584738-fc6e612e71b9?w=900&q=85"
                    alt="Skincare and skin treatment"
                    class="w-100 rounded-4"
                    style="height:310px;object-fit:cover;">

            </div>

            <div class="col-lg-6">

                <div class="info-card info-purple">

                    <h5>Understanding Skin Marks</h5>

                    <ul class="skin-list">

                        <li>
                            <i class="bi bi-check-circle-fill"></i>
                            <span><strong>Dark Marks:</strong> Flat areas of darker pigmentation left after inflammation.</span>
                        </li>

                        <li>
                            <i class="bi bi-check-circle-fill"></i>
                            <span><strong>Red Marks:</strong> Flat reddish or pink marks that may remain after acne.</span>
                        </li>

                        <li>
                            <i class="bi bi-check-circle-fill"></i>
                            <span><strong>Indented Scars:</strong> Depressed areas that form when deeper skin tissue is damaged.</span>
                        </li>

                        <li>
                            <i class="bi bi-check-circle-fill"></i>
                            <span><strong>Raised Scars:</strong> Thickened or raised areas of scar tissue.</span>
                        </li>

                    </ul>

                    <p class="mt-3">
                        Persistent acne scars may require professional
                        dermatological treatments.
                    </p>

                </div>

            </div>

        </div>

    </div>


    <!-- WARNING -->

    <div class="gallery-section">

        <div class="skin-warning">

            <div class="row g-0 align-items-center">

                <div class="col-lg-7">

                    <div class="skin-warning-content">

                        <h4>
                            <i class="bi bi-exclamation-triangle-fill me-2"></i>
                            When Should You Visit a Dermatologist?
                        </h4>

                        <p>
                            Professional skin assessment may be helpful
                            in the following situations:
                        </p>

                        <ul class="skin-list">

                            <li><i class="bi bi-check-circle-fill"></i> Severe or painful acne.</li>

                            <li><i class="bi bi-check-circle-fill"></i> Acne that causes scars.</li>

                            <li><i class="bi bi-check-circle-fill"></i> Acne that does not improve with suitable over-the-counter care.</li>

                            <li><i class="bi bi-check-circle-fill"></i> Persistent skin redness or irritation.</li>

                            <li><i class="bi bi-check-circle-fill"></i> Sudden or unexplained skin changes.</li>

                            <li><i class="bi bi-check-circle-fill"></i> Skin problems affecting your daily life or confidence.</li>

                        </ul>

                        <p class="fw-bold text-danger mb-0">
                            Do not attempt to treat severe skin problems
                            with strong products without professional advice.
                        </p>

                    </div>

                </div>

                <div class="col-lg-5">

                    <img
                        src="https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?w=800&q=85"
                        alt="Dermatologist medical consultation"
                        class="skin-warning-image">

                </div>

            </div>

        </div>

    </div>


    <!-- FINAL GALLERY -->

    <div class="gallery-section">

        <div class="section-heading">

            <span class="section-label">SKINCARE PHOTO COLLECTION</span>

            <h3>Skin Health & Beauty Gallery</h3>

            <p>
                Explore skincare, facial care and healthy skin inspiration.
            </p>

        </div>

        <div class="row g-3">

            <div class="col-6 col-lg-4">
                <div class="gallery-photo">
                    <img class="gallery-image"
                         src="https://images.unsplash.com/photo-1616394584738-fc6e612e71b9?w=700&q=85"
                         alt="Facial skincare">
                </div>
            </div>

            <div class="col-6 col-lg-4">
                <div class="gallery-photo">
                    <img class="gallery-image"
                         src="https://images.unsplash.com/photo-1608248543803-ba4f8c70ae0b?w=700&q=85"
                         alt="Skincare products">
                </div>
            </div>

            <div class="col-6 col-lg-4">
                <div class="gallery-photo">
                    <img class="gallery-image"
                         src="https://images.unsplash.com/photo-1570172619644-dfd03ed5d881?w=700&q=85"
                         alt="Facial treatment">
                </div>
            </div>

            <div class="col-6 col-lg-4">
                <div class="gallery-photo">
                    <img class="gallery-image"
                         src="https://images.unsplash.com/photo-1556229010-6c3f2c9ca5f8?w=700&q=85"
                         alt="Skin care routine">
                </div>
            </div>

            <div class="col-6 col-lg-4">
                <div class="gallery-photo">
                    <img class="gallery-image"
                         src="https://images.unsplash.com/photo-1611930022073-b7a4ba5fcccd?w=700&q=85"
                         alt="Beauty skincare products">
                </div>
            </div>

            <div class="col-6 col-lg-4">
                <div class="gallery-photo">
                    <img class="gallery-image"
                         src="https://images.unsplash.com/photo-1596755389378-c31d21fd1273?w=700&q=85"
                         alt="Skin care and beauty">
                </div>
            </div>

        </div>

    </div>


    <!-- DISCLAIMER -->

    <div class="gallery-section">

        <div class="info-card info-blue">

            <h5>
                <i class="bi bi-info-circle-fill blue-text me-2"></i>
                Important Skin Health Information
            </h5>

            <p>
                This gallery provides general educational information
                about acne and skin health. It is not a substitute for
                professional medical diagnosis or treatment.
                Skin conditions can have different causes and treatments.
                Consult a qualified dermatologist or healthcare
                professional for individual advice.
            </p>

        </div>

    </div>


    <!-- FOOTER -->

    <div class="skin-footer">

        <div class="d-flex align-items-center gap-3">

            <i class="bi bi-heart-pulse-fill fs-1"></i>

            <div>

                <h5>
                    Healthy Skin Starts With Healthy Habits.
                </h5>

                <p>
                    Learn more, take care of your skin and feel confident.
                </p>

            </div>

        </div>

    </div>


</div>
</div>
</div>

@endsection
