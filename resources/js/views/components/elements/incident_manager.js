/*
Application: Antelope.io
Author: Oliver (Redbully14urh@gmail.com)
NOTE: This file contains all the javascript for the header
*/

/*----------------------------------------------
Index Of Script
------------------------------------------------
:: Location handling
:: (Ajax) Create an Incident
------------------------------------------------
Index Of Script
----------------------------------------------*/

/*---------------------------------------------------------------------
Location handling
-----------------------------------------------------------------------*/
$('#lsfd-incident-manager-input-location').on('change', function(e) {
    var x_axis = $(this).find(':selected').data('x-axis');
    var y_axis = $(this).find(':selected').data('y-axis');
    var isCustom = $(this).val();

    if(isCustom) {
        $('#lsfd-incident-manager-display-coordinates').removeClass('d-none');
    } else {
        $('#lsfd-incident-manager-display-coordinates').addClass('d-none');
        $('#lsfd-incident-manager-input-coordinates').val(x_axis+','+y_axis)
    }
    
});

function fetchIncidentInfo(e) {
    var action = $(e).find(':selected').data('incident-id');
    console.log(action)
    var form = $('#lsfd-incident-manager-form');

    $('#lsfd-incident-manager-input-title').removeAttr("disabled");
    $('#lsfd-incident-manager-input-description').removeAttr('disabled');
    $('#lsfd-incident-manager-input-coordinates').removeAttr('disabled');
    $('#lsfd-incident-manager-input-location').removeAttr('disabled');
    $('#lsfd-incident-manager-input-report').removeAttr('disabled');
    $('#lsfd-incident-manager-input-type').removeAttr('disabled');
    $('#lsfd-incident-manager-input-severeness').removeAttr('disabled');
    $('#lsfd-incident-manager-input-status').removeAttr('disabled');
    $('#lsfd-incident-manager-input-responding_units').removeAttr('disabled');

    if(action === "new") {
        clearErrors(form);
        clearForm(form);
    } else {
        $.ajax({
            type: 'GET',
            url: base_url + '/incidents/details/raw/' + action,
            success: function(data) {
                $('#lsfd-incident-manager-input-title').val(data.title);
                $('#lsfd-incident-manager-input-description').val(data.description);
                $('#lsfd-incident-manager-display-coordinates').removeClass('d-none');
                $('#lsfd-incident-manager-input-coordinates').val(data.coordinates);
                $('#lsfd-incident-manager-input-type').val(data.type);
                $('#lsfd-incident-manager-input-report').val(data.report);
                $('#lsfd-incident-manager-input-severeness').val(data.severeness);
                $('#lsfd-incident-manager-input-status').val(data.status);
                $('#lsfd-incident-manager-input-responding_units').val(data.responding_units);

                lsmap[0].setView(data.coordinates.split(','), 10);
            },
            error: function(data) {
                toastr.error(Lang.get('core.error'));
                displayErrors(data, form);
            }
        });
    }
    
}

/*---------------------------------------------------------------------
(Ajax) Saving & Publishing
-----------------------------------------------------------------------*/

$('#lsfd-incident-manager-form').on('submit', function(e) {
    e.preventDefault();
    var incident_selector = $('#lsfd-incident-manager-input-incident_selector').find(':selected').data('incident-id');
    var form = $('#lsfd-incident-manager-form');
    var title = $('#lsfd-incident-manager-input-title').val();
    var description = $('#lsfd-incident-manager-input-description').val();
    var coordinates = $('#lsfd-incident-manager-input-coordinates').val();
    var report = $('#lsfd-incident-manager-input-report').val();
    var type = $('#lsfd-incident-manager-input-type').val();
    var severeness = $('#lsfd-incident-manager-input-severeness').val();
    var status = $('#lsfd-incident-manager-input-status').val();
    var responding_units = $('#lsfd-incident-manager-input-responding_units').val();
    clearErrors(form);
    console.log(incident_selector);

    if(incident_selector == 'new') {
        $.ajax({
            type: 'POST',
            url: base_url + '/incidents/create',
            data: {title:title, description:description, coordinates:coordinates, report:report, type:type, severeness:severeness, status:status, responding_units:responding_units},
            success: function(data) {
                e.preventDefault();
                toastr.success(Lang.get('incidents.incident_created'));
                $('.close').click();
                form.trigger('reset');
                clearForm(form);
                $("#lsfd-incident-manager-filler-incident_selector").load(location.href + " #lsfd-incident-manager-filler-incident_selector>*");
            },
            error: function(data) {
                toastr.error(Lang.get('core.error'));
                displayErrors(data, form);
            }
        });
    } else {
        $.ajax({
            type: 'POST',
            url: base_url + '/incidents/modify/' + incident_selector,
            data: {title:title, description:description, coordinates:coordinates, report:report, severeness:severeness, type:type, status:status, responding_units:responding_units},
            success: function(data) {
                e.preventDefault();
                toastr.success(Lang.get('incidents.incident_created'));
                $('.close').click();
                form.trigger('reset');
                clearForm(form);
                $("#lsfd-incident-manager-filler-incident_selector").load(location.href + " #lsfd-incident-manager-filler-incident_selector>*");
            },
            error: function(data) {
                toastr.error(Lang.get('core.error'));
                displayErrors(data, form);
            }
        });
    }
    
});


/*---------------------------------------------------------------------
(Ajax) Create an Incident
-----------------------------------------------------------------------*/

$('#lsfd-create-incident-form').on('submit', function(e) {
    e.preventDefault();
    var form = $('#lsfd-create-incident-form');
    var title = $('#lsfd-create-incident-input-title').val();
    var description = $('#lsfd-create-incident-input-description').val();
    var coordinates = $('#lsfd-create-incident-input-coordinates').val();
    var response = $('#lsfd-create-incident-input-response').val();
    var type = $('#lsfd-create-incident-input-type').val();
    var status = $('#lsfd-create-incident-input-status').val();
    var responding_units = $('#lsfd-create-incident-input-responding_units').val();
    clearErrors(form);

    $.ajax({
        type: 'POST',
        url: base_url + '/incidents/create',
        data: {title:title, description:description, coordinates:coordinates, response:response, type:type, status:status, responding_units:responding_units},
        success: function(data) {
            toastr.success(Lang.get('incidents.incident_created'));
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

document.addEventListener("DOMContentLoaded", function(){

    lsmap[0].contextmenu.addItem({
        text: Lang.get('incidents.copy_location_coordinates'),
        callback: copyCoordinates
    })
});

function copyCoordinates(e) {
    var coord = e.latlng;
    var lat = coord.lat.toFixed(1);
    var lng = coord.lng.toFixed(1);
    var coords = document.createElement("textarea");
    document.body.appendChild(coords);
    coords.value = lat + "," + lng;
    coords.select();
    document.execCommand("copy");
    document.body.removeChild(coords);
}
