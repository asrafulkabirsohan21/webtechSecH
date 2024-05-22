<?php
    include('./model/dbconnect.php');

    function seatDetails($airline, $departureTime, $duration, $arrivalTime, $fare, $source, $destination, $journeyDate) {
        return '/flightbook/view/seat-details.php?airline=' . urlencode($airline) . '&departureTime=' . urlencode($departureTime) . '&duration=' . urlencode($duration) . '&arrivalTime=' . urlencode($arrivalTime) . '&fare=' . urlencode($fare) . '&source=' . urlencode($source) . '&destination=' . urlencode($destination) . '&journeyDate=' . urlencode($journeyDate);
    }

    $fromCity = isset($_GET['fromCity']) ? $_GET['fromCity'] : '';
    $toCity = isset($_GET['toCity']) ? $_GET['toCity'] : '';
    $journeyDate = isset($_GET['journeyDate']) ? $_GET['journeyDate'] : '';

    $sortCriteria = isset($_GET['sort']) ? $_GET['sort'] : 'default';

    $airlineFilter = isset($_GET['airline']) ? $_GET['airline'] : '';

    $query = "SELECT * FROM flights WHERE 1";

    if (!empty($fromCity)) {
        $query .= " AND LOWER(source) = LOWER('$fromCity')";
    }
    if (!empty($toCity)) {
        $query .= " AND LOWER(destination) = LOWER('$toCity')";
    }

    if (!empty($airlineFilter) && $airlineFilter != 'default') {
        $query .= " AND LOWER(airline) = LOWER('$airlineFilter')";
    }

    switch ($sortCriteria) {
        case 'cheapestFare':
            $query .= " ORDER BY fare ASC";
            break;
        case 'departureTime':
            $query .= " ORDER BY departureTime ASC";
            break;
        case 'fastestTime':
            $query .= " ORDER BY duration ASC";
            break;
        default:
            break;
    }

    $result = $con->query($query);
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
    <link rel="stylesheet" href="/flightbook/styles/search-flight.css" />
</head>

<body>
    <!-- Search Section -->
    <section class="search_background">
        <div class="search_container">
            <div class="flight_title">
                <p>Flights</p>
            </div>

            <form method="GET">
                <div class="search_inputs">
                    <div class="select_input">
                        <p>From</p>

                        <select name="fromCity" id="fromCity">
                            <option selected="true" disabled="disabled">Select City</option>
                            <option value="Dhaka">Dhaka</option>
                            <option value="Chittagong">Chittagong</option>
                            <option value="CoxsBazar">Coxs Bazar</option>
                            <option value="Barishal">Barishal</option>
                            <option value="Khulna">Khulna</option>
                            <option value="Rajshahi">Rajshahi</option>
                            <option value="Rongpur">Rongpur</option>
                            <option value="Mymensingh">Mymensingh</option>
                            <option value="Sylhet">Sylhet</option>
                        </select>
                    </div>

                    <div class="select_input">
                        <p>To</p>

                        <select name="toCity" id="toCity">
                            <option selected="true" disabled="disabled">Select City</option>
                            <option value="Dhaka">Dhaka</option>
                            <option value="Chittagong">Chittagong</option>
                            <option value="CoxsBazar">Coxs Bazar</option>
                            <option value="Barishal">Barishal</option>
                            <option value="Khulna">Khulna</option>
                            <option value="Rajshahi">Rajshahi</option>
                            <option value="Rongpur">Rongpur</option>
                            <option value="Mymensingh">Mymensingh</option>
                            <option value="Sylhet">Sylhet</option>
                        </select>
                    </div>

                    <div class="select_input date_input_container">
                        <div class="date_input">
                            <p>Journey Date</p>
                            <input type="date" name="journeyDate" id="journeyDate" />
                        </div>
                        <div class="date_input">
                            <p>Return Date</p>
                            <input type="date" name="returnDate" id="returnDate" />
                        </div>
                    </div>
                </div>

                <div class="search_button">
                    <button type="submit" class="button" name="search">Search</button>
                </div>
            </form>
        </div>
    </section>

    <!-- search result section -->
    <section class="container">
        <div class="filter_section">
            <div class="filter_duration">
                <h3>Sort By</h3>
                <a href="?sort=cheapestFare">Cheapest Fare</a>
                <a href="?sort=departureTime">Departure Time</a>
                <a href="?sort=fastestTime">Fastest Time</a>
            </div>

            <div class="filter_flight">
                <form method="GET">
                    <select name="airline" id="flights" onchange="this.form.submit()">
                        <option value="default" <?php if ($airlineFilter == 'default') echo 'selected'; ?>>All Flights
                        </option>

                        <option value="Biman Bangladesh"
                            <?php if ($airlineFilter == 'Biman Bangladesh') echo 'selected'; ?>>Biman Bangladesh
                        </option>

                        <option value="US-Bangla Airlines"
                            <?php if ($airlineFilter == 'US-Bangla Airlines') echo 'selected'; ?>>US-Bangla Airlines
                        </option>

                        <option value="Novoair" <?php if ($airlineFilter == 'Novoair') echo 'selected'; ?>>Novoair
                        </option>
                        <option value="Regent Airways"
                            <?php if ($airlineFilter == 'Regent Airways') echo 'selected'; ?>>Regent Airways
                        </option>
                    </select>
                </form>
            </div>
        </div>

        <div class="flight_list_section">
            <table>
                <thead>
                    <tr>
                        <th>Airlines</th>
                        <th>From</th>
                        <th>To</th>
                        <th>Departure</th>
                        <th>Duration</th>
                        <th>Arrival</th>
                        <th>Fare (BDT)</th>
                        <th>Seats</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                        ?>
                    <tr>
                        <td><?php echo $row['airline']; ?></td>
                        <td><?php echo $row['source']; ?></td>
                        <td><?php echo $row['destination']; ?></td>
                        <td><?php echo $row['departureTime']; ?></td>
                        <td><?php echo $row['duration']; ?> hr</td>
                        <td><?php echo $row['arrivalTime']; ?></td>
                        <td><?php echo $row['fare']; ?></td>
                        <td><button
                                onclick="window.location.href='<?php echo seatDetails($row['airline'], $row['departureTime'], $row['duration'], $row['arrivalTime'], $row['fare'], $row['source'], $row['destination'], $row['journeyDate']); ?>'">See
                                Details</button>
                        </td>
                    </tr>
                    <?php
                        }
                    } else {
                        echo "<tr><td colspan='8'>No flights found for the selected criteria.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </section>
</body>

</html>