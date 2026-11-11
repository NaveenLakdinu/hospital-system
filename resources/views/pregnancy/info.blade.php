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

.pregnancy-list li {
    display: flex;
    gap: 10px;
    align-items: flex-start;
    font-size: 12px;
    color: #53647d;
    line-height: 1.7;
};