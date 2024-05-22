<?php 
include '../controllers/AppointmentDoctorControl.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Doctor Details</title>
    <link rel="stylesheet" href="../css/Dashboardstyle.css">
</head>
<body>
    <form method="post">
    <h3>Appointment List</h3>
        <ul>
            <li><a href="Dashboard.php" class="navbar">Dashboard</a></li>
            <li><a href="PatientList.php" class="navbar">Patient</a></li>
            <li><a href="AppointmentView.php" class="navbar">Appointment</a></li>
            <li><a href="InvoiceDashboard.php" class="navbar">Transaction</a><br> <br></li>
            <a href="../controllers/Logout.php" id="logout">Logout</a>
        </ul>
        <center>
            <table border="1" id="outertable">
                <tr id="outertr1">
                    <td>
                        
                    </td>
                </tr>
                <tr>
                    <td>
                        <h4>Doctor Details</h4><br>
                        <center>
                            <input type="text" name="searchname">
                            <button type="submit"id="button" name="searchbtn">search</button><br><br>
                            <table border="1" id="innertable">
                                <tr>
                                    <th>Doctor Name</th>
                                    <th>Department</th>
                                    <th>Fees</th>
                                    <th>Available_Day</th>
                                </tr>
                                <?php while($r=mysqli_fetch_assoc($result)){ ?>
                                    <tr>
                                        <td><?php echo $r['Doctor_name'] ?></td>
                                        <td><?php echo $r['Department'] ?></td>
                                        <td><?php echo $r['Fees'] ?></td>
                                        <td><?php echo $r['Available_Day'] ?></td>
                                    </tr>
                                <?php } ?>    
                            </table><br><br>

                        </center>

                    </td>
                </tr>
            </table>
        </center>
    </form>
    
</body>
</html>