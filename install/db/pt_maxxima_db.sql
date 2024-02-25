/*
 Navicat Premium Data Transfer

 Author                : Bahrudin Ardiansyah
 Source Server         : Laragon
 Source Server Type    : MySQL
 Source Server Version : 80030
 Source Host           : localhost:3306
 Source Schema         : pt_maxxima_db

 Target Server Type    : MySQL
 Target Server Version : 80030
 File Encoding         : 65001

 Date: 26/02/2024 00:44:23
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for academic_documents
-- ----------------------------
DROP TABLE IF EXISTS `academic_documents`;
CREATE TABLE `academic_documents`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `student_id` bigint UNSIGNED NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_path` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `full_path` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `academic_documents_student_id_foreign`(`student_id`) USING BTREE,
  CONSTRAINT `academic_documents_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `academic_students` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of academic_documents
-- ----------------------------

-- ----------------------------
-- Table structure for academic_lesson_student
-- ----------------------------
DROP TABLE IF EXISTS `academic_lesson_student`;
CREATE TABLE `academic_lesson_student`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `student_id` bigint UNSIGNED NOT NULL,
  `lesson_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `academic_lesson_student_student_id_foreign`(`student_id`) USING BTREE,
  INDEX `academic_lesson_student_lesson_id_foreign`(`lesson_id`) USING BTREE,
  CONSTRAINT `academic_lesson_student_lesson_id_foreign` FOREIGN KEY (`lesson_id`) REFERENCES `academic_lessons` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `academic_lesson_student_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `academic_students` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 97 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of academic_lesson_student
-- ----------------------------
INSERT INTO `academic_lesson_student` VALUES (1, 1, 4, NULL, NULL);
INSERT INTO `academic_lesson_student` VALUES (2, 1, 9, NULL, NULL);
INSERT INTO `academic_lesson_student` VALUES (3, 2, 2, NULL, NULL);
INSERT INTO `academic_lesson_student` VALUES (4, 2, 5, NULL, NULL);
INSERT INTO `academic_lesson_student` VALUES (5, 2, 7, NULL, NULL);
INSERT INTO `academic_lesson_student` VALUES (6, 3, 3, NULL, NULL);
INSERT INTO `academic_lesson_student` VALUES (7, 3, 6, NULL, NULL);
INSERT INTO `academic_lesson_student` VALUES (8, 4, 6, NULL, NULL);
INSERT INTO `academic_lesson_student` VALUES (9, 5, 7, NULL, NULL);
INSERT INTO `academic_lesson_student` VALUES (10, 6, 4, NULL, NULL);
INSERT INTO `academic_lesson_student` VALUES (11, 6, 6, NULL, NULL);
INSERT INTO `academic_lesson_student` VALUES (12, 6, 8, NULL, NULL);
INSERT INTO `academic_lesson_student` VALUES (13, 7, 9, NULL, NULL);
INSERT INTO `academic_lesson_student` VALUES (14, 8, 2, NULL, NULL);
INSERT INTO `academic_lesson_student` VALUES (15, 9, 1, NULL, NULL);
INSERT INTO `academic_lesson_student` VALUES (16, 9, 4, NULL, NULL);
INSERT INTO `academic_lesson_student` VALUES (17, 10, 1, NULL, NULL);
INSERT INTO `academic_lesson_student` VALUES (18, 10, 6, NULL, NULL);
INSERT INTO `academic_lesson_student` VALUES (19, 11, 2, NULL, NULL);
INSERT INTO `academic_lesson_student` VALUES (20, 11, 6, NULL, NULL);
INSERT INTO `academic_lesson_student` VALUES (21, 11, 7, NULL, NULL);
INSERT INTO `academic_lesson_student` VALUES (22, 12, 2, NULL, NULL);
INSERT INTO `academic_lesson_student` VALUES (23, 12, 3, NULL, NULL);
INSERT INTO `academic_lesson_student` VALUES (24, 13, 2, NULL, NULL);
INSERT INTO `academic_lesson_student` VALUES (25, 13, 4, NULL, NULL);
INSERT INTO `academic_lesson_student` VALUES (26, 13, 8, NULL, NULL);
INSERT INTO `academic_lesson_student` VALUES (27, 14, 1, NULL, NULL);
INSERT INTO `academic_lesson_student` VALUES (28, 14, 6, NULL, NULL);
INSERT INTO `academic_lesson_student` VALUES (29, 15, 1, NULL, NULL);
INSERT INTO `academic_lesson_student` VALUES (30, 15, 7, NULL, NULL);
INSERT INTO `academic_lesson_student` VALUES (31, 16, 2, NULL, NULL);
INSERT INTO `academic_lesson_student` VALUES (32, 16, 5, NULL, NULL);
INSERT INTO `academic_lesson_student` VALUES (33, 16, 6, NULL, NULL);
INSERT INTO `academic_lesson_student` VALUES (34, 17, 3, NULL, NULL);
INSERT INTO `academic_lesson_student` VALUES (35, 18, 2, NULL, NULL);
INSERT INTO `academic_lesson_student` VALUES (36, 18, 3, NULL, NULL);
INSERT INTO `academic_lesson_student` VALUES (37, 18, 8, NULL, NULL);
INSERT INTO `academic_lesson_student` VALUES (38, 19, 1, NULL, NULL);
INSERT INTO `academic_lesson_student` VALUES (39, 19, 6, NULL, NULL);
INSERT INTO `academic_lesson_student` VALUES (40, 20, 4, NULL, NULL);
INSERT INTO `academic_lesson_student` VALUES (41, 20, 8, NULL, NULL);
INSERT INTO `academic_lesson_student` VALUES (42, 20, 9, NULL, NULL);
INSERT INTO `academic_lesson_student` VALUES (43, 21, 2, NULL, NULL);
INSERT INTO `academic_lesson_student` VALUES (44, 21, 3, NULL, NULL);
INSERT INTO `academic_lesson_student` VALUES (45, 21, 4, NULL, NULL);
INSERT INTO `academic_lesson_student` VALUES (46, 22, 4, NULL, NULL);
INSERT INTO `academic_lesson_student` VALUES (47, 22, 5, NULL, NULL);
INSERT INTO `academic_lesson_student` VALUES (48, 23, 6, NULL, NULL);
INSERT INTO `academic_lesson_student` VALUES (49, 24, 7, NULL, NULL);
INSERT INTO `academic_lesson_student` VALUES (50, 24, 8, NULL, NULL);
INSERT INTO `academic_lesson_student` VALUES (51, 24, 9, NULL, NULL);
INSERT INTO `academic_lesson_student` VALUES (52, 25, 1, NULL, NULL);
INSERT INTO `academic_lesson_student` VALUES (53, 25, 8, NULL, NULL);
INSERT INTO `academic_lesson_student` VALUES (54, 26, 6, NULL, NULL);
INSERT INTO `academic_lesson_student` VALUES (55, 26, 9, NULL, NULL);
INSERT INTO `academic_lesson_student` VALUES (56, 27, 4, NULL, NULL);
INSERT INTO `academic_lesson_student` VALUES (57, 28, 8, NULL, NULL);
INSERT INTO `academic_lesson_student` VALUES (58, 29, 2, NULL, NULL);
INSERT INTO `academic_lesson_student` VALUES (59, 29, 6, NULL, NULL);
INSERT INTO `academic_lesson_student` VALUES (60, 30, 7, NULL, NULL);
INSERT INTO `academic_lesson_student` VALUES (61, 30, 9, NULL, NULL);
INSERT INTO `academic_lesson_student` VALUES (62, 31, 3, NULL, NULL);
INSERT INTO `academic_lesson_student` VALUES (63, 31, 4, NULL, NULL);
INSERT INTO `academic_lesson_student` VALUES (64, 31, 6, NULL, NULL);
INSERT INTO `academic_lesson_student` VALUES (65, 32, 1, NULL, NULL);
INSERT INTO `academic_lesson_student` VALUES (66, 33, 5, NULL, NULL);
INSERT INTO `academic_lesson_student` VALUES (67, 34, 3, NULL, NULL);
INSERT INTO `academic_lesson_student` VALUES (68, 34, 8, NULL, NULL);
INSERT INTO `academic_lesson_student` VALUES (69, 34, 9, NULL, NULL);
INSERT INTO `academic_lesson_student` VALUES (70, 35, 2, NULL, NULL);
INSERT INTO `academic_lesson_student` VALUES (71, 35, 6, NULL, NULL);
INSERT INTO `academic_lesson_student` VALUES (72, 36, 5, NULL, NULL);
INSERT INTO `academic_lesson_student` VALUES (73, 37, 2, NULL, NULL);
INSERT INTO `academic_lesson_student` VALUES (74, 38, 2, NULL, NULL);
INSERT INTO `academic_lesson_student` VALUES (75, 39, 3, NULL, NULL);
INSERT INTO `academic_lesson_student` VALUES (76, 39, 4, NULL, NULL);
INSERT INTO `academic_lesson_student` VALUES (77, 40, 5, NULL, NULL);
INSERT INTO `academic_lesson_student` VALUES (78, 41, 8, NULL, NULL);
INSERT INTO `academic_lesson_student` VALUES (79, 42, 4, NULL, NULL);
INSERT INTO `academic_lesson_student` VALUES (80, 43, 1, NULL, NULL);
INSERT INTO `academic_lesson_student` VALUES (81, 43, 3, NULL, NULL);
INSERT INTO `academic_lesson_student` VALUES (82, 43, 4, NULL, NULL);
INSERT INTO `academic_lesson_student` VALUES (83, 44, 4, NULL, NULL);
INSERT INTO `academic_lesson_student` VALUES (84, 45, 2, NULL, NULL);
INSERT INTO `academic_lesson_student` VALUES (85, 45, 4, NULL, NULL);
INSERT INTO `academic_lesson_student` VALUES (86, 45, 7, NULL, NULL);
INSERT INTO `academic_lesson_student` VALUES (87, 46, 1, NULL, NULL);
INSERT INTO `academic_lesson_student` VALUES (88, 46, 6, NULL, NULL);
INSERT INTO `academic_lesson_student` VALUES (89, 46, 8, NULL, NULL);
INSERT INTO `academic_lesson_student` VALUES (90, 47, 4, NULL, NULL);
INSERT INTO `academic_lesson_student` VALUES (91, 48, 2, NULL, NULL);
INSERT INTO `academic_lesson_student` VALUES (92, 48, 4, NULL, NULL);
INSERT INTO `academic_lesson_student` VALUES (93, 49, 7, NULL, NULL);
INSERT INTO `academic_lesson_student` VALUES (94, 50, 2, NULL, NULL);
INSERT INTO `academic_lesson_student` VALUES (95, 50, 4, NULL, NULL);
INSERT INTO `academic_lesson_student` VALUES (96, 50, 5, NULL, NULL);

-- ----------------------------
-- Table structure for academic_lessons
-- ----------------------------
DROP TABLE IF EXISTS `academic_lessons`;
CREATE TABLE `academic_lessons`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `descriptions` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `academic_lessons_title_unique`(`title`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of academic_lessons
-- ----------------------------
INSERT INTO `academic_lessons` VALUES (1, 'Pancasila', 'Quia blanditiis laborum natus saepe hic est dolorem.', '2024-02-25 15:42:47', '2024-02-25 15:42:47');
INSERT INTO `academic_lessons` VALUES (2, 'Basic Programming', 'Fuga cupiditate quidem ad tempora officia eligendi a suscipit.', '2024-02-25 15:42:47', '2024-02-25 15:42:47');
INSERT INTO `academic_lessons` VALUES (3, 'Basic Database', 'Officia eum voluptatem et quibusdam et at.', '2024-02-25 15:42:47', '2024-02-25 15:42:47');
INSERT INTO `academic_lessons` VALUES (4, 'English Basic', 'Voluptate ut quos sunt autem illo voluptate at.', '2024-02-25 15:42:47', '2024-02-25 15:42:47');
INSERT INTO `academic_lessons` VALUES (5, 'English Mahir', 'Sunt modi qui qui molestiae ut delectus.', '2024-02-25 15:42:47', '2024-02-25 15:42:47');
INSERT INTO `academic_lessons` VALUES (6, 'Digital Business', 'Quia quisquam voluptas tempore neque ad adipisci eveniet quasi.', '2024-02-25 15:42:47', '2024-02-25 15:42:47');
INSERT INTO `academic_lessons` VALUES (7, 'Bahasa Local', 'Aliquam et suscipit sit voluptatem.', '2024-02-25 15:42:47', '2024-02-25 15:42:47');
INSERT INTO `academic_lessons` VALUES (8, 'Methodology R&D', 'Similique id quibusdam quia voluptatum animi.', '2024-02-25 15:42:47', '2024-02-25 15:42:47');
INSERT INTO `academic_lessons` VALUES (9, 'Economy Muslim', 'Officia animi soluta praesentium quaerat soluta.', '2024-02-25 15:42:47', '2024-02-25 15:42:47');

-- ----------------------------
-- Table structure for academic_students
-- ----------------------------
DROP TABLE IF EXISTS `academic_students`;
CREATE TABLE `academic_students`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nik` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` enum('Perempuan','Laki-laki') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `academic_students_nik_unique`(`nik`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 51 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of academic_students
-- ----------------------------
INSERT INTO `academic_students` VALUES (1, '2024020001', 'indah wulandari s.sos', 'Laki-laki', 'Bulakamba, Gg. Ciumbuleuit No. 199, Makassar 44309, Kaltim', '2024-02-25 15:42:47', '2024-02-25 15:42:47');
INSERT INTO `academic_students` VALUES (2, '2024020002', 'diah wastuti', 'Perempuan', 'Losari, Gg. Acordion No. 83, Sibolga 90017, Kaltara', '2024-02-25 15:42:47', '2024-02-25 15:42:47');
INSERT INTO `academic_students` VALUES (3, '2024020003', 'capa pandu damanik m.m.', 'Perempuan', 'Tegal, Ds. Qrisdoren No. 544, Sibolga 60454, Bengkulu', '2024-02-25 15:42:47', '2024-02-25 15:42:47');
INSERT INTO `academic_students` VALUES (4, '2024020004', 'kusuma ajiono sihotang', 'Perempuan', 'Brebes, Jr. Basket No. 251, Manado 48062, Kaltim', '2024-02-25 15:42:47', '2024-02-25 15:42:47');
INSERT INTO `academic_students` VALUES (5, '2024020005', 'nilam zahra padmasari', 'Perempuan', 'Tegal, Jln. Bara Tambar No. 282, Ternate 13715, Sumsel', '2024-02-25 15:42:47', '2024-02-25 15:42:47');
INSERT INTO `academic_students` VALUES (6, '2024020006', 'amalia maryati', 'Laki-laki', 'Brebes, Jr. Babadan No. 964, Pematangsiantar 75171, Bengkulu', '2024-02-25 15:42:47', '2024-02-25 15:42:47');
INSERT INTO `academic_students` VALUES (7, '2024020007', 'qori lailasari', 'Perempuan', 'Bulakamba, Jln. M.T. Haryono No. 505, Administrasi Jakarta Utara 64134, Jabar', '2024-02-25 15:42:47', '2024-02-25 15:42:47');
INSERT INTO `academic_students` VALUES (8, '2024020008', 'anita hassanah', 'Perempuan', 'Ora ngapak ora kepenak, Gg. Gegerkalong Hilir No. 647, Ambon 65702, Maluku', '2024-02-25 15:42:47', '2024-02-25 15:42:47');
INSERT INTO `academic_students` VALUES (9, '2024020009', 'rahmi suryatmi', 'Perempuan', 'Losari, Kpg. Banal No. 699, Palangka Raya 97936, Sulut', '2024-02-25 15:42:47', '2024-02-25 15:42:47');
INSERT INTO `academic_students` VALUES (10, '2024020010', 'galur darmaji dabukke s.ked', 'Laki-laki', 'Brebes, Gg. Sutan Syahrir No. 825, Blitar 40364, Sumbar', '2024-02-25 15:42:47', '2024-02-25 15:42:47');
INSERT INTO `academic_students` VALUES (11, '2024020011', 'damu sihotang', 'Laki-laki', 'Brebes, Jln. Bagis Utama No. 824, Pontianak 94198, DKI', '2024-02-25 15:42:47', '2024-02-25 15:42:47');
INSERT INTO `academic_students` VALUES (12, '2024020012', 'betania bella zulaika', 'Laki-laki', 'Bulakamba, Dk. Wora Wari No. 278, Depok 48197, Kaltara', '2024-02-25 15:42:47', '2024-02-25 15:42:47');
INSERT INTO `academic_students` VALUES (13, '2024020013', 'leo halim', 'Laki-laki', 'Brebes, Kpg. Gardujati No. 195, Bengkulu 61719, Pabar', '2024-02-25 15:42:47', '2024-02-25 15:42:47');
INSERT INTO `academic_students` VALUES (14, '2024020014', 'putri laksmiwati', 'Perempuan', 'Ora ngapak ora kepenak, Ki. Kebangkitan Nasional No. 500, Tomohon 76273, Jambi', '2024-02-25 15:42:47', '2024-02-25 15:42:47');
INSERT INTO `academic_students` VALUES (15, '2024020015', 'chelsea anggraini m.ak', 'Perempuan', 'Tegal, Gg. Juanda No. 619, Administrasi Jakarta Timur 69135, Malut', '2024-02-25 15:42:47', '2024-02-25 15:42:47');
INSERT INTO `academic_students` VALUES (16, '2024020016', 'rizki tarihoran', 'Laki-laki', 'Bulakamba, Dk. Gremet No. 208, Metro 95378, Lampung', '2024-02-25 15:42:47', '2024-02-25 15:42:47');
INSERT INTO `academic_students` VALUES (17, '2024020017', 'damu adiarja firgantoro s.i.kom', 'Laki-laki', 'Bulakamba, Kpg. Rajawali Timur No. 746, Makassar 28126, NTB', '2024-02-25 15:42:47', '2024-02-25 15:42:47');
INSERT INTO `academic_students` VALUES (18, '2024020018', 'adhiarja haryanto s.ip', 'Laki-laki', 'Bulakamba, Ds. Taman No. 253, Semarang 77115, Bali', '2024-02-25 15:42:47', '2024-02-25 15:42:47');
INSERT INTO `academic_students` VALUES (19, '2024020019', 'restu yuliarti', 'Perempuan', 'Brebes, Jr. W.R. Supratman No. 716, Pasuruan 99547, Kalteng', '2024-02-25 15:42:47', '2024-02-25 15:42:47');
INSERT INTO `academic_students` VALUES (20, '2024020020', 'kairav hutapea s.psi', 'Perempuan', 'Ora ngapak ora kepenak, Dk. Thamrin No. 42, Jayapura 61667, Bali', '2024-02-25 15:42:47', '2024-02-25 15:42:47');
INSERT INTO `academic_students` VALUES (21, '2024020021', 'saiful firgantoro s.kom', 'Perempuan', 'Brebes, Ki. BKR No. 620, Bima 27006, Babel', '2024-02-25 15:42:47', '2024-02-25 15:42:47');
INSERT INTO `academic_students` VALUES (22, '2024020022', 'taswir pangestu', 'Laki-laki', 'Bulakamba, Jln. Sutarjo No. 743, Singkawang 31707, Gorontalo', '2024-02-25 15:42:47', '2024-02-25 15:42:47');
INSERT INTO `academic_students` VALUES (23, '2024020023', 'suci ina pratiwi m.ti.', 'Laki-laki', 'Tegal, Psr. Suniaraja No. 974, Gorontalo 53889, Banten', '2024-02-25 15:42:47', '2024-02-25 15:42:47');
INSERT INTO `academic_students` VALUES (24, '2024020024', 'nadia kuswandari', 'Laki-laki', 'Brebes, Jln. Baya Kali Bungur No. 622, Samarinda 46161, Babel', '2024-02-25 15:42:47', '2024-02-25 15:42:47');
INSERT INTO `academic_students` VALUES (25, '2024020025', 'dartono waluyo ardianto', 'Perempuan', 'Bulakamba, Gg. Warga No. 102, Palangka Raya 31505, DKI', '2024-02-25 15:42:47', '2024-02-25 15:42:47');
INSERT INTO `academic_students` VALUES (26, '2024020026', 'irsad hidayanto', 'Laki-laki', 'Brebes, Jln. Taman No. 82, Bontang 61874, Malut', '2024-02-25 15:42:47', '2024-02-25 15:42:47');
INSERT INTO `academic_students` VALUES (27, '2024020027', 'asmianto nababan s.pd', 'Laki-laki', 'Ora ngapak ora kepenak, Kpg. Kyai Mojo No. 373, Sabang 95637, Bali', '2024-02-25 15:42:47', '2024-02-25 15:42:47');
INSERT INTO `academic_students` VALUES (28, '2024020028', 'hardana wasita', 'Perempuan', 'Ora ngapak ora kepenak, Ds. Baya Kali Bungur No. 605, Gorontalo 82082, Maluku', '2024-02-25 15:42:47', '2024-02-25 15:42:47');
INSERT INTO `academic_students` VALUES (29, '2024020029', 'juli carla usada', 'Perempuan', 'Brebes, Gg. Agus Salim No. 450, Bitung 52801, NTT', '2024-02-25 15:42:47', '2024-02-25 15:42:47');
INSERT INTO `academic_students` VALUES (30, '2024020030', 'arsipatra wacana', 'Perempuan', 'Brebes, Ki. Banal No. 713, Bandar Lampung 74211, Riau', '2024-02-25 15:42:47', '2024-02-25 15:42:47');
INSERT INTO `academic_students` VALUES (31, '2024020031', 'asman hutapea', 'Perempuan', 'Losari, Kpg. Wahidin No. 681, Tual 97076, Maluku', '2024-02-25 15:42:47', '2024-02-25 15:42:47');
INSERT INTO `academic_students` VALUES (32, '2024020032', 'kayun winarno', 'Perempuan', 'Bulakamba, Ki. B.Agam 1 No. 970, Tomohon 29844, Kalteng', '2024-02-25 15:42:47', '2024-02-25 15:42:47');
INSERT INTO `academic_students` VALUES (33, '2024020033', 'prayitna haryanto', 'Laki-laki', 'Bulakamba, Ds. Jend. A. Yani No. 709, Surabaya 38674, Sulsel', '2024-02-25 15:42:47', '2024-02-25 15:42:47');
INSERT INTO `academic_students` VALUES (34, '2024020034', 'ami rini agustina', 'Laki-laki', 'Tegal, Jr. Moch. Yamin No. 386, Pasuruan 59352, Kaltara', '2024-02-25 15:42:47', '2024-02-25 15:42:47');
INSERT INTO `academic_students` VALUES (35, '2024020035', 'titin mayasari', 'Laki-laki', 'Brebes, Dk. Camar No. 216, Pangkal Pinang 83043, Aceh', '2024-02-25 15:42:47', '2024-02-25 15:42:47');
INSERT INTO `academic_students` VALUES (36, '2024020036', 'daliono hutasoit', 'Perempuan', 'Ora ngapak ora kepenak, Psr. Suniaraja No. 611, Tual 89326, Lampung', '2024-02-25 15:42:47', '2024-02-25 15:42:47');
INSERT INTO `academic_students` VALUES (37, '2024020037', 'padmi nurdiyanti s.e.i', 'Perempuan', 'Losari, Ki. Bak Mandi No. 434, Bitung 30237, Gorontalo', '2024-02-25 15:42:47', '2024-02-25 15:42:47');
INSERT INTO `academic_students` VALUES (38, '2024020038', 'umay jailani', 'Perempuan', 'Tegal, Jln. Bakin No. 897, Bitung 71939, Riau', '2024-02-25 15:42:47', '2024-02-25 15:42:47');
INSERT INTO `academic_students` VALUES (39, '2024020039', 'maimunah fujiati', 'Laki-laki', 'Ora ngapak ora kepenak, Jln. Basuki Rahmat  No. 46, Tarakan 46477, Jatim', '2024-02-25 15:42:47', '2024-02-25 15:42:47');
INSERT INTO `academic_students` VALUES (40, '2024020040', 'hasna melani', 'Laki-laki', 'Brebes, Ds. Gardujati No. 322, Padangsidempuan 96921, Sulteng', '2024-02-25 15:42:47', '2024-02-25 15:42:47');
INSERT INTO `academic_students` VALUES (41, '2024020041', 'natalia salimah farida s.e.', 'Perempuan', 'Brebes, Dk. Umalas No. 727, Tegal 65933, Bengkulu', '2024-02-25 15:42:47', '2024-02-25 15:42:47');
INSERT INTO `academic_students` VALUES (42, '2024020042', 'hilda mandasari', 'Perempuan', 'Brebes, Ki. BKR No. 114, Surabaya 94795, Jabar', '2024-02-25 15:42:47', '2024-02-25 15:42:47');
INSERT INTO `academic_students` VALUES (43, '2024020043', 'kenari bagas marbun', 'Laki-laki', 'Tegal, Jr. Lembong No. 765, Bukittinggi 69040, Bengkulu', '2024-02-25 15:42:47', '2024-02-25 15:42:47');
INSERT INTO `academic_students` VALUES (44, '2024020044', 'nabila purnawati', 'Perempuan', 'Bulakamba, Kpg. Wahidin Sudirohusodo No. 600, Depok 28770, Maluku', '2024-02-25 15:42:47', '2024-02-25 15:42:47');
INSERT INTO `academic_students` VALUES (45, '2024020045', 'darmanto bakda maulana m.farm', 'Perempuan', 'Ora ngapak ora kepenak, Ki. Jakarta No. 718, Tarakan 28820, Sulteng', '2024-02-25 15:42:47', '2024-02-25 15:42:47');
INSERT INTO `academic_students` VALUES (46, '2024020046', 'nadine padmi rahimah', 'Perempuan', 'Ora ngapak ora kepenak, Gg. Ir. H. Juanda No. 112, Padangsidempuan 31675, Sulut', '2024-02-25 15:42:47', '2024-02-25 15:42:47');
INSERT INTO `academic_students` VALUES (47, '2024020047', 'michelle maryati', 'Laki-laki', 'Losari, Ds. Dipenogoro No. 378, Tangerang 53048, Sumut', '2024-02-25 15:42:47', '2024-02-25 15:42:47');
INSERT INTO `academic_students` VALUES (48, '2024020048', 'tirtayasa marbun', 'Perempuan', 'Brebes, Ki. Nangka No. 557, Kupang 63311, Kepri', '2024-02-25 15:42:47', '2024-02-25 15:42:47');
INSERT INTO `academic_students` VALUES (49, '2024020049', 'ifa handayani', 'Perempuan', 'Ora ngapak ora kepenak, Jr. Bakin No. 127, Tegal 68967, Aceh', '2024-02-25 15:42:47', '2024-02-25 15:42:47');
INSERT INTO `academic_students` VALUES (50, '2024020050', 'safina laksmiwati', 'Laki-laki', 'Bulakamba, Kpg. Pasir Koja No. 909, Depok 27652, NTT', '2024-02-25 15:42:47', '2024-02-25 15:42:47');

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `failed_jobs_uuid_unique`(`uuid`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of failed_jobs
-- ----------------------------

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (2, '2014_10_12_100000_create_password_reset_tokens_table', 1);
INSERT INTO `migrations` VALUES (3, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO `migrations` VALUES (4, '2019_12_14_000001_create_personal_access_tokens_table', 1);
INSERT INTO `migrations` VALUES (5, '2024_02_20_172359_create_sessions_table', 1);
INSERT INTO `migrations` VALUES (6, '2024_02_20_174048_create_students_table', 1);
INSERT INTO `migrations` VALUES (7, '2024_02_20_174211_create_lessons_table', 1);
INSERT INTO `migrations` VALUES (8, '2024_02_20_211540_create_lesson_student_table', 1);
INSERT INTO `migrations` VALUES (9, '2024_02_21_232655_create_documents_table', 1);

-- ----------------------------
-- Table structure for password_reset_tokens
-- ----------------------------
DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE `password_reset_tokens`  (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of password_reset_tokens
-- ----------------------------

-- ----------------------------
-- Table structure for personal_access_tokens
-- ----------------------------
DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `personal_access_tokens_token_unique`(`token`) USING BTREE,
  INDEX `personal_access_tokens_tokenable_type_tokenable_id_index`(`tokenable_type`, `tokenable_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of personal_access_tokens
-- ----------------------------

-- ----------------------------
-- Table structure for sessions
-- ----------------------------
DROP TABLE IF EXISTS `sessions`;
CREATE TABLE `sessions`  (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED NULL DEFAULT NULL,
  `ip_address` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `user_agent` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `sessions_user_id_index`(`user_id`) USING BTREE,
  INDEX `sessions_last_activity_index`(`last_activity`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sessions
-- ----------------------------

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------

SET FOREIGN_KEY_CHECKS = 1;
