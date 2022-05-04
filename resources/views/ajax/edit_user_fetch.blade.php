<div class="form-group row">
    <label class="control-label col-sm-2 align-self-center mb-0">{!! __('user_management.input_username') !!}:</label>
    <div class="col-sm-10">
        <input type="input" class="form-control" id="antelope-edit-user-input-username" name="username" placeholder="{!! __('user_management.placeholder_username') !!}" value="{{ $user->username }}">
        <label for="antelope-edit-user-input-username" class="invalid-feedback"></label>
    </div>
</div>
<div class="form-group row">
    <label class="control-label col-sm-2 align-self-center mb-0">{!! __('user_management.input_name') !!}:</label>
    <div class="col-sm-10">
        <input type="input" class="form-control" id="antelope-edit-user-input-name" name="name" placeholder="{!! __('user_management.placeholder_name') !!}" value="{{ $user->name }}">
        <label for="antelope-edit-user-input-name" class="invalid-feedback"></label>
    </div>
</div>
<div class="form-group row">
    <label class="control-label col-sm-2 align-self-center mb-0">{!! __('user_management.input_email') !!}:</label>
    <div class="col-sm-10">
        <input type="email" class="form-control" id="antelope-edit-user-input-email" name="email" placeholder="{!! __('user_management.placeholder_email') !!}" value="{{ $user->email }}">
        <label for="antelope-edit-user-input-email" class="invalid-feedback"></label>
    </div>
</div>
<div class="form-group row">
    <label class="control-label col-sm-2 align-self-center mb-0">{!! __('user_management.input_rank') !!}:</label>
    <div class="col-sm-10">
        <select type="select" class="form-control" id="antelope-edit-user-input-rank" name="rank">
            <option @if(is_null($user->getRankId())) selected @endif value="">{!! __('user_management.no_rank') !!}</option>
            @foreach(\App\Models\Role::get() as $rank)
                <option @if($rank->id == $user->getRankId()) selected @endif value="{{ $rank->id }}">{{ $rank->display_name ?? $rank->name }}</option>
            @endforeach
        </select>
        <label for="antelope-edit-user-input-rank" class="invalid-feedback"></label>
    </div>
</div>
