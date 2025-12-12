@extends('layouts.app')

@section('title', 'Our Memories - The Wedding Celebration')

@section('styles')
<style>
    /* Memories Page Specific Styles */
    .page-hero {
        height: 24rem;
background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.3)), url('/images/gallery/QE9A0629.png');
        background-position: center;
        background-size: cover;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        color: var(--color-white);
    }
    
    .page-hero h1 {
        font-size: 3.5rem;
        margin-bottom: 1rem;
    }
    
    .page-hero p {
        font-size: 1.25rem;
        color: var(--color-light-blue);
        font-style: italic;
    }
    
    .memory-card {
        display: flex;
        margin-bottom: 3rem;
        gap: 2rem;
        align-items: center;
    }
    
    .memory-card:nth-child(even) {
        flex-direction: row-reverse;
    }
    
    .memory-content {
        flex: 1;
    }
    
    .memory-image {
        flex: 1;
        position: relative;
    }
    
    .memory-image img {
        border-radius: var(--radius-lg);
        box-shadow: var(--shadow-lg);
        transition: transform 0.3s ease;
    }
    
    .memory-image:hover img {
        transform: translateY(-0.5rem);
    }
    
    .memory-image::before {
        content: '';
        position: absolute;
        inset: 0;
        background: rgba(212, 175, 55, 0.2);
        border-radius: var(--radius-lg);
        transform: rotate(3deg);
        transition: transform 0.3s ease;
    }
    
    .memory-image:hover::before {
        transform: rotate(6deg);
    }
    
    .memory-card:nth-child(even) .memory-image::before {
        transform: rotate(-3deg);
    }
    
    .memory-card:nth-child(even) .memory-image:hover::before {
        transform: rotate(-6deg);
    }
    
    .memory-date {
        display: flex;
        align-items: center;
        color: rgba(51, 51, 51, 0.6);
        font-size: 0.875rem;
        margin-top: 1rem;
    }
    
    .date-dot {
        width: 0.5rem;
        height: 0.5rem;
        background: var(--color-gold);
        border-radius: 50%;
        margin-right: 0.5rem;
    }
    
    .quote-section {
        background: var(--color-white);
        padding: 4rem 0;
    }
    
    .quote-content {
        max-width: 800px;
        margin: 0 auto;
        text-align: center;
    }
    
    .quote-icon {
        font-size: 4rem;
        margin-bottom: 1.5rem;
        color: var(--color-gold);
    }
    
    .quote-text {
        font-size: 2rem;
        line-height: 1.6;
        color: var(--color-dark-gray);
        margin-bottom: 1.5rem;
        font-style: italic;
    }
    
    .quote-author {
        font-size: 1.25rem;
        color: var(--color-gold);
        font-family: var(--font-serif);
    }
    
    .cta-section {
        background: linear-gradient(135deg, rgba(230, 242, 255, 0.3), rgba(212, 175, 55, 0.1));
        padding: 3rem 0;
    }
    
    .cta-content {
        display: flex;
        justify-content: space-between;
        align-items: center;
        max-width: 1000px;
        margin: 0 auto;
        padding: 0 var(--space-md);
    }
    
    .cta-text h3 {
        font-size: 2rem;
        margin-bottom: 0.5rem;
    }
    
    .cta-text p {
        color: rgba(51, 51, 51, 0.7);
    }
    
    .btn-secondary {
        display: inline-flex;
        align-items: center;
        padding: 0.75rem 2rem;
        background: var(--color-dark-gray);
        color: var(--color-white);
        border-radius: 50px;
        font-weight: 500;
        transition: all 0.3s ease;
        text-decoration: none;
        border: none;
        cursor: pointer;
    }
    
    .btn-secondary:hover {
        background: var(--color-black);
        transform: translateY(-2px);
    }
    
    /* Responsive styles */
    @media (max-width: 768px) {
        .page-hero h1 {
            font-size: 2.5rem;
        }
        
        .page-hero p {
            font-size: 1rem;
        }
        
        .memory-card {
            flex-direction: column !important;
        }
        
        .memory-image {
            width: 100%;
        }
        
        .cta-content {
            flex-direction: column;
            text-align: center;
            gap: 1.5rem;
        }
        
        .quote-text {
            font-size: 1.5rem;
        }
    }
</style>
@endsection

@section('content')
<!-- Page Hero -->
<section class="page-hero">
    <div>
        
    </div>
</section>

<!-- Memories Section -->
<section class="section bg-gray">
    <div class="container">
        <div class="text-center" style="margin-bottom: 4rem;">
            <h2 class="text-4xl opacity-0 translate-y-4" style="transition: all 1s ease;">
                A gentle beginning to a lifetime
            </h2>
            <div class="section-divider"></div>
            
        </div>
        
        <!-- Proposal Memory -->
        <div class="memory-card opacity-0 translate-y-4" style="transition: all 1s ease;">
            <div class="memory-content">
                <div style="position: relative;">
                    <div style="position: absolute; top: -1rem; left: -1rem; width: 2rem; height: 2rem; background: var(--color-gold); border-radius: 50%;"></div>
                    <h3 style="font-size: 2rem; margin-bottom: 1rem; margin-left: 1rem;">The Proposal</h3>
                </div>
                <p style="color: rgba(51, 51, 51, 0.7); margin-bottom: 1.5rem; margin-left: 1rem;">
                The moment he sked, the world felt beutifully quiet. It was just honest, heartfelt, and the world made sense. A promise made- Today, Tomorrow, FOREVER!
             </p>
                <div class="memory-date">
                    <div class="date-dot"></div>
                    <span>May 15, 2023</span>
                </div>
            </div>
            <div class="memory-image">
    <img src="{{ asset('images/gallery/QE9A0254.png') }}" alt="Proposal Moment">
</div>

        </div>
        
        <!-- Shengelena Memory -->
        <div class="memory-card opacity-0 translate-y-4" style="transition: all 1s ease 0.1s;">
            <div class="memory-content">
                <div style="position: relative;">
                    <div style="position: absolute; top: -1rem; left: -1rem; width: 2rem; height: 2rem; background: var(--color-gold); border-radius: 50%;"></div>
                    <h3 style="font-size: 2rem; margin-bottom: 1rem; margin-left: 1rem;">Shemgelena Ceremony</h3>
                </div>
                <p style="color: rgba(51, 51, 51, 0.7); margin-bottom: 1.5rem; margin-left: 1rem;">
                    It was a moment filled with tradition, respect and love, a bridge between two families and the beginning of one home. Every smile, every blessing, every hand extended was a prayer over our future.
            </p>
                <div class="memory-date">
                    <div class="date-dot"></div>
                    <span>August 20, 2023</span>
                </div>
            </div>
            <div class="memory-image">
    <img src="{{ asset('images/gallery/QE9A0257.png') }}" alt="Proposal Moment">
</div>

        </div>
        
        <!-- Engagement Memory -->
        <div class="memory-card opacity-0 translate-y-4" style="transition: all 1s ease 0.2s;">
            <div class="memory-content">
                <div style="position: relative;">
                    <div style="position: absolute; top: -1rem; left: -1rem; width: 2rem; height: 2rem; background: var(--color-gold); border-radius: 50%;"></div>
                    <h3 style="font-size: 2rem; margin-bottom: 1rem; margin-left: 1rem;">Civil Wedding</h3>
                </div>
                <p class="opacity-0 translate-y-4" style="transition: all 1s ease; color: rgba(51, 51, 51, 0.7); max-width: 600px; margin: 0 auto;">
                Our civil wedding will be the moment everything became official. Paper signed, hands held, smile shared. <br> A gentle beggining to a lifetime
            </p>
                <div class="memory-date">
                    <div class="date-dot"></div>
                    <span>December 10, 2023</span>
                </div>
            </div>
            <div class="memory-image">
    <img src="{{ asset('images/gallery/QE9A0272.png') }}" alt="Proposal Moment">
</div>

        </div>
    </div>
</section>

<!-- Quote Section -->
<section class="quote-section">
    <div class="quote-content opacity-0 translate-y-4" style="transition: all 1s ease;">
        <div class="quote-icon">💞</div>
        <blockquote>
            <p class="quote-text">
                "In all the world, there is no heart for me like yours. In all the world, there is no love for you like mine."
            </p>
            <p class="quote-author">- Maya Angelou</p>
        </blockquote>
    </div>
</section>

<!-- CTA Section -->
<section class="cta-section">
    <div class="cta-content">
        <div class="cta-text opacity-0 translate-y-4" style="transition: all 1s ease;">
            <h3>Continue the Journey</h3>
            <p>Explore our gallery of beautiful moments</p>
        </div>
        <a href="{{ route('gallery') }}" class="btn-secondary opacity-0 translate-y-4" style="transition: all 1s ease 0.1s;">
            <span>View Gallery</span>
            <i class="fas fa-arrow-right" style="margin-left: 0.5rem;"></i>
        </a>
    </div>
</section>
@endsection