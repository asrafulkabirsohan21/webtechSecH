<?php
$id = $_GET['addpayment'];
if(isset($_GET['addpayment'])){
    header("location:../views/InsertInvoiceView.php?addpayment=$id");
}

?>