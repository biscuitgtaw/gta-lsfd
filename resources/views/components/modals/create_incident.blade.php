<?php /* <button type="button" class="btn btn-success" data-toggle="modal" data-target="#lsfd-create-incident-modal">+ {!! __('incidents.create_incident') !!}</button> */ ?>
<!-- LSFD.Live - Create Incident Component -->
<div class="modal fade" tabindex="-1" role="dialog" id="lsfd-create-incident-modal" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{!! __('incidents.create_incident') !!}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form class="form-horizontal" id="lsfd-create-incident-form">
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="control-label col-sm-2 align-self-center mb-0">{!! __('incidents.input_title') !!}:</label>
                        <div class="col-sm-10">
                            <input type="input" class="form-control" id="lsfd-create-incident-input-title" name="title" placeholder="{!! __('incidents.placeholder_title') !!}">
                            <label for="lsfd-create-incident-input-title" class="invalid-feedback"></label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-sm-2 align-self-center mb-0">{!! __('incidents.input_description') !!}:</label>
                        <div class="col-sm-10">
                            <input type="input" class="form-control" id="lsfd-create-incident-input-description" name="description" placeholder="{!! __('incidents.placeholder_description') !!}">
                            <label for="lsfd-create-incident-input-description" class="invalid-feedback"></label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-sm-2 align-self-center mb-0">{!! __('incidents.input_location') !!}:</label>
                        <div class="col-sm-10">
                            <select type="select" class="form-control" id="lsfd-create-incident-input-location" name="location">
                                <option selected="" disabled="" value="">{!! __('incidents.placeholder_location') !!}</option>
                                @foreach($streets as $street)
                                    <option data-x-axis="{{ $street['loc'][0] }}" data-y-axis="{{ $street['loc'][1] }}" value="">{{ $street['title'] }}</option>
                                @endforeach
                                <option data-x-axis="0" data-y-axis="0" value="custom" class="text-warning">{!! __('incidents.placeholder_custom_location') !!}</option>
                            </select>
                            <label for="antelope-create-user-input-rank" class="invalid-feedback"></label>
                        </div>
                    </div>
                    <div class="form-group row d-none" id="lsfd-create-incident-display-coordinates">
                        <label class="control-label col-sm-2 align-self-center mb-0">{!! __('incidents.input_coordinates') !!}:</label>
                        <div class="col-sm-10">
                            <input type="input" class="form-control" id="lsfd-create-incident-input-coordinates" name="coordinates" placeholder="{!! __('incidents.placeholder_coordinates') !!}">
                            <label for="lsfd-create-incident-input-coordinates" class="invalid-feedback"></label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-sm-2 align-self-center mb-0">{!! __('incidents.input_response') !!}:</label>
                        <div class="col-sm-10">
                            <select type="select" class="form-control" id="lsfd-create-incident-input-response" name="response">
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
                            <select type="select" class="form-control" id="lsfd-create-incident-input-type" name="type">
                                <option selected="" disabled="" value="">{!! __('incidents.placeholder_type') !!}</option>
                                @foreach(config('constants.incidents.type') as $key => $value)
                                    <option value="{{ $key }}">{{ __($value) }}</option>
                                @endforeach
                            </select>
                            <label for="lsfd-create-incident-input-type" class="invalid-feedback"></label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-sm-2 align-self-center mb-0">{!! __('incidents.input_status') !!}:</label>
                        <div class="col-sm-10">
                            <select type="select" class="form-control" id="lsfd-create-incident-input-status" name="status">
                                <option selected="" disabled="" value="">{!! __('incidents.placeholder_status') !!}</option>
                                @foreach(config('constants.incidents.status') as $key => $value)
                                    <option value="{{ $key }}">{{ __($value) }}</option>
                                @endforeach
                            </select>
                            <label for="lsfd-create-incident-input-type" class="invalid-feedback"></label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-sm-2 align-self-center mb-0">{!! __('incidents.input_responding_units') !!}:</label>
                        <div class="col-sm-10">
                            <input type="input" class="form-control" id="lsfd-create-incident-input-responding_units" name="responding_units" placeholder="{!! __('incidents.placeholder_responding_units') !!}">
                            <label for="lsfd-create-incident-input-responding_units" class="invalid-feedback"></label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{!! __('core.cancel') !!}</button>
                    <button type="submit" class="btn btn-success">+ {!! __('incidents.create_incident') !!}</button>
                </div>
            </form>
        </div>
    </div>
</div>


<?php /* <script src="{{ asset('js/views/components/modals/create_incident.js') }}"></script> */ ?>

<!-- #END - Create User Component -->
