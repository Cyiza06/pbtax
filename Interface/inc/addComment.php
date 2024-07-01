<?php
    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $database = 'pb_tax';

    $conn = mysqli_connect($host,$user,$pass,$database);

    if (!$conn) {
        die('Not connected'.mysqli_connect_error());
    }
    // end of connection

    if (isset($_POST['send'])) {
        $name = trim(stripslashes($_POST['contactName']));
        $email = trim(stripslashes($_POST['contactEmail']));
        $subject = trim(stripslashes($_POST['contactSubject']));
        $contact_message = trim(stripslashes($_POST['contactMessage']));
    }
?>