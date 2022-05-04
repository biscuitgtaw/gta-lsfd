@extends('master.app')

@section('title', __('features.admaker'))
@section('breadcrumb', __('core.home').'>'.__('features.admaker'))

@section('css')
<style>
    .lsfd-recruitment-opening-bg {
        background: rgb(255,0,89);
        background: linear-gradient(125deg, rgba(255,255,255,0) 0%, rgba(99,0,0,0.6348914565826331) 31%, rgba(121,0,0,1) 56%, rgba(255,0,0,1) 100%), url({{ asset('images/lsfd/admaker/ad1.png') }}) no-repeat -300px -300px;
    }
</style>
@endsection

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
                <div class="col-sm-7">

                    <div class="iq-booking-offer lsfd-recruitment-opening-bg">
                        <div class="lsfd-recruitment-opening-bgimg">
                            <div class="row justify-content-between">
                                <div class="col-lg-6 position-relative">
                                    <div class="offer-an-img">
                                        <div class="bodymovin" data-bm-path="images/small/data2.json" data-bm-renderer="svg" data-bm-loop="true"></div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <h2>{!! __('admaker.recruitment_opening') !!}</h2>
                                    <p class="text-secondary">{!! __('admaker.recruitment_description') !!}</p>
                                    <p class="text-secondary">{!! __('admaker.recruitment_opens') !!}</p>
                                    <div class="row">
                                        <div class="col-lg-6 float-left">
                                            <a href="/join_us/register" class="ant-joinus-btn mt-1">{!! __('admaker.apply_today') !!}<i class="ri-arrow-right-line ml-2"></i></a>
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
