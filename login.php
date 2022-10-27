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
    <link rel="stylesheet" href="css/styleLoginRegistrasi.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="js/sweetalert2.all.min.js"></script>
    <script src="js/script.js"></script>
    <title>Halaman Login</title>
</head>

<body>
    <div class="area">
        <div class="container">
            <div class="header">
                <label>PAUD ANYELIR II</label>
                <h2>Login</h2>
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
                    <div class="form-button">
                        <button type="submit" name="login">Login</button>
                        <span>Belum punya akun? <a href="registrasi.php">daftar disini</a></span>
                    </div>
                </form>
            </div>
        </div>

        <?php
        if (isset($_POST["login"])) {
            $username = htmlspecialchars($_POST['username']);
            $password = htmlspecialchars($_POST['password']);

            $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
            $result = mysqli_query($conn, $query);

            if (mysqli_num_rows($result) == 1) {
                $row = mysqli_fetch_assoc($result);
                $username = $row["username"];

                $_SESSION["login"] = true;

                echo "<script>
                    let lat = '" . $username . "';
                    Swal.fire({
                        icon: 'success',
                        title: 'Login berhasil',
                        showConfirmButton: false,
                        text: 'Selamat datang ${username}!'
                    })
                    setTimeout(function(){
                        document.location.href = 'index.php';
                    }, 1800);
                </script>";
            } else {
                echo "<script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Terjadi kesalahan',
                        showConfirmButton: false,
                        text: 'Periksa kembali username dan password anda!'
                    })
                    setTimeout(function(){
                        document.location.href = 'login.php';
                    }, 1500);
                </script>";
            }
        }
        ?>
    </div>
</body>

</html>