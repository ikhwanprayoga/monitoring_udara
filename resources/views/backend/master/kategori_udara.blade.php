@extends('layouts.backend.master')

@section('header')
<title>Master Kategori Udara</title>
@endsection

@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/extensions/toastr.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/plugins/extensions/toastr.css') }}">
@endsection

@section('content')
<div class="app-content content">
  <div class="content-wrapper">
    <div class="content-wrapper-before"></div>
    <div class="content-header row">
      <div class="content-header-left col-md-4 col-12 mb-2">
        <h3 class="content-header-title">Kategori Kualitas Udara</h3>
      </div>
      <div class="content-header-right col-md-8 col-12">
        <div class="breadcrumbs-top float-md-right">
          <div class="breadcrumb-wrapper mr-1">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ route('beranda') }}">Beranda</a>
              </li>
              <li class="breadcrumb-item"><a href="#">Kategori Kualitas Udara</a>
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
                        <a class="btn btn-primary" data-toggle="modal" href='#modal-id'>Tambah Kategori Kualitas Udara</a>
                    </div>
                    <div class="modal fade text-left" id="modal-id" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Tambah Kategori Kualitas Udara</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form class="card-body" action="{{ route('kategori-udara-tambah') }}" method="POST" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Kualitas Udara</label>
                                                    <input type="text" name="nama_kategori_udara" class="form-control" placeholder="Kategori Kualitas Udara">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>PM10 Min</label>
                                                    <input type="number" name="pm10_min" class="form-control" placeholder="PM10 Minimum">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>PM10 Max</label>
                                                    <input type="number" name="pm10_max" class="form-control" placeholder="PM10 Maksimum">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Karbon Monoksida Min</label>
                                                    <input type="number" name="co_min" class="form-control" placeholder="Karbon Monoksida Minimum">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Karbon Monoksida Max</label>
                                                    <input type="number" name="co_max" class="form-control" placeholder="Karbon Monoksida Maksimum">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <div class="text-right">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn btn-primary">Tambah</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="card-content collapse show">
                        <div class="card-body">
                            <p class="card-text">Using the most basic table markup, here’s how <code>.table</code>-based tables look in Bootstrap. You can use any example of below table for your table and it can be use with any type of bootstrap tables. </p>
                            <div class="table-responsive">
                                <table class="table" id="table">
                                    <thead>
                                        <tr>
                                            <th>Kategori Kualitas Udara</th>
                                            <th>PM10 Minimum</th>
                                            <th>PM10 Maksimum</th>
                                            <th>CO Minimum</th>
                                            <th>CO Maksimum</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                    {{-- modal edit --}}
                    <div class="modal fade text-left" id="modal_edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Ubah Kategori Kualitas Udara</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form class="card-body" action="{{ route('kategori-udara-ubah') }}" id="form_edit" method="POST" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="id" id="id_edit">
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Kualitas Udara</label>
                                                    <input type="text" name="nama_kategori_udara" id="nama_kategori_udara_edit" class="form-control" placeholder="Kategori Kualitas Udara">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>PM10 Min</label>
                                                    <input type="number" name="pm10_min" id="pm10_min_edit" class="form-control" placeholder="PM10 Minimum">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>PM10 Max</label>
                                                    <input type="number" name="pm10_max" id="pm10_max_edit" class="form-control" placeholder="PM10 Maksimum">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Karbon Monoksida Min</label>
                                                    <input type="number" name="co_min" id="co_min_edit" class="form-control" placeholder="Karbon Monoksida Minimum">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Karbon Monoksida Max</label>
                                                    <input type="number" name="co_max" id="co_max_edit" class="form-control" placeholder="Karbon Monoksida Maksimum">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <div class="text-right">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                            <button type="submit" onclick="$('$form_edit').submit();" class="btn btn-primary">Ubah</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    {{-- modal hapus --}}
                    <div class="modal fade text-left" id="modal_hapus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Hapus Kategori Kualitas Udara</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form class="card-body" action="{{ route('kategori-udara-hapus') }}" id="form_hapus" method="GET" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="id" id="id_hapus">
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Apakah anda yakin menghapus</label> 
                                                    <input type="text" name="nama_kategori_udara" id="nama_kategori_udara_hapus" class="form-control" placeholder="Kategori Kualitas Udara" disabled="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <div class="text-right">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                            <button type="submit" onclick="$('$form_hapus').submit();" class="btn btn-primary">Hapus</button>
                                        </div>
                                    </div>
                                </form>
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
<script src="{{ asset('app-assets/vendors/js/extensions/toastr.min.js') }}" type="text/javascript"></script>

<script>
    $('#kategori-udara').addClass('active');
</script>
<script>
    var table = $('#table').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: '{{ route('get-kategori-udara') }}',
            data: function (d) {
                
            }
        },
        columns: [
            {data: 'nama_kategori_udara', name: 'nama_kategori_udara'},
            {data: 'pm10_min', name: 'pm10_min'},
            {data: 'pm10_max', name: 'pm10_max'},
            {data: 'co_min', name: 'co_min'},
            {data: 'co_max', name: 'co_max'},
            {data: 'action', name: 'action', orderable: false, searchable: false }
        ]
    });
</script>
<script>
    $('#modal_edit').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var id = button.data('id');
        var nama_kategori_udara = button.data('nama_kategori_udara');
        var pm10_min = button.data('pm10_min');
        var pm10_max = button.data('pm10_max');
        var co_min = button.data('co_min');
        var co_max = button.data('co_max');

        $('#id_edit').val(id);
        $('#nama_kategori_udara_edit').val(nama_kategori_udara);
        $('#pm10_min_edit').val(pm10_min);
        $('#pm10_max_edit').val(pm10_max);
        $('#co_min_edit').val(co_min);
        $('#co_max_edit').val(co_max);
    });
</script>
<script>
    $('#modal_hapus').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var id = button.data('id');
        var nama_kategori_udara = button.data('nama_kategori_udara');

        $('#id_hapus').val(id);
        $('#nama_kategori_udara_hapus').val(nama_kategori_udara);
    });
</script>

@if (session()->has('ubah'))
<script>
    $(document).ready(function () {
        toastr.success('Data Telah di Ubah', 'Berhasil', {"closeButton": true, timeOut: 2000});
    });
</script>
@elseif (session()->has('tambah'))
<script>
    $(document).ready(function () {
        toastr.success('Data Baru Telah di Tambah', 'Berhasil', {"closeButton": true, timeOut: 2000});
    });
</script>
@elseif (session()->has('hapus'))
<script>
    $(document).ready(function () {
        toastr.error('Data Telah di Hapus', 'Berhasil', {"closeButton": true, timeOut: 2000});
    });
</script>
@endif

@endsection