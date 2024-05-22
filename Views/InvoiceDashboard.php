<?php
include '../controllers/InvoiceDashboardControl.php';
?>

<!DOCTYPE HTML>
<html>
    <head>
        <title>Dashboard</title>
        <link rel="stylesheet" href="../css/Dashboardstyle.css">
    </head>

    <body>
    <h1>Invoice Dashboard</h1>
        <ul>
            <li><a href="Dashboard.php" class="navbar">Dashboard</a></li>
            <li><a href="PatientList.php" class="navbar">Patient</a></li>
            <li><a href="AppointmentView.php" class="navbar">Appointment</a></li>
            <li><a href="InvoiceDashboard.php" class="navbar">Transaction</a><br> <br></li>
            <a href="../controllers/Logout.php" id="logout">Logout</a>
        </ul>
       <center> <table border="1" id="outertable">
            <tr id="outertr1">
                <td> 
                <form action="" method="post"><input type="submit" name="transitionlist" id="button" value="Invoice" style="margin: 10px 750px 10px 10px"> </form>
                </td>
            </tr>
            <tr>
                <td>
                    <br>
                    <input type="text" class="count" value="<?php echo "Total Payment: ",$totalpayment;?>"readonly>
                    <input type="text" class="count" value="<?php echo "Due: ",$totaldue;?>" readonly>
                    <input type="text" class="count" value="<?php echo "Total Paid:",$totalpaid;?>" readonly> <br><br>
                    <input type="text" class="count" value="<?php echo "Total Unpaid:",$totalunpaid;?>"readonly>
                    <input type="text" class="count" value="<?php echo "Payment per doctor:",$total_specific_doctor_payment;?>"readonly>
                    <form method="post">
                    <input type="text" name="doctorname" placeholder="Search...." style="margin-left:550px; margin-top: 25px; height: 25px">
                    <input type="submit" name="searchdoctor"  value="click" id="button">
                    </form>
                    <center>
                    
                        <!-- <select name="doctorname">
                        <option value="">Select_Doctor</option>
                        <option value="A">A</option>
                        <option value="B">B</B></option>
                        <option value="C">C</option>
                        <option value="D">D</option>
                        <option value="E">E</option>
                        <option value="F">F</option>
                        </select>&nbsp &nbsp -->
                        <!-- <input type="text" name="doctorname" id="search" placeholder="Search....">
                        <input type="submit" name="searchdoctor"  value="click" id="button"> -->
                    
                    </center>

                    <br><br><br><br>
                </td>
            </tr>
        </table></center>
    </body>
</html>
