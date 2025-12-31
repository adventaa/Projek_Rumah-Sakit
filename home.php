<?php
session_start();

include 'navbar.php';
include 'koneksi.php';

// menampilkan jumlah peserta
$query = mysqli_query($koneksi, "SELECT COUNT(*) AS total FROM t_peserta");
$data = mysqli_fetch_assoc($query);
$total_peserta = $data['total'];

// cek apakah user sudah login
if (!isset($_SESSION['email'])) {
  header("Location: login.php");
  exit;
}

// ambil nama dari session
$nama = $_SESSION['nama'];
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Home - Rumah Sakit</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

  <link rel="stylesheet" href="home.css">
</head>

<body>

  <div class="container welcome-container">
    <div class="welcome-box">
      <h1 class="welcome-title">SELAMAT DATANG, <?php echo $nama; ?>!</h1>
      <p class="welcome-subtitle">Sistem Informasi Rumah Sakit</p>
    </div>
  </div>

  <!-- 3 CARD -->
  <div class="container mt-4">
    <div class="row justify-content-center">

      <!-- CARD peserta -->
      <div class="col-md-3 mb-3">
        <div class="card text-center">
          <div class="card-body">
            <!-- <img src="..." class="card-img-top" alt="..."> -->
            <h5 class="card-title">Data Pasien</h5>
            <p class="card-text"><b><?php echo $total_peserta; ?> Pasien</b></p>
            <a href="data_pasien.php" class="btn btn-primary">Lihat Data</a>
          </div>
        </div>
      </div>

      <!-- CARD dokter -->
      <div class="col-md-3 mb-3">
        <div class="card text-center">
          <div class="card-body">
            <h5 class="card-title">Data Dokter</h5>
            <p class="card-text"><b>12 Dokter</b></p>
            <a href="#" class="btn btn-primary">Lihat Data</a>
          </div>
        </div>
      </div>

      <!-- CARD ruangan -->
      <div class="col-md-3 mb-3">
        <div class="card text-center">
          <div class="card-body">
            <h5 class="card-title">Data Ruangan</h5>
            <p class="card-text"><b>30 Ruangan</b></p>
            <a href="#" class="btn btn-primary">Lihat Data</a>
          </div>
        </div>
      </div>

    </div>
  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>