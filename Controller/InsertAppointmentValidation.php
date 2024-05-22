<?php
  include '../models/Database.php';
  $con = getconection();

  
  
  $Serial = $apnmnt_ID = $patnt_name = $dctr_name = $deprtmnt = $dte = $srl=$time = ""; 
  $SerialError = $apnmnt_IDError = $patnt_nameError = $dctr_nameError = $deprtmntError = $dteError = $srlError=$timeError = "";


  if(isset($_GET['register'])){
    if(empty($_GET['appointmentid'])){
      $apnmnt_IDError = "Appointment Id is required";
    }else{
      $apnmnt_ID =$_GET["appointmentid"];
    }
    if(empty($_GET['patientname'])){
      $patnt_nameError = "Patient Name is required";
    }else{
      $patnt_name =$_GET["patientname"];
    }
    if(empty($_GET['doctor'])){
      $dctr_nameError = "Doctor Name is required";
    }else{
      $doctor_name = $_GET['doctor'];
    }
    if(empty($_GET['department'])){
      $deprtmntError = "Department is required";
    }else{
      $deprtmnt = $_GET["department"];
    }
    if(empty($_GET['day'])){
      $dteError = "Day is required";
    }else{
      $dte = $_GET["day"];
    }
    if(empty($_GET['serial'])){
      $srlError = "Serial is required";
    }else{
      $srl = $_GET["serial"];
    }
    if(empty($_GET['time'])){
     $timeError = "Time is required";
   }else{
     $time = $_GET["time"];
   }


    // Insertion
    if( !empty($_GET['appointmentId']) && !empty($_GET['patientname']) && !empty($_GET['doctor']) && !empty($_GET['department']) && !empty($_GET['day']) && !empty($_GET['serial'])){
     $id=$_GET['appointmentId'];
     $patient_name=$_GET['patientname'];
     $doctor_name=$_GET['doctor'];
     $department=$_GET['department'];
     $Day=$_GET['day'];
     $serial=$_GET['serial'];
     $time = $_GET['time'];

     $date = strtotime($Day,time());
     $dat = date('Y-m-d',$date);

     getaddAppointment($id,$patient_name,$doctor_name,$department,$Day,$dat,$time,$serial);

     header("Location:../views/AppointmentView.php");

     
   }
 }

 // Get the doctorname from select docotor form url...
 if(isset($_GET['doctorname'])){
   $doctor_name=$_GET['doctorname'];
 }
?>
