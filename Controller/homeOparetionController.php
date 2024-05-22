<?php
session_start();
// require_once ("../Models/home.php");
// require_once ("../Models/db.php");

if (isset($_POST['view'])) {
    $name = $_POST['view'];
    include ("../Models/db.php");
    require_once ("../Models/home.php");
    $res = view($name);
    $_SESSION['bookings'] = $res;

    if ($_SESSION['bookings']) {
        header("Location: ../Views/home.php");
    }

    // $bookings = $_SESSION['bookings'] = $res;
    // foreach ($bookings as $booking) {
    //     echo "Booking Type: " . ($booking['bookingtype']) . "<br>";
    //     echo "Details: " . $booking['details'] . "<br>";
    //     echo "Date: " . $booking['date'] . "<br><br>";
    // }
    // unset($_SESSION['bookings']);

    // Optionally, redirect to a view page if needed
    // header("Location: ../Views/home.php");
    // exit();
}


