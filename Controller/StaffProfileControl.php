<?php
session_start();
include '../models/Database.php';
$username = $_SESSION['username'];
// $total_work_Hour=0;
$_SESSION['logout_time'] = time();
$_SESSION['Day_working_hour'] = ($_SESSION['logout_time'] - $_SESSION['login_time'])/3600;
// $_SESSION['Day_working_hour'] = ($_SESSION['login_time'] - $_SESSION['logout_time'])/3600;
$day_work_hour = $_SESSION['Day_working_hour'];
// $total_work_Hour = $day_work_hour + $total_work_Hour;
// $day_work_hour += $_SESSION['Day_working_hour'];
// echo $total_work_Hour;
$result = getUserProfile($username);
?>