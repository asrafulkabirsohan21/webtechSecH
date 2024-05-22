<?php
    session_start();
    include '../Models/Database.php';
    // $nameError = $ageError = $emailError = $usernameError = $passwordError = $PhoneError = $genderError = $weightError = $bloodgroupError = $addressError="";

    if(isset($_POST['register'])){
        // $name = $_POST['name'];
        // $email = $_POST['email'];
        // $username = $_POST['username'];
        // $password = $_POST['password'];
        // $Phone = $_POST['phone'];
        // $address = $_POST['address'];
        $patientname=$_POST['name'];
        $patientemail=$_POST['email'];
        $patientusername=$_POST['username'];
        $patientpass=$_POST['password'];
        $patientgender=$_POST['gender'];
        $patientaddress=$_POST['address'];
        $patientphone = $_POST['phone'];

        if(empty($patientname)){
        // $nameError = "Name is Required";
        $_SESSION['nameError'] = "Name is Required";
        }
        if(empty($patientemail)){
        // $emailError = "Email is Required";
        $_SESSION['emailError'] = "Email is Required";
        }
        if(empty($patientusername)){
        // $usernameError = "User Name is Required";
        $_SESSION['usernameError'] = "User Name is Required";
        }
        if(empty($patientpass)){
        // $passwordError = "Password is Required";
        $_SESSION['passwordError'] = "Password is Required";
        }
        if(empty($patientgender)){
        // $genderError = "Gender is Required";
        $_SESSION['genderError'] = "Gender is Required";
        }
        if(empty($patientaddress)){
        // $addressError = "Address is Required";
        $_SESSION['addressError']  = "Address is Required";
        }
        if(empty($patientphone)){
        // $PhoneError = "Phone number is Required";
        $_SESSION['phoneError'] = "Phone number is Required";
        }else{
            if(strlen($patientphone)>11){
                echo '<script>alert("Phone length is not valid!")</script>';
            }
        }

        if( !empty($_POST['name']) && !empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['gender']) && !empty($_POST['address'] && !empty($_POST['phone']))){
            $patientname=$_POST['name'];
            $patientemail=$_POST['email'];
            $patientusername=$_POST['username'];
            $patientpass=$_POST['password'];
            $patientgender=$_POST['gender'];
            $patientaddress=$_POST['address'];
            $patientphone = $_POST['phone'];
            $insert = getInsertpatient($patientname,$patientemail,$patientusername,$patientpass,$patientgender,$patientphone,$patientaddress);
            header("location:../Views/PatientList.php");
        }


    }
?>