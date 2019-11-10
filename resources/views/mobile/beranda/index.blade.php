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
                <div class="col-xs-12 col-md-4">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body text-center">
                                <div class="card-header pt-0 pb-0">
                                    {{-- <p class="danger darken-2">Total Customers</p> --}}
                                    <h2 class="display- blue-grey lighten-2">Pontianak</h2>
                                </div>
                                <div class="card-content">
                                    {{-- <div id="new-customers" class="height-150 donutShadow"></div> --}}
                                    <div id="logoKualitasUdara">
                                        <img src="{{ asset('logo/ic-face-grenn.svg') }}" alt="" style="max-width: 175px;">
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
                <div class="col-12 col-md-6">
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
                                        <p class="blue-grey lighten-2 mb-0">asap</p>
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
                                {{-- <hr> --}}
                                {{-- <span class="text-muted"><a href="#" class="danger darken-2">Project X</a> Statistics</span> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <section id="basic-tabs-components">
                <div class="row match-height" id="rekomendasi">
                    <div class="col-xl-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Rekomendasi</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <input type="hidden" id="aktif" value="{{ $aktif }}">
                                    <p>Takes the basic nav from above and adds the <code>.nav-tabs</code> class to generate a tabbed interface. </p>
                                    <ul class="nav nav-tabs">
                                        @foreach ($data as $key => $val)
                                        <li class="nav-item">
                                            <a class="nav-link" id="base-tab{{ $key+1 }}" data-toggle="tab" aria-controls="tab{{ $key+1 }}" href="#tab{{ $key+1 }}" aria-expanded="true">{{ $val->kategori_udara->nama_kategori_udara }}</a>
                                        </li>
                                        @endforeach
                                    </ul>
                                    <div class="tab-content px-1 pt-1">
                                        @foreach ($data as $item => $value)
                                        <div role="tabpanel" class="tab-pane" id="tab{{ $item+1 }}" aria-expanded="true" aria-labelledby="base-tab{{ $item+1 }}">
                                            {!! $value->pesan_rekomendasi !!}
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
      </div>
    </div>
@endsection

@section('js')
<script>
    var aktif = $('#aktif').val();
    if (aktif > 0) {
        $('#base-tab' + aktif).addClass('active');
        $('#tab' + aktif).addClass('active');
    } else {
        $('#basic-tabs-components').addClass('hidden');
    }

</script>
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
                // $('#m_asap').html(data.asap.toFixed(2));
                $('#m_suhu').html(data.suhu.toFixed(2));
                $('#m_kelembapan').html(data.kelembapan.toFixed(2));

                var n_pm10 = data.pm10;
                var n_co = data.co;
                var n_asap = data.asap;
                console.log('pm10: '+n_pm10+' co: '+data.co+' asap: '+data.asap+' suhu: '+data.suhu+' kelembapan: '+data.kelembapan)

                if (n_pm10 <= max_baik_pm10 && n_co <= max_baik_co) {
                    $('#logoKualitasUdara').html('<img id="logoKualitasUdara" src="{{ asset('logo/ic-face-green.svg') }}" alt="" style="width: 175px;">')
                    $('#kat_kualitas_udara').html('<div class="badge badge-success" id="kat_kualitas_udara">Kualitas Udara Baik</div>');
                } else if (n_pm10 <= max_sedang_pm10 && n_co <= max_sedang_co) {
                    $('#logoKualitasUdara').html('<img id="logoKualitasUdara" src="{{ asset('logo/ic-face-blue.svg') }}" alt="" style="width: 175px;">')
                    $('#kat_kualitas_udara').html('<div class="badge badge-primary" id="kat_kualitas_udara">Kualitas Udara Sedang</div>');
                } else if (n_pm10 <= max_tidaksehat_pm10 && n_co <= max_tidaksehat_co) {
                    $('#logoKualitasUdara').html('<img id="logoKualitasUdara" src="{{ asset('logo/ic-face-yellow.svg') }}" alt="" style="width: 175px;">')
                    $('#kat_kualitas_udara').html('<div class="badge badge-warning" id="kat_kualitas_udara">Kualitas Udara Tidak Sehat</div>');
                } else if (n_pm10 <= max_sangattidaksehat_pm10 && n_co <= max_sangattidaksehat_co) {
                    $('#logoKualitasUdara').html('<img id="logoKualitasUdara" src="{{ asset('logo/ic-face-red.svg') }}" alt="" style="width: 175px;">')
                    $('#kat_kualitas_udara').html('<div class="badge badge-danger" id="kat_kualitas_udara">Kualitas Udara Sangat Tidak Sehat</div>');
                } else {
                    $('#logoKualitasUdara').html('<img id="logoKualitasUdara" src="{{ asset('logo/ic-face-purple.svg') }}" alt="" style="width: 175px;">')
                    $('#kat_kualitas_udara').html('<div class="badge badge-secondary" id="kat_kualitas_udara">Kualitas Udara Berbahaya</div>');
                }

                if (n_asap == 1) {
                    //asap tidak terdeteksi
                    $('#m_asap').html('<div class="badge badge-success">Tidak<br>Terdeteksi</div>');
                } else {
                    //asap terdeteksi
                    $('#m_asap').html('<div class="badge badge-danger">Terdeteksi</div>');
                }
            });
        }
        setInterval(realtime_mobile, 3000);
    });
</script>
@endsection