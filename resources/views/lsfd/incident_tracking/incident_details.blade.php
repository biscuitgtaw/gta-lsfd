@extends('master.app')

@section('title', __('features.incident_details'))

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
                <div class="col-sm-8">
                    <div class="iq-card iq-card-block iq-card-stretch">
                        <div class="iq-card-body pb-0">
                            <h2 class="mb-0">{!! __('incidents.incident') !!} #{{ sprintf("%04d", $incident->id) }} - {{ config_trans('constants.incidents.response.'.$incident->response) }} - {{ $incident->title }}</h2>
                            @can('view_incident_details')
                            <p class="mb-0">{!! __('incidents.description') !!}:</p>
                            <h6 class="mb-4">{{ $incident->description ? $incident->description : __('incidents.no_description_set') }}</h6>
                            <p class="mb-0">{!! __('incidents.responding_units') !!}:</p>
                            <h6 class="mb-4">{{ $incident->description ? $incident->description : __('incidents.no_description_set') }}</h6>
                            <div class="float-left">
                                <p class="mb-0">{!! __('incidents.type') !!}:</p>
                                <h2><span class="badge badge-secondary">{{ config_trans('constants.incidents.type.'.$incident->type) }}</span></h2>
                            </div>
                            <div class="float-right">
                                <p class="mb-0">{!! __('incidents.status') !!}:</p>
                                <h2><span class="badge badge-secondary">{{ config_trans('constants.incidents.status.'.$incident->status) }}</span></h2>
                            </div>
                            @else
                            <x-auth.lack_perms/>
                            @endcan
                        </div>
                        <div class="iq-card-body pt-0">
                            <hr>
                            <h3 class="mb-0">{!! __('incidents.incident_timeline') !!}</h3>
                            @can('view_incident_timeline')
                            <ul class="iq-timeline">
                                @forelse($incident->timeline as $timeline)
                                <li>
                                    <div class="timeline-dots border-{{ $timeline->type }}"></div>
                                    <h6 class="float-left mb-1">{{ $timeline->title }}</h6>
                                    <small class="float-right mt-1">{{ $timeline->displayed_at ? $timeline->displayed_at : $timeline->created_at }}</small>
                                    <div class="d-inline-block w-100">
                                        {!! $timeline->description !!}
                                        @if($timeline->reporter_id)
                                        <div class="iq-media-group">
                                            <a href="#" class="iq-media">
                                                <img class="img-fluid avatar-40 rounded-circle" src="{{ asset('images/user/05.jpg') }}" alt="">
                                            </a>
                                        </div>
                                        @endif
                                    </div>
                                </li>
                                @empty
                                </ul>
                                There is currently no timeline.
                                @endforelse
                            </ul>
                            @else
                            <x-auth.lack_perms/>
                            @endcan
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="iq-card h-500">
                        <div class="iq-card-header d-flex justify-content-between">
                            <div class="iq-header-title">
                                <h4 class="card-title">{!! __('incidents.incident_location') !!}</h4>
                            </div>
                        </div>
                        <div class="iq-card-body">
                            <div id="map" style="height: 500px;"></div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection

@section('phpjs')
    @javascript(fetch_config('constants.incidents'))
    @javascript(['incident_coordinates' => $incident->coordinates])
@endsection

@section('javascript')
    <script src="{{ asset('js/assets/leaflet.js') }}"></script>
    <script src="{{ asset('js/assets/leaflet-hash.js') }}"></script>
    <script src="{{ asset('js/assets/leaflet.awesome-markers.js') }}"></script>
    <script src="{{ asset('js/assets/pixi.min.js') }}"></script>
    <script src="{{ asset('js/assets/L.PixiOverlay.js') }}"></script>
    <script src="{{ asset('js/views/map/map.lite.js') }}"></script>
    <script src="{{ asset('js/views/incidents/incident_details.js') }}"></script>
@endsection
