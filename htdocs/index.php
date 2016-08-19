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
    <script src="js/map.js"></script>
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
