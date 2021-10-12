<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buku</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</head>

<body style="background-color: lavenderblush">
    <header>
        <?php
            include "navbar.php";
        ?>
    </header>

    <main>
    <div class="container">
        <br><br><br>
        <h1 style="text-align: center;">DAFTAR BUKU</h1>
        <hr>
        <p>Cari buku :</p>
        <form action="buku.php" method="POST" style="padding-bottom: 15px;" class="d-flex">
            <input class="form-control me-2" type="search" name="cari" placeholder="Masukkan keyword id / nama / pengarang" aria-label="Search">
            <button class="btn btn-outline" type="submit" style="color:lavenderblush; background-color: rgb(158, 74, 74);">Search</button>
        </form>
        <p style="color: red;">*Masukkan keyword dan klik search/enter<br>*Kosongkan dan klik search/enter unutk menampilkan semua list buku</p>
        <a href="home.php" class="btn btn-outline" style="color:lavenderblush; background-color: rgb(158, 74, 74);">Kembali ke menu awal</a>
        <br><hr>
    </div>

    <div class="album py-5">
    <div class="container">
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-md-4 g-4">
        <?php 
            include "koneksi.php";
            if (isset($_POST['cari'])) {
                $cari = $_POST['cari'];
                $query_buku = mysqli_query($koneksi, "SELECT * FROM buku WHERE id_buku = '$cari' OR
                              nama_buku LIKE '%$cari%' OR pengarang LIKE '%$cari%'");
            } else {
                $query_buku = mysqli_query($koneksi, "SELECT * FROM buku");
            } 
            while ($data_buku = mysqli_fetch_array($query_buku)) { 
        ?>

        <div class="col">
            <div class="card shadow-sm">
                <img src="../gambar/<?= $data_buku['foto']; ?>" 
                class="bd-placeholder-img card-img-top" width="100px" height="400px"
                xmlns="http://www.w3.org/2000/svg" role="img"
                aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice"
                focusable="false"><title>Placeholder</title>
                <rect width="100%" heigth="100%"></img>   

                <div class="card-body">
                    <p class="card-text"><b><?= $data_buku['nama_buku']; ?></b></p>
                    <p class="card-text text-muted">by <?= $data_buku['pengarang']; ?></p>
                    <p class="card-text"><?= $data_buku['deskripsi']; ?></p>
                    <a href="pinjam_buku.php?id_buku=<?= $data_buku['id_buku'] ?>" class="btn btn-outline" 
                       style="color:lavenderblush; background-color: rgb(158, 74, 74);">Pinjam</a>
                </div> 
            </div>
        </div>
        <?php } ?>
    </div>
    </div>
    </main>
    <?php
        include "footer.php";
    ?>
</body>
</html>