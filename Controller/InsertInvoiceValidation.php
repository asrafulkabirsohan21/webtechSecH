<?php
include '../models/Database.php';
session_start();
$appointmentid=$patient_name=$doctor_name=$serial=$payment=$date=$payment_type=$status=$time="";
$appointmentidError=$patient_nameError=$doctor_nameError=$serialError=$paymentError=$dateError=$payment_typeError=$statusError=$timeError="";

$id =$_GET['addpayment'];

// $sql="select * from appointment where SLNo='$id'";
$result= getselectappointment($id);
// $res=getpayment($doctor_name);

?>
<?php

    if(isset($_POST['register'])){
      if(empty($_POST['appointmentid'])){
        $appointmentidError = "Appointment Id is required";
      }else{
        $appointmentid = $_POST["appointmentid"];
      }
     if(empty($_POST['patientname'])){
       $patient_nameError = "Patient name is required";
     }else{
       $patient_name = $_POST["patientname"];
     }
     if(empty($_POST['doctorname'])){
       $doctor_nameError = "Doctor Name is required";
     }else{
       $doctor_name = $_POST["doctorname"];
     }
     if(empty($_POST['serial'])){
      $serialError = "Serial is required";
    }else{
      $serial = $_POST["serial"];
    }
     if(empty($_POST['payment'])){
       $paymentError = "Payment is required";
     }else{
       $payment = $_POST['payment'];
     }
     if(empty($_POST['date'])){
       $dateError = "Date is required";
     }else{
       $date = $_POST["date"];
     }
     if(empty($_POST['paymenttype'])){
       $payment_typeError = "Payment type is required";
     }else{
       $payment_type = $_POST["paymenttype"];
     }
     if(empty($_POST['status'])){
       $statusError = "Status is required";
     }else{
       $status = $_POST["status"];
     }
     if(empty($_POST['time'])){
      $timeError = "Time is required";
    }else{
      $time = $_POST["time"];
    }

     if(!empty($_POST['appointmentid']) && !empty($_POST['patientname']) && !empty($_POST['doctorname'])  &&!empty($_POST['serial']) && !empty($_POST['payment']) && !empty($_POST['date']) && !empty($_POST['time']) && !empty($_POST['paymenttype']) && !empty($_POST['status'])){
        $appointmentid = $_POST['appointmentid'];
        $patient_name=$_POST['patientname'];
        $doctor_name=$_POST['doctorname'];
        $serial = $_POST['serial'];
        $payment=$_POST['payment'];
        $date=$_POST['date'];
        $time = $_POST['time'];
        $payment_type=$_POST['paymenttype'];
        $status=$_POST['status'];
        getinserttransaction($appointmentid,$patient_name,$doctor_name,$serial,$payment,$date,$time,$payment_type,$status);
      }
    }

 ?>