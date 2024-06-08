<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penjualan Tiket Konser</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <nav class="atas">
            <form>
                <input id="search_id" type="text" size="30">
                <div id="container_search"></div>
            </form>
            <ul>
                <li>
                    <a href="main.php">Home</a>
                </li>
                <li>
                    <a href="#">Contact</a>
                </li>
                <li>
                    <a href="#">About</a>
                </li>
                <?php if (isset($_SESSION['user'])): ?>
                    <li>
                        <a href="logout.php">Logout</a>
                    </li>
                <?php else: ?>
                    <li>
                        <a href="login.php">Login</a>
                    </li>
                <?php endif; ?>
            </ul>
        </nav>
    </header>

    <div id="konten1" class="konten">
        <h2>Event terdekat</h2>

        <div class="list-konten sheila" name="sheila">
            <a href="sheila.html"><img src="sheila.png"></a>
            <p>
                Sheila on 7
            </p>
            <p>
                Kridosono, 20 April 2024<br />
                Rp.200.000
            </p>
            <div class="lanjutso7">
                <a href="sheila.html">Detail</a>
            </div>
        </div>

        <div class="list-konten guyon">
            <a href="guyon.html"><img src="guyon.png"></a>
            <p>
                Guyon Waton
            </p>
            <p>
                Maguwo, 10 April 2024<br />
                Rp.150.000
            </p>
            <div class="lanjutguyon">
                <a href="guyon.html">Detail</a>
            </div>
        </div>

        <div class="list-konten tulus">
            <a href="tulus.html"><img src="tulus.png"></a>
            <p>
                Tulus
            </p>
            <p>
                Hotel Colombo, 28 April 2024<br />
                Rp.400.000
            </p>
            <div class="lanjuttulus">
                <a href="tulus.html">Detail</a>
            </div>
        </div>
    </div>

    <footer>
        <p>
            Beli Tiket Konser Hanya Di tiketkonser.com
        </p>
    </footer>

    <script>
        var kontens = document.getElementsByClassName("list-konten");
        var names = '';

        for (var i = 0; i < kontens.length; i++) {
            console.log(kontens[i].name);
            names += kontens[i].name;
        }

        var search = document.querySelector('#search_id');
        search.addEventListener("keyup", (event) => {

        });
    </script>

    <div id="content">
        <?php if (isset($_SESSION['user'])): ?>
            <h1>Welcome, <?php echo htmlspecialchars($_SESSION['user']); ?>!</h1>
            <p>This is the main page content.</p>
        <?php else: ?>
            <h1>Welcome, Guest!</h1>
            <p>Please <a href="login.php">login</a> to access more features.</p>
        <?php endif; ?>
    </div>
</body>

</html>
