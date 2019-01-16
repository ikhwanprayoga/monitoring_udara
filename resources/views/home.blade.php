@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="panel-body">
                    <button class="btn btn-info" id="enable-notifications" onclick="enableNotifications()"> Enable Push Notifications </button>
                    <div class="form-group">
                    <input class="form-control" id="title" placeholder="Notification Title">
                    </div>
                    <div class="form-group">
                    <textarea id="body" class="form-control" placeholder="Notification body"></textarea>
                    </div>
                    <div class="form-group">
                    <button class="btn" onclick="sendNotification()">Send Notification</button>
                  </div>
                </div>

            </div>
        </div>
    </div>
</div>

<script>
function sendNotification() {
    var data = new FormData();
    data.append('title', document.getElementById('title').value);
    data.append('body', document.getElementById('body').value);

    var xhr = new XMLHttpRequest();
    xhr.open("POST", "{{ url('/api/send-notification/' .auth()->user()->id) }}", true);
    xhr.onload = function () {
        console.log(this.responseText);
    }
    xhr.send(data);
}

var _registration = null;
function registerServiceWorker() {
    return navigator.serviceWorker.register('{{ asset('/sw/service-worker.js') }}')
    .then(function (registration) {
        console.log('service worker berhasil di register', registration);
        _registration = registration;
        return registration;
    })
    .catch(function (err) {
        console.log('tidak bisa meregister service workers', err);
    })
}

function sendSubscriptionToBackEnd(subscription) {
    return fetch("{{ url('/api/save-subscription/'.Auth::user()->id) }}", {
        method: "POST",
        headers: {
            "Content-Type" : "aplication/json"
        },
        body: JSON.stringify(subscription)
    })
    .then(function (response) {
        if (!response.ok) {
            throw new Error('bad status code dari server!');
        }
        
        return response.json();
    })
    .then(function (responseData) {
        if (!(responseData.data && responseData.data.success)) {
            console.log(responseData.data);
            throw new Error('bad response dari server');
        }
    })
}

function getSWRegistration(){
  var promise = new Promise(function(resolve, reject) {
  // do a thing, possibly async, then…

  if (_registration != null) {
    resolve(_registration);
  }
  else {
    reject(Error("It broke"));
  }
  });
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
        };

        return registration.pushManager.subscribe(subscribeOptions);
    })
    .then(function (pushSubscription) {
        console.log('push notifikasi di terima', JSON.stringify(pushSubscription));
        sendSubscriptionToBackEnd(pushSubscription);
        return pushSubscription;
    });
}

function askPermission() {
    return new Promise(function (resolve, reject) {
        const permissionResult = Notification.requestPermission(function (result) {
           resolve(result); 
        });

        if (permissionResult) {
            permissionResult.then(resolve, reject);
        }
    })
    .then(function (permissionResult) {
        if (permissionResult !== 'granted') {
            throw new Error('tidak setuju berlangganan');
        }
        else{
            subscribeUserToPush();
        }
    });
}

function urlBase64ToUint8Array(base64String) {
  const padding = '='.repeat((4 - base64String.length % 4) % 4);
  const base64 = (base64String + padding)
    .replace(/\-/g, '+')
    .replace(/_/g, '/');

  const rawData = window.atob(base64);
  const outputArray = new Uint8Array(rawData.length);

  for (let i = 0; i < rawData.length; ++i) {
    outputArray[i] = rawData.charCodeAt(i);
  }
  return outputArray;
}

function enableNotifications() {
    askPermission();
}

registerServiceWorker();
</script>

@endsection
