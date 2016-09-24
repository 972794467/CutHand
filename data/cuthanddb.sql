CREATE DATABASE IF NOT EXISTS `cuthanddb`;

USE `cuthanddb`;

--管理员表

DROP TABLE IF EXISTS `admin`;

CREATE TABLE `admin`(
`id` TINYINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
`username` CHAR(20) NOT NULL,
`password` CHAR(32) NOT NULL,
`email` VARCHAR(50) NOT NULL UNIQUE
)ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

--分类表

DROP TABLE IF EXISTS `species`;

CREATE TABLE `species`(
`id` SMALLINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
`name` VARCHAR(50) UNIQUE
)ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;


--商品表

DROP TABLE IF EXISTS `products`;

CREATE TABLE `products`(
`id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
`name` VARCHAR(50) NOT NULL UNIQUE,
`code` CHAR(30) NOT NULL,
`number` INT UNSIGNED DEFAULT 0,
`price` DECIMAL(10,2) NOT NULL,
`iPrice` DECIMAL(10,2) NOT NULL,
`descrite` TEXT,
`image` VARCHAR(50) NOT NULL,
`addTime` INT UNSIGNED NOT NULL,
`isShow` TINYINT(1) DEFAULT 1,
`isHot` TINYINT(1) DEFAULT 0,
`sId` SMALLINT UNSIGNED NOT NULL
)ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

--商品表
DROP TABLE IF EXISTS `users`;

CREATE TABLE `users`(
`id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
`username` CHAR(20) NOT NULL,
`email`  VARCHAR(50) NOT NULL UNIQUE,
`password` CHAR(32) NOT NULL,
`sex` ENUM("男","女","保密") NOT NULL DEFAULT "保密",
`avatar` VARCHAR(50) NOT NULL,
`regTime` INT UNSIGNED NOT NULL  
)ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

--相册表

DROP TABLE IF EXISTS `album`;

CREATE TABLE `album`(
`id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
`pid` INT UNSIGNED NOT NULL,
`albumPath` VARCHAR(50) NOT NULL
)ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;