@extends('layouts.mobile.app')

@section('header')
<title>Beranda</title>
@endsection

@section('css')
<style>
#kat_kualitas_udara {
    font-size: 1rem;
    /* font-weight: 500; */
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
                        <div class="card-content">
                            <div class="card-body text-center">
                                <div class="card-header pt-0 pb-0">
                                    {{-- <p class="danger darken-2">Total Customers</p> --}}
                                    <h2 class="display- blue-grey lighten-2">Pontianak</h2>
                                </div>
                                <div class="card-content">
                                    {{-- <div id="new-customers" class="height-150 donutShadow"></div> --}}
                                    <div>
                                        <img src="{{ asset('push.png') }}" alt="" style="max-width: 50vw;">
                                    </div>
                                    <ul class="list-inline clearfix mt-2 mb-0 pt-1">
                                        <li>
                                            {{-- <h1 class="blue-grey lighten-2 text-bold-400">1465</h1> --}}
                                            <p class="darken-2" id="kat_kualitas_udara">Kategori Kualitas Udara</p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header p-1">
                            <h4 class="card-title float-left">Realtime - <span class="blue-grey lighten-2 font-small-3 mb-0">{{ Waktu::waktu_lengkap(date('Y-m-d'), true) }}</span></h4>
                        </div>
                        <div class="card-content collapse show">
                            <div class="card-footer text-center p-1">
                                <div class="row">
                                    <div class="col-6 border-right-blue-grey border-right-lighten-5 text-center">
                                        <p class="font-medium-1 text-bold-400" id="m_pm10">0</p><br>
                                        <p class="blue-grey lighten-2 mb-0">pm10 (ppm)</p>
                                    </div>
                                    <div class="col-6 border-right-blue-grey border-right-lighten-5 text-center">
                                        <p class="font-medium-1 text-bold-400" id="m_co">0</p><br>
                                        <p class="blue-grey lighten-2 mb-0">co (ppm)</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-4 border-right-blue-grey border-right-lighten-5 text-center">
                                        <p class="font-medium-1 text-bold-400" id="m_asap">0</p><br>
                                        <p class="blue-grey lighten-2 mb-0">asap (ppm)</p>
                                    </div>
                                    <div class="col-4 border-right-blue-grey border-right-lighten-5 text-center">
                                        <p class="font-medium-1 text-bold-400" id="m_suhu">0</p><br>
                                        <p class="blue-grey lighten-2 mb-0">suhu (C)</p>
                                    </div>
                                    <div class="col-4 border-right-blue-grey border-right-lighten-5 text-center">
                                        <p class="font-medium-1 text-bold-400" id="m_kelembapan">0</p><br>
                                        <p class="blue-grey lighten-2 mb-0">kelembapan (%)</p>
                                    </div>
                                </div>
                                <hr>
                                <span class="text-muted"><a href="#" class="danger darken-2">Project X</a> Statistics</span>
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
    var max_baik_pm10 = 50;
    var max_sedang_pm10 = 100;
    var max_tidaksehat_pm10 = 199;
    var max_sangattidaksehat_pm10 = 299;
    var min_berbahaya_pm10 = 300;

    var max_baik_co = 50;
    var max_sedang_co = 100;
    var max_tidaksehat_co = 199;
    var max_sangattidaksehat_co = 299;
    var min_berbahaya_co = 300;

    $(document).ready(function () {
        function realtime_mobile() {
            $.get('{{ route('mobile.monitoring') }}', function (data) {
                // console.log(data.co);
                $('#m_pm10').html(data.pm10.toFixed(2));
                $('#m_co').html(data.co.toFixed(2));
                $('#m_asap').html(data.asap.toFixed(2));
                $('#m_suhu').html(data.suhu.toFixed(2));
                $('#m_kelembapan').html(data.kelembapan.toFixed(2));

                var n_pm10 = data.pm10;
                var n_co = data.co;
                console.log(n_pm10)

                if (n_pm10 <= max_baik_pm10 && n_co <= max_baik_co) {
                    $('#kat_kualitas_udara').html('<p class="darken-2 success" id="kat_kualitas_udara">Baik</p>');
                } else if (n_pm10 <= max_sedang_pm10 && n_co <= max_sedang_co) {
                    $('#kat_kualitas_udara').html('<p class="darken-2 primary" id="kat_kualitas_udara">Sedang</p>');
                } else if (n_pm10 <= max_tidaksehat_pm10 && n_co <= max_tidaksehat_co) {
                    $('#kat_kualitas_udara').html('<p class="darken-2 warning" id="kat_kualitas_udara">Tidak Sehat</p>');
                } else if (n_pm10 <= max_sangattidaksehat_pm10 && n_co <= max_sangattidaksehat_co) {
                    $('#kat_kualitas_udara').html('<p class="darken-2 danger" id="kat_kualitas_udara">Sangat Tidak Sehat</p>');
                } else {
                    $('#kat_kualitas_udara').html('<p class="darken-2 dark" id="kat_kualitas_udara">Berbahaya</p>');
                }
            });
        }
        setInterval(realtime_mobile, 1000);
    });
</script>
@endsection