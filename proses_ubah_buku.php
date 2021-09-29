<?php
    include "koneksi.php";

    $id_buku = $_POST['id_buku'];
    $nama_buku = $_POST['nama_buku'];
    $pengarang = $_POST['pengarang'];
    $deskripsi = $_POST['deskripsi'];

    $rand = rand();
    $ekstensi =  array('png','jpg','jpeg');
    $name = $_FILES['foto']['name'];
    $ukuran = $_FILES['foto']['size'];
    $ext = pathinfo($name, PATHINFO_EXTENSION);

    if(!in_array($ext, $ekstensi)) {
        echo "<script>alert('Ekstensi tidak sesuai');location.href='tampil_buku.php';</script>";
    } else {
        if ($ukuran <= 2000000) {	
            $newname = $rand.'_'.$name;	
            move_uploaded_file($_FILES['foto']['tmp_name'], 'gambar/'.$newname);
            $ubah = mysqli_query($koneksi, "UPDATE buku SET nama_buku = '".$nama_buku."', pengarang = '".$pengarang."',
                    deskripsi = '".$deskripsi."', foto = '".$newname."' WHERE id_buku = '{$id_buku}'");
            if ($ubah) {
                echo "<script>alert('Berhasil mengubah buku');location.href='tampil_buku.php';</script>";
            } else {
                echo "<script>alert('Gagal mengubah buku');location.href='ubah_buku.php?id_buku=".$id_buku."';</script>";
            }        
        } else {
            echo "<script>alert('Ukuran foto melebihi 2 MB');location.href='tampil_buku.php';</script>";
        }
    }    
?>