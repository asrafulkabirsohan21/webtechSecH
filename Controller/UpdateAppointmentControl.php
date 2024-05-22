<?php 
include '../models/Database.php';

$id =$_GET['edit'];
$result=getselectappointment($id);
if(isset($_GET['update'])){
    $slno = $_GET['slno'];
    $appointmentid=$_GET['appointmentid'];
    $patientname=$_GET['patientname'];
    $doctorname=$_GET['doctorname'];
    $department=$_GET['department'];
    $appointmentdate=$_GET['appointmentdate'];
    $serial=$_GET['serial'];

    getupdateAppointment($appointmentid,$patientname,$doctorname,$department,$appointmentdate,$serial,$slno);
    header("location:../views/AppointmentView.php");
}
?>