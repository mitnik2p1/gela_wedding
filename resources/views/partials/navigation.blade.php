<nav class="main-nav">
    <div class="nav-container">
        <a href="{{ route('home') }}" class="nav-brand">
            💍 T & H
        </a>
        
        <button class="mobile-menu-btn" id="mobileMenuButton">
            <i class="fas fa-bars"></i>
        </button>
        
        <ul class="nav-menu" id="navMenu">
            <li>
                <a href="{{ route('home') }}" 
                   class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">
                    Home
                </a>
            </li>
            <li>
                <a href="{{ route('memories') }}" 
                   class="nav-link {{ request()->routeIs('memories') ? 'active' : '' }}">
                    Memories
                </a>
            </li>
            <li>
                <a href="{{ route('gallery') }}" 
                   class="nav-link {{ request()->routeIs('gallery') ? 'active' : '' }}">
                    Gallery
                </a>
            </li>
        </ul>
    </div>
</nav>

<div style="height: 4rem;"></div> <!-- Spacer for fixed nav -->

<script>
    // ============================================
    // MOBILE NAVIGATION FUNCTIONS
    // ============================================
    
    // Define the toggleMobileMenu function in global scope
    window.toggleMobileMenu = function() {
        const navMenu = document.getElementById('navMenu');
        if (navMenu) {
            navMenu.classList.toggle('active');
            console.log('Mobile menu toggled');
        }
    };
    
    // Also attach event listener for better practice
    document.addEventListener('DOMContentLoaded', function() {
        const mobileMenuButton = document.getElementById('mobileMenuButton');
        if (mobileMenuButton) {
            mobileMenuButton.addEventListener('click', toggleMobileMenu);
        }
        
        // Close mobile menu when clicking outside
        document.addEventListener('click', function(event) {
            const navMenu = document.getElementById('navMenu');
            const mobileBtn = document.querySelector('.mobile-menu-btn');
            
            if (navMenu && navMenu.classList.contains('active')) {
                if (!navMenu.contains(event.target) && !mobileBtn.contains(event.target)) {
                    navMenu.classList.remove('active');
                }
            }
        });
        
        // Close mobile menu when clicking a link
        const navLinks = document.querySelectorAll('.nav-link');
        navLinks.forEach(link => {
            link.addEventListener('click', function() {
                const navMenu = document.getElementById('navMenu');
                if (navMenu && navMenu.classList.contains('active')) {
                    navMenu.classList.remove('active');
                }
            });
        });
    });
</script>