<?php 
    session_start();
    include '../models/Database.php';
    
    if(isset($_POST['loginbtn'])){

        if(empty($_POST['username']) && empty($_POST['security'])){
            echo '<script>';
            echo 'var userResponse = confirm("Username and password are required!");';
            echo 'if (userResponse == true) {';
            echo '  alert("You clicked OK!");';
            echo '  window.location.href = "../views/Login.php";';
            echo '} else {';
            echo '  alert("You clicked Cancel!");';
            echo '  window.location.href = "../views/Login.php";';
            echo '}';
            echo '</script>';


        }else if(empty($_POST['username'])){
            echo '<script>';
            echo 'var userResponse = confirm("username is required!");';
            echo 'if (userResponse == true) {';
            echo '  alert("You clicked OK!");';
            echo '  window.location.href = "../views/Login.php";';
            echo '} else {';
            echo '  alert("You clicked Cancel!");';
            echo '  window.location.href = "../views/Login.php";';
            echo '}';
            echo '</script>';
        }else if(empty($_POST['security'])){
            echo '<script>';
            echo 'var userResponse = confirm("Password is required!");';
            echo 'if (userResponse == true) {';
            echo '  alert("You clicked OK!");';
            echo '  window.location.href = "../views/Login.php";';
            echo '} else {';
            echo '  alert("You clicked Cancel!");';
            echo '  window.location.href = "../views/Login.php";';
            echo '}';
            echo '</script>';
        
        }
        else{
            $username = $_POST['username'];
            $password = $_POST['security'];
            $result = getlogin($username,$password);
            
            if($result->num_rows>0){
                while($r=mysqli_fetch_assoc($result)){
                    $_SESSION['username'] = $r['S_Username'];
                    header("location:../views/Dashboard.php");
                }
            }else{
                echo '<script>';
                echo 'var userResponse = confirm("username and password invalid!");';
                echo 'if (userResponse == true) {';
                echo '  alert("You clicked OK!");';
                echo '  window.location.href = "../views/Login.php";';
                echo '} else {';
                echo '  alert("You clicked Cancel!");';
                echo '  window.location.href = "../views/Login.php";';
                echo '}';
                echo '</script>';
            }
            
            }
    
    }
    
?>