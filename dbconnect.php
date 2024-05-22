<?php
    $host = "localhost";
    $user = "root";
    $pass = "";
    $database = "test";
    $con = mysqli_connect($host, $user, $pass, $database);
    $conn = new mysqli($host, $user, $pass, $database);
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }
    return $conn;
?>