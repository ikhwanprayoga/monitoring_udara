@extends('layouts.backend.master')

@section('header')
<title>Monitoring</title>
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
              <li class="breadcrumb-item"><a href="#">Monitoring</a>
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
                        <h4 class="card-title">Simple Line Chart</h4>
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
        {{-- table --}}
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Data Realtime</h4>
                    </div>
                    <div class="card-content collapse show">
                        <div class="card-body">
                            <p class="card-text">Using the most basic table markup, here’s how <code>.table</code>-based tables look in Bootstrap. You can use any example of below table for your table and it can be use with any type of bootstrap tables. </p>
                            <p><span class="text-bold-600">Example 1:</span> Table with outer spacing</p>
                            <div class="table-responsive">
                                <table class="table" id="table">
                                    <thead>
                                        <tr>
                                            <th>Kode Alat</th>
                                            <th>PM10</th>
                                            <th>CO</th>
                                            <th>Asap</th>
                                            <th>Suhu</th>
                                            <th>Kelembapan</th>
                                            <th>Waktu</th>
                                        </tr>
                                    </thead>
                                </table>
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

{{-- monitoring pm10 --}}
<script type="text/javascript">
    $(document).ready(function () {
        var dataPoints = [{x: 0, y: 0}];

        var chart = new CanvasJS.Chart("pm10", {
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
                    type : "splineArea",
                    // xValueType: "dateTime",
                    dataPoints : dataPoints
                }]
            });

        chart.render();

        var xVal = dataPoints.length + 1;
        // var yVal = 50; 

        var pm10 = function () {
            $.ajax({
                method: 'GET',
                url: 'api/grafik_node1',
                data: "",
                dataType: 'json',
                success: function (data) {
                    $.each(data, function (key, val) {
                       
                        yVal = val.pm10;
                        // xVal = val.created_at;

                        // console.log("pm10");
                        // updateCount++;

                        xVal++;

                        dataPoints.push({
                            x : xVal, y : yVal 
                        });

                        // console.log(dataPoints);

                        // xVal++;
                        if (dataPoints.length >  10 )
                        {
                            dataPoints.shift();                
                        }

                        chart.render();
                    })
                },
            });
        }
        setInterval(pm10, 5000);
    });
</script>
{{-- monitoring co --}}
<script type="text/javascript">
    $(document).ready(function () {
        var dataPoints = [{x: 0, y: 0}];

        var chart = new CanvasJS.Chart("co", {
                title : {
                    text : "CO (Karbon Monoksida)"
                },
                axisY: {
                    title : "PPM"
                },
                axisX: {
                    title : "Nilai perdetik"
                },
                data : [{
                    type : "splineArea",
                    // xValueType: "dateTime",
                    dataPoints : dataPoints
                }]
            });

        chart.render();

        var xVal = dataPoints.length + 1;
        // var yVal = 50; 

        var co = function () {
            $.ajax({
                method: 'GET',
                url: 'api/grafik_node1',
                data: "",
                dataType: 'json',
                success: function (data) {
                    $.each(data, function (key, val) {
                       
                        yVal = val.co;
                        // xVal = val.created_at;

                        // console.log("co");
                        // updateCount++;

                        xVal++;

                        dataPoints.push({
                            x : xVal, y : yVal 
                        });

                        // console.log(dataPoints);

                        // xVal++;
                        if (dataPoints.length >  10 )
                        {
                            dataPoints.shift();                
                        }

                        chart.render();
                    })
                },
            });
        }
        setInterval(co, 5000);
    });
</script>
{{-- monitoring asap --}}
<script type="text/javascript">
    $(document).ready(function () {
        var dataPoints = [{x: 0, y: 0}];

        var chart = new CanvasJS.Chart("asap", {
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
                    type : "splineArea",
                    // xValueType: "dateTime",
                    dataPoints : dataPoints
                }]
            });

        chart.render();

        var xVal = dataPoints.length + 1;
        // var yVal = 50; 

        var asap = function () {
            $.ajax({
                method: 'GET',
                url: 'api/grafik_node1',
                data: "",
                dataType: 'json',
                success: function (data) {
                    $.each(data, function (key, val) {
                       
                        yVal = val.asap;
                        // xVal = val.created_at;

                        // console.log("asap");
                        // updateCount++;

                        xVal++;

                        dataPoints.push({
                            x : xVal, y : yVal 
                        });

                        // console.log(dataPoints);

                        // xVal++;
                        if (dataPoints.length >  10 )
                        {
                            dataPoints.shift();                
                        }

                        chart.render();
                    })
                },
            });
        }
        setInterval(asap, 5000);
    });
</script>
{{-- monitoring suhu --}}
<script type="text/javascript">
    $(document).ready(function () {
        var dataPoints = [{x: 0, y: 0}];

        var chart = new CanvasJS.Chart("suhu", {
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
                    type : "splineArea",
                    // xValueType: "dateTime",
                    dataPoints : dataPoints
                }]
            });

        chart.render();

        var xVal = dataPoints.length + 1;
        // var yVal = 50; 

        var suhu = function () {
            $.ajax({
                method: 'GET',
                url: 'api/grafik_node1',
                data: "",
                dataType: 'json',
                success: function (data) {
                    $.each(data, function (key, val) {
                       
                        yVal = val.suhu;
                        // xVal = val.created_at;

                        // console.log(val.created_at);
                        // updateCount++;

                        xVal++;

                        dataPoints.push({
                            x : xVal, y : yVal 
                        });

                        // console.log(dataPoints);

                        // xVal++;
                        if (dataPoints.length >  10 )
                        {
                            dataPoints.shift();                
                        }

                        chart.render();
                    })
                },
            });
        }
        setInterval(suhu, 5000);
    });
</script>
{{-- monitoring suhu --}}
<script type="text/javascript">
    $(document).ready(function () {
        var dataPoints = [{x: 0, y: 0}];

        var chart = new CanvasJS.Chart("kelembapan", {
                title : {
                    text : "Kelembapan"
                },
                axisY: {
                    title : "%"
                },
                axisX: {
                    title : "Nilai perdetik"
                },
                data : [{
                    type : "splineArea",
                    // xValueType: "dateTime",
                    dataPoints : dataPoints
                }]
            });

        chart.render();

        var xVal = dataPoints.length + 1;
        // var yVal = 50; 

        var kelembapan = function () {
            $.ajax({
                method: 'GET',
                url: 'api/grafik_node1',
                data: "",
                dataType: 'json',
                success: function (data) {
                    $.each(data, function (key, val) {
                       
                        yVal = val.kelembapan;
                        // xVal = val.created_at;

                        // console.log(val.created_at);
                        // updateCount++;

                        xVal++;

                        dataPoints.push({
                            x : xVal, y : yVal 
                        });

                        // console.log(dataPoints);

                        // xVal++;
                        if (dataPoints.length >  10 )
                        {
                            dataPoints.shift();                
                        }

                        chart.render();
                    })
                },
            });
        }
        setInterval(kelembapan, 5000);
    });
</script>

<script>
    var table = $('#table').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: '{{ route('getData-realtime') }}',
            data: function (d) {
                // body...
            }
        },
        columns: [
            {data: 'kode_alat', name: 'kode_alat'},
            {data: 'pm10', name: 'pm10'},
            {data: 'co', name: 'co'},
            {data: 'asap', name: 'asap'},
            {data: 'suhu', name: 'suhu'},
            {data: 'kelembapan', name: 'kelembapan'},
            {data: 'created_at', name: 'created_at'}
        ]
    });
</script>

@endsection