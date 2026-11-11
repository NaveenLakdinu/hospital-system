@extends('layouts.app')

@section('content')
<!-- Bootstrap 5 & Bootstrap Icons -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

<style>
    .rounded-4-custom {
        border-radius: 1.5rem !important;
    }
    .hero-img-container {
        border-radius: 1.5rem 0 0 1.5rem;
        overflow: hidden;
        background: #f0f4f8;
    }
    .pill-card {
        background: #ffffff;
        border: 1px solid #eef2f6;
        border-radius: 1.25rem;
        padding: 0.85rem 0.5rem;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.03);
    }
    .icon-circle {
        width: 44px;
        height: 44px;
        border-radius: 50%;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 6px;
    }
</style>

<div class="container py-4">
    <!-- Main Outer Card -->
    <div class="card border-0 shadow-lg rounded-4-custom overflow-hidden bg-white">
        
        <!-- Top Section (Hero Banner) -->
        <div class="p-4 position-relative" style="background: linear-gradient(135deg, #eef7ff 0%, #ffffff 100%);">
            <!-- Close Button -->
            <a href="{{ route('dashboard') }}" class="btn-close position-absolute top-0 end-0 m-4 shadow-none" aria-label="Close"></a>

            <div class="row align-items-center g-4">
                <!-- Left: Pregnant Woman Image -->
                <div class="col-lg-5 col-md-6">
                    <div class="rounded-4-custom overflow-hidden shadow-sm" style="max-height: 320px;">
                        <img src="https://images.unsplash.com/photo-1544126592-807ade215a0b?q=80&w=800&auto=format&fit=crop" 
                             alt="Pregnancy Care" class="img-fluid w-100 object-fit-cover" style="height: 320px;">
                    </div>
                </div>

                <!-- Right: Content & 4 Pill Cards -->
                <div class="col-lg-7 col-md-6">
                    <!-- Badge -->
                    <span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill px-3 py-2 mb-2">
                        💚 Women's Health
                    </span>

                    <h1 class="fw-bold display-5 text-dark mb-1" style="color: #0c2340 !important;">Pregnancy</h1>
                    <h5 class="fw-bold text-primary mb-3">Healthy mom, healthy baby</h5>
                    
                    <p class="text-muted small mb-4" style="line-height: 1.6;">
                        Pregnancy is a beautiful journey, and proper care ensures both mother and baby stay healthy throughout this special time.
                    </p>

                    <!-- 4 Icon Pills -->
                    <div class="row row-cols-2 row-cols-sm-4 g-2 text-center">
                        <!-- Pill 1 -->
                        <div class="col">
                            <div class="pill-card">
                                <div class="icon-circle bg-danger-subtle text-danger mx-auto">
                                    <i class="bi bi-heart-pulse-fill fs-5"></i>
                                </div>
                                <div class="fw-bold text-dark small" style="font-size: 11px;">Healthy Development</div>
                            </div>
                        </div>
                        <!-- Pill 2 -->
                        <div class="col">
                            <div class="pill-card">
                                <div class="icon-circle bg-primary-subtle text-primary mx-auto">
                                    <i class="bi bi-shield-check fs-5"></i>
                                </div>
                                <div class="fw-bold text-dark small" style="font-size: 11px;">Regular Checkups</div>
                            </div>
                        </div>
                        <!-- Pill 3 -->
                        <div class="col">
                            <div class="pill-card">
                                <div class="icon-circle bg-success-subtle text-success mx-auto">
                                    <i class="bi bi-apple fs-5"></i>
                                </div>
                                <div class="fw-bold text-dark small" style="font-size: 11px;">Nutritious Diet</div>
                            </div>
                        </div>
                        <!-- Pill 4 -->
                        <div class="col">
                            <div class="pill-card">
                                <div class="icon-circle bg-purple-subtle text-purple mx-auto" style="background-color: #f0e6ff; color: #7c3aed;">
                                    <i class="bi bi-activity fs-5"></i>
                                </div>
                                <div class="fw-bold text-dark small" style="font-size: 11px;">Safe Delivery</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Middle Section: 3 Information Cards -->
        <div class="p-4">
            <div class="row g-3">
                <!-- 1. What to Know? -->
                <div class="col-lg-4 col-md-6">
                    <div class="card border-0 rounded-4 p-4 h-100" style="background-color: #eef6ff;">
                        <h6 class="fw-bold text-primary mb-3 d-flex align-items-center gap-2">
                            <i class="bi bi-info-circle-fill fs-5"></i> What to Know?
                        </h6>
                        <p class="text-secondary small mb-0" style="line-height: 1.6; font-size: 13px;">
                            Pregnancy typically lasts around 40 weeks. Regular checkups help monitor your health and your baby's growth. It's important to eat nutritious food, take recommended supplements, and avoid harmful substances like alcohol and tobacco.
                        </p>
                    </div>
                </div>

                <!-- 2. Essential Tips -->
                <div class="col-lg-4 col-md-6">
                    <div class="card border-0 rounded-4 p-4 h-100" style="background-color: #e8f8f0;">
                        <h6 class="fw-bold text-success mb-3 d-flex align-items-center gap-2">
                            <i class="bi bi-check-circle-fill fs-5"></i> Essential Tips
                        </h6>
                        <ul class="list-unstyled text-secondary small mb-0 d-flex flex-column gap-2" style="font-size: 13px;">
                            <li class="d-flex align-items-start gap-2">
                                <i class="bi bi-check-circle-fill text-success"></i> Take folic acid supplements.
                            </li>
                            <li class="d-flex align-items-start gap-2">
                                <i class="bi bi-check-circle-fill text-success"></i> Eat a balanced diet rich in fruits, vegetables and protein.
                            </li>
                            <li class="d-flex align-items-start gap-2">
                                <i class="bi bi-check-circle-fill text-success"></i> Stay hydrated and exercise gently.
                            </li>
                            <li class="d-flex align-items-start gap-2">
                                <i class="bi bi-check-circle-fill text-success"></i> Attend regular prenatal checkups.
                            </li>
                            <li class="d-flex align-items-start gap-2">
                                <i class="bi bi-check-circle-fill text-success"></i> Avoid smoking, alcohol and harmful chemicals.
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- 3. Warning Signs -->
                <div class="col-lg-4 col-md-12">
                    <div class="card border-0 rounded-4 p-4 h-100" style="background-color: #fff7e6;">
                        <h6 class="fw-bold text-warning mb-2 d-flex align-items-center gap-2" style="color: #d97706 !important;">
                            <i class="bi bi-exclamation-triangle-fill fs-5"></i> Warning Signs
                        </h6>
                        <p class="fw-semibold text-dark small mb-2" style="font-size: 12px;">Contact a doctor if you experience:</p>
                        <ul class="list-unstyled text-secondary small mb-0 d-flex flex-column gap-2" style="font-size: 13px;">
                            <li class="d-flex align-items-start gap-2 text-danger">
                                <i class="bi bi-check-lg text-danger fw-bold"></i> Severe abdominal pain
                            </li>
                            <li class="d-flex align-items-start gap-2 text-danger">
                                <i class="bi bi-check-lg text-danger fw-bold"></i> Heavy bleeding
                            </li>
                            <li class="d-flex align-items-start gap-2 text-danger">
                                <i class="bi bi-check-lg text-danger fw-bold"></i> Persistent headache
                            </li>
                            <li class="d-flex align-items-start gap-2 text-danger">
                                <i class="bi bi-check-lg text-danger fw-bold"></i> Reduced baby movement
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bottom Section: Related Images Gallery -->
        <div class="px-4 pb-4">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h6 class="fw-bold text-dark mb-0 d-flex align-items-center gap-2">
                    <i class="bi bi-images text-primary"></i> Related Images
                </h6>
                <a href="#" class="btn btn-sm btn-light rounded-pill px-3 fw-semibold text-primary" style="font-size: 12px;">
                    View All Images ➔
                </a>
            </div>

            <!-- 6 Image Thumbnails -->
            <div class="row row-cols-2 row-cols-sm-3 row-cols-md-6 g-2">
                <div class="col">
                    <img src="https://images.unsplash.com/photo-1578496781379-7dcfb995293d?q=80&w=300&auto=format&fit=crop" class="img-fluid rounded-3 shadow-sm object-fit-cover w-100" style="height: 100px;" alt="Ultrasound">
                </div>
                <div class="col">
                    <img src="https://images.unsplash.com/photo-1518105779142-d975f22f1b0a?q=80&w=300&auto=format&fit=crop" class="img-fluid rounded-3 shadow-sm object-fit-cover w-100" style="height: 100px;" alt="Belly Heart">
                </div>
                <div class="col">
                    <img src="https://images.unsplash.com/photo-1584515979956-d9f6e5d09982?q=80&w=300&auto=format&fit=crop" class="img-fluid rounded-3 shadow-sm object-fit-cover w-100" style="height: 100px;" alt="Doctor Checkup">
                </div>
                <div class="col">
                    <img src="https://images.unsplash.com/photo-1490818387583-1baba5e638af?q=80&w=300&auto=format&fit=crop" class="img-fluid rounded-3 shadow-sm object-fit-cover w-100" style="height: 100px;" alt="Healthy Food">
                </div>
                <div class="col">
                    <img src="https://images.unsplash.com/photo-1519689680058-324335c77eba?q=80&w=300&auto=format&fit=crop" class="img-fluid rounded-3 shadow-sm object-fit-cover w-100" style="height: 100px;" alt="Baby Feet">
                </div>
                <div class="col">
                    <img src="https://images.unsplash.com/photo-1508214751196-bcfd4ca60f91?q=80&w=300&auto=format&fit=crop" class="img-fluid rounded-3 shadow-sm object-fit-cover w-100" style="height: 100px;" alt="Sunset Care">
                </div>
            </div>
        </div>

    </div>
</div>
@endsection