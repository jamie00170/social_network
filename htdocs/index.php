<link rel="stylesheet" href="../includes/styles.css">
<?php
/**
 * Created by PhpStorm.
 * User: Jamie
 * Date: 28/07/2016
 * Time: 10:55
 */
$page_title = 'The Social Network';
include("../includes/header.html");
?>
<script>
    navigator.geolocation.getCurrentPosition(function(pos) {
        var latitude = pos.coords.latitude;
        var longitude = pos.coords.longitude;
        alert("Your position: " + latitude + ", " + longitude);
    });
</script>

<h1>Welcome to the Site!</h1>


<?php
include("../includes/footer.html");

?>
