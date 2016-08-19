<head>
    <title>Upload a Profile Picture</title>
</head>
<body>
<?php
/**
 * Created by PhpStorm.
 * User: Jamie
 * Date: 19/08/2016
 * Time: 16:09
 */
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_FILES['upload'])) {
        /*
        if ($_FILES['upload']['size'] > $_POST['MAX_FILE_SIZE']){
            echo "File is too big!";
            die();

        } else { // file is within size limit
        */
        // Check if file is of an allowed type
        $allowed = array('image/pjpeg', 'image/jpeg', 'image/JPG');
        if (in_array($_FILES['upload']['type'], $allowed)) {
            // Copy the file to its new location on the server

            $filename = $_POST['username'] . ".jpg";
            if (move_uploaded_file($_FILES['upload']['tmp_name'], "../uploads/{$filename}")) {
                echo '<p><em>The file has been uploaded</em> </p>';
            }

        } else {
            echo "Invalid file type given, please upload a JPEG image.";
        }
    }


    if ($_FILES['upload']['error'] > 0) {
        echo '<p> class="error"> The file could not be uploaded because: <strong>';

        switch ($_FILES['upload']['error']) {
            case 1:
                print 'The file exceeds the upload_max_filesize setting in php.ini.';
                break;
            case 2:
                print 'The file exceeds the MAX_FILE_SIZE setting in the HTML form.';
                break;
            case 3:
                print 'The file was only partially uploaded.';
                break;
            case 4:
                print 'No file was uploaded.';
                break;
            case 6:
                print 'No temporary folder was available.';
                break;
            case 7:
                print 'Unable to write to the disk.';
                break;
            case 8:
                print 'File upload stopped.';
                break;
            default:
                print 'A system error occurred.';
                break;
        }
        echo '</strong></p>';

    }

    // Delete the temporary file if it still exists
    if (file_exists($_FILES['upload']['tmp_name']) && is_file($_FILES['upload']['tmp_name'])) {
        unlink($_FILES['upload']['tmp_name']);
    }
}

?>
</body>