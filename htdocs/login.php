<?php
/**
 * Created by PhpStorm.
 * User: Jamie
 * Date: 08/08/2016
 * Time: 08:59
 */
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    require("login_functions.php");
    require("../database_connect.php");

    list($check, $data) = check_login($dbc, $_POST['username'], $_POST['pass']);

    if ($check) {
        setcookie('username', $data['username']);
        setcookie('first_name', $data['first_name']);

        // Set user as active ??

        redirect_user('loggedin.php');
    } else {
        $errors = $data;
    }
    mysqli_close($dbc);
}



include("login_page.php");

