<?php /* <button type="button" class="btn btn-success" data-toggle="modal" data-target="#antelope-create-user-modal">+ {!! __('user_management.create_user') !!}</button> */ ?>
<!-- Antelope.io - Create User Component -->
<div class="modal fade" tabindex="-1" role="dialog" id="antelope-create-user-modal" style="display: none;" aria-hidden="true">
   <div class="modal-dialog modal-lg modal-dialog-scrollable">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title">{!! __('user_management.create_user') !!}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
            </button>
         </div>
         @can('create_user')
         <form class="form-horizontal" id="antelope-create-user-form">
            <div class="modal-body">
               <div class="form-group row">
                  <label class="control-label col-sm-2 align-self-center mb-0">{!! __('user_management.input_username') !!}:</label>
                  <div class="col-sm-10">
                     <input type="input" class="form-control" id="antelope-create-user-input-username" name="username" placeholder="{!! __('user_management.placeholder_username') !!}">
                      <label for="antelope-create-user-input-username" class="invalid-feedback"></label>
                  </div>
               </div>
                <div class="form-group row">
                    <label class="control-label col-sm-2 align-self-center mb-0">{!! __('user_management.input_name') !!}:</label>
                    <div class="col-sm-10">
                        <input type="input" class="form-control" id="antelope-create-user-input-name" name="name" placeholder="{!! __('user_management.placeholder_name') !!}">
                        <label for="antelope-create-user-input-name" class="invalid-feedback"></label>
                    </div>
                </div>
               <div class="form-group row">
                  <label class="control-label col-sm-2 align-self-center mb-0">{!! __('user_management.input_email') !!}:</label>
                  <div class="col-sm-10">
                     <input type="email" class="form-control" id="antelope-create-user-input-email" name="email" placeholder="{!! __('user_management.placeholder_email') !!}">
                      <label for="antelope-create-user-input-email" class="invalid-feedback"></label>
                  </div>
               </div>
               <div class="form-group row">
                  <label class="control-label col-sm-2 align-self-center mb-0">{!! __('user_management.input_password') !!}:</label>
                  <div class="col-sm-10">
                     <input type="password" class="form-control" id="antelope-create-user-input-password" name="password" placeholder="{!! __('user_management.placeholder_password') !!}">
                      <label for="antelope-create-user-input-password" class="invalid-feedback"></label>
                  </div>
               </div>
                <div class="form-group row">
                    <label class="control-label col-sm-2 align-self-center mb-0">{!! __('user_management.input_rank') !!}:</label>
                    <div class="col-sm-10">
                        <select type="select" class="form-control" id="antelope-create-user-input-rank" name="rank">
                            <option selected="" disabled="" value="">{!! __('user_management.placeholder_rank') !!}</option>
                            @foreach(\App\Models\Role::get() as $rank)
                                <option value="{{ $rank->id }}">{{ $rank->display_name ?? $rank->name }}</option>
                            @endforeach
                        </select>
                        <label for="antelope-create-user-input-rank" class="invalid-feedback"></label>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-secondary" data-dismiss="modal">{!! __('core.cancel') !!}</button>
               <button type="submit" class="btn btn-success">+ {!! __('user_management.create_user') !!}</button>
            </div>
         </form>
         @else
         <x-auth.lack_perms/>
         @endcan
      </div>
   </div>
</div>


<?php /* <script src="{{ asset('js/views/components/modals/create_user.js') }}"></script> */ ?>

<!-- #END - Create User Component -->
