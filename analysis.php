<?php
require_once ("../Models/db.php");

function selec()
{
    $con = conn();
    $sql = "select * from confirmbooking";
    $res = mysqli_query($con, $sql);
    $price = [];
    while ($r = mysqli_fetch_assoc($res)) {
        $price[] = $r['price'];
    }
    return $price;
}

