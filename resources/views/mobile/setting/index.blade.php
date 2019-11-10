@extends('layouts.mobile.app')

@section('header')
<title>Profil</title>
@endsection

@section('css')
<style>
.btn-sub {
    width: 65%;
}
</style>
@endsection

@section('content')
    <div class="app-content content">
      <div class="content-wrapper">
        <div class="content-body">
            <div class="row">
                <div class="col-md-5 col-sm-12">
                    <div class="card">
                        <div class="card-header p-1">
                            <h4 class="card-title ">Profil </h4>
                        </div>
                        <div class="card-content collapse show">
                            <div class="card-footer p-1">
                                <div class="row">
                                    <div class="col-md-12">
                                        <form class="form" action="{{ route('mobile.setting.update', ['id'=>auth::user()->id]) }}" method="post">
                                            @csrf
                                            @if(session()->has('message'))
                                                <div class="alert alert-success">
                                                    {{ session()->get('message') }}
                                                </div>
                                            @endif
                                            <div class="form-group">
                                                <label for="nama">Nama</label>
                                                <input type="text" id="nama" class="form-control" placeholder="Nama Pengguna" name="name" value="{{ auth::user()->name }}" required disabled>
                                            </div>
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input type="text" id="email" class="form-control" placeholder="Email Pengguna" name="email" value="{{ auth::user()->email }}" required disabled>
                                            </div>
                                            <div class="form-group">
                                                <label for="alamat">Alamat</label>
									            <textarea id="alamat" rows="5" class="form-control" name="alamat" placeholder="Alamat Pengguna" required disabled>{{ auth::user()->alamat }}</textarea>
                                            </div>
                                            <div class="form-group hidden" id="divPassword">
                                                <label for="password">Password</label>
                                                <input type="password" id="password" class="form-control" name="password" disabled>
                                                <small>Kosongkan jika tidak ingin mengubah password</small>
                                            </div>
                                            <div class="form-actions right">
                                                <button type="button" id="tombolBatal" class="btn btn-danger btn-sm">Batal</button>
                                                <button type="button" id="tombolUbah" class="btn btn-info btn-sm">Ubah Data</button>
                                                <button type="submit" id="tombolSimpan" class="btn btn-primary btn-sm hidden">Simpan Data</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="card">
                        <div class="card-header p-1">
                            <h4 class="card-title ">Notifikasi </h4>
                        </div>
                        <div class="card-content collapse show">
                            <div class="card-footer p-1">
                                <div class="row">
                                    <div class="col-md-12">
                                        <form class="form">
                                            <div class="form-group">
                                                <label for="informasi">Informasi</label>
                                                <p style="text-align: justify; text-justify: inter-word;">Dengan berlangganan/mensubscribe website kami, maka anda akan menerima pemberitahuan ketika kualitas udara berada dalam kategori tidak sehat</p>
                                            </div>
                                            <div class="right">
                                                <button type="button" onclick="enableNotifications()" name="" id="btn_subscribe" class="btn btn-primary btn-sm btn-block btn-sub"><i class="ft-bell" id="btn_icon"></i></button>
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
    </div>
@endsection

@section('js')
<script>
    $('#tombolUbah').on('click', function () {
        $('#nama').removeAttr('disabled')
        $('#email').removeAttr('disabled')
        $('#alamat').removeAttr('disabled')
        $('#divPassword').removeClass('hidden')
        $('#password').removeAttr('disabled')

        $('#tombolUbah').addClass('hidden')
        $('#tombolSimpan').removeClass('hidden')
    })

    $('#tombolBatal').on('click', function () {
        location.reload()
    })
</script>
@endsection