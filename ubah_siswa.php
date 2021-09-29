<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Siswa</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</head>
<body>
    <?php 
        include "koneksi.php";
        $qry_get_siswa = mysqli_query($koneksi, "SELECT * FROM siswa WHERE id_siswa = '".$_GET['id_siswa']."'");
        $dt_siswa = mysqli_fetch_array($qry_get_siswa);
    ?>
    <div class="container">
        <div class="card" style="margin: 20px;">
        <div class="card-header"><h1>Ubah Siswa</h1></div>
        <div class="card-body">
        <a class="btn btn-secondary" href="http://localhost/praktikum2/tampil_siswa.php" role="button">Kembali ke Data Siswa</a><hr>
        <form action="proses_ubah_siswa.php" method="post">
            <input type="hidden" name="id_siswa" value="<?= $dt_siswa['id_siswa'] ?>">
            <div class="mb-2">
                <label class="form-label">Nama siswa : </label>
                <input type="text" name="nama_siswa" value="<?= $dt_siswa['nama_siswa'] ?>" class="form-control" required> 
            </div>
            <div class="mb-2">
                <label class="form-label">Tanggal lahir : </label>
                <input type="date" name="tanggal_lahir" value="<?= $dt_siswa['tanggal_lahir'] ?>" class="form-control" required>
            </div>
            <div class="mb-2">
                <label class="form-label">Gender :</label> 
                <?php $arr_gender = array('Laki-laki'=>'Laki-laki', 'Perempuan'=>'Perempuan'); ?>
                <select name="gender" class="form-control" required>
                    <option></option>
                    <?php foreach($arr_gender as $key_gender => $val_gender) { 
                        if($key_gender == $dt_siswa['gender']) {
                            $selek = "selected";
                        } else {
                            $selek = "";
                        } ?>
                        <option value="<?= $val_gender ?>" <?= $selek ?>><?= $val_gender ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="mb-2">
                <label class="form-label">Alamat : </label>
                <textarea name="alamat" class="form-control" required><?= $dt_siswa['alamat'] ?></textarea>
            </div>
            <div class="mb-2">
                <label class="form-label">Kelas : </label> 
                <select name="id_kelas" class="form-control" required>
                    <option></option>
                    <?php 
                        include "koneksi.php";
                        $qry_kelas = mysqli_query($koneksi, "SELECT * FROM kelas");
                        while ($data_kelas = mysqli_fetch_array($qry_kelas)) {
                            if ($data_kelas['id_kelas'] == $dt_siswa['id_kelas']) {
                                $selek = "selected";
                            } else {
                                $selek = "";
                            } ?>
                            <option value="<?= $data_kelas['id_kelas']?>" <?= $selek ?>><?= $data_kelas['nama_kelas'] ?></option>;  
                        <?php }
                    ?>
                </select>
            </div>    
            <div class="mb-2">
                <label class="form-label">Username : </label>
                <input type="text" name="username" value="<?= $dt_siswa['username'] ?>" class="form-control" required>
            </div>
            <div class="mb-2">
                <label class="form-label">Password : </label>
                <input type="text" name="password" value="" class="form-control" required>
            </div>
            <input type="submit" name="simpan" value="Ubah Siswa" class="btn btn-secondary">
        </form>
        </div>
        </div>
    </div>
</body>
</html>