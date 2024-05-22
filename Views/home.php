<?php
if (!session_start()) {
    session_start();
}

require_once ("../Models/home.php");
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
                <a href="home.php" class="active">User Management</a>
                <a href="../Controllers/bookingController.php" value="1">Booking Management</a>
                <a href="promotion.php">Promotion</a>
                <a href="analysis.php">Analytics Dashboard</a>
                <a href="system.php">System Configuration</a>
                <a href="customersupport.php">Customer Support</a>
            </nav>
        </div>
        <div class="main-content">
            <div>
                <h2>Hello, <?php echo $_SESSION["name"]; ?></h2>
                <!-- <p>You Got 25 New Messages</p><br> -->
            </div>
            <div class="widgets">
                <!-- <div class="widget">
                    <h3>Website Hit</h3>
                    <div class="image-container" id="websiteHitChart">
                        <img src="websitehit.png" alt="" style="max-width: 300px; height: auto;">
                    </div>
                </div>
                <div class="widget">
                    <h3>Sale Report</h3>
                    <div class="chart" id="saleReportChart">
                          <img src="websitehit.png" alt="" style="max-width: 300px; height: auto;">
                    </div>
                </div> -->
            </div>
            <div class="member-status">
                <div class="left-table">
                    <h3>Member Status</h3>
                    <form action="../Controllers/homeOparetionController.php" method="post">
                        <!-- <form action="../Views/home.php" method="post"> -->
                        <table>
                            <thead>
                                <tr>
                                    <th>User</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <?php
                            while ($r = mysqli_fetch_assoc($ress)) {
                                ?>
                                <tbody>
                                    <tr>
                                        <td>
                                            <!-- <img src="user1.jpg" alt="User"> -->
                                            <?php
                                            // echo $r['id'] 
                                            ?>
                                            <span><?php echo $r['name'] ?></span><br>
                                            <small><?php echo $r['date'] ?></small>
                                        </td>
                                        <td><span> <button class="confirm-btn" name="view"
                                                    value="<?php echo $r["name"]; ?>">View</button></span></td>
                                    <?php } ?>
                                </tr>
                            </tbody>

                        </table>

                        <div>




                            <h3>User Details</h3>
                            <table>
                                <thead>
                                    <tr>
                                        <th>Booking Type</th>
                                        <th>Details</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <?php
                                if (!empty($_SESSION['bookings'])) {
                                    $bookings = ($_SESSION['bookings']);
                                    foreach ($bookings as $booking) {
                                        ?>
                                        <tbody>
                                            <tr>
                                                <td><?php echo "Booking Type: " . ($booking['bookingtype']) . "<br>"; ?></td>
                                                <td><?php echo "Details: " . $booking['details'] . "<br>"; ?></td>
                                                <td><?php echo "Date: " . $booking['date'] . "<br><br>"; ?></td>
                                            </tr>


                                            <?php
                                    }
                                    unset($_SESSION['bookings']);
                                }

                                ?>
                                </tbody>
                            </table>
                        </div>
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