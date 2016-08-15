<link rel="stylesheet" href="../includes/styles.css">
<?php
/**
 * Created by PhpStorm.
 * User: Jamie
 * Date: 28/07/2016
 * Time: 10:55
 */
$page_title = 'The Social Network';
include("../includes/header.html");

// if user is logged in
// if (isset($_COOKIE['username'))
//      show map
// else
//      show login homepage

if (isset($_COOKIE['username'])) { // display map ?>

    <div id="map" style="width:1365px; height:595px;"> </div>

    <script src="js/jquery-3.1.0.min.js"></script>
    <script>

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

                var marker = new google.maps.Marker({
                    position: myLatLng,
                    map: map,
                    title: 'User Position'
                });
            });
        }

        initMap();

    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDA60VZ6vHOaGaFt1gjTaAH8hMdB_Lv6MY&callback=initMap"
            async defer></script>

<?php } else {
    // display login
    if (isset($_COOKIE["just_registered"])){
        echo "You are now registered! You can now login Below.";
    }
    setcookie("just_registered", "", time()-3600);
    ?>

    <h1>Login</h1>
    <form action="login.php" method="post">
        <p>Username: <input type="text" name="username" size="20" maxlength="30" /> </p>
        <p>Password: <input type="password" name="pass" size="20" maxlength="20" /></p>
        <p><input type="submit" name="submit" value="Login" /> </p>
    </form>

<?php
}

?>


<?php
include("../includes/footer.html");

?>
