<?php
include '../controllers/UpdatePatientControl.php';
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>Update Patient</title>
        <link rel="stylesheet" href="../css/StaffProfilestyle.css">
    </head>
    <body>
        <center>
            <table border="1" id="outertable">
                <tr id="outertr1">
                <td id="outertd"><a href="../controllers/Logout.php">Logout</a></td>
                </tr>
                <tr id="outertr2">
                    <td><h1>UPDATE Patient</h1><br>
                        <ul>
                            <li><a href="Dashboard.php" class="navbar">Dashboard</a></li>
                            <li><a href="PatientList.php" class="navbar">Patient</a></li>
                            <li><a href="AppointmentView.php" class="navbar">Appointment</a></li>
                            <li><a href="InvoiceDashboard.php" class="navbar">Transaction</a><br> <br></li>
                        </ul>
                        <center>
                            <table border="1" id="innertable">
                            <form method="get" action="../controllers/UpdatePatientControl.php">
                            <?php while($r=mysqli_fetch_assoc($result)){?>
                                <tr id="innerrow">
                                    <td id="innerdata">
                                        <br>
                                        <img src='<?php echo $r["Patient_image"] ?>' style="width: 80px;"> <br>
                                        <br>
                                        <label>SLNo:</label>
                                        <input type="number" name="slno" value="<?php echo $r['SLNo'];?>" readonly><br><br>
                                        <label>Name</label>
                                        <input type="text" name="name" value="<?php echo $r['Patient_Name'];?>"><br><br>
                                        <label>Email</label>
                                        <input type="text" name="email" value="<?php echo $r['Email'];?>"><br><br>
                                        <label>Username</label>
                                        <input type="text" name="username" value="<?php echo $r['Username'];?>"><br><br>
                                        <label>Gender</label>
                                        <input type="text" name="gender" value="<?php echo $r['Gender'];?>"><br><br>
                                        <label>Phone</label>
                                        <input type="number" name="phone" value="<?php echo $r['Phone'];?>"><br><br>
                                        <label>Address</label>
                                        <input type="textarea" name="address" value="<?php echo $r['Address'];?>"><br><br>
                                        <?php } ?>
                                        <button name="update">UPDATE</button>

                                    </td>
                                </tr>
                                
                                
                                </form>
                            </table><br>
                            
                        </center>
                </tr>
        </table></center>
    </body>
</html>