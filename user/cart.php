<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
</head>
<body style="background-color: lavenderblush">
    <main>
    <?php
        include "navbar.php";
    ?>
    <br></br><br>
    <div class="container">
        <div class="card">
            <div class="card-header" style="background-color: #e8c3b7;">
                <h1>Daftar Buku di Keranjang</h1>
            </div>
            <div class="card-body">
                <?php 
                if (@$_SESSION['cart'] == null) {
                    echo "Keranjang kosong";
                }
                else {
                ?>
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Buku</th>
                        <th scope="col">Jumlah</th>
                        <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach (@$_SESSION['cart'] as $key => $value) : ?>
                        <tr>
                            <td><?=($key+1)?></td>
                            <td><?=$value['nama_buku']?></td>
                            <td><?=$value['qty']?></td>
                            <td><a href="delete_cart.php?id=<?=$key?>" class="btn btn-danger" 
                                onclick="return confirm('Apakah anda yakin menghapus data ini?')">Hapus</a></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <a href="checkout.php" type="button" class="btn btn-secondary">Check Out</a>
                <?php } ?>
            </div>
        </div>
    </div>
    <footer>
        <?php
            include "footer.php";
        ?>
    </footer>
</body>
</html>