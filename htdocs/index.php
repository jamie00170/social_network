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

            navigator.geolocation.getCurrentPosition(function(pos) {
                var latitude = pos.coords.latitude;
                var longitude = pos.coords.longitude;

                var myLatLng = {lat: latitude, lng: longitude};

                // Create a map object and specify the DOM element for display.
                var map = new google.maps.Map(document.getElementById('map'), {
                    center: {lat: latitude, lng: longitude},
                    scrollwheel: false,
                    zoom: 8
                });

                var marker = new google.maps.Marker({
                    position: myLatLng,
                    map: map,
                    title: 'Hello World!'
                });
            });
        }

        initMap();


    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDA60VZ6vHOaGaFt1gjTaAH8hMdB_Lv6MY&callback=initMap"
            async defer></script>

<?php } else {
    // display login
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
