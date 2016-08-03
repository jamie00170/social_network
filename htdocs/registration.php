<?php
include("../includes/header.html");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link rel="stylesheet" href="../includes/styles.css">
</head>
<body>
    <h1>Register for the Site!</h1>

    <form method="post" action="registration.php">
        <fieldset>
            first name: <input type="text" name="first_name"> <br>
            last name: <input type="text" name="last_name"> <br>
            email: <input type="text" name="email"> <br>
            password: <input type="password" name="pass1" > <br>
            confirm password: <input type="password" name="pass1" > <br>
            <input type="submit" name="submit" value="Submit">
        </fieldset>
    </form>

</body>
</html>

<?php
if (isset($_POST['first_name']) && isset($_POST['last_name'])) {
    echo "The first name entered was: " . $_POST['first_name'];
    echo "The last name entered was: " . $_POST['last_name'];
}
require("../database_connect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $errors = array();

    if (empty($_POST["first_name"])){
        $errors[] = "You forgot to enter your first name.";
    } else {
        // trim - Strip whitespace (or other characters) from the beginning and end of a string
        $fn = trim($_POST['first_name']);
    }

    if (empty($_POST['last_name'])) {
        $errors[ ] = 'You forgot to enter your last name.';
    } else {
        $ln = trim($_POST['last_name']);
    }
    if (empty($_POST['email'])) {
        $errors[ ] = 'You forgot to enter your email address.';
    } else {
        $e = trim($_POST['email']);
    }

    if (!empty($_POST['pass1'])) {
        if ($_POST['pass1'] != $_POST['pass2']) {
            $errors[ ] = 'Your password did not match the confirmed password.';
        } else {
            $p = trim($_POST['pass1']);
        }
    } else {
        $errors[ ] = 'You forgot to enter your password.';
    }

    if (empty ($errors)){

        // register the user in the database
    }

}




?>