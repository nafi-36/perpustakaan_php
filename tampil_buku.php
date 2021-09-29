<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Buku</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
    <div class="card" style="margin: 20px;">
        <div class="card-header"><h1>Data Buku</h1></div>
        <div class="card-body">
            <form action="tampil_buku.php" method="POST" style="padding-bottom: 15px;">
                <label for="cari" class="form-label">Cari data buku :</label>
                <input type="search" name="cari" class="form-control" placeholder="Masukkan keyword id / nama / pengarang">
            </form>
            <p style="color: red;">*Masukkan keyword dan klik enter<br>*Kosongkan dan klik enter unutk menampilkan semmua data</p>
            <a class="btn btn-secondary" href="http://localhost/praktikum2/perpus.html" role="button">Kembali ke menu awal</a>
            <hr>
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">ID BUKU</th>
                    <th scope="col">NAMA BUKU</th>
                    <th scope="col">PENGARANG</th>
                    <th scope="col">DESKRIPSI</th>
                    <th scope="col">FOTO</th>
                    <th scope="col">AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    include "koneksi.php";
                    if (isset($_POST['cari'])) {
                        $cari = $_POST['cari'];
                        $query_buku = mysqli_query($koneksi, "SELECT * FROM buku WHERE id_buku = '$cari' OR
                                                   nama_buku LIKE '%$cari%' OR pengarang LIKE '%$cari%'");
                    } else {
                        $query_buku = mysqli_query($koneksi, "SELECT * FROM buku");
                    }
                    while ($data_buku = mysqli_fetch_array($query_buku)) { ?>
                        <tr>
                            <td><?= $data_buku['id_buku']; ?></td>
                            <td><?= $data_buku['nama_buku']; ?></td>
                            <td><?= $data_buku['pengarang']; ?></td>
                            <td><?= $data_buku['deskripsi']; ?></td>
                            <td><img src="gambar/<?= $data_buku['foto']; ?>" width="100" height="120"></td>
                            <td><a href="ubah_buku.php?id_buku=<?php echo $data_buku['id_buku']?>" class="btn btn-success">Ubah</a> 
                                <a href="hapus_buku.php?id_buku=<?php echo $data_buku['id_buku']?>" 
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