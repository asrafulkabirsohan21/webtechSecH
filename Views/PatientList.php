<?php 
include '../Controllers/PatientControl.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Patient</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="../JavaScript/Access.js"></script>
    <link rel="stylesheet" href="../css/Dashboardstyle.css">
    <style>
      #button{
        margin-right: 800px; 
      }
    </style>
</head>
<body>
  
  <h3>Patient List</h3>
  <ul>
    <li><a href="Dashboard.php" class="navbar">Dashboard</a></li>
    <li><a href="PatientList.php" class="navbar">Patient</a></li>
    <li><a href="AppointmentView.php" class="navbar">Appointment</a></li>
    <li><a href="InvoiceDashboard.php" class="navbar">Transaction</a><br> <br></li>
    <a href="../controllers/Logout.php" id="logout">Logout</a>
  </ul>
  <form method="post"><center>
  
    <table border="1" id="outertable">
        <tr id="outertr1">
          
        <td>
        <form action="../controllers/InsertPatientControl.php"><button type="submit" name="add" id="button">Register Patient</button> </form>  
        
        </td>
        </tr>
        <tr>
        <td>
          <input type="text" id="search" placeholder="Search Patient....." onclick="Search()">
            
            <center>
              <!-- <button type="submit" name="add">Register Patient</button> -->
                      
              <table border="1" id="innertable">
              <thead>
                <tr>
                  <br><br>
                    <th>Patient_Name</th>
                    <th>Email</th>
                    <th>Username</th>
                    <th>Gender</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Action</th>
                </tr>
      </form>            
                <?php while($r=mysqli_fetch_assoc($result)){ ?>
                  <tbody>
                <tr id="innerdata">
                    <td><?php echo $r['Patient_Name'];?></td>
                    <td><?php echo $r['Email']; ?></td>
                    <td><?php echo $r['Username'];?></td>
                    <td><?php echo $r['Gender']; ?></td>
                    <td><?php echo $r['Phone']; ?></td>
                    <td><?php echo $r['Address'];?></td>

                    <td>
                      <form action="PatientView.php" method="get"><button type="submit" name="view" class="action" value="<?php echo $r["SLNo"] ; ?>">View</button></form>
                      <form method="get" action="EditPatient.php"><button type="submit" name="edit" class="action" value="<?php echo $r['SLNo'] ; ?>">Edit</button> </form>
                      <form action="../controllers/DeletePatient.php" method="get"><button type="submit" name="delete" class="delete" value="<?php echo $r["SLNo"] ; ?>">Delete</button> </form>
                    </td>
                    
                </tr>
                <?php } ?>
              </table><br><br>
            </center>

          </td>
        </tr> <br><br><br><br>

        </tr>
        </tbody>
        </thead>
    </table></center>
</body>
</html>