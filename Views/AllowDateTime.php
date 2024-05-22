<?php
include '../controllers/AllowDateTimeValidation.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Schedule Date and Time</title>
    <link rel="stylesheet" href="../css/Dashboardstyle.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="../JavaScript/Access.js"></script>
</head>
<body>
    <form method="post">
    <h3>Allowed Date and Time</h3>
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
                        <br>
                        <br>
                    </td>
                </tr>
                <tr>
                    <td>
                    <h4>Create Time</h4>
                        <center>
                            <br>
                            <table border="1" id="innertable1">
                                <tr>
                                    <td><br>
                                        <label for="">Time</label>
                                        <input type="time" name="selecttime">
                                        <?php if(empty($_POST['selecttime'])){?>
                                            <span style="color:red;"><?php echo $timeError;?></span>
                                        <?php } ?><br><br>
                                        <label for=""></label><select name="doctorname">
                                            <option value="">Select Doctor Name</option>
                                            <option value="Akash">Akash</option>
                                            <option value="Bijoy">Bijoy</option>
                                            <option value="Rakibul">Rakibul</option>
                                            <option value="Munna">Munna</option>
                                            <option value="Raihan">Raihan</option>
                                            <option value="Faruk">Faruk</option>
                                        </select>
                                        <?php if(empty($_POST['doctorname'])){?>
                                            <span style="color:red;"><?php echo $doctorError;?></span>
                                        <?php } ?><br><br>

                                        <label for=""></label><select name="department">
                                            <option value="">Select Doctor Department</option>
                                            <option value="Medicine">Medicine(A)</option>
                                            <option value="Cardiologists">Cardiologists(B)</option>
                                            <option value="Allergists">Allergists(C)</option>
                                            <option value="Gastroenterologists">Gastroenterologists(D)</option>
                                            <option value="Dermatologists">Dermatologists(E)</option>
                                            <option value="Neorology">Neorology(F)</option>
                                        </select>
                                        <?php if(empty($_POST['department'])){?>
                                            <span style="color:red;"><?php echo $departmentError;?></span>
                                        <?php } ?><br><br>


                                        <label for=""></label><input type="submit" name="insert" id="button" value="insert">
                                        <br><br>
                                    </td>
                                </tr>
                            </table><br>
                        </center>
                        <h4>Date Time slot</h4>
                        <center>
                        <input type="text" id="search" placeholder="Search...." onclick="Search()">
                        <br><br>
                            <table border="1" id="innertable">
                                <thead>
                                <tr>
                                    <th>Doctor Name</th>
                                    <th>Department</th>
                                    <th>Time</th>
                                </tr>
                                </thead>
                                <?php while($r=mysqli_fetch_assoc($result)){ ?>
                                    <tbody>
                                    <tr>
                                        <td><?php echo $r['Doctor_name'] ?></td>
                                        <td><?php echo $r['Department'] ?></td>
                                        <td><?php echo $r['Time'] ?></td>
                                    </tr>
                                <?php } ?>    
                                </tbody>
                            </table><br><br>
                        </center>

                    </td>
                </tr>
            </table>
        </center>
    </form>
    
</body>
</html>