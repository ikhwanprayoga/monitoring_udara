@extends('layouts.backend.master')

@section('header')
<title>Data Realtime</title>
@endsection

@section('css')

@endsection

@section('content')
<div class="app-content content">
  <div class="content-wrapper">
    <div class="content-wrapper-before"></div>
    <div class="content-header row">
      <div class="content-header-left col-md-4 col-12 mb-2">
        <h3 class="content-header-title">Data Realtime</h3>
      </div>
      <div class="content-header-right col-md-8 col-12">
        <div class="breadcrumbs-top float-md-right">
          <div class="breadcrumb-wrapper mr-1">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ route('beranda') }}">Beranda</a>
              </li>
              <li class="breadcrumb-item"><a href="#">Realtime</a>
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
                    <div class="card-header">
                        <h4 class="card-title">Simple Line Chart</h4>
                        <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                        <div class="heading-elements">
                            <ul class="list-inline mb-0">
                                <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                <li><a data-action="close"><i class="ft-x"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-content collapse show">
                        <div class="card-body chartjs">
                                <div class="height-500">
                            <div id="suhu"></div>
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
    $('#realtime').addClass('active');
</script>

<script type="text/javascript">
    $(document).ready(function () {
        var dataPoints = [{y : 0}];
        var chart = new CanvasJS.Chart("suhu", {
                title : {
                    text : "Suhu"
                },
                axisY: {
                    title : "(celcius)"
                },
                axisX: {
                    title : "Nilai perdetik"
                },
                data : [{
                        type : "splineArea",
                        dataPoints : dataPoints
                    }
                ]
            });

        chart.render();

        var yVal = 50, updateCount = 0;
        var suhu = function () {
            $.ajax({
                method: 'GET',
                url: 'api/grafik',
                data: "",
                dataType: 'json',
                success: function (data) {
                    $.each(data, function (key, val) {
                        // console.log(val.suhu);
                        yVal = val.suhu;
                        updateCount++;
                        
                        console.log(yVal);
                        
                        dataPoints.push({
                            y : yVal
                        });

                        chart.render();
                    })
                },
            });
        }
        setInterval(suhu, 2000);
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