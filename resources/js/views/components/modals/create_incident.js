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
$('#lsfd-create-incident-input-location').on('change', function(e) {
    var x_axis = $(this).find(':selected').data('x-axis');
    var y_axis = $(this).find(':selected').data('y-axis');
    var isCustom = $(this).val();
    console.log(isCustom);

    if(isCustom) {
        $('#lsfd-create-incident-display-coordinates').removeClass('d-none');
    } else {
        $('#lsfd-create-incident-display-coordinates').addClass('d-none');
    }

    $('#lsfd-create-incident-input-coordinates').val(x_axis+','+y_axis)
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
        text: '+ '+Lang.get('incidents.create_incident_here'),
        callback: createIncidentHere
    });

    lsmap[0].contextmenu.addItem({
        text: Lang.get('incidents.copy_location_coordinates'),
        callback: copyCoordinates
    })
});

function createIncidentHere(e) {
    var coord = e.latlng;
    var lat = coord.lat.toFixed(1);
    var lng = coord.lng.toFixed(1);
    $('#lsfd-create-incident-input-coordinates').val(lat + "," + lng);
    $('#lsfd-create-incident-modal-button').click();
    $('#lsfd-create-incident-input-location').val("custom");
    $('#lsfd-create-incident-display-coordinates').removeClass('d-none');
}

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
