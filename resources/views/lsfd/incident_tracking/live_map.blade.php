@extends('master.app')

@section('title', __('features.live_map'))

@section('css')
    <link rel="stylesheet" href="{{ asset('css/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/leaflet.css') }}">
    <link rel="stylesheet" href="{{ asset('css/leaflet.awesome-markers.css') }}">
    <link rel="stylesheet" href="{{ asset('css/leaflet.contextmenu.css') }}">
    <link rel="stylesheet" href="{{ asset('css/views/map.css') }}">
@endsection

@section('content')
    <div id="content-page" class="content-page">

        <div class="container-fluid">

            <div class="row">
                <div class="col-sm-4">
                    <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                        <div class="iq-card-header d-flex justify-content-between">
                            <div class="iq-header-title">
                                <h4 class="card-title">{!! __('incidents.incident_history') !!}</h4>
                            </div>
                            <div class="iq-card-header-toolbar d-flex align-items-center">
                                <div class="dropdown">
                                    <span class="dropdown-toggle dropdown-bg" id="dropdownMenuButton2" data-toggle="dropdown">View all</span>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="#"><i class="ri-eye-fill mr-2"></i>View</a>
                                        <a class="dropdown-item" href="#"><i class="ri-delete-bin-6-fill mr-2"></i>Delete</a>
                                        <a class="dropdown-item" href="#"><i class="ri-pencil-fill mr-2"></i>Edit</a>
                                        <a class="dropdown-item" href="#"><i class="ri-printer-fill mr-2"></i>Print</a>
                                        <a class="dropdown-item" href="#"><i class="ri-file-download-fill mr-2"></i>Download</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="iq-card-body" id="lsfd-incident-history-fetch">
                            <?php /* /ajax/recent_incidents_fetch.blade.php */ ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                            <div class="iq-header-title">
                                <h4 class="card-title">{!! __('incidents.incident_live_map') !!}</h4>
                            </div>
                        </div>
                        <div class="iq-card-body">
                            <div id="map" style="height: 1000px;"></div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection

@section('phpjs')
    @javascript(fetch_config('constants.incidents'))
    @javascript(fetch_config('constants.map_config'))
@endsection

@section('javascript')
    <script src="{{ asset('js/assets/leaflet.js') }}"></script>
    <script src="{{ asset('js/assets/leaflet-hash.js') }}"></script>
    <script src="{{ asset('js/assets/leaflet-search.js') }}"></script>
    <script src="{{ asset('js/assets/leaflet.awesome-markers.js') }}"></script>
    <script src="{{ asset('js/assets/leaflet.contextmenu.js') }}"></script>
    <script src="{{ asset('js/assets/pixi.min.js') }}"></script>
    <script src="{{ asset('js/assets/L.PixiOverlay.js') }}"></script>
    <script src="{{ asset('js/views/map/locations.js') }}"></script>
    <script src="{{ asset('js/views/map/map.js') }}"></script>
    <script src="{{ asset('js/views/incidents/live_map.js') }}"></script>
@endsection

