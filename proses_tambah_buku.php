<?php
    include "koneksi.php";

    $nama_buku = $_POST['nama_buku'];
    $pengarang = $_POST['pengarang'];
    $deskripsi = $_POST['deskripsi'];

    $temp = $_FILES['foto']['tmp_name'];
    $name = $_FILES['foto']['name'];
    $type = $_FILES['foto']['type'];
    $size = $_FILES['foto']['size'];
    $newname = rand(0,9999).'_'.$name;
    $folder = "gambar/";

    if ($size <= 2000000 and ($type == "image/jpg" or $type == "image/png" or $type == "image/jpeg")) {
        move_uploaded_file($temp, $folder.$newname);
        $input = mysqli_query($koneksi, "INSERT INTO buku (nama_buku, pengarang, deskripsi, foto) 
                 VALUES ('".$nama_buku."', '".$pengarang."', '".$deskripsi."', '".$newname."')");
        if ($input) {
            echo "<script>alert('Berhasil menambahkan buku');location.href='tampil_buku.php';</script>";
        } else {
            echo "<script>alert('Gagal menambahkan buku');location.href='tampil_buku.php';</script>";
        }
    } else {
        echo "<script>alert('File tidak sesuai');location.href='tambah_buku.php';</script>";
    }
?>