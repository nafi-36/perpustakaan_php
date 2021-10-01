<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Kelas</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
    <div class="card" style="margin: 20px;">
        <div class="card-header"><h1>Data Kelas</h1></div>
        <div class="card-body">
            <p>Cari data kelas :</p>
            <form action="tampil_kelas.php" method="POST" style="padding-bottom: 15px;" class="d-flex">
                <input class="form-control me-2" type="search" name="cari" placeholder="Masukkan keyword id / nama / kelompok" aria-label="Search">
                <button class="btn btn-outline-secondary" type="submit">Search</button>
            </form>
            <p style="color: red;">*Masukkan keyword dan klik search/enter<br>*Kosongkan dan klik search/enter unutk menampilkan semmua data</p>
            <a class="btn btn-secondary" href="perpus.html" role="button">Kembali ke menu awal</a>
            <a class="btn btn-secondary" href="tambah_kelas.php" role="button">Tambahkan Kelas</a>
            <hr>
            <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID KELAS</th>
                    <th scope="col">NAMA KELAS</th>
                    <th scope="col">KELOMPOK</th>
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
                        $query_kelas = mysqli_query($koneksi, "SELECT * FROM kelas WHERE
                        id_kelas = '$cari' OR nama_kelas LIKE '%$cari%' OR kelompok LIKE '%$cari%'");
                    } else {
                        // jika tdk ada keyword pencarian
                        $query_kelas = mysqli_query($koneksi, "SELECT * FROM kelas");
                    }
                    
                    //$query_kelas = mysqli_query($koneksi, "SELECT * FROM kelas");
                    while ($data_kelas = mysqli_fetch_array($query_kelas)) { ?>
                        <tr>
                            <td><?= $data_kelas['id_kelas']; ?></td>
                            <td><?= $data_kelas['nama_kelas']; ?></td>
                            <td><?= $data_kelas['kelompok']; ?></td>
                            <td>
                                <a href="ubah_kelas.php?id_kelas=<?=$data_kelas['id_kelas'];?>" class="btn btn-success">Ubah</a> 
                                <a href="hapus_kelas.php?id_kelas=<?=$data_kelas['id_kelas'];?>" 
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
