<?php
include "../../../../config/koneksi.php";

function getTransactions($koneksi)
{
    $query = "
        SELECT
            p.id_user,
            GROUP_CONCAT(b.judul_buku ORDER BY b.id ASC SEPARATOR '; ') AS itemset
        FROM
            transaksi p
        JOIN
            anggota a ON p.id_user = a.id
        JOIN
            buku b ON p.id_buku = b.id
        WHERE
            p.status = 'Telah disetujui !' 
        GROUP BY
            p.id_user, a.nama_lengkap
    ";

    $result = mysqli_query($koneksi, $query);

    if (!$result) {
        die("Error dalam menjalankan query: " . mysqli_error($koneksi));
    }

    $transactions = [];
    $bookTitles = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $bookTitles = array_merge($bookTitles, explode('; ', $row['itemset']));
        $transactions[$row['id_user']] = explode('; ', $row['itemset']);
    }

    // Mengambil semua judul buku yang unik
    $bookTitles = array_unique($bookTitles);

    // Menghitung nilai support untuk setiap item
    $supportCounts = array_fill_keys($bookTitles, 0);
    $totalTransactions = count($transactions);

    foreach ($transactions as $books) {
        foreach ($books as $bookTitle) {
            $supportCounts[$bookTitle]++;
        }
    }

    $supports = [];
    foreach ($supportCounts as $bookTitle => $count) {
        $supports[$bookTitle] = $count / $totalTransactions;
    }

    return [$transactions, $supports, $supportCounts, $bookTitles, $totalTransactions];
}
