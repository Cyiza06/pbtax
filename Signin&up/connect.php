<?php
    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $database = 'pb_tax';

    $conn = mysqli_connect($host,$user,$pass,$database);

    if (!$conn) {
        die('Not connected'.mysqli_connect_error());
    }
?>