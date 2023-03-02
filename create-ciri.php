<?php
session_start();
require 'config/functions.php';

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
    <link rel="stylesheet" href="css/styleLoginRegistrasi.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="js/sweetalert2.all.min.js"></script>
    <script src="js/script.js"></script>
    <title>Halaman Tambah Ciri</title>
</head>

<body>
    <div class="area">
        <div class="container">
            <div class="header">
                <h2>Tambah Ciri</h2>
            </div>
            <div class="content ciri">
                <form action="" method="post">
                    <div class="form-input">
                        <label for="ciri">Ciri Ciri</label>
                        <input type="text" name="ciri" id="ciri" autocomplete="off" required>
                    </div>
                    <div class="form-input">
                        <label for="gaya">Gaya Belajar</label>
                        <select name="gaya" id="gaya" required>
                            <?php $gaya = select("SELECT * FROM gaya"); ?>
                            <option value="" selected disabled>Pilih</option>
                            <?php foreach ($gaya as $row) : ?>
                                <option value="<?= $row["gaya"] ?>"><?= $row["gaya"] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-input">
                        <label for="mb">Nilai MB</label>
                        <input type="text" name="mb" id="mb" autocomplete="off" required>
                    </div>
                    <div class="form-input">
                        <label for="md">Nilai MD</label>
                        <input type="text" name="md" id="md" autocomplete="off" required>
                    </div>
                    <div class="form-input not">
                        <label for="pakar">Nilai Pakar</label>
                        <input type="text" name="pakar" id="pakar" autocomplete="off" class="pointer" readonly>
                        <span id="notice" style="color: red; font-size: 14px; font-weight: 700; display: none;">Harap periksa kembali nilai MB dan MD!</span>
                    </div>
                    <div class="form-button" id="btn">
                        <button type="submit" name="tambah" id="tambah">Submit</button>
                        <span><a href="basis-pengetahuan.php">Kembali ke halaman basis pengetahuan</a></span>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#md, #mb').keyup(function() {
                this.value = this.value.replace(/[^0-9\.]/g, '');
                let mb = $('#mb').val();
                let md = $('#md').val();
                let pakar = parseFloat(mb) - parseFloat(md);
                if (isNaN(pakar)) pakar = 0;
                $('#pakar').val(pakar.toFixed(2));
                if (parseFloat(pakar) < 0) {
                    $("#notice").css("display", "block");
                    $('#tambah').prop('disabled', true);
                    $("#btn").css("cursor", "not-allowed");
                    $("#tambah").css("pointer-events", "none");
                } else {
                    $("#notice").css("display", "none");
                    $('#tambah').prop('disabled', false);
                    $("#btn").css("cursor", "pointer");
                    $("#tambah").css("pointer-events", "all");
                }
            });
        });
    </script>

    <?php
    if (isset($_POST["tambah"])) {
        $ciri = htmlspecialchars($_POST['ciri']);
        $gaya = htmlspecialchars($_POST['gaya']);
        $mb = htmlspecialchars($_POST['mb']);
        $mb = doubleval($mb);
        $md = htmlspecialchars($_POST['md']);
        $md = doubleval($md);
        $pakar = htmlspecialchars($_POST['pakar']);
        $pakar = doubleval($pakar);

        $gaya_id = select("SELECT * FROM gaya WHERE gaya = '$gaya'")[0];
        $gaya_id = $gaya_id["id_gaya"];

        mysqli_query($conn, "INSERT INTO ciri (ciri, gaya_id, mb, md, pakar) VALUES ('$ciri','$gaya_id','$mb','$md','$pakar')");
        echo "<script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Tambah ciri berhasil',
                        showConfirmButton: false,
                        text: 'Ciri telah ditambahkan!'
                    })
                    setTimeout(function(){
                        document.location.href = 'basis-pengetahuan.php';
                    }, 1500);
                </script>";
    }
    ?>
</body>

</html>