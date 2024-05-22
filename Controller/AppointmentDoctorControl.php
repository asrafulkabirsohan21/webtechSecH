<?php
    include '../models/Database.php';
    // $con = getconection();
    $result = getdoctorappointment();

    if(isset($_POST['searchbtn'])){
        $name= $_POST['searchname'];
        if(!empty($name)){
            $result = getsearchdoctor($name);
        }
        else{
            $result = getdoctorappointment();
    }
}
?>