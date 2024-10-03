<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1 class="header-title">
            Form Petugas
            <small>
                <script type="text/javascript">
                    document.addEventListener('DOMContentLoaded', function() {
                        var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
                        var myDays = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
                        var date = new Date();
                        var day = date.getDate();
                        var month = date.getMonth();
                        var thisDay = myDays[date.getDay()];
                        var year = date.getFullYear();
                        document.getElementById('current-date').innerText = `${thisDay}, ${day} ${months[month]} ${year}`;
                    });
                </script>
                <span id="current-date"></span>
            </small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Data Petugas</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title header-title">Data Petugas</h3>
                        <div class="form-group m-b-2 text-right" style="margin-top: -20px; margin-bottom: -5px;">
                            <button type="button" onclick="tambahPetugas()" class="btn btn-info"><i class="fa fa-plus"></i> Tambah Petugas</button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Lengkap</th>
                                    <th>Nama Pengguna</th>
                                    <th>Kata Sandi</th>
                                    <th>Terakhir Login</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include "../../config/koneksi.php";
                                $no = 1;
                                $query = $koneksi->query("SELECT * FROM petugas");
                                while ($row = $query->fetch_assoc()) {
                                ?>
                                    <tr>
                                        <td><?= htmlspecialchars($no++); ?></td>
                                        <td><?= htmlspecialchars($row['nama_lengkap']); ?></td>
                                        <td><?= htmlspecialchars($row['username']); ?></td>
                                        <td>
                                            <?= (password_verify($row['password'], $_SESSION['password'])) ? htmlspecialchars($row['password']) : '************'; ?>
                                        </td>
                                        <td><?= ($row['terakhir_login']) ? htmlspecialchars($row['terakhir_login']) : 'Tidak diketahui !'; ?></td>
                                        <td>
                                            <a href="#" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modalEditPetugas<?= htmlspecialchars($row['id']); ?>"><i class="fa fa-edit"></i> Ubah</a>
                                            <a href="pages/function/Petugas.php?act=hapus&id=<?= htmlspecialchars($row['id']); ?>" class="btn btn-danger btn-sm btn-del"><i class="fa fa-trash"></i> Hapus</a>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>

                        <?php
                        $query = $koneksi->query("SELECT * FROM petugas");
                        while ($row = $query->fetch_assoc()) {
                        ?>

                            <!-- Modal Edit -->
                            <div class="modal fade" id="modalEditPetugas<?= htmlspecialchars($row['id']); ?>">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title header-title">Edit Petugas</h4>
                                        </div>
                                        <form action="pages/function/Petugas.php?act=edit" enctype="multipart/form-data" method="POST">
                                            <input type="hidden" name="id_petugas" value="<?= htmlspecialchars($row['id']); ?>">
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label>Nama Lengkap</label>
                                                    <input type="text" class="form-control" name="fullname" value="<?= htmlspecialchars($row['nama_lengkap']); ?>" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Nama Pengguna</label>
                                                    <input type="text" class="form-control" name="username" value="<?= htmlspecialchars($row['username']); ?>" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Kata Sandi <small style="color: red;">* Wajib diisi</small></label>
                                                    <input type="password" class="form-control" name="password" required>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary btn-block">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Modal Tambah -->
<div class="modal fade" id="modalTambahPetugas">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title header-title">Tambah Petugas</h4>
            </div>
            <form action="pages/function/Petugas.php?act=tambah" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <input type="hidden" name="id_user_lvl" value="1">
                    <div class="form-group">
                        <label>Nama Lengkap <small style="color: red;">* Wajib diisi</small></label>
                        <input type="text" class="form-control" placeholder="Masukkan Nama Lengkap" name="nama_lengkap" required>
                    </div>
                    <div class="form-group">
                        <label>Nama Pengguna <small style="color: red;">* Wajib diisi</small></label>
                        <input type="text" class="form-control" placeholder="Masukkan Nama Pengguna" name="username" required>
                    </div>
                    <div class="form-group">
                        <label>Kata Sandi <small style="color: red;">* Wajib diisi</small></label>
                        <input type="password" class="form-control" placeholder="Masukkan Kata Sandi" name="password" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-block">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function tambahPetugas() {
        $('#modalTambahPetugas').modal('show');
    }
</script>

<!-- jQuery 3 -->
<script src="../../assets/bower_components/jquery/dist/jquery.min.js"></script>
<script src="../../assets/dist/js/sweetalert.min.js"></script>

<!-- Pesan Berhasil Edit -->
<script>
    <?php if (isset($_SESSION['berhasil']) && $_SESSION['berhasil'] != '') : ?>
        swal({
            icon: 'success',
            title: 'Berhasil',
            text: '<?= htmlspecialchars($_SESSION['berhasil']); ?>'
        });
        <?php $_SESSION['berhasil'] = ''; ?>
    <?php endif; ?>
</script>

<!-- Pesan Gagal Edit -->
<script>
    <?php if (isset($_SESSION['gagal']) && $_SESSION['gagal'] != '') : ?>
        swal({
            icon: 'error',
            title: 'Gagal',
            text: '<?= htmlspecialchars($_SESSION['gagal']); ?>'
        });
        <?php $_SESSION['gagal'] = ''; ?>
    <?php endif; ?>
</script>

<!-- Swal Hapus Data -->
<script>
    $('.btn-del').on('click', function(e) {
        e.preventDefault();
        const href = $(this).attr('href')

        swal({
                icon: 'warning',
                title: 'Peringatan',
                text: 'Apakah anda yakin ingin menghapus data Petugas ini?',
                buttons: ['Tidak, Batalkan!', 'Iya, Hapus'],
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    document.location.href = href;
                } else {
                    swal({
                        icon: 'error',
                        title: 'Dibatalkan',
                        text: 'Data Petugas tersebut tetap aman!'
                    });
                }
            });
    });
</script>