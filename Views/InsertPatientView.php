<?php 
// session_start();
include '../Controllers/InsertPatientValidation.php';
?>
<!DOCTYPE HTML>
<html>
  <head>
    <title>Patient</title>
    <link rel="stylesheet" href="../css/Dashboardstyle.css">
  </head>
  <body>
    
    <form method="get">
    <h1>Patient Register</h1>
            <ul>
              <li><a href="Dashboard.php" class="navbar">Dashboard</a></li>
              <li><a href="PatientList.php" class="navbar">Patient</a></li>
              <li><a href="AppointmentView.php" class="navbar">Appointment</a></li>
              <li><a href="InvoiceDashboard.php" class="navbar">Transaction</a><br> <br></li>
            </ul>
      <center><table border="1" id="outertable">
        <tr>
          <td>
            <center>
              <table border="1" id="innertable1">
                <tr id="innerdata">
                  <td><br><br>
                   <label for="Name">Name</label>
                    <input type="text" name="name" id="input"><br>
                    <?php if(isset($_SESSION['nameError'])){?>
                      <span style="color:red"><?php echo $_SESSION['nameError'];?></span><br><br>
                    <?php }?><br>
                    <label for="Email">Email</label> 
                    <input type="email" name="email" id="input"><br>
                    <?php if(isset($_SESSION['emailError'])){?>
                      <span style="color:red"><?php echo $_SESSION['emailError'];?></span><br><br>
                    <?php }?><br>
                    <label for="UserName">UserName</label> 
                    <input type="text" name="username" id="input"><br>
                    <?php if(isset($_SESSION['usernameError'])){?>
                      <span style="color:red"><?php echo $_SESSION['usernameError'];?></span><br><br>
                    <?php }?><br>
                    <label for="Password">Password</label> 
                    <input type="password" name="password" id="input"><br>
                    <?php if(isset($_SESSION['passwordError'])){?>
                      <span style="color:red"><?php echo $_SESSION['passwordError'];?></span><br><br>
                    <?php }?><br>
                    <label for="Gender">Gender</label>
                    <input type="radio" name="gender" value="male">Male
                    <input type="radio" name="gender" value="female">Female
                    <br>
                    <?php if(isset($_SESSION['genderError'])){?>
                      <span style="color:red"><?php echo $_SESSION['genderError'];?></span><br><br>
                    <?php }?><br>
                    <label for="Phone">Phone</label> 
                    <input type="number" name="phone" id="input"><br>
                    <?php if(isset($_SESSION['phoneError'])){?>
                      <span style="color:red"><?php echo $_SESSION['phoneError'];?></span><br><br>
                    <?php }?><br>
                    <label for="Address">Address</label> 
                    <input type="text" name="address" id="input"> <br>
                    <?php if(isset($_SESSION['addressError'])){?>
                      <span style="color:red"><?php echo $_SESSION['addressError'];?></span><br><br>
                    <?php }?><br>
                    <input type="submit" name="register" value="Save" id="button"><br><br>
                </td>
                </tr>
              </table><br><br>
            </center>

          </td>
        </tr> <br><br><br><br>
      </table></center>
    </form>
   
    
  </body>
</html>