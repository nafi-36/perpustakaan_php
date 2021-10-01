<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Buku</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
    <div class="card" style="margin: 20px;">
        <div class="card-header"><h1>Tambah Buku</h1></div>
        <div class="card-body">
        <a class="btn btn-secondary" href="tampil_buku.php" role="button">Kembali ke Data Buku</a><hr>
        <hr>
        <form action="proses_tambah_buku.php" method="POST" enctype="multipart/form-data">
            <div class="mb-2">
                <label for="nama_buku" class="form-label">Nama buku : </label>
                <input type="text" name="nama_buku" class="form-control" placeholder="Masukkan nama buku" required>
            </div>
            <div class="mb-2">
                <label for="pengarang" class="form-label">Nama pengarang : </label>
                <input type="text" name="pengarang" class="form-control" placeholder="Masukkan nama pengarang" required>
            </div>
            <div class="mb-2">
                <label for="deskripsi" class="form-label">Deskripsi buku : </label>
                <textarea type="text" name="deskripsi" class="form-control" placeholder="Masukkan deskripsi tentang buku" required></textarea>
            </div>
            <div class="mb-2">
                <label for="foto" class="form-label">Foto buku : </label>
                <input type="file" name="foto" class="form-control" required>
                <p style="color: red">*Ekstensi yang diperbolehkan .png / .jpg / .jpeg<br>*Ukuran maksimal 2 MB</p>
            </div>
            <input type="submit" name="simpan" value="Tambah Buku" class="btn btn-secondary">
        </form>
        </div>
    </div>
    </div>
</body>
</html>
