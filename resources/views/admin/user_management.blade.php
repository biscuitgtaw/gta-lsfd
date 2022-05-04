@extends('master.app')

@section('title', __('features.admin_user_management'))
@section('breadcrumb', __('core.home').'>'.__('features.admin').'>'.__('features.admin_user_management'))

@section('content')
<div id="content-page" class="content-page">

    <div class="container-fluid">

        @can('create_user')
    	<div class="row">
    		<div class="col-lg-12 mb-3">
    			<div class="float-right">
    				<button type="button" class="btn btn-success" data-toggle="modal" data-target="#antelope-create-user-modal">+ {!! __('user_management.create_user') !!}</button>
    			</div>
    		</div>
    	</div>
        @endcan

        <div class="row">
            <div class="col-lg-12 mx-auto">
                <div class="table-responsive">
                    <table id="datatable" class="table table-striped table-borderless">
                       <thead>
                           <tr>
                               <th>{!! __('user_management.table_id') !!}</th>
                               <th>{!! __('user_management.table_username') !!}</th>
                               <th>{!! __('user_management.table_name') !!}</th>
                               <th>{!! __('user_management.table_email') !!}</th>
                               <th>{!! __('user_management.table_rank') !!}</th>
                               <th>{!! __('user_management.table_action') !!}</th>
                           </tr>
                       </thead>
                       <tbody>
                       </tbody>
                       <tfoot>
                           <tr>
                               <th>{!! __('user_management.table_id') !!}</th>
                               <th>{!! __('user_management.table_username') !!}</th>
                               <th>{!! __('user_management.table_name') !!}</th>
                               <th>{!! __('user_management.table_email') !!}</th>
                               <th>{!! __('user_management.table_rank') !!}</th>
                               <th>{!! __('user_management.table_action') !!}</th>
                           </tr>
                       </tfoot>
                   </table>
                </div>
            </div>
        </div>

    </div>

</div>
@endsection

@section('modals')
<x-modals.create_user/>
<x-modals.edit_user/>
@endsection

@section('javascript')
<script src="{{ asset('js/views/admin/user_management.js') }}"></script>
<script src="{{ asset('js/views/components/modals/create_user.js') }}"></script>
<script src="{{ asset('js/views/components/modals/edit_user.js') }}"></script>
@endsection
