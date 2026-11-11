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