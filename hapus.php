<?php

require "function.php";

if (isset($_GET["id"])) {
    $id = $_GET["id"];

    if (hapus($id) > 0) {
        echo "Data berhasil dihapus";
    } else {
        echo "Data gagal dihapus";
    }
} else {
    echo "ID tidak ditemukan";
}

?>
