<?php

require_once ("../Models/booking.php");



if (isset($_POST['confirm-btn'])) {
    $id = $_POST['confirm-btn'];
    $re = confirm($id);
    if ($re) {

        header("location:../Views/bookingView.php");

    }

}

if (isset($_POST['cancel-btn'])) {
    $id = $_POST['cancel-btn'];
    $r = deletes($id);
    if ($r) {

        header("location:../Views/bookingView.php");

    }

}


if (isset($_POST['delete'])) {
    $id = $_POST['delete'];
    $r = deletesbooking($id);
    if ($r) {

        header("location:../Views/bookingView.php");

    }

}
