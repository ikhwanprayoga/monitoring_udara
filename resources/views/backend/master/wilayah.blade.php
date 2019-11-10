@extends('layouts.backend.master')

@section('header')
<title>Master Wilayah</title>
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
        <h3 class="content-header-title">Wilayah</h3>
      </div>
      <div class="content-header-right col-md-8 col-12">
        <div class="breadcrumbs-top float-md-right">
          <div class="breadcrumb-wrapper mr-1">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ route('beranda') }}">Beranda</a>
              </li>
              <li class="breadcrumb-item"><a href="#">Wilayah</a>
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
                        <a class="btn btn-primary" data-toggle="modal" href='#modal-id'>Tambah Wilayah</a>
                    </div>
                    <div class="modal fade text-left" id="modal-id" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Tambah Wilayah</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form class="card-body" action="{{ route('wilayah-tambah') }}" method="POST" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Wilayah</label>
                                                    <input type="text" name="wilayah" class="form-control" placeholder="Masukkan Wilayah">
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
                            <p class="card-text">Data wilayah yang dapat digunakan untuk pemasangan alat monitoring kualitas udara.</p>
                            {{-- <p><span class="text-bold-600">Example 1:</span> Table with outer spacing</p> --}}
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Wilayah</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($data as $key => $val)
                                        <tr>
                                            <th scope="row">{{ $key+1 }}</th>
                                            <th>{{ $val->wilayah }}</th>
                                            <th>
                                                <a class="btn btn-sm btn-warning" data-toggle="modal" href="#modal_ubah_{{ $val->id }}"><i class="ft ft-edit"></i>Ubah</a>
                                                    {{-- modal edit --}}
                                                    <div class="modal fade text-left" id="modal_ubah_{{ $val->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title">Ubah Wilayah</h4>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <form class="card-body" action="{{ url('admin/master/wilayah/ubah/'.$val->id) }}" method="POST" enctype="multipart/form-data">
                                                                    <input type="hidden" value="{{ $val->id }}">
                                                                    {{ csrf_field() }}
                                                                    <div class="form-body">
                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    <label>Wilayah</label>
                                                                                    <input type="text" name="wilayah" id="wilayah" value="{{ $val->wilayah }}" class="form-control" placeholder="Masukkan Wilayah">
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
                                                <a class="btn btn-sm btn-danger" data-toggle="modal" href="#modal_hapus_{{ $val->id }}"><i class="ft ft-trash"></i>Hapus</a>
                                                    {{-- modal hapus --}}
                                                    <div class="modal fade text-left" id="modal_hapus_{{ $val->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title">Hapus Wilayah</h4>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <form class="card-body" action="{{ url('admin/master/wilayah/hapus/'.$val->id) }}" method="GET" enctype="multipart/form-data">
                                                                    {{ csrf_field() }}
                                                                    <input type="hidden" value="{{ $val->id }}">
                                                                    <div class="form-body">
                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    <label>Wilayah</label>
                                                                                    <input type="text" name="wilayah" id="wilayah" value="{{ $val->wilayah }}" class="form-control" placeholder="Masukkan Wilayah" disabled="">
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
                                            </th>
                                        </tr>
                                        @endforeach
                                    </tbody>
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
<script src="{{ asset('app-assets/vendors/js/extensions/toastr.min.js') }}" type="text/javascript"></script>

<script>
    $('#wilayah').addClass('active');
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