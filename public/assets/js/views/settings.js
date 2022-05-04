/*
Application: Antelope.io
Author: Oliver (Redbully14urh@gmail.com)
NOTE: This file contains all the javascript for the header
*/

/*----------------------------------------------
Index Of Script
------------------------------------------------
:: (Ajax) Profile Settings
:: (Ajax) Change Password
------------------------------------------------
Index Of Script
----------------------------------------------*/

/*---------------------------------------------------------------------
(Ajax) Profile Settings
-----------------------------------------------------------------------*/

$('#antelope-settings-profile-form').on('submit', function(e) {
    e.preventDefault();
    var form = $('#antelope-settings-settings-form');
    var username = $('#antelope-settings-input-username').val();
    var name = $('#antelope-settings-input-name').val();
    var email = $('#antelope-settings-input-email').val();
    clearErrors(form);

    $.ajax({
        type: 'POST',
        url: base_url + '/settings/ajax_edit_profile',
        data: {username: username, name: name, email: email},
        success: function(data) {
            toastr.success(Lang.get('settings.profile_edited'));
            $('.close').click();
        },
        error: function(data) {
            toastr.error(Lang.get('core.error'));
            displayErrors(data, form);
        }
    });

});

$('#antelope-settings-password-form').on('submit', function(e) {
    e.preventDefault();
    var form = $('#antelope-settings-password-form');
    var current_password = $('#antelope-settings-input-old_password').val();
    var new_password = $('#antelope-settings-input-new_password').val();
    var new_password_confirm = $('#antelope-settings-input-confirm_new_password').val();
    clearErrors(form);

    $.ajax({
        type: 'POST',
        url: base_url + '/settings/ajax_change_password',
        data: {current_password: current_password, new_password: new_password, new_password_confirm: new_password_confirm},
        success: function(data) {
            toastr.success(Lang.get('settings.changed_passwords'));
            $('.close').click();
        },
        error: function(data) {
            toastr.error(Lang.get('core.error'));
            displayErrors(data, form);
        }
    });

});
