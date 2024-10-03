<?php
session_start();
include "../../../../config/koneksi.php";

function redirectWithMessage($message, $url)
{
    $_SESSION['gagal'] = $message;
    header("location: " . $url);
    exit();
}

if (isset($_GET['act'])) {
    if (isset($_GET['act']) && $_GET['act'] == "tambah") {
        $judul_buku = $_POST['judulBuku'];
        $pengarang = $_POST['pengarang'];
        $tahun_terbit = $_POST['tahunTerbit'];
        $isbn = $_POST['iSbn'];
        $j_buku_baik = $_POST['jumlahBukuBaik'];
        $j_buku_rusak = $_POST['jumlahBukuRusak'];
        $deskripsi = $_POST['deskripsi'];
        $nama_kategori = $_POST['kategoriBuku'];
        $nama_penerbit = $_POST['penerbitBuku'];

        // Mendapatkan id_kategori dari nama_kategori
        $kategoriQuery = mysqli_prepare($koneksi, "SELECT id FROM kategori WHERE nama_kategori = ?");
        mysqli_stmt_bind_param($kategoriQuery, 's', $nama_kategori);
        mysqli_stmt_execute($kategoriQuery);
        mysqli_stmt_bind_result($kategoriQuery, $id_kategori);
        mysqli_stmt_fetch($kategoriQuery);
        mysqli_stmt_close($kategoriQuery);

        if (empty($id_kategori)) {
            $_SESSION['gagal'] = "Kategori buku tidak boleh kosong, harap pilih kategori !";
            header("location: " . $_SERVER['HTTP_REFERER']);
            exit();
        }

        // Mendapatkan id_penerbit dari nama_penerbit
        $penerbitQuery = mysqli_prepare($koneksi, "SELECT id FROM penerbit WHERE nama_penerbit = ?");
        mysqli_stmt_bind_param($penerbitQuery, 's', $nama_penerbit);
        mysqli_stmt_execute($penerbitQuery);
        mysqli_stmt_bind_result($penerbitQuery, $id_penerbit);
        mysqli_stmt_fetch($penerbitQuery);
        mysqli_stmt_close($penerbitQuery);

        if (empty($id_penerbit)) {
            $_SESSION['gagal'] = "Penerbit buku tidak boleh kosong, harap pilih penerbit !";
            header("location: " . $_SERVER['HTTP_REFERER']);
            exit();
        }

        // Lanjutan skrip tambah buku...
        $uploadDir = "uploadsGambar/";

        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        if (!is_writable($uploadDir)) {
            $_SESSION['gagal'] = "Direktori tidak dapat ditulis oleh server.";
            header("location: " . $_SERVER['HTTP_REFERER']);
            exit();
        }

        $foto_buku = '';

        if ($_FILES['foto_buku']['error'] === UPLOAD_ERR_OK) {
            $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];

            if (in_array($_FILES['foto_buku']['type'], $allowedTypes)) {
                $filename = $_FILES['foto_buku']['tmp_name'];
                $extension = pathinfo($_FILES['foto_buku']['name'], PATHINFO_EXTENSION);
                $newFilename = uniqid() . '.' . $extension;
                $destination = $uploadDir . $newFilename;

                if (move_uploaded_file($filename, $destination)) {
                    $foto_buku = $newFilename;
                } else {
                    $_SESSION['gagal'] = "Gagal mengunggah gambar.";
                    header("location: " . $_SERVER['HTTP_REFERER']);
                    exit();
                }
            } else {
                $_SESSION['gagal'] = "Jenis file tidak diizinkan. Jenis file yang diunggah: " . $_FILES['foto_buku']['type'];
                header("location: " . $_SERVER['HTTP_REFERER']);
                exit();
            }
        } elseif ($_FILES['foto_buku']['error'] !== UPLOAD_ERR_NO_FILE) {
            $_SESSION['gagal'] = "Terjadi kesalahan saat mengunggah file. Kode error: " . $_FILES['foto_buku']['error'];
            header("location: " . $_SERVER['HTTP_REFERER']);
            exit();
        } else {
            $_SESSION['gagal'] = "File gambar tidak diunggah !";
            header("location: " . $_SERVER['HTTP_REFERER']);
            exit();
        }

        $sql = "INSERT INTO buku (judul_buku, pengarang, tahun_terbit, isbn, j_buku_baik, j_buku_rusak, foto_buku, deskripsi, id_kategori, id_penerbit)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = mysqli_prepare($koneksi, $sql);
        mysqli_stmt_bind_param(
            $stmt,
            'ssssssssii',
            $judul_buku,
            $pengarang,
            $tahun_terbit,
            $isbn,
            $j_buku_baik,
            $j_buku_rusak,
            $foto_buku,
            $deskripsi,
            $id_kategori,
            $id_penerbit
        );

        if (mysqli_stmt_execute($stmt)) {
            $_SESSION['berhasil'] = "Data buku berhasil ditambahkan !";
            $_SESSION['foto_buku'] = $foto_buku;
            header("location: " . $_SERVER['HTTP_REFERER']);
            exit();
        } else {
            $_SESSION['gagal'] = "Data buku gagal ditambahkan: " . mysqli_error($koneksi);
            header("location: " . $_SERVER['HTTP_REFERER']);
            exit();
        }
    } elseif ($_GET['act'] == "edit") {
        $id_buku = $_POST['id_buku'];
        $judul_buku = $_POST['judulBuku'];
        $pengarang = $_POST['pengarang'];
        $tahun_terbit = $_POST['tahunTerbit'];
        $isbn = $_POST['iSbn'];
        $j_buku_baik = $_POST['jumlahBukuBaik'];
        $j_buku_rusak = $_POST['jumlahBukuRusak'];
        $deskripsi = $_POST['deskripsi'];
        $nama_kategori = $_POST['kategoriBuku'];
        $nama_penerbit = $_POST['penerbitBuku'];

        $uploadDir = "uploadsGambar/";

        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        if (!is_writable($uploadDir)) {
            $_SESSION['gagal'] = "Direktori tidak dapat ditulis oleh server.";
            redirectWithMessage($_SESSION['gagal'], $_SERVER['HTTP_REFERER']);
        }

        // Ambil nama file foto buku sebelumnya
        $foto_buku_sebelumnya = $_POST['foto_buku_existing'];

        if ($_FILES['foto_buku']['error'] === UPLOAD_ERR_OK) {
            $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
            $maxFileSize = 5 * 1024 * 1024; // 5 MB

            if (in_array($_FILES['foto_buku']['type'], $allowedTypes) && $_FILES['foto_buku']['size'] <= $maxFileSize) {
                $filename = $_FILES['foto_buku']['tmp_name'];
                $extension = pathinfo($_FILES['foto_buku']['name'], PATHINFO_EXTENSION);
                $newFilename = uniqid() . '.' . $extension;
                $destination = $uploadDir . $newFilename;

                // Hapus gambar lama jika ada
                if (!empty($foto_buku_sebelumnya) && file_exists($uploadDir . $foto_buku_sebelumnya)) {
                    unlink($uploadDir . $foto_buku_sebelumnya);
                }

                if (move_uploaded_file($filename, $destination)) {
                    $foto_buku = $newFilename;
                } else {
                    $_SESSION['gagal'] = "Gagal mengunggah gambar.";
                    redirectWithMessage($_SESSION['gagal'], $_SERVER['HTTP_REFERER']);
                }
            } else {
                $_SESSION['gagal'] = "Jenis file tidak diizinkan atau ukuran file terlalu besar (maksimal 5 MB).";
                redirectWithMessage($_SESSION['gagal'], $_SERVER['HTTP_REFERER']);
            }
        } else {
            // Jika tidak ada file gambar yang diunggah, gunakan foto_buku yang sudah ada
            $foto_buku = $foto_buku_sebelumnya;
        }

        // Mendapatkan id_kategori dari nama_kategori
        $kategoriQuery = mysqli_prepare($koneksi, "SELECT id FROM kategori WHERE id = ?");
        mysqli_stmt_bind_param($kategoriQuery, 'i', $nama_kategori);
        mysqli_stmt_execute($kategoriQuery);
        mysqli_stmt_bind_result($kategoriQuery, $id_kategori);
        mysqli_stmt_fetch($kategoriQuery);
        mysqli_stmt_close($kategoriQuery);

        if (empty($id_kategori)) {
            redirectWithMessage("Kategori tidak valid.", $_SERVER['HTTP_REFERER']);
        }

        // Mendapatkan id_penerbit dari nama_penerbit
        $penerbitQuery = mysqli_prepare($koneksi, "SELECT id FROM penerbit WHERE id = ?");
        mysqli_stmt_bind_param($penerbitQuery, 'i', $nama_penerbit);
        mysqli_stmt_execute($penerbitQuery);
        mysqli_stmt_bind_result($penerbitQuery, $id_penerbit);
        mysqli_stmt_fetch($penerbitQuery);
        mysqli_stmt_close($penerbitQuery);

        if (empty($id_penerbit)) {
            redirectWithMessage("Penerbit tidak valid.", $_SERVER['HTTP_REFERER']);
        }

        error_log("judul_buku: " . $judul_buku);
        error_log("pengarang: " . $pengarang);
        error_log("tahun_terbit: " . $tahun_terbit);
        error_log("isbn: " . $isbn);
        error_log("j_buku_baik: " . $j_buku_baik);
        error_log("j_buku_rusak: " . $j_buku_rusak);
        error_log("foto_buku: " . $foto_buku);
        error_log("deskripsi: " . $deskripsi);
        error_log("id_kategori: " . $id_kategori);
        error_log("id_penerbit: " . $id_penerbit);

        if (!is_numeric($isbn)) {
            $isbn = intval($isbn);
        }

        if (!is_numeric($j_buku_baik)) {
            $j_buku_baik = intval($j_buku_baik);
        }

        if (!is_numeric($j_buku_rusak)) {
            $j_buku_rusak = intval($j_buku_rusak);
        }

        $sql = "UPDATE buku SET judul_buku = ?, pengarang = ?, tahun_terbit = ?, isbn = ?, 
                    j_buku_baik = ?, j_buku_rusak = ?, foto_buku = ?, deskripsi = ?, id_kategori = ?, id_penerbit = ?
                    WHERE id = ?";

        $stmt = mysqli_prepare($koneksi, $sql);
        mysqli_stmt_bind_param(
            $stmt,
            'ssssssssiii',
            $judul_buku,
            $pengarang,
            $tahun_terbit,
            $isbn,
            $j_buku_baik,
            $j_buku_rusak,
            $foto_buku,
            $deskripsi,
            $id_kategori,
            $id_penerbit,
            $id_buku
        );

        error_log("SQL Query: " . $sql);
        error_log("Bind Param Result: " . mysqli_stmt_error($stmt));

        if (mysqli_stmt_execute($stmt)) {
            $_SESSION['berhasil'] = "Data buku berhasil diedit !";
            $_SESSION['foto_buku'] = $foto_buku;
            header("location: " . $_SERVER['HTTP_REFERER']);
            exit();
        } else {
            $_SESSION['gagal'] = "Data buku gagal diedit: " . mysqli_error($koneksi);
            header("location: " . $_SERVER['HTTP_REFERER']);
            exit();
        }
    } elseif ($_GET['act'] == "hapus") {
        $id_buku = $_GET['id'];

        $stmt = mysqli_prepare($koneksi, "DELETE FROM buku WHERE id = ?");
        mysqli_stmt_bind_param($stmt, 'i', $id_buku);
        mysqli_stmt_execute($stmt);

        if ($stmt) {
            $_SESSION['berhasil'] = "Data buku berhasil dihapus !";
            header("location: " . $_SERVER['HTTP_REFERER']);
        } else {
            $_SESSION['gagal'] = "Data buku gagal dihapus !";
            header("location: " . $_SERVER['HTTP_REFERER']);
        }
    }
}
