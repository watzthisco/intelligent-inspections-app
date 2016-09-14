var CACHE_NAME = 'intelligent-inspections-cache-v1.3';

var urlsToCache = [
    '/',
    '/newInspection.html',
    '/css/main.css',
    '/css/normalize.css',
    '/js/main.js',
    '/js/sw.js',
    '/js/onlineDetection.js',
    '/js/vendor/jquery-3.1.0.min.js'
]

if ('serviceWorker' in navigator) {
    navigator.serviceWorker.register('sw.js').then(function(registration){
        //registration was successful
        console.log('ServiceWorker registration successful with scope: ', registration.scope);
    }).catch(function(err) {
        // registration failed
        console.log('ServiceWorker registration failed: ', err);
    });
}

self.addEventListener('install', function(event) {
    event.waitUntil(
        caches.open(CACHE_NAME)
            .then(function(cache) {
                console.log('Opened cache');
                return cache.addAll(urlsToCache);
            })
    )
});

self.addEventListener('fetch', function(event) {
    event.respondWith(

        caches.match(event.request)
            .then(function(response) {

                if(response) {
                    return response;
                }

                var fetchRequest = event.request.clone();

                return fetch(fetchRequest).then(
                    function(response) {
                        if(!response || response.status !== 200 || response.type !== 'basic') {
                            return response;
                        }

                        var responseToCache = response.clone();

                        caches.open(CACHE_NAME)
                            .then(function(cache) {
                                cache.put(event.request, responseToCache);
                            });
                        return response;
                    }
                );
            })
    );
});







