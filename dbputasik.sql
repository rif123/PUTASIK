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

 Date: 09/24/2017 21:28:40 PM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `t_city`
-- ----------------------------
DROP TABLE IF EXISTS `t_city`;
CREATE TABLE `t_city` (
  `id_kota` int(11) NOT NULL AUTO_INCREMENT,
  `Name_city` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_kota`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
--  Table structure for `t_districts`
-- ----------------------------
DROP TABLE IF EXISTS `t_districts`;
CREATE TABLE `t_districts` (
  `id_districts` int(11) NOT NULL AUTO_INCREMENT,
  `name_districts` varchar(50) DEFAULT NULL,
  `id_kota` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_districts`),
  KEY `id_kota` (`id_kota`),
  CONSTRAINT `id_kota` FOREIGN KEY (`id_kota`) REFERENCES `t_city` (`id_kota`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
--  Table structure for `t_village`
-- ----------------------------
DROP TABLE IF EXISTS `t_village`;
CREATE TABLE `t_village` (
  `id_village` int(11) NOT NULL AUTO_INCREMENT,
  `name_village` varchar(50) DEFAULT NULL,
  `id_districts` int(255) DEFAULT NULL,
  PRIMARY KEY (`id_village`),
  KEY `id_districts` (`id_districts`),
  CONSTRAINT `id_districts` FOREIGN KEY (`id_districts`) REFERENCES `t_districts` (`id_districts`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


SET FOREIGN_KEY_CHECKS = 1;
