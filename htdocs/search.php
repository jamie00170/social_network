<link rel="stylesheet" href="css/search.css">
<?php
/**
 * Created by PhpStorm.
 * User: Jamie
 * Date: 10/08/2016
 * Time: 17:31
 */

function search_and_display_users($dbc, $q){

    $r = @mysqli_query($dbc, $q);

    while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
        echo '<p>' . $row['first_name'] . " " . $row['last_name'] . '</p>';
        $uname = $row['username'];
        ?>
        <form method="post" action="follow.php" >
            <input type="submit" value="Follow" >
            <input type="hidden" name="username" value="<?php echo $uname; ?>" >
        </form>
        </br>

        <?php
    }
}
?>
<?php

if (!empty($_GET['searchtext'])){

    require("../database_connect.php");

    $search_for = explode(" ", $_GET['searchtext']);

    // If both first name and last name are given
    if (count($search_for) == 2){
        $first_name = $search_for[0];
        $last_name = $search_for[1];

        $q = "SELECT username, first_name, last_name
              FROM users
              WHERE first_name='$first_name'
              AND last_name='$last_name'";
        search_and_display_users($dbc, $q);
    }

    // If one name is given
    if (count($search_for) == 1){
        $given_name = $search_for[0];

        $q = "SELECT username, first_name, last_name FROM users WHERE first_name='$given_name' OR last_name='$given_name'";
        search_and_display_users($dbc, $q);
    }


    // have a form with hidden fields to contain a link to their profile??
    // redirect user

}else {
    echo "no text input";
}

