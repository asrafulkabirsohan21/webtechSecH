<?php
session_start();
require_once ('../Models/login.php');
$email = $_POST['email'];
$pass = $_POST['password'];
$r = auth($email, $pass);
$name = ownerName($email, $pass);
// echo $name;
if ($r) {
	$_SESSION["name"] = $name;
	header("location:../Views/home.php");

} else {
	header("location:../Views/login.php");
}
