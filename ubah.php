<?php

require "function.php";

$id = $_GET["id"];
$pesanan = query("SELECT * FROM pemesanan WHERE id = $id")[0];

if (isset($_POST["Daftar"])) {
    if (ubah($_POST) > 0) {
        echo "data berhasil diubah";
    } else {
        echo "data gagal diubah";
    }
}

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
                <input type="text" placeholder="search">
            </form>
            <ul>
                <li>
                    <a href="main.html">Home</a>
                </li>
                <li>
                    <a href="#">Contact</a>
                </li>
                <li>
                    <a href="#">About</a>
                </li>
            </ul>
        </nav>
    </header>

    <h2 id="titletiket">
        Tiket Konser Sheila On 7
    </h2>

    <aside id="detailtiketso7">
        <img src="sheila.png">

        <div class="detailsingkatso7">
            <p>
                Lokasi : Stadion Kridosono<br/>
                Tanggal : 20 April 2024<br/>
                Waktu : 19.00 - 20.00 WIB<br/>
            </p>
            <p>
                Mulai dari : Rp. 200.000,00
            </p>
        </div>
    </aside>

    <aside id="pemesananso7">
        <h1>
            Pengubahan Data diri
        </h1>
        <div class="datadiriso7">
            <form method="post" action="">
                <div class="row">
                    <div class="judul">
                      <label for="namalengkap">Nama Lengkap </label>
                    </div>
                    <div class="ngisi">
                      <input class="kotakputih" type="text" id="nama" name="namalengkap" placeholder="Nama Lengkap" required value="<?= $pesanan["namalengkap"]; ?>">
                    </div>
                  </div>

                  <div class="judul">
                    <label for="nomor hp">Nomor HP </label>
                  </div>
                  <div class="ngisi">
                    <input class="kotakputih" type="text" id="nomorhp" name="nohp" placeholder="Nomor Handphone" required value="<?= $pesanan["nohp"]; ?>">
                  </div>

                  <div class="judul">
                    <label for="alamat">Alamat </label>
                  </div>
                  <div class="ngisi">
                    <input class="kotakputih" type="text" id="alamat" name="alamat" placeholder="Alamat" required value="<?= $pesanan["alamat"]; ?>">
                  </div>

                  <div class="judul">
                    <label for="email">Email </label>
                  </div>
                  <div class="ngisi">
                    <input class="kotakputih" type="text" id="email" name="email" placeholder="Email" required value="<?= $pesanan["email"]; ?>">
                  </div>

                  <div class="judul">
                    <label for="tiket">Jumlah Tiket </label>
                  </div>
                  <div class="ngisi">
                    <input class="kotakputih" type="number" id="tiket" name="tiket" min="1" max="3" placeholder="0" required value="<?= $pesanan["jumlahtiket"]; ?>">
                  </div>
                  
                  <div class="apa">
                    <div class="judulp">
                      <label for="posisi">Posisi Menonton </label>
                    </div>
                    <div class="ngisip">
                      <select name="posisi" required>
                          <option value="0" <?= ($pesanan["posisi"] == 0) ? 'selected' : '' ?>>Posisi</option>
                          <option value="1" <?= ($pesanan["posisi"] == 1) ? 'selected' : '' ?>>Festival (Rp. 400.000,00)</option>
                          <option value="2" <?= ($pesanan["posisi"] == 2) ? 'selected' : '' ?>>Cat 1 (Rp. 200.000,00)</option>
                          <option value="3" <?= ($pesanan["posisi"] == 3) ? 'selected' : '' ?>>Cat 2 (Rp. 250.000,00)</option>
                          <option value="4" <?= ($pesanan["posisi"] == 4) ? 'selected' : '' ?>>Cat 3 (Rp. 300.000,00)</option>
                          <option value="5" <?= ($pesanan["posisi"] == 5) ? 'selected' : '' ?>>Ultimate (Rp. 600.000,00)</option>
                      </select>
                    </div>
                  </div>

                  <div id="kembali">
                    <a id="pemesanantiket" href="sheila.html">Kembali</a>
                  </div>

                  <div class="submit">
                    <input id="submit" type="submit" name="Daftar" id="daftar" value="Submit"> 
                    <input id="reset" type="reset" name="Reset" id="reset" value="Reset">
                  </div>
                </div>
                <input type="hidden" name="id" value="<?= $pesanan["id"]; ?>">
            </form>
        </div>
    </aside>

    <img class="rowseat" src="rowseat.jpg">

    <footer>
        <p>
            Beli Tiket Konser Hanya Di tiketkonser.com
        </p>        
    </footer>
</body>
</html>
