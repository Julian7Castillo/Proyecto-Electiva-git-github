function init()
{
	
}

// Obtener el parametro de la URL enviado por el function ver(), en este caso, capturar
// el ID que es enviado desde que se oprime el button ver de la tabla de MntRuta
var getUrlParameter = function getUrlParameter(sParam) {
    var sPageURL = decodeURIComponent(window.location.search.substring(1)),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : sParameterName[1];
        }
    }
};

function listDetail(id_ruta) {
    $.post("../../controller/rutaController.php?op=mostrar", { id_ruta: id_ruta }, function (data) {
        data = JSON.parse(data);
        // Check if the data is valid and contains route coordinates
        if (data && data.latitud && data.longitud) {
        	$('#lblnomidruta').html('Detalle Ruta - ' + data.id_ruta);
        	$('#sector_ruta').val(data.sector);
        	$('#descripcion_ruta').val(data.descripcion);
        	$('#latitud_ruta').val(data.latitud);
        	$('#longitud_ruta').val(data.longitud);
            // Initialize the map
			var map = L.map('map').setView([0, 0], 2);

  			// Add a tile layer (OpenStreetMap)
  			L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    			attribution: '© OpenStreetMap contributors'
  			}).addTo(map);

  			// Get the current location
  			if (navigator.geolocation) {
    			navigator.geolocation.getCurrentPosition(function (position) {
	      			var currentLat = position.coords.latitude;
	      			var currentLng = position.coords.longitude;
	
	      			// Set the map view to the current location
	      			map.setView([currentLat, currentLng], 15);
	
	      			// Add a marker at the current location
	      				L.marker([currentLat, currentLng]).addTo(map)
	        .				bindPopup('Current Location')
	        				.openPopup();
	
				    // Use Mapbox Directions API for routing
				    L.Routing.control({
					    waypoints: [
					    	L.latLng(currentLat, currentLng), // Current location
					        L.latLng(data.latitud, data.longitud) // Chiquinquirá coordinates
					    ],
					    routeWhileDragging: true,
					    	router: L.Routing.mapbox('<YOUR_MAPBOX_API_KEY>')
				    }).addTo(map);
    			});
		    } else {
		    	alert("Geolocation is not supported by this browser.");
		    }
		}
	});
}

document.addEventListener("DOMContentLoaded", function () {
    // Call listDetail with the desired id_ruta
    var id_ruta = getUrlParameter('ID');
    listDetail(id_ruta);
});

init();