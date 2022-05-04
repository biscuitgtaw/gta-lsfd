@extends('master.app')

@section('title', __('features.explorer_registration'))
@section('breadcrumb', __('core.home').'>'.__('features.join_us').'>'.__('features.explorer_registration'))

@section('content')
    <div id="content-page" class="content-page">

        <div class="container-fluid">

            <div class="row">
                <div class="col-sm-12 col-lg-12">
                    <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                            <div class="iq-header-title">
                                <h4 class="card-title">{!! __('features.explorer_registration') !!}</h4>
                            </div>
                        </div>
                        <div class="iq-card-body">
                            <form id="lsfd-explorer-form" class="mt-4">
                                <ul id="top-tab-list" class="p-0">
                                    <li class="active" id="account">
                                        <a href="javascript:void();">
                                            <i class="ri-lock-unlock-line"></i><span>{!! __('join_us.account') !!}</span>
                                        </a>
                                    </li>
                                    <li id="personal">
                                        <a href="javascript:void();">
                                            <i class="ri-user-fill"></i><span>{!! __('join_us.profile') !!}</span>
                                        </a>
                                    </li>
                                    <li id="payment">
                                        <a href="javascript:void();">
                                            <i class="ri-profile-line"></i><span>{!! __('join_us.verification') !!}</span>
                                        </a>
                                    </li>
                                    <li id="confirm">
                                        <a href="javascript:void();">
                                            <i class="ri-check-fill"></i><span>{!! __('join_us.finish') !!}</span>
                                        </a>
                                    </li>
                                </ul>
                                <fieldset>
                                    <div class="form-card text-left">
                                        <div class="row">
                                            <div class="col-7">
                                                <h3 class="mb-4">{!! __('join_us.account_information') !!}:</h3>
                                            </div>
                                            <div class="col-5">
                                                <h2 class="steps">{!! __('core.step') !!} 1 - 3</h2>
                                            </div>
                                            <div class="col-12">
                                                <p>{!! __('join_us.form_disclaimer') !!}</p>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>{!! __('join_us.input_username') !!}: <span class="text-danger">*</span></label>
                                                    <input type="input" class="form-control" id="lsfd-explorer-input-username" name="username" placeholder="{!! __('join_us.placeholder_username') !!}">
                                                    <label for="lsfd-explorer-input-username" class="invalid-feedback"></label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>{!! __('join_us.input_email') !!}:</label>
                                                    <input type="email" class="form-control" id="lsfd-explorer-input-email" name="email" placeholder="{!! __('join_us.placeholder_email') !!}">
                                                    <label for="lsfd-explorer-input-email" class="invalid-feedback"></label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>{!! __('join_us.input_password') !!}: <span class="text-danger">*</span></label>
                                                    <input type="password" class="form-control" id="lsfd-explorer-input-password" name="password" placeholder="{!! __('join_us.placeholder_password') !!}">
                                                    <label for="lsfd-explorer-input-password" class="invalid-feedback"></label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>{!! __('join_us.input_confirm_password') !!}: <span class="text-danger">*</span></label>
                                                    <input type="password" class="form-control" id="lsfd-explorer-input-confirm_password" name="confirm_password" placeholder="{!! __('join_us.placeholder_confirm_password') !!}">
                                                    <label for="lsfd-explorer-input-confirm_password" class="invalid-feedback"></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="button" name="next" class="btn btn-primary next action-button float-right">{!! __('core.next') !!}</button>
                                </fieldset>
                                <fieldset>
                                    <div class="form-card text-left">
                                        <div class="row">
                                            <div class="col-7">
                                                <h3 class="mb-4">{!! __('join_us.personal_information') !!}:</h3>
                                            </div>
                                            <div class="col-5">
                                                <h2 class="steps">{!! __('core.step') !!} 2 - 3</h2>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>{!! __('join_us.input_first_name') !!}: <span class="text-danger">*</span></label>
                                                    <input type="input" class="form-control" id="lsfd-explorer-input-first_name" name="first_name" placeholder="{!! __('join_us.placeholder_first_name') !!}">
                                                    <label for="lsfd-explorer-input-username" class="invalid-feedback"></label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>{!! __('join_us.input_last_name') !!}: <span class="text-danger">*</span></label>
                                                    <input type="input" class="form-control" id="lsfd-explorer-input-last_name" name="last_name" placeholder="{!! __('join_us.placeholder_last_name') !!}">
                                                    <label for="lsfd-explorer-input-last_name" class="invalid-feedback"></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="button" name="next" class="btn btn-primary next action-button float-right">{!! __('core.next') !!}</button>
                                    <button type="button" name="previous" class="btn btn-dark previous action-button-previous float-right mr-3">{!! __('core.previous') !!}</button>
                                </fieldset>
                                <fieldset>
                                    <div class="form-card text-left">
                                        <div class="row">
                                            <div class="col-7">
                                                <h3 class="mb-4">{!! __('join_us.policy_verification') !!}:</h3>
                                            </div>
                                            <div class="col-5">
                                                <h2 class="steps">{!! __('core.step') !!} 3 - 3</h2>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox custom-checkbox-color-check">
                                                <input type="checkbox" class="custom-control-input bg-success" id="lsfd-explorer-checkbox-tos">
                                                <label class="custom-control-label" for="lsfd-explorer-checkbox-tos">{!! __('join_us.checkbox_tos') !!}</label>
                                            </div>
                                            <div class="custom-control custom-checkbox custom-checkbox-color-check">
                                                <input type="checkbox" class="custom-control-input bg-success disabled" id="lsfd-explorer-checkbox-not_media" disabled>
                                                <label class="custom-control-label" for="lsfd-explorer-checkbox-not_media">{!! __('join_us.checkbox_not_media') !!}</label>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <h4 class="mb-1">{!! __('join_us.identification_card') !!}</h4>
                                            <p class="mb-0">{!! __('join_us.identification_card_disclaimer') !!}</p>
                                            <p>{!! __('join_us.identification_card_ooc_disclaimer') !!}</p>
                                            <div class="custom-control custom-checkbox custom-checkbox-color-check">
                                                <input type="checkbox" class="custom-control-input bg-success disabled" id="lsfd-explorer-checkbox-roleplay" disabled>
                                                <label class="custom-control-label" for="lsfd-explorer-checkbox-roleplay" id="lsfd-explorer-checkbox-roleplay-label" style="color:#C2A2DA;">* no_name {!! __('join_us.checkbox_roleplay') !!}</label>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="button" name="submit" id="lsfd-explorer-submit_form" class="btn btn-success float-right disabled">{!! __('core.submit') !!}</button>
                                    <a id="lsfd-explorer-finish" class="action-button next" style="display: none;"></a>
                                    <span id="lsfd-explorer-errors" class="text-danger"></span>
                                    <button type="button" name="previous" class="btn btn-dark previous action-button-previous float-right mr-3">{!! __('core.previous') !!}</button>
                                </fieldset>
                                <fieldset>
                                    <h3 class="text-center text-success">{!! __('join_us.account_created') !!}</h3>
                                    <p class="text-center">{!! __('join_us.welcome') !!}</p>
                                    <p class="text-center text-white" id="lsfd-explorer-login_info">{!! __('join_us.able_to_login') !!}</p>
                                    <div class="text-center">
                                        <a class="btn btn-outline-success ml-1" href="/login">{!! __('core.login') !!}</a>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>

            </div>

    </div>
@endsection

@section('javascript')
    <script src="{{ asset('js/views/register.js') }}"></script>
@endsection
