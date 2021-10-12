<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pinjam Buku</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</head>

<body style="background-color: lavenderblush">
    <?php
        include "navbar.php";
        include "koneksi.php";
        $query_detail_buku = mysqli_query($koneksi, 
        "SELECT * FROM buku WHERE id_buku = '".$_GET['id_buku']."'");
        $data_buku = mysqli_fetch_array($query_detail_buku);
    ?>
    
    <main class="container">
        <br><br><br>
        <h1 style="text-align: center;">PINJAM BUKU</h1>
        <hr>
    <section class="py-5 text-center container">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="../gambar/<?= $data_buku['foto'] ?>" class="img-fluid" alt=".."
                 width="250px" height="1000px">
            </div>
        <div class="col-md-8">
            <div class="card-body">
            <form action="insert_cart.php" method="POST">
                <input type="hidden" name="id_buku" value="<?= $data_buku['id_buku'] ?>">
                <table class="table table-hover table-striped">
                    <thead style="text-align: left;">
                    <tr>
                        <td>Judul Buku</td>
                        <td>:</td>
                        <td><?= $data_buku['nama_buku'] ?></td>
                    </tr>
                    <tr>
                        <td>Pengarang</td>
                        <td>:</td>
                        <td><?= $data_buku['pengarang'] ?></td>
                    </tr>
                    <tr>
                        <td>Deskripsi</td>
                        <td>:</td>
                        <td><?= $data_buku['deskripsi'] ?></td>
                    </tr>
                    <tr>
                        <td>Jumlah Pinjam</td>
                        <td>:</td>
                        <td><input type="number" name="jumlah_pinjam" value="1"></td>
                    </tr> 
                    </thead>
                </table>
                <br>
                <div style="float: left;">
                <a href="buku.php" class="btn btn-outline" style="background-color: rgb(158, 74, 74); color: lavenderblush">Kembali ke daftar buku</a>
                <input type="submit" class="btn btn-success" value="PINJAM">
                </div>
            </form>
            </div>
        </div>
        </div>
    </section>
    </main>
    <?php
        include "footer.php";
    ?>
</body>
</html>