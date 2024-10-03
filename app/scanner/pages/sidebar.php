<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="../../assets/dist/img/avatar01.png" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>Guest User</p>
                <a><i class='fa fa-user-circle text-info'></i> Hak Akses Sebagai Tamu</a>
            </div>
        </div>

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN MENU</li>
            <li><a href="login"><i class="fa fa-sign-out"></i> <span>Login / Daftar</span></a></li>
            <!-- Uncomment this section if you need the pesan menu
    <li>
        <a href="pesan"><i class="fa fa-envelope"></i>
            <span>Pesan</span>
            <span class="pull-right-container" id="jumlahPesan">
                <?php
                include "../../config/koneksi.php";

                $nama_saya = $_SESSION['fullname'];
                $default = "Belum dibaca";
                $query_pesan  = mysqli_query($koneksi, "SELECT * FROM pesan WHERE penerima = '$nama_saya' AND status = '$default'");
                $jumlah_pesan = mysqli_num_rows($query_pesan);

                if ($jumlah_pesan != null) {
                    echo "<span class='label label-danger pull-right'>" . $jumlah_pesan . "</span>";
                }
                ?>
            </span>
        </a>
    </li>
    -->
        </ul>
        <!-- /.sidebar -->
    </section>
</aside>