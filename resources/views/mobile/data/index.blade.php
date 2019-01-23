@extends('layouts.mobile.app')

@section('header')
<title>Data</title>
@endsection

@section('css')
<style>
.nav.nav-tabs .nav-item .nav-link {
    line-height: normal;
    display: inline-flex;
    padding: 0.5rem 0.5rem;
}

.nav.nav-tabs.nav-only-icon .nav-item .nav-link {
    font-size: 1rem;
}
</style>
@endsection

@section('content')
    <div class="app-content content">
      <div class="content-wrapper">
        <div class="content-body">
            <section id="tabs-with-icons">
                <div class="row match-height">
                    <div class="col-12">
                        <ul class="nav nav-tabs nav-only-icon nav-top-border no-hover-bg">
                            <li class="nav-item">
                            <a class="nav-link active" id="baseOnlyIcon-tab11" data-toggle="tab" aria-controls="tabOnlyIcon11" href="#tabOnlyIcon11" aria-expanded="true">Ringkasan</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link" id="baseOnlyIcon-tab12" data-toggle="tab" aria-controls="tabOnlyIcon11" href="#tabOnlyIcon12" aria-expanded="true">Detail</a>
                            </li>
                        </ul>
                        <div class="tab-content pt-1">
                            <div role="tabpanel" class="tab-pane active" id="tabOnlyIcon11" aria-expanded="true" aria-labelledby="baseOnlyIcon-tab11">
                                <table class="table table-responsive" id="table_ringkasan">
                                    <thead class="bg-primary white">
                                        <tr>
                                            <th>Waktu</th>
                                            <th>Kualitas</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                            <div class="tab-pane" id="tabOnlyIcon12" aria-labelledby="baseOnlyIcon-tab12">
                                <div class="row">
                                    <button class="btn">
                                            Notification <span class="badge badge-primary"></span>
                                    </button>
                                </div>
                                <table class="table table-responsive">
                                    <thead>
                                        <tr>
                                            <th>waktu</th>
                                            <th>pm10</th>
                                            <th>co</th>
                                            <th>asap</th>
                                            <th>suhu</th>
                                            <th>kelembapan</th>
                                            <th>kualitas</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $key => $val)
                                        <tr>
                                            <td scope="row">{{ date('H:i', strtotime($val->created_at)) }}</td>
                                            <td>{{ $val->pm10 }}</td>
                                            <td>{{ $val->co }}</td>
                                            <td>{{ $val->asap }}</td>
                                            <td>{{ $val->suhu }}</td>
                                            <td>{{ $val->kelembapan }}</td>
                                            <td>
                                                @if ($val->kategori_udara_id == 1)
                                                    <div class="badge border-success success badge-border">Baik</div>
                                                @elseif($val->kategori_udara_id == 2)
                                                    <div class="badge border-primary primary badge-border">Sedang</div>
                                                @elseif($val->kategori_udara_id == 3)
                                                    <div class="badge border-warning warning badge-border">Tidak Sehat</div>
                                                @elseif($val->kategori_udara_id == 4)
                                                    <div class="badge border-danger danger badge-border">Sangat Tidak Sehat</div>
                                                @elseif($val->kategori_udara_id == 5)
                                                    <div class="badge border-dark dark badge-border">Berbahaya</div>
                                                @endif
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
      </div>
    </div>
    <!-- Modal rincian-->
    <div class="modal fade" id="modal_rincian" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Rincian</h5>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-5 border-right-blue-grey border-right-lighten-5" id="img_rincian" style="text-align: center;">
                            {{-- <img src="{{ asset('push.png') }}" alt="" srcset="" style="width: 100%;"> --}}
                        </div>
                        <div class="col-7">
                            <div class="row">
                                <div class="col-6"><p>Pm10 </p></div>
                                <div class="col-6" id="pm10_rincian"></div>
                            </div>
                            <div class="row">
                                <div class="col-6"><p>Co </p></div>
                                <div class="col-6" id="co_rincian"></div>
                            </div>
                            <div class="row">
                                <div class="col-6"><p>Asap </p></div>
                                <div class="col-6" id="asap_rincian"></div>
                            </div>
                            <div class="row">
                                <div class="col-6"><p>Suhu </p></div>
                                <div class="col-6" id="suhu_rincian"></div>
                            </div>
                            <div class="row">
                                <div class="col-6"><p>Kelembapan </p></div>
                                <div class="col-6" id="kelembapan_rincian"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
<script>
var table_ringkasan = $('#table_ringkasan').DataTable({
    processing: false,
    saerverSide: true,
    searching: false,
    paging: false,
    info: false,
    ajax: {
        url: '{{ route('mobile.getData.ringkasan') }}'
    },
    columns: [
        { data: 'created_at', name: 'created_at' },
        { data: 'kualitas', name: 'kualitas' }
    ],
    columnDefs: [
        {"className": "text-center", "targets": "_all", "width": "100%"}
    ]
});
</script>
<script>
$('#modal_rincian').on('show.bs.modal', function (event) {
    var nilai = $(event.relatedTarget);
    var id          =  nilai.data('id');
    var pm10        =  nilai.data('pm10');
    var co          =  nilai.data('co');
    var asap        =  nilai.data('asap');
    var suhu        =  nilai.data('suhu');
    var kelembapan  =  nilai.data('kelembapan');
    var kategori    =  nilai.data('kategori_udara_id');
    var created_at  =  nilai.data('created_at');

    $('#id_rincian').val(id);
    $('#pm10_rincian').html(pm10).append("<small> ppm</small>");
    $('#co_rincian').html(co).append("<small> ppm</small>");
    $('#asap_rincian').html(asap).append("<small> ppm</small>");
    $('#suhu_rincian').html(suhu).append("<small> C</small>");
    $('#kelembapan_rincian').html(kelembapan).append("<small> %</small>");
    $('#created_at_rincian').html(created_at);

    if (kategori == 1) {
        $('#img_rincian').html('<img src="{{ asset('push.png') }}" alt="" srcset="" style="width: 100%;">');
    } else if (kategori == 2) {
        $('#img_rincian').html('<img src="{{ asset('img/modal_rincian/temp.png') }}" alt="" srcset="" style="width: 100%;">');
    } else if (kategori == 3) {
        $('#img_rincian').html('<img src="{{ asset('push.png') }}" alt="" srcset="" style="width: 100%;">');
    } else if (kategori == 4) {
        $('#img_rincian').html('<img src="{{ asset('push.png') }}" alt="" srcset="" style="width: 100%;">');
    } else {
        $('#img_rincian').html('<img src="{{ asset('push.png') }}" alt="" srcset="" style="width: 100%;">');
    }
    
});
</script>
@endsection