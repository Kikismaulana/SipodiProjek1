-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 01, 2018 at 09:38 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sipodi`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('sipodi', 'sipodi');

-- --------------------------------------------------------

--
-- Table structure for table `atm`
--

CREATE TABLE `atm` (
  `id_atm` int(11) NOT NULL,
  `id_penyedia` int(11) NOT NULL,
  `bank` varchar(10) DEFAULT NULL,
  `no_rek` varchar(50) DEFAULT NULL,
  `atas_nama` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `atm`
--

INSERT INTO `atm` (`id_atm`, `id_penyedia`, `bank`, `no_rek`, `atas_nama`) VALUES
(1, 1, 'BNI', '29874562434', 'Dewik'),
(2, 2, 'MANDIRI', '45676543456', 'Dinda mayang');

-- --------------------------------------------------------

--
-- Stand-in structure for view `detail`
-- (See below for the actual view)
--
CREATE TABLE `detail` (
`id_transaksi` int(11)
,`nama` varchar(50)
,`nama_orkes` varchar(50)
,`tipe` varchar(20)
,`nama_acara` varchar(50)
,`tanggal` date
,`alamat` text
,`deskripsi` text
,`keterangan` varchar(20)
,`bukti_transfer` varchar(50)
);

-- --------------------------------------------------------

--
-- Table structure for table `galeri`
--

CREATE TABLE `galeri` (
  `id_galeri` int(11) NOT NULL,
  `id_penyedia` int(11) NOT NULL,
  `gambar` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `galeri`
--

INSERT INTO `galeri` (`id_galeri`, `id_penyedia`, `gambar`) VALUES
(2, 1, 'asdasdsa.jpg'),
(3, 1, 'e.jpg'),
(4, 1, 'ww.jpg'),
(5, 1, 'dewi_kirana_tarling.jpg'),
(6, 1, 'dewi-kirana-16_resize.jpg'),
(7, 1, 'panggung-musik.jpg'),
(8, 1, 'z.jpg'),
(9, 1, 'wwwwww.jpg'),
(10, 2, 'z.jpg'),
(11, 2, '21727972_859052350937959_8212506362249197191_n.jpg'),
(12, 2, '21740579_859051884271339_3696101978604501834_n.jpg'),
(13, 2, '21740039_859051854271342_5195498936948553406_n.jpg'),
(14, 2, '21752451_859051907604670_7930745337082415358_n.jpg'),
(15, 2, 'FB_IMG_1506742790780.jpg'),
(16, 2, 'FB_IMG_1506742799688.jpg'),
(17, 2, 'asd.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_dekorasi`
--

CREATE TABLE `jenis_dekorasi` (
  `id_jenis_dekorasi` int(11) NOT NULL,
  `id_tipe` int(11) NOT NULL,
  `nama_dekorasi` varchar(30) DEFAULT NULL,
  `foto` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_dekorasi`
--

INSERT INTO `jenis_dekorasi` (`id_jenis_dekorasi`, `id_tipe`, `nama_dekorasi`, `foto`) VALUES
(1, 1, 'Sound', 'BBC.jpg'),
(2, 1, 'Lighting', 'PRO-PAR-162-RGBW.jpg'),
(3, 2, 'Sound System', 'maxresdefault (1).jpg'),
(4, 2, 'Spootlight Lighting', 'Lightning Cob Cannon-RT.jpg'),
(6, 2, 'Full Color Lighting', 'sadsd.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pemusik`
--

CREATE TABLE `pemusik` (
  `id_pemusik` int(11) NOT NULL,
  `id_tipe` int(11) NOT NULL,
  `nama_pemusik` varchar(30) DEFAULT NULL,
  `nama_alat_pemusik` varchar(30) DEFAULT NULL,
  `foto` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemusik`
--

INSERT INTO `pemusik` (`id_pemusik`, `id_tipe`, `nama_pemusik`, `nama_alat_pemusik`, `foto`) VALUES
(2, 1, 'Kalong', 'Suling', 'yy.jpg'),
(4, 1, 'Yogi', 'Trompet', 's.jpg'),
(6, 1, 'Cangklong', 'Saxophone', 'v.jpg'),
(7, 1, 'Rasman', 'Melody', 'c.jpg'),
(8, 1, 'Firman', 'Drum', 'k.jpg'),
(9, 1, 'Burik', 'Kendang', 'wdwdd.jpg'),
(10, 1, 'Kastam', 'String', 'bb.jpg'),
(11, 2, 'Rusmana', 'Kendang', 'a.jpg'),
(12, 2, 'Rijal', 'Melody', 'cvcv.jpg'),
(13, 2, 'Wendi', 'String', 'dw.jpg'),
(14, 2, 'Cangklong, Baridin, Bebek', 'Saxophone & Trompet', 'j.jpg'),
(15, 2, 'Warta', 'Suling', 'ff.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `status` varchar(20) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `alamat` text,
  `no_hp` varchar(15) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `foto` varchar(50) NOT NULL,
  `jk` varchar(9) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `status`, `nama`, `alamat`, `no_hp`, `email`, `password`, `foto`, `jk`, `tanggal_lahir`) VALUES
(20, 'penyedia', 'Dewi Kirana', 'Desa Cilandak Kecamatan Anjatan', '089509978533', 'dewi@gmail.com', 'asd', 'dewikirana.jpg', 'PEREMPUAN', '1982-01-20'),
(21, 'penyedia', 'Dinda Mayang Sari', 'Desa Peningkiran Indramayu ', '089509978533', 'dinda@gmail.com', 'asd', '21743032_859051790938015_6717672293520578643_n.jpg', 'PEREMPUAN', '1979-06-13'),
(22, 'penyedia', 'Susy Arzety', 'Desa Walantara Timur Kecamatan Sindang', '089509978533', 'susy@gmail.com', 'asd', '', 'PEREMPUAN', '1984-11-15'),
(23, 'penyedia', 'Poetra Sonata', 'Desa Kirancang Kecamatan Indramayu', '089509978533', 'poetra@gmail.com', 'asd', '', 'LAKI-LAKI', '1991-07-25'),
(24, 'penyedia', 'Dewi Kirana', 'Desa Cilandak Kecamatan Anjatan', '089509978533', 'dj@gmail.com', 'asd', 'dewikirana.jpg', 'PEREMPUAN', '1982-01-20'),
(25, 'penyedia', 'Dinda Mayang Sari', 'Desa Peningkiran Indramayu ', '089509978533', 'paulina@gmail.com', 'asd', '21743032_859051790938015_6717672293520578643_n.jpg', 'PEREMPUAN', '1979-06-13'),
(26, 'penyedia', 'Susy Arzety', 'Desa Walantara Timur Kecamatan Sindang', '089509978533', 'extream@gmail.com', 'asd', '', 'PEREMPUAN', '1984-11-15'),
(27, 'penyedia', 'Poetra Sonata', 'Desa Kirancang Kecamatan Indramayu', '089509978533', 'yuliana@gmail.com', 'asd', '', 'LAKI-LAKI', '1991-07-25'),
(28, 'penyedia', 'Poetra Sonata', 'Desa Kirancang Kecamatan Indramayu', '089509978533', 'pantura@gmail.com', 'asd', '', 'LAKI-LAKI', '1991-07-25'),
(30, 'penyedia', 'Kikis Maulana', 'Bojongsari', '089509978533', 'kikismaulana1902@gmail.com', 'kikismaulana', 'Kikis.JPG', 'LAKI-LAKI', '1998-05-01');

-- --------------------------------------------------------

--
-- Table structure for table `penyanyi`
--

CREATE TABLE `penyanyi` (
  `id_penyanyi` int(11) NOT NULL,
  `id_tipe` int(11) NOT NULL,
  `nama_penyanyi` varchar(100) DEFAULT NULL,
  `foto` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penyanyi`
--

INSERT INTO `penyanyi` (`id_penyanyi`, `id_tipe`, `nama_penyanyi`, `foto`) VALUES
(1, 1, 'Dewi Kirana', 'dewi_kirana_tarling.jpg'),
(19, 1, 'Fina', 'Fina.png'),
(20, 1, 'Yuni', 'Yuni.jpg'),
(21, 1, 'Indah', 'indah.jpg'),
(22, 1, 'Shinta', 'Shinta.png'),
(23, 1, 'Sulastri', 'Sulastri.png'),
(25, 2, 'Riska, Sisil, Meriska, Indri, Melisa, Dinda', 'asd.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `penyedia`
--

CREATE TABLE `penyedia` (
  `id_penyedia` int(11) NOT NULL,
  `id_pengguna` int(11) NOT NULL,
  `nama_orkes` varchar(50) DEFAULT NULL,
  `alamat` text,
  `ktp` varchar(50) DEFAULT NULL,
  `foto` varchar(50) NOT NULL,
  `deskripsi_orkes` text,
  `status` varchar(30) NOT NULL,
  `notif` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penyedia`
--

INSERT INTO `penyedia` (`id_penyedia`, `id_pengguna`, `nama_orkes`, `alamat`, `ktp`, `foto`, `deskripsi_orkes`, `status`, `notif`) VALUES
(1, 20, 'Dewi Kirana', 'Desa Cilandak Kecamatan Anjatan', '71406.png', 'dewikirana.jpg', '<p>Orkes dangdut kami sangat bagus untuk kalian yang ingin memeriahkan suatu acara.</p>', 'Disetujui', 1),
(2, 21, 'DINDA DF', 'Desa Peningkiran Indramayu ', '71406.png', 'dinadf.jpg', '<h3>\"Orkes Dangdut DINDA DF Memberikan pelayanan hiburan yang akan memanjakan anda di pesta hajat ataupun yang lainnya.\"</h3>', 'Disetujui', 1),
(3, 22, 'DJ ROCK', 'Desa Cilandak Kecamatan Anjatan', '71406.png', 'djrock.png', '<p>Orkes dangdut kami sangat bagus untuk kalian yang ingin memeriahkan suatu acara.</p>', 'Disetujui', 1),
(4, 23, 'PANTURA NADA', 'Desa Peningkiran Indramayu ', '71406.png', 'panturanada.png', '<h3>\"Orkes Dangdut DINDA DF Memberikan pelayanan hiburan yang akan memanjakan anda di pesta hajat ataupun yang lainnya.\"</h3>', 'Disetujui', 1),
(5, 24, 'PAULINA NADA', 'Desa Cilandak Kecamatan Anjatan', '71406.png', 'paulina.jpg', '<p>Orkes dangdut kami sangat bagus untuk kalian yang ingin memeriahkan suatu acara.</p>', 'Disetujui', 1),
(6, 25, 'X-TREAM', 'Desa Peningkiran Indramayu ', '71406.png', 'X-tream.png', '<h3>\"Orkes Dangdut DINDA DF Memberikan pelayanan hiburan yang akan memanjakan anda di pesta hajat ataupun yang lainnya.\"</h3>', 'Disetujui', 1),
(7, 26, 'SUSY ARZETY', 'Desa Cilandak Kecamatan Anjatan', '71406.png', 'susyarzety.JPG', '<p>Orkes dangdut kami sangat bagus untuk kalian yang ingin memeriahkan suatu acara.</p>', 'Disetujui', 1),
(8, 27, 'POETRA SONETA', 'Desa Peningkiran Indramayu ', '71406.png', 'poetrasoneta.JPG', '<h3>\"Orkes Dangdut DINDA DF Memberikan pelayanan hiburan yang akan memanjakan anda di pesta hajat ataupun yang lainnya.\"</h3>', 'Disetujui', 1),
(9, 28, 'YULIANA ZN', 'Desa Cilandak Kecamatan Anjatan', '71406.png', 'yulianazn.png', '<p>Orkes dangdut kami sangat bagus untuk kalian yang ingin memeriahkan suatu acara.</p>', 'Disetujui', 1),
(14, 30, 'Indah Nada', 'Bojongsari blok Ketapang RT/RW 01/01 No.53', 'KTP.jpg', '', '<p>\" Orkes dangdut kami akan memberikan penyajian hiburan yang menarik bagi anda! \"</p>', 'Disetujui', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tipe_panggung`
--

CREATE TABLE `tipe_panggung` (
  `id_tipe` int(11) NOT NULL,
  `tipe` varchar(20) NOT NULL,
  `id_penyedia` int(11) NOT NULL,
  `ukuran` varchar(30) DEFAULT NULL,
  `foto` varchar(50) NOT NULL,
  `harga` varchar(20) NOT NULL,
  `dp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tipe_panggung`
--

INSERT INTO `tipe_panggung` (`id_tipe`, `tipe`, `id_penyedia`, `ukuran`, `foto`, `harga`, `dp`) VALUES
(1, 'standar', 1, '7 X 8', 'dewi-kirana-16_resize.jpg', '15,000,000.00', '3,500,000.00'),
(2, 'standar', 2, '8 X 7', 'FB_IMG_1506742799688.jpg', '13,000,000.00', '3,000,000.00'),
(3, 'konser', 1, '12 X 10', '23905328_332850913849043_8477591099365619275_n.jpg', '30,000,000.00', '7,000,000.00'),
(4, 'minimalis', 1, '8 X 5', '330808_2291474223223_1785724115_o.jpg', '7,000,000.00', '1,000,000.00');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_penyedia` int(11) NOT NULL,
  `id_pengguna` int(11) NOT NULL,
  `id_tipe` int(11) NOT NULL,
  `nama_acara` varchar(50) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `alamat` text,
  `deskripsi` text,
  `no_hp` varchar(15) DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  `statustf` int(1) NOT NULL DEFAULT '0',
  `keterangan` varchar(20) DEFAULT NULL,
  `bukti_transfer` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure for view `detail`
--
DROP TABLE IF EXISTS `detail`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `detail`  AS  select `transaksi`.`id_transaksi` AS `id_transaksi`,`pengguna`.`nama` AS `nama`,`penyedia`.`nama_orkes` AS `nama_orkes`,`tipe_panggung`.`tipe` AS `tipe`,`transaksi`.`nama_acara` AS `nama_acara`,`transaksi`.`tanggal` AS `tanggal`,`transaksi`.`alamat` AS `alamat`,`transaksi`.`deskripsi` AS `deskripsi`,`transaksi`.`keterangan` AS `keterangan`,`transaksi`.`bukti_transfer` AS `bukti_transfer` from (((`pengguna` join `penyedia`) join `tipe_panggung`) join `transaksi`) where ((`transaksi`.`id_pengguna` = `pengguna`.`id_pengguna`) and (`transaksi`.`id_penyedia` = `penyedia`.`id_penyedia`)) group by `transaksi`.`id_transaksi` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `atm`
--
ALTER TABLE `atm`
  ADD PRIMARY KEY (`id_atm`),
  ADD KEY `id_penyedia` (`id_penyedia`);

--
-- Indexes for table `galeri`
--
ALTER TABLE `galeri`
  ADD PRIMARY KEY (`id_galeri`),
  ADD KEY `id_penyedia` (`id_penyedia`);

--
-- Indexes for table `jenis_dekorasi`
--
ALTER TABLE `jenis_dekorasi`
  ADD PRIMARY KEY (`id_jenis_dekorasi`),
  ADD KEY `id_tipe` (`id_tipe`);

--
-- Indexes for table `pemusik`
--
ALTER TABLE `pemusik`
  ADD PRIMARY KEY (`id_pemusik`),
  ADD KEY `id_tipe` (`id_tipe`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indexes for table `penyanyi`
--
ALTER TABLE `penyanyi`
  ADD PRIMARY KEY (`id_penyanyi`),
  ADD KEY `id_tipe` (`id_tipe`);

--
-- Indexes for table `penyedia`
--
ALTER TABLE `penyedia`
  ADD PRIMARY KEY (`id_penyedia`),
  ADD KEY `id_pengguna` (`id_pengguna`);

--
-- Indexes for table `tipe_panggung`
--
ALTER TABLE `tipe_panggung`
  ADD PRIMARY KEY (`id_tipe`),
  ADD KEY `id_penyedia` (`id_penyedia`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_pengguna` (`id_pengguna`),
  ADD KEY `id_penyedia` (`id_penyedia`),
  ADD KEY `id_tipe` (`id_tipe`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `atm`
--
ALTER TABLE `atm`
  MODIFY `id_atm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `galeri`
--
ALTER TABLE `galeri`
  MODIFY `id_galeri` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `jenis_dekorasi`
--
ALTER TABLE `jenis_dekorasi`
  MODIFY `id_jenis_dekorasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pemusik`
--
ALTER TABLE `pemusik`
  MODIFY `id_pemusik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `penyanyi`
--
ALTER TABLE `penyanyi`
  MODIFY `id_penyanyi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `penyedia`
--
ALTER TABLE `penyedia`
  MODIFY `id_penyedia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tipe_panggung`
--
ALTER TABLE `tipe_panggung`
  MODIFY `id_tipe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `atm`
--
ALTER TABLE `atm`
  ADD CONSTRAINT `atm_ibfk_1` FOREIGN KEY (`id_penyedia`) REFERENCES `penyedia` (`id_penyedia`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `galeri`
--
ALTER TABLE `galeri`
  ADD CONSTRAINT `galeri_ibfk_1` FOREIGN KEY (`id_penyedia`) REFERENCES `penyedia` (`id_penyedia`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `jenis_dekorasi`
--
ALTER TABLE `jenis_dekorasi`
  ADD CONSTRAINT `jenis_dekorasi_ibfk_1` FOREIGN KEY (`id_tipe`) REFERENCES `tipe_panggung` (`id_tipe`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pemusik`
--
ALTER TABLE `pemusik`
  ADD CONSTRAINT `pemusik_ibfk_1` FOREIGN KEY (`id_tipe`) REFERENCES `tipe_panggung` (`id_tipe`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `penyanyi`
--
ALTER TABLE `penyanyi`
  ADD CONSTRAINT `penyanyi_ibfk_1` FOREIGN KEY (`id_tipe`) REFERENCES `tipe_panggung` (`id_tipe`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `penyedia`
--
ALTER TABLE `penyedia`
  ADD CONSTRAINT `penyedia_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tipe_panggung`
--
ALTER TABLE `tipe_panggung`
  ADD CONSTRAINT `tipe_panggung_ibfk_1` FOREIGN KEY (`id_penyedia`) REFERENCES `penyedia` (`id_penyedia`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`id_penyedia`) REFERENCES `penyedia` (`id_penyedia`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_ibfk_3` FOREIGN KEY (`id_tipe`) REFERENCES `tipe_panggung` (`id_tipe`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
