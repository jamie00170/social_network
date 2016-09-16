/**
 * Created by Jamie on 19/08/2016.
 */
function initMap() {

    var styleArray = [
        {
            "featureType": "administrative",
            "elementType": "all",
            "stylers": [
                {
                    "visibility": "on"
                },
                {
                    "lightness": 33
                }
            ]
        },
        {
            "featureType": "landscape",
            "elementType": "all",
            "stylers": [
                {
                    "color": "#f2e5d4"
                }
            ]
        },
        {
            "featureType": "poi.park",
            "elementType": "geometry",
            "stylers": [
                {
                    "color": "#c5dac6"
                }
            ]
        },
        {
            "featureType": "poi.park",
            "elementType": "labels",
            "stylers": [
                {
                    "visibility": "on"
                },
                {
                    "lightness": 20
                }
            ]
        },
        {
            "featureType": "road",
            "elementType": "all",
            "stylers": [
                {
                    "lightness": 20
                }
            ]
        },
        {
            "featureType": "road.highway",
            "elementType": "geometry",
            "stylers": [
                {
                    "color": "#c5c6c6"
                }
            ]
        },
        {
            "featureType": "road.arterial",
            "elementType": "geometry",
            "stylers": [
                {
                    "color": "#e4d7c6"
                }
            ]
        },
        {
            "featureType": "road.local",
            "elementType": "geometry",
            "stylers": [
                {
                    "color": "#fbfaf7"
                }
            ]
        },
        {
            "featureType": "water",
            "elementType": "all",
            "stylers": [
                {
                    "visibility": "on"
                },
                {
                    "color": "#acbcc9"
                }
            ]
        }
    ];

    navigator.geolocation.getCurrentPosition(function(pos) {
        var latitude = pos.coords.latitude;
        var longitude = pos.coords.longitude;

        var myLatLng = {lat: latitude, lng: longitude};

        // Create a map object and specify the DOM element for display.
        var map = new google.maps.Map(document.getElementById('map'), {
            center: {lat: latitude, lng: longitude},
            scrollwheel: true,
            zoom: 8,
            styles: styleArray
        });

        // for all users the current user is following set a marker - use AJAX



        var myIcon = {
            url: "../uploads/" + username + ".jpg", // url
            scaledSize: new google.maps.Size(20, 20) // scaled size
            //origin: new google.maps.Point(0,0), // origin
            //anchor: new google.maps.Point(0, 0) // anchor
        };

        var marker = new google.maps.Marker({
            position: myLatLng,
            map: map,
            title: 'User Position',
            icon: myIcon

        });


});
}

initMap();

