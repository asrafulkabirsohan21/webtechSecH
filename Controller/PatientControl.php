<?php 
    include '../models/Database.php';
    $result = getPatient();

    if(isset($_POST['add'])){
        header("location:../views/InsertPatientView.php");
    }
?>