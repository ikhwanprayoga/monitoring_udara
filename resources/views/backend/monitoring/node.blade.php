@extends('layouts.backend.master')

@section('header')
<title>Monitoring || {{ $sensor->nama }}</title>
@endsection

@section('css')
<style>
    .chart{
        padding-bottom: 0px;
    }
</style>
@endsection

@section('content')
<div class="app-content content">
  <div class="content-wrapper">
    <div class="content-wrapper-before"></div>
    <div class="content-header row">
      <div class="content-header-left col-md-4 col-12 mb-2">
        <h3 class="content-header-title">Monitoring</h3>
      </div>
      <div class="content-header-right col-md-8 col-12">
        <div class="breadcrumbs-top float-md-right">
          <div class="breadcrumb-wrapper mr-1">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ route('beranda') }}">Beranda</a>
              </li>
              <li class="breadcrumb-item"><a href="{{ route('monitoring') }}">Monitoring</a>
              </li>
              <li class="breadcrumb-item"><a href="#">{{ $sensor->nama }}</a>
              </li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <div class="content-body">
        {{-- content --}}
        {{-- chat --}}
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header chart">
                        <h4 class="card-title">{{ $sensor->nama }}</h4>
                    </div>
                    <div class="card-content collapse show">
                        <div class="card-body chartjs">
                            
                            <div class="row">
                                <div class="col-6">
                                    <div class="height-500">
                                        <div id="pm10"></div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="height-500">
                                        <div id="co"></div>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <div class="height-500">
                                        <div id="asap"></div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="height-500">
                                        <div id="suhu"></div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="height-500">
                                        <div id="kelembapan"></div>
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
</div>
@endsection

@section('js')
<script src="{{ asset('app-assets/vendors/js/charts/chart.min.js') }}" type="text/javascript"></script>
<script type="text/javascript" src="{{ asset('js/canvasjs.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery.canvasjs.min.js') }}"></script>

<script>
    $('#monitoring').addClass('active');
</script>

{{-- monitoring realtime pm10 --}}
<script>
$(document).ready(function () {
    var dataPointsPM10 = [];
    var chartPM10 = new CanvasJS.Chart("pm10", {
            title : {
                text : "PM 10"
            },
            axisY: {
                title : "PPM"
            },
            axisX: {
                title : "Nilai perdetik"
            },
            data : [{
                type : "area",
                // xValueType: "dateTime",
                dataPoints : dataPointsPM10
            }]
        });
    chartPM10.render();

    //chart co
    var dataPointsCO = [];
    var chartCO = new CanvasJS.Chart("co", {
            title : {
                text : "Kabon Monoksida"
            },
            axisY: {
                title : "PPM"
            },
            axisX: {
                title : "Nilai perdetik"
            },
            data : [{
                type : "area",
                // xValueType: "dateTime",
                dataPoints : dataPointsCO
            }]
        });
    chartCO.render();

    //chart asap
    var dataPointsASAP = [];
    var chartASAP = new CanvasJS.Chart("asap", {
            title : {
                text : "Asap"
            },
            axisY: {
                title : "PPM"
            },
            axisX: {
                title : "Nilai perdetik"
            },
            data : [{
                type : "area",
                // xValueType: "dateTime",
                dataPoints : dataPointsASAP
            }]
        });
    chartASAP.render();

    //chart SUHU
    var dataPointsSUHU = [];
    var chartSUHU = new CanvasJS.Chart("suhu", {
            title : {
                text : "Suhu"
            },
            axisY: {
                title : "Celsius"
            },
            axisX: {
                title : "Nilai perdetik"
            },
            data : [{
                type : "area",
                // xValueType: "dateTime",
                dataPoints : dataPointsSUHU
            }]
        });
    chartSUHU.render();

    //chart kelembapan
    var dataPointsKELEMBAPAN = [];
    var chartKELEMBAPAN = new CanvasJS.Chart("kelembapan", {
            title : {
                text : "Kelembapan"
            },
            axisY: {
                title : "Persen %"
            },
            axisX: {
                title : "Nilai perdetik"
            },
            data : [{
                type : "area",
                // xValueType: "dateTime",
                dataPoints : dataPointsKELEMBAPAN
            }]
        });
    chartKELEMBAPAN.render();

    //get data from database
    var xVal = 0;
    var getData = function () {
        $.getJSON('{{ url('api/grafik/'.$sensor->id) }}', function (data) {
            time = new Date(data.updated_at);
            hour = time.getHours();
            min = time.getMinutes();
            sec = time.getSeconds();
            times = hour + ':' + min + ':' + sec;

            xVals = xVal++;

            yPM10 = data.pm10;
            yCO = data.co;
            yASAP = data.asap;
            ySUHU = data.suhu;
            yKELEMBAPAN = data.kelembapan;

            // datapoints pm10
            dataPointsPM10.push({
                label : times , y : yPM10 , x : xVals
            });
            if(dataPointsPM10.length > 10){
                dataPointsPM10.shift();
            }

            // datapoints co
            dataPointsCO.push({
                label : times , y : yCO , x : xVals
            });
            if(dataPointsCO.length > 10){
                dataPointsCO.shift();
            }

            // datapoints asap
            dataPointsASAP.push({
                label : times , y : yASAP , x : xVals
            });
            if(dataPointsASAP.length > 10){
                dataPointsASAP.shift();
            }

            // datapoints suhu
            dataPointsSUHU.push({
                label : times , y : ySUHU , x : xVals
            });
            if(dataPointsSUHU.length > 10){
                dataPointsSUHU.shift();
            }

            // datapoints kelembapan
            dataPointsKELEMBAPAN.push({
                label : times , y : yKELEMBAPAN , x : xVals
            });
            if(dataPointsKELEMBAPAN.length > 10){
                dataPointsKELEMBAPAN.shift();
            }

            chartPM10.render();
            chartCO.render();
            chartASAP.render();
            chartSUHU.render();
            chartKELEMBAPAN.render();

            console.log(dataPointsPM10);
        });
    }
    setInterval(getData, 1000);
});
</script>

@endsection