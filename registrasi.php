<?php 
session_start();
include 'koneksi.php'; 

$msg = '';

if(isset($_POST['submit'])){
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];

    if($password != $cpassword){
        $msg = "Password dan konfirmasi password tidak sama";
    } else {
        // Cek apakah email sudah terdaftar
        $select1 = "SELECT * FROM `admin` WHERE email = '$email'";
        $select_admin = mysqli_query($koneksi, $select1);

        if(mysqli_num_rows($select_admin) > 0){
            $msg = "Email sudah terdaftar";
        } else {
            // Insert password plain text
            $insert1 = "INSERT INTO `admin`(`nama`, `email`, `password`) VALUES ('$nama','$email','$password')";
            if(mysqli_query($koneksi, $insert1)){
                header('location:login.php');
                exit;
            } else {
                $msg = "Registrasi gagal, coba lagi";
            }
        }
    }
}
?>


<!doctype html>
<html lang="en">


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>login admin</title>
    <link href="style.css" rel="stylesheet" >
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" >
</head>

<body>
    <div class="form">
        <form action="" method="post">
            <h2>Registrasi</h2>
            <p class="msg"><?=$msg?></p>
            <div class="form-group mt-3">
                <input type="text" name="nama" placeholder="Masukkan nama" class="form-control" require>
            </div>
            <div class="form-group mt-3">
                <input type="email" name="email" placeholder="Masukkan email" class="form-control" require>
            </div>
            <div class="form-group mt-3">
                <input type="password" name="password" placeholder="Masukkan password" class="form-control" require>
            </div>
            <div class="form-group mt-3">
                <input type="password" name="cpassword" placeholder="Konfirmasi password" class="form-control" require>
            </div>
            <button class="btn font-weight-bold" name="submit">Registrasi</button>
            <p>Sudah punya akun? <a href="login.php">Login Sekarang</a></p>
        </form>
    </div>
</body>
</html>
