@extends('layouts.auth_master')

@section('css')

@endsection

@section('content')
<div class="row flexbox-container">
    <div class="col-12 d-flex align-items-center justify-content-center p-1">
        <div class="card mr-3 ml-3 ">
            <div class="card-header">
                <h4 class="card-title" id="basic-layout-square-controls">Push Notification</h4>
            </div>
            <div class="card-content collapse show">
                <div class="card-body">

                    <div class="card-text">
                        <p>Dengan mengaktifkan push Notification maka anda akan mendapatkan informasi peringatan kualitas udara
                            secara push Notification.
                        </p>
                    </div>

                    {{-- <form > --}}
                        {{-- @csrf --}}
                        {{-- <input type="hidden" value="{{ auth::user()->id }}" name="user"> --}}
                        <div class="form-body">
                            <div class="form-group skin-states icheck_minimal skin">
                                <label for="donationinput3">Pilih Mode</label>
                                <fieldset>
									<input type="radio" name="push_notification" value="1" checked>
									<label for="input-radio-15">Enable Push Notification</label>
								</fieldset>
								<fieldset>
									<input type="radio" name="push_notification" value="0">
									<label for="input-radio-16">Disable Push Notification</label>
								</fieldset>
                            </div>
                        </div>

                        <div class="form-actions right">
                            <button type="submit" class="btn btn-sm btn-primary" onclick="cek_permission_pn()">
                                <i class="ft-plus"></i> Lanjutkan
                            </button>
                        </div>
                    {{-- </form> --}}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
let isSubscribe = false;

function sendSubcriptionToBackEnd(subscription) {
    return fetch('{{ url('/api/save-subscription/'.Auth::user()->id) }}', {
        method: 'post',
        headers: {
        'Content-Type' : 'aplication/json'
        },
        body: JSON.stringify(subscription)
    })
    .then(function (response) {

        if (!response.ok) {
            throw new Error('bad status dari server!');
        } 
        
        window.location.href = '{{ route('mobile.beranda') }}';
        return response.json();
    })
    .then(function (responseData) {
        if (!(responseData.data && responseData.data.success)) {
            console.log(responseData.data);
            throw new Error('bad response dari server!');
        }
    })
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
    .catch(function (err) {
        console.log('user failed subscribe', err);
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

var _registration = null;
if ('serviceWorker' in navigator && 'PushManager' in window) {
    console.log('server worker and push notification i supported');
    
    navigator.serviceWorker.register('{{ asset('service-worker.js') }}')
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

function cek_permission_pn() {
    var pn = $('input:radio[name="push_notification"]:checked').val();
    if (pn == 1) {
        console.log('satu');
        enableNotifications();
    } 
    if (pn == 0) {
        console.log('nol');
        window.location.href = '{{ route('mobile.beranda') }}';
        // window.location.replace('{{ route('mobile.beranda') }}');
    }
    console.log(pn);
}

</script>
@endsection