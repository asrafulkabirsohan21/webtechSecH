<?php
include '../controllers/SelectDoctorControl.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Schedule Date</title>
    <link rel="stylesheet" href="../css/Dashboardstyle.css">
</head>
<body>
    <form method="get" action="../controllers/SelectDoctorControl.php">
    <h1>Date </h1>
                        <ul>
                        <li><a href="Dashboard.php" class="navbar">Dashboard</a></li>
                        <li><a href="PatientList.php" class="navbar">Patient</a></li>
                        <li><a href="AppointmentView.php" class="navbar">Appointment</a></li>
                        <li><a href="InvoiceDashboard.php" class="navbar">Transaction</a><br> <br></li>
                        <a href="../controllers/Logout.phps" id="logout">Logout</a>
                        </ul>
        <center>
            <table border="1" id="outertable">
                <tr id="outertr1">
                    <td>
                    </td>
                </tr>
                <tr>
                    <td>
                        <center>
                            <table border="1" id="innertable1">
                                <tr>
                                    <td><br>
                                    <input type="search" name="doctorname" id="input" placeholder="Doctor name">
                                    <br><br>
                                    <input type="submit" id="button" name="click" value="click">
                                    <!-- <button name="click">click</button> -->
                                    <br><br>
                                    </td>
                                </tr>
                            </table><br>
                        </center>
                    </td>
                </tr>
            </table>
        </center>
    </form>
    
</body>
</html>