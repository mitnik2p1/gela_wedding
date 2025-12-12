// Wedding Website Service Worker for Image Caching
const CACHE_NAME = 'wedding-images-v1';
const IMAGE_CACHE_NAME = 'wedding-images-cache-v1';

// Images to cache immediately
const CRITICAL_IMAGES = [
    '/Images/gallery/QE9A0408.png',
    '/Images/gallery/QE9A0402.png',
    '/Images/gallery/QE9A0404.png',
    '/Images/gallery/QE9A0346.png'
];

// Install event - cache critical images
self.addEventListener('install', event => {
    event.waitUntil(
        caches.open(IMAGE_CACHE_NAME)
            .then(cache => {
                console.log('Caching critical images');
                return cache.addAll(CRITICAL_IMAGES);
            })
            .then(() => {
                return self.skipWaiting();
            })
    );
});

// Activate event - clean up old caches
self.addEventListener('activate', event => {
    event.waitUntil(
        caches.keys().then(cacheNames => {
            return Promise.all(
                cacheNames.map(cacheName => {
                    if (cacheName !== CACHE_NAME && cacheName !== IMAGE_CACHE_NAME) {
                        console.log('Deleting old cache:', cacheName);
                        return caches.delete(cacheName);
                    }
                })
            );
        }).then(() => {
            return self.clients.claim();
        })
    );
});

// Fetch event - serve images from cache with network fallback
self.addEventListener('fetch', event => {
    // Only handle image requests
    if (event.request.destination === 'image' || 
        event.request.url.includes('/Images/') ||
        event.request.url.match(/\.(png|jpg|jpeg|gif|webp|svg)$/i)) {
        
        event.respondWith(
            caches.open(IMAGE_CACHE_NAME)
                .then(cache => {
                    return cache.match(event.request)
                        .then(cachedResponse => {
                            if (cachedResponse) {
                                // Serve from cache
                                return cachedResponse;
                            }
                            
                            // Fetch from network and cache
                            return fetch(event.request)
                                .then(networkResponse => {
                                    // Only cache successful responses
                                    if (networkResponse.status === 200) {
                                        cache.put(event.request, networkResponse.clone());
                                    }
                                    return networkResponse;
                                })
                                .catch(() => {
                                    // Return a placeholder image if network fails
                                    return new Response(
                                        '<svg width="400" height="300" xmlns="http://www.w3.org/2000/svg"><rect width="100%" height="100%" fill="#f0f0f0"/><text x="50%" y="50%" text-anchor="middle" dy=".3em" fill="#999">Image not available</text></svg>',
                                        { headers: { 'Content-Type': 'image/svg+xml' } }
                                    );
                                });
                        });
                })
        );
    }
});

// Background sync for preloading images
self.addEventListener('message', event => {
    if (event.data && event.data.type === 'PRELOAD_IMAGES') {
        const imagesToPreload = event.data.images;
        
        caches.open(IMAGE_CACHE_NAME)
            .then(cache => {
                return Promise.all(
                    imagesToPreload.map(imageUrl => {
                        return fetch(imageUrl)
                            .then(response => {
                                if (response.status === 200) {
                                    return cache.put(imageUrl, response);
                                }
                            })
                            .catch(error => {
                                console.log('Failed to preload image:', imageUrl);
                            });
                    })
                );
            })
            .then(() => {
                event.ports[0].postMessage({ success: true });
            });
    }
});