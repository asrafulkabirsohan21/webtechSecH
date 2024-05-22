<?php
include '../controllers/InvoiceControl.php';
?>

<!DOCTYPE HTML>
<html>
  <head>
    <title>Invoice</title>
    <link rel="stylesheet" href="../css/Dashboardstyle.css">
  </head>
  <body>
    <form method="post">
    <h1>Invoice</h1>
          <ul>
              <li><a href="Dashboard.php" class="navbar">Dashboard</a></li>
              <li><a href="PatientList.php" class="navbar">Patient</a></li>
              <li><a href="AppointmentView.php" class="navbar">Appointment</a></li>
              <li><a href="InvoiceDashboard.php" class="navbar">Transaction</a><br> <br></li>
              <a href="../controllers/Logout.php" id="logout">Logout</a>
            </ul>
      <center><table border="1" id="outertable">
        <tr id="outertr1">
        <td>
          <br><br>
        </td>

        </tr>
        <tr>
          <td>
            
            <center>
              <select name="checkstatus">
                <option value="">Select Status</option>
                <option value="Paid">Paid</option>
                <option value="Unpaid">Unpaid</option>
              </select>
              <button name="searchStatus" id="button">search</button>
              <br><br>
              <table border="1" id="innertable">
                 <tr>
                    <th>Appointment ID</th>
                    <th>Patient Name</th>
                    <th>Doctor name</th>
                    <th>Appoinment Date</th>
                    <th>Appoinment Time</th>
                    <th>Payment</th>
                    <th>Payment Type</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                                
                  <?php while($r=mysqli_fetch_assoc($result)){ ?>
                  <tr id="innerdata">
                    <td><?php echo $r['Appointment_ID']; ?></td>
                    <td><?php echo $r['Patient_Name'];?></td>
                    <td><?php echo $r['Doctor_Name']; ?></td>
                    <td><?php echo $r['Appointment_Date']; ?></td>
                    <td><?php echo $r['Appoinment_time']; ?></td>
                    <td><?php echo $r['Payment'];?></td>
                    <td><?php echo $r['Payment_Type']; ?></td>
                    <td><?php echo $r['Status'];?></td>
    </form>
                    <td>
                      <form action="EditInvoice.php" method="get"><button type="submit" name="edit" class="action" value="<?php echo $r["SLNo"] ; ?>">Edit</button></form> 
                      <button type="submit" name="delete" class="delete" value="<?php echo $r['SLNo'] ; ?>">Delete</button>
                    </td>
                                  
                  </tr>
                  <?php }?>
              </table><br><br>
            </center>

          </td>
        </tr> <br><br><br><br>
      </table></center>
    
  </body>
</html>