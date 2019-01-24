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
                            <a class="nav-link actives" id="baseOnlyIcon-tab11" data-toggle="tab" aria-controls="tabOnlyIcon11" href="#tabOnlyIcon11" aria-expanded="true">Ringkasan</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link active" id="baseOnlyIcon-tab12" data-toggle="tab" aria-controls="tabOnlyIcon11" href="#tabOnlyIcon12" aria-expanded="true">Detail</a>
                            </li>
                        </ul>
                        <div class="tab-content pt-1">
                            <div role="tabpanel" class="tab-pane actives" id="tabOnlyIcon11" aria-expanded="true" aria-labelledby="baseOnlyIcon-tab11">
                                <table class="table table-responsive" id="table_ringkasan">
                                    <thead class="bg-primary white">
                                        <tr>
                                            <th>Waktu</th>
                                            <th>Kualitas</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                            <div class="tab-pane active" id="tabOnlyIcon12" aria-labelledby="baseOnlyIcon-tab12">
                                <div class="row">
                                    <div class="col-4">
                                        <label class="filter-label">Mulai Dari</label>
                                        <input type="date" class="form-control pickadate mulai" name="mulai">
                                    </div>
                                    <div class="col-4">
                                        <label class="filter-label">Sampai</label>
                                        <input type="date" class="form-control pickadate akhir" name="akhir">
                                    </div>
                                </div>
                                <table class="table table-responsive" id="table_detail">
                                    <thead class="bg-primary white">
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
{{-- <script>
$(window).on('load', function () {
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

});
</script> --}}

<script>
    var table_detail = $('#table_detail').DataTable({
        processing: true,
        saerverSide: true,
        searching: false,
        paging: false,
        info: false ,
        ajax: {
            url: '{{ route('mobile.getData.detail') }}',
            data: function (d) {
                d.mulai = $('input[name=mulai]').val();
                d.akhir = $('input[name=akhir]').val();
                console.log(d.mulai);
            }
        },
        columns: [
            { data: 'created_at', name: 'created_at' },
            { data: 'pm10', name: 'pm10' },
            { data: 'co', name: 'co' },
            { data: 'asap', name: 'asap' },
            { data: 'suhu', name: 'suhu' },
            { data: 'kelembapan', name: 'kelembapan' },
            { data: 'kategori_udara_id', name: 'kategori_udara_id' }
        ]
    });

    //filter table detail
    $('.mulai').on('change', function (e) {
        table_detail.draw();
        e.preventDefault();
    });

    $('.akhir').on('change', function (e) {
        table_detail.draw();
        e.preventDefault();
    });
</script>
@endsection