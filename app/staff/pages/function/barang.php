<?php
session_start();
include "../../../../config/koneksi.php";

if (isset($_GET['act']) && $_GET['act'] == "tambah") {
    $kd_brg = mysqli_real_escape_string($koneksi, $_POST['kd_barang']);
    $nm_barang = mysqli_real_escape_string($koneksi, $_POST['nm_barang']);
    $keterangan = mysqli_real_escape_string($koneksi, $_POST['keterangan']);
    $jumlah = mysqli_real_escape_string($koneksi, $_POST['jumlah']);


    $sql = "INSERT INTO testing_sidang (kd_barang, nm_barang, keterangan, jumlah) 
            VALUES ('$kd_barang', '$nm_barang', '$keterangan', '$jumlah')";

    $result = mysqli_query($koneksi, $sql);

    if ($result) {
        session_start();
        $_SESSION['berhasil'] = "Anggota berhasil ditambahkan !";
        header("location: " . $_SERVER['HTTP_REFERER']);
        exit;
    } else {
        session_start();
        $_SESSION['gagal'] = "Anggota gagal ditambahkan !";
        header("location: " . $_SERVER['HTTP_REFERER']);
        exit;
    }
} else if (isset($_GET['act']) && $_GET['act'] == "edit") {

    $kd_barang = $_POST['kd_barang'];
    $nm_barang = $_POST['nm_barang'];
    $keterangan = $_POST['keterangan'];
    $jumlah = $_POST['jumlah'];

    $query = "UPDATE testing_sidang SET kd_barang = '$kd_barang', nm_barang = '$nm_barang', keterangan = '$keterangan', jumlah = '$jumlah' ";
    $query .= "WHERE kd_barang = '$kd_barang'";
    $sql = mysqli_query($koneksi, $query);

    if ($sql) {
        $_SESSION['berhasil'] = "Data Penerbit berhasil di ganti !";
        header("location: " . $_SERVER['HTTP_REFERER']);
    } else {
        $_SESSION['gagal'] = "Data Penerbit gagal di ganti !";
        header("location: " . $_SERVER['HTTP_REFERER']);
    }
} else if ($_GET['aksi'] == "hapus") {
    $kd_barang = $_GET['kd_barang'];

    $sql = mysqli_query($koneksi, "DELETE FROM testing_sidang WHERE kd_barang = $kd_barang");

    if ($sql) {
        $_SESSION['berhasil'] = "Anggota berhasil dihapus!";
        header("location: " . $_SERVER['HTTP_REFERER']);
    } else {
        $_SESSION['gagal'] = "Anggota gagal dihapus!";
        header("location: " . $_SERVER['HTTP_REFERER']);
    }
}
