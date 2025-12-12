/* ========== CSS Reset & Base Styles ========== */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

:root {
    /* Color Palette */
    --color-light-blue: #E6F2FF;
    --color-gold: #D4AF37;
    --color-dark-gold: #B8860B;
    --color-gray: #F5F5F5;
    --color-dark-gray: #333333;
    --color-white: #FFFFFF;
    --color-black: #000000;
    
    /* Typography */
    --font-serif: 'Playfair Display', serif;
    --font-sans: 'Inter', sans-serif;
    
    /* Spacing */
    --space-xs: 0.5rem;
    --space-sm: 1rem;
    --space-md: 1.5rem;
    --space-lg: 2rem;
    --space-xl: 3rem;
    --space-2xl: 4rem;
    
    /* Border Radius */
    --radius-sm: 0.5rem;
    --radius-md: 1rem;
    --radius-lg: 1.5rem;
    --radius-full: 9999px;
    
    /* Transitions */
    --transition-fast: 0.2s ease;
    --transition-normal: 0.3s ease;
    --transition-slow: 0.5s ease;
    
    /* Shadows */
    --shadow-sm: 0 2px 4px rgba(0, 0, 0, 0.1);
    --shadow-md: 0 4px 12px rgba(0, 0, 0, 0.15);
    --shadow-lg: 0 8px 24px rgba(0, 0, 0, 0.2);
    --shadow-xl: 0 12px 36px rgba(0, 0, 0, 0.25);
    
    /* Z-index layers */
    --z-dropdown: 1000;
    --z-sticky: 1020;
    --z-fixed: 1030;
    --z-modal-backdrop: 1040;
    --z-modal: 1050;
    --z-popover: 1060;
    --z-tooltip: 1070;
}

html {
    font-size: 16px;
    scroll-behavior: smooth;
}

body {
    font-family: var(--font-sans);
    font-weight: 400;
    line-height: 1.6;
    color: var(--color-dark-gray);
    background-color: var(--color-gray);
    background-image: url("data:image/svg+xml,%3Csvg width='100' height='100' viewBox='0 0 100 100' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M11 18c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm48 25c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm-43-7c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm63 31c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM34 90c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm56-76c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM12 86c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm28-65c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm23-11c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-6 60c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm29 22c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zM32 63c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm57-13c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-9-21c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM60 91c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM35 41c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM12 60c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2z' fill='%23f0f0f0' fill-opacity='0.1' fill-rule='evenodd'/%3E%3C/svg%3E");
    overflow-x: hidden;
}

h1, h2, h3, h4, h5, h6 {
    font-family: var(--font-serif);
    font-weight: 700;
    line-height: 1.2;
    margin-bottom: var(--space-md);
}

p {
    margin-bottom: var(--space-md);
}

a {
    color: inherit;
    text-decoration: none;
    transition: color var(--transition-normal);
}

img {
    max-width: 100%;
    height: auto;
    display: block;
}

.container {
    width: 100%;
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 var(--space-md);
}

.section {
    padding: var(--space-2xl) 0;
}

.text-center {
    text-align: center;
}

.flex {
    display: flex;
}

.flex-col {
    flex-direction: column;
}

.items-center {
    align-items: center;
}

.justify-center {
    justify-content: center;
}

.justify-between {
    justify-content: space-between;
}

.grid {
    display: grid;
}

.hidden {
    display: none;
}

.relative {
    position: relative;
}

.absolute {
    position: absolute;
}

.fixed {
    position: fixed;
}

.inset-0 {
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
}

.z-50 {
    z-index: var(--z-fixed);
}

.z-100 {
    z-index: var(--z-modal);
}

.opacity-0 {
    opacity: 0;
}

.opacity-100 {
    opacity: 1;
}

.transition-all {
    transition: all var(--transition-normal);
}

.translate-y-4 {
    transform: translateY(1rem);
}

.translate-y-0 {
    transform: translateY(0);
}

/* ========== Typography Utilities ========== */
.text-5xl {
    font-size: 3rem;
}

.text-4xl {
    font-size: 2.5rem;
}

.text-3xl {
    font-size: 2rem;
}

.text-2xl {
    font-size: 1.75rem;
}

.text-xl {
    font-size: 1.25rem;
}

.text-lg {
    font-size: 1.125rem;
}

.text-sm {
    font-size: 0.875rem;
}

.text-xs {
    font-size: 0.75rem;
}

.font-bold {
    font-weight: 700;
}

.font-semibold {
    font-weight: 600;
}

.font-medium {
    font-weight: 500;
}

.italic {
    font-style: italic;
}

/* ========== Color Utilities ========== */
.text-white {
    color: var(--color-white);
}

.text-gold {
    color: var(--color-gold);
}

.text-dark-gray {
    color: var(--color-dark-gray);
}

.text-light-blue {
    color: var(--color-light-blue);
}

.bg-white {
    background-color: var(--color-white);
}

.bg-gray {
    background-color: var(--color-gray);
}

.bg-light-blue {
    background-color: var(--color-light-blue);
}

.bg-dark-gray {
    background-color: var(--color-dark-gray);
}

.bg-gold {
    background-color: var(--color-gold);
}

/* ========== Custom Classes ========== */
.gold-gradient-text {
    background: linear-gradient(135deg, var(--color-gold) 0%, #FFD700 50%, #FFF8DC 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.gold-border-gradient {
    border: 2px solid;
    border-image: linear-gradient(135deg, var(--color-gold) 0%, #FFD700 100%) 1;
}

.section-divider {
    height: 1px;
    width: 100%;
    max-width: 8rem;
    margin: var(--space-lg) auto;
    background: linear-gradient(90deg, transparent, var(--color-gold), transparent);
    position: relative;
    overflow: hidden;
}

.section-divider::after {
    content: '';
    position: absolute;
    top: -50%;
    left: -50%;
    width: 200%;
    height: 200%;
    background: linear-gradient(
        to right,
        transparent 0%,
        rgba(212, 175, 55, 0.1) 50%,
        transparent 100%
    );
    transform: rotate(30deg);
    animation: shimmer 3s infinite;
}

@keyframes shimmer {
    0% { transform: translateX(-100%) rotate(30deg); }
    100% { transform: translateX(100%) rotate(30deg); }
}

.parallax {
    background-attachment: fixed;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
}

.animate-fade-in-up {
    animation: fade-in-up 0.8s ease forwards;
}

@keyframes fade-in-up {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* ========== Enhanced Navigation Styles ========== */
.main-nav {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(15px);
    box-shadow: 0 2px 20px rgba(0, 0, 0, 0.1);
    z-index: var(--z-fixed);
    padding: 1rem 0;
    transition: all 0.3s ease;
}

.nav-container {
    display: flex;
    justify-content: space-between;
    align-items: center;
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 var(--space-md);
}

.nav-brand {
    font-family: var(--font-serif);
    font-size: 1.75rem;
    font-weight: 600;
    background: linear-gradient(135deg, var(--color-gold) 0%, #FFD700 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.nav-menu {
    display: flex;
    gap: var(--space-xl);
    list-style: none;
    margin: 0;
    padding: 0;
}

.nav-link {
    color: var(--color-dark-gray);
    font-weight: 500;
    position: relative;
    padding: 0.75rem 1rem;
    transition: all var(--transition-normal);
    border-radius: 8px;
}

.nav-link:hover {
    color: var(--color-gold);
    background: rgba(212, 175, 55, 0.1);
}

.nav-link.active {
    color: var(--color-white);
    background: linear-gradient(135deg, var(--color-gold), #FFD700);
}

.mobile-menu-btn {
    display: none;
    background: linear-gradient(135deg, var(--color-gold), #FFD700);
    border: none;
    font-size: 1.2rem;
    color: var(--color-white);
    cursor: pointer;
    padding: 0.75rem;
    border-radius: 8px;
    transition: all 0.3s ease;
    box-shadow: 0 4px 15px rgba(212, 175, 55, 0.3);
}

.mobile-menu-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(212, 175, 55, 0.4);
}

/* Mobile Navigation Styles */
@media (max-width: 768px) {
    .main-nav {
        padding: 0.75rem 0;
    }
    
    .nav-brand {
        font-size: 1.5rem;
    }
    
    .mobile-menu-btn {
        display: block;
    }
    
    .nav-menu {
        position: fixed;
        top: 100%;
        left: 0;
        width: 100%;
        background: rgba(255, 255, 255, 0.98);
        backdrop-filter: blur(20px);
        flex-direction: column;
        gap: 0;
        padding: 2rem 0;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
        transform: translateY(-100%);
        opacity: 0;
        visibility: hidden;
        transition: all 0.3s ease;
        border-top: 2px solid rgba(212, 175, 55, 0.2);
    }
    
    .nav-menu.active {
        transform: translateY(0);
        opacity: 1;
        visibility: visible;
    }
    
    .nav-menu li {
        width: 100%;
        text-align: center;
    }
    
    .nav-link {
        display: block;
        padding: 1rem 2rem;
        font-size: 1.1rem;
        border-radius: 0;
        border-bottom: 1px solid rgba(212, 175, 55, 0.1);
    }
    
    .nav-link:hover {
        background: rgba(212, 175, 55, 0.1);
        transform: translateX(10px);
    }
    
    .nav-link.active {
        background: linear-gradient(135deg, var(--color-gold), #FFD700);
        color: var(--color-white);
    }
}

/* ========== Enhanced Footer Styles ========== */
.main-footer.enhanced-footer {
    background: linear-gradient(135deg, #2c3e50 0%, #34495e 50%, #2c3e50 100%);
    color: var(--color-white);
    padding: 4rem 0 2rem;
    margin-top: var(--space-2xl);
    position: relative;
    overflow: hidden;
}

.main-footer.enhanced-footer::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 3px;
    background: linear-gradient(90deg, transparent, rgba(212, 175, 55, 0.6), transparent);
}

.footer-content {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 var(--space-md);
}

.footer-wedding-info {
    margin-bottom: 3rem;
}

.footer-couple-names {
    text-align: center;
    margin-bottom: 3rem;
}

.footer-title {
    font-family: 'Playfair Display', serif;
    font-size: 2.5rem;
    font-weight: 700;
    color: var(--color-white);
    margin-bottom: 0.5rem;
    letter-spacing: -0.5px;
}

.footer-date {
    font-family: 'Inter', sans-serif;
    font-size: 1.2rem;
    color: rgba(255, 255, 255, 0.8);
    font-weight: 500;
}

.footer-contact {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 2rem;
    text-align: left;
}

.footer-section h4 {
    font-family: 'Playfair Display', serif;
    font-size: 1.3rem;
    color: var(--color-white);
    margin-bottom: 1rem;
    font-weight: 600;
}

.footer-section p {
    color: rgba(255, 255, 255, 0.8);
    margin-bottom: 0.5rem;
    font-size: 1rem;
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.footer-section i {
    color: rgba(212, 175, 55, 0.7);
    width: 16px;
}

.footer-social {
    display: flex;
    gap: 1rem;
    margin-top: 1rem;
}

.social-link {
    width: 40px;
    height: 40px;
    background: rgba(255, 255, 255, 0.1);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: rgba(255, 255, 255, 0.8);
    transition: all 0.3s ease;
    text-decoration: none;
}

.social-link:hover {
    background: rgba(212, 175, 55, 0.2);
    color: var(--color-white);
    transform: translateY(-2px);
}

.footer-divider {
    height: 1px;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
    margin: 2rem 0;
}

.footer-copyright {
    text-align: center;
    color: rgba(255, 255, 255, 0.6);
    font-size: 0.9rem;
}

.footer-copyright p {
    margin-bottom: 0.5rem;
}

.footer-credit {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.5rem;
}

.footer-credit i {
    color: #e74c3c;
    font-size: 0.8rem;
}

.footer-brand {
    color: rgba(212, 175, 55, 0.8);
    font-weight: 600;
}

/* Mobile Footer Optimization */
@media (max-width: 768px) {
    .main-footer.enhanced-footer {
        padding: 3rem 0 1.5rem;
    }
    
    .footer-contact {
        grid-template-columns: 1fr;
        text-align: center;
        gap: 2.5rem;
    }
    
    .footer-title {
        font-size: 2.2rem;
    }
    
    .footer-date {
        font-size: 1.1rem;
    }
    
    .footer-section h4 {
        font-size: 1.2rem;
        margin-bottom: 1rem;
    }
    
    .footer-section p {
        font-size: 0.95rem;
        justify-content: center;
    }
    
    .footer-social {
        justify-content: center;
    }
    
    .social-link {
        width: 45px;
        height: 45px;
    }
}

@media (max-width: 480px) {
    .main-footer.enhanced-footer {
        padding: 2rem 0 1rem;
    }
    
    .footer-title {
        font-size: 1.8rem;
    }
    
    .footer-date {
        font-size: 1rem;
    }
    
    .footer-section h4 {
        font-size: 1.1rem;
    }
    
    .footer-section p {
        font-size: 0.9rem;
    }
    
    .footer-contact {
        gap: 2rem;
    }
}

/* ========== Lightbox Styles ========== */
/* ========== Enhanced Mobile-Optimized Lightbox ========== */
.lightbox-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.95);
    display: none;
    justify-content: center;
    align-items: center;
    z-index: var(--z-modal);
    opacity: 0;
    transition: opacity var(--transition-normal);
    padding: var(--space-md);
    touch-action: manipulation;
}

.lightbox-overlay.active {
    display: flex;
    opacity: 1;
}

.lightbox-close {
    position: absolute;
    top: var(--space-lg);
    right: var(--space-lg);
    background: rgba(0, 0, 0, 0.5);
    border: none;
    color: var(--color-white);
    font-size: 1.5rem;
    cursor: pointer;
    transition: all var(--transition-normal);
    z-index: var(--z-modal);
    width: 44px;
    height: 44px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    backdrop-filter: blur(10px);
}

.lightbox-close:hover {
    color: var(--color-gold);
    background: rgba(0, 0, 0, 0.7);
}

.lightbox-nav {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    background: rgba(0, 0, 0, 0.5);
    border: none;
    color: var(--color-white);
    width: 44px;
    height: 44px;
    border-radius: 50%;
    display: flex;
    justify-content: center;
    align-items: center;
    cursor: pointer;
    transition: all var(--transition-normal);
    z-index: var(--z-modal);
    backdrop-filter: blur(10px);
}

.lightbox-nav:hover {
    background: rgba(0, 0, 0, 0.7);
    color: var(--color-gold);
}

.lightbox-prev {
    left: var(--space-lg);
}

.lightbox-next {
    right: var(--space-lg);
}

.lightbox-content {
    max-width: 95%;
    max-height: 95%;
    display: flex;
    flex-direction: column;
    align-items: center;
}

.lightbox-image {
    max-width: 100%;
    max-height: 80vh;
    object-fit: contain;
    border-radius: var(--radius-md);
    opacity: 0;
    transform: scale(0.9);
    transition: all var(--transition-normal);
    box-shadow: 0 10px 40px rgba(0, 0, 0, 0.3);
}

.lightbox-image.active {
    opacity: 1;
    transform: scale(1);
}

.lightbox-info {
    text-align: center;
    margin-top: var(--space-md);
    color: var(--color-white);
    background: rgba(0, 0, 0, 0.5);
    padding: 1rem 2rem;
    border-radius: 25px;
    backdrop-filter: blur(10px);
}

.lightbox-caption {
    font-size: 1.1rem;
    font-weight: 500;
    margin-bottom: var(--space-xs);
}

.lightbox-index {
    color: rgba(255, 255, 255, 0.8);
    font-size: 0.9rem;
    font-weight: 600;
}

/* Mobile Lightbox Optimizations */
@media (max-width: 768px) {
    .lightbox-overlay {
        padding: 1rem;
    }
    
    .lightbox-close {
        top: 1rem;
        right: 1rem;
        width: 40px;
        height: 40px;
        font-size: 1.2rem;
    }
    
    .lightbox-nav {
        width: 40px;
        height: 40px;
        font-size: 1rem;
    }
    
    .lightbox-prev {
        left: 1rem;
    }
    
    .lightbox-next {
        right: 1rem;
    }
    
    .lightbox-content {
        max-width: 100%;
        max-height: 100%;
    }
    
    .lightbox-image {
        max-height: 70vh;
        border-radius: 8px;
    }
    
    .lightbox-info {
        margin-top: 1rem;
        padding: 0.75rem 1.5rem;
        font-size: 0.9rem;
    }
    
    .lightbox-caption {
        font-size: 1rem;
    }
    
    .lightbox-index {
        font-size: 0.8rem;
    }
}

@media (max-width: 480px) {
    .lightbox-overlay {
        padding: 0.5rem;
    }
    
    .lightbox-close {
        top: 0.5rem;
        right: 0.5rem;
        width: 36px;
        height: 36px;
    }
    
    .lightbox-nav {
        width: 36px;
        height: 36px;
    }
    
    .lightbox-prev {
        left: 0.5rem;
    }
    
    .lightbox-next {
        right: 0.5rem;
    }
    
    .lightbox-image {
        max-height: 60vh;
    }
    
    .lightbox-info {
        padding: 0.5rem 1rem;
    }
}

/* ========== Countdown Styles ========== */
.countdown-container {
    display: flex;
    justify-content: center;
    gap: var(--space-lg);
    margin: var(--space-xl) 0;
}

.countdown-item {
    text-align: center;
    min-width: 6rem;
}

.countdown-number {
    font-size: 3rem;
    font-weight: 700;
    color: var(--color-white);
    margin-bottom: var(--space-xs);
    transition: all var(--transition-normal);
}

.countdown-label {
    font-size: 0.875rem;
    color: var(--color-light-blue);
    text-transform: uppercase;
    letter-spacing: 1px;
}

.countdown-number.updated {
    animation: pulse 0.6s ease;
}

@keyframes pulse {
    0% { transform: scale(1); }
    50% { transform: scale(1.1); }
    100% { transform: scale(1); }
}

/* ========== Card Styles ========== */
.card {
    background: var(--color-white);
    border-radius: var(--radius-lg);
    padding: var(--space-lg);
    box-shadow: var(--shadow-md);
    transition: all var(--transition-normal);
}

.card:hover {
    transform: translateY(-0.5rem);
    box-shadow: var(--shadow-xl);
}

/* ========== Masonry Grid Styles ========== */
.masonry-grid {
    column-count: 3;
    column-gap: var(--space-md);
}

.masonry-item {
    break-inside: avoid;
    margin-bottom: var(--space-md);
    position: relative;
    cursor: pointer;
    transition: transform var(--transition-normal);
}

.masonry-item:hover {
    transform: translateY(-0.5rem);
}

.masonry-item img {
    border-radius: var(--radius-md);
    width: 100%;
    height: auto;
}

.masonry-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(to top, rgba(0, 0, 0, 0.6), transparent);
    opacity: 0;
    transition: opacity var(--transition-normal);
    border-radius: var(--radius-md);
    display: flex;
    justify-content: center;
    align-items: center;
}

.masonry-item:hover .masonry-overlay {
    opacity: 1;
}

/* ========== Timeline Styles ========== */
.timeline {
    position: relative;
    max-width: 800px;
    margin: 0 auto;
}

.timeline::before {
    content: '';
    position: absolute;
    left: 50%;
    top: 0;
    bottom: 0;
    width: 2px;
    background: linear-gradient(to bottom, var(--color-gold), rgba(212, 175, 55, 0.5), var(--color-gold));
    transform: translateX(-50%);
}

.timeline-item {
    display: flex;
    margin-bottom: var(--space-2xl);
    position: relative;
}

.timeline-content {
    width: 45%;
    padding: var(--space-lg);
    background: var(--color-white);
    border-radius: var(--radius-lg);
    box-shadow: var(--shadow-md);
}

.timeline-item:nth-child(odd) .timeline-content {
    margin-right: auto;
    margin-left: 55%;
}

.timeline-item:nth-child(even) .timeline-content {
    margin-left: auto;
    margin-right: 55%;
}

.timeline-dot {
    position: absolute;
    left: 50%;
    top: 50%;
    width: 1.5rem;
    height: 1.5rem;
    background: var(--color-gold);
    border: 4px solid var(--color-white);
    border-radius: 50%;
    transform: translate(-50%, -50%);
}

/* ========== Orthodox Cross ========== */
.orthodox-cross {
    position: relative;
    width: 2rem;
    height: 3rem;
    margin: 0 auto var(--space-lg);
}

.orthodox-cross::before,
.orthodox-cross::after {
    content: '';
    position: absolute;
    background: var(--color-gold);
}

.orthodox-cross::before {
    width: 2rem;
    height: 0.25rem;
    top: 50%;
    left: 0;
    transform: translateY(-50%);
}

.orthodox-cross::after {
    width: 0.25rem;
    height: 3rem;
    top: 0;
    left: 50%;
    transform: translateX(-50%);
}

/* ========== Responsive Design ========== */
@media (max-width: 1024px) {
    .masonry-grid {
        column-count: 2;
    }
    
    .text-5xl {
        font-size: 2.5rem;
    }
    
    .text-4xl {
        font-size: 2rem;
    }
}

@media (max-width: 768px) {
    .mobile-menu-btn {
        display: block;
    }
    
    .nav-menu {
        position: fixed;
        top: 4rem;
        left: 0;
        width: 100%;
        background: var(--color-white);
        flex-direction: column;
        padding: var(--space-lg);
        box-shadow: var(--shadow-md);
        transform: translateY(-100%);
        opacity: 0;
        visibility: hidden;
        transition: all var(--transition-normal);
    }
    
    .nav-menu.active {
        transform: translateY(0);
        opacity: 1;
        visibility: visible;
    }
    
    .timeline::before {
        left: 1.5rem;
    }
    
    .timeline-item {
        flex-direction: column;
    }
    
    .timeline-content {
        width: 100%;
        margin: 0 0 var(--space-lg) 3rem !important;
    }
    
    .timeline-dot {
        left: 1.5rem;
    }
    
    .masonry-grid {
        column-count: 1;
    }
    
    .countdown-container {
        gap: var(--space-md);
    }
    
    .countdown-item {
        min-width: 4rem;
    }
    
    .countdown-number {
        font-size: 2rem;
    }
    
    .text-5xl {
        font-size: 2.25rem;
    }
    
    .text-4xl {
        font-size: 1.75rem;
    }
}

@media (max-width: 480px) {
    .countdown-container {
        flex-wrap: wrap;
        gap: var(--space-sm);
    }
    
    .countdown-item {
        min-width: 3rem;
    }
    
    .countdown-number {
        font-size: 1.5rem;
    }
    
    .text-5xl {
        font-size: 2rem;
    }
    
    .section {
        padding: var(--space-xl) 0;
    }
}