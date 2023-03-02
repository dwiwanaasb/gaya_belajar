<?php
session_start();
require 'config/functions.php';

if (!isset($_SESSION["login"])) {
    header('location: login.php');
    exit;
}

$result = select("SELECT * FROM ciri");
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
    <script src="js/ajaxBasis.js"></script>
    <script src="js/script.js"></script>
    <title>Halaman Basis Pengetahuan</title>
</head>

<body>
    <div class="area">
        <div class="container">
            <div class="header">
                <div class="left">
                    <h2>Basis Pengetahuan</h2>
                    <p>Halaman Basis Pengetahuan</p>
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
                        <th rowspan="2">CIRI-CIRI BELAJAR</th>
                        <th colspan="3">NILAI BOBOT</th>
                        <th rowspan="2">AKSI</th>
                    </tr>
                    <tr>
                        <th class="thScroll">MB</th>
                        <th class="thScroll">MD</th>
                        <th class="thScroll">PAKAR</th>
                    </tr>
                    <?php $i = 1; ?>
                    <?php foreach ($result as $row) : ?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td><?= $row["ciri"]; ?></td>
                            <td><?= $row["mb"]; ?></td>
                            <td><?= $row["md"]; ?></td>
                            <td><?= $row["pakar"]; ?></td>
                            <td class="aksi">
                                <a href="update-ciri.php?id_ciri=<?= $row["id_ciri"]; ?>" class="update"><button><i class="fas fa-regular fa-pen"></i></button></a>
                                <a href="delete-ciri.php?id_ciri=<?= $row["id_ciri"]; ?>" class="delete"><button><i class="fas fa-regular fa-trash"></i></button></a>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </table>
            </div>
            <div class="footer">
                <a href="create-ciri.php" class="tambah"><button><i class="fa fa-regular fa-plus"></i> Tambah ciri</button></a>
            </div>
        </div>
    </div>
</body>

</html>