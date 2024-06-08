<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
require 'function.php';

$error = '';

if (isset($_POST["login"])) {
    $username = $_POST["email"];
    $password = $_POST["password"];

    $conn = connectDB();

    if (!$conn) {
        die("Connection failed: " . $conn->connect_error);
    }

    $query = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($query);
    if ($stmt === false) {
        die("Prepare failed: " . $conn->error);
    }

    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        if ($password === $row["password"]) {  // Plain text password comparison
            $_SESSION['user'] = $row["email"];
            header("Location: main.php");
            exit;
        } else {
            $error = "Invalid password";
        }
    } else {
        $error = "Invalid email";
    }

    $stmt->close();
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penjualan Tiket Konser</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="login">
        <form action="login.php" method="post">
            <label>Email: </label>
            <br>
            <input type="text" id="EmailLogin" name="email" required>
            <br>
            <label>Password: </label>
            <br>
            <input type="password" id="PasswordEmail" name="password" required>
            <br>
            <input type="submit" name="login" value="Login">
        </form>
        <?php   
        if (!empty($error)) {
            echo "<p style='color: red;'>$error</p>";
        }
        ?>
    </div>
</body>
</html>
