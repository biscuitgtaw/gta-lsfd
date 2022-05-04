/*
Application: Antelope.io
Author: Oliver (Redbully14urh@gmail.com)
NOTE: This file contains all the javascript for the header
*/

/*----------------------------------------------
Index Of Script
------------------------------------------------
:: (Ajax) Fetch Rank
:: (Ajax) Edit Rank
------------------------------------------------
Index Of Script
----------------------------------------------*/

/*---------------------------------------------------------------------
(Ajax) Fetch Rank
-----------------------------------------------------------------------*/
var id = null;

$('#datatable').on('click', 'button[name^="antelope-edit-rank-fetch"]', function(e) {
    e.preventDefault();
    id = $(this).data('id');

    $.ajax({
        type: 'GET',
        url: base_url + '/admin/ajax_edit_rank_fetch',
        data: {'id' : id},
        success: function(data) {
            $('#antelope-edit-rank-fillable').html(data);
        },
        error: function(data) {
            toastr.error(Lang.get('core.error'));
        }
    });
});

/*---------------------------------------------------------------------
(Ajax) Edit Rank
-----------------------------------------------------------------------*/
$('#antelope-edit-rank-form').on('submit', function(e) {
    e.preventDefault();
    var form = $('#antelope-edit-rank-form');
    var name = $('#antelope-edit-rank-input-name').val();
    var display_name = $('#antelope-edit-rank-input-display_name').val();
    var permissions = [];
    $('input[name^="antelope-edit-rank-input-permission"]').each(function() {
        if ($(this).prop('checked')) {
            permissions.push($(this).data('id'));
        }
    });
    clearErrors(form);

    $.ajax({
        type: 'PUT',
        url: base_url + '/admin/edit_rank',
        data: {'id':id, 'name':name, 'display_name':display_name, 'permissions':permissions},
        success: function(data) {
            $('#datatable').DataTable().ajax.reload();
            toastr.info(Lang.get('rank_management.rank_edited'));
            $('.close').click();
            form.trigger('reset');
            clearForm(form);
        },
        error: function(data) {
            toastr.error(Lang.get('core.error'));
            displayErrors(data, form);
        }
    });
});
