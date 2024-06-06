<?php
$host = "localhost";
$user = "root";
$pass = "";
$data = "penjualantiket";
$port = "3306";

$conn = mysqli_connect($host, $user, $pass, $data, $port);

$pdo = new PDO("mysql:host=$host;dbname=$data", $user, $pass);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
