<?php

// require_once ("../Models/home.php");
require_once ("../Models/db.php");
require_once ("../Models/promotion.php");
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
function se()
{
    $r = selec();
    if ($r) {

        return $r;
    }
}
// se();
if (isset($_POST['create'])) {
    $code = $_POST['code'];
    $discount = $_POST['discount'];
    $startDate = $_POST['startDate'];
    $endDate = $_POST['endDate'];
    $usageLimit = $_POST['usageLimit'];
    $services = $_POST['services'];
    $re = inserts($code, $discount, $startDate, $endDate, $usageLimit, $services);
    if ($re) {
        header("Location: ../Views/promotion.php");
    }

}

if (isset($_POST['delete'])) {
    $id = $_POST['delete'];
    $r = deletepromotion($id);
    if ($r) {

        header("location:../Views/promotion.php");

    }

}