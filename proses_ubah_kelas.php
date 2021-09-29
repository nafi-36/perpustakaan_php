<?php
    include "koneksi.php";

    $id_kelas = $_POST['id_kelas']; 
    $nama_kelas = $_POST['nama_kelas'];
    $kelompok = $_POST['kelompok'];

    $update_kelas = mysqli_query($koneksi, "UPDATE kelas SET nama_kelas = '".$nama_kelas."', 
                    kelompok = '".$kelompok."' WHERE id_kelas = '".$id_kelas."'");
    if ($update_kelas) {
        echo "<script>alert('Sukses update kelas');location.href='tampil_kelas.php';</script>";
    } else {
        echo "<script>alert('Gagal update kelas');location.href='ubah_kelas.php?id_kelas=".$id_kelas."';</script>";
    }
?>
