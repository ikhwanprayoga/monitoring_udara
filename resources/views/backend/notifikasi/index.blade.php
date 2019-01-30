@extends('layouts.backend.master')

@section('header')
<title>Notifikasi</title>
@endsection

@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/extensions/toastr.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/plugins/extensions/toastr.css') }}">
<script src="{{ asset('app-assets/vendors/js/vendors.min.js')}}" type="text/javascript"></script>
@endsection

@section('content')
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-wrapper-before"></div>
        <div class="content-header row">
        <div class="content-header-left col-md-4 col-12 mb-2">
            <h3 class="content-header-title">Notifikasi</h3>
        </div>
        <div class="content-header-right col-md-8 col-12">
            <div class="breadcrumbs-top float-md-right">
            <div class="breadcrumb-wrapper mr-1">
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('beranda') }}">Beranda</a>
                </li>
                <li class="breadcrumb-item"><a href="#">Notifikasi</a>
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
                            <p>header card</p>
                        </div>
                        <div class="card-content collapse show">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Kualitas Udara</th>
                                                <th>Judul</th>
                                                <th>Isi Pesan</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>x</td>
                                                <td>d</td>
                                                <td>d</td>
                                                <td>d</td>
                                            </tr>
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
    $('#notifikasi').addClass('active');
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