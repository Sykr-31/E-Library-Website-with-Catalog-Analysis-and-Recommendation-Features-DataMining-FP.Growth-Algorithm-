<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Kartu Anggota</title>
    <style type="text/css">
        @page {
            size: 10.5cm 14.8cm;
            margin: 1cm;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            width: 100%;
            margin: 0;
            padding: 0;
            background-size: cover;
            background-repeat: no-repeat;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            width: 100%;
            max-width: 10.5cm;
            padding: 0.5cm;
            box-sizing: border-box;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .info-table {
            font-size: 10px;
            margin-bottom: 12px;
            width: 100%;
            border-collapse: collapse;
        }

        .info-table td,
        .info-table th {
            border: 1px solid black;
            padding: 2px 3px;
            text-align: left;
        }

        .label-photo {
            text-align: center;
            vertical-align: middle;
            padding: 2px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .text {
            text-align: left;
        }

        .label {
            width: 80px;
            text-align: left;
        }

        .free-label-space {
            width: 67%;
            text-align: left;
        }

        .label2 {
            width: 120px;
            text-align: left;
        }

        .header-image {
            text-align: center;
            margin-bottom: 10px;
        }

        .header-image img {
            height: 65px;
        }

        .garisbawah {
            border-bottom: 1px solid;
            padding-bottom: 4px;
            text-align: center;
        }

        .foto-profil {
            width: 100%;
            max-width: 70px;
            height: auto;
            padding: 2px;
            object-fit: cover;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header-image garisbawah">
            <img src="../../assets/images/kartu_anggota.jpg" alt="Kartu Anggota">
        </div>

        <?php
        session_start();
        include "../../config/koneksi.php";

        if (isset($_GET['id']) && is_numeric($_GET['id'])) {
            $id = (int)$_GET['id'];
            $stmt = $koneksi->prepare("SELECT * FROM anggota WHERE id = ?");
            if ($stmt) {
                $stmt->bind_param("i", $id);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    $rowAnggota = $result->fetch_assoc();
        ?>
                    <table class="info-table">
                        <colgroup>
                            <col style="width: 100%">
                        </colgroup>
                        <tr>
                            <td class="text" colspan="4" style="line-height: 1.5; text-align: justify;">
                                &nbsp;&nbsp;&nbsp;&nbsp; Kartu anggota memudahkan perpustakaan dalam mengatur dan mengelola keanggotaan, termasuk pendaftaran, pembaruan, dan pencabutan keanggotaan jika diperlukan. Kartu ini juga membantu identifikasi anggota secara cepat dan memfasilitasi berbagai layanan perpustakaan.
                            </td>
                        </tr>
                    </table>

                    <table class="info-table">
                        <colgroup>
                            <col style="width: 16%">
                            <col style="width: 17%">
                            <col style="width: 2%">
                            <col style="width: 65%">
                        </colgroup>
                        <tr>
                            <td class="label-photo" rowspan="5">
                                <img src="../../assets/images/siswa.jpeg" alt="Foto Profil" class="foto-profil">
                            </td>
                            <td class="label"><b>NIS</b></td>
                            <td>:</td>
                            <td class="free-label-space"><b><?= htmlspecialchars($rowAnggota['nis'], ENT_QUOTES, 'UTF-8'); ?></b></td>
                        </tr>
                        <tr>
                            <td class="label"><b>Nama Lengkap</b></td>
                            <td>:</td>
                            <td class="free-label-space"><b><?= htmlspecialchars($rowAnggota['nama_lengkap'], ENT_QUOTES, 'UTF-8'); ?></b></td>
                        </tr>
                        <tr>
                            <td class="label"><b>Kelas</b></td>
                            <td>:</td>
                            <td class="free-label-space"><b><?= htmlspecialchars($rowAnggota['kelas'], ENT_QUOTES, 'UTF-8'); ?></b></td>
                        </tr>
                        <tr>
                            <td class="label"><b>Alamat</b></td>
                            <td>:</td>
                            <td class="free-label-space"><b><?= htmlspecialchars($rowAnggota['alamat'], ENT_QUOTES, 'UTF-8'); ?></b></td>
                        </tr>
                        <tr>
                            <td class="label"><b>Nomor Hp</b></td>
                            <td>:</td>
                            <td class="free-label-space"><b><?= htmlspecialchars($rowAnggota['nomor_hp'], ENT_QUOTES, 'UTF-8'); ?></b></td>
                        </tr>
                    </table>

        <?php
                } else {
                    header("Location: {$_SERVER['HTTP_REFERER']}");
                    exit();
                }
                $stmt->close();
            } else {
                echo "Terjadi kesalahan dalam persiapan query.";
                exit();
            }
        } else {
            echo "Parameter ID tidak diberikan atau tidak valid!";
            exit();
        }
        ?>

        <!-- ============= Tertanda yang mencetak ============= -->

        <table class="info-table">
            <colgroup>
                <col style="width: 16%">
                <col style="width: 56%">
                <col style="width: 28%">
            </colgroup>
            <tbody>
                <tr>
                    <td class="info" style="text-align: center;">Hyperlink :</td>
                    <td class="info"> </td>
                    <td class="info">Mataraman, <?= htmlspecialchars(tanggalIndonesia(date("Y-m-d")), ENT_QUOTES, 'UTF-8'); ?></td>
                </tr>
                <tr>
                    <td class="info" rowspan="5">
                        <a href="http://localhost/perpustakaan/app/scanner/riwayat-peminjaman?id=<?= $id ?>">Lihat Riwayat Peminjaman</a>
                    </td>

                    <td class="info"> </td>
                    <td class="info">Mengetahui,</td>
                </tr>
                <tr>
                    <td class="info"> </td>
                    <td class="info">&nbsp;</td>
                </tr>
                <tr>
                    <td class="info"> </td>
                    <td class="info">&nbsp;</td>
                </tr>
                <tr>
                    <td class="info"> </td>
                    <td class="info">Penanggung Jawab</td>
                </tr>
                <tr>
                    <td class="info"> </td>
                    <td class="info">
                        <b><?= htmlspecialchars($_SESSION['nama_lengkap'], ENT_QUOTES, 'UTF-8'); ?></b>
                    </td>
                </tr>
            </tbody>
        </table>

    </div>
</body>

</html>