<?php
session_start();
require 'config/functions.php';

if (!isset($_SESSION["login"])) {
    header('location: login.php');
    exit;
}

$id_gaya = $_GET["id_gaya"];
$gaya = select("SELECT gaya FROM gaya WHERE id_gaya = $id_gaya")[0];
$result = select("SELECT ciri.ciri FROM ciri INNER JOIN gaya ON ciri.gaya_id = gaya.id_gaya WHERE ciri.gaya_id = $id_gaya");
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
    <script src="js/ajaxCiri.js"></script>
    <script src="js/script.js"></script>
    <title>Halaman Ciri Gaya Belajar</title>
</head>

<body>
    <?php
    $id_gaya = rawurlencode($id_gaya);
    ?>
    <input type="hidden" id="id_gaya" value="<?= $id_gaya; ?>">
    <div class="area">
        <div class="container">
            <div class="header">
                <div class="left">
                    <h2>Ciri-ciri gaya belajar <?= $gaya["gaya"]; ?></h2>
                    <p>Halaman Ciri-ciri gaya belajar <?= $gaya["gaya"]; ?></p>
                </div>
                <div class="right">
                    <a href="gaya-belajar.php" class="home"><button>Kembali</button></a>
                </div>
            </div>
            <div class="search">
                <input type="text" name="keyword" id="keyword" placeholder="Masukkan keyword pencarian..." autocomplete="off" id="keyword">
            </div>
            <div class="table-area" id="content-table">
                <table>
                    <tr>
                        <th>NO</th>
                        <th>CIRI-CIRI</th>
                    </tr>
                    <?php $i = 1; ?>
                    <?php foreach ($result as $row) : ?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td><?= $row["ciri"]; ?></td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </div>
</body>

</html>