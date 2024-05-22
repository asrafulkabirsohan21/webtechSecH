<?php
require_once('db.php');

function auth($username, $password) {
    $con = conn();
    $sql = "SELECT * FROM signupdata WHERE username='$username' AND password='$password'";
    $res = mysqli_query($con, $sql);
    $row = mysqli_num_rows($res);
    if ($row == 1) {
        return true;
    } else {
        return false;
    }
}
?>
