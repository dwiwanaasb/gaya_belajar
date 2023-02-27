<?php
require 'config/functions.php';
$keyword = $_GET["keyword"];

$result = select("SELECT * FROM ciri WHERE ciri LIKE '%$keyword%'");
?>

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