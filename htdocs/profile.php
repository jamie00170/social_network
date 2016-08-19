<link rel="stylesheet" href="../includes/styles.css">
<?php
/**
 * Created by PhpStorm.
 * User: Jamie
 * Date: 28/07/2016
 * Time: 11:36
 */
$page_title = 'Profile'; // Change to user's name??
include("../includes/header.html");

if (isset($_COOKIE['username'])) {

    require("../database_connect.php");
    // Query to get user's details
    $un = $_COOKIE['username'];
    $q = "SELECT * FROM users WHERE username = '$un' LIMIT 1";

    $r = @mysqli_query($dbc, $q);

    $row = @mysqli_fetch_array($r, MYSQLI_ASSOC);

    echo '<p> Name: ' . $row["first_name"] . ' ' . $row["last_name"] . '</p>';
    echo '<p> Username: ' . $row["username"] . '</p>';

    echo '<p> Following: </p>';
    // have function in following.php to do this

    $username = $row['username'];

    //include profile picture
    if (isset($_FILES["$username.jpg"])){
        // display picture
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


} else {
    echo "You are not logged in!";
}

// if this is not the user's profile:

    //display follow button?

?>



<?php
include("../includes/footer.html");
?>
