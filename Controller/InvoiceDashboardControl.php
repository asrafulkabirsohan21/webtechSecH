<?php 
    session_start();
    include '../models/Database.php';

    //total payment
    $totalpayment = gettotalpayment();

    // Total Due
    $totaldue = gettotalduepayment();

    // number of person paid
    $totalpaid = getcountpaid();

    // number of person unpaid
    $totalunpaid = getcountunpaid();

    //specific docotor payment
    $total_specific_doctor_payment=0;
    if(isset($_POST['searchdoctor'])){
        if(!empty($_POST['doctorname'])){
            $doctorname = $_POST['doctorname'];
            $total_specific_doctor_payment = gettotalspecificpayment($doctorname);
        }else{
            echo '<script>alert("Fill the required Doctor name!")</script>';
        }
        
    }


    if(isset($_POST['transitionlist'])){
        header("location:../views/Invoice.php");
    }
    

    
?>