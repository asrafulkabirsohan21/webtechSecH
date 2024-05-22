<?php

require_once ("../Models/db.php");
$con = conn();
$sql = "select * from booking";
$ress = mysqli_query($con, $sql);

function view($name)
{
    // $con = conn();
    // Fetch bookings from both tables
    // $sql = "SELECT * FROM booking WHERE name=?";
    // $stmt = $con->prepare($sql);
    // $stmt->bind_param("s", $name);
    // $stmt->execute();
    // $res = $stmt->get_result();

    $con = conn();
    $sql = "select * from booking where name='$name'";
    $res = mysqli_query($con, $sql);

    $sql1 = "select * from confirmbooking where name='$name'";
    $res1 = mysqli_query($con, $sql1);

    $bookings = [];


    while ($r = mysqli_fetch_assoc($res)) {
        $bookings[] = [
            'name' => $r['name'],
            'bookingtype' => $r['bookingtype'],
            'details' => $r['details'],
            'date' => $r['date']
        ];
    }
    while ($r1 = mysqli_fetch_assoc($res1)) {
        $bookings[] = [
            'name' => $r['name'],
            'bookingtype' => $r1['bookingtype'],
            'details' => $r1['details'],
            'date' => $r1['date']
        ];
    }


    return $bookings;
}