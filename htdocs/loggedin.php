<link rel="stylesheet" href="../includes/styles.css">
<?php
/**
 * Created by PhpStorm.
 * User: Jamie
 * Date: 08/08/2016
 * Time: 09:48
 */
if (!isset($_COOKIE['username'])){

    require("login_functions.php");
    redirect_user(); // defaults to index
}

$page_title = "Logged In!";
include ('../includes/header.html');

echo "<h1> Loggec In! </h1> <p> Your are now logged in, {$_COOKIE['first_name']} </p>
      <p><a href='logout.php'>Logout</a></p>";

include("../includes/styles.css");
?>
