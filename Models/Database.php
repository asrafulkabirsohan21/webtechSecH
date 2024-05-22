<?php
include 'Conection.php';

//staff Login
function getlogin($username,$password){
    $con = getconection();
    $sql="select * from staff where S_Username='$username' and Password='$password'";
    $result = mysqli_query($con,$sql);
    return $result;
}


// Dashboard 

//counting the total patient.
function gettotalpatient(){
        
    $con= getconection();
    $sql = "SELECT SUM(total_count) as total_sum FROM ( SELECT COUNT(*) as total_count FROM patient UNION ALL SELECT COUNT(*) as total_count FROM patientinfo ) as counts;";
    $resultsum = mysqli_query($con,$sql);
    $r=mysqli_fetch_assoc($resultsum);
    $total_patientsum=$r['total_sum'];
    return $total_patientsum;
}

//counting the total appointment.
function gettotalAppointment(){
     
    $con= getconection();
    $sql1 = "SELECT COUNT(*) as toatl_count from appointment;";
    $resultcount = mysqli_query($con,$sql1);
    $r=mysqli_fetch_assoc($resultcount);
    $total_appcount=$r['toatl_count'];
    return $total_appcount;

}

//average patient per doctor.
function getavgpatientperdoctor(){
     
    $con= getconection();
    $sql2="SELECT AVG(total_patients) AS average_patients_per_doctor FROM ( SELECT COUNT(Patient_name) AS total_patients FROM appointment GROUP BY Doctor_name) AS patient_counts;";
    $resultavg=mysqli_query($con,$sql2);
    $r=mysqli_fetch_assoc($resultavg);
    $avg_patient_per_doctor=$r['average_patients_per_doctor'];
    return $avg_patient_per_doctor;
}

//Appointment scheduling
function scheduleAppointment(){
    
    $con= getconection();
    $sql4 = "select * from appointment order by AppoinmentID";
    $result=mysqli_query($con,$sql4);
    return $result;
}
function searchAppointScheduleCurrentdate($date){
    $con = getconection();
    $sql3 = "SELECT * FROM `appointment` WHERE Appoinment_date='$date'";
    $result=mysqli_query($con,$sql3);
    return $result;
}
function searchAppointSchedule($appdate){
    $con = getconection();
    $sql3 = "SELECT * FROM `appointment` WHERE Appoinment_date='$appdate'";
    $result = mysqli_query($con,$sql3);
    return $result;
}


function getPatient(){
    $con = getconection();
    $sql = "select * from patient";
    $result = mysqli_query($con,$sql);
    return $result;
}


function getInsertpatient($patientname,$patientemail,$patientusername,$patientpass,$patientgender,$patientphone,$patientaddress){
    $con = getconection();
    $sql = "INSERT INTO `patient`(`Patient_Name`, `Email`, `Username`, `Password`, `Gender`, `Phone`, `Address`) VALUES ('$patientname','$patientemail','$patientusername','$patientpass','$patientgender',$patientphone,'$patientaddress');";
    mysqli_query($con,$sql);
}

//view patient profile
function getPatientProfile($viewid){
    $con = getconection();
    $sql="select * from patient where SLNo='$viewid';";
    $result=mysqli_query($con,$sql);
    return $result;
}

//delete patient from list
function getdeletePatient($delid){
    $con = getconection();
    $sql="delete from patient WHERE SLNo ='$delid';";
    mysqli_query($con,$sql);
}

//update patient 
function getupdatePatient($pname,$pemail,$pusername,$pgender,$pphone,$paddress,$slno){
    $con = getconection();
    $sql1 = "update patient set Patient_Name='$pname', Email='$pemail', Username='$pusername', Gender='$pgender', Phone=$pphone, Address= '$paddress' where SLNo=$slno";
    mysqli_query($con,$sql1);
}

//select update patient
function getselectupdatePatient($patientedit){
    $con = getconection();
    $sql="select * from patient where SLNo=$patientedit";
    $result = mysqli_query($con,$sql);
    return  $result;
}

//view Appointment
function getAppointmentview(){
    $con = getconection();
    $sql = "select * from appointment";
    $result = mysqli_query($con,$sql);
    return $result;
}

function getcheckuniqueID($id){
    
    $con = getconection();
    //check the appointment id is unique or already exist.
    $sql ="SELECT * from appointment where AppoinmentID='$id'";
    $result = mysqli_query($con,$sql);
    return $result;
}

//insert appointment
function getaddAppointment($id,$patient_name,$doctor_name,$department,$Day,$dat,$time,$serial){
    $con = getconection();
    $result = getcheckuniqueID($id);
    if($result->num_rows > 0){
      echo '<script>alert("This appointment id already exist!")</script>';
    }
    else{
      $sql2 = "INSERT INTO appointment(`AppoinmentID`, `Patient_name`, `Doctor_name`, `Department`, `Appointment_day`,`Appoinment_date`,`Appoinment_time`, `Serial`) VALUES ('$id','$patient_name','$doctor_name','$department','$Day','$dat','$time',$serial)";
      mysqli_query($con,$sql2);
      header("Location:../views/AppointmentView.php");
    }
}

//delete appointment
function getdeleteAppointment($delid){
    $con = getconection();
    $sql="delete from appointment WHERE SLNo ='$delid';";
    mysqli_query($con,$sql);
}

//update appointment
function getupdateAppointment($appointmentid,$patientname,$doctorname,$department,$appointmentdate,$serial,$slno){
    $con = getconection();
    $sql="UPDATE `appointment` SET `AppoinmentID`='$appointmentid',`Patient_name`='$patientname',`Doctor_name`='$doctorname',`Department`='  $department',`Appoinment_date`='$appointmentdate',`Serial`=$serial WHERE SLNo=$slno;";
    mysqli_query($con,$sql);
}

//select appointment
function getselectappointment($id){
    $con = getconection();
    $sql="select * from appointment where SLNo='$id'";
    $result=mysqli_query($con,$sql);
    return $result;
}

//insert transaction 
function getinserttransaction($appointmentid,$patient_name,$doctor_name,$serial,$payment,$date,$time,$payment_type,$status){
    $con = getconection();
    //check the appointment id is unique or already exist.
    $sql ="SELECT * from invoice where Appointment_ID='$appointmentid'";
    $result = mysqli_query($con,$sql);
    
    if($result->num_rows > 0){
      header("location:../views/AppointmentView.php?print=This appointment id already exist!");
    }
    else{
      $sql = "INSERT INTO `invoice`(`Appointment_ID`,`Patient_Name`, `Doctor_Name`,`Serial`, `Payment`, `Appointment_Date`,`Appoinment_time`, `Payment_Type`, `Status`) VALUES ('$appointmentid','$patient_name','$doctor_name',$serial,'$payment','$date','$time','$payment_type','$status');";
      mysqli_query($con,$sql);
      header("Location:../views/Invoice.php");
    }
    
}

//view invoice 
function getviewInvoice(){
    $con = getconection();
    $sql = "select * from invoice order by Appointment_ID";
    $result = mysqli_query($con,$sql);
    return $result;
}

//delete invoice
function getdeleteinvoice($sl){
    $con = getconection();
    $sql="delete from invoice WHERE SLNo='$sl'";
    mysqli_query($con,$sql);
}

//search status on invoice
function getsearchstatus($status){
    $con = getconection();
    $sql1 = "select * from invoice where Status = '$status'";
    $result=mysqli_query($con,$sql1);
    return $result;
}

//view Doctor Appointment Date, DAy, Time schedule
function gettimeschedule(){
    $con = getconection();
    $sql = "select * from allowed_date_time order by Doctor_name";
    $result = mysqli_query($con,$sql);
    return $result;
} 

//insert Doctor Appointment Date, DAy, Time schedule
function getinsertTimeschedule($selecttime,$selectdocotor,$department){
    $con = getconection();
    $sql1 = "insert into allowed_date_time (Time,Doctor_name,Department) values ('$selecttime','$selectdocotor','$department')";
    mysqli_query($con,$sql1);
}

//Transition Dashboard
//total payment 
function gettotalpayment(){
    $con = getconection();
    $sql = "select SUM(Payment) as total_sum from invoice where Status = 'Paid'";
    $resultsum = mysqli_query($con,$sql);
    $r=mysqli_fetch_assoc($resultsum);
    $totalpayment = $r['total_sum'];
    return $totalpayment;
}

//total due payment
function gettotalduepayment(){
    $con = getconection();
    $sql1 = "select SUM(Payment) as total_due from invoice where Status = 'Unpaid'";
    $resultdue = mysqli_query($con,$sql1);
    $r=mysqli_fetch_assoc($resultdue);
    if($r > 0){
        $totaldue = $r['total_due'];
    }else{
        $totaldue=0;
    }
    return $totaldue;
}

//count numer of paid payment 
function getcountpaid(){
    $con = getconection();
    $sql2 = "select count(*) as count_paid from invoice where Status = 'Paid'";
    $resultpaid = mysqli_query($con,$sql2);
    $r=mysqli_fetch_assoc($resultpaid);
    if($r > 0){
        $totalpaid = $r['count_paid'];
    }else{
        $totalpaid=0;
    }
    return $totalpaid;
}

//count number of unpaid payment
function getcountunpaid(){
    $con = getconection();
    $sql3 = "select count(*) as count_unpaid from invoice where Status = 'Unpaid'";
    $resultunpaid = mysqli_query($con,$sql3);
    $r=mysqli_fetch_assoc($resultunpaid);
    if($r > 0){
        $totalunpaid = $r['count_unpaid'];
    }else{
        $totalunpaid=0;
    }
    return $totalunpaid;
}

//total specific payment get per doctor
function gettotalspecificpayment($doctorname){
    $con = getconection();
    $sql4 = "select SUM(Payment) as total_specific_payment from invoice where Doctor_Name = '$doctorname' and Status = 'Paid'";
    $result= mysqli_query($con,$sql4);
    $r = mysqli_fetch_assoc($result);
    $total_specific_doctor_payment = $r['total_specific_payment'];
    return $total_specific_doctor_payment;
}

//update invoice list
function getupdateinvoice($appointmentid,$patientname,$doctorname,$serial,$payment,$appointmentdate,$paymenttype,$status,$slno){
    $con = getconection();
    $sql ="UPDATE invoice SET `Appointment_ID`='$appointmentid',`Patient_Name`='$patientname',`Doctor_Name`='$doctorname',`Serial`='$serial',`Payment`='$payment',`Appointment_Date`='$appointmentdate',`Payment_Type`='$paymenttype',`Status`='$status' WHERE SLNo=$slno";
    mysqli_query($con,$sql);
}

//select invoice for update
function getselectinvoice($editinvoice){
    $con = getconection();
    $sql = "select * from invoice where SLNo = $editinvoice;";
    $result=mysqli_query($con,$sql);
    return $result;
}

//view doctor appointment list
function getdoctorappointment(){
    $con = getconection();
    $sql = "SELECT Doctor_name, Department,Fees,Available_Day FROM doctor";
    $result = mysqli_query($con,$sql);
    return $result;
}

//search doctor 
function getsearchdoctor($name){
    $con = getconection();
    $sql = "SELECT Doctor_name, Department,Fees, Available_Day FROM doctor where Doctor_name='$name'";
    $result = mysqli_query($con,$sql);
    return $result;
}

//View staff profile
function getUserProfile($username){
    $con = getconection();
    $sql = "select * from staff where S_Username='$username'";
    $result = mysqli_query($con,$sql);
    return $result;
}

//doctor details
function getdoctordetails(){
    $con = getconection();
    $sql = "select Distinct Doctor_name from doctor";
    $result1 = mysqli_query($con,$sql);
    return $result1;
}

// update staff profile auto
function getupdateStaff($total_working_hour,$total_salary,$username){
    $con = getconection();
    $sql1 = "update staff set Total_working_Hour='$total_working_hour', Total_Salary='$total_salary' where S_Username='$username'";
    mysqli_query($con,$sql1);
}
// function getDoctorprofileList(){
//     $con = getconection();
//     $sql = "select Distinct Doctor_name,Department,Fees,Available_Day from doctor";
//     $result = mysqli_query($con,$sql);
//     return $result;
// }
?>