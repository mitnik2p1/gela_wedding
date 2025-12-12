<!DOCTYPE html>
<html lang="en" class="wedding-theme">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Wedding Celebration')</title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Custom Styles -->
    <style>
        @include('includes.styles')
    </style>
    
    <!-- Page Specific Styles -->
    @yield('styles')
    
    <!-- Favicon -->
    <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 100 100%22><text y=%22.9em%22 font-size=%2290%22>💍</text></svg>">
</head>
<body>
    <!-- Navigation -->
    @include('partials.navigation')
    
    <!-- Main Content -->
    <main class="main-content">
        @yield('content')
    </main>
    
    <!-- Footer -->
    @include('partials.footer')
    
    <!-- Lightbox Modal -->
    <div id="lightbox" class="lightbox-overlay">
        <button class="lightbox-close" onclick="closeLightbox()">
            <i class="fas fa-times"></i>
        </button>
        <button class="lightbox-nav lightbox-prev" onclick="prevImage()">
            <i class="fas fa-chevron-left"></i>
        </button>
        <button class="lightbox-nav lightbox-next" onclick="nextImage()">
            <i class="fas fa-chevron-right"></i>
        </button>
        <div class="lightbox-content">
            <img id="lightbox-image" src="" alt="" class="lightbox-image">
            <div class="lightbox-info">
                <p id="lightbox-caption" class="lightbox-caption"></p>
                <p id="lightbox-index" class="lightbox-index"></p>
            </div>
        </div>
    </div>
    
    <!-- Scripts -->
    <script>
        @include('includes.scripts')
    </script>
    
    <!-- Page Specific Scripts -->
    @yield('scripts')
</body>
</html>