<?php
session_start();
include '../controllers/DashboardControl.php';

?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>Dashboard</title>
        <link rel="stylesheet" href="../css/Dashboardstyle.css">
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <script src="../JavaScript/Access.js"></script>
    </head>

    <body>
        <h1>Dashboard</h1>
        <ul>
            <li><a href="Dashboard.php" class="navbar">Dashboard</a></li>
            <li><a href="PatientList.php" class="navbar">Patient</a></li>
            <li><a href="AppointmentView.php" class="navbar">Appointment</a></li>
            <li><a href="InvoiceDashboard.php" class="navbar">Transaction</a><br> <br></li>
            <a href="../controllers/Logout.php" id="logout">Logout</a>
        </ul>

        <table border="1" id="outertable">
            <h3>Welcome TO CMS <?php echo strtoupper($username),"!";?></h3>
            <a href="StaffProfile.php"> <img src="https://th.bing.com/th/id/OIP.VuY3jIZKAEuwTZ3OTuo1WQHaHa?w=195&h=195&c=7&r=0&o=5&dpr=1.3&pid=1.7" alt="Profile" id="user_profile" onmouseover="  User_Profile()" > </a>
            <tr id="outerrow">
                <td>
                <br><br>
                    <input type="text" class="count" id="patientsdetails" value="<?php echo "Total Patient: $total_patientsum";?>" onmouseover="hover_details_Total_Patient()" readonly> 
                    <input type="text" class="count" id="appointmentdetails" value="<?php echo "Total Appointment: $total_appcount";?>" onmouseover="hover_details_Count_appointment()" readonly>
                    <input type="text" class="count" id="details" value="<?php echo "Avg Patients per Doctor:",$avg_patient_per_doctor;?>" onmouseover="hover_details_Avg()" readonly>
                    <br>
                    <h4>Appointment Schedule</h4>
                    <form method="post">
                        <!-- <input type="text" name="search" id="search" onclick='Search()' placeholder="Search....."> -->
                        <input type="date" id="date" name="appointmentschedul">
                        <input type="submit" id="button" name="button" value="click"><br><br>
                        <center>
                        <table border="1" id="innertable">
                            <thead>
                            <tr>
                                <th>AppoinmentID</th>
                                <th>Patient_name</th>
                                <th>Doctor_name</th>
                                <th>Appoinment_date</th>
                                <th>Appoinment_time</th>
                                <th>Serial</th>
                            </tr>
                            <tbody>
                            <tr>
                                <?php while($r=mysqli_fetch_assoc($result)){?>
                                    <td><?php echo $r['AppoinmentID'] ?></td>
                                    <td><?php echo $r['Patient_name'] ?></td>
                                    <td><?php echo $r['Doctor_name'] ?> </td>
                                    <td><?php echo $r['Appoinment_date'] ?></td>
                                    <td><?php echo $r['Appoinment_time'] ?></td>
                                    <td><?php echo $r['Serial'] ?></td>
                                    
                            </tr>
                            <?php }?>
                            </tbody>
                            </thead>
                        </table></center>
                        <h4>Doctor Details</h4>
                        <table>
                            <?php while($r=mysqli_fetch_assoc($result1)){ 
                                $_SESSION['doctorname'] = $r['Doctor_name'];
                                ?>
                            <tr>
                                <input type="text" name="doctor_details" id="doctor_details" value="<?php echo  $_SESSION['doctorname'];?>" readonly>
                                <?php } ?>
                                <input type="submit" name="viewall" id="doctor_details" value="View All Details">
                            </tr>
                            
                        </table>
                    </form>
                    <br>
                </td>
            </tr>
        </table>
    </body>
</html>