<?php 

function getconection(){

    $servername="localhost";
    $username="root";
    $password="";
    $databasename="cms";
    $con= new mysqli($servername,$username,$password,$databasename);
    return $con;
}
?>