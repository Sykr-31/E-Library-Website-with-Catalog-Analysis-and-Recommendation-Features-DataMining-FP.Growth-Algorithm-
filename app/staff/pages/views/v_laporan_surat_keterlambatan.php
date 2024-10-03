    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1 style="font-family: 'Quicksand', sans-serif; font-weight: bold;">
                Laporan Surat Keterlambatan
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
                        //
                    </script>
                </small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li class="active">Laporan Perpustakaan</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#kelas" data-toggle="tab"> Laporan Surat Keterlambatan</a></li>
                        </ul>
                        <div class="tab-content">

                            <!-- /.box-header -->
                            <div class="box-body table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>NIS</th>
                                            <th>Nama Lengkap</th>
                                            <th>Kelas</th>
                                            <th>Judul Buku</th>
                                            <th>Tanggal Peminjaman</th>
                                            <th>Jatuh Tempo</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        include "../../config/koneksi.php";
                                        $no = 1;
                                        $query = "SELECT p.*, pl.id_user, pl.id, u.nis, u.nama_lengkap AS nama_anggota, u.kelas, b.judul_buku
                                        FROM peminjaman p 
                                        LEFT JOIN transaksi pl ON p.id_permintaan_lvl = pl.id
                                        LEFT JOIN anggota u ON pl.id_user = u.id
                                        LEFT JOIN buku b ON pl.id_buku = b.id
                                        WHERE p.tanggal_pengembalian IS NULL OR p.tanggal_pengembalian = ''";
                                        $result = mysqli_query($koneksi, $query);
                                        ?>

                                        <?php
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $nis = $row['nis'] ?? '-';
                                            $nama_anggota = $row['nama_anggota'] ?? '-';
                                            $kelas = $row['kelas'] ?? '-';
                                            $judul_buku = $row['judul_buku'] ?? '-';
                                            $tanggal_peminjaman = $row['tanggal_peminjaman'] ?? '-';

                                            if ($tanggal_peminjaman != '-') {
                                                $tanggal_peminjaman_date = DateTime::createFromFormat('d-m-Y', $tanggal_peminjaman);
                                                if ($tanggal_peminjaman_date) {
                                                    $jatuh_tempo_date = $tanggal_peminjaman_date->add(new DateInterval('P3D'));
                                                    $jatuh_tempo = $jatuh_tempo_date->format('d-m-Y');
                                                    if ($tanggal_peminjaman_date > new DateTime()) {
                                                        continue;
                                                    }
                                                } else {
                                                    $jatuh_tempo = '-';
                                                }
                                            } else {
                                                $jatuh_tempo = '-';
                                            }
                                        ?>
                                            <tr>
                                                <td><?= $no++; ?></td>
                                                <td><?= $nis; ?></td>
                                                <td><?= $nama_anggota; ?></td>
                                                <td><?= $kelas; ?></td>
                                                <td><?= $judul_buku; ?></td>
                                                <td><?= $tanggal_peminjaman != '-' ? $tanggal_peminjaman : '-'; ?></td>
                                                <td>
                                                    <b style="color: red;"><?= $jatuh_tempo; ?></b>
                                                </td>
                                                <td>
                                                    <a href="../../report/report_surat_keterlambatan/report_surat_keterlambatan.php?id=<?= $row['id']; ?>" target="_blank" class="btn btn-success btn-sm"><i class="fa fa-print"></i> Cetak Surat</a>
                                                </td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.box-body -->

                            <!-- /.tab-content -->
                        </div>
                        <!-- /.nav-tabs-custom -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
        </section>
        <!-- /.content -->
    </div>

    <!-- jQuery 3 -->
    <script src="../../assets/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="../../assets/dist/js/sweetalert.min.js"></script>

    <!-- Pesan Gagal Edit -->
    <script>
        <?php
        if (isset($_SESSION['gagal']) && $_SESSION['gagal'] <> '') {
            echo "swal({
                    icon: 'error',
                    title: 'Gagal',
                    text: '$_SESSION[gagal]'
                })";
        }
        $_SESSION['gagal'] = '';
        ?>
    </script>