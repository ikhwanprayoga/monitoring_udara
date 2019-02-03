var CACHE_NAME = 'KUAdra_siskom';

var filesToCache = [
  'https://fonts.googleapis.com/css?family=Muli:300,300i,400,400i,600,600i,700,700i%7CComfortaa:300,400,700',
  'https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css',
  '/app-assets/css/vendors.css',
  '/app-assets/vendors/css/charts/chartist.css',
  '/app-assets/vendors/css/charts/chartist-plugin-tooltip.css',
  '/app-assets/css/app.css',
  '/app-assets/css/core/menu/menu-types/vertical-menu.css',
  '/app-assets/css/core/colors/palette-gradient.css',
  '/dataTable/jquery.dataTables.css',
  '/app-assets/css/plugins/forms/validation/form-validation.css',
  '/app-assets/vendors/js/vendors.min.js',
  '/app-assets/js/core/app-menu.js',
  '/app-assets/js/core/app.js',
  '/img/modal_rincian/temp.png',
  '/push.png',
];

self.addEventListener('install', function (event) {
  //step install
  event.waitUntil(
    caches.open(CACHE_NAME).then(function (cache) {
      console.log('install cache from sw');
      return cache.addAll(filesToCache);
    })
  );
});

// self.addEventListener('activate', function (event) {
//   event.waitUntil(
//     caches.keys().then(function (cacheNames) {
//       return Promise.all(
//         cacheNames.filter(function (cacheName) {
//           return cacheName != CACHE_NAME
//         }).map(function (cacheName) {
//           return caches.delete(cacheName);
//         })
//       );
//     })
//   );
// });

// self.addEventListener('fetch', function (event) {
//   event.respondWith(
//     caches.match(event.request)
//     .then(function (response) {
//       if (response) {
//         return response;
//       } else {
//         return fetch(event.request)
//         .then(function (res) {
//           return caches.open('dynamic')
//           .then(function (cache) {
//             cache.put(event.request.url, res.clone());
//             return res;
//             console.log(res);
//           })
//         })
//       }
//     })
//     .catch(function (err) {
//       return caches.match(event.request);
//       console.log(err);
//     })
//   );
// });

self.addEventListener('push', function(event) {
  if (event.data) {
    var data = event.data.json();
    self.registration.showNotification(data.title,{
      body: data.body,
      icon: data.icon
    });
    console.log('This push event has data: ', event.data.text());
  } else {
    console.log('This push event has no data.');
  }
});

self.addEventListener('notificationclick', function(event) {
  console.log('Notification click: tag ', event.notification.tag);
  event.notification.close();
  var url = 'localhost:8000/mobile/beranda/rekomendasi';
  console.log('kliknieto');
  event.waitUntil(
    clients.matchAll({
        type: 'window'
    })
    .then(function(windowClients) {
        for (var i = 0; i < windowClients.length; i++) {
            var client = windowClients[i];
            if (client.url === url && 'focus' in client) {
                return client.focus();
            }
        }
        if (clients.openWindow) {
            return clients.openWindow(url);
        }
    })
);
});

// self.addEventListener('fetch', function (e) {
//   var request = e.request;
//   e.respondWith(
//     fetch(e.request)
//     .then(function (res) {
//       return caches.open('dynamic_cache')
//       .then(function (cache) {
//         cache.put(e.request.url, res.clone());
//         return res;
//       })
//     })
//     .catch(function (err) {
//       return caches.match(e.request);
//     })
//   )
// });