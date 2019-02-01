@extends('layouts.backend.master')

@section('header')
<title>Beranda</title>
@endsection

@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/fonts/simple-line-icons/style.min.css') }}">
{{-- <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/pages/chat-application.css') }}"> --}}
{{-- <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/pages/advanced-cards.css') }}"> --}}
@endsection

@section('content')
    <div class="app-content content">
      <div class="content-wrapper">
        <div class="content-wrapper-before"></div>
        <div class="content-header row">
        </div>
        <div class="content-body">
            <div class="row">
                <div class="col-xl-7 col-xs-12">
                    <section id="chartjs-polar-charts">
                        <div class="row">
                            <!-- Polar Chart -->
                            <div class="col-md-12 col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Node Sensor Perwilayah</h4>
                                        
                                    </div>
                                    <div class="card-content collapse show">
                                        <div class="card-body">
                                                <div class="height-400">
                                            <canvas id="polar-chart"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <div class="col-xl-5 col-xs-12">
                    <div class="col-xl-12 col-lg-6 col-md-12">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="media d-flex">
                                        <div class="align-self-top">
                                            <i class="icon-eye icon-opacity info font-large-4"></i>
                                        </div>
                                        <div class="media-body text-right align-self-bottom mt-3">
                                            <span class="d-block mb-1 font-medium-1">Jumlah Sensor</span>
                                            <h1 class="info mb-0">{{ $sensor->count() }}</h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-12 col-lg-6 col-md-12">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="media d-flex">
                                        <div class="align-self-top">
                                            <i class="icon-pointer icon-opacity warning font-large-4"></i>
                                        </div>
                                        <div class="media-body text-right align-self-bottom mt-3">
                                            <span class="d-block mb-1 font-medium-1">Jumlah Wilayah</span>
                                            <h1 class="warning mb-0">{{ $wilayah->count() }}</h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @role('superadmin')
                    <div class="col-xl-12 col-lg-6 col-md-12">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="media d-flex">
                                        <div class="align-self-top">
                                            <i class="icon-users icon-opacity success font-large-4"></i>
                                        </div>
                                        <div class="media-body text-right align-self-bottom mt-3">
                                            <span class="d-block mb-1 font-medium-1">Jumlah User</span>
                                            <h1 class="warning mb-0">{{ $user->where('id', '!=', 1)->count() }}</h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endrole
                </div>
            </div>
            
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="card">
                        {{-- <div class="card-header">
                            <h4 class="card-title">Grafik Pengamatan Hari Ini</h4>
                        </div> --}}
                        <div class="card-content collapse show">
                            <div class="card-body chartjs">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div id="chart" style="height: 300px; width: 100%;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="card">
                        {{-- <div class="card-header">
                            <h4 class="card-title">Grafik Pengamatan Suhu dan Kelembapan Hari Ini</h4>
                        </div> --}}
                        <div class="card-content collapse show">
                            <div class="card-body chartjs">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div id="suhu_kelembapan" style="height: 300px; width: 100%;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
@endsection

@section('js')
<script type="text/javascript" src="{{ asset('js/canvasjs.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery.canvasjs.min.js') }}"></script>
<script src="{{ asset('app-assets/vendors/js/charts/chart.min.js') }}" type="text/javascript"></script>

<script>
    $('#beranda').addClass('active');
</script>

<script>
    $(document).ready(function () {
        var pm10 = [];
        var co = [];
        var asap = [];
        var suhu = [];
        var kelembapan = [];

        @foreach ($data as $key => $val)
            var time = new Date;
            time.setHours({{ $val->created_at->format('H') }});
            time.setMinutes({{ $val->created_at->format('i') }});
            pm10.push({x: time.getTime(), y: {{ $val->pm10 }} });
            co.push({x: time.getTime(), y: {{ $val->co }} });
            asap.push({x: time.getTime(), y: {{ $val->asap }} });
            suhu.push({x: time.getTime(), y: {{ $val->suhu }} });
            kelembapan.push({x: time.getTime(), y: {{ $val->kelembapan }} });
        @endforeach

        var chart = new CanvasJS.Chart("chart", {
            animationEnabled: true,
            title:{
                text: "PM 10, Karbon Monoksida, Asap"
            },
            axisX:{
                title: "Data Perjam"
            },
            axisY: {
                title: "PPM"
            },
            toolTip:{
                shared: true
            },
            data: [
                {
                    type: "line",
                    color: "#6967ce",
                    name: "pm10",
                    showInLegend: true,
                    xValueType: "dateTime",
                    xValueFormatString: "DD MMM YYYY, hh:mm TT",
                    yValueFormatString: "####.00 ppm",
                    dataPoints: pm10
                },
                {
                    type: "line",
                    color: "#25e40e",
                    name: "co",
                    showInLegend: true,
                    xValueType: "dateTime",
                    xValueFormatString: "DD MMM YYYY, hh:mm TT",
                    yValueFormatString: "####.00 ppm",
                    dataPoints: co
                },
                {
                    type: "line",
                    color: "#fdb901",
                    name: "asap",
                    showInLegend: true,
                    xValueType: "dateTime",
                    xValueFormatString: "DD MMM YYYY, hh:mm TT",
                    yValueFormatString: "####.00 ppm",
                    dataPoints: asap
                }
            ]
        });
        chart.render();

        var suhu_kelembapan = new CanvasJS.Chart("suhu_kelembapan", {
            animationEnabled: true,
            title:{
                text: "Suhu dan Kelembapan"
            },
            axisX:{
                title: "Data Perjam"
            },
            axisY: {
                title: "Celsius dan %"
            },
            toolTip:{
                shared: true
            },
            data: [
                {
                    type: "line",
                    color: "#5ed84f",
                    name: "suhu",
                    showInLegend: true,
                    xValueType: "dateTime",
                    xValueFormatString: "DD MMM YYYY, hh:mm TT",
                    yValueFormatString: "####.00 C",
                    dataPoints: suhu
                },
                {
                    type: "line",
                    color: "#28afd0",
                    name: "kelembapan",
                    showInLegend: true,
                    xValueType: "dateTime",
                    xValueFormatString: "DD MMM YYYY, hh:mm TT",
                    yValueFormatString: "####.00 '%'",
                    dataPoints: kelembapan
                }
            ]
        });
        suhu_kelembapan.render();

    });
</script>

<script>
/*=========================================================================================
    File Name: polar.js
    Description: Chartjs polar chart
    ----------------------------------------------------------------------------------------
    Item Name: Chameleon Admin - Modern Bootstrap 4 WebApp & Dashboard HTML Template + UI Kit
    Version: 1.0
    Author: ThemeSelection
    Author URL: https://themeforest.net/user/themeselect
==========================================================================================*/

// Polar chart
// ------------------------------
$(window).on("load", function(){

//Get the context of the Chart canvas element we want to select
var ctx = $("#polar-chart");

// Chart Options
var chartOptions = {
    responsive: true,
    maintainAspectRatio: false,
    responsiveAnimationDuration:500,
    legend: {
        position: 'top',
    },
    title: {
        display: false,
        text: 'Chart.js Polar Area Chart'
    },
    scale: {
      ticks: {
        beginAtZero: true
      },
      reverse: false
    },
    animation: {
        animateRotate: false
    }
};

// Chart Data
var chartData = {
    labels: {!! json_encode($data_wilayah) !!},
    datasets: [{
        data: {!! json_encode($node_perwilayah['node_perwilayah']) !!},
        backgroundColor: ['#666EE8', '#28D094', '#FF4961','#1E9FF2', '#FF9149', '#70c710'],
        label: 'My dataset' // for legend
    }],
};

var config = {
    type: 'polarArea',

    // Chart Options
    options : chartOptions,

    data : chartData
};

// Create the chart
var polarChart = new Chart(ctx, config);
});
</script>

@endsection