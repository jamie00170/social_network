<?php
/**
 * Created by PhpStorm.
 * User: Jamie
 * Date: 16/09/2016
 * Time: 10:36
 */
require("../database_connect.php");
require("functions.php");

if (!empty($_POST['username'])){

    // run query to get id for user to follow
    $username_to_follow = $_POST['username'];
    $current_user_username = $_COOKIE['username'];

    $user_id_to_follow = get_user_id($dbc, $username_to_follow);

    // then using COOKIE['username'] get current users id
    $current_user_user_id = get_user_id($dbc, $current_user_username);

    $q = "INSERT INTO following (user_id, follower_id, stamp) VALUES ('$current_user_user_id', '$user_id_to_follow', CURRENT_TIMESTAMP )";
    $r = @mysqli_query($dbc, $q);



    echo "You are now following: " . $username_to_follow;



}
