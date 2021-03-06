@extends('layouts.mobile.app')

@section('header')
<title>Semua Data</title>
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
            <div class="row">
                <div class="col-7">
                    <a href="{{ route('mobile.data') }}">
                        <button type="button" class="btn btn-primary btn-sm mb-1" id="button_ringkasan">Ringkasan - Hari Ini</button>
                    </a>
                </div>
                <div class="col-2">
                    <a href="{{ route('mobile.data.detail') }}">
                        <button type="button" class="btn btn-success btn-sm mb-1" id="button_semua">Semua</button>
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <label class="filter-label">Wilayah</label>
                    <select name="wilayah" class="form-control wilayah">
                        <option value="">--Pilih Wilayah--</option>
                        @foreach($wilayah as $wilayah)
                            <option value="{{ $wilayah->id }}">{{ $wilayah->wilayah }}</option>}
                        @endforeach
                        </select>
                </div>
                <div class="col-4">
                    <label class="filter-label">Mulai Dari</label>
                    <input type="date" class="form-control pickadate mulai" name="mulai" id="mulai">
                </div>
                <div class="col-4">
                    <label class="filter-label">Sampai</label>
                    <input type="date" class="form-control pickadate akhir" name="akhir" id="akhir">
                </div>
            </div>
            <div class="row hidden" id="filter_semua">
                <div class="col-4">
                    <label class="filter-label">Mulai</label>
                    <input type="date" class="form-control pickadate mulai" name="mulai">
                </div>
                <div class="col-4">
                    <label class="filter-label">Sampai</label>
                    <input type="date" class="form-control pickadate akhir" name="akhir">
                </div>
            </div>
            <div class="row pr-1 pl-1 pt-1">
                <table class="table table-responsive" id="table_detail">
                    <thead class="bg-primary white">
                        <tr>
                            <th>No</th>
                            <th>Wilayah</th>
                            <th>Waktu</th>
                            <th>PM10</th>
                            <th>CO</th>
                            <th>Kualitas</th>
                        </tr>
                    </thead>
                </table>
            </div>
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
{{-- <script src="{{ asset('app-assets/vendors/js/tables/datatable/datatables.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('app-assets/js/scripts/tables/datatables/datatable-basic.min.js') }}" type="text/javascript"></script> --}}
<script src="{{ asset('dataTable/jquery.dataTables.js') }}" type="text/javascript"></script>


<script>

    $('#modal_rincian').on('show.bs.modal', function (event) {
        var nilai = $(event.relatedTarget);
        var id          =  nilai.data('id');
        var pm10        =  nilai.data('pm10').toFixed(2);
        var co          =  nilai.data('co').toFixed(2);
        var asap        =  nilai.data('asap');
        var suhu        =  nilai.data('suhu').toFixed(2);
        var kelembapan  =  nilai.data('kelembapan').toFixed(2);
        var kategori    =  nilai.data('kategori_udara_id');
        var created_at  =  nilai.data('created_at');

        $('#id_rincian').val(id);
        $('#pm10_rincian').html(pm10).append("<small> ug/m3</small>");
        $('#co_rincian').html(co).append("<small> ppm</small>");
        // $('#asap_rincian').html(asap).append("<small> ppm</small>");
        $('#suhu_rincian').html(suhu).append("<small> C</small>");
        $('#kelembapan_rincian').html(kelembapan).append("<small> %</small>");
        $('#created_at_rincian').html(created_at);

        if (asap == 1) {
            $('#asap_rincian').html('<div class="badge badge-success">Tidak Terdeteksi</div>');
        } else {
            $('#asap_rincian').html('<div class="badge badge-danger">Terdeteksi</div>');
        }

        if (kategori == 1) {
            $('#img_rincian').html('<img src="{{ asset('logo/ic-face-green.svg') }}" alt="" srcset="" style="width: 100%;">');
        } else if (kategori == 2) {
            $('#img_rincian').html('<img src="{{ asset('logo/ic-face-blue.svg') }}" alt="" srcset="" style="width: 100%;">');
        } else if (kategori == 3) {
            $('#img_rincian').html('<img src="{{ asset('logo/ic-face-yellow.svg') }}" alt="" srcset="" style="width: 100%;">');
        } else if (kategori == 4) {
            $('#img_rincian').html('<img src="{{ asset('logo/ic-face-red.svg') }}" alt="" srcset="" style="width: 100%;">');
        } else {
            $('#img_rincian').html('<img src="{{ asset('logo/ic-face-purple.svg') }}" alt="" srcset="" style="width: 100%;">');
        }
        
    });

    // $('#button_semua').click(function () {
    //     $('#filter_semua').removeClass("hidden");
    // });

    // $('#button_ringkasan').click(function () {
    //     $('#filter_semua').addClass("hidden");
    // });
</script>

<script>
    let oTable = $('#table_detail').DataTable({
        processing: true,
        saerverSide: true,
        searching: false,
        // paging: true,
        // info: false,
        ajax: {
            url: '{{ route('mobile.getData.detail') }}',
            data: function (d) {
                d.mulai = $('input[name=mulai]').val();
                d.akhir = $('input[name=akhir]').val();
                d.wilayah = $('select[name=wilayah]').val();
                console.log(d.mulai);
                console.log(d.akhir);
            }
        },
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex', width: '20px' },
            { data: 'wilayah', name: 'wilayah' },
            { data: 'waktu', name: 'waktu' },
            { 
                data: 'pm10', 
                render: function (data, type, row) {
                    return Number.parseFloat(row.pm10).toFixed(2)
                }, 
                name: 'pm10' 
            },
            { 
                data: 'co', 
                render: function (data, type, row) {
                    return Number.parseFloat(row.co).toFixed(2)
                }, 
                name: 'co' 
            },
            { data: 'kualitas', name: 'kualitas' },
        ],
        columnDefs: [
            {"className": "text-center", "targets": "_all", "width": "100%"}
        ]
    });

    //filter date range
    $('.mulai').on('change', function (e) {
        // alert('jancok');
        $('#table_detail').DataTable().ajax.reload();
        // oTable.draw();
        e.preventDefault();
    });

    $('.akhir').on('change', function (e) {
        // oTable.draw();
        $('#table_detail').DataTable().ajax.reload();
        // oTable.draw();
        e.preventDefault();
    });

    $('.wilayah').on('change', function (e) {
        // oTable.draw();
        $('#table_detail').DataTable().ajax.reload();
        // oTable.draw();
        e.preventDefault();
    });
</script>

@endsection