

<?php

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
        require("../database_connect.php");

        //build query string
        $q = "INSERT INTO users (first_name, last_name, email, pass, registration_date, status) VALUES ('$fn',
              '$ln', '$e', SHA1('$p'), NOW( ), 'inactive' )";

        // run query
        $r = @mysqli_query ($dbc, $q);
        // if query was successful report to user they are registered
        if ($r) {
            echo '<h1>Thank you!</h1> <p>You are now registered. </p> <br>';
        }else{ // else display error
            echo '<h1>System Error</h1> <p class="error">You could not be registered due to a system error. We apologize for any inconvenience.</p>';
            echo '<p>' . mysqli_error($dbc) . '<br /><br />Query: ' . $q .  '</p>';
        }
        mysqli_close($dbc);
        exit();
    }else { // Report the errors.
        echo '<h1>Error!</h1> <p class="error">The following error(s) occurred:<br />';
        foreach ($errors as $msg) {
            // Print each error.
            echo " - $msg<br />\n";
        }
        echo '</p><p>Please try again.</p><p><br /></p>';
    }

}

?>

<?php
include("../includes/header.html");
?>


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
        <!-- Max length of input fields have to agree with database -->
        First Name: <input type="text" name="first_name" size="15" maxlength="20" value="<?php  if (isset($_POST['first_name'])) echo $_POST['first_name']; ?>"> <br>
        Last Name: <input type="text" name="last_name" size="15" maxlength="40" value="<?php if (isset($_POST['last_name'])) echo $_POST['last_name']; ?>"> <br>
        Email Address: <input type="text" name="email" size="20" maxlength="60" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>"> <br>
        Password: <input type="password" name="pass1" size="10" > <br>
        Confirm Password: <input type="password" name="pass2" size="10"> <br>
        <input type="submit" name="submit" value="Submit">
    </fieldset>
</form>

</body>
</html>

<?php
include("../includes/footer.html");
?>