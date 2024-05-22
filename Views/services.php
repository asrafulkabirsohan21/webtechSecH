<?php
$serverName = "localhost";
$userName = "root";
$password = "";
$dbName = "sellerdb";

// Create connection
$conn = new mysqli($serverName, $userName, $password, $dbName);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $serviceName = $_POST['servicename'];
    $servicePrice = $_POST['serviceprice'];
    $serviceType = $_POST['servicetype'];
    $serviceLocation = $_POST['servicelocation'];

    $sql = "INSERT INTO sellerservice (service_name, service_price, service_type, service_location) VALUES (?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        die("Error preparing statement: " . $conn->error);
    }

    $stmt->bind_param("siss", $serviceName, $servicePrice, $serviceType, $serviceLocation);

    if ($stmt->execute()) {
        echo "Service added successfully";
        header("Location: home.php");
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="services.php" method="POST">
        <label for="servicename">Service name</label>
        <input type="text" id="servicename" name="servicename" placeholder="Service name" required>

        <label for="serviceprice">Service Price </label>
        <input type="number" id="serviceprice" name="serviceprice" placeholder="Your Service price" required>

        <label for="servicetype"> Service type </label>
        <input type="text" id="servicetype" name="servicetype" placeholder="Service type" required>

        <label for="servicelocation"> Service location </label>
        <input type="text" id="servicelocation" name="servicelocation" placeholder="Service location" required>

        <button type="submit">submit</button>
    </form>
</body>
</html>
