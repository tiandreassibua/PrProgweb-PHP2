<?php include("config.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GUIDED PHP2</title>
    <!-- <link rel="stylesheet" href="./style.css"> -->
</head>

<body>
    <a href="form-mhs.php">Tambah data</a>
    <table border="1">
        <thead>
            <th>No</th>
            <th>Nama Lengkap</th>
            <th>Jenis Kelamin</th>
            <th>Tanggal Lahir</th>
            <th>Hobi</th>
            <th>Email</th>
            <th>Alamat</th>
            <th>Password</th>
            <th>Aksi</th>
        </thead>
        <tbody>
            <?php
            $query = mysqli_query($conn, "SELECT * FROM pengguna");
            if (mysqli_num_rows($query) > 0) {
                $no = 1;
                while ($data = mysqli_fetch_array($query)) {
                    ?>
                    <tr>
                        <td><?= $no++ ?>.</td>
                        <td><?= $data["nama_depan"] ?> <?= $data["nama_blkg"] ?></td>
                        <td><?= $data["jk"] == "P" ? "Perempuan" : "Laki-laki" ?></td>
                        <td><?= date("d-m-Y", strtotime($data["tgl_lahir"])) ?></td>
                        <td><?= $data["hobi"] ?></td>
                        <td><?= $data["email"] ?></td>
                        <td><?= $data["alamat"] ?></td>
                        <td>
                            <i><?= $data["pass"] ?></i>
                        </td>
                        <td>
                            <a href="form-mhs.php?id=<?= $data["id"] ?>">Edit</a>
                            <a href="delete.php?id=<?= $data["id"] ?>">Hapus</a>
                        </td>
                    </tr>
                    <?php
                }
            } else {
                echo "<td colspan='8' align='center'>Data tidak ada!</td>";
            }

            ?>
        </tbody>
    </table>
</body>

</html>