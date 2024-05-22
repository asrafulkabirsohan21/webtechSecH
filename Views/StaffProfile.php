<?php 
// session_start();
include '../controllers/StaffProfileControl.php';
?>
<!DOCTYPE HTML>
<html>
  <head>
    <title>Profile</title>
    <!-- <link rel="stylesheet" href="../css/StaffProfilestyle.css"> -->
    <link rel="stylesheet" href="../css/staff.css">
  </head>
  <body>
    <td><h3>User Profile</h3> <br>
      <ul>
        <li><a href="Dashboard.php" class="navbar">Dashboard</a></li>
        <li><a href="PatientList.php" class="navbar">Patient</a></li>
        <li><a href="AppointmentView.php" class="navbar">Appointment</a></li>
        <li><a href="InvoiceDashboard.php" class="navbar">Transaction</a><br><br></li>
        <a id="logout" href="../controllers/Logout.php">Logout</a>
      </ul>
      <form method="post">
        <center>
        <table border="1" id="outertable">
          <tr id="outertr2">
            <center>
              <table border="1" id="innertable1">
                <?php 
                        if(isset($_SESSION['Day_working_hour'])){ 
                          $count = $_SESSION['Day_working_hour'];
                          ?>
                <?php while($r=mysqli_fetch_assoc($result)){
                $salary = $count * $r['S_HourlySalary'];
                $total_working_hour = $count + $r['Total_working_Hour'];
                // echo $total_working_hour;
                $total_salary = $salary + $r['Total_Salary'];
                ?>
                <tr id="">
                  <td id="innertabledata"><br><br>
                    <img src='<?php echo $r["S_image"] ?>' style="width: 80px; margin-left: 35px;">
                    <br>
                     <label for="ID">ID:</label>
                      <input type="text" name="id" value="<?php echo $r['S_ID'];?>" readonly><br><br>
                      <label for="Name">Name:</label>
                      <input type="text" name="name" value="<?php echo $r['S_Name'];?>" readonly><br><br>
                      <label for="Gender">Gender:</label>
                      <input type="text" name="gender" value="<?php echo $r['S_Gender'];?>" readonly><br><br>
                      <label for="Phone">Phone:</label>
                      <input type="text" name="phone" value="<?php echo $r['Phone'];?>" readonly><br><br>
                      <label for="Salary">Salary:</label>
                      <input type="number" name="number" value="<?php echo $r['S_HourlySalary'];?>" readonly> <br><br>
                      <label for="Total_working_hour">Total_working_hour:</label>
                      <input type="text" name="total_working_hour" value=<?php echo $r['Total_working_Hour'],"h";?> readonly> <br><br>
                      <label for="Total_working_Salary">Total_working_Salary:</label>
                      <input type="text" name="Total_working_Salary" value=<?php echo "$",$r['Total_Salary'];?> readonly> <br><br>
                      <label for="Daily_Working_hour">Daily_Working_hour:</label>
                      <input type="text" name="work_hour" value="<?php echo $count,"h"?>" readonly><br><br>
                      <label for="Salary">Salary_work_hour:</label>
                      <input type="text" name="" value="<?php echo "$",$salary; ?>" readonly>
                      <br><br>
                      <?php }?>

                      <?php } ?>
                    
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
<?php
getupdateStaff($total_working_hour,$total_salary,$username);
?>

