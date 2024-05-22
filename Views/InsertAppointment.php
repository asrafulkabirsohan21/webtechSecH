<?php 
include '../controllers/InsertAppointmentValidation.php';
$con = getconection();
$sql = "SELECT COUNT(AppoinmentID) as appointmentCount FROM appointment;";
$result = mysqli_query($con, $sql);

$count = mysqli_fetch_assoc($result);
$Id = $count['appointmentCount'] + 1;
$appoint = "A-$Id";
?>

<!DOCTYPE HTML>
<html>
  <head>
    <title>
      Appointment Register
    </title>
    <link rel="stylesheet" href="../css/Dashboardstyle.css">
  </head>
  <body>
    <form method="get">
    <h1>Appointment Register</h1>
          <ul>
              <li><a href="Dashboard.php" class="navbar">Dashboard</a></li>
              <li><a href="PatientList.php" class="navbar">Patient</a></li>
              <li><a href="AppointmentView.php" class="navbar">Appointment</a></li>
              <li><a href="InvoiceDashboard.php" class="navbar">Transaction</a><br> <br></li>
              <a href="../controllers/Logout.php" id="logout">Logout</a>
            </ul>
      <center><table border="1" id="outertable">
        <tr id="outertr1">
        <td></td>

        </tr>
        <tr>
          <td>
            <center>
              <table border="1" id="innertable1">
                <tr style="text-align:center;">
                  <td><br><br>
                    <label for="">Appointment_ID:</label> 
                    <input type="text" name="appointmentId" id="input" value="<?php echo $appoint; ?>" readonly><br>
                    <?php if(empty($_GET['appointmentId'])){?>
                    <span style="color:red;"><?php echo $apnmnt_IDError;?></span><br><br>
                    <?php } ?>
                    <label for="">Patient Name:</label> 
                    <input type="text" name="patientname" id="input"><br>
                    <?php if(empty($_GET['patientname'])){?>
                    <span style="color:red;"><?php echo $patnt_nameError;?></span><br><br>
                    <?php } ?>
                    
                    <label for="">Department:</label> 
                    <?php $sql5="select Department from allowed_date_time where Doctor_name='$doctor_name'";
                    $resultdep=mysqli_query($con,$sql5);
                    $r=mysqli_fetch_assoc($resultdep);
                    if($resultdep->num_rows > 0){
                      $department = $r['Department'];
                    }
                    ?>
                    <input type="text" name="department" id="input" value="<?php echo $department;?>" readonly><br>
                    <?php if(empty($_GET['department'])){?>
                    <span style="color:red;"><?php echo $deprtmntError;?></span><br><br>
                    <?php } ?>

                    <label for="">Doctor:</label>  
                    <input type="text" name="doctor" id="input" value="<?php echo $doctor_name;?>"readonly><br>
                    <?php if(empty($_GET['doctor'])){?>
                    <span style="color:red;"><?php echo $dctr_nameError;?></span><br><br>
                    <?php } ?>

                    <label for="">serial:</label> 
                     <input type="number" name="serial" id="input" id="" ><br>
                     <?php if(empty($_GET['serial'])){?>
                     <span style="color:red;"><?php echo $srlError;?></span><br><br>
                     <?php } ?>
                    
                     <!-- <label for=""></label> -->
                     <select name="day"><br><br>
                      <option value="">Select_day</option>
                      <?php
                        $sql6="select DISTINCT Available_Day from doctor where Doctor_name='$doctor_name'";
                        $res = mysqli_query($con,$sql6);
                        while($r=mysqli_fetch_assoc($res)){ //  option multiple value from database?>
                          <option value="<?php echo $r['Available_Day'];?>"> <?php echo $r['Available_Day'];?></option>
                        <?php } ?>
                    </select><br><br>
                    
                    <label for=""></label>
                     <select name="time">
                      <option value="">Select_time</option>
                      <?php
                        $sql4="select DISTINCT Time from allowed_date_time where Doctor_name='$doctor_name'";
                        $res = mysqli_query($con,$sql4);
                        while($r=mysqli_fetch_assoc($res)){ //  option multiple value from database ?> 
                          <option value="<?php echo $r['Time'];?>"><?php echo $r['Time'];?></option>
                      <?php } ?>    
                    </select><br>
                     <br><br>
                    <input type="submit" name="register" id="button" value="Save" style="color:blue;" ><br><br>
                  </td>
                </tr>
              </table><br><br>
            </center>

          </td>
        </tr> <br><br><br><br>
      </table></center>
    </form>
    
  </body>
</html>