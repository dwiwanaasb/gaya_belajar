<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="js/sweetalert2.all.min.js"></script>
</head>

<body>
    <?php
    session_start();
    require 'config/functions.php';

    $id_siswa = $_GET["id_siswa"];

    if (deleteData($id_siswa) == 1) {
        echo "<script>
                Swal.fire({
                    icon: 'success',
                    title: 'Data berhasil dihapus',
                    showConfirmButton: false
                })
                setTimeout(function(){
                    document.location.href = 'manajemen-data.php';
                }, 1800);
            </script>";
    } else {
        echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Terjadi kesalahan',
                    showConfirmButton: false,
                    text: 'Data gagal dihapus!'
                })
                setTimeout(function(){
                    document.location.href = 'manajemen-data.php';
                }, 1500);
            </script>";
    }
    ?>
</body>

</html>