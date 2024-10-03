<?php

$id_permintaan_lvl = $_GET['id'] ?? null;
if (!$id_permintaan_lvl) {
    die("ID tidak ditemukan.");
}

$query = "SELECT p.*, pl.id_user, u.nis, u.nama_lengkap AS nama_anggota, u.kelas, b.judul_buku
          FROM peminjaman p 
          LEFT JOIN transaksi pl ON p.id_permintaan_lvl = pl.id
          LEFT JOIN anggota u ON pl.id_user = u.id
          LEFT JOIN buku b ON pl.id_buku = b.id
          WHERE p.id_permintaan_lvl = '$id_permintaan_lvl'";
$result = mysqli_query($koneksi, $query);

if (!$result) {
    die('Error in query: ' . mysqli_error($koneksi));
}

$row = mysqli_fetch_assoc($result);

if ($row) {
    $namaPeminjam = $row['nama_anggota'];
    $kelas = $row['kelas'];
    $judulBuku = $row['judul_buku'];

    $tanggalPeminjaman = $row['tanggal_peminjaman'];
    $tanggalPeminjamanDate = DateTime::createFromFormat('d-m-Y', $tanggalPeminjaman);

    if ($tanggalPeminjamanDate) {
        $tanggalPeminjaman = $tanggalPeminjamanDate->format('d-m-Y');
        $jatuhTempoDate = $tanggalPeminjamanDate->add(new DateInterval('P3D'));
        $jatuhTempo = $jatuhTempoDate->format('d-m-Y');
    } else {
        $tanggalPeminjamanDate = DateTime::createFromFormat('Y-m-d', $tanggalPeminjaman);
        if ($tanggalPeminjamanDate) {
            $tanggalPeminjaman = $tanggalPeminjamanDate->format('d-m-Y');
            $jatuhTempoDate = $tanggalPeminjamanDate->add(new DateInterval('P3D'));
            $jatuhTempo = $jatuhTempoDate->format('d-m-Y');
        } else {
            die("Format tanggal peminjaman tidak sesuai. Tanggal yang diterima: " . htmlspecialchars($tanggalPeminjaman));
        }
    }

    $dendaPerhari = "Rp 1000";
} else {
    die("Data tidak ditemukan.");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Surat Keterlambatan</title>
    <style type="text/css">
        table {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        th {
            border: 1px solid;
            padding: 8px;
            text-align: center;
            background-color: #ddd;
        }

        td {
            border: 1px solid;
            padding: 8px;
        }

        td.angka {
            text-align: right;
        }

        td.garisbawah {
            text-align: center;
            border-bottom: 1px solid;
            padding-bottom: 6px;
        }

        td.info {
            border: 0px;
            padding: 2px;
        }

        td.tebal {
            font-weight: bold;
        }

        td.spasi-ttd {
            border: 0px;
            height: 32px;
        }

        .center {
            height: 100px;
        }

        .judul {
            font-size: 20px;
            font-weight: bold;
            display: table;
            margin: 0 auto;
        }

        .no-border,
        .no-border td,
        .no-border th {
            border: none;
        }

        .notice-section {
            margin-left: 40px;
            margin-right: 40px;
        }
    </style>
</head>

<body>
    <table>
        <colgroup>
            <col style="width: 100%">
        </colgroup>
        <tbody>
            <tr>
                <td class="info garisbawah">
                    <img style="height: 100px;" src="../../assets/images/header.jpg" alt="">
                </td>
            </tr>
        </tbody>
    </table>

    <br>
    <div style="text-align: center;">
        <span class="judul">PEMBERITAHUAN <br> KETERLAMBATAN PENGEMBALIAN</span>
    </div>

    <div class="notice-section">
        <p style="font-size: 15px; text-align: justify; line-height: 1.8;">&nbsp; &nbsp; Dengan ini kami sampaikan pemberitahuan terkait keterlambatan pengembalian buku yang dipinjam dari perpustakaan. Kami berharap informasi ini dapat segera ditindaklanjuti untuk menjaga ketersediaan buku bagi seluruh anggota perpustakaan.</p>

        <table class="no-border" style="font-size: 15px;">
            <colgroup>
                <col style="width: 22%">
                <col style="width: 2%">
                <col style="width: 76%">
            </colgroup>
            <tbody>
                <tr>
                    <td colspan="3" style="line-height: 1.8;">Kepada, <br> <b>Anggota Perpustakaan, dengan data sebagai berikut</b> </td>
                </tr>
                <tr>
                    <td><b>Nama Lengkap</b></td>
                    <td><b>:</b></td>
                    <td><b><?= $namaPeminjam ?></b></td>
                </tr>
                <tr>
                    <td><b>Kelas</b></td>
                    <td><b>:</b></td>
                    <td><b><?= $kelas ?></b></td>
                </tr>
            </tbody>
        </table>

        <p style="font-size: 15px; text-align: justify; line-height: 1.8;">Kami ingin memberitahukan bahwa buku yang Anda pinjam dari Perpustakaan dengan detail dibawah ini :</p>

        <table class="no-border" style="font-size: 15px;">
            <colgroup>
                <col style="width: 25%">
                <col style="width: 2%">
                <col style="width: 73%">
            </colgroup>
            <tbody>
                <tr>
                    <td><b>Judul Buku</b></td>
                    <td><b>:</b></td>
                    <td><b><?= $judulBuku ?></b></td>
                </tr>
                <tr>
                    <td><b>Tanggal Peminjaman</b></td>
                    <td><b>:</b></td>
                    <td><b><?= $tanggalPeminjaman ?></b></td>
                </tr>
            </tbody>
        </table>

        <p style="font-size: 15px; text-align: justify; line-height: 1.8;">&nbsp; &nbsp; Buku yang Anda pinjam telah mengalami keterlambatan dalam pengembalian. Buku tersebut seharusnya dikembalikan pada tanggal "<b><?= $jatuhTempo ?></b>", namun hingga saat ini belum kami terima kembali.</p>

        <p style="font-size: 15px; text-align: justify; line-height: 1.8;">&nbsp; &nbsp; Keterlambatan dalam pengembalian buku dapat mengganggu ketersediaan buku bagi anggota lain yang membutuhkan. Kami mohon agar buku tersebut segera dikembalikan. Jika terdapat masalah atau kendala dalam pengembalian, silakan menghubungi pihak perpustakaan untuk informasi lebih lanjut.</p>

        <p style="font-size: 15px; text-align: justify; line-height: 1.8;">Harap diperhatikan bahwa keterlambatan pengembalian dikenakan denda sebesar "<b><?= $dendaPerhari ?></b>" per hari.</p>
    </div>

    <!-- ============= Tertanda yang mencentak ============= -->
    <br>

    <?php
    $queryPetugas = mysqli_query($koneksi, "SELECT * FROM petugas");
    if (!$queryPetugas) {
        die('Error in query: ' . mysqli_error($koneksi));
    }

    if ($rowPetugas = mysqli_fetch_assoc($queryPetugas)) {
        $_SESSION['id'] = $rowPetugas['id'];
        $_SESSION['nama_lengkap'] = $rowPetugas['nama_lengkap'];
    ?>
        <table style="text-align: center; font-size: 15px;">
            <colgroup>
                <col style="width: 72%">
                <col style="width: 28%">
            </colgroup>
            <tbody>
                <tr>
                    <td class="info"></td>
                    <td class="info">Mataraman, <?= tanggalIndonesia(date("Y-m-d")) ?></td>
                </tr>
                <tr>
                    <td class="info"></td>
                    <td class="info">Mengetahui,</td>
                </tr>
                <tr>
                    <td class="info"></td>
                    <td class="info">Penanggung Jawab</td>
                </tr>
                <tr>
                    <td rowspan="1" class="spasi-ttd"></td>
                </tr>
                <tr>
                    <td class="info"></td>
                    <td class="info"><b><?= $_SESSION['nama_lengkap'] ?></b></td>
                </tr>
            </tbody>
        </table>
        <!-- End -->
    <?php
    }
    ?>
</body>

</html>