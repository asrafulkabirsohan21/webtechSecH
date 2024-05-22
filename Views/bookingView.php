<?php
session_start();
require_once ("../Models/booking.php");
if (empty($_SESSION['name'])) {
    header("location:loginController.php");
} else if (isset($_GET['out'])) {
    session_destroy();
    header("location:login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flight Hotel Book Dashboard</title>
    <link rel="stylesheet" href="../Assestes/css/booking.css">
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
                <a href="home.php">User Management</a>
                <a href="../Controllers/bookingController.php" class="active">Booking Management</a>
                <a href="promotion.php">Promotion</a>
                <a href="analysis.php">Analytics Dashboard</a>
                <a href="system.php">System Configuration</a>
                <a href="customersupport.php">Customer Support</a>
             
            </nav>
        </div>
        <div class="main-content">
    
            <div class="booking-management">
                <h3>Booking Management</h3>
                <form action="../Controllers/bookingoparetions.php" method="post">
                    <table>
                        <thead>
                            <tr>
                                <th>Booking ID</th>
                                <th>User</th>
                                <th>Booking Type</th>
                                <th>Details</th>
                                <th>Date</th>
                                <th>price</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <?php
                        while ($r = mysqli_fetch_assoc($res)) {
                            ?>
                            <tbody>
                                <tr>

                                    <td><?php echo $r["id"]; ?></td>
                                    <td><?php echo $r["name"]; ?></td>
                                    <td><?php echo $r["bookingtype"]; ?></td>
                                    <td><?php echo $r["details"]; ?></td>
                                    <td><?php echo $r["date"]; ?></td>
                                    <td><?php echo $r["price"]; ?></td>
                                    <td>
                                        <button class="confirm-btn" name="confirm-btn"
                                            value="<?php echo $r["id"]; ?>">Confirm</button>

                                        <button class="cancel-btn" name="delete"
                                            value="<?php echo $r["id"]; ?>">Parmanent Delete</button>
                                    </td>
                                <?php } ?>
                            </tr>

                        </tbody>
                    </table>
                </form>
            </div>

            <div class="confirm-booking">
                <!-- confirm booking -->
                <h3>Confirm Booking</h3>
                <form action="../Controllers/bookingoparetions.php" method="post">
                    <table>
                        <thead>
                            <tr>
                                <th>Booking ID</th>
                                <th>User</th>
                                <th>Booking Type</th>
                                <th>Details</th>
                                <th>Date</th>
                                <th>price</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <?php
                        while ($r = mysqli_fetch_assoc($confirmBookingRes)) {
                            ?>
                            <tbody>
                                <tr>

                                    <td><?php echo $r["id"]; ?></td>
                                    <td><?php echo $r["name"]; ?></td>
                                    <td><?php echo $r["bookingtype"]; ?></td>
                                    <td><?php echo $r["details"]; ?></td>
                                    <td><?php echo $r["date"]; ?></td>
                                    <td><?php echo $r["price"]; ?></td> 

                                    <td>
                                        <button class="cancel-btn" name="cancel-btn"
                                            value="<?php echo $r["id"]; ?>">Cancel</button>
                                        <!-- <button class="cancel-btn">Cancel</button>
                                        <button class="edit-btn">Edit</button> -->
                                    </td>
                                <?php } ?>
                            </tr>

                        </tbody>
                    </table>
                </form>
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
                    include("../Controllers/promotionOparetion.php");
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
    </>
</body>

</html>