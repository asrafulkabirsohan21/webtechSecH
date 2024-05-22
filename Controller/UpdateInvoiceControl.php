<?php 
    include '../models/Database.php';
    $editinvoice = $_GET['edit'];

    if(isset($_GET['update'])){
        $slno = $_GET['slno'];
        $appointmentid= $_GET['appointmentid'];
        $patientname= $_GET['patientname'];
        $doctorname= $_GET['doctorname'];
        $serial= $_GET['serial'];
        $appointmentdate= $_GET['appointmentdate'];
        $payment=$_GET['payment'];
        $paymenttype= $_GET['paymenttype'];
        $status= $_GET['status'];

        getupdateinvoice($appointmentid,$patientname,$doctorname,$serial,$payment,$appointmentdate,$paymenttype,$status,$slno);
        header("location:../views/Invoice.php");
    }
    $result = getselectinvoice($editinvoice);
 ?>