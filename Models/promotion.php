<?php
require_once ("../Models/db.php");

function selec()
{
    $con = conn();
    $sql = "select * from promotion";
    $res = mysqli_query($con, $sql);
    return $res;
}



function inserts($code, $discount, $startDate, $endDate, $usageLimit, $services)
{
    $con = conn();
    $insertQuery = "INSERT INTO promotion (code,Discount,startdate,enddate,limits,services) VALUES ('$code', '$discount', '$startDate', '$endDate','$usageLimit','$services')";
    $insertResult = mysqli_query($con, $insertQuery);
    return $insertResult;
}

function deletepromotion($id)
{
    $con = conn();
    $deleteId = $id;
    echo $deleteId;
    $deleteQuery = "DELETE FROM promotion WHERE code='$deleteId'";
    $deleteResult = mysqli_query($con, $deleteQuery);
    if ($deleteResult) {
        return true;
    }

}