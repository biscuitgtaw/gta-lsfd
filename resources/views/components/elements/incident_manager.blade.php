<!-- LSFD.Live - Incident Manager Component -->

<div class="iq-card" id="lsfd-incident-manager">
    <div class="iq-card-header d-flex justify-content-between">
        <div class="iq-header-title">
            <h4 class="card-title">{!! __('incidents.quick_incident_control') !!}</h4>
        </div>
    </div>
    @can('view_incident_manager_panel')
    <div class="iq-card-body">
        <div class="form-group row">
            <label class="control-label col-sm-2 align-self-center mb-0">{!! __('incidents.incident_selector') !!}:</label>
            <div class="col-sm-10" id="lsfd-incident-manager-filler-incident_selector">
                <select type="select" onchange="fetchIncidentInfo(this)" class="form-control" id="lsfd-incident-manager-input-incident_selector" name="type">
                    <option selected="" disabled="" value="">{!! __('incidents.placeholder_incident_selector') !!}</option>
                    @foreach($incidents as $incident)
                        <option data-incident-id="{{ $incident->id }}" @cannot('edit_incident') disabled @endcannot value="">{!! __('incidents.incident') !!} #{{ sprintf("%04d", $incident->id) }} - {{ config_trans('constants.incidents.response.'.$incident->response) }} - {{ $incident->title }}</option>
                    @endforeach
                    <option data-incident-id="new" @cannot('create_incident') disabled @endcannot class="text-success">+ {!! __('incidents.create_new_incident') !!}</option>
                </select>
                <label for="lsfd-incident-manager-input-incident_selector" class="invalid-feedback"></label>
            </div>
        </div>
        <hr/>
        <form class="form-horizontal" id="lsfd-incident-manager-form">
            <div class="form-group row">
                <label class="control-label col-sm-2 align-self-center mb-0">{!! __('incidents.input_title') !!}:</label>
                <div class="col-sm-10">
                    <input disabled type="input" class="form-control" id="lsfd-incident-manager-input-title" name="title" placeholder="{!! __('incidents.placeholder_title') !!}">
                    <label for="lsfd-incident-manager-input-title" class="invalid-feedback"></label>
                </div>
            </div>
            <div class="form-group row">
                <label class="control-label col-sm-2 align-self-center mb-0">{!! __('incidents.input_description') !!}:</label>
                <div class="col-sm-10">
                    <textarea disabled type="input" class="form-control" id="lsfd-incident-manager-input-description" name="description" rows="2" placeholder="{!! __('incidents.placeholder_description') !!}"></textarea>
                    <label for="lsfd-incident-manager-input-description" class="invalid-feedback"></label>
                </div>
            </div>
            <div class="form-group row">
                <label class="control-label col-sm-2 align-self-center mb-0">{!! __('incidents.input_location') !!}:</label>
                <div class="col-sm-10">
                    <select disabled type="select" class="form-control" id="lsfd-incident-manager-input-location" name="location">
                        <option selected="" disabled="" value="">{!! __('incidents.placeholder_location') !!}</option>
                        <option data-x-axis="0" data-y-axis="0" value="custom" class="text-warning">{!! __('incidents.placeholder_custom_location') !!}</option>
                        @foreach($streets as $street)
                            <option data-x-axis="{{ $street['loc'][0] }}" data-y-axis="{{ $street['loc'][1] }}" value="">{{ $street['title'] }}</option>
                        @endforeach
                    </select>
                    <label for="antelope-create-user-input-rank" class="invalid-feedback"></label>
                </div>
            </div>
            <div class="form-group row d-none" id="lsfd-incident-manager-display-coordinates">
                <label class="control-label col-sm-2 align-self-center mb-0">{!! __('incidents.input_coordinates') !!}:</label>
                <div class="col-sm-10">
                    <input disabled type="input" class="form-control" id="lsfd-incident-manager-input-coordinates" name="coordinates" placeholder="{!! __('incidents.placeholder_coordinates') !!}">
                    <label for="lsfd-incident-manager-input-coordinates" class="invalid-feedback"></label>
                </div>
            </div>
            <div class="form-group row">
                <label class="control-label col-sm-2 align-self-center mb-0">{!! __('incidents.input_response') !!}:</label>
                <div class="col-sm-10">
                    <select disabled type="select" class="form-control" id="lsfd-incident-manager-input-response" name="response">
                        <option selected="" disabled="" value="">{!! __('incidents.placeholder_response') !!}</option>
                        @foreach(config('constants.incidents.response') as $key => $value)
                            <option value="{{ $key }}">{{ __($value) }}</option>
                        @endforeach
                    </select>
                    <label for="antelope-create-user-input-rank" class="invalid-feedback"></label>
                </div>
            </div>
            <div class="form-group row">
                <label class="control-label col-sm-2 align-self-center mb-0">{!! __('incidents.input_type') !!}:</label>
                <div class="col-sm-10">
                    <select disabled type="select" class="form-control" id="lsfd-incident-manager-input-type" name="type">
                        <option selected="" disabled="" value="">{!! __('incidents.placeholder_type') !!}</option>
                        @foreach(config('constants.incidents.type') as $key => $value)
                            <option value="{{ $key }}">{{ __($value) }}</option>
                        @endforeach
                    </select>
                    <label for="lsfd-incident-manager-input-type" class="invalid-feedback"></label>
                </div>
            </div>
            <div class="form-group row">
                <label class="control-label col-sm-2 align-self-center mb-0">{!! __('incidents.input_status') !!}:</label>
                <div class="col-sm-10">
                    <select disabled type="select" class="form-control" id="lsfd-incident-manager-input-status" name="status">
                        <option selected="" disabled="" value="">{!! __('incidents.placeholder_status') !!}</option>
                        @foreach(config('constants.incidents.status') as $key => $value)
                            <option value="{{ $key }}">{{ __($value) }}</option>
                        @endforeach
                    </select>
                    <label for="lsfd-incident-manager-input-type" class="invalid-feedback"></label>
                </div>
            </div>
            <div class="form-group row">
                <label class="control-label col-sm-2 align-self-center mb-0">{!! __('incidents.input_responding_units') !!}:</label>
                <div class="col-sm-10">
                    <input disabled type="input" class="form-control" id="lsfd-incident-manager-input-responding_units" name="responding_units" placeholder="{!! __('incidents.placeholder_responding_units') !!}">
                    <label for="lsfd-incident-manager-input-responding_units" class="invalid-feedback"></label>
                </div>
            </div>
            <hr/>
            <button type="submit" class="btn btn-success"><i class="ri-save-3-line"></i> Save & Publish</button>
            <button type="button" class="btn btn-primary" disabled><i class="ri-list-check"></i> Manage Timeline</button>
            <button type="button" class="btn btn-warning"><i class="ri-archive-line"></i> Save & Archive</button>
        </form>
    </div>
    @else
    <div class="iq-card-body">
        <x-auth.lack_perms/>
    </div>
    @endcan
</div>


<?php /* <script src="{{ asset('js/views/components/elements/incident_manager.js') }}"></script> */ ?>

<!-- #END - Incident Manager Component -->