<!-- jQuery 3 -->
<script src="../../assets/bower_components/jquery/dist/jquery.min.js"></script>
<script src="../../assets/dist/js/sweetalert.min.js"></script>

<!-- DataTables CSS -->
<link rel="stylesheet" href="../../assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

<!-- DataTables JS -->
<script src="../../assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../../assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1 class="header-title">
            Hasil Analisis FP-Growth
            <small>
                <script type="text/javascript">
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
            <li><a href="fp-growth-analisa"><i class="fa fa-line-chart"></i> FP-Growth Association Rule</a></li>
            <li class="active">Hasil Analisis FP-Growth</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#frequent-itemset" data-toggle="tab">Frequent Itemset</a></li>
                        <li><a href="#association-rules" data-toggle="tab">Association Rules</a></li>
                        <li><a href="#representasi-association-rules" data-toggle="tab">Association Rules Knowledge</a></li>
                    </ul>
                    <div class="tab-content">

                        <!-- =============== Frequent Itemset =============== -->
                        <div class="tab-pane active" id="frequent-itemset">
                            <div class="form-group" style="display: flex; justify-content: flex-end;">
                                <a href="../../report/report_fpgrowth/report_frequent_itemset.php" target="_blank" class="btn btn-success">
                                    <i class="fa fa-print"></i> Export To PDF
                                </a>
                            </div>
                            <table class="table table-bordered" id="example1">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Itemset</th>
                                        <th class="text-center">Support</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    include "../../config/koneksi.php";
                                    $no = 1;
                                    $query = mysqli_query($koneksi, "SELECT * FROM frequent_itemset");
                                    while ($row = mysqli_fetch_assoc($query)) {
                                    ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo htmlspecialchars($row['itemset']); ?></td>
                                            <td class="text-center"><?php echo number_format($row['support'], 6); ?></td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>

                            <ul>
                                <li style="list-style-type: none;">
                                    <h4 style="margin-left: -16px;">Note :</h4>
                                </li>
                                <li><b>Itemset</b></li>
                                <li style="list-style-type: none;">Itemset adalah kumpulan item (atau buku dalam konteks perpustakaan) yang sering muncul bersama dalam transaksi. Misalnya, jika banyak siswa meminjam buku A dan B secara bersamaan, maka {A, B} adalah itemset.</li>
                                <li><b>Support</b></li>
                                <li style="list-style-type: none;">Support adalah frekuensi atau seberapa sering suatu itemset muncul dalam semua transaksi. Misalnya, jika itemset {A, B} muncul dalam 40% dari semua peminjaman buku, maka support-nya adalah 40%. Ini menunjukkan seberapa populer kombinasi buku tersebut.</li>
                            </ul>
                        </div>
                        <!-- END -->

                        <!-- =============== Association Rules =============== -->
                        <div class="tab-pane" id="association-rules">
                            <div class="form-group" style="display: flex; justify-content: flex-end;">
                                <a href="../../report/report_fpgrowth/report_association_rules.php" target="_blank" class="btn btn-success">
                                    <i class="fa fa-print"></i> Export To PDF
                                </a>
                            </div>
                            <table class="table table-bordered" id="example2">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Antecedent</th>
                                        <th>Consequent</th>
                                        <th class="text-center">Antecedent Support</th>
                                        <th class="text-center">Consequent Support</th>
                                        <th class="text-center">Confidence</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    include "../../config/koneksi.php";
                                    $no = 1;
                                    $query = mysqli_query($koneksi, "SELECT * FROM association_rule");
                                    while ($row = mysqli_fetch_assoc($query)) {
                                    ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo htmlspecialchars($row['antecedent']); ?></td>
                                            <td><?php echo htmlspecialchars($row['consequent']); ?></td>
                                            <td class="text-center"><?php echo number_format($row['antecedent_support'], 6); ?></td>
                                            <td class="text-center"><?php echo number_format($row['consequent_support'], 6); ?></td>
                                            <td class="text-center"><?php echo number_format($row['confidence'], 6); ?></td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>

                            <div>
                                <ul>
                                    <li style="list-style-type: none;">
                                        <h4 style="margin-left: -16px;">Note :</h4>
                                    </li>
                                    <li><b>Antecedent</b></li>
                                    <li style="list-style-type: none;">Antecedent adalah bagian dari aturan asosiasi yang mewakili kondisi awal. Dalam hal ini, maka antecedent bisa jadi "Siswa yang meminjam buku A". Ini seperti syarat awal dari suatu pola.</li>
                                    <li><b>Consequent</b></li>
                                    <li style="list-style-type: none;">Consequent adalah hasil atau akibat dari antecedent. Jika "Siswa yang meminjam buku A" adalah antecedent, maka consequent bisa jadi "juga meminjam buku B". Jadi, consequent adalah prediksi dari tindakan lanjutan.</li>
                                    <li><b>Confidence</b></li>
                                    <li style="list-style-type: none;">Confidence adalah ukuran seberapa besar kemungkinan consequent terjadi setelah antecedent. Misalnya, jika 70% dari siswa yang meminjam buku A juga meminjam buku B, maka confidence-nya adalah 70%. Ini menunjukkan nilai kemungkinan bahwa siswa akan meminjam buku B setelah meminjam buku A.</li>
                                </ul>
                            </div>
                        </div>
                        <!-- END -->

                        <!-- =============== Representasi Association Rules =============== -->
                        <div class="tab-pane" id="representasi-association-rules">
                            <div class="form-group" style="display: flex; justify-content: flex-end;">
                                <a href="../../report/report_fpgrowth/report_association_rules_by_text.php" target="_blank" class="btn btn-success">
                                    <i class="fa fa-print"></i> Export To PDF
                                </a>
                            </div>
                            <table class="table table-bordered dataTable" id="example3">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th class="text-center">Rules by Teks</th>
                                        <th class="text-center">Kemungkinan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    include "../../config/koneksi.php";
                                    $no = 1;
                                    $query = mysqli_query($koneksi, "SELECT * FROM association_rule");
                                    while ($row = mysqli_fetch_assoc($query)) {
                                        $confidencePercentage = $row['confidence'] * 100;
                                    ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td style="width: 100%;">Jika ada yang meminjam buku "<b class="text-success"><?php echo htmlspecialchars($row['antecedent']); ?></b>", maka juga ada kemungkinan akan meminjam buku "<b class="text-primary"><?php echo htmlspecialchars($row['consequent']); ?></b>"</td>
                                            <td class="text-center text-danger"><b><?php echo number_format($confidencePercentage, 0); ?>%</b></td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>

                            <div>
                                <ul>
                                    <li style="list-style-type: none;">
                                        <h4 style="margin-left: -16px;">Note :</h4>
                                    </li>
                                    <li class="text-success"><b>Warna Hijau Adalah Antecedent</b></li>
                                    <li class="text-primary"><b>Warna Biru Adalah Consequent</b></li>
                                    <li class="text-danger"><b>Warna Merah Adalah Confidence</b></li>
                                </ul>
                            </div>
                        </div>
                        <!-- END -->

                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Inisialisasi DataTables untuk id="example3" -->
<script>
    $(document).ready(function() {
        $('#example3').DataTable();
    });
</script>

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