<?php
//require_once("../Assestes/style.css");
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Page</title>
    <link rel="stylesheet" href="../Assestes/css/style.css">
</head>

<body>
    <div class="login-panel">
        <h1>Flight & Hotel Ticket Booking System</h1>
        <form id="loginForm" method="post" action="../Controllers/logCheckController.php"
            onsubmit="return validateForm()">
            <div class="input-group">
                <label for="username">Username:</label>
                <input type="text" id="email" name="email">
            </div>
            <div class="input-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password">
            </div>
            <div class="form-group">
                <button type="submit">Login</button>
        </form>
    </div>
    <script>
        function validateForm() {
            var email = document.getElementById("email").value;
            var password = document.getElementById("password").value;

            if (email === "" || password === "") {
                alert("Both email and password are required.");
                return false;
            }
            return true;
        }
    </script>
</body>

</html>