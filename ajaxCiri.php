<?php
session_start();
require 'config/functions.php';

$keyword = $_GET["keyword"];
$id_jenis = $_GET["id_jenis"];
$jenis = select("SELECT jenis FROM jenis WHERE id_jenis = $id_jenis")[0];
$result = select("SELECT ciri.ciri FROM ciri INNER JOIN jenis ON ciri.jenis_id = jenis.id_jenis WHERE ciri.jenis_id = $id_jenis AND ciri.ciri LIKE '%$keyword%'");
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