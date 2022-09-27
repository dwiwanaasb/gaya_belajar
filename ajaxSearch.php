<?php
require 'config/functions.php';
$keyword = $_GET["keyword"];
$result = select("SELECT * FROM data_siswa WHERE
                    nik LIKE '%$keyword%' OR
                    nama_anak LIKE '%$keyword%' OR
                    usia LIKE '%$keyword%' OR
                    nama_ortu LIKE '%$keyword%' OR
                    alamat LIKE '%$keyword%'");
?>

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