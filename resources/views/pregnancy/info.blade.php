@extends('layouts.app')

@section('content')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

<style>
:root {
    --pink: #ed5794;
    --pink-light: #fff0f6;
    --blue: #2675ed;
    --blue-light: #edf5ff;
    --green: #20ae79;
    --green-light: #eaf9f1;
    --dark: #172b50;
    --muted: #72819a;
    --background: #f5f8fd;
}
pregnancy-page {
    font-family: 'Inter', sans-serif;
    background: var(--background);
    padding: 28px 0 65px;
    color: var(--dark);
    min-height: 100vh;
}

.pregnancy-container {
    max-width: 1250px;
}

.pregnancy-wrapper {
    background: white;
    border-radius: 26px;
    overflow: hidden;
    box-shadow: 0 12px 45px rgba(31, 59, 100, .07);
}

.pregnancy-header {
    padding: 24px 32px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    border-bottom: 1px solid #edf0f7;
}

.pregnancy-brand {
    display: flex;
    align-items: center;
    gap: 13px;
}

.brand-icon {
    width: 48px;
    height: 48px;
    border-radius: 16px;
    background: #ffe7f0;
    color: #e94f8c;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 24px;
}
.pregnancy-brand h4 {
    font-weight: 800;
    font-size: 18px;
    margin: 0;
}

.pregnancy-brand p {
    color: var(--muted);
    font-size: 12px;
    margin: 3px 0 0;
}

.close-gallery {
    width: 42px;
    height: 42px;
    border: 1px solid #e7ebf3;
    border-radius: 50%;
    background: white;
    color: var(--dark);
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: 19px;
    text-decoration: none;
    transition: .3s;
}

.close-gallery:hover {
    background: var(--pink);
    color: white;
}
/* HERO */

.pregnancy-hero {
    margin: 24px;
    border-radius: 23px;
    overflow: hidden;
    min-height: 350px;
    display: flex;
    align-items: center;
    position: relative;
    background:
        linear-gradient(90deg,
        rgba(240, 247, 255, .98) 0%,
        rgba(240, 247, 255, .93) 43%,
        rgba(240, 247, 255, .12) 100%),
        url('https://images.unsplash.com/photo-1544126592-807ade215a0b?q=85&w=1600&auto=format&fit=crop');
    background-position: center;
    background-size: cover;
    border: 1px solid #dce9ff;
}

.hero-content {
    padding: 45px;
    max-width: 660px;
    position: relative;
    z-index: 2;
}
.hero-content p {
    color: #536d91;
    font-size: 15px;
    line-height: 1.8;
    max-width: 510px;
}

.hero-footer {
    display: inline-flex;
    align-items: center;
    gap: 9px;
    background: #ffe1f0;
    color: #d83e83;
    padding: 11px 18px;
    border-radius: 50px;
    font-size: 12px;
    font-weight: 700;
    margin-top: 12px;
}

/* COMMON SECTIONS */

.gallery-section {
    padding: 15px 28px 25px;
}

.section-heading {
    margin-bottom: 20px;
}

.section-heading h3 {
    font-size: 22px;
    font-weight: 800;
    color: var(--dark);
    margin-bottom: 7px;
}

.section-heading p {
    font-size: 13px;
    color: var(--muted);
    margin: 0;
}

.section-label {
    color: var(--pink);
    font-size: 11px;
    font-weight: 800;
    letter-spacing: 1.4px;
    margin-bottom: 8px;
    display: block;
}

/* INFORMATION CARDS */

.info-card {
    border-radius: 20px;
    padding: 23px;
    height: 100%;
    border: 1px solid transparent;
}
.info-card p {
    font-size: 12px;
    color: #5f708a;
    line-height: 1.8;
    margin: 0;
}

.info-blue { background: #edf5ff; border-color: #dceaff; }
.info-pink { background: #fff0f6; border-color: #ffe0ed; }
.info-green { background: #eaf9f1; border-color: #d5f0e1; }
.info-yellow { background: #fff8e8; border-color: #f8edcf; }
.info-purple { background: #f5efff; border-color: #e9ddff; }

.info-icon {
    width: 45px;
    height: 45px;
    border-radius: 14px;
    background: white;
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: 22px;
    margin-bottom: 14px;
}

.pink-text { color: #e74e8c; }
.blue-text { color: #2778ed; }
.green-text { color: #20aa77; }

.photo-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 12px 28px rgba(30, 65, 110, .12);
}

.photo-card img {
    width: 100%;
    height: 185px;
    object-fit: cover;
    display: block;
}

.photo-content {
    padding: 17px;
}

.photo-content h6 {
    font-size: 14px;
    font-weight: 800;
    margin-bottom: 8px;
}

.photo-content p {
    font-size: 12px;
    color: var(--muted);
    line-height: 1.7;
    margin: 0;
}

/* TIMELINE */

.timeline-card {
    background: linear-gradient(120deg, #f5f0ff, #eaf5ff);
    border: 1px solid #e3e6fa;
    border-radius: 22px;
    padding: 25px;
}

.timeline-item {
    text-align: center;
    padding: 10px;
}

.timeline-item img {
    width: 115px;
    height: 115px;
    border-radius: 50%;
    object-fit: cover;
    border: 5px solid white;
    box-shadow: 0 5px 15px rgba(0,0,0,.07);
    margin-bottom: 12px;
}

.timeline-item h6 {
    font-size: 13px;
    font-weight: 800;
}

.timeline-item p {
    font-size: 11px;
    color: var(--muted);
    line-height: 1.6;
}

/* LISTS */

.pregnancy-list {
    list-style: none;
    padding: 0;
    margin: 0;
}

/* TRIMESTER */

.trimester-card {
    border-radius: 21px;
    overflow: hidden;
    background: white;
    border: 1px solid #edf0f6;
    height: 100%;
}

.trimester-card img {
    width: 100%;
    height: 205px;
    object-fit: cover;
}

.trimester-content {
    padding: 20px;
}

.trimester-content h5 {
    font-weight: 800;
    font-size: 16px;
}

.trimester-content p {
    font-size: 12px;
    color: var(--muted);
    line-height: 1.8;
}

/* NUTRITION */

.food-card {
    text-align: center;
    padding: 15px 8px;
    background: white;
    border-radius: 18px;
    border: 1px solid #edf0f6;
    height: 100%;
    transition: .3s;
}

.food-card:hover {
    transform: translateY(-4px);
}

.food-card img {
    width: 105px;
    height: 105px;
    border-radius: 50%;
    object-fit: cover;
    margin-bottom: 12px;
}

.food-card h6 {
    font-size: 12px;
    font-weight: 800;
}

.food-card p {
    font-size: 10px;
    color: var(--muted);
    line-height: 1.6;
    margin: 0;
}

/* WARNING */

.warning-banner {
    background: linear-gradient(110deg, #fff3d9, #fff9eb);
    border: 1px solid #ffe5b0;
    border-radius: 22px;
    overflow: hidden;
}

.warning-content {
    padding: 30px;
}

.warning-banner h4 {
    font-size: 21px;
    font-weight: 800;
    color: #a65d00;
}

.warning-banner li {
    font-size: 12px;
    color: #765e3c;
    margin-bottom: 10px;
}

.warning-image {
    width: 100%;
    height: 100%;
    min-height: 230px;
    object-fit: cover;
}

/* IMAGE GALLERY */

.gallery-image {
    width: 100%;
    height: 190px;
    object-fit: cover;
    border-radius: 17px;
    transition: .4s;
    display: block;
}

.gallery-image:hover {
    transform: scale(1.035);
}

.gallery-photo {
    overflow: hidden;
    border-radius: 17px;
    background: #f0f3f8;
}

/* FOOTER */

.pregnancy-footer {
    margin: 15px 24px 24px;
    padding: 24px;
    background: linear-gradient(110deg, #3779ed, #7b65db);
    border-radius: 20px;
    color: white;
}

.pregnancy-footer h5 {
    font-size: 16px;
    font-weight: 800;
}

.pregnancy-footer p {
    font-size: 12px;
    margin: 0;
    opacity: .9;
}

/* RESPONSIVE */

@media(max-width:768px) {

    .pregnancy-page {
        padding: 12px 0 35px;
    }

    .pregnancy-wrapper {
        border-radius: 18px;
    }

    .pregnancy-header {
        padding: 17px;
    }

    .pregnancy-brand h4 {
        font-size: 15px;
    }

    .pregnancy-hero {
        margin: 13px;
        min-height: 390px;
        background-position: center;
        background-image:
            linear-gradient(90deg,
            rgba(240,247,255,.96),
            rgba(240,247,255,.76)),
            url('https://images.unsplash.com/photo-1544126592-807ade215a0b?q=80&w=1000&auto=format&fit=crop');
    }

    .hero-content {
        padding: 25px;
    }

    .hero-content h1 {
        font-size: 34px;
    }

    .gallery-section {
        padding: 13px 17px 20px;
    }

    .section-heading h3 {
        font-size: 19px;
    }

    .timeline-item img {
        width: 90px;
        height: 90px;
    }

    .warning-image {
        height: 200px;
    }

    .pregnancy-footer {
        margin: 10px 13px 13px;
    }

}

</style>


<div class="pregnancy-page">

<div class="container pregnancy-container">

<div class="pregnancy-wrapper">

    <!-- HEADER -->

    <div class="pregnancy-header">

        <div class="pregnancy-brand">

            <div class="brand-icon">
                <i class="bi bi-person-hearts"></i>
            </div>

            <div>
                <h4>Pregnancy Information Gallery</h4>
                <p>Healthy Mom, Healthy Baby</p>
            </div>

        </div>

        <a href="{{ route('dashboard') }}"
           class="close-gallery"
           aria-label="Close gallery">
            <i class="bi bi-x-lg"></i>
        </a>

    </div>


    <!-- HERO -->

    <div class="pregnancy-hero">

        <div class="hero-content">

            <span class="hero-badge">
                <i class="bi bi-patch-check-fill me-1"></i>
                WOMEN'S HEALTH INFORMATION
            </span>

            <h1>
                Your Pregnancy<br>
                Journey <span>Matters</span>
            </h1>

            <p>
                Discover helpful information about pregnancy,
                baby development, healthy nutrition and prenatal care.
                Learn how to care for yourself throughout this special journey.
            </p>

            <div class="hero-footer">
                <i class="bi bi-heart-fill"></i>
                Healthy Pregnancy · Healthy Future
            </div>

        </div>

    </div>


    <!-- ABOUT PREGNANCY -->

    <div class="gallery-section">

        <div class="row align-items-center g-4">

            <div class="col-lg-4">

                <div class="info-card info-pink">

                    <div class="info-icon pink-text">
                        <i class="bi bi-person-hearts"></i>
                    </div>

                    <h5>About Pregnancy</h5>

                    <p>
                        Pregnancy is the process in which a baby develops
                        inside the uterus. It usually lasts approximately
                        40 weeks, counted from the first day of the last
                        menstrual period. Every pregnancy is unique.
                    </p>

                </div>

            </div>

            <div class="col-lg-8">

                <div class="timeline-card">

                    <h5 class="fw-bold mb-4">
                        <i class="bi bi-calendar-heart text-danger me-2"></i>
                        Your Baby's Development Journey
                    </h5>

                    <div class="row row-cols-2 row-cols-md-4 g-2">

                        <div class="col">
                            <div class="timeline-item">
                                <img src="https://images.unsplash.com/photo-1578496781379-7dcfb995293d?w=300&q=80"
                                     alt="Early pregnancy">
                                <h6>4 Weeks</h6>
                                <p>Early pregnancy development</p>
                            </div>
                        </div>

                        <div class="col">
                            <div class="timeline-item">
                                <img src="https://images.unsplash.com/photo-1584515933487-779824d29309?w=300&q=80"
                                     alt="Pregnancy development">
                                <h6>12 Weeks</h6>
                                <p>Early organ development</p>
                            </div>
                        </div>

                        <div class="col">
                            <div class="timeline-item">
                                <img src="https://images.unsplash.com/photo-1544126592-807ade215a0b?w=300&q=80"
                                     alt="Baby development">
                                <h6>20 Weeks</h6>
                                <p>Baby continues growing</p>
                            </div>
                        </div>

                        <div class="col">
                            <div class="timeline-item">
                                <img src="https://images.unsplash.com/photo-1519689680058-324335c77eba?w=300&q=80"
                                     alt="Newborn baby">
                                <h6>40 Weeks</h6>
                                <p>Full-term pregnancy milestone</p>
                            </div>
                        </div>

                    </div>

                    <p class="small text-secondary mb-0">
                        <i class="bi bi-info-circle me-1"></i>
                        These are approximate milestones. Individual baby development varies.
                    </p>

                </div>

            </div>

        </div>

    </div>


    <!-- PREGNANCY STAGES -->

    <div class="gallery-section">

        <div class="section-heading">
            <span class="section-label">PREGNANCY JOURNEY</span>
            <h3>Three Stages of Pregnancy</h3>
            <p>Understand the changes that happen during each trimester.</p>
        </div>

        <div class="row g-4">

            <div class="col-lg-4 col-md-6">

                <div class="trimester-card">

                    <img src="https://images.unsplash.com/photo-1544126592-807ade215a0b?w=800&q=85"
                         alt="First trimester pregnancy">

                    <div class="trimester-content">

                        <span class="badge bg-danger-subtle text-danger mb-3">
                            WEEKS 1–12
                        </span>

                        <h5>First Trimester</h5>

                        <p>
                            The early stage of pregnancy. The baby's
                            basic organs and body structures begin
                            developing. Hormonal changes may cause
                            tiredness, nausea and breast tenderness.
                        </p>

                        <ul class="pregnancy-list">
                            <li><i class="bi bi-check-circle-fill"></i> Arrange early prenatal care.</li>
                            <li><i class="bi bi-check-circle-fill"></i> Discuss folic acid with your doctor.</li>
                            <li><i class="bi bi-check-circle-fill"></i> Eat small, balanced meals.</li>
                            <li><i class="bi bi-check-circle-fill"></i> Get enough rest.</li>
                        </ul>

                    </div>

                </div>

            </div>


            <div class="col-lg-4 col-md-6">

                <div class="trimester-card">

                    <img src="https://images.unsplash.com/photo-1518105779142-d975f22f1b0a?w=800&q=85"
                         alt="Second trimester pregnancy">

                    <div class="trimester-content">

                        <span class="badge bg-primary-subtle text-primary mb-3">
                            WEEKS 13–27
                        </span>

                        <h5>Second Trimester</h5>

                        <p>
                            During this stage, the baby continues to
                            grow. Many mothers begin noticing baby
                            movements. Regular prenatal appointments
                            help monitor development.
                        </p>

                        <ul class="pregnancy-list">
                            <li><i class="bi bi-check-circle-fill"></i> Attend scheduled scans.</li>
                            <li><i class="bi bi-check-circle-fill"></i> Maintain nutritious meals.</li>
                            <li><i class="bi bi-check-circle-fill"></i> Stay gently active if approved.</li>
                            <li><i class="bi bi-check-circle-fill"></i> Discuss any new symptoms.</li>
                        </ul>

                    </div>

                </div>

            </div>


            <div class="col-lg-4 col-md-6">

                <div class="trimester-card">

                    <img src="https://images.unsplash.com/photo-1584515979956-d9f6e5d09982?w=800&q=85"
                         alt="Third trimester medical care">

                    <div class="trimester-content">

                        <span class="badge bg-success-subtle text-success mb-3">
                            WEEKS 28–40
                        </span>

                        <h5>Third Trimester</h5>

                        <p>
                            The baby gains weight and prepares for birth.
                            The mother may experience increased tiredness
                            and physical discomfort as the baby grows.
                        </p>

                        <ul class="pregnancy-list">
                            <li><i class="bi bi-check-circle-fill"></i> Attend regular checkups.</li>
                            <li><i class="bi bi-check-circle-fill"></i> Learn about labour signs.</li>
                            <li><i class="bi bi-check-circle-fill"></i> Prepare hospital essentials.</li>
                            <li><i class="bi bi-check-circle-fill"></i> Monitor baby movements.</li>
                        </ul>

                    </div>

                </div>

            </div>

        </div>

    </div>


    <!-- BABY DEVELOPMENT -->

    <div class="gallery-section">

        <div class="section-heading">
            <span class="section-label">BABY DEVELOPMENT</span>
            <h3>Understanding Your Baby's Growth</h3>
            <p>Learn about the important developmental milestones.</p>
        </div>

        <div class="row g-3">

            <div class="col-md-6 col-lg-3">

                <div class="photo-card">

                    <img src="https://images.unsplash.com/photo-1578496781379-7dcfb995293d?w=600&q=80"
                         alt="Early prenatal development">

                    <div class="photo-content">
                        <h6>Early Development</h6>
                        <p>
                            The embryo begins developing important
                            structures during the early weeks.
                        </p>
                    </div>

                </div>

            </div>

            <div class="col-md-6 col-lg-3">

                <div class="photo-card">

                    <img src="https://images.unsplash.com/photo-1584515933487-779824d29309?w=600&q=80"
                         alt="Pregnancy ultrasound">

                    <div class="photo-content">
                        <h6>Ultrasound Monitoring</h6>
                        <p>
                            Ultrasound examinations can help healthcare
                            professionals assess baby development.
                        </p>
                    </div>

                </div>

            </div>

            <div class="col-md-6 col-lg-3">

                <div class="photo-card">

                    <img src="https://images.unsplash.com/photo-1544126592-807ade215a0b?w=600&q=80"
                         alt="Pregnant mother">

                    <div class="photo-content">
                        <h6>Baby Movements</h6>
                        <p>
                            Mothers generally begin feeling movements
                            during the second trimester.
                        </p>
                    </div>

                </div>

            </div>

            <div class="col-md-6 col-lg-3">

                <div class="photo-card">

                    <img src="https://images.unsplash.com/photo-1519689680058-324335c77eba?w=600&q=80"
                         alt="Newborn baby">

                    <div class="photo-content">
                        <h6>Preparing for Birth</h6>
                        <p>
                            During the final weeks, the baby continues
                            preparing for life outside the womb.
                        </p>
                    </div>

                </div>

            </div>

        </div>

    </div>


    <!-- NUTRITION GUIDE -->

    <div class="gallery-section">

        <div class="section-heading">
            <span class="section-label">HEALTHY NUTRITION</span>
            <h3>Pregnancy Nutrition Guide</h3>
            <p>A balanced diet provides important nutrients for mother and baby.</p>
        </div>

        <div class="row row-cols-2 row-cols-md-3 row-cols-lg-6 g-3">

            <div class="col">
                <div class="food-card">
                    <img src="https://images.unsplash.com/photo-1490818387583-1baba5e638af?w=400&q=80"
                         alt="Fresh fruits">
                    <h6>Fresh Fruits</h6>
                    <p>Vitamins, minerals and fibre.</p>
                </div>
            </div>

            <div class="col">
                <div class="food-card">
                    <img src="https://images.unsplash.com/photo-1540420773420-3366772f4999?w=400&q=80"
                         alt="Green vegetables">
                    <h6>Vegetables</h6>
                    <p>Folate, fibre and nutrients.</p>
                </div>
            </div>

            <div class="col">
                <div class="food-card">
                    <img src="https://images.unsplash.com/photo-1563636619-e9143da7973b?w=400&q=80"
                         alt="Milk">
                    <h6>Dairy Products</h6>
                    <p>Calcium and protein.</p>
                </div>
            </div>

            <div class="col">
                <div class="food-card">
                    <img src="https://images.unsplash.com/photo-1574323347407-f5e1ad6d020b?w=400&q=80"
                         alt="Whole grains">
                    <h6>Whole Grains</h6>
                    <p>Energy and fibre.</p>
                </div>
            </div>

            <div class="col">
                <div class="food-card">
                    <img src="https://images.unsplash.com/photo-1490645935967-10de6ba17061?w=400&q=80"
                         alt="Healthy protein foods">
                    <h6>Protein Foods</h6>
                    <p>Eggs, beans and well-cooked fish.</p>
                </div>
            </div>

            <div class="col">
                <div class="food-card">
                    <img src="https://images.unsplash.com/photo-1548839140-29a749e1cf4d?w=400&q=80"
                         alt="Drinking water">
                    <h6>Water</h6>
                    <p>Maintain hydration.</p>
                </div>
            </div>

        </div>

    </div>


    <!-- IMPORTANT NUTRIENTS -->

    <div class="gallery-section">

        <div class="row g-3">

            <div class="col-lg-6">

                <div class="info-card info-green">

                    <div class="info-icon green-text">
                        <i class="bi bi-capsule"></i>
                    </div>

                    <h5>Important Pregnancy Nutrients</h5>

                    <ul class="pregnancy-list">

                        <li><i class="bi bi-check-circle-fill"></i>
                            <span><strong>Folic Acid:</strong> Helps reduce the risk of neural tube defects.</span>
                        </li>

                        <li><i class="bi bi-check-circle-fill"></i>
                            <span><strong>Iron:</strong> Helps support healthy red blood cell production.</span>
                        </li>

                        <li><i class="bi bi-check-circle-fill"></i>
                            <span><strong>Calcium:</strong> Supports the development of baby's bones and teeth.</span>
                        </li>

                        <li><i class="bi bi-check-circle-fill"></i>
                            <span><strong>Vitamin D:</strong> Helps the body absorb calcium.</span>
                        </li>

                        <li><i class="bi bi-check-circle-fill"></i>
                            <span><strong>Protein:</strong> Supports growth and tissue development.</span>
                        </li>

                    </ul>

                    <p class="mt-3">
                        Supplement requirements and doses should be
                        discussed with a qualified healthcare professional.
                    </p>

                </div>

            </div>


            <div class="col-lg-6">

                <div class="info-card info-yellow">

                    <div class="info-icon" style="color:#d18b16;">
                        <i class="bi bi-exclamation-circle"></i>
                    </div>

                    <h5>Foods and Drinks to Avoid or Limit</h5>

                    <ul class="pregnancy-list">

                        <li><i class="bi bi-x-circle-fill text-danger"></i>
                            Raw or undercooked meat and eggs.
                        </li>

                        <li><i class="bi bi-x-circle-fill text-danger"></i>
                            Unpasteurized milk and dairy products.
                        </li>

                        <li><i class="bi bi-x-circle-fill text-danger"></i>
                            High-mercury fish.
                        </li>

                        <li><i class="bi bi-x-circle-fill text-danger"></i>
                            Alcohol during pregnancy.
                        </li>

                        <li><i class="bi bi-x-circle-fill text-danger"></i>
                            Excessive caffeine.
                        </li>

                    </ul>

                    <p class="mt-3">
                        Follow local food-safety advice and your
                        healthcare professional's recommendations.
                    </p>

                </div>

            </div>

        </div>

    </div>


    <!-- HEALTHY LIFESTYLE -->

    <div class="gallery-section">

        <div class="section-heading">
            <span class="section-label">DAILY WELLNESS</span>
            <h3>Healthy Lifestyle During Pregnancy</h3>
            <p>Small daily habits can support maternal wellbeing.</p>
        </div>

        <div class="row g-3">

            <div class="col-md-6 col-lg-3">

                <div class="photo-card">
                    <img src="https://images.unsplash.com/photo-1506126613408-eca07ce68773?w=600&q=80"
                         alt="Relaxation and wellness">
                    <div class="photo-content">
                        <h6>Rest and Relaxation</h6>
                        <p>Get enough sleep and make time for relaxation.</p>
                    </div>
                </div>

            </div>

            <div class="col-md-6 col-lg-3">

                <div class="photo-card">
                    <img src="https://images.unsplash.com/photo-1518611012118-696072aa579a?w=600&q=80"
                         alt="Gentle exercise">
                    <div class="photo-content">
                        <h6>Gentle Exercise</h6>
                        <p>Walking and suitable activities may support wellbeing when approved by your doctor.</p>
                    </div>
                </div>

            </div>

            <div class="col-md-6 col-lg-3">

                <div class="photo-card">
                    <img src="https://images.unsplash.com/photo-1544367567-0f2fcb009e0b?w=600&q=80"
                         alt="Healthy relaxation">
                    <div class="photo-content">
                        <h6>Mental Wellbeing</h6>
                        <p>Talk to supportive people and seek help when feeling overwhelmed.</p>
                    </div>
                </div>

            </div>

            <div class="col-md-6 col-lg-3">

                <div class="photo-card">
                    <img src="https://images.unsplash.com/photo-1505751172876-fa1923c5c528?w=600&q=80"
                         alt="Healthcare">
                    <div class="photo-content">
                        <h6>Healthy Habits</h6>
                        <p>Avoid tobacco, alcohol and non-prescribed medicines.</p>
                    </div>
                </div>

            </div>

        </div>

    </div>


    <!-- MEDICAL CHECKUPS -->

    <div class="gallery-section">

        <div class="section-heading">
            <span class="section-label">PRENATAL CARE</span>
            <h3>Important Medical Checkups</h3>
            <p>Regular appointments help healthcare professionals monitor pregnancy.</p>
        </div>

        <div class="row align-items-center g-4">

            <div class="col-lg-6">

                <img src="https://images.unsplash.com/photo-1584515979956-d9f6e5d09982?w=900&q=85"
                     alt="Pregnancy medical consultation"
                     class="w-100 rounded-4"
                     style="height:330px;object-fit:cover;">

            </div>

            <div class="col-lg-6">

                <div class="info-card info-blue">

                    <h5>
                        <i class="bi bi-heart-pulse-fill blue-text me-2"></i>
                        Prenatal Health Monitoring
                    </h5>

                    <ul class="pregnancy-list">

                        <li>
                            <i class="bi bi-check-circle-fill"></i>
                            Blood pressure monitoring.
                        </li>

                        <li>
                            <i class="bi bi-check-circle-fill"></i>
                            Blood and urine tests as recommended.
                        </li>

                        <li>
                            <i class="bi bi-check-circle-fill"></i>
                            Ultrasound examinations when indicated.
                        </li>

                        <li>
                            <i class="bi bi-check-circle-fill"></i>
                            Monitoring baby's growth.
                        </li>

                        <li>
                            <i class="bi bi-check-circle-fill"></i>
                            Screening for pregnancy-related conditions.
                        </li>

                        <li>
                            <i class="bi bi-check-circle-fill"></i>
                            Discussing symptoms and medications.
                        </li>

                    </ul>

                    <p class="mt-3">
                        Your antenatal appointment schedule should be
                        planned with your healthcare provider.
                    </p>

                </div>

            </div>

        </div>

    </div>


    <!-- COMMON SYMPTOMS -->

    <div class="gallery-section">

        <div class="section-heading">
            <span class="section-label">MATERNAL WELLNESS</span>
            <h3>Common Pregnancy Discomforts</h3>
            <p>Some physical changes are common during pregnancy.</p>
        </div>

        <div class="row g-3">

            <div class="col-md-6 col-lg-3">
                <div class="info-card info-pink">
                    <div class="info-icon pink-text">
                        <i class="bi bi-emoji-dizzy"></i>
                    </div>
                    <h5>Morning Sickness</h5>
                    <p>Nausea can occur at different times of the day. Small meals may help. Seek medical advice if you cannot keep fluids down.</p>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="info-card info-blue">
                    <div class="info-icon blue-text">
                        <i class="bi bi-person-walking"></i>
                    </div>
                    <h5>Back Pain</h5>
                    <p>Body changes can cause back discomfort. Ask your healthcare provider about suitable posture and gentle movement.</p>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="info-card info-green">
                    <div class="info-icon green-text">
                        <i class="bi bi-moon-stars"></i>
                    </div>
                    <h5>Fatigue</h5>
                    <p>Feeling tired can be common. Rest regularly and discuss severe or unusual tiredness with your doctor.</p>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="info-card info-purple">
                    <div class="info-icon" style="color:#8957d9;">
                        <i class="bi bi-heart"></i>
                    </div>
                    <h5>Heartburn</h5>
                    <p>Digestive changes may cause heartburn. Discuss safe ways to manage persistent symptoms with your healthcare provider.</p>
                </div>
            </div>

        </div>

    </div>


    <!-- WARNING SIGNS -->

    <div class="gallery-section">

        <div class="warning-banner">

            <div class="row align-items-center g-0">

                <div class="col-lg-7">

                    <div class="warning-content">

                        <h4>
                            <i class="bi bi-exclamation-triangle-fill me-2"></i>
                            Pregnancy Warning Signs
                        </h4>

                        <p class="small text-secondary">
                            Seek urgent medical assessment if you experience:
                        </p>

                        <div class="row">

                            <div class="col-md-6">

                                <ul class="list-unstyled">
                                    <li><i class="bi bi-x-circle-fill text-danger me-2"></i> Vaginal bleeding</li>
                                    <li><i class="bi bi-x-circle-fill text-danger me-2"></i> Severe abdominal pain</li>
                                    <li><i class="bi bi-x-circle-fill text-danger me-2"></i> Severe or persistent headache</li>
                                    <li><i class="bi bi-x-circle-fill text-danger me-2"></i> Blurred vision</li>
                                </ul>

                            </div>

                            <div class="col-md-6">

                                <ul class="list-unstyled">
                                    <li><i class="bi bi-x-circle-fill text-danger me-2"></i> Sudden swelling of face or hands</li>
                                    <li><i class="bi bi-x-circle-fill text-danger me-2"></i> Reduced baby movements</li>
                                    <li><i class="bi bi-x-circle-fill text-danger me-2"></i> Fever or serious illness</li>
                                    <li><i class="bi bi-x-circle-fill text-danger me-2"></i> Difficulty breathing</li>
                                </ul>

                            </div>

                        </div>

                        <p class="small fw-bold text-danger mb-0">
                            Do not wait for symptoms to disappear. Contact
                            a healthcare professional or seek emergency care.
                        </p>

                    </div>

                </div>

                <div class="col-lg-5">

                    <img src="https://images.unsplash.com/photo-1544126592-807ade215a0b?w=800&q=85"
                         alt="Pregnancy maternal care"
                         class="warning-image">

                </div>

            </div>

        </div>

    </div>


    <!-- PREPARING FOR DELIVERY -->

    <div class="gallery-section">

        <div class="section-heading">
            <span class="section-label">GETTING READY</span>
            <h3>Preparing for Your Baby's Arrival</h3>
            <p>Plan ahead for a comfortable and supported birth experience.</p>
        </div>

        <div class="row g-4">

            <div class="col-lg-6">

                <div class="photo-card">

                    <img src="https://images.unsplash.com/photo-1519689680058-324335c77eba?w=800&q=85"
                         alt="Baby preparation">

                    <div class="photo-content">

                        <h6>Prepare Baby Essentials</h6>

                        <p>
                            Prepare suitable baby clothes, nappies,
                            blankets and essential newborn supplies.
                        </p>

                    </div>

                </div>

            </div>

            <div class="col-lg-6">

                <div class="info-card info-blue">

                    <div class="info-icon blue-text">
                        <i class="bi bi-bag-heart"></i>
                    </div>

                    <h5>Hospital Bag Checklist</h5>

                    <ul class="pregnancy-list">

                        <li><i class="bi bi-check-circle-fill"></i> Comfortable clothing for mother.</li>
                        <li><i class="bi bi-check-circle-fill"></i> Baby clothes and nappies.</li>
                        <li><i class="bi bi-check-circle-fill"></i> Personal hygiene items.</li>
                        <li><i class="bi bi-check-circle-fill"></i> Medical records and identification.</li>
                        <li><i class="bi bi-check-circle-fill"></i> Important contact information.</li>
                        <li><i class="bi bi-check-circle-fill"></i> Safe transport arrangements.</li>

                    </ul>

                </div>

            </div>

        </div>

    </div>


    <!-- AFTER DELIVERY -->

    <div class="gallery-section">

        <div class="section-heading">
            <span class="section-label">POSTNATAL CARE</span>
            <h3>Mother and Baby Care After Delivery</h3>
            <p>Care continues after birth for both mother and newborn.</p>
        </div>

        <div class="row g-3">

            <div class="col-md-4">

                <div class="photo-card">

                    <img src="https://images.unsplash.com/photo-1519689680058-324335c77eba?w=700&q=85"
                         alt="Newborn baby">

                    <div class="photo-content">
                        <h6>Newborn Care</h6>
                        <p>Follow professional guidance about feeding, safe sleep, hygiene and newborn health checks.</p>
                    </div>

                </div>

            </div>

            <div class="col-md-4">

                <div class="photo-card">

                    <img src="https://images.unsplash.com/photo-1584515979956-d9f6e5d09982?w=700&q=85"
                         alt="Postnatal healthcare">

                    <div class="photo-content">
                        <h6>Postnatal Checkups</h6>
                        <p>Attend follow-up appointments to monitor physical recovery and maternal wellbeing.</p>
                    </div>

                </div>

            </div>

            <div class="col-md-4">

                <div class="photo-card">

                    <img src="https://images.unsplash.com/photo-1492725764893-90b379c2b6e7?w=700&q=85"
                         alt="Mother and baby bonding">

                    <div class="photo-content">
                        <h6>Mother and Baby Bonding</h6>
                        <p>Skin-to-skin contact and responsive care can support bonding and newborn wellbeing.</p>
                    </div>

                </div>

            </div>

        </div>

    </div>


    <!-- FINAL IMAGE GALLERY -->

    <div class="gallery-section">

        <div class="section-heading">

            <span class="section-label">PHOTO COLLECTION</span>

            <h3>Pregnancy & Motherhood Gallery</h3>

            <p>
                A collection of pregnancy, maternity care and newborn moments.
            </p>

        </div>

        <div class="row g-3">

            <div class="col-6 col-lg-4">
                <div class="gallery-photo">
                    <img class="gallery-image"
                         src="https://images.unsplash.com/photo-1544126592-807ade215a0b?w=700&q=85"
                         alt="Pregnancy motherhood">
                </div>
            </div>

            <div class="col-6 col-lg-4">
                <div class="gallery-photo">
                    <img class="gallery-image"
                         src="https://images.unsplash.com/photo-1584515979956-d9f6e5d09982?w=700&q=85"
                         alt="Maternal healthcare">
                </div>
            </div>

            <div class="col-6 col-lg-4">
                <div class="gallery-photo">
                    <img class="gallery-image"
                         src="https://images.unsplash.com/photo-1490818387583-1baba5e638af?w=700&q=85"
                         alt="Healthy nutrition">
                </div>
            </div>

            <div class="col-6 col-lg-4">
                <div class="gallery-photo">
                    <img class="gallery-image"
                         src="https://images.unsplash.com/photo-1519689680058-324335c77eba?w=700&q=85"
                         alt="Baby">
                </div>
            </div>

            <div class="col-6 col-lg-4">
                <div class="gallery-photo">
                    <img class="gallery-image"
                         src="https://images.unsplash.com/photo-1584515933487-779824d29309?w=700&q=85"
                         alt="Medical care">
                </div>
            </div>

            <div class="col-6 col-lg-4">
                <div class="gallery-photo">
                    <img class="gallery-image"
                         src="https://images.unsplash.com/photo-1508214751196-bcfd4ca60f91?w=700&q=85"
                         alt="Motherhood">
                </div>
            </div>

        </div>

    </div>


    <!-- MEDICAL INFORMATION DISCLAIMER -->

    <div class="gallery-section">

        <div class="info-card info-blue">

            <h5>
                <i class="bi bi-info-circle-fill blue-text me-2"></i>
                Important Health Information
            </h5>

            <p>
                This pregnancy gallery is provided for general
                educational purposes only. It does not replace
                professional medical advice, diagnosis or treatment.
                Always consult your qualified doctor, midwife or
                healthcare provider for advice based on your
                individual pregnancy and health needs.
            </p>

        </div>

    </div>


    <!-- FOOTER -->

    <div class="pregnancy-footer">

        <div class="d-flex align-items-center gap-3">

            <i class="bi bi-heart-pulse-fill fs-1"></i>

            <div>

                <h5>
                    A Healthy Pregnancy Leads to a Healthier Tomorrow.
                </h5>

                <p>
                    Take care, stay informed and enjoy this special journey.
                </p>

            </div>

        </div>

    </div>


</div>
</div>
</div>

@endsection



 <!-- PREGNANCY STAGES -->

    <div class="gallery-section">

        <div class="section-heading">
            <span class="section-label">PREGNANCY JOURNEY</span>
            <h3>Three Stages of Pregnancy</h3>
            <p>Understand the changes that happen during each trimester.</p>
        </div>

        <div class="row g-4">

            <div class="col-lg-4 col-md-6">

                <div class="trimester-card">

                    <img src="https://images.unsplash.com/photo-1544126592-807ade215a0b?w=800&q=85"
                         alt="First trimester pregnancy">

                    <div class="trimester-content">

                        <span class="badge bg-danger-subtle text-danger mb-3">
                            WEEKS 1–12
                        </span>

                        <h5>First Trimester</h5>

                        <p>
                            The early stage of pregnancy. The baby's
                            basic organs and body structures begin
                            developing. Hormonal changes may cause
                            tiredness, nausea and breast tenderness.
                        </p>

                        <ul class="pregnancy-list">
                            <li><i class="bi bi-check-circle-fill"></i> Arrange early prenatal care.</li>
                            <li><i class="bi bi-check-circle-fill"></i> Discuss folic acid with your doctor.</li>
                            <li><i class="bi bi-check-circle-fill"></i> Eat small, balanced meals.</li>
                            <li><i class="bi bi-check-circle-fill"></i> Get enough rest.</li>
                        </ul>

                    </div>

                </div>

            </div>


            <div class="col-lg-4 col-md-6">

                <div class="trimester-card">

                    <img src="https://images.unsplash.com/photo-1518105779142-d975f22f1b0a?w=800&q=85"
                         alt="Second trimester pregnancy">

                    <div class="trimester-content">

                        <span class="badge bg-primary-subtle text-primary mb-3">
                            WEEKS 13–27
                        </span>

                        <h5>Second Trimester</h5>

                        <p>
                            During this stage, the baby continues to
                            grow. Many mothers begin noticing baby
                            movements. Regular prenatal appointments
                            help monitor development.
                        </p>

                        <ul class="pregnancy-list">
                            <li><i class="bi bi-check-circle-fill"></i> Attend scheduled scans.</li>
                            <li><i class="bi bi-check-circle-fill"></i> Maintain nutritious meals.</li>
                            <li><i class="bi bi-check-circle-fill"></i> Stay gently active if approved.</li>
                            <li><i class="bi bi-check-circle-fill"></i> Discuss any new symptoms.</li>
                        </ul>

                    </div>

                </div>

            </div>


            <div class="col-lg-4 col-md-6">

                <div class="trimester-card">

                    <img src="https://images.unsplash.com/photo-1584515979956-d9f6e5d09982?w=800&q=85"
                         alt="Third trimester medical care">

                    <div class="trimester-content">

                        <span class="badge bg-success-subtle text-success mb-3">
                            WEEKS 28–40
                        </span>

                        <h5>Third Trimester</h5>

                        <p>
                            The baby gains weight and prepares for birth.
                            The mother may experience increased tiredness
                            and physical discomfort as the baby grows.
                        </p>

                        <ul class="pregnancy-list">
                            <li><i class="bi bi-check-circle-fill"></i> Attend regular checkups.</li>
                            <li><i class="bi bi-check-circle-fill"></i> Learn about labour signs.</li>
                            <li><i class="bi bi-check-circle-fill"></i> Prepare hospital essentials.</li>
                            <li><i class="bi bi-check-circle-fill"></i> Monitor baby movements.</li>
                        </ul>

                    </div>

                </div>

            </div>

        </div>

    </div>


    <!-- BABY DEVELOPMENT -->

    <div class="gallery-section">

        <div class="section-heading">
            <span class="section-label">BABY DEVELOPMENT</span>
            <h3>Understanding Your Baby's Growth</h3>
            <p>Learn about the important developmental milestones.</p>
        </div>

        <div class="row g-3">

            <div class="col-md-6 col-lg-3">

                <div class="photo-card">

                    <img src="https://images.unsplash.com/photo-1578496781379-7dcfb995293d?w=600&q=80"
                         alt="Early prenatal development">

                    <div class="photo-content">
                        <h6>Early Development</h6>
                        <p>
                            The embryo begins developing important
                            structures during the early weeks.
                        </p>
                    </div>

                </div>

            </div>

            <div class="col-md-6 col-lg-3">

                <div class="photo-card">

                    <img src="https://images.unsplash.com/photo-1584515933487-779824d29309?w=600&q=80"
                         alt="Pregnancy ultrasound">

                    <div class="photo-content">
                        <h6>Ultrasound Monitoring</h6>
                        <p>
                            Ultrasound examinations can help healthcare
                            professionals assess baby development.
                        </p>
                    </div>

                </div>

            </div>

            <div class="col-md-6 col-lg-3">

                <div class="photo-card">

                    <img src="https://images.unsplash.com/photo-1544126592-807ade215a0b?w=600&q=80"
                         alt="Pregnant mother">

                    <div class="photo-content">
                        <h6>Baby Movements</h6>
                        <p>
                            Mothers generally begin feeling movements
                            during the second trimester.
                        </p>
                    </div>

                </div>

            </div>

            <div class="col-md-6 col-lg-3">

                <div class="photo-card">

                    <img src="https://images.unsplash.com/photo-1519689680058-324335c77eba?w=600&q=80"
                         alt="Newborn baby">

                    <div class="photo-content">
                        <h6>Preparing for Birth</h6>
                        <p>
                            During the final weeks, the baby continues
                            preparing for life outside the womb.
                        </p>
                    </div>

                </div>

            </div>

        </div>

    </div>


    <!-- NUTRITION GUIDE -->

    <div class="gallery-section">

        <div class="section-heading">
            <span class="section-label">HEALTHY NUTRITION</span>
            <h3>Pregnancy Nutrition Guide</h3>
            <p>A balanced diet provides important nutrients for mother and baby.</p>
        </div>

        <div class="row row-cols-2 row-cols-md-3 row-cols-lg-6 g-3">

            <div class="col">
                <div class="food-card">
                    <img src="https://images.unsplash.com/photo-1490818387583-1baba5e638af?w=400&q=80"
                         alt="Fresh fruits">
                    <h6>Fresh Fruits</h6>
                    <p>Vitamins, minerals and fibre.</p>
                </div>
            </div>

            <div class="col">
                <div class="food-card">
                    <img src="https://images.unsplash.com/photo-1540420773420-3366772f4999?w=400&q=80"
                         alt="Green vegetables">
                    <h6>Vegetables</h6>
                    <p>Folate, fibre and nutrients.</p>
                </div>
            </div>

            <div class="col">
                <div class="food-card">
                    <img src="https://images.unsplash.com/photo-1563636619-e9143da7973b?w=400&q=80"
                         alt="Milk">
                    <h6>Dairy Products</h6>
                    <p>Calcium and protein.</p>
                </div>
            </div>

            <div class="col">
                <div class="food-card">
                    <img src="https://images.unsplash.com/photo-1574323347407-f5e1ad6d020b?w=400&q=80"
                         alt="Whole grains">
                    <h6>Whole Grains</h6>
                    <p>Energy and fibre.</p>
                </div>
            </div>

            <div class="col">
                <div class="food-card">
                    <img src="https://images.unsplash.com/photo-1490645935967-10de6ba17061?w=400&q=80"
                         alt="Healthy protein foods">
                    <h6>Protein Foods</h6>
                    <p>Eggs, beans and well-cooked fish.</p>
                </div>
            </div>

            <div class="col">
                <div class="food-card">
                    <img src="https://images.unsplash.com/photo-1548839140-29a749e1cf4d?w=400&q=80"
                         alt="Drinking water">
                    <h6>Water</h6>
                    <p>Maintain hydration.</p>
                </div>
            </div>

        </div>

    </div>


    <!-- IMPORTANT NUTRIENTS -->

    <div class="gallery-section">

        <div class="row g-3">

            <div class="col-lg-6">

                <div class="info-card info-green">

                    <div class="info-icon green-text">
                        <i class="bi bi-capsule"></i>
                    </div>

                    <h5>Important Pregnancy Nutrients</h5>

                    <ul class="pregnancy-list">

                        <li><i class="bi bi-check-circle-fill"></i>
                            <span><strong>Folic Acid:</strong> Helps reduce the risk of neural tube defects.</span>
                        </li>

                        <li><i class="bi bi-check-circle-fill"></i>
                            <span><strong>Iron:</strong> Helps support healthy red blood cell production.</span>
                        </li>

                        <li><i class="bi bi-check-circle-fill"></i>
                            <span><strong>Calcium:</strong> Supports the development of baby's bones and teeth.</span>
                        </li>

                        <li><i class="bi bi-check-circle-fill"></i>
                            <span><strong>Vitamin D:</strong> Helps the body absorb calcium.</span>
                        </li>

                        <li><i class="bi bi-check-circle-fill"></i>
                            <span><strong>Protein:</strong> Supports growth and tissue development.</span>
                        </li>

                    </ul>

                    <p class="mt-3">
                        Supplement requirements and doses should be
                        discussed with a qualified healthcare professional.
                    </p>

                </div>

            </div>


            <div class="col-lg-6">

                <div class="info-card info-yellow">

                    <div class="info-icon" style="color:#d18b16;">
                        <i class="bi bi-exclamation-circle"></i>
                    </div>

                    <h5>Foods and Drinks to Avoid or Limit</h5>

                    <ul class="pregnancy-list">

                        <li><i class="bi bi-x-circle-fill text-danger"></i>
                            Raw or undercooked meat and eggs.
                        </li>

                        <li><i class="bi bi-x-circle-fill text-danger"></i>
                            Unpasteurized milk and dairy products.
                        </li>

                        <li><i class="bi bi-x-circle-fill text-danger"></i>
                            High-mercury fish.
                        </li>

                        <li><i class="bi bi-x-circle-fill text-danger"></i>
                            Alcohol during pregnancy.
                        </li>

                        <li><i class="bi bi-x-circle-fill text-danger"></i>
                            Excessive caffeine.
                        </li>

                    </ul>

                    <p class="mt-3">
                        Follow local food-safety advice and your
                        healthcare professional's recommendations.
                    </p>

                </div>

            </div>

        </div>

    </div>


    <!-- HEALTHY LIFESTYLE -->

    <div class="gallery-section">

        <div class="section-heading">
            <span class="section-label">DAILY WELLNESS</span>
            <h3>Healthy Lifestyle During Pregnancy</h3>
            <p>Small daily habits can support maternal wellbeing.</p>
        </div>

        <div class="row g-3">

            <div class="col-md-6 col-lg-3">

                <div class="photo-card">
                    <img src="https://images.unsplash.com/photo-1506126613408-eca07ce68773?w=600&q=80"
                         alt="Relaxation and wellness">
                    <div class="photo-content">
                        <h6>Rest and Relaxation</h6>
                        <p>Get enough sleep and make time for relaxation.</p>
                    </div>
                </div>

            </div>

            <div class="col-md-6 col-lg-3">

                <div class="photo-card">
                    <img src="https://images.unsplash.com/photo-1518611012118-696072aa579a?w=600&q=80"
                         alt="Gentle exercise">
                    <div class="photo-content">
                        <h6>Gentle Exercise</h6>
                        <p>Walking and suitable activities may support wellbeing when approved by your doctor.</p>
                    </div>
                </div>

                <div class="gallery-section">

        <div class="section-heading">
            <span class="section-label">PRENATAL CARE</span>
            <h3>Important Medical Checkups</h3>
            <p>Regular appointments help healthcare professionals monitor pregnancy.</p>
        </div>

        <div class="row align-items-center g-4">

            <div class="col-lg-6">

                <img src="https://images.unsplash.com/photo-1584515979956-d9f6e5d09982?w=900&q=85"
                     alt="Pregnancy medical consultation"
                     class="w-100 rounded-4"
                     style="height:330px;object-fit:cover;">

            </div>

            <div class="col-lg-6">

                <div class="info-card info-blue">

                    <h5>
                        <i class="bi bi-heart-pulse-fill blue-text me-2"></i>
                        Prenatal Health Monitoring
                    </h5>

                    <ul class="pregnancy-list">

                        <li>
                            <i class="bi bi-check-circle-fill"></i>
                            Blood pressure monitoring.
                        </li>

                        <li>
                            <i class="bi bi-check-circle-fill"></i>
                            Blood and urine tests as recommended.
                        </li>

                        <li>
                            <i class="bi bi-check-circle-fill"></i>
                            Ultrasound examinations when indicated.
                        </li>

                        <li>
                            <i class="bi bi-check-circle-fill"></i>
                            Monitoring baby's growth.
                        </li>

                        <li>
                            <i class="bi bi-check-circle-fill"></i>
                            Screening for pregnancy-related conditions.
                        </li>

                        <li>
                            <i class="bi bi-check-circle-fill"></i>
                            Discussing symptoms and medications.
                        </li>

                    </ul>

                    <p class="mt-3">
                        Your antenatal appointment schedule should be
                        planned with your healthcare provider.
                    </p>

                </div>

            </div>

        </div>

    </div>


    <!-- COMMON SYMPTOMS -->

    <div class="gallery-section">

        <div class="section-heading">
            <span class="section-label">MATERNAL WELLNESS</span>
            <h3>Common Pregnancy Discomforts</h3>
            <p>Some physical changes are common during pregnancy.</p>
        </div>

        <div class="row g-3">

            <div class="col-md-6 col-lg-3">
                <div class="info-card info-pink">
                    <div class="info-icon pink-text">
                        <i class="bi bi-emoji-dizzy"></i>
                    </div>
                    <h5>Morning Sickness</h5>
                    <p>Nausea can occur at different times of the day. Small meals may help. Seek medical advice if you cannot keep fluids down.</p>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="info-card info-blue">
                    <div class="info-icon blue-text">
                        <i class="bi bi-person-walking"></i>
                    </div>
                    <h5>Back Pain</h5>
                    <p>Body changes can cause back discomfort. Ask your healthcare provider about suitable posture and gentle movement.</p>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="info-card info-green">
                    <div class="info-icon green-text">
                        <i class="bi bi-moon-stars"></i>
                    </div>
                    <h5>Fatigue</h5>
                    <p>Feeling tired can be common. Rest regularly and discuss severe or unusual tiredness with your doctor.</p>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="info-card info-purple">
                    <div class="info-icon" style="color:#8957d9;">
                        <i class="bi bi-heart"></i>
                    </div>
                    <h5>Heartburn</h5>
                    <p>Digestive changes may cause heartburn. Discuss safe ways to manage persistent symptoms with your healthcare provider.</p>
                </div>
            </div>

        </div>

    </div>


    <!-- WARNING SIGNS -->

    <div class="gallery-section">

        <div class="warning-banner">

            <div class="row align-items-center g-0">

                <div class="col-lg-7">

                    <div class="warning-content">

                        <h4>
                            <i class="bi bi-exclamation-triangle-fill me-2"></i>
                            Pregnancy Warning Signs
                        </h4>

                        <p class="small text-secondary">
                            Seek urgent medical assessment if you experience:
                        </p>

                        <div class="row">

                            <div class="col-md-6">

                                <ul class="list-unstyled">
                                    <li><i class="bi bi-x-circle-fill text-danger me-2"></i> Vaginal bleeding</li>
                                    <li><i class="bi bi-x-circle-fill text-danger me-2"></i> Severe abdominal pain</li>
                                    <li><i class="bi bi-x-circle-fill text-danger me-2"></i> Severe or persistent headache</li>
                                    <li><i class="bi bi-x-circle-fill text-danger me-2"></i> Blurred vision</li>
                                </ul>

                            </div>

                            <div class="col-md-6">

                                <ul class="list-unstyled">
                                    <li><i class="bi bi-x-circle-fill text-danger me-2"></i> Sudden swelling of face or hands</li>
                                    <li><i class="bi bi-x-circle-fill text-danger me-2"></i> Reduced baby movements</li>
                                    <li><i class="bi bi-x-circle-fill text-danger me-2"></i> Fever or serious illness</li>
                                    <li><i class="bi bi-x-circle-fill text-danger me-2"></i> Difficulty breathing</li>
                                </ul>

                            </div>

                        </div>

                        <p class="small fw-bold text-danger mb-0">
                            Do not wait for symptoms to disappear. Contact
                            a healthcare professional or seek emergency care.
                        </p>

                    </div>

                </div>

                <div class="col-lg-5">

                    <img src="https://images.unsplash.com/photo-1544126592-807ade215a0b?w=800&q=85"
                         alt="Pregnancy maternal care"
                         class="warning-image">

                </div>

            </div>

        </div>

    </div>


    <!-- PREPARING FOR DELIVERY -->

    <div class="gallery-section">

        <div class="section-heading">
            <span class="section-label">GETTING READY</span>
            <h3>Preparing for Your Baby's Arrival</h3>
            <p>Plan ahead for a comfortable and supported birth experience.</p>
        </div>

        <div class="row g-4">

            <div class="col-lg-6">

                <div class="photo-card">

                    <img src="https://images.unsplash.com/photo-1519689680058-324335c77eba?w=800&q=85"
                         alt="Baby preparation">

                    <div class="photo-content">

                        <h6>Prepare Baby Essentials</h6>

                        <p>
                            Prepare suitable baby clothes, nappies,
                            blankets and essential newborn supplies.
                        </p>

                    </div>

                </div>

            </div>

            <div class="col-lg-6">

                <div class="info-card info-blue">

                    <div class="info-icon blue-text">
                        <i class="bi bi-bag-heart"></i>
                    </div>

                    <h5>Hospital Bag Checklist</h5>

                    <ul class="pregnancy-list">

                        <li><i class="bi bi-check-circle-fill"></i> Comfortable clothing for mother.</li>
                        <li><i class="bi bi-check-circle-fill"></i> Baby clothes and nappies.</li>
                        <li><i class="bi bi-check-circle-fill"></i> Personal hygiene items.</li>
                        <li><i class="bi bi-check-circle-fill"></i> Medical records and identification.</li>
                        <li><i class="bi bi-check-circle-fill"></i> Important contact information.</li>
                        <li><i class="bi bi-check-circle-fill"></i> Safe transport arrangements.</li>

                    </ul>

                </div>

            </div>

        </div>

    </div>


    <!-- AFTER DELIVERY -->

    <div class="gallery-section">

        <div class="section-heading">
            <span class="section-label">POSTNATAL CARE</span>
            <h3>Mother and Baby Care After Delivery</h3>
            <p>Care continues after birth for both mother and newborn.</p>
        </div>

        <div class="row g-3">

            <div class="col-md-4">

                <div class="photo-card">

                    <img src="https://images.unsplash.com/photo-1519689680058-324335c77eba?w=700&q=85"
                         alt="Newborn baby">

                    <div class="photo-content">
                        <h6>Newborn Care</h6>
                        <p>Follow professional guidance about feeding, safe sleep, hygiene and newborn health checks.</p>
                    </div>

                </div>

            </div>

            <div class="col-md-4">

                <div class="photo-card">

                    <img src="https://images.unsplash.com/photo-1584515979956-d9f6e5d09982?w=700&q=85"
                         alt="Postnatal healthcare">

                    <div class="photo-content">
                        <h6>Postnatal Checkups</h6>
                        <p>Attend follow-up appointments to monitor physical recovery and maternal wellbeing.</p>
                    </div>

                </div>

            </div>

            <div class="col-md-4">

                <div class="photo-card">

                    <img src="https://images.unsplash.com/photo-1492725764893-90b379c2b6e7?w=700&q=85"
                         alt="Mother and baby bonding">

                    <div class="photo-content">
                        <h6>Mother and Baby Bonding</h6>
                        <p>Skin-to-skin contact and responsive care can support bonding and newborn wellbeing.</p>
                    </div>

                </div>

            </div>

        </div>

    </div>


    <!-- FINAL IMAGE GALLERY -->

    <div class="gallery-section">

        <div class="section-heading">

            <span class="section-label">PHOTO COLLECTION</span>

            <h3>Pregnancy & Motherhood Gallery</h3>

            <p>
                A collection of pregnancy, maternity care and newborn moments.
            </p>

        </div>

        <div class="row g-3">

            <div class="col-6 col-lg-4">
                <div class="gallery-photo">
                    <img class="gallery-image"
                         src="https://images.unsplash.com/photo-1544126592-807ade215a0b?w=700&q=85"
                         alt="Pregnancy motherhood">
                </div>
            </div>

            <div class="col-6 col-lg-4">
                <div class="gallery-photo">
                    <img class="gallery-image"
                         src="https://images.unsplash.com/photo-1584515979956-d9f6e5d09982?w=700&q=85"
                         alt="Maternal healthcare">
                </div>
            </div>

            <div class="col-6 col-lg-4">
                <div class="gallery-photo">
                    <img class="gallery-image"
                         src="https://images.unsplash.com/photo-1490818387583-1baba5e638af?w=700&q=85"
                         alt="Healthy nutrition">
                </div>
            </div>

            <div class="col-6 col-lg-4">
                <div class="gallery-photo">
                    <img class="gallery-image"
                         src="https://images.unsplash.com/photo-1519689680058-324335c77eba?w=700&q=85"
                         alt="Baby">
                </div>
            </div>

            <div class="col-6 col-lg-4">
                <div class="gallery-photo">
                    <img class="gallery-image"
                         src="https://images.unsplash.com/photo-1584515933487-779824d29309?w=700&q=85"
                         alt="Medical care">
                </div>
            </div>

            <div class="col-6 col-lg-4">
                <div class="gallery-photo">
                    <img class="gallery-image"
                         src="https://images.unsplash.com/photo-1508214751196-bcfd4ca60f91?w=700&q=85"
                         alt="Motherhood">
                </div>
            </div>

        </div>

    </div>


    <!-- MEDICAL INFORMATION DISCLAIMER -->

    <div class="gallery-section">

        <div class="info-card info-blue">

            <h5>
                <i class="bi bi-info-circle-fill blue-text me-2"></i>
                Important Health Information
            </h5>

            <p>
                This pregnancy gallery is provided for general
                educational purposes only. It does not replace
                professional medical advice, diagnosis or treatment.
                Always consult your qualified doctor, midwife or
                healthcare provider for advice based on your
                individual pregnancy and health needs.
            </p>

        </div>

    </div>


</div>
</div>
</div>

@endsection