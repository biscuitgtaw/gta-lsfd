@extends('master.app')

@section('title', __('features.admin_rank_management'))
@section('breadcrumb', __('core.home').'>'.__('features.admin').'>'.__('features.admin_rank_management'))

@section('content')
<div id="content-page" class="content-page">

    <div class="container-fluid">

    	<div class="row">
    		<div class="col-lg-12 mb-3">
    			<div class="float-right">
    				<button type="button" class="btn btn-success" data-toggle="modal" data-target="#antelope-create-rank-modal">+ {!! __('rank_management.create_rank') !!}</button>
    			</div>
    		</div>
    	</div>

        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive">
                    <table id="datatable" class="table table-striped table-bordered">
                       <thead>
                           <tr>
                               <th>{!! __('rank_management.table_id') !!}</th>
                               <th>{!! __('rank_management.table_name') !!}</th>
                               <th>{!! __('rank_management.table_guard_name') !!}</th>
                               <th>{!! __('rank_management.table_display_name') !!}</th>
                               <th>{!! __('rank_management.table_permissions') !!}</th>
                               <th>{!! __('rank_management.table_action') !!}</th>
                           </tr>
                       </thead>
                       <tbody>
                       </tbody>
                       <tfoot>
                           <tr>
                               <th>{!! __('rank_management.table_id') !!}</th>
                               <th>{!! __('rank_management.table_name') !!}</th>
                               <th>{!! __('rank_management.table_guard_name') !!}</th>
                               <th>{!! __('rank_management.table_display_name') !!}</th>
                               <th>{!! __('rank_management.table_permissions') !!}</th>
                               <th>{!! __('rank_management.table_action') !!}</th>
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
<x-modals.create_rank/>
<x-modals.edit_rank/>
@endsection

@section('javascript')
<script src="{{ asset('js/views/admin/rank_management.js') }}"></script>
<script src="{{ asset('js/views/components/modals/create_rank.js') }}"></script>
<script src="{{ asset('js/views/components/modals/edit_rank.js') }}"></script>
@endsection
