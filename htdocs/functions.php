<?php
/**
 * Created by PhpStorm.
 * User: Jamie
 * Date: 23/08/2016
 * Time: 16:38
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