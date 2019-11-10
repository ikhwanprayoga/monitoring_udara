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
                            <p>Riwayat Notifikasi yang telah dikirimkan</p>
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
                                                <th>Waktu</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data as $item => $val)
                                            <tr>
                                                <td>{{ $item+1 }}</td>
                                                <td>{{ $val->nama_kategori->nama_kategori_udara }}</td>
                                                <td>{{ $val->title }}</td>
                                                <td>{!! $val->body !!}</td>
                                                <td>
                                                    <p>Pukul : {{ date('H:i', strtotime($val->created_at)) }}</p>
                                                    <p>Hari : {{ Waktu::waktu_lengkap(date('Y-m-d', strtotime($val->created_at)), true) }}</p>
                                                </td>
                                                <td>
                                                    <button class="btn btn-sm btn-danger" 
                                                        data-id="{{ $val->id }}" 
                                                        data-jam="{{ date('H:i', strtotime($val->created_at)) }}" 
                                                        data-hari="{{ Waktu::waktu_lengkap(date('Y-m-d', strtotime($val->created_at)), true) }}"
                                                    data-toggle="modal" data-target="#hapus"><i class="ft ft-trash"></i> Hapus</button>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    {{ $data->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Hapus -->
<div class="modal fade" id="hapus" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Hapus Data Notifikas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <form action="{{ route('notifikasi-hapus') }}" method="get">
                <input type="hidden" id="id_hapus" name="id">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-2">Jam : </div>
                        <div class="col-10" id="jam_hapus"></div>
                    </div>
                    <div class="row">
                        <div class="col-2">Hari : </div>
                        <div class="col-10" id="hari_hapus"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="{{ asset('app-assets/vendors/js/extensions/toastr.min.js') }}" type="text/javascript"></script>

<script>
    $('#notifikasi').addClass('active');
</script>

<script>
    $('#hapus').on('show.bs.modal', function (event) {
        var nilai = $(event.relatedTarget);
        var id = nilai.data('id');
        var jam = nilai.data('jam');
        var hari = nilai.data('hari');

        $('#id_hapus').val(id);
        $('#jam_hapus').html(jam);
        $('#hari_hapus').html(hari);
        
    });
</script>

@if (session()->has('hapus'))
<script>
    $(document).ready(function () {
        toastr.error('Data Telah di Hapus', 'Berhasil', {"closeButton": true, timeOut: 2000});
    });
</script>
@endif   
@endsection