-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 13, 2021 at 04:02 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_codeignaiter`
--

-- --------------------------------------------------------

--
-- Table structure for table `tabel_anggota`
--

CREATE TABLE `tabel_anggota` (
  `id_anggota` varchar(20) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `jenis_kel` text DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telepon` varchar(15) DEFAULT NULL,
  `alamat` varchar(150) DEFAULT NULL,
  `status` varchar(120) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_anggota`
--

INSERT INTO `tabel_anggota` (`id_anggota`, `nama`, `jenis_kel`, `email`, `telepon`, `alamat`, `status`) VALUES
('AGT0001', 'farhan sabila', 'Laki-Laki', 'farhan40@gmail.com', '081225322', 'kp lewisadeng Desa Lewisadeng Kec Lewisadeng Kab Bogor', 'Peminjam'),
('AGT001', 'Asep sunandar', 'Laki-Laki', 'Helmitazkia85@gmail.com', '085781046500', 'kp.Cirangkong Desa Cirangkong kec lewiliang', 'Kembali'),
('AGT002', 'Fahri', 'Laki-Laki', 'hardi85@gmail.com', ' 09727282112 23', 'kp.lewisadeng Desa Lewisadeng Kec Lewisadeng Kab Bogor', 'Peminjam');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_buku`
--

CREATE TABLE `tabel_buku` (
  `kode_buku` varchar(10) NOT NULL,
  `judul_buku` text DEFAULT NULL,
  `pengarang_buku` varchar(100) DEFAULT NULL,
  `penerbit_buku` varchar(90) DEFAULT NULL,
  `tahun_buku` varchar(15) DEFAULT NULL,
  `jumlah_buku` int(5) DEFAULT NULL,
  `image` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tabel_buku`
--

INSERT INTO `tabel_buku` (`kode_buku`, `judul_buku`, `pengarang_buku`, `penerbit_buku`, `tahun_buku`, `jumlah_buku`, `image`) VALUES
('BK0001', 'Warles', 'Dr.Adang Sunandar', 'Dr.Tirta Ayu', '2018', 1, 'bk3.jpg'),
('BK0002', 'Belajar php Fremwork', 'Dr.Adang Sunandar', 'Dr.Tirta Ayu', '2013', 7, 'bk6.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_pinjam`
--

CREATE TABLE `tabel_pinjam` (
  `kode_pinjam` varchar(90) NOT NULL,
  `tanggal_minjam` varchar(90) NOT NULL,
  `tanggal_kembali` varchar(90) NOT NULL,
  `total_pinjam` int(90) NOT NULL,
  `kode_anggota` varchar(90) NOT NULL,
  `kode_buku` varchar(80) NOT NULL,
  `status` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tabel_pinjam`
--

INSERT INTO `tabel_pinjam` (`kode_pinjam`, `tanggal_minjam`, `tanggal_kembali`, `total_pinjam`, `kode_anggota`, `kode_buku`, `status`) VALUES
('TR2109110001', '2021-09-11', '2021-09-18', 2, 'AGT001', 'BK0001', 'Pinjam'),
('TR2109110002', '2021-09-11', '2021-09-18', 2, 'AGT001', 'BK0001', 'Pinjam'),
('TR2109110003', '2021-09-11', '2021-09-18', 2, 'AGT002', 'BK0001', 'pinjam');

--
-- Triggers `tabel_pinjam`
--
DELIMITER $$
CREATE TRIGGER `ngurangi_stok` AFTER DELETE ON `tabel_pinjam` FOR EACH ROW BEGIN
UPDATE tabel_buku set jumlah_buku = jumlah_buku + old.total_pinjam
WHERE kode_buku = old.kode_buku;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `pengurangan_stok` AFTER INSERT ON `tabel_pinjam` FOR EACH ROW BEGIN
update tabel_buku Set jumlah_buku = jumlah_buku - new.total_pinjam
WHERE kode_buku = new.kode_buku;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tabel_user`
--

CREATE TABLE `tabel_user` (
  `id` int(2) NOT NULL,
  `name` varchar(128) DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL,
  `password` varchar(128) DEFAULT NULL,
  `image` varchar(128) DEFAULT NULL,
  `role_id` int(20) DEFAULT NULL,
  `is_active` int(2) DEFAULT NULL,
  `date_create` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_user`
--

INSERT INTO `tabel_user` (`id`, `name`, `email`, `password`, `image`, `role_id`, `is_active`, `date_create`) VALUES
(19, 'Helmi Tazkia', 'Helmitazkia85@gmail.com', '$2y$10$2EmmzW9bRk3HwRgKnuReludvVTiea3yVkFJX8Gyt9IVkddTnT5rmS', 'helmi1.jpg', 2, 1, '1616732137'),
(21, 'Asep Sunandar', 'Asep89@gmail.com', '123', 'DSC_0096.JPG', 3, 1, '1617886072'),
(22, 'Hari', 'hari45@gmail.com', '$2y$10$XyfLCQgdI7VryEgZKD5Ns.5s2aKqB96gFmx5R2VFxlO4B5C2xxQOS', 'default.Jpg', 2, 1, '1618294345'),
(23, 'farhan adima', 'farhan80@gmail.com', '$2y$10$2EmmzW9bRk3HwRgKnuReludvVTiea3yVkFJX8Gyt9IVkddTnT5rmS', 'IMG_20190921_073113_317.jpg', 1, 1, '1618375818'),
(24, 'Fauzi Ramdani', 'Fauzi47@gmail.com', '$2y$10$ajJtQs93Uwud2Nmd6FALeOGQtHZPhzBLigK6vJbs2jPtPbB/Zq3H2', 'default.Jpg', 2, 1, '1620001850'),
(25, 'Nijar', 'nijarmaulana45@gmail.com', '$2y$10$ZaRAwOslEuZLQn6XaGI7Iub1Gllo4vsaLhIQqIBU64rBWMnrB9DLm', 'default.Jpg', 2, 1, '1620132788'),
(26, 'riri', 'riri45@gmail.com', '$2y$10$BlCNuPw410bRSCUfyNCDjOzyHhSnvGY66K8k2eBgEZ/MTMGDZOeSi', 'default.Jpg', 3, 1, '1620133833'),
(27, 'ardi', 'ardi67@gmail.com', '$2y$10$GFazqW69.DPhlQqXNHdH..pW3W/NznjaLpylmhl5KKqNOXsIEqlku', 'default.Jpg', 2, 1, '1620193027');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_user_role`
--

CREATE TABLE `tabel_user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_user_role`
--

INSERT INTO `tabel_user_role` (`id`, `role`) VALUES
(1, 'Administator'),
(2, 'User'),
(3, 'Kepala');

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(1) DEFAULT NULL,
  `menu_id` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 2),
(4, 1, 3),
(5, 3, 2),
(6, 3, 4),
(8, 2, 5);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'ADMIN'),
(2, 'USER'),
(3, 'MENU'),
(4, 'DATA'),
(5, 'ANGGOTA'),
(10, 'USER ROLE');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) DEFAULT NULL,
  `title` varchar(128) DEFAULT NULL,
  `url` varchar(150) NOT NULL,
  `icon` varchar(50) NOT NULL,
  `is_active` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin/Halamanadmin', 'fa fa-folder', 1),
(2, 2, 'My Profile', 'user', 'fa fa-user-circle', 1),
(3, 2, 'Edit Profile', 'user/edit', 'fa fa-edit', 1),
(4, 3, 'Menu Management', 'Menu', 'fa fa-folder', 1),
(5, 3, 'Sub Menu Management', 'Menu/submenu', 'fa fa-folder-open', 1),
(6, 1, 'Data Buku', 'Data/buku', 'fa fa-book', 1),
(7, 1, 'Pinjaman Buku', 'Data/pinjam', 'fa fa-paste', 1),
(8, 1, 'Data Anggota', 'Data/anggota', 'fa fa-users', 1),
(11, 4, 'Data Buku', 'Data/report', 'fa fa-book', 1),
(12, 4, 'Data Pinjaman', 'Data/pinjaman', 'fa fa-paste', 1),
(14, 5, 'Pinjaman Anggota', 'Data/pinjamanuser', 'fa fa-paste', 1),
(15, 5, 'Buku Anggota', 'Data/report', 'fa fa-book', 1),
(16, 2, 'Cange Password', 'user/cangedpassword', 'fa fa-key', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabel_anggota`
--
ALTER TABLE `tabel_anggota`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indexes for table `tabel_buku`
--
ALTER TABLE `tabel_buku`
  ADD PRIMARY KEY (`kode_buku`);

--
-- Indexes for table `tabel_pinjam`
--
ALTER TABLE `tabel_pinjam`
  ADD PRIMARY KEY (`kode_pinjam`);

--
-- Indexes for table `tabel_user`
--
ALTER TABLE `tabel_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tabel_user_role`
--
ALTER TABLE `tabel_user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tabel_user`
--
ALTER TABLE `tabel_user`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tabel_user_role`
--
ALTER TABLE `tabel_user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
