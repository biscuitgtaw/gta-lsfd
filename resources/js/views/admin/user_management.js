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
        ajax: base_url + '/admin/user_management/table/',
        order: [[ 0  , "desc" ]],
        columns: [
            { data: 'id', name: 'id', width: '60px', className: 'text-wrap' },
            { data: 'username', name: 'username', className: 'text-wrap' },
            { data: 'name', name: 'name', className: 'text-wrap' },
            { data: 'email', name: 'email', className: 'text-wrap' },
            { data: 'rank', name: 'rank', className: 'text-wrap', searchable: false },
            { data: 'id', name: 'action', width: '60px', className: 'text-wrap', searchable: false, render: function(data, type, row) {
                return '<button type="button" class="btn btn-info btn-sm justify-content-center" data-target="#antelope-edit-user-modal" data-toggle="modal" name="antelope-edit-user-fetch" data-id="'+data+'"><i class="ri-pencil-fill pr-0 justify-content-center"></i></button>'
                } }
        ],
    });
});
