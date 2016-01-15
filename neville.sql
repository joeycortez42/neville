/*
 Source Server         : Localhost
 Source Server Type    : MySQL
 Source Host           : localhost
 Source Database       : neville
 File Encoding         : utf-8

 Date: 08/29/2015 15:25:00 PM
*/

SET NAMES utf8;

-- ----------------------------
--  Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(127) NOT NULL,
  `password` char(64) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uniq_email` (`email`)
) DEFAULT CHARSET=utf8;