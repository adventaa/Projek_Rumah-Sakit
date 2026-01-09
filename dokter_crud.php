<?php include 'koneksi.php';

// tombol simpan
if (isset($_POST['simpan'])) {

    // nama file upload foto
    $namaFile = $_FILES['foto']['name'];
    $tmpFile = $_FILES['foto']['tmp_name'];

    // memindahkan file ke folder upload
    move_uploaded_file($tmpFile, "upload2/" . $namaFile);

    $simpan = mysqli_query($koneksi, "INSERT INTO t_dokter (kode, nama, alamat, no_telepon, tempat_lahir, 
    tanggal_lahir, jk, tipe, foto)
    VALUES ('$_POST[kode]',
            '$_POST[nama]',
            '$_POST[alamat]',
            '$_POST[telepon]',
            '$_POST[tempat_Lahir]',
            '$_POST[tgl_lahir]',
            '$_POST[jk]',
            '$_POST[tipe]',
            '$namaFile'
            )");

    if ($simpan) {
        echo "<script>alert('simpan data sukses');
            document.location='data_dokter.php';
    </script>";
    } else {
        echo "<script>alert('simpan data gagal');
            document.location='data_dokter.php';
    </script>";
    }

}

// tombol edit
if (isset($_POST['edit'])) {

    // Cek apakah ada file baru
    if ($_FILES['foto']['name'] != "") {
        $namaFile = $_FILES['foto']['name'];
        $tmpFile = $_FILES['foto']['tmp_name'];
        move_uploaded_file($tmpFile, "upload2/" . $namaFile);
    } else {
        // kalau tidak upload baru, ambil foto lama
        $namaFile = $_POST['foto_lama'];
    }

    $edit = mysqli_query($koneksi, "UPDATE t_dokter SET
    kode ='$_POST[kode]',
    nama ='$_POST[nama]',
    alamat = '$_POST[alamat]', 
    no_telepon='$_POST[telepon]', 
    tempat_lahir='$_POST[tempat_Lahir]', 
    tanggal_lahir='$_POST[tgl_lahir]',  
    jk='$_POST[jk]', 
    tipe='$_POST[tipe]', 
    foto='$namaFile'
    WHERE no_urut = '$_POST[no_urut]'
    ");

    if ($edit) {
        echo "<script>alert('edit data sukses');
            document.location='data_dokter.php';
    </script>";
    } else {
        echo "<script>alert('edit data gagal');
            document.location='data_dokter.php';
    </script>";
    }

}

// tombol hapus
if (isset($_POST['hapus'])) {
    $hapus = mysqli_query($koneksi, "DELETE FROM t_dokter WHERE no_urut = '$_POST[no_urut]'");

    if ($hapus) {
        echo "<script>alert('hapus data sukses');
            document.location='data_dokter.php';
    </script>";
    } else {
        echo "<script>alert('hapus data gagal');
            document.location='data_dokter.php';
    </script>";
    }

}
?>