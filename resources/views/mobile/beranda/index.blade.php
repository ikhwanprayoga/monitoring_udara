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
        <div class="content-wrapper-before"></div>
        <div class="content-header row">
        </div>
        <div class="content-body">
            <div class="row">
                @foreach ($wilayahs as $wilayah)
                <div class="col-lg-6 col-md-12">
                    <div class="row">
                        <div class="col-12">
                            <div class="card pull-up ">
                                <div class="card-header ">
                                    <h4 class="card-title primary">{{ ucfirst($wilayah->wilayah)  }}</h4>
                                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li>
                                                <a class="btn btn-sm btn-primary white box-shadow-1 round btn-min-width pull-right" id="detailWilayah_{{$wilayah->id}}" href="{{ route('mobile.beranda-detail', ['wilayahId'=>$wilayah->id]) }}">Detail</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-content collapse show ">
                                    <div class="card-body">
                                        <div class="media d-flex">
                                            <div class="align-self-center width-100">
                                                <img id="logoKualitasUdara_{{$wilayah->id}}" src="{{ asset('logo/ic-face-green.svg') }}" alt="" style="width: 100px;">
                                                {{-- <div id="Analytics-donut-chart" class="height-100 donutShadow"></div> --}}
                                            </div>
                                            <div class="media-body text-right mt-1">
                                                <h3 id="data_wilayah_{{$wilayah->id}}">
                                                    <span style="font-size: 18px;">PM10 </span><span class="font-large-2 primary" id="pm10_wilayah_{{$wilayah->id}}">0</span> <span style="font-size: 12px;">ug/m3</span>
                                                </h3>
                                                <h6 class="mt-1"><span class="text-muted primary data_kategori_udara" id="kat_kualitas_udara_{{$wilayah->id}}">Kualitas Udara</span></h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
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
                                    <p>Beberapa hal yang dapat dilakukan untuk mengurangi efek negatif dari kualitas udara yang kurang baik</p>
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
                console.log(data);

                data.forEach(element => {
                    console.log('pm10_wilayah_'+element.pm10)
                    if (element.pm10 != null) {

                        $('#detailWilayah_'+element.wilayah_id).removeClass('disabled')

                        // $('#data_wilayah_'+element.wilayah_id).html('<span style="font-size: 18px;">PM10 </span><span class="font-large-2 primary" id="pm10_wilayah_{{$wilayah->id}}">0</span> <span style="font-size: 12px;">ug/m3</span>')
                        $('#data_wilayah_'+element.wilayah_id).removeClass('hidden')
                        $('#logoKualitasUdara_'+element.wilayah_id).removeClass('hidden')
                        $('#kat_kualitas_udara_'+element.wilayah_id).removeClass('hidden')

                        $('#pm10_wilayah_'+element.wilayah_id).html(element.pm10.toFixed(2))

                        if (element.pm10 <= max_baik_pm10 && element.co <= max_baik_co) {
                            $('#logoKualitasUdara_'+element.wilayah_id).attr('src', '{{ asset('logo/ic-face-green.svg') }}');
                            // $('#logoKualitasUdara_'+element.wilayah_id).html('<img id="logoKualitasUdara_'+element.wilayah_id+'" src="{{ asset('logo/ic-face-green.svg') }}" alt="" style="width: 175px;">');
                            $('#kat_kualitas_udara_'+element.wilayah_id).html('<div class="badge badge-success" id="kat_kualitas_udara_'+element.wilayah_id+'">Kualitas Udara Baik</div>');
                        } else if (element.pm10 <= max_sedang_pm10 && element.co <= max_sedang_co) {
                            $('#logoKualitasUdara_'+element.wilayah_id).attr('src', '{{ asset('logo/ic-face-blue.svg') }}');
                            // $('#logoKualitasUdara_'+element.wilayah_id).html('<img id="logoKualitasUdara_'+element.wilayah_id+'" src="{{ asset('logo/ic-face-blue.svg') }}" alt="" style="width: 175px;">')
                            $('#kat_kualitas_udara_'+element.wilayah_id).html('<div class="badge badge-primary" id="kat_kualitas_udara_'+element.wilayah_id+'">Kualitas Udara Sedang</div>');
                        } else if (element.pm10 <= max_tidaksehat_pm10 && element.co <= max_tidaksehat_co) {
                            $('#logoKualitasUdara_'+element.wilayah_id).attr('src', '{{ asset('logo/ic-face-yellow.svg') }}');
                            // $('#logoKualitasUdara_'+element.wilayah_id).html('<img id="logoKualitasUdara_'+element.wilayah_id+'" src="{{ asset('logo/ic-face-yellow.svg') }}" alt="" style="width: 175px;">')
                            $('#kat_kualitas_udara_'+element.wilayah_id).html('<div class="badge badge-warning" id="kat_kualitas_udara_'+element.wilayah_id+'">Kualitas Udara Tidak Sehat</div>');
                        } else if (element.pm10 <= max_sangattidaksehat_pm10 && element.co <= max_sangattidaksehat_co) {
                            $('#logoKualitasUdara_'+element.wilayah_id).attr('src', '{{ asset('logo/ic-face-red.svg') }}');
                            // $('#logoKualitasUdara_'+element.wilayah_id).html('<img id="logoKualitasUdara_'+element.wilayah_id+'" src="{{ asset('logo/ic-face-red.svg') }}" alt="" style="width: 175px;">')
                            $('#kat_kualitas_udara_'+element.wilayah_id).html('<div class="badge badge-danger" id="kat_kualitas_udara_'+element.wilayah_id+'">Kualitas Udara Sangat Tidak Sehat</div>');
                        } else {
                            $('#logoKualitasUdara_'+element.wilayah_id).attr('src', '{{ asset('logo/ic-face-purple.svg') }}');
                            // $('#logoKualitasUdara_'+element.wilayah_id).html('<img id="logoKualitasUdara_'+element.wilayah_id+'" src="{{ asset('logo/ic-face-purple.svg') }}" alt="" style="width: 175px;">')
                            $('#kat_kualitas_udara_'+element.wilayah_id).html('<div class="badge badge-secondary" id="kat_kualitas_udara_'+element.wilayah_id+'">Kualitas Udara Berbahaya</div>');
                        }

                    } else {
                        $('#detailWilayah_'+element.wilayah_id).addClass('disabled')
                        $('#data_wilayah_'+element.wilayah_id).addClass('hidden')
                        $('#kat_kualitas_udara_'+element.wilayah_id).html('offline')
                        $('#logoKualitasUdara_'+element.wilayah_id).addClass('hidden')
                        // $('#kat_kualitas_udara_'+element.wilayah_id).addClass('hidden')
                    }
                });
            });
        }
        setInterval(realtime_mobile, 3000);
    });
</script>
@endsection