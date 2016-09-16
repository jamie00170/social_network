<?php
/**
 * Created by PhpStorm.
 * User: Jamie
 * Date: 28/07/2016
 * Time: 11:36
 */
$page_title = 'Profile'; // Change to user's name??
include("../includes/header.html");
require("functions.php");

function display_following($dbc){

    $current_user_id = get_user_id($dbc, $_COOKIE['username']);

    $q = "SELECT * FROM following WHERE user_id='$current_user_id'";
    $r = @mysqli_query($dbc, $q);
    while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
        // for each user the current user is following, return their name/ username?
        $following_user_id = $row['follower_id'];
        $q = "SELECT first_name, last_name FROM users WHERE user_id='$following_user_id'";
        $r = @mysqli_query($dbc, $q);
        $row = mysqli_fetch_array($r, MYSQLI_ASSOC);
        echo '<p>' . '&nbsp &nbsp'  . $row['first_name'] . " " . $row['last_name'] . '</p>';
    }

}


if (isset($_COOKIE['username'])) {

    require("../database_connect.php");
    // Query to get user's details
    $un = $_COOKIE['username'];
    $q = "SELECT * FROM users WHERE username = '$un' LIMIT 1";

    $r = @mysqli_query($dbc, $q);

    $row = @mysqli_fetch_array($r, MYSQLI_ASSOC);

    echo '<p> Name: ' . $row["first_name"] . ' ' . $row["last_name"] . '</p>';
    echo '<p> Username: ' . $row["username"] . '</p>';

    $username = $row['username'];

    //include profile picture
    if (file_exists("../uploads/$username.jpg")){
        // display picture
        echo "<img src='../uploads/$username.jpg' alt='Could not load profile picture' width='200' height='200'>";
    } else {
        //give option to upload one
        ?>
        <form enctype="multipart/form-data" action="upload.php" method="post">
            <!-- <input type="hidden" name="MAX_FILE_SIZE" value="30000" /> -->
            <input type="hidden" name="username" value=<?php echo $username ?> />
            Upload a profile picture: <input type="file" name="upload" />
            <input type="submit" name="submit" value="Confirm" />
        </form>



  <?php  }
    echo '<p> Following: </p>';
        display_following($dbc);


} else {
    echo "You are not logged in!";
}

// if this is not the user's profile:

    //display follow button?

?>



<?php
include("../includes/footer.html");
?>
