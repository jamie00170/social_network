<link rel="stylesheet" href="../includes/styles.css">
<?php
/**
 * Created by PhpStorm.
 * User: Jamie
 * Date: 03/08/2016
 * Time: 10:58
 */
// For now contains functionality to return all users
// needs to be updated to show users who the current user is following who are active(position update din last 48 hours?)


include ('../includes/header.html');

echo '<h1>Registered Users</h1>';

require("../database_connect.php");

// prepare query string
$q = "SELECT CONCAT(first_name, ', ', last_name) AS name, DATE_FORMAT(registration_date, '%M %d %Y') AS dr FROM users ORDER BY registration_date ASC";
$r = @mysqli_query($dbc, $q);

$num = mysqli_num_rows($r);

if ($num > 0){

    echo "<p> There are currently $num registered users. </p>\n";

    echo ' <table align="center" cellspacing="3" cellpadding="3" width="75%">';
    echo '<tr><td align="left"> <b>Name</b></td><td align="left"> <b>Date Registered</b></td></tr>';

    while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)){
        echo '<tr><td align="left">' . $row['name'] . '</td><td align="left">' . $row['dr'] . '</td></tr>';
    }
    echo "</table>";
    // free up resources
    mysqli_free_result($r);
} else { // error runnig the query
    // Public message:
    echo '<p class="error">There are currently no registered users.</p>';

}
mysqli_close($dbc);

include("../includes/footer.html");

?>
