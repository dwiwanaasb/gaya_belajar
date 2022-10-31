<?php
session_start();
require 'config/functions.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styleLoginRegistrasi.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="js/sweetalert2.all.min.js"></script>
    <script src="js/script.js"></script>
    <title>Halaman Registrasi</title>
</head>

<body>
    <div class="area">
        <div class="container">
            <div class="header">
                <label>PAUD ANYELIR II</label>
                <h2>Registrasi</h2>
            </div>
            <div class="content">
                <form action="" method="post">
                    <div class="form-input">
                        <label for="">Username</label>
                        <input type="text" name="username" id="username" placeholder="Masukkan username..." autocomplete="off" required>
                    </div>
                    <div class="form-input">
                        <label for="">Password</label>
                        <input type="password" name="password" id="id_password" placeholder="Masukkan password..." autocomplete="off" required>
                        <i class="fa-regular fa-eye" id="togglePassword"></i>
                    </div>
                    <div class="form-input">
                        <label for="">Konfirmasi Password</label>
                        <input type="password" name="cpassword" id="id_cpassword" placeholder="Masukkan konfirmasi password..." autocomplete="off" required>
                        <i class="fa-regular fa-eye" id="toggleCPassword"></i>
                    </div>
                    <div class="form-button">
                        <button type="submit" name="registrasi">Registrasi</button>
                        <a href="login.php">Kembali ke halaman login</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php
    if (isset($_POST["registrasi"])) {
        $username = htmlspecialchars($_POST['username']);
        $password = mysqli_real_escape_string($conn, htmlspecialchars($_POST['password']));
        $cpassword = mysqli_real_escape_string($conn, htmlspecialchars($_POST['cpassword']));

        $result = mysqli_query($conn, "SELECT username FROM users WHERE username = '$username'");
        if (mysqli_fetch_assoc($result)) {
            echo "<script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Terjadi kesalahan',
                        showConfirmButton: false,
                        text: 'Username ini telah terdaftar sebelumnya!'
                    })
                    setTimeout(function(){
                        document.location.href = 'registrasi.php';
                    }, 1500);
                </script>";
            return false;
        }

        if ($password !== $cpassword) {
            echo "<script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Terjadi kesalahan',
                        showConfirmButton: false,
                        text: 'Konfirmasi password salah!'
                    })
                    setTimeout(function(){
                        document.location.href = 'registrasi.php';
                    }, 1500);
                </script>";
            return false;
        }

        mysqli_query($conn, "INSERT INTO users (username, password) VALUES ('$username','$password')");
        echo "<script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Registrasi berhasil',
                        showConfirmButton: false,
                        text: 'Akun telah didaftarkan!'
                    })
                    setTimeout(function(){
                        document.location.href = 'registrasi.php';
                    }, 1500);
                </script>";
    }
    ?>
</body>

</html>