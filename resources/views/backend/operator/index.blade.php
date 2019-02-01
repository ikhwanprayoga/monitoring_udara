@extends('layouts.backend.master')

@section('header')
<title>User</title>
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
            <h3 class="content-header-title">User</h3>
        </div>
        <div class="content-header-right col-md-8 col-12">
            <div class="breadcrumbs-top float-md-right">
            <div class="breadcrumb-wrapper mr-1">
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('beranda') }}">Beranda</a>
                </li>
                <li class="breadcrumb-item"><a href="#">User</a>
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
                            <a class="btn btn-primary" data-toggle="modal" href='#modal-id'>Tambah User</a>
                        </div>
                        <div class="modal fade text-left" id="modal-id" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Tambah User</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form class="card-body" action="{{ route('operator-tambah') }}" method="POST" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <div class="form-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Nama</label>
                                                        <input type="text" name="name" class="form-control" placeholder="Masukkan Nama Operator" required autofocus>
                                                        @if ($errors->has('name'))
                                                            <script>
                                                                $(document).ready(function () {
                                                                    toastr.error('Periksa Kembali Nama Operator!', 'Error', {"closeButton": true, timeOut: 5000});
                                                                });
                                                            </script>
                                                        @endif
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Email</label>
                                                        <input type="email" name="email" class="form-control" placeholder="Masukkan Email" required>
                                                        @if ($errors->has('email'))
                                                            <script>
                                                                $(document).ready(function () {
                                                                    toastr.error('Periksa Kembali Email Operator!', 'Error', {"closeButton": true, timeOut: 5000});
                                                                });
                                                            </script>
                                                        @endif
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Password</label>
                                                        <input type="password" name="password" class="form-control" placeholder="Miminal 6 Karakter" required>
                                                        @if ($errors->has('password'))
                                                            <script>
                                                                $(document).ready(function () {
                                                                    toastr.error('Periksa Kembali Password Operator!', 'Error', {"closeButton": true, timeOut: 5000});
                                                                });
                                                            </script>
                                                        @endif
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Role / Hak Akses</label>
                                                        <select class="form-control" name="role" id="role" required>
                                                            @foreach ($role as $item)
                                                            <option value="{{ $item->name }}" >{{ $item->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <fieldset class="form-group">
                                                        <label>Foto Operator</label>
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input" name="foto" id="inputGroupFile01" required>
                                                            <label class="custom-file-label" for="inputGroupFile01">Pilih Foto, Max : 3Mb</label>
                                                        </div>
                                                        @if ($errors->has('foto'))
                                                            <script>
                                                                $(document).ready(function () {
                                                                    toastr.error('Periksa Kembali Foto Operator!', 'Error', {"closeButton": true, timeOut: 5000});
                                                                });
                                                            </script>
                                                        @endif
                                                    </fieldset>
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
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Email</th>
                                                <th>Role/Hak Akses</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data as $key => $val)
                                            <tr>
                                                <td>{{ $key+1 }}</td>
                                                <td>{{ $val->name }}</td>
                                                <td>{{ $val->email }}</td>
                                                <td>
                                                    @if(!empty($val->getRoleNames()))
                                                        @foreach($val->getRoleNames() as $v)
                                                            <label class="badge badge-success">{{ $v }}</label>
                                                        @endforeach
                                                    @endif
                                                    @foreach ($subscriber as $sub)
                                                        @if ($val->id == $sub->user_id)
                                                            <label class="badge badge-primary">Subscriber</label>
                                                        @endif
                                                    @endforeach
                                                </td>
                                                <td>
                                                    <!-- Button ubah modal -->
                                                    <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#ubah{{ $val->id }}"><i class="ft ft-edit"></i>
                                                        Ubah
                                                    </button>
                                                    
                                                    <!-- Modal ubah -->
                                                    <div class="modal fade" id="ubah{{ $val->id }}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Ubah Data</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                </div>
                                                                <form class="card-body" action="{{ url('admin/operator/ubah/'. $val->id) }}" method="POST" enctype="multipart/form-data">
                                                                    {{ csrf_field() }}
                                                                    <input type="hidden" name="id" value="{{ $val->id }}">
                                                                    <div class="form-body">
                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    <label>Nama</label>
                                                                                    <input type="text" name="name" value="{{ $val->name }}" class="form-control" required autofocus>
                                                                                    @if ($errors->has('name'))
                                                                                        <script>
                                                                                            $(document).ready(function () {
                                                                                                toastr.error('Periksa Kembali Nama Operator!', 'Error', {"closeButton": true, timeOut: 5000});
                                                                                            });
                                                                                        </script>
                                                                                    @endif
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label>Email</label>
                                                                                    <input type="email" name="email" value="{{ $val->email }}" class="form-control" required>
                                                                                    @if ($errors->has('email'))
                                                                                        <script>
                                                                                            $(document).ready(function () {
                                                                                                toastr.error('Periksa Kembali Email Operator!', 'Error', {"closeButton": true, timeOut: 5000});
                                                                                            });
                                                                                        </script>
                                                                                    @endif
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label>Password</label>
                                                                                    <input type="password" name="password" class="form-control">
                                                                                    @if ($errors->has('password'))
                                                                                        <script>
                                                                                            $(document).ready(function () {
                                                                                                toastr.error('Periksa Kembali Password Operator!', 'Error', {"closeButton": true, timeOut: 5000});
                                                                                            });
                                                                                        </script>
                                                                                    @endif
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label for="">Role / Hak Akses</label>
                                                                                    <select class="form-control" name="role" id="role" >
                                                                                        <option value="" >--- {!! $val->getRoleNames() !!} ---</option>
                                                                                        @foreach ($role as $item)
                                                                                        <option value="{{ $item->name }}" >{{ $item->name }}</option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                </div>
                                                                                <fieldset class="form-group">
                                                                                    <label>Foto Operator</label>
                                                                                    <div class="custom-file">
                                                                                        <input type="file" class="custom-file-input" name="foto" id="inputGroupFile01">
                                                                                        <label class="custom-file-label" for="inputGroupFile01">Pilih Foto, Max : 3Mb</label>
                                                                                    </div>
                                                                                    @if ($errors->has('foto'))
                                                                                        <script>
                                                                                            $(document).ready(function () {
                                                                                                toastr.error('Periksa Kembali Foto Operator!', 'Error', {"closeButton": true, timeOut: 5000});
                                                                                            });
                                                                                        </script>
                                                                                    @endif
                                                                                </fieldset>
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

                                                    <!-- Button hapus modal -->
                                                    <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#hapus{{ $val->id }}"><i class="ft ft-trash"></i>
                                                        Hapus
                                                    </button>
                                                    
                                                    <!-- Modal hapus -->
                                                    <div class="modal fade" id="hapus{{ $val->id }}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Hapus Data User</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                </div>
                                                                <form class="card-body" action="{{ url('admin/operator/hapus/'. $val->id) }}" method="POST" enctype="multipart/form-data">
                                                                    {{ csrf_field() }}
                                                                    <input type="hidden" name="id" value="{{ $val->id }}">
                                                                    <div class="form-body">
                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    <label>Nama Operator</label>
                                                                                    <input type="text" name="name" value="{{ $val->name }}" class="form-control" disabled>
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
                                                </td>
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
    $('#operator').addClass('active');
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