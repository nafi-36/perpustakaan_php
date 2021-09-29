<?php
    if ($_GET['id_siswa']) {
        include "koneksi.php";
        $qry_hapus = mysqli_query($koneksi, "DELETE FROM siswa WHERE id_siswa = '".$_GET['id_siswa']."'");
        if ($qry_hapus) {
            echo "<script>alert('Sukses hapus siswa');location.herf='tampil_siswa.php';</script>";
        } else {
            echo "<script>alert('Gagal hapus siswa');location.href='tampil_siswa.php';</script>";
        }
    } else {
        echo "id_siswa tidak ada";
    }
?>