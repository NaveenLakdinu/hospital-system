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