<?php
include '../controllers/UpdateAppointmentControl.php'
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>Edit Appoinment</title>
        <link rel="stylesheet" href="../css/Dashboardstyle.css">
    </head>
    <body>
    <h1>Appoinment View</h1>
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
                <td> <br><br><br></td>
                </tr>
                <tr>
                <td>
                        <center>
                            <table border="1" id="innertable1">
                            <form method="get" action="../controllers/UpdateAppointmentControl.php">
                            <?php while($r=mysqli_fetch_assoc($result)){?>
                                <tr>
                                    <td>
                                    <br><br>
                                        <label>SLNo:</label>
                                        <input type="number" name="slno" value="<?php echo $r['SLNo'];?>" readonly><br><br>
                                       
                                        <label>AppointmentID:</label>
                                        <input type="text" name="appointmentid" value="<?php echo $r['AppoinmentID'];?>" readonly><br><br>
                                        <label>Patient Name:</label>
                                        <input type="text" name="patientname" value="<?php echo $r['Patient_name'];?>"><br><br>
                                        <label>Doctor Name:</label>
                                        <input type="text" name="doctorname" value="<?php echo $r['Doctor_name'];?>"><br><br>
                                        <label>Department:</label>
                                        <input type="text" name="department" value="<?php echo $r['Department'];?>"><br><br>
                                        <label>Appoinment Date:</label>
                                        <input type="text" name="appointmentdate" value="<?php echo $r['Appoinment_date'];?>" readonly><br><br>
                                        <label>serial:</label>
                                        <input type="number" name="serial" value="<?php echo $r['Serial'];?>"><br><br>
                                        <button name="update" id="button">UPDATE</button><br><br>
                                        <?php } ?>

                                        

                                    </td>
                                    
                                </tr>
                                
                                </form>
                            </table><br><br>
                        </center>
                </tr>
        </table></center>
    </body>
</html>
