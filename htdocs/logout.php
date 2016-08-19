<?php
/**
 * Created by PhpStorm.
 * User: Jamie
 * Date: 08/08/2016
 * Time: 10:19
 */
if (!isset($_COOKIE['username'])) {
    require("login_functions.php");
    redirect_user();
} else {
    // Delete the cookies
    setcookie("username", "", time()-3600);
    setcookie("first_name", "", time()-3600);
}

$page_title = "Logged out";
include ("../includes/header.html");
echo "<h1> Logged Out! </h1>
<p>You are now logged out, {$_COOKIE
['first_name']}!</p>";

include ("../includes/footer.html");
?>