/*
Application: Antelope.io
Author: Oliver (Redbully14urh@gmail.com)
NOTE: This file contains all the javascript for the header
*/

/*----------------------------------------------
Index Of Script
------------------------------------------------
:: (Ajax) Create a User
------------------------------------------------
Index Of Script
----------------------------------------------*/

/*---------------------------------------------------------------------
(Ajax) Create a User
-----------------------------------------------------------------------*/
$('#antelope-create-user-form').on('submit', function(e) {
  e.preventDefault();
  var form = $('#antelope-create-user-form');
  var username = $('#antelope-create-user-input-username').val();
  var name = $('#antelope-create-user-input-name').val();
  var email = $('#antelope-create-user-input-email').val();
  var password = $('#antelope-create-user-input-password').val();
  var rank = $('#antelope-create-user-input-rank').val();
  clearErrors(form);

  $.ajax({
    type: 'POST',
    url: base_url + '/admin/add_user',
    data: {'username':username, 'email':email, 'password':password, 'rank':rank, 'name':name},
    success: function(data) {
        $('#datatable').DataTable().ajax.reload();
        toastr.success(Lang.get('user_management.user_created'));
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
