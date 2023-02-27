<?php
require 'config/functions.php';
$keyword = $_GET["keyword"];

$result = select("SELECT DISTINCT jenis.id_jenis, jenis.jenis FROM ciri INNER JOIN jenis ON ciri.jenis_id = jenis.id_jenis WHERE jenis.jenis LIKE '%$keyword%'");
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
            <td><?= $row["jenis"]; ?></td>
            <td class="aksi">
                <a href="ciri-ciri.php?id_jenis=<?= $row["id_jenis"]; ?>" class="view"><button><i class="fa fa-regular fa-eye"></i></button></a>
            </td>
        </tr>
        <?php $i++; ?>
    <?php endforeach; ?>
</table>