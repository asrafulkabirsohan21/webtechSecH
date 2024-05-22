<?php
require_once ("../Models/analysis.php");
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// function se()
// {
//     $r = selec();
//     $totalPrice = 0;
//     foreach ($r as $price) {
//         $totalPrice += $price;
//     }
//     return $totalPrice;
// }
function se()
{
    $r = selec();
    $totalPrice = 0;
    foreach ($r as $price) {
        $totalPrice += $price;
    }
    return $totalPrice;
}
$re = se();


// if (isset($_POST['show'])) {
//     $id = $_POST['show'];

//     function se()
//     {
//         $r = selec();
//         $totalPrice = 0;
//         foreach ($r as $price) {
//             $totalPrice += $price;
//         }
//         return $totalPrice;
//     }
//     $re = se();
//     if ($re) {

//         header("location:../Views/analysis.php");

//     }

// }