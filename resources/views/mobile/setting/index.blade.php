@extends('layouts.mobile.app')

@section('header')
<title>Beranda</title>
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
                <div class="col-12">
                    <div class="card">
                        <div class="card-header p-1">
                            <h4 class="card-title float-left">Profile </h4>
                        </div>
                        <div class="card-content collapse show">
                            <div class="card-footer text-center p-1">
                                {{-- <div class="row">
                                    <div class="col-4">
                                        <img src="{{ asset('push.png') }}" alt="" srcset="" style="width: 50%;">
                                    </div>
                                </div>
                                <hr> --}}
                                <div class="row">
                                    <div class="col-4 border-right-blue-grey border-right-lighten-5" id="img_rincian" style="text-align: center;">
                                        <img src="{{ asset('push.png') }}" alt="" srcset="" style="width: 100%;">
                                    </div>
                                    <div class="col-8">
                                        <div class="row">
                                            <div class="col-4 pr-0 text-left"><p>Nama : </p></div>
                                            <div class="col-8 pr-0 pl-0 text-left" id="p_nama">{{ auth::user()->name }}</div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4 pr-0 text-left"><p>Email : </p></div>
                                            <div class="col-8 pr-0 pl-0 text-left" id="p_email">{{ auth::user()->email }}</div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4 pr-0 text-left"><p>Kota : </p></div>
                                            <div class="col-8 pr-0 pl-0 text-left" id="p_kota">Sambas</div>
                                        </div>
                                        <div class="row pl-1">
                                            <button type="button" onclick="enableNotifications()" name="" id="btn_subscribe" class="btn btn-primary btn-sm btn-block btn-sub"><i class="ft-bell" id="btn_icon"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <span class="text-muted"><a href="#" class="danger darken-2">Kualitas Udara</a> Beta</span>
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
    // var btn_sub = document.querySelector('#btn_icon');

    // $('#btn_subscribe').click(function () {
    //     $('#btn_icon').removeClass("ft-bell").addClass("ft-bell-off");
    // });

    // $.get('{{ route('member.cek', ['member' => auth::user()->id]) }}', function (data) {
    //     if (data == 1) {
    //         // console.log('ada');
    //         $('#btn_icon').removeClass("ft-bell").addClass("ft-bell-off");
    //     } else {
    //         $('#btn_icon').removeClass("ft-bell");
    //     }
    // });

    

    // console.log(id);
</script>
@endsection