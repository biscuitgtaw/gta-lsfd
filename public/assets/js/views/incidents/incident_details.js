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

    var incidentIcon = L.AwesomeMarkers.icon({
        prefix: 'fas fa',
        markerColor: 'darkred',
        iconColor: 'white',
        icon: 'fire',
    });

    var map = lsmap[0];
    var coordinates = window['incident_coordinates'].split(',');

    L.marker(coordinates,{icon: incidentIcon, zIndexOffset: 98}).addTo(map);

    map.setView(coordinates, 10);

});
