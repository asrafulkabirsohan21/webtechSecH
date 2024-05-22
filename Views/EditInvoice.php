<?php 
include '../controllers/UpdateInvoiceControl.php';
?>
<!DOCTYPE html>
 <html>
 <head>
    <title>Document</title>
    <link rel="stylesheet" href="../css/Dashboardstyle.css">
 </head>
 <body>
 <h1>Edit Invoice</h1>
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
                    <br><br>
                </td>
                </tr>
                <tr>
                    <td>
                        <center>
                            <table border="1" id="innertable1">
                            <form method="get">
                            <?php while($r=mysqli_fetch_assoc($result)){?>
                                <tr style="text-align:center;">
                                    <td>
                                        <br>
                                        <label>SLNo</label>
                                        <input type="number" name="slno" id="input" value="<?php echo $r['SLNo'];?>" readonly><br><br>
                                        <label>AppointmentID</label>
                                        <input type="text" name="appointmentid" id="input" value="<?php echo $r['Appointment_ID'];?>" readonly><br><br>
                                        <label>Patient Name</label>
                                        <input type="text" name="patientname" id="input" value="<?php echo $r['Patient_Name'];?>" readonly><br><br>
                                        <label>Doctor Name</label>
                                        <input type="text" name="doctorname" id="input" value="<?php echo $r['Doctor_Name'];?>" readonly><br><br>
                                        <label>Serial</label>
                                        <input type="number" name="serial" id="input" value="<?php echo $r['Serial'];?>" readonly><br><br>
                                        <label>Appoinment Date</label>
                                        <input type="text" name="appointmentdate" id="input" value="<?php echo $r['Appointment_Date'];?>"readonly><br><br>
                                        <label>Appointment Time</label>
                                        <input type="text" name="appointmenttime" id="input" value="<?php echo $r['Appoinment_time']; ?>" readonly><br><br>
                                        <label>Payment</label>
                                        <input type="number" name="payment" id="input" value="<?php echo $r['Payment'];?>"><br><br>
                                        <label>Payment Type</label>
                                        <input type="text" name="paymenttype" id="input" value="<?php echo $r['Payment_Type'];?>"><br><br>
                                        <label>Status</label>
                                        <input type="text" name="status" id="input" value="<?php echo $r['Status'];?>"><br><br>
                                        <?php } ?>
                                        <button name="update" id="button">UPDATE</button><br><br>

                                    </td>
                                </tr>
                                
                                </form>
                            </table><br><br>
                        </center>
                </tr>
        </table></center>
 </body>
 </html>