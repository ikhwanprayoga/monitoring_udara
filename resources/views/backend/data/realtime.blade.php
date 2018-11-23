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
                                            <th>Kategori Udara</th>
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
<script>
    $('#realtime').addClass('active');
</script>
<script>
    var table = $('#table').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: '{{ route('get-data') }}',
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
            {data: 'kategori_udara_id', name: 'kategori_udara_id'}
        ]
    });
</script>
@endsection