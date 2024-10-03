<?php
session_start();
header("Cache-Control: no-cache, must-revalidate");
include "../../../../config/koneksi.php";

// Fungsi untuk mengecek apakah permintaan sudah diproses sebelumnya
function isRequestAlreadyProcessed($idPermintaan)
{
    return isset($_SESSION['processed_requests']) && in_array($idPermintaan, $_SESSION['processed_requests']);
}

// Fungsi untuk menandai permintaan sebagai sudah diproses
function markRequestAsProcessed($idPermintaan)
{
    if (!isset($_SESSION['processed_requests'])) {
        $_SESSION['processed_requests'] = array();
    }
    if (!in_array($idPermintaan, $_SESSION['processed_requests'])) {
        $_SESSION['processed_requests'][] = $idPermintaan;
    }
}

// Fungsi untuk menghapus tanda permintaan yang sudah diproses
function unmarkRequestAsProcessed($idPermintaan)
{
    if (isset($_SESSION['processed_requests'])) {
        $index = array_search($idPermintaan, $_SESSION['processed_requests']);
        if ($index !== false) {
            unset($_SESSION['processed_requests'][$index]);
        }
    }
}

// Fungsi untuk memperbarui status permintaan
function updateRequestStatus($idPermintaan, $status)
{
    global $koneksi;
    $statusLabel = '';
    if ($status === 'Telah disetujui !') {
        $statusLabel = 'Telah disetujui !';
    } elseif ($status === 'Telah ditolak !') {
        $statusLabel = 'Telah ditolak !';
    }

    $query_update_status = "UPDATE transaksi SET status = ?, keterangan = 'Permintaan telah direspon' WHERE id = ?";
    $stmt = mysqli_prepare($koneksi, $query_update_status);
    mysqli_stmt_bind_param($stmt, "si", $statusLabel, $idPermintaan);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}

// Fungsi untuk menyimpan data peminjaman
function insertPeminjamanData($id_permintaan, $tanggal_peminjaman, $kondisi_buku)
{
    global $koneksi;
    $query_insert_peminjaman = "INSERT INTO peminjaman (id_permintaan_lvl, tanggal_peminjaman, kondisi_buku_saat_dipinjam) 
                                VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($koneksi, $query_insert_peminjaman);
    mysqli_stmt_bind_param($stmt, "iss", $id_permintaan, $tanggal_peminjaman, $kondisi_buku);
    $result_insert_peminjaman = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    return $result_insert_peminjaman;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_permintaan = $_POST['idPermintaan'];
    $aksi = $_POST['aksi'];
    $role = $_POST['role'];

    if ($role === 'Peminjaman') {
        $tanggal_peminjaman = date("d-m-Y");

        // Periksa apakah permintaan telah direspon sebelumnya
        $query_check_responded = "SELECT * FROM transaksi WHERE id = ? AND keterangan = 'Permintaan telah direspon'";
        $stmt_check_responded = mysqli_prepare($koneksi, $query_check_responded);
        mysqli_stmt_bind_param($stmt_check_responded, "i", $id_permintaan);
        mysqli_stmt_execute($stmt_check_responded);
        $result_check_responded = mysqli_stmt_get_result($stmt_check_responded);

        if (mysqli_num_rows($result_check_responded) > 0) {
            echo "Permintaan tersebut sudah direspon sebelumnya !";
            exit;
        }

        if ($aksi == 'setuju') {
            $kondisi_buku = $_POST['kondisi_buku'];

            if (empty($kondisi_buku)) {
                echo "Harap pilih kondisi buku !";
                exit;
            }

            updateRequestStatus($id_permintaan, 'Telah disetujui !');
            markRequestAsProcessed($id_permintaan);

            $result_insert = insertPeminjamanData($id_permintaan, $tanggal_peminjaman, $kondisi_buku);

            if ($result_insert) {
                echo "success";
            } else {
                echo "Gagal melakukan penyimpanan data";
            }
        } elseif ($aksi == 'tolak') {
            updateRequestStatus($id_permintaan, 'Telah ditolak !');
            unmarkRequestAsProcessed($id_permintaan);
            echo "Permintaan telah ditolak";
        }
    }
}
