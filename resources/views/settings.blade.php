@extends('master.app')

@section('title', __('features.settings'))
@section('breadcrumb', __('core.home').'>'.__('features.settings'))

@section('content')
    <div id="content-page" class="content-page">

        <div class="container-fluid">

            <div class="row">
                <div class="col-md-5 mx-auto">
                    <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                            <div class="iq-header-title">
                                <h4 class="card-title">{!! __('settings.profile_settings') !!}</h4>
                            </div>
                        </div>
                        <div class="iq-card-body">
                            <form id="antelope-settings-profile-form">
                                <div class="form-group">
                                    <label>{!! __('settings.input_username') !!}:</label>
                                    <input type="input" class="form-control" id="antelope-settings-input-username" name="username" placeholder="{!! __('settings.placeholder_username') !!}" value="{{ $user->username }}">
                                    <label for="antelope-settings-input-username" class="invalid-feedback"></label>
                                </div>
                                <div class="form-group">
                                    <label>{!! __('settings.input_name') !!}:</label>
                                    <input type="input" class="form-control" id="antelope-settings-input-name" name="name" placeholder="{!! __('settings.placeholder_name') !!}" value="{{ $user->name }}">
                                    <label for="antelope-settings-input-name" class="invalid-feedback"></label>
                                </div>
                                <div class="form-group">
                                    <label>{!! __('settings.input_email') !!}:</label>
                                    <input type="email" class="form-control" id="antelope-settings-input-email" name="email" placeholder="{!! __('settings.placeholder_email') !!}" value="{{ $user->email }}">
                                    <label for="antelope-settings-input-email" class="invalid-feedback"></label>
                                </div>
                                <button type="submit" class="btn btn-primary">{!! __('core.submit') !!}</button>
                                <button type="reset" class="btn iq-bg-danger">{!! __('core.cancel') !!}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-5 mx-auto">
                    <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                            <div class="iq-header-title">
                                <h4 class="card-title">{!! __('settings.change_password') !!}</h4>
                            </div>
                        </div>
                        <div class="iq-card-body">
                            <form id="antelope-settings-password-form">
                                <div class="form-group">
                                    <label>{!! __('settings.input_old_password') !!}:</label>
                                    <input type="password" class="form-control" id="antelope-settings-input-old_password" name="old_password" placeholder="{!! __('settings.placeholder_old_password') !!}">
                                    <label for="antelope-settings-input-old_password" class="invalid-feedback"></label>
                                </div>
                                <div class="form-group">
                                    <label>{!! __('settings.input_new_password') !!}:</label>
                                    <input type="password" class="form-control" id="antelope-settings-input-new_password" name="new_password" placeholder="{!! __('settings.placeholder_new_password') !!}">
                                    <label for="antelope-settings-input-name" class="invalid-feedback"></label>
                                </div>
                                <div class="form-group">
                                    <label>{!! __('settings.input_confirm_new_password') !!}:</label>
                                    <input type="password" class="form-control" id="antelope-settings-input-confirm_new_password" name="confirm_new_password" placeholder="{!! __('settings.placeholder_confirm_new_password') !!}">
                                    <label for="antelope-settings-input-confirm_new_password" class="invalid-feedback"></label>
                                </div>
                                <button type="submit" class="btn btn-primary">{!! __('core.submit') !!}</button>
                                <button type="reset" class="btn iq-bg-danger">{!! __('core.cancel') !!}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection

@section('javascript')
    <script src="{{ asset('js/views/settings.js') }}"></script>
@endsection
