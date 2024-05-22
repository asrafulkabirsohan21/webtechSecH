<?php
require_once ("../Controllers/systemOparetion.php");
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once ("../Models/home.php");
// require_once ("../Models/promotion.php");
// include ("../Controllers/homeOparetionController.php");

if (empty($_SESSION['name'])) {
    header("location:loginController.php");
} else if (isset($_GET['out'])) {
    session_destroy();
    header("location:login.php");
}
// -----------------------------testing

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flight Hotel Book Dashboard</title>
    <link rel="stylesheet" href="../Assestes/css/home.css">
    <!-- <link rel="stylesheet" href="../Assestes/css/promotion.css"> -->
</head>

<body>
    <div class="container">
        <div class="sidebar">
            <div class="logo">
                <h1>Flight Hotel Book</h1>
                <p>Your travel partner</p>
            </div>
            <div class="user-info">
                <p><?php echo $_SESSION["name"]; ?><br><span>Admin</span></p>
            </div>
            <nav class="menu">
                <!-- <form action=""></form> -->
                <a href="home.php">User Management</a>
                <a href="../Controllers/bookingController.php" value="1">Booking Management</a>
                <a href="promotion.php">Promotion</a>
                <a href="analysis.php">Analytics Dashboard</a>
                <a href="system.php" class="active">System Configuration</a>
                <a href="customersupport.php">Customer Support</a>
            </nav>
        </div>
        <div class="main-content">
            <header>

            </header>
            <div class="widgets">
                <!-- <div class="widget">
                    <h3>Website Hit</h3>
                    <div class="chart" id="websiteHitChart"></div>
                </div>
                <div class="widget">
                    <h3>Sale Report</h3>
                    <div class="chart" id="saleReportChart"></div>
                </div> -->
            </div>
            <div class="member-status">
                <div class="form-section">
                    <!-- style="text-align: center;" -->
                    <h2>System</h2>
                    <form action="../Controllers/systemOparetion.php" method="post">
                        <h2>USER ROLE</h2>
                        <table>
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Role</th>
                                    <th>Change</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <?php
                            include ("../Controllers/systemOparetion.php");
                            $a = systemselect();
                            if (mysqli_num_rows($a) > 0) {
                                while ($r = mysqli_fetch_assoc($a)) {
                                    // echo $r["name"];
                                    ?>
                                    <tbody>
                                        <tr>
                                            <td><?php
                                            echo $r['name']; ?></td>
                                            <td><?php
                                            echo $r['role'] ?></td>
                                            <td>
                                                <input type="text" name="role_<?php echo ($r["id"]); ?>">
                                            </td>
                                            <td>
                                                <button class="cancel-btn" name="change" value="<?php
                                                echo $r["id"]; ?>">
                                                    Change</button>

                                                <button class="cancel-btn" name="delete" value="<?php
                                                echo $r["id"]; ?>">
                                                    Delete</button>
                                            </td>
                                        <?php }
                            } ?>
                                </tr>

                            </tbody>
                        </table>

                    </form>
                    <!-- INSERT ADMIN -->

                    <form action="../Controllers/systemOparetion.php" method="post">
                        <h2>ADMIN CREATE</h2>
                        <table>
                            <tr>
                                <td>ID</td>
                                <td><input type="text" name="id" placeholder="ID"></td>
                            </tr>
                            <tr>
                                <td>Role</td>
                                <td><input type="text" name="role" placeholder="Role"></td>
                            </tr>
                            <tr>
                                <td>Name</td>
                                <td><input type="text" name="name" placeholder="Name"></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td><input type="email" name="email" placeholder="Email"></td>
                            </tr>
                            <tr>
                                <td>Password</td>
                                <td><input type="password" name="password"></td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <input type="submit" name="submit" value="Submit">
                                </td>
                            </tr>
                        </table>
                    </form>



                </div>
            </div>
        </div>
        <div class="right-panel">
            <h3>Companies</h3>
            <ul class="companies">
                <li>Us-Bangla</li>
                <li>Biman</li>
                <li>Novo Air</li>
                <li>Nepal Air</li>
            </ul>

            <h3>Promotions</h3>
            <ul class="promotions">
                <?php
                include ("../Controllers/promotionOparetion.php");
                $a = se();
                while ($r = mysqli_fetch_assoc($a)) {
                    ?>
                    <?php echo $r["code"]; ?>
                    <?php echo $r["Discount"]; ?>%

                </ul>

            <?php }
                // } 
                ?>
            </ul>

            <br>
            <br>
            <form method="get">
                <button class="logout" name="out">Log Out</button>
            </form>
        </div>
    </div>
</body>

</html>