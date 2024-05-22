<?php
  include '../models/Database.php';
  session_start();
  
 if(isset($_POST['delete'])){
    $sl = $_POST['delete'];
    getdeleteinvoice($sl);
    header("location:../views/Invoice.php");
  }
  
$result = getviewInvoice();

  if(isset($_POST['searchStatus'])){
    if(!empty($_POST['checkstatus'])){
      $status = $_POST['checkstatus'];
      $result = getsearchstatus($status);
    }
    else{
        $result = getviewInvoice();
    }
    
  }
 


?>
