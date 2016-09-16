<?php
/**
 * Created by PhpStorm.
 * User: Jamie
 * Date: 16/09/2016
 * Time: 10:36
 */
require("../database_connect.php");

if (!empty($_POST['username'])){

    // run query to get id for user to follow
    $username_to_follow = $_POST['username'];
    $current_user_username = $_COOKIE['username'];

    $q = "SELECT user_id FROM users WHERE username='$username_to_follow'";

    $r = @mysqli_query($dbc, $q);
    $row = @mysqli_fetch_array($r, MYSQLI_ASSOC);

    $user_id_to_follow = $row['user_id'];

    // then using COOKIE['username'] get current users id
    $q = "SELECT user_id FROM users WHERE username='$current_user_username'";

    $r = @mysqli_query($dbc, $q);
    $row = @mysqli_fetch_array($r, MYSQLI_ASSOC);

    $current_user_user_id = $row['user_id'];

    $q = "INSERT INTO following (user_id, follower_id, stamp) VALUES ('$current_user_user_id', '$user_id_to_follow', CURRENT_TIMESTAMP )";
    $r = @mysqli_query($dbc, $q);



    echo "You are now following: " . $username_to_follow;



}
