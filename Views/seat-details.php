<?php
    $airline = $_GET['airline'];
    $source = $_GET['source'];
    $destination = $_GET['destination'];
    $journeyDate = $_GET['journeyDate'];
    $departureTime = $_GET['departureTime'];
    $duration = $_GET['duration'];
    $arrivalTime = $_GET['arrivalTime'];
    $fare = $_GET['fare'];
    $totalSeat = 0;
    $discount = 0;
?>

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
    <link rel="stylesheet" href="/flightbook/styles/seat-details.css" />
</head>

<body>
    <?php include './navbar.php';?>

    <div class="container">
        <div class="seat_details_container">
            <div class="flight_details">
                <h1>Seat Details</h1>

                <table>
                    <tr>
                        <th>Airline</th>
                        <td><?php echo $airline; ?></td>
                    </tr>
                    <tr>
                        <th>Source</th>
                        <td><?php echo $source; ?></td>
                    </tr>
                    <tr>
                        <th>Destination</th>
                        <td><?php echo $destination; ?></td>
                    </tr>
                    <tr>
                        <th>Journey Date</th>
                        <td><?php echo $journeyDate; ?></td>
                    </tr>
                    <tr>
                        <th>Departure Time</th>
                        <td><?php echo $departureTime; ?></td>
                    </tr>
                    <tr>
                        <th>Duration</th>
                        <td><?php echo $duration; ?></td>
                    </tr>
                    <tr>
                        <th>Arrival Time</th>
                        <td><?php echo $arrivalTime; ?></td>
                    </tr>
                    <tr>
                        <th>Fare</th>
                        <td><?php echo $fare; ?>/person</td>
                    </tr>
                </table>

                <br />
                <hr />
                <br />

                <div class="coupon_container">
                    <input type="text" name="coupon" id="coupon" />
                    <button onclick="applyCoupon()">Apply Coupon</button>
                </div>

                <h3>Payment Details</h3>
                <table>
                    <tr>
                        <th>Seat Cost</th>
                        <td>&#2547; <?php echo $fare; ?></td>
                    </tr>
                    <tr>
                        <th>Total Seat</th>
                        <td>#
                            <span id="totalSeat">
                                <?php echo $totalSeat; ?>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <th>Total Cost</th>
                        <td>&#2547; <span id="totalCost">0</span></td>
                    </tr>
                    <tr>
                        <th>Discount</th>
                        <td>&#2547; <span id="discount"><?php echo $discount; ?></span></td>
                    </tr>
                    <tr class="total_cost">
                        <th>Total</th>
                        <th>&#2547; <span id="totalFare"><?php echo $fare; ?></span></th>
                    </tr>
                </table>

                <hr />
                <br />

                <div class="confirm_button">
                    <button class="button confirm_button" onclick="confirmSeats()">Confirm Seats</button>
                </div>
            </div>

            <div class="seat_details">
                <h3>Flight Seats</h3>

                <div class="seat_grid" id="seatGrid">
                    <?php
                    for ($i = 0; $i < 14; $i++) {
                        for ($j = 0; $j < 14; $j++) {
                            if ($j === 3 || $j === 10) {
                                echo '<button class="seat_box" style="visibility: hidden; pointer-events: none;"></button>';
                            } else {
                                $isCanceled = rand(0, 9) < 3;
                                $class = $isCanceled ? ' canceled' : '';
                                echo '<button class="seat_box' . $class . '" onclick="toggleSelected(this)"><img src="../public/seatIcon.svg" alt="Flight Icon"></button>';
                            }
                        }
                    }
                ?>
                </div>
            </div>
        </div>
    </div>

    <script>
    function toggleSelected(button) {
        button.classList.toggle('selected');
        updateTotalSeat();
        updateTotalCost();
    }

    function updateTotalSeat() {
        var totalSeat = document.querySelectorAll('.selected').length;
        document.getElementById('totalSeat').textContent = totalSeat;
    }

    function updateTotalCost() {
        var totalSeat = document.querySelectorAll('.selected').length;
        var fare = <?php echo $fare; ?>;
        var coupon = document.getElementById('coupon').value;
        var totalCost = totalSeat * fare;
        var discount = 0;
        if (coupon === 'RUPA10') {
            discount = totalCost * 0.1;
        }
        totalFare = totalCost - discount;
        document.getElementById('totalCost').textContent = totalCost;
        document.getElementById('discount').textContent = discount;
        document.getElementById('totalFare').textContent = totalFare;
    }

    function applyCoupon() {
        updateTotalCost();
    }

    function confirmSeats() {
        var selectedSeats = document.querySelectorAll('.selected');
        selectedSeats.forEach(function(seat) {
            seat.classList.add('confirmed');
        });
    }
    </script>
</body>

</html>