<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Chameleon Admin is a modern Bootstrap 4 webapp &amp; admin dashboard html template with a large number of components, elegant design, clean and organized code.">
    <meta name="keywords" content="admin template, Chameleon admin template, dashboard template, gradient admin template, responsive admin template, webapp, eCommerce dashboard, analytic dashboard">
    <meta name="author" content="ThemeSelect">
    @yield('header')
    <link rel="manifest" href="{{ asset('manifest.json') }}">
    <link rel="apple-touch-icon" href="{{ asset('app-assets/images/ico/apple-icon-120.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('app-assets/images/ico/favicon.ico') }}">
    <link href="https://fonts.googleapis.com/css?family=Muli:300,300i,400,400i,600,600i,700,700i%7CComfortaa:300,400,700" rel="stylesheet">
    <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css" rel="stylesheet">
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/vendors.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/charts/chartist.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/charts/chartist-plugin-tooltip.css')}}">
    <!-- END VENDOR CSS-->
    <!-- BEGIN CHAMELEON  CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/app.css')}}">
    <!-- END CHAMELEON  CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/core/menu/menu-types/vertical-menu.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/core/colors/palette-gradient.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dataTable/jquery.dataTables.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/plugins/forms/validation/form-validation.css') }}">

    <style>
      .header-navbar {
        max-height: 2rem !important;
        min-height: 2rem !important;
      }
      /* .side_item {
        height: 4rem;
      }
      .lebar_menu {
        width: 70% !important;
      }
      .navbar_header_lebar {
        width: 100%;
      } */
    </style>

    @yield('css')
  </head>
  <body class="vertical-layout vertical-menu 2-columns menu-expanded fixed-navbar pt-3" data-open="click" data-menu="vertical-menu" data-color="bg-gradient-x-purple-blue" data-col="2-columns">

    <nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-semi-light"> 
      <div class="navbar-wrapper">
        <div class="navbar-container content">
          <div class="collapse navbar-collapse show" id="navbar-mobile">
            <ul class="nav navbar-nav mr-auto float-left">
              <li class="nav-item mobile-menu d-md-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs pb-0 pt-1" href="#"><i class="ft-menu font-medium-5"></i></a></li>
              <li class="nav-item d-none d-md-block"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu"></i></a></li>
            </ul>
            <ul class="nav navbar-nav float-right">
              <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown"><span class="ft-user"><span class="menu-title" data-i18n=""></span></a>
                <div class="dropdown-menu dropdown-menu-right">
                  <div class="arrow_box_right"><a class="dropdown-item" href="#"><span class="avatar avatar-online"><span class="user-name text-bold-700 ml-1">{{ Auth::user()->name }}</span></span></a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                          <i class="ft-power"></i>{{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </a>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </nav>

    <!-- ////////////////////////////////////////////////////////////////////////////-->


    <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow lebar_menu" data-scroll-to-active="true" data-img="{{ asset('app-assets/images/backgrounds/02.jpg') }}">
      <div class="navbar-header navbar_header_lebar">
        <ul class="nav navbar-nav flex-row">       
          <li class="nav-item mr-auto"><a class="navbar-brand" href="{{ route('mobile.beranda') }}"><img class="brand-logo" alt="Chameleon admin logo" src="{{ asset('app-assets/images/logo/logo.png') }}"/>
              <h3 class="brand-text">Chameleon</h3></a></li>
          <li class="nav-item d-md-none"><a class="nav-link close-navbar"><i class="ft-x"></i></a></li>
        </ul>
      </div>
      <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
          <li id="" class="side_item nav-item"><a href="{{ route('mobile.beranda') }}"><i class="ft-home"></i><span class="menu-title" data-i18n="">Beranda</span></a>
          </li>
          <li id="" class="side_item nav-item"><a href="{{ route('mobile.data') }}"><i class="ft-activity"></i><span class="menu-title" data-i18n="">Data</span></a>
          </li>
          <li id="" class="side_item nav-item"><a href="{{ route('mobile.setting') }}"><i class="ft-settings"></i><span class="menu-title" data-i18n="">Setting</span></a>
          </li>
        </ul>
      </div>
      <div class="navigation-background"></div>
    </div>
    
    @yield('content')

    <footer class="footer footer-static footer-light navbar-border navbar-shadow">
      <div class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2"><span class="float-md-left d-block d-md-inline-block">{{ date('Y')}}  &copy; Copyright Ikhwan Prayoga</span>
      </div>
    </footer>

    <!-- BEGIN VENDOR JS-->
    <script src="{{ asset('app-assets/vendors/js/vendors.min.js')}}" type="text/javascript"></script>
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN CHAMELEON  JS-->
    <script src="{{ asset('app-assets/js/core/app-menu.js')}}" type="text/javascript"></script>
    <script src="{{ asset('app-assets/js/core/app.js')}}" type="text/javascript"></script>
    <!-- END CHAMELEON  JS-->
    {{-- <script src="{{ asset('dataTable/jquery.dataTables.js') }}" type="text/javascript"></script> --}}
    
    @yield('js')

    <script>
    let isSubscribe = false;
    
    function cek_member_status() {
      $.get('{{ route('member.cek', ['member' => auth::user()->id]) }}', function (data) {
          if (data == 1) {
            isSubscribe = true;
            updateBTN(1);
          } else {
            isSubscribe = false;
            updateBTN(0);
          }
      });
    }

    function updateBTN(isSubscribe) {
      if (isSubscribe) {
        $('#btn_icon').removeClass("ft-bell").addClass("ft-bell-off");
      } else {
        $('#btn_icon').addClass("ft-bell");
      }
    }

    function sendSubcriptionToBackEnd(subscription) {
        return fetch('{{ asset('api/save-subscription/'.Auth::user()->id) }}', {
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
            isSubscribe = true;
            updateBTN(isSubscribe);
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

    function disPushNotification() {
        $.get('{{ route('delete.subscription', ['id' => auth::user()->id]) }}', function (data) {
          if (data == 1) {
            console.log('subscription berhasil di hapus!');
            updateBTN(0);
          } else {
            console.log('ada masal dengan server !');
          }
        });
    }

    function enableNotifications() {
        console.log('enable nof clik');

        if (isSubscribe) {
          console.log('hapus subscribe');
          disPushNotification();
          isSubscribe = false;
        } else {
          console.log('berhasil subscribe');
          askPermission();
        }
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

    cek_member_status();

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
    
    </script>
  </body>
</html>