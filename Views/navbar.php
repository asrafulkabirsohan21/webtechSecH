<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>FlyFlight</title>

    <!-- Font Link -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu+Sans:ital,wght@0,100..800;1,100..800&display=swap"
        rel="stylesheet" />

    <link rel="stylesheet" href="/flightbook/styles/style.css" />
    <link rel="stylesheet" href="/flightbook/styles/navbar.css" />
</head>

<body>
    <nav class="nav_section">
        <div class="nav_container">
            <div class="logo">
                <a href="/flightbook">FlyFlight</a>
            </div>
            <div class="nav_links">
                <a href="/flightbook" class="nav_link active_link">Home</a>
                <a href="#" class="nav_link">About Us</a>
                <a href="#" class="nav_link">Hot Deals</a>
                <a href="#" class="nav_link">Hotels</a>
                <a href="#" class="nav_link">Support</a>
            </div>
            <?php
            //session_start();

            if (!isset($_SESSION['email'])) {
                echo '<div class="login_btn">
                    <a href="/flightbook/view/login.php">
                        <button>Login</button>
                    </a>
                </div>';
            } else {
                echo '<div class="login_btn">
                    <a href="/flightbook/view/logout.php">
                        <button>Logout</button>
                    </a>
                </div>';
            }
            ?>
        </div>
    </nav>
</body>

</html>