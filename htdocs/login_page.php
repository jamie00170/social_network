<link rel="stylesheet" href="../includes/styles.css">
<?php
/**
 * Created by PhpStorm.
 * User: Jamie
 * Date: 08/08/2016
 * Time: 08:02
 */
$page_title = 'Login';
include("../includes/header.html");

if (isset($errors) && !empty($errors)){
    echo "<h1> Error! </h1> <p class='error'>The following error(s) occurred: <br>";
    foreach($errors as $msg){
        echo " - $msg<br> \n";
    }
    echo "</p> <p> Please try again. </p>";
}
?>
<h1>Login</h1>
<form action="login.php" method="post">
    <p>Username: <input type="text" name="username" size="20" maxlength="30" /> </p>
    <p>Password: <input type="password" name="pass" size="20" maxlength="20" /></p>
    <p><input type="submit" name="submit" value="Login" /> </p>
</form>

<?php
include ("../includes/footer.html");
?>
