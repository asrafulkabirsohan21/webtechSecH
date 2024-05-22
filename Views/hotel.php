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
    <link rel="stylesheet" href="/flightbook/styles/hotel.css" />
</head>

<body>
    <section class="container">
        <div class="hotel_container">
            <h1>🔥 Top Hotels</h1>
            <?php 
                include './controller/HotelController.php';
                include './../../flightbook/model/dbconnect.php';
                getHotelDetails($con);
            ?>
        </div>
    </section>
</body>

</html>