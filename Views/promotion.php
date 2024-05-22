<?php
if (!session_start()) {
    session_start();
}

require_once ("../Models/home.php");
require_once ("../Models/promotion.php");
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
                <a href="promotion.php" class="active">Promotion</a>
                <a href="analysis.php">Analytics Dashboard</a>
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
                    <h2>Create New Promotion Code</h2>
                    <form action="../Controllers/promotionOparetion.php" method="post" onsubmit="return validateForm()">
                        <label for=" code">Code:</label>
                        <input type="text" id="code" name="code">
                        <br>
                        <label for="discount">Discount (% or amount):</label>
                        <input type="text" id="discount" name="discount">
                        <br>
                        <label for="startDate">Start Date:</label>
                        <input type="date" id="startDate" name="startDate">
                        <br>
                        <label for="endDate">End Date:</label>
                        <input type="date" id="endDate" name="endDate">
                        <br>
                        <label for="usageLimit">Usage Limit:</label>
                        <input type="number" id="usageLimit" name="usageLimit">
                        <br>
                        <label for="services">Applicable Services:</label>
                        <select id="services" name="services">
                            <option value="flights">Flights</option>
                            <option value="hotels">Hotels</option>
                        </select>
                        <br>
                        <button type="submit" name="create">Create Code</button>
                    </form>

                    <script>
                        function validateForm() {

                            var code = document.getElementById('code').value;
                            var discount = document.getElementById('discount').value;
                            var startDate = document.getElementById('startDate').value;
                            var endDate = document.getElementById('endDate').value;
                            var usageLimit = document.getElementById('usageLimit').value;


                            if (code.trim() === '') {
                                alert('Please enter a code.');
                                return false;
                            }
                            if (discount.trim() === '') {
                                alert('Please enter a discount.');
                                return false;
                            }
                            if (startDate.trim() === '') {
                                alert('Please select a start date.');
                                return false;
                            }
                            if (endDate.trim() === '') {
                                alert('Please select an end date.');
                                return false;
                            }
                            if (usageLimit.trim() === '') {
                                alert('Please enter a usage limit.');
                                return false;
                            }


                            return true;
                        }
                    </script>

                </div>

                <h2>Existing Promotion Codes</h2>
                <form action="../Controllers/promotionOparetion.php" method="post">
                    <table>
                        <thead>
                            <tr>
                                <th>Code</th>
                                <th>Discount</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Usage Limit</th>
                                <th>Services</th>
                                <th>Actions</th>
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
                            include ("../Controllers/promotionOparetion.php");
                            $a = se();
                            echo "here";
                            while ($r = mysqli_fetch_assoc($a)) {
                                ?>
                            <tbody>
                                <tr>
                                    <td><?php echo $r["code"]; ?></td>
                                    <td><?php echo $r["Discount"]; ?>%</td>
                                    <td><?php echo $r["startdate"]; ?></td>
                                    <td><?php echo $r["enddate"]; ?></td>
                                    <td><?php echo $r["limits"]; ?></td>
                                    <td><?php echo $r["services"]; ?></td>
                                    <td>
                                        <button class="cancel-btn" name="delete" value="<?php echo $r["code"]; ?>">
                                            Delete</button>
                                    </td>
                                <?php }
                            // } 
                            ?>
                            </tr>

                        </tbody>
                    </table>
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
                // include ("../Controllers/promotionOparetion.php");
                $a = se();
                ?>

                <?php
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