/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : 127.0.0.1:3306
Source Database       : diskominfo

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-10-10 18:37:30
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for bidang
-- ----------------------------
DROP TABLE IF EXISTS `bidang`;
CREATE TABLE `bidang` (
  `id_bidang` int(11) NOT NULL AUTO_INCREMENT,
  `nm_bidang` varchar(255) DEFAULT NULL,
  `kuota` int(11) DEFAULT NULL,
  `bulan` varchar(255) DEFAULT NULL,
  `tahun` int(255) DEFAULT NULL,
  PRIMARY KEY (`id_bidang`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of bidang
-- ----------------------------
INSERT INTO `bidang` VALUES ('1', 'asd askjdhiasgdagsdouagsdasd', '2147483647', 'Desember', '24342');
INSERT INTO `bidang` VALUES ('2', 'asd', '3', '2134', '234');

-- ----------------------------
-- Table structure for config
-- ----------------------------
DROP TABLE IF EXISTS `config`;
CREATE TABLE `config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` longtext,
  `description` longtext,
  `icon` longtext,
  `instagram` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `logo` longtext,
  `meta_deskripsi` text NOT NULL,
  `basic` int(11) DEFAULT NULL,
  `meta_keyword` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of config
-- ----------------------------
INSERT INTO `config` VALUES ('1', 'Diskominfo Magang', '', '083849940637', 'Universitas 17 Agustus 1945 Surabaya', 'Diskominfo Magang<br>', 'icon.png', '', '', 'logo2.png', '												\r\n											', '5', '												\r\n											');

-- ----------------------------
-- Table structure for peserta
-- ----------------------------
DROP TABLE IF EXISTS `peserta`;
CREATE TABLE `peserta` (
  `id_peserta` int(11) NOT NULL AUTO_INCREMENT,
  `nm_peserta` varchar(255) DEFAULT NULL,
  `telephone` char(255) DEFAULT NULL,
  `jenjang_pendidikan` varchar(255) DEFAULT NULL,
  `nm_sekolah` varchar(255) DEFAULT NULL,
  `program_studi` varchar(255) DEFAULT NULL,
  `id_bidang` int(11) DEFAULT NULL,
  `awal_magang` date DEFAULT NULL,
  `akhir_magang` date DEFAULT NULL,
  `surat_magang` varchar(255) DEFAULT NULL,
  `proposal_magang` varchar(255) DEFAULT NULL,
  `status` enum('1','0') DEFAULT '0',
  `id_user` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_peserta`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of peserta
-- ----------------------------
INSERT INTO `peserta` VALUES ('1', 'ikko', '031', 'Perguruan Tinggi', 'qwe', 'adasd', '1', '2017-10-11', '2017-09-25', '1507564617Form_Rekrutmen_PT_SEVIMA_.docx', '1507564635seminar_online_arika.docx', '', '3');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `nm_user` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` enum('peserta','admin','kominfo') DEFAULT 'peserta',
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', 'ikko', 'yuhhu', '372afbb1bdca657d06361addc91fa93e1518fb57', 'admin');
INSERT INTO `user` VALUES ('3', 'asd@gmail.com', 'asd@gmail.com', 'ceedf12f8fe3dc63d35b2567a59b93bd62ff729a', 'peserta');
