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

if (isset($_COOKIE['username'])) { ?>
    <script>
        navigator.geolocation.getCurrentPosition(function(pos) {
            var latitude = pos.coords.latitude;
            var longitude = pos.coords.longitude;
            alert("Your position: " + latitude + ", " + longitude);
        });
    </script>

    // display map

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
