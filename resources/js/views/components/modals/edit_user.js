/*
Application: Antelope.io
Author: Oliver (Redbully14urh@gmail.com)
NOTE: This file contains all the javascript for the header
*/

/*----------------------------------------------
Index Of Script
------------------------------------------------
:: (Ajax) Fetch User
:: (Ajax) Edit User
------------------------------------------------
Index Of Script
----------------------------------------------*/

/*---------------------------------------------------------------------
(Ajax) Fetch User
-----------------------------------------------------------------------*/
var id = null;

$('#datatable').on('click', 'button[name^="antelope-edit-user-fetch"]', function(e) {
    e.preventDefault();
    id = $(this).data('id');

    $.ajax({
        type: 'GET',
        url: base_url + '/admin/ajax_edit_user_fetch',
        data: {'id' : id},
        success: function(data) {
            $('#antelope-edit-user-fillable').html(data);
        },
        error: function(data) {
            toastr.error(Lang.get('core.error'));
        }
    });
});

/*---------------------------------------------------------------------
(Ajax) Edit User
-----------------------------------------------------------------------*/
$('#antelope-edit-user-form').on('submit', function(e) {
    e.preventDefault();
    var form = $('#antelope-edit-user-form');
    var username = $('#antelope-edit-user-input-username').val();
    var email = $('#antelope-edit-user-input-email').val();
    var rank = $('#antelope-edit-user-input-rank').val();
    var name = $('#antelope-edit-user-input-name').val();
    clearErrors(form);

    $.ajax({
        type: 'PUT',
        url: base_url + '/admin/edit_user',
        data: {'id':id, 'username':username, 'email':email, 'name': name},
        success: function(data) {
            $('#datatable').DataTable().ajax.reload();
            toastr.info(Lang.get('rank_management.user_edited'));
            $('.close').click();
            clearForm(form);
        },
        error: function(data) {
            toastr.error(Lang.get('core.error'));
            displayErrors(data, form);
        }
    });
});
