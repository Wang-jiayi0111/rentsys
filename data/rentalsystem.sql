/*
 Navicat Premium Data Transfer

 Source Server         : mysql
 Source Server Type    : MySQL
 Source Server Version : 50553
 Source Host           : localhost:3306
 Source Schema         : rentalsystem

 Target Server Type    : MySQL
 Target Server Version : 50553
 File Encoding         : 65001

 Date: 14/06/2022 18:11:21
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for admin
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin`  (
  `admin_id` varchar(8) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `admin_passwd` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE = MyISAM CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES ('10100001', 'wjy_101045');
INSERT INTO `admin` VALUES ('10100002', 'pml_101043');
INSERT INTO `admin` VALUES ('10100003', '101041');

-- ----------------------------
-- Table structure for deal
-- ----------------------------
DROP TABLE IF EXISTS `deal`;
CREATE TABLE `deal`  (
  `deal_id` varchar(8) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `landlord_id` varchar(8) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `tenant_id` varchar(8) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `admin_id` varchar(8) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `house_id` varchar(8) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `deal_book` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`deal_id`) USING BTREE,
  INDEX `landlord_id`(`landlord_id`) USING BTREE,
  INDEX `tenant_id`(`tenant_id`) USING BTREE,
  INDEX `admin_id`(`admin_id`) USING BTREE,
  INDEX `house_id`(`house_id`) USING BTREE
) ENGINE = MyISAM CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of deal
-- ----------------------------
INSERT INTO `deal` VALUES ('88880001', '22220007', '99990002', '10100001', '11110001', '');
INSERT INTO `deal` VALUES ('88880002', '22220005', '99990004', '10100001', '11110002', '');
INSERT INTO `deal` VALUES ('88880003', '22220003', '99990001', '10100001', '11110004', '');
INSERT INTO `deal` VALUES ('88880004', '22220006', '99990005', '10100002', '11110003', '');
INSERT INTO `deal` VALUES ('88880005', '22220002', '99990007', '10100002', '11110005', '');
INSERT INTO `deal` VALUES ('88880006', '22220004', '99990006', '10100003', '11110007', '');

-- ----------------------------
-- Table structure for house
-- ----------------------------
DROP TABLE IF EXISTS `house`;
CREATE TABLE `house`  (
  `house_id` varchar(8) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `landlord_id` varchar(8) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `region` char(4) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `renthouse_type` char(4) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `house_type` varchar(8) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `area` int(4) NOT NULL,
  `decoration` char(6) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `address` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `picture` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `rent` int(6) NOT NULL,
  PRIMARY KEY (`house_id`) USING BTREE,
  INDEX `landlord_id`(`landlord_id`) USING BTREE
) ENGINE = MyISAM CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of house
-- ----------------------------
INSERT INTO `house` VALUES ('11110001', '22220007', '龙门', '整租', '一房一厅', 50, '复古风格', '广东省惠州市龙门县龙门城区广河高速', 'images/11110001.png', 1250);
INSERT INTO `house` VALUES ('11110002', '22220005', '博罗', '整租', '两房一厅', 80, '粗装修', '广东省惠州市博罗县园洲兴园五路', 'images/11110002.png', 1700);
INSERT INTO `house` VALUES ('11110003', '22220006', '惠东', '合租', '三房两厅', 120, '温馨风格', '广东省惠州市惠东县平山新平大道629号', 'images/11110003.png', 2500);
INSERT INTO `house` VALUES ('11110004', '22220003', '惠城', '合租', '五房两厅', 200, 'ins风格', '广东省惠州市惠城区河南岸演达45路', 'images/11110004.png', 2000);
INSERT INTO `house` VALUES ('11110005', '22220002', '惠城', '整租', '两房一厅', 88, 'ins风格', '广东省惠州市惠城区江北中心区菊香一路', 'images/11110005.png', 2000);
INSERT INTO `house` VALUES ('11110006', '22220001', '惠城', '整租', '三房两厅', 130, '粗装修', '广东省惠州市惠城区三栋镇演达路1号', 'images/11110006.png', 2700);
INSERT INTO `house` VALUES ('11110007', '22220004', '惠阳', '合租', '四房两厅', 200, '精装修', '广东省惠州市惠阳区淡水中心区龙湖二路', 'images/11110007.png', 2300);

-- ----------------------------
-- Table structure for landlord
-- ----------------------------
DROP TABLE IF EXISTS `landlord`;
CREATE TABLE `landlord`  (
  `landlord_id` varchar(8) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `ll_name` varchar(8) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `ll_sex` char(2) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `ll_photo` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `ll_phonenum` varchar(11) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `ll_mailbox` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `ll_address` varchar(40) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `ll_passwd` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`landlord_id`) USING BTREE
) ENGINE = MyISAM CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of landlord
-- ----------------------------
INSERT INTO `landlord` VALUES ('22220001', '赵家军', '男', 'images/22220001.png', '13018662956', '13018662956@163.com', '广东省惠州市惠城区三栋镇演达路1号', 'li_123456z');
INSERT INTO `landlord` VALUES ('22220002', 'love', '男', 'images/22220002.png', '17945662389', '17945662389@163.com', '广东省惠州市惠城区江北中心区菊香一路', 'k_123666l');
INSERT INTO `landlord` VALUES ('22220003', '晚霞', '女', 'images/22220003.png', '18545683467', '18545683467@163.com', '广东省惠州市惠城区河南岸演达45路', 'x16_888');
INSERT INTO `landlord` VALUES ('22220004', '平安', '男', 'images/22220004.png', '15045678910', '15045678910@163.com', '广东省惠州市惠阳区淡水中心区龙湖二路', 'ping4298_');
INSERT INTO `landlord` VALUES ('22220005', '淋雨一直走', '女', 'images/22220005.png', '17345567555', '17345567555@163.com', '广东省惠州市博罗县园洲兴园五路', 'hua_101010');
INSERT INTO `landlord` VALUES ('22220006', '！！！', '女', 'images/22220006.png', '17399995299', '17399995299@163.com', '广东省惠州市惠东县平山新平大道629号', 'fan_7023');
INSERT INTO `landlord` VALUES ('22220007', '邻里的猫', '男', 'images/22220007.png', '19877774377', '19877774377@163.com', '广东省惠州市龙门县龙门城区广河高速', 's_778899');

-- ----------------------------
-- Table structure for orders
-- ----------------------------
DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders`  (
  `order_id` varchar(8) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `landlord_id` varchar(8) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `tenant_id` varchar(8) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `house_id` varchar(8) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `deal_id` varchar(8) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `time` datetime NULL,
  PRIMARY KEY (`order_id`) USING BTREE,
  INDEX `landlord_id`(`landlord_id`) USING BTREE,
  INDEX `tenant_id`(`tenant_id`) USING BTREE,
  INDEX `house_id`(`house_id`) USING BTREE,
  INDEX `deal_id`(`deal_id`) USING BTREE
) ENGINE = MyISAM CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of orders
-- ----------------------------
INSERT INTO `orders` VALUES ('20221001', '22220007', '99990002', '11110001', '88880001', '2022-01-01 19:00:00');
INSERT INTO `orders` VALUES ('20221002', '22220005', '99990004', '11110002', '88880002', '2022-03-01 19:39:10');
INSERT INTO `orders` VALUES ('20221003', '22220003', '99990001', '11110004', '88880003', '2022-03-25 16:36:06');
INSERT INTO `orders` VALUES ('20221004', '22220006', '99990005', '11110003', '88880004', '2022-04-02 16:36:09');
INSERT INTO `orders` VALUES ('20221005', '22220002', '99990007', '11110005', '88880005', '2022-05-02 19:00:09');
INSERT INTO `orders` VALUES ('20221006', '22220004', '99990006', '11110007', '88880006', '2022-05-11 20:07:40');

-- ----------------------------
-- Table structure for service
-- ----------------------------
DROP TABLE IF EXISTS `service`;
CREATE TABLE `service`  (
  `service_id` varchar(8) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `house_id` varchar(8) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `tenant_id` varchar(8) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `service_type` char(4) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `mony` int(6) NOT NULL,
  `time` datetime NULL,
  PRIMARY KEY (`service_id`) USING BTREE,
  INDEX `house_id`(`house_id`) USING BTREE,
  INDEX `tenant_id`(`tenant_id`) USING BTREE
) ENGINE = MyISAM CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of service
-- ----------------------------
INSERT INTO `service` VALUES ('77770001', '22220007', '99990002', '搬家', 200, '2022-01-19 19:49:53');
INSERT INTO `service` VALUES ('77770003', '22220005', '99990004', '搬家', 400, '2022-01-19 09:40:09');
INSERT INTO `service` VALUES ('77770004', '22220003', '99990001', '维修', 800, '2022-04-18 16:40:10');
INSERT INTO `service` VALUES ('77770005', '22220003', '99990001', '保洁', 800, '2022-04-18 16:45:00');
INSERT INTO `service` VALUES ('77770006', '22220004', '99990006', '保洁', 600, '2022-05-25 20:01:56');
INSERT INTO `service` VALUES ('77770007', '22220002', '99990007', '维修', 400, '2022-05-20 19:05:28');

-- ----------------------------
-- Table structure for tenant
-- ----------------------------
DROP TABLE IF EXISTS `tenant`;
CREATE TABLE `tenant`  (
  `tenant_id` varchar(8) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `tn_name` varchar(8) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `tn_sex` char(2) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `tn_photo` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `tn_phonenum` varchar(11) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `tn_mailbox` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `tn_address` varchar(40) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `tn_passwd` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`tenant_id`) USING BTREE
) ENGINE = MyISAM CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tenant
-- ----------------------------
INSERT INTO `tenant` VALUES ('99990001', '极光之下', '男', 'images/99990001.png', '19703767623', '19703767623@163.com', '广东省惠州市惠城区水口惠泽大道6路', 'zs_123666');
INSERT INTO `tenant` VALUES ('99990002', 'wyy', '男', 'images/99990002.png', '15017658687', '15017658687@163.com', '广东省惠州市龙门县龙门城区南油路', 'lslsls_888');
INSERT INTO `tenant` VALUES ('99990003', '星河', '男', 'images/99990003.png', '13190975798', '13190975798@163.com', '广东省惠州市惠阳区淡水中心区金惠大道', 'w_250w250');
INSERT INTO `tenant` VALUES ('99990004', '南柯一梦', '男', 'images/99990004.png', '19535976643', '19535976643@163.com', '广东省惠州市博罗县石湾兴业大道', 'zykkyz_444');
INSERT INTO `tenant` VALUES ('99990005', '小猪佩奇', '女', 'images/99990005.png', '13509867897', '13509867897@163.com', '广东省惠州市惠东县平山惠东大道', 'nn_123gogo');
INSERT INTO `tenant` VALUES ('99990006', '米奇妙妙屋', '女', 'images/99990006.png', '19087527676', '19087527676@163.com', '广东省惠州市惠阳区经济开发区惠南大道', 'qkyy_666135');
INSERT INTO `tenant` VALUES ('99990007', '优茶', '女', 'images/99990007.png', '17489765913', '17489765913@163.com', '广东省惠州市惠城区水口水口大道16号', 'xn_0072592');

-- ----------------------------
-- Table structure for wanthouse
-- ----------------------------
DROP TABLE IF EXISTS `wanthouse`;
CREATE TABLE `wanthouse`  (
  `tenant_id` varchar(8) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `region` char(4) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `renthouse_type` char(4) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `house_type` varchar(8) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `area` int(4) NOT NULL,
  `decoration` char(6) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `rent` int(6) NOT NULL,
  PRIMARY KEY (`tenant_id`) USING BTREE
) ENGINE = MyISAM CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of wanthouse
-- ----------------------------
INSERT INTO `wanthouse` VALUES ('99990001', '惠城', '合租', '五房两厅', 200, 'ins风格', 2000);
INSERT INTO `wanthouse` VALUES ('99990002', '龙门', '整租', '一房一厅', 50, '复古风格', 1250);
INSERT INTO `wanthouse` VALUES ('99990003', '惠阳', '整租', '一房一厅', 50, '精装修', 1000);
INSERT INTO `wanthouse` VALUES ('99990004', '博罗', '整租', '两房一厅', 80, '粗装修', 1700);
INSERT INTO `wanthouse` VALUES ('99990005', '惠东', '合租', '三房两厅', 120, '温馨风格', 2000);
INSERT INTO `wanthouse` VALUES ('99990006', '惠阳', '合租', '四房两厅', 200, '精装修', 2300);
INSERT INTO `wanthouse` VALUES ('99990007', '惠城', '整租', '两房一厅', 88, 'ins风格', 2000);

SET FOREIGN_KEY_CHECKS = 1;
