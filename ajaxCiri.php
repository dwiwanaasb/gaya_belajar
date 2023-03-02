<?php
session_start();
require 'config/functions.php';

$keyword = $_GET["keyword"];
$id_gaya = $_GET["id_gaya"];
$gaya = select("SELECT gaya FROM gaya WHERE id_gaya = $id_gaya")[0];
$result = select("SELECT ciri.ciri FROM ciri INNER JOIN gaya ON ciri.gaya_id = gaya.id_gaya WHERE ciri.gaya_id = $id_gaya AND ciri.ciri LIKE '%$keyword%'");
?>

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