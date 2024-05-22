<?php
session_start();
require_once('../Models/model.php');

$username = $_POST['username'];
$password = $_POST['password'];
$result = auth($username, $password);

if ($result) {
    $_SESSION['username'] = $username;
    header("location:../Views/home.php");
} else {
    header("location:../Views/login.php");
}
?>
