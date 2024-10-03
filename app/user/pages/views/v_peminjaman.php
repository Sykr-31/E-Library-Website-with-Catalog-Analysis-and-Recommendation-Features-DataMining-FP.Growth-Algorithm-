<!-- jQuery 3 -->
<script src="../../assets/bower_components/jquery/dist/jquery.min.js"></script>
<script src="../../assets/dist/js/sweetalert.min.js"></script>

<!-- Sertakan jQuery UI -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<!-- Tambahan -->
<script src="https://cdn.jsdelivr.net/npm/animejs"></script>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1 style="font-family: 'Quicksand', sans-serif; font-weight: bold;">
            Peminjaman Buku
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
            <li class="active">Peminjaman Buku</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#tgl-pinjam" data-toggle="tab">Formulir Peminjaman Buku</a></li>
                        <li><a href="#permintaan-pinjaman" data-toggle="tab">Riwayat Permintaan Pinjaman</a></li>
                        <li><a href="#riwayat-peminjaman-pengembalian" data-toggle="tab">Riwayat Pinjaman/Pengembalian</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tgl-pinjam">
                            <section id="new">
                                <?php
                                include "../../config/koneksi.php";
                                if (isset($_SESSION['id_user'])) {
                                    $id_user = $_SESSION['id_user'];
                                    $query = "SELECT COUNT(*) AS jumlah_buku_dipinjam
                                  FROM peminjaman p
                                  INNER JOIN transaksi pl ON p.id_permintaan_lvl = pl.id
                                  INNER JOIN anggota a ON pl.id_user = a.id
                                  WHERE a.id = ? AND p.kondisi_buku_saat_dikembalikan = ''";
                                    $stmt = $koneksi->prepare($query);
                                    if ($stmt) {
                                        $stmt->bind_param("i", $id_user);
                                        $stmt->execute();
                                        $result = $stmt->get_result();
                                        $row = $result->fetch_assoc();
                                        $jumlah_buku_dipinjam = $row['jumlah_buku_dipinjam'];
                                        if ($jumlah_buku_dipinjam > 0) {
                                            echo "<div class='alert alert-danger small'>
                                Kamu saat ini telah meminjam sebanyak $jumlah_buku_dipinjam buku !
                                </div>";
                                        }
                                    } else {
                                        echo "Error: " . $koneksi->error;
                                    }
                                } else {
                                    echo "User tidak ditemukan!";
                                }
                                ?>
                                <form id="Buku">
                                    <?php
                                    if (isset($_SESSION['id_user'])) {
                                        $id = $_SESSION['id_user'];
                                        $query_fullname = $koneksi->prepare("SELECT * FROM anggota WHERE id = ?");
                                        if ($query_fullname) {
                                            $query_fullname->bind_param("i", $id);
                                            $query_fullname->execute();
                                            $result_fullname = $query_fullname->get_result();
                                            $row1 = $result_fullname->fetch_array(MYSQLI_ASSOC);
                                        } else {
                                            echo "Error: " . $koneksi->error;
                                        }
                                    }
                                    ?>

                                    <!-- =============== Fungsi Pencarian =============== -->
                                    <form method="GET" action="home.php" class="form-inline">
                                        <div class="form-group" style="width: 100%;">
                                            <div class="row">
                                                <div class="col-xs-10 col-sm-11">
                                                    <input id="searchInput" name="search" class="form-control" type="search" placeholder="Cari Judul Buku . . ." aria-label="Search" value="<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '' ?>" style="width: 100%; margin-left: 10px;">
                                                </div>
                                                <div class="col-xs-2 col-sm-1">
                                                    <button class="btn btn-outline-success my-2 my-sm-0 btn-primary" type="submit" style="width: 100%; margin-left: -10px">Cari</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>

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

                                    <!-- =============== Menampilkan Katalog Buku =============== -->
                                    <div class="container-fluid">
                                        <div class="row">
                                            <?php
                                            if ($koneksi->connect_error) {
                                                die("Koneksi database gagal: " . $koneksi->connect_error);
                                            }

                                            $items_per_page = 12;
                                            $current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
                                            $offset = ($current_page - 1) * $items_per_page;

                                            // Ambil nilai pencarian dari input dan parameter URL lainnya
                                            $search_query = isset($_GET['search']) ? $koneksi->real_escape_string($_GET['search']) : '';
                                            $author_query = isset($_GET['author']) ? urldecode(html_entity_decode($koneksi->real_escape_string($_GET['author']))) : '';
                                            $category_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
                                            $publisher_id = isset($_GET['publisher_id']) ? (int)$_GET['publisher_id'] : 0;

                                            // Query untuk menghitung total buku
                                            $total_query = "SELECT COUNT(*) AS total FROM buku WHERE 1=1";
                                            $params = [];
                                            $param_types = '';

                                            if ($category_id > 0) {
                                                $total_query .= " AND id_kategori = ?";
                                                $params[] = $category_id;
                                                $param_types .= 'i'; // integer
                                            }

                                            if ($publisher_id > 0) {
                                                $total_query .= " AND id_penerbit = ?";
                                                $params[] = $publisher_id;
                                                $param_types .= 'i'; // integer
                                            }

                                            if (!empty($search_query)) {
                                                $total_query .= " AND judul_buku LIKE ?";
                                                $params[] = "%" . $search_query . "%";
                                                $param_types .= 's'; // string
                                            }

                                            if (!empty($author_query)) {
                                                $total_query .= " AND pengarang LIKE ?";
                                                $params[] = "%" . $author_query . "%";
                                                $param_types .= 's'; // string
                                            }

                                            $total_stmt = $koneksi->prepare($total_query);
                                            if ($param_types) {
                                                $total_stmt->bind_param($param_types, ...$params);
                                            }
                                            $total_stmt->execute();
                                            $total_result = $total_stmt->get_result();
                                            $total_row = $total_result->fetch_assoc();
                                            $total_items = $total_row['total'];
                                            $total_pages = ceil($total_items / $items_per_page);

                                            // Query untuk mengambil buku berdasarkan kriteria pencarian
                                            $query = "SELECT b.id, b.judul_buku, b.foto_buku, k.nama_kategori 
                                            FROM buku b
                                            JOIN kategori k ON b.id_kategori = k.id
                                            WHERE 1=1";
                                            $query_params = [];
                                            $query_types = '';

                                            if ($category_id > 0) {
                                                $query .= " AND b.id_kategori = ?";
                                                $query_params[] = $category_id;
                                                $query_types .= 'i'; // integer
                                            }

                                            if ($publisher_id > 0) {
                                                $query .= " AND b.id_penerbit = ?";
                                                $query_params[] = $publisher_id;
                                                $query_types .= 'i'; // integer
                                            }

                                            if (!empty($search_query)) {
                                                $query .= " AND b.judul_buku LIKE ?";
                                                $query_params[] = "%" . $search_query . "%";
                                                $query_types .= 's'; // string
                                            }

                                            if (!empty($author_query)) {
                                                $query .= " AND b.pengarang LIKE ?";
                                                $query_params[] = "%" . $author_query . "%";
                                                $query_types .= 's'; // string
                                            }

                                            $query .= " ORDER BY b.judul_buku COLLATE utf8mb4_unicode_ci LIMIT ?, ?";
                                            $query_params[] = $offset;
                                            $query_params[] = $items_per_page;
                                            $query_types .= 'ii'; // integers for offset and items_per_page

                                            $stmt = $koneksi->prepare($query);
                                            $stmt->bind_param($query_types, ...$query_params);
                                            $stmt->execute();
                                            $stmt->bind_result($book_id, $judul_buku, $foto_buku, $nama_kategori);

                                            while ($stmt->fetch()) {
                                                $book_title = htmlspecialchars($judul_buku);
                                                $book_image = htmlspecialchars($foto_buku);
                                                $image_path = "../staff/pages/function/uploadsGambar/" . $book_image;
                                                if (!file_exists($image_path) || empty($book_image)) {
                                                    $image_path = "path/to/default/image.jpg"; // Ganti dengan path gambar default yang sesuai
                                                }

                                                // Mengubah format tautan buku
                                                $book_link = "detail-buku?id=" . $book_id; // Menggunakan format baru sesuai .htaccess
                                            ?>
                                                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-2">
                                                    <div class="card border shadow" style="width: 100%;">
                                                        <div class="img-container">
                                                            <a href="<?= $book_link ?>">
                                                                <img src="<?= $image_path ?>" class="img-responsive center-block" alt="Gambar Buku <?= $book_title ?>">
                                                            </a>
                                                        </div>
                                                        <div class="card-body">
                                                            <h5 class="card-title text-center">
                                                                <b>
                                                                    <a href="<?= $book_link ?>" style="text-decoration: none; color: inherit;">
                                                                        <?= strlen($book_title) > 17 ? htmlspecialchars(substr($book_title, 0, 17)) . '...' : htmlspecialchars($book_title) ?>
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
                                            $stmt->close();
                                            ?>
                                        </div>


                                    </div>

                                    <style>
                                        .card {
                                            border: 1px solid #ddd;
                                            box-shadow: 0 7px 8px rgba(0, 0, 0, 0.1);
                                            border-radius: 7px;
                                        }

                                        .img-container {
                                            height: 210px;
                                            display: flex;
                                            justify-content: center;
                                            align-items: center;
                                            overflow: hidden;
                                        }

                                        .img-container img {
                                            max-height: 90%;
                                            max-width: 90%;
                                        }
                                    </style>
                                    <!-- END -->
                                </form>
                            </section>
                        </div>

                        <!-- =============== Riwayat Permintaan Pinjaman =============== -->
                        <div class="tab-pane" id="permintaan-pinjaman">
                            <table class="table table-bordered" id="example1">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Anggota</th>
                                        <th>Judul Buku</th>
                                        <th>Tanggal Permintaan</th>
                                        <th>Keterangan</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <?php
                                include "../../config/koneksi.php";
                                if (session_status() == PHP_SESSION_NONE) {
                                    session_start();
                                }
                                $id_pengguna = $_SESSION['id_user'];
                                $query_permintaan = "SELECT p.*, a.nama_lengkap AS nama_anggota, b.judul_buku
                                FROM transaksi p
                                JOIN anggota a ON p.id_user = a.id
                                JOIN buku b ON p.id_buku = b.id
                                WHERE p.role = 'Peminjaman' AND p.id_user = ?";
                                $stmt = $koneksi->prepare($query_permintaan);
                                $stmt->bind_param("i", $id_pengguna);
                                $stmt->execute();
                                $result_permintaan = $stmt->get_result();
                                $no = 1;
                                while ($row = $result_permintaan->fetch_assoc()) {
                                    $namaUser = $row['nama_anggota'];
                                    $judulBuku = $row['judul_buku'];
                                ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= htmlspecialchars($namaUser); ?></td>
                                        <td><?= htmlspecialchars($judulBuku); ?></td>
                                        <td><?= htmlspecialchars($row['tanggal_permintaan']); ?></td>
                                        <td>
                                            <b><?= htmlspecialchars($row['keterangan']); ?></b>
                                        </td>
                                        <td id="status-<?= $row['id']; ?>">
                                            <b><?= htmlspecialchars($row['status']); ?></b>
                                        </td>
                                        <td>
                                            <a href="#" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modalPermintaan<?= $row['id']; ?>"><i class="fa fa-info"></i> Batalkan !</a>
                                        </td>
                                    </tr>
                                    <!-- Modal Permintaan Pinjaman -->
                                    <div class="modal fade" id="modalPermintaan<?= $row['id']; ?>">
                                        <div class="modal-dialog">
                                            <div class="modal-content" style="border-radius: 5px;">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    <h4 class="modal-title" style="font-family: 'Quicksand', sans-serif; font-weight: bold;">
                                                        Permintaan ( <?= htmlspecialchars($namaUser); ?> )
                                                    </h4>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label>Nama Anggota</label>
                                                        <input type="text" class="form-control" value="<?= htmlspecialchars($namaUser); ?>" name="namaAnggota" readonly>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Judul Buku</label>
                                                        <input type="text" class="form-control" value="<?= htmlspecialchars($judulBuku); ?>" name="judulBuku" readonly>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Tanggal Permintaan</label>
                                                        <input type="text" class="form-control" value="<?= htmlspecialchars($row['tanggal_permintaan']); ?>" name="TanggalPermintaan" readonly>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Keterangan</label>
                                                        <input type="text" class="form-control" value="<?= htmlspecialchars($row['keterangan']); ?>" name="Keterangan" readonly>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <form action="pages/function/Permintaan.php?aksi=batalkan_peminjaman" method="POST">
                                                        <input type="hidden" name="idPermintaan" value="<?= $row['id']; ?>">
                                                        <button type="submit" class="btn btn-danger btn-block">Batalkan</button>
                                                    </form>
                                                </div>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>
                                <?php
                                }
                                ?>
                            </table>
                        </div>
                        <!-- END -->

                        <!-- =============== Riwayat Peminjaman/Pengembalian =============== -->
                        <div class="tab-pane" id="riwayat-peminjaman-pengembalian">
                            <table class="table table-bordered" id="example2">
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
                                    include "../../config/koneksi.php";
                                    if (session_status() == PHP_SESSION_NONE) {
                                        session_start();
                                    }
                                    $id_pengguna = $_SESSION['id_user'];
                                    $query = "SELECT p.*, pl.id_user, pl.id_buku
                                  FROM peminjaman p 
                                  LEFT JOIN transaksi pl ON p.id_permintaan_lvl = pl.id
                                  WHERE pl.id_user = ?";
                                    $stmt = $koneksi->prepare($query);
                                    $stmt->bind_param("i", $id_pengguna);
                                    $stmt->execute();
                                    $result = $stmt->get_result();
                                    $no = 1;
                                    while ($row = $result->fetch_assoc()) {
                                        // Mengambil informasi nama anggota dan judul buku dari tabel transaksi
                                        $nama_anggota_query = $koneksi->prepare("SELECT nama_lengkap FROM anggota WHERE id = (SELECT id_user FROM transaksi WHERE id = ?)");
                                        $nama_anggota_query->bind_param("i", $row['id_permintaan_lvl']);
                                        $nama_anggota_query->execute();
                                        $nama_anggota_result = $nama_anggota_query->get_result();
                                        $nama_anggota_row = $nama_anggota_result->fetch_assoc();
                                        $nama_anggota = $nama_anggota_row['nama_lengkap'];

                                        $judul_buku_query = $koneksi->prepare("SELECT judul_buku FROM buku WHERE id = (SELECT id_buku FROM transaksi WHERE id = ?)");
                                        $judul_buku_query->bind_param("i", $row['id_permintaan_lvl']);
                                        $judul_buku_query->execute();
                                        $judul_buku_result = $judul_buku_query->get_result();
                                        $judul_buku_row = $judul_buku_result->fetch_assoc();
                                        $judul_buku = $judul_buku_row['judul_buku'];
                                    ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $nama_anggota; ?></td>
                                            <td><?= $judul_buku; ?></td>
                                            <td><?= $row['tanggal_peminjaman']; ?></td>
                                            <td><?= $row['tanggal_pengembalian']; ?></td>
                                            <td><?= $row['kondisi_buku_saat_dipinjam']; ?></td>
                                            <td><?= $row['kondisi_buku_saat_dikembalikan']; ?></td>
                                            <td><?= $row['denda']; ?></td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- END -->

                        <!-- =============== Paginasi =============== -->
                        <?php
                        echo '<div id="pagination-container" class="row">';
                        echo '<div class="col-md-6">';
                        echo '<p class="mb-0">Menampilkan ' . ($offset + 1) . ' - ' . min($offset + $items_per_page, $total_items) . ' dari ' . $total_items . ' buku</p>';
                        echo '</div>';
                        echo '<div class="col-md-6">';
                        echo '<div class="btn-toolbar pull-right" role="toolbar" aria-label="Toolbar with button groups">';
                        echo '<div class="btn-group me-2" role="group" aria-label="First group">';
                        $query_string = '';
                        if (!empty($search_query)) {
                            $query_string .= '&search=' . urlencode($search_query);
                        }
                        if ($category_id > 0) {
                            $query_string .= '&id=' . $category_id;
                        }
                        if ($publisher_id > 0) {
                            $query_string .= '&publisher_id=' . $publisher_id;
                        }

                        if ($current_page > 1) {
                            echo '<a href="peminjaman-buku?page=' . ($current_page - 1) . $query_string . '" class="btn btn-primary">Sebelumnya</a>';
                        }
                        // Tautan untuk setiap halaman
                        for ($i = 1; $i <= $total_pages; $i++) {
                            if ($i == $current_page) {
                                echo '<button type="button" class="btn btn-primary active">' . $i . '</button>';
                            } else {
                                echo '<a href="peminjaman-buku?page=' . $i . $query_string . '" class="btn btn-primary">' . $i . '</a>';
                            }
                        }
                        // Tautan "Selanjutnya"
                        if ($current_page < $total_pages) {
                            echo '<a href="peminjaman-buku?page=' . ($current_page + 1) . $query_string . '" class="btn btn-primary">Selanjutnya</a>';
                        }
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                        ?>
                        <!-- END -->

                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Menyembunyikan Button Paginasi Pada halaman Riwayat Permintaan -->
<script>
    $(document).ready(function() {
        function togglePagination() {
            if ($('#tgl-pinjam').hasClass('active')) {
                $('#pagination-container').show();
            } else {
                $('#pagination-container').hide();
            }
        }
        togglePagination();
        $('a[data-toggle="tab"]').on('shown.bs.tab', function(e) {
            togglePagination();
        });
    });
</script>

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

<!-- Mewarnai Teks Status -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var table = document.getElementById('example1');
        var rows = table.getElementsByTagName('tr');
        for (var i = 1; i < rows.length; i++) {
            var statusCell = rows[i].querySelector('td[id^="status-"]');
            if (statusCell) {
                var statusText = statusCell.textContent.trim();
                if (statusText === "Telah disetujui !") {
                    statusCell.style.color = "green";
                } else if (statusText === "Telah ditolak !") {
                    statusCell.style.color = "red";
                }
            }
        }
    });
</script>