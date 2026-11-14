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