<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Siswa</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="card" style="margin: 20px;">
            <div class="card-header"><h1>Tambah Siswa</h1></div>
            <div class="card-body">
                <a class="btn btn-secondary" href="http://localhost/praktikum2/perpus.html" role="button">Kembali ke menu awal</a>
                <hr>
                <form method="POST" action="proses_tambah_siswa.php">
                    <div class="mb-2">
                        <label for="nama_siswa" class="form-label">Nama siswa : </label>
                        <input type="text" name="nama_siswa" value="" class="form-control" placeholder="Masukkan nama siswa" required>
                    </div>
                    <div class="mb-2">
                        <label for="tanggal_lahir" class="form-label">Tanggal lahir : </label>
                        <input type="date" name="tanggal_lahir" value="" class="form-control" required>
                    </div>
                    <div class="mb-2">
                        <label for="gender" class="form-label">Gender : </label>
                        <select name="gender" class="form-control" required>
                            <option></option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="mb-2">
                        <label for="alamat" class="form-label">Alamat : </label>
                        <textarea name="alamat" class="form-control" placeholder="Masukkan alamat siswa" required></textarea>
                    </div>
                    <div class="mb-2">
                        <label for="id_kelas" class="form-label">Kelas : </label>
                        <select name="id_kelas" class="form-control" required>
                        <option></option>
                        <?php 
                            // fetch = mengconvert objek ke array, $qry_kelas = berbentuk objek
                            include "koneksi.php";
                            $qry_kelas = mysqli_query($koneksi,"SELECT * FROM kelas");
                            while($data_kelas = mysqli_fetch_array($qry_kelas)) {
                                echo '<option value = "'.$data_kelas['id_kelas'].'">'.$data_kelas['nama_kelas'].'</option>';    
                            }
                        ?>
                        </select>
                    </div>
                    <div class="mb-2">
                        <label for="username" class="form-label">Username : </label>
                        <input type="text" name="username" value="" class="form-control" placeholder="Masukkan username siswa" required>
                    </div>
                    <div class="mb-2">
                        <label for="password" class="form-label">Password : </label>
                        <input type="password" name="password" value="" class="form-control" placeholder="Masukkan password" required>
                    </div>
                    <input type="submit" name="simpan" value="Tambah Siswa" class="btn btn-secondary">
                </form>
            </div>    
        </div>        
    </div>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>           
</body>
</html>
