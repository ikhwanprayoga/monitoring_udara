@extends('layouts.backend.master')

@section('header')
<title>Monitoring</title>
@endsection

@section('css')
<style>
    .chart{
        padding-bottom: 0px;
    }
</style>
@endsection

@section('content')
<div class="app-content content">
  <div class="content-wrapper">
    <div class="content-wrapper-before"></div>
    <div class="content-header row">
      <div class="content-header-left col-md-4 col-12 mb-2">
        <h3 class="content-header-title">Monitoring</h3>
      </div>
      <div class="content-header-right col-md-8 col-12">
        <div class="breadcrumbs-top float-md-right">
          <div class="breadcrumb-wrapper mr-1">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ route('beranda') }}">Beranda</a>
              </li>
              <li class="breadcrumb-item"><a href="#">Monitoring</a>
              </li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <div class="content-body">
        {{-- content --}}
        {{-- chat --}}
        <div class="row">
            <div class="col-12">
                <div class="card-deck">
                    @foreach ($data as $key => $val)
                    <div class="col-md-4 col-xs-12" style="padding-bottom: 3vw; padding-right: 0vw;padding-left: 0vw;">
                        <div class="card">
                            {{-- <img class="card-img-top img-fluid" src="{{ asset('app-assets/images/slider/slider-5.png') }}" alt="Card image cap" /> --}}
                            <div class="card-body">
                                <h4 class="card-title">{{ $val->nama }}</h4>
                                <p class="card-text">Wilayah    : {{ $val->nama_wilayah->wilayah }} </p>
                                <div class="row">
                                  <div class="col-6">
                                    <a href="{{ url('admin/monitoring/node/'. $val->id) }}" >
                                        <button type="button" class="btn btn-info btn-min-width mr-1 mb-1"><i class="ft-activity"></i> Monitoring</button>
                                    </a>
                                  </div>
                                  <div class="col-6 text-right" id="statusSensor{{ $val->id }}">
                                    
                                  </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>
  </div>
</div>
@endsection

@section('js')
<script>
    $('#monitoring').addClass('active');

    function statusSensor() {

      $.get( "{{ route('status-sensor') }}", function( data ) {
        // console.log(data)
        $.each(data, function(i, item) {

            if (item.status == 1) {
              $('#statusSensor'+ item.id_sensor).html('<div class="badge border-success success badge-border"><i class="font-medium-2 icon-line-height ft-radio">Online</i></div>')
            } else {
              $('#statusSensor'+ item.id_sensor).html('<div class="badge border-danger danger badge-border"><i class="font-medium-2 icon-line-height ft-radio">Ofline</i></div>')
            }

        })
      })
    }

    setInterval(statusSensor, 3000)
</script>
@endsection