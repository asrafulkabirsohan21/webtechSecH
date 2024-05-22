<?php

// require_once ("../Models/home.php");
require_once ("../Models/db.php");
require_once ("../Models/customer.php");
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
function customer()
{
    $r = cus();
    if ($r) {

        return $r;
    }
}



if (isset($_POST['btnid'])) {
    $id = $_POST['btnid'];

    $replyField = "reply_" . $id;
    if (isset($_POST[$replyField])) {
        $reply = $_POST[$replyField];
    }


    $re = inq($id, $reply);
    if ($re) {
        header("Location: ../Views/customersupport.php");
    } else {
        header("Location: ../Views/customersupport.php");
    }

}

if (isset($_POST['delete'])) {
    $id = $_POST['delete'];
    $r = deletereply($id);
    if ($r) {

        header("location:../Views/customersupport.php");

    }

}

if (isset($_POST['update'])) {
    $id = $_POST['update'];

    $replyField = "reply_" . $id;
    if (isset($_POST[$replyField])) {
        $reply = $_POST[$replyField];
    }

    $r = update($id, $reply);
    if ($r) {

        header("location:../Views/customersupport.php");

    } else {
        header("location:../Views/customersupport.php");
    }

}