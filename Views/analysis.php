<?php
if (!session_start()) {
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
                <a href="analysis.php" class="active">Analytics Dashboard</a>
                <a href="system.php">System Configuration</a>
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
                    <h2>MonthlyReport</h2>
                    <form action="../Controllers/analysisOparetion.php" method="post">

                        <h3>Sale:</h3>
                        <?php ?>
                        <h2><?php
                        include ("../Controllers/analysisOparetion.php");

                        $totalPrice = $re;
                        echo $totalPrice;
                        ?></h2>
                        <!-- <button type="submit" name="show">Show</button> -->
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



            <form method="get">
                <button class="logout" name="out">Log Out</button>
            </form>
        </div>
    </div>
</body>

</html>