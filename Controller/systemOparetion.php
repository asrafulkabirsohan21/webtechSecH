<?php
require_once ("../Models/system.php");
require_once ("../Models/db.php");
// function systemselect()
// {
//     $rs = admindata();
//     return $rs;

// }
// systemselect();

if (!function_exists('systemselect')) {
    function systemselect()
    {
        $r = admindata();
        if ($r) {
            return $r;
        }
        return null; // Explicitly return null if $r is false
    }
}

if (isset($_POST['change'])) {
    $id = $_POST['change'];
    $roleField = "role_" . $id;
    if (isset($_POST[$roleField])) {
        $role = $_POST[$roleField];

        $r = change($id, $role);

        if ($r) {

            header("location:../Views/system.php");
            exit;
        } else {
            echo "Update failed: " . mysqli_error(conn());
        }
    }
}

if (isset($_POST['delete'])) {
    $id = $_POST['delete'];
    $r = deletesysystem($id);
    if ($r) {
        header("location:../Views/system.php");
    }

}
if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $role = $_POST['role'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $rs = createAgent($id, $role, $name, $email, $password);

    if ($rs) {
        header("location:../Views/system.php");
    }

}