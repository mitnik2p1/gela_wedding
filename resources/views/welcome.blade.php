<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sarah & Michael - Wedding 2025</title>
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Dancing+Script:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary-blue: #E8F4FD;
            --accent-blue: #B8E0F5;
            --deep-blue: #4A90E2;
            --royal-blue: #2C5AA0;
            --gold: #D4AF37;
            --dark-gold: #B8860B;
            --light-gold: #F7E98E;
            --champagne: #F7E7CE;
            --pearl: #F8FAFC;
            --silver: #E2E8F0;
            --charcoal: #2D3748;
            --midnight: #1A202C;
            --rose-gold: #E8B4B8;
            --blush: #FDF2F8;
        }

        body {
            font-family: 'Poppins', sans-serif;
            line-height: 1.6;
            color: var(--charcoal);
            background: linear-gradient(135deg, var(--pearl) 0%, var(--primary-blue) 100%);
            overflow-x: hidden;
        }

        .font-script {
            font-family: 'Dancing Script', cursive;
        }

        .font-serif {
            font-family: 'Playfair Display', serif;
        }

        /* Revolutionary Glass Morphism */
        .glass-card {
            background: rgba(255, 255, 255, 0.25);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.18);
            border-radius: 20px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
        }

        .glass-nav {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(212, 175, 55, 0.1);
        }

        /* Revolutionary Animations */
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }

        @keyframes sparkle {
            0%, 100% { opacity: 0; transform: scale(0) rotate(0deg); }
            50% { opacity: 1; transform: scale(1) rotate(180deg); }
        }

        @keyframes heartbeat {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.1); }
        }

        @keyframes gradientShift {
            0%, 100% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
        }

        @keyframes slideInUp {
            from {
                opacity: 0;
                transform: translateY(50px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes bounce {
            0%, 20%, 53%, 80%, 100% { transform: translate3d(0,0,0); }
            40%, 43% { transform: translate3d(0,-30px,0); }
            70% { transform: translate3d(0,-15px,0); }
            90% { transform: translate3d(0,-4px,0); }
        }

        .animate-float { animation: float 6s ease-in-out infinite; }
        .animate-sparkle { animation: sparkle 2s ease-in-out infinite; }
        .animate-heartbeat { animation: heartbeat 2s ease-in-out infinite; }
        .animate-slide-up { animation: slideInUp 0.8s ease-out forwards; }

        /* Revolutionary Text Effects */
        .text-gradient-gold {
            background: linear-gradient(135deg, var(--gold) 0%, var(--light-gold) 50%, var(--dark-gold) 100%);
            background-size: 200% 200%;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            animation: gradientShift 4s ease-in-out infinite;
        }

        .text-gradient-blue {
            background: linear-gradient(135deg, var(--deep-blue) 0%, var(--accent-blue) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        /* Revolutionary Buttons */
        .btn-luxury {
            background: linear-gradient(135deg, var(--gold) 0%, var(--dark-gold) 100%);
            color: white;
            padding: 16px 40px;
            border: none;
            border-radius: 50px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            cursor: pointer;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            box-shadow: 0 10px 30px rgba(212, 175, 55, 0.3);
            position: relative;
            overflow: hidden;
            text-decoration: none;
            display: inline-block;
        }

        .btn-luxury::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            transition: left 0.6s;
        }

        .btn-luxury:hover::before {
            left: 100%;
        }

        .btn-luxury:hover {
            transform: translateY(-3px);
            box-shadow: 0 20px 40px rgba(212, 175, 55, 0.4);
        }

        .btn-elegant {
            background: transparent;
            color: var(--gold);
            border: 2px solid var(--gold);
            padding: 16px 40px;
            border-radius: 50px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            cursor: pointer;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            position: relative;
            overflow: hidden;
            text-decoration: none;
            display: inline-block;
        }

        .btn-elegant::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 0;
            height: 100%;
            background: var(--gold);
            transition: width 0.4s ease;
            z-index: -1;
        }

        .btn-elegant:hover::before {
            width: 100%;
        }

        .btn-elegant:hover {
            color: white;
            transform: translateY(-3px);
            box-shadow: 0 15px 35px rgba(212, 175, 55, 0.3);
        }

        /* Navigation */
        .nav-link {
            position: relative;
            padding: 12px 24px;
            border-radius: 30px;
            transition: all 0.3s ease;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-size: 14px;
            text-decoration: none;
            color: var(--charcoal);
        }

        .nav-link:hover {
            background: rgba(212, 175, 55, 0.1);
            color: var(--gold);
            transform: translateY(-2px);
        }

        .nav-link.active {
            background: linear-gradient(135deg, var(--gold) 0%, var(--dark-gold) 100%);
            color: white;
            box-shadow: 0 8px 25px rgba(212, 175, 55, 0.3);
        }

        /* Scroll Progress */
        .scroll-progress {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: linear-gradient(90deg, var(--gold) 0%, var(--deep-blue) 50%, var(--gold) 100%);
            transform-origin: left;
            transform: scaleX(0);
            transition: transform 0.3s ease;
            z-index: 9999;
        }

        /* Floating Elements */
        .floating-element {
            position: absolute;
            pointer-events: none;
            z-index: 1;
        }

        /* Sections */
        .section {
            padding: 100px 0;
            position: relative;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* Hero Section */
        .hero {
            min-height: 100vh;
            background: linear-gradient(135deg, rgba(26, 32, 44, 0.8) 0%, rgba(74, 144, 226, 0.6) 50%, rgba(212, 175, 55, 0.4) 100%),
                        url('https://images.unsplash.com/photo-1519741497674-611481863552?ixlib=rb-4.0.3&auto=format&fit=crop&w=2000&q=80');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }

        /* Utility Classes */
        .text-center { text-align: center; }
        .text-white { color: white; }
        .mb-4 { margin-bottom: 1rem; }
        .mb-6 { margin-bottom: 1.5rem; }
        .mb-8 { margin-bottom: 2rem; }
        .mb-12 { margin-bottom: 3rem; }
        .mt-8 { margin-top: 2rem; }
        .mt-12 { margin-top: 3rem; }
        .p-6 { padding: 1.5rem; }
        .p-8 { padding: 2rem; }
        .rounded-2xl { border-radius: 1rem; }
        .rounded-3xl { border-radius: 1.5rem; }
        .shadow-2xl { box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25); }
        .grid { display: grid; }
        .grid-cols-2 { grid-template-columns: repeat(2, minmax(0, 1fr)); }
        .grid-cols-4 { grid-template-columns: repeat(4, minmax(0, 1fr)); }
        .gap-6 { gap: 1.5rem; }
        .flex { display: flex; }
        .items-center { align-items: center; }
        .justify-center { justify-content: center; }
        .justify-between { justify-content: space-between; }
        .space-x-4 > * + * { margin-left: 1rem; }
        .space-x-6 > * + * { margin-left: 1.5rem; }
        .space-y-4 > * + * { margin-top: 1rem; }
        .space-y-6 > * + * { margin-top: 1.5rem; }
        .w-full { width: 100%; }
        .h-full { height: 100%; }
        .relative { position: relative; }
        .absolute { position: absolute; }
        .fixed { position: fixed; }
        .top-0 { top: 0; }
        .left-0 { left: 0; }
        .right-0 { right: 0; }
        .bottom-0 { bottom: 0; }
        .z-50 { z-index: 50; }
        .opacity-0 { opacity: 0; }
        .opacity-100 { opacity: 1; }
        .transition-all { transition: all 0.3s ease; }
        .duration-300 { transition-duration: 300ms; }
        .ease-in-out { transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1); }
        .transform { transform: translateZ(0); }
        .scale-110 { transform: scale(1.1); }
        .hover\:scale-110:hover { transform: scale(1.1); }
        .cursor-pointer { cursor: pointer; }
        .overflow-hidden { overflow: hidden; }
        .max-w-4xl { max-width: 56rem; }
        .max-w-6xl { max-width: 72rem; }
        .mx-auto { margin-left: auto; margin-right: auto; }
        .hidden { display: none; }
        .block { display: block; }
        .inline-block { display: inline-block; }
        .font-bold { font-weight: 700; }
        .font-semibold { font-weight: 600; }
        .font-medium { font-weight: 500; }
        .text-sm { font-size: 0.875rem; }
        .text-lg { font-size: 1.125rem; }
        .text-xl { font-size: 1.25rem; }
        .text-2xl { font-size: 1.5rem; }
        .text-3xl { font-size: 1.875rem; }
        .text-4xl { font-size: 2.25rem; }
        .text-5xl { font-size: 3rem; }
        .text-6xl { font-size: 3.75rem; }
        .text-7xl { font-size: 4.5rem; }
        .text-8xl { font-size: 6rem; }
        .leading-tight { line-height: 1.25; }
        .leading-relaxed { line-height: 1.625; }

        @media (min-width: 768px) {
            .md\:grid-cols-2 { grid-template-columns: repeat(2, minmax(0, 1fr)); }
            .md\:grid-cols-4 { grid-template-columns: repeat(4, minmax(0, 1fr)); }
            .md\:flex { display: flex; }
            .md\:hidden { display: none; }
            .md\:block { display: block; }
            .md\:text-6xl { font-size: 3.75rem; }
            .md\:text-7xl { font-size: 4.5rem; }
            .md\:text-8xl { font-size: 6rem; }
            .md\:p-12 { padding: 3rem; }
        }

        @media (min-width: 1024px) {
            .lg\:grid-cols-2 { grid-template-columns: repeat(2, minmax(0, 1fr)); }
            .lg\:flex { display: flex; }
            .lg\:text-9xl { font-size: 8rem; }
        }

        @media (max-width: 768px) {
            .hero {
                background-attachment: scroll;
            }
        }
    </style>
</head>

<body>
    <!-- Scroll Progress Indicator -->
    <div class="scroll-progress" id="scrollProgress"></div>
    
    <!-- Floating Decorative Elements -->
    <div class="floating-element animate-float" style="top: 20%; left: 10%; font-size: 24px; animation-delay: 0s;">💕</div>
    <div class="floating-element animate-float" style="top: 30%; right: 15%; font-size: 20px; animation-delay: 2s;">💍</div>
    <div class="floating-element animate-sparkle" style="top: 60%; left: 5%; font-size: 16px; animation-delay: 4s;">✨</div>
    <div class="floating-element animate-float" style="top: 70%; right: 8%; font-size: 24px; animation-delay: 6s;">💖</div>
    <div class="floating-element animate-sparkle" style="top: 15%; right: 25%; font-size: 16px; animation-delay: 1s;">⭐</div>
    
    <!-- Revolutionary Navigation -->
    <nav class="fixed top-0 w-full glass-nav z-50 transition-all duration-300" id="navbar">
        <div class="container">
            <div class="flex justify-between items-center" style="padding: 1.5rem 0;">
                <div class="text-3xl font-script text-gradient-gold font-bold">
                    Sarah & Michael
                </div>
                <div class="hidden md:flex space-x-4">
                    <a href="#hero" class="nav-link">Home</a>
                    <a href="#invitation" class="nav-link">Invitation</a>
                    <a href="#calendar" class="nav-link">Calendar</a>
                    <a href="#story" class="nav-link">Our Story</a>
                    <a href="#gallery" class="nav-link">Gallery</a>
                    <a href="#details" class="nav-link">Details</a>
                </div>
                <button class="md:hidden" style="padding: 12px; border-radius: 8px; background: rgba(212, 175, 55, 0.1); border: none; cursor: pointer;" onclick="toggleMobileMenu()">
                    <i class="fas fa-bars" style="color: var(--gold);"></i>
                </button>
            </div>
        </div>
    </nav>

    <!-- Revolutionary Hero Section -->
    <section id="hero" class="hero">
        <!-- Animated Background Elements -->
        <div class="absolute animate-float" style="top: 25%; left: 25%; width: 128px; height: 128px; background: rgba(212, 175, 55, 0.1); border-radius: 50%;"></div>
        <div class="absolute animate-float" style="top: 33%; right: 33%; width: 96px; height: 96px; background: rgba(232, 244, 253, 0.2); border-radius: 50%; animation-delay: 2s;"></div>
        <div class="absolute animate-float" style="bottom: 25%; left: 33%; width: 80px; height: 80px; background: rgba(232, 180, 184, 0.15); border-radius: 50%; animation-delay: 4s;"></div>
        
        <div class="container text-center relative z-10">
            <div class="glass-card p-8 md:p-12 max-w-4xl mx-auto animate-slide-up">
                <!-- Pre-title -->
                <div class="mb-8">
                    <p class="text-xl md:text-2xl font-serif" style="color: var(--primary-blue); font-style: italic; margin-bottom: 1rem; opacity: 0.9;">
                        Together with our families, we joyfully invite you to celebrate
                    </p>
                    <div style="width: 96px; height: 4px; background: linear-gradient(to right, var(--gold), var(--champagne), var(--gold)); margin: 0 auto 2rem;"></div>
                </div>
                
                <!-- Main Names -->
                <div class="mb-12">
                    <h1 class="text-6xl md:text-8xl lg:text-9xl font-script text-gradient-gold mb-8 leading-tight">
                        Sarah
                    </h1>
                    <div class="flex items-center justify-center mb-8">
                        <div style="width: 64px; height: 1px; background: var(--gold);"></div>
                        <span class="text-4xl md:text-6xl animate-heartbeat" style="color: var(--gold); margin: 0 2rem;">&</span>
                        <div style="width: 64px; height: 1px; background: var(--gold);"></div>
                    </div>
                    <h1 class="text-6xl md:text-8xl lg:text-9xl font-script text-gradient-gold leading-tight">
                        Michael
                    </h1>
                </div>
                
                <!-- Wedding Details -->
                <div class="mb-12">
                    <p class="text-2xl md:text-3xl font-serif text-white mb-4">
                        June 15th, 2025
                    </p>
                    <p class="text-xl md:text-2xl font-serif" style="color: var(--primary-blue); font-style: italic;">
                        Addis Ababa, Ethiopia
                    </p>
                </div>
                
                <!-- Countdown Timer -->
                <div id="countdown" class="grid grid-cols-2 md:grid-cols-4 gap-6 mb-12">
                    <div class="glass-card p-6 transition-all duration-300 hover:scale-110">
                        <div class="text-4xl md:text-5xl font-bold text-white mb-2" id="days">00</div>
                        <div class="text-sm font-semibold" style="color: var(--primary-blue); text-transform: uppercase; letter-spacing: 2px;">Days</div>
                    </div>
                    <div class="glass-card p-6 transition-all duration-300 hover:scale-110">
                        <div class="text-4xl md:text-5xl font-bold text-white mb-2" id="hours">00</div>
                        <div class="text-sm font-semibold" style="color: var(--primary-blue); text-transform: uppercase; letter-spacing: 2px;">Hours</div>
                    </div>
                    <div class="glass-card p-6 transition-all duration-300 hover:scale-110">
                        <div class="text-4xl md:text-5xl font-bold text-white mb-2" id="minutes">00</div>
                        <div class="text-sm font-semibold" style="color: var(--primary-blue); text-transform: uppercase; letter-spacing: 2px;">Minutes</div>
                    </div>
                    <div class="glass-card p-6 transition-all duration-300 hover:scale-110">
                        <div class="text-4xl md:text-5xl font-bold text-white mb-2" id="seconds">00</div>
                        <div class="text-sm font-semibold" style="color: var(--primary-blue); text-transform: uppercase; letter-spacing: 2px;">Seconds</div>
                    </div>
                </div>
                
                <!-- Call to Action -->
                <div class="space-y-4 md:flex md:space-y-0 md:space-x-6 md:justify-center">
                    <a href="#invitation" class="btn-luxury">
                        View Invitation
                        <i class="fas fa-arrow-down" style="margin-left: 8px;"></i>
                    </a>
                    <a href="#rsvp" class="btn-elegant">
                        RSVP Now
                        <i class="fas fa-heart" style="margin-left: 8px;"></i>
                    </a>
                </div>
            </div>
        </div>
        
        <!-- Scroll Indicator -->
        <div class="absolute" style="bottom: 2rem; left: 50%; transform: translateX(-50%); animation: bounce 2s infinite;">
            <div style="width: 32px; height: 48px; border: 2px solid var(--gold); border-radius: 24px; display: flex; justify-content: center;">
                <div style="width: 4px; height: 16px; background: var(--gold); border-radius: 2px; margin-top: 8px; animation: bounce 2s infinite;"></div>
            </div>
        </div>
    </section>

    <!-- Revolutionary Invitation Section -->
    <section id="invitation" class="section" style="background: linear-gradient(135deg, var(--blush) 0%, var(--pearl) 50%, var(--primary-blue) 100%);">
        <div class="container">
            <!-- Section Header -->
            <div class="text-center mb-12">
                <h2 class="text-5xl md:text-6xl font-script text-gradient-gold mb-6">
                    Wedding Invitation
                </h2>
                <div style="width: 128px; height: 4px; background: linear-gradient(to right, var(--gold), var(--deep-blue), var(--gold)); margin: 0 auto 2rem;"></div>
                <p class="text-xl" style="color: var(--charcoal); opacity: 0.8; max-width: 600px; margin: 0 auto; font-style: italic;">
                    We request the honor of your presence as we unite in marriage
                </p>
            </div>
            
            <!-- Luxury Invitation Card -->
            <div class="max-w-4xl mx-auto">
                <div class="glass-card p-8 md:p-12" style="position: relative; overflow: hidden;">
                    <!-- Ornamental Header -->
                    <div class="text-center mb-12">
                        <div style="width: 80px; height: 80px; background: linear-gradient(135deg, var(--gold), var(--dark-gold)); border-radius: 50%; margin: 0 auto 2rem; display: flex; align-items: center; justify-content: center;" class="animate-heartbeat">
                            <i class="fas fa-heart" style="color: white; font-size: 32px;"></i>
                        </div>
                        <h3 class="text-3xl font-serif text-gradient-gold mb-4">Together with our families</h3>
                        <div style="width: 80px; height: 1px; background: var(--gold); margin: 0 auto;"></div>
                    </div>
                    
                    <!-- Names Section -->
                    <div class="text-center mb-12">
                        <div class="mb-8">
                            <h1 class="text-5xl md:text-6xl font-script text-gradient-gold mb-4">
                                Sarah Elizabeth
                            </h1>
                            <p class="text-lg" style="color: var(--charcoal); opacity: 0.7; font-style: italic;">
                                Daughter of Mr. & Mrs. Johnson
                            </p>
                        </div>
                        
                        <div class="flex items-center justify-center my-8">
                            <div style="width: 96px; height: 1px; background: var(--gold);"></div>
                            <span class="text-4xl animate-sparkle" style="color: var(--gold); margin: 0 2rem;">&</span>
                            <div style="width: 96px; height: 1px; background: var(--gold);"></div>
                        </div>
                        
                        <div class="mb-8">
                            <h1 class="text-5xl md:text-6xl font-script text-gradient-blue mb-4">
                                Michael James
                            </h1>
                            <p class="text-lg" style="color: var(--charcoal); opacity: 0.7; font-style: italic;">
                                Son of Mr. & Mrs. Anderson
                            </p>
                        </div>
                        
                        <p class="text-xl font-serif" style="color: var(--charcoal); opacity: 0.8; font-style: italic; margin-top: 2rem;">
                            request the pleasure of your company at their wedding celebration
                        </p>
                    </div>
                    
                    <!-- Event Details Grid -->
                    <div class="grid md:grid-cols-2 gap-8 mb-12">
                        <!-- Ceremony -->
                        <div class="text-center glass-card p-6">
                            <div style="width: 64px; height: 64px; background: linear-gradient(135deg, var(--deep-blue), var(--royal-blue)); border-radius: 50%; margin: 0 auto 1rem; display: flex; align-items: center; justify-content: center;">
                                <i class="fas fa-church" style="color: white; font-size: 24px;"></i>
                            </div>
                            <h4 class="text-2xl font-serif font-bold mb-4" style="color: var(--charcoal);">Wedding Ceremony</h4>
                            <div style="color: var(--charcoal); opacity: 0.7; line-height: 1.8;">
                                <p><strong>Saturday, June 15th, 2025</strong></p>
                                <p>4:00 PM</p>
                                <p>Holy Trinity Cathedral</p>
                                <p style="font-size: 0.9rem;">Arat Kilo, Addis Ababa, Ethiopia</p>
                            </div>
                        </div>
                        
                        <!-- Reception -->
                        <div class="text-center glass-card p-6">
                            <div style="width: 64px; height: 64px; background: linear-gradient(135deg, var(--gold), var(--dark-gold)); border-radius: 50%; margin: 0 auto 1rem; display: flex; align-items: center; justify-content: center;">
                                <i class="fas fa-glass-cheers" style="color: white; font-size: 24px;"></i>
                            </div>
                            <h4 class="text-2xl font-serif font-bold mb-4" style="color: var(--charcoal);">Reception Celebration</h4>
                            <div style="color: var(--charcoal); opacity: 0.7; line-height: 1.8;">
                                <p><strong>Following Ceremony</strong></p>
                                <p>6:00 PM - 12:00 AM</p>
                                <p>Sheraton Addis Hotel</p>
                                <p style="font-size: 0.9rem;">Grand Ballroom, Taitu Street</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Action Buttons -->
                    <div class="text-center space-y-4 md:space-y-0 md:space-x-6 md:flex md:justify-center">
                        <button class="btn-luxury" onclick="downloadInvitation()">
                            <i class="fas fa-download" style="margin-right: 8px;"></i>
                            Download Invitation
                        </button>
                        <button class="btn-elegant" onclick="shareInvitation()">
                            <i class="fas fa-share-alt" style="margin-right: 8px;"></i>
                            Share Invitation
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Revolutionary Interactive Calendar -->
    <section id="calendar" class="section" style="background: linear-gradient(135deg, var(--pearl) 0%, var(--accent-blue) 100%);">
        <div class="container">
            <!-- Section Header -->
            <div class="text-center mb-12">
                <h2 class="text-5xl md:text-6xl font-script text-gradient-gold mb-6">
                    Save the Date
                </h2>
                <div style="width: 128px; height: 4px; background: linear-gradient(to right, var(--gold), var(--deep-blue), var(--gold)); margin: 0 auto 2rem;"></div>
                <p class="text-xl" style="color: var(--charcoal); opacity: 0.8; max-width: 600px; margin: 0 auto; font-style: italic;">
                    Mark your calendar and join us for the most important day of our lives
                </p>
            </div>
            
            <div class="max-w-6xl mx-auto grid lg:grid-cols-2 gap-12 items-start">
                <!-- Interactive Calendar -->
                <div class="glass-card" style="border-radius: 24px; overflow: hidden; box-shadow: 0 30px 60px rgba(0, 0, 0, 0.1);">
                    <!-- Calendar Header -->
                    <div style="background: linear-gradient(135deg, var(--gold) 0%, var(--dark-gold) 100%); color: white; padding: 24px; text-align: center;">
                        <div class="flex justify-between items-center mb-4">
                            <button id="prevMonth" style="padding: 12px; background: rgba(255, 255, 255, 0.2); border: none; border-radius: 50%; cursor: pointer; color: white; transition: all 0.3s ease;">
                                <i class="fas fa-chevron-left"></i>
                            </button>
                            <h3 id="currentMonth" class="text-2xl font-serif font-bold"></h3>
                            <button id="nextMonth" style="padding: 12px; background: rgba(255, 255, 255, 0.2); border: none; border-radius: 50%; cursor: pointer; color: white; transition: all 0.3s ease;">
                                <i class="fas fa-chevron-right"></i>
                            </button>
                        </div>
                        <div class="grid grid-cols-7 gap-2 text-center font-semibold">
                            <div style="padding: 12px;">Sun</div>
                            <div style="padding: 12px;">Mon</div>
                            <div style="padding: 12px;">Tue</div>
                            <div style="padding: 12px;">Wed</div>
                            <div style="padding: 12px;">Thu</div>
                            <div style="padding: 12px;">Fri</div>
                            <div style="padding: 12px;">Sat</div>
                        </div>
                    </div>
                    
                    <!-- Calendar Body -->
                    <div style="padding: 24px; background: rgba(255, 255, 255, 0.95);">
                        <div id="calendarDays" class="grid grid-cols-7 gap-2">
                            <!-- Calendar days will be generated by JavaScript -->
                        </div>
                    </div>
                    
                    <!-- Calendar Footer -->
                    <div style="background: var(--silver); background-opacity: 0.5; padding: 24px; border-top: 2px solid rgba(212, 175, 55, 0.2);">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-6">
                                <div class="flex items-center">
                                    <div style="width: 16px; height: 16px; background: var(--gold); border-radius: 50%; margin-right: 8px;" class="animate-heartbeat"></div>
                                    <span class="font-semibold">Wedding Day</span>
                                </div>
                                <div class="flex items-center">
                                    <div style="width: 16px; height: 16px; background: var(--deep-blue); border-radius: 50%; margin-right: 8px;"></div>
                                    <span class="font-semibold">Today</span>
                                </div>
                            </div>
                            <button class="btn-luxury" style="padding: 12px 24px; font-size: 14px;" onclick="addToCalendar()">
                                Add to Calendar
                            </button>
                        </div>
                    </div>
                </div>
                
                <!-- Wedding Timeline -->
                <div class="glass-card p-8">
                    <h3 class="text-3xl font-script text-gradient-gold mb-8 text-center">Wedding Day Timeline</h3>
                    
                    <div class="space-y-6">
                        <!-- Timeline Item -->
                        <div class="flex items-start space-x-4">
                            <div style="width: 48px; height: 48px; background: linear-gradient(135deg, var(--accent-blue), var(--deep-blue)); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-weight: bold; flex-shrink: 0;">
                                2PM
                            </div>
                            <div>
                                <h4 class="text-xl font-serif font-bold mb-2" style="color: var(--charcoal);">Guest Arrival & Welcome</h4>
                                <p style="color: var(--charcoal); opacity: 0.7;">Welcome reception, seating, and pre-ceremony refreshments</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start space-x-4">
                            <div style="width: 48px; height: 48px; background: linear-gradient(135deg, var(--gold), var(--dark-gold)); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-weight: bold; flex-shrink: 0;" class="animate-heartbeat">
                                4PM
                            </div>
                            <div>
                                <h4 class="text-xl font-serif font-bold mb-2" style="color: var(--charcoal);">Wedding Ceremony</h4>
                                <p style="color: var(--charcoal); opacity: 0.7;">Sacred vows at Holy Trinity Cathedral</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start space-x-4">
                            <div style="width: 48px; height: 48px; background: linear-gradient(135deg, var(--rose-gold), var(--gold)); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-weight: bold; flex-shrink: 0;">
                                5PM
                            </div>
                            <div>
                                <h4 class="text-xl font-serif font-bold mb-2" style="color: var(--charcoal);">Photography Session</h4>
                                <p style="color: var(--charcoal); opacity: 0.7;">Couple, family, and group photographs</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start space-x-4">
                            <div style="width: 48px; height: 48px; background: linear-gradient(135deg, var(--gold), var(--dark-gold)); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-weight: bold; flex-shrink: 0;">
                                6PM
                            </div>
                            <div>
                                <h4 class="text-xl font-serif font-bold mb-2" style="color: var(--charcoal);">Reception Begins</h4>
                                <p style="color: var(--charcoal); opacity: 0.7;">Cocktails, dinner, and celebration</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start space-x-4">
                            <div style="width: 48px; height: 48px; background: linear-gradient(135deg, var(--deep-blue), var(--royal-blue)); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-weight: bold; flex-shrink: 0;">
                                9PM
                            </div>
                            <div>
                                <h4 class="text-xl font-serif font-bold mb-2" style="color: var(--charcoal);">Dancing & Entertainment</h4>
                                <p style="color: var(--charcoal); opacity: 0.7;">Live music, dancing, and celebration until midnight</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- RSVP Section -->
                    <div style="margin-top: 3rem; padding: 2rem; background: linear-gradient(135deg, var(--primary-blue), var(--champagne)); border-radius: 16px;">
                        <h4 class="text-xl font-serif font-bold mb-4 text-center" style="color: var(--charcoal);">RSVP Required</h4>
                        <p class="text-center mb-6" style="color: var(--charcoal); opacity: 0.7;">Please confirm your attendance by May 15th, 2025</p>
                        <div class="flex flex-col md:flex-row gap-4">
                            <button class="btn-luxury flex-1" onclick="rsvpYes()">
                                <i class="fas fa-check" style="margin-right: 8px;"></i>
                                Joyfully Accept
                            </button>
                            <button class="btn-elegant flex-1" onclick="rsvpNo()">
                                <i class="fas fa-times" style="margin-right: 8px;"></i>
                                Regretfully Decline
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- JavaScript -->
    <script>
        // Revolutionary 2025 Wedding Website JavaScript
        
        // Global Variables
        let currentMonth = new Date().getMonth();
        let currentYear = new Date().getFullYear();
        const weddingDate = new Date('2025-06-15T16:00:00');
        
        // Initialize everything when DOM is loaded
        document.addEventListener('DOMContentLoaded', function() {
            initializeCountdown();
            initializeCalendar();
            initializeScrollEffects();
            initializeNavigation();
            console.log('🎉 Revolutionary Wedding Website 2025 - Loaded Successfully!');
        });
        
        // Revolutionary Countdown Timer
        function initializeCountdown() {
            function updateCountdown() {
                const now = new Date().getTime();
                const distance = weddingDate.getTime() - now;
                
                if (distance > 0) {
                    const days = Math.floor(distance / (1000 * 60 * 60 * 24));
                    const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                    const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                    const seconds = Math.floor((distance % (1000 * 60)) / 1000);
                    
                    document.getElementById('days').textContent = days.toString().padStart(2, '0');
                    document.getElementById('hours').textContent = hours.toString().padStart(2, '0');
                    document.getElementById('minutes').textContent = minutes.toString().padStart(2, '0');
                    document.getElementById('seconds').textContent = seconds.toString().padStart(2, '0');
                } else {
                    document.getElementById('countdown').innerHTML = '<div class="glass-card p-12 text-center"><h3 class="text-4xl font-script text-gradient-gold">The Big Day is Here! 🎉✨💍</h3></div>';
                }
            }
            
            updateCountdown();
            setInterval(updateCountdown, 1000);
        }
        
        // Revolutionary Interactive Calendar
        function initializeCalendar() {
            const monthNames = ["January", "February", "March", "April", "May", "June",
                "July", "August", "September", "October", "November", "December"];
            
            function renderCalendar() {
                const firstDay = new Date(currentYear, currentMonth, 1).getDay();
                const daysInMonth = new Date(currentYear, currentMonth + 1, 0).getDate();
                const today = new Date();
                
                document.getElementById('currentMonth').textContent = `${monthNames[currentMonth]} ${currentYear}`;
                
                const calendarDays = document.getElementById('calendarDays');
                calendarDays.innerHTML = '';
                
                // Empty cells for days before month starts
                for (let i = 0; i < firstDay; i++) {
                    const emptyDay = document.createElement('div');
                    emptyDay.style.padding = '12px';
                    emptyDay.style.textAlign = 'center';
                    emptyDay.style.color = '#ccc';
                    calendarDays.appendChild(emptyDay);
                }
                
                // Days of the month
                for (let day = 1; day <= daysInMonth; day++) {
                    const dayElement = document.createElement('div');
                    dayElement.className = 'calendar-day';
                    dayElement.textContent = day;
                    dayElement.style.padding = '12px';
                    dayElement.style.textAlign = 'center';
                    dayElement.style.cursor = 'pointer';
                    dayElement.style.borderRadius = '12px';
                    dayElement.style.margin = '2px';
                    dayElement.style.fontWeight = '500';
                    dayElement.style.transition = 'all 0.3s cubic-bezier(0.4, 0, 0.2, 1)';
                    
                    const currentDate = new Date(currentYear, currentMonth, day);
                    
                    // Highlight today
                    if (currentDate.toDateString() === today.toDateString()) {
                        dayElement.style.background = 'var(--deep-blue)';
                        dayElement.style.color = 'white';
                        dayElement.style.fontWeight = '700';
                        dayElement.style.boxShadow = '0 8px 25px rgba(74, 144, 226, 0.4)';
                    }
                    
                    // Highlight wedding day
                    if (currentDate.toDateString() === weddingDate.toDateString()) {
                        dayElement.style.background = 'linear-gradient(135deg, var(--gold) 0%, var(--dark-gold) 100%)';
                        dayElement.style.color = 'white';
                        dayElement.style.fontWeight = '700';
                        dayElement.style.position = 'relative';
                        dayElement.style.animation = 'heartbeat 2s ease-in-out infinite';
                        dayElement.title = 'Our Wedding Day! 💍✨';
                        
                        // Add ring emoji
                        const ring = document.createElement('span');
                        ring.textContent = '💍';
                        ring.style.position = 'absolute';
                        ring.style.top = '-5px';
                        ring.style.right = '-5px';
                        ring.style.fontSize = '12px';
                        ring.style.animation = 'sparkle 2s ease-in-out infinite';
                        dayElement.appendChild(ring);
                    }
                    
                    // Hover effect
                    dayElement.addEventListener('mouseenter', function() {
                        if (!this.style.background.includes('gradient') && !this.style.background.includes('var(--deep-blue)')) {
                            this.style.background = 'var(--primary-blue)';
                            this.style.transform = 'scale(1.1)';
                            this.style.boxShadow = '0 8px 25px rgba(74, 144, 226, 0.3)';
                        }
                    });
                    
                    dayElement.addEventListener('mouseleave', function() {
                        if (!this.style.background.includes('gradient') && !this.style.background.includes('var(--deep-blue)')) {
                            this.style.background = '';
                            this.style.transform = '';
                            this.style.boxShadow = '';
                        }
                    });
                    
                    dayElement.addEventListener('click', () => {
                        if (currentDate.toDateString() === weddingDate.toDateString()) {
                            showNotification('💍✨ This is our wedding day! June 15th, 2025 - The most important day of our lives!', 'success');
                        }
                    });
                    
                    calendarDays.appendChild(dayElement);
                }
            }
            
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
            
            renderCalendar();
        }
        
        // Revolutionary Scroll Effects
        function initializeScrollEffects() {
            // Scroll progress indicator
            window.addEventListener('scroll', () => {
                const scrolled = (window.scrollY / (document.documentElement.scrollHeight - window.innerHeight)) * 100;
                document.getElementById('scrollProgress').style.transform = `scaleX(${scrolled / 100})`;
            });
        }
        
        // Revolutionary Navigation
        function initializeNavigation() {
            const navbar = document.getElementById('navbar');
            
            window.addEventListener('scroll', () => {
                if (window.scrollY > 100) {
                    navbar.style.boxShadow = '0 25px 50px -12px rgba(0, 0, 0, 0.25)';
                } else {
                    navbar.style.boxShadow = '';
                }
            });
            
            // Smooth scrolling for navigation links
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();
                    const target = document.querySelector(this.getAttribute('href'));
                    if (target) {
                        target.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }
                });
            });
        }
        
        // Revolutionary Utility Functions
        function downloadInvitation() {
            showNotification('🎉 Invitation download feature coming soon! We\'re preparing something beautiful for you.', 'success');
        }
        
        function shareInvitation() {
            if (navigator.share) {
                navigator.share({
                    title: 'Sarah & Michael\'s Wedding - June 15, 2025',
                    text: 'You\'re invited to our wedding celebration in Addis Ababa!',
                    url: window.location.href
                });
            } else {
                navigator.clipboard.writeText(window.location.href);
                showNotification('💍 Wedding invitation link copied to clipboard!', 'success');
            }
        }
        
        function addToCalendar() {
            const event = {
                title: 'Sarah & Michael\'s Wedding Celebration',
                start: '20250615T160000Z',
                end: '20250616T000000Z',
                description: 'Join us for our wedding ceremony at Holy Trinity Cathedral followed by reception at Sheraton Addis Hotel',
                location: 'Holy Trinity Cathedral, Addis Ababa, Ethiopia'
            };
            
            const googleCalendarUrl = `https://calendar.google.com/calendar/render?action=TEMPLATE&text=${encodeURIComponent(event.title)}&dates=${event.start}/${event.end}&details=${encodeURIComponent(event.description)}&location=${encodeURIComponent(event.location)}`;
            
            window.open(googleCalendarUrl, '_blank');
        }
        
        function rsvpYes() {
            showNotification('🎉 Thank you for accepting our invitation! We can\'t wait to celebrate with you. More details will be sent soon.', 'success');
        }
        
        function rsvpNo() {
            showNotification('💙 We\'re sorry you can\'t make it, but thank you for letting us know. You\'ll be missed on our special day.', 'info');
        }
        
        function toggleMobileMenu() {
            showNotification('📱 Mobile menu coming soon!', 'info');
        }
        
        function showNotification(message, type = 'info') {
            // Create a beautiful notification
            const notification = document.createElement('div');
            notification.style.cssText = `
                position: fixed;
                top: 2rem;
                right: 2rem;
                z-index: 9999;
                background: rgba(255, 255, 255, 0.95);
                backdrop-filter: blur(20px);
                border: 1px solid rgba(255, 255, 255, 0.18);
                border-radius: 16px;
                padding: 1.5rem;
                max-width: 400px;
                box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
                transform: translateX(100%);
                transition: transform 0.5s ease;
            `;
            
            const bgColor = type === 'success' ? 'rgba(34, 197, 94, 0.1)' : type === 'error' ? 'rgba(239, 68, 68, 0.1)' : 'rgba(59, 130, 246, 0.1)';
            notification.style.background = bgColor;
            
            notification.innerHTML = `
                <div style="display: flex; align-items: start; gap: 1rem;">
                    <div style="font-size: 1.5rem;">
                        ${type === 'success' ? '✅' : type === 'error' ? '❌' : 'ℹ️'}
                    </div>
                    <div style="flex: 1;">
                        <p style="color: var(--charcoal); font-weight: 600; margin: 0;">${message}</p>
                    </div>
                    <button onclick="this.parentElement.parentElement.remove()" style="background: none; border: none; color: var(--charcoal); opacity: 0.6; cursor: pointer; font-size: 1.2rem; padding: 0;">
                        ×
                    </button>
                </div>
            `;
            
            document.body.appendChild(notification);
            
            // Animate in
            setTimeout(() => {
                notification.style.transform = 'translateX(0)';
            }, 100);
            
            // Auto remove after 5 seconds
            setTimeout(() => {
                notification.style.transform = 'translateX(100%)';
                setTimeout(() => {
                    notification.remove();
                }, 500);
            }, 5000);
        }
    </script>
</body>
</html>