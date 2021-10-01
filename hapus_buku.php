<?php
    if ($_GET['id_buku']) {
        include "koneksi.php";
        
        $id_buku = $_GET['id_buku'];
        $folder = "gambar/";

        $sql = "SELECT * FROM buku WHERE id_buku = '$id_buku'";
        $query = mysqli_query($koneksi, $sql);
        $buku = mysqli_fetch_array($query);
        $path = $folder.$buku["foto"];
        
        if (file_exists($path)) {
            unlink($path);
        }

        $qry_hapus = mysqli_query($koneksi, "DELETE FROM buku WHERE id_buku = '$id_buku'");
        if ($qry_hapus) {
            echo "<script>alert('Berhasil menghapus buku');location.herf='tampil_buku.php';</script>";
        } else {
            echo "<script>alert('Gagal menghapus buku');location.href='tampil_buku.php';</script>";
            echo mysqli_error($koneksi);
        }
    } else {
        echo "id_buku tidak ada";
    }
?>
