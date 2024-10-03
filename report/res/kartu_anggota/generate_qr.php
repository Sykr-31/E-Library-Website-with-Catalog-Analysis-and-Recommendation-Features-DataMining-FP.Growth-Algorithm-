<?php
require_once __DIR__ . '/../../../assets/phpqrcode/qrlib.php'; // Sesuaikan path dengan lokasi qrlib.php

// Fungsi untuk menghasilkan QR code dan mengembalikan Data URI
function generateQRCode($url)
{
    ob_start();
    \QRcode::png($url, null, QR_ECLEVEL_H, 10, 2);
    $imageData = ob_get_contents();
    ob_end_clean();
    return 'data:image/png;base64,' . base64_encode($imageData);
}

// Tangkap ID dari URL
$id_user = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Periksa apakah ID valid
if ($id_user > 0) {
    $url = "http://localhost/perpustakaan/app/scanner/riwayat-peminjaman?id=$id_user";
    echo generateQRCode($url);
} else {
    echo "ID tidak valid.";
}
