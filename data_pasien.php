<?php include 'navbar.php'; ?>
<?php include 'koneksi.php'; ?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>data pasien</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>

    <div class="container">

        <div class="mt-3">
            <h2 class="text-center">DATA PASIEN RUMAH SAKIT</h2>
        </div>

        <div class="mt-3">

            <!-- awal components-modal-Header and footer -->
            <div class="card">
                <div class="card-header bg-primary text-white">Data Pasien</div>
                <!-- akhir components-modal-Header and footer-->

                <div class="card-body">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-success mb-3" data-bs-toggle="modal"
                        data-bs-target="#modalTambah">Tambah Data</button>

                    <table class="table table-bordered table-striped table-hover">
                        <tr class="text-center">
                            <th>No</th>
                            <th>Nomor ID</th>
                            <th>Nama Lengkap</th>
                            <th>Alamat</th>
                            <th>No Telepon</th>
                            <th>Tempat Lahir</th>
                            <th>Tanggal Lahir</th>
                            <!-- <th>Usia</th> -->
                            <th>Berat Badan</th>
                            <th>Tinggi Badan</th>
                            <th>Jenis Kelamin</th>
                            <th>Golongan Darah</th>
                            <th>Foto KTP</th>
                            <th>Aksi</th>
                        </tr>

                        <?php
                        $no = 1;
                        $tampil = mysqli_query($koneksi, "SELECT * FROM t_peserta ORDER BY no_urut ASC");
                        while ($data = mysqli_fetch_array($tampil)):
                            ?>

                            <tr class="text-center">
                                <td><?= $no++ ?></td>
                                <td><?= $data['nomor_id'] ?></td>
                                <td><?= $data['nama'] ?></td>
                                <td><?= $data['alamat'] ?></td>
                                <td><?= $data['no_telepon'] ?></td>
                                <td><?= $data['tempat_lahir'] ?></td>
                                <td><?= $data['tanggal_lahir'] ?></td>
                                <!-- <td><?= $data['usia'] ?></td> -->
                                <td><?= $data['berat'] ?></td>
                                <td><?= $data['tinggi'] ?></td>
                                <td><?= $data['jk'] ?></td>
                                <td><?= $data['gol_darah'] ?></td>
                                <td>
                                    <img src="upload/<?= $data['ktp'] ?>" width="80" height="80" style="object-fit: cover;">
                                </td>
                                <td>
                                    <div class="d-flex flex-column gap-2">
                                        <a href="#" class="btn btn-warning" data-bs-toggle="modal"
                                            data-bs-target="#modalEdit<?= $no ?>">Edit</a>
                                        <a href="#" class="btn btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#modalHapus<?= $no ?>">Hapus</a>
                                    </div>
                                </td>
                            </tr>

                            <!-- Modal Button Edit Data / components-modal-Static backdrop -->
                            <div class="modal fade" id="modalEdit<?= $no ?>" data-bs-backdrop="static"
                                data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="modalEdit">Edit Form Data Pasien</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <form method="POST" action="pasien_crud.php" enctype="multipart/form-data">
                                            <input type="hidden" name="no_urut" value="<?= $data['no_urut'] ?>">
                                            <div class="modal-body">

                                                <div class="mb-3">
                                                    <label class="form-label">Nomor ID</label>
                                                    <input type="text" class="form-control" name="id"
                                                        value="<?= $data['nomor_id'] ?>" placeholder="Masukkan Nomor KTP">
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Nama Lengkap</label>
                                                    <input type="text" class="form-control" name="nama"
                                                        value="<?= $data['nama'] ?>" placeholder="Masukkan Nama Lengkap">
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Alamat</label>
                                                    <textarea class="form-control" name="alamat"
                                                        rows="2"><?= $data['alamat'] ?></textarea>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">No Telepon</label>
                                                    <input type="text" class="form-control" name="telepon"
                                                        value="<?= $data['no_telepon'] ?>" placeholder="Masukkan Nomor WA">
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Tempat Lahir</label>
                                                    <input type="text" class="form-control" name="tempat_Lahir"
                                                        value="<?= $data['tempat_lahir'] ?>"
                                                        placeholder="Masukkan Tempat Lahir">
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label">Tanggal Lahir</label>
                                                    <input type="date" class="form-control" name="tgl_lahir"
                                                        value="<?= $data['tanggal_lahir'] ?>">
                                                </div>

                                                <!-- <div class="mb-3">
                                                    <label class="form-label">Usia</label>
                                                    <input type="text" class="form-control" name="usia"
                                                        value="<?= $data['usia'] ?>" placeholder="Masukkan Usia">
                                                </div> -->
                                                <div class="mb-3">
                                                    <label class="form-label">Berat Badan</label>
                                                    <input type="text" class="form-control" name="berat_badan"
                                                        value="<?= $data['berat'] ?>" placeholder="Masukkan Berat Badan">
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Tinggi Badan</label>
                                                    <input type="text" class="form-control" name="tinggi_badan"
                                                        value="<?= $data['tinggi'] ?>" placeholder="Masukkan Tinggi Badan">
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Jenis Kelamin</label>
                                                    <select class="form-select" name="jk">
                                                        <option value="<?= $data['jk'] ?>"><?= $data['jk'] ?></option>
                                                        <option value="Perempuan">Perempuan</option>
                                                        <option value="Laki-Laki">Laki-Laki</option>
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Golongan Darah</label>
                                                    <select class="form-select" name="gol_darah">
                                                        <option value="<?= $data['gol_darah'] ?>"><?= $data['gol_darah'] ?>
                                                        </option>
                                                        <option value="A">A</option>
                                                        <option value="B">B</option>
                                                        <option value="AB">AB</option>
                                                        <option value="O">O</option>
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Foto KTP</label>
                                                    <input type="hidden" name="ktp_lama" value="<?= $data['ktp'] ?>">
                                                    <input type="file" class="form-control" name="ktp">
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary" name="edit">Edit</button>
                                                <button type="button" class="btn btn-danger"
                                                    data-bs-dismiss="modal">Keluar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- Akhir Modal Button Edit Data -->


                            <!-- Modal Button Hapus Data / components-modal-Static backdrop -->
                            <div class="modal fade" id="modalHapus<?= $no ?>" data-bs-backdrop="static"
                                data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="modalHapus">Konfirmasi Hapus Data Pasien</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <form method="POST" action="pasien_crud.php">
                                            <input type="hidden" name="no_urut" value="<?= $data['no_urut'] ?>">
                                            <div class="modal-body">
                                                <h5 class="text-center">Apakah Anda yakin akan menghapus data ini <br>
                                                    <span class="text-danger"><?= $data['nomor_id'] ?> -
                                                        <?= $data['nama'] ?></span>
                                                </h5>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary" name="hapus">Hapus</button>
                                                <button type="button" class="btn btn-danger"
                                                    data-bs-dismiss="modal">Keluar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- Akhir Modal Button Hapus Data -->

                        <?php endwhile; ?>
                    </table>




                    <!-- Modal Button Tambah Data / components-modal-Static backdrop -->
                    <div class="modal fade" id="modalTambah" data-bs-backdrop="static" data-bs-keyboard="false"
                        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="modalTambah">Form Data Pasien</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form method="POST" action="pasien_crud.php" enctype="multipart/form-data">
                                    <div class="modal-body">

                                        <div class="mb-3">
                                            <label class="form-label">Nomor ID</label>
                                            <input type="text" class="form-control" name="id"
                                                placeholder="Masukkan Nomor KTP">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Nama Lengkap</label>
                                            <input type="text" class="form-control" name="nama"
                                                placeholder="Masukkan Nama Lengkap">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Alamat</label>
                                            <textarea class="form-control" name="alamat" rows="2"></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">No Telepon</label>
                                            <input type="text" class="form-control" name="telepon"
                                                placeholder="Masukkan Nomor WA">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Tempat Lahir</label>
                                            <input type="text" class="form-control" name="tempat_Lahir"
                                                placeholder="Masukkan Tempat Lahir">
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Tanggal Lahir</label>
                                            <input type="date" class="form-control" name="tgl_lahir">
                                        </div>

                                        <!-- <div class="mb-3">
                                            <label class="form-label">Usia</label>
                                            <input type="text" class="form-control" name="usia"
                                                placeholder="Masukkan Usia">
                                        </div> -->
                                        <div class="mb-3">
                                            <label class="form-label">Berat Badan</label>
                                            <input type="text" class="form-control" name="berat_badan"
                                                placeholder="Masukkan Berat Badan">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Tinggi Badan</label>
                                            <input type="text" class="form-control" name="tinggi_badan"
                                                placeholder="Masukkan Tinggi Badan">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Jenis Kelamin</label>
                                            <select class="form-select" name="jk">
                                                <option></option>
                                                <option value="Perempuan">Perempuan</option>
                                                <option value="Laki-Laki">Laki-Laki</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Golongan Darah</label>
                                            <select class="form-select" name="gol_darah">
                                                <option></option>
                                                <option value="A">A</option>
                                                <option value="B">B</option>
                                                <option value="AB">AB</option>
                                                <option value="O">O</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Foto KTP</label>
                                            <input type="file" class="form-control" name="ktp"
                                                placeholder="Masukkan Foto KTP">
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
                                        <button type="button" class="btn btn-danger"
                                            data-bs-dismiss="modal">Keluar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Akhir Modal Button Tambah Data -->


                </div>

            </div>
        </div>


    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
</body>