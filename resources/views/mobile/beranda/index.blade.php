@extends('layouts.mobile.app')

@section('header')
<title>Beranda</title>
@endsection

@section('css')

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
                                    <ul class="list-inline clearfix mt-2">
                                        <li>
                                            <h1 class="blue-grey lighten-2 text-bold-400">1465</h1>
                                            <span class="success darken-2">
                                                {{-- <i class="ft-user"></i> --}}
                                                 Sangat Tidak Sehat
                                                </span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                {{-- <div class="col-12">
                    <div class="card bg-gradient-directional-danger">
                        <div class="card-header bg-hexagons-danger">
                            <h4 class="card-title white">Analytics</h4>
                            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                        </div>
                        <div class="card-content collapse show bg-hexagons-danger">
                            <div class="card-body">
                                <div class="media d-flex">
                                    <div class="align-self-center width-100">
                                        <div id="Analytics-donut-chart" class="height-100 donutShadow"></div>
                                    </div>
                                    <div class="media-body text-right mt-1">
                                        <h3 class="font-large-2 white">12,515</h3>
                                        <h6 class="mt-1"><span class="text-muted white">sangat tidak sehat </span></h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <div class="col-12">
                    <div class="card">
                        <div class="card-header p-1">
                            <h4 class="card-title float-left">Realtime - <span class="blue-grey lighten-2 font-small-3 mb-0">09 APR 2019</span></h4>
                        </div>
                        <div class="card-content collapse show">
                            <div class="card-footer text-center p-1">
                                <div class="row">
                                    <div class="col-6 border-right-blue-grey border-right-lighten-5 text-center">
                                        <p class="font-medium-1 text-bold-400">263.3</p><br>
                                        <p class="blue-grey lighten-2 mb-0">pm10</p>
                                    </div>
                                    <div class="col-6 border-right-blue-grey border-right-lighten-5 text-center">
                                        <p class="font-medium-1 text-bold-400">58%</p><br>
                                        <p class="blue-grey lighten-2 mb-0">co</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-4 border-right-blue-grey border-right-lighten-5 text-center">
                                        <p class="font-medium-1 text-bold-400">263.3</p><br>
                                        <p class="blue-grey lighten-2 mb-0">asap</p>
                                    </div>
                                    <div class="col-4 border-right-blue-grey border-right-lighten-5 text-center">
                                        <p class="font-medium-1 text-bold-400">58%</p><br>
                                        <p class="blue-grey lighten-2 mb-0">suhu</p>
                                    </div>
                                    <div class="col-4 border-right-blue-grey border-right-lighten-5 text-center">
                                        <p class="font-medium-1 text-bold-400">42%</p><br>
                                        <p class="blue-grey lighten-2 mb-0">kelembapan</p>
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

@endsection