<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MediCare24 - AI Assistant Information & Guidelines</title>

    <!-- Bootstrap 5 CSS & Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <!-- Google Fonts: Plus Jakarta Sans & Noto Sans Sinhala -->
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Sinhala:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        /* ==========================================================================
           GLOBAL STYLES & COLOR VARIABLES
           ========================================================================== */
        :root {
            --primary-green: #10b981;
            --dark-green: #064e3b;
            --sidebar-gradient: linear-gradient(180deg, #0b5d3b 0%, #063f28 100%);
            --header-gradient: linear-gradient(90deg, #0d7a4e 0%, #16a366 55%, #10b981 100%);
            --soft-mint-bg: #eef7f4;
        }
        body {
            font-family: 'Plus Jakarta Sans', 'Noto Sans Sinhala', sans-serif;
            background-color: var(--soft-mint-bg);
            color: #1e293b;
            margin: 0;
            padding: 0;
        }
        .top-navbar {
            background: #ffffff;
            border-bottom: 1px solid #e2e8f0;
            padding: 0.75rem 1.75rem;
            position: sticky;
            top: 0;
            z-index: 1030;
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.03);
        }
      .brand-badge {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            background: linear-gradient(135deg, #2dd4bf, #0d9488);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            color: #ffffff;
            font-size: 18px;
        }
        .top-nav-link {
            color: #475569;
            font-weight: 600;
            font-size: 13.5px;
            text-decoration: none;
            padding: 6px 12px;
            border-radius: 8px;
            transition: all 0.2s ease;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }
        .top-nav-link:hover, .top-nav-link.active {
            color: #059669;
            background-color: #ecfdf5;
        }
        .badge-new {
            background: linear-gradient(135deg, #14b8a6, #0d9488);
            color: #fff;
            font-size: 10px;
            font-weight: 700;
            padding: 3px 8px;
            border-radius: 20px;
            letter-spacing: 0.4px;
        }
        /* ==========================================================================
           LEFT DARK GREEN SIDEBAR STYLES
           ========================================================================== */
        .app-layout {
            display: flex;
            min-height: calc(100vh - 65px);
        }
        .left-sidebar {
            width: 225px;
            background: var(--sidebar-gradient);
            color: #ffffff;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: 1.5rem 1rem;
            flex-shrink: 0;
        }
        .sidebar-menu-btn {
            display: flex;
            align-items: center;
            gap: 12px;
            color: rgba(255, 255, 255, 0.85);
            text-decoration: none;
            padding: 12px 14px;
            border-radius: 12px;
            font-weight: 600;
            font-size: 14px;
            margin-bottom: 8px;
            transition: all 0.2s ease;
        }

        .sidebar-menu-btn:hover {
            background: rgba(255, 255, 255, 0.12);
            color: #ffffff;
        }
        .sidebar-menu-btn.active {
            background: rgba(255, 255, 255, 0.18);
            color: #ffffff;
            border-left: 4px solid #34d399;
        }

        .sidebar-bottom-emblem {
            text-align: center;
            padding: 1rem 0.5rem;
        }
        .sidebar-menu-btn.active {
            background: rgba(255, 255, 255, 0.18);
            color: #ffffff;
            border-left: 4px solid #34d399;
        }

        .sidebar-bottom-emblem {
            text-align: center;
            padding: 1rem 0.5rem;
        }

        /* ==========================================================================
           AI INFO MAIN CONTENT CARDS & ILLUSTRATIONS
           ========================================================================== */
        .main-content-area {
            flex-grow: 1;
            padding: 1.75rem 2rem;
        }

        .info-hero-banner {
            background: var(--header-gradient);
            border-radius: 20px;
            padding: 2rem;
            color: #ffffff;
            box-shadow: 0 10px 25px rgba(16, 185, 129, 0.18);
            margin-bottom: 1.75rem;
        }