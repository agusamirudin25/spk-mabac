/*
 Navicat Premium Data Transfer

 Source Server         : kominfo
 Source Server Type    : MySQL
 Source Server Version : 100406
 Source Host           : localhost:3306
 Source Schema         : mabac

 Target Server Type    : MySQL
 Target Server Version : 100406
 File Encoding         : 65001

 Date: 07/06/2021 09:09:27
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for karyawan
-- ----------------------------
DROP TABLE IF EXISTS `karyawan`;
CREATE TABLE `karyawan`  (
  `kode` varchar(4) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nik` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `alias` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `pendidikan` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `jabatan` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tgl_masuk` date NOT NULL,
  `status` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`kode`) USING BTREE,
  INDEX `kode`(`kode`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of karyawan
-- ----------------------------
INSERT INTO `karyawan` VALUES ('A01', '12345654321', 'Abdul Aziz', 'AA', 'S1', 'Admin', '2021-05-01', '1');
INSERT INTO `karyawan` VALUES ('A02', '1234567890', 'Ahmad Aqbari', 'AAQ', 'SMA', 'Operator', '2021-05-19', '1');
INSERT INTO `karyawan` VALUES ('A03', '123456', 'Amanda Cecillia', 'AC', 'SMA', 'Operator', '2021-05-19', '1');
INSERT INTO `karyawan` VALUES ('A04', '123456', 'Bella Anastasia', 'BA', 'SMA', 'Operator', '2021-05-19', '1');
INSERT INTO `karyawan` VALUES ('A05', '123456', 'Burhan Salim', 'BS', 'SMA', 'Operator', '2021-05-19', '1');
INSERT INTO `karyawan` VALUES ('A06', '123456', 'Candra Wijaya', 'CW', 'SMA', 'Operator', '2021-05-19', '1');
INSERT INTO `karyawan` VALUES ('A07', '123456', 'Galang Bangkit R', 'GBR', 'SMA', 'Operator', '2021-05-19', '1');
INSERT INTO `karyawan` VALUES ('A08', '123456', 'Gani Fernanda', 'GF', 'SMA', 'Operator', '2021-05-19', '1');
INSERT INTO `karyawan` VALUES ('A09', '123456', 'Hasan Fendi', 'HF', 'SMA', 'Operator', '2021-05-19', '1');
INSERT INTO `karyawan` VALUES ('A10', '123456', 'Rusydan', 'R', 'SMA', 'Operator', '2021-05-19', '1');
INSERT INTO `karyawan` VALUES ('A11', '123456', 'Suharyanto', 'S', 'SMA', 'Operator', '2021-05-19', '1');
INSERT INTO `karyawan` VALUES ('A12', '123456', 'Teguh Ramadhan', 'TR', 'SMA', 'Operator', '2021-05-19', '1');

-- ----------------------------
-- Table structure for keputusan
-- ----------------------------
DROP TABLE IF EXISTS `keputusan`;
CREATE TABLE `keputusan`  (
  `kode` varchar(4) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `c01` int(3) NOT NULL,
  `c02` int(3) NOT NULL,
  `c03` int(3) NOT NULL,
  `c04` int(3) NOT NULL,
  `c05` int(3) NOT NULL,
  `status` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`kode`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of keputusan
-- ----------------------------
INSERT INTO `keputusan` VALUES ('A01', 'Zuhdiana Mahmudiyah', 5, 3, 4, 5, 5, '');
INSERT INTO `keputusan` VALUES ('A02', 'Bambang Pamungkas', 4, 3, 4, 3, 5, '');
INSERT INTO `keputusan` VALUES ('A03', 'coba', 100, 2, 3, 2, 1, '');

-- ----------------------------
-- Table structure for kriteria
-- ----------------------------
DROP TABLE IF EXISTS `kriteria`;
CREATE TABLE `kriteria`  (
  `kode` varchar(4) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tipe` varchar(7) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `bobot` int(1) NOT NULL,
  PRIMARY KEY (`kode`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of kriteria
-- ----------------------------
INSERT INTO `kriteria` VALUES ('C1', 'Absensi', 'benefit', 5);
INSERT INTO `kriteria` VALUES ('C2', 'Disiplin Kerja', 'benefit', 5);
INSERT INTO `kriteria` VALUES ('C3', 'Lama Bekerja', 'benefit', 4);
INSERT INTO `kriteria` VALUES ('C4', 'Kreatifitas', 'benefit', 5);
INSERT INTO `kriteria` VALUES ('C5', 'Pendidikan', 'benefit', 4);

-- ----------------------------
-- Table structure for kuesioner
-- ----------------------------
DROP TABLE IF EXISTS `kuesioner`;
CREATE TABLE `kuesioner`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_alternatif` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `kode_pertanyaan` varchar(4) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nilai` int(1) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 37 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of kuesioner
-- ----------------------------
INSERT INTO `kuesioner` VALUES (1, 'A01', 'P01', 5);
INSERT INTO `kuesioner` VALUES (2, 'A01', 'P02', 5);
INSERT INTO `kuesioner` VALUES (3, 'A01', 'P03', 5);
INSERT INTO `kuesioner` VALUES (4, 'A02', 'P01', 5);
INSERT INTO `kuesioner` VALUES (5, 'A02', 'P02', 5);
INSERT INTO `kuesioner` VALUES (6, 'A02', 'P03', 5);
INSERT INTO `kuesioner` VALUES (7, 'A03', 'P01', 5);
INSERT INTO `kuesioner` VALUES (8, 'A03', 'P02', 5);
INSERT INTO `kuesioner` VALUES (9, 'A03', 'P03', 5);
INSERT INTO `kuesioner` VALUES (10, 'A04', 'P01', 5);
INSERT INTO `kuesioner` VALUES (11, 'A04', 'P02', 5);
INSERT INTO `kuesioner` VALUES (12, 'A04', 'P03', 5);
INSERT INTO `kuesioner` VALUES (13, 'A05', 'P01', 5);
INSERT INTO `kuesioner` VALUES (14, 'A05', 'P02', 5);
INSERT INTO `kuesioner` VALUES (15, 'A05', 'P03', 5);
INSERT INTO `kuesioner` VALUES (16, 'A06', 'P01', 5);
INSERT INTO `kuesioner` VALUES (17, 'A06', 'P02', 5);
INSERT INTO `kuesioner` VALUES (18, 'A06', 'P03', 5);
INSERT INTO `kuesioner` VALUES (19, 'A07', 'P01', 5);
INSERT INTO `kuesioner` VALUES (20, 'A07', 'P02', 5);
INSERT INTO `kuesioner` VALUES (21, 'A07', 'P03', 5);
INSERT INTO `kuesioner` VALUES (22, 'A08', 'P01', 5);
INSERT INTO `kuesioner` VALUES (23, 'A08', 'P02', 5);
INSERT INTO `kuesioner` VALUES (24, 'A08', 'P03', 5);
INSERT INTO `kuesioner` VALUES (25, 'A09', 'P01', 5);
INSERT INTO `kuesioner` VALUES (26, 'A09', 'P02', 5);
INSERT INTO `kuesioner` VALUES (27, 'A09', 'P03', 5);
INSERT INTO `kuesioner` VALUES (28, 'A10', 'P01', 5);
INSERT INTO `kuesioner` VALUES (29, 'A10', 'P02', 5);
INSERT INTO `kuesioner` VALUES (30, 'A10', 'P03', 5);
INSERT INTO `kuesioner` VALUES (31, 'A11', 'P01', 5);
INSERT INTO `kuesioner` VALUES (32, 'A11', 'P02', 5);
INSERT INTO `kuesioner` VALUES (33, 'A11', 'P03', 5);
INSERT INTO `kuesioner` VALUES (34, 'A12', 'P01', 5);
INSERT INTO `kuesioner` VALUES (35, 'A12', 'P02', 5);
INSERT INTO `kuesioner` VALUES (36, 'A12', 'P03', 5);

-- ----------------------------
-- Table structure for opsi
-- ----------------------------
DROP TABLE IF EXISTS `opsi`;
CREATE TABLE `opsi`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `opsi` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nilai` int(1) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of opsi
-- ----------------------------
INSERT INTO `opsi` VALUES (1, 'Sangat Tidak Baik', 1);
INSERT INTO `opsi` VALUES (2, 'Tidak Baik', 2);
INSERT INTO `opsi` VALUES (3, 'Cukup Baik', 3);
INSERT INTO `opsi` VALUES (4, 'Baik', 4);
INSERT INTO `opsi` VALUES (5, 'Sangat Baik', 5);

-- ----------------------------
-- Table structure for penilaian
-- ----------------------------
DROP TABLE IF EXISTS `penilaian`;
CREATE TABLE `penilaian`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kd_alternatif` varchar(3) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `kd_kriteria` varchar(3) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nilai` float NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `fk_ktr`(`kd_kriteria`) USING BTREE,
  INDEX `fk_alt`(`kd_alternatif`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 61 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of penilaian
-- ----------------------------
INSERT INTO `penilaian` VALUES (1, 'A01', 'C2', 4.8, 1);
INSERT INTO `penilaian` VALUES (2, 'A02', 'C2', 5, 1);
INSERT INTO `penilaian` VALUES (3, 'A03', 'C2', 4.8, 1);
INSERT INTO `penilaian` VALUES (4, 'A04', 'C2', 4.6, 1);
INSERT INTO `penilaian` VALUES (5, 'A05', 'C2', 4.7, 1);
INSERT INTO `penilaian` VALUES (6, 'A06', 'C2', 4.8, 1);
INSERT INTO `penilaian` VALUES (7, 'A07', 'C2', 4.7, 1);
INSERT INTO `penilaian` VALUES (8, 'A08', 'C2', 4.8, 1);
INSERT INTO `penilaian` VALUES (9, 'A09', 'C2', 5, 1);
INSERT INTO `penilaian` VALUES (10, 'A10', 'C2', 5, 1);
INSERT INTO `penilaian` VALUES (11, 'A11', 'C2', 4.7, 1);
INSERT INTO `penilaian` VALUES (12, 'A12', 'C2', 4.7, 1);
INSERT INTO `penilaian` VALUES (13, 'A01', 'C1', 278, 1);
INSERT INTO `penilaian` VALUES (14, 'A01', 'C3', 5, 1);
INSERT INTO `penilaian` VALUES (15, 'A01', 'C4', 24, 1);
INSERT INTO `penilaian` VALUES (16, 'A01', 'C5', 5, 1);
INSERT INTO `penilaian` VALUES (17, 'A02', 'C1', 281, 1);
INSERT INTO `penilaian` VALUES (18, 'A02', 'C3', 2, 1);
INSERT INTO `penilaian` VALUES (19, 'A02', 'C4', 29, 1);
INSERT INTO `penilaian` VALUES (20, 'A02', 'C5', 3, 1);
INSERT INTO `penilaian` VALUES (21, 'A03', 'C1', 276, 1);
INSERT INTO `penilaian` VALUES (22, 'A03', 'C3', 2, 1);
INSERT INTO `penilaian` VALUES (23, 'A03', 'C4', 30, 1);
INSERT INTO `penilaian` VALUES (24, 'A03', 'C5', 5, 1);
INSERT INTO `penilaian` VALUES (25, 'A04', 'C1', 277, 1);
INSERT INTO `penilaian` VALUES (26, 'A04', 'C3', 2, 1);
INSERT INTO `penilaian` VALUES (27, 'A04', 'C4', 27, 1);
INSERT INTO `penilaian` VALUES (28, 'A04', 'C5', 4, 1);
INSERT INTO `penilaian` VALUES (29, 'A05', 'C1', 283, 1);
INSERT INTO `penilaian` VALUES (30, 'A05', 'C3', 3, 1);
INSERT INTO `penilaian` VALUES (31, 'A05', 'C4', 15, 1);
INSERT INTO `penilaian` VALUES (32, 'A05', 'C5', 3, 1);
INSERT INTO `penilaian` VALUES (33, 'A06', 'C1', 279, 1);
INSERT INTO `penilaian` VALUES (34, 'A06', 'C3', 1, 1);
INSERT INTO `penilaian` VALUES (35, 'A06', 'C4', 36, 1);
INSERT INTO `penilaian` VALUES (36, 'A06', 'C5', 3, 1);
INSERT INTO `penilaian` VALUES (37, 'A07', 'C1', 283, 1);
INSERT INTO `penilaian` VALUES (38, 'A07', 'C3', 1, 1);
INSERT INTO `penilaian` VALUES (39, 'A07', 'C4', 28, 1);
INSERT INTO `penilaian` VALUES (40, 'A07', 'C5', 3, 1);
INSERT INTO `penilaian` VALUES (41, 'A08', 'C1', 288, 1);
INSERT INTO `penilaian` VALUES (42, 'A08', 'C3', 0, 1);
INSERT INTO `penilaian` VALUES (43, 'A08', 'C4', 9, 1);
INSERT INTO `penilaian` VALUES (44, 'A08', 'C5', 3, 1);
INSERT INTO `penilaian` VALUES (45, 'A09', 'C1', 276, 1);
INSERT INTO `penilaian` VALUES (46, 'A09', 'C3', 3, 1);
INSERT INTO `penilaian` VALUES (47, 'A09', 'C4', 16, 1);
INSERT INTO `penilaian` VALUES (48, 'A09', 'C5', 3, 1);
INSERT INTO `penilaian` VALUES (49, 'A10', 'C1', 284, 1);
INSERT INTO `penilaian` VALUES (50, 'A10', 'C3', 4, 1);
INSERT INTO `penilaian` VALUES (51, 'A10', 'C4', 27, 1);
INSERT INTO `penilaian` VALUES (52, 'A10', 'C5', 5, 1);
INSERT INTO `penilaian` VALUES (53, 'A11', 'C1', 282, 1);
INSERT INTO `penilaian` VALUES (54, 'A11', 'C3', 3, 1);
INSERT INTO `penilaian` VALUES (55, 'A11', 'C4', 33, 1);
INSERT INTO `penilaian` VALUES (56, 'A11', 'C5', 3, 1);
INSERT INTO `penilaian` VALUES (57, 'A12', 'C1', 284, 1);
INSERT INTO `penilaian` VALUES (58, 'A12', 'C3', 2, 1);
INSERT INTO `penilaian` VALUES (59, 'A12', 'C4', 36, 1);
INSERT INTO `penilaian` VALUES (60, 'A12', 'C5', 3, 1);

-- ----------------------------
-- Table structure for pertanyaan
-- ----------------------------
DROP TABLE IF EXISTS `pertanyaan`;
CREATE TABLE `pertanyaan`  (
  `kode` varchar(3) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `pertanyaan` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tanggal_dibuat` datetime(0) NULL DEFAULT current_timestamp(0),
  `dibuat_oleh` varchar(32) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`kode`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pertanyaan
-- ----------------------------
INSERT INTO `pertanyaan` VALUES ('P01', 'apa kamu bekerja dengan benarrrrrrr?', '2021-06-04 22:45:51', 'SuperAdmin', 1);
INSERT INTO `pertanyaan` VALUES ('P02', 'Apa kamu bekerja dengan sungguh-sungguh?', '2021-06-04 22:45:51', 'SuperAdmin', 1);
INSERT INTO `pertanyaan` VALUES ('P03', 'Apakah kamu bertanggung jawab terhadap pekerjaan?', '2021-06-04 22:45:51', 'SuperAdmin', 1);

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `nik` int(20) NOT NULL,
  `username` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `password` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `role_id` int(1) NOT NULL,
  PRIMARY KEY (`nik`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES (12345678, 'SuperAdmin', 'Zuhdiana Mahmudiyah', '123456', 1);
INSERT INTO `user` VALUES (123451111, 'diana', 'diana', '123456', 2);
INSERT INTO `user` VALUES (1234567890, 'Bambang', 'Bambang Pamungkas', '123456', 2);

-- ----------------------------
-- Table structure for user_role
-- ----------------------------
DROP TABLE IF EXISTS `user_role`;
CREATE TABLE `user_role`  (
  `role_id` int(11) NOT NULL,
  `deskripsi` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`role_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user_role
-- ----------------------------
INSERT INTO `user_role` VALUES (1, 'Admin');
INSERT INTO `user_role` VALUES (2, 'Manager');

-- ----------------------------
-- View structure for v_kuesioner
-- ----------------------------
DROP VIEW IF EXISTS `v_kuesioner`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_kuesioner` AS SELECT
	karyawan.kode,
	karyawan.nik,
	karyawan.nama,
	karyawan.alias,
	karyawan.pendidikan,
	karyawan.jabatan,
	kuesioner.nilai
FROM
	karyawan
	LEFT JOIN kuesioner ON karyawan.kode = kuesioner.kode_alternatif 
	GROUP BY karyawan.kode ;

-- ----------------------------
-- View structure for v_penilaian
-- ----------------------------
DROP VIEW IF EXISTS `v_penilaian`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_penilaian` AS SELECT
	karyawan.kode kode_alternatif,
	karyawan.nama nama_alternatif,
	karyawan.alias,
	( SELECT p.nilai FROM penilaian p WHERE p.kd_alternatif = kode_alternatif AND p.kd_kriteria = 'C1' ) AS C1,
	( SELECT p.nilai FROM penilaian p WHERE p.kd_alternatif = kode_alternatif AND p.kd_kriteria = 'C2' ) AS C2,
	( SELECT p.nilai FROM penilaian p WHERE p.kd_alternatif = kode_alternatif AND p.kd_kriteria = 'C3' ) AS C3,
	( SELECT p.nilai FROM penilaian p WHERE p.kd_alternatif = kode_alternatif AND p.kd_kriteria = 'C4' ) AS C4,
	( SELECT p.nilai FROM penilaian p WHERE p.kd_alternatif = kode_alternatif AND p.kd_kriteria = 'C5' ) AS C5 
FROM
	karyawan
	LEFT JOIN penilaian ON penilaian.kd_alternatif = karyawan.kode
	LEFT JOIN kriteria ON penilaian.kd_kriteria = kriteria.kode
	GROUP BY kode_alternatif ;

-- ----------------------------
-- View structure for v_pertanyaan
-- ----------------------------
DROP VIEW IF EXISTS `v_pertanyaan`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_pertanyaan` AS SELECT
kuesioner.id,
kuesioner.kode_alternatif,
kuesioner.kode_pertanyaan,
kuesioner.nilai,
pertanyaan.pertanyaan
FROM
kuesioner
LEFT JOIN pertanyaan ON kuesioner.kode_pertanyaan = pertanyaan.kode ;

SET FOREIGN_KEY_CHECKS = 1;
