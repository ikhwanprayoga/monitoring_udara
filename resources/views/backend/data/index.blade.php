@extends('layouts.backend.master')

@section('header')
<title>Data</title>
@endsection

@section('css')
<style>
    .filter{
        padding-bottom: 2vw;
    }
    .card-header{
        padding-bottom: 0vw;
    }
</style>

@endsection

@section('content')
<div class="app-content content">
  <div class="content-wrapper">
    <div class="content-wrapper-before"></div>
    <div class="content-header row">
      <div class="content-header-left col-md-4 col-12 mb-2">
        <h3 class="content-header-title">Data</h3>
      </div>
      <div class="content-header-right col-md-8 col-12">
        <div class="breadcrumbs-top float-md-right">
          <div class="breadcrumb-wrapper mr-1">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ route('beranda') }}">Beranda</a>
              </li>
              <li class="breadcrumb-item"><a href="#">Data</a>
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
                        <h4 class="card-title">Data kualitas udara perjam</h4>
                    </div>
                    <div class="card-content collapse show">
                        <div class="card-body">
                            {{-- <p class="card-text">Using the most basic table markup, here’s how <code>.table</code>-based tables look in Bootstrap. You can use any example of below table for your table and it can be use with any type of bootstrap tables. </p> --}}
                            <div class="row filter">

                                <div class="col-md-4">
                                    <label class="filter-label">Mulai Dari</label>
                                    <input type="date" class="form-control pickadate mulai" name="mulai">
                                </div>
                                <div class="col-md-4">
                                    <label class="filter-label">Sampai</label>
                                    <input type="date" class="form-control pickadate akhir" name="akhir">
                                </div>
                                <div class="col-md-4">
                                    <label class="filter-label">Filter by Kategori Kualitas Udara</label>
                                    <select name="kategori_udara" class="form-control kategori_udara">
                                      <option value="">--Pilih Kategori Kualitas Udara--</option>
                                      @foreach($kategori_udara as $kategoris)
                                          <option value="{{ $kategoris->id }}">{{ $kategoris->nama_kategori_udara }}</option>}
                                      @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table" id="table">
                                    <thead>
                                        <tr>
                                            <th>PM10</th>
                                            <th>CO</th>
                                            <th>Suhu</th>
                                            <th>Kelembapan</th>
                                            <th>Kategori Udara</th>
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

<script>
    $('#data').addClass('active');
</script>
<script>
    var table = $('#table').DataTable({
        "order" : [[5, "desc"]],
        processing: true,
        serverSide: true,
        ajax: {
            url: '{{ route('get-data') }}',
            data: function (d) {
                d.mulai = $('input[name=mulai]').val();
                d.akhir = $('input[name=akhir]').val();
                d.kategori_udara = $('select[name=kategori_udara]').val();
                // console.log(d.mulai);
                // console.log(d.akhir);
            }
        },
        columns: [
            {
                data: 'pm10', 
                name: 'pm10',
                render: function (data, type, rows) {
                    return Number.parseFloat(rows.pm10).toFixed(2) + ' u/m3'
                }
            },
            {
                data: 'co', 
                name: 'co',
                render: function (data, type, rows) {
                    return Number.parseFloat(rows.co).toFixed(2) + ' ppm'
                }
            },
            {
                data: 'suhu', 
                name: 'suhu',
                render: function (data, type, rows) {
                    return Number.parseFloat(rows.suhu).toFixed(2) + ' C'
                }
            },
            {
                data: 'kelembapan', 
                name: 'kelembapan',
                render: function (data, type, rows) {
                    return Number.parseFloat(rows.kelembapan).toFixed(2) + ' %'
                }
            },
            {data: 'kategori_udara', name: 'kategori_udara'},
            {data: 'waktu', name: 'waktu'}
        ],
        columnDefs: [
            {"targets": "_all", "className": "text-center",}
        ]
    });

    //filter date range
    $('.mulai').on('change', function (e) {
        table.draw();
        e.preventDefault();
    });

    $('.akhir').on('change', function (e) {
        table.draw();
        e.preventDefault();
    });

    $('.kategori_udara').on('change', function (e) {
        table.draw();
        e.preventDefault();
    });
</script>
@endsection