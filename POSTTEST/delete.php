<?php
    include "koneksi.php";
    $id = $_GET["id"];
    $query = mysqli_query($conn, "DELETE FROM menu WHERE id = '$id'");
    if($query) {
        echo "<h3 align='center'>Berhasil menghapus data menu!</h3>";
        echo '<script>setTimeout(function(){window.location.href="index.php";},3000);</script>';
    } else {
        echo "gagal menghapus data menu";
    }
?>