<?php
    if ($_GET['id_kelas']) {
        include "koneksi.php";
        $qry_hapus = mysqli_query($koneksi, "DELETE FROM kelas WHERE id_kelas = '".$_GET['id_kelas']."'");
        if ($qry_hapus) {
            echo "<script>alert('Sukses hapus kelas');location.herf='tampil_kelas.php';</script>";
        } else {
            echo "<script>alert('Gagal hapus kelas');location.href='tampil_kelas.php';</script>";
        }
    } else {
        echo "id_kelas tidak ada";
    }
?>