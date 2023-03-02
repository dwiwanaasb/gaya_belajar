<?php
require 'config/functions.php';
$keyword = $_GET["keyword"];

$result = select("SELECT DISTINCT gaya.id_gaya, gaya.gaya FROM ciri INNER JOIN gaya ON ciri.gaya_id = gaya.id_gaya WHERE gaya.gaya LIKE '%$keyword%'");
?>

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