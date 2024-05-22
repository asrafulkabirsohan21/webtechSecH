<?php
  session_start();
  include '../models/Database.php';
  $viewid=$_GET['view'];
  $result = getPatientProfile($viewid)

?>  