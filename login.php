<?php
require_once ('db.php');

function auth($email, $pass)
{
  $con = conn();
  $sql = "select * from exer where email='$email' and pass='$pass'";
  $res = mysqli_query($con, $sql);
  $row = mysqli_num_rows($res);
  if ($row == 1) {
    return true;
  } else {
    return false;
  }

}

function ownerName($email, $pass)
{
  $con = conn();
  $sql = "select * from exer where email='$email' and pass='$pass'";
  $res = mysqli_query($con, $sql);
  $row = mysqli_num_rows($res);
  if ($row == 1) {
    $r = mysqli_fetch_assoc($res);
    $name = $r["name"];
    return $name;
  }
}
