// Bubble Popup Options
var popupOptions = {
    'maxWidth': '512',
    'className' : 'custom',
}

// Icons
var iconLocation = L.icon({
	iconUrl: base_url + '/assets/images/map/blips/Blip-Blank.png',
	iconSize: [0, 0],
	popupAnchor: [0,0],
});
var iconEmergencyCall = L.AwesomeMarkers.icon({
	prefix: 'fa-fw fa',
	markerColor: 'red',
	iconColor: 'white',
	icon: 'phone',
});

var iconGovernmentBuilding = L.AwesomeMarkers.icon({
	prefix: 'fa-fw fa',
	markerColor: 'cadetblue',
	iconColor: 'white',
	icon: 'building',
});

var iconFireStation = L.AwesomeMarkers.icon({
	prefix: 'fa-fw fa',
	markerColor: 'darkred',
	iconColor: 'white',
	icon: 'fire-extinguisher',
});

var iconHospital = L.AwesomeMarkers.icon({
	prefix: 'fa-fw fa',
	markerColor: 'green',
	iconColor: 'white',
	icon: 'briefcase-medical',
});

var iconLifeguard = L.AwesomeMarkers.icon({
	prefix: 'fa-fw fa',
	markerColor: 'orange',
	iconColor: 'white',
	icon: 'life-ring',
});

var iconPickup = L.AwesomeMarkers.icon({
	prefix: 'fa-fw fa',
	markerColor: 'cadetblue',
	iconColor: 'white',
	icon: 'truck-pickup',
});

var iconPrison = L.AwesomeMarkers.icon({
	prefix: 'fa-fw fa',
	markerColor: 'cadetblue',
	iconColor: 'white',
	icon: 'lock',
});

// Bubble Popups
var governmentLoc01 = "<b>Mission Row Community Police Station</b>";
var governmentLoc02 = "<b>Vespucci Headquarters</b>";
var governmentLoc03 = "<b>Twin Towers Correctional Facility</b>";
var governmentLoc04 = "<b>LSPD Impound Lot</b>";
var governmentLoc05 = "<b>Sandy Shores Sherrif's Station</b>";
var governmentLoc06 = "<b>Rockford Hills Community Police Station</b>";

var fireStation01 = "<b>Station 1 - Paleto Bay Fire Station</b>";
var fireStation03 = "<b>Station 3 - Davis Fire Station</b>";
var fireStation04 = "<b>Station 4 - Sandy Shores Fire Station</b>";
var fireStation05 = "<b>Station 5 - Fort Zancudo Fire Station</b>";
var fireStation06 = "<b>Station 6 - Los Santos International Airport Fire Station</b>";
var fireStation07 = "<b>Station 7 - El Burro Heights Fire Station</b>";

var hospital01 = "<b>The Bay Care Center</b>";
var hospital02 = "<b>Central Los Santos Medical Center</b>";
var hospital03 = "<b>Sandy Shores Medical Center</b>";
var hospital04 = "<b>Saint Fiacre Hospital</b>";
var hospital05 = "<b>Mount Zonah Medical Center</b>";
var hospital06 = "<b>Pillbox Hill Medical Center</b>";

var lifeguard01 = "<b>Vespucci Beach Lifeguard Station</b>";
var lifeguard02 = "<b>Del Perro Beach Lifeguard Station</b>";

// Police Stations and Government Buildings
var governmentLoc = L.layerGroup();
L.marker([-994.5,457.6],{icon: iconGovernmentBuilding}).bindPopup(governmentLoc01,popupOptions).addTo(governmentLoc);
L.marker([-849.7,-1083.8],{icon: iconGovernmentBuilding}).bindPopup(governmentLoc02,popupOptions).addTo(governmentLoc);
L.marker([-375.6,2484.6],{icon: iconPrison}).bindPopup(governmentLoc03,popupOptions).addTo(governmentLoc);
L.marker([-1631.7,418.4],{icon: iconPickup}).bindPopup(governmentLoc04,popupOptions).addTo(governmentLoc);
L.marker([3696.0,1818.0],{icon: iconGovernmentBuilding}).bindPopup(governmentLoc05,popupOptions).addTo(governmentLoc);
L.marker([-131.7,-580.1],{icon: iconGovernmentBuilding}).bindPopup(governmentLoc06,popupOptions).addTo(governmentLoc);

// Fire Stations
var fireStations = L.layerGroup();
L.marker([6141.2,-353.8],{icon: iconFireStation}).bindPopup(fireStation01,popupOptions).addTo(fireStations);
L.marker([-1660.7,214.8],{icon: iconFireStation}).bindPopup(fireStation03,popupOptions).addTo(fireStations);
L.marker([3603.0,1694.3],{icon: iconFireStation}).bindPopup(fireStation04,popupOptions).addTo(fireStations);
L.marker([2831.7,-2085.2],{icon: iconFireStation}).bindPopup(fireStation05,popupOptions).addTo(fireStations);
L.marker([-2371.0,-1044.6],{icon: iconFireStation}).bindPopup(fireStation06,popupOptions).addTo(fireStations);
L.marker([-1486.9,1204.2],{icon: iconFireStation}).bindPopup(fireStation07,popupOptions).addTo(fireStations);

// Hospitals
var hospitals = L.layerGroup();
L.marker([6363.7,-246.7],{icon: iconHospital}).bindPopup(hospital01,popupOptions).addTo(hospitals);
L.marker([-1418.3,356.5],{icon: iconHospital}).bindPopup(hospital02,popupOptions).addTo(hospitals);
L.marker([3718.9,1851.2],{icon: iconHospital}).bindPopup(hospital03,popupOptions).addTo(hospitals);
L.marker([-1552.4,1136.3],{icon: iconHospital}).bindPopup(hospital04,popupOptions).addTo(hospitals);
L.marker([-319.2,-491.1],{icon: iconHospital}).bindPopup(hospital05,popupOptions).addTo(hospitals);
L.marker([-582.9,329.4],{icon: iconHospital}).bindPopup(hospital06,popupOptions).addTo(hospitals);

// Lifeguard Stations
var lifeguards = L.layerGroup();
L.marker([-1787.2,-1180.3],{icon: iconLifeguard}).bindPopup(lifeguard01,popupOptions).addTo(lifeguards);
L.marker([-993.0,-1475.9],{icon: iconLifeguard}).bindPopup(lifeguard02,popupOptions).addTo(lifeguards);

$( document ).ready(function() {


});
