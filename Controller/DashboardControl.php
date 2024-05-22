<?php 
    // session_start();
    include '../models/Database.php';

    $date = date('Y-m-d');
    
    $username = $_SESSION['username'];
    $total_patientsum = gettotalpatient();
    $total_appcount= gettotalAppointment();
    $avg_patient_per_doctor= getavgpatientperdoctor();
    // $result= scheduleAppointment();

    $result=searchAppointScheduleCurrentdate($date);
    $result1 = getdoctordetails();
    
    if(isset($_POST['button'])){
        if(!empty($_POST['appointmentschedul'])){
            $appdate = $_POST['appointmentschedul'];
            $result = searchAppointSchedule($appdate);
        }
        else{
            echo '<script>alert("Fill the required date!")</script>';
            $result=searchAppointScheduleCurrentdate($date);
        }         
    }

    if(isset($_POST['viewall'])){
        header("location:../views/AppointmentDoctorList.php");
    }

?>