<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Kelas</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <div class="card" style="margin: 20px;">
            <div class="card-header"><h1>Tambah Kelas</h1></div>
            <div class="card-body">
                <a class="btn btn-secondary" href="http://localhost/praktikum2/perpus.html" role="button">Kembali ke menu awal</a>
                <hr>
                <form method="POST" action="proses_tambah_kelas.php">
                    <div class="mb-2">
                        <label for="nama_kelas" class="form-label">Nama Kelas :</label>
                        <input type="text" class="form-control" name="nama_kelas" placeholder="Masukkan nama kelas" required>
                    </div>
                    <div class="mb-2">
                        <label for="kelompok" class="form-label">Kelompok :</label>
                        <input type="text" class="form-control" name="kelompok" placeholder="Masukkan kelompok" required>
                    </div>
                    <button type="submit" class="btn btn-secondary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
