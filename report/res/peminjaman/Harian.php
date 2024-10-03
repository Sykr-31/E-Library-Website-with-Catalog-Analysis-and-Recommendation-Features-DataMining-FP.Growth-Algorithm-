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
</style>

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
    <span class="judul">REKAPITULASI PEMINJAMAN HARIAN</span>
</div>

<br>
<!-- ============= Laporan ============= -->

<?php
session_start();
if (isset($_GET['tanggal_peminjaman']) && $_GET['tanggal_peminjaman'] !== '') {
    $tanggal_peminjaman = $_GET['tanggal_peminjaman'];
    $tanggal_peminjaman = date('d-m-Y', strtotime($tanggal_peminjaman));
    $query = "SELECT p.*, pl.id_user, pl.id_buku
              FROM peminjaman p 
              LEFT JOIN transaksi pl ON p.id_permintaan_lvl = pl.id
              WHERE p.tanggal_peminjaman = '$tanggal_peminjaman'";

    $result = mysqli_query($koneksi, $query);

    if (!$result || mysqli_num_rows($result) === 0) {
        $_SESSION['gagal'] = "Tidak ada data peminjaman yang ditemukan untuk tanggal yang diminta !";
        echo "<script>window.location.href = '{$_SERVER['HTTP_REFERER']}';</script>";
        exit();
    }
}
?>

<table>
    <colgroup>
        <col style="width: 5%" class="angka">
        <col style="width: 17%">
        <col style="width: 17%">
        <col style="width: 13%">
        <col style="width: 14%">
        <col style="width: 11%">
        <col style="width: 13%">
        <col style="width: 10%">
    </colgroup>

    <thead>
        <tr>
            <th>No</th>
            <th>Nama Anggota</th>
            <th>Judul Buku</th>
            <th>Tanggal Peminjaman</th>
            <th>Tanggal Pengembalian</th>
            <th>Kondisi Buku Saat Dipinjam</th>
            <th>Kondisi Buku Saat Dikembalikan</th>
            <th>Denda</th>
        </tr>
    </thead>

    <tbody>
        <?php
        $no = 1;
        while ($row = mysqli_fetch_assoc($result)) {
            $nama_anggota_query = mysqli_query($koneksi, "SELECT nama_lengkap FROM anggota WHERE id = '" . $row['id_user'] . "'");
            $nama_anggota = mysqli_fetch_assoc($nama_anggota_query)['nama_lengkap'];
            $judul_buku_query = mysqli_query($koneksi, "SELECT judul_buku FROM buku WHERE id = '" . $row['id_buku'] . "'");
            $judul_buku = mysqli_fetch_assoc($judul_buku_query)['judul_buku'];
            $tanggal_pengembalian = $row['tanggal_pengembalian'] ?? '-';
            $kondisi_buku_saat_dikembalikan = $row['kondisi_buku_saat_dikembalikan'] ?? '-';
            $denda = $row['denda'] ?? '-';
        ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $nama_anggota; ?></td>
                <td><?= $judul_buku; ?></td>
                <td><?= $row['tanggal_peminjaman']; ?></td>
                <td><?= $tanggal_pengembalian; ?></td>
                <td><?= $row['kondisi_buku_saat_dipinjam']; ?></td>
                <td><?= $kondisi_buku_saat_dikembalikan; ?></td>
                <td><?= $denda; ?></td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>

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
    <table style="text-align: center;">
        <colgroup>
            <col style="width: 75%">
            <col style="width: 25%">
        </colgroup>
        <tbody>
            <tr>
                <td class="info"></td>
                <td class="info"></td>
            </tr>
            <tr>
                <td class="info"></td>
                <td class="info"></td>
            </tr>
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