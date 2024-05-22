<?php
include '../controllers/AppointmentviewControl.php';
?>
<!DOCTYPE HTML>
<html>
  <head>
    <title>Appointment View</title>
    <link rel="stylesheet" href="../css/Dashboardstyle.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="../JavaScript/Access.js"></script>
  </head>
  <body>
    <h3>Appoinment View</h3>
      <ul>
        <li><a href="Dashboard.php" class="navbar">Dashboard</a></li>
        <li><a href="PatientList.php" class="navbar">Patient</a></li>
        <li><a href="AppointmentView.php" class="navbar">Appointment</a></li>
        <li><a href="InvoiceDashboard.php" class="navbar">Transaction</a><br> <br></li>
        <a href="../controllers/Logout.php" id="logout">Logout</a>
      </ul>
      <center>
      <table border="1" id="outertable">
        <tr>
          <td style="display:flex;">
          <form action="SelectDoctor.php"><button name="add" class="contain">Add Appoinment</button></form>
          <form action="../controllers/AllowDateTimeControl.php" method="post"><button name="makedatetime" class="contain">Create Date/Time</button> </form>
          <form action="AppointmentDoctorList.php"><button name="doctorappointment" class="contain">Doctor Appointment</button> </form>  
        </td>
        </tr>
        <tr>
        
          <td>
            <center>
              <input type="text" name="" id="search" placeholder="Search Appointment...." onclick="Search()">
              <table border="1" id="innertable">
                <thead>
                  <tr id="innerdata">
                    <br><br>
                      <th>AppoinmentID</th>
                      <th>Patient_name</th>
                      <th>Doctor_name</th>
                      <th>Department</th>
                      <th>Appoinment_day</th>
                      <th>Appoinment_date</th>
                      <th>Appoinment_time</th>
                      <th>Serial</th>
                      <th>Action</th>
                  </tr>            
                  <?php while($r=mysqli_fetch_assoc($result)){ ?>
                  <tbody>
                  <tr id="innerdata">
                      <td><?php echo $r['AppoinmentID'];?></td>
                      <td><?php echo $r['Patient_name']; ?></td>
                      <td><?php echo $r['Doctor_name'];?></td>
                      <td><?php echo $r['Department']; ?></td>
                      <td><?php echo $r['Appointment_day']; ?></td>
                      <td><?php echo $r['Appoinment_date']; ?></td>
                      <td><?php echo $r['Appoinment_time']; ?></td>
                      <td><?php echo $r['Serial'];?></td>

                      <td>
                        <form  action="EditAppointment.php" method="get"><button type="submit" name="edit" class="action" value="<?php echo $r["SLNo"] ; ?>">Edit</button> </form>
                        <form action="../controllers/DeleteAppointmentControl.php" method="get"><button type="submit" name="delete" class="delete" value="<?php echo $r["SLNo"] ; ?>">Delete</button> </form>
                        <form  action="../controllers/InsertInvoiceControl.php" method="get"><button type="submit" name="addpayment" class="action"  value="<?php echo $r["SLNo"] ; ?>">InsertPayment</button> </form>
                      </td>
                      
                  </tr>
                  <?php } ?>
              </table><br><br>
            </center>

          </td>
        </tr> 
        </tbody>
                  
        </thead>
        <br><br><br><br>
      </table></center>
  </body>
</html>
