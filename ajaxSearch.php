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
        <th rowspan="2">NO</th>
        <th rowspan="2">NIK</th>
        <th rowspan="2">NAMA ANAK</th>
        <th rowspan="2">USIA</th>
        <th rowspan="2">NAMA ORTU</th>
        <th rowspan="2">ALAMAT</th>
        <th colspan="3">HASIL EVALUASI</th>
        <th rowspan="2">AKSI</th>
    </tr>
    <tr>
        <th class="thScroll">VISUAL</th>
        <th class="thScroll">AUDITORI</th>
        <th class="thScroll">KINESTETIK</th>
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
            <td><?= number_format($row["visual"], 0) . "%" ?></td>
            <td><?= number_format($row["auditori"], 0) . "%" ?></td>
            <td><?= number_format($row["kinestetik"], 0) . "%" ?></td>
            <td class="aksi">
                <a href="update.php?id_siswa=<?= $row["id_siswa"]; ?>" class="update"><button><i class="fas fa-regular fa-pen"></i></button></a>
                <a href="delete.php?id_siswa=<?= $row["id_siswa"]; ?>" class="delete"><button><i class="fas fa-regular fa-trash"></i></button></a>
            </td>
        </tr>
        <?php $i++; ?>
    <?php endforeach; ?>
</table>