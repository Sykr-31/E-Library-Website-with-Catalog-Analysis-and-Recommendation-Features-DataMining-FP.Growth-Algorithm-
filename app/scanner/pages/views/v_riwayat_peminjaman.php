<?php
include "../../config/koneksi.php";

// Tangkap ID dari URL
$id_user = isset($_GET['id']) ? $_GET['id'] : 'not set';

// Konversi ke integer
$id_user = intval($id_user);

// Ambil nama pengguna dari basis data berdasarkan id user
$namaUser = '';
if ($id_user > 0) {
    $stmt = $koneksi->prepare("SELECT nama_lengkap FROM anggota WHERE id = ?");
    if ($stmt) {
        $stmt->bind_param("i", $id_user);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($row = $result->fetch_assoc()) {
            $namaUser = $row['nama_lengkap'];
        } else {
            $namaUser = "No user found with ID $id_user";
        }
        $stmt->close();
    } else {
        $namaUser = "Error preparing statement: " . $koneksi->error;
    }
} else {
    $namaUser = "Invalid user ID";
}
?>

<!-- jQuery 3 -->
<script src="../../assets/bower_components/jquery/dist/jquery.min.js"></script>
<script src="../../assets/dist/js/sweetalert.min.js"></script>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1 style="font-family: 'Quicksand', sans-serif; font-weight: bold;">
            Riwayat Peminjaman
            <small>
                <script type='text/javascript'>
                    var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
                    var myDays = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum&#39;at', 'Sabtu'];
                    var date = new Date();
                    var day = date.getDate();
                    var month = date.getMonth();
                    var thisDay = date.getDay(),
                        thisDay = myDays[thisDay];
                    var yy = date.getYear();
                    var year = (yy < 1000) ? yy + 1900 : yy;
                    document.write(thisDay + ', ' + day + ' ' + months[month] + ' ' + year);
                </script>
            </small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="beranda"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Peminjaman Buku </li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title" style="font-family: 'Quicksand', sans-serif; font-weight: bold;">Data Peminjaman (<?= htmlspecialchars($namaUser); ?>)</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Anggota</th>
                                    <th>Judul Buku</th>
                                    <th>Tanggal Peminjaman</th>
                                    <th>Tanggal Pengembalian</th>
                                    <th>Kondisi Saat Dipinjam</th>
                                    <th>Kondisi Saat Dikembalikan</th>
                                    <th>Denda</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = "SELECT p.*, a.nama_lengkap, b.judul_buku 
                                          FROM peminjaman p 
                                          JOIN transaksi t ON p.id_permintaan_lvl = t.id 
                                          JOIN anggota a ON t.id_user = a.id 
                                          JOIN buku b ON t.id_buku = b.id 
                                          WHERE t.id_user = ?";
                                $stmt = $koneksi->prepare($query);
                                if ($stmt) {
                                    $stmt->bind_param("i", $id_user);
                                    $stmt->execute();
                                    $result = $stmt->get_result();

                                    if ($result->num_rows > 0) {
                                        $no = 1;
                                        while ($row = $result->fetch_assoc()) {
                                ?>
                                            <tr>
                                                <td><?= $no++; ?></td>
                                                <td><?= htmlspecialchars($row['nama_lengkap']); ?></td>
                                                <td><?= htmlspecialchars($row['judul_buku']); ?></td>
                                                <td><?= htmlspecialchars($row['tanggal_peminjaman']); ?></td>
                                                <td><?= htmlspecialchars($row['tanggal_pengembalian']); ?></td>
                                                <td><?= htmlspecialchars($row['kondisi_buku_saat_dipinjam']); ?></td>
                                                <td><?= htmlspecialchars($row['kondisi_buku_saat_dikembalikan']); ?></td>
                                                <td><?= htmlspecialchars($row['denda']); ?></td>
                                            </tr>
                                <?php
                                        }
                                    } else {
                                        echo "<tr><td colspan='8'>Tidak ada data ditemukan untuk ID User $id_user</td></tr>";
                                    }
                                    $stmt->close();
                                } else {
                                    echo "Error preparing statement: " . $koneksi->error;
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
    </section>
</div>