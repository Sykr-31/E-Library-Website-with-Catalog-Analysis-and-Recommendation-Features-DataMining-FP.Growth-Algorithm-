<?php
session_start();
include "../../../../config/koneksi.php";

if ($_GET['act'] == "tambah") {
    $nama_penerbit = $_POST['namaPenerbit'];
    $status = $_POST['sTatus'];

    if (empty($status)) {
        $_SESSION['gagal'] = "Status penerbit tidak boleh kosong, harap pilih status !";
        header("location: " . $_SERVER['HTTP_REFERER']);
        exit();
    }

    $sql = "INSERT INTO penerbit (nama_penerbit, verif_penerbit)
            VALUES (?, ?)";

    $stmt = mysqli_prepare($koneksi, $sql);
    mysqli_stmt_bind_param($stmt, 'ss', $nama_penerbit, $status);
    $result = mysqli_stmt_execute($stmt);

    if ($result) {
        $_SESSION['berhasil'] = "Penerbit berhasil ditambahkan !";
        header("location: " . $_SERVER['HTTP_REFERER']);
        exit();
    } else {
        $_SESSION['gagal'] = "Penerbit gagal ditambahkan: " . mysqli_error($koneksi);
        header("location: " . $_SERVER['HTTP_REFERER']);
        exit();
    }
} elseif ($_GET['act'] == "edit") {
    $id = $_POST['idPenerbit'];
    $nama_penerbit = $_POST['namaPenerbit'];
    $verif_penerbit = $_POST['sTatus'];

    $query = "UPDATE penerbit SET nama_penerbit = '$nama_penerbit', verif_penerbit = '$verif_penerbit'";
    $query .= "WHERE id = '$id'";
    $sql = mysqli_query($koneksi, $query);

    if ($sql) {
        $_SESSION['berhasil'] = "Data Penerbit berhasil di ganti !";
        header("location: " . $_SERVER['HTTP_REFERER']);
    } else {
        $_SESSION['gagal'] = "Data Penerbit gagal di ganti !";
        header("location: " . $_SERVER['HTTP_REFERER']);
    }
} elseif ($_GET['act'] == "hapus") {
    $id = $_GET['id'];

    $sql = mysqli_query($koneksi, "DELETE FROM penerbit WHERE id = '$id'");

    if ($sql) {
        $_SESSION['berhasil'] = "Data Penerbit berhasil dihapus !";
        header("location: " . $_SERVER['HTTP_REFERER']);
    } else {
        $_SESSION['gagal'] = "Data Penerbit gagal dihapus !";
        header("location: " . $_SERVER['HTTP_REFERER']);
    }
}
