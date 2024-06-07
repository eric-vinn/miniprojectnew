<?php

function connectDB() {
    // Database connection parameters
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "penjualantiket";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    return $conn;
}

function query($sql) {
    $conn = connectDB();
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Fetch all records as an associative array
        return $result->fetch_all(MYSQLI_ASSOC);
    } else {
        return [];
    }

}

function tambah($data) {
    $conn = connectDB();
    $nama = $data["namalengkap"];
    $nohp = $data["nohp"];
    $alamat = $data["alamat"];
    $email = $data["email"];
    $tiket = $data["tiket"];
    $posisi = $data["posisi"];

    $query = "INSERT INTO pemesanan (namalengkap, nohp, alamat, email, jumlahtiket, posisi) 
              VALUES ('$nama', '$nohp', '$alamat', '$email', '$tiket', '$posisi')";

    mysqli_query($conn, $query);

    $affectedRows = mysqli_affected_rows($conn);
    $conn->close();
    
    return $affectedRows;
}


function hapus($id) {
    $conn = connectDB();
    mysqli_query($conn, "DELETE FROM pemesanan WHERE id = $id");

    $affectedRows = mysqli_affected_rows($conn);
    $conn->close();

    return $affectedRows;
}


function ubah($data) {
    $conn = connectDB();

    $id = $data["id"];
    $nama = $data["namalengkap"];
    $nohp = $data["nohp"];
    $alamat = $data["alamat"];
    $email = $data["email"];
    $tiket = $data["tiket"];
    $posisi = $data["posisi"];

    $query = "UPDATE pemesanan SET
        namalengkap = '$nama',
        nohp = '$nohp',
        alamat = '$alamat',
        email = '$email',
        jumlahtiket = '$tiket',
        posisi = '$posisi'
        WHERE id = $id
        ";

    mysqli_query($conn, $query);

    $affectedRows = mysqli_affected_rows($conn);
    $conn->close();
    
    return $affectedRows;
}






?>
