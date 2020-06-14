-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 06, 2019 at 03:27 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ujiansantri`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_daerah`
--

CREATE TABLE `tb_daerah` (
  `id` int(11) NOT NULL,
  `nama_daerah` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_daerah`
--

INSERT INTO `tb_daerah` (`id`, `nama_daerah`) VALUES
(1, 'Ibnu Rusdi Al-Kurtubi'),
(2, 'KH. Wahid Hasyim'),
(3, 'Abu Nashor Al-Farobi'),
(4, 'Abu Hamid Al-Ghozali');

-- --------------------------------------------------------

--
-- Table structure for table `tb_fakultas`
--

CREATE TABLE `tb_fakultas` (
  `id` int(11) NOT NULL,
  `nama_fakultas` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_fakultas`
--

INSERT INTO `tb_fakultas` (`id`, `nama_fakultas`) VALUES
(1, 'Agama Islam'),
(2, 'Teknik'),
(3, 'Kesehatan'),
(4, 'Sosial & Humainora'),
(5, 'Pasca Sarjana');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jurusan`
--

CREATE TABLE `tb_jurusan` (
  `id` int(11) NOT NULL,
  `nama_jurusan` varchar(255) NOT NULL,
  `fakultas_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_jurusan`
--

INSERT INTO `tb_jurusan` (`id`, `nama_jurusan`, `fakultas_id`) VALUES
(1, 'Pendidikan Agama Islam', 1),
(2, 'Manajemen Pendidikan Islam', 1),
(3, 'Ekonomi Syari\'ah', 1),
(4, 'Perbankan Syari\'ah', 1),
(5, 'Ilmu Al-Qur\'an & Tafsir', 1),
(6, 'Komunikasi dan Penyiaran Islam', 1),
(7, 'Informatika', 2),
(8, 'Elektro', 2),
(9, 'Tekonolgi Informasi', 2),
(10, 'Sistem Informasi', 2),
(11, 'Rekayasa Perangkat Lunak', 2),
(12, 'Sarjana Keperawatan', 3),
(13, 'D3 Kebidanan', 3),
(14, 'Profesi Ners', 3),
(15, 'Hukum', 4),
(16, 'Matematika', 4),
(17, 'Bahasa Inggris', 4),
(18, 'Ekonomi', 4),
(19, 'Magister Manajemen Pendidikan Islam', 5),
(20, 'Magister Pendidikan Agama Islam', 5),
(21, 'Hukum Keluarga (Ahwal Al-Syakhiyah)', 1),
(22, 'Pendidikan Guru Madrasah Ibtida\'iyah', 1),
(23, 'Pendidikan Islam Anak Usia Dini', 1),
(24, 'Hukum Ekonomi Syari\'ah', 1),
(25, 'Pendidikan Bahasa Arab', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_jurusan_santri`
--

CREATE TABLE `tb_jurusan_santri` (
  `id` int(11) NOT NULL,
  `nama_jurusan` varchar(128) NOT NULL,
  `lembaga_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_jurusan_santri`
--

INSERT INTO `tb_jurusan_santri` (`id`, `nama_jurusan`, `lembaga_id`) VALUES
(1, 'IPA Reguler', 1),
(2, 'Bahasa Reguler', 1),
(3, 'IPA Tahfidz', 1),
(4, 'IPS Reguler', 1),
(5, 'IPA Unggulan', 1),
(6, 'IPA Reguler', 2),
(7, 'IPS Reguler', 2),
(8, 'Bahasa Reguler', 2),
(9, 'Bahasa Unggulan', 2),
(10, 'IPA Unggulan', 2),
(11, 'IPS Unggulan', 2),
(12, 'Multimedia (MM)', 3),
(13, 'Rekayasa Perangkat Lunak (RPL)', 3),
(14, 'Teknik Komputer & Jaringan', 3),
(15, 'Teknik Pembangkit Tenaga Listrik (PJB CLASS)', 3),
(16, 'Tata Busana', 3),
(17, 'Perikanan', 3),
(18, 'Keagamaan', 4),
(19, 'Bahasa', 4),
(20, 'IPA', 4),
(21, 'IPS', 4),
(35, 'Keagamaan', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_kamar`
--

CREATE TABLE `tb_kamar` (
  `id` int(11) NOT NULL,
  `nama_kamar` varchar(100) NOT NULL,
  `daerah_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_kamar`
--

INSERT INTO `tb_kamar` (`id`, `nama_kamar`, `daerah_id`) VALUES
(1, 'B01', 1),
(2, 'B02', 1),
(3, 'B03', 1),
(4, 'B04', 1),
(5, 'B05', 1),
(6, 'B06', 2),
(7, 'B07', 2),
(8, 'B08', 2),
(9, 'B09', 2),
(11, 'B10', 2),
(12, 'B11', 3),
(13, 'B12', 3),
(14, 'B13', 3),
(15, 'B14', 3),
(16, 'B15', 3),
(17, 'B16', 4),
(18, 'B17', 4),
(19, 'B18', 4),
(20, 'B19', 4),
(21, 'B20', 4);

-- --------------------------------------------------------

--
-- Table structure for table `tb_lembaga`
--

CREATE TABLE `tb_lembaga` (
  `id` int(11) NOT NULL,
  `nama_lembaga` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_lembaga`
--

INSERT INTO `tb_lembaga` (`id`, `nama_lembaga`) VALUES
(1, 'MA Nurul Jadid'),
(2, 'SMA Nurul Jadid'),
(3, 'SMK Nurul Jadid'),
(4, 'MA Negeri 1 Probolinggo');

-- --------------------------------------------------------

--
-- Table structure for table `tb_level`
--

CREATE TABLE `tb_level` (
  `id` int(11) NOT NULL,
  `role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_level`
--

INSERT INTO `tb_level` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `tb_nilai`
--

CREATE TABLE `tb_nilai` (
  `id` int(11) NOT NULL,
  `id_santri` int(11) NOT NULL,
  `nilai_aqidah1` varchar(10) NOT NULL,
  `nilai_akhlak1` varchar(10) NOT NULL,
  `nilai_fiqih1` varchar(10) NOT NULL,
  `nilai_quran1` varchar(10) NOT NULL,
  `nilai_aqidah2` int(10) NOT NULL,
  `nilai_akhlak2` int(10) NOT NULL,
  `nilai_fiqih2` int(10) NOT NULL,
  `nilai_quran2` int(10) NOT NULL,
  `nilai_aqidah3` int(10) NOT NULL,
  `nilai_akhlak3` int(10) NOT NULL,
  `nilai_fiqih3` int(10) NOT NULL,
  `nilai_quran3` int(10) NOT NULL,
  `nilai_aqidah4` int(10) NOT NULL,
  `nilai_akhlak4` int(10) NOT NULL,
  `nilai_fiqih4` int(10) NOT NULL,
  `nilai_quran4` int(10) NOT NULL,
  `jumlah1` varchar(20) NOT NULL,
  `jumlah2` varchar(20) NOT NULL,
  `jumlah3` varchar(20) NOT NULL,
  `jumlah4` varchar(20) NOT NULL,
  `rata_rata1` varchar(10) NOT NULL,
  `rata_rata2` varchar(10) NOT NULL,
  `rata_rata3` varchar(10) NOT NULL,
  `rata_rata4` varchar(10) NOT NULL,
  `rata_rata` varchar(10) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `tgl_input` varchar(20) NOT NULL,
  `tgl_update` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_nilai`
--

INSERT INTO `tb_nilai` (`id`, `id_santri`, `nilai_aqidah1`, `nilai_akhlak1`, `nilai_fiqih1`, `nilai_quran1`, `nilai_aqidah2`, `nilai_akhlak2`, `nilai_fiqih2`, `nilai_quran2`, `nilai_aqidah3`, `nilai_akhlak3`, `nilai_fiqih3`, `nilai_quran3`, `nilai_aqidah4`, `nilai_akhlak4`, `nilai_fiqih4`, `nilai_quran4`, `jumlah1`, `jumlah2`, `jumlah3`, `jumlah4`, `rata_rata1`, `rata_rata2`, `rata_rata3`, `rata_rata4`, `rata_rata`, `keterangan`, `tgl_input`, `tgl_update`) VALUES
(19, 6, '70', '70', '70', '70', 70, 70, 70, 70, 70, 70, 70, 70, 70, 70, 70, 70, '280', '280', '280', '280', '70', '70', '70', '70', '70', 'Tidak Lulus', '06 Aug 2019 01:38:47', '06 Aug 2019 02:59:32'),
(20, 7, '82', '80', '60', '50', 70, 70, 66, 50, 80, 70, 60, 60, 60, 58, 44, 66, '272', '256', '270', '228', '68', '64', '67.50', '57', '64.13', 'Tidak Lulus', '06 Aug 2019 02:26:08', '06 Aug 2019 03:06:24'),
(21, 9, '90', '80', '80', '70', 90, 80, 70, 60, 80, 90, 80, 70, 80, 88, 70, 50, '320', '300', '320', '288', '80', '75', '80', '72', '76.75', 'Lulus', '06 Aug 2019 02:27:59', '-'),
(22, 10, '100', '100', '100', '100', 100, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100, '400', '400', '400', '400', '100', '100', '100', '100', '100', 'Lulus', '06 Aug 2019 03:07:23', '-'),
(23, 11, '100', '100', '100', '100', 100, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100, '400', '400', '400', '400', '100', '100', '100', '100', '100', 'Lulus', '06 Aug 2019 03:09:32', '-');

-- --------------------------------------------------------

--
-- Table structure for table `tb_santri`
--

CREATE TABLE `tb_santri` (
  `id` int(11) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tanggal_lahir` varchar(100) NOT NULL,
  `lembaga` varchar(100) NOT NULL,
  `jurusan` varchar(100) NOT NULL,
  `daerah` varchar(100) NOT NULL,
  `kamar` varchar(100) NOT NULL,
  `nama_ayah` varchar(100) NOT NULL,
  `pekerjaan_ayah` varchar(100) NOT NULL,
  `nama_ibu` varchar(100) NOT NULL,
  `pekerjaan_ibu` varchar(100) NOT NULL,
  `telp` varchar(128) NOT NULL,
  `desa` varchar(100) NOT NULL,
  `kecamatan` varchar(100) NOT NULL,
  `kabupaten` varchar(100) NOT NULL,
  `provinsi` varchar(100) NOT NULL,
  `tgl_input` varchar(20) NOT NULL,
  `tgl_update` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_santri`
--

INSERT INTO `tb_santri` (`id`, `nama_lengkap`, `tempat_lahir`, `tanggal_lahir`, `lembaga`, `jurusan`, `daerah`, `kamar`, `nama_ayah`, `pekerjaan_ayah`, `nama_ibu`, `pekerjaan_ibu`, `telp`, `desa`, `kecamatan`, `kabupaten`, `provinsi`, `tgl_input`, `tgl_update`) VALUES
(6, 'Muhammad Syaiful', 'Lumajang', '19-Januari-1949', 'MA Nurul Jadid', 'Bahasa Reguler', 'Ibnu Rusdi Al-Kurtubi', 'B02', 'Ani', 'Wiraswasta', 'Sulastri', 'Wiraswasta', '081331289350', 'Pulisen', ' Boyolali', 'Kab. Boyolali', 'Jawa Tengah', '06 Aug 2019 01:05:05', '06 Aug 2019 02:30:14'),
(7, 'Shodiq Taufiq', 'Probolinggo', '3-Desember-2010', 'MA Nurul Jadid', 'Bahasa Reguler', 'Ibnu Rusdi Al-Kurtubi', 'B02', 'Uzumaki Naruto', 'Buruh', 'Haruno Sakura', 'Pedagang', '081331289350', 'Cimanis', ' Sobang', 'Kab. Pandeglang', 'Banten', '06 Aug 2019 01:17:21', '06 Aug 2019 02:30:29'),
(9, 'Ilham Akbar Safaruddin', 'Malang', '2-Januari-1949', 'MA Nurul Jadid', 'Bahasa Reguler', 'Ibnu Rusdi Al-Kurtubi', 'B02', 'Syaiful', 'Karyawan Swasta', 'Ani', 'Wiraswasta', '081331289350', 'Pulisen', ' Boyolali', 'Kab. Boyolali', 'Jawa Tengah', '06 Aug 2019 02:05:24', '06 Aug 2019 02:14:20'),
(10, 'Ahmad Irsyadul Ibad', 'Jember', '13-Januari-2000', 'MA Nurul Jadid', 'Bahasa Reguler', 'Ibnu Rusdi Al-Kurtubi', 'B02', 'Ani', 'Wiraswasta', 'Sulastri', 'Wiraswasta', '081331289350', 'Pulisen', ' Boyolali', 'Kab. Boyolali', 'Jawa Tengah', '06 Aug 2019 02:29:50', '-'),
(11, 'Mohamad Hafid Masruri', 'Lumajang', '27-Juli-1998', 'SMK Nurul Jadid', 'Teknik Komputer & Jaringan', 'Abu Nashor Al-Farobi', 'B15', 'Sugianto', 'Petani', 'Siti Zulaikha', 'Ibu Rumah Tangga', '081331289350', 'Jambekumbu', ' Pasrujambe', 'Kab. Lumajang', 'Jawa Timur', '06 Aug 2019 03:09:05', '-');

-- --------------------------------------------------------

--
-- Table structure for table `tb_triwulan`
--

CREATE TABLE `tb_triwulan` (
  `id` int(11) NOT NULL,
  `triwulan1` varchar(20) NOT NULL,
  `triwulan2` varchar(20) NOT NULL,
  `triwulan3` varchar(20) NOT NULL,
  `triwulan4` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `lembaga` varchar(100) NOT NULL,
  `fakultas` varchar(100) NOT NULL,
  `jurusan` varchar(100) NOT NULL,
  `semester` varchar(100) NOT NULL,
  `daerah` varchar(100) NOT NULL,
  `kamar` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `nama`, `lembaga`, `fakultas`, `jurusan`, `semester`, `daerah`, `kamar`, `username`, `password`, `gambar`, `role_id`, `is_active`) VALUES
(14, 'Mohammad Syaiful', 'Universitas Nurul Jadid', 'Teknik', 'Informatika', '02', 'Ibnu Rusdi Al-Kurtubi', 'B03', 'syaiful', '$2y$10$yJfnk/1POcz/UI2OQkMPj.SpNu1hfiGIQadl/AjR2t61ifQD83I4e', 'syaiful_1565030619.jpg', 1, 1),
(15, 'Mohammad Nuris', 'Universitas Nurul Jadid', 'Agama Islam', 'Perbankan Syari\'ah', '03', 'Ibnu Rusdi Al-Kurtubi', 'B01', 'nuris', '$2y$10$N.KPIKIE4ESMOUhZo4rGT.svm5RhbzwbSKYCeRgJVWW9zwKydUlLW', 'syaiful_1565030667.jpg', 2, 1),
(17, 'M. Hafidz Masruri', 'Universitas Nurul Jadid', 'Teknik', 'Informatika', '05', 'Abu Hamid Al-Ghozali', 'B16', 'hafidz', '$2y$10$GPPwVHH85mEnQpZh6EuC7.s8j0ojxjLETw60E2VOVZRyJo.5I4GTW', 'syaiful_1565030690.png', 1, 1),
(20, 'Mark Zuckeberg', 'Massachussets Institut Of Technology', 'Teknik', 'Informatika', '08', 'KH. Wahid Hasyim', 'B07', 'Mark', '$2y$10$Ow4WiEKqsOrln2Vj5Pxccu5mS7qT2jZYEYOfVnIGRwMAx/mjTtrRy', 'syaiful_1565032378.jpg', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_daerah`
--
ALTER TABLE `tb_daerah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_fakultas`
--
ALTER TABLE `tb_fakultas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_jurusan`
--
ALTER TABLE `tb_jurusan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_jurusan_santri`
--
ALTER TABLE `tb_jurusan_santri`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_kamar`
--
ALTER TABLE `tb_kamar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_lembaga`
--
ALTER TABLE `tb_lembaga`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_level`
--
ALTER TABLE `tb_level`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_nilai`
--
ALTER TABLE `tb_nilai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_santri`
--
ALTER TABLE `tb_santri`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_triwulan`
--
ALTER TABLE `tb_triwulan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_daerah`
--
ALTER TABLE `tb_daerah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_fakultas`
--
ALTER TABLE `tb_fakultas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_jurusan`
--
ALTER TABLE `tb_jurusan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tb_jurusan_santri`
--
ALTER TABLE `tb_jurusan_santri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `tb_kamar`
--
ALTER TABLE `tb_kamar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tb_lembaga`
--
ALTER TABLE `tb_lembaga`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_level`
--
ALTER TABLE `tb_level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_nilai`
--
ALTER TABLE `tb_nilai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tb_santri`
--
ALTER TABLE `tb_santri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tb_triwulan`
--
ALTER TABLE `tb_triwulan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
