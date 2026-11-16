<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSRF Token for Secure Laravel AJAX Requests -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>MediCare24 - Family Care Clinic AI Assistant</title>

    <!-- Bootstrap 5 CSS & Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <!-- Google Fonts: Plus Jakarta Sans, Noto Sans Sinhala & Dancing Script (for cursive footer) -->
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@600;700&family=Noto+Sans+Sinhala:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>

        style>
        /* ==========================================================================
           GLOBAL THEME COLORS & TYPOGRAPHY
           ========================================================================== */
        :root {
            --emerald-primary: #10b981;
            --emerald-dark: #064e3b;
            --sidebar-bg: linear-gradient(180deg, #0b5d3b 0%, #053b25 100%);
            --chat-header-bg: linear-gradient(90deg, #0c7c4d 0%, #16a366 55%, #10b981 100%);
            --bot-bubble-bg: #e6f7ef;
            --user-bubble-bg: linear-gradient(135deg, #c7f2e3 0%, #b5ece0 100%);
            --send-btn-bg: linear-gradient(135deg, #22c55e 0%, #0d9488 100%);
            --page-bg: #eef7f4;
        }
        body {
            font-family: 'Plus Jakarta Sans', 'Noto Sans Sinhala', sans-serif;
            background-color: var(--page-bg);
            color: #1e293b;
            margin: 0;
            padding: 0;
            overflow-x: hidden;
        }
   
        .top-navbar {
            background: #ffffff;
            border-bottom: 1px solid #e2e8f0;
            padding: 0.7rem 1.75rem;
            position: sticky;
            top: 0;
            z-index: 1030;
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.03);
        }
        nav-menu-item {
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
        .nav-menu-item:hover, .nav-menu-item.active {
            color: #059669;
            background-color: #ecfdf5;
        }

        .badge-new-pill {
            background: linear-gradient(135deg, #14b8a6, #0d9488);
            color: #ffffff;
            font-size: 10px;
            font-weight: 700;
            padding: 3px 9px;
            border-radius: 20px;
            letter-spacing: 0.5px;
        }
        /* ==========================================================================
           2. MAIN WORKSPACE & LEFT DARK GREEN SIDEBAR
           ========================================================================== */
        .workspace-wrapper {
            display: flex;
            min-height: calc(100vh - 64px);
        }

        .left-green-sidebar {
            width: 225px;
            background: var(--sidebar-bg);
            color: #ffffff;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: 1.5rem 1rem;
            flex-shrink: 0;
            position: relative;
        }
        display: flex;
            align-items: center;
            gap: 12px;
            color: rgba(255, 255, 255, 0.88);
            text-decoration: none;
            padding: 12px 14px;
            border-radius: 12px;
            font-weight: 600;
            font-size: 14px;
            margin-bottom: 8px;
            transition: all 0.2s ease;
        }