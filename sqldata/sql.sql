SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

DROP SCHEMA IF EXISTS `AprilBeacon` ;
CREATE SCHEMA IF NOT EXISTS `AprilBeacon` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `AprilBeacon` ;

-- -----------------------------------------------------
-- Table `AprilBeacon`.`user`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `AprilBeacon`.`user` ;

CREATE TABLE IF NOT EXISTS `AprilBeacon`.`user` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'user表主键',
  `username` CHAR(30) NOT NULL DEFAULT '' COMMENT '用户账号',
  `password` CHAR(30) NOT NULL DEFAULT '' COMMENT '用户密码',
  `company` CHAR(50) NOT NULL DEFAULT '' COMMENT '公司名称',
  `company_descript` VARCHAR(255) NOT NULL DEFAULT '' COMMENT '公司简介',
  `create_time` INT(11) UNSIGNED NOT NULL DEFAULT 0 COMMENT '创建时间',
  `update_time` INT(11) UNSIGNED NOT NULL DEFAULT 0 COMMENT '最后更新时间',
  PRIMARY KEY (`id`),
  UNIQUE INDEX `username_UNIQUE` (`username` ASC))
ENGINE = MyISAM
COMMENT = '用户表  （客户比 ） 存贮客户公司信息';


-- -----------------------------------------------------
-- Table `AprilBeacon`.`project`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `AprilBeacon`.`project` ;

CREATE TABLE IF NOT EXISTS `AprilBeacon`.`project` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '展览主键',
  `pname` VARCHAR(45) NOT NULL DEFAULT '' COMMENT '展览名称',
  `map` VARCHAR(255) NOT NULL DEFAULT '' COMMENT '展览地图',
  `pdescript` VARCHAR(255) NOT NULL DEFAULT '' COMMENT '展览描述',
  `create_time` INT(11) UNSIGNED NOT NULL DEFAULT 0 COMMENT '展览创建时间',
  `update_time` INT(11) UNSIGNED NOT NULL DEFAULT 0 COMMENT '展览最后更新时间',
  `user_id` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_project_user1_idx` (`user_id` ASC))
ENGINE = MyISAM
COMMENT = '展览表';


-- -----------------------------------------------------
-- Table `AprilBeacon`.`exhibit`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `AprilBeacon`.`exhibit` ;

CREATE TABLE IF NOT EXISTS `AprilBeacon`.`exhibit` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '展品主键',
  `title` CHAR(50) NOT NULL DEFAULT '' COMMENT '展品名称',
  `content` VARCHAR(5000) NOT NULL DEFAULT '' COMMENT '展品内容',
  `create_time` INT(11) UNSIGNED NOT NULL DEFAULT 0 COMMENT '展品创建时间',
  `update_time` INT(11) UNSIGNED NOT NULL DEFAULT 0 COMMENT '展品最后更新时间',
  `user_id` INT UNSIGNED NOT NULL,
  `project_id` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_exhibit_user_idx` (`user_id` ASC),
  INDEX `fk_exhibit_project1_idx` (`project_id` ASC))
ENGINE = MyISAM
COMMENT = '展品表';


-- -----------------------------------------------------
-- Table `AprilBeacon`.`resource`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `AprilBeacon`.`resource` ;

CREATE TABLE IF NOT EXISTS `AprilBeacon`.`resource` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '资源表的主键',
  `resource_name` VARCHAR(255) NOT NULL DEFAULT '' COMMENT '资源名称',
  `type` TINYINT UNSIGNED NOT NULL DEFAULT 0 COMMENT '资源类型\n１：图片\n２：音乐\n',
  `create_time` INT(11) UNSIGNED NOT NULL DEFAULT 0 COMMENT '资源创建时间',
  `update_time` INT(11) UNSIGNED NOT NULL DEFAULT 0 COMMENT '资源名称最后更新时间',
  `exhibit_id` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_resource_exhibit1_idx` (`exhibit_id` ASC))
ENGINE = MyISAM
COMMENT = '资源表';


-- -----------------------------------------------------
-- Table `AprilBeacon`.`device`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `AprilBeacon`.`device` ;

CREATE TABLE IF NOT EXISTS `AprilBeacon`.`device` (
  `exhibit_id` INT UNSIGNED NOT NULL,
  `uuid` CHAR(50) NOT NULL DEFAULT '' COMMENT 'beacon  uuid',
  `major` CHAR(50) NOT NULL DEFAULT '' COMMENT 'beacon  major',
  `minor` CHAR(50) NOT NULL DEFAULT '' COMMENT 'beacon  minor',
  `distance` TINYINT UNSIGNED NOT NULL DEFAULT 0 COMMENT 'beacon  触发距离',
  `create_time` INT(11) UNSIGNED NOT NULL DEFAULT 0 COMMENT '创建时间',
  `update_time` INT(11) UNSIGNED NOT NULL DEFAULT 0 COMMENT '更新时间',
  PRIMARY KEY (`exhibit_id`),
  INDEX `fk_device_exhibit1_idx` (`exhibit_id` ASC))
ENGINE = MyISAM
COMMENT = 'beacon     设备表';


-- -----------------------------------------------------
-- Table `AprilBeacon`.`poi`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `AprilBeacon`.`poi` ;

CREATE TABLE IF NOT EXISTS `AprilBeacon`.`poi` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '点位id',
  `coordinate` VARCHAR(255) NOT NULL DEFAULT '' COMMENT '点位坐标',
  `create_time` INT(11) UNSIGNED NOT NULL DEFAULT 0 COMMENT '点位创建时间',
  `update_time` INT(11) UNSIGNED NOT NULL DEFAULT 0 COMMENT '点位 最后更新时间',
  `exhibit_id` INT UNSIGNED NOT NULL,
  `project_id` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_poi_exhibit1_idx` (`exhibit_id` ASC),
  INDEX `fk_poi_project1_idx` (`project_id` ASC))
ENGINE = MyISAM
COMMENT = '点位表';


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
