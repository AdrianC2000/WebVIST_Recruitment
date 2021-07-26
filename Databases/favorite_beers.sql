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

 Date: 26/07/2021 23:27:52
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for favorite_beers
-- ----------------------------
DROP TABLE IF EXISTS `favorite_beers`;
CREATE TABLE `favorite_beers`  (
  `ID_user` int UNSIGNED NOT NULL,
  `ID_beer` int UNSIGNED NOT NULL
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of favorite_beers
-- ----------------------------
INSERT INTO `favorite_beers` VALUES (94, 2);
INSERT INTO `favorite_beers` VALUES (94, 4);
INSERT INTO `favorite_beers` VALUES (94, 5);
INSERT INTO `favorite_beers` VALUES (94, 7);
INSERT INTO `favorite_beers` VALUES (94, 8);
INSERT INTO `favorite_beers` VALUES (94, 10);
INSERT INTO `favorite_beers` VALUES (94, 13);
INSERT INTO `favorite_beers` VALUES (94, 14);
INSERT INTO `favorite_beers` VALUES (94, 15);
INSERT INTO `favorite_beers` VALUES (94, 11);
INSERT INTO `favorite_beers` VALUES (94, 3);
INSERT INTO `favorite_beers` VALUES (98, 2);
INSERT INTO `favorite_beers` VALUES (98, 3);
INSERT INTO `favorite_beers` VALUES (99, 0);
INSERT INTO `favorite_beers` VALUES (100, 1);
INSERT INTO `favorite_beers` VALUES (100, 4);
INSERT INTO `favorite_beers` VALUES (100, 0);
INSERT INTO `favorite_beers` VALUES (101, 0);
INSERT INTO `favorite_beers` VALUES (101, 4);

SET FOREIGN_KEY_CHECKS = 1;
