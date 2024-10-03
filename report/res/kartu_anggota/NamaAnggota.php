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
            font-family: 'Times New Roman', Times, serif;
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

        .border-container {
            border: 1px solid black;
            box-sizing: border-box;
            width: 100%;
            max-width: 10.5cm;
            border-radius: 2px;
        }

        .container {
            width: 100%;
            max-width: 10.5cm;
            padding: 0;
            box-sizing: border-box;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .info-table1 {
            font-size: 8px;
            margin-bottom: 11px;
            width: 100%;
            border-collapse: collapse;
        }

        .info-table1 td,
        .info-table1 th {
            border: none;
            padding: 1px;
            text-align: left;
        }

        .info-table2 {
            font-size: 8px;
            margin-bottom: 6px;
            width: 100%;
            border-collapse: collapse;
        }

        .info-table2 td,
        .info-table2 th {
            border: none;
            padding: 1px;
            text-align: center;
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
            width: 100%;
        }

        .header-image img {
            width: 100%;
            margin-bottom: 0px;
            height: auto;
            display: block;
        }

        .garisbawah {
            border-bottom: 1px solid;
            margin-bottom: 11px;
            text-align: center;
            width: 100%;
        }

        .foto-profil {
            width: 100%;
            max-width: 70px;
            height: auto;
            padding: 2px;
            object-fit: cover;
        }

        .qr-code {
            width: 100%;
            max-width: 43px;
            height: auto;
            display: block;
            margin: 0 auto;
        }

        .info {
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
</head>

<body>
    <div class="border-container">
        <div class="container">
            <div class="header-image garisbawah">
                <img src="../../assets/images/kartu_anggota3.jpg" alt="Kartu Anggota">
            </div>

            <?php
            session_start();
            include "../../config/koneksi.php";
            function generateQRCode($url)
            {
                require_once __DIR__ . '/../../../assets/phpqrcode/qrlib.php'; // Sesuaikan path dengan lokasi qrlib.php
                ob_start();
                \QRcode::png($url, null, QR_ECLEVEL_H, 10, 2);
                $imageData = ob_get_contents();
                ob_end_clean();
                return 'data:image/png;base64,' . base64_encode($imageData);
            }
            if (isset($_GET['id']) && is_numeric($_GET['id'])) {
                $id = (int)$_GET['id'];
                $stmt = $koneksi->prepare("SELECT * FROM anggota WHERE id = ?");
                if ($stmt) {
                    $stmt->bind_param("i", $id);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    if ($result->num_rows > 0) {
                        $rowAnggota = $result->fetch_assoc();
                        // Generate QR Code Data URI
                        $qrUrl = "http://localhost/perpustakaan/app/scanner/riwayat-peminjaman?id=$id";
                        $qrCodeDataUri = generateQRCode($qrUrl);

                        // Simpan nama lengkap anggota ke variabel
                        $namaLengkap = htmlspecialchars($rowAnggota['nama_lengkap'], ENT_QUOTES, 'UTF-8');
            ?>

                        <table class="info-table1">
                            <colgroup>
                                <col style="width: 6%">
                                <col style=" width: 16%">
                                <col style="width: 18%">
                                <col style="width: 2%">
                                <col style="width: 58%">
                            </colgroup>
                            <tr>
                                <td></td>
                                <td class="label-photo" rowspan="6">
                                    <img src="../../assets/images/siswa.jpeg" alt="Foto Profil" class="foto-profil">
                                </td>
                                <td class="label"><b>NIS</b></td>
                                <td>:</td>
                                <td class="free-label-space"><b><?= htmlspecialchars($rowAnggota['nis'], ENT_QUOTES, 'UTF-8'); ?></b></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td class="label"><b>Nama Lengkap</b></td>
                                <td>:</td>
                                <td class="free-label-space"><b><?= $namaLengkap; ?></b></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td class="label"><b>Kelas</b></td>
                                <td>:</td>
                                <td class="free-label-space"><b><?= htmlspecialchars($rowAnggota['kelas'], ENT_QUOTES, 'UTF-8'); ?></b></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td class="label"><b>Alamat</b></td>
                                <td>:</td>
                                <td class="free-label-space"><b><?= htmlspecialchars($rowAnggota['alamat'], ENT_QUOTES, 'UTF-8'); ?></b></td>
                            </tr>
                            <tr>
                                <td></td>
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
            <table class="info-table2">
                <colgroup>
                    <col style="width: 34%">
                    <col style="width: 26%">
                    <col style="width: 40%">
                </colgroup>
                <tbody>
                    <tr>
                        <td class="info" style="text-align: center;">Riwayat Peminjaman</td>
                        <td class="info"> </td>
                        <td class="info">Mataraman, <?= htmlspecialchars(tanggalIndonesia(date("Y-m-d")), ENT_QUOTES, 'UTF-8'); ?></td>
                    </tr>
                    <tr>
                        <td class="info" rowspan="5" style="padding: 4px;">
                            <img src="<?= $qrCodeDataUri ?>" alt="QR Code" class="qr-code">
                        </td>
                        <td class="info"> </td>
                        <td class="info">Mengetahui,</td>
                    </tr>
                    <tr>
                        <td class="info"> </td>
                        <td class="info">Penanggung Jawab</td>
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
                        <td class="info">&nbsp;</td>
                    </tr>
                    <tr>
                        <td>
                            <b><?= $namaLengkap; ?></b>
                        </td>
                        <td class="info"> </td>
                        <td class="info">
                            <b><?= htmlspecialchars($_SESSION['nama_lengkap'], ENT_QUOTES, 'UTF-8'); ?></b>
                        </td>
                    </tr>
                </tbody>
            </table>
            <!-- End -->
        </div>
    </div>
</body>

</html>