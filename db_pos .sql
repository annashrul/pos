-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2018 at 06:25 AM
-- Server version: 5.6.25
-- PHP Version: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pos`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `edit_kategori`(IN `kategori_namanya` VARCHAR(255), IN `kategori_idnya` INT(11))
BEGIN
	UPDATE tbl_kategori 
    SET kategori_nama=kategori_namanya, kategori_id=kategori_idnya WHERE kategori_id=kategori_idnya;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `hapus_kategori`(IN `kategori_idnya` INT)
BEGIN
	DELETE FROM tbl_kategori WHERE kategori_id=kategori_idnya;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `tambah_kategori`(IN `kategori_nama` VARCHAR(255))
    NO SQL
BEGIN
	INSERT INTO tbl_kategori (kategori_nama) VALUES (kategori_nama);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `tampil_kategori`()
    NO SQL
BEGIN
	SELECT * FROM tbl_kategori;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Stand-in structure for view `lap_data_penjualan`
--
CREATE TABLE IF NOT EXISTS `lap_data_penjualan` (
`jual_nofak` varchar(15)
,`jual_tanggal` varchar(72)
,`jual_total` double
,`d_jual_barang_id` varchar(15)
,`d_jual_barang_nama` varchar(150)
,`d_jual_barang_satuan` varchar(30)
,`d_jual_barang_harpok` double
,`d_jual_barang_harjul` double
,`d_jual_qty` int(11)
,`d_jual_diskon` double
,`d_jual_total` double
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `lap_total_penjualan`
--
CREATE TABLE IF NOT EXISTS `lap_total_penjualan` (
`jual_nofak` varchar(15)
,`jual_tanggal` varchar(72)
,`jual_total` double
,`d_jual_barang_id` varchar(15)
,`d_jual_barang_nama` varchar(150)
,`d_jual_barang_satuan` varchar(30)
,`d_jual_barang_harpok` double
,`d_jual_barang_harjul` double
,`d_jual_qty` int(11)
,`d_jual_diskon` double
,`total` double
);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_barang`
--

CREATE TABLE IF NOT EXISTS `tbl_barang` (
  `barang_id` varchar(15) NOT NULL,
  `barang_nama` varchar(150) DEFAULT NULL,
  `barang_satuan` varchar(30) DEFAULT NULL,
  `barang_harpok` double DEFAULT NULL,
  `barang_stok` int(11) DEFAULT '0',
  `barang_tgl_input` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `barang_tgl_last_update` datetime DEFAULT NULL,
  `barang_kategori_id` int(11) DEFAULT NULL,
  `barang_user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_barang`
--

INSERT INTO `tbl_barang` (`barang_id`, `barang_nama`, `barang_satuan`, `barang_harpok`, `barang_stok`, `barang_tgl_input`, `barang_tgl_last_update`, `barang_kategori_id`, `barang_user_id`) VALUES
('BR000001', 'Aromanis Simping', 'PCS', 1500, 989, '2018-05-21 04:17:04', NULL, 1, 1),
('BR000002', 'aroma pisang', 'Kotak', 50000, 999, '2018-05-21 04:21:01', NULL, 1, 1);

--
-- Triggers `tbl_barang`
--
DELIMITER $$
CREATE TRIGGER `delete_barang` BEFORE DELETE ON `tbl_barang`
 FOR EACH ROW BEGIN
	INSERT INTO tbl_log_barang VALUES(null, OLD.barang_nama,OLD.barang_user_id, OLD.barang_kategori_id,OLD.barang_harpok,now(),'hapus');
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_barang` AFTER UPDATE ON `tbl_barang`
 FOR EACH ROW BEGIN
	INSERT INTO tbl_log_barang VALUES(null, OLD.barang_nama,OLD.barang_user_id, OLD.barang_kategori_id,OLD.barang_harpok,now(),'ubah');
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_beli`
--

CREATE TABLE IF NOT EXISTS `tbl_beli` (
  `beli_nofak` varchar(15) DEFAULT NULL,
  `beli_tanggal` date DEFAULT NULL,
  `beli_suplier_id` int(11) DEFAULT NULL,
  `beli_user_id` int(11) DEFAULT NULL,
  `beli_kode` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_beli`
--

INSERT INTO `tbl_beli` (`beli_nofak`, `beli_tanggal`, `beli_suplier_id`, `beli_user_id`, `beli_kode`) VALUES
('291116000004', '2018-05-09', 1, 1, 'BL080518000001'),
('200518000001', '2018-05-20', 1, 1, 'BL200518000001'),
('200518000002', '2018-05-20', 1, 1, 'BL200518000002'),
('200518000002', '2018-05-20', 1, 1, 'BL200518000003');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_detail_beli`
--

CREATE TABLE IF NOT EXISTS `tbl_detail_beli` (
  `d_beli_id` int(11) NOT NULL,
  `d_beli_nofak` varchar(15) DEFAULT NULL,
  `d_beli_barang_id` varchar(15) DEFAULT NULL,
  `d_beli_harga` double DEFAULT NULL,
  `d_beli_jumlah` int(11) DEFAULT NULL,
  `d_beli_total` double DEFAULT NULL,
  `d_beli_kode` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_detail_jual`
--

CREATE TABLE IF NOT EXISTS `tbl_detail_jual` (
  `d_jual_id` int(11) NOT NULL,
  `d_jual_nofak` varchar(15) DEFAULT NULL,
  `d_jual_barang_id` varchar(15) DEFAULT NULL,
  `d_jual_barang_nama` varchar(150) DEFAULT NULL,
  `d_jual_barang_satuan` varchar(30) DEFAULT NULL,
  `d_jual_barang_harpok` double DEFAULT NULL,
  `d_jual_barang_harjul` double DEFAULT NULL,
  `d_jual_qty` int(11) DEFAULT NULL,
  `d_jual_diskon` double DEFAULT NULL,
  `d_jual_total` double DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_detail_jual`
--

INSERT INTO `tbl_detail_jual` (`d_jual_id`, `d_jual_nofak`, `d_jual_barang_id`, `d_jual_barang_nama`, `d_jual_barang_satuan`, `d_jual_barang_harpok`, `d_jual_barang_harjul`, `d_jual_qty`, `d_jual_diskon`, `d_jual_total`) VALUES
(1, '210518000001', 'BR000001', 'Aromanis Simping', 'PCS', 1500, 1500, 11, 0, 16500),
(2, '210518000002', 'BR000002', 'aroma pisang', 'Kotak', 50000, 50000, 1, 0, 50000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jual`
--

CREATE TABLE IF NOT EXISTS `tbl_jual` (
  `jual_nofak` varchar(15) NOT NULL,
  `jual_tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `jual_total` double DEFAULT NULL,
  `jual_jml_uang` double DEFAULT NULL,
  `jual_kembalian` double DEFAULT NULL,
  `jual_user_id` int(11) DEFAULT NULL,
  `jual_keterangan` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_jual`
--

INSERT INTO `tbl_jual` (`jual_nofak`, `jual_tanggal`, `jual_total`, `jual_jml_uang`, `jual_kembalian`, `jual_user_id`, `jual_keterangan`) VALUES
('210518000001', '2018-05-21 04:18:45', 16500, 20000, 3500, 1, 'eceran'),
('210518000002', '2018-05-21 04:21:31', 50000, 100000, 50000, 1, 'eceran');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kategori`
--

CREATE TABLE IF NOT EXISTS `tbl_kategori` (
  `kategori_id` int(11) NOT NULL,
  `kategori_nama` varchar(35) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`kategori_id`, `kategori_nama`) VALUES
(1, 'mkakanan');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_log_barang`
--

CREATE TABLE IF NOT EXISTS `tbl_log_barang` (
  `id_tbl_log_barang` int(11) NOT NULL,
  `barang_nama` varchar(255) NOT NULL,
  `barang_user_id` int(11) NOT NULL,
  `barang_kategori_id` int(11) NOT NULL,
  `barang_harpok` double NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `keterangan` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_log_barang`
--

INSERT INTO `tbl_log_barang` (`id_tbl_log_barang`, `barang_nama`, `barang_user_id`, `barang_kategori_id`, `barang_harpok`, `last_update`, `keterangan`) VALUES
(15, 'Magnum Blue', 4, 41, 2000, '2018-05-20 18:00:14', 'ubah'),
(16, 'Magnum Blue', 4, 41, 2000, '2018-05-20 18:02:15', 'hapus'),
(17, 'Sampoerna Mild', 4, 45, 21000, '2018-05-20 18:13:31', 'ubah'),
(18, 'Sampoerna Mild', 4, 45, 21000, '2018-05-20 18:19:59', 'ubah'),
(19, 'Sampoerna Mild', 4, 45, 21000, '2018-05-20 19:01:09', 'ubah'),
(20, 'biskuit aroma', 1, 47, 5000, '2018-05-20 19:12:54', 'ubah'),
(21, 'mallboro mentol', 1, 45, 21000, '2018-05-20 19:43:06', 'ubah'),
(22, 'biskuit aroma', 1, 47, 5000, '2018-05-20 20:02:19', 'ubah'),
(23, 'Sampoerna Mild', 4, 45, 21000, '2018-05-20 20:02:19', 'ubah'),
(27, 'mallboro mentol 1', 1, 45, 21000, '2018-05-20 20:11:45', 'hapus'),
(28, 'mallboro mentol 1', 1, 45, 21000, '2018-05-20 20:13:27', 'hapus'),
(29, 'Sampoerna Mild', 4, 45, 21000, '2018-05-20 22:51:31', 'hapus'),
(30, 'biskuit aroma', 1, 47, 5000, '2018-05-20 22:51:31', 'hapus'),
(31, 'test', 1, 1, 12, '2018-05-21 04:17:14', 'hapus'),
(32, 'Aromanis Simping', 1, 1, 1500, '2018-05-21 04:18:45', 'ubah'),
(33, 'aroma pisang', 1, 1, 50000, '2018-05-21 04:21:32', 'ubah');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_retur`
--

CREATE TABLE IF NOT EXISTS `tbl_retur` (
  `retur_id` int(11) NOT NULL,
  `retur_tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `retur_barang_id` varchar(15) DEFAULT NULL,
  `retur_barang_nama` varchar(150) DEFAULT NULL,
  `retur_barang_satuan` varchar(30) DEFAULT NULL,
  `retur_harjul` double DEFAULT NULL,
  `retur_qty` int(11) DEFAULT NULL,
  `retur_subtotal` double DEFAULT NULL,
  `retur_keterangan` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_suplier`
--

CREATE TABLE IF NOT EXISTS `tbl_suplier` (
  `suplier_id` int(11) NOT NULL,
  `suplier_nama` varchar(35) DEFAULT NULL,
  `suplier_alamat` varchar(60) DEFAULT NULL,
  `suplier_notelp` varchar(20) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_suplier`
--

INSERT INTO `tbl_suplier` (`suplier_id`, `suplier_nama`, `suplier_alamat`, `suplier_notelp`) VALUES
(1, 'acuy', 'padasuka', '085324544191'),
(2, 'Maulana', 'jl cipageran', '0858808');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE IF NOT EXISTS `tbl_user` (
  `user_id` int(11) NOT NULL,
  `user_nama` varchar(35) DEFAULT NULL,
  `user_username` varchar(30) DEFAULT NULL,
  `user_password` varchar(35) DEFAULT NULL,
  `user_level` varchar(2) DEFAULT NULL,
  `user_status` varchar(2) DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_nama`, `user_username`, `user_password`, `user_level`, `user_status`) VALUES
(1, 'annashrul yusuf', 'admin', '21232f297a57a5a743894a0e4a801fc3', '1', '1'),
(3, 'bambang', 'bambang', '25d55ad283aa400af464c76d713c07ad', '2', '1'),
(4, 'test', 'test', '25d55ad283aa400af464c76d713c07ad', '1', '1'),
(6, 'irfan', 'pandif', '25d55ad283aa400af464c76d713c07ad', '2', '1');

-- --------------------------------------------------------

--
-- Structure for view `lap_data_penjualan`
--
DROP TABLE IF EXISTS `lap_data_penjualan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `lap_data_penjualan` AS select `tbl_jual`.`jual_nofak` AS `jual_nofak`,date_format(`tbl_jual`.`jual_tanggal`,'%d %M %Y') AS `jual_tanggal`,`tbl_jual`.`jual_total` AS `jual_total`,`tbl_detail_jual`.`d_jual_barang_id` AS `d_jual_barang_id`,`tbl_detail_jual`.`d_jual_barang_nama` AS `d_jual_barang_nama`,`tbl_detail_jual`.`d_jual_barang_satuan` AS `d_jual_barang_satuan`,`tbl_detail_jual`.`d_jual_barang_harpok` AS `d_jual_barang_harpok`,`tbl_detail_jual`.`d_jual_barang_harjul` AS `d_jual_barang_harjul`,`tbl_detail_jual`.`d_jual_qty` AS `d_jual_qty`,`tbl_detail_jual`.`d_jual_diskon` AS `d_jual_diskon`,`tbl_detail_jual`.`d_jual_total` AS `d_jual_total` from (`tbl_jual` join `tbl_detail_jual` on((`tbl_jual`.`jual_nofak` = `tbl_detail_jual`.`d_jual_nofak`))) order by `tbl_jual`.`jual_nofak` desc;

-- --------------------------------------------------------

--
-- Structure for view `lap_total_penjualan`
--
DROP TABLE IF EXISTS `lap_total_penjualan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `lap_total_penjualan` AS select `tbl_jual`.`jual_nofak` AS `jual_nofak`,date_format(`tbl_jual`.`jual_tanggal`,'%d %M %Y') AS `jual_tanggal`,`tbl_jual`.`jual_total` AS `jual_total`,`tbl_detail_jual`.`d_jual_barang_id` AS `d_jual_barang_id`,`tbl_detail_jual`.`d_jual_barang_nama` AS `d_jual_barang_nama`,`tbl_detail_jual`.`d_jual_barang_satuan` AS `d_jual_barang_satuan`,`tbl_detail_jual`.`d_jual_barang_harpok` AS `d_jual_barang_harpok`,`tbl_detail_jual`.`d_jual_barang_harjul` AS `d_jual_barang_harjul`,`tbl_detail_jual`.`d_jual_qty` AS `d_jual_qty`,`tbl_detail_jual`.`d_jual_diskon` AS `d_jual_diskon`,sum(`tbl_detail_jual`.`d_jual_total`) AS `total` from (`tbl_jual` join `tbl_detail_jual` on((`tbl_jual`.`jual_nofak` = `tbl_detail_jual`.`d_jual_nofak`))) order by `tbl_jual`.`jual_nofak` desc;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_barang`
--
ALTER TABLE `tbl_barang`
  ADD PRIMARY KEY (`barang_id`),
  ADD KEY `barang_user_id` (`barang_user_id`),
  ADD KEY `barang_kategori_id` (`barang_kategori_id`);

--
-- Indexes for table `tbl_beli`
--
ALTER TABLE `tbl_beli`
  ADD PRIMARY KEY (`beli_kode`),
  ADD KEY `beli_user_id` (`beli_user_id`),
  ADD KEY `beli_suplier_id` (`beli_suplier_id`),
  ADD KEY `beli_id` (`beli_kode`);

--
-- Indexes for table `tbl_detail_beli`
--
ALTER TABLE `tbl_detail_beli`
  ADD PRIMARY KEY (`d_beli_id`),
  ADD KEY `d_beli_barang_id` (`d_beli_barang_id`),
  ADD KEY `d_beli_nofak` (`d_beli_nofak`),
  ADD KEY `d_beli_kode` (`d_beli_kode`);

--
-- Indexes for table `tbl_detail_jual`
--
ALTER TABLE `tbl_detail_jual`
  ADD PRIMARY KEY (`d_jual_id`),
  ADD KEY `d_jual_barang_id` (`d_jual_barang_id`),
  ADD KEY `d_jual_nofak` (`d_jual_nofak`);

--
-- Indexes for table `tbl_jual`
--
ALTER TABLE `tbl_jual`
  ADD PRIMARY KEY (`jual_nofak`),
  ADD KEY `jual_user_id` (`jual_user_id`);

--
-- Indexes for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Indexes for table `tbl_log_barang`
--
ALTER TABLE `tbl_log_barang`
  ADD PRIMARY KEY (`id_tbl_log_barang`);

--
-- Indexes for table `tbl_retur`
--
ALTER TABLE `tbl_retur`
  ADD PRIMARY KEY (`retur_id`);

--
-- Indexes for table `tbl_suplier`
--
ALTER TABLE `tbl_suplier`
  ADD PRIMARY KEY (`suplier_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_detail_beli`
--
ALTER TABLE `tbl_detail_beli`
  MODIFY `d_beli_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_detail_jual`
--
ALTER TABLE `tbl_detail_jual`
  MODIFY `d_jual_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  MODIFY `kategori_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_log_barang`
--
ALTER TABLE `tbl_log_barang`
  MODIFY `id_tbl_log_barang` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `tbl_retur`
--
ALTER TABLE `tbl_retur`
  MODIFY `retur_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_suplier`
--
ALTER TABLE `tbl_suplier`
  MODIFY `suplier_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_barang`
--
ALTER TABLE `tbl_barang`
  ADD CONSTRAINT `tbl_barang_ibfk_1` FOREIGN KEY (`barang_user_id`) REFERENCES `tbl_user` (`user_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_barang_ibfk_2` FOREIGN KEY (`barang_kategori_id`) REFERENCES `tbl_kategori` (`kategori_id`) ON UPDATE CASCADE;

--
-- Constraints for table `tbl_beli`
--
ALTER TABLE `tbl_beli`
  ADD CONSTRAINT `tbl_beli_ibfk_1` FOREIGN KEY (`beli_user_id`) REFERENCES `tbl_user` (`user_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_beli_ibfk_2` FOREIGN KEY (`beli_suplier_id`) REFERENCES `tbl_suplier` (`suplier_id`) ON UPDATE CASCADE;

--
-- Constraints for table `tbl_detail_beli`
--
ALTER TABLE `tbl_detail_beli`
  ADD CONSTRAINT `tbl_detail_beli_ibfk_1` FOREIGN KEY (`d_beli_barang_id`) REFERENCES `tbl_barang` (`barang_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_detail_beli_ibfk_2` FOREIGN KEY (`d_beli_kode`) REFERENCES `tbl_beli` (`beli_kode`) ON UPDATE CASCADE;

--
-- Constraints for table `tbl_detail_jual`
--
ALTER TABLE `tbl_detail_jual`
  ADD CONSTRAINT `tbl_detail_jual_ibfk_1` FOREIGN KEY (`d_jual_barang_id`) REFERENCES `tbl_barang` (`barang_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_detail_jual_ibfk_2` FOREIGN KEY (`d_jual_nofak`) REFERENCES `tbl_jual` (`jual_nofak`) ON UPDATE CASCADE;

--
-- Constraints for table `tbl_jual`
--
ALTER TABLE `tbl_jual`
  ADD CONSTRAINT `tbl_jual_ibfk_1` FOREIGN KEY (`jual_user_id`) REFERENCES `tbl_user` (`user_id`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
