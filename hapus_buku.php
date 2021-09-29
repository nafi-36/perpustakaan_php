<?php
    if ($_GET['id_buku']) {
        include "koneksi.php";
        $qry_hapus = mysqli_query($koneksi, "DELETE FROM buku WHERE id_buku = '".$_GET['id_buku']."'");
        if ($qry_hapus) {
            echo "<script>alert('Sukses menghapus buku');location.herf='tampil_buku.php';</script>";
        } else {
            echo "<script>alert('Gagal menghapus buku');location.href='tampil_buku.php';</script>";
        }
    } else {
        echo "id_buku tidak ada";
    }
?>