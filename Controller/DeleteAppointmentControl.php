<?php 
include '../models/Database.php';
$delid=$_GET['delete'];
if(isset($_GET['delete'])){
    $delid=$_GET['delete'];
    getdeleteAppointment($delid);
    header("location:../views/AppointmentView.php");
}

?>