@extends('master.app')

@section('title', __('features.ir_control_center'))

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
                    <div class="iq-card h-500">
                        <div class="iq-card-header d-flex justify-content-between">
                            <div class="iq-header-title">
                                <h4 class="card-title">{!! __('incidents.map_control') !!}</h4>
                            </div>
                        </div>
                        <div class="iq-card-body">
                            <div id="map" style="height: 500px;"></div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <x-elements.incident_manager :incidents="$incidents"/>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                           <div class="iq-header-title">
                              <h4 class="card-title">{!! __('incidents.active_incidents') !!}</h4>
                           </div>
                        </div>
                        <div class="iq-card-body">
                           <div class="table-responsive">
                              <table class="table mb-0 table-borderless">
                                 <thead>
                                    <tr>
                                       <th scope="col">{!! __('incidents.incident_number') !!}</th>
                                       <th scope="col">{!! __('incidents.last_update') !!}</th>
                                       <th scope="col">{!! __('incidents.reporter') !!}</th>
                                       <th scope="col">{!! __('incidents.status') !!}</th>
                                       <th scope="col">{!! __('incidents.progress') !!}</th>
                                       <th scope="col">{!! __('incidents.actions') !!}</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    @foreach($incidents as $incident)
                                    <tr>
                                        <td>#{{ sprintf("%04d", $incident->id) }}</td>
                                        <td>{{ $incident->updated_at }}</td>
                                        <td>{{ $incident->reporter_id }}</td>
                                        <td><div class="badge badge-pill badge-secondary">{{ config_trans('constants.incidents.status.'.$incident->status) }}</div></td>
                                        <td><div class="iq-progress-bar"><span class="bg-success" data-percent="90" style="transition: width 2s ease 0s; width: 90%;"></span></div></td>
                                        <td><button type="button" class="btn btn-info btn-sm justify-content-center" data-target="" data-toggle="modal" name="" data-id="{{ $incident->id }}"><i class="ri-pencil-fill pr-0 justify-content-center"></i></button> <button type="button" class="btn btn-primary btn-sm justify-content-center" data-target="" data-toggle="modal" name="" data-id="{{ $incident->id }}"><i class="ri-list-check pr-0 justify-content-center"></i></button> <button type="button" class="btn btn-warning btn-sm justify-content-center" data-target="" data-toggle="modal" name="" data-id="{{ $incident->id }}"><i class="ri-archive-line pr-0 justify-content-center"></i></button></td>

                                    </tr>
                                    @endforeach
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

@section('phpjs')
    @javascript(fetch_config('constants.incidents'))
@endsection

@section('javascript')
    <script src="{{ asset('js/assets/leaflet.js') }}"></script>
    <script src="{{ asset('js/assets/leaflet-hash.js') }}"></script>
    <script src="{{ asset('js/assets/leaflet.awesome-markers.js') }}"></script>
    <script src="{{ asset('js/assets/leaflet.contextmenu.js') }}"></script>
    <script src="{{ asset('js/assets/pixi.min.js') }}"></script>
    <script src="{{ asset('js/assets/L.PixiOverlay.js') }}"></script>
    <script src="{{ asset('js/views/map/locations.js') }}"></script>
    <script src="{{ asset('js/views/map/map.control.js') }}"></script>
    <script src="{{ asset('js/views/incidents/control_center.js') }}"></script>
    <script src="{{ asset('js/views/components/elements/incident_manager.js') }}"></script>
@endsection
