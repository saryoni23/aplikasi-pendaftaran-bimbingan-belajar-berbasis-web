-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 06, 2017 at 09:53 AM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bimbel`
--

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE IF NOT EXISTS `berita` (
  `id` int(11) NOT NULL,
  `judul_berita` varchar(50) NOT NULL,
  `isi_berita` text NOT NULL,
  `tanggal_berita` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id`, `judul_berita`, `isi_berita`, `tanggal_berita`) VALUES
(5, 'Seleksi mahasiswa baru 2017 Jalur PMDK', 'BANDUNG, polban.ac.id - Diberitahukan kepada seluruh siswa/siswi SMA/SMK/MA yang akan lulus pada tahun 2013 ini dan sangat berminat menuntut ilmu di POLBAN, bahwa POLBAN kembali membuka Seleksi Mahasiswa Baru melalui jalur Penelusuran Minat dan Kemampuan (PMDK).\r\nPMDK tetap dibagi menjadi 2 jalur yaitu jalur PMDK Prestasi Akademik (PMDK AK) dan jalur PMDK Bidik Misi (PMDK BM).\r\nSatu hal yang perbedaan yang paling signifikan dari tahun - tahun sebelumnya adalah bahwa Pendaftaran PMDK tahun 2013 ini tidak dipungut biaya sama sekali dengan arti kata biaya pendaftaran GRATIS baik untuk PMDK AK maupun PMDK BM. Ini adalah salah satu bentuk keberpihakan Politeknik Negeri Bandung terhadap pentingnya melanjutkan ke pendidikan tinggi bagi seluruh siswa/siswi lulusan terbaik dan memberikan kesempatan seluas-luasnya kepada siswa/siswi yang berada pada ekonomi lemah  untuk melanjutkan pendidikan ke jenjang yang lebih tinggi dengan kuota lebih kurang 60% dari total penerimaan mahasiswa baru tahun ini adalah 1750 orang. Sehingga sangat besar kesempatan calon peserta melalui jalur PMDK untuk menuntut ilmu di POLBAN.\r\nPendaftaran PMDK dilakukan secara online melalui http://pmdk.polban.ac.id yang semula akan dibuka pada tanggal 18 Pebruari 2013 akan dimundurkan menjadi tanggal 4 Maret 2013 s.d. 30 April 2013 (Cap Pos). untuk prosedur dapat dilihat di http://pmdk.polban.ac.id/downloads/langkahPendaftaran_2013.pdf dan untuk informasi silahkan baca di http://pmdk.polban.ac.id/web/informasi .\r\n', '2017-04-16'),
(6, 'pembukaan siswa baru', 'diadakan pendaftaran siswa baru buat anak didik primagama\r\n', '2017-08-02');

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE IF NOT EXISTS `jurusan` (
  `id` int(11) NOT NULL,
  `kd_jurusan` char(3) NOT NULL,
  `nm_jurusan` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`id`, `kd_jurusan`, `nm_jurusan`) VALUES
(1, 'J01', 'IPA'),
(2, 'J02', 'IPS'),
(3, 'J03', 'Bahasa');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE IF NOT EXISTS `kelas` (
  `id` int(11) NOT NULL,
  `kd_kelas` char(3) NOT NULL,
  `nm_kelas` varchar(20) NOT NULL,
  `kd_jurusan` char(3) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id`, `kd_kelas`, `nm_kelas`, `kd_jurusan`) VALUES
(1, 'K01', 'Reguler Kelas ipa 1A', 'J01'),
(2, 'K02', 'Reguler Bahasa', 'J03'),
(4, 'K03', 'Reguler IPS', 'J02'),
(5, 'K04', 'Reguler Kealas 1B', 'J01');

-- --------------------------------------------------------

--
-- Table structure for table `materi`
--

CREATE TABLE IF NOT EXISTS `materi` (
  `id` int(11) NOT NULL,
  `kd_materi` char(3) NOT NULL,
  `nm_materi` varchar(50) NOT NULL,
  `tgl_upload` date NOT NULL,
  `file` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `materi`
--

INSERT INTO `materi` (`id`, `kd_materi`, `nm_materi`, `tgl_upload`, `file`) VALUES
(4, 'M01', 'TryOutI', '2017-11-01', 'receipt.pdf'),
(6, 'M02', 'TryOut2', '2017-09-12', 'receipt.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE IF NOT EXISTS `nilai` (
  `id` int(11) NOT NULL,
  `nis` char(12) NOT NULL,
  `nm_materi` char(6) NOT NULL,
  `nilai` double DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`id`, `nis`, `nm_materi`, `nilai`) VALUES
(21, '011002', 'TryOut', 90);

-- --------------------------------------------------------

--
-- Table structure for table `pelajaran`
--

CREATE TABLE IF NOT EXISTS `pelajaran` (
  `id` int(11) NOT NULL,
  `kd_pelajaran` char(6) NOT NULL,
  `nm_pelajaran` varchar(20) NOT NULL,
  `kd_pengajar` char(3) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelajaran`
--

INSERT INTO `pelajaran` (`id`, `kd_pelajaran`, `nm_pelajaran`, `kd_pengajar`) VALUES
(1, 'MP0101', 'Matematika', 'P01'),
(2, 'MP0102', 'Biologi', 'P01'),
(3, 'MP0201', 'Ekonomi', 'P01'),
(4, 'MP1234', 'Geografi', 'P01');

-- --------------------------------------------------------

--
-- Table structure for table `pengajar`
--

CREATE TABLE IF NOT EXISTS `pengajar` (
  `id` int(11) NOT NULL,
  `kd_pengajar` char(3) NOT NULL,
  `nm_pengajar` varchar(50) NOT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `no_telp` char(12) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengajar`
--

INSERT INTO `pengajar` (`id`, `kd_pengajar`, `nm_pengajar`, `alamat`, `no_telp`) VALUES
(1, 'P01', 'Pak Fredie', 'Rumah', '088088088088');

-- --------------------------------------------------------

--
-- Table structure for table `program_bimbel`
--

CREATE TABLE IF NOT EXISTS `program_bimbel` (
  `id` int(11) NOT NULL,
  `program` text NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `program_bimbel`
--

INSERT INTO `program_bimbel` (`id`, `program`) VALUES
(1, '<a style="margin: 0px; padding: 0px; color: #cc6600"><span style="margin: 0px; padding: 0px; color: #000000; text-align: justify" class="isian">\r\n<table border="0" cellspacing="0" cellpadding="5" width="420" align="left" style="text-align: center; margin: 0px; padding: 0px">\r\n	<tbody>\r\n		<tr style="margin: 0px; padding: 0px">\r\n			<td class="blacktext" width="400" valign="top" style="margin: 0px; padding: 0px">\r\n			<h5 style="margin: 0px; padding: 0px 0px 1.2em">\r\n			</h5>\r\n			<h3><em><font face="book antiqua, palatino" size="7"><strong class="greentitle" style="margin: 0px; padding: 0px">Tujuan Program</strong></font></em></h3><font face="andale mono, times" size="6">\r\n			Meningkatkan prestasi di sekolah.<br />\r\n			Menaikkan nilai rapor.<br />\r\n			Nilai Nilai UN tinggi.<br />\r\n			Sukses SNMPTN.<br />\r\n			<strong class="greentitle" style="margin: 0px; padding: 0px">Materi Bimbingan<br />\r\n			</strong>\r\n			Bidang studi materi UN dan SNMPTN.<br />\r\n			<strong class="greentitle" style="margin: 0px; padding: 0px">Sarana<br />\r\n			</strong>\r\n			Paket panduan belajar.<br />\r\n			Simulasi ulangan umum.<br />\r\n			Simulasi UN.<br />\r\n			Simulasi SNMPTN.<br />\r\n			Tes dan Try Out.\r\n			</font>\r\n			<p style="margin: 0px; padding: 0px 0px 1.2em">\r\n			<strong class="greentitle" style="margin: 0px; padding: 0px">Keterangan</strong><br />\r\n			Belajar 2 kali seminggu.\r\n			</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n</span></a>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE IF NOT EXISTS `siswa` (
  `id` int(11) NOT NULL,
  `nis` char(12) NOT NULL,
  `nm_siswa` varchar(20) DEFAULT NULL,
  `tahun` text,
  `bulan` text,
  `tanggal` text,
  `jk` char(10) DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `asal_sekolah` varchar(50) NOT NULL,
  `no_telp` int(11) DEFAULT NULL,
  `jurusan` varchar(20) DEFAULT NULL,
  `photo` text NOT NULL,
  `kd_kelas` char(6) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id`, `nis`, `nm_siswa`, `tahun`, `bulan`, `tanggal`, `jk`, `alamat`, `asal_sekolah`, `no_telp`, `jurusan`, `photo`, `kd_kelas`) VALUES
(13, '011002', 'indra saryoni s', '1997', '1', '23', 'Laki-Laki', 'medan', 'sma negeri 1', 2147483647, 'ipa', 'uploads/5dd6dd43d043916c61a6c26bfae2fdb0.jpg', ''),
(14, '011003', 'indra saryoni saryon', '1997', '1', '23', 'Laki-Laki', 'medan', 'sma negeri 1', 0, 'ipa', 'uploads/47e40844aa6c5c3a3ea529e591d52ed7.jpg', ''),
(15, '011004', 'kindi', '1997', '1', '1', 'Laki-Laki', 'bandung', 'sma negeri 1', 2147483647, 'ipa', '', ''),
(16, '011005', 'indra riksa', '1997', '2', '3', 'Laki-Laki', 'bandung', 'sma negeri 1', 2147483647, 'ipa', '', ''),
(17, '011006', 'berlin', '1997', '1', '4', 'Laki-Laki', 'bandung', 'sma negeri 1', 2147483647, 'ipa', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `level` enum('admin','member') NOT NULL DEFAULT 'member'
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `level`) VALUES
(1, 'admin', 'admin', 'admin'),
(22, '011002', 'indra', 'member'),
(23, '011003', 'indra', 'member'),
(24, '011004', 'kindi', 'member'),
(25, '011005', 'indra', 'member'),
(26, '011006', 'berlin', 'member');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `kd_jurusan` (`kd_jurusan`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `kd_kelas` (`kd_kelas`);

--
-- Indexes for table `materi`
--
ALTER TABLE `materi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pelajaran`
--
ALTER TABLE `pelajaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengajar`
--
ALTER TABLE `pengajar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `program_bimbel`
--
ALTER TABLE `program_bimbel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `username` (`username`), ADD UNIQUE KEY `username_2` (`username`), ADD UNIQUE KEY `username_3` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `materi`
--
ALTER TABLE `materi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `pelajaran`
--
ALTER TABLE `pelajaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `pengajar`
--
ALTER TABLE `pengajar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `program_bimbel`
--
ALTER TABLE `program_bimbel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
