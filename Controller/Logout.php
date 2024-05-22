<?php 
    session_start();
    // $_SESSION['logout_time'] = time();
    // $_SESSION['logout_time'] = time();
    session_destroy();
    header("location:../views/Login.php");
?>