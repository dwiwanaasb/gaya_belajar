<?php
session_start();
require 'config/functions.php';

if (isset($_SESSION["login"])) {
    header('location: index.php');
    exit;
}

$id = $_GET["id"];
$data = select("SELECT * FROM data_siswa WHERE id = $id")[0];
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
    <title>Halaman Utama</title>
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
                    <a href="manajemenData.php" class="home"><button>Kembali ke tabel</button></a>
                </div>
            </div>
            <div class="content">
                <form action="" method="post" name="form-data" id="form-data">
                    <input type="hidden" name="id" value="<?= $data["id"]; ?>">
                    <div class="form-input">
                        <label for="">NIK</label>
                        <input type="number" name="nik" id="nik" placeholder="Masukkan nik..." value="<?= $data["nik"]; ?>" autocomplete="off" required>
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
            if (update($_POST) == 1) {
                echo "<script>
                Swal.fire({
                    icon: 'success',
                    title: 'Data berhasil diupdate',
                    showConfirmButton: false
                })
                setTimeout(function(){
                    document.location.href = 'manajemenData.php';
                }, 1800);
            </script>";
            } else {
                echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Terjadi kesalahan',
                    showConfirmButton: false,
                    text: 'Data gagal diupdate!'
                })
                setTimeout(function(){
                    document.location.href = 'manajemenData.php';
                }, 1500);
            </script>";
            }
        }
        ?>
</body>

</html>