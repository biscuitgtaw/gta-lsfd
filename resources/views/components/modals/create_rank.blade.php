<?php /* <button type="button" class="btn btn-success" data-toggle="modal" data-target="#antelope-create-rank-modal">+ {!! __('rank_management.create_rank') !!}</button> */ ?>
<!-- Antelope.io - Create Rank Component -->
<div class="modal fade" tabindex="-1" role="dialog" id="antelope-create-rank-modal" style="display: none;" aria-hidden="true">
   <div class="modal-dialog modal-lg modal-dialog-scrollable">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title">{!! __('rank_management.create_rank') !!}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
            </button>
         </div>
         @can('create_rank')
         <form class="form-horizontal" id="antelope-create-rank-form">
            <div class="modal-body">
               <div class="form-group row">
                  <label class="control-label col-sm-2 align-self-center mb-0">{!! __('rank_management.input_name') !!}:</label>
                  <div class="col-sm-10">
                     <input type="input" class="form-control" id="antelope-create-rank-input-name" name="name" placeholder="{!! __('rank_management.placeholder_name') !!}">
                      <label for="antelope-create-rank-input-name" class="invalid-feedback"></label>
                  </div>
               </div>
               <div class="form-group row">
                  <label class="control-label col-sm-2 align-self-center mb-0">{!! __('rank_management.input_guard_name') !!}:</label>
                  <div class="col-sm-10">
                     <input type="input" class="form-control" value="web" disabled>
                  </div>
               </div>
               <div class="form-group row">
                  <label class="control-label col-sm-2 align-self-center mb-0">{!! __('rank_management.input_display_name') !!}:</label>
                  <div class="col-sm-10">
                     <input type="input" class="form-control" id="antelope-create-rank-input-display_name" name="display_name" placeholder="{!! __('rank_management.placeholder_display_name') !!}">
                      <label for="antelope-create-rank-input-display_name" class="invalid-feedback"></label>
                  </div>
               </div>
               <div class="form-group row">
                  <label class="control-label col-sm-2 align-self-center mb-0">{!! __('rank_management.input_permissions') !!}:</label>
                  @foreach(\App\Models\Permission::get() as $permission)
                  <div class="custom-control custom-switch custom-switch-icon custom-control-inline">
                     <div class="custom-switch-inner">
                        <p class="mb-0"> {{ $permission->name }} </p>
                        <input type="checkbox" name="antelope-create-rank-input-permission" class="custom-control-input form-control" data-id="{{ $permission->id }}" id="antelope-create-rank-switch_{{ $permission->name }}">
                        <label class="custom-control-label" for="antelope-create-rank-switch_{{ $permission->name }}">
                        <span class="switch-icon-left"><i class="fa fa-check"></i></span>
                        <span class="switch-icon-right"><i class="fa fa-cross"></i></span>
                        </label>
                     </div>
                  </div>
                  @endforeach
               </div>
               </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-secondary" data-dismiss="modal">{!! __('core.cancel') !!}</button>
               <button type="submit" class="btn btn-success">+ {!! __('rank_management.create_rank') !!}</button>
            </div>
         </form>
         @else
         <x-auth.lack_perms/>
         @endcan
      </div>
   </div>
</div>


<?php /* <script src="{{ asset('js/views/components/modals/create_rank.js') }}"></script> */ ?>

<!-- #END - Create Rank Component -->
