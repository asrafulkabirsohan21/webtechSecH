<?php
require_once ("../Models/db.php");

function cus()
{
    $con = conn();
    $sql = "select * from customersupport";
    $res = mysqli_query($con, $sql);
    return $res;
}

function inq($id, $reply)
{
    $con = conn();
    $sql = "select * from customersupport where id=$id";
    $inqs = mysqli_query($con, $sql);

    $replyinq = mysqli_fetch_assoc($inqs);
    $re = $replyinq["Reply"];

    if ($re == "") {
        $con = conn();
        $insertQuery = "UPDATE customersupport SET Reply='$reply' WHERE id=$id";
        $insertResult = mysqli_query($con, $insertQuery);
        return $insertResult;
    }

}

function update($id, $reply)
{
    $con = conn();
    $sql = "select * from customersupport where id=$id";
    $inqs = mysqli_query($con, $sql);

    $replyinq = mysqli_fetch_assoc($inqs);
    $re = $replyinq["Reply"];

    if ($re !== "" && $reply !== "") {
        $con = conn();
        $insertQuery = "UPDATE customersupport SET Reply='$reply' WHERE id=$id";
        $insertResult = mysqli_query($con, $insertQuery);
        return $insertResult;
    }

}

function deletereply($id)
{
    $con = conn();
    $deleteId = $id;
    $deleteQuery = "DELETE FROM customersupport WHERE id='$deleteId'";
    $deleteResult = mysqli_query($con, $deleteQuery);
    if ($deleteResult) {
        return true;
    }

}