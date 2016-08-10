<link rel="stylesheet" href="../includes/styles.css">
<?php
/**
 * Created by PhpStorm.
 * User: Jamie
 * Date: 28/07/2016
 * Time: 11:36
 */
$page_title = 'Profile'; // Change to user's name??
include("../includes/header.html");

if (isset($_COOKIE['username'])) {

    require("../database_connect.php");
    // Query to get user's details
    $un = $_COOKIE['username'];
    $q = "SELECT * FROM users WHERE username = '$un' LIMIT 1";

    $r = @mysqli_query($dbc, $q);

    $row = @mysqli_fetch_array($r, MYSQLI_ASSOC);

    //include profile picture

    echo '<p> Name: ' . $row["first_name"] . ' ' . $row["last_name"] . '</p>';
    echo '<p> Username: ' . $row["username"] . '</p>';

    echo '<p> Following: </p>';
    // have function in following.php to do this


} else {
    echo "You are not logged in!";
}

// if this is not the user's profile:

    //display follow button?

?>



<?php
include("../includes/footer.html");
?>
