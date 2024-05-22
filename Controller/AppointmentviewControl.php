<?php
include '../models/Database.php';

if(isset($_GET['print'])){
  $printerrorInvoice = $_GET['print'];
}

  
if(isset($_POST['add'])){
  header("Location:SelectDoctor.php");
}
if(isset($_POST['makedatetime'])){
  header("Location:AllowDateTime.php");
}
if(isset($_POST['doctorappointment'])){
  header("Location:AppointmentDoctorList.php");
}

$result = getAppointmentview();

?>