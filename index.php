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
                    <a href="manajemenData.php" class="manajemen"><button>Manajemen Data</button></a>
                    <a href="logout.php" class="login"><button>Logout</button></a>
                </div>
            </div>
            <div class="content">
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
                        <button type="submit" class="back" name="back" id="back">Batalkan Evaluasi</button>
                    </form>
                </div>

                <form action="" method="post">
                    <div class="quesItem">
                        <!-- Pertanyaan Visual -->
                        <div class="title">
                            <h3>Pertanyaan Visual</h3>
                        </div>
                        <div class="content">
                            <div class="form-ques">
                                <label for="">Anak selalu terlihat rapi (menyusun kembali barang yang telah digunakan).</label>
                                <div class="radio-area">
                                    <div class="radio-btn">
                                        <input type="radio" name="ques1v" value=1 required>
                                        <label for="">Sangat Baik</label>
                                    </div>
                                    <div class="radio-btn">
                                        <input type="radio" name="ques1v" value=0.8>
                                        <label for="">Baik</label>
                                    </div>
                                    <div class="radio-btn">
                                        <input type="radio" name="ques1v" value=0.6>
                                        <label for="">Cukup</label>
                                    </div>
                                    <div class="radio-btn">
                                        <input type="radio" name="ques1v" value=0.4>
                                        <label for="">Kurang</label>
                                    </div>
                                    <div class="radio-btn">
                                        <input type="radio" name="ques1v" value=0>
                                        <label for="">Tidak</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-ques">
                                <label for="">Anak suka dengan gambaran/menggambar.</label>
                                <div class="radio-area">
                                    <div class="radio-btn">
                                        <input type="radio" name="ques2v" value=1 required>
                                        <label for="">Sangat Baik</label>
                                    </div>
                                    <div class="radio-btn">
                                        <input type="radio" name="ques2v" value=0.8>
                                        <label for="">Baik</label>
                                    </div>
                                    <div class="radio-btn">
                                        <input type="radio" name="ques2v" value=0.6>
                                        <label for="">Cukup</label>
                                    </div>
                                    <div class="radio-btn">
                                        <input type="radio" name="ques2v" value=0.4>
                                        <label for="">Kurang</label>
                                    </div>
                                    <div class="radio-btn">
                                        <input type="radio" name="ques2v" value=0>
                                        <label for="">Tidak</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-ques">
                                <label for="">Anak suka belajar dari video.</label>
                                <div class="radio-area">
                                    <div class="radio-btn">
                                        <input type="radio" name="ques3v" value=1 required>
                                        <label for="">Sangat Baik</label>
                                    </div>
                                    <div class="radio-btn">
                                        <input type="radio" name="ques3v" value=0.8>
                                        <label for="">Baik</label>
                                    </div>
                                    <div class="radio-btn">
                                        <input type="radio" name="ques3v" value=0.6>
                                        <label for="">Cukup</label>
                                    </div>
                                    <div class="radio-btn">
                                        <input type="radio" name="ques3v" value=0.4>
                                        <label for="">Kurang</label>
                                    </div>
                                    <div class="radio-btn">
                                        <input type="radio" name="ques3v" value=0>
                                        <label for="">Tidak</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-ques">
                                <label for="">Anak lebih suka membaca dari pada dibacakan.</label>
                                <div class="radio-area">
                                    <div class="radio-btn">
                                        <input type="radio" name="ques4v" value=1 required>
                                        <label for="">Sangat Baik</label>
                                    </div>
                                    <div class="radio-btn">
                                        <input type="radio" name="ques4v" value=0.8>
                                        <label for="">Baik</label>
                                    </div>
                                    <div class="radio-btn">
                                        <input type="radio" name="ques4v" value=0.6>
                                        <label for="">Cukup</label>
                                    </div>
                                    <div class="radio-btn">
                                        <input type="radio" name="ques4v" value=0.4>
                                        <label for="">Kurang</label>
                                    </div>
                                    <div class="radio-btn">
                                        <input type="radio" name="ques4v" value=0>
                                        <label for="">Tidak</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-ques">
                                <label for="">Anak selalu memperhatikan penampilannya</label>
                                <div class="radio-area">
                                    <div class="radio-area">
                                        <div class="radio-btn">
                                            <input type="radio" name="ques5v" value=1 required>
                                            <label for="">Sangat Baik</label>
                                        </div>
                                        <div class="radio-btn">
                                            <input type="radio" name="ques5v" value=0.8>
                                            <label for="">Baik</label>
                                        </div>
                                        <div class="radio-btn">
                                            <input type="radio" name="ques5v" value=0.6>
                                            <label for="">Cukup</label>
                                        </div>
                                        <div class="radio-btn">
                                            <input type="radio" name="ques5v" value=0.4>
                                            <label for="">Kurang</label>
                                        </div>
                                        <div class="radio-btn">
                                            <input type="radio" name="ques5v" value=0>
                                            <label for="">Tidak</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="quesItem">
                        <!-- Pertanyaan Auditori -->
                        <div class="title">
                            <h3>Pertanyaan Auditori</h3>
                        </div>
                        <div class="content">
                            <div class="form-ques">
                                <label for="">Anak mudah terganggu dengan keramaian saat belajar.</label>
                                <div class="radio-area">
                                    <div class="radio-btn">
                                        <input type="radio" name="ques1a" value=1 required>
                                        <label for="">Sangat Baik</label>
                                    </div>
                                    <div class="radio-btn">
                                        <input type="radio" name="ques1a" value=0.8>
                                        <label for="">Baik</label>
                                    </div>
                                    <div class="radio-btn">
                                        <input type="radio" name="ques1a" value=0.6>
                                        <label for="">Cukup</label>
                                    </div>
                                    <div class="radio-btn">
                                        <input type="radio" name="ques1a" value=0.4>
                                        <label for="">Kurang</label>
                                    </div>
                                    <div class="radio-btn">
                                        <input type="radio" name="ques1a" value=0>
                                        <label for="">Tidak</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-ques">
                                <label for="">Anak berani berbicara didepan banyak orang.</label>
                                <div class="radio-area">
                                    <div class="radio-btn">
                                        <input type="radio" name="ques2a" value=1 required>
                                        <label for="">Sangat Baik</label>
                                    </div>
                                    <div class="radio-btn">
                                        <input type="radio" name="ques2a" value=0.8>
                                        <label for="">Baik</label>
                                    </div>
                                    <div class="radio-btn">
                                        <input type="radio" name="ques2a" value=0.6>
                                        <label for="">Cukup</label>
                                    </div>
                                    <div class="radio-btn">
                                        <input type="radio" name="ques2a" value=0.4>
                                        <label for="">Kurang</label>
                                    </div>
                                    <div class="radio-btn">
                                        <input type="radio" name="ques2a" value=0>
                                        <label for="">Tidak</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-ques">
                                <label for="">Anak suka berbicara sendiri saat belajar.</label>
                                <div class="radio-area">
                                    <div class="radio-btn">
                                        <input type="radio" name="ques3a" value=1 required>
                                        <label for="">Sangat Baik</label>
                                    </div>
                                    <div class="radio-btn">
                                        <input type="radio" name="ques3a" value=0.8>
                                        <label for="">Baik</label>
                                    </div>
                                    <div class="radio-btn">
                                        <input type="radio" name="ques3a" value=0.6>
                                        <label for="">Cukup</label>
                                    </div>
                                    <div class="radio-btn">
                                        <input type="radio" name="ques3a" value=0.4>
                                        <label for="">Kurang</label>
                                    </div>
                                    <div class="radio-btn">
                                        <input type="radio" name="ques3a" value=0>
                                        <label for="">Tidak</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-ques">
                                <label for="">Anak mudah mengingat apa yang telah diinstruksikan dengan ucapan.</label>
                                <div class="radio-area">
                                    <div class="radio-btn">
                                        <input type="radio" name="ques4a" value=1 required>
                                        <label for="">Sangat Baik</label>
                                    </div>
                                    <div class="radio-btn">
                                        <input type="radio" name="ques4a" value=0.8>
                                        <label for="">Baik</label>
                                    </div>
                                    <div class="radio-btn">
                                        <input type="radio" name="ques4a" value=0.6>
                                        <label for="">Cukup</label>
                                    </div>
                                    <div class="radio-btn">
                                        <input type="radio" name="ques4a" value=0.4>
                                        <label for="">Kurang</label>
                                    </div>
                                    <div class="radio-btn">
                                        <input type="radio" name="ques4a" value=0>
                                        <label for="">Tidak</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-ques">
                                <label for="">Anak suka musik dan bernyanyi.</label>
                                <div class="radio-area">
                                    <div class="radio-btn">
                                        <input type="radio" name="ques5a" value=1 required>
                                        <label for="">Sangat Baik</label>
                                    </div>
                                    <div class="radio-btn">
                                        <input type="radio" name="ques5a" value=0.8>
                                        <label for="">Baik</label>
                                    </div>
                                    <div class="radio-btn">
                                        <input type="radio" name="ques5a" value=0.6>
                                        <label for="">Cukup</label>
                                    </div>
                                    <div class="radio-btn">
                                        <input type="radio" name="ques5a" value=0.4>
                                        <label for="">Kurang</label>
                                    </div>
                                    <div class="radio-btn">
                                        <input type="radio" name="ques5a" value=0>
                                        <label for="">Tidak</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="quesItem">
                        <!-- Pertanyaan Kinestetik -->
                        <div class="title">
                            <h3>Pertanyaan Kinestetik</h3>
                        </div>
                        <div class="content">
                            <div class="form-ques">
                                <label for="">Anak terlihat aktif.</label>
                                <div class="radio-area">
                                    <div class="radio-btn">
                                        <input type="radio" name="ques1k" value=1 required>
                                        <label for="">Sangat Baik</label>
                                    </div>
                                    <div class="radio-btn">
                                        <input type="radio" name="ques1k" value=0.8>
                                        <label for="">Baik</label>
                                    </div>
                                    <div class="radio-btn">
                                        <input type="radio" name="ques1k" value=0.6>
                                        <label for="">Cukup</label>
                                    </div>
                                    <div class="radio-btn">
                                        <input type="radio" name="ques1k" value=0.4>
                                        <label for="">Kurang</label>
                                    </div>
                                    <div class="radio-btn">
                                        <input type="radio" name="ques1k" value=0>
                                        <label for="">Tidak</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-ques">
                                <label for="">Anak lebih menyukai belajar secara langsung.</label>
                                <div class="radio-area">
                                    <div class="radio-btn">
                                        <input type="radio" name="ques2k" value=1 required>
                                        <label for="">Sangat Baik</label>
                                    </div>
                                    <div class="radio-btn">
                                        <input type="radio" name="ques2k" value=0.8>
                                        <label for="">Baik</label>
                                    </div>
                                    <div class="radio-btn">
                                        <input type="radio" name="ques2k" value=0.6>
                                        <label for="">Cukup</label>
                                    </div>
                                    <div class="radio-btn">
                                        <input type="radio" name="ques2k" value=0.4>
                                        <label for="">Kurang</label>
                                    </div>
                                    <div class="radio-btn">
                                        <input type="radio" name="ques2k" value=0>
                                        <label for="">Tidak</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-ques">
                                <label for="">Anak tidak bisa duduk diam dalam waktu lama.</label>
                                <div class="radio-area">
                                    <div class="radio-btn">
                                        <input type="radio" name="ques3k" value=1 required>
                                        <label for="">Sangat Baik</label>
                                    </div>
                                    <div class="radio-btn">
                                        <input type="radio" name="ques3k" value=0.8>
                                        <label for="">Baik</label>
                                    </div>
                                    <div class="radio-btn">
                                        <input type="radio" name="ques3k" value=0.6>
                                        <label for="">Cukup</label>
                                    </div>
                                    <div class="radio-btn">
                                        <input type="radio" name="ques3k" value=0.4>
                                        <label for="">Kurang</label>
                                    </div>
                                    <div class="radio-btn">
                                        <input type="radio" name="ques3k" value=0>
                                        <label for="">Tidak</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-ques">
                                <label for="">Anak menggunakan jari sebagai penunjuk saat membaca.</label>
                                <div class="radio-area">
                                    <div class="radio-btn">
                                        <input type="radio" name="ques4k" value=1 required>
                                        <label for="">Sangat Baik</label>
                                    </div>
                                    <div class="radio-btn">
                                        <input type="radio" name="ques4k" value=0.8>
                                        <label for="">Baik</label>
                                    </div>
                                    <div class="radio-btn">
                                        <input type="radio" name="ques4k" value=0.6>
                                        <label for="">Cukup</label>
                                    </div>
                                    <div class="radio-btn">
                                        <input type="radio" name="ques4k" value=0.4>
                                        <label for="">Kurang</label>
                                    </div>
                                    <div class="radio-btn">
                                        <input type="radio" name="ques4k" value=0>
                                        <label for="">Tidak</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-ques">
                                <label for="">Anak menyukai permainan dan olahraga.</label>
                                <div class="radio-area">
                                    <div class="radio-btn">
                                        <input type="radio" name="ques5k" value=1 required>
                                        <label for="">Sangat Baik</label>
                                    </div>
                                    <div class="radio-btn">
                                        <input type="radio" name="ques5k" value=0.8>
                                        <label for="">Baik</label>
                                    </div>
                                    <div class="radio-btn">
                                        <input type="radio" name="ques5k" value=0.6>
                                        <label for="">Cukup</label>
                                    </div>
                                    <div class="radio-btn">
                                        <input type="radio" name="ques5k" value=0.4>
                                        <label for="">Kurang</label>
                                    </div>
                                    <div class="radio-btn">
                                        <input type="radio" name="ques5k" value=0>
                                        <label for="">Tidak</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ques-button">
                            <button type="submit" name="kirim-ques">Selanjutnya</button>
                        </div>
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
        $id = $result["id"];
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
                </script>";
            mysqli_query($conn, "INSERT INTO data_siswa (nik, nama_anak, usia, nama_ortu, alamat) 
                        VALUES ($nik, '$nama_anak', $usia, '$nama_ortu', '$alamat')");
        } else {
            echo "<script>
                    Swal.fire({
                        icon: 'warning',
                        title: 'Data siswa ini telah terdaftar dengan nama ${nama}!',
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
            </script>";
            mysqli_query($conn, "UPDATE data_siswa SET nama_anak = '$nama_anak', usia = $usia, nama_ortu = '$nama_ortu', alamat = '$alamat' WHERE nik = $nik");
            $_SESSION['id'] = '';
            $_SESSION['id'] = $id;
            $sessId = $_SESSION['id'];
        }
    }
    ?>

    <?php
    if (isset($_POST["back"])) {
        $row = select("SELECT id FROM data_siswa ORDER BY id DESC")[0];
        $id = $row["id"];
        mysqli_query($conn, "DELETE FROM data_siswa WHERE id = '$id'");
        header('location: index.php');
    }
    ?>

    <?php
    if (isset($_POST["kirim-ques"])) {
        $ques1v = $_POST["ques1v"];
        if ($ques1v == 1) {
            $valques1v = 'Sangat Baik';
        } else if ($ques1v == 0.8) {
            $valques1v = 'Baik';
        } else if ($ques1v == 0.6) {
            $valques1v = 'Cukup';
        } else if ($ques1v == 0.4) {
            $valques1v = 'Kurang';
        } else if ($ques1v == 0) {
            $valques1v = 'Tidak';
        }

        $ques2v = $_POST["ques2v"];
        if ($ques2v == 1) {
            $valques2v = 'Sangat Baik';
        } else if ($ques2v == 0.8) {
            $valques2v = 'Baik';
        } else if ($ques2v == 0.6) {
            $valques2v = 'Cukup';
        } else if ($ques2v == 0.4) {
            $valques2v = 'Kurang';
        } else if ($ques2v == 0) {
            $valques2v = 'Tidak';
        }

        $ques3v = $_POST["ques3v"];
        if ($ques3v == 1) {
            $valques3v = 'Sangat Baik';
        } else if ($ques3v == 0.8) {
            $valques3v = 'Baik';
        } else if ($ques3v == 0.6) {
            $valques3v = 'Cukup';
        } else if ($ques3v == 0.4) {
            $valques3v = 'Kurang';
        } else if ($ques3v == 0) {
            $valques3v = 'Tidak';
        }

        $ques4v = $_POST["ques4v"];
        if ($ques4v == 1) {
            $valques4v = 'Sangat Baik';
        } else if ($ques4v == 0.8) {
            $valques4v = 'Baik';
        } else if ($ques4v == 0.6) {
            $valques4v = 'Cukup';
        } else if ($ques4v == 0.4) {
            $valques4v = 'Kurang';
        } else if ($ques4v == 0) {
            $valques4v = 'Tidak';
        }

        $ques5v = $_POST["ques5v"];
        if ($ques5v == 1) {
            $valques5v = 'Sangat Baik';
        } else if ($ques5v == 0.8) {
            $valques5v = 'Baik';
        } else if ($ques5v == 0.6) {
            $valques5v = 'Cukup';
        } else if ($ques5v == 0.4) {
            $valques5v = 'Kurang';
        } else if ($ques5v == 0) {
            $valques5v = 'Tidak';
        }

        $ques1a = $_POST["ques1a"];
        if ($ques1a == 1) {
            $valques1a = 'Sangat Baik';
        } else if ($ques1a == 0.8) {
            $valques1a = 'Baik';
        } else if ($ques1a == 0.6) {
            $valques1a = 'Cukup';
        } else if ($ques1a == 0.4) {
            $valques1a = 'Kurang';
        } else if ($ques1a == 0) {
            $valques1a = 'Tidak';
        }

        $ques2a = $_POST["ques2a"];
        if ($ques2a == 1) {
            $valques2a = 'Sangat Baik';
        } else if ($ques2a == 0.8) {
            $valques2a = 'Baik';
        } else if ($ques2a == 0.6) {
            $valques2a = 'Cukup';
        } else if ($ques2a == 0.4) {
            $valques2a = 'Kurang';
        } else if ($ques2a == 0) {
            $valques2a = 'Tidak';
        }

        $ques3a = $_POST["ques3a"];
        if ($ques3a == 1) {
            $valques3a = 'Sangat Baik';
        } else if ($ques3a == 0.8) {
            $valques3a = 'Baik';
        } else if ($ques3a == 0.6) {
            $valques3a = 'Cukup';
        } else if ($ques3a == 0.4) {
            $valques3a = 'Kurang';
        } else if ($ques3a == 0) {
            $valques3a = 'Tidak';
        }

        $ques4a = $_POST["ques4a"];
        if ($ques4a == 1) {
            $valques4a = 'Sangat Baik';
        } else if ($ques4a == 0.8) {
            $valques4a = 'Baik';
        } else if ($ques4a == 0.6) {
            $valques4a = 'Cukup';
        } else if ($ques4a == 0.4) {
            $valques4a = 'Kurang';
        } else if ($ques4a == 0) {
            $valques4a = 'Tidak';
        }

        $ques5a = $_POST["ques5a"];
        if ($ques5a == 1) {
            $valques5a = 'Sangat Baik';
        } else if ($ques5a == 0.8) {
            $valques5a = 'Baik';
        } else if ($ques5a == 0.6) {
            $valques5a = 'Cukup';
        } else if ($ques5a == 0.4) {
            $valques5a = 'Kurang';
        } else if ($ques5a == 0) {
            $valques5a = 'Tidak';
        }

        $ques1k = $_POST["ques1k"];
        if ($ques1k == 1) {
            $valques1k = 'Sangat Baik';
        } else if ($ques1k == 0.8) {
            $valques1k = 'Baik';
        } else if ($ques1k == 0.6) {
            $valques1k = 'Cukup';
        } else if ($ques1k == 0.4) {
            $valques1k = 'Kurang';
        } else if ($ques1k == 0) {
            $valques1k = 'Tidak';
        }

        $ques2k = $_POST["ques2k"];
        if ($ques2k == 1) {
            $valques2k = 'Sangat Baik';
        } else if ($ques2k == 0.8) {
            $valques2k = 'Baik';
        } else if ($ques2k == 0.6) {
            $valques2k = 'Cukup';
        } else if ($ques2k == 0.4) {
            $valques2k = 'Kurang';
        } else if ($ques2k == 0) {
            $valques2k = 'Tidak';
        }

        $ques3k = $_POST["ques3k"];
        if ($ques3k == 1) {
            $valques3k = 'Sangat Baik';
        } else if ($ques3k == 0.8) {
            $valques3k = 'Baik';
        } else if ($ques3k == 0.6) {
            $valques3k = 'Cukup';
        } else if ($ques3k == 0.4) {
            $valques3k = 'Kurang';
        } else if ($ques3k == 0) {
            $valques3k = 'Tidak';
        }

        $ques4k = $_POST["ques4k"];
        if ($ques4k == 1) {
            $valques4k = 'Sangat Baik';
        } else if ($ques4k == 0.8) {
            $valques4k = 'Baik';
        } else if ($ques4k == 0.6) {
            $valques4k = 'Cukup';
        } else if ($ques4k == 0.4) {
            $valques4k = 'Kurang';
        } else if ($ques4k == 0) {
            $valques4k = 'Tidak';
        }

        $ques5k = $_POST["ques5k"];
        if ($ques5k == 1) {
            $valques5k = 'Sangat Baik';
        } else if ($ques5k == 0.8) {
            $valques5k = 'Baik';
        } else if ($ques5k == 0.6) {
            $valques5k = 'Cukup';
        } else if ($ques5k == 0.4) {
            $valques5k = 'Kurang';
        } else if ($ques5k == 0) {
            $valques5k = 'Tidak';
        }

        if (is_null($sessId)) {
            $row = select("SELECT id FROM data_siswa ORDER BY id DESC")[0];
            $id = $row["id"];
            mysqli_query($conn, "INSERT INTO kuesioner (siswa_id, ques1v, ques2v, ques3v, ques4v, ques5v, ques1a, ques2a, ques3a, ques4a, ques5a, ques1k, ques2k, ques3k, ques4k, ques5k) 
                        VALUES ($id, '$valques1v','$valques2v','$valques3v','$valques4v','$valques5v','$valques1a','$valques2a','$valques3a','$valques4a','$valques5a','$valques1k','$valques2k','$valques3k','$valques4k','$valques5k')");
            $data = select("SELECT * FROM kuesioner ORDER BY id DESC LIMIT 1")[0];
            $idSiswa = $data["siswa_id"];
        } else {
            mysqli_query($conn, "UPDATE kuesioner SET 
                        ques1v = '$valques1v', 
                        ques2v = '$valques2v', 
                        ques3v = '$valques3v',
                        ques4v = '$valques4v', 
                        ques5v = '$valques5v', 
                        ques1a = '$valques1a', 
                        ques2a = '$valques2a', 
                        ques3a = '$valques3a', 
                        ques4a = '$valques4a', 
                        ques5a = '$valques5a',
                        ques1k = '$valques1k', 
                        ques2k = '$valques2k', 
                        ques3k = '$valques3k',
                        ques4k = '$valques4k', 
                        ques5k = '$valques5k'
                        WHERE siswa_id = $sessId");
            $idSiswa = $sessId;
        }

        $data_siswa = select("SELECT * FROM data_siswa WHERE id = $idSiswa")[0];
        $nama = $data_siswa["nama_anak"];
        $usia = $data_siswa["usia"];

        $dataVisual1 = $data["ques1v"];
        $dataVisual2 = $data["ques2v"];
        $dataVisual3 = $data["ques3v"];
        $dataVisual4 = $data["ques4v"];
        $dataVisual5 = $data["ques5v"];

        $dataAuditori1 = $data["ques1a"];
        $dataAuditori2 = $data["ques2a"];
        $dataAuditori3 = $data["ques3a"];
        $dataAuditori4 = $data["ques4a"];
        $dataAuditori5 = $data["ques5a"];

        $dataKinestetik1 = $data["ques1k"];
        $dataKinestetik2 = $data["ques2k"];
        $dataKinestetik3 = $data["ques3k"];
        $dataKinestetik4 = $data["ques4k"];
        $dataKinestetik5 = $data["ques5k"];

        $ques1v = 0.7 * $ques1v;
        $ques2v = 0.8 * $ques2v;
        $ques3v = 0.6 * $ques3v;
        $ques4v = 0.8 * $ques4v;
        $ques5v = 0.4 * $ques5v;
        $ques1a = 0.6 * $ques1a;
        $ques2a = 0.6 * $ques2a;
        $ques3a = 0.7 * $ques3a;
        $ques4a = 0.8 * $ques4a;
        $ques5a = 0.6 * $ques5a;
        $ques1k = 0.8 * $ques1k;
        $ques2k = 0.6 * $ques2k;
        $ques3k = 0.6 * $ques3k;
        $ques4k = 0.7 * $ques4k;
        $ques5k = 0.4 * $ques5k;

        $resultQues1v = $ques1v + $ques2v * (1 - $ques1v);
        $resultQues2v = $resultQues1v + $ques3v * (1 - $resultQues1v);
        $resultQues3v = $resultQues2v + $ques4v * (1 - $resultQues2v);
        $resultQues4v = $resultQues3v + $ques5v * (1 - $resultQues3v);
        $persenVisual = $resultQues4v * 100;
        $persenVisual = number_format($persenVisual, 2);

        $resultQues1a = $ques1a + $ques2a * (1 - $ques1a);
        $resultQues2a = $resultQues1a + $ques3a * (1 - $resultQues1a);
        $resultQues3a = $resultQues2a + $ques4a * (1 - $resultQues2a);
        $resultQues4a = $resultQues3a + $ques5a * (1 - $resultQues3a);
        $persenAuditori = $resultQues4a * 100;
        $persenAuditori = number_format($persenAuditori, 2);

        $resultQues1k = $ques1k + $ques2k * (1 - $ques1k);
        $resultQues2k = $resultQues1k + $ques3k * (1 - $resultQues1k);
        $resultQues3k = $resultQues2k + $ques4k * (1 - $resultQues2k);
        $resultQues4k = $resultQues3k + $ques5k * (1 - $resultQues3k);
        $persenKinestetik = $resultQues4k * 100;
        $persenKinestetik = number_format($persenKinestetik, 2);

        mysqli_query($conn, "UPDATE data_siswa SET visual = '$persenVisual', auditori = '$persenAuditori', kinestetik = '$persenKinestetik' WHERE id = $idSiswa");
        $hasil = "Hasil evaluasi gaya belajar siswa dengan nama " . $nama . ", usia " . $usia . " tahun adalah " . $persenVisual . " % Visual, " . $persenAuditori . " % Auditori, dan " . $persenKinestetik . " % Kinestetik.";

        echo "<script>
                Swal.fire({
                    icon: 'success',
                    title: 'Proses evaluasi berhasil!',
                    showConfirmButton: true,
                    text: '${hasil}'
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