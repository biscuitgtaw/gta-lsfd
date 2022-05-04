<div class="form-group row">
    <label class="control-label col-sm-2 align-self-center mb-0">{!! __('rank_management.input_name') !!}:</label>
    <div class="col-sm-10">
        <input type="input" class="form-control" id="antelope-edit-rank-input-name" name="name" placeholder="{!! __('rank_management.placeholder_name') !!}" value="{{ $role->name }}">
        <label for="antelope-edit-rank-input-name" class="invalid-feedback"></label>
    </div>
</div>
<div class="form-group row">
    <label class="control-label col-sm-2 align-self-center mb-0">{!! __('rank_management.input_display_name') !!}:</label>
    <div class="col-sm-10">
        <input type="input" class="form-control" id="antelope-edit-rank-input-display_name" name="display_name" placeholder="{!! __('rank_management.placeholder_display_name') !!}" value="{{ $role->display_name }}">
        <label for="antelope-edit-rank-input-display_name" class="invalid-feedback"></label>
    </div>
</div>
<div class="form-group row">
    <label class="control-label col-sm-2 align-self-center mb-0">{!! __('rank_management.input_permissions') !!}:</label>
    @foreach(\App\Models\Permission::get() as $permission)
        <div class="custom-control custom-switch custom-switch-icon custom-control-inline">
            <div class="custom-switch-inner">
                <p class="mb-0"> {{ $permission->name }} </p>
                <input type="checkbox" name="antelope-edit-rank-input-permission" class="custom-control-input form-control" data-id="{{ $permission->id }}" id="antelope-edit-rank-switch_{{ $permission->name }}" @if($role->hasDirectPermission($permission->id)) checked @endif>
                <label class="custom-control-label" for="antelope-edit-rank-switch_{{ $permission->name }}">
                    <span class="switch-icon-left"><i class="fa fa-check"></i></span>
                    <span class="switch-icon-right"><i class="fa fa-cross"></i></span>
                </label>
            </div>
        </div>
    @endforeach
</div>
