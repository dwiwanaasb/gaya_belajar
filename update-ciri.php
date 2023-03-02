<?php
session_start();
require 'config/functions.php';

if (!isset($_SESSION["login"])) {
    header('location: login.php');
    exit;
}

$id_ciri = $_GET["id_ciri"];
$data = select("SELECT * FROM ciri WHERE id_ciri = $id_ciri")[0];
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
    <title>Halaman Update Ciri</title>
</head>

<body>
    <div class="area">
        <div class="container">
            <div class="header">
                <div class="left">
                    <h2>Update Ciri</h2>
                    <p>Halaman update ciri.</p>
                </div>
                <div class="right">
                    <a href="basis-pengetahuan.php" class="home"><button>Kembali ke tabel</button></a>
                </div>
            </div>
            <div class="content ciri">
                <form action="" method="post" name="form-data" id="form-data">
                    <input type="hidden" name="id_ciri" value="<?= $data["id_ciri"]; ?>">
                    <div class="form-input">
                        <label for="ciri">Ciri Ciri</label>
                        <input type="text" name="ciri" id="ciri" value="<?= $data["ciri"]; ?>" autocomplete="off" required>
                    </div>
                    <div class="form-input">
                        <label for="gaya">Gaya Belajar</label>
                        <select name="gaya" id="gaya" required>
                            <?php $gaya = select("SELECT * FROM gaya"); ?>
                            <?php $id_gaya = $data["gaya_id"]; ?>
                            <?php $gayaVal = select("SELECT gaya FROM gaya WHERE id_gaya = $id_gaya")[0]; ?>
                            <option value="" selected disabled>Pilih</option>
                            <?php foreach ($gaya as $row) : ?>
                                <option value="<?= $row["gaya"] ?>" <?php if ($row["gaya"] == $gayaVal["gaya"]) echo 'selected="selected"'; ?>><?= $row["gaya"] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-input">
                        <label for="mb">Nilai MB</label>
                        <input type="text" name="mb" id="mb" value="<?= $data["mb"]; ?>" autocomplete="off" required>
                    </div>
                    <div class="form-input">
                        <label for="md">Nilai MD</label>
                        <input type="text" name="md" id="md" value="<?= $data["md"]; ?>" autocomplete="off" required>
                    </div>
                    <div class="form-input not">
                        <label for="pakar">Nilai Pakar</label>
                        <input type="text" name="pakar" id="pakar" value="<?= $data["pakar"]; ?>" autocomplete="off" class="pointer" readonly>
                        <span id="notice" style="color: red; font-size: 14px; font-weight: 700; display: none;">Harap periksa kembali nilai MB dan MD!</span>
                    </div>
                    <div class="form-button" id="btn">
                        <button type="submit" name="update" id="update">Update</button>
                        <span><a href="basis-pengetahuan.php">Kembali ke halaman basis pengetahuan</a></span>
                    </div>
                </form>
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
                        $('#update').prop('disabled', true);
                        $("#btn").css("cursor", "not-allowed");
                        $("#update").css("pointer-events", "none");
                    } else {
                        $("#notice").css("display", "none");
                        $('#update').prop('disabled', false);
                        $("#btn").css("cursor", "pointer");
                        $("#update").css("pointer-events", "all");
                    }
                });
            });
        </script>

        <?php
        if (isset($_POST["update"])) {
            $ciri = htmlspecialchars($_POST['ciri']);
            $gaya = htmlspecialchars($_POST['gaya']);
            $gaya_id = select("SELECT id_gaya FROM gaya WHERE gaya = '$gaya'")[0];
            $gaya_id = $gaya_id["id_gaya"];
            $mb = htmlspecialchars($_POST['mb']);
            $mb = doubleval($mb);
            $md = htmlspecialchars($_POST['md']);
            $md = doubleval($md);
            $pakar = htmlspecialchars($_POST['pakar']);
            $pakar = doubleval($pakar);

            $query = "UPDATE ciri SET
                ciri = '$ciri',
                gaya_id = '$gaya_id',
                mb = '$mb',
                mb = '$mb',
                md = '$md',
                pakar = '$pakar'
            WHERE id_ciri = $id_ciri";

            mysqli_query($conn, $query);

            echo "<script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Ciri berhasil diupdate',
                        showConfirmButton: false
                    })
                    setTimeout(function(){
                        document.location.href = 'basis-pengetahuan.php';
                    }, 1800);
                </script>";
        }
        ?>
</body>

</html>