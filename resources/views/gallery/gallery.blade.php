@extends('layouts.app')

@section('title', 'Gallery - The Wedding Celebration')

@section('styles')
<style>
    /* Gallery Page Specific Styles */
    .page-hero {
        height: 24rem;
        background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.3)), url('/Images/gallery/QE9A0649.png');
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
    
    .gallery-filters {
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
        gap: 0.5rem;
        margin-bottom: 3rem;
    }
    
    .filter-btn {
        padding: 0.5rem 1.5rem;
        background: var(--color-white);
        border: 1px solid var(--color-gold);
        color: var(--color-dark-gray);
        border-radius: 50px;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.3s ease;
    }
    
    .filter-btn:hover {
        background: var(--color-gold);
        color: var(--color-white);
    }
    
    .filter-btn.active {
        background: linear-gradient(135deg, var(--color-gold), #FFD700);
        color: var(--color-white);
        border-color: transparent;
    }
    
    .gallery-stats {
        display: flex;
        justify-content: space-between;
        max-width: 800px;
        margin: 3rem auto 0;
        padding-top: 2rem;
        border-top: 1px solid rgba(212, 175, 55, 0.3);
    }
    
    .stat-item {
        text-align: center;
    }
    
    .stat-number {
        font-size: 2.5rem;
        font-weight: 700;
        color: var(--color-gold);
        margin-bottom: 0.5rem;
    }
    
    .stat-label {
        color: rgba(51, 51, 51, 0.7);
    }
    
    .tips-card {
        background: rgba(230, 242, 255, 0.3);
        border-radius: var(--radius-lg);
        padding: 3rem;
        max-width: 800px;
        margin: 0 auto;
    }
    
    .tips-header {
        display: flex;
        align-items: flex-start;
        margin-bottom: 1.5rem;
    }
    
    .tips-icon {
        font-size: 2.5rem;
        margin-right: 1rem;
        color: var(--color-gold);
    }
    
    .tips-tags {
        display: flex;
        flex-wrap: wrap;
        gap: 0.5rem;
        margin-top: 1.5rem;
    }
    
    .tag {
        padding: 0.25rem 0.75rem;
        background: var(--color-white);
        border: 1px solid var(--color-gold);
        border-radius: 50px;
        font-size: 0.875rem;
        color: var(--color-dark-gray);
    }
    
    /* Enhanced CSS Grid Gallery */
    .gallery-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 1rem;
        padding: 0;
    }
    
    .gallery-item {
        position: relative;
        cursor: pointer;
        border-radius: 12px;
        overflow: hidden;
        opacity: 0;
        transform: translateY(20px);
        transition: all 0.5s ease;
        background: var(--color-white);
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        aspect-ratio: 4/3;
    }
    
    .gallery-item img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
        transition: all 0.3s ease;
        opacity: 0;
    }
    
    .gallery-item img.loaded {
        opacity: 1;
    }
    
    .image-loading-placeholder {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        background: linear-gradient(135deg, #f8f9fa, #e9ecef);
        color: #6c757d;
        font-size: 0.9rem;
        opacity: 1;
        transition: opacity 0.3s ease;
    }
    
    .gallery-item img.loaded + .image-loading-placeholder {
        opacity: 0;
        pointer-events: none;
    }
    
    .image-loading-placeholder i {
        font-size: 2rem;
        margin-bottom: 0.5rem;
        color: var(--color-gold);
    }
    
    .gallery-item:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
    }
    
    .gallery-item:hover img {
        transform: scale(1.05);
    }
    
    .gallery-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(to top, rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.2));
        opacity: 0;
        transition: opacity 0.3s ease;
        display: flex;
        justify-content: center;
        align-items: center;
        color: var(--color-white);
    }
    
    .gallery-item:hover .gallery-overlay {
        opacity: 1;
    }
    
    .gallery-overlay i {
        font-size: 2rem;
        background: rgba(255, 255, 255, 0.2);
        padding: 1rem;
        border-radius: 50%;
        backdrop-filter: blur(10px);
    }
    
    .gallery-category {
        position: absolute;
        top: 0.75rem;
        right: 0.75rem;
        background: linear-gradient(135deg, var(--color-gold), #FFD700);
        color: var(--color-white);
        padding: 0.4rem 0.8rem;
        border-radius: 20px;
        font-size: 0.75rem;
        text-transform: capitalize;
        font-weight: 600;
        opacity: 0;
        transition: all 0.3s ease;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
    }
    
    .gallery-item:hover .gallery-category {
        opacity: 1;
        transform: translateY(-2px);
    }
    
    /* Responsive Grid Layout */
    @media (max-width: 1200px) {
        .gallery-grid {
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        }
    }
    
    @media (max-width: 768px) {
        .page-hero h1 {
            font-size: 2.5rem;
        }
        
        .page-hero p {
            font-size: 1rem;
        }
        
        .gallery-grid {
            grid-template-columns: repeat(2, 1fr);
            gap: 0.75rem;
        }
        
        .gallery-item {
            aspect-ratio: 1;
            border-radius: 8px;
        }
        
        .gallery-overlay i {
            font-size: 1.5rem;
            padding: 0.75rem;
        }
        
        .gallery-category {
            font-size: 0.7rem;
            padding: 0.3rem 0.6rem;
        }
        
        .gallery-stats {
            flex-direction: column;
            gap: 2rem;
        }
        
        .tips-card {
            padding: 2rem;
        }
    }
    
    @media (max-width: 480px) {
        .gallery-grid {
            grid-template-columns: repeat(2, 1fr);
            gap: 0.5rem;
        }
        
        .gallery-item {
            aspect-ratio: 1;
            border-radius: 6px;
        }
        
        .gallery-overlay i {
            font-size: 1.2rem;
            padding: 0.6rem;
        }
        
        .gallery-category {
            font-size: 0.65rem;
            padding: 0.25rem 0.5rem;
            top: 0.5rem;
            right: 0.5rem;
        }
    }
</style>
@endsection

@section('content')
<!-- Page Hero -->
<section class="page-hero">
    <div>
        <h1 class="animate-fade-in-up">Our Gallery</h1>
        <p class="animate-fade-in-up" style="animation-delay: 0.2s">Moments captured, memories preserved</p>
    </div>
</section>

<!-- Gallery Section -->
<section class="section bg-gray">
    <div class="container">
        <div class="text-center" style="margin-bottom: 3rem;">
            <h2 class="text-4xl opacity-0 translate-y-4" style="transition: all 1s ease; margin-bottom: 1rem;">
                Precious Moments
            </h2>
            <div class="section-divider"></div>
            
            <!-- Gallery Filters -->
            <div class="gallery-filters opacity-0 translate-y-4" style="transition: all 1s ease 0.1s;">
                <button class="filter-btn active" onclick="filterGallery('all', event)">All Photos</button>
                <button class="filter-btn" onclick="filterGallery('proposal', event)">Proposal</button>
                <button class="filter-btn" onclick="filterGallery('shengelena', event)">Shengelena</button>
                <button class="filter-btn" onclick="filterGallery('engagement', event)">Engagement</button>
                <button class="filter-btn" onclick="filterGallery('pre-wedding', event)">Pre-Wedding</button>
            </div>
            
            <p class="opacity-0 translate-y-4" style="transition: all 1s ease 0.2s; color: rgba(51, 51, 51, 0.7); max-width: 600px; margin: 0 auto;">
                Browse through our collection of beautiful moments that tell our love story
            </p>
        </div>
        
        @php
            use Illuminate\Support\Facades\File;

            // Get all PNG files in the gallery folder (using correct path)
            $galleryPath = public_path('Images/gallery');
            $images = [];
            
            if (File::exists($galleryPath)) {
                $images = collect(File::files($galleryPath))
                            ->filter(fn($file) => in_array(strtolower($file->getExtension()), ['png', 'jpg', 'jpeg']))
                            ->filter(fn($file) => $file->getFilename() !== 'bride-groom-hero.jpg') // Exclude hero image
                            ->values();
            }
        @endphp

        <!-- Enhanced Mobile-Optimized Gallery -->
        <div id="gallery-grid" class="gallery-grid">
            @foreach($images as $index => $image)
                @php
                    $categories = ['proposal', 'shengelena', 'engagement', 'pre-wedding'];
                    $category = $categories[array_rand($categories)];
                    $imageUrl = asset('Images/gallery/' . $image->getFilename());
                    $imageName = $image->getFilename();
                @endphp
                <div class="gallery-item" 
                     data-category="{{ $category }}"
                     data-image-url="{{ $imageUrl }}"
                     data-image-name="{{ $imageName }}"
                     onclick="openLightbox({{ $index + 1 }})"
                     style="animation-delay: {{ ($index % 10) * 0.05 }}s">
                    <img src="{{ $imageUrl }}" 
                         alt="Gallery Image {{ $index + 1 }}" 
                         loading="lazy"
                         decoding="async"
                         onload="this.classList.add('loaded')"
                         onerror="handleImageError(this, '{{ $imageName }}')"
                         class="gallery-image">
                    <div class="image-loading-placeholder">
                        <i class="fas fa-image"></i>
                        <span>Loading...</span>
                    </div>
                    <div class="gallery-overlay">
                        <i class="fas fa-search"></i>
                    </div>
                    <span class="gallery-category">{{ $category }}</span>
                </div>
            @endforeach
        </div>

        <!-- Gallery Stats -->
        <div class="gallery-stats opacity-0 translate-y-4" style="transition: all 1s ease 0.4s;">
            <div class="stat-item">
                <div class="stat-number">{{ count($images) }}</div>
                <div class="stat-label">Beautiful Photos</div>
            </div>
            <div class="stat-item">
                <div class="stat-number">4</div>
                <div class="stat-label">Special Moments</div>
            </div>
            <div class="stat-item">
                <div class="stat-number">1</div>
                <div class="stat-label">Beautiful Story</div>
            </div>
        </div>
    </div>
</section>

<!-- Gallery Tips -->
<section class="section bg-white">
    <div class="container">
        <div class="tips-card opacity-0 translate-y-4" style="transition: all 1s ease;">
            <div class="tips-header">
                <div class="tips-icon">💡</div>
                <div>
                    <h3 style="font-size: 1.75rem; margin-bottom: 0.5rem;">Gallery Tips</h3>
                    <p style="color: rgba(51, 51, 51, 0.7);">
                        Click on any photo to view it in full screen. Use arrow keys to navigate between photos. 
                        All photos are available for download. Share your favorite moments with family and friends!
                    </p>
                </div>
            </div>
            <div class="tips-tags">
                <span class="tag">Click to Enlarge</span>
                <span class="tag">Arrow Keys to Navigate</span>
                <span class="tag">ESC to Close</span>
            </div>
        </div>
    </div>
</section>

@endsection

@section('scripts')
<script>
    // Mobile-optimized gallery functions
    function filterGallery(category, event) {
        // Update active filter button
        document.querySelectorAll('.filter-btn').forEach(btn => btn.classList.remove('active'));
        event.target.classList.add('active');

        // Filter gallery items
        const items = document.querySelectorAll('.gallery-item');
        items.forEach(item => {
            if (category === 'all' || item.dataset.category === category) {
                item.style.display = 'block';
                setTimeout(() => {
                    item.style.opacity = '1';
                    item.style.transform = 'translateY(0)';
                }, 50);
            } else {
                item.style.opacity = '0';
                item.style.transform = 'translateY(20px)';
                setTimeout(() => {
                    item.style.display = 'none';
                }, 300);
            }
        });
    }

    // Handle image loading errors
    function handleImageError(img, imageName) {
        console.error(`Failed to load image: ${imageName}`);
        
        // Create error placeholder
        const errorDiv = document.createElement('div');
        errorDiv.className = 'image-error-placeholder';
        errorDiv.innerHTML = `
            <i class="fas fa-exclamation-triangle"></i>
            <span>Image unavailable</span>
        `;
        
        // Replace image with error placeholder
        img.style.display = 'none';
        img.parentNode.appendChild(errorDiv);
    }

    // Optimize images for mobile
    function optimizeImagesForMobile() {
        const images = document.querySelectorAll('.gallery-image');
        const isMobile = window.innerWidth <= 768;
        
        images.forEach(img => {
            // Add intersection observer for lazy loading
            if ('IntersectionObserver' in window) {
                const imageObserver = new IntersectionObserver((entries, observer) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            const image = entry.target;
                            
                            // Preload image
                            const tempImg = new Image();
                            tempImg.onload = () => {
                                image.src = tempImg.src;
                                image.classList.add('loaded');
                            };
                            tempImg.onerror = () => {
                                handleImageError(image, image.dataset.imageName || 'unknown');
                            };
                            tempImg.src = image.dataset.imageUrl || image.src;
                            
                            observer.unobserve(image);
                        }
                    });
                }, {
                    rootMargin: '50px'
                });
                
                imageObserver.observe(img);
            }
        });
    }

    // Touch-friendly gallery interactions
    function initMobileGallery() {
        const galleryItems = document.querySelectorAll('.gallery-item');
        
        galleryItems.forEach(item => {
            // Add touch feedback
            item.addEventListener('touchstart', function() {
                this.style.transform = 'scale(0.95)';
            });
            
            item.addEventListener('touchend', function() {
                this.style.transform = 'scale(1)';
            });
            
            // Prevent double-tap zoom on gallery items
            let lastTouchEnd = 0;
            item.addEventListener('touchend', function(event) {
                const now = (new Date()).getTime();
                if (now - lastTouchEnd <= 300) {
                    event.preventDefault();
                }
                lastTouchEnd = now;
            }, false);
        });
    }

    // Initialize gallery on page load
    document.addEventListener('DOMContentLoaded', function() {
        // Show all images by default
        filterGallery('all', { target: document.querySelector('.filter-btn.active') });
        
        // Initialize mobile optimizations
        optimizeImagesForMobile();
        initMobileGallery();
        
        // Handle orientation changes on mobile
        window.addEventListener('orientationchange', function() {
            setTimeout(() => {
                // Recalculate layout after orientation change
                const galleryGrid = document.getElementById('gallery-grid');
                if (galleryGrid) {
                    galleryGrid.style.display = 'none';
                    galleryGrid.offsetHeight; // Trigger reflow
                    galleryGrid.style.display = 'grid';
                }
            }, 100);
        });
        
        // Add loading states for slow connections
        if ('connection' in navigator) {
            const connection = navigator.connection;
            if (connection.effectiveType === 'slow-2g' || connection.effectiveType === '2g') {
                // Add slower loading animation for slow connections
                document.body.classList.add('slow-connection');
            }
        }
    });

    // Add CSS for error states
    const style = document.createElement('style');
    style.textContent = `
        .image-error-placeholder {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #f8d7da, #f5c6cb);
            color: #721c24;
            font-size: 0.8rem;
        }
        
        .image-error-placeholder i {
            font-size: 1.5rem;
            margin-bottom: 0.5rem;
            color: #dc3545;
        }
        
        .slow-connection .gallery-item {
            animation-duration: 1s;
        }
        
        @media (max-width: 768px) {
            .gallery-item {
                touch-action: manipulation;
            }
            
            .gallery-overlay {
                opacity: 0.7;
            }
            
            .gallery-category {
                opacity: 1;
            }
        }
    `;
    document.head.appendChild(style);
</script>
@endsection
