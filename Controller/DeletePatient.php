<?php 
include '../models/Database.php';
$delid=$_GET['delete'];
if(isset($_GET['delete'])){
    $delid=$_GET['delete'];
    getdeletePatient($delid);
    header("location:../views/PatientList.php");
}

?>