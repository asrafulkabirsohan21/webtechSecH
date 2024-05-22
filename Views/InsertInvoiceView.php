<?php 
//include '../models/Conection.php';
include '../controllers/InsertInvoiceValidation.php';

$con = getconection();
?>
<!DOCTYPE HTML>
<html>
  <head>
    <title>Invoice</title>
    <link rel="stylesheet" href="../css/Dashboardstyle.css">
  </head>
    <body>
        <form method="post">
        <h3>Invoice</h3>
            <ul>
              <li><a href="Dashboard.php" class="navbar">Dashboard</a></li>
              <li><a href="PatientList.php" class="navbar">Patient</a></li>
              <li><a href="AppointmentView.php" class="navbar">Appointment</a></li>
              <li><a href="InvoiceDashboard.php" class="navbar">Transaction</a><br> <br></li>
              <a href="../controllers/Logout.php" id="logout">Logout</a>
            </ul>
      <center> <table border="1" id="outertable">
            <tr id="outertr1">
            <td> </td>

            </tr>
            <tr>
            <td>
            <center>
              <table border="1" id="innertable1">
                <tr>
                  <?php while($r=mysqli_fetch_assoc($result)){?>
                    <td><br><br>

                      <label for="Appoinment ID">Appoinment ID:</label>
                      <input type="text" name="appointmentid" value="<?php echo $r['AppoinmentID'];?>" readonly> <br><br><br>
                      
                      <label for="Patient Name">Patient Name:</label>
                      <input type="text" name="patientname" value="<?php echo $r['Patient_name'];?>" readonly><br><br><br>

                      <label for="Doctor Name">Doctor Name:</label>
                      <?php
                      $doctor_name = $r['Doctor_name'];
                      ?>
                      <input type="text" name="doctorname" value="<?php echo $doctor_name;?>" readonly><br><br><br>
                      
                      <label for="Serial">Serial:</label>
                      <input type="number" name="serial" value="<?php echo $r['Serial'];?>" readonly><br><br><br>
                      
                      <label for="Date">Date:</label> 
                      <input type="date" name="date" value="<?php echo $r['Appoinment_date'];?>" readonly><br><br><br>

                      <label for="Time">Time:</label>
                      <input type="text" name="time" value="<?php echo $r['Appoinment_time']; ?>" readonly><br><br><br>

                      <?php }?>
                       
                      <?php 
                        $sql = "select Distinct Fees from doctor where Doctor_name = '$doctor_name'";
                        $res = mysqli_query ($con,$sql);
                        while($row = mysqli_fetch_assoc($res)){ ?>
                      <label for="Payment">Payment:</label>
                        <input type="number" name="payment" value="<?php echo $row['Fees'];?>" readonly> <br><br>
                          <?php } ?>
                          <label for="Payment Type">Payment Type:</label>  
                        <input type="text" name="paymenttype" ><br>
                        <?php if(empty($_POST['paymenttype'])){?>
                        <span style="color:red;"><?php echo $payment_typeError;?></span><br><br>
                        <?php } ?>

                        <label for="Select Sstatus">Select Status:</label><select name="status" id="" >
                          <option value="">Select_Status</option>
                          <option value="Paid">Paid</option>
                          <option value="Unpaid">Unpaid</B></option>
                          <option value="Required">Required</option>
                        </select><br>
                        <?php if(empty($_POST['status'])){?>
                        <span style="color:red;"><?php echo $statusError;?></span><br><br>
                        <?php }?>
                        <button name="register" id="button">Save</button>
                        <!-- <input type="submit" name="register" class="button" value="Save" ><br><br> -->
                        <br>
                    </td>
                    <br>
                </tr>
                <br>
                </table><br><br>
            </center>
            </tr>
        </table>
    </center>
    </form>
    </body>
</html>