<?php
require "function.php";

$pemesanan = query("SELECT * FROM pemesanan");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pemesanan</title>
</head>
<body>
    <h1>Daftar Pemesanan</h1>

    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No.</th>
            <th>Aksi</th>
            <th>ID</th>
            <th>Nama Lengkap</th>
            <th>Nomor HP</th>
            <th>Alamat</th>
            <th>Email</th>
            <th>Jumlah Tiket</th>
            <th>Posisi</th>
        </tr>

        <?php $i = 1; ?>
        <?php foreach ($pemesanan as $row) : ?>
        <tr>
            <td><?= $i; ?></td>
            <td>
                <a href="ubah.php?id=<?= $row['id']; ?>">Ubah</a>
                <a href="hapus.php?id=<?= $row['id']; ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>
            </td>
            <td><?= $row['id']; ?></td>
            <td><?= $row['namalengkap']; ?></td>
            <td><?= $row['nohp']; ?></td>
            <td><?= $row['alamat']; ?></td>
            <td><?= $row['email']; ?></td>
            <td><?= $row['jumlahtiket']; ?></td>
            <td><?= $row['posisi']; ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>