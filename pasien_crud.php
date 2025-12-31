<?php include 'koneksi.php';

// tombol simpan
if (isset($_POST['simpan'])) {

    // nama file upload foto
    $namaFile = $_FILES['ktp']['name'];
    $tmpFile = $_FILES['ktp']['tmp_name'];

    // memindahkan file ke folder upload
    move_uploaded_file($tmpFile, "upload/" . $namaFile);

    $simpan = mysqli_query($koneksi, "INSERT INTO t_peserta (nomor_id, nama, alamat, no_telepon, tempat_lahir, 
    tanggal_lahir, usia, berat, tinggi, jk, gol_darah, ktp)
    VALUES ('$_POST[id]',
            '$_POST[nama]',
            '$_POST[alamat]',
            '$_POST[telepon]',
            '$_POST[tempat_Lahir]',
            '$_POST[tgl_lahir]',
            '$_POST[usia]',
            '$_POST[berat_badan]',
            '$_POST[tinggi_badan]',
            '$_POST[jk]',
            '$_POST[gol_darah]',
            '$namaFile'
            )");

    if ($simpan) {
        echo "<script>alert('simpan data sukses');
            document.location='data_pasien.php';
    </script>";
    } else {
        echo "<script>alert('simpan data gagal');
            document.location='data_pasien.php';
    </script>";
    }

}

// tombol edit
if (isset($_POST['edit'])) {

    // Cek apakah ada file baru
    if ($_FILES['ktp']['name'] != "") {
        $namaFile = $_FILES['ktp']['name'];
        $tmpFile = $_FILES['ktp']['tmp_name'];
        move_uploaded_file($tmpFile, "upload/" . $namaFile);
    } else {
        // kalau tidak upload baru, ambil foto lama
        $namaFile = $_POST['ktp_lama'];
    }

    $edit = mysqli_query($koneksi, "UPDATE t_peserta SET
    nomor_id ='$_POST[id]',
    nama ='$_POST[nama]',
    alamat = '$_POST[alamat]', 
    no_telepon='$_POST[telepon]', 
    tempat_lahir='$_POST[tempat_Lahir]', 
    tanggal_lahir='$_POST[tgl_lahir]', 
    usia='$_POST[usia]', 
    berat='$_POST[berat_badan]', 
    tinggi='$_POST[tinggi_badan]', 
    jk='$_POST[jk]', 
    gol_darah='$_POST[gol_darah]', 
    ktp='$namaFile'
    WHERE no_urut = '$_POST[no_urut]'
    ");

    if ($edit) {
        echo "<script>alert('edit data sukses');
            document.location='data_pasien.php';
    </script>";
    } else {
        echo "<script>alert('edit data gagal');
            document.location='data_pasien.php';
    </script>";
    }

}

// tombol hapus
if (isset($_POST['hapus'])) {
    $hapus = mysqli_query($koneksi, "DELETE FROM t_peserta WHERE no_urut = '$_POST[no_urut]'");

    if ($hapus) {
        echo "<script>alert('hapus data sukses');
            document.location='data_pasien.php';
    </script>";
    } else {
        echo "<script>alert('hapus data gagal');
            document.location='data_pasien.php';
    </script>";
    }

}
?>