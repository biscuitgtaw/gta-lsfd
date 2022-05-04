/*
Application: Antelope.io
Author: Oliver (Redbully14urh@gmail.com)
NOTE: This file contains all the javascript for the header
*/

/*----------------------------------------------
Index Of Script
------------------------------------------------
:: (Ajax) Registration system
------------------------------------------------
Index Of Script
----------------------------------------------*/

/*---------------------------------------------------------------------
(Ajax) Registration system
-----------------------------------------------------------------------*/

var checkboxTOS = $('#lsfd-explorer-checkbox-tos');
var checkboxNM = $('#lsfd-explorer-checkbox-not_media');
var checkboxID = $('#lsfd-explorer-checkbox-roleplay');
var submitForm = $('#lsfd-explorer-submit_form');
var first_name = $('#lsfd-explorer-input-first_name');
var last_name = $('#lsfd-explorer-input-last_name');
var username = $('#lsfd-explorer-input-username');

checkboxTOS.change(function() {
    checkboxNM.attr("disabled", checkboxTOS.is(":not(:checked)"));
    if(checkboxTOS.is(":not(:checked)")) {
        checkboxNM.addClass('disabled');
        if(checkboxNM.is(':checked')) {
            checkboxNM.prop('checked', false);
            checkboxID.prop('checked', false);
            checkboxID.addClass('disabled');
            checkboxID.attr("disabled", checkboxNM.is(":not(:checked)"));
            submitForm.addClass('disabled');
            submitForm.attr("disabled", checkboxID.is(":not(:checked)"));
        }
    } else {
        checkboxNM.removeClass('disabled');
    }
});

checkboxNM.change(function() {
    checkboxID.attr("disabled", checkboxNM.is(":not(:checked)"));
    if(checkboxNM.is(":not(:checked)")) {
        checkboxID.addClass('disabled');
        if(checkboxID.is(':checked')) {
            checkboxID.prop('checked', false);
            submitForm.addClass('disabled');
        }
    } else {
        checkboxID.removeClass('disabled');
    }
});

checkboxID.change(function() {
    submitForm.attr("disabled", checkboxID.is(":not(:checked)"));
    if(checkboxID.is(":not(:checked)")) {
        submitForm.addClass('disabled');
    } else {
        submitForm.removeClass('disabled');
    }
});

first_name.change(function() {
    $('#lsfd-explorer-checkbox-roleplay-label').html('* '+first_name.val()+' '+last_name.val()+' '+Lang.get('join_us.checkbox_roleplay'));
});

last_name.change(function() {
    $('#lsfd-explorer-checkbox-roleplay-label').html('* '+first_name.val()+' '+last_name.val()+' '+Lang.get('join_us.checkbox_roleplay'));
});
username.change(function() {
   $('#lsfd-explorer-login_info').html(Lang.get('join_us.able_to_login')+'<b>'+username.val()+'</b>')
});


submitForm.on('click', function(e) {
    e.preventDefault();
    var form = $('#lsfd-explorer-form');
    var finish = $('#lsfd-explorer-finish');
    var username = $('#lsfd-explorer-input-username').val();
    var email = $('#lsfd-explorer-input-email').val();
    var password = $('#lsfd-explorer-input-password').val();
    var confirm_password = $('#lsfd-explorer-input-confirm_password').val();
    var first_name = $('#lsfd-explorer-input-first_name').val();
    var last_name = $('#lsfd-explorer-input-last_name').val();
    clearErrors(form);

    $.ajax({
        type: 'POST',
        url: base_url + '/ajax_register',
        data: {username: username, email: email, password: password, confirm_password: confirm_password, first_name: first_name, last_name: last_name},
        success: function(data) {
            toastr.success(Lang.get('join_us.account_created'));
            finish.trigger('click');
            form.trigger('reset');
            clearForm(form);
        },
        error: function(data) {
            toastr.error(Lang.get('core.error'));
            displayErrors(data, form);
            $('#lsfd-explorer-errors').html(Lang.get('join_us.form_errors'));
        }
    });

});
