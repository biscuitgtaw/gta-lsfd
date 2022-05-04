var center_of_map_offset_x = 117.3;
var center_of_map_offset_y = 172.8;
var scale_x_axis = 0.02072;
var scale_y_axis = 0.0205;

L.CRS.GTAWCustomCRS = L.extend({}, L.CRS.Simple, {
    projection: L.Projection.LonLat, // LongLat Projection
    transformation: new L.Transformation(scale_x_axis, center_of_map_offset_x, -scale_y_axis, center_of_map_offset_y), // Apply Transform to compensate for GTAV differences

    distance: function (pos1, pos2) {
        var x_difference = pos2.lng - pos1.lng;
        var y_difference = pos2.lat - pos1.lat;
        return Math.sqrt(x_difference * x_difference + y_difference * y_difference);
    },
    scale: function (zoom) {

        return Math.pow(2, zoom);
    },
    zoom: function (sc) {

        return Math.log(sc) / 0.6931471805599453;
    },
    infinite: true
});

var getJSON = function(url, successHandler, errorHandler) {
    var xhr = typeof XMLHttpRequest != 'undefined'
        ? new XMLHttpRequest()
        : new ActiveXObject('Microsoft.XMLHTTP');
    xhr.open('get', url, true);
    xhr.onreadystatechange = function() {
        var status;
        var data;
        if (xhr.readyState == 4) {
            status = xhr.status;
            if (status == 200) {
                data = JSON.parse(xhr.responseText);
                successHandler && successHandler(data);
            } else {
                errorHandler && errorHandler(status);
            }
        }
    };
    xhr.send();
};

var lsmap = [];
// Read JSON Files
function readTextFile(file, callback) {
    var rawFile = new XMLHttpRequest();
    rawFile.overrideMimeType("application/json");
    rawFile.open("GET", file, true);
    rawFile.onreadystatechange = function() {

        if (rawFile.readyState === 4 && rawFile.status == "200") {
            callback(rawFile.responseText);
        }
    }
    rawFile.send(null);
}

// Drawing a pixi marker
var loader = new PIXI.Loader();
document.addEventListener("DOMContentLoaded", function() {
    loader.load(function(loader, resources) {
        //pulls db info
        var mbAttr = 'Live Map - LSFD.Live - GTA World',
            mbUrlAtlas = base_url + '/assets/images/map/mapStyles/styleAtlas/{z}/{x}/{y}.jpg',
            mbUrlSatelite = base_url + '/assets/images/map/mapStyles/styleSatelite/{z}/{x}/{y}.jpg',
            mbUrlGrid = base_url + '/assets/images/map/mapStyles/styleGrid/{z}/{x}/{y}.png',
            mbUrlStreet = base_url + '/assets/images/map/mapStyles/styleStreet/{z}/{x}/{y}.jpg';

        var northEast = new L.LatLng(-4052.4,-5653.7);
        var southWest = new L.LatLng(8409.5,6677.4);
        var bounds = new L.LatLngBounds(southWest, northEast);

        // Map Styles
        var atlas = L.tileLayer(mbUrlAtlas, {id: 'mapbox.atlas', attribution: mbAttr, noWrap: false, continuousWorld: false, minZoom: 0, maxZoom: 5, Zoom: 3, bounds: bounds}),
            satellite = L.tileLayer(mbUrlSatelite, {id: 'mapbox.light', attribution: mbAttr, noWrap: false, continuousWorld: false, minZoom: 0, maxZoom: 5, Zoom: 3, bounds: bounds}),
            grid = L.tileLayer(mbUrlGrid, {id: 'mapbox.grid', attribution: mbAttr, noWrap: false, continuousWorld: false, minZoom: 0, maxZoom: 5, Zoom: 3, bounds: bounds}),
            streets = L.tileLayer(mbUrlStreet, {id: 'mapbox.street', attribution: mbAttr, noWrap: false, continuousWorld: false, minZoom: 0, maxZoom: 5, Zoom: 3, bounds: bounds});

        L.Map.addInitHook(function () {
            lsmap.push(this);
        });

        // Map Creation
        var map = L.map('map', {
            crs: L.CRS.GTAWCustomCRS,
            minZoom: 1,
            maxZoom: 5,
            Zoom: 5,
            maxNativeZoom: 5,
            preferCanvas: true,
            layers: [atlas],
            contextmenu: true,
        });

        // Startup Map Position
        map.setView([-1192.7,-135.1], 3);

        // Base Maps
        var baseLayers = {
            "Atlas": atlas,
            "Streets": streets,
            "Satellite": satellite,
            "Grid": grid,
        };
        // Overlays
        var overlays = {
            "Government Buildings": governmentLoc,
            "Fire Stations": fireStations,
            "Hospitals": hospitals,
            "Lifeguard Stations": lifeguards,
        };

        // Layer contain searched elements
        var markersLayer = new L.LayerGroup();
        map.addLayer(markersLayer);

        // Control - Search Bar
        var controlSearch = new L.Control.Search({
            layer: markersLayer,		// Layer where to search markers (L.LayerGroup)
            position: 'topleft',		// Search Bar postion
            collapsed: false,			// Search Bar collapsed?
            firstTipSubmit: true,		// Search first option from list on enter?
            initial: false,				// Search markers only by initial text?
            zoom: 12,					// Zoom level on search
            marker: false				// True = Custom L.Marker / False = Hide
        });
        map.addControl( controlSearch );

        var dataStreets = null;

        // Read JSON Streets File
        readTextFile(base_url + '/assets/js/views/map/streets.json', function (text) {
            dataStreets = JSON.parse(text);

            // Populate map with invisible street markers
            for (i in dataStreets) {
                var title = dataStreets[i].title,	//value searched
                    loc = dataStreets[i].loc,		//position found
                    marker = new L.Marker(new L.latLng(loc), {title: title}, {icon: iconLocation} );//se property searched
                marker.setOpacity(0);
                markersLayer.addLayer(marker);
            }
        });

        // Control - Layers and Overlays
        var controlLayers = new L.control.layers(
            baseLayers,
            overlays, {
                collapsed: false,
                position: 'bottomright'
            }
        );
        map.addControl( controlLayers );

        // Map URL Query Coords
        // Coords = Y,X / Latitude/Longitude
        var queryString = window.location.search;
        queryString = queryString.substring(1);
        var coords = queryString.split(",");
        if (coords[0] && coords[1]) {
            map.fitBounds([[coords[0],coords[1]]]);
            L.circle([coords[0],coords[1]], 50, {color: '#00000040', fillColor: '#3300FF', fillOpacity: '0.2'}).addTo(map);
        }

        map.zoomControl.setPosition('bottomright');
    });
});

window.FontAwesomeConfig = {
    searchPseudoElements: true
}
