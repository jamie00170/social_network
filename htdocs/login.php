<?php
/**
 * Created by PhpStorm.
 * User: Jamie
 * Date: 08/08/2016
 * Time: 08:59
 */

function check_login ($dbc, $username = "", $pass = ""){

    $errors = array();
    if (empty($username)){
        $errors[] = "You forgot to enter your username";
    } else {
        $un = mysqli_real_escape_string($dbc, trim($username));
    }
    if (empty($pass)){
        $errors[] = "You forgot to enter your password";
    } else {
        $p = mysqli_real_escape_string($dbc, trim($pass));
    }


    if (empty($errors)){
        $q = "SELECT username, first_name
              FROM users
              WHERE username = '$un' and pass = SHA1('$p')";

        $r = @mysqli_query($dbc, $q);

        if (mysqli_num_rows($r) == 1){
            $row = mysqli_fetch_array($r, MYSQLI_ASSOC);
            return array(true, $row);
        } else { // not a match
            $errors[] = "The username and password entered do not match any in our system";
        }
    }
    return array(false, $errors);

}


if ($_SERVER['REQUEST_METHOD'] == "POST") {
    require("functions.php");
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

