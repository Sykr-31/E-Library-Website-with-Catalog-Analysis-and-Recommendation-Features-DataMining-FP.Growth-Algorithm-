<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1 style="font-family: 'Quicksand', sans-serif; font-weight: bold;">
            Beranda
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
            <li><a href="beranda"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Beranda</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <?php
        date_default_timezone_set('Asia/Jakarta');
        $jam = date("H:i");

        // atur salam dengan IF
        if ($jam > '05:30' && $jam < '10:00') {
            $salam = 'Pagi';
        } elseif ($jam >= '10:00' && $jam < '15:00') {
            $salam = 'Siang';
        } elseif ($jam < '18:00') {
            $salam = 'Sore';
        } else {
            $salam = 'Malam';
        }
        ?>
        <?php
        include "../../config/koneksi.php";

        $sql = mysqli_query($koneksi, "SELECT * FROM identitas");
        $row1 = mysqli_fetch_assoc($sql);
        ?>
        <div class="alert alert-secondary" style="color: #383d41; background-color: #e2e3e5; border-color: #d6d8db;">
            Selamat <?= $salam; ?>, Selamat Datang <b><?= $_SESSION['fullname']; ?></b>, di Perpustakaan Digital SMPN 2 Mataraman.
        </div>
        <!-- -->
        <?php
        include "../../config/koneksi.php";
        $query = mysqli_query($koneksi, "SELECT * FROM identitas");
        $row = mysqli_fetch_assoc($query);

        ?>
        <h2 class="text-center" style="font-family: Quicksand, sans-serif;"><br></h2>
        <img src="../../assets/dist/img/icon-app.png" width="120px" height="120px" style="display: block; margin-left: auto; margin-right: auto; margin-top: 30px; margin-bottom: -20px;">
        <br>
        <h1 class="text-center" style="font-family: Quicksand, sans-serif;"> Perpustakaan <br> SMPN 2 Mataraman.</h1>
        <p class="text-center">Alamat : Jl. Gunung Ulin, Kecamatan Mataraman, Kabupaten Banjar, Kalimantan Selatan.</p>

    </section>
    <!-- /.content -->
</div>