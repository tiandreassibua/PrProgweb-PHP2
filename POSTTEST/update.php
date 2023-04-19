<?php
    include "koneksi.php";
    
    $id = $_GET["id"];
    $query = mysqli_query($conn, "SELECT * FROM menu WHERE id = '".$id."'");
    $menu = mysqli_fetch_array($query);
    $oldNama = $menu["nama_menu"];
    $oldVarian = $menu["varian"];
    $oldHarga = $menu["harga"];
    $oldStok = $menu["stok"];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Update Menu</title>
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
    <h1 class="row justify-content-center m-4 text-black">Update Menu</h1>
    <form action="" method="post" name="formUpdateMenu" class="row justify-content-center m-3">
        <table width="40%" border="0" class="text-black bg-light">
            <tr>
                <td><input type="hidden" name="id" value="<?php if ($id != "") {echo $id;} ?>" required=""></td>
            </tr>
            <tr>
                <td><label for="nama_menu">Nama Menu</label></td>
                <td><input type="text" name="nama_menu" required="" value="<?php if ($id != "") {echo $oldNama;} ?>"></td>
            </tr>
            <tr>
                <td><label for="varian">Varian</label></td>
                <td>
                    <select name="varian" required="">
                        <option value=""></option>
                        <option value="Makanan berat" <?php if ($id != "") {echo ($oldVarian == "Makanan berat") ? 'selected' : '';}?>>Makanan berat</option>
                        <option value="Makanan ringan" <?php if ($id != "") {echo ($oldVarian == "Makanan ringan") ? 'selected' : '';}?>>Makanan ringan</option>
                        <option value="Daging" <?php if ($id != "") {echo ($oldVarian == "Daging") ? 'selected' : '';}?>>Daging</option>
                        <option value="Vegetarian" <?php if ($id != "") {echo ($oldVarian == "Vegetarian") ? 'selected' : '';}?>>Vegetarian</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td><label for="harga">Harga</label></td>
                <td><input type="number" min="1000" name="harga" required="" value="<?php if ($id != "") {echo $oldHarga;}?>"></td>
            </tr>
            <tr>
                <td><label for="stok">Stok</label></td>
                <td><input type="number" min="1" max="50" name="stok" required="" value="<?php if ($id != "") {echo $oldStok;}?>"></td>
            </tr>
            <tr>
                <td>
                    <button class="btn btn-warning" type="submit" name="submit">Update</button> 
                    <button class="btn btn-danger" type="reset">Reset</button>
                </td>
            </tr>
        </table>
    </form>
    <?php
        if ($_POST["id"] != null) {
            $idmenu = $_POST["id"];
            $nama_menu = $_POST["nama_menu"];
            $varian = $_POST["varian"];
            $harga = $_POST["harga"];
            $stok = $_POST["stok"];

            $sql = "UPDATE menu SET
                    nama_menu = '".$nama_menu."',
                    varian = '".$varian."',
                    harga = '".$harga."',
                    stok = '".$stok."' WHERE id = '".$idmenu."'";
            $query = mysqli_query($conn, $sql);
            if($query) {
                echo "<h3 class='text-center'>Menu Berhasil diupdate!</h3>";
                echo '<script>setTimeout(function(){window.location.href="index.php";},3000);</script>';
            } else {
                echo "Menu gagal diupdate!";
            }
        }
    ?>
</body>

</html>