-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 27, 2017 at 08:17 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbputasik`
--

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `name_jabatan` varchar(15) DEFAULT NULL,
  `label_color` varchar(50) DEFAULT NULL,
  `status_jabatan` int(11) DEFAULT NULL,
  `creator` varchar(50) DEFAULT NULL,
  `created` date DEFAULT NULL,
  `editor` varchar(50) DEFAULT NULL,
  `edited` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `name_jabatan`, `label_color`, `status_jabatan`, `creator`, `created`, `editor`, `edited`) VALUES
(11, 'Supar Admin', 'label-default', 1, '1', '2017-08-13', '1', '2017-08-20 15:18:52'),
(13, 'Admin', 'label-primary', 1, '1', '2017-08-13', '1', '2017-08-20 15:18:56'),
(14, 'Kapus', 'label-success', 2, '1', '2017-08-17', NULL, '2017-08-20 15:18:59'),
(15, 'Eselon', 'label-info', 2, '1', '2017-08-17', NULL, '2017-08-20 15:19:01'),
(17, 'User', NULL, 2, '1', '2017-09-01', NULL, NULL),
(18, 'Internal', NULL, 2, '1', '2017-09-03', NULL, NULL),
(19, 'sadasdasd', NULL, 2, NULL, '2017-09-27', NULL, NULL),
(20, 'ADMIN', NULL, 2, NULL, '2017-09-27', NULL, NULL),
(21, 'test', NULL, 2, NULL, '2017-09-27', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `menu_admin`
--

CREATE TABLE `menu_admin` (
  `id_menu` int(10) NOT NULL,
  `level_menu` smallint(6) NOT NULL,
  `parent_menu` int(10) NOT NULL,
  `posisition_menu` tinyint(4) NOT NULL,
  `url_menu` varchar(100) NOT NULL,
  `name_menu` varchar(100) NOT NULL,
  `icon_menu` varchar(50) DEFAULT NULL,
  `created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `creator` varchar(100) DEFAULT NULL,
  `edited` timestamp NULL DEFAULT NULL,
  `editor` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu_admin`
--

INSERT INTO `menu_admin` (`id_menu`, `level_menu`, `parent_menu`, `posisition_menu`, `url_menu`, `name_menu`, `icon_menu`, `created`, `creator`, `edited`, `editor`) VALUES
(206, 0, 205, 1, 'admin/config/menu', 'Menu', NULL, '2017-04-01 16:55:42', 'Admin DB', '2017-04-01 16:55:53', NULL),
(207, 0, 205, 1, 'admin/config/role', 'Role', NULL, '2017-04-01 16:56:34', 'Admin DB', '2017-04-01 16:56:42', NULL),
(208, 0, 205, 1, 'admin/config/group', 'Group', NULL, '2017-04-01 16:57:41', 'Admin DB', '2017-04-01 16:57:49', NULL),
(215, 0, 0, 0, 'admin/menu', 'Menu', NULL, '2017-04-08 15:26:17', NULL, NULL, NULL),
(218, 0, 0, 0, 'admin/user', 'User', NULL, '2017-04-08 15:30:43', NULL, NULL, NULL),
(219, 0, 218, 0, 'admin/user', 'User', NULL, '2017-04-08 15:31:10', NULL, NULL, NULL),
(220, 0, 218, 0, 'admin/user_level', 'User Group', NULL, '2017-04-08 15:32:49', NULL, NULL, NULL),
(243, 0, 0, 0, 'admin/anggota', 'Generate Token Anggota', 'fingerprint', '2017-04-15 03:44:59', NULL, NULL, NULL),
(265, 0, 0, 0, 'admin/ruangan', 'Ruangan', 'room', '2017-08-09 13:57:40', NULL, NULL, NULL),
(266, 0, 0, 0, '/admin/barang', 'Barang', 'card_travel', '2017-09-27 14:55:06', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `menu_group`
--

CREATE TABLE `menu_group` (
  `user_grp` int(11) NOT NULL,
  `group_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu_group`
--

INSERT INTO `menu_group` (`user_grp`, `group_name`) VALUES
(1, 'ADMINISTRATOR'),
(5, 'Anggota'),
(7, 'Poster'),
(8, 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `menu_role`
--

CREATE TABLE `menu_role` (
  `kd_role` int(11) NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu_role`
--

INSERT INTO `menu_role` (`kd_role`, `id_jabatan`, `id_menu`) VALUES
(3575, 7, 201),
(3576, 7, 214),
(3578, 7, 215),
(3579, 7, 214),
(3580, 7, 216),
(3581, 7, 215),
(3583, 7, 216),
(3584, 7, 222),
(3586, 7, 223),
(3587, 7, 222),
(3589, 7, 223),
(3600, 7, 217),
(3602, 7, 230),
(3603, 7, 217),
(3604, 7, 231),
(3605, 7, 230),
(3606, 7, 232),
(3607, 7, 231),
(3608, 7, 233),
(3609, 7, 232),
(3610, 7, 234),
(3611, 7, 233),
(3612, 7, 235),
(3613, 7, 234),
(3614, 7, 236),
(3615, 7, 235),
(3616, 7, 236),
(3629, 8, 201),
(3631, 8, 243),
(3632, 8, 246),
(3633, 8, 248),
(3639, 8, 257),
(3640, 8, 258),
(3738, 5, 201),
(3739, 5, 202),
(3746, 5, 243),
(3747, 5, 246),
(3748, 5, 262),
(3967, 1, 205),
(3968, 1, 205),
(3969, 1, 206),
(3970, 1, 206),
(3971, 1, 207),
(3972, 1, 207),
(3973, 1, 208),
(3974, 1, 208),
(3975, 1, 215),
(3976, 1, 215),
(3977, 1, 218),
(3978, 1, 218),
(3979, 1, 219),
(3980, 1, 219),
(3981, 1, 220),
(3982, 1, 220),
(3983, 1, 243),
(3984, 1, 243),
(3985, 1, 265),
(3986, 1, 265),
(3987, 11, 215),
(3988, 11, 218),
(3989, 11, 219),
(3990, 11, 220),
(3991, 11, 243),
(3992, 11, 265),
(3993, 11, 266);

-- --------------------------------------------------------

--
-- Table structure for table `m_jenis`
--

CREATE TABLE `m_jenis` (
  `id_jenis` int(11) NOT NULL,
  `name_jenis` varchar(50) DEFAULT NULL,
  `creator` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `editor` int(11) DEFAULT NULL,
  `edited` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_jenis`
--

INSERT INTO `m_jenis` (`id_jenis`, `name_jenis`, `creator`, `created`, `editor`, `edited`) VALUES
(6, 'Kipas', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `m_status`
--

CREATE TABLE `m_status` (
  `id_status` int(11) NOT NULL,
  `name_status` varchar(255) DEFAULT NULL,
  `creator` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `editor` int(11) DEFAULT NULL,
  `edited` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_status`
--

INSERT INTO `m_status` (`id_status`, `name_status`, `creator`, `created`, `editor`, `edited`) VALUES
(1, 'Accept Hallo', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `m_status_barang`
--

CREATE TABLE `m_status_barang` (
  `id_status_barang` int(11) NOT NULL,
  `name_status_barang` varchar(100) DEFAULT NULL,
  `creator` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `editor` int(11) DEFAULT NULL,
  `edited` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_status_barang`
--

INSERT INTO `m_status_barang` (`id_status_barang`, `name_status_barang`, `creator`, `created`, `editor`, `edited`) VALUES
(1, 'Kipas', NULL, NULL, NULL, NULL),
(2, 'Tenda', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `m_type_user`
--

CREATE TABLE `m_type_user` (
  `id_type_user` int(11) NOT NULL,
  `name_type` varchar(255) DEFAULT NULL,
  `creator` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `editor` int(11) DEFAULT NULL,
  `edited` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_type_user`
--

INSERT INTO `m_type_user` (`id_type_user`, `name_type`, `creator`, `created`, `editor`, `edited`) VALUES
(1, 'iqbal siddik', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `t_city`
--

CREATE TABLE `t_city` (
  `id_city` int(11) NOT NULL,
  `name_city` varchar(50) DEFAULT NULL,
  `created` int(11) DEFAULT NULL,
  `creator` datetime DEFAULT NULL,
  `editor` int(11) DEFAULT NULL,
  `edited` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_city`
--

INSERT INTO `t_city` (`id_city`, `name_city`, `created`, `creator`, `editor`, `edited`) VALUES
(4, 'Sumedang', NULL, NULL, NULL, NULL),
(5, 'Garut', NULL, NULL, NULL, NULL),
(6, 'Bandung', NULL, NULL, NULL, NULL),
(7, 'Jakarta', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `t_districts`
--

CREATE TABLE `t_districts` (
  `id_districts` int(11) NOT NULL,
  `name_districts` varchar(50) DEFAULT NULL,
  `id_city` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `creator` int(11) DEFAULT NULL,
  `editor` int(11) DEFAULT NULL,
  `edited` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_districts`
--

INSERT INTO `t_districts` (`id_districts`, `name_districts`, `id_city`, `created`, `creator`, `editor`, `edited`) VALUES
(2, 'Sukajadi', 6, NULL, NULL, NULL, NULL),
(3, 'Jati Waringin', 4, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `t_village`
--

CREATE TABLE `t_village` (
  `id_village` int(11) NOT NULL,
  `name_village` varchar(50) DEFAULT NULL,
  `id_districts` int(255) DEFAULT NULL,
  `creator` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `editor` int(11) DEFAULT NULL,
  `edited` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_village`
--

INSERT INTO `t_village` (`id_village`, `name_village`, `id_districts`, `creator`, `created`, `editor`, `edited`) VALUES
(3, 'Panorama', 2, NULL, NULL, NULL, NULL),
(4, 'Panorama', 3, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `creator` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `editor` int(11) DEFAULT NULL,
  `edited` datetime DEFAULT NULL,
  `id_type_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `email`, `password`, `creator`, `created`, `editor`, `edited`, `id_type_user`) VALUES
(1, 'iqballsiddik@gmail.com', 'e69dc2c09e8da6259422d987ccbe95b5', NULL, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `menu_admin`
--
ALTER TABLE `menu_admin`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `menu_group`
--
ALTER TABLE `menu_group`
  ADD PRIMARY KEY (`user_grp`);

--
-- Indexes for table `menu_role`
--
ALTER TABLE `menu_role`
  ADD PRIMARY KEY (`kd_role`),
  ADD KEY `id_group` (`id_jabatan`),
  ADD KEY `user_grp` (`id_jabatan`),
  ADD KEY `id_menu` (`id_menu`),
  ADD KEY `id_menu_2` (`id_menu`);

--
-- Indexes for table `m_jenis`
--
ALTER TABLE `m_jenis`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `m_status`
--
ALTER TABLE `m_status`
  ADD PRIMARY KEY (`id_status`);

--
-- Indexes for table `m_status_barang`
--
ALTER TABLE `m_status_barang`
  ADD PRIMARY KEY (`id_status_barang`);

--
-- Indexes for table `m_type_user`
--
ALTER TABLE `m_type_user`
  ADD PRIMARY KEY (`id_type_user`);

--
-- Indexes for table `t_city`
--
ALTER TABLE `t_city`
  ADD PRIMARY KEY (`id_city`);

--
-- Indexes for table `t_districts`
--
ALTER TABLE `t_districts`
  ADD PRIMARY KEY (`id_districts`),
  ADD KEY `id_city` (`id_city`);

--
-- Indexes for table `t_village`
--
ALTER TABLE `t_village`
  ADD PRIMARY KEY (`id_village`),
  ADD KEY `id_districts` (`id_districts`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_user` (`id_user`,`id_type_user`),
  ADD KEY `id_user_2` (`id_user`,`id_type_user`),
  ADD KEY `id_type_user` (`id_type_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `menu_admin`
--
ALTER TABLE `menu_admin`
  MODIFY `id_menu` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=267;
--
-- AUTO_INCREMENT for table `menu_group`
--
ALTER TABLE `menu_group`
  MODIFY `user_grp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `menu_role`
--
ALTER TABLE `menu_role`
  MODIFY `kd_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3994;
--
-- AUTO_INCREMENT for table `m_jenis`
--
ALTER TABLE `m_jenis`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `m_status`
--
ALTER TABLE `m_status`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `m_status_barang`
--
ALTER TABLE `m_status_barang`
  MODIFY `id_status_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `m_type_user`
--
ALTER TABLE `m_type_user`
  MODIFY `id_type_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `t_city`
--
ALTER TABLE `t_city`
  MODIFY `id_city` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `t_districts`
--
ALTER TABLE `t_districts`
  MODIFY `id_districts` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `t_village`
--
ALTER TABLE `t_village`
  MODIFY `id_village` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `t_districts`
--
ALTER TABLE `t_districts`
  ADD CONSTRAINT `id_city` FOREIGN KEY (`id_city`) REFERENCES `t_city` (`id_city`);

--
-- Constraints for table `t_village`
--
ALTER TABLE `t_village`
  ADD CONSTRAINT `id_districts` FOREIGN KEY (`id_districts`) REFERENCES `t_districts` (`id_districts`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `id_type_user` FOREIGN KEY (`id_type_user`) REFERENCES `m_type_user` (`id_type_user`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
