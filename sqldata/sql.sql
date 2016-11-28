/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50540
Source Host           : localhost:3306
Source Database       : aprilbeacon

Target Server Type    : MYSQL
Target Server Version : 50540
File Encoding         : 65001

Date: 2016-11-28 10:13:17
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `device`
-- ----------------------------
DROP TABLE IF EXISTS `device`;
CREATE TABLE `device` (
  `exhibit_id` int(10) unsigned NOT NULL,
  `uuid` char(50) NOT NULL DEFAULT '' COMMENT 'beacon  uuid',
  `major` char(50) NOT NULL DEFAULT '' COMMENT 'beacon  major',
  `minor` char(50) NOT NULL DEFAULT '' COMMENT 'beacon  minor',
  `distance` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT 'beacon  触发距离',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '创建时间',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '更新时间',
  PRIMARY KEY (`exhibit_id`),
  KEY `fk_device_exhibit1_idx` (`exhibit_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='beacon     设备表';

-- ----------------------------
-- Records of device
-- ----------------------------
INSERT INTO `device` VALUES ('6', '测试展品1', '测试展品1', '测试展品1', '111', '2016-11-27 22:00:08', '2016-11-27 22:00:08');
INSERT INTO `device` VALUES ('10', '测试展品2', '测试展品2', '测试展品2', '2', '2016-11-27 22:02:14', '2016-11-27 22:02:14');
INSERT INTO `device` VALUES ('8', '测试展品3', '测试展品3', '测试展品3', '213', '2016-11-27 22:00:56', '2016-11-27 22:00:56');
INSERT INTO `device` VALUES ('9', '测试展品4', '测试展品4', '测试展品4', '0', '2016-11-27 22:01:29', '2016-11-27 22:01:29');
INSERT INTO `device` VALUES ('11', '测试展品10', '测试展品10', '测试展品10', '11', '2016-11-28 00:23:56', '2016-11-28 00:23:56');
INSERT INTO `device` VALUES ('12', '好烦啊', '好烦啊', '好烦啊', '56', '2016-11-28 00:24:32', '2016-11-28 00:24:32');
INSERT INTO `device` VALUES ('13', '烦死啦', '烦死啦', '烦死啦', '255', '2016-11-28 00:25:01', '2016-11-28 00:25:01');
INSERT INTO `device` VALUES ('14', '北京雾霾', '北京雾霾', '北京雾霾', '2', '2016-11-28 02:16:14', '2016-11-28 02:16:14');
INSERT INTO `device` VALUES ('15', 'DanceSmile', 'DanceSmile', 'DanceSmile', '34', '2016-11-28 02:16:45', '2016-11-28 02:16:45');
INSERT INTO `device` VALUES ('16', 'This is example', 'This is example', 'This is example', '0', '2016-11-28 02:17:16', '2016-11-28 02:17:16');
INSERT INTO `device` VALUES ('17', '颐和园', '颐和园', '颐和园', '2', '2016-11-28 02:17:49', '2016-11-28 02:17:49');
INSERT INTO `device` VALUES ('18', '怎么回事', '怎么回事', '怎么回事', '3', '2016-11-28 02:18:37', '2016-11-28 02:18:37');

-- ----------------------------
-- Table structure for `exhibit`
-- ----------------------------
DROP TABLE IF EXISTS `exhibit`;
CREATE TABLE `exhibit` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '展品主键',
  `title` char(50) NOT NULL DEFAULT '' COMMENT '展品名称',
  `content` varchar(5000) NOT NULL DEFAULT '' COMMENT '展品内容',
  `user_id` int(10) unsigned NOT NULL,
  `project_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '展品创建时间',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '展品最后更新时间',
  PRIMARY KEY (`id`),
  KEY `fk_exhibit_user_idx` (`user_id`),
  KEY `fk_exhibit_project1_idx` (`project_id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COMMENT='展品表';

-- ----------------------------
-- Records of exhibit
-- ----------------------------
INSERT INTO `exhibit` VALUES ('10', '测试展品2', '测试展品2', '2', '3', '2016-11-27 22:02:14', '2016-11-28 00:22:51');
INSERT INTO `exhibit` VALUES ('6', '测试展品1', '测试展品1', '2', '2', '2016-11-27 22:00:08', '2016-11-27 23:30:30');
INSERT INTO `exhibit` VALUES ('8', '测试展品3', '测试展品3', '2', '2', '2016-11-27 22:00:56', '2016-11-27 23:30:41');
INSERT INTO `exhibit` VALUES ('9', '测试展品4', '测试展品4', '2', '2', '2016-11-27 22:01:29', '2016-11-27 23:30:52');
INSERT INTO `exhibit` VALUES ('11', '测试展品10', '测试展品10', '2', '0', '2016-11-28 00:23:56', '2016-11-28 00:23:56');
INSERT INTO `exhibit` VALUES ('12', '好烦啊', '好烦啊', '2', '0', '2016-11-28 00:24:32', '2016-11-28 00:24:32');
INSERT INTO `exhibit` VALUES ('13', '烦死啦', '烦死啦', '2', '0', '2016-11-28 00:25:01', '2016-11-28 00:25:01');
INSERT INTO `exhibit` VALUES ('14', '北京雾霾', '北京雾霾', '2', '2', '2016-11-28 02:16:14', '2016-11-28 02:21:41');
INSERT INTO `exhibit` VALUES ('15', 'DanceSmile', 'DanceSmile', '2', '2', '2016-11-28 02:16:45', '2016-11-28 02:21:28');
INSERT INTO `exhibit` VALUES ('16', 'This is example', 'This is example', '2', '0', '2016-11-28 02:17:16', '2016-11-28 02:17:16');
INSERT INTO `exhibit` VALUES ('17', '颐和园', '颐和园', '2', '2', '2016-11-28 02:17:49', '2016-11-28 02:21:20');
INSERT INTO `exhibit` VALUES ('18', '怎么回事', '怎么回事', '2', '0', '2016-11-28 02:18:37', '2016-11-28 02:18:37');

-- ----------------------------
-- Table structure for `poi`
-- ----------------------------
DROP TABLE IF EXISTS `poi`;
CREATE TABLE `poi` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '点位id',
  `coordinate` varchar(255) NOT NULL DEFAULT '' COMMENT '点位坐标',
  `exhibit_id` int(10) unsigned NOT NULL,
  `project_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '点位创建时间',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '点位 最后更新时间',
  PRIMARY KEY (`id`),
  KEY `fk_poi_exhibit1_idx` (`exhibit_id`),
  KEY `fk_poi_project1_idx` (`project_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='点位表';

-- ----------------------------
-- Records of poi
-- ----------------------------

-- ----------------------------
-- Table structure for `project`
-- ----------------------------
DROP TABLE IF EXISTS `project`;
CREATE TABLE `project` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '展览主键',
  `pname` varchar(45) NOT NULL DEFAULT '' COMMENT '展览名称',
  `map` varchar(255) NOT NULL DEFAULT '' COMMENT '展览地图',
  `pdescript` varchar(255) NOT NULL DEFAULT '' COMMENT '展览描述',
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '展览创建时间',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '展览最后更新时间',
  PRIMARY KEY (`id`),
  KEY `fk_project_user1_idx` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='展览表';

-- ----------------------------
-- Records of project
-- ----------------------------
INSERT INTO `project` VALUES ('2', '四月兄弟', 'Aprbrother 微信摇一摇专家', '四月兄弟专注于国外ibeacon的技术团队', '2', '2016-11-27 18:20:19', '2016-11-27 22:03:36');
INSERT INTO `project` VALUES ('3', '微信摇一摇', '腾讯旗下基于ibencon协议开发', '腾讯旗下基于ibencon协议开发', '2', '2016-11-27 22:19:11', '2016-11-27 22:19:11');
INSERT INTO `project` VALUES ('4', 'Aprbrother  博物馆导览', 'Aprbrother  博物馆导览', 'Aprbrother  博物馆导览', '2', '2016-11-28 00:30:33', '2016-11-28 00:31:13');
INSERT INTO `project` VALUES ('5', '水晶石', '水晶石', '水晶石', '2', '2016-11-28 02:20:05', '2016-11-28 02:20:05');
INSERT INTO `project` VALUES ('6', '漫步盛行', '漫步盛行', '漫步盛行', '2', '2016-11-28 02:20:38', '2016-11-28 02:20:38');

-- ----------------------------
-- Table structure for `resource`
-- ----------------------------
DROP TABLE IF EXISTS `resource`;
CREATE TABLE `resource` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '资源表的主键',
  `resource_name` varchar(255) NOT NULL DEFAULT '' COMMENT '资源名称',
  `type` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '资源类型\n１：图片\n２：音乐\n',
  `exhibit_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '资源创建时间',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '资源名称最后更新时间',
  PRIMARY KEY (`id`),
  KEY `fk_resource_exhibit1_idx` (`exhibit_id`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=utf8 COMMENT='资源表';

-- ----------------------------
-- Records of resource
-- ----------------------------
INSERT INTO `resource` VALUES ('20', '测试展品2', '2', '10', '2016-11-27 22:02:14', '2016-11-27 22:02:14');
INSERT INTO `resource` VALUES ('11', '测试展品1', '1', '6', '2016-11-27 22:00:08', '2016-11-27 22:00:08');
INSERT INTO `resource` VALUES ('12', '测试展品1', '2', '6', '2016-11-27 22:00:08', '2016-11-27 22:00:08');
INSERT INTO `resource` VALUES ('19', '测试展品2', '1', '10', '2016-11-27 22:02:14', '2016-11-27 22:02:14');
INSERT INTO `resource` VALUES ('15', '测试展品3', '1', '8', '2016-11-27 22:00:56', '2016-11-27 22:00:56');
INSERT INTO `resource` VALUES ('16', '测试展品3', '2', '8', '2016-11-27 22:00:56', '2016-11-27 22:00:56');
INSERT INTO `resource` VALUES ('17', '测试展品4', '1', '9', '2016-11-27 22:01:29', '2016-11-27 22:01:29');
INSERT INTO `resource` VALUES ('18', '测试展品4', '2', '9', '2016-11-27 22:01:29', '2016-11-27 22:01:29');
INSERT INTO `resource` VALUES ('21', '测试展品10', '1', '11', '2016-11-28 00:23:56', '2016-11-28 00:23:56');
INSERT INTO `resource` VALUES ('22', '测试展品10', '2', '11', '2016-11-28 00:23:56', '2016-11-28 00:23:56');
INSERT INTO `resource` VALUES ('23', '好烦啊', '1', '12', '2016-11-28 00:24:32', '2016-11-28 00:24:32');
INSERT INTO `resource` VALUES ('24', '好烦啊', '2', '12', '2016-11-28 00:24:32', '2016-11-28 00:24:32');
INSERT INTO `resource` VALUES ('25', '烦死啦', '1', '13', '2016-11-28 00:25:01', '2016-11-28 00:25:01');
INSERT INTO `resource` VALUES ('26', '烦死啦', '2', '13', '2016-11-28 00:25:01', '2016-11-28 00:25:01');
INSERT INTO `resource` VALUES ('27', '北京雾霾', '1', '14', '2016-11-28 02:16:14', '2016-11-28 02:16:14');
INSERT INTO `resource` VALUES ('28', '北京雾霾', '2', '14', '2016-11-28 02:16:14', '2016-11-28 02:16:14');
INSERT INTO `resource` VALUES ('29', 'DanceSmile', '1', '15', '2016-11-28 02:16:45', '2016-11-28 02:16:45');
INSERT INTO `resource` VALUES ('30', 'DanceSmile', '2', '15', '2016-11-28 02:16:45', '2016-11-28 02:16:45');
INSERT INTO `resource` VALUES ('31', 'This is example', '1', '16', '2016-11-28 02:17:16', '2016-11-28 02:17:16');
INSERT INTO `resource` VALUES ('32', 'This is example', '2', '16', '2016-11-28 02:17:16', '2016-11-28 02:17:16');
INSERT INTO `resource` VALUES ('33', '颐和园', '1', '17', '2016-11-28 02:17:49', '2016-11-28 02:17:49');
INSERT INTO `resource` VALUES ('34', '颐和园', '2', '17', '2016-11-28 02:17:49', '2016-11-28 02:17:49');
INSERT INTO `resource` VALUES ('35', '怎么回事', '1', '18', '2016-11-28 02:18:37', '2016-11-28 02:18:37');
INSERT INTO `resource` VALUES ('36', '怎么回事', '2', '18', '2016-11-28 02:18:37', '2016-11-28 02:18:37');

-- ----------------------------
-- Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'user表主键',
  `username` char(30) NOT NULL DEFAULT '' COMMENT '用户账号',
  `password` varchar(255) NOT NULL DEFAULT '' COMMENT '用户密码',
  `company` char(50) NOT NULL DEFAULT '' COMMENT '公司名称',
  `company_descript` varchar(255) NOT NULL DEFAULT '' COMMENT '公司简介',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '创建时间',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '最后更新时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username_UNIQUE` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='用户表  （客户比 ） 存贮客户公司信息';

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('2', '1215850394@qq.com', '$2y$10$BHcPxd3wJ/waQaIEv00HO.Wl4qTBINbAEnzHmGsmnZzKuYMhjj2hO', '四月兄弟', 'aprbeacon 蓝牙模块基站研发团队。', '2016-11-26 02:11:22', '2016-11-26 02:11:22');
