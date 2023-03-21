-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 14, 2021 at 03:15 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skripsi`
--

-- --------------------------------------------------------

--
-- Table structure for table `cluster`
--

CREATE TABLE `cluster` (
  `id_cluster` int(11) NOT NULL,
  `nama_cluster` varchar(50) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cluster`
--

INSERT INTO `cluster` (`id_cluster`, `nama_cluster`, `id_user`) VALUES
(14, 'cluster 1', 13),
(15, 'cluster 2', 13),
(18, 'cluster 1', 14),
(19, 'cluster 2', 14);

-- --------------------------------------------------------

--
-- Table structure for table `detail_cluster`
--

CREATE TABLE `detail_cluster` (
  `id_detail_cluster` int(11) NOT NULL,
  `jarak_faskes` float NOT NULL,
  `id_faskes` int(11) NOT NULL,
  `id_cluster` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_cluster`
--

INSERT INTO `detail_cluster` (`id_detail_cluster`, `jarak_faskes`, `id_faskes`, `id_cluster`) VALUES
(13, 13.74, 1, 14),
(14, 9.76, 2, 15),
(15, 8.21, 3, 15),
(16, 13.74, 1, 18),
(17, 9.76, 2, 19),
(18, 8.21, 3, 19);

-- --------------------------------------------------------

--
-- Table structure for table `detail_menu`
--

CREATE TABLE `detail_menu` (
  `id_detail_menu` int(11) NOT NULL,
  `id_role` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_menu`
--

INSERT INTO `detail_menu` (`id_detail_menu`, `id_role`, `id_menu`) VALUES
(234, 2, 14),
(235, 2, 15),
(236, 2, 16),
(305, 1, 1),
(306, 1, 2),
(307, 1, 3),
(308, 1, 4),
(309, 1, 5),
(310, 1, 7),
(311, 1, 8),
(312, 1, 14),
(313, 1, 15),
(314, 1, 16),
(315, 1, 18),
(316, 1, 19),
(317, 1, 20);

-- --------------------------------------------------------

--
-- Table structure for table `detail_role`
--

CREATE TABLE `detail_role` (
  `id_detail_role` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_role`
--

INSERT INTO `detail_role` (`id_detail_role`, `id_user`, `id_role`) VALUES
(35, 13, 1),
(36, 14, 2);

-- --------------------------------------------------------

--
-- Table structure for table `faskes`
--

CREATE TABLE `faskes` (
  `id_faskes` int(11) NOT NULL,
  `nama_faskes` varchar(100) NOT NULL,
  `nama_kepala_faskes` varchar(100) NOT NULL,
  `alamat_faskes` text NOT NULL,
  `no_telepon` varchar(20) NOT NULL,
  `latitude` float NOT NULL,
  `longtitude` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faskes`
--

INSERT INTO `faskes` (`id_faskes`, `nama_faskes`, `nama_kepala_faskes`, `alamat_faskes`, `no_telepon`, `latitude`, `longtitude`) VALUES
(1, 'Puskesmas Benowo', 'dr. Dwi Sapta Edy Purnama', 'Jl. Raya Benowo RT.01 RW.I, Kec. Pakal', '(031) 740 5936', -7.2348, 112.609),
(2, 'Puskesmas Lidah Kulon', 'drg. Rumiawati', 'Jl. Raya Menganti Lidah Kulon No.5, Kec. Lakarsantri', '(031) 753 3544', -7.30659, 112.659),
(3, 'Puskesmas Lontar', 'drg. Umi Fauzia', 'Jl. Raya Lontar No.26, Kec. Sambikerep', '(031) 752 2874', -7.28508, 112.663);

-- --------------------------------------------------------

--
-- Table structure for table `hasil_ahp`
--

CREATE TABLE `hasil_ahp` (
  `id_hasil` int(11) NOT NULL,
  `id_cluster` int(11) NOT NULL,
  `id_faskes` int(11) NOT NULL,
  `nilai_hasil` double NOT NULL,
  `ranking` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hasil_ahp`
--

INSERT INTO `hasil_ahp` (`id_hasil`, `id_cluster`, `id_faskes`, `nilai_hasil`, `ranking`) VALUES
(1, 18, 1, 1, 1),
(2, 19, 3, 0.52847794181128, 1),
(3, 19, 2, 0.47152205818872, 2);

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` int(11) NOT NULL,
  `nama_kriteria` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `nama_kriteria`) VALUES
(6, 'Fasilitas'),
(7, 'Pelayanan'),
(8, 'Biaya');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL,
  `menu` varchar(50) NOT NULL,
  `icon` varchar(100) DEFAULT NULL,
  `link` varchar(100) NOT NULL,
  `id_parent` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id_menu`, `menu`, `icon`, `link`, `id_parent`) VALUES
(1, 'Dashboard', 'fas fa-fw fa-clinic-medical', 'admin/dashboard', 0),
(2, 'Data User', 'fas fa-fw fa-user', 'admin/user', 0),
(3, 'Data Role', 'fas fa-fw fa-user-tag', 'admin/role', 0),
(4, 'Data Faskes', 'fas fa-fw fa-hospital', 'admin/faskes', 0),
(5, 'Data Kriteria', 'fas fa-fw fa-sitemap', 'admin/kriteria', 0),
(7, 'Menu', 'fa fa-align-justify', 'admin/menu', 0),
(8, 'Akses Menu', 'fa fa-tasks', 'admin/detail_menu', 0),
(14, 'Profile Saya', 'fas fa-fw fa-user', 'admin/profile', 0),
(15, 'Ganti Password', 'fas fa-fw fa-key', 'admin/profile/changepassword', 0),
(16, 'Rekomendasi Faskes', 'fa fa-hospital', 'admin/rekomendasi_faskes', 0),
(18, 'Data Faskes Nilai', 'fa fa-pencil-ruler', 'admin/nilai', 0),
(19, 'Data Poli', '', 'admin/poli', 0),
(20, 'Daftar Poli Faskes', NULL, 'admin/poli_faskes', 0);

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `id_nilai` int(11) NOT NULL,
  `id_faskes` int(11) DEFAULT NULL,
  `id_kriteria` int(11) DEFAULT NULL,
  `nilai` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`id_nilai`, `id_faskes`, `id_kriteria`, `nilai`) VALUES
(2, 1, 7, 8),
(4, 2, 6, 7),
(5, 2, 7, 7),
(6, 2, 8, 5),
(7, 3, 6, 8),
(8, 3, 7, 8),
(9, 3, 8, 5),
(10, 1, 8, 5);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id_role` int(11) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id_role`, `role`) VALUES
(1, 'Administrator'),
(2, 'Pasien');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_poli_detail`
--

CREATE TABLE `tbl_poli_detail` (
  `id_poli_detail` int(11) NOT NULL,
  `nama_poli` varchar(50) DEFAULT NULL,
  `keterangan_poli` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_poli_detail`
--

INSERT INTO `tbl_poli_detail` (`id_poli_detail`, `nama_poli`, `keterangan_poli`) VALUES
(1, 'GIGI', 'tambah'),
(2, 'GIZI', 'asas'),
(3, 'KIA', 'KIA dong');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_poli_faskes`
--

CREATE TABLE `tbl_poli_faskes` (
  `id_poli_faskes` int(11) NOT NULL,
  `id_faskes` int(11) NOT NULL DEFAULT '0',
  `id_poli_detail` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_poli_faskes`
--

INSERT INTO `tbl_poli_faskes` (`id_poli_faskes`, `id_faskes`, `id_poli_detail`) VALUES
(6, 2, 2),
(7, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rekom_ahp`
--

CREATE TABLE `tbl_rekom_ahp` (
  `id_rekom_ahp` int(11) NOT NULL,
  `fasilitas` double DEFAULT NULL,
  `pelayanan` double DEFAULT NULL,
  `biaya` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `foto`, `username`, `password`) VALUES
(13, 'Administrator', 'share.jpg', 'fiq1', '$2y$10$8bqxupDZF56riA2pSYN75ep.ICpJoeyGQ4HSRAP0NRuKXJoefG0uu'),
(14, 'Coba User', 'default.jpg', 'cobauser', '$2y$10$2hv/M3..4ZcegfI8Xhb3C.nRhqZo8vIN3EGt6S0md.zuM45DKGI3C');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cluster`
--
ALTER TABLE `cluster`
  ADD PRIMARY KEY (`id_cluster`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `detail_cluster`
--
ALTER TABLE `detail_cluster`
  ADD PRIMARY KEY (`id_detail_cluster`),
  ADD KEY `id_cluster` (`id_cluster`),
  ADD KEY `id_sekolah` (`id_faskes`);

--
-- Indexes for table `detail_menu`
--
ALTER TABLE `detail_menu`
  ADD PRIMARY KEY (`id_detail_menu`),
  ADD KEY `id_role` (`id_role`),
  ADD KEY `id_menu` (`id_menu`);

--
-- Indexes for table `detail_role`
--
ALTER TABLE `detail_role`
  ADD PRIMARY KEY (`id_detail_role`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_role` (`id_role`);

--
-- Indexes for table `faskes`
--
ALTER TABLE `faskes`
  ADD PRIMARY KEY (`id_faskes`);

--
-- Indexes for table `hasil_ahp`
--
ALTER TABLE `hasil_ahp`
  ADD PRIMARY KEY (`id_hasil`),
  ADD KEY `id_cluster` (`id_cluster`),
  ADD KEY `id_sekolah` (`id_faskes`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id_nilai`),
  ADD KEY `id_sekolah` (`id_faskes`),
  ADD KEY `id_kriteria` (`id_kriteria`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `tbl_poli_detail`
--
ALTER TABLE `tbl_poli_detail`
  ADD PRIMARY KEY (`id_poli_detail`);

--
-- Indexes for table `tbl_poli_faskes`
--
ALTER TABLE `tbl_poli_faskes`
  ADD PRIMARY KEY (`id_poli_faskes`),
  ADD KEY `FK_tbl_poli_faskes_faskes` (`id_faskes`),
  ADD KEY `FK_tbl_poli_faskes_tbl_poli_detail` (`id_poli_detail`);

--
-- Indexes for table `tbl_rekom_ahp`
--
ALTER TABLE `tbl_rekom_ahp`
  ADD PRIMARY KEY (`id_rekom_ahp`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cluster`
--
ALTER TABLE `cluster`
  MODIFY `id_cluster` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `detail_cluster`
--
ALTER TABLE `detail_cluster`
  MODIFY `id_detail_cluster` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `detail_menu`
--
ALTER TABLE `detail_menu`
  MODIFY `id_detail_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=318;
--
-- AUTO_INCREMENT for table `detail_role`
--
ALTER TABLE `detail_role`
  MODIFY `id_detail_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `hasil_ahp`
--
ALTER TABLE `hasil_ahp`
  MODIFY `id_hasil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_poli_detail`
--
ALTER TABLE `tbl_poli_detail`
  MODIFY `id_poli_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_poli_faskes`
--
ALTER TABLE `tbl_poli_faskes`
  MODIFY `id_poli_faskes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tbl_rekom_ahp`
--
ALTER TABLE `tbl_rekom_ahp`
  MODIFY `id_rekom_ahp` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `cluster`
--
ALTER TABLE `cluster`
  ADD CONSTRAINT `cluster_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `detail_cluster`
--
ALTER TABLE `detail_cluster`
  ADD CONSTRAINT `detail_cluster_ibfk_1` FOREIGN KEY (`id_cluster`) REFERENCES `cluster` (`id_cluster`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_cluster_ibfk_2` FOREIGN KEY (`id_faskes`) REFERENCES `faskes` (`id_faskes`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `detail_menu`
--
ALTER TABLE `detail_menu`
  ADD CONSTRAINT `detail_menu_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`),
  ADD CONSTRAINT `detail_menu_ibfk_2` FOREIGN KEY (`id_menu`) REFERENCES `menu` (`id_menu`);

--
-- Constraints for table `detail_role`
--
ALTER TABLE `detail_role`
  ADD CONSTRAINT `detail_role_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_role_ibfk_2` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hasil_ahp`
--
ALTER TABLE `hasil_ahp`
  ADD CONSTRAINT `hasil_ahp_ibfk_1` FOREIGN KEY (`id_cluster`) REFERENCES `cluster` (`id_cluster`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hasil_ahp_ibfk_2` FOREIGN KEY (`id_faskes`) REFERENCES `faskes` (`id_faskes`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `nilai`
--
ALTER TABLE `nilai`
  ADD CONSTRAINT `nilai_ibfk_1` FOREIGN KEY (`id_faskes`) REFERENCES `faskes` (`id_faskes`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nilai_ibfk_2` FOREIGN KEY (`id_kriteria`) REFERENCES `kriteria` (`id_kriteria`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_poli_faskes`
--
ALTER TABLE `tbl_poli_faskes`
  ADD CONSTRAINT `FK_tbl_poli_faskes_faskes` FOREIGN KEY (`id_faskes`) REFERENCES `faskes` (`id_faskes`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_tbl_poli_faskes_tbl_poli_detail` FOREIGN KEY (`id_poli_detail`) REFERENCES `tbl_poli_detail` (`id_poli_detail`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
