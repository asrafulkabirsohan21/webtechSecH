<?php
    include '../models/Database.php';
    // session_start();

    
    //validation
    $date=$time=$doctor=$department="";
    $dateError=$timeError=$doctorError=$departmentError="";

    if(isset($_POST['insert'])){
        // if(empty($_POST['selectdate'])){
        //     $dateError = "Date is required!";
        // }
        // else{
        //     $date = $_POST['selectdate'];
        // }
        if(empty($_POST['selecttime'])){
            $timeError = "Time is required!";
        }
        else{
            $time = $_POST['selecttime'];
        }
        if(empty($_POST['doctorname'])){
            $doctorError = "Doctor name is required!";
        }
        else{
            $doctor = $_POST['doctorname'];
        }
        if(empty($_POST['department'])){
            $departmentError = "Department is required!";
        }
        else{
            $department = $_POST['department'];
        }

        //insertion
        if(!empty($_POST['selecttime']) && !empty($_POST['doctorname']))
        {
            // $selectdate = $_POST['selectdate'];
            $selecttime = $_POST['selecttime'];
            $selectdocotor = $_POST['doctorname'];
            $department = $_POST['department'];

            getinsertTimeschedule($selecttime,$selectdocotor,$department);
            header("location:../views/AllowDateTime.php");
        }

        
    }
    
    //view Doctor Appointment Date, DAy, Time schedule
    $result =  gettimeschedule();
?>