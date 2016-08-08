<?php
/**
 * Created by PhpStorm.
 * User: Jamie
 * Date: 08/08/2016
 * Time: 08:24
 */
/* This function determines an absolute URL and redirects the user there.
* The function takes one argument: the page to be redirected to.
* The argument defaults to index.php.
*/
function redirect_user ($page = 'index.php'){

    // URL is http:// plus the host name plus the current directory:
    $url = "http://" . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']);

    //Remove any trailing slashes
    $url = rtrim($url, '/\\');

    //Add the page:
    $url .= '/' .$page;

    //Redirect
    header ("Location: $url");
    exit();
}

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
            $errors[] = "The username and password entered do not match those on file";
        }
    }
    return array(false, $errors);

}