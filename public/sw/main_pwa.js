function sendSubcriptionToBackEnd(subscription) {
    return fetch('/api/save-subscription/')
}

function getSWRegistration() {
    var promise = new Promise(function(resolve, reject) {
        if (_registration != null) {
            resolve(_registration);
        } else {
            reject(Error('it broke'));
        }
    })

    return promise;
}

function subscribeUserToPush() {
    getSWRegistration()
    .then(function (registration) {
        console.log(registration);
        const subscribeOptions = {
            userVisibleOnly: true,
            applicationServerKey: urlBase64ToUint8Array(
                "{{ env('VAPID_PUBLIC_KEY') }}"
            )
        }

        return registration.pushManager.subscribe(subscribeOptions);
    })
    .then(function (pushSubscription) {
        console.log('push notifikasi diterima', JSON.stringify(pushSubscription));
        sendSubcriptionToBackEnd(pushSubscription);
        return pushSubscription;
    })
}

function askPermission() {
    return new Promise(function (resolve, reject) {
        const permissionResult = Notification.requestPermission(function (result) {
            resolve(result);
        })

        if (permissionResult) {
            permissionResult.then(resolve, reject);
        }
    })
    .then(function (permissionResult) {
        if (permissionResult !== 'granted') {
            throw new Error('tidak setuju berlangganan');
        } else {
            subscribeUserToPush();
        }
    })
}

function enableNotifications() {
    console.log('enable nof clik');
    askPermission();
}

var _registration = null;
if ('serviceWorker' in navigator && 'PushManager' in window) {
    console.log('server worker and push notification i supported');
    
    navigator.serviceWorker.register('/sw/service-worker.js')
    .then(function (swReg) {
        console.log('sw registered', swReg);

        _registration = swReg;
        return swReg;
    })
    .catch(function (error) {
        console.log('sw error', error);
    })
} else {
    console.warn('push notification not support');
    //tulis text tombol , 'push not support'
}