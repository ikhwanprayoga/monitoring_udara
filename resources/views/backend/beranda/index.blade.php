@extends('layouts.backend.master')

@section('header')
<title>Beranda</title>
@endsection

@section('css')

@endsection

@section('content')
    <div class="app-content content">
      <div class="content-wrapper">
        <div class="content-wrapper-before"></div>
        <div class="content-header row">
        </div>
        <div class="content-body">
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

<script>
    $('#beranda').addClass('active');
</script>

{{-- <script>
    window.onload = function () {

    

    }
</script> --}}

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
                text: "PM 10"
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


@endsection