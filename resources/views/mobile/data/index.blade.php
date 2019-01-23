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
                    <div class="col-xl-12 col-lg-12">
                        <ul class="nav nav-tabs nav-only-icon nav-top-border no-hover-bg">
                            <li class="nav-item">
                            <a class="nav-link active" id="baseOnlyIcon-tab11" data-toggle="tab" aria-controls="tabOnlyIcon11" href="#tabOnlyIcon11" aria-expanded="true">Ringkasan</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link" id="baseOnlyIcon-tab12" data-toggle="tab" aria-controls="tabOnlyIcon11" href="#tabOnlyIcon12" aria-expanded="true">Detail</a>
                            </li>
                        </ul>
                        <div class="tab-content px-1 pt-1">
                            <div role="tabpanel" class="tab-pane active" id="tabOnlyIcon11" aria-expanded="true" aria-labelledby="baseOnlyIcon-tab11">
                                <table class="table ">
                                    <thead>
                                        <tr>
                                            <th>waktu</th>
                                            <th>kualitas</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $key => $val)
                                        <tr>
                                            <td scope="row">{{ date('H:i', strtotime($val->created_at)) }}</td>
                                            <td>
                                                @if ($val->kategori_udara_id == 1)
                                                    <div class="badge border-success success badge-border" data-toggle="modal" data-target="#modelId">Baik</div>
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
                                <!-- Modal -->
                                <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Modal title</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                </div>
                                                <div class="modal-body">
                                                    Body
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary">Save</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            <div class="tab-pane" id="tabOnlyIcon12" aria-labelledby="baseOnlyIcon-tab12">
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
@endsection

@section('js')
@endsection