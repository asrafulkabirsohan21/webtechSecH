<?php
require_once ("db.php");

function admindata()
{
    $con = conn();
    $sql = "select * from exer";
    $res = mysqli_query($con, $sql);
    return $res;
}


function change($id, $role)
{
    // $con = conn();
    // $sql = "select * from exer where id=$id";
    // $inqs = mysqli_query($con, $sql);
    // $change = mysqli_fetch_assoc($inqs);
    // $re = $change["role"];

    $con = conn();
    $insertQuery = "UPDATE exer SET role='$role' WHERE id='$id'";
    $insertResult = mysqli_query($con, $insertQuery);
    return $insertResult;


}
function deletesysystem($id)
{
    $con = conn();
    $deleteId = $id;
    // echo $deleteId;
    $deleteQuery = "DELETE FROM exer WHERE id='$deleteId'";
    $deleteResult = mysqli_query($con, $deleteQuery);
    if ($deleteResult) {
        return true;
    }

}

function createAgent($id, $role, $name, $email, $password)
{

    $con = conn();
    $insertQuery = "INSERT INTO exer (id,role, name, email, pass) VALUES ('$id','$role', '$name', '$email', '$password')";
    $insertResult = mysqli_query($con, $insertQuery);
    if ($insertResult) {
        return $insertResult;
    } else {
        echo "Error: " . mysqli_error($con);
    }

}
