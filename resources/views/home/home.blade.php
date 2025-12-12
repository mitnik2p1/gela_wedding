@extends('layouts.app')

@section('title', 'Home - The Wedding Celebration')

@section('styles')
<!-- Enhanced Font Loading -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400;1,500&family=Inter:wght@300;400;500;600;700&family=Dancing+Script:wght@400;500;600;700&display=swap" rel="stylesheet">

<!-- Image Preloading for Critical Images -->
<link rel="preload" as="image" href="/Images/gallery/bride-groom-hero.jpg" type="image/jpeg" fetchpriority="high">
<link rel="preload" as="image" href="/Images/venue/noora-resort-exterior.jpg" type="image/jpeg">
<link rel="prefetch" as="image" href="/Images/gallery/QE9A0402.png" type="image/png">
<link rel="prefetch" as="image" href="/Images/gallery/QE9A0404.png" type="image/png">

<!-- Resource Hints for Better Performance -->
<link rel="prefetch" href="/Images/gallery/QE9A0346.png">
<link rel="prefetch" href="/Images/gallery/QE9A0350.png">

<!-- DNS Prefetch for External Resources -->
<link rel="dns-prefetch" href="//fonts.googleapis.com">
<link rel="dns-prefetch" href="//cdnjs.cloudflare.com">
<link rel="dns-prefetch" href="//www.google.com">
<link rel="dns-prefetch" href="//nooraresort.com">

<style>
    /* ========== ENHANCED TYPOGRAPHY ========== */
    :root {
        --font-primary: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
        --font-display: 'Playfair Display', Georgia, serif;
        --font-script: 'Dancing Script', cursive;
        --font-ethiopic: 'Noto Sans Ethiopic', 'Abyssinica SIL', sans-serif;
    }

    body {
        font-family: var(--font-primary);
        font-weight: 400;
        line-height: 1.6;
        background: 
            linear-gradient(rgba(255, 255, 255, 0.95), rgba(255, 255, 255, 0.95)),
            url('/Images/gallery/QE9A0527.png');
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
        background-repeat: no-repeat;
    }

    h1, h2, h3, h4, h5, h6 {
        font-family: var(--font-display);
        font-weight: 600;
        line-height: 1.2;
    }

    .script-font {
        font-family: var(--font-script);
    }

    /* ========== HOME PAGE SPECIFIC STYLES ========== */
    
    /* Enhanced Hero Section with Bride & Groom Background */
    .hero-section {
        min-height: 100vh;
        background-image: 
            linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.3)),
            url('/Images/gallery/bride-groom-hero.jpg');
        background-attachment: fixed;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        color: var(--color-white);
        padding: var(--space-md);
        position: relative;
    }

    /* Enhanced loading state for hero */
    .hero-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(135deg, 
            rgba(230, 242, 255, 0.9) 0%, 
            rgba(212, 175, 55, 0.7) 50%, 
            rgba(230, 242, 255, 0.9) 100%);
        z-index: -1;
        opacity: 1;
        transition: opacity 1s ease;
    }

    .hero-section.loaded::before {
        opacity: 0;
    }

    .hero-content {
        max-width: 900px;
        margin: 0 auto;
        padding: 2rem;
        backdrop-filter: blur(2px);
        background: rgba(0, 0, 0, 0.1);
        border-radius: 20px;
        border: 1px solid rgba(255, 255, 255, 0.1);
    }

    .hero-subtitle {
        font-family: var(--font-script);
        font-size: 1.5rem;
        color: var(--color-light-blue);
        margin-bottom: var(--space-sm);
        font-weight: 500;
        text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
    }

    .hero-title {
        font-family: var(--font-display);
        font-size: 4.5rem;
        margin-bottom: var(--space-md);
        line-height: 1.1;
        font-weight: 700;
        text-shadow: 0 4px 8px rgba(0, 0, 0, 0.4);
        letter-spacing: -1px;
    }

    .hero-divider {
        width: 8rem;
        height: 3px;
        background: linear-gradient(90deg, transparent, var(--color-gold), transparent);
        margin: var(--space-lg) auto;
        border-radius: 2px;
    }

    .hero-date {
        font-family: var(--font-display);
        font-size: 1.75rem;
        color: var(--color-light-blue);
        font-weight: 500;
        margin-bottom: var(--space-xl);
        text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
    }

    .btn-primary {
        display: inline-flex;
        align-items: center;
        padding: 0.75rem 2rem;
        background: transparent;
        border: 2px solid var(--color-gold);
        color: var(--color-gold);
        border-radius: 50px;
        font-weight: 500;
        transition: all 0.3s ease;
        text-decoration: none;
    }

    .btn-primary:hover {
        background: var(--color-gold);
        color: var(--color-white);
        transform: translateY(-2px);
    }

    .scroll-indicator {
        position: absolute;
        bottom: 2rem;
        left: 50%;
        transform: translateX(-50%);
        width: 2rem;
        height: 3rem;
        border: 2px solid var(--color-gold);
        border-radius: 25px;
        display: flex;
        justify-content: center;
        padding-top: 0.5rem;
    }

    .scroll-dot {
        width: 4px;
        height: 8px;
        background: var(--color-gold);
        border-radius: 2px;
        animation: bounce 2s infinite;
    }

    @keyframes bounce {
        0%, 20%, 50%, 80%, 100% { transform: translateY(0); }
        40% { transform: translateY(-10px); }
        60% { transform: translateY(-5px); }
    }

    /* Countdown Styles */
    .countdown-container {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 2rem;
        margin: var(--space-xl) 0;
        flex-wrap: wrap;
    }

    .countdown-item {
        text-align: center;
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(20px);
        border-radius: 15px;
        padding: 1.5rem;
        min-width: 100px;
        border: 1px solid rgba(212, 175, 55, 0.3);
        transition: all 0.3s ease;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
    }

    .countdown-item:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(212, 175, 55, 0.15);
        border-color: rgba(212, 175, 55, 0.4);
    }

    .countdown-number {
        font-family: var(--font-display);
        font-size: 3.2rem;
        font-weight: 800;
        color: var(--color-dark-gray);
        line-height: 1;
        transition: all 0.2s ease;
    }

    .countdown-item:hover .countdown-number {
        color: #f5f5f5;
        transform: scale(1.02);
    }

    .countdown-label {
        font-size: 0.9rem;
        text-transform: uppercase;
        letter-spacing: 2px;
        color: var(--color-dark-gray);
        margin-top: 0.5rem;
        opacity: 0.8;
    }

    /* Enhanced Orthodox Section with Background */
    .orthodox-section {
        background: 
            linear-gradient(rgba(0, 0, 0, 0.15), rgba(0, 0, 0, 0.2)),
            url('/Images/gallery/QE9A0402.png');
        background-size: cover;
        background-position: center;
        background-attachment: scroll;
        color: var(--color-white);
        position: relative;
        overflow: hidden;
        padding: 120px 0 60px 0;
        margin: 0;
        border-bottom: none;
    }



    @keyframes subtleShimmer {
        0%, 100% { opacity: 0.3; }
        50% { opacity: 0.1; }
    }

    .orthodox-bg-circle {
        position: absolute;
        border-radius: 50%;
        background: rgba(212, 175, 55, 0.05);
    }

    .orthodox-bg-circle:nth-child(1) {
        width: 16rem;
        height: 16rem;
        top: -8rem;
        left: -8rem;
    }

    .orthodox-bg-circle:nth-child(2) {
        width: 24rem;
        height: 24rem;
        bottom: -12rem;
        right: -12rem;
    }

    .orthodox-cross {
        width: 60px;
        height: 60px;
        background: var(--color-gold);
        position: relative;
        margin: 0 auto 2rem;
        border-radius: 4px;
    }

    .orthodox-cross:before,
    .orthodox-cross:after {
        content: '';
        position: absolute;
        background: var(--color-white);
        border-radius: 2px;
    }

    .orthodox-cross:before {
        width: 40px;
        height: 8px;
        top: 26px;
        left: 10px;
    }

    .orthodox-cross:after {
        width: 8px;
        height: 40px;
        top: 10px;
        left: 26px;
    }

    .orthodox-quote {
        font-family: var(--font-display);
        font-size: 2rem;
        line-height: 1.7;
        margin-bottom: var(--space-lg);
        font-style: italic;
        max-width: 850px;
        margin-left: auto;
        margin-right: auto;
        font-weight: 500;
        text-shadow: 0 4px 12px rgba(0, 0, 0, 0.9), 0 2px 6px rgba(0, 0, 0, 0.7), 0 1px 3px rgba(0, 0, 0, 0.5);
        background: rgba(0, 0, 0, 0.4);
        padding: 2rem;
        border-radius: 15px;
        backdrop-filter: blur(15px);
        border: 1px solid rgba(255, 255, 255, 0.1);
    }

    .orthodox-verse {
        font-family: var(--font-display);
        font-size: 1.4rem;
        color: var(--color-gold);
        margin-bottom: var(--space-lg);
        font-weight: 500;
        font-style: italic;
        text-shadow: 0 4px 8px rgba(0, 0, 0, 0.8), 0 2px 4px rgba(0, 0, 0, 0.6), 0 1px 2px rgba(0, 0, 0, 0.4);
        background: rgba(0, 0, 0, 0.3);
        padding: 1rem 2rem;
        border-radius: 10px;
        backdrop-filter: blur(10px);
        display: inline-block;
    }

    .verse-badge {
        display: inline-flex;
        align-items: center;
        padding: 0.5rem 1.5rem;
        background: rgba(212, 175, 55, 0.1);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(212, 175, 55, 0.3);
        border-radius: 50px;
        transition: all 0.3s ease;
    }

    .verse-badge:hover {
        background: rgba(212, 175, 55, 0.2);
        transform: translateY(-2px);
    }

    .verse-dot {
        width: 0.5rem;
        height: 0.5rem;
        background: var(--color-gold);
        border-radius: 50%;
        margin-right: 0.5rem;
    }

    /* ========== INVITATION SECTION STYLES ========== */
    .invitation-section {
        padding: 120px 0;
        background: 
            linear-gradient(rgba(255, 255, 255, 0.1), rgba(248, 249, 250, 0.15)),
            url('/Images/gallery/QE9A0350.png');
        background-size: cover;
        background-position: center;
        background-attachment: scroll;
        position: relative;
        overflow: hidden;
    }



    @keyframes gentleFloat {
        0%, 100% { transform: translateY(0px) rotate(0deg); opacity: 0.5; }
        50% { transform: translateY(-10px) rotate(1deg); opacity: 0.3; }
    }

    .invitation-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-image: 
            url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23d4af37' fill-opacity='0.015'%3E%3Cpath d='M30 30c0-11.046-8.954-20-20-20s-20 8.954-20 20 8.954 20 20 20 20-8.954 20-20zm0 0c0 11.046 8.954 20 20 20s20-8.954 20-20-8.954-20-20-20-20 8.954-20 20z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        opacity: 0.2;
        pointer-events: none;
    }

    .invitation-section::after {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: 
            radial-gradient(circle at 25% 25%, rgba(212, 175, 55, 0.02) 0%, transparent 30%),
            radial-gradient(circle at 75% 75%, rgba(230, 242, 255, 0.06) 0%, transparent 30%);
        animation: backgroundFloat 25s ease-in-out infinite;
        pointer-events: none;
    }

    @keyframes backgroundFloat {
        0%, 100% { transform: translate(0, 0) rotate(0deg); }
        33% { transform: translate(-2%, -1%) rotate(1deg); }
        66% { transform: translate(1%, -2%) rotate(-1deg); }
    }

    /* Floating Decorative Elements */
    .invitation-section .container {
        position: relative;
        z-index: 2;
    }

    .invitation-section .container::before,
    .invitation-section .container::after {
        content: '';
        position: absolute;
        width: 80px;
        height: 80px;
        border-radius: 50%;
        background: radial-gradient(circle, rgba(230, 242, 255, 0.15) 0%, transparent 70%);
        pointer-events: none;
        z-index: -1;
    }

    .invitation-section .container::before {
        top: 15%;
        left: 8%;
        animation: floatUp 12s ease-in-out infinite;
    }

    .invitation-section .container::after {
        bottom: 15%;
        right: 8%;
        animation: floatDown 14s ease-in-out infinite reverse;
    }

    @keyframes floatUp {
        0%, 100% { transform: translateY(0px) rotate(0deg); opacity: 0.1; }
        50% { transform: translateY(-15px) rotate(180deg); opacity: 0.3; }
    }

    @keyframes floatDown {
        0%, 100% { transform: translateY(0px) rotate(0deg); opacity: 0.15; }
        50% { transform: translateY(10px) rotate(-180deg); opacity: 0.35; }
    }

    /* Enhanced Card Glow Effect */
    .card-border-glow {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        border-radius: 24px;
        background: linear-gradient(45deg, 
            transparent, 
            rgba(212, 175, 55, 0.05), 
            rgba(230, 242, 255, 0.08),
            rgba(212, 175, 55, 0.05),
            transparent);
        opacity: 0;
        transition: opacity 0.3s ease;
        pointer-events: none;
    }

    .invitation-card:hover .card-border-glow {
        opacity: 0.3;
    }

    /* ========== ENHANCED INVITATION CARD STYLES ========== */
    
    /* Ornamental Header Design */
    .ornamental-border-top {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 1.5rem;
        margin-bottom: 2rem;
        position: relative;
    }

    .ornament-left,
    .ornament-right {
        width: 80px;
        height: 2px;
        background: linear-gradient(90deg, transparent, var(--color-gold), transparent);
        position: relative;
    }

    .ornament-left::before,
    .ornament-right::before {
        content: '❦';
        position: absolute;
        top: -8px;
        color: var(--color-gold);
        font-size: 1rem;
    }

    .ornament-left::before {
        left: 0;
    }

    .ornament-right::before {
        right: 0;
    }

    .invitation-flourish {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 1rem;
        margin: 1.5rem 0;
    }

    .flourish-line {
        width: 60px;
        height: 1px;
        background: linear-gradient(90deg, transparent, var(--color-gold), transparent);
    }

    .flourish-center {
        color: var(--color-gold);
        font-size: 1.5rem;
        font-weight: 300;
    }

    /* Formal Invitation Text */
    .formal-invitation-text {
        text-align: center;
        margin: 2.5rem 0;
    }

    .invitation-opening {
        font-family: var(--font-display);
        font-size: 1.4rem;
        line-height: 1.9;
        color: var(--color-dark-gray);
        font-style: italic;
        max-width: 650px;
        margin: 0 auto;
        font-weight: 500;
        text-align: center;
    }

    /* Enhanced Couple Names */
    .name-line-elegant {
        height: 2px;
        width: 100%;
        max-width: 900px;
        background: linear-gradient(90deg, 
            transparent, 
            rgba(212, 175, 55, 0.2), 
            var(--color-gold), 
            rgba(212, 175, 55, 0.2), 
            transparent);
        margin: 2rem auto;
        position: relative;
    }

    .name-line-elegant::before,
    .name-line-elegant::after {
        content: '✦';
        position: absolute;
        top: -8px;
        color: var(--color-gold);
        font-size: 1rem;
        background: var(--color-white);
        padding: 0 0.5rem;
    }

    .name-line-elegant::before {
        left: 20%;
    }

    .name-line-elegant::after {
        right: 20%;
    }

    .name-title-elegant {
        font-size: 1.3rem;
        color: var(--color-gold);
        margin-bottom: 0.5rem;
        font-weight: 500;
        letter-spacing: 2px;
        text-transform: uppercase;
    }

    .name-text-primary {
        font-family: var(--font-display);
        font-size: 3.5rem;
        font-weight: 800;
        color: var(--color-dark-gray);
        margin-bottom: 0.2rem;
        line-height: 1;
        letter-spacing: -0.5px;
        text-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
    }

    .name-text-secondary {
        font-family: var(--font-display);
        font-size: 2.8rem;
        font-weight: 600;
        color: var(--color-dark-gray);
        opacity: 0.9;
        letter-spacing: -0.25px;
        line-height: 1;
        margin-bottom: 1rem;
    }

    .name-description {
        font-size: 1rem;
        color: var(--color-dark-gray);
        opacity: 0.7;
        font-style: italic;
        line-height: 1.4;
        max-width: 250px;
        margin: 0 auto;
    }

    /* Enhanced Name Connector */
    .name-connector-elegant {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
        flex: 0 0 auto;
        width: 140px;
        padding: 1rem;
    }

    .connector-ornament-top,
    .connector-ornament-bottom {
        color: var(--color-gold);
        font-size: 1.2rem;
        opacity: 0.8;
    }

    .connector-text {
        font-size: 1.4rem;
        color: var(--color-dark-gray);
        font-style: italic;
        font-weight: 300;
        letter-spacing: 2px;
    }

    .connector-heart-elegant {
        width: 60px;
        height: 60px;
        background: linear-gradient(135deg, var(--color-gold), #FFD700);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--color-white);
        font-size: 1.5rem;
        animation: gentleHeartbeat 3s infinite ease-in-out;
        box-shadow: 0 6px 20px rgba(212, 175, 55, 0.2);
        margin: 0.5rem 0;
    }

    @keyframes gentleHeartbeat {
        0%, 100% { transform: scale(1); }
        50% { transform: scale(1.05); }
    }

    /* Enhanced Countdown Section with Background */
    .countdown-section {
        background: 
            linear-gradient(rgba(255, 255, 255, 0.1), rgba(230, 242, 255, 0.15)),
            url('/Images/gallery/QE9A0402.png');
        background-size: cover;
        background-position: center;
        background-attachment: scroll;
        position: relative;
        overflow: hidden;
        margin: 0;
        padding: 60px 0 120px 0;
        border-top: none;
    }

    .countdown-section::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: radial-gradient(
            circle at 30% 70%,
            rgba(212, 175, 55, 0.1) 0%,
            transparent 50%
        );
        animation: pulseGlow 6s ease-in-out infinite;
        pointer-events: none;
    }

    @keyframes pulseGlow {
        0%, 100% { opacity: 0.4; transform: scale(1); }
        50% { opacity: 0.2; transform: scale(1.1); }
    }

    /* Additional Background Sections */
    .bg-couple-1 {
        background: 
            linear-gradient(rgba(255, 255, 255, 0.1), rgba(248, 249, 250, 0.15)),
            url('/Images/gallery/QE9A0357.png');
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
    }

    .bg-couple-2 {
        background: 
            linear-gradient(rgba(230, 242, 255, 0.1), rgba(212, 175, 55, 0.05)),
            url('/Images/gallery/QE9A0385.png');
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
    }

    .bg-couple-3 {
        background: 
            linear-gradient(rgba(255, 255, 255, 0.1), rgba(230, 242, 255, 0.15)),
            url('/Images/gallery/QE9A0397.png');
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
    }

    /* New Background Sections for Additional Couple Photos */
    .bg-couple-4 {
        background: 
            linear-gradient(rgba(255, 255, 255, 0.1), rgba(248, 249, 250, 0.15)),
            url('/Images/gallery/QE9A0356.png');
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
    }

    .bg-couple-5 {
        background: 
            linear-gradient(rgba(230, 242, 255, 0.1), rgba(212, 175, 55, 0.05)),
            url('/Images/gallery/QE9A0510.png');
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
    }

    .bg-couple-6 {
        background: 
            linear-gradient(rgba(255, 255, 255, 0.1), rgba(230, 242, 255, 0.15)),
            url('/Images/gallery/QE9A0515.png');
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
    }

    /* Ceremony Details */
    .ceremony-details {
        margin: 3rem 0;
        text-align: center;
    }

    .ceremony-announcement {
        margin-bottom: 2.5rem;
    }

    .ceremony-text {
        font-family: var(--font-display);
        font-size: 1.35rem;
        line-height: 1.8;
        color: var(--color-dark-gray);
        font-style: italic;
        max-width: 750px;
        margin: 0 auto;
        font-weight: 500;
        text-align: center;
    }

    .ceremony-blessing {
        background: 
            linear-gradient(135deg, rgba(230, 242, 255, 0.6) 0%, rgba(212, 175, 55, 0.08) 100%),
            url("data:image/svg+xml,%3Csvg width='40' height='40' viewBox='0 0 40 40' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='%23d4af37' fill-opacity='0.04'%3E%3Cpath d='M20 20c0-5.5-4.5-10-10-10s-10 4.5-10 10 4.5 10 10 10 10-4.5 10-10zm10-10c0 5.5 4.5 10 10 10s10-4.5 10-10-4.5-10-10-10-10 4.5-10 10z'/%3E%3C/g%3E%3C/svg%3E");
        border: 2px solid rgba(212, 175, 55, 0.3);
        border-radius: 16px;
        padding: 2rem;
        max-width: 600px;
        margin: 0 auto;
        position: relative;
        box-shadow: 
            0 8px 32px rgba(212, 175, 55, 0.1),
            inset 0 1px 0 rgba(255, 255, 255, 0.5);
    }

    .ceremony-blessing::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 3px;
        background: linear-gradient(90deg, 
            transparent, 
            var(--color-gold), 
            transparent);
        border-radius: 16px 16px 0 0;
    }

    .blessing-icon {
        width: 50px;
        height: 50px;
        background: linear-gradient(135deg, var(--color-gold), #FFD700);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1rem;
        color: var(--color-white);
        font-size: 1.2rem;
    }

    .blessing-text {
        font-family: var(--font-display);
        font-size: 1.3rem;
        line-height: 1.7;
        color: var(--color-dark-gray);
        font-style: italic;
        margin-bottom: 0.5rem;
        font-weight: 600;
        text-align: center;
    }

    .blessing-reference {
        font-size: 0.95rem;
        color: var(--color-gold);
        font-weight: 600;
        letter-spacing: 1px;
        margin: 0;
    }

    /* Enhanced Invitation Details */
    .invitation-details-enhanced {
        margin: 3rem 0;
    }

    /* Ceremony Information Section */
    .ceremony-info-section {
        margin-bottom: 4rem;
    }

    .ceremony-header {
        text-align: center;
        margin-bottom: 2.5rem;
    }

    .ceremony-icon-wrapper {
        width: 80px;
        height: 80px;
        background: linear-gradient(135deg, var(--color-gold), #FFD700);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1.5rem;
        color: var(--color-white);
        font-size: 2rem;
        box-shadow: 0 8px 25px rgba(212, 175, 55, 0.3);
    }

    .ceremony-title {
        font-size: 2rem;
        color: var(--color-dark-gray);
        margin-bottom: 0.5rem;
        font-weight: 700;
    }

    .ceremony-subtitle {
        font-size: 1.1rem;
        color: var(--color-dark-gray);
        opacity: 0.8;
        font-style: italic;
        margin: 0;
    }

    .ceremony-details-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 2rem;
        max-width: 800px;
        margin: 0 auto;
    }

    .detail-card {
        background: 
            linear-gradient(135deg, rgba(255, 255, 255, 0.9) 0%, rgba(230, 242, 255, 0.6) 100%),
            url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='%23d4af37' fill-opacity='0.02'%3E%3Ccircle cx='15' cy='15' r='3'/%3E%3Ccircle cx='5' cy='5' r='2'/%3E%3Ccircle cx='25' cy='5' r='2'/%3E%3Ccircle cx='5' cy='25' r='2'/%3E%3Ccircle cx='25' cy='25' r='2'/%3E%3C/g%3E%3C/svg%3E");
        border: 2px solid rgba(212, 175, 55, 0.2);
        border-radius: 16px;
        padding: 2rem;
        display: flex;
        align-items: flex-start;
        gap: 1.5rem;
        transition: all 0.4s ease;
        box-shadow: 
            0 8px 25px rgba(0, 0, 0, 0.06),
            0 3px 10px rgba(212, 175, 55, 0.08);
        position: relative;
        overflow: hidden;
    }

    .detail-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 2px;
        background: linear-gradient(90deg, 
            transparent, 
            rgba(212, 175, 55, 0.5), 
            transparent);
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .detail-card:hover {
        transform: translateY(-4px);
        box-shadow: 
            0 12px 30px rgba(0, 0, 0, 0.1),
            0 6px 15px rgba(212, 175, 55, 0.08);
        border-color: rgba(212, 175, 55, 0.4);
    }

    .detail-card:hover::before {
        opacity: 0.6;
    }

    .detail-card-icon {
        width: 60px;
        height: 60px;
        background: var(--color-white);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--color-gold);
        font-size: 1.5rem;
        flex-shrink: 0;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }

    .detail-card-content {
        flex: 1;
    }

    .detail-label {
        font-size: 0.9rem;
        color: var(--color-gold);
        text-transform: uppercase;
        letter-spacing: 2px;
        margin: 0 0 0.75rem 0;
        font-weight: 600;
    }

    .detail-value-primary {
        font-size: 1.5rem;
        color: var(--color-dark-gray);
        font-weight: 700;
        margin: 0 0 0.25rem 0;
        line-height: 1.2;
    }

    .detail-value-secondary {
        font-size: 1.1rem;
        color: var(--color-dark-gray);
        font-weight: 500;
        margin: 0 0 0.5rem 0;
        opacity: 0.9;
    }

    .detail-note {
        font-size: 0.9rem;
        color: var(--color-dark-gray);
        opacity: 0.7;
        font-style: italic;
        margin: 0;
    }

    /* Venue Information Section */
    .venue-info-section {
        margin-bottom: 4rem;
    }

    .venue-header {
        text-align: center;
        margin-bottom: 2rem;
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 1rem;
    }

    .venue-icon-elegant {
        width: 70px;
        height: 70px;
        background: linear-gradient(135deg, var(--color-gold), #FFD700);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--color-white);
        font-size: 1.8rem;
    }

    .venue-title {
        font-size: 1.8rem;
        color: var(--color-dark-gray);
        margin: 0;
        font-weight: 700;
    }

    .venue-details-card {
        background: 
            linear-gradient(rgba(0, 0, 0, 0.1), rgba(0, 0, 0, 0.15)),
            url('/Images/venue/noora-resort-exterior.jpg');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        border: 3px solid transparent;
        background-clip: padding-box;
        border-radius: 20px;
        padding: 3rem;
        text-align: center;
        max-width: 800px;
        margin: 0 auto;
        position: relative;
        overflow: hidden;
        box-shadow: 
            0 20px 60px rgba(0, 0, 0, 0.15),
            0 8px 25px rgba(212, 175, 55, 0.1),
            inset 0 1px 0 rgba(255, 255, 255, 0.9);
    }

    .venue-details-card::before {
        content: '';
        position: absolute;
        top: -3px;
        left: -3px;
        right: -3px;
        bottom: -3px;
        background: linear-gradient(45deg, 
            rgba(212, 175, 55, 0.8), 
            rgba(255, 215, 0, 0.6), 
            rgba(230, 242, 255, 0.4), 
            rgba(212, 175, 55, 0.8));
        border-radius: 23px;
        z-index: -1;
    }

    .venue-details-card::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: 
            radial-gradient(circle at 20% 20%, rgba(212, 175, 55, 0.05) 0%, transparent 50%),
            radial-gradient(circle at 80% 80%, rgba(230, 242, 255, 0.1) 0%, transparent 50%);
        pointer-events: none;
    }

    .venue-details-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, var(--color-gold), #FFD700);
    }

    .venue-name-elegant {
        font-family: var(--font-display);
        font-size: 3rem;
        font-weight: 800;
        color: var(--color-white);
        margin-bottom: 1.5rem;
        letter-spacing: -0.5px;
        text-shadow: 0 6px 12px rgba(0, 0, 0, 0.8), 0 3px 6px rgba(0, 0, 0, 0.6), 0 1px 3px rgba(0, 0, 0, 0.4);
        background: rgba(0, 0, 0, 0.5);
        padding: 1rem 2rem;
        border-radius: 12px;
        backdrop-filter: blur(15px);
        display: inline-block;
        border: 1px solid rgba(255, 255, 255, 0.1);
    }

    .venue-address {
        margin-bottom: 2rem;
        background: rgba(255, 255, 255, 0.95);
        padding: 1.5rem;
        border-radius: 12px;
        backdrop-filter: blur(15px);
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
    }

    .address-line {
        font-family: var(--font-primary);
        font-size: 1.3rem;
        color: var(--color-dark-gray);
        margin: 0.25rem 0;
        font-weight: 600;
    }

    .venue-description {
        margin-bottom: 2rem;
        background: transparent;
        padding: 2rem;
        border-radius: 12px;
    }

    .venue-description p {
        font-family: var(--font-primary);
        font-size: 1.2rem;
        line-height: 1.8;
        color: var(--color-white);
        margin: 0;
        font-weight: 600;
        text-shadow: 0 4px 8px rgba(0, 0, 0, 0.9), 0 2px 4px rgba(0, 0, 0, 0.7), 0 1px 2px rgba(0, 0, 0, 0.5);
        text-align: center;
        background: rgba(0, 0, 0, 0.3);
        padding: 1.5rem;
        border-radius: 10px;
        backdrop-filter: blur(10px);
    }

    .venue-amenities {
        display: flex;
        justify-content: center;
        gap: 2rem;
        flex-wrap: wrap;
        background: transparent;
        padding: 1.5rem;
        border-radius: 12px;
    }

    .amenity-item {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        color: var(--color-white);
        font-size: 1rem;
        font-weight: 700;
        text-shadow: 0 3px 6px rgba(0, 0, 0, 0.8), 0 2px 4px rgba(0, 0, 0, 0.6), 0 1px 2px rgba(0, 0, 0, 0.4);
        background: rgba(0, 0, 0, 0.3);
        padding: 0.75rem 1rem;
        border-radius: 8px;
        backdrop-filter: blur(8px);
    }

    .amenity-item i {
        color: var(--color-gold);
        font-size: 1.2rem;
        filter: drop-shadow(0 2px 4px rgba(0, 0, 0, 0.5));
    }

    /* Reception Information Section */
    .reception-info-section {
        margin-bottom: 4rem;
    }

    .reception-header {
        text-align: center;
        margin-bottom: 2.5rem;
    }

    .reception-ornament {
        color: var(--color-gold);
        font-size: 1.5rem;
        margin-bottom: 1rem;
        letter-spacing: 0.5rem;
    }

    .reception-title {
        font-size: 1.8rem;
        color: var(--color-dark-gray);
        margin-bottom: 0.5rem;
        font-weight: 700;
    }

    .reception-subtitle {
        font-size: 1.1rem;
        color: var(--color-dark-gray);
        opacity: 0.8;
        font-style: italic;
        margin: 0;
    }

    .reception-details {
        max-width: 800px;
        margin: 0 auto;
    }

    .reception-description {
        font-size: 1.2rem;
        line-height: 1.7;
        color: var(--color-dark-gray);
        text-align: center;
        margin-bottom: 3rem;
        opacity: 0.9;
    }

    .reception-timeline {
        background: 
            linear-gradient(135deg, rgba(255, 255, 255, 0.95) 0%, rgba(230, 242, 255, 0.5) 50%, rgba(212, 175, 55, 0.05) 100%),
            url("data:image/svg+xml,%3Csvg width='50' height='50' viewBox='0 0 50 50' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='%23d4af37' fill-opacity='0.02'%3E%3Cpath d='M25 25m-8 0a8 8 0 1 1 16 0a8 8 0 1 1-16 0'/%3E%3Cpath d='M25 25m-16 0a16 16 0 1 1 32 0a16 16 0 1 1-32 0'/%3E%3C/g%3E%3C/svg%3E");
        border: 2px solid rgba(212, 175, 55, 0.3);
        border-radius: 16px;
        padding: 2rem;
        box-shadow: 
            0 10px 30px rgba(0, 0, 0, 0.08),
            inset 0 1px 0 rgba(255, 255, 255, 0.7);
        position: relative;
    }

    .reception-timeline::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 3px;
        background: linear-gradient(90deg, 
            var(--color-gold), 
            #FFD700, 
            var(--color-gold));
        border-radius: 16px 16px 0 0;
    }

    .timeline-item {
        display: flex;
        align-items: center;
        gap: 2rem;
        padding: 1rem 0;
        border-bottom: 1px solid rgba(212, 175, 55, 0.1);
    }

    .timeline-item:last-child {
        border-bottom: none;
    }

    .timeline-time {
        font-size: 1.1rem;
        font-weight: 700;
        color: var(--color-gold);
        min-width: 100px;
        flex-shrink: 0;
    }

    .timeline-event {
        font-size: 1.1rem;
        color: var(--color-dark-gray);
        font-weight: 500;
    }

    /* Special Notes Section */
    .special-notes-section {
        margin-bottom: 3rem;
    }

    .notes-header {
        text-align: center;
        margin-bottom: 2.5rem;
    }

    .notes-title {
        font-size: 1.6rem;
        color: var(--color-dark-gray);
        margin: 0;
        font-weight: 700;
    }

    .notes-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 2rem;
        max-width: 1000px;
        margin: 0 auto;
    }

    .note-card {
        background: 
            linear-gradient(135deg, rgba(255, 255, 255, 0.98) 0%, rgba(248, 249, 250, 0.95) 100%),
            url("data:image/svg+xml,%3Csvg width='40' height='40' viewBox='0 0 40 40' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='%23d4af37' fill-opacity='0.015'%3E%3Cpath d='M20 20c5.523 0 10-4.477 10-10S25.523 0 20 0 10 4.477 10 10s4.477 10 10 10zm0 10c5.523 0 10-4.477 10-10s-4.477-10-10-10-10 4.477-10 10 4.477 10 10 10z'/%3E%3C/g%3E%3C/svg%3E");
        border: 2px solid rgba(212, 175, 55, 0.2);
        border-radius: 16px;
        padding: 2rem;
        text-align: center;
        transition: all 0.4s ease;
        box-shadow: 
            0 6px 20px rgba(0, 0, 0, 0.08),
            0 2px 8px rgba(212, 175, 55, 0.06);
        position: relative;
        overflow: hidden;
    }

    .note-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 2px;
        background: linear-gradient(90deg, 
            transparent, 
            rgba(212, 175, 55, 0.4), 
            transparent);
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .note-card:hover {
        transform: translateY(-4px);
        box-shadow: 
            0 10px 25px rgba(0, 0, 0, 0.08),
            0 4px 12px rgba(212, 175, 55, 0.06);
        border-color: rgba(212, 175, 55, 0.3);
    }

    .note-card:hover::before {
        opacity: 0.5;
    }

    .note-icon {
        width: 60px;
        height: 60px;
        background: linear-gradient(135deg, var(--color-gold), #FFD700);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1.5rem;
        color: var(--color-white);
        font-size: 1.4rem;
    }

    .note-card h5 {
        font-size: 1.3rem;
        color: var(--color-dark-gray);
        margin: 0 0 1rem 0;
        font-weight: 600;
    }

    .note-card p {
        font-size: 1rem;
        line-height: 1.6;
        color: var(--color-dark-gray);
        opacity: 0.9;
        margin: 0;
    }

    /* Language Toggle */
    .language-toggle {
        position: relative;
        display: inline-flex;
        background: var(--color-white);
        border-radius: 50px;
        padding: 4px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        border: 1px solid rgba(212, 175, 55, 0.3);
        margin: 2rem auto;
    }

    .language-toggle input[type="radio"] {
        display: none;
    }

    .language-toggle .lang-label {
        padding: 12px 30px;
        cursor: pointer;
        border-radius: 25px;
        font-weight: 500;
        color: var(--color-dark-gray);
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        gap: 8px;
        z-index: 1;
    }

    .language-toggle .lang-label i {
        color: var(--color-gold);
    }

    .language-toggle input[type="radio"]:checked + .lang-label {
        color: var(--color-white);
        background: linear-gradient(135deg, var(--color-gold), #FFD700);
    }

    .language-toggle input[type="radio"]:checked + .lang-label i {
        color: var(--color-white);
    }

    .language-slider {
        position: absolute;
        top: 4px;
        bottom: 4px;
        left: 4px;
        width: calc(50% - 4px);
        background: linear-gradient(135deg, var(--color-gold), #FFD700);
        border-radius: 25px;
        transition: transform 0.3s ease;
        z-index: 0;
    }

    #lang-am:checked ~ .language-slider {
        transform: translateX(100%);
    }

    /* Invitation Card */
    .invitation-card-wrapper {
        position: relative;
        max-width: 1000px;
        margin: 0 auto;
    }

    .invitation-card {
        background: 
            linear-gradient(135deg, rgba(255, 255, 255, 0.98) 0%, rgba(248, 249, 250, 0.99) 100%),
            url("data:image/svg+xml,%3Csvg width='100' height='100' viewBox='0 0 100 100' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='%23d4af37' fill-opacity='0.02'%3E%3Cpath d='M50 50c13.807 0 25-11.193 25-25S63.807 0 50 0 25 11.193 25 25s11.193 25 25 25zm0 25c13.807 0 25-11.193 25-25S63.807 50 50 50s-25 11.193-25 25 11.193 25 25 25z'/%3E%3C/g%3E%3C/svg%3E");
        border-radius: 24px;
        padding: 4rem;
        box-shadow: 
            0 25px 80px rgba(0, 0, 0, 0.15),
            0 10px 40px rgba(212, 175, 55, 0.12),
            inset 0 1px 0 rgba(255, 255, 255, 0.9);
        position: relative;
        overflow: hidden;
        border: 2px solid transparent;
        background-clip: padding-box;
        transition: all 0.4s ease;
        backdrop-filter: blur(20px);
    }

    .invitation-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(45deg, 
            transparent 30%, 
            rgba(212, 175, 55, 0.03) 50%, 
            transparent 70%);
        pointer-events: none;
    }

    .invitation-card::after {
        content: '';
        position: absolute;
        top: -2px;
        left: -2px;
        right: -2px;
        bottom: -2px;
        background: linear-gradient(45deg, 
            var(--color-gold), 
            #FFD700, 
            var(--color-light-blue), 
            var(--color-gold));
        border-radius: 26px;
        z-index: -1;
        opacity: 0;
        transition: opacity 0.4s ease;
    }

    .invitation-card:hover {
        transform: translateY(-8px);
        box-shadow: 
            0 35px 100px rgba(0, 0, 0, 0.15),
            0 15px 50px rgba(212, 175, 55, 0.12),
            inset 0 1px 0 rgba(255, 255, 255, 1);
    }

    .invitation-card:hover::after {
        opacity: 1;
    }

    .card-border-glow {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        border-radius: 24px;
        background: linear-gradient(45deg, transparent, rgba(212, 175, 55, 0.1), transparent);
        opacity: 0;
        transition: opacity 0.3s ease;
        pointer-events: none;
    }

    .invitation-card:hover .card-border-glow {
        opacity: 1;
    }

    .card-decoration {
        position: absolute;
        width: 40px;
        height: 40px;
        background: transparent;
        border: 2px solid rgba(212, 175, 55, 0.3);
    }

    .corner-top-left {
        top: 20px;
        left: 20px;
        border-right: none;
        border-bottom: none;
        border-top-left-radius: 8px;
    }

    .corner-top-right {
        top: 20px;
        right: 20px;
        border-left: none;
        border-bottom: none;
        border-top-right-radius: 8px;
    }

    .corner-bottom-left {
        bottom: 20px;
        left: 20px;
        border-right: none;
        border-top: none;
        border-bottom-left-radius: 8px;
    }

    .corner-bottom-right {
        bottom: 20px;
        right: 20px;
        border-left: none;
        border-top: none;
        border-bottom-right-radius: 8px;
    }

    .card-header {
        text-align: center;
        margin-bottom: 3rem;
    }

    .card-icon-shimmer {
        width: 80px;
        height: 80px;
        background: linear-gradient(135deg, var(--color-gold), #FFD700);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1.5rem;
        position: relative;
        overflow: hidden;
    }

    .card-icon-shimmer:after {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: 
            linear-gradient(45deg, transparent, rgba(255, 255, 255, 0.4), transparent),
            radial-gradient(circle, rgba(255, 255, 255, 0.2) 0%, transparent 70%);
        transform: rotate(30deg);
        animation: shimmer 4s infinite;
    }

    @keyframes shimmer {
        0% { 
            transform: translateX(-100%) rotate(30deg); 
            opacity: 0;
        }
        50% { 
            opacity: 1;
        }
        100% { 
            transform: translateX(100%) rotate(30deg); 
            opacity: 0;
        }
    }

    .card-icon {
        font-size: 2.5rem;
        color: var(--color-white);
        z-index: 1;
    }

    .card-title {
        font-size: 2.5rem;
        margin-bottom: 0.5rem;
        background: linear-gradient(135deg, var(--color-gold), #FFD700);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .card-subtitle {
        color: var(--color-dark-gray);
        font-size: 1.1rem;
        opacity: 0.8;
    }

    /* ========== SYMMETRICAL COUPLE NAMES ========== */
    .couple-names-wrapper {
        margin: 3rem 0;
        position: relative;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .name-line {
        height: 1px;
        width: 90%;
        max-width: 800px;
        background: linear-gradient(90deg, 
            transparent, 
            rgba(212, 175, 55, 0.3), 
            var(--color-gold), 
            rgba(212, 175, 55, 0.3), 
            transparent);
        margin: 1rem 0;
    }

    .couple-names {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 2.5rem;
        width: 100%;
        max-width: 900px;
        margin: 0 auto;
        position: relative;
    }

    /* Name Containers - Perfect Symmetry */
    .name-container {
        flex: 0 0 300px;
        text-align: center;
        position: relative;
        padding: 2rem;
        border-radius: 20px;
        background: linear-gradient(145deg, rgba(255, 255, 255, 0.95), rgba(248, 249, 250, 0.95));
        box-shadow: 
            0 10px 30px rgba(0, 0, 0, 0.05),
            inset 0 1px 0 rgba(255, 255, 255, 0.8);
        transition: all 0.4s ease;
        height: 250px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    .name-container:hover {
        transform: translateY(-5px);
        box-shadow: 
            0 15px 40px rgba(0, 0, 0, 0.1),
            inset 0 1px 0 rgba(255, 255, 255, 0.9);
        border: 1px solid rgba(212, 175, 55, 0.2);
    }

    .name-container::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 3px;
        background: linear-gradient(90deg, var(--color-gold), #FFD700);
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .name-container:hover::before {
        opacity: 1;
    }

    /* Title Styles */
    .name-title {
        font-size: 1.1rem;
        color: var(--color-gold);
        margin-bottom: 0.75rem;
        font-weight: 600;
        letter-spacing: 2px;
        text-transform: uppercase;
        position: relative;
        display: inline-block;
    }

    .name-title::after {
        content: '';
        position: absolute;
        bottom: -4px;
        left: 25%;
        width: 50%;
        height: 1px;
        background: linear-gradient(90deg, transparent, rgba(212, 175, 55, 0.5), transparent);
    }

    /* Name Text - Professional Typography */
    .name-text {
        display: block;
        width: 100%;
    }

    .first-name {
        font-size: 2.8rem;
        font-weight: 800;
        color: var(--color-dark-gray);
        margin-bottom: 0.25rem;
        line-height: 1.1;
        letter-spacing: 0.5px;
    }

    .last-name {
        font-size: 2.2rem;
        font-weight: 600;
        color: var(--color-dark-gray);
        opacity: 0.9;
        letter-spacing: 0.5px;
        line-height: 1.1;
    }

    /* Professional Name Connector */
    .name-connector {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 1rem;
        position: relative;
        z-index: 3;
        flex: 0 0 auto;
        width: 120px;
    }

    .connector-line {
        width: 40px;
        height: 2px;
        background: linear-gradient(90deg, 
            rgba(212, 175, 55, 0.4), 
            var(--color-gold), 
            rgba(212, 175, 55, 0.4));
        position: relative;
        overflow: hidden;
    }

    .connector-line::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.8), transparent);
        animation: connectorShine 2s infinite;
    }

    @keyframes connectorShine {
        0% { left: -100%; }
        100% { left: 100%; }
    }

    .connector-heart {
        width: 50px;
        height: 50px;
        background: linear-gradient(135deg, var(--color-gold), #FFD700);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--color-white);
        font-size: 1.3rem;
        animation: heartbeat 1.5s infinite ease-in-out;
        box-shadow: 
            0 5px 15px rgba(212, 175, 55, 0.3);
        flex-shrink: 0;
    }

    /* ========== COUPLE NAMES IN INVITATION CARDS ========== */
    /* English Version */
    #invitation-en .name-container {
        text-align: center;
        padding: 2.5rem;
    }

    #invitation-en .first-name {
        font-size: 3rem;
        font-weight: 800;
        margin-bottom: 0.3rem;
    }

    #invitation-en .last-name {
        font-size: 2.4rem;
        font-weight: 600;
    }

    #invitation-en .name-title {
        font-size: 1.2rem;
        letter-spacing: 3px;
        margin-bottom: 1rem;
    }

    /* Amharic Version */
    #invitation-am .name-container {
        text-align: center;
        padding: 2.5rem;
    }

    #invitation-am .first-name {
        font-size: 3rem;
        font-weight: 800;
        margin-bottom: 0.3rem;
        font-family: 'Noto Sans Ethiopic', 'Abyssinica SIL', sans-serif;
    }

    #invitation-am .last-name {
        font-size: 2.4rem;
        font-weight: 600;
        font-family: 'Noto Sans Ethiopic', 'Abyssinica SIL', sans-serif;
    }

    #invitation-am .name-title {
        font-size: 1.3rem;
        letter-spacing: 1px;
        margin-bottom: 1rem;
        font-family: 'Noto Sans Ethiopic', 'Abyssinica SIL', sans-serif;
        text-transform: none;
    }

    /* Invitation Details */
    .invitation-details {
        margin: 3rem 0;
    }

    .detail-item {
        text-align: center;
        margin-bottom: 2rem;
    }

    .detail-icon {
        font-size: 2.5rem;
        color: var(--color-gold);
        margin-bottom: 1rem;
    }

    .detail-text {
        font-size: 1.1rem;
        color: var(--color-dark-gray);
        line-height: 1.6;
    }

    .datetime-wrapper {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 2rem;
        margin: 2rem 0;
    }

    .datetime-item {
        display: flex;
        align-items: center;
        gap: 1rem;
        background: rgba(230, 242, 255, 0.3);
        border: 1px solid rgba(212, 175, 55, 0.2);
        border-radius: 12px;
        padding: 1.5rem;
        transition: all 0.3s ease;
    }

    .datetime-item:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 25px rgba(212, 175, 55, 0.1);
        border-color: var(--color-gold);
    }

    .datetime-icon {
        width: 50px;
        height: 50px;
        background: linear-gradient(135deg, var(--color-gold), #FFD700);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--color-white);
        font-size: 1.2rem;
    }

    .datetime-content {
        flex: 1;
    }

    .datetime-label {
        font-size: 0.9rem;
        color: var(--color-dark-gray);
        text-transform: uppercase;
        letter-spacing: 1px;
        margin-bottom: 0.25rem;
    }

    .datetime-value {
        font-size: 1.2rem;
        font-weight: 600;
        color: var(--color-dark-gray);
    }

    .venue-wrapper {
        background: linear-gradient(135deg, rgba(230, 242, 255, 0.6), rgba(212, 175, 55, 0.1));
        border: 1px solid rgba(212, 175, 55, 0.3);
        border-radius: 16px;
        padding: 2rem;
        display: flex;
        align-items: center;
        gap: 1.5rem;
        margin: 2rem 0;
        position: relative;
        overflow: hidden;
    }

    .venue-wrapper:before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, var(--color-gold), #FFD700);
    }

    .venue-icon {
        width: 60px;
        height: 60px;
        background: var(--color-white);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--color-gold);
        font-size: 1.5rem;
        flex-shrink: 0;
    }

    .venue-content {
        flex: 1;
    }

    .venue-label {
        font-size: 0.9rem;
        color: var(--color-dark-gray);
        text-transform: uppercase;
        letter-spacing: 1px;
        margin-bottom: 0.5rem;
    }

    .venue-name {
        font-size: 1.5rem;
        font-weight: 700;
        color: var(--color-dark-gray);
        margin-bottom: 0.25rem;
    }

    .venue-location {
        font-size: 1.1rem;
        color: var(--color-dark-gray);
        opacity: 0.8;
    }

    /* Interactive Map */
    .interactive-map-wrapper {
        margin: 3rem 0;
    }

    .map-header {
        display: flex;
        align-items: center;
        gap: 1rem;
        margin-bottom: 1.5rem;
    }

    .map-header i {
        font-size: 1.5rem;
        color: var(--color-gold);
    }

    .map-header h4 {
        font-size: 1.5rem;
        color: var(--color-dark-gray);
        margin: 0;
    }

    .map-badge {
        background: linear-gradient(135deg, var(--color-gold), #FFD700);
        color: var(--color-white);
        padding: 0.25rem 1rem;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: 500;
        margin-left: auto;
    }

    .map-container {
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
        border: 1px solid rgba(212, 175, 55, 0.2);
    }

    .map-frame-wrapper {
        position: relative;
        height: 400px;
    }

    .map-overlay-gradient {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(to bottom, transparent, rgba(212, 175, 55, 0.05));
        pointer-events: none;
        z-index: 1;
    }

    .map-frame-border {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        border: 2px solid transparent;
        background: linear-gradient(45deg, var(--color-gold), #FFD700) border-box;
        -webkit-mask: linear-gradient(#fff 0 0) padding-box, linear-gradient(#fff 0 0);
        -webkit-mask-composite: destination-out;
        mask-composite: exclude;
        pointer-events: none;
        z-index: 1;
    }

    .map-iframe {
        width: 100%;
        height: 100%;
        border: none;
    }

    .map-controls {
        position: absolute;
        bottom: 20px;
        left: 50%;
        transform: translateX(-50%);
        display: flex;
        gap: 1rem;
        z-index: 2;
    }

    .map-btn {
        padding: 0.75rem 1.5rem;
        background: var(--color-white);
        border: 2px solid var(--color-gold);
        color: var(--color-gold);
        border-radius: 50px;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        gap: 0.5rem;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }

    .map-btn:hover {
        background: var(--color-gold);
        color: var(--color-white);
        transform: translateY(-2px);
    }

    .map-info-panel {
        display: flex;
        justify-content: space-between;
        background: rgba(230, 242, 255, 0.5);
        padding: 1rem 1.5rem;
        border-top: 1px solid rgba(212, 175, 55, 0.2);
    }

    .map-info-item {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        color: var(--color-dark-gray);
        font-size: 0.9rem;
    }

    .map-info-item i {
        color: var(--color-gold);
    }

    /* Dress Code & RSVP */
    .invitation-footer {
        margin-top: 3rem;
        padding-top: 2rem;
        border-top: 1px solid rgba(212, 175, 55, 0.2);
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 2rem;
    }

    .dress-code {
        background: rgba(230, 242, 255, 0.3);
        border: 1px solid rgba(212, 175, 55, 0.2);
        border-radius: 12px;
        padding: 1.5rem;
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .dress-code i {
        font-size: 1.5rem;
        color: var(--color-gold);
    }

    .dress-code-content h5 {
        margin: 0 0 0.5rem 0;
        color: var(--color-dark-gray);
        font-size: 1.1rem;
    }

    .dress-code-content p {
        margin: 0;
        color: var(--color-dark-gray);
        opacity: 0.8;
    }

    .rsvp-note {
        background: linear-gradient(135deg, rgba(212, 175, 55, 0.1), rgba(230, 242, 255, 0.3));
        border: 1px solid rgba(212, 175, 55, 0.3);
        border-radius: 12px;
        padding: 1.5rem;
    }

    .rsvp-note i {
        color: var(--color-gold);
        margin-right: 0.5rem;
    }

    .rsvp-note h5 {
        margin: 0 0 0.5rem 0;
        color: var(--color-dark-gray);
        font-size: 1.1rem;
    }

    .rsvp-note p {
        margin: 0;
        color: var(--color-dark-gray);
        opacity: 0.8;
        font-size: 0.95rem;
    }

    /* Share Link */
    .share-link {
        grid-column: 1 / -1;
        margin-top: 2rem;
        padding-top: 2rem;
        border-top: 1px solid rgba(212, 175, 55, 0.2);
    }

    .link-box {
        display: flex;
        align-items: center;
        background: rgba(230, 242, 255, 0.5);
        border: 1px solid rgba(212, 175, 55, 0.3);
        border-radius: 12px;
        padding: 1rem;
        margin-top: 1rem;
    }

    .link-box code {
        flex: 1;
        font-family: 'Courier New', monospace;
        font-size: 0.9rem;
        color: var(--color-dark-gray);
        word-break: break-all;
        padding: 0.5rem;
        background: rgba(255, 255, 255, 0.5);
        border-radius: 6px;
        border: 1px solid rgba(212, 175, 55, 0.2);
    }

    .copy-btn {
        background: linear-gradient(135deg, var(--color-gold), #FFD700);
        color: var(--color-white);
        border: none;
        padding: 0.75rem 1.5rem;
        border-radius: 8px;
        cursor: pointer;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        gap: 0.5rem;
        font-weight: 500;
        margin-left: 1rem;
    }

    .copy-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(212, 175, 55, 0.3);
    }

    /* Guest Information */
    .guest-info {
        max-width: 600px;
        margin: 3rem auto 0;
        display: flex;
        justify-content: space-between;
        background: var(--color-white);
        padding: 1.5rem;
        border-radius: 16px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
        border: 1px solid rgba(212, 175, 55, 0.2);
        flex-wrap: wrap;
        gap: 1rem;
    }

    .guest-count,
    .guest-status {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        color: var(--color-dark-gray);
        padding: 0.5rem 1rem;
        border-radius: 8px;
        background: rgba(230, 242, 255, 0.3);
    }

    .guest-count i {
        color: var(--color-gold);
        font-size: 1.2rem;
    }

    .guest-status i {
        font-size: 1.2rem;
    }

    .guest-status .accepted { color: #4CAF50; }
    .guest-status .declined { color: #f44336; }
    .guest-status .pending { color: #FF9800; }

    /* Language Content */
    .lang-content {
        display: none;
        animation: fadeIn 0.5s ease;
    }

    .lang-content.active {
        display: block;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }

    /* Animation Classes */
    .animate-fade-in-up {
        opacity: 0;
        transform: translateY(20px);
        animation: fadeInUp 0.6s ease forwards;
    }

    @keyframes fadeInUp {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .opacity-0 { opacity: 0; }
    .opacity-100 { opacity: 1; }
    .translate-y-4 { transform: translateY(1rem); }
    .translate-y-0 { transform: translateY(0); }

    /* Responsive styles */
    @media (max-width: 1200px) {
        .couple-names {
            gap: 2rem;
            max-width: 850px;
        }
        
        .name-container {
            flex: 0 0 280px;
            height: 240px;
            padding: 1.8rem;
        }
        
        .first-name {
            font-size: 2.6rem;
        }
        
        .last-name {
            font-size: 2.1rem;
        }
        
        .name-connector {
            width: 100px;
        }
    }

    @media (max-width: 992px) {
        .couple-names {
            flex-direction: column;
            gap: 2.5rem;
            max-width: 500px;
        }
        
        .name-container {
            flex: 0 0 auto;
            width: 100%;
            max-width: 400px;
            height: auto;
            min-height: 220px;
            padding: 2rem;
        }
        
        .name-connector {
            flex-direction: row;
            width: 100%;
            height: 60px;
            justify-content: center;
        }
        
        .connector-line {
            width: 1px;
            height: 40px;
            background: linear-gradient(180deg, 
                rgba(212, 175, 55, 0.4), 
                var(--color-gold), 
                rgba(212, 175, 55, 0.4));
        }
        
        .connector-heart {
            order: -1;
        }
    }

    @media (max-width: 768px) {
        .hero-section {
            background-attachment: scroll;
            min-height: 100vh;
            padding: 1rem;
        }
        
        .hero-content {
            padding: 1.5rem;
            max-width: 100%;
        }
        
        .hero-title {
            font-size: 3rem;
            line-height: 1.1;
        }
        
        .hero-subtitle {
            font-size: 1.3rem;
        }
        
        .hero-date {
            font-size: 1.4rem;
        }
        
        .countdown-container {
            gap: 0.75rem;
            flex-wrap: wrap;
            justify-content: center;
        }
        
        .countdown-item {
            min-width: 70px;
            padding: 0.75rem;
            flex: 1;
            max-width: 80px;
        }
        
        .countdown-number {
            font-size: 1.8rem;
        }
        
        .countdown-label {
            font-size: 0.8rem;
        }
        
        .orthodox-quote {
            font-size: 1.6rem;
            padding: 0 1rem;
            line-height: 1.6;
        }
        
        .orthodox-verse {
            font-size: 1.2rem;
        }
        
        .invitation-section {
            padding: 60px 0;
        }
        
        .invitation-card {
            padding: 2rem 1rem;
            margin: 0 0.5rem;
            border-radius: 16px;
        }
        
        .ceremony-details-grid {
            grid-template-columns: 1fr;
            gap: 1rem;
        }
        
        .detail-card {
            padding: 1.5rem;
            text-align: center;
        }
        
        .venue-details-card {
            padding: 2rem 1rem;
            margin: 0 0.5rem;
        }
        
        .venue-name-elegant {
            font-size: 2.2rem;
            padding: 0.75rem 1.5rem;
        }
        
        .first-name {
            font-size: 2.6rem;
        }
        
        .last-name {
            font-size: 2.1rem;
        }
        
        .datetime-wrapper {
            grid-template-columns: 1fr;
            gap: 1rem;
        }
        
        .datetime-item {
            padding: 1rem;
        }
        
        .map-controls {
            flex-direction: row;
            gap: 0.5rem;
            width: 95%;
        }
        
        .map-btn {
            flex: 1;
            justify-content: center;
            padding: 0.6rem 1rem;
            font-size: 0.9rem;
        }
        
        .map-info-panel {
            flex-direction: column;
            gap: 0.5rem;
            padding: 1rem;
        }
        
        .invitation-footer {
            grid-template-columns: 1fr;
            gap: 1.5rem;
        }
        
        .guest-info {
            flex-direction: column;
            align-items: center;
            text-align: center;
            margin: 2rem auto 0;
            padding: 1rem;
        }
        
        .language-toggle {
            width: 100%;
            max-width: 280px;
            margin: 1.5rem auto;
        }
        
        .lang-label {
            justify-content: center;
            padding: 0.75rem 1.5rem;
        }
    }

    @media (max-width: 480px) {
        .hero-section {
            padding: 0.5rem;
        }
        
        .hero-content {
            padding: 1rem;
        }
        
        .hero-title {
            font-size: 2.5rem;
        }
        
        .hero-subtitle {
            font-size: 1.1rem;
        }
        
        .hero-date {
            font-size: 1.2rem;
        }
        
        .countdown-container {
            gap: 0.5rem;
        }
        
        .countdown-item {
            min-width: 60px;
            padding: 0.5rem;
            max-width: 70px;
        }
        
        .countdown-number {
            font-size: 1.5rem;
        }
        
        .countdown-label {
            font-size: 0.7rem;
        }
        
        .text-4xl, .text-5xl {
            font-size: 1.75rem;
        }
        
        .invitation-card {
            padding: 1.5rem 0.75rem;
            margin: 0 0.25rem;
        }
        
        .card-title {
            font-size: 1.8rem;
        }
        
        .first-name {
            font-size: 2.2rem;
        }
        
        .last-name {
            font-size: 1.8rem;
        }
        
        .name-title-elegant {
            font-size: 1rem;
        }
        
        .venue-name-elegant {
            font-size: 1.8rem;
            padding: 0.5rem 1rem;
        }
        
        .venue-details-card {
            padding: 1.5rem 0.75rem;
        }
        
        .detail-card {
            padding: 1rem;
        }
        
        .detail-value-primary {
            font-size: 1.2rem;
        }
        
        .detail-value-secondary {
            font-size: 1rem;
        }
        
        .datetime-item {
            padding: 0.75rem;
        }
        
        .datetime-value {
            font-size: 1rem;
        }
        
        .map-frame-wrapper {
            height: 250px;
        }
        
        .map-controls {
            flex-direction: column;
            gap: 0.5rem;
            width: 90%;
        }
        
        .map-btn {
            width: 100%;
            padding: 0.75rem;
        }
        
        .orthodox-quote {
            font-size: 1.4rem;
        }
        
        .orthodox-verse {
            font-size: 1.1rem;
        }
    }

    /* ========== EXTENDED INVITATION STYLES ========== */
    .extended-invitation-details {
        margin-top: 3rem;
        padding-top: 2rem;
        border-top: 2px solid rgba(212, 175, 55, 0.2);
    }

    /* Wedding Schedule */
    .wedding-schedule {
        margin-bottom: 3rem;
    }

    .schedule-title {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        font-size: 1.5rem;
        color: var(--color-dark-gray);
        margin-bottom: 1.5rem;
        font-weight: 600;
    }

    .schedule-title i {
        color: var(--color-gold);
        font-size: 1.3rem;
    }

    .schedule-timeline {
        position: relative;
        padding-left: 2rem;
    }

    .schedule-timeline::before {
        content: '';
        position: absolute;
        left: 15px;
        top: 0;
        bottom: 0;
        width: 2px;
        background: linear-gradient(180deg, var(--color-gold), rgba(212, 175, 55, 0.3));
    }

    .schedule-item {
        position: relative;
        margin-bottom: 2rem;
        display: flex;
        align-items: flex-start;
        gap: 1.5rem;
    }

    .schedule-item::before {
        content: '';
        position: absolute;
        left: -25px;
        top: 8px;
        width: 12px;
        height: 12px;
        background: var(--color-gold);
        border-radius: 50%;
        border: 3px solid var(--color-white);
        box-shadow: 0 2px 8px rgba(212, 175, 55, 0.3);
    }

    .schedule-item.highlight::before {
        width: 16px;
        height: 16px;
        top: 6px;
        left: -27px;
        background: linear-gradient(135deg, var(--color-gold), #FFD700);
        animation: pulse 2s infinite;
    }

    .schedule-time {
        font-weight: 700;
        color: var(--color-gold);
        font-size: 1.1rem;
        min-width: 80px;
        flex-shrink: 0;
    }

    .schedule-content h5 {
        margin: 0 0 0.25rem 0;
        color: var(--color-dark-gray);
        font-size: 1.1rem;
        font-weight: 600;
    }

    .schedule-content p {
        margin: 0;
        color: var(--color-dark-gray);
        opacity: 0.8;
        font-size: 0.95rem;
        line-height: 1.4;
    }

    /* Interactive Calendar */
    .interactive-calendar {
        margin-bottom: 3rem;
    }

    .calendar-title {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        font-size: 1.5rem;
        color: var(--color-dark-gray);
        margin-bottom: 1.5rem;
        font-weight: 600;
    }

    .calendar-title i {
        color: var(--color-gold);
        font-size: 1.3rem;
    }

    .calendar-widget {
        background: rgba(230, 242, 255, 0.3);
        border: 1px solid rgba(212, 175, 55, 0.2);
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.05);
    }

    .calendar-header {
        background: linear-gradient(135deg, var(--color-gold), #FFD700);
        color: var(--color-white);
        padding: 1.5rem;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .calendar-nav {
        background: rgba(255, 255, 255, 0.2);
        border: none;
        color: var(--color-white);
        width: 40px;
        height: 40px;
        border-radius: 50%;
        cursor: pointer;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .calendar-nav:hover {
        background: rgba(255, 255, 255, 0.3);
        transform: scale(1.1);
    }

    .calendar-grid {
        padding: 1.5rem;
        background: var(--color-white);
    }

    .calendar-weekdays {
        display: grid;
        grid-template-columns: repeat(7, 1fr);
        gap: 0.5rem;
        margin-bottom: 1rem;
        text-align: center;
        font-weight: 600;
        color: var(--color-dark-gray);
        font-size: 0.9rem;
    }

    .calendar-days {
        display: grid;
        grid-template-columns: repeat(7, 1fr);
        gap: 0.5rem;
    }

    .calendar-day {
        aspect-ratio: 1;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 8px;
        cursor: pointer;
        transition: all 0.3s ease;
        font-weight: 500;
        position: relative;
    }

    .calendar-day:hover {
        background: rgba(212, 175, 55, 0.1);
        transform: scale(1.1);
    }

    .calendar-day.today {
        background: var(--color-gold);
        color: var(--color-white);
        font-weight: 700;
    }

    .calendar-day.wedding-day {
        background: linear-gradient(135deg, var(--color-gold), #FFD700);
        color: var(--color-white);
        font-weight: 700;
        animation: pulse 2s infinite;
    }

    .calendar-day.wedding-day::after {
        content: '💍';
        position: absolute;
        top: -5px;
        right: -5px;
        font-size: 10px;
    }

    .calendar-footer {
        padding: 1.5rem;
        background: rgba(230, 242, 255, 0.5);
        border-top: 1px solid rgba(212, 175, 55, 0.2);
        text-align: center;
    }

    .btn-calendar {
        background: linear-gradient(135deg, var(--color-gold), #FFD700);
        color: var(--color-white);
        border: none;
        padding: 0.75rem 2rem;
        border-radius: 50px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
    }

    .btn-calendar:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(212, 175, 55, 0.3);
    }

    /* Wedding Information Cards */
    .wedding-info-cards {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 1.5rem;
        margin-bottom: 3rem;
    }

    .info-card {
        background: var(--color-white);
        border: 1px solid rgba(212, 175, 55, 0.2);
        border-radius: 16px;
        padding: 1.5rem;
        text-align: center;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
    }

    .info-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        border-color: var(--color-gold);
    }

    .info-icon {
        width: 60px;
        height: 60px;
        background: linear-gradient(135deg, var(--color-gold), #FFD700);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1rem;
        color: var(--color-white);
        font-size: 1.5rem;
    }

    .info-card h5 {
        margin: 0 0 0.5rem 0;
        color: var(--color-dark-gray);
        font-size: 1.2rem;
        font-weight: 600;
    }

    .info-card p {
        margin: 0 0 0.5rem 0;
        color: var(--color-dark-gray);
        font-weight: 500;
    }

    .info-card small {
        color: var(--color-dark-gray);
        opacity: 0.7;
        font-size: 0.85rem;
        line-height: 1.4;
    }

    /* RSVP Section */
    .rsvp-section {
        background: linear-gradient(135deg, rgba(230, 242, 255, 0.6), rgba(212, 175, 55, 0.1));
        border: 2px solid rgba(212, 175, 55, 0.3);
        border-radius: 20px;
        padding: 2.5rem;
        text-align: center;
        margin-bottom: 2rem;
    }

    .rsvp-title {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.75rem;
        font-size: 1.8rem;
        color: var(--color-dark-gray);
        margin-bottom: 1rem;
        font-weight: 700;
    }

    .rsvp-title i {
        color: var(--color-gold);
        font-size: 1.5rem;
    }

    .rsvp-description {
        color: var(--color-dark-gray);
        font-size: 1.1rem;
        line-height: 1.6;
        margin-bottom: 2rem;
        max-width: 500px;
        margin-left: auto;
        margin-right: auto;
    }

    .rsvp-buttons {
        display: flex;
        gap: 1rem;
        justify-content: center;
        margin-bottom: 2rem;
        flex-wrap: wrap;
    }

    .rsvp-btn {
        padding: 1rem 2rem;
        border: none;
        border-radius: 50px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        gap: 0.5rem;
        font-size: 1rem;
        min-width: 180px;
        justify-content: center;
    }

    .rsvp-btn.accept {
        background: linear-gradient(135deg, #4CAF50, #45a049);
        color: var(--color-white);
    }

    .rsvp-btn.accept:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(76, 175, 80, 0.3);
    }

    .rsvp-btn.decline {
        background: transparent;
        color: var(--color-dark-gray);
        border: 2px solid rgba(68, 68, 68, 0.3);
    }

    .rsvp-btn.decline:hover {
        background: rgba(68, 68, 68, 0.1);
        transform: translateY(-3px);
    }

    .rsvp-contact {
        border-top: 1px solid rgba(212, 175, 55, 0.2);
        padding-top: 1.5rem;
    }

    .rsvp-contact p {
        margin: 0 0 1rem 0;
        color: var(--color-dark-gray);
        font-weight: 500;
    }

    .contact-methods {
        display: flex;
        gap: 1rem;
        justify-content: center;
        flex-wrap: wrap;
    }

    .contact-method {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        color: var(--color-gold);
        text-decoration: none;
        font-weight: 500;
        transition: all 0.3s ease;
        padding: 0.5rem 1rem;
        border-radius: 25px;
        border: 1px solid rgba(212, 175, 55, 0.3);
    }

    .contact-method:hover {
        background: rgba(212, 175, 55, 0.1);
        transform: translateY(-2px);
    }

    /* Super Mobile-Friendly Responsive Styles */
    @media (max-width: 768px) {
        .extended-invitation-details {
            margin-top: 2rem;
            padding-top: 1.5rem;
        }

        /* Enhanced Invitation Mobile Styles */
        .invitation-card {
            padding: 2rem 1.5rem;
            margin: 0 1rem;
        }

        .ornamental-border-top {
            gap: 1rem;
        }

        .ornament-left,
        .ornament-right {
            width: 50px;
        }

        .card-title {
            font-size: 2rem;
        }

        .invitation-opening {
            font-size: 1.1rem;
            padding: 0 1rem;
        }

        .name-text-primary {
            font-size: 2.6rem;
        }

        .name-text-secondary {
            font-size: 2.2rem;
        }

        .name-description {
            font-size: 0.9rem;
            max-width: 200px;
        }

        .name-connector-elegant {
            width: 100px;
            padding: 0.5rem;
        }

        .connector-heart-elegant {
            width: 50px;
            height: 50px;
            font-size: 1.2rem;
        }

        .ceremony-text {
            font-size: 1.1rem;
            padding: 0 1rem;
        }

        .ceremony-blessing {
            padding: 1.5rem;
            margin: 0 1rem;
        }

        .ceremony-details-grid {
            grid-template-columns: 1fr;
            gap: 1.5rem;
        }

        .detail-card {
            padding: 1.5rem;
            flex-direction: column;
            text-align: center;
            gap: 1rem;
        }

        .detail-card-icon {
            width: 50px;
            height: 50px;
            font-size: 1.3rem;
        }

        .venue-details-card {
            padding: 2rem 1.5rem;
            margin: 0 1rem;
        }

        .venue-name-elegant {
            font-size: 2rem;
        }

        .address-line {
            font-size: 1.1rem;
        }

        .venue-description p {
            font-size: 1rem;
        }

        .venue-amenities {
            flex-direction: column;
            gap: 1rem;
        }

        .reception-description {
            font-size: 1.1rem;
            padding: 0 1rem;
        }

        .reception-timeline {
            padding: 1.5rem;
            margin: 0 1rem;
        }

        .timeline-item {
            flex-direction: column;
            gap: 0.5rem;
            text-align: center;
            padding: 1rem 0;
        }

        .timeline-time {
            min-width: auto;
            font-size: 1rem;
        }

        .timeline-event {
            font-size: 1rem;
        }

        .notes-grid {
            grid-template-columns: 1fr;
            gap: 1.5rem;
        }

        .note-card {
            padding: 1.5rem;
            margin: 0 1rem;
        }

        .note-icon {
            width: 50px;
            height: 50px;
            font-size: 1.2rem;
        }

        .note-card h5 {
            font-size: 1.2rem;
        }

        .note-card p {
            font-size: 0.95rem;
        }

        .schedule-timeline {
            padding-left: 1rem;
        }

        .schedule-timeline::before {
            left: 8px;
        }

        .schedule-item::before {
            left: -18px;
        }

        .schedule-item.highlight::before {
            left: -20px;
        }

        .schedule-item {
            flex-direction: column;
            gap: 0.5rem;
            margin-bottom: 1.5rem;
        }

        .schedule-time {
            min-width: auto;
            font-size: 1rem;
        }

        .calendar-header {
            padding: 1rem;
        }

        .calendar-grid {
            padding: 1rem;
        }

        .calendar-weekdays,
        .calendar-days {
            gap: 0.25rem;
        }

        .calendar-day {
            font-size: 0.9rem;
        }

        .wedding-info-cards {
            grid-template-columns: 1fr;
            gap: 1rem;
        }

        .info-card {
            padding: 1.25rem;
        }

        .rsvp-section {
            padding: 1.5rem;
            margin: 0 1rem 2rem;
        }

        .rsvp-buttons {
            flex-direction: column;
            align-items: center;
        }

        .rsvp-btn {
            width: 100%;
            max-width: 280px;
        }

        .contact-methods {
            flex-direction: column;
            align-items: center;
        }

        .contact-method {
            width: 100%;
            max-width: 250px;
            justify-content: center;
        }
    }

    @media (max-width: 480px) {
        .schedule-title,
        .calendar-title,
        .rsvp-title {
            font-size: 1.3rem;
            flex-direction: column;
            gap: 0.5rem;
            text-align: center;
        }

        /* Enhanced Invitation Mobile Styles for Small Screens */
        .invitation-card {
            padding: 1.5rem 1rem;
        }

        .card-title {
            font-size: 1.8rem;
        }

        .card-subtitle {
            font-size: 1rem;
        }

        .invitation-opening {
            font-size: 1rem;
        }

        .name-text-primary {
            font-size: 2.2rem;
        }

        .name-text-secondary {
            font-size: 1.8rem;
        }

        .name-title-elegant {
            font-size: 1.1rem;
        }

        .name-description {
            font-size: 0.85rem;
        }

        .ceremony-title {
            font-size: 1.6rem;
        }

        .ceremony-subtitle {
            font-size: 1rem;
        }

        .ceremony-text {
            font-size: 1rem;
        }

        .blessing-text {
            font-size: 1.1rem;
        }

        .venue-title {
            font-size: 1.5rem;
        }

        .venue-name-elegant {
            font-size: 1.8rem;
        }

        .venue-description p {
            font-size: 0.95rem;
        }

        .reception-title {
            font-size: 1.5rem;
        }

        .reception-description {
            font-size: 1rem;
        }

        .notes-title {
            font-size: 1.4rem;
        }

        .ceremony-icon-wrapper,
        .venue-icon-elegant {
            width: 60px;
            height: 60px;
            font-size: 1.5rem;
        }

        .detail-value-primary {
            font-size: 1.3rem;
        }

        .detail-value-secondary {
            font-size: 1rem;
        }

        .flourish-center {
            font-size: 1.2rem;
        }

        .ornament-left::before,
        .ornament-right::before {
            font-size: 0.9rem;
        }

        .calendar-header h5 {
            font-size: 1.1rem;
        }

        .calendar-nav {
            width: 35px;
            height: 35px;
        }

        .info-icon {
            width: 50px;
            height: 50px;
            font-size: 1.3rem;
        }

        .info-card h5 {
            font-size: 1.1rem;
        }

        .rsvp-description {
            font-size: 1rem;
        }

        .btn-calendar {
            padding: 0.6rem 1.5rem;
            font-size: 0.9rem;
        }
    }

    /* ========== IMAGE OPTIMIZATION STYLES ========== */
    
    /* Lazy Loading Image States */
    img[data-lazy-src] {
        opacity: 0;
        transition: opacity 0.3s ease;
        background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
        background-size: 200% 100%;
        animation: loading 1.5s infinite;
    }
    
    img[data-lazy-src].loaded {
        opacity: 1;
        background: none;
        animation: none;
    }
    
    @keyframes loading {
        0% { background-position: 200% 0; }
        100% { background-position: -200% 0; }
    }
    
    /* Background Image Loading States */
    [data-bg-src] {
        position: relative;
        background: linear-gradient(135deg, rgba(230, 242, 255, 0.3), rgba(212, 175, 55, 0.1));
    }
    
    [data-bg-src]::before {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        width: 40px;
        height: 40px;
        margin: -20px 0 0 -20px;
        border: 3px solid rgba(212, 175, 55, 0.3);
        border-top: 3px solid var(--color-gold);
        border-radius: 50%;
        animation: spin 1s linear infinite;
        opacity: 1;
        transition: opacity 0.3s ease;
    }
    
    [data-bg-src].bg-loaded::before {
        opacity: 0;
    }
    
    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }
    
    /* Image Blur-up Effect */
    .blur-up {
        filter: blur(5px);
        transition: filter 0.3s ease;
    }
    
    .blur-up.loaded {
        filter: blur(0);
    }
    
    /* Progressive Enhancement for WebP Support */
    .webp .hero-section {
        background-image: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.4)), url('/Images/gallery/bride-groom-hero.jpg');
    }
    
    /* Enhanced Mobile Responsive Optimization */
    @media (max-width: 768px) {
        .container {
            padding: 0 1rem;
        }
        
        .section {
            padding: 3rem 0;
        }
        
        .section-title {
            font-size: 2rem;
            margin-bottom: 1rem;
            text-shadow: 0 4px 8px rgba(0, 0, 0, 0.6), 0 2px 4px rgba(0, 0, 0, 0.4);
            background: rgba(255, 255, 255, 0.9);
            padding: 1rem 2rem;
            border-radius: 12px;
            backdrop-filter: blur(10px);
            display: inline-block;
            border: 1px solid rgba(212, 175, 55, 0.2);
        }
        
        .section-subtitle {
            font-size: 1rem;
            margin-bottom: 2rem;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.5);
            background: rgba(255, 255, 255, 0.8);
            padding: 0.75rem 1.5rem;
            border-radius: 8px;
            backdrop-filter: blur(8px);
            display: inline-block;
        }
        
        .hero-section {
            background-attachment: scroll;
            background-size: cover;
            padding: 2rem 1rem;
        }
        
        .hero-content {
            padding: 1.5rem;
            backdrop-filter: blur(3px);
            background: rgba(0, 0, 0, 0.15);
        }
        
        .hero-title {
            font-size: 3rem;
        }
        
        .hero-subtitle {
            font-size: 1.3rem;
        }
        
        .hero-date {
            font-size: 1.4rem;
        }
        
        .btn-primary {
            padding: 0.75rem 1.5rem;
            font-size: 1rem;
        }
        
        /* Mobile Background Optimization */
        .orthodox-section,
        .invitation-section,
        .countdown-section {
            background-attachment: scroll;
        }
        
        .orthodox-section {
            padding: 80px 0 40px 0;
        }
        
        .invitation-section {
            padding: 80px 0;
        }
        
        .countdown-section {
            padding: 40px 0 80px 0;
        }
    }

    @media (max-width: 480px) {
        .container {
            padding: 0 0.75rem;
        }
        
        .section {
            padding: 2rem 0;
        }
        
        .section-title {
            font-size: 1.75rem;
            text-shadow: 0 4px 8px rgba(0, 0, 0, 0.6), 0 2px 4px rgba(0, 0, 0, 0.4);
            background: rgba(255, 255, 255, 0.9);
            padding: 0.75rem 1.5rem;
            border-radius: 10px;
            backdrop-filter: blur(10px);
            display: inline-block;
            border: 1px solid rgba(212, 175, 55, 0.2);
        }
        
        .section-subtitle {
            font-size: 0.9rem;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.5);
            background: rgba(255, 255, 255, 0.8);
            padding: 0.5rem 1rem;
            border-radius: 6px;
            backdrop-filter: blur(8px);
            display: inline-block;
        }
        
        .hero-section {
            background-attachment: scroll;
            background-size: cover;
            min-height: 90vh;
            padding: 1rem 0.5rem;
        }
        
        .hero-content {
            padding: 1rem;
        }
        
        .hero-title {
            font-size: 2.5rem;
        }
        
        .hero-subtitle {
            font-size: 1.2rem;
        }
        
        .hero-date {
            font-size: 1.2rem;
        }
        
        .venue-details-card {
            background-size: cover, cover, cover;
            padding: 2rem 1rem;
        }
        
        .venue-name-elegant {
            font-size: 2.2rem;
        }
        
        .btn-primary {
            padding: 0.6rem 1.25rem;
            font-size: 0.9rem;
        }
    }

    /* Smooth Section Transitions */
    .section-transition {
        position: relative;
    }

    .section-transition::before {
        content: '';
        position: absolute;
        top: -50px;
        left: 0;
        right: 0;
        height: 100px;
        background: linear-gradient(to bottom, transparent, rgba(0, 0, 0, 0.05), transparent);
        pointer-events: none;
        z-index: 1;
    }

    /* Seamless Orthodox to Countdown Transition */
    .orthodox-section + .countdown-section {
        background-position: center bottom;
        background-blend-mode: overlay;
    }

    .orthodox-section + .countdown-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 60px;
        background: linear-gradient(to bottom, 
            rgba(0, 0, 0, 0.2), 
            rgba(255, 255, 255, 0.1));
        pointer-events: none;
        z-index: 1;
    }

    /* Print Styles */
    @media print {
        .hero-section,
        .orthodox-section,
        .section.bg-light-blue {
            break-inside: avoid;
        }
        
        .map-controls,
        .copy-btn,
        .scroll-indicator,
        .calendar-nav,
        .rsvp-buttons {
            display: none !important;
        }
        
        .invitation-card {
            box-shadow: none;
            border: 2px solid var(--color-gold);
        }

        .extended-invitation-details {
            page-break-inside: avoid;
        }
    }
</style>
@endsection

@section('content')
<!-- Hero Section -->
<section class="hero-section">
    <div class="hero-content">
        <h3 class="hero-subtitle animate-fade-in-up" style="animation-delay: 0.2s">
            Celebrating the Union of
        </h3>
        <h1 class="hero-title animate-fade-in-up" style="animation-delay: 0.4s">
            
         Dr. Tsion Mekasha<br>
            <span style="color: var(--color-gold); margin: 0 1rem;">&</span> <br>
            Mr. Hawariya Mulugeta
        </h1>
        <div class="hero-divider animate-fade-in-up" style="animation-delay: 0.6s"></div>
        <p class="hero-date animate-fade-in-up" style="animation-delay: 0.8s">
            January 10, 2026 • Bishoftu, Ethiopia
        </p>
        
        <!-- Hero Countdown -->
        <div class="animate-fade-in-up" style="animation-delay: 1s">
            <div class="countdown-container">
                <div class="countdown-item">
                    <div class="countdown-number" id="hero-days">00</div>
                    <div class="countdown-label">Days</div>
                </div>
                <div style="color: var(--color-gold); font-size: 3rem; display: flex; align-items: center;">:</div>
                <div class="countdown-item">
                    <div class="countdown-number" id="hero-hours">00</div>
                    <div class="countdown-label">Hours</div>
                </div>
                <div style="color: var(--color-gold); font-size: 3rem; display: flex; align-items: center;">:</div>
                <div class="countdown-item">
                    <div class="countdown-number" id="hero-minutes">00</div>
                    <div class="countdown-label">Minutes</div>
                </div>
                <div style="color: var(--color-gold); font-size: 3rem; display: flex; align-items: center;">:</div>
                <div class="countdown-item">
                    <div class="countdown-number" id="hero-seconds">00</div>
                    <div class="countdown-label">Seconds</div>
                </div>
            </div>
        </div>
        
        <div class="animate-fade-in-up" style="animation-delay: 1.2s; margin-top: 2rem;">
            <a href="{{ route('memories') }}" class="btn-primary">
                <span>Our Story</span>
                <i class="fas fa-arrow-right card-arrow" style="margin-left: 0.5rem;"></i>
            </a>
        </div>
    </div>
    
    <div class="scroll-indicator">
        <div class="scroll-dot"></div>
    </div>
</section>

<!-- Wedding Invitation Section -->
<section class="section invitation-section" id="invitation">
    <div class="container">
        <!-- Section Header -->
        

        <!-- Language Toggle -->
        <div class="text-center">
            <div class="language-toggle">
                <input type="radio" id="lang-en" name="language" checked onclick="switchLanguage('en')">
                <label for="lang-en" class="lang-label">
                    <i class="fas fa-language"></i>
                    <span>English</span>
                </label>
                
                <input type="radio" id="lang-am" name="language" onclick="switchLanguage('am')">
                <label for="lang-am" class="lang-label">
                    <i class="fas fa-language"></i>
                    <span>አማርኛ</span>
                </label>
                
                <div class="language-slider"></div>
            </div>
        </div>

        <!-- English Invitation Card -->
        <div class="invitation-card-wrapper">
            <div class="invitation-card lang-content active" id="invitation-en">
                <!-- Decorative Elements -->
                <div class="card-decoration corner-top-left"></div>
                <div class="card-decoration corner-top-right"></div>
                <div class="card-decoration corner-bottom-left"></div>
                <div class="card-decoration corner-bottom-right"></div>
                <div class="card-border-glow"></div>
                
                <div class="invitation-card-content">
                    <!-- Elegant Header with Ornamental Design -->
                    <div class="card-header">
                        <div class="ornamental-border-top">
                            <div class="ornament-left"></div>
                            <div class="card-icon-shimmer">
                                <i class="fas fa-rings-wedding card-icon"></i>
                            </div>
                            <div class="ornament-right"></div>
                        </div>
                        <h3 class="card-title gold-gradient">It is with great joy and excitement that we invite you to witness and celebrate the sacred union of</h3>
                        <div class="invitation-flourish">
                            <div class="flourish-line"></div>
                            <div class="flourish-center">❦</div>
                            <div class="flourish-line"></div>
                        </div>
                    </div>

                    

                    <!-- Couple Names with Enhanced Design -->
                    <div class="couple-names-wrapper">
                        <div class="name-line-elegant"></div>
                        <div class="couple-names">
                            
                            <div class="name-container bride-name">
                                <div class="name-title-elegant">Dr.</div>
                                <div class="name-text-primary">Tsion</div>
                                <div class="name-text-secondary">Mekasha</div>
                                <div class="name-description">Daughter of Dr. Mekasha & W/ro Fasika</div>
                            </div>
                            <div class="name-connector-elegant">
                                <div class="connector-ornament-top">✦</div>
                                <div class="connector-text">and</div>
                                <div class="connector-heart-elegant">
                                    <i class="fas fa-heart"></i>
                                </div>
                                <div class="connector-ornament-bottom">✦</div>
                            </div>
                            <div class="name-container groom-name">
                                <div class="name-title-elegant">Mr.</div>
                                <div class="name-text-primary">Hawariya</div>
                                <div class="name-text-secondary">Mulugeta</div>
                                <div class="name-description">Son of Ato Mulugeta & W/ro Almaz</div>
                            </div>

                            
                        </div>
                        <div class="name-line-elegant"></div>
                    </div>

                    <!-- Ceremony Details with Elegant Typography -->
                    <div class="ceremony-details">
                        
                        
                        <div class="ceremony-blessing">
                            <div class="blessing-icon">
                                <i class="fas fa-cross"></i>
                            </div>
                            <p class="blessing-text">
                                "Therefore what God has joined together, let no one separate"
                            </p>
                            <p class="blessing-reference">Mark 10:9</p>
                        </div>
                    </div>

                    <!-- Event Details with Professional Layout -->
                    <div class="invitation-details-enhanced">
                        <!-- Ceremony Information -->
                        <div class="ceremony-info-section">
                            <div class="ceremony-header">
                                <div class="ceremony-icon-wrapper">
                                    <i class="fas fa-church"></i>
                                </div>
                                <h4 class="ceremony-title">Wedding Ceremony</h4>
                                <p class="ceremony-subtitle">Join us as we exchange vows in the presence of our Lord</p>
                            </div>
                            
                            <div class="ceremony-details-grid">
                                <div class="detail-card date-card">
                                    <div class="detail-card-icon">
                                        <i class="fas fa-calendar-heart"></i>
                                    </div>
                                    <div class="detail-card-content">
                                        <h5 class="detail-label">Wedding Date</h5>
                                        <p class="detail-value-primary">Friday, January 10th</p>
                                        <p class="detail-value-secondary">2026</p>
                                        <p class="detail-note">Ethiopian Calendar: Tir 2, 2018</p>
                                    </div>
                                </div>
                                
                                <div class="detail-card time-card">
                                    <div class="detail-card-icon">
                                        <i class="fas fa-clock"></i>
                                    </div>
                                    <div class="detail-card-content">
                                        <h5 class="detail-label">Ceremony Time</h5>
                                        <p class="detail-value-primary">11:00 PM</p>
                                        <p class="detail-value-secondary">East Africa Time</p>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Venue Information -->
                        <div class="venue-info-section">
                            <div class="venue-header">
                                <div class="venue-icon-elegant">
                                    <i class="fas fa-map-marker-alt"></i>
                                </div>
                                <h4 class="venue-title">Celebration Venue</h4>
                            </div>
                            
                            <div class="venue-details-card">
                                <div class="venue-name-elegant">Noora Resort</div>
                                
                                <div class="venue-description">
                                    <p>A beautiful lakeside resort offering stunning views and elegant facilities for our special celebration. The venue features traditional Ethiopian architecture blended with modern amenities, creating the perfect atmosphere for our wedding festivities.</p>
                                </div>
                                <div class="venue-amenities">
                                    <div class="amenity-item">
                                        <i class="fas fa-parking"></i>
                                        <span>Complimentary Parking</span>
                                    </div>
                                    
                                    <div class="amenity-item">
                                        <i class="fas fa-wifi"></i>
                                        <span>WiFi Available</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        

                        <div class="datetime-wrapper">
                            <div class="datetime-item">
                                <div class="datetime-icon">
                                    <i class="fas fa-calendar-alt"></i>
                                </div>
                                <div class="datetime-content">
                                    <div class="datetime-label">Date</div>
                                    <div class="datetime-value">Saturday, January 10, 2026</div>
                                </div>
                            </div>
                            
                            <div class="datetime-item">
                                <div class="datetime-icon">
                                    <i class="fas fa-clock"></i>
                                </div>
                                <div class="datetime-content">
                                    <div class="datetime-label">Time</div>
                                    <div class="datetime-value">11:00 PM</div>
                                </div>
                            </div>
                        </div>

                        <div class="venue-wrapper">
                            <div class="venue-icon">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div class="venue-content">
                                <div class="venue-label">Venue</div>
                                <div class="venue-name">Noora Resort</div>
                                <div class="venue-location">Bishoftu, Ethiopia</div>
                            </div>
                        </div>
                    </div>

                    <!-- Interactive Map -->
                    <div class="interactive-map-wrapper">
                        <div class="map-header">
                            <i class="fas fa-map-marked-alt"></i>
                            <h4>Venue Location</h4>
                            <span class="map-badge">Interactive</span>
                        </div>
                        
                        <div class="map-container">
                            <div class="map-frame-wrapper">
                                <div class="map-overlay-gradient"></div>
                                <div class="map-frame-border"></div>
                                
                                <iframe 
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3943.491937549442!2d38.97103517026176!3d8.739697174271665!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x164b73000cda0f39%3A0xb02204c6d5e25e4!2sNOORA%20RESORT!5e0!3m2!1sen!2set!4v1764671937236!5m2!1sen!2set" 
                                    width="100%" 
                                    height="400"
                                    style="border:0;"
                                    allowfullscreen
                                    loading="lazy"
                                    referrerpolicy="no-referrer-when-downgrade"
                                    title="Noora Resort Location"
                                    class="map-iframe">
                                </iframe>
                                
                                <div class="map-controls">
                                    <button class="map-btn directions-btn" onclick="openDirections()">
                                        <i class="fas fa-directions"></i>
                                        <span>Directions</span>
                                    </button>
                                    <button class="map-btn streetview-btn" onclick="openStreetView()">
                                        <i class="fas fa-street-view"></i>
                                        <span>Street View</span>
                                    </button>
                                </div>
                            </div>
                            
                            <div class="map-info-panel">
                                <div class="map-info-item">
                                    <i class="fas fa-info-circle"></i>
                                    <span>Click and drag to explore the area</span>
                                </div>
                                <div class="map-info-item">
                                    <i class="fas fa-compress-alt"></i>
                                    <span>Use Ctrl + Scroll to zoom</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Extended Invitation Details -->
                    <div class="extended-invitation-details">
                        <!-- Wedding Schedule -->
                        <div class="wedding-schedule">
                            <h4 class="schedule-title">
                                <i class="fas fa-clock"></i>
                                Wedding Day Schedule
                            </h4>
                            <div class="schedule-timeline">
                                <div class="schedule-item">
                                    <div class="schedule-time">10:00 AM</div>
                                    <div class="schedule-content">
                                        <h5>Preparation & Setup</h5>
                                        <p>Venue decoration and final preparations</p>
                                    </div>
                                </div>
                                <div class="schedule-item">
                                    <div class="schedule-time">11:00 PM</div>
                                    <div class="schedule-content">
                                        <h5>Doors opening</h5>
                                        <p>Welcome drinks </p>
                                    </div>
                                </div>
                                <div class="schedule-item highlight">
                                    <div class="schedule-time">12:00 - 12:15 PM</div>
                                    <div class="schedule-content">
                                        <h5>Entrance for the Groom and Bride</h5>
                                        <p>Exchange of vows and rings</p>
                                    </div>
                                </div>
                                <div class="schedule-item">
                                    <div class="schedule-time">12:15 - 12:40 PM</div>
                                    <div class="schedule-content">
                                        <h5>Welcoming dance</h5>
                                        <p>Preaching</p>
                                    </div>
                                </div>
                                <div class="schedule-item">
                                    <div class="schedule-time">1:00 - 1:50 PM</div>
                                    <div class="schedule-content">
                                        <h5>Dinner</h5>
                                        <p>First dance will continue</p>
                                    </div>
                                </div>
                                <div class="schedule-item">
                                    <div class="schedule-time">3:00 - 3:30 PM</div>
                                    <div class="schedule-content">
                                        <h5>Cake cutting ceremony</h5>
                                        <p>Live music and traditional performances</p>
                                    </div>
                                </div>
                                <div class="schedule-item">
                                    <div class="schedule-time">3:30 - 4:30 PM</div>
                                    <div class="schedule-content">
                                        <h5>Family photo program</h5>
                                        <p>Dance will continue</p>
                                    </div>
                                </div>
                                <div class="schedule-item">
                                    <div class="schedule-time">5:00 PM</div>
                                    <div class="schedule-content">
                                        <h5>End of the ceremony</h5>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Interactive Calendar -->
                        <div class="interactive-calendar">
                            <h4 class="calendar-title">
                                <i class="fas fa-calendar-alt"></i>
                                Save the Date
                            </h4>
                            <div class="calendar-widget">
                                <div class="calendar-header">
                                    <button class="calendar-nav" id="prevMonth">
                                        <i class="fas fa-chevron-left"></i>
                                    </button>
                                    <h5 id="currentMonth">January 2026</h5>
                                    <button class="calendar-nav" id="nextMonth">
                                        <i class="fas fa-chevron-right"></i>
                                    </button>
                                </div>
                                <div class="calendar-grid">
                                    <div class="calendar-weekdays">
                                        <div>Sun</div>
                                        <div>Mon</div>
                                        <div>Tue</div>
                                        <div>Wed</div>
                                        <div>Thu</div>
                                        <div>Fri</div>
                                        <div>Sat</div>
                                    </div>
                                    <div class="calendar-days" id="calendarDays">
                                        <!-- Calendar days will be generated by JavaScript -->
                                    </div>
                                </div>
                                <div class="calendar-footer">
                                    <button class="btn-calendar" onclick="addToCalendar()">
                                        <i class="fas fa-plus"></i>
                                        Add to My Calendar
                                    </button>
                                </div>
                            </div>
                        </div>

                        

                        <!-- RSVP Section -->
                        <div class="rsvp-section">
                            <h4 class="rsvp-title">
                                <i class="fas fa-reply"></i>
                                Please Respond
                            </h4>
                            <p class="rsvp-description">
                                Your presence would make our day even more special. Please let us know if you'll be joining us by <strong>December 15, 2025</strong>.
                            </p>
                            <div class="rsvp-buttons">
                                <button class="rsvp-btn accept" onclick="rsvpResponse('accept')">
                                    <i class="fas fa-check"></i>
                                    <span>Joyfully Accept</span>
                                </button>
                                <button class="rsvp-btn decline" onclick="rsvpResponse('decline')">
                                    <i class="fas fa-times"></i>
                                    <span>Regretfully Decline</span>
                                </button>
                            </div>
                            
                        </div>
                    </div>

                    
                </div>
            </div>

            <!-- Amharic Invitation Card -->
            <div class="invitation-card lang-content" id="invitation-am">
                <!-- Decorative Elements -->
                <div class="card-decoration corner-top-left"></div>
                <div class="card-decoration corner-top-right"></div>
                <div class="card-decoration corner-bottom-left"></div>
                <div class="card-decoration corner-bottom-right"></div>
                <div class="card-border-glow"></div>
                
                <div class="invitation-card-content">
                    <!-- Elegant Header with Ornamental Design -->
                    <div class="card-header">
                        <div class="ornamental-border-top">
                            <div class="ornament-left"></div>
                            <div class="card-icon-shimmer">
                                <i class="fas fa-rings-wedding card-icon"></i>
                            </div>
                            <div class="ornament-right"></div>
                        </div>
                        <h3 class="card-title gold-gradient">በታላቅ ደስታና ጉጉት የእግዚአብሔርን መገኘት፣ ቤተሰብና ወዳጆቻችን በተገኙበት የሚከናወነውን ቅዱስ የጋብቻ ሥነ ሥርዓት እንዲመሰክሩና እንዲያከብሩ እንጋብዝዎታለን </h3>
                        
                        <div class="invitation-flourish">
                            <div class="flourish-line"></div>
                            <div class="flourish-center">❦</div>
                            <div class="flourish-line"></div>
                        </div>
                    </div>

                   

                    <!-- Couple Names with Enhanced Design -->
                    <div class="couple-names-wrapper">
                        <div class="name-line-elegant"></div>
                        <div class="couple-names">
                            <div class="name-container bride-name">
                                <div class="name-title-elegant">ዶ/ር</div>
                                <div class="name-text-primary">ጽዮን</div>
                                <div class="name-text-secondary">መካሻ</div>
                                <div class="name-description">የዶ/ር መከሻና ወ/ሮ ፋሲካ ልጅ</div>
                            </div>
                            
                            
                            <div class="name-connector-elegant">
                                <div class="connector-ornament-top">✦</div>
                                <div class="connector-text">እና</div>
                                <div class="connector-heart-elegant">
                                    <i class="fas fa-heart"></i>
                                </div>
                                <div class="connector-ornament-bottom">✦</div>
                            </div>
                            <div class="name-container groom-name">
                                <div class="name-title-elegant">አቶ</div>
                                <div class="name-text-primary">ሀዋርያ</div>
                                <div class="name-text-secondary">ሙሉጌታ</div>
                                <div class="name-description">የአቶ ሙሉጌታና ወ/ሮ አልማዝ ልጅ</div>
                            </div>
                            
                        </div>
                        <div class="name-line-elegant"></div>
                    </div>

                    <!-- Ceremony Details with Elegant Typography -->
                    <div class="ceremony-details">
                        
                        
                        <div class="ceremony-blessing">
                            <div class="blessing-icon">
                                <i class="fas fa-cross"></i>
                            </div>
                            <p class="blessing-text">
                                "ስለዚህ እግዚአብሔር ያጣመረውን ሰው አይለያየይውም"
                            </p>
                            <p class="blessing-reference">ማርቆስ 10፡9</p>
                        </div>
                    </div>

                    <!-- Event Details with Professional Layout -->
                    <div class="invitation-details-enhanced">
                        <!-- Ceremony Information -->
                        <div class="ceremony-info-section">
                            <div class="ceremony-header">
                                <div class="ceremony-icon-wrapper">
                                    <i class="fas fa-church"></i>
                                </div>
                                <h4 class="ceremony-title">የጋብቻ ሥነ ሥርዓት</h4>
                                <p class="ceremony-subtitle">በጌታችን ፊት ቃል ኪዳናችንን ለመለዋወጥ ይቀላቀሉን</p>
                            </div>
                            
                            <div class="ceremony-details-grid">
                                <div class="detail-card date-card">
                                    <div class="detail-card-icon">
                                        <i class="fas fa-calendar-heart"></i>
                                    </div>
                                    <div class="detail-card-content">
                                        <h5 class="detail-label">የጋብቻ ቀን</h5>
                                        <p class="detail-value-primary">ዓርብ፣ ጥር 2</p>
                                        <p class="detail-value-secondary">2018</p>
                                        <p class="detail-note"> ጃንዋሪ 10፣ 2026</p>
                                    </div>
                                </div>
                                
                                <div class="detail-card time-card">
                                    <div class="detail-card-icon">
                                        <i class="fas fa-clock"></i>
                                    </div>
                                    <div class="detail-card-content">
                                        <h5 class="detail-label">የሥነ ሥርዓት ሰዓት</h5>
                                        <p class="detail-value-primary">ምሽት 11፡00</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Venue Information -->
                        <div class="venue-info-section">
                            <div class="venue-header">
                                <div class="venue-icon-elegant">
                                    <i class="fas fa-map-marker-alt"></i>
                                </div>
                                <h4 class="venue-title">የበዓል ቦታ</h4>
                            </div>
                            
                            <div class="venue-details-card">
                                <div class="venue-name-elegant">ኑራ ሬዞርት</div>
                                
                                <div class="venue-description">
                                    <p>በሐይቅ ዳርቻ የሚገኝ ውብ ሬዞርት ሲሆን ለልዩ በዓላችን ተስማሚ የሆነ አስደናቂ እይታና ውብ view ያለው ነው። </p>
                                </div>
                                <div class="venue-amenities">
                                    <div class="amenity-item">
                                        <i class="fas fa-parking"></i>
                                        <span>ነፃ የመኪና ማቆሚያ</span>
                                    </div>
                                    <div class="amenity-item">
                                    
                                    <div class="amenity-item">
                                        <i class="fas fa-wifi"></i>
                                        <span>ነፃ ዋይፋይ አገልግሎት</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Reception Information -->
                        <div class="reception-info-section">
                            <div class="reception-header">
                                <div class="reception-ornament">✦ ❦ ✦</div>
                                <h4 class="reception-title">የጋብቻ ድግስ</h4>
                                <p class="reception-subtitle">እራት</p>
                            </div>
                            
                            <div class="reception-details">
                                
                                
                                <div class="reception-timeline">
                                    <div class="timeline-item">
                                        <div class="timeline-time">ምሽት 11:00</div>
                                        <div class="timeline-event">በሮች ይከፈታሉ </div>
                                    </div>
                                    <div class="timeline-item">
                                        <div class="timeline-time">ምሽት 12:00 - 12፡30</div>
                                        <div class="timeline-event">ሙሽሪት እና ሙሽራው ይገባሉ</div>
                                    </div>
                                    <div class="timeline-item">
                                        <div class="timeline-time">ምሽት 12፡15 - 12:40</div>
                                        <div class="timeline-event">ባህላዊ ሙዚቃና ዳንስ</div>
                                    </div>
                                    <div class="timeline-item">
                                        <div class="timeline-time">ምሽት 1፡00 - 1:50</div>
                                        <div class="timeline-event">እራት</div>
                                    </div>
                                    <div class="timeline-item">
                                        <div class="timeline-time">ምሽት 3፡00 - 3:30</div>
                                        <div class="timeline-event">ኬክ ቆረሳ ሴሬሞኒ</div>
                                    </div>
                                    <div class="timeline-item">
                                        <div class="timeline-time">ምሽት 3፡30 - 4:30</div>
                                        <div class="timeline-event">Family Photo Program</div>
                                    </div>
                                    <div class="timeline-item">
                                        <div class="timeline-time">ምሽት 5:00</div>
                                        <div class="timeline-event">ሴሬሞኒው ያልቃል</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        
                    </div>

                    <!-- Interactive Map -->
                    <div class="interactive-map-wrapper">
                        <div class="map-header">
                            <i class="fas fa-map-marked-alt"></i>
                            <h4>የቦታ አድራሻ</h4>
                            <span class="map-badge">በይነተገናኝ</span>
                        </div>
                        
                        <div class="map-container">
                            <div class="map-frame-wrapper">
                                <div class="map-overlay-gradient"></div>
                                <div class="map-frame-border"></div>
                                
                                <iframe 
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3943.491937549442!2d38.97103517026176!3d8.739697174271665!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x164b73000cda0f39%3A0xb02204c6d5e25e4!2sNOORA%20RESORT!5e0!3m2!1sen!2set!4v1764671937236!5m2!1sen!2set" 
                                    width="100%" 
                                    height="400"
                                    style="border:0;"
                                    allowfullscreen
                                    loading="lazy"
                                    referrerpolicy="no-referrer-when-downgrade"
                                    title="ኑራ ሬዞርት አድራሻ ካርታ"
                                    class="map-iframe">
                                </iframe>
                                
                                <div class="map-controls">
                                    <button class="map-btn directions-btn" onclick="openDirections()">
                                        <i class="fas fa-directions"></i>
                                        <span>መንገድ</span>
                                    </button>
                                    <button class="map-btn streetview-btn" onclick="openStreetView()">
                                        <i class="fas fa-street-view"></i>
                                        <span>ጎዳና እይታ</span>
                                    </button>
                                </div>
                            </div>
                            
                            <div class="map-info-panel">
                                <div class="map-info-item">
                                    <i class="fas fa-info-circle"></i>
                                    <span>ጠቅ ያድርጉ እና ይጎትቱ አካባቢውን ለማሰስ</span>
                                </div>
                                <div class="map-info-item">
                                    <i class="fas fa-compress-alt"></i>
                                    <span>Ctrl + Scroll ለማጉላት ይጠቀሙ</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    
                </div>
            </div>
                                
                                <div class="map-controls">
                                    <button class="map-btn directions-btn" onclick="openDirections()">
                                        <i class="fas fa-directions"></i>
                                        <span>መንገድ</span>
                                    </button>
                                    <button class="map-btn streetview-btn" onclick="openStreetView()">
                                        <i class="fas fa-street-view"></i>
                                        <span>ጎዳና እይታ</span>
                                    </button>
                                </div>
                            </div>
                            
                            <div class="map-info-panel">
                                <div class="map-info-item">
                                    <i class="fas fa-info-circle"></i>
                                    <span>ጠቅ ያድርጉ እና ይጎትቱ አካባቢውን</span>
                                </div>
                                <div class="map-info-item">
                                    <i class="fas fa-compress-alt"></i>
                                    <span>Ctrl + Scroll ለማጉላት</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    
                </div>
            </div>
        </div>

        
    </div>
</section>

<!-- Orthodox Quote Section -->
<section class="orthodox-section">
    <div class="orthodox-bg-circle"></div>
    <div class="orthodox-bg-circle"></div>
    
    <div class="container" style="position: relative; z-index: 1;">
        <div class="text-center">
            <!-- Orthodox Cross -->
            <div class="orthodox-cross"></div>
            
            <blockquote class="orthodox-quote opacity-0 translate-y-4" style="transition: all 1s ease;">
                ስለዚህ ሰው አባቱንና እናቱን ይተዋል ከሚስቱም ጋር ይጣበቃል አንድ ሥጋም ይሆናሉ።
            </blockquote>
            
            <p class="orthodox-verse opacity-0 translate-y-4" style="transition: all 1s ease 0.2s;">
                Therefore a man shall leave his father and mother and be joined to his wife, and they shall become one flesh.
            </p>
            
            <div class="opacity-0 translate-y-4" style="transition: all 1s ease 0.4s;">
                <div class="verse-badge">
                    <div class="verse-dot"></div>
                    <span style="font-family: var(--font-serif);">Genesis 2:24</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Secondary Countdown Section -->
<section class="section countdown-section" style="padding: 100px 0;">
    <div class="container">
        <div class="text-center" style="max-width: 800px; margin: 0 auto;">
            <h2 class="section-title gold-gradient mb-4">
                Counting Down to Forever
            </h2>
            
            <!-- Secondary Countdown -->
            <div class="opacity-0 translate-y-4" style="transition: all 1s ease 0.1s; margin-bottom: 3rem;">
                <div class="countdown-container">
                    <div class="countdown-item">
                        <div class="countdown-number" id="secondary-days">00</div>
                        <div class="countdown-label">Days</div>
                    </div>
                    <div style="color: var(--color-gold); font-size: 3rem; display: flex; align-items: center;">:</div>
                    <div class="countdown-item">
                        <div class="countdown-number" id="secondary-hours">00</div>
                        <div class="countdown-label">Hours</div>
                    </div>
                    <div style="color: var(--color-gold); font-size: 3rem; display: flex; align-items: center;">:</div>
                    <div class="countdown-item">
                        <div class="countdown-number" id="secondary-minutes">00</div>
                        <div class="countdown-label">Minutes</div>
                    </div>
                    <div style="color: var(--color-gold); font-size: 3rem; display: flex; align-items: center;">:</div>
                    <div class="countdown-item">
                        <div class="countdown-number" id="secondary-seconds">00</div>
                        <div class="countdown-label">Seconds</div>
                    </div>
                </div>
            </div>
            
            <p class="opacity-0 translate-y-4" style="transition: all 1s ease 0.2s; color: var(--color-dark-gray); font-size: 1.125rem; opacity: 0.7;">
                We eagerly await the day we become one in the presence of God, family, and friends.
            </p>
        </div>
    </div>
</section>
@endsection

@section('scripts')
<script>
    // ============================================
    // WEDDING WEBSITE CORE FUNCTIONALITY
    // ============================================

    // Initialize when DOM is loaded
    document.addEventListener('DOMContentLoaded', function() {
        console.log('Wedding website initialized');
        
        // Initialize image optimization
        initializeImageOptimization();
        
        // Initialize countdown timers
        initializeCountdown();
        
        // Initialize scroll animations
        initScrollAnimations();
        
        // Initialize guest information
        initializeGuestInfo();
        
        // Add scroll indicator functionality
        initScrollIndicator();
    });

    // ============================================
    // COUNTDOWN TIMER
    // ============================================
    
    function initializeCountdown() {
        // Set wedding date: January 16, 2026, 3:00 PM
        const weddingDate = new Date('January 10, 2026 17:00:00').getTime();
        console.log('Wedding date set to:', new Date(weddingDate).toLocaleString());
        
        function updateCountdown() {
            const now = new Date().getTime();
            const timeRemaining = weddingDate - now;
            
            // If wedding has passed
            if (timeRemaining < 0) {
                updateCountdownElements('00', '00', '00', '00');
                showWeddingDayMessage();
                return;
            }
            
            // Calculate time units
            const days = Math.floor(timeRemaining / (1000 * 60 * 60 * 24));
            const hours = Math.floor((timeRemaining % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const minutes = Math.floor((timeRemaining % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((timeRemaining % (1000 * 60)) / 1000);
            
            // Format with leading zeros
            const format = (num) => num.toString().padStart(2, '0');
            
            // Update both countdowns
            updateCountdownElements(
                format(days),
                format(hours),
                format(minutes),
                format(seconds)
            );
        }
        
        function updateCountdownElements(days, hours, minutes, seconds) {
            // Update hero countdown
            updateElement('hero-days', days);
            updateElement('hero-hours', hours);
            updateElement('hero-minutes', minutes);
            updateElement('hero-seconds', seconds);
            
            // Update secondary countdown
            updateElement('secondary-days', days);
            updateElement('secondary-hours', hours);
            updateElement('secondary-minutes', minutes);
            updateElement('secondary-seconds', seconds);
        }
        
        function updateElement(id, newValue) {
            const element = document.getElementById(id);
            if (element && element.textContent !== newValue) {
                // Add animation class
                element.classList.add('countdown-update');
                element.textContent = newValue;
                
                // Remove animation class after animation completes
                setTimeout(() => {
                    element.classList.remove('countdown-update');
                }, 600);
            }
        }
        
        function showWeddingDayMessage() {
            const countdownContainers = document.querySelectorAll('.countdown-container');
            countdownContainers.forEach(container => {
                container.innerHTML = `
                    <div class="wedding-day-message">
                        <i class="fas fa-heart" style="color: var(--color-gold); font-size: 3rem; margin-bottom: 1rem;"></i>
                        <h3 style="color: var(--color-gold);">Today's the Day!</h3>
                        <p>We're getting married!</p>
                    </div>
                `;
            });
        }
        
        // Initial update
        updateCountdown();
        
        // Update every second
        setInterval(updateCountdown, 1000);
    }

    // ============================================
    // LANGUAGE SWITCHING
    // ============================================
    
    // ============================================
    // INTERACTIVE CALENDAR
    // ============================================
    
    function initializeInteractiveCalendar() {
        const monthNames = ["January", "February", "March", "April", "May", "June",
            "July", "August", "September", "October", "November", "December"];
        
        let currentMonth = 0; // January
        let currentYear = 2026;
        const weddingDay = 10; // January 16th
        const today = new Date();
        
        function renderCalendar() {
            const firstDay = new Date(currentYear, currentMonth, 1).getDay();
            const daysInMonth = new Date(currentYear, currentMonth + 1, 0).getDate();
            
            document.getElementById('currentMonth').textContent = `${monthNames[currentMonth]} ${currentYear}`;
            
            const calendarDays = document.getElementById('calendarDays');
            calendarDays.innerHTML = '';
            
            // Empty cells for days before month starts
            for (let i = 0; i < firstDay; i++) {
                const emptyDay = document.createElement('div');
                emptyDay.className = 'calendar-day';
                calendarDays.appendChild(emptyDay);
            }
            
            // Days of the month
            for (let day = 1; day <= daysInMonth; day++) {
                const dayElement = document.createElement('div');
                dayElement.className = 'calendar-day';
                dayElement.textContent = day;
                
                // Check if it's today
                const currentDate = new Date(currentYear, currentMonth, day);
                if (currentDate.toDateString() === today.toDateString()) {
                    dayElement.classList.add('today');
                }
                
                // Check if it's wedding day
                if (currentMonth === 0 && day === weddingDay && currentYear === 2026) {
                    dayElement.classList.add('wedding-day');
                    dayElement.title = 'Wedding Day! 💍';
                }
                
                dayElement.addEventListener('click', () => {
                    if (dayElement.classList.contains('wedding-day')) {
                        showWeddingDayInfo();
                    }
                });
                
                calendarDays.appendChild(dayElement);
            }
        }
        
        function showWeddingDayInfo() {
            alert('🎉 This is our wedding day! January 10, 2026 at 5:00 PM at Noora Resort, Bishoftu. We can\'t wait to celebrate with you!');
        }
        
        // Navigation event listeners
        document.getElementById('prevMonth').addEventListener('click', () => {
            currentMonth--;
            if (currentMonth < 0) {
                currentMonth = 11;
                currentYear--;
            }
            renderCalendar();
        });
        
        document.getElementById('nextMonth').addEventListener('click', () => {
            currentMonth++;
            if (currentMonth > 11) {
                currentMonth = 0;
                currentYear++;
            }
            renderCalendar();
        });
        
        // Initial render
        renderCalendar();
    }

    // ============================================
    // RSVP FUNCTIONALITY
    // ============================================
    
    window.rsvpResponse = function(response) {
        if (response === 'accept') {
            showNotification('🎉 Thank you for accepting our invitation! We\'re so excited to celebrate with you. You\'ll receive more details soon.', 'success');
        } else {
            showNotification('💙 Thank you for letting us know. We\'ll miss you on our special day, but we understand.', 'info');
        }
    };

    // ============================================
    // ADD TO CALENDAR FUNCTIONALITY
    // ============================================
    
    window.addToCalendar = function() {
        const event = {
            title: 'Hawariya & Tsion Wedding',
            start: '20260116T150000Z',
            end: '20260116T230000Z',
            description: 'Wedding ceremony and reception at Noora Resort, Bishoftu',
            location: 'Noora Resort, Bishoftu, Ethiopia'
        };
        
        const googleCalendarUrl = `https://calendar.google.com/calendar/render?action=TEMPLATE&text=${encodeURIComponent(event.title)}&dates=${event.start}/${event.end}&details=${encodeURIComponent(event.description)}&location=${encodeURIComponent(event.location)}`;
        
        window.open(googleCalendarUrl, '_blank');
        showNotification('📅 Opening Google Calendar to add our wedding to your calendar!', 'success');
    };

    // ============================================
    // MAP FUNCTIONALITY
    // ============================================
    
    window.openDirections = function() {
        const destination = 'Noora Resort, Bishoftu, Ethiopia';
        const googleMapsUrl = `https://www.google.com/maps/dir/?api=1&destination=${encodeURIComponent(destination)}`;
        window.open(googleMapsUrl, '_blank');
        showNotification('🗺️ Opening directions to Noora Resort in Google Maps!', 'success');
    };

    window.openStreetView = function() {
        const location = 'Noora Resort, Bishoftu, Ethiopia';
        const streetViewUrl = `https://www.google.com/maps/@8.739697,38.975649,3a,75y,90t/data=!3m6!1e1!3m4!1s${encodeURIComponent(location)}`;
        window.open(streetViewUrl, '_blank');
        showNotification('👀 Opening street view of Noora Resort!', 'success');
    };

    // ============================================
    // NOTIFICATION SYSTEM
    // ============================================
    
    function showNotification(message, type = 'info') {
        // Create notification element
        const notification = document.createElement('div');
        notification.style.cssText = `
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 9999;
            background: ${type === 'success' ? '#4CAF50' : type === 'error' ? '#f44336' : '#2196F3'};
            color: white;
            padding: 1rem 1.5rem;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            transform: translateX(100%);
            transition: transform 0.3s ease;
            max-width: 350px;
            font-weight: 500;
        `;
        
        notification.textContent = message;
        document.body.appendChild(notification);
        
        // Animate in
        setTimeout(() => {
            notification.style.transform = 'translateX(0)';
        }, 100);
        
        // Auto remove after 4 seconds
        setTimeout(() => {
            notification.style.transform = 'translateX(100%)';
            setTimeout(() => {
                document.body.removeChild(notification);
            }, 300);
        }, 4000);
    }

    // ============================================
    // ENHANCED INITIALIZATION
    // ============================================
    
    // Update the main initialization
    document.addEventListener('DOMContentLoaded', function() {
        console.log('Enhanced wedding website initialized');
        
        // Initialize countdown timers
        initializeCountdown();
        
        // Initialize interactive calendar
        initializeInteractiveCalendar();
        
        // Initialize scroll animations
        initScrollAnimations();
        
        // Initialize guest information
        initializeGuestInfo();
        
        // Add scroll indicator functionality
        initScrollIndicator();
        
        // Initialize service worker for caching
        initializeServiceWorker();
        
        // Show welcome message
        setTimeout(() => {
            showNotification('💍 Welcome to Hawariya & Tsion\'s wedding website! Explore all the details about our special day.', 'success');
        }, 2000);
    });
    
    // ============================================
    // SERVICE WORKER FOR IMAGE CACHING
    // ============================================
    
    function initializeServiceWorker() {
        if ('serviceWorker' in navigator) {
            // Register service worker for image caching
            navigator.serviceWorker.register('/sw.js')
                .then(registration => {
                    console.log('Service Worker registered successfully');
                    
                    // Preload additional gallery images in background
                    setTimeout(() => {
                        preloadGalleryImages();
                    }, 3000); // Wait 3 seconds after page load
                })
                .catch(error => {
                    console.log('Service Worker registration failed');
                });
        }
    }
    
    function preloadGalleryImages() {
        const galleryImages = [
            '/Images/gallery/QE9A0254.png',
            '/Images/gallery/QE9A0257.png',
            '/Images/gallery/QE9A0264.png',
            '/Images/gallery/QE9A0272.png',
            '/Images/gallery/QE9A0291.png',
            '/Images/gallery/QE9A0295.png',
            '/Images/gallery/QE9A0307.png',
            '/Images/gallery/QE9A0311.png'
        ];
        
        if ('serviceWorker' in navigator && navigator.serviceWorker.controller) {
            const messageChannel = new MessageChannel();
            
            messageChannel.port1.onmessage = function(event) {
                if (event.data.success) {
                    console.log('Gallery images preloaded successfully');
                }
            };
            
            navigator.serviceWorker.controller.postMessage({
                type: 'PRELOAD_IMAGES',
                images: galleryImages
            }, [messageChannel.port2]);
        }
    }

    // ============================================
    // IMAGE OPTIMIZATION FUNCTIONS
    // ============================================
    
    function initializeImageOptimization() {
        // Progressive hero image loading
        loadHeroImage();
        
        // Initialize lazy loading for other images
        initializeLazyLoading();
        
        // Preload critical images
        preloadCriticalImages();
        
        // Optimize background images
        optimizeBackgroundImages();
    }
    
    function loadHeroImage() {
        const heroSection = document.querySelector('.hero-section');
        
        // Check if the background image is already loaded
        const testImage = new Image();
        
        testImage.onload = function() {
            // Image loaded successfully, hide the overlay
            setTimeout(() => {
                heroSection.classList.add('loaded');
            }, 500); // Small delay for smooth transition
            console.log('Hero image loaded successfully');
        };
        
        testImage.onerror = function() {
            // Image failed to load, keep the gradient overlay
            console.warn('Hero image failed to load, keeping gradient fallback');
            heroSection.classList.add('loaded');
        };
        
        // Test if the hero image can be loaded
        testImage.src = '/Images/gallery/bride-groom-hero.jpg';
    }
    
    function initializeLazyLoading() {
        // Create intersection observer for lazy loading
        const imageObserver = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const img = entry.target;
                    loadImageWithFallback(img);
                    observer.unobserve(img);
                }
            });
        }, {
            rootMargin: '50px 0px',
            threshold: 0.01
        });
        
        // Observe all lazy images
        document.querySelectorAll('[data-lazy-src]').forEach(img => {
            imageObserver.observe(img);
        });
    }
    
    function loadImageWithFallback(img) {
        const src = img.dataset.lazySrc;
        const fallback = img.dataset.fallback;
        
        const tempImg = new Image();
        tempImg.onload = function() {
            img.src = src;
            img.classList.add('loaded');
        };
        
        tempImg.onerror = function() {
            if (fallback) {
                img.src = fallback;
            }
            img.classList.add('loaded');
        };
        
        tempImg.src = src;
    }
    
    function preloadCriticalImages() {
        const criticalImages = [
            '/Images/gallery/QE9A0402.png',
            '/Images/gallery/QE9A0404.png',
            '/Images/gallery/QE9A0346.png'
        ];
        
        criticalImages.forEach(src => {
            const link = document.createElement('link');
            link.rel = 'preload';
            link.as = 'image';
            link.href = src;
            document.head.appendChild(link);
        });
    }
    
    function optimizeBackgroundImages() {
        // Add loading states for elements with background images
        const bgElements = document.querySelectorAll('[data-bg-src]');
        
        bgElements.forEach(element => {
            const src = element.dataset.bgSrc;
            const img = new Image();
            
            img.onload = function() {
                element.style.backgroundImage = `url('${src}')`;
                element.classList.add('bg-loaded');
            };
            
            img.src = src;
        });
    }
    
    // ============================================
    // WEBP SUPPORT DETECTION
    // ============================================
    
    function detectWebPSupport() {
        return new Promise((resolve) => {
            const webP = new Image();
            webP.onload = webP.onerror = function () {
                resolve(webP.height === 2);
            };
            webP.src = 'data:image/webp;base64,UklGRjoAAABXRUJQVlA4IC4AAACyAgCdASoCAAIALmk0mk0iIiIiIgBoSygABc6WWgAA/veff/0PP8bA//LwYAAA';
        });
    }
    
    // Initialize WebP support
    detectWebPSupport().then(hasWebP => {
        if (hasWebP) {
            document.documentElement.classList.add('webp');
            console.log('WebP support detected');
        } else {
            document.documentElement.classList.add('no-webp');
            console.log('WebP not supported, using fallback formats');
        }
    });
    
    // ============================================
    // IMAGE COMPRESSION AND CACHING
    // ============================================
    
    function createOptimizedImageUrl(originalUrl, width = null, quality = 85) {
        // This would typically connect to an image optimization service
        // For now, we'll use the original URL with cache busting
        const url = new URL(originalUrl, window.location.origin);
        
        if (width) {
            url.searchParams.set('w', width);
        }
        url.searchParams.set('q', quality);
        
        return url.toString();
    }
    
    function getResponsiveImageSrc(basePath, screenWidth) {
        // Return appropriate image size based on screen width
        if (screenWidth <= 480) {
            return basePath.replace('.png', '_mobile.png');
        } else if (screenWidth <= 768) {
            return basePath.replace('.png', '_tablet.png');
        }
        return basePath; // Full size for desktop
    }
    
    // ============================================
    // PERFORMANCE MONITORING
    // ============================================
    
    function monitorImagePerformance() {
        // Monitor image loading performance
        const observer = new PerformanceObserver((list) => {
            list.getEntries().forEach((entry) => {
                if (entry.initiatorType === 'img') {
                    console.log(`Image loaded: ${entry.name} in ${entry.duration}ms`);
                }
            });
        });
        
        observer.observe({ entryTypes: ['resource'] });
    }
    
    // Initialize performance monitoring
    if ('PerformanceObserver' in window) {
        monitorImagePerformance();
    }
    
    // ============================================
    // ADAPTIVE IMAGE QUALITY
    // ============================================
    
    function getConnectionSpeed() {
        if ('connection' in navigator) {
            const connection = navigator.connection;
            return {
                effectiveType: connection.effectiveType,
                downlink: connection.downlink,
                saveData: connection.saveData
            };
        }
        return { effectiveType: '4g', downlink: 10, saveData: false };
    }
    
    function adaptImageQuality() {
        const connection = getConnectionSpeed();
        let quality = 85; // Default quality
        
        // Adjust quality based on connection
        if (connection.saveData || connection.effectiveType === 'slow-2g') {
            quality = 60;
        } else if (connection.effectiveType === '2g') {
            quality = 70;
        } else if (connection.effectiveType === '3g') {
            quality = 80;
        }
        
        // Store quality setting for image loading
        window.imageQuality = quality;
        
        console.log(`Image quality set to ${quality}% based on connection: ${connection.effectiveType}`);
    }
    
    // Initialize adaptive quality
    adaptImageQuality();
    
    // ============================================
    // IMAGE LOADING PROGRESS INDICATOR
    // ============================================
    
    function showImageLoadingProgress() {
        let loadedImages = 0;
        let totalImages = 0;
        
        // Count total images to load
        document.querySelectorAll('img, [data-lazy-src], [data-bg-src]').forEach(() => {
            totalImages++;
        });
        
        function updateProgress() {
            loadedImages++;
            const progress = (loadedImages / totalImages) * 100;
            
            // Update progress indicator if it exists
            const progressBar = document.querySelector('.image-loading-progress');
            if (progressBar) {
                progressBar.style.width = `${progress}%`;
            }
            
            if (loadedImages === totalImages) {
                console.log('All images loaded successfully');
                document.body.classList.add('images-loaded');
            }
        }
        
        // Listen for image load events
        document.addEventListener('load', updateProgress, true);
    }
    
    // Initialize progress tracking
    showImageLoadingProgress();

    // ============================================
    // MISSING FUNCTION IMPLEMENTATIONS
    // ============================================
    
    function initScrollAnimations() {
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };
        
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.remove('opacity-0', 'translate-y-4');
                    entry.target.classList.add('opacity-100', 'translate-y-0');
                }
            });
        }, observerOptions);
        
        // Observe elements with animation classes
        document.querySelectorAll('.opacity-0').forEach(el => {
            observer.observe(el);
        });
    }
    
    function initializeGuestInfo() {
        // Initialize guest count and status
        const guestCount = document.querySelector('.guest-count');
        const guestStatus = document.querySelector('.guest-status');
        
        if (guestCount) {
            // You can update this with actual guest data
            guestCount.innerHTML = `
                <i class="fas fa-users"></i>
                <span>Expected Guests: 150</span>
            `;
        }
        
        if (guestStatus) {
            guestStatus.innerHTML = `
                <i class="fas fa-check-circle accepted"></i>
                <span>RSVP Status: Pending</span>
            `;
        }
    }
    
    function initScrollIndicator() {
        const scrollIndicator = document.querySelector('.scroll-indicator');
        if (scrollIndicator) {
            scrollIndicator.addEventListener('click', () => {
                document.querySelector('#invitation').scrollIntoView({
                    behavior: 'smooth'
                });
            });
        }
    }

    // ============================================
    // LANGUAGE SWITCHING IMPLEMENTATION
    // ============================================
    
    window.switchLanguage = function(lang) {
        const englishContent = document.getElementById('invitation-en');
        const amharicContent = document.getElementById('invitation-am');
        
        if (lang === 'en') {
            englishContent.classList.add('active');
            amharicContent.classList.remove('active');
        } else {
            englishContent.classList.remove('active');
            amharicContent.classList.add('active');
        }
        
        // Update calendar if needed
        if (typeof initializeInteractiveCalendar === 'function') {
            initializeInteractiveCalendar();
        }
        
        showNotification(
            lang === 'en' ? 
            '🇺🇸 Language switched to English' : 
            '🇪🇹 ቋንቋ ወደ አማርኛ ተቀይሯል', 
            'success'
        );
    };

    window.switchLanguage = function(lang) {
        console.log('Switching language to:', lang);
        
        // Hide all language content
        document.querySelectorAll('.lang-content').forEach(content => {
            content.classList.remove('active');
        });
        
        // Show selected language content
        const targetElement = document.getElementById(`invitation-${lang}`);
        if (targetElement) {
            targetElement.classList.add('active');
        }
        
        // Update URL parameter for sharing
        updateUrlLanguageParameter(lang);
        
        // Trigger custom event for analytics
        document.dispatchEvent(new CustomEvent('languageChanged', { 
            detail: { language: lang } 
        }));
    };
    
    function updateUrlLanguageParameter(lang) {
        const url = new URL(window.location);
        url.searchParams.set('lang', lang);
        window.history.replaceState({}, '', url);
    }

    // ============================================
    // MAP FUNCTIONS
    // ============================================
    
    window.openDirections = function() {
        const venueLat = 8.7396972;
        const venueLng = 38.9732099;
        const venueName = encodeURIComponent('Noora Resort, Bishoftu, Ethiopia');
        
        // Google Maps directions URL
        const directionsUrl = `https://www.google.com/maps/dir/?api=1&destination=${venueLat},${venueLng}&destination_place_id=${venueName}`;
        
        // Open in new tab
        window.open(directionsUrl, '_blank', 'noopener,noreferrer');
        
        // Log event
        console.log('Opening directions to wedding venue');
    };
    
    window.openStreetView = function() {
        const venueLat = 8.7396972;
        const venueLng = 38.9732099;
        const heading = 210; // Direction the camera is pointing
        const pitch = 10;    // Camera angle
        const fov = 90;      // Field of view
        
        // Google Maps Street View URL
        const streetViewUrl = `https://www.google.com/maps/@?api=1&map_action=pano&viewpoint=${venueLat},${venueLng}&heading=${heading}&pitch=${pitch}&fov=${fov}`;
        
        // Open in new tab
        window.open(streetViewUrl, '_blank', 'noopener,noreferrer');
        
        // Log event
        console.log('Opening Street View for wedding venue');
    };

    // ============================================
    // COPY TO CLIPBOARD
    // ============================================
    
    window.copyInvitationLink = function(event) {
        const linkText = document.getElementById('invitation-link').textContent;
        copyToClipboard(linkText, event);
    };
    
    window.copyInvitationLinkAm = function(event) {
        const linkText = document.getElementById('invitation-link-am').textContent;
        copyToClipboard(linkText, event);
    };
    
    function copyToClipboard(text, event) {
        navigator.clipboard.writeText(text).then(() => {
            // Show success feedback
            const btn = event.target.closest('.copy-btn');
            const originalHTML = btn.innerHTML;
            const originalBg = btn.style.background;
            
            btn.innerHTML = '<i class="fas fa-check"></i> <span>Copied!</span>';
            btn.style.background = '#4CAF50';
            
            // Revert after 2 seconds
            setTimeout(() => {
                btn.innerHTML = originalHTML;
                btn.style.background = originalBg;
            }, 2000);
            
            // Show notification
            showNotification('Link copied to clipboard!', 'success');
            
        }).catch(err => {
            console.error('Failed to copy: ', err);
            
            // Fallback for older browsers
            const textArea = document.createElement('textarea');
            textArea.value = text;
            document.body.appendChild(textArea);
            textArea.select();
            
            try {
                document.execCommand('copy');
                showNotification('Link copied to clipboard!', 'success');
            } catch (fallbackErr) {
                console.error('Fallback copy failed: ', fallbackErr);
                showNotification('Please copy the link manually', 'error');
            }
            
            document.body.removeChild(textArea);
        });
    }
    
    function showNotification(message, type) {
        // Create notification element
        const notification = document.createElement('div');
        notification.className = `notification notification-${type}`;
        notification.innerHTML = `
            <i class="fas fa-${type === 'success' ? 'check-circle' : 'exclamation-circle'}"></i>
            <span>${message}</span>
        `;
        
        // Add styles
        notification.style.cssText = `
            position: fixed;
            top: 20px;
            right: 20px;
            background: ${type === 'success' ? '#4CAF50' : '#f44336'};
            color: white;
            padding: 15px 20px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
            display: flex;
            align-items: center;
            gap: 10px;
            z-index: 10000;
            animation: slideIn 0.3s ease;
        `;
        
        document.body.appendChild(notification);
        
        // Remove after 3 seconds
        setTimeout(() => {
            notification.style.animation = 'slideOut 0.3s ease';
            setTimeout(() => {
                document.body.removeChild(notification);
            }, 300);
        }, 3000);
    }

    // ============================================
    // GUEST INFORMATION
    // ============================================
    
    function initializeGuestInfo() {
        // Get guest information from URL parameters or localStorage
        const urlParams = new URLSearchParams(window.location.search);
        const guestId = urlParams.get('guest') || localStorage.getItem('weddingGuestId') || 'guest-' + Math.random().toString(36).substr(2, 9);
        const guestName = urlParams.get('name') || localStorage.getItem('weddingGuestName') || 'Guest';
        const guestCount = urlParams.get('guests') || localStorage.getItem('weddingGuestCount') || '2';
        const rsvpStatus = urlParams.get('rsvp') || localStorage.getItem('weddingRSVPStatus') || 'pending';
        
        // Save to localStorage for future visits
        localStorage.setItem('weddingGuestId', guestId);
        localStorage.setItem('weddingGuestName', guestName);
        localStorage.setItem('weddingGuestCount', guestCount);
        localStorage.setItem('weddingRSVPStatus', rsvpStatus);
        
        // Generate personalized invitation link
        const invitationLink = generateInvitationLink(guestId, guestName);
        
        // Update invitation links
        const linkElementEn = document.getElementById('invitation-link');
        const linkElementAm = document.getElementById('invitation-link-am');
        
        if (linkElementEn) linkElementEn.textContent = invitationLink;
        if (linkElementAm) linkElementAm.textContent = invitationLink;
        
        // Update guest info display
        updateGuestInfoDisplay(guestCount, rsvpStatus);
    }
    
    function generateInvitationLink(guestId, guestName) {
        const baseUrl = window.location.origin + window.location.pathname;
        const params = new URLSearchParams({
            guest: guestId,
            name: encodeURIComponent(guestName),
            ref: 'invitation'
        });
        return `${baseUrl}?${params.toString()}`;
    }
    
    function updateGuestInfoDisplay(guestCount, rsvpStatus) {
        const guestInfo = document.querySelector('.guest-info');
        if (!guestInfo) return;
        
        // Update guest count
        const countElement = guestInfo.querySelector('.guest-count strong');
        if (countElement) countElement.textContent = guestCount;
        
        // Update RSVP status
        const statusElement = guestInfo.querySelector('.guest-status');
        if (statusElement) {
            let icon, text, color;
            
            switch (rsvpStatus) {
                case 'accepted':
                    icon = 'check-circle';
                    text = 'Invitation Accepted';
                    color = '#4CAF50';
                    break;
                case 'declined':
                    icon = 'times-circle';
                    text = 'Regretfully Declined';
                    color = '#f44336';
                    break;
                default:
                    icon = 'clock';
                    text = 'Awaiting Response';
                    color = '#FF9800';
            }
            
            statusElement.innerHTML = `
                <i class="fas fa-${icon}" style="color: ${color};"></i>
                <span>${text}</span>
            `;
        }
    }

    // ============================================
    // ANIMATIONS & SCROLL EFFECTS
    // ============================================
    
    function initScrollAnimations() {
        // Add CSS for animation classes
        const style = document.createElement('style');
        style.textContent = `
            .countdown-update {
                animation: pulse 0.6s ease;
            }
            
            @keyframes pulse {
                0% { transform: scale(1); }
                50% { transform: scale(1.1); }
                100% { transform: scale(1); }
            }
            
            @keyframes slideIn {
                from { transform: translateX(100%); opacity: 0; }
                to { transform: translateX(0); opacity: 1; }
            }
            
            @keyframes slideOut {
                from { transform: translateX(0); opacity: 1; }
                to { transform: translateX(100%); opacity: 0; }
            }
            
            .fade-in {
                opacity: 0;
                transform: translateY(20px);
                transition: opacity 0.6s ease, transform 0.6s ease;
            }
            
            .fade-in.visible {
                opacity: 1;
                transform: translateY(0);
            }
        `;
        document.head.appendChild(style);
        
        // Initialize intersection observer for scroll animations
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                    
                    // Handle special elements
                    if (entry.target.classList.contains('opacity-0')) {
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'translateY(0)';
                    }
                }
            });
        }, {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        });
        
        // Observe all elements with fade-in class
        document.querySelectorAll('.fade-in, .opacity-0').forEach(el => {
            observer.observe(el);
        });
        
        // Trigger initial animations for hero elements
        document.querySelectorAll('.animate-fade-in-up').forEach((el, index) => {
            setTimeout(() => {
                el.style.animationDelay = `${index * 0.1}s`;
            }, 100);
        });
    }
    
    function initScrollIndicator() {
        const scrollIndicator = document.querySelector('.scroll-indicator');
        if (!scrollIndicator) return;
        
        // Hide on scroll
        let lastScroll = 0;
        window.addEventListener('scroll', () => {
            const currentScroll = window.pageYOffset;
            
            if (currentScroll > 100) {
                scrollIndicator.style.opacity = '0';
                scrollIndicator.style.pointerEvents = 'none';
            } else {
                scrollIndicator.style.opacity = '1';
                scrollIndicator.style.pointerEvents = 'auto';
            }
            
            lastScroll = currentScroll;
        });
        
        // Smooth scroll to invitation section on click
        scrollIndicator.addEventListener('click', () => {
            const invitationSection = document.getElementById('invitation');
            if (invitationSection) {
                invitationSection.scrollIntoView({ 
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    }

    // ============================================
    // SHARE FUNCTIONALITY
    // ============================================
    
    function shareInvitation() {
        const shareData = {
            title: 'Hawariya & Tsion Wedding Invitation',
            text: 'You are invited to celebrate our wedding!',
            url: window.location.href
        };
        
        if (navigator.share && navigator.canShare(shareData)) {
            navigator.share(shareData)
                .then(() => console.log('Share successful'))
                .catch(err => console.log('Share failed:', err));
        } else {
            // Fallback: copy to clipboard
            const linkText = document.getElementById('invitation-link').textContent;
            copyToClipboard(linkText, { target: { closest: () => ({ innerHTML: 'Share' }) } });
        }
    }

    // ============================================
    // PRINT FUNCTIONALITY
    // ============================================
    
    function printInvitation() {
        const printContent = document.querySelector('.invitation-card.active').cloneNode(true);
        
        // Remove interactive elements for print
        const elementsToRemove = printContent.querySelectorAll('.map-controls, .copy-btn, .map-info-panel');
        elementsToRemove.forEach(el => el.remove());
        
        // Open print dialog
        const printWindow = window.open('', '_blank');
        printWindow.document.write(`
            <html>
                <head>
                    <title>Wedding Invitation - Hawariya & Tsion</title>
                    <style>
                        body { font-family: Arial, sans-serif; padding: 20px; }
                        .invitation-card { border: 2px solid #D4AF37; padding: 30px; max-width: 800px; margin: 0 auto; }
                        h1, h2, h3 { color: #333; }
                        .gold { color: #D4AF37; }
                        @media print {
                            body { padding: 0; }
                            .no-print { display: none; }
                        }
                    </style>
                </head>
                <body>
                    ${printContent.innerHTML}
                    <div class="no-print" style="text-align: center; margin-top: 20px;">
                        <button onclick="window.print()">Print Invitation</button>
                        <button onclick="window.close()">Close</button>
                    </div>
                </body>
            </html>
        `);
        printWindow.document.close();
    }

    // ============================================
    // ADDITIONAL FEATURES
    // ============================================
    
    // Add to Calendar functionality
    function addToCalendar() {
        const event = {
            title: 'Hawariya & Tsion Wedding',
            description: 'Wedding celebration of Hawariya Mulugeta and Dr. Tsion Mekasha',
            location: 'Noora Resort, Bishoftu, Ethiopia',
            startTime: '2026-01-16T15:00:00',
            endTime: '2026-01-16T23:00:00'
        };
        
        // Create .ics file
        const icsContent = [
            'BEGIN:VCALENDAR',
            'VERSION:2.0',
            'PRODID:-//Wedding//Invitation//EN',
            'BEGIN:VEVENT',
            `SUMMARY:${event.title}`,
            `DESCRIPTION:${event.description}`,
            `LOCATION:${event.location}`,
            `DTSTART:${event.startTime.replace(/[-:]/g, '')}`,
            `DTEND:${event.endTime.replace(/[-:]/g, '')}`,
            'UID:' + Date.now() + '@wedding.example.com',
            'END:VEVENT',
            'END:VCALENDAR'
        ].join('\r\n');
        
        const blob = new Blob([icsContent], { type: 'text/calendar;charset=utf-8' });
        const url = URL.createObjectURL(blob);
        
        const link = document.createElement('a');
        link.href = url;
        link.download = 'wedding-invitation.ics';
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
        URL.revokeObjectURL(url);
    }

    // Weather API integration (example)
    async function getWeddingWeather() {
        try {
            const response = await fetch(`https://api.openweathermap.org/data/2.5/weather?lat=8.7396972&lon=38.9732099&appid=YOUR_API_KEY&units=metric`);
            const data = await response.json();
            
            if (data.weather && data.main) {
                console.log('Wedding day weather forecast:', {
                    temp: data.main.temp,
                    description: data.weather[0].description,
                    icon: data.weather[0].icon
                });
                
                // You could display this information on the page
                // const weatherElement = document.createElement('div');
                // weatherElement.innerHTML = `
                //     <i class="fas fa-cloud-sun"></i>
                //     <span>${Math.round(data.main.temp)}°C, ${data.weather[0].description}</span>
                // `;
                // document.querySelector('.invitation-footer').appendChild(weatherElement);
            }
        } catch (error) {
            console.error('Weather API error:', error);
        }
    }

    // Initialize weather on page load
    // getWeddingWeather(); // Uncomment and add API key to use

</script>

<!-- Additional CSS for animations -->
<style>
    .countdown-update {
        animation: pulse 0.6s ease;
    }
    
    @keyframes pulse {
        0% { transform: scale(1); }
        50% { transform: scale(1.1); }
        100% { transform: scale(1); }
    }
    
    .fade-in {
        opacity: 0;
        transform: translateY(20px);
        transition: opacity 0.6s ease, transform 0.6s ease;
    }
    
    .fade-in.visible {
        opacity: 1;
        transform: translateY(0);
    }
    
    .notification {
        position: fixed;
        top: 20px;
        right: 20px;
        background: #4CAF50;
        color: white;
        padding: 15px 20px;
        border-radius: 8px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        display: flex;
        align-items: center;
        gap: 10px;
        z-index: 10000;
        animation: slideIn 0.3s ease;
    }
    
    .notification-error {
        background: #f44336;
    }
    
    @keyframes slideIn {
        from { transform: translateX(100%); opacity: 0; }
        to { transform: translateX(0); opacity: 1; }
    }
    
    @keyframes slideOut {
        from { transform: translateX(0); opacity: 1; }
        to { transform: translateX(100%); opacity: 0; }
    }
</style>
@endsection