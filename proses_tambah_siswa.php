<?php
    $nama_siswa = $_POST["nama_siswa"];
    $tanggal_lahir = $_POST["tanggal_lahir"];
    $gender = $_POST["gender"];
    $alamat = $_POST["alamat"];
    $id_kelas = $_POST["id_kelas"];
    $username = $_POST["username"];
    $password = $_POST["password"];

    include "koneksi.php";
    $input = mysqli_query($koneksi, "INSERT INTO siswa (nama_siswa, tanggal_lahir, gender, alamat, username, password, id_kelas) 
             VALUES ('{$nama_siswa}', '{$tanggal_lahir}', '{$gender}', '{$alamat}', '{$username}', '".md5($password)."', '{$id_kelas}')");
    
    if ($input) {
        echo "<script>alert('Berhasil');location.href='tambah_siswa.php';</script>";
    }
    else {
        echo "<script>alert('Gagal');location.href='tambah_siswa.php';</script>";
    }
?>