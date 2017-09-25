/*
 Navicat Premium Data Transfer

 Source Server         : LocalAppache
 Source Server Type    : MySQL
 Source Server Version : 50505
 Source Host           : localhost
 Source Database       : dbputasik

 Target Server Type    : MySQL
 Target Server Version : 50505
 File Encoding         : utf-8

 Date: 09/25/2017 23:51:09 PM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `m_jenis`
-- ----------------------------
DROP TABLE IF EXISTS `m_jenis`;
CREATE TABLE `m_jenis` (
  `id_jenis` int(11) NOT NULL AUTO_INCREMENT,
  `name_jenis` varchar(50) DEFAULT NULL,
  `creator` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `editor` int(11) DEFAULT NULL,
  `edited` datetime DEFAULT NULL,
  PRIMARY KEY (`id_jenis`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
--  Table structure for `m_status`
-- ----------------------------
DROP TABLE IF EXISTS `m_status`;
CREATE TABLE `m_status` (
  `id_status` int(11) NOT NULL AUTO_INCREMENT,
  `name_status` varchar(255) DEFAULT NULL,
  `creator` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `editor` int(11) DEFAULT NULL,
  `edited` datetime DEFAULT NULL,
  PRIMARY KEY (`id_status`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
--  Table structure for `m_status_barang`
-- ----------------------------
DROP TABLE IF EXISTS `m_status_barang`;
CREATE TABLE `m_status_barang` (
  `id_status_barang` int(11) NOT NULL,
  `name_status_barang` varchar(100) DEFAULT NULL,
  `creator` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `editor` int(11) DEFAULT NULL,
  `edited` datetime DEFAULT NULL,
  PRIMARY KEY (`id_status_barang`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
--  Table structure for `m_type_user`
-- ----------------------------
DROP TABLE IF EXISTS `m_type_user`;
CREATE TABLE `m_type_user` (
  `id_type_user` int(11) NOT NULL AUTO_INCREMENT,
  `name_type` varchar(255) DEFAULT NULL,
  `creator` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `editor` int(11) DEFAULT NULL,
  `edited` datetime DEFAULT NULL,
  PRIMARY KEY (`id_type_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
--  Table structure for `t_city`
-- ----------------------------
DROP TABLE IF EXISTS `t_city`;
CREATE TABLE `t_city` (
  `id_city` int(11) NOT NULL AUTO_INCREMENT,
  `name_city` varchar(50) DEFAULT NULL,
  `created` int(11) DEFAULT NULL,
  `creator` datetime DEFAULT NULL,
  `editor` int(11) DEFAULT NULL,
  `edited` datetime DEFAULT NULL,
  PRIMARY KEY (`id_city`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
--  Table structure for `t_districts`
-- ----------------------------
DROP TABLE IF EXISTS `t_districts`;
CREATE TABLE `t_districts` (
  `id_districts` int(11) NOT NULL AUTO_INCREMENT,
  `name_districts` varchar(50) DEFAULT NULL,
  `id_city` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `creator` int(11) DEFAULT NULL,
  `editor` int(11) DEFAULT NULL,
  `edited` datetime DEFAULT NULL,
  PRIMARY KEY (`id_districts`),
  KEY `id_city` (`id_city`),
  CONSTRAINT `id_city` FOREIGN KEY (`id_city`) REFERENCES `t_city` (`id_city`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
--  Table structure for `t_village`
-- ----------------------------
DROP TABLE IF EXISTS `t_village`;
CREATE TABLE `t_village` (
  `id_village` int(11) NOT NULL AUTO_INCREMENT,
  `name_village` varchar(50) DEFAULT NULL,
  `id_districts` int(255) DEFAULT NULL,
  `creator` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `editor` int(11) DEFAULT NULL,
  `edited` datetime DEFAULT NULL,
  PRIMARY KEY (`id_village`),
  KEY `id_districts` (`id_districts`),
  CONSTRAINT `id_districts` FOREIGN KEY (`id_districts`) REFERENCES `t_districts` (`id_districts`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
--  Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `creator` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `editor` int(11) DEFAULT NULL,
  `edited` datetime DEFAULT NULL,
  `id_type_user` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_user`),
  KEY `id_user` (`id_user`,`id_type_user`),
  KEY `id_user_2` (`id_user`,`id_type_user`),
  KEY `id_type_user` (`id_type_user`),
  CONSTRAINT `id_type_user` FOREIGN KEY (`id_type_user`) REFERENCES `m_type_user` (`id_type_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

SET FOREIGN_KEY_CHECKS = 1;
