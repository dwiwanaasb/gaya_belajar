<?php
session_start();
require 'config/functions.php';

if (!isset($_SESSION["login"])) {
    header('location: login.php');
    exit;
}

$id_siswa = $_GET["id_siswa"];
$data = select("SELECT * FROM data_siswa WHERE id_siswa = $id_siswa")[0];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styleIndex.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="js/sweetalert2.all.min.js"></script>
    <title>Halaman Update Data</title>
</head>

<body>
    <div class="area">
        <div class="container">
            <div class="header">
                <div class="left">
                    <h2>Update Data</h2>
                    <p>Halaman update data siswa.</p>
                </div>
                <div class="right">
                    <a href="manajemen-data.php" class="home"><button>Kembali ke tabel</button></a>
                </div>
            </div>
            <div class="content">
                <form action="" method="post" name="form-data" id="form-data">
                    <input type="hidden" name="id_siswa" value="<?= $data["id_siswa"]; ?>">
                    <div class="form-input nik">
                        <label for="">NIK</label>
                        <input class="inputNik" type="number" name="nik" id="nik" placeholder="Masukkan nik..." value="<?= $data["nik"]; ?>" autocomplete="off" readonly required>
                    </div>
                    <div class="form-input">
                        <label for="">Nama Anak</label>
                        <input type="text" name="nama_anak" id="nama_anak" placeholder="Masukkan nama anak..." value="<?= $data["nama_anak"]; ?>" autocomplete="off" required>
                    </div>
                    <div class="form-input">
                        <label for="">Usia</label>
                        <input type="number" name="usia" id="usia" placeholder="Masukkan usia..." value="<?= $data["usia"]; ?>" autocomplete="off" required>
                    </div>
                    <div class="form-input">
                        <label for="">Nama Orang Tua</label>
                        <input type="text" name="nama_ortu" id="nama_ortu" placeholder="Masukkan nama orang tua..." value="<?= $data["nama_ortu"]; ?>" autocomplete="off" required>
                    </div>
                    <div class="form-input">
                        <label for="">Alamat</label>
                        <input type="text" name="alamat" id="alamat" placeholder="Masukkan alamat..." value="<?= $data["alamat"]; ?>" autocomplete="off" required>
                    </div>
                    <div class="form-button">
                        <button type="submit" name="update">Update</button>
                    </div>
                </form>
            </div>
        </div>

        <?php
        if (isset($_POST["update"])) {
            $id_siswa = $_POST["id_siswa"];
            $nik = htmlspecialchars($_POST["nik"]);
            $nama_anak = htmlspecialchars($_POST["nama_anak"]);
            $usia = htmlspecialchars($_POST["usia"]);
            $nama_ortu = htmlspecialchars($_POST["nama_ortu"]);
            $alamat = htmlspecialchars($_POST["alamat"]);

            $query = "UPDATE data_siswa SET
                nik = $nik,
                nama_anak = '$nama_anak',
                usia = $usia,
                nama_ortu = '$nama_ortu',
                alamat = '$alamat'
            WHERE id_siswa = $id_siswa";

            mysqli_query($conn, $query);

            echo "<script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Data berhasil diupdate',
                        showConfirmButton: false
                    })
                    setTimeout(function(){
                        document.location.href = 'manajemen-data.php';
                    }, 1800);
                </script>";
        }
        ?>
</body>

</html>