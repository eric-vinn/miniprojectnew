<?php
include 'koneksi.php';

if (isset($_POST['login'])) {
    $email = $_POST['EmailLogin'];
    $password = $_POST['PasswordEmail'];

    mysqli_query($conn, "SELECT * FROM users WHERE email = '$email");

    //cek username
    if (mysqli_num_rows($result) === 1) {
        //cek password

        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row['password'])) {
            header('Location: main.html');
        }
    }

    $error = true;
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
        <form action="" method="post">
            <label>Login: </label>
            <br>
            <input type="text" id="EmailLogin" name="email" required>
            <br>
            <label>Password: </label>
            <br>
            <input type="password" id="PasswordEmail" name="password" required>
            <br>
            <input type="submit" value="Login">
        </form>
    </div>
</body>

</html>
