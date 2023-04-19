<?php
    include "koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Tambah Menu</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <style type="text/css">
        body {
            background-image: url("https://images.pexels.com/photos/1640773/pexels-photo-1640773.jpeg");
            background-repeat: no-repeat;
            background-size: cover;
        }

        td {
            padding: 12px;
        }
    </style>
</head>

<body>
    <a href="index.php"><< Home</a>
    <h1 class="row justify-content-center m-4 text-black">Tambah Menu</h1>
    <form action="create.php" method="post" name="formTambahMenu" class="row justify-content-center m-3">
        <table width="40%" border="0" class="text-black bg-light">
            <tr>
                <td><label for="nama_menu">Nama Menu</label></td>
                <td><input type="text" name="nama_menu" required=""></td>
            </tr>
            <tr>
                <td><label for="varian">Varian</label></td>
                <td>
                    <select name="varian" required="">
                        <option value="Makanan berat">Makanan berat</option>
                        <option value="Makanan ringan">Makanan ringan</option>
                        <option value="Daging">Daging</option>
                        <option value="Vegetarian">Vegetarian</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td><label for="harga">Harga</label></td>
                <td><input type="number" min="1000" name="harga" required=""></td>
            </tr>
            <tr>
                <td><label for="stok">Stok</label></td>
                <td><input type="number" min="1" max="50" name="stok" required=""></td>
            </tr>
            <tr>
                <td>
                    <button class="btn btn-warning" type="submit">Add</button> 
                    <button class="btn btn-danger" type="reset">Reset</button>
                </td>
            </tr>
        </table>
    </form>

    <?php
        if (isset($_POST)) {
            $nama = $_POST["nama_menu"];
            $varian = $_POST["varian"];
            $harga = $_POST["harga"];
            $stok = $_POST["stok"];

            $sql = "INSERT INTO menu (nama_menu, varian, harga, stok)
                    VALUES('$nama', '$varian', '$harga', '$stok')";
            $query = mysqli_query($conn, $sql);
            if($query) {
                echo "<h3 class='text-center'>Berhasil menambahkan menu baru!</h3>";
                echo '<script>setTimeout(function(){window.location.href="index.php";},3000);</script>';
            } else {
                echo "Menu gagal ditamabah!";
            }
        }
    ?>
</body>

</html>