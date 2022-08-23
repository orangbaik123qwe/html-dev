-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 19, 2022 at 04:03 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_gudang`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang`
--

CREATE TABLE `tb_barang` (
  `barang_id` varchar(32) NOT NULL,
  `barang_kode` varchar(32) DEFAULT NULL,
  `barang_nama` varchar(255) DEFAULT NULL,
  `barang_harga_kulak` int(32) DEFAULT NULL,
  `barang_harga_jual` int(32) DEFAULT NULL,
  `barang_margin` int(32) DEFAULT NULL,
  `barang_stok` int(32) DEFAULT NULL,
  `barang_deskripsi` text DEFAULT NULL,
  `barang_gambar` varchar(255) DEFAULT NULL,
  `barang_supplier_id` varchar(32) DEFAULT NULL,
  `barang_lokasi_id` varchar(32) DEFAULT NULL,
  `barang_created_at` datetime DEFAULT NULL,
  `barang_updated_at` datetime DEFAULT NULL,
  `barang_deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_barang`
--

INSERT INTO `tb_barang` (`barang_id`, `barang_kode`, `barang_nama`, `barang_harga_kulak`, `barang_harga_jual`, `barang_margin`, `barang_stok`, `barang_deskripsi`, `barang_gambar`, `barang_supplier_id`, `barang_lokasi_id`, `barang_created_at`, `barang_updated_at`, `barang_deleted_at`) VALUES
('b366a8e77899997a63082eb481b8ecfc', 'KPRG', 'Karpet Goreng', 4000, 10000, 6000, 5, 'Karpet goreng, digoreng dengan minyak asli', NULL, '8c353f14770ffdef30e2b7dd92dfdeb4', 'cd5d7928dcdb38149c49004f7959491b', '2022-08-18 22:36:48', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_lokasi`
--

CREATE TABLE `tb_lokasi` (
  `lokasi_id` varchar(32) NOT NULL,
  `lokasi_kode` varchar(255) DEFAULT NULL,
  `lokasi_nama` varchar(255) DEFAULT NULL,
  `lokasi_created_at` datetime DEFAULT NULL,
  `lokasi_updated_at` datetime DEFAULT NULL,
  `lokasi_deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_lokasi`
--

INSERT INTO `tb_lokasi` (`lokasi_id`, `lokasi_kode`, `lokasi_nama`, `lokasi_created_at`, `lokasi_updated_at`, `lokasi_deleted_at`) VALUES
('cd5d7928dcdb38149c49004f79594912', 'B-B', 'Blok B', '2022-08-18 22:31:36', NULL, NULL),
('cd5d7928dcdb38149c49004f7959491b', 'B-A', 'Blok A', '2022-08-18 22:31:11', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_stok_keluar`
--

CREATE TABLE `tb_stok_keluar` (
  `stok_keluar_id` varchar(32) NOT NULL,
  `stok_keluar_barang_id` varchar(32) DEFAULT NULL,
  `stok_keluar_jumlah` int(32) DEFAULT NULL,
  `stok_keluar_keterangan` text DEFAULT NULL,
  `stok_keluar_tanggal` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_stok_keluar`
--

INSERT INTO `tb_stok_keluar` (`stok_keluar_id`, `stok_keluar_barang_id`, `stok_keluar_jumlah`, `stok_keluar_keterangan`, `stok_keluar_tanggal`) VALUES
('d260045f70f95ecd379847a6057876e0', 'b366a8e77899997a63082eb481b8ecfc', 1, 'Rusak', '2022-08-18 22:43:11');

-- --------------------------------------------------------

--
-- Table structure for table `tb_stok_masuk`
--

CREATE TABLE `tb_stok_masuk` (
  `stok_masuk_id` varchar(32) NOT NULL,
  `stok_masuk_barang_id` varchar(32) DEFAULT NULL,
  `stok_masuk_jumlah` int(32) DEFAULT NULL,
  `stok_masuk_keterangan` text DEFAULT NULL,
  `stok_masuk_supplier` varchar(255) DEFAULT NULL,
  `stok_masuk_tanggal` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_stok_masuk`
--

INSERT INTO `tb_stok_masuk` (`stok_masuk_id`, `stok_masuk_barang_id`, `stok_masuk_jumlah`, `stok_masuk_keterangan`, `stok_masuk_supplier`, `stok_masuk_tanggal`) VALUES
('a17fc26ba82220f2610a07fdcca02b1b', 'b366a8e77899997a63082eb481b8ecfc', 2, 'masuk bang', '8c353f14770ffdef30e2b7dd92dfdeb4', '2022-08-18 22:42:34');

-- --------------------------------------------------------

--
-- Table structure for table `tb_supplier`
--

CREATE TABLE `tb_supplier` (
  `supplier_id` varchar(32) NOT NULL,
  `supplier_kode` varchar(32) DEFAULT NULL,
  `supplier_nama` varchar(255) DEFAULT NULL,
  `supplier_telepon` varchar(32) DEFAULT NULL,
  `supplier_deskripsi` varchar(255) DEFAULT NULL,
  `supplier_created_at` datetime DEFAULT NULL,
  `supplier_updated_at` datetime DEFAULT NULL,
  `supplier_deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_supplier`
--

INSERT INTO `tb_supplier` (`supplier_id`, `supplier_kode`, `supplier_nama`, `supplier_telepon`, `supplier_deskripsi`, `supplier_created_at`, `supplier_updated_at`, `supplier_deleted_at`) VALUES
('8889811b42eda6c5d8a2dffc4242c140', 'SAP', 'Syuaib', '8912318412', 'Indofood Aktif', '2022-08-18 22:34:03', NULL, NULL),
('8c353f14770ffdef30e2b7dd92dfdeb4', 'BGNG', 'Bagong', '81222333444', 'Wingsfood Aktif', '2022-08-18 22:33:17', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `user_id` varchar(32) NOT NULL,
  `user_username` varchar(255) DEFAULT NULL,
  `user_password` varchar(255) DEFAULT NULL,
  `user_nama` varchar(255) DEFAULT NULL,
  `user_pp` varchar(255) DEFAULT NULL,
  `user_role` varchar(32) DEFAULT NULL,
  `user_created_at` datetime DEFAULT NULL,
  `user_updated_at` datetime DEFAULT NULL,
  `user_deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_barang`
-- (See below for the actual view)
--
CREATE TABLE `v_barang` (
`barang_id` varchar(32)
,`barang_kode` varchar(32)
,`barang_nama` varchar(255)
,`barang_harga_kulak` int(32)
,`barang_harga_jual` int(32)
,`barang_margin` int(32)
,`barang_stok` int(32)
,`barang_deskripsi` text
,`barang_gambar` varchar(255)
,`barang_supplier_id` varchar(32)
,`barang_lokasi_id` varchar(32)
,`barang_created_at` datetime
,`barang_updated_at` datetime
,`barang_deleted_at` datetime
,`supplier_kode` varchar(32)
,`supplier_nama` varchar(255)
,`supplier_telepon` varchar(32)
,`lokasi_kode` varchar(255)
,`lokasi_nama` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_stok_keluar`
-- (See below for the actual view)
--
CREATE TABLE `v_stok_keluar` (
`stok_keluar_id` varchar(32)
,`stok_keluar_barang_id` varchar(32)
,`stok_keluar_jumlah` int(32)
,`stok_keluar_keterangan` text
,`stok_keluar_tanggal` datetime
,`barang_kode` varchar(32)
,`barang_nama` varchar(255)
,`barang_gambar` varchar(255)
,`barang_deskripsi` text
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_stok_masuk`
-- (See below for the actual view)
--
CREATE TABLE `v_stok_masuk` (
`stok_masuk_id` varchar(32)
,`stok_masuk_barang_id` varchar(32)
,`stok_masuk_jumlah` int(32)
,`stok_masuk_keterangan` text
,`stok_masuk_supplier` varchar(255)
,`stok_masuk_tanggal` datetime
,`barang_kode` varchar(32)
,`barang_nama` varchar(255)
,`barang_gambar` varchar(255)
,`barang_deskripsi` text
,`supplier_kode` varchar(32)
,`supplier_nama` varchar(255)
,`supplier_telepon` varchar(32)
);

-- --------------------------------------------------------

--
-- Structure for view `v_barang`
--
DROP TABLE IF EXISTS `v_barang`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_barang`  AS  select `tb_barang`.`barang_id` AS `barang_id`,`tb_barang`.`barang_kode` AS `barang_kode`,`tb_barang`.`barang_nama` AS `barang_nama`,`tb_barang`.`barang_harga_kulak` AS `barang_harga_kulak`,`tb_barang`.`barang_harga_jual` AS `barang_harga_jual`,`tb_barang`.`barang_margin` AS `barang_margin`,`tb_barang`.`barang_stok` AS `barang_stok`,`tb_barang`.`barang_deskripsi` AS `barang_deskripsi`,`tb_barang`.`barang_gambar` AS `barang_gambar`,`tb_barang`.`barang_supplier_id` AS `barang_supplier_id`,`tb_barang`.`barang_lokasi_id` AS `barang_lokasi_id`,`tb_barang`.`barang_created_at` AS `barang_created_at`,`tb_barang`.`barang_updated_at` AS `barang_updated_at`,`tb_barang`.`barang_deleted_at` AS `barang_deleted_at`,`tb_supplier`.`supplier_kode` AS `supplier_kode`,`tb_supplier`.`supplier_nama` AS `supplier_nama`,`tb_supplier`.`supplier_telepon` AS `supplier_telepon`,`tb_lokasi`.`lokasi_kode` AS `lokasi_kode`,`tb_lokasi`.`lokasi_nama` AS `lokasi_nama` from ((`tb_barang` left join `tb_supplier` on(`tb_barang`.`barang_supplier_id` = `tb_supplier`.`supplier_id`)) left join `tb_lokasi` on(`tb_barang`.`barang_lokasi_id` = `tb_lokasi`.`lokasi_id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `v_stok_keluar`
--
DROP TABLE IF EXISTS `v_stok_keluar`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_stok_keluar`  AS  select `tb_stok_keluar`.`stok_keluar_id` AS `stok_keluar_id`,`tb_stok_keluar`.`stok_keluar_barang_id` AS `stok_keluar_barang_id`,`tb_stok_keluar`.`stok_keluar_jumlah` AS `stok_keluar_jumlah`,`tb_stok_keluar`.`stok_keluar_keterangan` AS `stok_keluar_keterangan`,`tb_stok_keluar`.`stok_keluar_tanggal` AS `stok_keluar_tanggal`,`tb_barang`.`barang_kode` AS `barang_kode`,`tb_barang`.`barang_nama` AS `barang_nama`,`tb_barang`.`barang_gambar` AS `barang_gambar`,`tb_barang`.`barang_deskripsi` AS `barang_deskripsi` from (`tb_stok_keluar` left join `tb_barang` on(`tb_stok_keluar`.`stok_keluar_barang_id` = `tb_barang`.`barang_id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `v_stok_masuk`
--
DROP TABLE IF EXISTS `v_stok_masuk`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_stok_masuk`  AS  select `tb_stok_masuk`.`stok_masuk_id` AS `stok_masuk_id`,`tb_stok_masuk`.`stok_masuk_barang_id` AS `stok_masuk_barang_id`,`tb_stok_masuk`.`stok_masuk_jumlah` AS `stok_masuk_jumlah`,`tb_stok_masuk`.`stok_masuk_keterangan` AS `stok_masuk_keterangan`,`tb_stok_masuk`.`stok_masuk_supplier` AS `stok_masuk_supplier`,`tb_stok_masuk`.`stok_masuk_tanggal` AS `stok_masuk_tanggal`,`tb_barang`.`barang_kode` AS `barang_kode`,`tb_barang`.`barang_nama` AS `barang_nama`,`tb_barang`.`barang_gambar` AS `barang_gambar`,`tb_barang`.`barang_deskripsi` AS `barang_deskripsi`,`tb_supplier`.`supplier_kode` AS `supplier_kode`,`tb_supplier`.`supplier_nama` AS `supplier_nama`,`tb_supplier`.`supplier_telepon` AS `supplier_telepon` from ((`tb_stok_masuk` left join `tb_barang` on(`tb_stok_masuk`.`stok_masuk_barang_id` = `tb_barang`.`barang_id`)) left join `tb_supplier` on(`tb_stok_masuk`.`stok_masuk_supplier` = `tb_supplier`.`supplier_id`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`barang_id`);

--
-- Indexes for table `tb_lokasi`
--
ALTER TABLE `tb_lokasi`
  ADD PRIMARY KEY (`lokasi_id`);

--
-- Indexes for table `tb_stok_keluar`
--
ALTER TABLE `tb_stok_keluar`
  ADD PRIMARY KEY (`stok_keluar_id`);

--
-- Indexes for table `tb_stok_masuk`
--
ALTER TABLE `tb_stok_masuk`
  ADD PRIMARY KEY (`stok_masuk_id`);

--
-- Indexes for table `tb_supplier`
--
ALTER TABLE `tb_supplier`
  ADD PRIMARY KEY (`supplier_id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
