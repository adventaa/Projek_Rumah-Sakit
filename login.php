<?php
session_start();
include 'koneksi.php';

$msg = '';
if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $select1 = "SELECT * FROM `admin` WHERE email = '$email'";
    $select_admin = mysqli_query($koneksi, $select1);

    if(mysqli_num_rows($select_admin) > 0){
        $data = mysqli_fetch_assoc($select_admin);
        
        if($password == $data['password']){
            $_SESSION['nama'] = $data['nama'];
            $_SESSION['email'] = $data['email'];
            header("location:home.php");
            exit;
        } else {
            $msg = "Password salah";
        }
    } else {
        $msg = "Email tidak terdaftar";
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
            <h2>Login</h2>
            <p class="msg text-danger text-center"><?= $msg ?></p>
            <div class="form-group mt-3">
                <input type="email" name="email" placeholder="Masukkan email" class="form-control" require>
            </div>
            <div class="form-group mt-3">
                <input type="password" name="password" placeholder="Masukkan password" class="form-control" require>
            </div>
            <button class="btn font-weight-bold" name="submit">Login</button>
            <p>Tidak punya akun? <a href="registrasi.php">Registrasi Sekarang</a></p>
        </form>
    </div>
</body>
</html>

