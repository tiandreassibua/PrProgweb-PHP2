<?php 

$host = "localhost";
$user = "root";
$pass = "";
$db = "stok_makanan";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    echo "gagal koneksi ke database";
}