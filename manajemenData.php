<?php
session_start();
require 'config/functions.php';

if (isset($_SESSION["login"])) {
    header('location: index.php');
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
            <div class="content" id="content-table">
                <table>
                    <tr>
                        <th>NO</th>
                        <th>NIK</th>
                        <th>NAMA ANAK</th>
                        <th>USIA</th>
                        <th>NAMA ORTU</th>
                        <th>ALAMAT</th>
                        <th>AKSI</th>
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
                            <td class="aksi">
                                <a href="update.php?id=<?= $row["id"]; ?>" class="update"><button>Update</button></a>
                                <a href="delete.php?id=<?= $row["id"]; ?>" class="delete"><button>Delete</button></a>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
</body>

</html>