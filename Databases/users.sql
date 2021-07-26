/*
 Navicat Premium Data Transfer

 Source Server         : Adi
 Source Server Type    : MySQL
 Source Server Version : 80025
 Source Host           : localhost:3306
 Source Schema         : sys

 Target Server Type    : MySQL
 Target Server Version : 80025
 File Encoding         : 65001

 Date: 26/07/2021 23:28:04
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `email`(`email`) USING BTREE,
  UNIQUE INDEX `username`(`username`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 97 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'User1', 'user1@gmail.com', 'pass1');
INSERT INTO `users` VALUES (2, 'User2', 'user2@gmail.com', 'pass2');
INSERT INTO `users` VALUES (3, 'User3', 'user3@gmail.com', 'pass3');
INSERT INTO `users` VALUES (4, 'User4', 'user4@gmail.com', 'pass4');
INSERT INTO `users` VALUES (11, 'TestAccount', 'test@gmail.com', '$2y$10$Ot79Fwe7g0Wzwq7Msn/jyu/yceLekDcwt65KVkEao9bgTq.6lkWpS');
INSERT INTO `users` VALUES (12, 'Test12345', 'test12345@gmail.com', '$2y$10$oGYULOXH.lIZOksxoptoZ.vPkl5zC.HHwCzM3EyiXv75pbWzSAaUy');
INSERT INTO `users` VALUES (15, 'adsdasadsad', 'username1@gmail.com', '$2y$10$QWB4ngvJWQHA7uWuYm06Cuj/NrYCvUXikCAYgE.Fl3G3KnoK5mFu6');
INSERT INTO `users` VALUES (20, 'Test1232452345', 'testtest@gmail.com', '$2y$10$oyT1xTMI2Ou3o2kz/tp7k.9C2Yu7SumQjWzjInkQzBrLFT9r3tlwO');
INSERT INTO `users` VALUES (39, 'TestUser', 'testuser@gmail.com', '$2y$10$A2NZR1Se6nDsPkaW/ThkwuFZhHhRkkteGZ4OgwSgPwK81yxU4opXS');
INSERT INTO `users` VALUES (41, 'NewUser', 'newuser@gmail.com', '$2y$10$QoxD/nPzK9V98kAXMhY7pe7QLRilTrdQIAk38Oqn57Uk9uHEyLdJC');
INSERT INTO `users` VALUES (48, 'User123123124124', 'sdafsdfnosfdosadfn@gmail.com', '$2y$10$LnIbNsdu/PDoodl2VoCAu.vsbrZoicnqfp60u4Prcr2DA0S8jkssi');
INSERT INTO `users` VALUES (78, 'NewUser123', 'newuser123@gmail.com', '$2y$10$YXL87qEGKiIvwrGBhr6FlemUJemw1X/dmJf3XnSsQCIbHg4QIPBQa');
INSERT INTO `users` VALUES (86, 'User113321324324', 'onfaunefu@gmail.com', '$2y$10$S/jt5aFr16OoPFeL4VFL2.YK5M.J1r0t38s.5f3kiP4695s.I3b..');
INSERT INTO `users` VALUES (91, 'dsaddasds', 'onadsfosadfadsfno@gmail.com', '$2y$10$MnqCl/q7NPfVFyvOswbhTuacvBGJD6v1TqW3eaJkNXhgZ82M8LTxC');
INSERT INTO `users` VALUES (92, 'student', 'student@gmail.com', '$2y$10$NYZSruFY15S5TJagGMiCf.qcez/nNK8UfzX3SNje0lXsW4YK4JYBy');
INSERT INTO `users` VALUES (94, 'a', 'a@gmail.com', '$2y$10$KPq7tHsljxlfZNbZI7IojufoDBCWjAikM8KI5vsJA.BtfPS/020oe');
INSERT INTO `users` VALUES (95, 'TestAccount123123', 'fdsjodsfnadsfnadnoon@gmail.com', '$2y$10$pF.aeimn5S4Z1toWpjMHoOG.qdvsYy3p7pdHrM3FTI8a4uCylStIG');
INSERT INTO `users` VALUES (96, 'User1r3fewdwfsdf', 'dasfdsafadsdasf@gmail.com', '$2y$10$0wk.abvC0EBJZogW5gYlGuS2FKF2SIVIQbO3.JgsCfbyWYFiKubPC');
INSERT INTO `users` VALUES (97, 'ŹŹŹŻŻŻ', 'zywiec@gmail.com', '$2y$10$yqfeDxyHfMcejU0eXIbmH.4GauGnw2weuriAHVw1rWH4/hRNwyomW');
INSERT INTO `users` VALUES (98, 'fd', 'fds@gmail.com', '$2y$10$W.tgGj1LkZyfKqo39bs7xOHpLhXCBTOl.J0fogNpOsrMfvditGYuC');
INSERT INTO `users` VALUES (99, 'Adi5000', 'adi2000@gmail.com', '$2y$10$H01mkUEBuycykD3dvcONPeSaSaA5QlMUndvFb72lrTD9tOGu.DK2C');
INSERT INTO `users` VALUES (100, 'finalTest', 'finalTest@gmail.com', '$2y$10$RSCf.Ln1gBMcDOKfVIV03eBKBgeqPjKU/SPgxCbuvZv9D8PQP/zKW');
INSERT INTO `users` VALUES (101, 'testAccount123', 'testAccount123@gmail.com', '$2y$10$5gr/WR00EqNLVXLsstv4uOApdt6eU1xYsL3.LO8HhRrBAVcWOJs0S');
INSERT INTO `users` VALUES (102, 'TestTestTest', 'TestTestTest@gmail.com', '$2y$10$zHjdZuJcsBAI62baFypmFeA6wKlYQbyArbFNgN2lCvfdmewD7hC1y');

SET FOREIGN_KEY_CHECKS = 1;
