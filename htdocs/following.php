<link rel="stylesheet" href="../includes/styles.css">
<?php
/**
 * Created by PhpStorm.
 * User: Jamie
 * Date: 04/08/2016
 * Time: 16:26
 */
include ("../includes/header.html");
echo "<h1> Registered Users </h1>";
require("../database_connect.php");
$display = 10; // number of records to be displayed on one page

if (isset($_GET["p"]) && is_numeric($_GET["p"])) {
    $pages = $_GET['p'];
} else { // need to determine the number of users so you know how many pages are needed
    $q = "SELECT COUNT(user_id) FROM users";
    $r = @mysqli_query($dbc, $q);
    $row = @mysqli_fetch_array($r, MYSQLI_NUM);
    $records = $row[0];

    if ($records > $display){
        $pages = ceil($records/$display);
    }else {
        $pages = 1;
    }
}

if (isset($_GET['s']) && is_numeric($_GET['s'])){
    $start = $_GET['s'];
}else {
    $start = 0;
}

$q = "SELECT last_name, first_name, DATE_FORMAT (registration_date, '%M %d, %Y') AS dr, user_id FROM users ORDER BY registration_date ASC LIMIT $start, $display";
$r = @mysqli_query($dbc, $q);

echo ' <table align="center" cellspacing="3" cellpadding="3" width="75%">';
echo '<tr><td align="left"> <b>Name</b></td><td align="left"> <b>Date Registered</b></td></tr>';

$bg = '#eeeeee';
while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
    $bg = ($bg == '#eeeeee' ? '#ffffff' : '#eeeeee');

    echo '<tr bgcolor="' . $bg . '"><td align="left">' . $row['first_name'] . ", " . $row['last_name'] . '</td><td align="left">' . $row['dr'] . '</td></tr>';
}
echo '</table>';
mysqli_free_result($r);
mysqli_close($dbc);

if ($pages > 1) {
    echo '<br> <p>';
    $current_page = ($start / $display) + 1;

    if ($current_page != 1) {
        echo '<a href="following.php?s=' . ($start - $display) . '&p=' . $pages . '">Previous</a> ';
    }

    for ($i = 1; $i <= $pages; $i++) {
        if ($i != $current_page) {
            echo '<a href="following.php?s=' . (($display * ($i - 1))) . '&p=' . $pages . '">' . $i . '</a> ';
        } else {
            echo $i . ' ';
        }
    }

    if ($current_page != $pages) {
        echo '<a href="following.php?s=' . ($start + $display) . '&p=' . $pages . '">Next</a>';
    }
    echo "</p>";
}
