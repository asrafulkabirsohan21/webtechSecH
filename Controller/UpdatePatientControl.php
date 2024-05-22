<?php 
include '../models/Database.php';

$patientedit = $_GET['edit'];


if(isset($_GET['update'])){
    $slno = $_GET['slno'];
    $pname = $_GET['name'];
    $pemail = $_GET['email'];
    $pusername = $_GET['username'];
    $pgender = $_GET['gender'];
    $pphone = $_GET['phone'];
    $paddress = $_GET['address'];
    getupdatePatient($pname,$pemail,$pusername,$pgender,$pphone,$paddress,$slno);
    header("location:../views/PatientList.php");

}
$result = getselectupdatePatient($patientedit);


?>