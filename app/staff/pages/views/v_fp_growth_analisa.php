<!-- jQuery 3 -->
<script src="../../assets/bower_components/jquery/dist/jquery.min.js"></script>
<script src="../../assets/dist/js/sweetalert.min.js"></script>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1 style="font-family: 'Quicksand', sans-serif; font-weight: bold;">
            FP-Growth Association Rule
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
            <li><a href="fp-growth"><i class="fa fa-line-chart"></i> FP-Growth Association Rule</a></li>
            <li class="active">Sistem Analisis FP-Growth</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#dataset-fp-growth" data-toggle="tab">Dataset Peminjaman</a></li>
                        <li><a href="#formulir-fp-growth" data-toggle="tab">Analisis Peminjaman</a></li>
                    </ul>
                    <div class="tab-content">

                        <!-- =============== Dataset FP-Growth =============== -->
                        <div class="tab-pane active" id="dataset-fp-growth">
                            <!-- <div class="form-group" style="display: flex; justify-content: flex-end;">
                                <a href="pages/function/export_to_excel.php" method="post" target="_blank" class="btn btn-success" style="width: 150px;">
                                    <i class="fa fa-file-excel-o"></i> Export To Excel
                                </a>
                                <a href="../../report/report_fpgrowth/#.php" target="_blank" class="btn btn-danger" style="margin-left: 10px; width: 150px;">
                                    <i class="fa fa-print"></i> Export To PDF
                                </a>
                            </div> -->
                            <table class="table table-bordered" id="example1">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Lengkap</th>
                                        <th>Itemset</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    include "../../config/koneksi.php";
                                    if (session_status() == PHP_SESSION_NONE) {
                                        session_start();
                                    }
                                    $no = 1;
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
                                    while ($row = mysqli_fetch_assoc($query)) {
                                    ?>
                                        <tr>
                                            <td><?= htmlspecialchars($no++); ?></td>
                                            <td><?= htmlspecialchars($row['nama_lengkap']); ?></td>
                                            <td><?= htmlspecialchars($row['itemset']); ?></td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- END -->

                        <!-- =============== Analisis Perhitungan FP-Growth =============== -->
                        <div class="tab-pane" id="formulir-fp-growth">
                            <section id="new">
                                <form id="formAnalisis" action="pages/function/Proses_fp_growth.php?aksi=analisis" method="POST">
                                    <div class="form-group">
                                        <label>Minimum Support <small style="color: red;">* Wajib diisi</small></label>
                                        <select class="form-control" name="Support" id="Support" required>
                                            <option selected disabled> -- Silahkan pilih parameter nilai minimum Support -- </option>
                                            <option value="0.2"> 20% (Min) </option>
                                            <option value="0.3"> 30% </option>
                                            <option value="0.4"> 40% </option>
                                            <option value="0.5"> 50% </option>
                                            <option value="0.6"> 60% (Max) </option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Minimum Confidence <small style="color: red;">* Wajib diisi</small></label>
                                        <select class="form-control" name="Confidence" id="Confidence" required>
                                            <option selected disabled> -- Silahkan pilih parameter nilai minimum Confidence -- </option>
                                            <option value="0.5"> 50% (Min) </option>
                                            <option value="0.6"> 60% </option>
                                            <option value="0.7"> 70% </option>
                                            <option value="0.8"> 80% </option>
                                            <option value="0.9"> 90% (Max) </option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-block">Mulai perhitungan</button>
                                    </div>
                                </form>
                            </section>
                        </div>
                        <!-- END -->

                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Pesan Berhasil Edit -->
<script>
    <?php
    if (isset($_SESSION['berhasil']) && $_SESSION['berhasil'] <> '') {
        echo "swal({
            icon: 'success',
            title: 'Berhasil',
            text: '$_SESSION[berhasil]'
        })";
    }
    $_SESSION['berhasil'] = '';
    ?>
</script>

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