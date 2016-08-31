var CACHE_NAME = 'intelligent-inspections-cache-v1.2';
var urlsToCache = [
    '/',
    '/css/main.css',
    '/css/normalize.css',
    '/js/vendor/jquery-2.1.0.min.js',
    '/js/helper.js',
    '/js/main.js',
    '/js/onlineDetect.js',
    '/cachetest.html'
];

if ('serviceWorker' in navigator) {
    navigator.serviceWorker.register('sw.js').then(function(registration){
        // registration was successful!
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
        // caches is a read-only property of the worker that returns the
        // CacheStorage object associated with the current worker context

        //the match method checks if a given request is a key in any of the cache objects
        //if so, it returns a promise that resolves to the matching response.

        caches.match(event.request)
            .then(function(response) {
                // If the response to this request is in the cache, return it.
                if (response) {
                    return response;
                }

                // IMPORTANT: Clone the request. A request is a stream and
                // can only be consumed once. Since we are consuming this
                // once by cache and once by the browser for fetch, we need
                // to clone the response
                var fetchRequest = event.request.clone();

                //response wasn't cached, so use fetch to get perform the request and get a response.

                return fetch(fetchRequest).then(
                    function(response) {
                        // Check if we received a valid response. If not return what the response was.
                        if(!response || response.status !== 200 || response.type !== 'basic') {
                            return response;
                        }

                        // IMPORTANT: Clone the response. A response is a stream
                        // and because we want the browser to consume the response
                        // as well as the cache consuming the response, we need
                        // to clone it so we have 2 stream.
                        var responseToCache = response.clone();

                        // We got a response from the request and we've cloned it.
                        // Open the cache, put the cloned response in the cache

                        caches.open(CACHE_NAME)
                            .then(function(cache) {
                                cache.put(event.request, responseToCache);
                            });
                        // then send the page to the browser.
                        return response;
                    }
                );
            })
    );
});