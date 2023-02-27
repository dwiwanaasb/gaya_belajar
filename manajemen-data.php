<?php
session_start();
require 'config/functions.php';

if (!isset($_SESSION["login"])) {
    header('location: login.php');
    exit;
}

$result = select("SELECT * FROM data_siswa");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styleIndex.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="js/sweetalert2.all.min.js"></script>
    <script src="js/ajaxSearch.js"></script>
    <script src="js/script.js"></script>
    <title>Halaman Manajemen Data</title>
</head>

<body>
    <div class="area">
        <div class="container">
            <div class="header">
                <div class="left">
                    <h2>Manajemen Data</h2>
                    <p>Halaman pengelolaan data siswa.</p>
                </div>
                <div class="right">
                    <a href="index.php" class="home"><button>Home</button></a>
                </div>
            </div>
            <div class="search">
                <input type="text" name="keyword" id="keyword" placeholder="Masukkan keyword pencarian..." autocomplete="off" id="keyword">
            </div>
            <div class="table-area" id="content-table">
                <table>
                    <tr>
                        <th rowspan="2">NO</th>
                        <th rowspan="2">NIK</th>
                        <th rowspan="2">NAMA ANAK</th>
                        <th rowspan="2">USIA</th>
                        <th rowspan="2">NAMA ORTU</th>
                        <th rowspan="2">ALAMAT</th>
                        <th colspan="3">HASIL EVALUASI</th>
                        <th rowspan="2">AKSI</th>
                    </tr>
                    <tr>
                        <th class="thScroll">VISUAL</th>
                        <th class="thScroll">AUDITORI</th>
                        <th class="thScroll">KINESTETIK</th>
                    </tr>
                    <?php $i = 1; ?>
                    <?php foreach ($result as $row) : ?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td><?= $row["nik"]; ?></td>
                            <td><?= $row["nama_anak"]; ?></td>
                            <td><?= $row["usia"]; ?></td>
                            <td><?= $row["nama_ortu"]; ?></td>
                            <td><?= $row["alamat"]; ?></td>
                            <td><?= number_format($row["visual"], 2) . "%" ?></td>
                            <td><?= number_format($row["auditori"], 2) . "%" ?></td>
                            <td><?= number_format($row["kinestetik"], 2) . "%" ?></td>
                            <td class="aksi">
                                <a href="update-data.php?id_siswa=<?= $row["id_siswa"]; ?>" class="update"><button><i class="fas fa-regular fa-pen"></i></button></a>
                                <a href="delete-data.php?id_siswa=<?= $row["id_siswa"]; ?>" class="delete"><button><i class="fas fa-regular fa-trash"></i></button></a>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
</body>

</html>