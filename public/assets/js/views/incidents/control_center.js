/*
Application: Antelope.io
Author: Oliver (Redbully14urh@gmail.com)
NOTE: This file contains all the javascript for the header
*/

/*----------------------------------------------
Index Of Script
------------------------------------------------
:: DOM onReady
::: (Ajax) Fetch incident locations
------------------------------------------------
Index Of Script
----------------------------------------------*/

/*---------------------------------------------------------------------
DOM onReady
-----------------------------------------------------------------------*/
$( document ).ready(function() {

    /*---------------------------------------------------------------------
    (Ajax) Fetch incident locations
    -----------------------------------------------------------------------*/

    $.ajax({
        type: 'GET',
        url: base_url + '/incidents/ajax_map_markers_fetch',
        data: {},
        error: function(data) {
            toastr.error(Lang.get('core.error'));
        }
    }).done( function(incidentLocations) {

        var incidentIcon = L.AwesomeMarkers.icon({
            prefix: 'fas fa',
            markerColor: 'darkred',
            iconColor: 'white',
            icon: 'fire',
        });

        incidentLocations.forEach(function(item) {
            var map = lsmap[0];
            var coordinates = item.coordinates.split(',');
            L.marker(coordinates,{icon: incidentIcon, zIndexOffset: 98}).bindPopup("<b>"+Lang.get('incidents.incident')+" #"+zeroFill(item.id,4)+" - "+window['constants.incidents.response.'+item.response]+" - "+item.title+"</b>",popupOptions).addTo(map);
        });
    });
});
