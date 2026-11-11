
@extends('layouts.app')

@section('content')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

<style>
:root {
    --primary: #0da048d5;
    --primary-dark: #34d510;
    --secondary: #05460c;
    --dark: #14213d;
    --muted: #718096;
    --surface: #ffffff;
    --background: #f5f8fd;
}

.lab-page {
    font-family: 'Inter', sans-serif;
    background: var(--background);
    min-height: 100vh;
    padding: 30px 0 70px;
    color: var(--dark);
}

.lab-container {
    max-width: 1250px;
}

.lab-heading {
    font-size: 30px;
    font-weight: 800;
    letter-spacing: -1px;
}

.lab-subtitle {
    color: var(--muted);
    font-size: 14px;
}

/* HERO */

.lab-hero {
    position: relative;
    overflow: hidden;
    border-radius: 25px;
    padding: 42px;
    margin-bottom: 28px;
    background: linear-gradient(115deg, #e4f0ff, #c6e1ff 60%, #e9f6ff);
    border: 1px solid #d6e7ff;
}

.lab-hero-content {
    position: relative;
    z-index: 2;
    max-width: 650px;
}

.lab-hero h1 {
    font-size: clamp(30px, 4vw, 43px);
    font-weight: 800;
    line-height: 1.2;
    color: #102b55;
    letter-spacing: -1.5px;
}

.lab-hero p {
    color: #506b91;
    font-size: 16px;
    margin-top: 12px;
}

.lab-hero-icon {
    position: absolute;
    right: 55px;
    top: 50%;
    transform: translateY(-50%);
    font-size: 145px;
    color: rgba(23, 105, 255, .20);
}

.hero-tag {
    display: inline-flex;
    align-items: center;
    gap: 7px;
    background: white;
    color: var(--primary);
    padding: 8px 15px;
    border-radius: 50px;
    font-size: 12px;
    font-weight: 700;
    margin-bottom: 20px;
}

/* SEARCH */

.lab-search {
    background: white;
    border: 1px solid #e8edf5;
    border-radius: 20px;
    padding: 12px;
    display: flex;
    align-items: center;
    gap: 10px;
    box-shadow: 0 8px 30px rgba(31, 67, 120, .07);
    margin-bottom: 30px;
}

.lab-location {
    display: flex;
    align-items: center;
    padding: 0 15px;
    min-width: 175px;
    border-right: 1px solid #e8edf5;
}

.lab-location i {
    color: var(--primary);
    font-size: 20px;
    margin-right: 10px;
}

.lab-location select {
    border: none;
    outline: none;
    background: transparent;
    font-weight: 600;
    width: 100%;
}

.lab-search-input {
    display: flex;
    align-items: center;
    flex: 1;
    padding: 0 12px;
}

.lab-search-input i {
    color: #8a9bb3;
    font-size: 19px;
}

.lab-search-input input {
    border: none;
    outline: none;
    box-shadow: none;
    width: 100%;
    padding: 12px;
    font-size: 14px;
}

.lab-search-input input:focus {
    outline: none;
}

.lab-btn {
    border: none;
    border-radius: 50px;
    padding: 13px 22px;
    font-size: 13px;
    font-weight: 700;
    transition: .3s;
    white-space: nowrap;
}

.btn-book {
    color: white;
    background: var(--primary);
    box-shadow: 0 5px 15px rgba(23, 105, 255, .2);
}

.btn-book:hover {
    background: var(--primary-dark);
    transform: translateY(-2px);
    color: white;
}

.btn-whatsapp {
    color: white;
    background: #00c978;
}

.btn-whatsapp:hover {
    background: #00a965;
    color: white;
    transform: translateY(-2px);
}

/* SECTION */

.lab-section {
    margin-top: 40px;
}

.lab-section-title {
    font-size: 21px;
    font-weight: 800;
    margin-bottom: 7px;
}

.lab-section-description {
    font-size: 13px;
    color: var(--muted);
    margin-bottom: 23px;
}

/* HOW IT WORKS */

.how-card {
    background: linear-gradient(120deg, #e6f2ff, #f0f7ff);
    border: 1px solid #dfebfc;
    border-radius: 22px;
    padding: 27px;
}

.how-step {
    text-align: center;
    min-width: 130px;
}

.how-icon {
    width: 65px;
    height: 65px;
    border-radius: 20px;
    display: flex;
    justify-content: center;
    align-items: center;
    margin: auto auto 12px;
    background: white;
    color: var(--primary);
    font-size: 27px;
    box-shadow: 0 5px 18px rgba(23, 105, 255, .08);
}

.how-step h6 {
    font-weight: 700;
    font-size: 13px;
}

.how-step p {
    font-size: 11px;
    color: var(--muted);
    margin-bottom: 0;
}

.how-arrow {
    font-size: 25px;
    color: #7b9bc8;
    margin-top: -25px;
}

/* CATEGORY CARDS */

.category-card {
    background: white;
    border: 1px solid #edf0f6;
    border-radius: 20px;
    padding: 24px 12px;
    text-align: center;
    height: 100%;
    cursor: pointer;
    position: relative;
    overflow: hidden;
    transition: all .3s ease;
}

.category-card:hover {
    transform: translateY(-7px);
    box-shadow: 0 15px 35px rgba(33, 74, 130, .11);
    border-color: #d4e3ff;
}

.category-icon {
    width: 76px;
    height: 76px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 15px;
    font-size: 31px;
    transition: .3s;
}

.category-card:hover .category-icon {
    transform: scale(1.08);
}

.category-card h6 {
    font-size: 14px;
    font-weight: 800;
    color: var(--dark);
    margin-bottom: 5px;
}

.category-card small {
    color: var(--muted);
    font-size: 11px;
}

.category-arrow {
    width: 30px;
    height: 30px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 13px auto 0;
    background: #f1f6ff;
    color: var(--primary);
}

/* COLORS */

.fever-icon { background: #ffe6e9; color: #f04455; }
.diabetes-icon { background: #e0f5ff; color: #1687ff; }
.skin-icon { background: #eee6ff; color: #8052d6; }
.kidney-icon { background: #fff2d6; color: #e8a000; }
.digestion-icon { background: #ddf8ed; color: #13a775; }
.cancer-icon { background: #edf0f7; color: #596b8d; }

/* TRUST STRIP */

.trust-card {
    background: white;
    border: 1px solid #edf0f6;
    border-radius: 18px;
    padding: 18px;
    height: 100%;
    display: flex;
    align-items: center;
    gap: 13px;
}

.trust-card i {
    color: var(--primary);
    font-size: 25px;
}

.trust-card strong {
    display: block;
    font-size: 12px;
}

.trust-card small {
    color: var(--muted);
    font-size: 10px;
}

/* MODAL */

.booking-modal {
    border: none;
    border-radius: 22px;
    overflow: hidden;
}

.booking-header {
    background: linear-gradient(120deg, #17ff26, #05a6ef);
    color: white;
    padding: 22px;
}

.booking-header h5 {
    font-weight: 800;
}

.booking-body {
    padding: 27px;
}

.booking-body label {
    font-size: 12px;
    font-weight: 700;
    color: #53647d;
    margin-bottom: 8px;
}

.booking-body .form-control {
    border: 1px solid #e2e9f3;
    background: #f9fbff;
    padding: 13px;
    border-radius: 11px;
    font-size: 13px;
}

.booking-body .form-control:focus {
    border-color: var(--primary);
    box-shadow: 0 0 0 3px rgba(23,105,255,.1);
}

.booking-submit {
    background: var(--primary);
    color: white;
    border: none;
    padding: 13px 23px;
    border-radius: 50px;
    font-size: 13px;
    font-weight: 700;
}

.booking-submit:hover {
    background: var(--primary-dark);
    color: white;
}

/* RESPONSIVE */

@media(max-width: 768px) {
    .lab-page {
        padding: 20px 12px 50px;
    }

    .lab-heading {
        font-size: 24px;
    }

    .lab-hero {
        padding: 28px 22px;
    }

    .lab-hero-icon {
        right: 5px;
        font-size: 90px;
        opacity: .5;
    }

    .lab-search {
        flex-wrap: wrap;
        border-radius: 17px;
        padding: 15px;
    }

    .lab-location {
        width: 100%;
        border-right: none;
        border-bottom: 1px solid #e8edf5;
        padding: 8px;
    }

    .lab-search-input {
        width: 100%;
        flex: 1 1 100%;
    }

    .lab-search-actions {
        width: 100%;
        display: flex;
    }

    .lab-search-actions .lab-btn {
        flex: 1;
        padding: 12px 8px;
        font-size: 11px;
    }

    .how-arrow {
        display: none;
    }

    .how-step {
        min-width: 100px; 
    }
}

@media(max-width: 420px) {
    .lab-hero h1 {
        font-size: 28px;
    }

    .category-card {
        padding: 18px 8px;
    }

    .category-icon {
        width: 62px;
        height: 62px;
        font-size: 26px;
    }


/* HERO WITH REAL LABORATORY BACKGROUND IMAGE */

.lab-hero {
    position: relative;
    overflow: hidden;
    border-radius: 25px;
    min-height: 330px;
    padding: 48px 42px;
    margin-bottom: 28px;

    background-image:
        linear-gradient(
            90deg,
            rgba(224, 240, 255, 0.98) 0%,
            rgba(224, 240, 255, 0.91) 38%,
            rgba(224, 240, 255, 0.25) 100%
        ),
        url('https://images.unsplash.com/photo-1697192156499-d85cfe1452c0?auto=format&fit=crop&w=1800&q=85');

    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;

    border: 1px solid #d6e7ff;
    box-shadow: 0 12px 35px rgba(30, 90, 160, 0.08);
}

.lab-hero-content {
    position: relative;
    z-index: 2;
    max-width: 650px;
}

.lab-hero h1 {
    font-size: clamp(30px, 4vw, 43px);
    font-weight: 800;
    line-height: 1.2;
    color: #102b55;
    letter-spacing: -1.5px;
}

.lab-hero p {
    color: #405c7d;
    font-size: 16px;
    margin-top: 12px;
}

/* Remove old decorative icon */

.lab-hero-icon {
    display: none;
}

/* MOBILE BACKGROUND */

@media(max-width: 768px) {
    .lab-hero {
        min-height: 300px;
        padding: 30px 22px;

        background-image:
            linear-gradient(
                90deg,
                rgba(224, 240, 255, 0.96),
                rgba(224, 240, 255, 0.78)
            ),
            url('https://images.unsplash.com/photo-1697192156499-d85cfe1452c0?auto=format&fit=crop&w=1000&q=80');

        background-position: center;
    }
}

}
</style>

<div class="lab-page">
<div class="container lab-container">

    <!-- PAGE TITLE -->

    <div class="mb-4">
        <h3 class="lab-heading">Book Lab Tests Online</h3>
        <p class="lab-subtitle">
            Find the right test, book online and take control of your health.
        </p>
    </div>

    <!-- HERO BANNER -->

    <div class="lab-hero">

        <div class="lab-hero-content">

            <span class="hero-tag">
                <i class="bi bi-patch-check-fill"></i>
                YOUR HEALTH, OUR PRIORITY
            </span>

            <h1>
                Better Health Starts<br>
                With The Right Test.
            </h1>

            <p>
                Book your laboratory tests online with ease.
                Simple booking, convenient service and reliable reports.
            </p>

        </div>

        <i class="bi bi-clipboard2-pulse lab-hero-icon"></i>

    </div>

    <!-- SEARCH BAR -->

    <div class="lab-search">

        <div class="lab-location">
            <i class="bi bi-geo-alt"></i>

            <select aria-label="Select location">
                <option selected>Sri Lanka</option>
            </select>
        </div>

        <div class="lab-search-input">
            <i class="bi bi-search"></i>

            <input
                type="search"
                id="search-input"
                placeholder="Search tests (e.g. Full Blood Count, Sugar)..."
                aria-label="Search laboratory tests"
            >
        </div>

        <div class="lab-search-actions d-flex gap-2">

            <button
                type="button"
                class="lab-btn btn-book"
                onclick="setTestFromSearch()"
            >
                <i class="bi bi-calendar-check me-1"></i>
                Online Booking
            </button>

            <a
                href="https://wa.me/94771234567"
                target="_blank"
                rel="noopener noreferrer"
                class="lab-btn btn-whatsapp text-decoration-none"
            >
                <i class="bi bi-whatsapp me-1"></i>
                WhatsApp
            </a>

        </div>
    </div>

    <!-- HOW IT WORKS -->

    <div class="how-card">

        <div class="row align-items-center g-4">

            <div class="col-lg-4">

                <h4 class="fw-bold mb-2">How it works?</h4>

                <p class="lab-subtitle mb-0">
                    Book your laboratory test in just a few simple steps.
                </p>

            </div>

            <div class="col-lg-8">

                <div class="d-flex justify-content-center align-items-center gap-3 flex-wrap">

                    <div class="how-step">
                        <div class="how-icon">
                            <i class="bi bi-calendar2-check"></i>
                        </div>
                        <h6>Book Your Test</h6>
                        <p>Choose a test</p>
                    </div>

                    <i class="bi bi-arrow-right how-arrow"></i>

                    <div class="how-step">
                        <div class="how-icon">
                            <i class="bi bi-droplet-half"></i>
                        </div>
                        <h6>Give Sample</h6>
                        <p>Visit the laboratory</p>
                    </div>

                    <i class="bi bi-arrow-right how-arrow"></i>

                    <div class="how-step">
                        <div class="how-icon">
                            <i class="bi bi-file-earmark-medical"></i>
                        </div>
                        <h6>Get Your Report</h6>
                        <p>Receive your results</p>
                    </div>

                </div>

            </div>

        </div>

    </div>

    <!-- HEALTH CATEGORIES -->

    <div class="lab-section">

        <div class="d-flex justify-content-between align-items-end flex-wrap mb-4">

            <div>
                <h4 class="lab-section-title">
                    Find Tests By Health Concern
                </h4>

                <p class="lab-section-description mb-0">
                    Choose a health category to find relevant laboratory tests.
                </p>
            </div>

            <span class="badge rounded-pill bg-primary-subtle text-primary px-3 py-2">
                6 Categories
            </span>

        </div>

        <div class="row row-cols-2 row-cols-md-3 row-cols-lg-6 g-3" id="category-container">

            <!-- FEVER -->

            <div class="col">
                <div class="category-card"
                    role="button"
                    tabindex="0"
                    onclick="openBooking('Fever Profile Test', 'Fever')">

                    <div class="category-icon fever-icon">
                        <i class="bi bi-thermometer-high"></i>
                    </div>

                    <h6>Fever</h6>
                    <small>Fever related tests</small>

                    <div class="category-arrow">
                        <i class="bi bi-arrow-right"></i>
                    </div>

                </div>
            </div>

            <!-- DIABETES -->

            <div class="col">
                <div class="category-card"
                    role="button"
                    tabindex="0"
                    onclick="openBooking('Diabetes Blood Sugar Test', 'Diabetes')">

                    <div class="category-icon diabetes-icon">
                        <i class="bi bi-droplet-half"></i>
                    </div>

                    <h6>Diabetes</h6>
                    <small>Blood sugar tests</small>

                    <div class="category-arrow">
                        <i class="bi bi-arrow-right"></i>
                    </div>

                </div>
            </div>

            <!-- SKIN -->

            <div class="col">
                <div class="category-card"
                    role="button"
                    tabindex="0"
                    onclick="openBooking('Skin Infection & Allergy Test', 'Skin')">

                    <div class="category-icon skin-icon">
                        <i class="bi bi-person-fill-exclamation"></i>
                    </div>

                    <h6>Skin</h6>
                    <small>Skin related tests</small>

                    <div class="category-arrow">
                        <i class="bi bi-arrow-right"></i>
                    </div>

                </div>
            </div>

            <!-- KIDNEY -->

            <div class="col">
                <div class="category-card"
                    role="button"
                    tabindex="0"
                    onclick="openBooking('Kidney Function Test (KFT)', 'Kidney')">

                    <div class="category-icon kidney-icon">
                        <i class="bi bi-activity"></i>
                    </div>

                    <h6>Kidney</h6>
                    <small>Kidney function tests</small>

                    <div class="category-arrow">
                        <i class="bi bi-arrow-right"></i>
                    </div>

                </div>
            </div>

            <!-- DIGESTION -->

            <div class="col">
                <div class="category-card"
                    role="button"
                    tabindex="0"
                    onclick="openBooking('Digestive System Profile', 'Digestion')">

                    <div class="category-icon digestion-icon">
                        <i class="bi bi-heart-pulse"></i>
                    </div>

                    <h6>Digestion</h6>
                    <small>Digestive health tests</small>

                    <div class="category-arrow">
                        <i class="bi bi-arrow-right"></i>
                    </div>

                </div>
            </div>

            <!-- CANCER -->

            <div class="col">
                <div class="category-card"
                    role="button"
                    tabindex="0"
                    onclick="openBooking('Cancer Screening Package', 'Cancer')">

                    <div class="category-icon cancer-icon">
                        <i class="bi bi-ribbon"></i>
                    </div>

                    <h6>Cancer</h6>
                    <small>Screening tests</small>

                    <div class="category-arrow">
                        <i class="bi bi-arrow-right"></i>
                    </div>

                </div>
            </div>

        </div>

        <div id="no-results" class="text-center py-5 d-none">
            <i class="bi bi-search fs-1 text-secondary"></i>
            <h6 class="mt-3 fw-bold">No matching category found</h6>
            <p class="text-secondary small">Try another search term.</p>
        </div>

    </div>

    <!-- TRUST SECTION -->

    <div class="lab-section">

        <h4 class="lab-section-title mb-3">
            Why Choose Our Service?
        </h4>

        <div class="row g-3">

            <div class="col-6 col-lg-3">
                <div class="trust-card">
                    <i class="bi bi-shield-check"></i>
                    <div>
                        <strong>Secure Booking</strong>
                        <small>Protected information</small>
                    </div>
                </div>
            </div>

            <div class="col-6 col-lg-3">
                <div class="trust-card">
                    <i class="bi bi-clock-history"></i>
                    <div>
                        <strong>Easy Scheduling</strong>
                        <small>Choose your date</small>
                    </div>
                </div>
            </div>

            <div class="col-6 col-lg-3">
                <div class="trust-card">
                    <i class="bi bi-headset"></i>
                    <div>
                        <strong>Customer Support</strong>
                        <small>Get booking assistance</small>
                    </div>
                </div>
            </div>

            <div class="col-6 col-lg-3">
                <div class="trust-card">
                    <i class="bi bi-file-earmark-check"></i>
                    <div>
                        <strong>Online Reports</strong>
                        <small>Convenient results</small>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>
</div>

<!-- BOOKING MODAL -->

<div class="modal fade" id="bookingModal" tabindex="-1" aria-labelledby="bookingModalLabel" aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content booking-modal shadow-lg">

            <form action="{{ route('lab.store') }}" method="POST">

                @csrf

                <div class="booking-header d-flex justify-content-between align-items-center">

                    <div>
                        <h5 id="bookingModalLabel" class="mb-1">
                            <i class="bi bi-calendar2-check me-2"></i>
                            Book Lab Test
                        </h5>

                        <small>Complete your booking details</small>
                    </div>

                    <button type="button"
                        class="btn-close btn-close-white"
                        data-bs-dismiss="modal"
                        aria-label="Close">
                    </button>

                </div>

                <div class="booking-body">

                    <div class="mb-3">

                        <label for="modal-category">
                            Test Category
                        </label>

                        <input
                            type="text"
                            id="modal-category"
                            name="category"
                            class="form-control"
                            readonly
                            required
                        >

                    </div>

                    <div class="mb-3">

                        <label for="modal-test-name">
                            Laboratory Test Name
                        </label>

                        <input
                            type="text"
                            id="modal-test-name"
                            name="test_name"
                            class="form-control"
                            placeholder="Enter your test name"
                            required
                        >

                    </div>

                    <div class="mb-3">

                        <label for="booking-date">
                            Preferred Booking Date
                        </label>

                        <input
                            type="date"
                            id="booking-date"
                            name="booking_date"
                            class="form-control"
                            min="{{ date('Y-m-d') }}"
                            required
                        >

                    </div>

                    <div class="alert alert-info small rounded-3 mb-0">
                        <i class="bi bi-info-circle me-1"></i>
                        Please check your booking details before confirming.
                    </div>

                </div>

                <div class="px-4 pb-4 d-flex justify-content-end gap-2">

                    <button type="button"
                        class="btn btn-light rounded-pill px-4"
                        data-bs-dismiss="modal">
                        Cancel
                    </button>

                    <button type="submit" class="booking-submit">
                        <i class="bi bi-check-circle me-1"></i>
                        Confirm Booking
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {

    const modalElement = document.getElementById('bookingModal');
    const bookingModal = new bootstrap.Modal(modalElement);

    const testInput = document.getElementById('modal-test-name');
    const categoryInput = document.getElementById('modal-category');
    const searchInput = document.getElementById('search-input');

    // OPEN BOOKING MODAL function

    window.openBooking = function(testName, category) {

        testInput.value = testName;
        categoryInput.value = category;

        bookingModal.show();

    };

    // SEARCH BOOKING

    window.setTestFromSearch = function() {

        const searchValue = searchInput.value.trim();

        if (searchValue === '') {

            testInput.value = 'General Health Checkup';
            categoryInput.value = 'General';

        } else {

            testInput.value = searchValue;
            categoryInput.value = 'General';

        }

        bookingModal.show();

    };

    // LIVE CATEGORY SEARCH

    searchInput.addEventListener('input', function() {

        const value = this.value.toLowerCase().trim();

        const cards = document.querySelectorAll('.category-card');
        let visibleCount = 0;

        cards.forEach(function(card) {

            const text = card.innerText.toLowerCase();

            const matches = text.includes(value);

            card.closest('.col').style.display =
                matches ? '' : 'none';

            if (matches) {
                visibleCount++;
            }

        });

        document.getElementById('no-results')
            .classList.toggle('d-none', visibleCount !== 0);

    });

    // ENTER KEY SEARCH

    searchInput.addEventListener('keydown', function(event) {

        if (event.key === 'Enter') {

            event.preventDefault();
            setTestFromSearch();

        }

    });

    // KEYBOARD ACCESSIBILITY FOR CATEGORY CARDS

    document.querySelectorAll('.category-card').forEach(function(card) {

        card.addEventListener('keydown', function(event) {

            if (event.key === 'Enter' || event.key === ' ') {

                event.preventDefault();
                card.click();

            }

        });

    });

});

</script>

@endsection
