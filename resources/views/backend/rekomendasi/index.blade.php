@extends('layouts.backend.master')

@section('header')
<title>Rekomendasi</title>
@endsection

@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/extensions/toastr.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/plugins/extensions/toastr.css') }}">

<style>
    .error {
        color: red;
    }
    .file {
        color: red;
    }
</style>
@endsection

@section('content')
<div class="app-content content">
  <div class="content-wrapper">
    <div class="content-wrapper-before"></div>
    <div class="content-header row">
      <div class="content-header-left col-md-4 col-12 mb-2">
        <h3 class="content-header-title">Rekomendasi</h3>
      </div>
      <div class="content-header-right col-md-8 col-12">
        <div class="breadcrumbs-top float-md-right">
          <div class="breadcrumb-wrapper mr-1">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ route('beranda') }}">Beranda</a>
              </li>
              <li class="breadcrumb-item"><a href="#">Rekomendasi</a>
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
                        <a class="btn btn-primary" data-toggle="modal" href='#modal-id'>Tambah Pesan Rekomendasi</a>
                    </div>
                    <div class="modal fade text-left" id="modal-id" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Tambah Pesan Rekomendasi</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form class="card-body" action="{{ route('rekomendasi-tambah') }}" method="POST" enctype="multipart/form-data" id="form_tambah">
                                    {{ csrf_field() }}
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Kategori Kualitas Udara</label>
                                                    <fieldset class="form-group">
                                                        <select class="form-control" name="kategori_udara_id" id="kategori_udara_id">
                                                          <option value="">Pilih Kategori Kualitas Udara</option>
                                                          @foreach ($kategori_udara as $val)
                                                            <option value="{{ $val->id }}">{{ $val->nama_kategori_udara }}</option>
                                                          @endforeach
                                                        </select>
                                                    </fieldset>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Pesan Rekomendasi</label>
                                                    <textarea class="ckeditor" name="pesan_rekomendasi" id="pesan_rekomendasi" ></textarea>
                                                </div>
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
                            <p class="card-text">Using the most basic table markup, here’s how <code>.table</code>-based tables look in Bootstrap. You can use any example of below table for your table and it can be use with any type of bootstrap tables. </p>
                            <p><span class="text-bold-600">Example 1:</span> Table with outer spacing</p>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kategori Udara</th>
                                            <th>Pesan Rekomendasi</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $key => $val)
                                        <tr>
                                            <th scope="row">{{ $key+1 }}</th>
                                            <td>{{ $val->kategori_udara->nama_kategori_udara }}</td>
                                            <td>{!! $val->pesan_rekomendasi !!}</td>
                                            <td>
                                                <a class="btn btn-sm btn-warning" href="#modal_edit_{{ $val->id }}" data-toggle="modal"><i class="ft ft-edit"></i> Ubah</a>
                                                {{-- modal ubah --}}
                                                <div class="modal fade text-left" id="modal_edit_{{ $val->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Ubah Pesan Rekomendasi</h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <form class="card-body" action="{{ route('rekomendasi-ubah') }}" method="POST" enctype="multipart/form-data">
                                                                {{ csrf_field() }}
                                                                <input type="hidden" name="id" value="{{ $val->id }}">
                                                                <div class="form-body">
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <div class="form-group">
                                                                                <label>Ubah Kategori Kualitas Udara</label>
                                                                                <fieldset class="form-group">
                                                                                    <select class="form-control" name="kategori_udara_id" id="kategori_udara_id_ubah">
                                                                                        <option value="{{ $val->kategori_udara_id }}">--[ {{ $val->kategori_udara->nama_kategori_udara }} ]--</option>
                                                                                      @foreach ($kategori_udara as $value)
                                                                                        <option value="{{ $value->id }}">{{ $value->nama_kategori_udara }}</option>
                                                                                      @endforeach
                                                                                    </select>
                                                                                </fieldset>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <div class="form-group">
                                                                                <label>Ubah Pesan Rekomendasi</label>
                                                                                <textarea class="ckeditor" name="pesan_rekomendasi" id="pesan_rekomendasi_ubah">{{ $val->pesan_rekomendasi }}</textarea>
                                                                            </div>
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

                                                <a class="btn btn-sm btn-danger" href="#modal_hapus" data-toggle="modal"
                                                    data-id="{{ $val->id }}"
                                                    data-kategori_udara_id="{{ $val->kategori_udara->nama_kategori_udara }}"
                                                ><i class="ft ft-trash"></i> Hapus</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    {{-- modal hapus --}}
                    <div class="modal fade text-left" id="modal_hapus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Hapus Pesan Rekomendasi</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form class="card-body" action="{{ route('rekomendasi-hapus') }}" method="GET" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="id" id="id_hapus">
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Hapus Pesan Rekomendasi Untuk Kategori</label>
                                                    <input type="text" name="nama" id="kategori_udara_id_hapus" class="form-control" placeholder="Nama Node Sensor" readonly="">
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
                </div>
            </div>
        </div>
    </div>
  </div>
</div>
@endsection

@section('js')
<script src="{{ asset('app-assets/vendors/js/extensions/toastr.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('ckeditor/ckeditor.js') }}" type="text/javascript" ></script>
<script src="{{ asset('js/ckeditor.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/jquery.validate.js') }}" type="text/javascript"></script>

<script>
    $('#rekomendasi').addClass('active');
</script>

<script>
    // CKEDITOR.replace('pesan_rekomendasi');
    // CKEDITOR.replace('pesan_rekomendasi_ubah');
    $(document).ready(function () {
        $('#form_tambah').validate(
        {
            ignore: [],
            debug: false,
            rules: {
                kategori_udara_id: { required: true },
                pesan_rekomendasi: { 
                    required: function () {
                    CKEDITOR.instances.pesan_rekomendasi.updateElement();
                },
                minlength:5
                }
            },
            messages: {
                kategori_udara_id: { required: 'Harap pilih kategori kualitas udara !' },
                pesan_rekomendasi: { required: 'Harap isi pesan rekomendasi terlebih dahulu !' }
            }
        });
    });
</script>

<script>
    $('#nama_node_sensor').on('keyup', function(e){
        var nama_node_sensor = $(this).val();
        $('#kode_node_sensor').val(nama_node_sensor);
    });
</script>
<script>
    $('#modal_hapus').on('show.bs.modal', function (hapus) {
        var button = $(hapus.relatedTarget);
        var id = button.data('id');
        var kategori_udara_id = button.data('kategori_udara_id');

        $('#id_hapus').val(id);
        $('#kategori_udara_id_hapus').val(kategori_udara_id);
    });
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