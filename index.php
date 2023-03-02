<?php
session_start();
require 'config/functions.php';
error_reporting(0);

if (!isset($_SESSION["login"])) {
    header('location: login.php');
    exit;
}
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
    <title>Halaman Utama</title>
</head>

<body>
    <div class="area">
        <div class="container">
            <div class="header">
                <div class="left">
                    <label>PAUD ANYELIR II</label>
                    <h2>Evaluasi Gaya Belajar</h2>
                    <p>Silahkan isi data-data berikut ini untuk mengetahui gaya belajar siswa.</p>
                </div>
                <div class="right">
                    <div class="dropdown" id="dropdown">
                        <span class="drop">Menu <i class="fas fa-regular fa-chevron-down"></i></span>
                        <div class="dropdown-content">
                            <a href="basis-pengetahuan.php">Basis Pengetahuan</a>
                            <a href="gaya-belajar.php">Gaya Belajar</a>
                            <a href="manajemen-data.php">Manajemen Data</a>
                        </div>
                    </div>
                    <a href="logout.php" class="login" id="logout"><button>Logout</button></a>
                </div>
            </div>
            <div class="content form">
                <form action="" method="post" name="form-data" id="form-data">
                    <div class="form-input">
                        <label for="">NIK</label>
                        <input type="number" name="nik" id="nik" placeholder="Masukkan nik..." autocomplete="off" required>
                    </div>
                    <div class="form-input">
                        <label for="">Nama Anak</label>
                        <input type="text" name="nama_anak" id="nama_anak" placeholder="Masukkan nama anak..." autocomplete="off" required>
                    </div>
                    <div class="form-input">
                        <label for="">Usia</label>
                        <input type="number" name="usia" id="usia" placeholder="Masukkan usia..." autocomplete="off" required>
                    </div>
                    <div class="form-input">
                        <label for="">Nama Orang Tua</label>
                        <input type="text" name="nama_ortu" id="nama_ortu" placeholder="Masukkan nama orang tua..." autocomplete="off" required>
                    </div>
                    <div class="form-input">
                        <label for="">Alamat</label>
                        <input type="text" name="alamat" id="alamat" placeholder="Masukkan alamat..." autocomplete="off" required>
                    </div>
                    <div class="form-button">
                        <button type="submit" name="kirim-data" id="btn-d">Selanjutnya</button>
                    </div>
                </form>

                <div class="image" id="image">
                    <img src="img/undraw_learning_re_32qv.svg" alt="">
                </div>
            </div>

            <div class="ques" id="ques">
                <div class="btn-back">
                    <form action="" method="post">
                        <button type="submit" class="back" name="back" id="back">Batalkan evaluasi</button>
                    </form>
                </div>

                <form action="" method="post">
                    <?php $gaya = select("SELECT * FROM gaya"); ?>
                    <?php foreach ($gaya as $gayaVal) : ?>
                        <?php
                        $gaya_id = $gayaVal["id_gaya"];
                        $ciri = select("SELECT * FROM ciri WHERE gaya_id = $gaya_id");
                        $gayaName = $gayaVal["gaya"];
                        ?>
                        <div class="quesItem">
                            <div class="title">
                                <h3>Pertanyaan <?= $gayaVal['gaya']; ?></h3>
                            </div>
                            <div class="content form">
                                <?php $i = 1; ?>
                                <?php foreach ($ciri as $ciriVal) : ?>
                                    <?php $var = 'ques' . $i . $gayaName; ?>
                                    <div class="form-ques">
                                        <label for=""><?= $ciriVal["ciri"] ?></label>
                                        <div class="radio-area">
                                            <div class="radio-btn">
                                                <input type="radio" name="<?= $var; ?>" value=1 required>
                                                <label for="">Sangat Baik</label>
                                            </div>
                                            <div class="radio-btn">
                                                <input type="radio" name="<?= $var; ?>" value=0.8>
                                                <label for="">Baik</label>
                                            </div>
                                            <div class="radio-btn">
                                                <input type="radio" name="<?= $var; ?>" value=0.6>
                                                <label for="">Cukup</label>
                                            </div>
                                            <div class="radio-btn">
                                                <input type="radio" name="<?= $var; ?>" value=0.2>
                                                <label for="">Kurang</label>
                                            </div>
                                            <div class="radio-btn">
                                                <input type="radio" name="<?= $var; ?>" value=0>
                                                <label for="">Tidak</label>
                                            </div>
                                        </div>
                                    </div>
                                    <?php $i++; ?>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    <div class="ques-button">
                        <button type="submit" name="kirim-ques">Selanjutnya</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php
    if (isset($_POST["kirim-data"])) {
        $nik = htmlspecialchars($_POST["nik"]);
        $nama_anak = htmlspecialchars($_POST["nama_anak"]);
        $usia = htmlspecialchars($_POST["usia"]);
        $nama_ortu = htmlspecialchars($_POST["nama_ortu"]);
        $alamat = htmlspecialchars($_POST["alamat"]);

        $result = select("SELECT * FROM data_siswa WHERE nik = $nik")[0];
        $id_siswa = $result["id_siswa"];
        $nama = $result["nama_anak"];

        if (is_null($nama)) {
            echo "<script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Data siswa berhasil disimpan',
                        showConfirmButton: false,
                        timer: 2000
                    })

                    $('#form-data').css('display', 'none');
                    $('#image').css('display', 'none');
                    $('#ques').css('display', 'flex');
                    $('#ques').css('justify-content', 'center');
                    $('#ques').css('align-items', 'center');
                    $('#ques').css('flex-direction', 'column');
                    $('#dropdown').css('display', 'none');
                    $('#logout').css('display', 'none');
                </script>";
            mysqli_query($conn, "INSERT INTO data_siswa (nik, nama_anak, usia, nama_ortu, alamat) 
                        VALUES ($nik, '$nama_anak', $usia, '$nama_ortu', '$alamat')");
            $last = select("SELECT * FROM data_siswa ORDER BY id_siswa DESC LIMIT 1")[0];
            $_SESSION['id_siswa'] = '';
            $_SESSION['id_siswa'] = $last["id_siswa"];
        } else {
            echo "<script>
                    Swal.fire({
                        icon: 'warning',
                        title: 'Data siswa ini telah terdaftar dengan nama {$nama}!',
                        showConfirmButton: false,
                        text: 'Hasil evaluasi dan data siswa akan diperbarui',
                        timer: 2000
                    })
                    $('#form-data').css('display', 'none');
                    $('#image').css('display', 'none');
                    $('#ques').css('display', 'flex');
                    $('#ques').css('justify-content', 'center');
                    $('#ques').css('align-items', 'center');
                    $('#ques').css('flex-direction', 'column');
                    $('#dropdown').css('display', 'none');
                    $('#logout').css('display', 'none');
            </script>";
            mysqli_query($conn, "UPDATE data_siswa SET nama_anak = '$nama_anak', usia = $usia, nama_ortu = '$nama_ortu', alamat = '$alamat' WHERE nik = $nik");
            $_SESSION['id_siswa'] = '';
            $_SESSION['id_siswa'] = $id_siswa;
        }
    }
    ?>

    <?php
    if (isset($_POST["back"])) {
        $row = select("SELECT id_siswa FROM data_siswa ORDER BY id_siswa DESC")[0];
        $id_siswa = $row["id_siswa"];
        mysqli_query($conn, "DELETE FROM data_siswa WHERE id_siswa = '$id_siswa'");
        header('location: index.php');
    }
    ?>

    <?php
    if (isset($_POST["kirim-ques"])) {
        $idSiswa = $_SESSION['id_siswa'];
        $gaya = select("SELECT * FROM gaya");
        foreach ($gaya as $gayaVal) {
            $gayaName = $gayaVal["gaya"];
            $gaya_id = $gayaVal["id_gaya"];
            $ciri = select("SELECT * FROM ciri WHERE gaya_id = $gaya_id");
            for ($i = 1, $j = 0; $i <= count($ciri); $i++, $j++) {
                $var = 'ques' . $i . $gayaName;
                ${'ques' . $i . $gayaName} = $_POST["$var"];
                ${'valques' . $i . $gayaName} = $ciri[$j]["pakar"] * ${'ques' . $i . $gayaName};
            }
            for ($x = 1; $x < count($ciri); $x++) {
                ${'resultvalques' . $x . $gayaName} = ${'valques' . $x . $gayaName} + ${'valques' . ($x + 1) . $gayaName} * (1 - ${'valques' . $x . $gayaName});
                for ($y = 1; $y <= count($ciri) - 2; $y++) {
                    ${'resultvalques' . ($y + 1) . $gayaName} = ${'resultvalques' . $y . $gayaName} + ${'valques' . ($y + 2) . $gayaName} * (1 - ${'resultvalques' . $y . $gayaName});
                }
                ${'persen' . $gayaName} = ${'resultvalques' . $y . $gayaName} * 100;
                ${'persen' . $gayaName} = number_format(${'persen' . $gayaName}, 2);
                $persenVal = ${'persen' . $gayaName};
            }
            mysqli_query($conn, "UPDATE data_siswa SET $gayaName = '$persenVal' WHERE id_siswa = $idSiswa");
        }

        $data = select("SELECT * FROM data_siswa WHERE id_siswa = $idSiswa")[0];
        $arrVal = [];

        foreach ($gaya as $gayaVal) {
            $gayaName = $gayaVal["gaya"];
            array_push($arrVal, $data["$gayaName"]);
        }

        array_unshift($arrVal, "");
        unset($arrVal[0]);

        $i = 0;
        $j = 0;

        foreach ($arrVal as $key => $value) {
            if ($value > $i) {
                $i = $value;
                $j = $key;
            }
        }

        $solusi = select("SELECT * FROM solusi WHERE gaya_id = $j");
        $solusiVar = '';

        $x = 1;
        foreach ($solusi as $solusiItem) {
            $solusiVal = $solusiItem['solusi'];
            $solusiVar .= "$x. $solusiVal <br>";
            $x++;
        }

        $nilaiVar = '';
        $y = 0;
        foreach ($gaya as $gayaVal) {
            $gayaName = $gayaVal["gaya"];
            array_push($arrVal, $data["$gayaName"]);

            if ($y == 0) {
                $nilaiVar .= $data["$gayaName"] . " % $gayaName, ";
            } else {
                $nilaiVar .= $data["$gayaName"] . " % $gayaName. ";
            }
            $y++;
        }

        $hasil = 'Hasil evaluasi gaya belajar siswa dengan nama ' . $data["nama_anak"] . ', usia ' . $data["usia"] . ' tahun adalah ' . $nilaiVar . '<br><br> <div style="text-align: left;"><b>Solusi:</b> <br>' . $solusiVar . '</div>';

        echo "<script>
                Swal.fire({
                    icon: 'success',
                    width: 700,
                    title: 'Proses evaluasi berhasil!',
                    showConfirmButton: true,
                    html: '$hasil'
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.location.href = 'index.php';
                    }
                })
            </script>";
    ?>
    <?php } ?>
</body>

</html>