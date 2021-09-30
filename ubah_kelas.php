<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Kelas</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</head>
<body>
    <?php 
        include "koneksi.php";
        $qry_get_kelas = mysqli_query($koneksi, "SELECT * FROM kelas WHERE id_kelas = '".$_GET['id_kelas']."'");
        $dt_kelas = mysqli_fetch_array($qry_get_kelas);
    ?>
    <div class="container">
        <div class="card" style="margin: 20px;">
        <div class="card-header"><h1>Ubah Kelas</h1></div>
        <div class="card-body">
        <a class="btn btn-secondary" href="tampil_kelas.php" role="button">Kembali ke Data Kelas</a><hr>
        <form action="proses_ubah_kelas.php" method="POST">
            <input type="hidden" name="id_kelas" value="<?= $dt_kelas['id_kelas'] ?>">
            <div class="mb-2">
                <label class="form-label">Nama kelas : </label>
                <input type="text" name="nama_kelas" value="<?= $dt_kelas['nama_kelas'] ?>" class="form-control" required> 
            </div>
            <div class="mb-2">
                <label class="form-label">Kelompok : </label>
                <input type="text" name="kelompok" value="<?= $dt_kelas['kelompok'] ?>" class="form-control" required>
            </div>
            <input type="submit" name="simpan" value="Ubah Kelas" class="btn btn-secondary">
        </form>
        </div>
    </div>    
</body>
</html>
