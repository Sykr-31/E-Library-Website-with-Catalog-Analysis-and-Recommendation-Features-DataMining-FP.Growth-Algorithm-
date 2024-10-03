<?php
session_start();
include "../../../../config/koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['aksi']) && $_POST['aksi'] == "setuju") {
        $idAnggota = $_POST['idAnggota'];
        $tanggalDisetujui = date('Y-m-d H:i:s');
        $tanggalBergabung = date('d-m-Y'); // Format tanggal bergabung d-m-Y

        $updateQuery = "UPDATE anggota SET id_user_lvl = 2, tanggal_bergabung = ? WHERE id = ?";
        $stmt = mysqli_prepare($koneksi, $updateQuery);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "si", $tanggalBergabung, $idAnggota);
            if (mysqli_stmt_execute($stmt)) {
                echo 'success';
            } else {
                echo 'Gagal menyetujui pendaftaran.';
            }
        } else {
            echo 'Gagal menyetujui pendaftaran.';
        }
    } elseif (isset($_POST['aksi']) && $_POST['aksi'] == "tolak") {
        $idAnggota = $_POST['idAnggota'];

        $deleteQuery = "DELETE FROM anggota WHERE id = ?";
        $stmt = mysqli_prepare($koneksi, $deleteQuery);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "i", $idAnggota);
            if (mysqli_stmt_execute($stmt)) {
                echo 'success';
            } else {
                echo 'Gagal menolak pendaftaran.';
            }
        } else {
            echo 'Gagal menolak pendaftaran.';
        }
    } else {
        echo 'Aksi tidak valid !';
    }
} else {
    echo 'Akses tidak sah.';
}
