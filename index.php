<?php
session_start();
require 'config/functions.php';

if (isset($_SESSION["login"])) {
    header('location: index.php');
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
                    <a href="login.php" class="login"><button>Logout</button></a>
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
                        <button type="submit" class="back" name="back" id="back"><a href="">Batalkan Evaluasi</a></button>
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
                                <label for="">Apakah anak selalu terlihat rapi (segera menyimpan kembali barang yang telah digunakan)?</label>
                                <div class="radio-area">
                                    <div class="radio-btn">
                                        <input type="radio" name="ques1v" value="setuju" required>
                                        <label for="">Setuju</label>
                                    </div>
                                    <div class="radio-btn">
                                        <input type="radio" name="ques1v" value="tidak setuju">
                                        <label for="">Tidak setuju</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-ques">
                                <label for="">Apakah anak suka menggambar?</label>
                                <div class="radio-area">
                                    <div class="radio-btn">
                                        <input type="radio" name="ques2v" value="setuju" required>
                                        <label for="">Setuju</label>
                                    </div>
                                    <div class="radio-btn">
                                        <input type="radio" name="ques2v" value="tidak setuju">
                                        <label for="">Tidak setuju</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-ques">
                                <label for="">Apakah anak suka belajar dari video?</label>
                                <div class="radio-area">
                                    <div class="radio-btn">
                                        <input type="radio" name="ques3v" value="setuju" required>
                                        <label for="">Setuju</label>
                                    </div>
                                    <div class="radio-btn">
                                        <input type="radio" name="ques3v" value="tidak setuju">
                                        <label for="">Tidak setuju</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-ques">
                                <label for="">Apakah anak lebih suka membaca dari pada dibacakan?</label>
                                <div class="radio-area">
                                    <div class="radio-btn">
                                        <input type="radio" name="ques4v" value="setuju" required>
                                        <label for="">Setuju</label>
                                    </div>
                                    <div class="radio-btn">
                                        <input type="radio" name="ques4v" value="tidak setuju">
                                        <label for="">Tidak setuju</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-ques">
                                <label for="">Apakah anak mementingkan penampilannya?</label>
                                <div class="radio-area">
                                    <div class="radio-btn">
                                        <input type="radio" name="ques5v" value="setuju" required>
                                        <label for="">Setuju</label>
                                    </div>
                                    <div class="radio-btn">
                                        <input type="radio" name="ques5v" value="tidak setuju">
                                        <label for="">Tidak setuju</label>
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
                                <label for="">Apakah anak mudah terganggu dengan keramaian?</label>
                                <div class="radio-area">
                                    <div class="radio-btn">
                                        <input type="radio" name="ques1a" value="setuju" required>
                                        <label for="">Setuju</label>
                                    </div>
                                    <div class="radio-btn">
                                        <input type="radio" name="ques1a" value="tidak setuju">
                                        <label for="">Tidak setuju</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-ques">
                                <label for="">Apakah anak berani dalam berbicara didepan teman-temannya atau orang banyak?</label>
                                <div class="radio-area">
                                    <div class="radio-btn">
                                        <input type="radio" name="ques2a" value="setuju" required>
                                        <label for="">Setuju</label>
                                    </div>
                                    <div class="radio-btn">
                                        <input type="radio" name="ques2a" value="tidak setuju">
                                        <label for="">Tidak setuju</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-ques">
                                <label for="">Apakah anak suka berbicara sendiri saat belajar?</label>
                                <div class="radio-area">
                                    <div class="radio-btn">
                                        <input type="radio" name="ques3a" value="setuju" required>
                                        <label for="">Setuju</label>
                                    </div>
                                    <div class="radio-btn">
                                        <input type="radio" name="ques3a" value="tidak setuju">
                                        <label for="">Tidak setuju</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-ques">
                                <label for="">Apakah anak mengingat apa yang telah diinstruksikan dengan ucapan?</label>
                                <div class="radio-area">
                                    <div class="radio-btn">
                                        <input type="radio" name="ques4a" value="setuju" required>
                                        <label for="">Setuju</label>
                                    </div>
                                    <div class="radio-btn">
                                        <input type="radio" name="ques4a" value="tidak setuju">
                                        <label for="">Tidak setuju</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-ques">
                                <label for="">Apakah anak menyukai musik & bernyanyi?</label>
                                <div class="radio-area">
                                    <div class="radio-btn">
                                        <input type="radio" name="ques5a" value="setuju" required>
                                        <label for="">Setuju</label>
                                    </div>
                                    <div class="radio-btn">
                                        <input type="radio" name="ques5a" value="tidak setuju">
                                        <label for="">Tidak setuju</label>
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
                                <label for="">Apakah anak terlihat aktif?</label>
                                <div class="radio-area">
                                    <div class="radio-btn">
                                        <input type="radio" name="ques1k" value="setuju" required>
                                        <label for="">Setuju</label>
                                    </div>
                                    <div class="radio-btn">
                                        <input type="radio" name="ques1k" value="tidak setuju">
                                        <label for="">Tidak setuju</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-ques">
                                <label for="">Apakah anak menyukai belajar dengan cara dipraktekkan terlebih dahulu?</label>
                                <div class="radio-area">
                                    <div class="radio-btn">
                                        <input type="radio" name="ques2k" value="setuju" required>
                                        <label for="">Setuju</label>
                                    </div>
                                    <div class="radio-btn">
                                        <input type="radio" name="ques2k" value="tidak setuju">
                                        <label for="">Tidak setuju</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-ques">
                                <label for="">Apakah anak tidak bisa duduk diam untuk waktu yang lama?</label>
                                <div class="radio-area">
                                    <div class="radio-btn">
                                        <input type="radio" name="ques3k" value="setuju" required>
                                        <label for="">Setuju</label>
                                    </div>
                                    <div class="radio-btn">
                                        <input type="radio" name="ques3k" value="tidak setuju">
                                        <label for="">Tidak setuju</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-ques">
                                <label for="">Apakah anak menggunakan jari sebagai penunjuk ketika membaca?</label>
                                <div class="radio-area">
                                    <div class="radio-btn">
                                        <input type="radio" name="ques4k" value="setuju" required>
                                        <label for="">Setuju</label>
                                    </div>
                                    <div class="radio-btn">
                                        <input type="radio" name="ques4k" value="tidak setuju">
                                        <label for="">Tidak setuju</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-ques">
                                <label for="">Apakah anak menyukai permainan dan olahraga?</label>
                                <div class="radio-area">
                                    <div class="radio-btn">
                                        <input type="radio" name="ques5k" value="setuju" required>
                                        <label for="">Setuju</label>
                                    </div>
                                    <div class="radio-btn">
                                        <input type="radio" name="ques5k" value="tidak setuju">
                                        <label for="">Tidak setuju</label>
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
        echo "
            <script>
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

        $nik = htmlspecialchars($_POST["nik"]);
        $nama_anak = htmlspecialchars($_POST["nama_anak"]);
        $usia = htmlspecialchars($_POST["usia"]);
        $nama_ortu = htmlspecialchars($_POST["nama_ortu"]);
        $alamat = htmlspecialchars($_POST["alamat"]);

        $result = mysqli_query($conn, "SELECT * FROM data_siswa WHERE nik = $nik");

        if (mysqli_fetch_assoc($result)) {
            echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Data siswa ini telah terdaftar!',
                    showConfirmButton: false,
                    text: 'Periksa kembali data siswa yang dimasukkan'
                })
                setTimeout(function(){
                    document.location.href = 'index.php';
                }, 2000);
            </script>";

            return false;
        }

        mysqli_query($conn, "INSERT INTO data_siswa (nik, nama_anak, usia, nama_ortu, alamat) 
                        VALUES ($nik, '$nama_anak', $usia, '$nama_ortu', '$alamat')");
    }
    ?>

    <?php
    if (isset($_POST["back"])) {
        $row = select("SELECT id FROM data_siswa ORDER BY id DESC")[0];
        $id = $row["id"];
        mysqli_query($conn, "DELETE FROM data_siswa WHERE id = $id");
    }
    ?>

    <?php
    if (isset($_POST["kirim-ques"])) {
        $row = select("SELECT id FROM data_siswa ORDER BY id DESC")[0];
        $id = $row["id"];

        $ques1v = $_POST["ques1v"];
        $ques2v = $_POST["ques2v"];
        $ques3v = $_POST["ques3v"];
        $ques4v = $_POST["ques4v"];
        $ques5v = $_POST["ques5v"];

        $ques1a = $_POST["ques1a"];
        $ques2a = $_POST["ques2a"];
        $ques3a = $_POST["ques3a"];
        $ques4a = $_POST["ques4a"];
        $ques5a = $_POST["ques5a"];

        $ques1k = $_POST["ques1k"];
        $ques2k = $_POST["ques2k"];
        $ques3k = $_POST["ques3k"];
        $ques4k = $_POST["ques4k"];
        $ques5k = $_POST["ques5k"];

        mysqli_query($conn, "INSERT INTO kuesioner (siswa_id, pv1, pv2, pv3, pv4, pv5, pa1, pa2, pa3, pa4, pa5, pk1, pk2, pk3, pk4, pk5) 
                        VALUES ($id, '$ques1v','$ques2v','$ques3v','$ques4v','$ques5v','$ques1a','$ques2a','$ques3a','$ques4a','$ques5a','$ques1k','$ques2k','$ques3k','$ques4k','$ques5k')");

        $data = select("SELECT * FROM kuesioner ORDER BY id DESC LIMIT 1")[0];
        $idSiswa = $data["siswa_id"];

        $data_siswa = select("SELECT * FROM data_siswa WHERE id = $idSiswa")[0];
        $nama = $data_siswa["nama_anak"];
        $usia = $data_siswa["usia"];

        $dataVisual1 = $data["pv1"];
        $dataVisual2 = $data["pv2"];
        $dataVisual3 = $data["pv3"];
        $dataVisual4 = $data["pv4"];
        $dataVisual5 = $data["pv5"];

        $dataAuditori1 = $data["pa1"];
        $dataAuditori2 = $data["pa2"];
        $dataAuditori3 = $data["pa3"];
        $dataAuditori4 = $data["pa4"];
        $dataAuditori5 = $data["pa5"];

        $dataKinestetik1 = $data["pk1"];
        $dataKinestetik2 = $data["pk2"];
        $dataKinestetik3 = $data["pk3"];
        $dataKinestetik4 = $data["pk4"];
        $dataKinestetik5 = $data["pk5"];

        $arrVisual = [];
        array_push($arrVisual, $dataVisual1, $dataVisual2, $dataVisual3, $dataVisual4, $dataVisual5);
        $valVisual = array_count_values($arrVisual);
        $persenVisual = $valVisual["setuju"] * 20;

        $arrAuditori = [];
        array_push($arrAuditori, $dataAuditori1, $dataAuditori2, $dataAuditori3, $dataAuditori4, $dataAuditori5);
        $valAuditori = array_count_values($arrAuditori);
        $persenAuditori = $valAuditori["setuju"] * 20;

        $arrKinestetik = [];
        array_push($arrKinestetik, $dataKinestetik1, $dataKinestetik2, $dataKinestetik3, $dataKinestetik4, $dataKinestetik5);
        $valKinestetik = array_count_values($arrKinestetik);
        $persenKinestetik = $valKinestetik["setuju"] * 20;

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