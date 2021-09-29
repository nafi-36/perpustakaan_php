<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Siswa</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
    <div class="card" style="margin: 20px;">
        <div class="card-header"><h1>Data Siswa</h1></div>
        <div class="card-body">
            <form action="tampil_siswa.php" method="POST" style="padding-bottom: 15px;">
                <label for="cari" class="form-label">Cari data siswa :</label>
                <input type="text" name="cari" class="form-control" placeholder="Masukkan keyword id / nama siswa">
            </form>
            <p style="color: red;">*Masukkan keyword dan klik enter<br>*Kosongkan dan klik enter unutk menampilkan semmua data</p>
            <a class="btn btn-secondary" href="http://localhost/praktikum2/perpus.html" role="button">Kembali ke menu awal</a>
            <hr>
            <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID SISWA</th>
                    <th scope="col">NAMA SISWA</th>
                    <th scope="col">TANGGAL LAHIR</th>
                    <th scope="col">GENDER</th>
                    <th scope="col">ALAMAT</th>
                    <th scope="col">USERNAME</th>
                    <th scope="col">NAMA KELAS</th>
                    <th scope="col">AKSI</th>
                </tr> 
            </thead>
            <tbody>
                <?php
                    include "koneksi.php";
                    if (isset($_POST["cari"])) {
                        // if ($_POST["cari"] != NULL)
                        // jika ada keyword pencarian
                        $cari = $_POST["cari"];
                        $query_siswa = mysqli_query($koneksi, "SELECT * FROM siswa JOIN kelas ON kelas.id_kelas = siswa.id_kelas
                        WHERE siswa.id_siswa LIKE '%$cari%' OR siswa.nama_siswa LIKE '%$cari%'");
                    } else {
                        // jika tdk ada keyword pencarian
                        $query_siswa = mysqli_query($koneksi, "SELECT * FROM siswa JOIN kelas ON kelas.id_kelas = siswa.id_kelas");
                    }
                    
                    while ($data_siswa = mysqli_fetch_array($query_siswa)) { ?>
                        <tr>
                            <td><?= $data_siswa['id_siswa']; ?></td>
                            <td><?= $data_siswa['nama_siswa']; ?></td>
                            <td><?= $data_siswa['tanggal_lahir']; ?></td>
                            <td><?= $data_siswa['gender']; ?></td>
                            <td><?= $data_siswa['alamat']; ?></td>
                            <td><?= $data_siswa['username']; ?></td>
                            <td><?= $data_siswa['nama_kelas']?></td>
                            <td><a href="ubah_siswa.php?id_siswa=<?= $data_siswa['id_siswa']; ?>" class="btn btn-success">Ubah</a> 
                                <a href="hapus_siswa.php?id_siswa=<?= $data_siswa['id_siswa']; ?>" 
                                onclick="return confirm('Apakah anda yakin menghapus data ini?')" class="btn btn-danger">Hapus</a>
                            </td>
                        </tr>
                    <?php } 
                ?>
            </tbody>
            </table>
        </div>
    </div>
    </div>
</body>
</html>