<?php
require 'function.php';


if (isset($_POST["login"])){
    $username = $_POST["email"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * users WHERE email ='$username'");

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        if (mysqli_query($password, $row["password"])) {
            header("Location: main.php");
            exit;
        }
    }
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
        <form action="main.php" method="post">
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
