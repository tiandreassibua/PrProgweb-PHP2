<?php
include("config.php");
if($_GET["id"] != null) {
    $query = mysqli_query($conn, "SELECT * FROM pengguna WHERE id = '".$_GET["id"]."'");
    if (mysqli_num_rows($query) > 0) {
        if(mysqli_query($conn, "DELETE FROM pengguna WHERE id = '".$_GET["id"]."'")){
            header("location:index.php");
        } else {
            echo "Gagal menghapus data <br>";
            echo "<a href='index.php'>Kembali</a>";
        }
    } else {
        echo "Data tidak ditemukan! <br>";
        echo "<a href='index.php'>Kembali</a>";
    }
} else header("location: index.php");