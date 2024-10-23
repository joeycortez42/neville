/*
 Source Server         : Localhost
 Source Server Type    : MySQL
 Source Host           : localhost
 Source Database       : neville
 File Encoding         : utf-8

 Date: 08/29/2015 15:25:00 PM
*/

SET NAMES utf8mb4;

-- ----------------------------
--  Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL DEFAULT '',
  `password` varchar(255) NOT NULL DEFAULT '',
  `display_name` varchar(250) NOT NULL DEFAULT '',
  `registered` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `activation_key` varchar(255) NOT NULL DEFAULT '',
  `status` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `user_email` (`email`)
) DEFAULT CHARSET=utf8mb4;
