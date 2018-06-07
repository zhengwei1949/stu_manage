/*
Navicat MySQL Data Transfer

Source Server         : itcast
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : test

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2018-08-31 17:02:27
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for teacher
-- ----------------------------
DROP TABLE IF EXISTS `teacher`;
CREATE TABLE `teacher` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(500) DEFAULT NULL,
  `password` varchar(500) DEFAULT NULL,
  `name` varchar(500) DEFAULT NULL,
  `school` varchar(50) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=85 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of teacher
-- ----------------------------
INSERT INTO `teacher` VALUES ('1', 'jack', '123', '杰克', '传智播客', '19');
INSERT INTO `teacher` VALUES ('2', 'rose', '321', '罗丝', '黑马程序员', '19');
INSERT INTO `teacher` VALUES ('3', 'tom', '123', '汤姆', '传智播客', '19');
INSERT INTO `teacher` VALUES ('4', '张三', '321', '三哥', '黑马程序员', '19');