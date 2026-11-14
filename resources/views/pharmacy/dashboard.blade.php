<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MediCare24 - Pharmacy Portal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #eef7f6;
            color: #1e293b;
        }
        color: #1e293b;
        }
        .sidebar {
            width: 245px;
            min-height: 100vh;
            background: #ffffff;
            border-right: 1px solid #e2e8f0;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: 1.5rem 1rem;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1000;
        }}
        .main-wrapper {
            margin-left: 245px;
            padding: 1.5rem 2rem;
        }
        .brand-logo {
            text-align: center;
            margin-bottom: 1.8rem;
        }
        .brand-cross {
            width: 44px;
            height: 44px;
            background: linear-gradient(135deg, #10b981, #059669);

            .brand-cross {
            width: 44px;
            height: 44px;
            background: linear-gradient(135deg, #10b981, #059669);
            color: #fff;
            border-radius: 12px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            box-shadow: 0 6px 15px rgba(16, 185, 129, 0.25);
        }
        .nav-item-link {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 11px 16px;
            border-radius: 12px;
            color: #475569;
            font-weight: 600;
            font-size: 14px;
            text-decoration: none;
            margin-bottom: 6px;
            transition: all 0.2s ease;
        }
        .nav-item-link i {
            font-size: 17px;
            color: #10b981;
        }
        .nav-item-link:hover {
            background-color: #ecfdf5;
            color: #059669;
        }
        .nav-item-link.active {
            background-color: #d1fae5;
            color: #047857;
            font-weight: 700;
        }
        .sidebar-footer-card {
            background: linear-gradient(180deg, #f0fdf4 0%, #dcfce7 100%);
            border-radius: 16px;
            padding: 1.2rem 1rem;
            text-align: center;
            margin-top: 2rem;
        }
        .top-header {
            background: #ffffff;
            border-radius: 16px;
            padding: 1rem 1.5rem;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.03);
            margin-bottom: 1.5rem;
        }
        .btn-teal {
            background-color: #10b981;
            border-color: #10b981;
            color: #fff;
            font-weight: 600;
        }
        .btn-teal:hover {
            background-color: #059669;
            border-color: #059669;
            color: #fff;
        }
        .card-modern {
            background: #ffffff;
            border: none;
            border-radius: 18px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.035);
        }
        .info-summary-card {
            background: linear-gradient(135deg, #dcfce7 0%, #e0f2fe 100%);
            border-radius: 18px;
            border: 1px solid #bbf7d0;
            position: relative;
            overflow: hidden;
        }
        .badge-received {
            background-color: #d1fae5;
            color: #065f46;
            padding: 5px 12px;
            border-radius: 20px;
            font-weight: 600;
            font-size: 12px;
        }
        .badge-issued {
            background-color: #dbeafe;
            color: #1e40af;
            padding: 5px 12px;
            border-radius: 20px;
            font-weight: 600;
            font-size: 12px;
        }
        .badge-instock {
            background-color: #dcfce7;
            color: #15803d;
            padding: 5px 12px;
            border-radius: 20px;
            font-weight: 600;
            font-size: 12px;
        }
        .badge-lowstock {
            background-color: #fef3c7;
            color: #b45309;
            padding: 5px 12px;
            border-radius: 20px;
            font-weight: 600;
            font-size: 12px;
        }
        @media (max-width: 991px) {
            .sidebar { position: relative; width: 100%; min-height: auto; }
            .main-wrapper { margin-left: 0; padding: 1rem; }
        }
    </style>
</head>
<!-- Left Sidebar (Settings & Logout Removed) -->
    <aside class="sidebar">
        <div>
            <div class="brand-logo">
                <div class="brand-cross mb-2">
                    <i class="bi bi-plus-lg"></i>
                </div>
                <h5 class="fw-bold mb-0 text-dark">MediCare<span style="color: #10b981;">24</span></h5>
                <small class="text-muted" style="font-size: 11px;">Pharmacy Portal</small>
            </div>

            <nav>
                <a href="{{ route('pharmacy.dashboard') }}" class="nav-item-link {{ request()->routeIs('pharmacy.dashboard') || request()->routeIs('pharmacist.dashboard') ? 'active' : '' }}">
                    <i class="bi bi-house-door-fill"></i> Dashboard
                </a>
                <a href="{{ route('pharmacy.profile.edit') }}" class="nav-item-link {{ request()->routeIs('pharmacy.profile.edit') ? 'active' : '' }}">
                    <i class="bi bi-person-gear"></i> Edit Profile
                </a>
                <a href="{{ route('pharmacy.inventory.index') }}" class="nav-item-link {{ request()->routeIs('pharmacy.inventory.index') ? 'active' : '' }}">
                    <i class="bi bi-capsule"></i> Medicine Inventory
                </a>
                <a href="{{ route('pharmacy.doctors.index') }}" class="nav-item-link {{ request()->routeIs('pharmacy.doctors.index') ? 'active' : '' }}">
                    <i class="bi bi-heart-pulse"></i> Doctor Records
                </a>
                <a href="{{ route('pharmacy.notes.index') }}" class="nav-item-link {{ request()->routeIs('pharmacy.notes.index') ? 'active' : '' }}">
                    <i class="bi bi-file-earmark-medical"></i> Received Notes
                </a>
                <a href="{{ route('pharmacy.reports.index') }}" class="nav-item-link {{ request()->routeIs('pharmacy.reports.index') ? 'active' : '' }}">
                    <i class="bi bi-bar-chart-line"></i> Reports
                </a>
            </nav>
        </div>

        <div class="sidebar-footer-card">
            <div class="mb-2">
                <i class="bi bi-capsule-pill fs-1" style="color: #10b981;"></i>
            </div>
            <h6 class="fw-bold text-success mb-1" style="font-size: 13px;">Better Care Together</h6>
            <small class="text-muted d-block" style="font-size: 11px;">Pharmacy Management System</small>
        </div>
    </aside>

    <!-- Main Content Area -->
    <div class="main-wrapper">
        <!-- Top Header -->
        <header class="top-header d-flex justify-content-between align-items-center flex-wrap gap-3">
            <div class="d-flex align-items-center gap-3">
                <div class="rounded-3 d-flex align-items-center justify-content-center text-white" style="width: 44px; height: 44px; background-color: #10b981;">
                    <i class="bi bi-hospital fs-4"></i>
                </div>
                <div>
                    <h5 class="fw-bold mb-0 text-dark">Pharmacy Admin Panel</h5>
                    <small class="text-muted">Manage medicines, doctors and records efficiently</small>
                </div>
            </div>

            <div class="d-flex align-items-center gap-3">
                <!-- Notification Bell -->
                <a href="{{ route('pharmacy.notes.index') }}" class="btn btn-light rounded-circle position-relative p-2 border">
                    <i class="bi bi-bell fs-5 text-dark"></i>
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="font-size: 10px;">
                        {{ \App\Models\DoctorMedicineNote::where('status', 'Received')->count() }}
                    </span>
                </a>

                <!-- Admin Profile Info -->
                <div class="d-flex align-items-center gap-2 bg-light px-3 py-1 rounded-pill border">
                    <img src="https://ui-avatars.com/api/?name=Pharmacy+Admin&background=10b981&color=fff" class="rounded-circle" width="34" height="34" alt="Admin">
                    <div class="lh-1">
                        <div class="fw-bold text-dark" style="font-size: 13px;">Pharmacy Admin</div>
                        <small class="text-muted" style="font-size: 11px;">Administrator</small>
                    </div>
                </div>
            </div>
        </header>

        <!-- Alerts -->
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show rounded-4 border-0 shadow-sm mb-4" role="alert">
                <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show rounded-4 border-0 shadow-sm mb-4" role="alert">
                <i class="bi bi-exclamation-triangle-fill me-2"></i> {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif