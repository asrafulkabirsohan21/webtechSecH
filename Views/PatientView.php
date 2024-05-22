<?php 
include '../Controllers/PatientProfileControl.php';
?>
<!DOCTYPE HTML>
<html>
  <head>
    <title></title>
    <link rel="stylesheet" href="../css/PatientViewstyle.css">
  </head>
  <body>
    <form method="get">
    <h3>Patient Profile</h3> <br>
    <ul>
      <li><a href="Dashboard.php" class="navbar">Dashboard</a></li>
      <li><a href="PatientList.php" class="navbar">Patient</a></li>
      <li><a href="AppointmentView.php" class="navbar">Appointment</a></li>
      <li><a href="InvoiceDashboard.php" class="navbar">Transaction</a><br> <br></li>
      <a href="../controllers/Logout.php" id="logout">Logout</a>
    </ul>
      <center>
      <table border="1" id="outertable">
        <tr id="outerrow1">
          <td>
            <center>
              <table border="1" id="innertable">
              <?php while($r=mysqli_fetch_assoc($result)){?>
                <tr>
                  <td><br><br>
                  <img src='<?php echo $r["Patient_image"] ?>' style="width: 80px;">
                  <br>
                    <label for="SLNo">SLNo:</label>
                    <input type="number" name="slno" value=<?php echo $r['SLNo'];?> readonly> <br><br>
                    <label for="Name">Name:</label>
                    <input type="text" name="name" value=<?php echo $r['Patient_Name'];?> readonly> <br><br>
                    <label for="Email">Email:</label>
                    <input type="email" name="email" value=<?php echo $r['Email'];?> readonly> <br><br>
                    <label for="Phone">Phone:</label>
                    <input type="number" name="phone" value=<?php echo $r['Phone'];?> readonly> <br><br>
                    <label for="Address">Address:</label>
                    <input type="text" name="address" value=<?php echo $r['Address'];?> readonly> <br><br>
                    <label for="UserName">UserName:</label>
                    <input type="text" name="username" value=<?php echo $r['Username'];?> readonly> <br><br>
                    <label for="Gender">Gender:</label>
                    <input type="text" name="gender" value=<?php echo $r['Gender'];?> readonly> <br><br>
                  </td>
                </tr>
                <?php }?>
              </table><br><br>
            </center>

          </td>
        </tr> <br><br><br><br>
      </table></center>
    </form>
    
  </body>
</html>
