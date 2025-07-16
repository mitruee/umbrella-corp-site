const staticCacheName = 's-app-v1';

const assetUrls = [
    '/',
    '/index.html',
    '/css/styles.css',
    '/img/umbrella_logo.png',
    '/img/spencer.png',
    '/contacts.html'
];

self.addEventListener('install', async event => {
    const cache = await caches.open(staticCacheName);
    await cache.addAll(assetUrls);
});  

self.addEventListener('activate', event => {
    console.log('Service Worker activated');
}); 

self.addEventListener('fetch', event => {
    console.log('Fetch', event.request.url);
    event.respondWith(cacheFirst(event.request));
}); 

async function cacheFirst(request) {
    const cached = await caches.match(request);
    return cached ?? await fetch(request);
}