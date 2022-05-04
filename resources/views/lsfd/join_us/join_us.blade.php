@extends('master.app')

@section('title', __('features.join_us'))
@section('breadcrumb', __('core.home').'>'.__('features.join_us'))

@section('content')
    <div id="content-page" class="content-page">

        <div class="container-fluid">

            <div class="row">
                <div class="col-sm-12">

                    <div class="iq-booking-offer lsfd-explorer-bg">
                        <div class="lsfd-explorer-bgimg">
                            <div class="row justify-content-between">
                            <div class="col-lg-6 position-relative">
                                <div class="offer-an-img">
                                    <div class="bodymovin" data-bm-path="images/small/data2.json" data-bm-renderer="svg" data-bm-loop="true"></div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <h2>{!! __('join_us.become_an_explorer') !!}</h2>
                                <p class="text-secondary">{!! __('join_us.explorer_description1') !!}</p>
                                <div class="row">
                                    <div class="col-lg-6 float-left">
                                        <p class="text-white mb-1"><i class="ri-check-line text-success"></i> {!! __('join_us.explorer_feature1') !!}</p>
                                        <p class="text-white mb-1"><i class="ri-check-line text-success"></i> {!! __('join_us.explorer_feature2') !!}</p>
                                        <p class="text-white mb-1"><i class="ri-check-line text-success"></i> {!! __('join_us.explorer_feature3') !!}</p>
                                        <p class="text-white mb-1"><i class="ri-check-line text-success"></i> {!! __('join_us.explorer_feature4') !!}</p>
                                    </div>
                                    <div class="col-lg-6 float-right">
                                        <p class="text-white mb-1"><i class="ri-check-line text-success"></i> {!! __('join_us.explorer_feature5') !!}</p>
                                        <p class="text-white mb-1"><i class="ri-check-line text-success"></i> {!! __('join_us.explorer_feature6') !!}</p>
                                        <p class="text-white mb-1"><i class="ri-check-line text-success"></i> {!! __('join_us.explorer_feature7') !!}</p>
                                        <p class="text-white mb-1"><i class="ri-check-line text-success"></i> {!! __('join_us.explorer_feature8') !!}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 float-left">
                                        <a href="/join_us/register" class="ant-joinus-btn mt-3">{!! __('join_us.enroll_now') !!}<i class="ri-arrow-right-line ml-2"></i></a>
                                        <p class="text-white lsfd-joinus-disclaimer">{!! __('join_us.enroll_now_disclaimer') !!}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>

                </div>
            </div>


            <div class="row">
                <div class="col-sm-12">

                    <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                        <div class="iq-card-body">
                            <div class="iq-advance-course d-flex align-items-center justify-content-between">
                                <div class="left-block">
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('images/lsfd/media-camera.png') }}" class="img-fluid">
                                        <div class="ml-3">
                                            <h4 class="">{!! __('join_us.media') !!}</h4>
                                            <p class="mb-0">{!! __('join_us.media_description1') !!}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="right-block position-relativ">
                                    <a href="https://lsfd.gta.world/ucp.php?i=pm&mode=compose&u=2610" class="btn btn-primary">{!! __('join_us.request_press_access') !!}</a>
                                    <img src="{{ asset('images/page-img/34.png') }}" class="img-fluid image-absulute image-absulute-1">
                                    <img src="{{ asset('images/page-img/35.png') }}" class="img-fluid image-absulute image-absulute-2">
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="iq-card">
                        <div class="iq-card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th class="text-center align-middle" scope="col"></th>
                                        <th class="text-center align-middle" scope="col">{!! __('join_us.guest_access') !!}</th>
                                        <th class="text-center align-middle text-warning" scope="col">{!! __('join_us.fire_explorer') !!} <i class="ri-star-fill"></i></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <th class="text-center align-middle" scope="row">{!! __('join_us.feature1') !!}</th>
                                        <td class="text-center"><i class="ri-check-line ri-2x text-success"></i></td>
                                        <td class="text-center"><i class="ri-check-line ri-2x text-success"></i></td>
                                    </tr>
                                    <tr>
                                        <th class="text-center align-middle" scope="row">{!! __('join_us.feature2') !!}</th>
                                        <td class="text-center"><i class="ri-check-line ri-2x text-success"></i></td>
                                        <td class="text-center"><i class="ri-check-line ri-2x text-success"></i></td>
                                    </tr>
                                    <tr>
                                        <th class="text-center align-middle" scope="row">{!! __('join_us.feature3') !!}</th>
                                        <td class="text-center"><i class="ri-check-line ri-2x text-success"></i></td>
                                        <td class="text-center"><i class="ri-check-line ri-2x text-success"></i></td>
                                    </tr>
                                    <tr>
                                        <th class="text-center align-middle" scope="row">{!! __('join_us.feature4') !!}</th>
                                        <td class="text-center"></td>
                                        <td class="text-center"><i class="ri-check-line ri-2x text-success"></i></td>
                                    </tr>
                                    <tr>
                                        <th class="text-center align-middle" scope="row">{!! __('join_us.feature5') !!}</th>
                                        <td class="text-center"></td>
                                        <td class="text-center"><i class="ri-check-line ri-2x text-success"></i></td>
                                    </tr>
                                    <tr>
                                        <th class="text-center align-middle" scope="row">{!! __('join_us.feature6') !!}</th>
                                        <td class="text-center"></td>
                                        <td class="text-center"><i class="ri-check-line ri-2x text-success"></i></td>
                                    </tr>
                                    <tr>
                                        <th class="text-center align-middle" scope="row">{!! __('join_us.feature7') !!}</th>
                                        <td class="text-center"></td>
                                        <td class="text-center"><i class="ri-check-line ri-2x text-success"></i></td>
                                    </tr>
                                    <tr>
                                        <th class="text-center align-middle" scope="row">{!! __('join_us.feature8') !!}</th>
                                        <td class="text-center"></td>
                                        <td class="text-center"><i class="ri-check-line ri-2x text-success"></i></td>
                                    </tr>
                                    <tr>
                                        <th class="text-center align-middle" scope="row">{!! __('join_us.feature9') !!}</th>
                                        <td class="text-center"></td>
                                        <td class="text-center"><i class="ri-check-line ri-2x text-success"></i></td>
                                    </tr>
                                    <tr>
                                        <th class="text-center align-middle" scope="row">{!! __('join_us.feature10') !!}</th>
                                        <td class="text-center"></td>
                                        <td class="text-center"><i class="ri-check-line ri-2x text-success"></i></td>
                                    </tr>
                                    <tr>
                                        <td class="text-center"></td>
                                        <td class="text-center">
                                            <h2><small>{!! __('join_us.no_registration') !!}</small></h2>
                                        </td>
                                        <td class="text-center">
                                            <h2><small>{!! __('join_us.free_registration') !!}</small></h2>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection
