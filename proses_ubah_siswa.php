<?php 
    $id_siswa = $_POST['id_siswa']; 
    $nama_siswa = $_POST['nama_siswa'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $gender = $_POST['gender'];
    $alamat = $_POST['alamat'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $id_kelas = $_POST['id_kelas'];

    include "koneksi.php";
    $update = mysqli_query($koneksi, "UPDATE siswa SET nama_siswa = '".$nama_siswa."', 
                                                       tanggal_lahir = '".$tanggal_lahir."',
                                                       gender = '{$gender}',
                                                       alamat = '{$alamat}',
                                                       username = '{$username}',
                                                       id_kelas = '{$id_kelas}'
                                      WHERE id_siswa = '{$id_siswa}'");
    if ($update) {
        echo "<script>alert('Sukses update siswa');location.href='tampil_siswa.php';</script>";
    } else {
        echo "<script>alert('Gagal update siswa');location.href='ubah_siswa.php?id_siswa=".$id_siswa."';</script>";
    }
?>