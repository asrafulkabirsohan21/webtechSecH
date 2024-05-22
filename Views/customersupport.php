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
                <a href="analysis.php">Analytics Dashboard</a>
                <a href="system.php">System Configuration</a>
                <a href="customersupport.php" class="active">Customer Support</a>
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
                    <h2>customersupport</h2>
                    <form action="../Controllers/customerOparetion.php" method="post">
                        <table>
                            <thead>
                                <tr>
                                    <th>Problem Id</th>
                                    <th>Subject</th>
                                    <th>Description</th>
                                    <th>Replyed</th>
                                    <th>Reply</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // if (se()) {
                                // function se()
                                // {
                                //     $r = selec();
                                //     return $r;
                                // }
                                include ("../Controllers/customerOparetion.php");
                                $a = customer();
                                while ($r = mysqli_fetch_assoc($a)) {
                                    ?>
                                <tbody>
                                    <tr>
                                        <td><?php echo $r["id"]; ?></td>
                                        <td><?php echo $r["Problem"]; ?></td>
                                        <td><?php echo $r["Description"]; ?></td>
                                        <td><textarea name="" id="" rows="4" cols="15"><?php echo $r["Reply"]; ?></textarea>
                                        </td>
                                        <td>
                                            <input type="text" name="reply_<?php echo ($r["id"]); ?>">
                                        </td>

                                        <td>
                                            <button type="submit" class="cancel-btn" name="delete"
                                                value="<?php echo $r["id"]; ?>">
                                                Delete</button>
                                            <button type="submit" class="cancel-btn" name="btnid"
                                                value="<?php echo $r["id"]; ?>">
                                                Reply</button>
                                            <button type="submit" class="cancel-btn" name="update"
                                                value="<?php echo $r["id"]; ?>">
                                                Update</button>
                                        </td>
                                        <?php
                                }

                                ?>
                                </tr>

                            </tbody>
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