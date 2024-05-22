<?php
require_once ("../Models/db.php");
$con = conn();
$sql = "select * from booking";
$res = mysqli_query($con, $sql);

$confirmBookingSql = "select * from confirmbooking";
$confirmBookingRes = mysqli_query($con, $confirmBookingSql);
function confirm($id)
{
    $con = conn();
    $sql = "select * from booking where id=$id";
    $res = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($res);
    // $id = $res["id"];
    $name = $row["name"];
    $bookingtype = $row["bookingtype"];
    $details = $row["details"];
    $date = $row["date"];
    $price = $row["price"];
    $insertQuery = "insert into confirmbooking  (id, name, bookingtype	, details,date,price) VALUES ('$id', '$name', '$bookingtype', '$details','$date','$price')";
    $insertResult = mysqli_query($con, $insertQuery);
    $deleteId = $id;
    $deleteQuery = "DELETE FROM booking WHERE id=$deleteId";
    $deleteResult = mysqli_query($con, $deleteQuery);
    if ($insertResult && $deleteResult) {
        return true;
    }

}

function deletes($id)
{
    $con = conn();
    $sql = "select * from booking";
    $sql2 = "select * from confirmbooking where id=$id";
    $res = mysqli_query($con, $sql2);
    $row = mysqli_fetch_assoc($res);
    // $id = $res["id"];
    $name = $row["name"];
    $bookingtype = $row["bookingtype"];
    $details = $row["details"];
    $date = $row["date"];
    $price = $row["price"];
    $insertQuery = "insert into booking(id, name, bookingtype, details,date,price) VALUES ('$id', '$name', '$bookingtype', '$details','$date','$price')";
    $insertResult = mysqli_query($con, $insertQuery);
    $deleteId = $id;
    $deleteQuery = "DELETE FROM confirmbooking WHERE id=$deleteId";
    $deleteResult = mysqli_query($con, $deleteQuery);
    if ($insertResult && $deleteResult) {
        return true;
    }

}
function deletesbooking($id)
{
    $con = conn();
    $deleteId = $id;
    $deleteQuery = "DELETE FROM booking WHERE id=$deleteId";
    $deleteResult = mysqli_query($con, $deleteQuery);
    if ($deleteResult) {
        return true;
    }

}