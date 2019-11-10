@extends('layouts.backend.master')

@section('header')
<title>Master Node Sensor</title>
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
        <h3 class="content-header-title">Node Sensor</h3>
      </div>
      <div class="content-header-right col-md-8 col-12">
        <div class="breadcrumbs-top float-md-right">
          <div class="breadcrumb-wrapper mr-1">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ route('beranda') }}">Beranda</a>
              </li>
              <li class="breadcrumb-item"><a href="#">Node Sensor</a>
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
                        <a class="btn btn-primary" data-toggle="modal" href='#modal-id'>Tambah Node Sensor</a>
                    </div>
                    <div class="modal fade text-left" id="modal-id" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Tambah Node Sensor</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form class="card-body" action="{{ route('node-sensor-tambah') }}" method="POST" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Nama Node Sensor</label>
                                                    <input type="text" name="nama" class="form-control" placeholder="Nama Node Sensor">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Wilayah Node Sensor</label>
                                                    <fieldset class="form-group">
                                                        <select class="form-control" name="wilayah_id">
                                                          <option>Pilih Wilayah Node Sensor</option>
                                                          @foreach($wilayah as $val)
                                                          <option value="{{ $val->id }}">{{ $val->wilayah }}</option>
                                                          @endforeach
                                                        </select>
                                                    </fieldset>
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
                            <p class="card-text">Data node sensor yang telah ditambahkan. </p>
                            {{-- <p><span class="text-bold-600">Example 1:</span> Table with outer spacing</p> --}}
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Node Sensor</th>
                                            <th>Id Node Sensor</th>
                                            <th>Wilayah Sensor</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $key => $val)
                                        <tr>
                                            <th scope="row">{{ $key+1 }}</th>
                                            <td>{{ $val->nama }}</td>
                                            <td>{{ $val->id }}</td>
                                            <td>{{ $val->nama_wilayah->wilayah }}</td>
                                            <td>
                                                <a class="btn btn-sm btn-warning" href="#modal_edit" data-toggle="modal" 
                                                    data-id="{{ $val->id }}"
                                                    data-nama="{{ $val->nama }}"
                                                    data-wilayah_id="{{ $val->wilayah_id }}"
                                                ><i class="ft ft-edit"></i> Ubah</a>
                                                <a class="btn btn-sm btn-danger" href="#modal_hapus" data-toggle="modal"
                                                    data-id="{{ $val->id }}"
                                                    data-nama="{{ $val->nama }}"
                                                ><i class="ft ft-trash"></i> Hapus</a>
                                            </td>
                                        </tr>
                                        @endforeach()
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    {{-- modal ubah --}}
                    <div class="modal fade text-left" id="modal_edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Ubah Node Sensor</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form class="card-body" action="{{ route('node-sensor-ubah') }}" method="POST" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="id" id="id_ubah">
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Ubah Nama Node Sensor</label>
                                                    <input type="text" name="nama" id="nama_ubah" class="form-control" placeholder="Nama Node Sensor">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Ubah Wilayah Node Sensor</label>
                                                    <fieldset class="form-group">
                                                        <select class="form-control" name="wilayah_id" id="wilayah_id_ubah">
                                                          @foreach($wilayah as $val)
                                                          <option value="{{ $val->id }}">{{ $val->wilayah }}</option>
                                                          @endforeach
                                                        </select>
                                                    </fieldset>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <div class="text-right">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn btn-primary">Ubah</button>
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
                                    <h4 class="modal-title">Hapus Node Sensor</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form class="card-body" action="{{ route('node-sensor-hapus') }}" method="GET" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="id" id="id_hapus">
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Hapus Node Sensor</label>
                                                    <input type="text" name="nama" id="nama_hapus" class="form-control" placeholder="Nama Node Sensor" readonly="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <div class="text-right">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn btn-primary">Hapus</button>
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
    $('#nodesensor').addClass('active');
</script>
<script>
    $('#nama_node_sensor').on('keyup', function(e){
        var nama_node_sensor = $(this).val();
        $('#kode_node_sensor').val(nama_node_sensor);
    });
</script>
<script>
    $('#modal_edit').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var id = button.data('id');
        var nama = button.data('nama');
        var wilayah_id = button.data('wilayah_id');

        $('#id_ubah').val(id);
        $('#nama_ubah').val(nama);
        $('#wilayah_id_ubah').val(wilayah_id).change();
    });

    $('#modal_hapus').on('show.bs.modal', function (hapus) {
        var button = $(hapus.relatedTarget);
        var id = button.data('id');
        var nama = button.data('nama');

        $('#id_hapus').val(id);
        $('#nama_hapus').val(nama);
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