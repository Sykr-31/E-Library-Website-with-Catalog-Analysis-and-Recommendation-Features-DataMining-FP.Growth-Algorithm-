-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Okt 2024 pada 04.30
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_perpustakaan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggota`
--

CREATE TABLE `anggota` (
  `id` int(11) NOT NULL,
  `nis` char(20) NOT NULL,
  `nama_lengkap` varchar(55) NOT NULL,
  `username` varchar(55) NOT NULL,
  `password` varchar(55) NOT NULL,
  `kelas` varchar(10) NOT NULL,
  `alamat` varchar(225) NOT NULL,
  `nomor_hp` char(20) NOT NULL,
  `tanggal_bergabung` varchar(55) NOT NULL,
  `terakhir_login` varchar(55) NOT NULL,
  `id_user_lvl` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `anggota`
--

INSERT INTO `anggota` (`id`, `nis`, `nama_lengkap`, `username`, `password`, `kelas`, `alamat`, `nomor_hp`, `tanggal_bergabung`, `terakhir_login`, `id_user_lvl`) VALUES
(144, '23212', 'Agil Sutiyono Rama Dhani', 'Agil Sutiyono Rama Dhani', 'Agil Sutiyono Rama Dhani', 'VII A', 'Jl. Gunung Ulin, Gunung Ulin, Kec. Mataraman, Kab. Banjar Prov. Kalimantan Selatan', '-', '15-07-2024', '24-07-2024 ( 18:26:51 )', 2),
(145, '21312', 'Ahmad Rizki', 'ahmad rizki', 'Ahmad Rizki', 'VII A', 'Jl. Gunung Ulin, Gunung Ulin, Kec. Mataraman, Kab. Banjar Prov. Kalimantan Selatan', '-', '15-07-2024', '24-07-2024 ( 18:28:52 )', 2),
(146, '23767', 'Asanty Agustina Ramadani', 'asanty agustina ramadani', 'Asanty Agustina Ramadani', 'VII A', 'Jl. Gunung Ulin, Gunung Ulin, Kec. Mataraman, Kab. Banjar Prov. Kalimantan Selatan', '089843131423', '15-07-2024', '24-07-2024 ( 18:29:27 )', 2),
(147, '23412', 'Ayu Agustina', 'ayu agustina', 'Ayu Agustina', 'VII A', 'Jl. Gunung Ulin, Gunung Ulin, Kec. Mataraman, Kab. Banjar Prov. Kalimantan Selatan', '-', '15-07-2024', '22-07-2024 ( 14:37:01 )', 2),
(148, '12324', 'Daffa Aditya', 'daffa aditya', 'Daffa Aditya', 'VII A', 'Jl. Gunung Ulin, Gunung Ulin, Kec. Mataraman, Kab. Banjar Prov. Kalimantan Selatan', '-', '15-07-2024', '24-07-2024 ( 18:27:44 )', 2),
(149, '12312', 'Dika Maulana', 'dika maulana', 'Dika Maulana', 'VII A', 'Jl. Gunung Ulin, Gunung Ulin, Kec. Mataraman, Kab. Banjar Prov. Kalimantan Selatan', '-', '15-07-2024', '22-07-2024 ( 14:38:10 )', 2),
(150, '23987', 'Fauzi Rahman Abdillah', 'fauzi rahman abdillah', 'Fauzi Rahman Abdillah', 'VII A', 'Jl. Gunung Ulin, Gunung Ulin, Kec. Mataraman, Kab. Banjar Prov. Kalimantan Selatan', '-', '15-07-2024', '24-07-2024 ( 18:28:05 )', 2),
(151, '20678', 'Ikhsan Ramadan', 'ikhsan ramadan', 'Ikhsan Ramadan', 'VII A', 'Jl. Gunung Ulin, Gunung Ulin, Kec. Mataraman, Kab. Banjar Prov. Kalimantan Selatan', '-', '15-07-2024', '24-07-2024 ( 18:28:37 )', 2),
(152, '29876', 'Maharani Angelia Putri', 'maharani angelia putri', 'Maharani Angelia Putri', 'VII A', 'Jl. Gunung Ulin, Gunung Ulin, Kec. Mataraman, Kab. Banjar Prov. Kalimantan Selatan', '-', '15-07-2024', '22-07-2024 ( 14:39:57 )', 2),
(153, '21239', 'Muhammad Fajar', 'muhammad fajar', 'Muhammad Fajar', 'VII A', 'Jl. Gunung Ulin, Gunung Ulin, Kec. Mataraman, Kab. Banjar Prov. Kalimantan Selatan', '-', '15-07-2024', '03-10-2024 ( 09:08:44 )', 2),
(154, '-', 'Muhammad Hafiz', 'muhammad hafiz', 'Muhammad Hafiz', 'VII A', '-', '-', '15-07-2024', '25-07-2024 ( 10:39:54 )', 2),
(155, '-', 'Muhammad Ilham Hifdzi', 'muhammad ilham hifdzi', 'Muhammad Ilham Hifdzi', 'VII A', '-', '-', '15-07-2024', '22-07-2024 ( 16:33:44 )', 2),
(156, '-', 'Muhammad Nazril Ilmi', 'muhammad nazril ilmi', 'Muhammad Nazril Ilmi', 'VII A', '-', '-', '15-07-2024', '22-07-2024 ( 16:47:26 )', 2),
(157, '-', 'Muhammad Ripa Andika', 'muhammad ripa andika', 'Muhammad Ripa Andika', 'VII A', '-', '-', '15-07-2024', '22-07-2024 ( 16:52:28 )', 2),
(158, '-', 'Putri Cakrawati', 'putri cakrawati', 'Putri Cakrawati', 'VII A', '-', '-', '15-07-2024', '22-07-2024 ( 16:53:25 )', 2),
(159, '-', 'Radika Putra Prima', 'radika putra prima', 'Radika Putra Prima', 'VII A', '-', '-', '15-07-2024', '22-07-2024 ( 16:53:55 )', 2),
(160, '-', 'Raditya Putra Hulis Pratama', 'raditya putra hulis pratama', 'Raditya Putra Hulis Pratama', 'VII A', '-', '-', '15-07-2024', '22-07-2024 ( 16:54:43 )', 2),
(161, '-', 'Rahmah', 'rahmah', 'Rahmah', 'VII A', '-', '-', '15-07-2024', '22-07-2024 ( 16:55:17 )', 2),
(162, '-', 'Rahmat Jaunsua', 'rahmat jaunsua', 'Rahmat Jaunsua', 'VII A', '-', '-', '15-07-2024', '22-07-2024 ( 16:56:02 )', 2),
(163, '-', 'Revano Dwi Handika', 'revano dwi handika', 'Revano Dwi Handika', 'VII A', '-', '-', '15-07-2024', '22-07-2024 ( 16:56:55 )', 2),
(164, '-', 'Septiani Nadia Pratiwi', 'septiani nadia pratiwi', 'Septiani Nadia Pratiwi', 'VII A', '-', '-', '15-07-2024', '22-07-2024 ( 17:01:48 )', 2),
(165, '-', 'Tiara Regina Anezka', 'tiara regina anezka', 'Tiara Regina Anezka', 'VII A', '-', '-', '15-07-2024', '22-07-2024 ( 17:03:02 )', 2),
(166, '-', 'Wilda Caesar Oktavian', 'wilda caesar oktavian', 'Wilda Caesar Oktavian', 'VII A', '-', '-', '15-07-2024', '22-07-2024 ( 17:03:30 )', 2),
(167, '-', 'Ahmad Jaidi Yannur', 'ahmad jaidi yannur', 'Ahmad Jaidi Yannur', 'VII B', '-', '-', '15-07-2024', '22-07-2024 ( 17:04:17 )', 2),
(168, '-', 'Alpina Sapina', 'alpina sapina', 'Alpina Sapina', 'VII B', '-', '-', '15-07-2024', '22-07-2024 ( 17:04:56 )', 2),
(169, '-', 'Amel', 'amel', 'Amel', 'VII B', '-', '-', '15-07-2024', '22-07-2024 ( 17:05:29 )', 2),
(170, '-', 'Azkia Putri', 'azkia putri', 'Azkia Putri', 'VII B', '-', '-', '15-07-2024', '22-07-2024 ( 17:06:17 )', 2),
(171, '-', 'Daniar Dwi Anggareza', 'daniar dwi anggareza', 'Daniar Dwi Anggareza', 'VII B', '-', '-', '15-07-2024', '22-07-2024 ( 17:06:36 )', 2),
(172, '-', 'Dika Bima Puwira', 'dika bima puwira', 'Dika Bima Puwira', 'VII B', '-', '-', '15-07-2024', '22-07-2024 ( 17:07:12 )', 2),
(173, '-', 'Fabiyan Nur Suwadana', 'fabiyan nur suwadana', 'Fabiyan Nur Suwadana', 'VII B', '-', '-', '15-07-2024', '22-07-2024 ( 17:07:34 )', 2),
(174, '-', 'Farera Yeni Lestari', 'farera yeni lestari', 'Farera Yeni Lestari', 'VII B', '-', '-', '15-07-2024', '', 2),
(175, '-', 'Gina Nafisya', 'gina nafisya', 'Gina Nafisya', 'VII B', '-', '-', '15-07-2024', '', 2),
(176, '-', 'Khoiri', 'khoiri', 'Khoiri', 'VII B', '-', '-', '15-07-2024', '', 2),
(177, '-', 'Muhammad Akbar', 'muhammad akbar', 'Muhammad Akbar', 'VII B', '-', '-', '15-07-2024', '', 2),
(178, '-', 'Muhammad Fediyan Saputra', 'muhammad fediyan saputra', 'Muhammad Fediyan Saputra', 'VII B', '-', '-', '15-07-2024', '', 2),
(179, '-', 'Muhammad Hafiz Al Mutaqin', 'muhammad hafiz al mutaqin', 'Muhammad Hafiz Al Mutaqin', 'VII B', '-', '-', '15-07-2024', '', 2),
(180, '-', 'Muhammad Ilham', 'muhammad ilham', 'Muhammad Ilham', 'VII B', '-', '-', '15-07-2024', '', 2),
(181, '-', 'Muhammad Syahril Mubaroq', 'muhammad syahril mubaroq', 'Muhammad Syahril Mubaroq', 'VII B', '-', '-', '15-07-2024', '', 2),
(182, '-', 'Muhammad Yasir Ilham', 'muhammad yasir ilham', 'Muhammad Yasir Ilham', 'VII B', '-', '-', '15-07-2024', '', 2),
(183, '-', 'Mutia Husna', 'mutia husna', 'Mutia Husna', 'VII B', '-', '-', '15-07-2024', '', 2),
(184, '-', 'Ramadani', 'ramadani', 'Ramadani', 'VII B', '-', '-', '15-07-2024', '', 2),
(185, '-', 'Ridho Riski Yatama', 'ridho riski yatama', 'Ridho Riski Yatama', 'VII B', '-', '-', '15-07-2024', '', 2),
(186, '-', 'Syarifah Maisyarah', 'syarifah maisyarah', 'Syarifah Maisyarah', 'VII B', '-', '-', '15-07-2024', '', 2),
(187, '-', 'Wahyu Dwi Setiawan', 'wahyu dwi setiawan', 'Wahyu Dwi Setiawan', 'VII B', '-', '-', '15-07-2024', '', 2),
(188, '-', 'Zahra Dwi Ramadhani', 'zahra dwi ramadhani', 'Zahra Dwi Ramadhani', 'VII B', '-', '-', '15-07-2024', '', 2),
(189, '-', 'Ahmad Daffa Septian', 'ahmad daffa septian', 'Ahmad Daffa Septian', 'VIII A', '-', '-', '15-07-2024', '', 2),
(190, '-', 'Ahmad Donny Haykal', 'ahmad donny haykal', 'Ahmad Donny Haykal', 'VIII A', '-', '-', '15-07-2024', '', 2),
(191, '-', 'Dyla Rahmawati', 'dyla rahmawati', 'Dyla Rahmawati', 'VIII A', '-', '-', '15-07-2024', '', 2),
(192, '-', 'Fera Zaskia Ramadani', 'fera zaskia ramadani', 'Fera Zaskia Ramadani', 'VIII A', '-', '-', '15-07-2024', '', 2),
(193, '-', 'Hamdiyah', 'hamdiyah', 'Hamdiyah', 'VIII A', '-', '-', '15-07-2024', '', 2),
(194, '-', 'Handika Eqianur Putra', 'handika eqianur putra', 'Handika Eqianur Putra', 'VIII A', '-', '-', '15-07-2024', '', 2),
(195, '-', 'Livia Ramadhani Saona Gustin', 'livia ramadhani saona gustin', 'Livia Ramadhani Saona Gustin', 'VIII A', '-', '-', '15-07-2024', '', 2),
(196, '-', 'M. Aswani', 'm. aswani', 'M. Aswani', 'VIII A', '-', '-', '15-07-2024', '', 2),
(197, '-', 'Mariyati', 'mariyati', 'Mariyati', 'VIII A', '-', '-', '15-07-2024', '', 2),
(198, '-', 'Mifi Ariani', 'mifi ariani', 'Mifi Ariani', 'VIII A', '-', '-', '15-07-2024', '', 2),
(199, '-', 'Muhammad Abdul Wahid', 'muhammad abdul wahid', 'Muhammad Abdul Wahid', 'VIII A', '-', '-', '15-07-2024', '', 2),
(200, '-', 'Muhammad Aditya', 'muhammad aditya', 'Muhammad Aditya', 'VIII A', '-', '-', '15-07-2024', '', 2),
(201, '-', 'Muhammad Fahrizal', 'muhammad fahrizal', 'Muhammad Fahrizal', 'VIII A', '-', '-', '15-07-2024', '', 2),
(202, '-', 'Muhammad Raditya Aldi Pratama', 'muhammad raditya aldi pratama', 'Muhammad Raditya Aldi Pratama', 'VIII A', '-', '-', '15-07-2024', '', 2),
(203, '-', 'Muhammad Ridhuan', 'muhammad ridhuan', 'Muhammad Ridhuan', 'VIII A', '-', '-', '15-07-2024', '', 2),
(204, '-', 'Nur Ismin Maulida', 'nur ismin maulida', 'Nur Ismin Maulida', 'VIII A', '-', '-', '15-07-2024', '', 2),
(205, '-', 'Nurlita', 'nurlita', 'Nurlita', 'VIII A', '-', '-', '15-07-2024', '', 2),
(206, '-', 'Safa Intan Rejeki', 'safa intan rejeki', 'Safa Intan Rejeki', 'VIII A', '-', '-', '15-07-2024', '', 2),
(207, '-', 'Shinta Pramudya Wardani', 'shinta pramudya wardani', 'Shinta Pramudya Wardani', 'VIII A', '-', '-', '15-07-2024', '', 2),
(208, '-', 'Sindi Berliana', 'sindi berliana', 'Sindi Berliana', 'VIII A', '-', '-', '15-07-2024', '', 2),
(209, '-', 'Abdul Fathir', 'abdul fathir', 'Abdul Fathir', 'VIII B', '-', '-', '15-07-2024', '', 2),
(210, '-', 'Azri Reynaldi Kurdiat', 'azri reynaldi kurdiat', 'Azri Reynaldi Kurdiat', 'VIII B', '-', '-', '15-07-2024', '', 2),
(211, '-', 'Bayu Prasetyo', 'bayu prasetyo', 'Bayu Prasetyo', 'VIII B', '-', '-', '15-07-2024', '', 2),
(212, '-', 'Dea Arlitha Enggelina', 'dea arlitha enggelina', 'Dea Arlitha Enggelina', 'VIII B', '-', '-', '15-07-2024', '', 2),
(213, '-', 'Dina Virzynia Nurain', 'dina virzynia nurain', 'Dina Virzynia Nurain', 'VIII B', '-', '-', '15-07-2024', '', 2),
(214, '-', 'Fariza Alfiyan Nur', 'fariza alfiyan nur', 'Fariza Alfiyan Nur', 'VIII B', '-', '-', '15-07-2024', '', 2),
(215, '-', 'Gadis Dwi Anastasia', 'gadis dwi anastasia', 'Gadis Dwi Anastasia', 'VIII B', '-', '-', '15-07-2024', '', 2),
(216, '-', 'Kiki Fatmala', 'kiki fatmala', 'Kiki Fatmala', 'VIII B', '-', '-', '15-07-2024', '', 2),
(217, '-', 'Mirta Angreini', 'mirta angreini', 'Mirta Angreini', 'VIII B', '-', '-', '15-07-2024', '', 2),
(218, '-', 'Muhammad Mahzumi', 'muhammad mahzumi', 'Muhammad Mahzumi', 'VIII B', '-', '-', '15-07-2024', '', 2),
(219, '-', 'Muhammad Mirwan Hadi', 'muhammad mirwan hadi', 'Muhammad Mirwan Hadi', 'VIII B', '-', '-', '15-07-2024', '', 2),
(220, '-', 'Muhammad Ridho', 'muhammad ridho', 'Muhammad Ridho', 'VIII B', '-', '-', '15-07-2024', '', 2),
(221, '-', 'Murjani', 'murjani', 'Murjani', 'VIII B', '-', '-', '15-07-2024', '', 2),
(222, '-', 'Nova Riana Adriani', 'nova riana adriani', 'Nova Riana Adriani', 'VIII B', '-', '-', '15-07-2024', '', 2),
(223, '-', 'Pitri Noor Nespiana', 'pitri noor nespiana', 'Pitri Noor Nespiana', 'VIII B', '-', '-', '15-07-2024', '', 2),
(224, '-', 'Risma Dwi Saputri', 'risma dwi saputri', 'Risma Dwi Saputri', 'VIII B', '-', '-', '15-07-2024', '', 2),
(225, '-', 'Rusma Jamilah', 'rusma jamilah', 'Rusma Jamilah', 'VIII B', '-', '-', '15-07-2024', '', 2),
(226, '-', 'Sukma Saputra', 'sukma saputra', 'Sukma Saputra', 'VIII B', '-', '-', '15-07-2024', '', 2),
(227, '-', 'Susmiati', 'susmiati', 'Susmiati', 'VIII B', '-', '-', '15-07-2024', '', 2),
(228, '-', 'Tri Rahayu', 'tri rahayu', 'Tri Rahayu', 'VIII B', '-', '-', '15-07-2024', '', 2),
(229, '-', 'Aditya Pradita Wijaya', 'aditya pradita wijaya', 'Aditya Pradita Wijaya', 'IX', '-', '-', '15-07-2024', '15-07-2024 ( 19:58:41 )', 2),
(230, '-', 'Agus Fifiyanto', 'agus fifiyanto', 'Agus Fifiyanto', 'IX', '-', '-', '15-07-2024', '', 2),
(231, '-', 'Aprisilla Nadien Islami', 'aprisilla nadien islami', 'Aprisilla Nadien Islami', 'IX', '-', '-', '15-07-2024', '', 2),
(232, '-', 'Azura Naysila Putri', 'azura naysila putri', 'Azura Naysila Putri', 'IX', '-', '-', '15-07-2024', '', 2),
(233, '-', 'Fadil Ridwansyah', 'fadil ridwansyah', 'Fadil Ridwansyah', 'IX', '-', '-', '15-07-2024', '', 2),
(234, '-', 'Faqi Tri Wanur', 'faqi tri wanur', 'Faqi Tri Wanur', 'IX', '-', '-', '15-07-2024', '', 2),
(235, '-', 'Feti Novianti', 'feti novianti', 'Feti Novianti', 'IX', '-', '-', '15-07-2024', '', 2),
(236, '-', 'Miftahul Gina', 'miftahul gina', 'Miftahul Gina', 'IX', '-', '-', '15-07-2024', '', 2),
(237, '-', 'Muhammad Rifki', 'muhammad rifki', 'Muhammad Rifki', 'IX', '-', '-', '15-07-2024', '', 2),
(238, '-', 'Muhammad Zainal Arifin', 'muhammad zainal arifin', 'Muhammad Zainal Arifin', 'IX', '-', '-', '15-07-2024', '', 2),
(239, '-', 'Nida Sarifa', 'nida sarifa', 'Nida Sarifa', 'IX', '-', '-', '15-07-2024', '', 2),
(240, '-', 'Radika Alfandi', 'radika alfandi', 'Radika Alfandi', 'IX', '-', '-', '15-07-2024', '', 2),
(241, '-', 'Rudiansyah', 'rudiansyah', 'Rudiansyah', 'IX', '-', '-', '15-07-2024', '', 2),
(242, '-', 'Siti Rohimah', 'siti rohimah', 'Siti Rohimah', 'IX', '-', '-', '15-07-2024', '', 2),
(249, '123', 'testing', 'testing', 'testing', '', '', '123', 'Belum disetujui !', '16-08-2024 ( 10:34:42 )', 3),
(250, '123', 'testing', 'testing', 'testing', '', '', '123', 'Belum disetujui !', '', 3),
(251, '2010010471', 'Fakhrussyakirin', 'syaker', '123', '', '', '082132132132', '29-08-2024', '', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `association_rule`
--

CREATE TABLE `association_rule` (
  `id` int(11) NOT NULL,
  `antecedent` varchar(255) NOT NULL,
  `consequent` varchar(255) NOT NULL,
  `antecedent_support` float NOT NULL,
  `consequent_support` float NOT NULL,
  `confidence` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `association_rule`
--

INSERT INTO `association_rule` (`id`, `antecedent`, `consequent`, `antecedent_support`, `consequent_support`, `confidence`) VALUES
(385, 'Pintu Harmonika', 'Interaktif (PPKn)', 0.428571, 0.714286, 1),
(386, 'Jujutsu Kaisen 4', 'Interaktif (PPKn)', 0.571429, 0.714286, 0.75),
(387, 'Top Rank Buku Pintar IPA SMP/Mts', 'Jujutsu Kaisen 4', 0.428571, 0.571429, 0.666667),
(388, 'Interaktif (PPKn)', 'Jujutsu Kaisen 4', 0.714286, 0.571429, 0.6),
(389, 'Interaktif (PPKn)', 'Pintu Harmonika', 0.714286, 0.428571, 0.6),
(390, 'Jujutsu Kaisen 4', 'Top Rank Buku Pintar IPA SMP/Mts', 0.571429, 0.428571, 0.5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `association_rule_user`
--

CREATE TABLE `association_rule_user` (
  `id` int(11) NOT NULL,
  `antecedent` varchar(255) NOT NULL,
  `consequent` varchar(255) NOT NULL,
  `antecedent_support` float NOT NULL,
  `consequent_support` float NOT NULL,
  `confidence` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `association_rule_user`
--

INSERT INTO `association_rule_user` (`id`, `antecedent`, `consequent`, `antecedent_support`, `consequent_support`, `confidence`) VALUES
(536, 'Pintu Harmonika', 'Interaktif (PPKn)', 0.428571, 0.714286, 1),
(537, 'Jujutsu Kaisen 4', 'Interaktif (PPKn)', 0.571429, 0.714286, 0.75),
(538, 'Top Rank Buku Pintar IPA SMP/Mts', 'Jujutsu Kaisen 4', 0.428571, 0.571429, 0.666667),
(539, 'Interaktif (PPKn)', 'Jujutsu Kaisen 4', 0.714286, 0.571429, 0.6),
(540, 'Interaktif (PPKn)', 'Pintu Harmonika', 0.714286, 0.428571, 0.6),
(541, 'Jujutsu Kaisen 4', 'Top Rank Buku Pintar IPA SMP/Mts', 0.571429, 0.428571, 0.5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `id` int(11) NOT NULL,
  `judul_buku` varchar(125) NOT NULL,
  `pengarang` varchar(125) NOT NULL,
  `tahun_terbit` varchar(125) NOT NULL,
  `isbn` int(50) NOT NULL,
  `j_buku_baik` varchar(125) NOT NULL,
  `j_buku_rusak` varchar(125) NOT NULL,
  `foto_buku` varchar(255) DEFAULT NULL,
  `deskripsi` mediumtext NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_penerbit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`id`, `judul_buku`, `pengarang`, `tahun_terbit`, `isbn`, `j_buku_baik`, `j_buku_rusak`, `foto_buku`, `deskripsi`, `id_kategori`, `id_penerbit`) VALUES
(4, 'Jujutsu Kaisen Vol.01', 'Gege Akutami', '2021', 2147483647, '34', '6', '65b50f28224ad.jpg', 'Cerita dalam komik ini mengandung materi yang diperuntukkan untuk pembaca 13 tahun keatas. Tidak dianjurkan untuk dibaca anak-anak di bawah umur 13 tahun.\n\nJujutsu Kaisen adalah sebuah seri manga shōnen asal Jepang yang ditulis dan diilustrasikan oleh Gege Akutami. Manga ini dimuat berseri dalam majalah Weekly Shōnen Jump terbitan Shueisha sejak Maret 2018, dan telah diterbitkan menjadi dua puluh volume tankōbon per Agustus 2022.\n\nYūji Itadori adalah seorang siswa SMA dengan atletisitas yang tidak wajar yang tinggal di Sendai bersama kakeknya. Ia sering menghindari Klub Lari karena keengganannya pada bidang atletik, meskipun dia memiliki bakat bawaan untuk olahraga tersebut. Sebaliknya, dia memilih untuk bergabung dengan Klub Penelitian Ilmu Gaib, agar dirinya dapat bersantai dan bergaul dengan para seniornya. Setiap hari, Yūji meninggalkan sekolah pada pukul 17.00 untuk mengunjungi kakeknya di rumah sakit. Ketika dia mengunjunginya, kakeknya memberikan dua pesan kuat kepada Yūji, yaitu \"selalu membantu orang\" dan \"mati dikelilingi orang\". Setelah kematian kakeknya, Yūji menafsirkan pesan-pesan tersebut sebagai satu pernyataan—bahwa setiap orang berhak mendapatkan \"kematian yang layak\".\n\nSinopsis\nYuji Itadori seorang murid SMA dengan kemampuan atletik yang luar biasa. Kesehariannya adalah menjenguk kakeknya yang terbaring di rumah sakit. Suatu hari, segel \"objek terkutuk\" yang berada di sekolahnya terlepas, monster-monster pun mulai bermunculan. Yuji menyusup ke dalam gedung sekolah demi menolong senior di klubnya, akan tetapi...!?', 11, 16),
(5, 'Laskar Pelangi', 'Andrea Hirata', '2005', 2147483647, '40', '0', '65b1edbf116ff.jpg', 'Laskar Pelangi adalah novel yang pertama kali diterbitkan oleh penulis kenamaan, Andrea Hirata. Tepatnya, novel ini berhasil dirilis pada tahun 2015 oleh Penerbit Bentang Pustaka. Dalam peradabannya, Andrea Hirata pun mengeluarkan tiga novel sekuel lanjutan dari Laskar Pelangi, di antaranya Sang Pemimpi, Edensor, dan Maryamah Karpov.\r\n\r\nLaskar Pelangi merupakan novel yang terinspirasi dari kisah nyata kehidupan Andrea Hirata selaku penulis yang mana saat itu dirinya bertempat tinggal di Desa Gantung, Kabupaten Gantung, Belitung Timur. Berkenaan dengan hal tersebut, mudah bagi si penulis merepresentasikan berbagai unsur sosial dan budaya masyarakat Belitung ke dalam bentuk cerita di novel Laskar Pelangi ini secara apik.\r\n\r\n\"Bangunan itu nyaris rubuh. Dindingnya miring bersangga sebalok kayu. Atapnya bocor dimana-mana. Tetapi, berpasang-pasang mata mungil menatap penuh harap. Hendak kemana lagikah mereka harus bersekolah selain tempat itu? Tak peduli seberat apapun kondisi sekolah itu, sepuluh anak dari keluarga miskin itu tetap bergeming. Didada mereka, telah menggumpal tekad untuk maju.\"\r\n\r\nLaskar Pelangi, kisah perjuangan anak-anak untuk mendapatkan ilmu. Diceritakan dengan lucu dan menggelitik, novel ini menjadi novel terlaris di Indonesia. Inspiratif dan layak dimiliki siapa saja yang mencintai pendidikan dan keajaiban masa kanak-kanak.\r\n\r\nSINOPSIS\r\nLaskar Pelangi telah menjadi international best seller, diterjemahkan ke dalam 40 bahasa asing. Telah terbit dalam 22 bahasa, diedarkan di lebih dari 130 negara. Melalui program beasiswa, Hirata meraih Master of Science (M.Sc.) bidang teori ekonomi dari Sheffield Hallam University, UK. Hirata juga mendapat beasiswa pendidikan sastra di IWP (International Writing Program), University of Iowa, USA.\r\nDETAIL', 12, 8),
(6, 'Pintu Harmonika', 'Tere Liye', '2007', 2147483647, '35', '4', '65b1ee2f33b90.jpeg', 'Rizal, Juni, dan David menemukan surga lewat ketidaksengajaan; Buka pintu harmonika, berjalan mengikuti sinar matahari, dan temukan surga. Surga yang tersembunyi di belakang ruko tempat tinggal mereka.', 12, 7),
(7, 'Interaktif (PPKn)', 'Sigit Dwi Nuridha, Aprilia Nur Kurniawati', '2021', 2147483647, '38', '2', '65b517d87d2a3.jpg', ' Keunggulan buku ini: konten multimedia melalui QR Code, paket soal variatif mirip dengan AN, Olimpiade, SBMPTN, dan HOTS, serta fitur pendukung pembelajaran seperti Computational Thinking, Pojok Literasi, dan fitur Proyek Penguatan Profil Pelajar Pancasila. Dilengkapi juga dengan Buku Digital terintegrasi Jelajah Ilmu, yang gratis dan memungkinkan interaksi sosial serta monitoring orang tua.', 2, 14),
(8, 'Thinking, Fast and Slow', 'Daniel Kahneman', '2011', 2147483647, '40', '0', '65b35f0b4c3b5.jpeg', 'Daniel Kahneman adalah salah satu pemikir paling penting abad ini. Gagasannya berdampak mendalam dan luas di berbagai bidang—termasuk ekonomi, pengobatan, dan politik. Dalam buku yang sangat dinanti-nantikan ini, Kahneman menjelaskan dua sistem yang mendorong cara kita berpikir. Sistem 1 bersifat cepat, intuitif, dan emosional; Sistem 2 lebih pelan, lebih bertujuan, dan lebih logis.\r\n\r\nKahneman menunjukkan kemampuan luar biasa—juga kekurangan dan bias yang dimiliki oleh—berpikir cepat, serta mengungkapkan dampak kesan intuitif pada pikiran dan perilaku kita. Dengan mengetahui cara kedua sistem itu membentuk penilaian dan keputusan kita, kita bisa memahami, antara lain:\r\n\r\n• Dampak dari hilangnya antusiasme dan terlalu besarnya kepercayaan pada strategi korporat\r\n• Sulitnya memprediksi apa yang membuat kita bahagia kelak\r\n• Tantangan untuk membuat kerangka yang jelas tentang risiko di tempat kerja serta rumah\r\n• Dampak mendalam dari bias kognitif pada segala sesuatu, mulai dari bertransaksi di pasar bursa sampai merencanakan liburan berikutnya\r\n\r\nKahneman mengungkapkan ke mana kita bisa dan tidak bisa memercayakan intuisi kita serta bagaimana kita bisa menarik manfaat dari berpikir lambat. Dia menawarkan pemahaman praktis dan mencerahkan tentang cara menentukan pilihan dalam bisnis serta kehidupan pribadi—serta bagaimana kita bisa menggunakan teknik berbeda untuk mengatasi kesalahan yang kerap mendatangkan masalah bagi kita.', 15, 9),
(9, 'Aroma Karsa', 'Sapardi Djoko Damono', '2001', 2147483647, '37', '3', '65b360333f6bb.jpg', 'Dari sebuah lontar kuno, Raras Prayagung mengetahui bahwa Puspa Karsa yang dikenalnya sebagai dongeng, ternyata tanaman sungguhan yang tersembunyi di tempat rahasia. Obsesi Raras untuk memburu dan menemukan Puspa Karsa, bunga sakti yang konon mampu mengendalikan kehendak dan hanya bisa diidentifikasi melalui aroma, mempertemukannya dengan Jati Wesi.\r\n\r\nJati memiliki penciuman yang luar biasa. Di TPA Bantar Gebang, tempatnya tumbuh besar, ia dijuluki si Hidung Tikus. Dari berbagai pekerjaan yang dilakoninya untuk bertahan hidup, satu yang paling Jati banggakan, yakni meracik parfum. Kemampuan penciuman Jati ini mampu memikat Raras yang ingin mencari Puspa Karsa.\r\n\r\nDemi bisa lebih dekat dengan Jati dan memanfaatkan kemampuan Jati, Raras bahkan mempekerjakan Jati di perusahaannya. Raras juga turut mengundang Jati masuk ke dalam kehidupan pribadinya. Bertemulah Jati dengan Tanaya Suma, anak tunggal Raras, yang memiliki kemampuan serupa dengannya.\r\n\r\nSemakin jauh Jati terlibat dengan keluarga Prayagung dan Puspa Karsa, semakin banyak misteri yang ia temukan, tentang dirinya dan masa lalu yang tak pernah ia tahu. Akan kah semua misteri dibalik kehidupan Jati, niat Raras, dan keajaiban bunga Puspa Karsa terungkap? Ungkap semua rahasia dalam novel misteri Aroma Karsa karya Dee Lestari dengan edisi tanda tangan.', 16, 7),
(10, 'Mimpi Sejuta Dolar', 'Merry Riana', '2009', 2147483647, '38', '2', '65b1ebacc6285.jpg', 'Merry Riana, mungkin tak terbayang olehnya untuk bisa sesukses itu dengan memiliki satu juta dolar di usia 26 tahun. Semua berawal dari ricuhnya krisis moneter pada bulan Mei 1998 di Indonesia yang membawanya pindah ke Singapura untuk melanjutkan studi di Nanyang Technological University.\r\n\r\nSetelah lulus dari NTU entah mengapa keadaan ekonomi Merry bisa dibilang pas-pasan. Hal ini membuat Merry memutar paradigma hidupnya dan mulai berjuang untuk memperbaiki nasibnya melalui konsep dan etos kerja yang luar biasa. Perjuangan dan etos kerjanya ini lah yang membawa Merry menjadi milioner muda dan diakui sebagai pengusaha sukses dan motivator yang dinamis.\r\n\r\nBuku Merry Riana: Mimpi Sejuta Dollar akan membawakan kisah hidup Merry yang inspirasional. Mulai dari kondisi terendahnya, perubahan pola pikirnya, perwujudan impiannya, hingga titik awal kesuksesannya. Buku ini juga mencantumkan formula sukses yang dijalani Merry dan berbagai kata-kata yang sangat motivasional.\r\n\r\nDitulis dengan bahasa yang mengalir dan dinamis membuat pembaca ingin terus membaca dan menyelesaikan buku ini. Harapannya buku ini bisa menjadi pendorong bagi pembaca untuk berani bermimpi besar, percaya terhadap mimpi, dan terus bangkit dari kegagalan.', 14, 7),
(11, 'Jujutsu Kaisen 4', 'Gege Akutami', '2021', 2147483647, '35', '5', '65b50edc214a3.jpg', 'Di antara jenis buku lainnya, komik memang disukai oleh semua kalangan mulai dari anak kecil hingga orang dewasa. Alasan komik lebih disukai oleh banyak orang karena disajikan dengan penuh dengan gambar dan cerita yang mengasyikan sehingga mampu menghilangkan rasa bosan di kala waktu senggang. Komik seringkali dijadikan sebagai koleksi dan diburu oleh penggemarnya karena serinya yang cukup terkenal dan kepopulerannya terus berlanjut sampai saat ini. Dalam memilih jenis komik, ada baiknya perhatikan terlebih dahulu ringkasan cerita komik di sampul bagian belakang sehingga sesuai dengan preferensi pribadi pembaca.\r\n\r\nKomik Jujutsu Kaisen 4 karya Gege Akutami menjadi salah satu komik yang wajib untuk diikuti. Itadori bertemu Junpei saat sedang menyelidiki kasus pembunuhan yang disebabkan oleh \"kutukan\". Awalnya, Itadori tidak berprasangka apa-apa terhadap Junpei. Dan karena merasa cocok, Itadori malah menjadi akrab dengannya. Tapi, ternyata Junpei \"terpesona\" dengan bujukan Mahito, dan bertikai dengan Itadori. Di tengah pertikaian, Itadori yang merasa terdesak dan ingin mengembalikan Junpei ke sosok sesungguhnya, malah dicemooh dan ditertawakan Sukuna yang ada dalam dirinya, juga Mahito. Akankah Itadori sanggup melepaskan Junpei dari \"kutukan\" kebenciannya?', 11, 16),
(12, 'Pulang ', 'Tere Liye', '2020', 2147483647, '40', '0', '65b3cda85a8d6.jpeg', 'Buku novel yang berjudul Pulang ini merupakan karya dari penulis novel yang banyak digemari karya-karyanya, yaitu Tere Liye. Novel ini dapat dinikmati oleh pembaca baik di kalangan remaja maupun orang dewasa.\r\n\r\nKisah ini menceritkan perjalanan sosok pria bernama Bujang yang begitu suskses dalam bisnis shadow economy yang ia geluti. Kepandaian dan keteguhan prinsipnya telah mengantarkannya ke puncak kesuksesan. Sebagai seorang mafia, Bujang sangat disegani oleh pelaku bisnis shadow economy dari berbagai negara lain. Bahkan seorang presiden dibuat tak berkutik di hadapanya.\r\n\r\nNamun, untuk sampai di titik kesuksesan itu memang tidaklah mudah bagi Bujang. Ia harus melewati berbagai pertempuran serta penghianatan yang begitu menyakitkan. Bahkan karena kefokusannya menjalankan bisnis jagal dunia milik keluaga Tong ini, ia sampai tak sempat mengucapkan salam perpisahan kala bapak ibunya pulang mengahadap sang tuhan.\r\n\r\nNovel Pulang karya Tere Liye ini mengkat kisah pergulatan hidup sosok pria kecil dari pelosok daratan Bukit Tinggi yang kemudian dibawa ke kota untuk ditempa menjadi seorang tukang jagal dunia. Keteguhan, keuletan, serta kesetiannya telah mengantarkan dirinya ke puncak tertinggi kesuksesanya. Akan tetapi, setelah semua perjalanan yang ia lalui, ia menyadari kehampaan besar di dalam hidupnya. Semua prestasi dan pencapaianya dalam bidang shadow economy rupanya tak bisa memberikan ketenagan apapun dalam hidupnya. Saat itulah ia merasa kedamaianlah yang ia butuhkan dan kini ia telah menyadari makna pulang yang sebenarnya, yakni pulang menjemput kedamaian.\r\n\r\n\r\nSinopsis\r\n\"Aku tahu sekarang, lebih banyak luka di hati bapakku dibanding di tubuhnya. Juga mamakku, lebih banyak tangis di hati Mamak dibanding di matanya.\"\r\n\r\nSebuah kisah tentang perjalanan pulang, melalui pertarungan demi pertarungan, untuk memeluk erat semua kebencian dan rasa sakit.\"', 1, 12),
(13, 'Buku Interaktif: Informatika SMP/MTs Kelas 7', 'Galih Pangesthi, Triyanti', '2022', 2147483647, '39', '1', '65b5202c6af5c.jpg', 'Saat ini, pemerintah telah memberlakukan kurikulum baru. Namanya Kurikulum Merdeka. Kurikulum ini diberlakukan secara bertahap. Untuk tahun ini, Kelas 10, 11, dan 12 yang akan menerapkan Kurikulum Merdeka.\r\n\r\nDalam penerapannya, sekolah dapat menerapkan beberapa bagian dan Prinsip Kurikulum Merdeka tanpa mengganti Kurikulum Satuan Pendidikan. Artinya, sekolah masih dapat menggunakan buku Kurikulum 2013 sebagai media pembelajaran. Akan tetapi, buku yang digunakan untuk kegiatan pembelajaran tersebut harus mengakomodasi beberapa bagian Kurikulum Merdeka, misalnya menerapkan Proyek Profil Pelajar Pancasila.\r\n\r\nKurikulum Merdeka adalah kurikulum dengan pembelajaran intrakurikuler yang beragam yang di mana konten akan lebih optimal agar peserta didik memiliki cukup waktu untuk mendalami konsep dan menguatkan kompetensi. Guru memiliki keleluasaan untuk memilih berbagai perangkat ajar sehingga pembelajaran dapat disesuaikan dengan kebutuhan belajar dan minat peserta didik.\r\n\r\nBuku Interaktif: Informatika SMP/MTs Kelas 7 akan menjadi pendamping yang tepat untuk melakukan pembelajaran dengan kurikulum merdeka.\r\n\r\nSelamat membaca dan mempelajari buku ini!', 2, 14),
(14, 'Top Rank Buku Pintar IPA SMP/Mts', 'WINDA SOETRISNO DESY LISTIYANTI', '2022', 2147483647, '40', '0', '65b5cb18d1998.jpg', 'Dengan mempelajari materi dalam buku ini, kamu akan lebih cepat hafal dan memahami IPA. Karena dalam buku ini, selain penyajian materi yang simpel, juga didukung oleh tata letak yang menarik sehingga kamu tidak mudah bosan membacanya.\r\n\r\nBuku ini berisi materi pelajaran IPA SMP untuk kelas 1, 2, dan 3. Materi dalam buku ini disusun berdasarkan kurikulum dan kisi-kisi ujian nasional IPA untuk siswa SMP yang terbaru. Buku ini juga dilengkapi dengan peta konsep dan pola soal-soal yang sering muncul di ujian nasional.\r\n\r\n10 Keunggulan Buku Top Rank IPA untuk SMP/MTs\r\n\r\nRingkasan Materi ala Bimbingan Belajar\r\nMateri disajikan dalam bentuk ringkasan praktis & detail. Jadi, untuk kalian yang belum paham sama sekali tidak perlu khawatir, karena semua disajikan dengan jelas dan ringkas.\r\n\r\nSuper Bank Soal\r\nBank soal mulai dari dari Ulangan Harian, Penilaian Tengah Semester (PTS), Penilaian Akhir Semester (PAS), dll.\r\n\r\nFull Tips & Trik\r\nSemua Varian soal dibahas dengan detail dan disertai penyelesaian cepat (Tips & Trik).\r\n\r\nTryout Ujian Sekolah (US/USP)\r\nDisertai Tryout Ujian Sekolah untuk mata pelajaran IPA plus pembahasan.\r\n\r\nTryout AKM\r\nPlus Soal Asesmen Kompetensi Minimum (AKM) yang disusun berdasarkan soal-soal PISA & TIMSS + Pembahasan.\r\n\r\n5 Top Apps\r\nKamu dapat menguji kemampuanmu melalui gadget, cukup download di playstore.\r\n\r\nBintang Tryout Online\r\nTryout online dikembangkan dengan tujuan memfasilitasi siswa agar dapat menguji kemampuannya dalam menghadapi Ujian Tengah Semester (PTS) maupun Ujian Akhir Semester (PAS).\r\n\r\nVideo Tutorial\r\nVideo Tutorial merupakan media pembelajaran bagi siswa untuk dapat belajar mandiri di rumah, baik dalam pemahaman materi maupun penyelesaian soal-soal.\r\n\r\nEbook USP\r\nKalian pun dapat mendownload soal-soal dan dapat dijadikan referensi untuk menghadapi PTS maupun PAS.\r\n\r\nSoal Hots (PISA + TIMSS)\r\nDisertai pula ragam soal PISA (Programme for International Student Assessment)', 2, 15),
(15, 'Smp/Mts Buku Siswa Kl.7 Bahasa Indonesia', '-', '2022', 2147483647, '40', '0', '669776c45f4d4.jpg', 'Di abad XXI ini, kemampuan berkomunikasi efektif sangat penting. Buku Bahasa Indonesia ini meningkatkan keterampilan peserta didik untuk berkomunikasi menggunakan bahasa Indonesia secara efektif untuk beragam konteks dan tujuan dalam kegiatan pembelajaran yang mendorong peserta didik untuk berkolaborasi, berpikir kritis dan kreatif. Buku Siswa kelas tujuh ini melatih peserta didik mengeksplorasi teks deskripsi, puisi rakyat dan cerita fantasi, teks prosedur, teks berita eksposisi, teks tanggapan, serta surat dan pesan. Buku Siswa ini bukan bahan ajar tunggal. Buku ini seharusnya dipergunakan dengan perangkat ajar dan bahan bacaan lain yang sesuai dengan kekhasan daerah dan kebutuhan peserta didik kelas tujuh.\r\n\r\nSetiap bab dalam buku siswa ini dibagi ke dalam subbab dengan kegiatan menganalisis dan mendiskusikan teks, menelaah ciri dan unsur genre teks, unsur kebahasaannya, serta konteks penggunaannya. Berbekal pemahamannya terhadap genre teks tersebut, peserta didik lalu berlatih untuk menyajikannya secara lisan dan tertulis. Kegiatan menelaah dan menyajikan teks ini terpadu dengan kegiatan menyimak paparan, membaca dan memirsa gambar, mempresentasikan, serta menuliskan gagasan.\r\n\r\nRagam teks ini tersaji dalam tema yang dekat dengan pengalaman keseharian peserta didik kelas tujuh. Melalui tema-tema ini, peserta didik diharapkan mengenali dirinya, mengasah kepedulian terhadap lingkungannya, memperdalam kecintaan terhadap budayanya, sambil mengasah keterampilan berbahasa Indonesia secara santun dan efektif untuk berbagai tujuan.', 2, 13),
(16, 'Smp/Mts Kl 7 Eksis Geografi Jilid 1 Ktsp', 'Yrama Widya', '2015', 2147483647, '40', '0', '6697785ad33ff.jpeg', 'Smp/Mts Kl 7 Eksis Geografi Jilid 1 Ktsp', 21, 7),
(17, 'Pendidikan Agama Islam dan Budi Pekerti SMP Kelas 8', '-', '2023', 2147483647, '40', '0', '669779295ec5f.jpg', 'Terlebih sebagai seorang muslim, kita dituntut bersikap dan berperilaku sesuai dengan ajaran agama. Salah satu misi utama yang harus diwujudkan oleh Islam dan pemeluknya adalah menjadikan agama ini sebagai sumber kebaikan bagi Indonesia dan dunia (Islam Rahmat Lil \'Alamin). Setiap muslim harus memiliki sikap religius yang kuat dan sikap sosial yang baik. Inilah yang disebut sebagai muslim shaleh, yaitu muslim yang teguh menjalankan perintah agama dan melakukan perbuatan baik dengan sesama.\r\n\r\nPelajar SMP adalah generasi penerus bangsa yang harus memiliki sikap dan perilaku saleh tersebut. Masa depan yang dihadapinya memiliki tantangan berbeda karena perubahan-perubahan masyarakat dan kemajuan teknologi. Karena itu, pelajar SMP harus mewujudkan sikap saleh tersebut dalam kehidupan sehari-hari. Selanjutnya pelajar Islam SMP dapat menjadi pelajar yang Beriman, bertakwa kepada Tuhan Yang Maha Esa, dan berakhlak mulia, Mandiri, Bernalar Kritis, Kreatif, Bergotong-royong, dan Berkebinekaan global. Keenam hal tersebut merupakan dimensi-dimensi utama Profil Pelajar Pancasila.\r\n\r\nKonten materi PAI dan Budi Pekerti yang dituangkan dalam buku ini diharapkan dapat mengembangkan daya kritis dan kreativitas dan penguatan sikap peserta didik. Spirit buku ini mengarahkan peserta didik untuk berlatih, membiasakan diri, dan menambah wawasan mengenai ajaran Islam yang ramah dan moderat (wasatiyyah). Dengan demikian, peserta didik diharapkan mampu mencapai kompetensi yang diharapkan dan dapat menampilkan diri menjadi bagian dari warga negara yang cinta tanah air, taat dalam melaksanakan ajaran Islam, dan menghargai keberagaman. Dengan kata lain, PAI dan Budi Pekerti memadukan antara iman, Islam dan ihsan dalam hubungannya dengan Allah Swt., manusia dengan diri sendiri, manusia dengan sesama, dan manusia dengan lingkungan alam.\r\n\r\nSetiap bab pada buku ini berisi tujuan pembelajaran, infografis, pantun Pemantik, mari bertafakur, titik fokus, Talabul ilmi, Ikhtisar, inspirasiku, aku pelajar pancasila, diriku, rajin berlatih, siap berkreasi dan Selangkah Lebih Maju. Rubrikasi buku ini diharapkan dapat mendorong pembelajaran yang bernuansa Kecakapan Abad 21.', 7, 19),
(18, 'Workbook Interactive English SMP Kelas 7 Jilid 1A Semester 1 Kurikulum 2013', 'Yudhistira Ghalia Indonesia', '2018', 2147483647, '40', '0', '669779c114540.jpg', 'Perkembangan pendidikan di Indonesia mengalami perubahan yang cepat dan dinamis sekali. Hasil yang terlihat dari perubahan dan perkembangan pendidikan di Indonesia bisa dilihat dari bentuk kurikulum yang kerap kali berubah-ubah. Terdapat satu kurikulum yang saat ini masih banyak diterapkan di banyak sekolah. Kurikulum 2013 Revisi merupakan kurikulum operasional pendidikan yang disusun dan dilaksanakan di masing-masing satuan pendidikan yang pernah berlaku di Indonesia. Kurikulum 2013 Revisi merupakan perbaikan dari Kurikulum 2013 untuk menjawab dengan perkembangan zaman yang menuntut perubahan. Terdapat 10 perubahan yang menjadi poin dalam Kurikulum 2013 Revisi, termasuk di dalamnya perubahan pelaksanaan penilaian\r\n\r\nBuku ini merupakan buku siswa yang dipersiapkan Pemerintah dalam rangka implementasi Kurikulum 2013. Buku siswa ini disusun dan ditelaah oleh berbagai pihak di bawah koordinasi Kementerian Pendidikan dan Kebudayaan, dan dipergunakan dalam tahap awal penerapan Kurikulum 2013. Buku ini merupakan “dokumen hidup” yang senantiasa diperbaiki, diperbaharui, dan dimutakhirkan sesuai dengan dinamika kebutuhan dan perubahan zaman. Masukan dari berbagai kalangan yang dialamatkan kepada penulis dan laman http://buku.kemdikbud.go.id atau melalui email buku@kemdikbud.go.id diharapkan dapat meningkatkan kualitas buku ini\r\n\r\nSelain itu, buku ini ditulis secara umum dalam rangka untuk ikut serta mencerdaskan bangsa Indonesia di era globalisasi dalam perkembangan ilmu pengetahuan dan teknologi. Setiap bab dalam buku ini, dilengkapi dengan Kompetensi Dasar, Kata Kunci, Peta Konsep, Tugas, Latihan, Rangkuman, Refleksi Diri, dan Uji Kompetensi. Uji Kompetensi diberikan beberapa jenis, setelah akhir bab dan setiap akhir semester. Pembahasan materi disajikan dengan bahasa yang lugas dan mudah kalian pahami, dari pembahasan secara umum ke pembahasan secara khusus.', 10, 7),
(19, 'To The Point Tuntaskan Soal Fisika Gak Pake Lama SMP Kelas 7, 8, 9', 'Lusiana Dwi Rahayu', '2015', 2147483647, '40', '0', '66977b415a701.jpg', '1. Sukailah Fisika.\r\n2. Sering berlatih soal-soal Fisika untuk mendalami konsep, karena Fisika banyak rumusnya. Ingat! Jangan terjebak pada menghafal rumus, tetapi pahamilah konsep dasarnya dan mengerjakan soal secara terus menerus.\r\n3. Sumber belajar yang membuat siswa paham materi Fisika.\r\n4. Selalu update perkembangan ilmu Fisika modern.\r\n\r\nNah, dari “TO THE POINT” nomor 3, buku ini adalah salah satu sumber belajar yang recommended. Materi maupun soalnya dibahas secara “TO THE POINT”, yaitu lengkap dengan:\r\n- TO THE POINT Concept\r\nKonsep materi dibahas dengan bahasa yang komunikatif, ringkas, padat, mudah dipahami, dan tentu saja langsung ke pusat topiknya.\r\n- TO THE POINT Note\r\nCatatan berisi tambahan informasi tentang materi yang disajikan. Hal ini akan membantu dalam penyelesaian soal.\r\n- TO THE POINT Application\r\nDalam hal ini, ada penerapan konsep materi dalam bentuk soal disertai pembahasan yang TO THE POINT.\r\n- EXPRESS FORMULA\r\nSelain rumus dasar untuk menyelesaikan soal, buku ini juga disertai dengan RUMUS CEPAT atau dikenal dengan EXPRESS FORMULA.\r\n- Hafalan Luar Kepala\r\nDalam materi fisika, kadang terdapat hafalan luar kepala yang dapat membantu siswa menghafal dan memahami materi.', 2, 7),
(20, 'Saat-saat Jelang USBN UNBK Bahasa Indonesia 2020 Kurikulum 2013', 'Tim Alfa Cendekia', '2019', 2147483647, '40', '0', '66977c0402546.jpg', 'Perubahan orientasi ujian dalam sistem pendidikan kita bertujuan untuk meningkatkan kualitas lulusan pendidikan. Perubahan tersebut harus hadapi dengan persiapan yang matang. Buku Saat-saat Jelang USBN-UNBK Bahasa Indonesia SMP/MTs 2020 ini sangat cocok sebagai referensi utama dalam menghadapi ujian, baik USBN maupun UNBK.\r\n\r\nApa saja keunggulan buku ini? Berikut ini berbagai fitur yang disajikan dalam buku Saat-saat Jelang USBN-UNBK Bahasa Indonesia SMP/MTs 2020\r\nSusunan materi pokok disajikan berdasarkan kisi-kisi yang dikeluarkan oleh Badan Standar Nasional Pendidikan (BSNP)\r\nKolom khusus contoh soal dan pembahasan disajikan dalam 3 level kognitif, mulai dari level pengetahuan dan pemahaman, level aplikasi, dan level penalaran.\r\nKolom latihan soal disajikan secara khusus untuk mengetahui tingkat pemahaman anda dalam menguasai materi pokok dan langkah-langkah menyelesaikan soal dengan cepat dan tepat.\r\nPaket latihan pemahaman dan latihan pemantapan yang bisa anda jadikan simulasi untuk berlatih menghadapi ujian yang sebenarnya. Hal ini akan membuat anda semakin percaya diri menghadapi ujian, baik USBN maupun UNBK tahun 2020.\r\nPaket simulasi dan pembahasan untuk USBN-UNBK tahun 2019 sebagai penuntun bagaimana cara menjawab soal tersebut secara jitu. Disamping itu, pembahasan disajikan untung merangsang anda berpikir kreatif, logis, dan konseptual sehingga menuntun Anda terbiasa untuk berpikir mendalam (Higher Order Thinking Skill)\r\nPaket prediksi USBN-UNBK tahun 2020 yang dapat dijadikan simulasi ujian sebenarnya, baik USBN maupun UNBK.\r\n\r\nTunggu apa lagi? Ayo wujudkan impian anda meraih kesuksesan bersama buku Saat-saat Jelang USBN-UNBK Bahasa Indonesia SMP/MTs 2020.', 2, 7),
(21, 'Pendidikan Pancasila dan Kewarganegaraan SMP-MTS Kelas 9', 'M. Taupan, Dini Susanti, dan Ine Ariyani S.', '2016', 2147483647, '40', '0', '66977c5b3bfe0.jpeg', 'Secara ringkas Pendidikan Pancasila dan Kewarganegaraan atau PKn, diarahkan untuk menanamkan rasa nasionalisme dan nilai-nilai moral bangsa bagi pelajar sejak dini. Pendidikan ini menjadi patokan dalam menjalankan kewajiban dan memperoleh hak sebagai warga negara, demi kejayaan dan kemuliaan bangsa. Pelajaran Pendidikan Kewarganegaraan (PKn) memiliki peran yang strategis dan penting, yaitu membentuk siswa maupun sikap dalam berperilaku sehari-hari dan untuk membentuk warga negara Indonesia yang demokratis dan bertanggung jawab.\r\n\r\nMata Pelajaran PKn ini bertujuan menghasilkan siswa-siswi yang memiliki keimanan dan akhlak mulia sesuai falsafah hidup bangsa Indonesia yaitu Pancasila. Mereka di harapkan menjadi warga negara yang bertanggung jawab. Buku ini kami rancang berbasis aktivitas untuk dapat mewujudkan hal tersebut. Sehingga pada akhirnya harapan setelah mempelajari seluruh materi pada buku ini siswa dapat menjadi warga negara yang baik dan cerdas, yaitu warga negara yang memiliki rasa cinta tanah air dan kesadaran politik yang tinggi serta dijiwai oleh nilai-nilai Pancasila, Undang-Undang Dasar Negara Republik Indonesia Tahun 1945, semangat Bhinneka Tunggal Ika, dan komitmen terhadap Negara Kesatuan Republik Indonesia.', 13, 7),
(22, 'SMP/MTs Kelas 7-9 Rumus Fisika', 'Wiwi Kusumawardhani, S.pd.', '2016', 2147483647, '40', '0', '66977cc4b1b06.jpeg', 'Buku ini menyajikan ringkasan materi dan rumus Fisika dalam bentuk poin-poin penting dan lengkap berdasarkan KTSP dan Kurikulum 2013. Dalam setiap materi terdapat contoh soal yang disertai pembahasan dengan cara runut dan cara singkat sehingga siswa dapat memahami materi dan rumus dengan cepat. Di dalamnya juga terdapat kotak ingat yang berisi konsep dan rumus yang wajib diingat yang disajikan dengan singkat sehingga mudah diingat. Soal pendalaman diramu dengan variasi soal dan tingkat kesulitan yang berbeda-beda yang dapat melatih penguasaan materi siswa agar siap menghadapi UH, UTS, UAS, UKK, UN, dan OSN. Buku ini dilengkapi dengan video solusi cepat menjawab soal dan aplikasi gadget dengan sistem android dan iOS (apple). Aplikasi gadget ini dapat digunakan pada smartphone sehingga siswa dapat belajar dengan praktis kapan pun dan di mana pun. Terdapat 3 paket UN CBT (atau disebut UNBK) dalam versi android, iOS (apple), dan windows PC yang disusun dengan variasi soal dan tingkat kesulitan soal yang berbeda-beda tiap versinya serta diprogram otomatis menggunakan penghitung waktu, penghitung skor, dan penghitung nilai sesuai ujian yang sebenarnya. Buku juga disertai dengan paket psikotes masuk SMA/MA yang dapat didownload di website resmi edu penguin.', 2, 7),
(23, 'Prakarya untuk SMP-MTS Kelas 9 Kurikulum 2013', 'Pesanggrahan Guru', '2016', 2147483647, '40', '0', '66977d41319bf.jpeg', 'Buku Prakarya Untuk SMP-MTS Kelas IX Kurikulum 2013 digolongkan sebagai pengetahuan transcinece-knowledge yaitu mengembangkan pengetahuan dan melatih keterampilan kecakapan hidup berbasis seni, teknologi ,dan ekonomis. Buku ini menyajikan berbagai keterampilan yang mencangkup kerajinan, rekayasa, budidaya, dan pengolahan. Salah satu contoh keterampilannya adalah membuat kerajinan dari bahan lunak dan keras, memahami jenis-jenis perkembangan peralatan teknologi informasi, budidaya ternak kesayangan, dan satwa harapan. Serta pengolahan makanan dan minuman dari serealia dan umbi-umbian.\r\nMata pelajaran prakarya merupakan salah satu mata pelajaran yang cukup penting untuk para siswa karena dalam mata pelajaran ini terdapat poin-poin pembelajaran yang bertujuan untuk mengembangkan kreativitas dan mengasah potensi lain dalam diri siswa-siswi.\r\n\r\nTerlebih dalam kurikulum 2013 ini, memiliki bentuk pembelajaran dengan siswa sebagai pusatnya. Guru hanya sebagai fasilitator dan motivator. Dengan adanya mata pelajaran prakarya ini harapannya dapat membuat siswa mengenali dan menggali potensi diri secara bebas. Selain itu, juga dapat menghasilkan karya-karya seni yang beragam bentuknya. Materi-materi tersebut dikemas dengan bahasa yang mudah dipahami siswa dan disajikan pula contoh-contoh pembuatannya. Buku ini sangat cocok untuk siswa yang lebih kreatif dan inovatif dalam menciptakan suatu karya di mata pelajaran Prakarya.', 2, 7),
(25, 'Buku Siswa Ilmu Pengetahuan Alam untuk SMP/MTs Kelas 9', 'Cece Sutia, Victoriani Inabuy, Okky Fajar Tri Maryana, Budiyanti Dwi Hardanie, Sri Handayani Lestari', '2022', 2147483647, '40', '0', '669e2843d156a.jpg', 'Pembelajaran IPA di tingkat pendidikan sekolah menengah menjadi wadah untuk menggali dunia sekitar kita secara lebih mendalam dan kesempatan mulai berpikir apa dan bagaimana saya dapat membuat perbedaan. Oleh karena itu, pendidikan IPA di sekolah semestinya merangsang pelajar untuk berpikir kreatif tentang kehidupan dan alam sekitar serta bekerja sama dalam merancang. melaksanakan dan mengkomunikasikan hasil percobaan serta berbagai temuan secara sistematis, menarik dan ilmiah. Perkembangan ilmu pengetahuan dan teknologi telah mendorong lahirnya generasi yang kritis terhadap apa yang dipelajari, bukan saja mengikuti apa yang ada di buku atau apa yang dikatakan oleh pengajar.\r\n\r\nPergeseran paradigma dalam pendidikan dan dalam belajar menempatkan pelajar sebagai subjek dari proses belajar. Oleh karena itu, pembelajaran inkuiri atau yang berdasarkan pertanyaan dari pelajar adalah suatu keniscayaan untuk memfasilitasi perkembangan pelajar menuju manusia yang beriman, bertakwa kepada Tuhan Yang Maha Esa, berakhlak mulia, mandiri, bernalar kritis. berkebinekaan global, bergotong royong dan kreatif.\r\n\r\nBuku ini ditulis dengan berpedoman pada pembelajaran inkuiri dan pelajar adalah penentu pembelajarannya sendiri. Berbagai gambar dan ilustrasi disajikan untuk mendorong pelajar memahami berbagai aktivitas pembelajaran yang kreatif dan mengembangkan kemampuan berpikir tingkat tinggi serta proyek akhir bab yang menumbuhkan kreativitas pelajar untuk secara aktif berkontribusi secara lokal terhadap berbagai masalah global.\r\n\r\nOleh karena itu, buku ini dimulai dengan pelajar mengenal dan mempraktikkan metode ilmiah dalam penyelidikan sederhana yang akan menjadi dasar bagi berbagai eksperimen yang dirancang sendiri oleh pelajar pada bab Zat dan Perubahannya, bab Suhu, Kalor dan Pemuaian serta bab Gerak dan Gaya. Adapun kemampuan komunikasi melalui berbagai media akan dikembangkan lewat proyek akhir pada saat mempelajari tentang Klasifikasi Makhluk Hidup, Ekologi dan Keanekaragaman Hayati Indonesia serta Bumi dan Tata Surya. Belajar Sains akan menyenangkan dan bermanfaat jika dilakukan dengan gembira.', 2, 20),
(26, 'Ilmu Pengetahuan Sosial Buku Siswa SMP/MTS Kelas 9', 'Mohammad Rizky Satria, Sari Oktafiana, M. Nursa’ban, Supardi', '2022', 2147483647, '40', '0', '669e28a0bbc6d.png', 'Sebagai gabungan dari berbagai rumpun ilmu sosial dan humaniora yang saling terintegrasi, pembelajaran Ilmu Pengetahuan Sosial (IPS) di SMP tidak dipelajari secara terpisah antara bidang ilmu seperti geografi, ekonomi, sejarah, dan sosiologi, tetapi secara terpadu sehingga membangun pemahaman dan keterampilan utuh sesuai Capaian Pembelajaran dan Profil Pelajar Pancasila.\r\n\r\nBuku ilmu pengetahuan sosial SMP/MTS Kelas IX ini menyajikan panduan belajar terpadu melalui satuan tema pembelajaran berkesinambungan. Tema pertama, \"Manusia dan Perubahan\", mengkaji persoalan modernisasi dan pelestarian kearifan lokal di masyarakat; tema kedua, \"Perkembangan Ekonomi Digital\", mengkaji literasi finansial di tengah perkembangan sistem ekonomi terkini; tema ketiga, \"Tantangan Pembangunan Indonesia\", mengkaji persoalan pembangunan dan cita-cita Indonesia menjadi negara maju, serta; tema keempat \"Kerja Sama Dunia\", mengkaji isu-isu global yang terjadi dalam konteks lokal.\r\n\r\nBuku ini menyajikan panduan untuk mengembangkan pembelajaran IPS yang terpadu melalui satuan tema-tema pembelajaran yang berkesinambungan. Berbagai bidang ilmu sosial dihadirkan sebagai ragam perspektif dalam mengkaji persoalan yang terkait dengan kehidupan.\r\n\r\nMateri-materi pembelajaran yang disajikan hanya sebagai kendaraan menuju Capaian Pembelajaran. Oleh karenanya, proses pembelajaran tidak lagi berfokus pada kegiatan menghafal materi, tetapi pada upaya menguasai kompetensi sesuai Capaian Pembelajaran.\r\n\r\nPendekatan belajar yang digunakan adalah pembelajaran aktif (active learning) dengan penekanan pada proses inkuiri. peserta didik diajak untuk melakukan berbagai aktivitas yang diharapkan dapat menstimulasi penguasaan kompetensi sesuai dengan capaian pembelajaran.', 2, 13),
(27, 'PJOK (Pendidikan Jasmani, Olahraga, dan Kesehatan) untuk SMP/MTs Kelas 7', 'Surtiyo', '2017', 2147483647, '39', '1', '669e2937d0fec.jpg', 'Pada tahun 2013, pemerintah memberlakukan kurikulum 2013 sebagai acuan penyelenggaran sistem pendidikan di sekolah yang ada di Indonesia. Diberlakukannya kurikulum 2013 bertujuan untuk menggantikan kurikulum sebelumnya, yakni kurikulum tingkat satuan pendidikan (KTSP) yang sudah diberlakukan sejak tahun 2006. Pada perjalanannya, kurikulum 2013 mengalami revisi pada tahun 2016.\r\n\r\nAda sejumlah perubahan pada kurikulum 2013 revisi 2016 ini. Beberapa poin penting dari kurikulum revisi ini diantaranya menggunakan metode pembelajaran aktif, proses berpikir siswa yang tidak dibatasi, penyederhanaan aspek penilaian siswa oleh guru, meningkatkan hubungan Kompetensi Inti (KI) dan Kompetensi Dasar (KD), serta penerapan teori 5M (mengingat, memahami, menerapkan, menganalisis, dan mencipta).\r\n\r\nSeiring dengan direvisinya sistem kurikulum 2013, maka setiap mata pelajaran di sekolah pun turut mengalami perubahan, tak terkecuali mata pelajaran Pendidikan Jasmani, Olahraga dan Kesehatan (PJOK).\r\n\r\nBuku “PJOK SMP/MTs Kelas 7 Kurikulum 2013 Edisi Revisi 2016” ini disusun dengan mengacu pada standar kurikulum 2013 revisi 2016.\r\n\r\nDalam buku setebal 292 halaman ini, setiap materi disajikan sedemikian rupa sehingga mudah dipahami oleh siswa. Siswa juga diajak untuk lebih aktif dalam proses pembelajaran melalui buku ini.\r\n\r\nBuku “PJOK SMP/MTs Kelas 7 Kurikulum 2013 Edisi Revisi 2016” dapat dijadikan sebagai rujukan utama mata pelajaran PJOK kelas 7 SMP sederajat yang menggunakan kurikulum 2013 revisi 2016.', 2, 7),
(28, 'Pendidikan Jasmani Olahraga dan Kesehatan untuk SMP/MTS Kelas 8', 'Khairul Hadziq & Annisha Fathni F.', '2024', 2147483647, '40', '0', '669e2a955be8c.jpg', 'Buku Pendidikan Jasmani, Olahraga, dan Kesehatan Berbasis Profil Pelajar Pancasila SMP/MTs Kelas 8 ini disusun dengan menggunakan Kurikulum Merdeka yang mengusung semangat merdeka belajar. Adapun kebijakan pengembangan kurikulum ini tertuang dalam Keputusan Kepala Badan Standar, Kurikulum, dan Asesmen Pendidikan Kementerian Pendidikan, Kebudayaan, Riset, dan Teknologi Nomor 033/H/KR/2022 Hasil Uji Publik tentang Capaian Pembelajaran pada Pendidikan Anak Usia Dini, Jenjang Pendidikan Dasar, dan Jenjang Pendidikan Menengah pada Kurikulum Merdeka. Untuk mendukung pelaksanaan kurikulum tersebut, diperlukan penyediaan buku teks pelajaran yang sesuai dengan kebutuhan. Buku teks pelajaran ini merupakan salah satu bahan pembelajaran bagi siswa dan guru.\r\n\r\nBuku Pendidikan Jasmani, Olahraga, dan Kesehatan SMP/MTs Kelas 8 berisi pembelajaran yang dapat mendukung tujuan pembelajaran PJOK yaitu meningkatkan kesadaran siswa tentang pentingnya aktivitas jasmani untuk meningkatkan kualitas hidup secara menyeluruh. Selain itu, siswa juga diarahkan untuk memelihara kebugaran jasmani, mengembangkan pola gerak, mengembangkan keterampilan gerak, serta mengembangkan karakter dan internalisasi nilai-nilai melalui pembelajaran yang disajikan pada buku ini.\r\n\r\nPenyajian materi dalam buku ini mengakomodasi kebutuhan pembelajaran saat ini. Sajian materi dilengkapi dengan gambar, ilustrasi, hingga pranala video berbentuk kode QR (QR code). Perpaduan tersebut akan menjadikan pembelajaran lebih bervariasi, atraktif, dan interaktif sehingga mempermudah siswa untuk memahami materi yang tersaji.', 2, 7),
(148, 'Si Juki Cari Kerja!', 'Faza Meonk', '2017', 2147483647, '40', '0', '669ff5e410d25.jpg', 'Faza Meonk adalah seorang desainer grafis asal Indonesia. Karyanya yang paling terkenal adalah Si Juki, sebuah seri cerita-cerita lucu singkat dengan komedi yang anarkistik. Karakter Si Juki dibuat pada tahun 2011 akhir. Karakter ini diciptakan Faza Meonk pada tahun 2011 dalam komik online berjudul DKV4 kemudian diterbitkan oleh penerbit Bukune.\r\n\r\nKomik yang berjudul Si Juki Cari Kerja! terbit pada tahun 2013 menceritakan Juki yang lulus dari SMA dan langsung memutuskan bekerja dengan keterampilan seadanya. Dikarenakan tanpa bekal yang cukup, berbagai macam pekerjaan dicobanya. Namun, setelah bertemu dengan Haji Duloh, seorang ulama dekat rumah dia, Juki menjadi insyaf dan memutuskan untuk berkuliah dahulu sebelum bekerja dan membahagiakan orang tua.\r\n\r\nSinopsis:\r\nSetelah lulus SMA, Juki—bocah nyentrik yang ngakunya Anti mainstream—memutuskan untuk langsung bekerja. Dengan keterampilan seadanya, kelakuan nyeleneh, dan teman-teman yang ajaib, Juki memulai petualangannya.\r\n\r\nSayang, ada hal yang Juki tidak tahu, yaitu susahnya mencari pekerjaan tanpa bekal yang cukup. Berbagai macam hal dicobanya. Jadi buruh tempel iklan sedot WC, petugas delivery service sebuah warteg, figuran acara televisi, sampai menjadi asisten dukun Mbah Gendeng, semuanya gagal total.\r\n\r\nApa lagi akal Juki untuk dapatkan pekerjaan dan meredakan Emak yang terus-terusan cemberut karena bocah ajaib ini lama menganggur? Ikuti ceritanya dalam Si Juki Cari Kerja! yang kali ini terbit lagi dalam format full color!', 11, 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `frequent_itemset`
--

CREATE TABLE `frequent_itemset` (
  `id` int(11) NOT NULL,
  `itemset` mediumtext NOT NULL,
  `support` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `frequent_itemset`
--

INSERT INTO `frequent_itemset` (`id`, `itemset`, `support`) VALUES
(615, 'Interaktif (PPKn)', 0.7142857142857143),
(616, 'Jujutsu Kaisen 4', 0.5714285714285714),
(617, 'Interaktif (PPKn), Jujutsu Kaisen 4', 0.42857142857142855),
(618, 'Pintu Harmonika', 0.42857142857142855),
(619, 'Interaktif (PPKn), Pintu Harmonika', 0.42857142857142855),
(620, 'Top Rank Buku Pintar IPA SMP/Mts', 0.42857142857142855),
(621, 'Jujutsu Kaisen 4, Top Rank Buku Pintar IPA SMP/Mts', 0.2857142857142857),
(622, 'Si Juki Cari Kerja!', 0.2857142857142857);

-- --------------------------------------------------------

--
-- Struktur dari tabel `identitas`
--

CREATE TABLE `identitas` (
  `id_identitas` int(11) NOT NULL,
  `nama_app` varchar(50) NOT NULL,
  `alamat_app` text NOT NULL,
  `email_app` varchar(125) NOT NULL,
  `nomor_hp` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `nama_kategori` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id`, `nama_kategori`) VALUES
(1, 'Novel'),
(2, 'Pelajaran'),
(4, 'Biografi'),
(7, 'Agama'),
(9, 'Majalah'),
(10, 'Kamus'),
(11, 'Komik'),
(12, 'Sastra'),
(13, 'Sejarah'),
(14, 'Motivasi'),
(15, 'Psikologi'),
(16, 'Puisi'),
(21, 'Geografi'),
(22, ''),
(23, ''),
(24, ''),
(25, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemberitahuan`
--

CREATE TABLE `pemberitahuan` (
  `id_pemberitahuan` int(11) NOT NULL,
  `isi_pemberitahuan` varchar(255) NOT NULL,
  `level_user` varchar(125) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pemberitahuan`
--

INSERT INTO `pemberitahuan` (`id_pemberitahuan`, `isi_pemberitahuan`, `level_user`, `status`) VALUES
(1, '<i class=\'fa fa-exchange\'></i> #Reza  Saputra Telah meminjam Buku', 'Admin', 'Sudah dibaca'),
(2, '<i class=\'fa fa-repeat\'></i> #Reza  Saputra Telah mengembalikan Buku', 'Admin', 'Sudah dibaca'),
(3, '<i class=\'fa fa-exchange\'></i> #Syaker Telah meminjam Buku', 'Admin', 'Sudah dibaca'),
(4, '<i class=\'fa fa-exchange\'></i> #Agus Fifiyanto Telah meminjam Buku', 'Admin', 'Belum dibaca'),
(5, '<i class=\'fa fa-exchange\'></i> #Agus Fifiyanto Telah meminjam Buku', 'Admin', 'Belum dibaca'),
(6, '<i class=\'fa fa-exchange\'></i> #Ahmad Rizki Telah meminjam Buku', 'Admin', 'Belum dibaca'),
(7, '<i class=\'fa fa-repeat\'></i> #Ahmad Rizki Telah mengembalikan Buku', 'Admin', 'Belum dibaca'),
(8, '<i class=\'fa fa-exchange\'></i> #Muhammad Fajar Telah meminjam Buku', 'Admin', 'Belum dibaca'),
(9, '<i class=\'fa fa-repeat\'></i> #Muhammad Fajar Telah mengembalikan Buku', 'Admin', 'Belum dibaca'),
(10, '<i class=\'fa fa-repeat\'></i> #Muhammad Fajar Telah mengembalikan Buku', 'Admin', 'Belum dibaca'),
(11, '<i class=\'fa fa-repeat\'></i> #Muhammad Fajar Telah mengembalikan Buku', 'Admin', 'Belum dibaca'),
(12, '<i class=\'fa fa-repeat\'></i> #Muhammad Fajar Telah mengembalikan Buku', 'Admin', 'Belum dibaca'),
(13, '<i class=\'fa fa-exchange\'></i> #Muhammad Fajar Telah meminjam Buku', 'Admin', 'Belum dibaca'),
(14, '<i class=\'fa fa-repeat\'></i> #Muhammad Fajar Telah mengembalikan Buku', 'Admin', 'Belum dibaca'),
(15, '<i class=\'fa fa-repeat\'></i> #Muhammad Fajar Telah mengembalikan Buku', 'Admin', 'Belum dibaca'),
(16, '<i class=\'fa fa-exchange\'></i> #Muhammad Fajar Telah meminjam Buku', 'Admin', 'Belum dibaca'),
(17, '<i class=\'fa fa-repeat\'></i> #Muhammad Fajar Telah mengembalikan Buku', 'Admin', 'Belum dibaca'),
(18, '<i class=\'fa fa-exchange\'></i> #Muhammad Fajar Telah meminjam Buku', 'Admin', 'Belum dibaca'),
(19, '<i class=\'fa fa-exchange\'></i> #Muhammad Fajar Telah meminjam Buku', 'Admin', 'Belum dibaca'),
(20, '<i class=\'fa fa-exchange\'></i> #Muhammad Fajar Telah meminjam Buku', 'Admin', 'Belum dibaca'),
(21, '<i class=\'fa fa-exchange\'></i> #Muhammad Fajar Telah meminjam Buku', 'Admin', 'Belum dibaca'),
(22, '<i class=\'fa fa-exchange\'></i> #Muhammad Fajar Telah meminjam Buku', 'Admin', 'Belum dibaca'),
(23, '<i class=\'fa fa-exchange\'></i> #Muhammad Fajar Telah meminjam Buku', 'Admin', 'Belum dibaca'),
(24, '<i class=\'fa fa-exchange\'></i> #Muhammad Fajar Telah meminjam Buku', 'Admin', 'Belum dibaca'),
(25, '<i class=\'fa fa-exchange\'></i> #Muhammad Fajar Telah meminjam Buku', 'Admin', 'Belum dibaca'),
(26, '<i class=\'fa fa-repeat\'></i> #Muhammad Fajar Telah mengembalikan Buku', 'Admin', 'Belum dibaca'),
(27, '<i class=\'fa fa-repeat\'></i> #Muhammad Fajar Telah mengembalikan Buku', 'Admin', 'Belum dibaca'),
(28, '<i class=\'fa fa-repeat\'></i> #Muhammad Fajar Telah mengembalikan Buku', 'Admin', 'Belum dibaca'),
(29, '<i class=\'fa fa-repeat\'></i> #Muhammad Fajar Telah mengembalikan Buku', 'Admin', 'Belum dibaca'),
(30, '<i class=\'fa fa-exchange\'></i> #Muhammad Fajar Telah meminjam Buku', 'Admin', 'Belum dibaca'),
(31, '<i class=\'fa fa-repeat\'></i> #Muhammad Fajar Telah mengembalikan Buku', 'Admin', 'Belum dibaca'),
(32, '<i class=\'fa fa-exchange\'></i> #Fakhrussyakirin Telah meminjam Buku', 'Admin', 'Belum dibaca'),
(33, '<i class=\'fa fa-exchange\'></i> #Fakhrussyakirin Telah meminjam Buku', 'Admin', 'Belum dibaca'),
(34, '<i class=\'fa fa-exchange\'></i> #Fakhrussyakirin Telah meminjam Buku', 'Admin', 'Belum dibaca'),
(35, '<i class=\'fa fa-exchange\'></i> #Muhammad Fajar Telah meminjam Buku', 'Admin', 'Belum dibaca'),
(36, '<i class=\'fa fa-exchange\'></i> #Muhammad Fajar Telah meminjam Buku', 'Admin', 'Belum dibaca'),
(37, '<i class=\'fa fa-exchange\'></i> #Muhammad Fajar Telah meminjam Buku', 'Admin', 'Belum dibaca'),
(38, '<i class=\'fa fa-exchange\'></i> #Muhammad Fajar Telah meminjam Buku', 'Admin', 'Belum dibaca'),
(39, '<i class=\'fa fa-exchange\'></i> #Muhammad Fajar Telah meminjam Buku', 'Admin', 'Belum dibaca'),
(40, '<i class=\'fa fa-exchange\'></i> #Muhammad Fajar Telah meminjam Buku', 'Admin', 'Belum dibaca'),
(41, '<i class=\'fa fa-exchange\'></i> #Muhammad Fajar Telah meminjam Buku', 'Admin', 'Belum dibaca'),
(42, '<i class=\'fa fa-exchange\'></i> #Muhammad Fajar Telah meminjam Buku', 'Admin', 'Belum dibaca'),
(43, '<i class=\'fa fa-exchange\'></i> #Muhammad Fajar Telah meminjam Buku', 'Admin', 'Belum dibaca'),
(44, '<i class=\'fa fa-exchange\'></i> #Muhammad Fajar Telah meminjam Buku', 'Admin', 'Belum dibaca'),
(45, '<i class=\'fa fa-repeat\'></i> #Muhammad Fajar Telah mengembalikan Buku', 'Admin', 'Sudah dibaca'),
(46, '<i class=\'fa fa-exchange\'></i> #Muhammad Fajar Telah meminjam Buku', 'Admin', 'Belum dibaca'),
(47, '<i class=\'fa fa-exchange\'></i> #Muhammad Fajar Telah meminjam Buku', 'Admin', 'Belum dibaca'),
(48, '<i class=\'fa fa-repeat\'></i> #Muhammad Fajar Telah mengembalikan Buku', 'Admin', 'Belum dibaca'),
(49, '<i class=\'fa fa-repeat\'></i> #Muhammad Fajar Telah mengembalikan Buku', 'Admin', 'Belum dibaca'),
(50, '<i class=\'fa fa-repeat\'></i> #Muhammad Fajar Telah mengembalikan Buku', 'Admin', 'Belum dibaca'),
(51, '<i class=\'fa fa-repeat\'></i> #Muhammad Fajar Telah mengembalikan Buku', 'Admin', 'Belum dibaca'),
(52, '<i class=\'fa fa-exchange\'></i> #Muhammad Fajar Telah meminjam Buku', 'Admin', 'Belum dibaca'),
(53, '<i class=\'fa fa-repeat\'></i> #Muhammad Fajar Telah mengembalikan Buku', 'Admin', 'Belum dibaca'),
(54, '<i class=\'fa fa-exchange\'></i> #Muhammad Fajar Telah meminjam Buku', 'Admin', 'Belum dibaca'),
(55, '<i class=\'fa fa-exchange\'></i> #Muhammad Fajar Telah meminjam Buku', 'Admin', 'Belum dibaca'),
(56, '<i class=\'fa fa-exchange\'></i> #Muhammad Fajar Telah meminjam Buku', 'Admin', 'Belum dibaca'),
(57, '<i class=\'fa fa-repeat\'></i> #Muhammad Fajar Telah mengembalikan Buku', 'Admin', 'Belum dibaca'),
(58, '<i class=\'fa fa-repeat\'></i> #Muhammad Fajar Telah mengembalikan Buku', 'Admin', 'Belum dibaca'),
(59, '<i class=\'fa fa-repeat\'></i> #Muhammad Fajar Telah mengembalikan Buku', 'Admin', 'Belum dibaca'),
(60, '<i class=\'fa fa-exchange\'></i> #Muhammad Fajar Telah meminjam Buku', 'Admin', 'Belum dibaca'),
(61, '<i class=\'fa fa-repeat\'></i> #Muhammad Fajar Telah mengembalikan Buku', 'Admin', 'Belum dibaca'),
(62, '<i class=\'fa fa-exchange\'></i> #Muhammad Fajar Telah meminjam Buku', 'Admin', 'Belum dibaca'),
(63, '<i class=\'fa fa-exchange\'></i> #Muhammad Fajar Telah meminjam Buku', 'Admin', 'Belum dibaca');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id` int(11) NOT NULL,
  `tanggal_peminjaman` varchar(125) NOT NULL,
  `tanggal_pengembalian` varchar(125) NOT NULL,
  `kondisi_buku_saat_dipinjam` varchar(125) NOT NULL,
  `kondisi_buku_saat_dikembalikan` varchar(125) NOT NULL,
  `denda` varchar(125) NOT NULL,
  `id_permintaan_lvl` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `peminjaman`
--

INSERT INTO `peminjaman` (`id`, `tanggal_peminjaman`, `tanggal_pengembalian`, `kondisi_buku_saat_dipinjam`, `kondisi_buku_saat_dikembalikan`, `denda`, `id_permintaan_lvl`) VALUES
(315, '23-07-2024', '29-08-2024', 'Baik', 'Rusak', '54000', 361),
(316, '23-07-2024', '24-07-2024', 'Baik', 'Baik', '0', 362),
(317, '23-07-2024', '24-07-2024', 'Baik', 'Baik', '0', 363),
(318, '23-07-2024', '24-07-2024', 'Baik', 'Rusak', '20000', 364),
(319, '23-07-2024', '24-07-2024', 'Baik', 'Baik', '0', 365),
(320, '23-07-2024', '24-07-2024', 'Baik', 'Baik', '0', 366),
(321, '23-07-2024', '24-07-2024', 'Baik', 'Baik', '0', 367),
(322, '23-07-2024', '24-07-2024', 'Baik', 'Rusak', '20000', 368),
(323, '23-07-2024', '24-07-2024', 'Baik', 'Baik', '0', 369),
(324, '23-07-2024', '24-07-2024', 'Baik', 'Baik', '0', 370),
(325, '23-07-2024', '24-07-2024', 'Baik', 'Baik', '0', 371),
(326, '23-07-2024', '24-07-2024', 'Baik', 'Baik', '0', 372),
(327, '23-07-2024', '24-07-2024', 'Baik', 'Baik', '0', 373),
(328, '23-07-2024', '24-07-2024', 'Baik', 'Baik', '0', 374),
(329, '23-07-2024', '24-07-2024', 'Baik', 'Baik', '0', 375),
(330, '23-07-2024', '24-07-2024', 'Baik', 'Baik', '0', 376),
(331, '23-07-2024', '24-07-2024', 'Baik', 'Rusak', '20000', 377),
(335, '03-08-2024', '12-08-2024', 'Baik', 'Rusak', '20000', 387),
(344, '29-08-2024', '29-08-2024', 'Baik', 'Rusak', '20000', 403),
(345, '29-08-2024', '29-08-2024', 'Baik', 'Rusak', '20000', 405),
(346, '29-08-2024', '29-08-2024', 'Baik', 'Rusak', '20000', 406);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `id_pendaftaran` int(11) NOT NULL,
  `nis_pendaftar` char(20) NOT NULL,
  `nama_pendaftar` varchar(125) NOT NULL,
  `nomor_hp` char(55) NOT NULL,
  `username_pendaftar` varchar(55) NOT NULL,
  `password_pendaftar` varchar(55) NOT NULL,
  `tanggal_mendaftar` varchar(125) NOT NULL,
  `status` enum('Disetujui','Ditolak','Belum ada tindakan') DEFAULT 'Belum ada tindakan'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pendaftaran`
--

INSERT INTO `pendaftaran` (`id_pendaftaran`, `nis_pendaftar`, `nama_pendaftar`, `nomor_hp`, `username_pendaftar`, `password_pendaftar`, `tanggal_mendaftar`, `status`) VALUES
(53, '200759', 'Muhammad Zainal Arifin', '085813221927', 'muhammad zainal arifin', 'Muhammad Zainal Arifin', '28-02-2024', 'Disetujui'),
(54, '200747', 'Siti Rohimah', '082113720777', 'siti rohimah', 'Siti Rohimah', '28-02-2024', 'Disetujui'),
(55, '123456', 'Fadil Ridwansyah', '081219550857', 'fadil ridwansyah', 'Fadil Ridwansyah', '28-02-2024', 'Ditolak'),
(56, '200743', 'Aprisilla Nadien Islami', '085213931566', 'aprisilla nadien islami', 'Aprisilla Nadien Islami', '28-02-2024', 'Disetujui');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penerbit`
--

CREATE TABLE `penerbit` (
  `id` int(11) NOT NULL,
  `nama_penerbit` varchar(50) NOT NULL,
  `verif_penerbit` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `penerbit`
--

INSERT INTO `penerbit` (`id`, `nama_penerbit`, `verif_penerbit`) VALUES
(7, 'Gramedia Pustaka Utama', 'Terverifikasi'),
(8, 'Bentang Pustaka', 'Terverifikasi'),
(9, 'Farrar, Straus and Giroux', 'Terverifikasi'),
(11, 'Republika', 'Terverifikasi'),
(12, 'Sabak Grip Nusantara', 'Terverifikasi'),
(13, 'Pusat Kurikulum dan Perbukuan Kemendikbudristek', 'Terverifikasi'),
(14, 'PT PENERBIT INTAN PARIWARA', 'Terverifikasi'),
(15, 'Bintang Wahyu', 'Terverifikasi'),
(16, 'Elex Media Komputindo', 'Terverifikasi'),
(19, 'Pusat Perbukuan', 'Terverifikasi'),
(20, 'kemdikbudristek', 'Terverifikasi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesan`
--

CREATE TABLE `pesan` (
  `id_pesan` int(11) NOT NULL,
  `penerima` varchar(50) NOT NULL,
  `pengirim` varchar(50) NOT NULL,
  `judul_pesan` varchar(50) NOT NULL,
  `isi_pesan` text NOT NULL,
  `status` varchar(50) NOT NULL,
  `tanggal_kirim` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `petugas`
--

CREATE TABLE `petugas` (
  `id` int(11) NOT NULL,
  `nama_lengkap` varchar(55) NOT NULL,
  `username` varchar(55) NOT NULL,
  `password` varchar(55) NOT NULL,
  `tanggal_bergabung` varchar(55) NOT NULL,
  `terakhir_login` varchar(55) NOT NULL,
  `id_user_lvl` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `petugas`
--

INSERT INTO `petugas` (`id`, `nama_lengkap`, `username`, `password`, `tanggal_bergabung`, `terakhir_login`, `id_user_lvl`) VALUES
(6, 'Muhammad Noor, S.Pd', 'm.noor', 'm1234', '29-02-2024', '03-10-2024 ( 09:21:30 )', 1),
(8, 'Lilis Rahmayanti, S.Pd', 'lilis.rahmayanti', 'lilis.rahmayanti', '06-08-2024', '', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `testing_sidang`
--

CREATE TABLE `testing_sidang` (
  `kd_barang` int(11) NOT NULL,
  `nm_barang` varchar(115) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `jumlah` int(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `testing_sidang`
--

INSERT INTO `testing_sidang` (`kd_barang`, `nm_barang`, `keterangan`, `jumlah`) VALUES
(10, 'Komputer Asus', 'Baru', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `keterangan` varchar(125) NOT NULL,
  `tanggal_permintaan` varchar(125) NOT NULL,
  `role` varchar(125) NOT NULL,
  `status` varchar(125) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id`, `keterangan`, `tanggal_permintaan`, `role`, `status`, `id_user`, `id_buku`) VALUES
(361, 'Permintaan telah direspon', '29-08-2024 (12.10)', 'Pengembalian', 'Telah disetujui !', 153, 11),
(362, 'Permintaan telah direspon', '24-07-2024 (17.52)', 'Pengembalian', 'Telah disetujui !', 153, 7),
(363, 'Permintaan telah direspon', '24-07-2024 (17.52)', 'Pengembalian', 'Telah disetujui !', 153, 14),
(364, 'Permintaan telah direspon', '24-07-2024 (18.26)', 'Pengembalian', 'Telah disetujui !', 144, 6),
(365, 'Permintaan telah direspon', '24-07-2024 (18.26)', 'Pengembalian', 'Telah disetujui !', 144, 11),
(366, 'Permintaan telah direspon', '24-07-2024 (18.26)', 'Pengembalian', 'Telah disetujui !', 144, 7),
(367, 'Permintaan telah direspon', '24-07-2024 (18.27)', 'Pengembalian', 'Telah disetujui !', 148, 14),
(368, 'Permintaan telah direspon', '24-07-2024 (18.27)', 'Pengembalian', 'Telah disetujui !', 148, 148),
(369, 'Permintaan telah direspon', '24-07-2024 (18.28)', 'Pengembalian', 'Telah disetujui !', 150, 7),
(370, 'Permintaan telah direspon', '24-07-2024 (18.28)', 'Pengembalian', 'Telah disetujui !', 150, 6),
(371, 'Permintaan telah direspon', '24-07-2024 (18.28)', 'Pengembalian', 'Telah disetujui !', 151, 11),
(372, 'Permintaan telah direspon', '24-07-2024 (18.28)', 'Pengembalian', 'Telah disetujui !', 151, 14),
(373, 'Permintaan telah direspon', '24-07-2024 (18.29)', 'Pengembalian', 'Telah disetujui !', 145, 7),
(374, 'Permintaan telah direspon', '24-07-2024 (18.29)', 'Pengembalian', 'Telah disetujui !', 145, 6),
(375, 'Permintaan telah direspon', '24-07-2024 (18.29)', 'Pengembalian', 'Telah disetujui !', 146, 7),
(376, 'Permintaan telah direspon', '24-07-2024 (18.29)', 'Pengembalian', 'Telah disetujui !', 146, 11),
(377, 'Permintaan telah direspon', '24-07-2024 (18.29)', 'Pengembalian', 'Telah disetujui !', 146, 148),
(387, 'Permintaan telah direspon', '12-08-2024 (13.53)', 'Pengembalian', 'Telah disetujui !', 153, 25),
(400, 'Permintaan telah direspon', '23-08-2024 (19.33)', 'Pengembalian', 'Telah disetujui !', 153, 9),
(403, 'Permintaan telah direspon', '29-08-2024 (12.10)', 'Pengembalian', 'Telah disetujui !', 153, 11),
(405, 'Permintaan telah direspon', '29-08-2024 (12.15)', 'Pengembalian', 'Telah disetujui !', 153, 13),
(406, 'Permintaan telah direspon', '29-08-2024 (12.15)', 'Pengembalian', 'Telah disetujui !', 153, 13);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_lvl`
--

CREATE TABLE `user_lvl` (
  `id` int(11) NOT NULL,
  `role` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user_lvl`
--

INSERT INTO `user_lvl` (`id`, `role`) VALUES
(1, 'Petugas'),
(2, 'Anggota'),
(3, 'Pending');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user_lvl` (`id_user_lvl`);

--
-- Indeks untuk tabel `association_rule`
--
ALTER TABLE `association_rule`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `association_rule_user`
--
ALTER TABLE `association_rule_user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kategori` (`id_kategori`,`id_penerbit`),
  ADD KEY `id_penerbit` (`id_penerbit`);

--
-- Indeks untuk tabel `frequent_itemset`
--
ALTER TABLE `frequent_itemset`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pemberitahuan`
--
ALTER TABLE `pemberitahuan`
  ADD PRIMARY KEY (`id_pemberitahuan`);

--
-- Indeks untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_permintaan` (`id_permintaan_lvl`);

--
-- Indeks untuk tabel `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`id_pendaftaran`);

--
-- Indeks untuk tabel `penerbit`
--
ALTER TABLE `penerbit`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`id_pesan`);

--
-- Indeks untuk tabel `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user_lvl` (`id_user_lvl`);

--
-- Indeks untuk tabel `testing_sidang`
--
ALTER TABLE `testing_sidang`
  ADD PRIMARY KEY (`kd_barang`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_buku` (`id_buku`);

--
-- Indeks untuk tabel `user_lvl`
--
ALTER TABLE `user_lvl`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=252;

--
-- AUTO_INCREMENT untuk tabel `association_rule`
--
ALTER TABLE `association_rule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=391;

--
-- AUTO_INCREMENT untuk tabel `association_rule_user`
--
ALTER TABLE `association_rule_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=542;

--
-- AUTO_INCREMENT untuk tabel `buku`
--
ALTER TABLE `buku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=150;

--
-- AUTO_INCREMENT untuk tabel `frequent_itemset`
--
ALTER TABLE `frequent_itemset`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=623;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `pemberitahuan`
--
ALTER TABLE `pemberitahuan`
  MODIFY `id_pemberitahuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=348;

--
-- AUTO_INCREMENT untuk tabel `pendaftaran`
--
ALTER TABLE `pendaftaran`
  MODIFY `id_pendaftaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT untuk tabel `penerbit`
--
ALTER TABLE `penerbit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `pesan`
--
ALTER TABLE `pesan`
  MODIFY `id_pesan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `testing_sidang`
--
ALTER TABLE `testing_sidang`
  MODIFY `kd_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=423;

--
-- AUTO_INCREMENT untuk tabel `user_lvl`
--
ALTER TABLE `user_lvl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `anggota`
--
ALTER TABLE `anggota`
  ADD CONSTRAINT `anggota_ibfk_1` FOREIGN KEY (`id_user_lvl`) REFERENCES `user_lvl` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD CONSTRAINT `buku_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `buku_ibfk_2` FOREIGN KEY (`id_penerbit`) REFERENCES `penerbit` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `peminjaman_ibfk_1` FOREIGN KEY (`id_permintaan_lvl`) REFERENCES `transaksi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `petugas`
--
ALTER TABLE `petugas`
  ADD CONSTRAINT `petugas_ibfk_1` FOREIGN KEY (`id_user_lvl`) REFERENCES `user_lvl` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `anggota` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_ibfk_3` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
