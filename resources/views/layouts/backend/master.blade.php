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

    @yield('css')
  </head>
  <body class="vertical-layout vertical-menu 2-columns   menu-expanded fixed-navbar" data-open="click" data-menu="vertical-menu" data-color="bg-gradient-x-purple-blue" data-col="2-columns">

    <nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-semi-light"> 
      <div class="navbar-wrapper">
        <div class="navbar-container content">
          <div class="collapse navbar-collapse show" id="navbar-mobile">
            <ul class="nav navbar-nav mr-auto float-left">
              <li class="nav-item mobile-menu d-md-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu font-large-1"></i></a></li>
              <li class="nav-item d-none d-md-block"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu"></i></a></li>
              <li class="nav-item d-none d-md-block"><a class="nav-link nav-link-expand" href="#"><i class="ficon ft-maximize"></i></a></li>
            </ul>
            <ul class="nav navbar-nav float-right">
              <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">             <span class="avatar avatar-online"><img src="{{ asset('app-assets/images/portrait/small/avatar-s-19.png') }}" alt="avatar"></span></a>
                <div class="dropdown-menu dropdown-menu-right">
                  <div class="arrow_box_right"><a class="dropdown-item" href="#"><span class="avatar avatar-online"><img src="{{ asset('app-assets/images/portrait/small/avatar-s-19.png') }}" alt="avatar"><span class="user-name text-bold-700 ml-1">John Doe</span></span></a>
                    <div class="dropdown-divider"></div><a class="dropdown-item" href="user-profile.html"><i class="ft-user"></i> Edit Profile</a><a class="dropdown-item" href="email-application.html"><i class="ft-mail"></i> My Inbox</a><a class="dropdown-item" href="project-summary.html"><i class="ft-check-square"></i> Task</a><a class="dropdown-item" href="chat-application.html"><i class="ft-message-square"></i> Chats</a>
                    <div class="dropdown-divider"></div><a class="dropdown-item" href="login.html"><i class="ft-power"></i> Logout</a>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </nav>

    <!-- ////////////////////////////////////////////////////////////////////////////-->


    <div class="main-menu menu-fixed menu-light menu-accordion    menu-shadow " data-scroll-to-active="true" data-img="{{ asset('app-assets/images/backgrounds/02.jpg') }}">
      <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">       
          <li class="nav-item mr-auto"><a class="navbar-brand" href="index.html"><img class="brand-logo" alt="Chameleon admin logo" src="{{ asset('app-assets/images/logo/logo.png') }}"/>
              <h3 class="brand-text">Chameleon</h3></a></li>
          <li class="nav-item d-md-none"><a class="nav-link close-navbar"><i class="ft-x"></i></a></li>
        </ul>
      </div>
      <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
          <li id="beranda" class=" nav-item"><a href="{{ route('beranda') }}"><i class="ft-home"></i><span class="menu-title" data-i18n="">Beranda</span></a>
          </li>
          <li id="monitoring" class=" nav-item"><a href="{{ route('monitoring') }}"><i class="ft-bar-chart-2"></i><span class="menu-title" data-i18n="">Monitoring</span></a>
          </li>
          <li id="data" class=" nav-item"><a href="{{ route('data') }}"><i class="ft-bar-chart-2"></i><span class="menu-title" data-i18n="">Data</span></a>
          </li>
          {{-- <li id="data" class=" nav-item"><a href="#"><i class="ft-bar-chart-2"></i><span class="menu-title" data-i18n="">Data</span></a>
            <ul class="menu-content">
              <li id="realtime"><a class="menu-item" href="{{ route('realtime') }}">Data Realtime</a>
              </li>
              <li id="allData"><a class="menu-item" href="{{ route('data') }}">Semua Data</a>
              </li>
            </ul>
          </li> --}}
          <li id="master" class=" nav-item"><a href="#"><i class="ft-bar-chart-2"></i><span class="menu-title" data-i18n="">Master</span></a>
            <ul class="menu-content">
              <li id="rekomendasi" class=" nav-item"><a href="{{ route('rekomendasi') }}">Rekomendasi</span></a>
              </li>
              {{-- <li id="kategori-udara" class=" nav-item"><a href="{{ route('kategori-udara') }}">Kategori Udara</a>
              </li> --}}
              <li id="nodesensor"><a class="menu-item" href="{{ route('node-sensor') }}">Node Sensor</a>
              </li>
              <li id="wilayah"><a class="menu-item" href="{{ route('wilayah') }}">Wilayah</a>
              </li>
            </ul>
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
    <script src="{{ asset('dataTable/jquery.dataTables.js') }}" type="text/javascript"></script>
    @yield('js')
  </body>
</html>