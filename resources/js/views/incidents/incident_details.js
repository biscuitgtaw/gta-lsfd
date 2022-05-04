/*
Application: Antelope.io
Author: Oliver (Redbully14urh@gmail.com)
NOTE: This file contains all the javascript for the header
*/

/*----------------------------------------------
Index Of Script
------------------------------------------------
:: DOM onReady
::: (Ajax) Fetch incident history
::: (Ajax) Fetch incident locations
------------------------------------------------
Index Of Script
----------------------------------------------*/

/*---------------------------------------------------------------------
DOM onReady
-----------------------------------------------------------------------*/
document.addEventListener("DOMContentLoaded", function(){

    var incident = window['incident'];

    var incidentIcon = L.AwesomeMarkers.icon({
        prefix: 'fas fa',
        markerColor: window['constants.map_config.severeness_marker_color.'+incident.severeness],
        iconColor: 'white',
        icon: window['constants.map_config.type_marker_icon.'+incident.type],
    });

    var map = lsmap[0];
    var coordinates = incident.coordinates.split(',');

    L.marker(coordinates,{icon: incidentIcon, zIndexOffset: 98}).addTo(map);

    map.setView(coordinates, 10);

});
