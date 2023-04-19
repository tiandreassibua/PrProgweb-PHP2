<?php
    include "koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Stok Menu Makanan</title>
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
    </style>
</head>

<body>
    <h1 class="text-center m-4 text-black">Stok Menu Makanan</h1>

    <div class="row justify-content-center m-3">
        <a class="btn btn-primary" href="create.php">+ Tambah Menu</a>
    </div>

    <div class="row justify-content-center m-4">
        <table class="table table-striped table-light">
            <thead class="thead-dark">
                <th>No</th>
                <th>Nama Menu</th>
                <th>Varian</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Action</th>
            </thead>
            <tbody>
                <?php
                    $query = mysqli_query($conn, "SELECT * FROM menu");
                    $no = 1;
                    while($menu = mysqli_fetch_array($query)){
                ?>
                <tr>
                    <td><?= $no++ ?>.</td>
                    <td><?= $menu["nama_menu"] ?></td>
                    <td><?= $menu["varian"] ?></td>
                    <td><?= $menu["harga"] ?></td>
                    <td><?= $menu["stok"] ?></td>
                    <td>
                        <a href="update.php?id=<?= $menu["id"] ?>" class="btn btn-warning">Update</a>
                        <a href="delete.php?id=<?= $menu["id"] ?>" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>

</html>