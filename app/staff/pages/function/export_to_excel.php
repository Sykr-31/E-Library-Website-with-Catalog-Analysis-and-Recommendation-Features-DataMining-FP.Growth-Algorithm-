<?php
require __DIR__ . '/../../../../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

include __DIR__ . '/../../../../config/koneksi.php';

// Query untuk mendapatkan data dari database
$query = mysqli_query($koneksi, "
    SELECT
        p.id_user,
        a.nama_lengkap,
        GROUP_CONCAT(b.judul_buku ORDER BY b.id ASC SEPARATOR ', ') AS itemset
    FROM
        transaksi p
    JOIN
        anggota a ON p.id_user = a.id
    JOIN
        buku b ON p.id_buku = b.id
    GROUP BY
        p.id_user, a.nama_lengkap
");

// Membuat objek spreadsheet baru
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

// Menambahkan header
$sheet->setCellValue('A1', 'No');
$sheet->setCellValue('B1', 'Nama Lengkap');
$sheet->setCellValue('C1', 'Itemset');

// Mengisi data dari database ke spreadsheet
$rowNumber = 2;
$no = 1;
while ($row = mysqli_fetch_assoc($query)) {
    // Split itemset into an array
    $itemsetArray = explode(', ', $row['itemset']);

    // Menambahkan setiap item dalam itemset sebagai baris baru
    foreach ($itemsetArray as $item) {
        if (!is_numeric($item) && !empty($item)) {
            $sheet->setCellValue('A' . $rowNumber, $no++);
            $sheet->setCellValue('B' . $rowNumber, $row['nama_lengkap']);
            $sheet->setCellValue('C' . $rowNumber, $item);
            $rowNumber++;
        }
    }
}

// Menulis file Excel ke output
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="dataset_fp_growth.xlsx"');
header('Cache-Control: max-age=0');

$writer = new Xlsx($spreadsheet);
$writer->save('php://output');
exit;
