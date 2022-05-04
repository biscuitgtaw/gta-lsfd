/*
Application: Antelope.io
Author: Oliver (Redbully14urh@gmail.com)
NOTE: This file contains all the javascript for the header
*/

/*----------------------------------------------
Index Of Script
------------------------------------------------
:: Datatable
------------------------------------------------
Index Of Script
----------------------------------------------*/

/*---------------------------------------------------------------------
Datatable
-----------------------------------------------------------------------*/
$(function() {
    $('#datatable').DataTable({
        ordering: true,
        serverSide: true,
        searching: true,
        ajax: base_url + '/admin/rank_management/table/',
        order: [[ 0  , "asc" ]],
        columns: [
            { data: 'id', name: 'id', width: '60px', className: 'text-wrap' },
            { data: 'name', name: 'name', width: '150px', className: 'text-wrap' },
            { data: 'guard_name', name: 'guard_name', width: '100px', className: 'text-wrap' },
            { data: 'display_name', name: 'display_name', width: '350px', className: 'text-wrap' },
            { data: 'permissions', name: 'permissions', className: 'text-wrap' },
            { data: 'id', name: 'action', width: '60px', className: 'text-wrap', searchable: false, render: function(data, type, row) {
                    return '<button type="button" class="btn btn-info btn-sm justify-content-center" data-target="#antelope-edit-rank-modal" data-toggle="modal" name="antelope-edit-rank-fetch" data-id="'+data+'"><i class="ri-pencil-fill pr-0 justify-content-center"></i></button>'
                } }
        ],
    });
});
