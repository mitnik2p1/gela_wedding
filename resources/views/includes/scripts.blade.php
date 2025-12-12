// ============================================
// MOBILE NAVIGATION
// ============================================
function toggleMobileMenu() {
    const navMenu = document.getElementById('navMenu');
    navMenu.classList.toggle('active');
}

// Close mobile menu when clicking outside
document.addEventListener('click', (e) => {
    const navMenu = document.getElementById('navMenu');
    const mobileBtn = document.querySelector('.mobile-menu-btn');
    
    if (!navMenu.contains(e.target) && !mobileBtn.contains(e.target) && navMenu.classList.contains('active')) {
        navMenu.classList.remove('active');
    }
});

// ============================================
// LIGHTBOX GALLERY
// ============================================
let currentImageIndex = 0;
const galleryImages = [
    'QE9A0254.png', 'QE9A0257.png', 'QE9A0264.png', 'QE9A0272.png', 'QE9A0291.png',
    'QE9A0295.png', 'QE9A0307.png', 'QE9A0311.png', 'QE9A0317.png', 'QE9A0328.png',
    'QE9A0346.png', 'QE9A0350.png', 'QE9A0356.png', 'QE9A0357.png', 'QE9A0385.png',
    'QE9A0397.png', 'QE9A0402.png', 'QE9A0408.png', 'QE9A0510.png', 'QE9A0515.png',
    'QE9A0527.png', 'QE9A0532.png', 'QE9A0554.png', 'QE9A0558.png', 'QE9A0567.png',
    'QE9A0571.png', 'QE9A0582.png', 'QE9A0591.png', 'QE9A0595.png', 'QE9A0608.png',
    'QE9A0612.png', 'QE9A0629.png', 'QE9A0640.png', 'QE9A0649.png'
];
const totalImages = galleryImages.length;

function openLightbox(index) {
    currentImageIndex = index - 1; // Convert to 0-based index
    updateLightbox();
    const lightbox = document.getElementById('lightbox');
    lightbox.classList.add('active');
    document.body.style.overflow = 'hidden';
}

function closeLightbox() {
    const lightbox = document.getElementById('lightbox');
    lightbox.classList.remove('active');
    document.body.style.overflow = 'auto';
}

function nextImage() {
    currentImageIndex = (currentImageIndex + 1) % totalImages;
    updateLightbox();
}

function prevImage() {
    currentImageIndex = currentImageIndex === 0 ? totalImages - 1 : currentImageIndex - 1;
    updateLightbox();
}

function updateLightbox() {
    const lightboxImage = document.getElementById('lightbox-image');
    const lightboxCaption = document.getElementById('lightbox-caption');
    const lightboxIndex = document.getElementById('lightbox-index');
    
    if (!lightboxImage || !lightboxCaption || !lightboxIndex) return;
    
    // Show loading state
    lightboxImage.style.opacity = '0.5';
    lightboxCaption.textContent = 'Loading...';
    
    // Reset animation
    lightboxImage.classList.remove('active');
    void lightboxImage.offsetWidth; // Trigger reflow
    
    // Update content with actual gallery images
    const imageName = galleryImages[currentImageIndex];
    const imageUrl = `/Images/gallery/${imageName}`;
    
    // Preload image for better mobile performance
    const tempImg = new Image();
    tempImg.onload = function() {
        lightboxImage.src = imageUrl;
        lightboxImage.alt = `Wedding Memory ${currentImageIndex + 1}`;
        lightboxCaption.textContent = `Beautiful Wedding Memory ${currentImageIndex + 1}`;
        lightboxIndex.textContent = `${currentImageIndex + 1} / ${totalImages}`;
        
        // Show loaded image
        lightboxImage.style.opacity = '1';
        lightboxImage.classList.add('active');
    };
    
    tempImg.onerror = function() {
        console.error(`Failed to load image: ${imageName}`);
        lightboxCaption.textContent = `Image ${currentImageIndex + 1} - Loading Error`;
        lightboxImage.style.opacity = '1';
        
        // Show error placeholder
        lightboxImage.src = 'data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNDAwIiBoZWlnaHQ9IjMwMCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48cmVjdCB3aWR0aD0iMTAwJSIgaGVpZ2h0PSIxMDAlIiBmaWxsPSIjZjhmOWZhIi8+PHRleHQgeD0iNTAlIiB5PSI1MCUiIGZvbnQtZmFtaWx5PSJBcmlhbCwgc2Fucy1zZXJpZiIgZm9udC1zaXplPSIxOCIgZmlsbD0iIzZjNzU3ZCIgdGV4dC1hbmNob3I9Im1pZGRsZSIgZHk9Ii4zZW0iPkltYWdlIFVuYXZhaWxhYmxlPC90ZXh0Pjwvc3ZnPg==';
    };
    
    // Start loading
    tempImg.src = imageUrl;
}

// Keyboard navigation for lightbox
document.addEventListener('keydown', (e) => {
    const lightbox = document.getElementById('lightbox');
    if (lightbox.classList.contains('active')) {
        if (e.key === 'Escape') closeLightbox();
        if (e.key === 'ArrowRight') nextImage();
        if (e.key === 'ArrowLeft') prevImage();
    }
});

// Close lightbox when clicking on overlay
document.getElementById('lightbox').addEventListener('click', (e) => {
    if (e.target.id === 'lightbox') {
        closeLightbox();
    }
});

// Mobile touch support for lightbox
let touchStartX = 0;
let touchEndX = 0;

function handleTouchStart(e) {
    touchStartX = e.changedTouches[0].screenX;
}

function handleTouchEnd(e) {
    touchEndX = e.changedTouches[0].screenX;
    handleSwipe();
}

function handleSwipe() {
    const swipeThreshold = 50;
    const swipeDistance = touchEndX - touchStartX;
    
    if (Math.abs(swipeDistance) > swipeThreshold) {
        if (swipeDistance > 0) {
            // Swipe right - previous image
            prevImage();
        } else {
            // Swipe left - next image
            nextImage();
        }
    }
}

// Add touch event listeners when lightbox is available
document.addEventListener('DOMContentLoaded', function() {
    const lightbox = document.getElementById('lightbox');
    if (lightbox) {
        lightbox.addEventListener('touchstart', handleTouchStart, { passive: true });
        lightbox.addEventListener('touchend', handleTouchEnd, { passive: true });
    }
});

// ============================================
// SCROLL ANIMATIONS
// ============================================
function initScrollAnimations() {
    const observerOptions = {
        root: null,
        rootMargin: '0px',
        threshold: 0.1
    };
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('opacity-100', 'translate-y-0');
                entry.target.classList.remove('opacity-0', 'translate-y-4');
            }
        });
    }, observerOptions);
    
    // Observe all elements with scroll animations
    document.querySelectorAll('.opacity-0').forEach(el => {
        observer.observe(el);
    });
}

// ============================================
// COUNTDOWN TIMER (Global function)
// ============================================
function updateCountdown(elementId, weddingDate) {
    const now = new Date().getTime();
    const timeRemaining = weddingDate - now;
    
    if (timeRemaining < 0) {
        document.getElementById(`${elementId}-days`).textContent = '00';
        document.getElementById(`${elementId}-hours`).textContent = '00';
        document.getElementById(`${elementId}-minutes`).textContent = '00';
        document.getElementById(`${elementId}-seconds`).textContent = '00';
        return;
    }
    
    // Calculate time units
    const days = Math.floor(timeRemaining / (1000 * 60 * 60 * 24));
    const hours = Math.floor((timeRemaining % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    const minutes = Math.floor((timeRemaining % (1000 * 60 * 60)) / (1000 * 60));
    const seconds = Math.floor((timeRemaining % (1000 * 60)) / 1000);
    
    // Format with leading zeros
    const format = (num) => num.toString().padStart(2, '0');
    
    // Update elements
    updateCountdownElement(`${elementId}-days`, format(days));
    updateCountdownElement(`${elementId}-hours`, format(hours));
    updateCountdownElement(`${elementId}-minutes`, format(minutes));
    updateCountdownElement(`${elementId}-seconds`, format(seconds));
}

function updateCountdownElement(id, newValue) {
    const element = document.getElementById(id);
    if (element && element.textContent !== newValue) {
        element.classList.add('updated');
        element.textContent = newValue;
        setTimeout(() => element.classList.remove('updated'), 600);
    }
}

// ============================================
// INITIALIZATION
// ============================================
document.addEventListener('DOMContentLoaded', function() {
    // Initialize animations
    initScrollAnimations();
    
    // Add animation classes to elements
    document.querySelectorAll('.animate-fade-in-up').forEach((el, index) => {
        el.style.animationDelay = `${index * 0.1}s`;
    });
    
    // Add hover effects to cards
    document.querySelectorAll('.card').forEach(card => {
        card.addEventListener('mouseenter', () => {
            card.style.transform = 'translateY(-0.5rem)';
            card.style.boxShadow = '0 12px 36px rgba(0, 0, 0, 0.25)';
        });
        
        card.addEventListener('mouseleave', () => {
            card.style.transform = 'translateY(0)';
            card.style.boxShadow = '0 4px 12px rgba(0, 0, 0, 0.15)';
        });
    });
});