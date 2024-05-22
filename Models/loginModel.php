<?php
function auth($con, $email, $password)
{
  $sql = "select * from users where email='$email' and password='$password'";
  $res = $con->query($sql);
  $row = mysqli_num_rows($res);

  if ($row == 1) {
    return true;
  } else {
    return false;
  }
}