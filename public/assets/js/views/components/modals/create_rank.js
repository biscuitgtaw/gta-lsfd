/*
Application: Antelope.io
Author: Oliver (Redbully14urh@gmail.com)
NOTE: This file contains all the javascript for the header
*/

/*----------------------------------------------
Index Of Script
------------------------------------------------
:: (Ajax) Create a Rank
------------------------------------------------
Index Of Script
----------------------------------------------*/

/*---------------------------------------------------------------------
(Ajax) Create a Rank
-----------------------------------------------------------------------*/

$('#antelope-create-rank-form').on('submit', function(e) {
  e.preventDefault();
  var form = $('#antelope-create-rank-form');
  var name = $('#antelope-create-rank-input-name').val();
  var display_name = $('#antelope-create-rank-input-display_name').val();
  var permissions = [];
  $('input[name^="antelope-create-rank-input-permissions"]').each(function() {
      if ($(this).prop('checked')) {
        permissions.push($(this).data('id'));
      }
  });
  clearErrors(form);

  $.ajax({
    type: 'POST',
    url: base_url + '/admin/add_rank',
    data: {'name':name, 'display_name':display_name, 'permissions':permissions},
    success: function(data) {
        $('#datatable').DataTable().ajax.reload();
        toastr.success(Lang.get('rank_management.rank_created'));
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
