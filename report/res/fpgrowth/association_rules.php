<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Laporan Association Rules</title>
    <style type="text/css">
        table {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        th {
            border: 1px solid;
            padding: 8px;
            text-align: center;
            background-color: #ddd;
        }

        td {
            border: 1px solid;
            padding: 8px;
        }

        td.angka {
            text-align: right;
        }

        td.center {
            text-align: center;
        }

        td.garisbawah {
            text-align: center;
            border-bottom: 1px solid;
            padding-bottom: 6px;
        }

        td.info {
            border: 0px;
            padding: 2px;
        }

        td.tebal {
            font-weight: bold;
        }

        td.spasi-ttd {
            border: 0px;
            height: 32px;
        }

        .center {
            height: 100px;
        }

        .judul {
            font-size: 20px;
            font-weight: bold;
            display: table;
            margin: 0 auto;
        }
    </style>
</head>

<body>
    <table>
        <colgroup>
            <col style="width: 100%">
        </colgroup>
        <tbody>
            <tr>
                <td class="info garisbawah">
                    <img style="height: 100px;" src="../../assets/images/header.jpg" alt="">
                </td>
            </tr>
        </tbody>
    </table>

    <br>
    <div style="text-align: center;">
        <span class="judul">LAPORAN ANALISA MINAT BACA <br> ASSOCIATION RULES</span>
    </div>

    <br>
    <!-- ============= Laporan ============= -->

    <?php
    session_start();
    include '../../config/koneksi.php'; // Pastikan file koneksi di-include

    $result = null;
    $data = array();

    $query = "SELECT * FROM association_rule";
    $result = mysqli_query($koneksi, $query);

    if (!$result || mysqli_num_rows($result) === 0) {
        $_SESSION['gagal'] = "Tidak ada data association rule yang ditemukan!";
        echo "<script>window.location.href = '{$_SERVER['HTTP_REFERER']}';</script>";
        exit();
    } else {
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
    }
    ?>

    <table>
        <colgroup>
            <col style="width: 5%" class="angka">
            <col style="width: 30%">
            <col style="width: 22%">
            <col style="width: 15%">
            <col style="width: 15%">
            <col style="width: 13%">
        </colgroup>

        <thead>
            <tr>
                <th>No</th>
                <th>Antecedent</th>
                <th>Consequent</th>
                <th>Antecedent Support</th>
                <th>Consequent Support</th>
                <th>Confidence</th>
            </tr>
        </thead>

        <tbody>
            <?php
            $no = 1;
            foreach ($data as $row) {
            ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $row['antecedent']; ?></td>
                    <td><?= $row['consequent']; ?></td>
                    <td style="text-align: center;"><?= number_format($row['antecedent_support'], 2); ?>%</td>
                    <td style="text-align: center;"><?= number_format($row['consequent_support'], 2); ?>%</td>
                    <td style="text-align: center;"><?= number_format($row['confidence'], 2); ?>%</td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>

    <!-- ============= Tertanda yang mencentak ============= -->
    <br>
    <?php
    $queryPetugas = mysqli_query($koneksi, "SELECT * FROM petugas");
    if (!$queryPetugas) {
        die('Error in query: ' . mysqli_error($koneksi));
    }

    if ($rowPetugas = mysqli_fetch_assoc($queryPetugas)) {
        $_SESSION['id'] = $rowPetugas['id'];
        $_SESSION['nama_lengkap'] = $rowPetugas['nama_lengkap'];

    ?>
        <table style="text-align: center;">
            <colgroup>
                <col style="width: 75%">
                <col style="width: 25%">
            </colgroup>
            <tbody>
                <tr>
                    <td class="info"></td>
                    <td class="info"></td>
                </tr>
                <tr>
                    <td class="info"></td>
                    <td class="info"></td>
                </tr>
                <tr>
                    <td class="info"></td>
                    <td class="info">Mataraman, <?= tanggalIndonesia(date("Y-m-d")) ?></td>
                </tr>
                <tr>
                    <td class="info"></td>
                    <td class="info">Mengetahui,</td>
                </tr>
                <tr>
                    <td class="info"></td>
                    <td class="info">Penanggung Jawab</td>
                </tr>
                <tr>
                    <td rowspan="1" class="spasi-ttd"></td>
                </tr>
                <tr>
                    <td class="info"></td>
                    <td class="info"><b><?= $_SESSION['nama_lengkap'] ?></b></td>
                </tr>
            </tbody>
        </table>
        <!-- End -->
    <?php
    }
    ?>