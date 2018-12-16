@extends('layouts.mobile.app')

@section('header')
<title>Monitoring Kualiatas Udara</title>
@endsection

@section('css')

@endsection

@section('content')
<div class="row">
    <div class="col-lg-8 col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Project Revenue</h4>
                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                <div class="heading-elements">
                    <ul class="list-inline mb-0">
                        <li><button type="button" class="btn btn-glow btn-round btn-bg-gradient-x-red-pink">More</button></li>
                    </ul>
                </div>
            </div>
            <div class="card-content collapse show">
                <div class="card-body p-0 pb-0">
                    <div class="chartist">
                        <div id="project-stats" class="height-350 areaGradientShadow1"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-12">
        <div class="row">
            <div class="col-12">
                <div class="card pull-up">
                    <div class="card-header">
                        <h4 class="card-title float-left">Project X</h4><a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                        <span class="badge badge-pill badge-info float-right m-0">In Progress</span>
                    </div>
                    <div class="card-content collapse show">
                        <div class="card-body pt-0 pb-1">
                            <h6 class="text-muted font-small-3"> Completed Task : 4/10</h6>
                            <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                                <div class="progress-bar bg-gradient-x-info" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <div class="media d-flex">
                                <div class="align-self-center">
                                    <h6 class="text-bold-600 mt-2"> Client: <span class="info">Xeon Inc.</span></h6>
                                    <h6 class="text-bold-600 mt-1"> Deadline: <span class="blue-grey">5th June, 2018</span></h6>
                                </div>
                                <div class="media-body text-right mt-2">
                                    <ul class="list-unstyled users-list">
                                        <li data-toggle="tooltip" data-popup="tooltip-custom" data-original-title="John Doe" class="avatar avatar-sm pull-up">
                                            <img class="media-object rounded-circle" src="app-assets/images/portrait/small/avatar-s-19.png" alt="Avatar">
                                        </li>
                                        <li data-toggle="tooltip" data-popup="tooltip-custom" data-original-title="Katherine Nichols" class="avatar avatar-sm pull-up">
                                            <img class="media-object rounded-circle" src="app-assets/images/portrait/small/avatar-s-18.png" alt="Avatar">
                                        </li>
                                        <li data-toggle="tooltip" data-popup="tooltip-custom" data-original-title="Joseph Weaver" class="avatar avatar-sm pull-up">
                                            <img class="media-object rounded-circle" src="app-assets/images/portrait/small/avatar-s-17.png" alt="Avatar">
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card pull-up bg-gradient-directional-danger">
                    <div class="card-header bg-hexagons-danger">
                        <h4 class="card-title white">Analytics</h4>
                        <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                        <div class="heading-elements">
                            <ul class="list-inline mb-0">
                                <li>
                                    <a class="btn btn-sm btn-white danger box-shadow-1 round btn-min-width pull-right" href="#" target="_blank">Report <i class="ft-bar-chart pl-1"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-content collapse show bg-hexagons-danger">
                        <div class="card-body">
                            <div class="media d-flex">
                                <div class="align-self-center width-100">
                                    <div id="Analytics-donut-chart" class="height-100 donutShadow"></div>
                                </div>
                                <div class="media-body text-right mt-1">
                                    <h3 class="font-large-2 white">12,515</h3>
                                    <h6 class="mt-1"><span class="text-muted white">Analytics in the <a href="#" class="darken-2 white">last year.</a></span></h6>
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
<script type="text/javascript" src="{{ asset('js/canvasjs.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery.canvasjs.min.js') }}"></script>

<script>
    $('#beranda').addClass('active');
</script>

@endsection