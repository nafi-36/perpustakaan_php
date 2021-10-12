<?php
    if ($_GET['id']) {
        include "koneksi.php";
        $id = $_GET['id'];
        $cek_terlambat = mysqli_query($koneksi, "SELECT * FROM peminjaman_buku
                         WHERE id_peminjaman_buku = '".$id."'");
        $data_pinjam = mysqli_fetch_array($cek_terlambat);
        if (strtotime($data_pinjam['tanggal_kembali']) >= strtotime(date('Y-m-d'))) {
            $denda = 0;
        }
        else{
            $harga_denda_perhari = 1000;
            $tanggal_kembali = new DateTime();
            $tanggal_harus_kembali = new DateTime($data_pinjam['tanggal_kembali']);
            $selisih = $tanggal_kembali->diff($tanggal_harus_kembali)->d;
            $denda = $selisih * $harga_denda_perhari;
        }
        $kembali = mysqli_query($koneksi, "INSERT INTO pengembalian_buku (id_peminjaman_buku, tanggal_pengembalian, denda)
                   VALUES ('".$data_pinjam['id_peminjaman_buku']."', '".date('Y-m-d')."', '".$denda."')");
        if ($kembali) {
            echo "<script>alert('Pengembalian Buku Berhasil');location.href='peminjaman.php';</script>";
        }
        else{
            echo "<script>alert('Pengembalian Buku Gagal');location.href='peminjaman.php';</script>";
        }
    }
?>