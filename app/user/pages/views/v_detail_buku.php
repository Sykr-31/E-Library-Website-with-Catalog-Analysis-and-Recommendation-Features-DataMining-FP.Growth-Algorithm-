<!-- jQuery 3 -->
<script src="../../assets/bower_components/jquery/dist/jquery.min.js"></script>
<script src="../../assets/dist/js/sweetalert.min.js"></script>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1 style="font-family: 'Quicksand', sans-serif; font-weight: bold;">
            Detail Buku
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
            <li><a href="peminjaman-buku"><i class="fa fa-exchange"></i> Peminjaman Buku</a></li>
            <li class="active">Detail Buku</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="nav-tabs-custom">
                    <div class="tab-content">
                        <section id="new">

                            <!-- =============== Form Peminjaman Buku =============== -->
                            <form id="formPeminjaman" action="pages/function/Permintaan.php?aksi=pinjam" method="POST">
                                <?php
                                $id = $_SESSION['id_user'];
                                $query_fullname = $koneksi->prepare("SELECT * FROM anggota WHERE id = ?");
                                $query_fullname->bind_param("i", $id);
                                $query_fullname->execute();
                                $result_fullname = $query_fullname->get_result();
                                $row1 = $result_fullname->fetch_array(MYSQLI_ASSOC);
                                ?>

                                <div class="form-group">
                                    <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                                        <a href="form-list-judul" class="btn btn-secondary btn-sm" style="width: 90px;">
                                            <i class="fa fa-list"></i> Judul Buku
                                        </a>
                                        <a href="form-list-kategori" class="btn btn-secondary btn-sm" style="width: 80px;">
                                            <i class="fa fa-tags"></i> Kategori
                                        </a>
                                        <a href="form-list-penerbit" class="btn btn-secondary btn-sm" style="width: 76px;">
                                            <i class="fa fa-book"></i> Penerbit
                                        </a>
                                        <a href="form-list-pengarang" class="btn btn-secondary btn-sm" style="width: 80px;">
                                            <i class="fa fa-user"></i> Pengarang
                                        </a>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <input type="hidden" class="form-control" name="namaAnggota" value="<?= $row1['nama_lengkap']; ?>" readonly>
                                </div>

                                <!-- =============== Katalog Buku =============== -->
                                <div class="row-md" style="margin-left: 1px;">
                                    <?php
                                    include "../../config/koneksi.php";
                                    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
                                        $id_buku_yang_diinginkan = $_GET['id'];
                                        $query = "SELECT b.*, k.nama_kategori, p.nama_penerbit
                                        FROM buku b
                                        LEFT JOIN kategori k ON b.id_kategori = k.id
                                        LEFT JOIN penerbit p ON b.id_penerbit = p.id
                                        WHERE b.id = ?";
                                        $stmt = $koneksi->prepare($query);
                                        $stmt->bind_param("i", $id_buku_yang_diinginkan);
                                        $stmt->execute();
                                        $result = $stmt->get_result();
                                        if ($result && $result->num_rows > 0) {
                                            $row = $result->fetch_assoc();
                                    ?>
                                            <div class="card mb-3" style="max-width: 100%;">
                                                <div class="row g-0">
                                                    <div class="col-md-2" style="padding: 10px;">
                                                        <img src="../staff/pages/function/uploadsGambar/<?= htmlspecialchars($row['foto_buku']); ?>" alt="<?= htmlspecialchars($row['judul_buku']); ?>" style="width: 100%; height: auto; max-height: 200px; object-fit: contain;">
                                                    </div>
                                                    <div class="col-md-10">
                                                        <div class="card-body">
                                                            <h4 class="card-title"><?= htmlspecialchars($row['judul_buku']); ?></h4>
                                                            <?php
                                                            $deskripsi = $row['deskripsi'];
                                                            $deskripsi_pendek = substr($deskripsi, 0, 350);
                                                            $deskripsi_lengkap = htmlspecialchars($deskripsi, ENT_QUOTES, 'UTF-8');
                                                            $deskripsi_pendek = htmlspecialchars($deskripsi_pendek, ENT_QUOTES, 'UTF-8');
                                                            if (strlen($deskripsi) > 350) {
                                                                $deskripsi_pendek .= '. . . <a href="#" class="lanjutkan-membaca" data-fulltext="' . $deskripsi_lengkap . '" data-shorttext="' . $deskripsi_pendek . '">[lanjutkan membaca]</a>';
                                                            }
                                                            ?>
                                                            <p class="card-text" style="text-align: justify;"><?= $deskripsi_pendek; ?></p>
                                                            <ul class="card-text detail-info" style="list-style-type: none; padding-left: 0;">
                                                                <li><small><strong>Kategori: <?= htmlspecialchars($row['nama_kategori']); ?></strong></small></li>
                                                                <li style="margin-top: 3px;"><small><strong>Pengarang: <?= htmlspecialchars($row['pengarang']); ?></strong></small></li>
                                                                <li style="margin-top: 3px;"><small><strong>Tahun Terbit: <?= htmlspecialchars($row['tahun_terbit']); ?></strong></small></li>
                                                                <li style="margin-top: 3px;"><small><strong>Penerbit: <?= htmlspecialchars($row['nama_penerbit']); ?></strong></small></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                    <?php
                                        } else {
                                            echo "<div class='alert alert-danger'>Buku tidak ditemukan atau terjadi kesalahan dalam mengambil data buku.</div>";
                                        }
                                    } else {
                                        echo "<div class='alert alert-warning'>ID buku tidak valid atau tidak tersedia.</div>";
                                    }
                                    ?>
                                </div>
                                <!-- =============== End =============== -->

                                <!-- Menyembunyikan Judul Buku -->
                                <style>
                                    .visually-hidden {
                                        position: absolute;
                                        width: 1px;
                                        height: 1px;
                                        margin: -1px;
                                        padding: 0;
                                        overflow: hidden;
                                        clip: rect(0, 0, 0, 0);
                                        border: 0;
                                    }
                                </style>
                                <!-- End -->

                                <!-- =============== Form untuk Peminjaman =============== -->
                                <div class="form-group">
                                    <input type="hidden" class="form-control" name="judulBuku" id="judulBuku" value="<?= htmlspecialchars($row['judul_buku']); ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Peminjaman :</label>
                                    <input type="text" class="form-control" name="tanggalPeminjaman" value="<?= date('d-m-Y'); ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block">Pinjam</button>
                                </div>
                            </form>
                            <!-- END -->

                        </section>
                    </div>
                </div>
            </div>
        </div>

        <!-- =============== Knowledge Association Rules =============== -->
        <div class="row">
            <div class="col-xs-12">
                <div class="nav-tabs-custom recommendation-section">
                    <div class="container-fluid">
                        <?php
                        if ($koneksi->connect_error) {
                            die("Koneksi database gagal: " . $koneksi->connect_error);
                        }
                        $current_book_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
                        $query = "SELECT judul_buku FROM buku WHERE id = ?";
                        $stmt = $koneksi->prepare($query);
                        $stmt->bind_param('i', $current_book_id);
                        $stmt->execute();
                        $stmt->bind_result($current_book_title);
                        $stmt->fetch();
                        $stmt->close();

                        // Pastikan judul buku tidak kosong
                        if (!$current_book_title) {
                            echo "<p style='margin-left: 16px;'>Buku tidak ditemukan.</p>";
                        } else {
                            // Query untuk mengambil consequent berdasarkan antecedent dari judul buku saat ini
                            $query = "SELECT consequent, confidence FROM association_rule_user WHERE antecedent = ? ORDER BY confidence DESC LIMIT 6";
                            $stmt = $koneksi->prepare($query);
                            $stmt->bind_param('s', $current_book_title);
                            $stmt->execute();
                            $stmt->bind_result($consequent, $confidence);

                            $recommendations = [];
                            while ($stmt->fetch()) {
                                $recommendations[] = htmlspecialchars($consequent);
                            }
                            $stmt->close();

                            // Jika ada rekomendasi
                            if (!empty($recommendations)) {
                        ?>
                                <div class="row">
                                    <h3 style="font-family: 'Quicksand', sans-serif; font-weight: bold; margin-left: 16px; margin-bottom: 20px;">Rekomendasi Buku Saat Ini :</h3>
                                    <?php
                                    foreach ($recommendations as $recommended_book_title) {
                                        $query = "SELECT b.id, b.judul_buku, b.foto_buku, k.nama_kategori 
                                        FROM buku b
                                        JOIN kategori k ON b.id_kategori = k.id
                                        WHERE b.judul_buku = ?
                                        LIMIT 1";

                                        $stmt = $koneksi->prepare($query);
                                        $stmt->bind_param('s', $recommended_book_title);
                                        $stmt->execute();
                                        $stmt->bind_result($book_id, $judul_buku, $foto_buku, $nama_kategori);
                                        $stmt->fetch();
                                        $stmt->close();

                                        if ($book_id) {
                                            $book_link = "detail-buku?id=" . $book_id;
                                            $image_path = "../staff/pages/function/uploadsGambar/" . htmlspecialchars($foto_buku);
                                            if (!file_exists($image_path) || empty($foto_buku)) {
                                                $image_path = "path/to/default/image.jpg";
                                            }
                                    ?>
                                            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-2">
                                                <div class="card border shadow" style="width: 100%;">
                                                    <div class="img-container">
                                                        <a href="<?= $book_link ?>">
                                                            <img src="<?= $image_path ?>" class="img-responsive center-block" alt="Gambar Buku <?= htmlspecialchars($judul_buku) ?>">
                                                        </a>
                                                    </div>
                                                    <div class="card-body">
                                                        <h5 class="card-title text-center">
                                                            <b>
                                                                <a href="<?= $book_link ?>" style="text-decoration: none; color: inherit;">
                                                                    <?= strlen($judul_buku) > 17 ? htmlspecialchars(substr($judul_buku, 0, 17)) . '...' : htmlspecialchars($judul_buku) ?>
                                                                </a>
                                                            </b>
                                                        </h5>
                                                    </div>
                                                    <div class="card-footer text-center">
                                                        <small class="text-body-secondary">
                                                            <?= 'Kategori : ' . htmlspecialchars($nama_kategori); ?>
                                                        </small>
                                                    </div>
                                                    <br>
                                                </div>
                                                <br>
                                            </div>
                                    <?php
                                        }
                                    }
                                    ?>
                                </div>
                        <?php
                            }
                        }
                        ?>
                    </div>

                    <style>
                        .recommendation-section .card {
                            border: 1px solid #ddd;
                            box-shadow: 0 7px 8px rgba(0, 0, 0, 0.1);
                            border-radius: 7px;
                        }

                        .recommendation-section .img-container {
                            height: 210px;
                            display: flex;
                            justify-content: center;
                            align-items: center;
                            overflow: hidden;
                        }

                        .recommendation-section .img-container img {
                            max-height: 90%;
                            max-width: 90%;
                        }
                    </style>
                </div>
            </div>
        </div>
        <!-- End -->
    </section>
</div>


<!-- Pesan Berhasil Edit -->
<script>
    $(document).ready(function() {
        <?php if (isset($_SESSION['berhasil']) && $_SESSION['berhasil'] <> '') { ?>
            swal({
                icon: 'success',
                title: 'Berhasil',
                text: '<?= $_SESSION['berhasil']; ?>'
            });
        <?php }
        $_SESSION['berhasil'] = ''; ?>
    });
</script>

<!-- Pesan Gagal Edit -->
<script>
    $(document).ready(function() {
        <?php if (isset($_SESSION['gagal']) && $_SESSION['gagal'] <> '') { ?>
            swal({
                icon: 'error',
                title: 'Gagal',
                text: '<?= $_SESSION['gagal']; ?>'
            });
        <?php }
        $_SESSION['gagal'] = ''; ?>
    });
</script>

<!-- Input Judul otomatis -->
<script>
    var judulBuku = document.querySelector('.small-box').getAttribute('data-judul');
    document.getElementById('judulBuku').value = judulBuku;
</script>

<!-- Lanjutkan Membaca Deskripsi -->
<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        function attachListeners() {
            document.querySelectorAll('.lanjutkan-membaca').forEach(link => {
                link.addEventListener('click', (e) => {
                    e.preventDefault();
                    const fullText = e.target.getAttribute('data-fulltext');
                    const shortText = e.target.getAttribute('data-shorttext');
                    const paragraph = e.target.closest('p.card-text');
                    const detailInfo = paragraph.nextElementSibling;
                    detailInfo.style.display = 'none';
                    const hideLink = `<a href="#" class="sembunyikan" data-fulltext="${fullText}" data-shorttext="${shortText}">[ringkas deskripsi]</a>`;
                    paragraph.innerHTML = nl2br(fullText) + ' ' + hideLink;
                    attachHideListeners();
                });
            });
        }

        function attachHideListeners() {
            document.querySelectorAll('.sembunyikan').forEach(link => {
                link.addEventListener('click', (e) => {
                    e.preventDefault();
                    const shortText = e.target.getAttribute('data-shorttext');
                    const fullText = e.target.getAttribute('data-fulltext');
                    const paragraph = e.target.closest('p.card-text');
                    const detailInfo = paragraph.nextElementSibling;
                    detailInfo.style.display = 'block';
                    const readMoreLink = '. . . <a href="#" class="lanjutkan-membaca" data-fulltext="' + fullText + '" data-shorttext="' + shortText + '">[lanjutkan membaca]</a>';
                    paragraph.innerHTML = nl2br(shortText) + ' ' + readMoreLink;
                    attachListeners();
                });
            });
        }

        attachListeners();
    });

    function nl2br(str) {
        return str.replace(/\n/g, '<br>');
    }
</script>