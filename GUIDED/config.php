<?php

$host = "localhost";
$username = "root";
$password = "";
$dbname = "guided_php2";

$conn = mysqli_connect($host, $username, $password, $dbname);
echo !$conn ? "Koneksi ke database gagal!" : "";