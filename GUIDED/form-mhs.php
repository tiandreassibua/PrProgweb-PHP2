<?php include("config.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- <style>
        body {
            font-family: 'Courier New', Courier, monospace;
            color: aliceblue;
            background-color: #1c1c1c;
        }

        a {
            color: aliceblue;
        }

        input[type="text"], input[type="email"], input[type="date"], input[type="password"], textarea{
            color: aliceblue;
            background-color: transparent;
            padding: 5px;
            border: 1px solid aliceblue;
            border-radius: 5px;
        }
    </style> -->
    
</head>

<body>
    <?php
        $id = $_GET["id"];
        $password_lama = "";
        if(!$id == null) {
            $query = mysqli_query($conn, "SELECT * FROM pengguna WHERE id = '".$id."'");
            $data = mysqli_fetch_array($query);
        }
    ?>
    <a href="index.php">Kembali</a>
    <form action="" method="post">
        <table>
            <?php if($id != null) { ?>
                <input type="hidden" name="id" value="<?= $id; ?>">
            <?php } ?>
            <tr>
                <td>Nama Depan</td>
                <td>:</td>
                <td>
                    <input type="text" name="nama_depan" value="<?= $data["nama_depan"] ?>" required>
                </td>
            </tr>
            <tr>
                <td>Nama Belakang</td>
                <td>:</td>
                <td>
                    <input type="text" name="nama_blkg" value="<?= $data["nama_blkg"] ?>" required>
                </td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td>:</td>
                <td>
                    <input type="radio" name="jk" value="L" id="l" <?= $data["jk"] == "L" ? "checked" : "" ?> required><label for="l">Laki-laki</label>
                    <input type="radio" name="jk" value="P" id="p" <?= $data["jk"] == "P" ? "checked" : "" ?> required><label for="p">Perempuan</label>
                </td>
            </tr>
            <tr>
                <td>Tanggal Lahir</td>
                <td>:</td>
                <td>
                    <input type="date" name="tgl_lahir" value="<?= $data["tgl_lahir"] ?>" required>
                </td>
            </tr>
            <tr>
                <td>Hobi</td>
                <td>:</td>
                <td>
                    <input type="checkbox" name="hobi[]" value="Membaca" <?= in_array("Membaca", explode(",", $data["hobi"])) == true ? "checked" : "" ?> id="membaca"><label for="membaca">Membaca</label><br>
                    <input type="checkbox" name="hobi[]" value="Makan" <?= in_array("Makan", explode(",", $data["hobi"])) == true ? "checked" : "" ?> id="makan"><label for="makan">Makan</label><br>
                    <input type="checkbox" name="hobi[]" value="Ngoding" <?= in_array("Ngoding", explode(",", $data["hobi"])) == true ? "checked" : "" ?> id="ngoding"><label for="ngoding">Ngoding</label><br>
                    <input type="checkbox" name="hobi[]" value="Ngepet" <?= in_array("Ngepet", explode(",", $data["hobi"])) == true ? "checked" : "" ?> id="ngepet"><label for="ngepet">Ngepet</label><br>
                </td>
            </tr>
            <tr>
                <td>Email</td>
                <td>:</td>
                <td>
                    <input type="email" name="email" value="<?= $data["email"] ?>" required>
                </td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>:</td>
                <td>
                    <textarea name="alamat" rows="5" required><?= $data["alamat"] ?></textarea>
                </td>
            </tr>
            <?php if($id != null) { ?>
            <tr>
                <td>Password lama</td>
                <td>:</td>
                <td>
                    <input type="password" name="password_lama">
                </td>
            </tr>
            <?php } ?>
            <tr>
                <td>Password</td>
                <td>:</td>
                <td>
                    <input type="password" name="password">
                </td>
            </tr>
            <tr>
                <td>Konfirmasi Password</td>
                <td>:</td>
                <td>
                    <input type="password" name="conf_password">
                </td>
            </tr>
            <?php if($id != null) { ?>
            <tr>
                <td colspan="2"></td>
                <td>
                    <i>Kosongkan jika tidak ingin mengganti password</i>
                </td>
            </tr>
            <?php } ?>
            <tr>
                <td colspan="2"></td>
                <td>
                    <input type="submit" value="Simpan" name="submit">
                </td>
            </tr>
        </table>
    </form>
    <?php
    if(isset($_POST["submit"])) {
        $nama_depan = $_POST["nama_depan"];
        $nama_blkg = $_POST["nama_blkg"];
        $jk = $_POST["jk"];
        $tgl_lahir = $_POST["tgl_lahir"];
        $email = $_POST["email"];
        $alamat = $_POST["alamat"];

        $hobi = implode(",", $_POST["hobi"]);
        
        if ($_GET["id"]) {
            $id = $_POST["id"];
            $password = $_POST["password"];
            if ($_POST["password_lama"] != null) {
                if ($_POST["password_lama"] == $data["pass"]) {
                    if ($_POST["password"] == $_POST["conf_password"]) {
                        $sql = "UPDATE pengguna SET 
                                nama_depan = '".$nama_depan."',
                                nama_blkg = '".$nama_blkg."',
                                jk = '".$jk."',
                                tgl_lahir = '".$tgl_lahir."',
                                hobi = '".$hobi."',
                                email = '".$email."',
                                alamat = '".$alamat."',
                                pass = '".$password."' WHERE id = '".$id."'
                            ";
                        $query = mysqli_query($conn, $sql);
                        echo $query ? "Update dengan password berhasil" : "Update dengan password gagal";
                    } else {
                        echo "Password dan konfirmasi password tidak sama!";
                    }
                } else {
                    echo "Password lama tidak cocok!";
                }
            } else {
                $sql = "UPDATE pengguna SET 
                        nama_depan = '".$nama_depan."',
                        nama_blkg = '".$nama_blkg."',
                        jk = '".$jk."',
                        tgl_lahir = '".$tgl_lahir."',
                        hobi = '".$hobi."',
                        email = '".$email."',
                        alamat = '".$alamat."' WHERE id = '".$id."'
                    ";
                $query = mysqli_query($conn, $sql);
                echo $query ? "Update tanpa password berhasil" : "Update tanpa password gagal";
            }
        } else {
            if($_POST["password"] == $_POST["conf_password"]) {
                $password = $_POST["password"];
                if(!$_POST["id"]){
                    $sql = "INSERT INTO pengguna(nama_depan, nama_blkg, jk, tgl_lahir, hobi, email, alamat, pass)
                            VALUES('".$nama_depan."', '".$nama_blkg."', '".$jk."', '".$tgl_lahir."', '".$hobi."', '".$email."', '".$alamat."', '".$password."')";
                    $query = mysqli_query($conn, $sql);
                    if($query) {
                        echo "Insert berhasil";
                    } else {
                        echo "Insert gagal";
                    }
                }
            } else {
                echo "Password dan konfirmasi password tidak sama!";
            }
        }
        mysqli_close();
    }
    ?>
</body>

</html>