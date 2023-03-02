<?php
session_start();
require 'config/functions.php';

if (!isset($_SESSION["login"])) {
    header('location: login.php');
    exit;
}

$result = select("SELECT DISTINCT gaya.id_gaya, gaya.gaya FROM ciri INNER JOIN gaya ON ciri.gaya_id = gaya.id_gaya");
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
    <script src="js/ajaxGaya.js"></script>
    <script src="js/script.js"></script>
    <title>Halaman Gaya Belajar</title>
</head>

<body>
    <div class="area">
        <div class="container">
            <div class="header">
                <div class="left">
                    <h2>Gaya Belajar</h2>
                    <p>Halaman Gaya Belajar</p>
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
                        <th>NO</th>
                        <th>GAYA BELAJAR</th>
                        <th>DETAIL</th>
                    </tr>
                    <?php $i = 1; ?>
                    <?php foreach ($result as $row) : ?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td><?= $row["gaya"]; ?></td>
                            <td class="aksi">
                                <a href="ciri-ciri.php?id_gaya=<?= $row["id_gaya"]; ?>" class="view"><button><i class="fa fa-regular fa-eye"></i></button></a>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </div>
</body>

</html>