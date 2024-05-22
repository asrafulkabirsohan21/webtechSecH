<?php 
include '../controllers/DoctorProfileListControl.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Doctor Profile List</title>
</head>
<body>
    <form method="post">
        <center>
            <table border="1" style="width: 700px;">
                <tr>
                    <td style="height: 50px;text-align:right;">
                        <a href="Logout.php">Logout</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h3>Appointment List</h3><br>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
                        <a href="Dashboard.php">Dashboard</a>&nbsp &nbsp &nbsp 
                        <a href="PatientList.php">Patient</a>&nbsp &nbsp &nbsp
                        <a href="AppointmentView.php">Appointment</a> &nbsp &nbsp &nbsp
                        <a href="InvoiceDashboard.php">Transaction</a>&nbsp &nbsp &nbsp<br> <br><br><br>
                        <!-- <a href="Notification.php">Notification</a>&nbsp &nbsp &nbsp
                        <a href="Settings.php">Settings</a>&nbsp &nbsp &nbsp <br><br> -->
                        <h4>Doctor Appoinment List</h4><br>
                        <center>
                            <input type="text" name="searchname">
                            <button type="submit" name="searchbtn">search</button><br><br>
                            <table border="1">
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