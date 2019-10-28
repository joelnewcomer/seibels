var map;
var marker1;
var infowindow;

// Getting detailed address by lat,lng
function wpgmapSetAddressByLatLng(lat, lng, id) {
    jQuery.getJSON('https://maps.googleapis.com/maps/api/geocode/json?key=' + wp_gmap_api_key + '&latlng=' + lat + ',' + lng + '&sensor=true')
        .done(function (location) {
            document.getElementById('wpgmap_map_address').value = location.results[0].formatted_address;

        });

}

// to render Google Map
function initAutocomplete(id, input, center_lat, center_lng, map_type, zoom) {

    wpgmapSetAddressByLatLng(center_lat, center_lng);
    document.getElementById("wpgmap_latlng").value = center_lat + "," + center_lng;
    // In acse of already initiated
    if (typeof map == 'object') {

        if (map_type === 'ROADMAP') {
            map.setMapTypeId(google.maps.MapTypeId.ROADMAP);
        }
        else if (map_type === 'SATELLITE') {
            map.setMapTypeId(google.maps.MapTypeId.SATELLITE);
        }
        else if (map_type === 'HYBRID') {
            map.setMapTypeId(google.maps.MapTypeId.HYBRID);
        }
        else if (map_type === 'TERRAIN') {
            map.setMapTypeId(google.maps.MapTypeId.TERRAIN);
        }

        map.setCenter({lat: center_lat, lng: center_lng});
        marker1 = new google.maps.Marker({
            position: new google.maps.LatLng(center_lat, center_lng),
            title: "",
            draggable: true,
            animation: google.maps.Animation.DROP
        });
        marker1.setMap(map);
        marker1.addListener('dragend', function (markerLocation) {
            document.getElementById("wpgmap_latlng").value = markerLocation.latLng.lat() + "," + markerLocation.latLng.lng();
            wpgmapSetAddressByLatLng(markerLocation.latLng.lat(), markerLocation.latLng.lng());
        });
        return false;
    }

    var gmap_settings = {
        center: {lat: center_lat, lng: center_lng},
        zoom: zoom,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    if (map_type === 'ROADMAP') {
        gmap_settings.mapTypeId = google.maps.MapTypeId.ROADMAP;
    }
    else if (map_type === 'SATELLITE') {
        gmap_settings.mapTypeId = google.maps.MapTypeId.SATELLITE;
    }
    else if (map_type === 'HYBRID') {
        gmap_settings.mapTypeId = google.maps.MapTypeId.HYBRID;
    }
    else if (map_type === 'TERRAIN') {
        gmap_settings.mapTypeId = google.maps.MapTypeId.TERRAIN;
    }

    map = new google.maps.Map(document.getElementById(id), gmap_settings);
    marker1 = new google.maps.Marker({
        position: new google.maps.LatLng(center_lat, center_lng),
        title: "",
        draggable: true,
        animation: google.maps.Animation.DROP
    });
    marker1.setMap(map);

    // // Create the search box and link it to the UI element.
    var input = document.getElementById(input);
    var searchBox = new google.maps.places.SearchBox(input);
    google.maps.event.addDomListener(window, "load", function () {
        map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
    });

    // Bias the SearchBox results towards current map's viewport.
    map.addListener('bounds_changed', function () {
        searchBox.setBounds(map.getBounds());
    });

    var markers = [];
    // Listen for the event fired when the user selects a prediction and retrieve
    // more details for that place.
    searchBox.addListener('places_changed', function () {
        marker1.setMap(null);
        var places = searchBox.getPlaces();

        if (places.length == 0) {
            return;
        }
        marker1.setMap(null);
        // Clear out the old markers.
        markers.forEach(function (marker) {
            marker.setMap(null);
        });
        markers = [];

        // For each place, get the icon, name and location.
        var bounds = new google.maps.LatLngBounds();
        places.forEach(function (place) {
            if (!place.geometry) {
                console.log("Returned place contains no geometry");
                return;
            }
            // Create a marker for each place.
            markers.push(new google.maps.Marker({
                map: map,
                title: place.name,
                draggable: true,
                position: place.geometry.location
            }));
            marker1.position = place.geometry.location;

            document.getElementById('wpgmap_map_address').value = place.formatted_address;
            document.getElementById("wpgmap_latlng").value = place.geometry.location.lat() + "," + place.geometry.location.lng();

            if (place.geometry.viewport) {
                // Only geocodes have viewport.
                bounds.union(place.geometry.viewport);
            } else {
                bounds.extend(place.geometry.location);
            }
        });
        map.fitBounds(bounds);
        markers[0].addListener('dragend', function (markerLocation) {
            document.getElementById("wpgmap_latlng").value = markerLocation.latLng.lat() + "," + markerLocation.latLng.lng();
            wpgmapSetAddressByLatLng(markerLocation.latLng.lat(), markerLocation.latLng.lng());
        });
    });

}

//===================================================================

function initWpGmap(lat, lng, map_type) {
    initAutocomplete('map', 'pac-input', lat, lng, map_type, parseInt(document.getElementById('wpgmap_map_zoom').value));
}

var tryAPIGeolocation = function () {
    jQuery.post("https://www.googleapis.com/geolocation/v1/geolocate?key=" + wp_gmap_api_key, function (success) {
        initWpGmap(success.location.lat, success.location.lng, 'ROADMAP');
    })
        .fail(function (err) {
            console.log("API Geolocation error! \n\n" + err);
        });
};
var browserGeolocationSuccess = function (position) {
    initWpGmap(position.coords.latitude, position.coords.longitude, 'ROADMAP');
};

var browserGeolocationFail = function (error) {
    switch (error.code) {
        case error.TIMEOUT:
            console.log("Browser geolocation error !\n\nTimeout.");
            initWpGmap(40.73359922990751, -74.02791395625002, 'ROADMAP');
            break;
        case error.PERMISSION_DENIED:
            tryAPIGeolocation();
            break;
        case error.POSITION_UNAVAILABLE:
            console.log("Browser geolocation error !\n\nPosition unavailable.");
            initWpGmap(40.73359922990751, -74.02791395625002, 'ROADMAP');
            break;

    }
};

var tryGeolocation = function () {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(
            browserGeolocationSuccess,
            browserGeolocationFail,
            {maximumAge: 50000, timeout: 20000, enableHighAccuracy: true});
    } else {
        initWpGmap(40.73359922990751, -74.02791395625002, 'ROADMAP');
    }
};

function openInfoWindow() {
    if (jQuery('#wpgmap_show_infowindow').is(':checked')) {
        initWpGmap(marker1.position.lat(), marker1.position.lng(), 'roadmap');
        var gmap_embed_address = jQuery("#wpgmap_map_address").val();
        infowindow = new google.maps.InfoWindow({
            content: gmap_embed_address
        });
        infowindow.open(map, marker1);
    } else {
        infowindow.close();
    }
}

// ========================Show in marker infowindow Toggle=========================
jQuery('#wpgmap_show_infowindow').click('change', function (element) {
    openInfoWindow();
});

// ========================Zoom level change =========================
jQuery(document.body).find('#wpgmap_map_zoom').on('keyup', function (element) {
    var point = marker1.getPosition(); // Get marker position
    map.panTo(point); // Pan map to that position
    var current_zoom = parseInt(document.getElementById('wpgmap_map_zoom').value);
    setTimeout("map.setZoom(" + current_zoom + ")", 800); // Zoom in after 500 m second
});

// ========================On address field text change=========================
jQuery(document.body).find('#wpgmap_map_address').on('keyup', function (element) {
    infowindow.setContent(jQuery(this).val());
});

// jQuery('#wpgmap_show_heading').click('change', function (element) {
//     if (jQuery('#wpgmap_show_heading').is(':checked')) {
//         jQuery('#wpgmap_heading_preview').css({'display': 'block'}).html(jQuery('#wpgmap_title').val());
//     } else {
//         jQuery('#wpgmap_heading_preview').css({'display': 'none'});
//     }
// });

// ========================On address field text change=========================
jQuery(document.body).find('#wpgmap_title').on('keyup', function (element) {
    // if (jQuery('#wpgmap_show_heading').is(':checked')) {
        jQuery('#wpgmap_heading_preview').css({'display': 'block'}).html(jQuery('#wpgmap_title').val());
    // }
});

// ========================On address field text change=========================
jQuery(document.body).find('#wpgmap_map_type').on('change', function (element) {
    var map_type = jQuery(this).val();
    initWpGmap(marker1.position.lat(), marker1.position.lng(), map_type);
});

tryGeolocation();