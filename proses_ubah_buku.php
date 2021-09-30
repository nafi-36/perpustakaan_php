<?php
    include "koneksi.php";

    $id_buku = $_POST['id_buku'];
    $nama_buku = $_POST['nama_buku'];
    $pengarang = $_POST['pengarang'];
    $deskripsi = $_POST['deskripsi'];

    $temp = $_FILES['foto']['tmp_name'];
    $name = $_FILES['foto']['name'];
    $type = $_FILES['foto']['type'];
    $size = $_FILES['foto']['size'];
    $newname = rand(0,9999).'_'.$name;
    $folder = "gambar/";

    $sql = "SELECT * FROM buku WHERE id_buku = '$id_buku'";
    $query = mysqli_query($koneksi, $sql);
    $buku = mysqli_fetch_array($query);
    $path = $folder.$buku["foto"];

    if (file_exists($path)) {
        unlink($path);
    }

    if ($size <= 2000000 and ($type == "image/jpg" or $type == "image/png" or $type == "image/jpeg")) {
        move_uploaded_file($temp, $folder.$newname);
        $sql = "UPDATE buku SET nama_buku = '".$nama_buku."', pengarang = '".$pengarang."',
               deskripsi = '".$deskripsi."', foto = '".$newname."' WHERE id_buku = '$id_buku'";
        $result = mysqli_query($koneksi, $sql);
        if ($result) {
            echo "<script>alert('Berhasil menambahkan buku');location.href='tampil_buku.php';</script>";
        } else {
            echo "<script>alert('Gagal menambahkan buku');location.href='tampil_buku.php';</script>";
        }
    } else {
        echo "<script>alert('File tidak sesuai');location.href='tambah_buku.php';</script>";
    }
?>
